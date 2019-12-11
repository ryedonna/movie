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

    <fieldset>
        <h2> Movie Deleted </h2>

        <?php
            $movieID = $_POST["movieID"];

            $host = "localhost";
            $username = "root";
            $password = "";
            $dbname = "HYMY_DB";

            $link = mysqli_connect($host, $username, $password, $dbname);
            if (!$link) {
                die("Problemo tak connect DB la " . mysqli_connect_error($link));
            } else {
                $queryInsert = "DELETE FROM MOVIE WHERE movieID = '" . $movieID . "' ";
                $resultInsert = mysqli_query($link, $queryInsert);

                if (!$resultInsert) {
                    die("Query bermasalah : " . mysqli_error($link));
                } else {
                    header("Location:successDelete.html");
                }
            }

            ?>
    </fieldset>

</body>
<?php
} else {
    header("Location:sessionExpire.html");
}
?>

</html>