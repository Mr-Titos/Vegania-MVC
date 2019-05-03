<?php
foreach($prod['mesproduits'] as $ligne){
	?>
	<a href="<?= WEBROOT."produits/detail/" . $ligne->IdProd ?>" >En voir plus !</a>
	<?php
	var_dump($ligne);
}

?>