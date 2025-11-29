<?php

// Author: Laxamana, Prince S.
// Section: WD203
// Date of Last Update: November 29, 2025

// Arrays
$europe_perfumes = [
    ["name" => "Dior Sauvage", "img" => "images/dior_sauvage.jpg", "price" => 120.00, "stock" => 2, "stock_display" => ""],
    ["name" => "Bleu de Chanel", "img" => "images/bleu_chanel.jpg", "price" => 115.00, "stock" => 0, "stock_display" => ""],
    ["name" => "Acqua di Gio Profumo", "img" => "images/acqua_di_gio.jpg", "price" => 130.00, "stock" => 5, "stock_display" => ""],
];

$asia_perfumes = [
    ["name" => "Issey Miyake L’Eau d’Issey", "img" => "images/issey_miyake.jpg", "price" => 100, "stock" => 3, "stock_display" => ""],
    ["name" => "Shiseido Zen", "img" => "images/shiseido_zen.jpg", "price" => 95.00, "stock" => 7, "stock_display" => ""],
    ["name" => "Giverny Oriental Night", "img" => "images/giverny_oriental.jpg", "price" => 90.00, "stock" => 0, "stock_display" => ""],
];

// Variables and Conditional Statement
$random_num = rand(1,2);

if ($random_num == 1) {
    $random_selection = $europe_perfumes;
} else {
    $random_selection = $asia_perfumes;
}

$sale_perfume_index = array_rand($random_selection);
$sale_perfume = $random_selection[$sale_perfume_index];

$sale_discount = 0.50;
$sale_price = $sale_perfume['price'] * (1 - $sale_discount); // expressions

if ($sale_perfume['stock'] == 0) {
    $sale_stock_display = "Out of Stock";
} else {
    $sale_stock_display = "Stock: " . $sale_perfume['stock'];
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
    <h1>Banglu</h1>
    <h3>Welcome to Banglu - Men! Discover signature men’s fragrances across different countries.</h3>

    <section class="sale-perfume">
        <h2>Special Sale!</h2>
        <p class="note">Refresh page to see sale changes.</p>

        <p class="name"><?= $sale_perfume['name'] ?></p> <!-- shorthand -->
        <img src="<?= $sale_perfume['img'] ?>" alt="<?= $sale_perfume['name'] ?>">
        
        <p>Original Price: <span class="original-price">PHP <?= number_format($sale_perfume['price'], 2) ?></span></p>
        <p>Sale Price: <span class="sale-price">PHP <?= number_format($sale_price, 2) ?> (<?= $sale_discount * 100 ?>% off)</span></p>

        <p class="stock"><?= $sale_stock_display ?></p>

        <button>Buy Now</button>
    </section>

    <section class="perfume_selection">
        <h2 class="title">Europe</h2>
        <h4 class="subtitle">Iconic European fragrances for men</h4>

        <div class="items">
            <?php foreach ($europe_perfumes as $perfume): ?> <!-- foreach loop for less-coding of perfume items -->
                <div class="perfume-item">
                    <p class="name"><?= $perfume['name'] ?></p>
                    <img src="<?= $perfume['img'] ?>" alt="<?= $perfume['name'] ?>">

                    <p class="price">PHP <?= number_format($perfume['price'], 2) ?></p>

                    <button>Buy Now</button>

                    <!-- conditional statement -->
                    <?php
                    if ($perfume['stock'] == 0) {
                        $stock_display = "Out of Stock";
                    } else {
                        $stock_display = "Stock: " . $perfume['stock']; // type juggling and operation
                    }
                    ?>

                    <p class="stock"><?= $stock_display ?></p>
                </div>
            <?php endforeach; ?> <!-- end of foreach loop -->
        </div>
    </section>

    <section class="perfume-selection">
        <h2 class="title">Asia</h2>
        <h4 class="subtitle">Popular Asian fragrances for men</h4>

        <div class="items">
            <?php foreach ($asia_perfumes as $perfume): ?>
                <div class="perfume-item">
                    <p class="name"><?= $perfume['name'] ?></p>
                    <img src="<?= $perfume['img'] ?>" alt="<?= $perfume['name'] ?>">

                    <p class="price">PHP <?= number_format($perfume['price'], 2) ?></p>
                    <button>Buy Now</button>

                    <?php
                    if ($perfume['stock'] == 0) {
                        $stock_display = "Out of Stock";
                    } else {
                        $stock_display = "Stock: " . $perfume['stock'];
                    }
                    ?>

                    <p class="stock"><?= $stock_display ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</body>

</html>