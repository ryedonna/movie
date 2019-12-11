<!DOCTYPE html>
<?php
session_start();

if (isset($_SESSION["UID"]))
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

$link = mysqli_connect($host, $username, $password, $dbname);

if (!$link) {
    die("Could not connect: " . mysqli_connect_error());
} else {
    $queryGet = "SELECT * FROM MOVIE ORDER BY title ASC";

    $resultGet = mysqli_query($link, $queryGet);

    if (!$resultGet) {
        die("Invalid Query - get Register List: " . mysqli_error($link));
    } else {
        ?>
    <div class="container">
        <center>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List of HYMY's Movie</h4>
                    <p class="card-text"></p>

                    <div class="btn btn-outline-light" style="background-color:#dfa8dc">
                        <form action="search2.php" method="post">
                            <input type="text" name="search">
                            <input type="submit" value="search">
                        </form>
                    </div>
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
                            <?php while ($baris = mysqli_fetch_array($resultGet, MYSQLI_BOTH)) {
                                                ?>
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
                        <button onclick="topFunction()" id="myBtn" title="Go to top" class="btn btn-outline-light"
                            style="background-color: #c488c1">
                            Back to top
                        </button>
                    </div>
                </div>
        </center>
    </div>

    <?php
        }
    }
    ?>

    </div>

    <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    </script>

</body>

</html>