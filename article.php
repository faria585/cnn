<?php include 'db.php'; ?>
<?php
$id = $_GET['id'];
$article = $pdo->query("SELECT * FROM articles WHERE id = $id")->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($article['title']); ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f4f4f4; }
        header { background: #cc0000; padding: 20px; color: white; text-align: center; font-size: 30px; }
        .container { padding: 20px; background: white; margin: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
        img { width: 100%; height: 300px; object-fit: cover; border-radius: 10px; }
        h1 { margin-top: 20px; }
        p { line-height: 1.6; }
    </style>
</head>
<body>

<header><?php echo htmlspecialchars($article['title']); ?></header>

<div class="container">
    <img src="<?php echo $article['image']; ?>" alt="article">
    <h1><?php echo htmlspecialchars($article['title']); ?></h1>
    <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
</div>

</body>
</html>
