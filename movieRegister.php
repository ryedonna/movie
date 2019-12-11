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

    <div class="container" style="margin-left: 20%;">
        <form name="movieForm " action="movie_InsertDB.php" method="post">
            <div class="col-8 form-input">
                <div class="jumbotron" id="jumbo">
                    <legend>
                        <center>Upload Movie</center>
                    </legend>

                    <hr>

                    <div class="form-group">
                        <label class="" for="video">Movie: </label>
                        <input type="file" accept="video/*" name="media" value="Choose file" required>
                    </div>

                    <div class="form-group">
                        <label class="" for="video">Title: </label>
                        <input type="text" class="form-control" name="title" maxlength="50" required>
                    </div>

                    <div class="form-group">
                        <label class="l" for="genre">Genre: </label>
                        <select name="genre" class="form-control" required>
                            <option value=""> - Please choose - </option>
                            <option value="Action"> Action </option>
                            <option value="Adventure"> Adventure </option>
                            <option value="Animation"> Animation </option>
                            <option value="Biography"> Biography </option>
                            <option value="Comedy"> Comedy </option>
                            <option value="Crime"> Crime </option>
                            <option value="Documentary"> Documentary </option>
                            <option value="Drama"> Drama </option>
                            <option value="Family"> Family </option>
                            <option value="Fantasy"> Fantasy </option>
                            <option value="Film Noir"> Film Noir </option>
                            <option value="History"> History </option>
                            <option value="Horror"> Horror </option>
                            <option value="Music"> Music </option>
                            <option value="Musical"> Musical </option>
                            <option value="Mystery"> Mystery </option>
                            <option value="Romance"> Romance </option>
                            <option value="Sci-Fi"> Sci-Fi </option>
                            <option value="Short"> Short </option>
                            <option value="Sport"> Sport </option>
                            <option value="Superhero"> Superhero </option>
                            <option value="Thriller"> Thriller</option>
                            <option value="War"> War </option>
                            <option value="Western"> Western </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="" for="description" required>Description: </label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <input type="hidden" name="status" value="Incomplete">

                    <center>
                        <input button type="Submit" class="btn btn-outline-light" style="background-color: #c488c1"
                            value="Upload">
                        </button>

                        <input button type="Reset" class="btn btn-outline-light" style="background-color: #c488c1"
                            value="Cancel">
                        </button>

                    </center>
                </div>
            </div>
        </form>
    </div>

</body>
<?php
} else {
    header("Location:sessionExpire.html");
}
?>

</html>