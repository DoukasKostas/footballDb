<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="master.css">
</head>

<body>
    <div id="main">
        <ul class="tab">
            <?php include 'menu.php';?>
            <li><a href="javascript:void(0)" class="tablinks <?php if (!(isset($_GET['tsearch'])||isset($_POST['dltteam']))
                                                                   &&  !(isset($_GET['ssearch'])||isset($_POST['dltst']))
                                                                   &&  !(isset($_GET['msearch'])||isset($_POST['dltmtch'])))  echo "active";?>" onclick="openForm(event, 'Player')">Παίχτης</a></li>
            <li><a href="javascript:void(0)" class="tablinks <?php if (isset($_GET['tsearch'])||isset($_POST['dltteam'])) echo "active";?>" onclick="openForm(event, 'Team')">Ομάδα</a></li>
            <li><a href="javascript:void(0)" class="tablinks <?php if (isset($_GET['ssearch'])||isset($_POST['dltst'])) echo "active";?>" onclick="openForm(event, 'Stadium')">Στάδιο</a></li>
            <li><a href="javascript:void(0)" class="tablinks <?php if (isset($_GET['msearch'])||isset($_POST['dltmtch'])) echo "active";?>" onclick="openForm(event, 'Match')">Αγώνας</a></li>
        </ul>
        <div id="Player" class="tabcontent <?php if (!(isset($_GET['tsearch'])||isset($_POST['dltteam']))
                                                 &&  !(isset($_GET['ssearch'])||isset($_POST['dltst']))
                                                 &&  !(isset($_GET['msearch'])||isset($_POST['dltmtch'])))  echo "activetab";?>">
                <form class="searchfrm" action="delete.php" method="get">
                    Όνομα: 
                    <input type="text" name="name" id="name">
                    Επίθετο:
                    <input type="text" name="lastname" id="lastname"><br>
                    <input type="submit" name="psearch" value="Αναζήτηση" style="float:right"/>
                </form>
            <?php 
                
                $con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
                

                if(!$con){
                    echo "Error : Unable to open database\n";
                }       

                echo "<hr style='clear:both'>";
                $query="SELECT  player_id,firstname,lastname,age 
                        FROM    players";
                if(isset($_GET['psearch'])){

                    $name='%'.strtolower(pg_escape_string($_GET['name'])).'%'; 
                    $lname='%'.strtolower(pg_escape_string($_GET['lastname'])).'%'; 
                    if(!empty($name)){
                        $query.= " WHERE lower(firstname) LIKE '".$name."' ";
                        if(!empty($lname)){
                        $query.= " AND lower(lastname) LIKE '".$lname."' ";
                        }
                    }
                    else if(!empty($lname)){
                    $query.= " WHERE lower(lastname) lIKE '".$lname."' ";
                    }
                }
                $result=pg_query($con,$query);
                if( isset($_POST['sb']) ){
                $dl=$_POST['sb'];
                $get= "DELETE FROM players WHERE player_id='$dl'";
                $dltresult = pg_query($con, $get);
                }
                if (pg_num_rows($result) > 0) {
                     echo   "<table><tr>
                            <th>ID</th>
                            <th>ΟΝΟΜΑ</th>
                            <th>ΕΠΩΝΥΜΟ</th>
                            <th>ΗΛΙΚΙΑ</th>
                            <th></th></tr>";
                    while($row = pg_fetch_array($result)) {
                        echo "<tr><td>".$row['player_id']."<td>".$row['firstname']."<td>".$row['lastname']."<td>".$row['age'];
                        echo "<td><form name='delete' id='delete' action='delete.php' method='post'>";
                        echo "<input id='sb'name='sb' type='submit' value='".$row[0]."' class='deletebtn'>
                                                    </form></tr>";
                    }
                }
                else{
                echo "0 results";
                }
                echo "</table>";
                 
                pg_close($con);
            ?>
        </div>
        <div id="Team" class="tabcontent <?php if (isset($_GET['tsearch'])||isset($_POST['dltteam'])) echo "activetab";?>">
                <form class="searchfrm" action="delete.php" method="get">
                    Όνομα Ομάδας: 
                    <input type="text" name="name" id="name"><br>
                    <input type="submit" name="tsearch" value="Αναζήτηση" style="float:right"/>
                </form>
            <?php
                
                $con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
                

                if(!$con){
                    echo "Error : Unable to open database\n";
                }       

                echo "<hr style='clear:both'>";
                $query2="SELECT  team_id,teamname
                        FROM    teams";
                if(isset($_GET['tsearch'])){

                    $name='%'.strtolower(pg_escape_string($_GET['name'])).'%'; 
                    if(!empty($name)){
                        $query2.= " WHERE lower(teamname) LIKE '".$name."' ";
                    }
                }
                $result2=pg_query($con,$query2);
                if( isset($_POST['dltteam']) ){
                $dl=$_POST['dltteam'];
                $get= "DELETE FROM teams WHERE team_id='$dl'";
                $dltresult = pg_query($con, $get);
                }
                if (pg_num_rows($result2) > 0) {
                     echo   "<table><tr>
                            <th>ID</th>
                            <th>ΟΜΑΔΑ</th>
                            <th></th></tr>";
                    while($row = pg_fetch_array($result2)) {
                        echo "<tr><td>".$row['team_id']."<td>".$row['teamname'];
                        echo "<td><form name='delete' id='delete' action='delete.php' method='post'>";
                        echo "<input id='dltteam'name='dltteam' type='submit' value='".$row[0]."' class='deletebtn'>
                                                    </form></tr>";
                    }
                }
                else{
                echo "0 results";
                }
                echo "</table>";
                 
                pg_close($con);
            ?>

        
        </div>
        <div id="Stadium" class="tabcontent <?php if (isset($_GET['ssearch'])||isset($_POST['dltst'])) echo "activetab";?>">
               <form class="searchfrm" action="delete.php" method="get">
                    Όνομα Σταδίου: 
                    <input type="text" name="name" id="name"><br>
                    <input type="submit" name="ssearch" value="Αναζήτηση" style="float:right"/>
                </form>
            <?php 

                $con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
                

                if(!$con){
                    echo "Error : Unable to open database\n";
                }       

                echo "<hr style='clear:both'>";
                $query3="SELECT  stadium_id,sname
                        FROM    stadiums";
                if(isset($_GET['ssearch'])){

                    $name=pg_escape_string($_GET['name']); 
                    $name='%'.strtolower($name).'%';
                    if(!empty($name)){
                        $query3.= " WHERE lower(sname) LIKE '".$name."' ";
                    }
                }
                $result3=pg_query($con,$query3);
                if( isset($_POST['dltst']) ){
                $dl=$_POST['dltst'];
                $get= "DELETE FROM stadiums WHERE stadium_id='$dl'";
                $dltresult = pg_query($con, $get);
                }
                if (pg_num_rows($result3) > 0) {
                     echo   "<table><tr>
                            <th>ID</th>
                            <th>ΟΜΑΔΑ</th>
                            <th></th></tr>";
                    while($row = pg_fetch_array($result3)) {
                        echo "<tr><td>".$row['stadium_id']."<td>".$row['sname'];
                        echo "<td><form name='delete' id='delete' action='delete.php' method='post'>";
                        echo "<input id='dltst' name='dltst' type='submit' value='".$row[0]."' class='deletebtn'>
                                                    </form></tr>";
                    }
                }
                else{
                echo "0 results";
                }
                echo "</table>";
                 
                pg_close($con);
            ?>
          
        </div>
        <div id="Match" class="tabcontent <?php if (isset($_GET['msearch'])||isset($_POST['dltmtch'])) echo "activetab";?>">
                     <form class="searchfrm" action="delete.php" method="get">
                    Γηπεδούχος:
                    <input type="text" name="name1" id="name1">
                    Φιλοξενούμενη:
                    <input type="text" name="name2" id="name2"><br>
                    <input type="submit" name="msearch" value="Αναζήτηση" style="float:right"/>
                </form>
            <?php 
                
                $con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
                

                if(!$con){
                    echo "Error : Unable to open database\n";
                }       

                echo "<hr style='clear:both'>";
                $query4="SELECT  match_id,matchdate,t1.teamname,t2.teamname
                        FROM    matches,teams t1, teams t2
                        WHERE   t1.team_id=ht_id
                        AND     t2.team_id=at_id";
                if(isset($_GET['msearch'])){

                    $name1='%'.strtolower(pg_escape_string($_GET['name1'])).'%'; 
                    $name2='%'.strtolower(pg_escape_string($_GET['name2'])).'%'; 
                    if(!empty($name1)){
                        $query4.= " AND lower(t1.teamname) LIKE '".$name1."' ";
                    }
                    if(!empty($name2)){
                        $query4.= " AND lower(t2.teamname) LIKE '".$name2."' ";
                    }
                }
                $result4=pg_query($con,$query4);
                if( isset($_POST['dltmtch']) ){
                $dl=$_POST['dltmtch'];
                $get= "DELETE FROM matches WHERE match_id='$dl'";
                $dltresult = pg_query($con, $get);
                }
                if (pg_num_rows($result4) > 0) {
                     echo   "<table><tr>
                            <th>ID</th>
                            <th>ΗΜ/ΝΙΑ</th>
                            <th>ΓΗΠΕΔΟΥΧΟΣ</th>
                            <th>ΦΙΛΟΞΕΝΟΥΜΕΝΗ</th>
                            <th></th></tr>";
                    while($row = pg_fetch_array($result4)) {
                        echo "<tr><td>".$row['match_id']."<td>".$row['matchdate']."<td>".$row[2]."<td>".$row[3];
                        echo "<td><form name='delete' id='delete' action='delete.php' method='post'>";
                        echo "<input id='dltmtch' name='dltmtch' type='submit' value='".$row[0]."' class='deletebtn'>
                                                    </form></tr>";
                    }
                }
                else{
                echo "0 results";
                }
                echo "</table>";
                 
                pg_close($con);
            ?>
        </div>
    </div>
        <script>
        function openForm(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        </script>
</body>

</html>
