<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first!'); window.location.href='login.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<style>
    body { font-family: Arial, sans-serif; background: #f4f4f4; }
    .container { text-align: center; margin-top: 100px; }
    a { display: inline-block; margin: 10px; padding: 10px 20px; background: #cc0000; color: white; text-decoration: none; border-radius: 5px; }
</style>
</head>
<body>

<div class="container">
    <h1>Welcome to Dashboard</h1>
    <a href="add_article.php">Add New Article</a>
    <a href="logout.php">Logout</a>
</div>

</body>
</html>
