<?php
include('partials/header.php');
include('_inc/classes/Portfolio.php');

if (isset($_GET['id'])) {
    $portfolio = new Portfolio();
    $product = $portfolio->getProductById($_GET['id']);
    if ($product) {
?>

<main>
    <section class="container">
        <div class="product">
            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
            <h2><?php echo $product['name']; ?></h2>
            <p><?php echo $product['description']; ?></p>
        </div>
    </section>
</main>

<?php
    } else {
        echo '<p>Product not found.</p>';
    }
} else {
    echo '<p>No product specified.</p>';
}

include('partials/footer.php');
?>
