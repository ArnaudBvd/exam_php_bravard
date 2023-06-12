<?php
session_start();
include('parts/header.php');
include('utils/connect.php');


if ($_SERVER["REQUEST_METHOD"] == 'POST') {
$player = (int) $_GET['id'];
$request = $pdo->prepare('DELETE FROM players WHERE player_id = :player_id');
$request->execute([
    "player_id" => $player,    
]);
header('Location: admin.php');


}



?>


<h2 class="text-center mb-5 text-uppercase my-5 text-danger">Supprimer un joueur</h2>

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


        <input type="submit" value="SUPPRIMER" class="mx-3" id="btn-delete">
    </form>
</div>

<div class="my-5 d-flex justify-content-center flex-column align-items-center">
    <p class="text-success text-uppercase">Retour</p>
    <a href="admin.php"><img src="uploads/return.png" width="40px" alt=""></a>
</div>