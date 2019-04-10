<?php
function add_view (): void {
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    $daily_file = $file . '-' . date('Y-m-d');
    increment_counter($file);
    increment_counter($daily_file);
}

function increment_counter (string $file): void {
   $counter = 1;
    if (file_exists($file)){
        $counter = (int)file_get_contents($file);
        $counter++;
    }
    file_put_contents($file, $counter);
}

function nbr_views (): string {
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    return file_get_contents($file);
}

function nbr_views_month (int $annee, int $mois): int {
    $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . $annee . '-' . $mois . '-' . '*';
    $files = glob($file);
    $total = 0;
    
    foreach ($files as $file) {
        // $views = (int)file_get_contents($file);
        // $total += $views;
        $total += (int)file_get_contents($file);
    }
    return $total;
}

function nbr_views_details_month (int $annee, int $mois): array {
    // [
    //     [
    //         'year' => 2018,
    //         'month' => 05,
    //         'day' => 02,
    //         'total' => 7
    //     ]
    // ]
    $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . $annee . '-' . $mois . '-' . '*';
    $files = glob($file);
    $visites = [];
    
    foreach ($files as $file) {
        $parties = explode('-', basename($file));
        $visites[] = [
            'annee' => $parties[1],
            'mois' => $parties[2],
            'jour' => $parties[3],
            'visites' => file_get_contents($file)
        ];
    }
    return $visites;
}