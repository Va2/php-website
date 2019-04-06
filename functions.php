<?php
function nav_item(string $link, string $title, string $linkClass = ''): string
{
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

function nav_menu(string $linkClass = ''): string
{
    return nav_item('/index.php', 'Accueil', $linkClass) . nav_item('/devinette.php', 'Devinette', $linkClass) . nav_item('/contact.php', 'Contact', $linkClass);
}