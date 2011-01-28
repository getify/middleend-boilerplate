/*!	Middle-End Boilerplate (main.js)
	(c) Kyle Simpson
	MIT License
*/

// Browser UI Controller

function updateResults(data) {
	if (typeof data == "string") data = JSON.parse(data);
	
	if (data.ERROR) {
		$("#results").html(data.ERROR_DATA.error_msg);
	}
	else if (data.APP_STATE) {
		Handlebar.processState(data.APP_STATE,data.APP_DATA)
		.then(function(P){
			$("#results").html(P.value);
		});
	}
}

function init() {	
	
}
