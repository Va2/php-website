<?php
$headTitle = "Nous contacter";
require_once './config.php';
require_once './functions.php';
date_default_timezone_set('Europe/Paris');
// Get today's hour: $hour
$hour = (int)($_GET['hour'] ?? date('G'));
$day = (int)($_GET['day'] ?? date('N') - 1);
// Get today's time slots: $slots
$slots = SLOTS[$day];
// Get opening status shop
$open = in_slots($hour, $slots);
$color = $open ? 'green' : 'red';
require './header.php';
?>

<div class="row">
    <div class="col-md-8">
        <h3>Nous contactez</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia vel fuga eaque ipsam magnam, enim nemo dicta nulla ab error fugit itaque accusantium mollitia incidunt amet maiores. Explicabo, quam voluptas?</p>
    </div>

    <div class="col-md-4">
        <h3>Horaire d'ouvertures</h3>

        <?php if ($open) : ?>
            <div class="alert alert-success">
                Le magasin sera ouvert.
            </div>
        <?php else : ?>
            <div class="alert alert-danger">
                Le magasin sera fermé.
            </div>
        <?php endif; ?>

        <form action="" method="get">
            <div class="form-group">
                    <?= select('day', $day, DAYS) ?>
            </div>
            <div class="form-group">
                <input class="form-control" type="number" name="hour" value="<?= $hour ?>">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Voir si le magasin sera ouvert</button>
        </form>

        <ul>
            <?php foreach (DAYS as $k => $day) : ?>
                <li>
                    <strong><?= $day ?></strong> :
                    <?= slots_html(SLOTS[$k]); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php require 'footer.php'; ?>