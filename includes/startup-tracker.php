<?php
add_shortcode( 'startup-tracker', 'startup_tracker' );
function startup_tracker( $atts ) {
    ob_start();
	
	$json = file_get_contents('https://www.companysearchesmadesimple.com/webservices/v2/staticStats/incorporatedStartUpBritain/?apiKey=startUpBritain2012xgst');

	$obj = json_decode($json, true);
	
	echo $obj['results']['thisYearToNow'];
	
    $myvariable = ob_get_clean();
    return $myvariable;
}

?>