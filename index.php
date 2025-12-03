<?php

// Author: Laxamana, Prince S.
// Section: WD203
// Date of Last Update: November 29, 2025

require 'includes/item-status.php';

// Arrays
$europe_perfumes = [
    ["name" => "Dior Sauvage", "img" => "images/dior_sauvage.jpg", "price" => $prices['Dior Sauvage'], "stock" => $stocks['Dior Sauvage'], "stock_display" => ""],
    ["name" => "Bleu de Chanel", "img" => "images/bleu_chanel.jpg", "price" => $prices['Bleu de Chanel'], "stock" => $stocks['Bleu de Chanel'], "stock_display" => ""],
    ["name" => "Acqua di Gio Profumo", "img" => "images/acqua_di_gio.jpg", "price" => $prices['Acqua di Gio Profumo'], "stock" => $stocks['Acqua di Gio Profumo'], "stock_display" => ""],
];

$asia_perfumes = [
    ["name" => "Issey Miyake L’Eau d’Issey", "img" => "images/issey_miyake.jpg", "price" => $prices['Issey Miyake L’Eau d’Issey'], "stock" => $stocks['Issey Miyake L’Eau d’Issey'], "stock_display" => ""],
    ["name" => "Shiseido Zen", "img" => "images/shiseido_zen.jpg", "price" => $prices['Shiseido Zen'], "stock" => $stocks['Shiseido Zen'], "stock_display" => ""],
    ["name" => "Giverny Oriental Night", "img" => "images/giverny_oriental.jpg", "price" => $prices['Giverny Oriental Night'], "stock" => $stocks['Giverny Oriental Night'], "stock_display" => ""],
];

// Variables and Conditional Statement
$random_num = rand(1, 2);

if ($random_num == 1) {
    $random_selection = $europe_perfumes;
} else {
    $random_selection = $asia_perfumes;
}

$sale_perfume_index = array_rand($random_selection);
$sale_perfume = $random_selection[$sale_perfume_index];

$sale_discount = 0.50;
$sale_price = number_format($sale_perfume['price'] * (1 - $sale_discount), 2);

if ($sale_perfume['stock'] == 0) {
    $sale_stock_display = "Out of Stock";
} else {
    $sale_stock_display = "Stock: " . $sale_perfume['stock'];
}

function display_perfume_items($perfumes)
{
    foreach ($perfumes as $perfume) {

        if ($perfume['stock'] == 0) {
            $stock_display = "Out of Stock";
        } else {
            $stock_display = "Stock: " . $perfume['stock'];
        }

        echo '<div class="perfume-item">';
        echo '<p class="name">' . $perfume['name'] . '</p>';
        echo '<img src="' . $perfume['img'] . '" alt="' . $perfume['name'] . '">';
        echo '<p class="price">PHP ' . number_format($perfume['price'], 2) . '</p>';
        echo '<button>Buy Now</button>';
        echo '<p class="stock">' . $stock_display . '</p>';
        echo '</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banglu</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <h1>Banglu</h1>
    <h3>Welcome to Banglu - Men! Discover signature men’s fragrances across different countries.</h3>

    <main>
        <section class="sale-perfume">
            <h2>Special Sale!</h2>
            <p class="note">Refresh page to see sale changes.</p>

            <p class="name"><?= $sale_perfume['name'] ?></p> <!-- shorthand -->
            <img src="<?= $sale_perfume['img'] ?>" alt="<?= $sale_perfume['name'] ?>">

            <p>Original Price: <span class="original-price">PHP <?= number_format($sale_perfume['price'], 2) ?></span>
            </p>
            <p>Sale Price: <span class="sale-price">PHP <?= $sale_price ?> (<?= $sale_discount * 100 ?>% off)</span></p>

            <p class="stock"><?= $sale_stock_display ?></p>

            <button>Buy Now</button>
        </section>

        <section class="perfume-selection">
            <h2 class="title">Europe</h2>
            <h4 class="subtitle">Iconic European fragrances for men</h4>

            <div class="items">
                <?php display_perfume_items($europe_perfumes) ?>
            </div>
        </section>

        <section class="perfume_selection">
            <h2 class="title">Asia</h2>
            <h4 class="subtitle">Popular Asian fragrances for men</h4>

            <div class="items">
                <?php display_perfume_items($asia_perfumes) ?>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>

</html>