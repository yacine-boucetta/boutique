
<?php require 'assets/template/header.php';
// var_dump( $_SESSION['panier']);
?>

<?php Cart::showCart();?>
<p> <?= Cart::MontantGlobal()?>€</p>
</body>
</html>