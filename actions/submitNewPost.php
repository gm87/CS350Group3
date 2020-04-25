<?php
    $time = strval(time());
    mkdir('../messages/' . $time);
    $title = $_POST['title'];
    $body = $_POST['body'];
    file_put_contents("../messages/" . $time . "/originalPost.json", 
    "{\n\t\"title\": \"" . $title . "\", \n\t\"body\": \"" . $body . "\" \n}");
    http_response_code(200);
?>