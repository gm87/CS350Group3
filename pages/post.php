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
            <a href="../pages?page_id=5">Sign Out</a>
        </nav> <!-- end navbar -->
        <?php
            $post = htmlspecialchars($_GET["id"]); // use url parameters to get post id
            $filePath = "../messages/" . $post;
            # echo "<script>console.log(`filePath: " . $filePath . "`)</script>";
            $orignalPost = "../messages/" . $post . "/originalPost.json";
            echo "<div class=postHeader>" . json_decode(file_get_contents($orignalPost))->title . "</div>";
            echo "<div class=postBody>" . json_decode(file_get_contents($orignalPost))->body . "</div>";
            $comments = scandir($filePath, 1);
            echo "<div class=\"postComments\">";
            foreach ($comments as $comment) { // read in all files. originalPost.json is original post, rest are comments
                if ($comment == '.' || $comment == '..' || $comment == 'originalPost.json') continue; // if current or prev directory, skip
                echo "<div class=\"commentContainer\">
                <div class=\"author\"> " .
                    json_decode(file_get_contents($filePath . "/" . $comment))->author .
                "</div>
                <div class=\"message\">" .
                    json_decode(file_get_contents($filePath . "/" . $comment))->comment .
                "</div>
                <div class=\"datePosted\">" .
                    date("F j, Y", $comment) .
                "</div>";
            }
            echo "</div>";
        ?>
        <div class="commentForm">
        <form id="newCommentFormElement" method="post" autocomplete="off">
            <div><textarea id="commentInput" rows="4" cols="50" maxlength="10000" wrap="hard" placeholder="Enter your comment..." required></textarea></div>
            <input type="submit" id="submitBtn" />
        </form>
        </div>
    </div>
    </body>

    <script type="text/javascript">
        window.onload = _ => {
            const queryString = window.location.search
            const urlParams = new URLSearchParams(queryString)
            const postId = urlParams.get('id')
            const commentInput = document.getElementById("commentInput")
            const newCommentFormElement = document.getElementById("newCommentFormElement")

            const handleSubmit = e => {
                e.preventDefault()
                let formData = new FormData()
                formData.append('comment', commentInput.value)
                formData.append('postId', postId)
                formData.append('author', localStorage.getItem('username'))
                fetch('../actions/submitNewComment.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => { // do something with response

                })
            }

            newCommentFormElement.addEventListener('submit', handleSubmit)
        }
    </script>

</html>