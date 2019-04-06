<?php
require_once './functions.php';

// COMPOSEZ VOTRE GLACE
// Checkbox
$perfumes = [
    'Vanille' => 2.5,
    'Moka' => 2.5,
    'Chocolat' => 2,
    'Fraise' => 3,
    'Franboise' => 3.5,
    'Melon' => 4
];
// Radio
$cones = [
    'Pot' => 2,
    'Cornet' => 3
];
// Checkbox
$supplements = [
    'Pépites de chocolat' => 1,
    'Chantilly' => 0.5
];

// ICE CREAM - cart (total)
$ingredients = [];
$total = 0;

foreach (['perfume', 'supplement', 'cone'] as $name) {

    if (isset($_GET[$name])) {
        $list = $name . 's';
        $choice = $_GET[$name];

        if (is_array($choice)) {
            foreach ($choice as $value) {
                if (isset($$list[$value])) {
                    $ingredients[] = $value;
                    $total += $$list[$value];
                }
            }
        } else {
            if (isset($$list[$choice])) {
                $ingredients[] = $choice;
                $total += $$list[$choice];
            }
        }
    }
}

$title = "Composer votre glace";

require './header.php';
?>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Votre glace</h3>
                <ul>
                    <?php foreach ($ingredients as $ingredient) : ?>
                        <li><?= $ingredient ?></li>
                    <?php endforeach ?>
                </ul>
                <p>
                    <strong>Prix : € <?= $total ?></strong>
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <h3>Composer votre glace</h3>

        <form action="" method="GET">
            <h4 class="mt-4">Choisissez vos parfums :</h4>
            <?php foreach ($perfumes as $perfume => $price) : ?>
                <div class="checkbox">
                    <label>
                        <?= checkbox('perfume', $perfume, $_GET) ?>
                        <?= $perfume ?> - € <?= $price ?>
                    </label>
                </div>
            <?php endforeach ?>

            <h4 class="mt-4">Cornet ou pot :</h4>
            <?php foreach ($cones as $cone => $price) : ?>
                <div class="checkbox">
                    <label>
                        <?= radio('cone', $cone, $_GET) ?>
                        <?= $cone ?> - € <?= $price ?>
                    </label>
                </div>
            <?php endforeach ?>

            <h4 class="mt-4">Choisissez vos suppléments :</h4>
            <?php foreach ($supplements as $supplement => $price) : ?>
                <div class="checkbox">
                    <label>
                        <?= checkbox('supplement', $supplement, $_GET) ?>
                        <?= $supplement ?> - € <?= $price ?>
                    </label>
                </div>
            <?php endforeach ?>

            <button type="submit" class="btn btn-primary">Composer ma glace</button>
        </form>
    </div>
</div>


<h4 class="mt-4">$_GET</h4>
<pre>
    <?php var_dump($_GET) ?>
</pre>
<h4 class="mt-4">$_POST</h4>
<pre>
    <?php var_dump($_POST) ?>
</pre>

<?php require './footer.php'; ?>