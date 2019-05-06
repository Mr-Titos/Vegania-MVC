<div class="page-module">
	<script src="<?= WEBROOT ?>assets/api/ajax_json.js" type="text/javascript"></script>
	<table id="produits">
		<tr>
			<td> Nom </td>
			<td> Description </td>
			<td> Catégorie </td>
			<td> Prix </td>
			<td> Panier </td>
		</tr>
		<?php foreach ($prod as $pd) { ?>
			<tr>
				<td> <?= $pd->LibProd ?> </td>
				<td> <?= $pd->DescProd ?> </td>
				<td> <?= $pd->NumCat ?> </td>
				<td> <?= $pd->PrixProd ?> </td>
				<?php $id = $pd->IdProd; ?>
				<td> <button onclick="button_click_<?= $id ?>()">Ajouter</button> </td>
				<script>
					function button_click_<?= $id ?>() {
						ajax_json("<?= WEBROOT ?>assets/api/panier.php?a=add&id=<?= $id ?>", (response) => {
							if (response.status == "error") { console.log(response.description); }
						});
					}
				</script>
			</tr>
		<?php } ?>
	</table>
</div>
