<!DOCTYPE html>
<html> 
	<body> 		
		<?php
			
			$con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
			
			if(!$con){
				echo "Error : Unable to open database\n";
			}		
			

			if( isset($_POST['submplayer']) ) {
				$playername = pg_escape_string($_POST['playername']);
				$surname = pg_escape_string($_POST['surname']);
				$position = pg_escape_string($_POST['position']);
				$nationality = pg_escape_string($_POST['nationality']);
				$age = (int)$_POST['age'];
				$speed = (int)$_POST['speed'];
				$dribble = (int)$_POST['dribble'];
				$shoot = (int)$_POST['shoot'];
				$defence = (int)$_POST['defence'];
				$pass = (int)$_POST['pass'];
				$team = pg_escape_string($_POST['team']);
				$contract = pg_escape_string($_POST['contract']);
			

				$querypl = "INSERT INTO players (firstname,lastname,position,nation,age,pace,dribbling,shooting,defending,passing)
						  VALUES('" . $playername . "', '" . $surname . "', '" . $position ."', '" . $nationality ."', '" . $age ."', '" . $speed ."', '" . $dribble ."','" . $shoot ."', '" . $defence ."', '" . $pass . "')";
				$resultpl = pg_query($con,$querypl);
				
				if (!$resultpl) {
				$errormessagepl = pg_last_error();
				echo "Error with query: " . $errormessagepl;
				exit();
				}
				else{
					printf ("These values were inserted into the players table - %s %s %s %s %d %d %d %d %d\n", 
						$playername, $surname, $position,$nationality,$age,$speed,$dribble,$defence,$pass);
				}
				if(isset($_POST['team'])){ 
					$query="SELECT * FROM teams WHERE teamname='".$team."'";
					$result=pg_query($con,$query);
					if(pg_fetch_array($result) !== false){
						$querycon= "INSERT INTO plays_for (player_id,team_id,contract_end)
									SELECT last_value,teams.team_id,'".$contract."'
									FROM players_id_seq,teams
									WHERE teams.teamname='".$team."'";
						$resultcon= pg_query($con,$querycon);
						if (!$resultpl) {
						$errormessagepl = pg_last_error();
						echo "Error with query: " . $errormessagepl;
						exit();
						}
						else{
							printf ("These values were inserted into the plays_for table - id of %s %s id of %s %s\n", 
								$playername, $surname, $team,$contract);
						}
					}else { 
						printf ("The team %s doesn't exists on the database\n",$team);
					}
				}
				pg_close();
				

			}
			else if( isset($_POST['submteam']) ) {
				print "sumbited team";
				$teamname = pg_escape_string($_POST['teamname']);
				$foundingyear = (int)$_POST['foundingyear'];
				$city = pg_escape_string($_POST['city']);
				$homestadium = pg_escape_string($_POST['homestadium']);
				

				$queryte = "INSERT INTO teams (teamname,Year,City)
						  VALUES('" . $teamname . "', '" . $foundingyear . "', '" . $city ."')";
				$resultte = pg_query($con,$queryte);//vale thn edra!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				if (!$resultte) {
				$errormessagete = pg_last_error();
				echo "Error with query: " . $errormessagete;
				exit();
				}
				else{
					printf ("These values were inserted into the teams table - %s %d %s\n", $teamname, $foundingyear, $city);
				}
				if(isset($_POST['homestadium'])){
					$query="SELECT * FROM stadiums WHERE sname='".$homestadium."'";
					$result=pg_query($con,$query);
					if(pg_fetch_array($result) !== false){
					$queryst = "INSERT INTO homestadium (team_id,stadium_id)
								SELECT last_value,stadiums.stadium_id
								FROM teams_team_id_seq,stadiums
								WHERE stadiums.sname='".$homestadium."'";
					$resultte = pg_query($con,$queryst);
					if (!$resultte) {
						$errormessagete = pg_last_error();
						echo "Error with query: " . $errormessagete;
						exit();
					}
					else{
						printf ("These values were inserted into the homestadium table - id of team %s id of stadium %s\n", $teamname, $homestadium);
					}
					} else { 
						printf ("The stadium %s doesn't exists on the database\n",$homestadium);
					}
				}
				
				pg_close();

				
			}
			else if(isset($_POST['submstadium'])){
				$stadiumname = pg_escape_string($_POST['stadiumname']);
				$capacity = (int)$_POST['capacity'];
				$queryst = "INSERT INTO stadiums (sname,capacity)
						  VALUES('" . $stadiumname . "', '" . $capacity ."')";
				$resultst = pg_query($con,$queryst);
				if (!$resultst) {
				$errormessagest = pg_last_error();
				echo "Error with query: " . $errormessagest;
				exit();
				}
				printf ("These values were inserted into the stadium table - %s %d\n", $stadiumname, $capacity);
				pg_close();
				
			}
			else if(isset($_POST['submmatch'])){
				$division = pg_escape_string($_POST['division']);
				$hometeam = pg_escape_string($_POST['hometeam']);
				$awayteam = pg_escape_string($_POST['awayteam']);
				$mstadiumname = pg_escape_string($_POST['mstadiumname']);
				$matchdate = pg_escape_string($_POST['matchdate']);
				$FTHG = (int)$_POST['FTHG'];
				$HS = (int)$_POST['HS'];
				$HST = (int)$_POST['HST'];
				$HF = (int)$_POST['HF'];
				$HC = (int)$_POST['HC'];
				$HY = (int)$_POST['HY'];
				$HR = (int)$_POST['HR'];
				$FTAG = (int)$_POST['FTAG'];
				$AS = (int)$_POST['AS'];
				$AST = (int)$_POST['AST'];
				$AF = (int)$_POST['AF'];
				$AC = (int)$_POST['AC'];
				$AY = (int)$_POST['AY'];
				$AR = (int)$_POST['AR'];
				
				$query="SELECT * FROM competitions WHERE cmp_name='".$division."'";
				$resultdiv=pg_query($con,$query);
				$query="SELECT * FROM teams WHERE teamname='".$hometeam."'";
				$resultht=pg_query($con,$query);
				$query="SELECT * FROM teams WHERE teamname='".$awayteam."'";
				$resultat=pg_query($con,$query);
				if(pg_fetch_array($resultdiv) !== false){
					if(pg_fetch_array($resultht) !== false ){
						if(pg_fetch_array($resultat) !== false){
					$query="INSERT INTO matches (competition,matchdate,fthg,ftag,h_s,a_s,hst,ast,hf,af,hc,ac,hy,ay,hr,ar,ht_id,at_id )          
							SELECT cmp_id,'".$matchdate."',".$FTHG.",".$FTAG.",".$HS.",".$AS."
							,".$HST.",".$AST.",".$HF.",".$AF."
							,".$HC.",".$AC.",".$HY.",".$AY.",".$HR.",".$AR."
							,a.team_id,b.team_id                          
							FROM teams a,teams b,competitions                                                                            
							WHERE '".$hometeam."'=a.teamname 
							AND '".$awayteam."'=b.teamname
							AND competitions.cmp_name='".$division."'";
					$result=pg_query($con,$query);
					if (!$result) {
					$errormessagest = pg_last_error();
					echo "Error with query: " . $errormessagest;
					exit();
					}
					printf ("These values were inserted into the matches table - %d %s %s %s %s %d %d %d %d %d %d %d %d %d %d %d %s %s\n", 
							$division,$hometeam,$awayteam,$mstadiumname,$matchdate,$FTHG,$HS,$HST,$HF,$HC,$HY,$HR,$FTAG,$AS,$AST,$AF,$AC,$AY,$AR);
							
						}
						else{
							printf ("The team %s doesn't exists",$hometeam);
						}
					}
					else{
						printf ("The division %s doesn't exists",$awayteam);
					}
				}
				else{
					printf ("The division %s doesn't exists",$division);
				}

			}
		?>			
	</body> 
</html>