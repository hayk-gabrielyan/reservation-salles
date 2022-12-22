<!--header-->
<header>

    <!-- Si aucune Session n'est ouverte -->
    <?php if(!$login) { ?>
      
        <div id="box1">
            <div id="logo-box">
                <a href=index.php><img src="img/logo_black_letters.png" alt="logo"></a>
            </div>
        </div>

        <a href="index.php">Accueil</a>
        <a href="planning-!con.php">Planning</a>
        <a href="connexion.php"class="no_active" >Connexion</a>
        <a href="inscription.php"class="no_active" >Inscription</a>

    
    <!-- Si une Session user est ouverte -->
        <?php } else { ?>
            
            <div id="box1">
                <div id="logo-box">
                    <a href=index_con.php><img src="img/logo_black_letters.png" alt="logo"></a>
                </div>
            </div>

            <div>Vous êtes connecté en tant que <?php echo $login ?> . </div>
            <a href="index_con.php">Accueil</a>
            <a href="planning.php">Planning</a>
            <a href="reservation-form.php">Réservez ici</a>
            
            <a href="profil.php">Profil</a>
            <a href="deconnexion.php"class="no_active" >Déconnexion</a>
        <?php } ?>
    </div>
</header>
<!--header end-->