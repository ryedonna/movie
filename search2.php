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
    <br><br>
    <?php

            $host = "localhost";
            $username = "root";
            $password = "";
            $dbname = "HYMY_DB";
            $searchq = @$_POST['search'];

            $link = mysqli_connect($host, $username, $password, $dbname);

            if (!$link) {
                die("Could not connect: " . mysqli_connect_error());
            } else {

                $querySearch = "SELECT * FROM MOVIE 
                            WHERE title
                            LIKE '%" . $searchq . "%' OR genre LIKE '%" . $searchq . "%' OR description LIKE '%" . $searchq . "%' OR status LIKE '%" . $searchq . "%' ";

                $resultGet = mysqli_query($link, $querySearch);

                if (!$resultGet) {
                    die("Invalid Query - get Register List: " . mysqli_error($link));
                } else {

                    ?>
    <div class="container">
        <center>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">HYMY's Movie</h4>
                    <p class="card-text">Search Result!</p>

                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-light"
                            style="background-color:#dfa8dc; border-radius:20px;">
                            <thead>
                                <tr>
                                    <th>Movie ID</th>
                                    <th>User</th>
                                    <th>Title</th>
                                    <th>Genre</th>
                                    <th>Description</th>
                                    <th>Date Uploaded</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <?php while ($baris = mysqli_fetch_array($resultGet, MYSQLI_BOTH)) { ?>

                            <tbody>
                                <tr>
                                    <td><?php echo $baris['movieID']; ?></td>
                                    <td><?php echo $baris['userID']; ?></td>
                                    <td><?php echo $baris['title']; ?></td>
                                    <td><?php echo $baris['genre']; ?></td>
                                    <td><?php echo $baris['description']; ?></td>
                                    <td><?php echo $baris['dateRegistered']; ?></td>
                                    <td><?php echo $baris['status']; ?></td>
                                </tr>
                            </tbody>
                            <?php
                                                    }
                                                    ?>
                        </table>
                        <hr>

                        <a href="admin_viewOnlyMovie.php">
                            <button class="btn btn-outline-light" style="background-color: #c488c1">
                                Back 
                            </button>
                        </a>
                    </div>
        </center>
    </div>

    <?php
                }
            }
            ?>



</body>
<?php
} else {
    header("Location:sessionExpire.html");
}
?>

</html>