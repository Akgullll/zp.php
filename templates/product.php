<?php
include('_inc/classes/Product.php');
include('partials/header.php');

$products = [
    new Product("iPhone", "Smartfón, ktorý zmenil svet mobilných technológií.", 799),
    new Product("iPad", "Tablet, ktorý kombinuje výkon počítača a mobilnú ľahkosť.", 499),
    new Product("MacBook", "Rad počítačov s vysokým výkonom a spoľahlivosťou.", 1299),
    new Product("Apple Watch", "Chytré hodinky s funkciou sledovania zdravia a fitness.", 399),
    new Product("AirPods", "Bezdrôtové slúchadlá pre pohodlné počúvanie hudby a hovorov.", 159),
    new Product("Apple TV", "Mediálny prehrávač pre streamovanie obsahu na televízore.", 149)
];
?>

<main>
    <section class="container">
        <h1>Produkcia Apple</h1>
        <ul>
            <?php foreach ($products as $product): ?>
                <li><strong><?php echo $product->name; ?>:</strong> <?php echo $product->description; ?></li>
            <?php endforeach; ?>
        </ul>
    </section>
    <section class="container">
        <h1>Ceny produktov Apple</h1>
        <table>
            <tr>
                <th>Produkt</th>
                <th>Popis</th>
                <th>Cena (v USD)</th>
            </tr>
            <?php foreach ($products as $product): ?>
                <?php $product->display(); ?>
            <?php endforeach; ?>
        </table>
    </section>
</main>
<?php include_once('partials/footer.php'); ?>


