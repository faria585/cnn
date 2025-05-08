<?php include 'db.php'; ?>
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        echo "<script>window.location.href='dashboard.php';</script>";
        exit;
    } else {
        echo "<script>alert('Invalid Credentials');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<style>
    body { font-family: Arial, sans-serif; background: #f4f4f4; }
    .container { background: white; padding: 20px; width: 300px; margin: 100px auto; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0,0,0,0.2);}
    input, button { width: 100%; padding: 10px; margin-top: 10px; }
    button { background: #cc0000; color: white; border: none; cursor: pointer; }
</style>
</head>
<body>

<div class="container">
    <h2>Login</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="signup.php">Signup</a></p>
</div>

</body>
</html>
