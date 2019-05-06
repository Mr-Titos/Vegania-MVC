
<table id="panier">
	<tr>
		<td> Nom </td>
		<td> Prix </td>
		<td> Quantité </td>
		<td> Panier </td>
	</tr>
</table>
<script src="<?= WEBROOT ?>assets/api/ajax_json.js" type="text/javascript"></script>
<script>
	panier = document.getElementById("panier");

	cache = {};

	function detailProduit(id, callback) {
		var produit = cache[id];
		if (produit === undefined) {
			ajax_json("<?= WEBROOT ?>assets/api/produit.php?a=get&id=" + id, (response) => {
				cache[id] = response;
				callback(response);
			});
		} else {
			callback(produit);
		}
	}

	function updatePanierIds(ids) {
		if (ids.length == 0) {
			updatePanierStack([]);
		} else {
			var stack = [];
			var keys = Object.keys(ids);
			keys.forEach((element) => {
				detailProduit(element, (produit) => {
					produit.qte = ids[element];
					stack.push(produit);
					if (stack.length == keys.length) { updatePanierStack(stack); }
				});
			});
		}
	}

	function updatePanierStack(stack) {
		while (panier.rows.length > 1) {
			panier.deleteRow(1);
		}
		stack.sort((a, b) => { return (a.id - b.id); });
		stack.forEach((element) => {
			var row = panier.insertRow(panier.rows.length);

			var cell0 = row.insertCell(row.cells.length);
			var text0 = document.createTextNode(element.libelle);
			cell0.appendChild(text0);

			var cell1 = row.insertCell(row.cells.length);
			var text1 = document.createTextNode(element.prix);
			cell1.appendChild(text1);

			var cell2 = row.insertCell(row.cells.length);
			var input2 = document.createElement('input');
			input2.type = "number";
			input2.id = "panier-input-" + element.id;
			input2.value = element.qte;
			input2.max = 100;
			input2.min = 1;
			input2.step = 1;
			input2.onchange = () => {
				panier.style.backgroundColor = "#AAA";
				ajax_json("<?= WEBROOT ?>assets/api/panier.php?a=set&id=" + element.id + "&value=" + input2.value, (response) => {
					if (response.status == "error") { console.log(response.description); }
					updatePanierIds(response.panier);
				});
			};
			cell2.appendChild(input2);

			var cell3 = row.insertCell(row.cells.length);
			var button3 = document.createElement('button');
			button3.innerHTML = 'Retirer';
			button3.onclick = () => {
				panier.style.backgroundColor = "#AAA";
				ajax_json("<?= WEBROOT ?>assets/api/panier.php?a=rem&id=" + element.id, (response) => {
					if (response.status == "error") { console.log(response.description); }
					updatePanierIds(response.panier);
				});
			};
			cell3.appendChild(button3);
		});
		panier.style.backgroundColor = "#FFF";
	}


	panier.style.backgroundColor = "#AAA";
	ajax_json("<?= WEBROOT ?>assets/api/panier.php", (response) => {
		if (response.status == "error") { console.log(response.description); }
		updatePanierIds(response.panier);
	});
</script>
