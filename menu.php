<?php
// require_once './functions.php';
// $title = 'Notre menu';
// $lines = file(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'menu.csv');

// foreach ($lines as $k => $line) {
//     $lines[$k] = str_getcsv(trim($line, " \t\n\r\0\x0B,"));
// }
// require './elements/header.php';
?>

<!-- <h1>Menu</h1> -->

<?php // foreach($lines as $line) : ?>
    <?php // if (count($line) === 1):  ?>
        <!-- <h2><?= // $line[0] ?></h2> -->
    <?php // else: ?>
        <!-- <div class="row">
            <div class="col-md-8">
                <p>
                    <strong><?= // $line[0]; ?></strong><br> -->
                    <?= // $line[1]; ?>
                <!-- </p>
            </div>
            <div class="col-md-4">
                <strong>€ <?= // $line[2] ?></strong>
            </div>
        </div> -->
    <?php // endif; ?>
<?php // endforeach; ?>

<?php // require './elements/footer.php'; ?>