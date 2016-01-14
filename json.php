<?php
//insert your DG API Key
$key="";

//insert your DG Affiliate
$aff="";



if(!empty($_GET['query'])){

$api_url = 'https://search.usa.gov/api/v2/search?affiliate='. $aff .'&access_key='. $key .'&query='. urlencode($_GET['query']);

$search_json = file_get_contents($api_url);
$search_array = json_decode($search_json, true);

echo "<pre>";
print_r($search_array);
echo "</pre>";

}



?>
