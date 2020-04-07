<?php
    $time = strval(time());
    mkdir('../messages/' . $time);
    file_put_contents("../messages/" . $time . "/originalPost.txt", "Hello world!");
?>