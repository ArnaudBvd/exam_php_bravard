<?php
include('parts/header.php');
include('utils/connect.php');

$request = $pdo->prepare('SELECT * FROM players');
$request->execute();
$players = $request->fetchAll();

?>
<h1 class="text-center my-5 text-info">Gallerie</h1>
<h2 class="text-center fst-italic">Venez découvrir la future équipe championne du monde !</h2>
<div class="container">
    <div class="d-flex flex-wrap p-3">
        <?php foreach ($players as $player) : ?>
            <div class="col-3 rounded mx-auto d-block border border-info ms-2 mt-3">
                <p class="text-center mt-3">Prénom : <?php echo ($player['player_firstname']) ?></p>
                <p class="text-center">Nom : <?php echo ($player['player_lastname']) ?></p>
                <p class="text-center">Age : <?php echo ($player['age']) ?></p>
                <p class="text-center">Position : <?php echo ($player['position']) ?></p>
                <img src="http:\\localhost\tp_php\<?php echo $player["image"] ?>" class="rounded mx-auto d-block border border-success mb-3" alt="photo_du_joueur" width="100" height="100">
            </div>
        <?php endforeach; ?>
    </div>
</div>