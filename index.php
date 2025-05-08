<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CNN Clone - Home</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f4f4f4; }
        header { background: #cc0000; padding: 20px; color: white; text-align: center; font-size: 30px; }
        nav { background: #333; overflow: hidden; }
        nav a { float: left; display: block; color: white; text-align: center; padding: 14px 16px; text-decoration: none; }
        nav a:hover { background-color: #ddd; color: black; }
        .container { padding: 20px; }
        .featured { background: white; padding: 20px; margin-bottom: 20px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; }
        .card { background: white; padding: 15px; border-radius: 10px; box-shadow: 0px 0px 5px rgba(0,0,0,0.2); }
        .card img { width: 100%; height: 150px; object-fit: cover; border-radius: 10px; }
        .card h3 { margin: 10px 0; font-size: 18px; }
        @media (max-width: 600px) {
            nav a { float: none; width: 100%; }
        }
    </style>
</head>
<body>

<header>CNN Clone</header>

<nav>
<?php
    $stmt = $pdo->query("SELECT * FROM categories");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<a href='javascript:void(0)' onclick='goCategory({$row['id']})'>{$row['name']}</a>";
    }
?>
</nav>

<div class="container">
    <div class="featured">
        <h2>Featured News</h2>
        <?php
        $stmt = $pdo->query("SELECT * FROM articles ORDER BY published_at DESC LIMIT 1");
        $article = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<img src='{$article['image']}' alt='featured' style='width:100%; height:300px; object-fit:cover;'>";
        echo "<h2>{$article['title']}</h2>";
        echo "<p>" . substr($article['content'], 0, 150) . "...</p>";
        echo "<button onclick='goArticle({$article['id']})'>Read More</button>";
        ?>
    </div>

    <div class="grid">
        <?php
        $stmt = $pdo->query("SELECT * FROM articles ORDER BY published_at DESC LIMIT 4 OFFSET 1");
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
function goCategory(id) {
    window.location.href = "category.php?id=" + id;
}
function goArticle(id) {
    window.location.href = "article.php?id=" + id;
}
</script>

</body>
</html>
