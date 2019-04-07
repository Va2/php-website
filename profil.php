<?php
$headTitle = "Profil";

$name = null;
if (!empty($_GET['action']) && $_GET['action'] === 'deconnecter') {
    unset($_COOKIE['user']);
    // Delete cookie: setcookie() in the past
    setcookie('user', '', time() - 10);
}
if (!empty($_COOKIE['user'])) {
    $name = $_COOKIE['user'];
}
if (!empty($_POST['name'])) {
    setcookie('user', $_POST['name']);
    $name = $_POST['name'];
}
require './elements/header.php';
?>

<?php if ($name): ?>
    <h1>Bonjour <?= htmlentities($name) ?></h1>
    <a href="profil.php?action=deconnecter">Se déconnecter</a>
<?php else: ?>
    <form action="" method="post">
        <div class="form-group">
            <input name="name" class="form-control" placeholder="Entrer votre nom">
        </div>
        <button class="btn btn-primary">Se connecter</button>
    </form>
<?php endif; ?>

<?php require './elements/footer.php'; ?>