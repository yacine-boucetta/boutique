
<?php require 'assets/template/header.php';
var_dump( $_SESSION['panier']);
?>
<p> <?= Cart::MontantGlobal()?>€</p>
</body>
</html>