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

            $movieID = @$_POST['movieID'];
            $host = "localhost";
            $username = "root";
            $password = "";
            $dbname = "HYMY_DB";

            $link = mysqli_connect($host, $username, $password, $dbname);
            if (!$link) {
                die("Could not connect: " . mysqli_connect_error());
            } else {

                $queryGet = "SELECT * FROM MOVIE WHERE movieID = '" . $movieID . "' ";
                $resultGet = mysqli_query($link, $queryGet);
                if (!$resultGet) {
                    die("Invalid Query - get Movie List:" . mysqli_error($link));
                } else {
                    ?>

    <div class="container" style="margin-left: 20%;">
        <div class="col-8 form-input">
            <div class="jumbotron" id="jumbo">
                <h4 class="card-title">Edit Movie Details</h4>
                <p class="card-text"></p>

                <form action="edited_movie.php" name="UpdateForm" method="POST">
                    <?php
                                            while ($baris = mysqli_fetch_array($resultGet, MYSQLI_BOTH)) {
                                                ?>
                    Movie ID:
                    <?php $selected_movieID = $baris['movieID'];
                                                    echo $baris['movieID'];
                                                    ?>

                    <!-- letak sini !-->


                    <div class="form-group">
                        <label class="" for="title">Title: </label>
                        <input type="text" name="title" class="form-control" value="<?php echo $baris['title']; ?>"
                            maxlength="50" required>
                    </div>

                    <div class="form-group">
                        <label class="" for="genre">Genre: </label><?php $Genre = $baris['genre']; ?>
                        <select name="genre" class="form-control" required>
                            <option value=""> - Please choose - </option>
                            <option value="Action" <?php if ($Genre == "Action") echo "selected"; ?>>
                                Action
                            </option>

                            <option value="Adventure" <?php if ($Genre == "Adventure") echo "selected"; ?>>
                                Adventure
                            </option>

                            <option value="Animation" <?php if ($Genre == "Animation") echo "selected"; ?>>
                                Animation
                            </option>

                            <option value="Biography" <?php if ($Genre == "Biography") echo "selected"; ?>>
                                Biography
                            </option>

                            <option value="Comedy" <?php if ($Genre == "Comedy") echo "selected"; ?>>
                                Comedy
                            </option>

                            <option value="Crime" <?php if ($Genre == "Crime") echo "selected"; ?>>
                                Crime
                            </option>

                            <option value="Documentary" <?php if ($Genre == "Documentary") echo "selected"; ?>>
                                Documentary
                            </option>

                            <option value="Drama" <?php if ($Genre == "Drama") echo "selected"; ?>>
                                Drama
                            </option>

                            <option value="Family" <?php if ($Genre == "Family") echo "selected"; ?>>
                                Family
                            </option>

                            <option value="Fantasy" <?php if ($Genre == "Fantasy") echo "selected"; ?>>
                                Fantasy
                            </option>

                            <option value="Film Noir" <?php if ($Genre == "Film Noir") echo "selected"; ?>>
                                Film Noir
                            </option>

                            <option value="History" <?php if ($Genre == "History") echo "selected"; ?>>
                                History
                            </option>

                            <option value="Horror" <?php if ($Genre == "Horror") echo "selected"; ?>>
                                Horror
                            </option>

                            <option value="Music" <?php if ($Genre == "Music") echo "selected"; ?>>
                                Music
                            </option>

                            <option value="Musical" <?php if ($Genre == "Musical") echo "selected"; ?>>
                                Musical
                            </option>

                            <option value="Mystery" <?php if ($Genre == "Mystery") echo "selected"; ?>>
                                Mystery
                            </option>

                            <option value="Romance" <?php if ($Genre == "Romance") echo "selected"; ?>>
                                Romance
                            </option>

                            <option value="Sci-Fi" <?php if ($Genre == "Sci-Fi") echo "selected"; ?>>
                                Sci-Fi
                            </option>

                            <option value="Short" <?php if ($Genre == "Short") echo "selected"; ?>>
                                Short
                            </option>

                            <option value="Sport" <?php if ($Genre == "Sport") echo "selected"; ?>>
                                Sport
                            </option>

                            <option value="Superhero" <?php if ($Genre == "Superhero") echo "selected"; ?>>
                                Superhero
                            </option>

                            <option value="Thriller" <?php if ($Genre == "Thriller") echo "selected"; ?>>
                                Thriller
                            </option>

                            <option value="War" <?php if ($Genre == "War") echo "selected"; ?>>
                                War
                            </option>

                            <option value="Western" <?php if ($Genre == "Western") echo "selected"; ?>>
                                Western
                            </option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label class="" for="description">Description: </label>
                        <textarea name="description" class="form-control"
                            required><?php echo $baris['description']; ?></textarea>
                    </div>

                    <?php
                                            }
                                            ?>

                    <br>
                    <input type="hidden" name="movieID" value="<?php echo $selected_movieID; ?>">
                    <input type="Submit" value="Update">
            </div>
        </div>
    </div>

    </form>
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