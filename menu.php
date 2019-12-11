<!DOCTYPE html>
<?php
session_start();

if (isset($_SESSION["UID"])) //to check if session exist or not
{
    ?>
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
    <?php
            if ($_SESSION["UserType"] == "Admin") {
                ?>

    <nav class="navbar navbar-expand -md navbar-light" style="background-color: #dfa8dc">
        <div class="navbar-header">
            <a class="navbar-brand"><img src="images/movieLogo.png" /></a>
            <span class="navbar-text"><b>HYMY Movie Collection</b></span>
        </div>

        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="menu.php">Home</a>
        </ul>

        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
        </ul>
    </nav>


    <div class="container">
        <center>

            <div class="card-body">
                <h4 class="card-title">Welcome Back!</h4>
                <p class="card-text">What would you like to do today, <?php echo $_SESSION["UID"]; ?> ?</p>

                <div class="card-group">

                    <div class="card">
                        <div class="card-body text-center">
                            <img src="images/database.png">
                        </div>
                        <a href="admin_viewMovie.php">
                            <button type="submit" class="btn btn-outline-light" style="background-color: #c488c1"
                                value="Register">
                                View Database
                            </button>
                        </a><br>
                    </div>

                    <div class="card">
                        <div class="card-body text-center">
                            <img src="images/video-play.png">
                        </div>
                        <a href="admin_viewOnlyMovie.php">
                            <button type="submit" class="btn btn-outline-light" style="background-color: #c488c1"
                                value="Register">
                                View All Movie
                            </button>
                        </a><br>
                    </div>

                    <div class="card">
                        <div class="card-body text-center">
                            <img src="images/seo.png">
                        </div>
                        <a href="admin_viewOnlyUser.php">
                            <button type="submit" class="btn btn-outline-light" style="background-color: #c488c1"
                                value="Register">
                                View All User
                            </button>
                        </a><br>
                    </div>

                </div>

            </div>

        </center>
    </div>

    <?php
            } else {
                ?>

    <nav class="navbar navbar-expand -md navbar-light" style="background-color: #dfa8dc">
        <div class="navbar-header">
            <a class="navbar-brand"><img src="images/movieLogo.png" /></a>
            <span class="navbar-text"><b>HYMY Movie Collection</b></span>
        </div>

        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="menu.php">Home</a>
            </li>
        </ul>

        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
        </ul>
    </nav>

    <br><br>
    <div class="container">
        <center>

            <div class="card-body">
                <h4 class="card-title">Welcome Back Movie Collector!</h4>
                <p class="card-text">What would you like to do today, <?php echo $_SESSION["UID"]; ?>?</p>

                <hr>

                <div class="card-group">

                    <div class="card">
                        <div class="card-body text-center">
                            <img src="images/upload .png">
                        </div>
                        <a href="movieRegister.php">
                            <button type="submit" class="btn btn-outline-light" style="background-color: #c488c1"
                                value="Register">
                                Upload New Movie
                            </button>
                        </a><br>
                    </div>

                    <div class="card">
                        <div class="card-body text-center">
                            <img src="images/cloud-computing.png">
                        </div>
                        <a href="user_viewMovie.php">
                            <button type="submit" class="btn btn-outline-light" style="background-color: #c488c1"
                                value="Register">
                                View Movie Collection
                            </button>
                        </a><br>
                    </div>

                    <div class="card">
                        <div class="card-body text-center">
                            <img src="images/system-update .png">
                        </div>
                        <a href="edit_viewMovie.php">
                            <button type="submit" class="btn btn-outline-light" style="background-color: #c488c1"
                                value="Register">
                                Edit Existing Movie
                            </button>
                        </a><br>
                    </div>

                    <div class="card">
                        <div class="card-body text-center">
                            <img src="images/garbage .png">
                        </div>
                        <a href="delete_viewMovie.php">
                            <button type="submit" class="btn btn-outline-light" style="background-color: #c488c1"
                                value="Register">
                                Delete Existing Movie
                            </button>
                        </a><br>
                    </div>
                </div>

            </div>

        </center>
    </div>
    <?php
            }
            ?>

</body>

</html>

<?php
} else {
    header("Location:sessionExpire.html");
}
?>