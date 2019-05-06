<?php
	session_start();

	function reply_error($description) {
		$response = array();
		$response['status'] = 'error';
		$response['description'] = $description;
		$response['panier'] = $_SESSION['panier'];
		$json = json_encode($response);
		die($json);
	}

	function reply_success() {
		$response = array();
		$response['status'] = 'success';
		$response['panier'] = $_SESSION['panier'];
		$json = json_encode($response);
		die($json);
	}

	$panier_exists = isset($_SESSION['panier']);
	if (!$panier_exists) {
		$_SESSION['panier'] = array();
	}

	$action_exists = isset($_GET['a']);
	if (!$action_exists) {
		reply_success();
	}

	if ($_GET['a'] == "add") {

		$id_exists = isset($_GET['id']);
		if (!$id_exists) {
			reply_error('Item not provided');
		}
	
		$entry_exists = isset($_SESSION['panier'][$_GET['id']]);
		if ($entry_exists) {
			reply_error('Item already in');
		}

		$_SESSION['panier'][$_GET['id']] = 1;
		reply_success();
	}

	if ($_GET['a'] == "rem") {

		$id_exists = isset($_GET['id']);
		if (!$id_exists) {
			reply_error('Item not provided');
		}
	
		$entry_exists = isset($_SESSION['panier'][$_GET['id']]);
		if (!$entry_exists) {
			reply_error('Item not in');
		}

		unset($_SESSION['panier'][$_GET['id']]);
		reply_success();
	}

	if ($_GET['a'] == "set") {

		$id_exists = isset($_GET['id']);
		if (!$id_exists) {
			reply_error('Item not provided');
		}
		
		$entry_exists = isset($_SESSION['panier'][$_GET['id']]);
		if (!$entry_exists) {
			reply_error('Item not in');
		}

		$value_exists = isset($_GET['value']);
		if (!$value_exists) {
			reply_error('Value not provided');
		}

		if (filter_var($_GET['value'], FILTER_VALIDATE_INT) === false) {
			reply_error('Value is not an integer');
		}

		if ($_GET['value'] < 1) {
			reply_error('Value is not positive');
		}

		$_SESSION['panier'][$_GET['id']] = $_GET['value'];
		reply_success();
	}

	reply_error('Unknown action');
?>
