<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="master.css">
		<style>
		.outer-ul>li {
			height:560px;
		}
	</style>
</head>
<body>
	<div id="main">
		<div class="fill"> 
			<?php include 'menu.php';?>
			<h3 class="title">Παρουσίαση πρωταθλημάτων, ομάδων και παιχτών</h3>
		</div>
		
		<ul class="outer-ul">
			<?php

				$con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);

				if(!$con){
					echo "Error : Unable to open database\n";
					exit;
				}		

				$sql = "SELECT	cmp_name,teamname,firstname,lastname
						FROM	teams,players,competitions,plays_in_cmp,plays_for
						WHERE	competitions.cmp_id=plays_in_cmp.cmp_id
						AND 	players.player_id=plays_for.player_id
						AND 	teams.team_id=plays_in_cmp.team_id
						AND		teams.team_id=plays_for.team_id
						ORDER BY cmp_name,teamname,firstname,lastname";
				$result=pg_query($con,$sql);


				
				while ($row = pg_fetch_assoc($result)) {
					
					if ($previouscmp!=$row["cmp_name"]){
						if($previous==NULL){
					    echo "<li><h4>".$row["cmp_name"]."</h4>\n";
						}
						else{
							echo "</ul></ul></li><li><h4>".$row["cmp_name"]."</h4>\n";
							echo "<ul class='inner-ul'>";
						}
						echo "<ul class='inner-ul'>";
					}
					if ($previous!=$row["teamname"]){
						if($previous==NULL){
					    echo "<li>".$row["teamname"]."</li>\n";
						}
						else{
							echo "</ul><li>".$row["teamname"]."</li>\n";
						}
						echo "<ul class='inner-ul'>";
					}

				    echo "<li>".$row["firstname"]." ".$row["lastname"]."</li>\n";
				   
				    $previouscmp=$row["cmp_name"];
				    $previous=$row["teamname"];
				}

				pg_free_result($result);
			?>
		</ul>
	
	</div>
</body>
</html>