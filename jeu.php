<?php
$nbrToGuess = 150;
$error = null;
$success = null;
$value = null;

if (isset($_GET['number'])) {
    if ($_GET['number'] > $nbrToGuess) {
        $error = "Votre chiffre est trop grand.";
    } elseif ($_GET['number'] < $nbrToGuess) {
        $error = "Votre chiffre est trop petit.";
    } else {
        $success = "Bravo ! Vous avez deviné le bon chiffre : <strong>$nbrToGuess</strong>";
    }
    $value = (int)$_GET['number'];
}

require './header.php';
?>

<?php if ($error) : ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php elseif ($success) : ?>
    <div class="alert alert-success">
        <?= $success ?>
    </div>
<?php endif ?>

<form action="" method="GET">
    <div class="form-group">
        <input type="number" class="form-control" name="number" placeholder="Entre 0 et 1000" value="<?= $value ?>">
    </div>
    <button type="submit" class="btn btn-primary">Deviner</button>
</form>

<?php require './footer.php'; ?>