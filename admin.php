<?php
session_start();
include('parts/header.php');
include('utils/connect.php');

if (!array_key_exists('name', $_SESSION)) {
    header('Location: login.php?message=error-login');
}

$request = $pdo->prepare('SELECT * FROM players');
$request->execute();
$players = $request->fetchAll();


?>

<h1 class="text-center my-5 text-info">Gestion des joueurs</h1>

<div class="container">
    <div class="d-flex justify-content-center flex-column my-5">
        <p class="text-center fs-4">Bienvenue <?php echo ($_SESSION['name']) ?></p>
        <p class="text-center fs-4">Vous êtes dans l'administration des joueurs</p>
        <p class="text-center fs-4">Vous pouvez ajouter, modifier ou supprimer des joueurs de votre liste</p>
    </div>

    <div class="mb-3 mt-4 ms-2 d-flex">
        <form action="addPlayer.php" method="">
            <input type="submit" value="+ AJOUTER JOUEUR" id="btn-add-player">
        </form>
    </div>

    <table>
        <thead class="bg-info">
            <tr>
                <th class="text-uppercase text-light fst-italic fs-4">Prénom</th>
                <th class="text-uppercase text-light fst-italic fs-4">Nom</th>
                <th class="text-uppercase text-light fst-italic fs-4">Age</th>
                <th class="text-uppercase text-light fst-italic fs-4">Position</th>
                <th class="text-uppercase text-light fst-italic fs-4">Photo</th>
                <th class="text-uppercase text-light fst-italic fs-4">Modifier</th>
                <th class="text-uppercase text-light fst-italic fs-4">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($players as $player) : ?>
                <tr>
                    <td class="fs-5"><?php echo $player['player_firstname'] ?></td>
                    <td class="fs-5"><?php echo $player['player_lastname'] ?></td>
                    <td class="fs-5"><?php echo $player['age'] ?></td>
                    <td class="fs-5"><?php echo $player['position'] ?></td>
                    <td><img src="http:\\localhost\tp_php\<?php echo $player["image"] ?>" alt="photo_du_joueur" width="50" height="50"></td>
                    <td><a href="updatePlayer.php?id=<?php echo $player['player_id'] ?>&title=<?php echo $player['player_lastname'] ?>&age=<?php echo $player['age'] ?>"><img src="uploads/edit.png" alt="" width="30px"></a></td>
                    <td><a href="deletePlayer.php?id=<?php echo $player['player_id'] ?>"><img src="uploads/delete.png" alt="" width="30px"></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot class="bg-info">
            <tr>
                <td class="py-2 td_footer"></td>
                <td class="py-2 td_footer"></td>
                <td class="py-2 td_footer"></td>
                <td class="py-2 td_footer"></td>
                <td class="py-2 td_footer"></td>
                <td class="py-2 td_footer"></td>
                <td class="py-2 td_footer"></td>
            </tr>
        </tfoot>
    </table>
</div>