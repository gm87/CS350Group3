<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,
            initial-scale=1.0">
    </head>

    <body>
        <div id="forumBody">
            <div class="newArticleBtn">New<span class="plusIcon"><i class="fas fa-plus"></i></span></div>
            <div class="pageheader">Forum</div>
            <?php
                $articles = scandir('../messages', 1);
                foreach ($articles as $article) {
                    if ($article == '.' || $article == '..') continue; // if current or prev directory, skip
                    $filePath = "../messages/" . $article . "/originalPost.json";
                    echo "<script>console.log(\"" . file_get_contents($filePath) . "\")</script>";
                    echo "<div class=\"articleTitle\">" . file_get_contents($filePath) . "</div>";
                }
            ?>
        </div> <!-- end forumBody div -->
        <div id="newPostForm">
            <div class="pageheader">New Post</div>
            <form id="newPostFormElement" method="post" autocomplete="off">
            <div class="newPostLabel">Title</div>
            <input id="titleInput" type="text" name="title" maxlength="64" placeholder="Enter the title..." required />
            <div class="newPostLabel">Body</div>
            <div><textarea id="bodyInput" rows="4" cols="50" maxlength="10000" wrap="hard" placeholder="Enter your message..." required></textarea></div>
            <input type="submit" id="submitBtn" />
            </form>
            <button class="cancelBtn" id="newPostCancelBtn">Cancel</button>
        </div> <!-- end newPostForm div -->
    </body>

    <script type="text/javascript">
        const newArticleBtn = document.getElementsByClassName("newArticleBtn")[0]
        const cancelBtn = document.getElementById("newPostCancelBtn")
        const forumBody = document.getElementById("forumBody")
        const newPostForm = document.getElementById("newPostForm")
        const newPostFormElement = document.getElementById("newPostFormElement")
        const titleInput = document.getElementById("titleInput")
        const bodyInput = document.getElementById("bodyInput")
        
        newPostForm.style.display = "none"

        const clickedNewBtn = _ => {
            forumBody.style.display = "none"
            newPostForm.style.display = "block"
        }

        const clickedCancelPost = _ => {
            newPostForm.style.display = "none"
            forumBody.style.display = "block"
        }

        const handleSubmit = e => {
            e.preventDefault()
            let formData = new FormData()
            formData.append('title', titleInput.value)
            formData.append('body', bodyInput.value)
            fetch('../actions/submitNewPost.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.code === 200) {
                    console.log(`we did it!`)
                } else {
                    console.log(`response: ${response} ${JSON.stringify(response)}`)
                    console.log(`something went wrong! code: ${response.code}`)
                }
            })
            console.log(`title: ${titleInput.value}`)
            console.log(`body: ${bodyInput.value}`)
        }
        
        newArticleBtn.onclick = clickedNewBtn
        cancelBtn.onclick = clickedCancelPost
        newPostFormElement.addEventListener('submit', handleSubmit)
    </script>

</html>