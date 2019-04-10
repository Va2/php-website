<?php
function dump ($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function nav_item(string $link, string $title, string $linkClass = ''): string {
    $classe = 'nav-item';
    if ($_SERVER['SCRIPT_NAME'] === $link) {
        $classe .= ' active';
    }
    return <<<HTML
    <li class="$classe">
        <a class="$linkClass" href="$link">$title</a>
    </li>
HTML;
}

function nav_menu(string $linkClass = ''): string {
    return
        nav_item('/index.php', 'Accueil', $linkClass) .
        nav_item('/devinette.php', 'Devinette', $linkClass) .
        nav_item('/glace.php', 'Glace', $linkClass) .
        // nav_item('./menu.php', 'Menu', $linkClass) .
        nav_item('./newsletter.php', 'Newsletter', $linkClass) .
        nav_item('./profil.php', 'Profil', $linkClass) .
        nav_item('./age_limitation.php', 'Age check', $linkClass) .
        nav_item('./dashboard.php', 'Dashboard', $linkClass) .
        nav_item('/contact.php', 'Contact', $linkClass);
}

function checkbox (string $name, string $value, array $data): string {
    $attributes = '';

    if (isset($data[$name]) && in_array($value, $data[$name])) {
        $attributes .= 'checked';
    }

    return <<<HTML
        <input type="checkbox" name="{$name}[]" value="$value" $attributes>
HTML;
}

function radio(string $name, string $value, array $data): string {
    $attributes = '';

    if (isset($data[$name]) && $value === $data[$name]) {
        $attributes .= 'checked';
    }

    return <<<HTML
        <input type="radio" name="$name" value="$value" $attributes>
HTML;
}

function select (string $name, $value, array $options): string {
    $html_options = [];

    foreach ($options as $k => $option) {
        $attributes = $k == $value ? 'selected' : '';

        $html_options[] = "<option value='$k' $attributes>$option</option>";
    }
    return "<select class='form-control' name='$name'>" . implode($html_options) . "</select>";
}

function slots_html (array $slots) {
    $sentences = [];

    if (empty($slots)) {
        return '<strong>Fermé</strong>';
    }

    foreach ($slots as $slot) {
        $sentences[] = "de <strong>{$slot[0]}h</strong> à <strong>{$slot[1]}h</strong>";
    }
    return 'ouvert ' . implode(' & ', $sentences);
}

function in_slots (int $hour, array $slots): bool {
    foreach ($slots as $slot) {
        $start = $slot[0];
        $end = $slot[1];

        if ($hour >= $start && $hour < $end) {
            return true;
        }
    }
    return false;
}