<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,
            initial-scale=1.0">
    </head>

    <body>
        <h1 class="pageheader">Log In</h1>
        <form id="signInForm" autocomplete="off">
            <div class="loginSubheader">Username</div>
            <div class="loginElementContainer"><input required autocomplete="off" type="text" id="usernameInput" /></div>
            <div class="loginSubheader">Password</div>
            <div class="loginElementContainer"><input required autocomplete="off" type="password" id="passwordInput" /></div>
            <div class="loginElementContainer"><input type="submit" value="Log In" id="loginBtn" /></div>
        </form>
    </body>

    <script type="text/javascript">
        const usernameInput = document.getElementById("usernameInput")
        const signInForm = document.getElementById("signInForm")

        const handleSignInSubmit = e => {
            e.preventDefault()
            localStorage.setItem('username', usernameInput.value)
            window.location.reload()
        }

        signInForm.addEventListener('submit', handleSignInSubmit)
    </script>

</html>