<!DOCTYPE html>

<html lang="en">
    <head>
        <title>TITLE HERE</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,
                    initial-scale=1.0">
        <link rel="stylesheet" href="../styles.css" />
        <script src="https://kit.fontawesome.com/38f1faf54a.js" crossorigin="anonymous"></script>
    <body>
    <div class="pagewrapper"> <!-- recreate navbar, since this page was reloaded -->
        <nav> <!-- navbar -->
            <a href="../pages">Home</a>
            <a href="../pages?page_id=2">About</a>
            <a class="activeTab" href="../pages?page_id=3">Forum</a>
        </nav> <!-- end navbar -->
    </div>
    <?php
        $post = htmlspecialchars($_GET["id"]); // use url parameters to get post id
        $filePath = "../messages/" . $post;
        # echo "<script>console.log(`filePath: " . $filePath . "`)</script>";
        $files = scandir($filePath, 1);
        foreach ($files as $file) { // read in all files. originalPost.json is original post, rest are comments
            if ($file == '.' || $file == '..') continue; // if current or prev directory, skip
            echo "<script>console.log(`file: " . $file . "`)</script>";
        }
    ?>
    </body>

</html>