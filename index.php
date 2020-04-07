<!DOCTYPE html>

<!-- CS350 Group 3

-->

<html lang="en">
    <head>
        <title>TITLE HERE</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,
                    initial-scale=1.0">
        <link rel="stylesheet" href="styles.css" />
        <script type="text/javascript">
        let currentPage = 1
        window.onload = _ => {
            const nav = document.getElementsByTagName("nav")[0]
            const ul = nav.getElementsByTagName("ul")[0]
            const tabs = ul.getElementsByTagName("li")

            const navitem = tabs[0]
            const ident = navitem.id.split("_")[1]
            ul.setAttribute("data-current", ident)
            navitem.className = "activeTab"

            const pages = document.getElementsByTagName("section")
            for (page of pages) {
                page.style.display = "none"
            }
            for (tab of tabs) {
                tab.onclick = function() { displayPage(this.id) }
            }
            document.getElementById(`page_${currentPage}`).style.display = "block"
        }

        displayPage = id => {
            document.getElementById(`page_${currentPage}`).style.display = "none"
            document.getElementById(`tab_${currentPage}`).className = ""
            currentPage = id.split("_")[1]
            document.getElementById(`page_${currentPage}`).style.display = "block"
            document.getElementById(`tab_${currentPage}`).className = "activeTab"
        }
        </script>
    </head>

    <body>
        <div class="pagewrapper">
            <nav> <!-- navbar -->
                <ul>
                    <li id="tab_1">Home</li>
                    <li id="tab_2">About</li>
                    <li id="tab_3">Forum</li>
                </ul>
            </nav> <!-- end navbar -->
            <section id="page_1">
                <h1>Page 1</h1>
            </section> <!-- end page 1 -->
            <section id="page_2">
                <h1>Page 2</h1>
            </section> <!-- end page 2 -->
            <section id="page_3">
                <h1>Page 3</h1>
            </section> <!-- end page 3 -->
        </div> <!-- end pagewrapper div -->
    </body>
</html>