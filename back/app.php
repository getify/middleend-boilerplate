<?php
/*!	Middle-End Boilerplate (app.php)
	(c) Kyle Simpson
	MIT License
*/


$input = file_get_contents("php://stdin");
$REQUEST_DATA = @json_decode($input);

$output = false;
$error_output = false;

if ($REQUEST_DATA) {

	if (isset($REQUEST_DATA->SESSION_ID) && isset($REQUEST_DATA->SESSION_NAME)) {
		session_name($REQUEST_DATA->SESSION_NAME);
		session_id($REQUEST_DATA->SESSION_ID);
	}
	else {
		session_name("PHPSESSIONSROCK");
		session_id(md5(mt_rand().time()));
	}
	session_start();
	$SESSION_CONFIG = array("SESSION_FORCE" => false, "SESSION_ID" => session_id(), "SESSION_NAME" => session_name());
	
	// *********************************************************************************

	$output = array();

	if ($REQUEST_DATA->RELATIVE_REQUEST_PATH == "/") {
		$output["APP_STATE"] = "index";
		$output["APP_DATA"] = $output["APP_DATA"] || array();
	}
	else {
		$error_output = array("APP_STATE" => "error", "ERROR" => "input_error", "ERROR_DATA" => "");
	}
	
}

if (!is_array($output) && !is_array($error_output)) {
	$error_output = array("APP_STATE" => "error", "ERROR" => "internal_error", "ERROR_DATA" => array());
}

if (!empty($error_output)) {
	echo json_encode(array_merge($error_output,$SESSION_CONFIG));
}
else {
	if (empty($output["APP_DATA"])) $output["APP_DATA"] = (object)null;

	echo json_encode(array_merge($output,$SESSION_CONFIG));
}

?>
