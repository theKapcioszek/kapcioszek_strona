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
    <title>Kapcioszek - Strona Główna</title>
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

        $link = new mysqli("mysql_db", "root", "");

        if ($link->connect_error) {
            die("Connection failed: " . $link->connect_error);
        }

        mysqli_select_db($link, 'strona_praktyka')
            or die("Could not select database");


        $result = mysqli_query($link, "SELECT name, link FROM menu;");

        while ($row = mysqli_fetch_array($result)) {
        ?>


        <a href="<?= $row['link']; ?>.php">
            <?= $row['name']; ?>
        </a>


        <?php
        }

        mysqli_close($link);
        ?>

    </div>
    <div class="body-mp">
        <div>
            <h2>Strona Główna</h2>
        </div>
        <div>
            <p>
                Hej! Jestem Kapcioszek. Moim hobby produkcja muzyki. Myślę, że z każdym albumem idzie
                mi coraz lepiej ale to już tobie, drogi słuchaczu oceniać. Jednym z moich marzeń jest możliwość robienia
                w przyszłości piosenek z tekstem (na razie tworzę tylko utwory z samą muzyką).
            </p>
            <p>
                Dotychczas mam wydane dwa albumy plus trzeci prawie skończony (niestety przez problemy z komputerem oraz
                sprawy prywatne prace się mocno opóźniły), który mam nadzieję wydać jeszcze w tym roku. Oprócz tego mam
                na swoim kanale na youtube jeszcze kilka utowrów nie należących do żadnego albumu albo, które miały być
                albumami a ostatecznie
                wyszło z tego tylko kilka utworów.
            </p>
        </div>
        <div>
            <p>
                Losowe polecenie utworu:
            </p>
            <table>
                <?php

                $tab = array();

                $link = new mysqli("mysql_db", "root", "");

                if ($link->connect_error) {
                    die("Connection failed: " . $link->connect_error);
                }

                mysqli_select_db($link, 'strona_praktyka')
                    or die("Could not select database");

                $result = mysqli_query($link, "SELECT ID FROM utwor;");

                while ($row = mysqli_fetch_array($result)) {
                    array_push($tab,$row['ID']);
                }

                $losowanie_utworu = rand(1, count($tab));


                $result = mysqli_query($link, "SELECT utwor.name, utwor.link, album.name AS aname FROM utwor JOIN album on utwor.album = album.ID WHERE utwor.ID = $losowanie_utworu;");

                while ($row = mysqli_fetch_array($result)) {
                ?>

                <tr>
                    <td>
                        <?= $row['name']; ?>
                    </td>
                    <td>
                        <?= $row['aname']; ?>
                    </td>
                    <td>
                        <iframe width="360" height="215" src="<?= $row['link']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </td>
                </tr>

                <?php
                }
                mysqli_close($link);
                ?>
            </table>
        </div>

    </div>
    <div class="footer">
        <div><a href="index.php"><b>Kapcioszek</b></a></div>
        <?php

        $link = new mysqli("mysql_db", "root", "");

        if ($link->connect_error) {
            die("Connection failed: " . $link->connect_error);
        }

        mysqli_select_db($link, 'strona_praktyka')
            or die("Could not select database");


        $result = mysqli_query($link, "SELECT name, link FROM footer;");

        while ($row = mysqli_fetch_array($result)) {
        ?>

        <div><a href="<?= $row['link']; ?>">
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