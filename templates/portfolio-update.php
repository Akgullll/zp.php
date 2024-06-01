<?php
include('partials/header.php');
include('_inc/classes/Portfolio.php');


// Overenie, či bol zadaný identifikátor produktu v GET parametri
if (isset($_GET['id'])) {
    
    $portfolio = new Portfolio();// Vytvorenie inštancie triedy Portfolio
    $product = $portfolio->getProductById($_GET['id']);// Získanie produktu podľa zadaného identifikátora
    
    // Kontrola, či bol produkt nájdený
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
        echo '<p>Product not found.</p>';//ak produkt nebol nájdený
    }
} else {
    echo '<p>No product specified.</p>';//ak nebol zadaný žiadny produkt
}

include('partials/footer.php');
?>
