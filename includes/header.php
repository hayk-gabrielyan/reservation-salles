
<link rel="stylesheet" href="styles/header-style.css" />
<!--header-->
<header>
    <div id="box1">
        <div id="logo-box">
            <a href=index.php><img src="img/logo_black_letters.png" alt="logo"></a>
        </div>
    </div>
    <div id="box2">
    <!-- Si aucune Session n'est ouverte -->
    <?php if(!isset($_SESSION['login'])){ ?>
        <a href="index.php">Accueil</a>

        <a href="connexion.php"class="no_active" >Connexion</a>
        <a href="inscription.php"class="no_active" >Inscription</a>
    
    <!-- Si une Session user est ouverte -->
        <?php } else{?>

        <?php } ?>
    </div>
</header>
<!--header end-->