<?php
session_start();
include('parts/header.php');
include('utils/connect.php');

if(!array_key_exists('name', $_SESSION)){
    header('Location: login.php?message=error-login');
}

?>

<h1 class="text-center my-5 text-danger">Déconnexion</h1>

<div class="container">
    <div class="d-flex justify-content-center flex-column">        
        <p class="text-center fs-4">Bienvenue <?php echo ($_SESSION['name']) ?></p>
        <p class="text-center fs-4">Vous êtes sur le point de vous déconnecter</p>
        <p class="text-center fs-4">Si c'est votre choix, veuillez cliquer sur le lien ci-dessous</p>
        <div class="d-flex justify-content-center">
            <a href="validatelogout.php" class="text-center mt-4 fs-5 btn btn-danger">Se déconnecter</a>
        </div>
    </div>
</div>