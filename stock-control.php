<?php

// Author: Laxamana, Prince S.
// Section: WD203
// Date of Last Update: December 3, 2025

declare(strict_types=1);
include 'includes/item-status.php';

$europe_perfumes_stock = [
    'Dior Sauvage' => ['price' => $prices['Dior Sauvage'], 'stock' => $stocks['Dior Sauvage']],
    'Bleu de Chanel' => ['price' => $prices['Bleu de Chanel'], 'stock' => $stocks['Bleu de Chanel']],
    'Acqua di Gio Profumo' => ['price' => $prices['Acqua di Gio Profumo'], 'stock' => $stocks['Acqua di Gio Profumo']]
];

$asia_perfumes_stock = [
    'Issey Miyake L’Eau d’Issey' => ['price' => $prices['Issey Miyake L’Eau d’Issey'], 'stock' => $stocks['Issey Miyake L’Eau d’Issey']],
    'Shiseido Zen' => ['price' => $prices['Shiseido Zen'], 'stock' => $stocks['Shiseido Zen']],
    'Giverny Oriental Night' => ['price' => $prices['Giverny Oriental Night'], 'stock' => $stocks['Shiseido Zen']]
];

$tax = 20;

function get_reorder_message(int $stock = 0): string
{
    return ($stock < 10) ? "Yes" : "No";
}

function get_total_value(int $quantity, float $price): string
{
    return number_format($price * $quantity, 2);
}

function get_tax_due(int $quantity, float $price, int $tax = 0): string
{
    return number_format(($price * $quantity) * ($tax / 100), 2);
}

function display_stock_table($perfume_stock, $tax)
{
    echo "<tr>";
    echo "<th>Product</th>";
    echo "<th>Stock</th>";
    echo "<th>Re-order</th>";
    echo "<th>Total Value</th>";
    echo "<th>Tax Due</th>";
    echo "<tr>";

    foreach ($perfume_stock as $product_name => $data) {
        echo "<tr>";
        echo "<td>" . $product_name . "</td>";
        echo "<td>" . $data['stock'] . "</td>";
        echo "<td>" . get_reorder_message($data['stock']) . "</td>";
        echo "<td>PHP " . get_total_value($data['stock'], $data['price']) . "</td>";
        echo "<td>PHP " . get_tax_due($data['stock'], $data['price'], $tax) . "</td>";
        echo "</tr>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banglu Stocks</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <h1 style="text-align: center; margin: 1em auto 0;">Banglu</h1>
    <h3 style="text-align: center; font-style: italic; margin: 0.5em auto 2em;">STOCK CONTROL</h3>

    <main>
        <table>
            <caption>Europe Perfumes</caption>
            <?= display_stock_table($europe_perfumes_stock, $tax) ?>
        </table>

        <table>
            <caption>Asia Perfumes</caption>
            <?= display_stock_table($asia_perfumes_stock, $tax) ?>
        </table>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>

</html>