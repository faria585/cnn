<?php include 'db.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_POST['image'];
    $category_id = $_POST['category_id'];

    $stmt = $pdo->prepare("INSERT INTO articles (title, content, image, category_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $content, $image, $category_id]);

    echo "<script>alert('Article Added Successfully!'); window.location.href='index.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Article</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        header { background: #cc0000; padding: 20px; color: white; text-align: center; font-size: 30px; }
        .container { background: white; padding: 20px; margin: 30px auto; width: 500px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); border-radius: 10px; }
        form { display: flex; flex-direction: column; }
        input, textarea, select { margin-bottom: 15px; padding: 10px; border-radius: 5px; border: 1px solid #ccc; }
        button { padding: 10px; background: #cc0000; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #a30000; }
    </style>
</head>
<body>

<header>Add New Article</header>

<div class="container">
    <form method="post">
        <input type="text" name="title" placeholder="Article Title" required>
        <textarea name="content" rows="6" placeholder="Article Content" required></textarea>
        <input type="text" name="image" placeholder="Image URL (e.g., https://example.com/img.jpg)" required>
        <select name="category_id" required>
            <option value="">Select Category</option>
            <?php
            $stmt = $pdo->query("SELECT * FROM categories");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$row['id']}'>{$row['name']}</option>";
            }
            ?>
        </select>
        <button type="submit">Add Article</button>
    </form>
</div>

</body>
</html>
