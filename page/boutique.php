<?php
session_start();

if (!isset($_SESSION['LOGIN'])) {
    header('location: authentification.php');
}
$data = array();

if (isset($_COOKIE['data'])) {
    $data = json_decode($_COOKIE['data'], true);
}
$txtCpt = "";
if (count($data) > 0) {
    $txtCpt = '(' . count($data) . ')';
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./../img/appia1.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="./../css/reset.css">
    <link rel="stylesheet" href="./../css/style.css">
    <link rel="stylesheet" href="./../css/boutique.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https : //fonts.googleapis.com/css2? family= Corinthia & display=swap" rel="stylesheet">
    <link href="https : //fonts.googleapis.com/css2? family= Corinthia &famille= Neonderthaw & display=swap" rel="stylesheet">
    <title>Appia</title>
</head>

<body>
    <div class="wrapper">
        <header>
            <div class="titre">
                <img class="logo" src="./../img/appia1.png" alt="logo">
                <p>Passe un temps dans la lecture</p>
            </div>

            <nav>

                <ul>
                    <li>
                        <a href="./../">Accueil</a>
                    </li>
                    <li>
                        <a class="position" href="./boutique.php">La boutique</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>


                    <li>
                        <a href="./panier.php">Panier <span style="   color: rgb(201, 0, 0);font-weight: bold;" class="cpt"><?php echo $txtCpt; ?></span></a>
                    </li>
                    <li>
                        <a href="./../php/other/deconnect.php">Deconnexion</a>
                    </li>
                </ul>

            </nav>

        </header>
        <main>
            <div class="bande-slide">
                <div class="opac">

                </div>
                <div class="slide">
                    <img src="./../img/1.png" class="image-slide" alt="">
                </div>



            </div>
            <div class="stl-content">
                <div class="stl-bande">

                </div>
            </div>

            <div class="info-content">

                <div class="info">

                    <h2>Presentation des Articles</h2>
                </div>

            </div>
            <div id="ancre" class="article">


            </div>
        </main>
        <div class="mini-footer">

            <ul class="icon">
                <li>
                    <a href="#"><img src="./../img/ico/icons8-git.svg" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="./../img/ico/icons8-gmail5.svg" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="./../img/ico/icons8-linkedin-2.svg" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="./../img/ico/icons8-twitter.svg" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="./../img/ico/icons8-instagram.svg" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="./../img/ico/icons8-github-2.svg" alt=""></a>
                </li>
            </ul>

            <p class="mn-ul">
                <a href="#">Condition generale de ventes</a> | <a href="#">Contact</a> |
                <a href="#">Panier</a>
            </p>


        </div>

    </div>

    <footer>
        <div class="made">

            <p>&copy;Appia Développé par Andre Luambua Mulaja</p>

        </div>

    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./../js/cookies.js"></script>
    <script src="./../js/slide.js"></script>
    <script src="./../js/article.js"></script>

</body>

</html>