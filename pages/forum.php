<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,
            initial-scale=1.0">
    </head>

    <body>
        <div class="pageheader">Forum</div><div class="newArticleBtn">New<span class="plusIcon"><i class="fas fa-plus"></i></span></div>
    </body>

    <script type="text/javascript">
        const newArticleBtn = document.getElementsByClassName("newArticleBtn")[0]
        
        clickedNewBtn = _ => {
            console.log(`clicked new`)
        }
        
        newArticleBtn.onclick = clickedNewBtn
    </script>

</html>