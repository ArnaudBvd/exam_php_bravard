<?php
session_start();
include('parts/header.php');
include('utils/connect.php');

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (empty($_POST["name"])) {
        $errors["name"] = 'Veuillez saisir un nom';
    }

    if (empty($_POST["password"])) {
        $errors["password"] = 'Veuillez saisir un mot de passe';
    }


    if (count($errors) == 0) {

        $request = $pdo->prepare(
            'SELECT * FROM user WHERE name = :name'
        );
        $request->bindParam(':name', $_POST["name"]);

        $request->execute();

        $res = $request->fetch();

        if (!$res) {
            $errors["password"] = 'Identifiants ou mot de passe incorrecte';
        } else {
            $_SESSION["name"] = $res["name"];
            header('Location: admin.php');
        }
    }
}
?>

<h1 class="text-center text-info my-5">Connexion</h1>


<div class="container">

    <?php
    // Afficher un message en cas de déconnexion
    if (isset($_GET["message"]) && $_GET["message"] == 'logout') {
        echo ('<div class="alert alert-warning" role="alert">
         Vous êtes déconnecté
        </div>');
    }
    ?>

    <?php
    // Afficher un message si un utilisateur tente de se rendre sur la page restricted via l'URL ou l'onglet
    if (isset($_GET["message"]) && $_GET["message"] == 'error-login') {
        echo ('<div class="alert alert-danger" role="alert">
         Vous devez dabord vous connecter
        </div>');
    }
    ?>

    <form method="post" action="login.php" class="p-5">
        <div class="form-group">
            <label for="name">Nom : </label>
            <input type="text" id="name" name="name" class="form-control">
        </div>

        <div class="form-group mt-2">
            <label for="password">Mot de passe</label>
            <input id="password" type="password" name="password" class="form-control">
        </div>
        <?php

        if (count($errors) != 0) {
            echo (' <h4>Erreurs lors de la dernière soumission du formulaire : </h2>');
            foreach ($errors as $error) {
                echo ('<div class="text-danger">' . $error . '</div>');
            }
        }
        ?>

        <input type="submit" class="btn btn-info mt-3">
    </form>
</div>


<?php
include("parts/footer.php");
?>