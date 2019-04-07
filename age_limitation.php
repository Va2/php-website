<?php
$age = null;
if (!empty($_POST['birthday'])) {
    setcookie('birthday', $_POST['birthday']);
    $_COOKIE['birthday'] = $_POST['birthday'];
}

if (!empty($_COOKIE['birthday'])) {
    $birthday = (int)$_COOKIE['birthday'];
    $age = (int)date('Y') - $birthday;
}

require './elements/header.php';
?>

<?php if ($age >= 18): ?>
    <h1>Cette page est réservée aux adultes.</h1>
<?php elseif ($age !== null): ?>
    <div class="alert alert-danger">
        Tu n'as pas l'age requis pour voir cette page. Retourne travailler pour l'école !
    </div>
<?php else: ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="birthday" id="birthday">Page réservée pour les adultes, veuillez entrer votre année de naissance :</label>
            <select name="birthday" class="form-control">
                <?php for($i = 2019; $i > 1919; $i--): ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
<?php endif; ?>


<?php require './elements/footer.php'; ?>