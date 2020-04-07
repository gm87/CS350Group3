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

        </div> <!-- end forumBody div -->
        <div id="newPostForm">
            <div class="pageheader">New Post</div>
            <form action="submit-new-post.php" method="post" autocomplete="off">
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
        
        newPostForm.style.display = "none"

        const clickedNewBtn = _ => {
            forumBody.style.display = "none"
            newPostForm.style.display = "block"
        }

        const clickedCancelPost = _ => {
            newPostForm.style.display = "none"
            forumBody.style.display = "block"
        }
        
        newArticleBtn.onclick = clickedNewBtn
        cancelBtn.onclick = clickedCancelPost

        <?php
            # useful later - create a directory with current unix timestamp
            # $time = strval(time());
            # mkdir('../messages/' . $time)
        ?>
    </script>

</html>