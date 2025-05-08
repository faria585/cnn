<?php include 'db.php'; ?>
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    try {
        $stmt->execute([$username, $password]);
        echo "<script>alert('Signup successful! Please login.'); window.location.href='login.php';</script>";
        exit;
    } catch (PDOException $e) {
        echo "<script>alert('Username already exists!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Signup</title>
<style>
    body { font-family: Arial, sans-serif; background: #f4f4f4; }
    .container { background: white; padding: 20px; width: 300px; margin: 100px auto; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0,0,0,0.2);}
    input, button { width: 100%; padding: 10px; margin-top: 10px; }
    button { background: #cc0000; color: white; border: none; cursor: pointer; }
</style>
</head>
<body>

<div class="container">
    <h2>Signup</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit">Register</button>
    </form>
    <p>Already registered? <a href="login.php">Login</a></p>
</div>

</body>
</html>
