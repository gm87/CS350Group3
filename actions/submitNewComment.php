<?php
    $time = strval(time());
    $comment = $_POST['comment'];
    $post = $_POST['postId'];
    $author = $_POST['author'];
    file_put_contents("../messages/" . $post . "/" . $time . ".json", 
    "{\n\t\"comment\": \"" . $comment . "\", \n\t\"author\": \"" . $author . "\" \n}");
?>