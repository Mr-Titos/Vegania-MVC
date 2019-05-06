function ajax_json(page, callback) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var response = JSON.parse(this.responseText);
			if (response === undefined) { console.log("Invalid JSON response: " + this.responseText); }
			callback(response);
		}
	};
	xhttp.open("GET", page, true);
	xhttp.send();
}
