<?php include 'db.php'; ?>
<?php
$id = $_GET['id'];
$cat = $pdo->query("SELECT name FROM categories WHERE id = $id")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Category - <?php echo htmlspecialchars($cat); ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f4f4f4; }
        header { background: #cc0000; padding: 20px; color: white; text-align: center; font-size: 30px; }
        .container { padding: 20px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; }
        .card { background: white; padding: 15px; border-radius: 10px; box-shadow: 0px 0px 5px rgba(0,0,0,0.2); }
        .card img { width: 100%; height: 150px; object-fit: cover; border-radius: 10px; }
        .card h3 { margin: 10px 0; font-size: 18px; }
    </style>
</head>
<body>

<header>Category: <?php echo htmlspecialchars($cat); ?></header>

<div class="container">
    <div class="grid">
        <?php
        $stmt = $pdo->query("SELECT * FROM articles WHERE category_id = $id ORDER BY published_at DESC");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='card'>";
            echo "<img src='{$row['image']}' alt='news'>";
            echo "<h3 onclick='goArticle({$row['id']})' style='cursor:pointer'>{$row['title']}</h3>";
            echo "</div>";
        }
        ?>
    </div>
</div>

<script>
function goArticle(id) {
    window.location.href = "article.php?id=" + id;
}
</script>

</body>
</html>
