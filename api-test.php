<?php

//insert your DG access key
$key="";

//insert your DG affiliate
$aff="";

//takes user input
if(!empty($_GET['query'])){

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
			<h1>Search API Test Results</h1>
			
		<form action="" method="get" autocomplete="off">
			
		//passes user input into url as query	
		<input type="text" name="query" class="form-control" placeholder="Search">
		<br />
		<button type="submit">Submit</button>
		</form>


		<?php
		if($search_array['web']['total']>=1) {

		echo "<p>Total Results " . $search_array['web']['total'] . "</p>";

		}

		else {

			echo "<p>No Results for " . $_GET['query'] . "</p>";
		}

		foreach ($search_array['web']['results'] as $key) {
		
			echo '<p><h3>' . $key['title']. '</h3>';
			echo '<a href="' . $key['url'] . '">'. $key['url'] .'</a>' ;
			echo '<br /><strong>' . $key['snippet']. '</strong>';
			echo '<br />' . $key['publication_date'] . '</p>';

		}

		?>


		</body>




</html>  
