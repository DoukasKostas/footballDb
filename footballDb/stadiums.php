<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="master.css">
	<style>
		.outer-ul>li {
			height:135px;
		}
	</style>
</head>
<body>
	<div id="main"> 
		<div class="fill"> 
			<?php include 'menu.php';?>
			<h3 class="title">Παρουσίαση πόλεων και σταδίων</h3>
		</div>
		<ul class="outer-ul">
			<?php
			
				try {
				$con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
			} Catch (Exception $e) {
				Echo $e->getMessage();
			}
				if(!$con){
					echo "Error : Unable to open database\n";
					exit;
				}		

				$sql = "SELECT city, sname, capacity
				        FROM   teams,stadiums,homestadium
				        WHERE  teams.team_id=homestadium.team_id
				        AND stadiums.stadium_id=homestadium.stadium_id
				        ORDER BY city,capacity DESC";
				$result=pg_query($con,$sql);


				
				while ($row = pg_fetch_assoc($result)) {
					
					if ($previous!=$row["city"]){
						if($previous==NULL){
				    echo "<li><h4>".$row["city"]."</h4>";
					}
					else{
						echo "</ul></li><li><h4>".$row["city"]."</h4>";
					}
					echo "<ul class='inner-ul'>";
				}

			    echo "<li>".$row["sname"]." - ".$row["capacity"]."</li>";
			   
			    $previous=$row["city"];
				}

				pg_free_result($result);
			?>
		</ul></li>
		</ul>
	</div>
</body>
</html>