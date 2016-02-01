<?php
add_shortcode( 'month-tracker', 'month_tracker' );
function month_tracker( $atts ) {
    ob_start();
	
	$json = file_get_contents('https://www.companysearchesmadesimple.com/webservices/v2/staticStats/incorporatedStartUpBritain/?apiKey=startUpBritain2012xgst');

	$obj = json_decode($json, true);
	
	echo $obj['results']['thisMonthToNow'];
	
    $myvariable = ob_get_clean();
    return $myvariable;
}

?>