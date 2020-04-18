<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="master.css">
</head>
<body>
	<div id="main">
		<div class="fill"> 
			<?php include 'menu.php';?>
			<h3 class="title">Παρουσίαση εθνικοτήτων και παιχτών</h3>
		</div>
		<ul class="outer-ul">
			<?php

				$con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);

				if(!$con){
					echo "Error : Unable to open database\n";
					exit;
				}		

				$sql = "SELECT nation,firstname,lastname,age
				        FROM   players
				        ORDER BY nation,age";
				$result=pg_query($con,$sql);


				
				while ($row = pg_fetch_assoc($result)) {
					
					if ($previous!=$row["nation"]){
						if($previous==NULL){
					    echo "<li><h4>".$row["nation"]."</h4>";
						}
						else{
							echo "</ul></li><li><h4>".$row["nation"]."</h4>";
						}
						echo "<ul class='inner-ul'>";
					}

				    echo "<li>".$row["firstname"]." ".$row["lastname"]." - ".$row["age"]."</li>";
				   
				    $previous=$row["nation"];
				}

				pg_free_result($result);
			?>
		</ul></li>
		</ul>
	</div>
</body>
</html>