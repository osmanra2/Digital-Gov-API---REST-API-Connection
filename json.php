<?php
//insert your DG API Key
$key="";

//insert your DG Affiliate
$aff="";



if(isset($_GET['query'])){

$api_url = 'https://search.usa.gov/api/v2/search?affiliate='. $aff .'&access_key='. $key .'&query='. urlencode($_GET['query']);

$search_json = file_get_contents($api_url);
$search_array = json_decode($search_json, true);

}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Search API Test</title>
	</head>
	
		<body>
			<h1>Search API Test Results for Grants</h1>

		<form action="" method="get" autocomplete="off">
		<input type="text" name="query" class="form-control" placeholder="Search">
		<br />
		<button type="submit">Submit</button>
		</form>


		<?php
		if(isset($search_array)){ 

		echo "<pre>";
		print_r($search_array);
		echo "</pre>";

		}

		?>


		</body>




</html>  
