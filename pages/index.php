<!DOCTYPE html>

<!-- CS350 Group 3

-->

<html lang="en">
    <head>
        <title>TITLE HERE</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,
                    initial-scale=1.0">
        <link rel="stylesheet" href="../styles.css" />
        <script src="https://kit.fontawesome.com/38f1faf54a.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
        const queryString = window.location.search
        const urlParams = new URLSearchParams(queryString)
        const pageId = urlParams.get('page_id')
        let currentPage = parseInt(pageId) || 1
        window.onload = _ => {
            const nav = document.getElementsByTagName("nav")[0]
            const tabs = nav.getElementsByTagName("a")

            const navitem = tabs[currentPage-1]
            const ident = navitem.id.split("_")[1]
            navitem.className = "activeTab"

            const pages = document.getElementsByTagName("section")
            for (page of pages) { // hide all pages
                page.style.display = "none"
            }
            for (tab of tabs) { // set onClick function for all tabs
                tab.onclick = function() { displayPage(this.id) }
            }
            document.getElementById(`page_${currentPage}`).style.display = "block"
        }

        /* displayPage
            called when tab is clicked, displays selected page
            Inputs
                id - id of tab clicked, id of page to display
        */
        displayPage = id => {
            document.getElementById(`page_${currentPage}`).style.display = "none" // hide current page
            document.getElementById(`tab_${currentPage}`).className = "" // current tab is no longer activeTab
            document.getElementById("newPostForm").style.display = "none" // hide new post form if open and navigating away
            document.getElementById("forumBody").style.display = "block" // show forum body if navigating away so it reappears
                                                                         //    on next visit
            currentPage = id.split("_")[1]
            document.getElementById(`page_${currentPage}`).style.display = "block" // show selected page
            document.getElementById(`tab_${currentPage}`).className = "activeTab"  // selected tab is now activeTab
        }
        </script>
    </head>

    <body>
        <div class="pagewrapper">
            <nav> <!-- navbar -->
                <a id="tab_1">Home</a>
                <a id="tab_2">About</a>
                <a id="tab_3">Forum</a>
            </nav> <!-- end navbar -->
            <section id="page_1">
                <?php include 'home.php'?>
            </section> <!-- end page 1 -->
            <section id="page_2">
                <?php include 'about.php'?>
            </section> <!-- end page 2 -->
            <section id="page_3">
                <?php include 'forum.php'?>
            </section> <!-- end page 3 -->
        </div> <!-- end pagewrapper div -->
    </body>
</html>