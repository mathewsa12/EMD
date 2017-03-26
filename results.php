<?php require_once('config.php');
$data = file_get_contents('php://input');
$qstring = $_GET['d'];
$data1 = urldecode($qstring);
//$myJson = json_decode($data);
//echo $data1;
$disease_arr=explode(",", $data1);
// for($i=0; $i<sizeof($disease_arr);$i++)
// 	echo $disease_arr[$i].PHP_EOL;
// echo $i;

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>EMD - Search your way to death </title>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="materialize/css/materialize.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<nav>
		<div class="nav-wrapper black">
			<a href="#" class="brand-logo">EMD</a>
		</div>
	</nav>
	<div class='container'>
		<div class='row'>
			<div class='col m6 z-depth-1 hoverable sub-panel' id='disease'>
				<div class="row">
					<div class='col m12'>
						<h3>Possible Diseases</h3>
						<?php for($i=0; $i<sizeof($disease_arr); $i++){
							echo "<p class='col m12'>".$disease_arr[$i]."</p>";
						}?>
					</div>
				</div>
			</div>

			<div class='col m6 z-depth-1 hoverable sub-panel'>
				<div class="row">
					<div class='col m6'>
						<button type="button" name="Add" class='waves-effect waves-light btn light-blue'>Purchase Medicines</button>
					</div>
				</div>
			</div>
			<div class='col m6 z-depth-1 hoverable sub-panel' id='maps'>
				
			</div>
		</div>    
	</div>
	
	
	
	
	
<script src="js/jquery-1.11.3.js"></script>
<script src="materialize/js/materialize.js"></script>
<script>


$(document).ready(function(){
	//$('#disease').hide();
	$('select').material_select();
	$('#maps').load('map.php');
 
});

</script>
</body>
</html>