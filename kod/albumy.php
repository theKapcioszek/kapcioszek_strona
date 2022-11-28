<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono&family=Montserrat&family=Oregano&display=swap"
        rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style-main.css">
    <title>Kapcioszek - Albumy</title>
    <link rel="icon" type="image/x-icon" href="../img/channels4_profile.ico">
</head>

<body>
    <div class="menu">
        <div id="branding">
            <img src="../img/channels4_profile.ico" alt="logo">
            <a href="index.php">
                <p>Kapcioszek</p>
            </a>
        </div>
        <?php

        $link = new mysqli("localhost", "root", "");

        if ($link->connect_error) {
            die("Connection failed: " . $link->connect_error);
        }

        mysqli_select_db($link, 'strona_praktyka')
            or die("Could not select database");


        $result = mysqli_query($link, "SELECT name, link FROM menu;");

        while ($row = mysqli_fetch_array($result)) {
        ?>


        <a href="<?= $row['link']; ?>">
            <?= $row['name']; ?>
        </a>


        <?php
        }

        mysqli_close($link);
        ?>

    </div>
    <div class="body">
        <div>
            <h2>Albumy</h2>
        </div>

        <table>
            <?php
            $link = new mysqli("localhost", "root", "");

            if ($link->connect_error) {
                die("Connection failed: " . $link->connect_error);
            }

            mysqli_select_db($link, 'strona_praktyka')
                or die("Could not connect to database");

            $result = mysqli_query($link, "SELECT cover_art, name, year_of_release, link FROM album;");

            while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><img src="<?= $row['cover_art']; ?>" width=200px height=200px></td>
                <td>
                    <a href="<?= $row['link']; ?>.php">
                        <?= $row['name']; ?>
                    </a>
                </td>
                <td>
                    <?= $row['year_of_release']; ?>
                </td>
            </tr>

            <?php
            }
            mysqli_close($link);
            ?>
        </table>
    </div>
    <div class="footer">
        <div><a href="index.php"><b>Kapcioszek</b></a></div>
        <?php

        $link = new mysqli("localhost", "root", "");

        if ($link->connect_error) {
            die("Connection failed: " . $link->connect_error);
        }

        mysqli_select_db($link, 'strona_praktyka')
            or die("Could not select database");


        $result = mysqli_query($link, "SELECT name, link FROM footer;");

        while ($row = mysqli_fetch_array($result)) {
        ?>

        <div><a href="<?= $row['link']; ?>.php">
                <?= $row['name']; ?>
            </a>
        </div>

        <?php
        }

        mysqli_close($link);
        ?>

    </div>
</body>

</html>