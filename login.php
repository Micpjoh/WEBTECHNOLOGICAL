<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css_files/main.css">
    <link rel="stylesheet" href="css_files/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- NAVIGATION BAR -->
    <?php include "header.php"; ?>

    <!-- BODY SECTION -->
    <section id="login-container">
        <div class = "login-box">
            <form method="POST" action="login.inc.php">
                <h1>Log in to&nbsp; <span style="color: green;"> GreenWear</span></h1>
                <div class="input-group">
                    <label for="email">EMAIL</label>
                    <input type="email" name="email"></input>
                </div class="input-group">

                <div class="input-group">
                    <label for="pw">PASSWORD</label>
                    <input type="password" name="password"></input>
                </div>

                <div class="button-group">
                    <button type ="submit" name="submit">Submit when ready!</button>
                </div>
                
                <div class="button-group2">
                    <a href="signup.php">Don't have an account? Sign up!</a>
                </div>
            </form>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include "footer.php"; ?>

    <script src="script.js"></script>
</body>

</html>