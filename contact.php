<?php
$headTitle = "Nous contacter";
require_once './config.php';
require_once './functions.php';
require './header.php';
?>

<div class="row">
    <div class="col-md-8">
        <h3>Nous contactez</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia vel fuga eaque ipsam magnam, enim nemo dicta nulla ab error fugit itaque accusantium mollitia incidunt amet maiores. Explicabo, quam voluptas?</p>
    </div>

    <div class="col-md-4">
        <h3>Horaire d'ouvertures</h3>
        <ul>
            <?php foreach (DAYS as $k => $day): ?>
                <li>
                    <strong><?= $day ?></strong> :
                    <?= slots_html(SLOTS[$k]); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>


<?php require 'footer.php'; ?>