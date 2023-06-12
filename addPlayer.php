<?php
session_start();
include('parts/header.php');
include('utils/connect.php');

// $errors = [];
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
//     if (empty($_POST["player_firstname"])) {
//         $errors["player_firstname"] = 'Veuillez saisir un prénom';
//     }

//     if (empty($_POST["player_lastname"])) {
//         $errors["player_lastname"] = 'Veuillez saisir un nom';
//     }

//     if (empty($_POST["age"])) {
//         $errors["age"] = 'Veuillez saisir un age';
//     }

//     if (empty($_POST["position"])) {
//         $errors["position"] = 'Veuillez saisir une position';
//     }

//     if (count($errors) == 0) {

        $request = $pdo->prepare('INSERT INTO players (player_firstname, player_lastname, age, position) VALUES (:player_firstname, :player_lastname, :age, :position)');
        $request->execute([
            "player_firstname" => $_POST['player_firstname'],
            "player_lastname" => $_POST['player_lastname'],
            "age" => $_POST['age'],
            "position" => $_POST['position'],
        ]);

        header('Location: admin.php');
    }

?>

<h2 class="text-center mb-5 text-uppercase my-5">Ajouter un joueur</h2>

<div class="d-flex justify-content-center">
    <form action="admin.php" method="post">

        <label for="player_firstname" class="mx-3">Prénom :</label>
        <input type="text" name="player_firstname">

        <label for="player_lastname" class="mx-3">Prénom :</label>
        <input type="text" name="player_lastname">

        <label for="age" class="mx-3">Age :</label>
        <input type="text" name="age">

        <label for="position" class="mx-3">Position :</label>
        <input type="text" name="position">


        <input type="submit" value="AJOUTER" class="mx-3" id="btn-validate">
    </form>
</div>

<div class="my-5 d-flex justify-content-center flex-column align-items-center">
    <p class="text-success text-uppercase">Retour</p>
    <a href="admin.php"><img src="uploads/return.png" width="40px" alt=""></a>
</div>