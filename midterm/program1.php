<!doctype html>
<html>
	<head>
		<title>Vacation Spot</title>
		<style>
		     @import url("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
             @import url("css/style.css");
        </style>
	</head>

	<body>
	
		<h1>  Winter Vacation Spot </h1>
	
		<form method="POST">
			<div>
				Number of cities to visit: <input type="number" name="cities" placeholder="Enter 1 - 12" min="1">
			</div>
			<div>
				Country to visit: 
				<label><input type="radio" name="country" value="mexico"> Mexico</label>
				<label><input type="radio" name="country" value="norway"> Norway</label>
				<label><input type="radio" name="country" value="both"> Both</label>
			</div>
			
			<div>
				Display cities to visit in alphabetical order:
					<label><input type="radio" required name="order" value="asc">A-Z</label>
					<label><input type="radio" required name="order" value="desc">Z-A</label>
			</div>
			<div>
				<label>Display Images <input type="checkbox" name="images"></label>
			</div>
			<input type="submit" name="display" value="submit"/>
		</form>
		<?php
			$cities['mexico'] = array("acapulco", "cabos", "cancun", "chichenitza", "huatulco","mexico_city");
			$cities['norway'] = array("alesund", "bergen", "hammerfest", "oslo", "stavanger","trondheim");
			if(isset($_POST['display'])){
				if(!isset($_POST['country'])){
					echo "<p style='color:red;font-size:26px';> Please pick a country. </p>";
				}
				elseif(($_POST['cities'] > 6 AND $_POST['country']!='both')){
					echo "<p style='color:red;font-size:26px';> Number of cities must be less than 7 for just one country! </p>";
				}
				elseif($_POST['country']=="both" AND $_POST['cities']<2){
					echo "<p style='color:red;font-size:26px';> Number of cities must be 2 for both Countries! </p>";
				}
				elseif($_POST['cities']>12 AND $_POST['country']=='both'){
					echo "<p style='color:red;font-size:26px';> Number of cities must be less than 12! </p>";
				}
				else{
					$response = array();
					if($_POST['country']!='both')
						$countries = array($_POST['country']);
					else
						$countries = array("mexico","norway");
					$cities_per_country = floor($_POST['cities']/count($countries));
					foreach($countries as $v){
						for($i=0;$i<$cities_per_country;$i++){
							$k = array_rand($cities[$v]);
							$response[] = $cities[$v][$k];
							unset($cities[$v][$k]);
						}
					}
					if($_POST['country']=="both" AND $_POST['cities']%2!=0){
						$random_country = $countries[array_rand($countries)];
						$response[] = $cities[$random_country][array_rand($cities[$random_country])];
					}
					if($_POST['order']=="asc"){
						asort($response);
					} else {
						arsort($response);
					}
					$i = 0;
					echo "<table>";
					foreach($response as $v){
						if($i%2==0){
							echo "<tr>";
						}
						echo "<td>";
						if(isset($_POST['images']))
							echo "<img src='img/".$v.".png'></img><br>";
						echo $v;
						echo "</td>";
						if($i%2){
							echo "</tr>";
						}
						$i++;
					}
					echo "</table>";
				}
			}
		?>
	</body>
</html>