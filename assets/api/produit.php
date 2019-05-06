<?php
	$conn = new mysqli('localhost', 'root', 'root', 'vegania');
	if ($conn->connect_error) {
		$error = 'database error: ' . $conn->connect_error;
		error_log($error);
	    die('error: database nope');
	}

	$action_exists = isset($_GET['a']);
	if (!$action_exists) {
		die("error: no action provided");
	}

	if ($_GET['a'] == 'get') {
		$id_exists = isset($_GET['id']);
		if (!$id_exists) {
			die("error: no id provided");
		}

		$escaped = $conn->real_escape_string($_GET['id']);
		$result = $conn->query('SELECT * FROM produits WHERE IdProd = "' . $escaped . '"');
		$produit = array();
		if (!$result) {
		    die('error: id not found');
		}
		if ($result->lengths > 1) {
			$error = 'database error, illegal number of results';
			error_log($error);
		    die('error: database nope');
		}
		$row = $result->fetch_assoc();

		$produit['id'] = $row['IdProd'];
		$produit['categorie'] = $row['NumCat'];
		$produit['libelle'] = $row['LibProd'];
		$produit['prix'] = $row['PrixProd'];
		$produit['description'] = $row['DescProd'];
		
		$result->close();
		$json = json_encode($produit);
		echo($json);
	}

	if ($_GET['a'] == 'list') {
		$result = $conn->query('SELECT IdProd FROM produits');
		$produits = array();
		if (!$result) {
			$error = 'database error, query is false';
			error_log($error);
		    die('error: database nope');
		}
		while ($row = $result->fetch_assoc()) {
			array_push($produits, $row['IdProd']);
		}
		$result->close();
		$json = json_encode($produits);
		echo($json);
	}
?>
