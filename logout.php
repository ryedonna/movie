<!DOCTYPE html>
<html>

<head>
    <title>HYMY MBox Movie</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://fonts.googleeapis.com/css?family=Nunito:400,300" rel="stylesheets" type="screen" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="card">
            <center>
                <div class="card-body">

                    <?php
                    session_start();
                    if (isset($_SESSION["UID"])) {
                        session_unset();

                        session_destroy();

                        header("Location:successLogout.html");

                        ?>

                    <?php
                    } else ?>
                    <h4 class="card-title">NO SESSION EXISTS OR SESSION IS EXPIRED!</h4>
                    <p class="card-text">Please log in again.</p>

                    <a href="login.html">
                        <button type="submit" class="btn btn-outline-light" style="background-color: #c488c1" value="Register">
                            Login
                        </button>
                    </a>

                </div>
            </center>
        </div>
    </div>

</body>

</html>