<?php
$html = <<<HTML
<!doctype html>
<html>
<head>
<title>Task 2</title>
</head>
<body>
<h5>Team Storm</h5>
HTML;
$results = array();
define("PASS_TEXT", 
	"/^Hello World, this is (\w+\s+)+with HNGi7 ID \d+ using [^\s]+ for stage 2 task$/");
$files = scandir("./scripts");
foreach($files as $i){
	if($i == "." || $i=="..")continue;
	$value = file_get_contents("./scripts/".$i);
	$score = preg_match(PASS_TEXT,$value);
	$results[$i] = $score?"pass":"fail";
}
if (array_key_exists("json",$_GET)){
	$myJSON = json_encode($results);
	header('Content-Type: application/json');
	echo $myJSON;
}
else{
	echo $html;
	foreach($results as $name=>$score){
	if($score){
		echo "<br/>".$name." : PASS";
	}
	else{
		echo "<br/>".$name." :FAIL";
	}
	}
	echo "</body></html>";
}

?>
