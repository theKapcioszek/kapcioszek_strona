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
    <title>Kapcioszek - O mnie</title>
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
            <h2>O mnie</h2>
        </div>
        <div>
            <p>
                Hej! Jestem Kapcioszek. Moim hobby jest produkcja muzyki. Myślę, że z każdym albumem idzie mi
                coraz lepiej ale to już tobie, drogi słuchaczu oceniać. Jednym z moich marzeń jest możliwość robienia w
                przyszłości piosenek z tekstem (na razie tworzę tylko utwory z samą muzyką).
                Oprócz tworzenia muzyki lubie również informstykę, gry wideo oraz "siedzę" trochę w grach RPG.
                W każdym razie życzę dobrego dnia i pamiętaj o tym żeby się nawadniać oraz dobrze się wyspać. :3
            </p>
        </div>

        <div>
            <a href="https://www.youtube.com/channel/UCET1UxPbAb7M7CqZXo5D79w"><img
                    src="https://cdn-icons-png.flaticon.com/512/1384/1384060.png" height="75px" width="75px"></a>
            <a href="https://open.spotify.com/artist/0mvaqOMQmfzd3e5z8qcSjg"><img
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/84/Spotify_icon.svg/512px-Spotify_icon.svg.png?20220821125323"
                    height="75px" width="75px"></a>
        </div>
        <div>
            <h3>Kontakt:</h3>
            <div>
                <p><b>Email: </b>kapcioszek@onet.pl</p>
            </div>
        </div>

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