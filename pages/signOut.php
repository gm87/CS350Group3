<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,
            initial-scale=1.0">
    </head>

    <body>
    <h1 class="pageheader">Sign Out</h1>
    <div class="loginElementContainer"><button id="signOutBtn">Sign Out</button></div>
    </body>

    <script type="text/javascript">
        const signOutBtn = document.getElementById("signOutBtn")

        const handleSignOut = e => {
            e.preventDefault()
            localStorage.removeItem('username')
            window.location.reload()
        }

        signOutBtn.addEventListener('click', handleSignOut)
    </script>

</html>