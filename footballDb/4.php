<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="master.css">
</head>
<body>

    <div id="main">
    <ul class="tab">
        <?php include 'menu.php';?>
        <li><a href="javascript:void(0)" class="tablinks <?php if( isset($_POST['q1']) ) echo 'active'; ?>" onclick="openForm(event, '1')">1</a></li>
        <li><a href="javascript:void(0)" class="tablinks <?php if( isset($_POST['q2']) ) echo 'active'; ?>" onclick="openForm(event, '2')">2</a></li>
        <li><a href="javascript:void(0)" class="tablinks <?php if( isset($_POST['q3']) ) echo 'active'; ?>" onclick="openForm(event, '3')">3</a></li>
        <li><a href="javascript:void(0)" class="tablinks <?php if( isset($_POST['q4']) ) echo 'active'; ?>" onclick="openForm(event, '4')">4</a></li>
        <li><a href="javascript:void(0)" class="tablinks <?php if( isset($_POST['q5']) ) echo 'active'; ?>" onclick="openForm(event, '5')">5</a></li>
        <li><a href="javascript:void(0)" class="tablinks <?php if( isset($_POST['q6']) ) echo 'active'; ?>" onclick="openForm(event, '6')">6</a></li>
        <li><a href="javascript:void(0)" class="tablinks <?php if( isset($_POST['q7']) ) echo 'active'; ?>" onclick="openForm(event, '7')">7</a></li>
        <li><a href="javascript:void(0)" class="tablinks <?php if( isset($_POST['q8']) ) echo 'active'; ?>" onclick="openForm(event, '8')">8</a></li>
        <li><a href="javascript:void(0)" class="tablinks <?php if( isset($_POST['q9']) ) echo 'active'; ?>" onclick="openForm(event, '9')">9</a></li>
        <li><a href="javascript:void(0)" class="tablinks <?php if( isset($_POST['q10']) ) echo 'active'; ?>" onclick="openForm(event, '10')">10</a></li>
        <li><a href="javascript:void(0)" class="tablinks <?php if( isset($_POST['q11']) ) echo 'active'; ?>" onclick="openForm(event, '11')">11</a></li>
        <li><a href="javascript:void(0)" class="tablinks <?php if( isset($_POST['q12']) ) echo 'active'; ?>" onclick="openForm(event, '12')">12</a></li>
        <li><a href="javascript:void(0)" class="tablinks <?php if( isset($_POST['q13']) ) echo 'active'; ?>" onclick="openForm(event, '13')">13</a></li>
        <li><a href="javascript:void(0)" class="tablinks <?php if( isset($_POST['q14']) ) echo 'active'; ?>" onclick="openForm(event, '14')">14</a></li>
        <li><a href="javascript:void(0)" class="tablinks <?php if( isset($_POST['q15']) ) echo 'active'; ?>" onclick="openForm(event, '15')">15</a></li>
        <li><a href="javascript:void(0)" class="tablinks <?php if( isset($_POST['q16']) ) echo 'active'; ?>" onclick="openForm(event, '16')">16</a></li>
    </ul>
    <div id="1" class="tabcontent <?php if( isset($_POST['q1']) ) echo 'activetab'; ?>">
        <form action="4.php" name="quer1" method="post">
            <p>
                Παίχτες με ηλικία μεγαλύτερη απο
                <input type="number" name="age" />
            </p>
            <input type="submit" name="q1" value="Αναζήτηση" />
        </form>
        <?php
            $age=pg_escape_string($_POST['age']);
            
            $con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
            
            if(!$con){
                echo "Error : Unable to open database\n";
            }       

            if( isset($_POST['q1']) ){
                echo "<hr>";
                $query="SELECT  firstname,lastname,age 
                        FROM    players
                        WHERE   age>".$age;
                $result=pg_query($con,$query);
                if (pg_num_rows($result) > 0) {
                     echo   "<table><tr>
                            <th>ONOMA</th>
                            <th>EΠΩΝΥΜΟ</th>
                            <th>HΛΙΚΙΑ</th></tr>";
                    while($row = pg_fetch_array($result)) {
                        echo "<tr><td>".$row['firstname']."<td>".$row['lastname']."<td>".$row['age']."</tr>";
                    }
                }
                else{
                echo "0 results";
                }
            echo "</table>";
            }
            pg_close($con);

        ?>
    </div>
    <div id="2" class="tabcontent <?php if( isset($_POST['q2']) ) echo 'activetab'; ?>">
        <form action="4.php" name="quer2" method="post">
            <p>
                Ομάδες του ελληνικού πρωταθλήματος που το στάδιο τους έχει χωρητικότητα μεγαλύτερη από 
                <input type="number" name="S1" /> και μικρότερη από
                <input type="number" name="S2" />
            </p>
            <input type="submit" name="q2" value="Αναζήτηση" />
        </form>
                <?php

            
            
            $s1=pg_escape_string($_POST['S1']);
            $s2=pg_escape_string($_POST['S2']);
            
            $con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
            
            if(!$con){
                echo "Error : Unable to open database\n";
            }       

            if( isset($_POST['q2']) ){
				echo "<hr>";
                $query="SELECT  teamname,sname,capacity
                        FROM    teams,stadiums,homestadium,plays_in_cmp
                        WHERE   plays_in_cmp.cmp_id=2
                        AND     plays_in_cmp.team_id=teams.team_id
                        AND     homestadium.stadium_id=stadiums.stadium_id
                        AND     homestadium.team_id=teams.team_id
                        AND     capacity>".$s1."
                        AND     capacity<".$s2;
                $result=pg_query($con,$query);
                if (pg_num_rows($result) > 0) {
                     echo   "<table><tr>
                            <th>ΟΜΑΔΑ</th>
                            <th>ΣΤΑΔΙΟ</th>
                            <th>ΧΩΡΗΤΙΚΟΤΗΤΑ</th></tr>";
                    while($row = pg_fetch_array($result)) {
                        echo "<tr><td>".$row['teamname']."<td>".$row['sname']."<td>".$row['capacity']."</tr>";
                    }
                }
                else{
                echo "0 results";
                }
            echo "</table>";
            }
            pg_close($con);

        ?>
    </div>
    <div id="3" class="tabcontent <?php if( isset($_POST['q3']) ) echo 'activetab'; ?>">
        <form action="4.php" name="quer3" method="post">
            <p>
                Ομάδες που κέρδισαν τον Πανιώνιο το διάστημα από 
                <input type="date" name="D1" /> ως
                <input type="date" name="D2" />
            </p>
            <input type="submit" name="q3" value="Αναζήτηση" />
        </form>
        <?php

         
            
            $d1=pg_escape_string($_POST['D1']);
            $d2=pg_escape_string($_POST['D2']);

            $con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
            
            if(!$con){
                echo "Error : Unable to open database\n";
            }       

            if( isset($_POST['q3']) ){
				echo "<hr>";
                $query="SELECT  t2.teamname
                        FROM    teams t1,matches,teams t2
                        WHERE   t1.teamname='Πανιώνιος'
                        AND     ht_id=t1.team_id
                        AND     at_id=t2.team_id
                        AND     matchdate>'".$d1."'
                        AND     matchdate<'".$d2."'
                        AND     fthg-ftag<0
                        UNION
                        SELECT  t2.teamname
                        FROM    teams t1,matches,teams t2
                        WHERE   t1.teamname='Πανιώνιος'
                        AND     at_id=t1.team_id
                        AND     ht_id=t2.team_id
                        AND     matchdate>'".$d1."'
                        AND     matchdate<'".$d2."'
                        AND     ftag-fthg<0";
                $result=pg_query($con,$query);

                if (pg_num_rows($result) > 0) {
                     echo   "<table><tr>
                            <th>ΟΜΑΔΑ</th>
                            </tr>";
                    while($row = pg_fetch_array($result)) {
                        echo "<tr><td>".$row['teamname']."</tr>";
                    }
                }
                else{
                echo "0 results";
                }
                echo "</table>";
            }
            pg_close($con);
        ?>
    </div>
    <div id="4" class="tabcontent">
        <p>
          Ο μέσος όρος ηλικίας των παιχτών της κάθε ομάδας.
        </p>
        <?php

            $con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
            
            if(!$con){
                echo "Error : Unable to open database\n";
            }       

            

            $query="SELECT  teamname,avg(age)
                    FROM    teams,plays_for,players
                    WHERE   teams.team_id=plays_for.team_id
                    AND     players.player_id=plays_for.player_id
                    GROUP BY teamname";
            $result=pg_query($con,$query);
				echo "<hr>";
                echo   "<table><tr>
                        <th>ΟΜΑΔΑ</th>
                        <th>Μ.Ο.</th>
                        </tr>";
                while($row = pg_fetch_array($result)) {
                    echo "<tr><td>".$row['teamname']."<td>".number_format($row[1],3)."</tr>";
                }
                
            echo "</table>";
            
            pg_close($con);

        ?>
    </div>
    <div id="5" class="tabcontent <?php if( isset($_POST['q5']) ) echo 'activetab'; ?>">
        <form action="4.php" name="quer5" method="post">
            <p>
                Ομάδες που ιδρύθηκαν πριν από το έτος 
                <input type="number" name="E" />
            </p>
            <input type="submit" name="q5" value="Αναζήτηση" />
        </form>
        <?php
            
            
            $year=pg_escape_string($_POST['E']);
            
            $con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
            if(!$con){
                echo "Error : Unable to open database\n";
            }

            if( isset($_POST['q5']) ){
				echo "<hr>";
                $query="SELECT  teamname,city
                        FROM    teams
                        WHERE   year<".$year;
                $result=pg_query($con,$query);
                if (pg_num_rows($result) > 0) {
                     echo   "<table><tr>
                            <th>ΟΜΑΔΑ</th>
                            <th>ΠΟΛΗ</th></tr>";
                    while($row = pg_fetch_array($result)) {
                        echo "<tr><td>".$row['teamname']."<td>".$row['city']."</tr>";
                    }
                }
                else{
                echo "0 results";
                }
            echo "</table>";
            }
            pg_close($con);
        ?>
    </div>
    <div id="6" class="tabcontent <?php if( isset($_POST['q6']) ) echo 'activetab'; ?>">
        <form action="4.php" name="quer6" method="post">
            <p>
                Η μέση χωρητικότητα γηπέδου των ομάδων που αγωνίζονται στο πρωτάθλημα
                <select name="C">
                      <option value="ENG">Premier league</option>
                      <option value="GR">Superleague</option>
                </select>
            </p>
            <input type="submit" name="q6" value="Αναζήτηση" />
        </form>
        <?php
            
            

            if ($_POST['C']=="ENG")  {$comp=1;}
            if ($_POST['C']=="GR")   {$comp=2;}
            
            $con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
            if(!$con){
                echo "Error : Unable to open database\n";
            }

            if( isset($_POST['q6']) ){
				echo "<hr>";
                $query="SELECT  avg(capacity)
                        FROM    teams,stadiums,homestadium,plays_in_cmp
                        WHERE   plays_in_cmp.cmp_id=".$comp."
                        AND     plays_in_cmp.team_id=teams.team_id
                        AND     homestadium.stadium_id=stadiums.stadium_id
                        AND     homestadium.team_id=teams.team_id";
                $result=pg_query($con,$query);
                if (pg_num_rows($result) > 0) {
                    while($row = pg_fetch_array($result)) {
                        echo "Η μέση χωρητικότητα των γηπέδων είναι: ".$row[0];
                    }
                }
                else{
                echo "0 results";
                }
            echo "</table>";
            }
            pg_close($con);
        ?>
    </div>
    <div id="7" class="tabcontent <?php if( isset($_POST['q7']) ) echo 'activetab'; ?>">
        <form action="4.php" name="quer7" method="post">
            <p>
                 Οι ημερομηνίες των αγώνων που η διαφορά τερμάτων υπέρ του γηπεδούχου ήτανε μεγαλύτερη από 
                 <input type="number" name="G" /> γκολ
            </p>
            <input type="submit" name="q7" value="Αναζήτηση" />
        </form>
        <?php
            
            
            $goal=pg_escape_string($_POST['G']);
            
            $con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
            if(!$con){
                echo "Error : Unable to open database\n";
            }

            if( isset($_POST['q7']) ){
				echo "<hr>";
                $query="SELECT  matchdate
                        FROM    matches
                        WHERE   fthg-ftag>".$goal;
                $result=pg_query($con,$query);
                if (pg_num_rows($result) > 0) {
                     echo   "<table><tr>
                            <th>HM/NIA</th>
                            </tr>";
                    while($row = pg_fetch_array($result)) {
                        echo "<tr><td>".$row['matchdate']."</tr>";
                    }
                }
                else{
                echo "0 results";
                }
            echo "</table>";
            }
            pg_close($con);
        ?>
    </div>
    <div id="8" class="tabcontent">
        <p>
        O αγώνας που μπήκαν τα περισσότερα γκόλ συνολικά
        </p>
        <?php

            
            
           
            $con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
            
            if(!$con){
                echo "Error : Unable to open database\n";
            }       

            

            $query="SELECT  teamname,matchdate,sname
                    FROM    matches,teams,stadiums
                    WHERE   fthg+ftag>0
                    AND     stadiums.stadium_id=matches.stadium_id
                    AND     team_id=ht_id
                    ORDER BY fthg+ftag DESC LIMIT 1";
            $result=pg_query($con,$query);
				echo "<hr>";
                echo   "<table><tr>
                        <th>OMADA</th>
                        <th>HM/NIA</th>
                        <th>ΣΤΑΔΙΟ</th>
                        </tr>";
                while($row = pg_fetch_array($result)) {
                    echo "<tr><td>".$row['teamname']."<td>".$row['matchdate']."<td>".$row['sname']."</tr>";
                }
                
            echo "</table>";
            
            pg_close($con);

        ?>
    </div>
    <div id="9" class="tabcontent <?php if( isset($_POST['q9']) ) echo 'activetab'; ?>">
        <form action="4.php" name="quer9" method="post">
            <p>
                Tο ποσοστό των παιχτών που οι βαθμοί ικανότητας τους αθροιστικά σε ταχύτητα, σουτ και τρίπλα είναι μεγαλύτερη από 
                 <input type="number" name="B" /> 
            </p>
            <input type="submit" name="q9" value="Αναζήτηση" />
        </form>
        <?php
            
            $goal=pg_escape_string($_POST['B']);
            
            $con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
            if(!$con){
                echo "Error : Unable to open database\n";
            }

            if( isset($_POST['q9']) ){
				echo "<hr>";
                $query="SELECT  count(*)
                        FROM    players
                        WHERE   pace+shooting+dribbling>".$goal;
                $result=pg_query($con,$query);
                $query2="SELECT  count(*)
                        FROM    players";
                $result2=pg_query($con,$query2);
                
                   
                   $row = pg_fetch_array($result);
                   $row2 = pg_fetch_array($result2);
                   $res= $row[0]/$row2[0];
                        echo 100*$res."%";
             
          
            }
            pg_close($con);
        ?>
    </div>
    <div id="10" class="tabcontent <?php if( isset($_POST['q10']) ) echo 'activetab'; ?>">
        <form action="4.php" name="quer10" method="post">
            <p>
                Βρείτε τον καλύτερο παίχτη που αγωνίζεται σε θέση επιθετικού στο πρωτάθλημα 
                <select name="C">
                      <option value="ENG">Premier league</option>
                      <option value="GR">Superleague</option>
                </select>
            </p>
            <input type="submit" name="q10" value="Αναζήτηση" />
        </form>
       <?php
            
            
            if ($_POST['C']=="ENG")  {$comp=1;}
            if ($_POST['C']=="GR")   {$comp=2;}
            
            $con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
            if(!$con){
                echo "Error : Unable to open database\n";
            }
            if( isset($_POST['q10']) ){
				echo "<hr>";
                $query="SELECT  firstname,lastname,pace+shooting+dribbling
                        FROM    players,teams,plays_for,plays_in_cmp
                        WHERE   cmp_id=".$comp."
                        AND     plays_in_cmp.team_id=teams.team_id
                        AND     plays_for.team_id=teams.team_id
                        AND     plays_for.player_id=players.player_id
                        ORDER BY pace+shooting+dribbling DESC LIMIT 1";
                $result=pg_query($con,$query);
                if (pg_num_rows($result) > 0) {
                     echo   "<table><tr>
                            <th>ONOMA</th>
                            <th>EΠΩΝΥΜΟ</th>
                            <th>άθροισμα τρίπλας,
                            σουτ και ταχύτητας</th></tr>";
                    while($row = pg_fetch_array($result)) {
                        echo "<tr><td>".$row['firstname']."<td>".$row['lastname']."<td>".$row[2]."</tr>";
                    }
                }
                else{
                echo "0 results";
                }
            echo "</table>";
            }
            pg_close($con);
        ?>
    </div>
    <div id="11" class="tabcontent <?php if( isset($_POST['q11']) ) echo 'activetab'; ?>">
        <form action="4.php" name="quer11" method="post">
            <p>
               Οι ομάδες που δέχτηκαν λιγότερα από       
                <input type="number" name="G" /> γκολ στην έδρα τους
            </p>
            <input type="submit" name="q11" value="Αναζήτηση" />
        </form>
        <?php
          
            
            $goal=pg_escape_string($_POST['G']);
            
            $con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
            if(!$con){
                echo "Error : Unable to open database\n";
            }

            if( isset($_POST['q11']) ){
				echo "<hr>";
                $query="SELECT  teamname
                        FROM    teams,matches
                        WHERE   team_id=ht_id
                        GROUP BY teamname
                        HAVING sum(ftag)<".$goal;
                $result=pg_query($con,$query);
                if (pg_num_rows($result) > 0) {
                     echo   "<table><tr>
                            <th>ΟΜΑΔΑ</th>
                            </tr>";
                    while($row = pg_fetch_array($result)) {
                        echo "<tr><td>".$row['teamname']."</tr>";
                    }
                }
                else{
                echo "0 results";
                }
            echo "</table>";
            }
            pg_close($con);
        ?>
    </div>
    <div id="12" class="tabcontent">
        
            <p>
             Οι ομάδες που έχουν κερδίσει τον Παναθηναϊκό, τον Ολυμπιακό και τον Π.Α.Ο.Κ.
            </p>

        <?php

            
            
           
            $con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
            
            if(!$con){
                echo "Error : Unable to open database\n";
            }       

            

            $query="(SELECT t1.teamname
                    FROM    teams t1,teams t2,matches
                    WHERE   competition=2
                    AND     t1.team_id=ht_id
                    AND     t2.teamname='Ολυμπιακός' 
                    AND     t2.team_id=at_id
                    AND     fthg-ftag>0
                    UNION
                    SELECT  t1.teamname
                    FROM    teams t1,teams t2,matches
                    WHERE   competition=2
                    AND     t1.team_id=at_id
                    AND     t2.teamname='Ολυμπιακός' 
                    AND     t2.team_id=ht_id
                    AND     fthg-ftag<0)
                    INTERSECT
                    (SELECT t1.teamname
                    FROM    teams t1,teams t2,matches
                    WHERE   competition=2
                    AND     t1.team_id=ht_id
                    AND     t2.teamname='Παναθηναϊκός' 
                    AND     t2.team_id=at_id
                    AND     fthg-ftag>0
                    UNION
                    SELECT  t1.teamname
                    FROM    teams t1,teams t2,matches
                    WHERE   competition=2
                    AND     t1.team_id=at_id
                    AND     t2.teamname='Παναθηναϊκός' 
                    AND     t2.team_id=ht_id
                    AND     fthg-ftag<0)
                    INTERSECT
                    (SELECT t1.teamname
                    FROM    teams t1,teams t2,matches
                    WHERE   competition=2
                    AND     t1.team_id=ht_id
                    AND     t2.teamname='Π.Α.Ο.Κ.' 
                    AND     t2.team_id=at_id
                    AND     fthg-ftag>0
                    UNION
                    SELECT  t1.teamname
                    FROM    teams t1,teams t2,matches
                    WHERE   competition=2
                    AND     t1.team_id=at_id
                    AND     t2.teamname='Π.Α.Ο.Κ.' 
                    AND     t2.team_id=ht_id
                    AND     fthg-ftag<0)";
            $result=pg_query($con,$query);
				echo "<hr>";
                echo   "<h3>Superleague 2014-2015</h3>
                        <table><tr>
                        <th>ΟΜΑΔΑ</th>
                        </tr>";
                while($row = pg_fetch_array($result)) {
                    echo "<tr><td>".$row['teamname']."</tr>";
                }
                
            echo "</table>";

            $query="(SELECT t1.teamname
                    FROM    teams t1,teams t2,matches
                    WHERE   competition=3
                    AND     t1.team_id=ht_id
                    AND     t2.teamname='Ολυμπιακός' 
                    AND     t2.team_id=at_id
                    AND     fthg-ftag>0
                    UNION
                    SELECT  t1.teamname
                    FROM    teams t1,teams t2,matches
                    WHERE   competition=3
                    AND     t1.team_id=at_id
                    AND     t2.teamname='Ολυμπιακός' 
                    AND     t2.team_id=ht_id
                    AND     fthg-ftag<0)
                    INTERSECT
                    (SELECT t1.teamname
                    FROM    teams t1,teams t2,matches
                    WHERE   competition=3
                    AND     t1.team_id=ht_id
                    AND     t2.teamname='Παναθηναϊκός' 
                    AND     t2.team_id=at_id
                    AND     fthg-ftag>0
                    UNION
                    SELECT  t1.teamname
                    FROM    teams t1,teams t2,matches
                    WHERE   competition=3
                    AND     t1.team_id=at_id
                    AND     t2.teamname='Παναθηναϊκός' 
                    AND     t2.team_id=ht_id
                    AND     fthg-ftag<0)
                    INTERSECT
                    (SELECT t1.teamname
                    FROM    teams t1,teams t2,matches
                    WHERE   competition=3
                    AND     t1.team_id=ht_id
                    AND     t2.teamname='Π.Α.Ο.Κ.' 
                    AND     t2.team_id=at_id
                    AND     fthg-ftag>0
                    UNION
                    SELECT  t1.teamname
                    FROM    teams t1,teams t2,matches
                    WHERE   competition=3
                    AND     t1.team_id=at_id
                    AND     t2.teamname='Π.Α.Ο.Κ.' 
                    AND     t2.team_id=ht_id
                    AND     fthg-ftag<0)";
            $result=pg_query($con,$query);
            
                echo   "<h3>Superleague 2015-2016</h3>
                        <table><tr>
                        <th>ΟΜΑΔΑ</th>
                        </tr>";
                while($row = pg_fetch_array($result)) {
                    echo "<tr><td>".$row['teamname']."</tr>";
                }
                
            echo "</table>";

            
            pg_close($con);

        ?>
    </div>
    <div id="13" class="tabcontent <?php if( isset($_POST['q13']) ) echo 'activetab'; ?>">
        <form action="4.php" name="quer13" method="post">
            <p>
                 Οι εθνικότητες που αγωνίστηκαν στην ομάδα 
                 <input type="text" name="T" /> 
            </p>
            <input type="submit" name="q13" value="Αναζήτηση" />
        </form>
        <?php
            
            
            $team=pg_escape_string($_POST['T']);
            
            $con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
            if(!$con){
                echo "Error : Unable to open database\n";
            }

            if( isset($_POST['q13']) ){
				echo "<hr>";
                $query="SELECT  DISTINCT nation
                        FROM    players,teams,plays_for
                        WHERE   teamname='".$team."'
                        AND     teams.team_id=plays_for.team_id
                        AND     players.player_id=plays_for.player_id";
                $result=pg_query($con,$query);
                if (pg_num_rows($result) > 0) {
                     echo   "<table><tr>
                            <th>Εθνικότητες</th>
                            </tr>";
                    while($row = pg_fetch_array($result)) {
                        echo "<tr><td>".$row['nation']."</tr>";
                    }
                }
                else{
                echo "0 results";
                }
            echo "</table>";
            }
            pg_close($con);
        ?>
    </div>
    <div id="14" class="tabcontent <?php if( isset($_POST['q14']) ) echo 'activetab'; ?>">
        <form action="4.php" name="quer14" method="post">
            <p>
				 Η βαθμολογική κατάταξη του ελληνικού πρωταθλήματος για το διάστημα από
                 <input type="date" name="D1" /> ως
				 <input type="date" name="D2" />
				 
            </p>
            <input type="submit" name="q14" value="Αναζήτηση" />
        </form>
        <?php
            
            
            $d1=pg_escape_string($_POST['D1']);
			$d2=pg_escape_string($_POST['D2']);
            
            $con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
            if(!$con){
                echo "Error : Unable to open database\n";
            }

            if( isset($_POST['q14']) ){
				echo "<hr>";
                $query="SELECT teamname,count(*)
						FROM teams,matches
						WHERE (team_id=ht_id
						AND (competition=2 OR competition=3)
						AND matchdate>'".$d1."'
						AND matchdate<'".$d2."'
						AND fthg-ftag=0)
						OR (team_id=at_id
						AND (competition=2 OR competition=3)
						AND matchdate>'".$d1."'
						AND matchdate<'".$d2."'
						AND fthg-ftag=0)
						GROUP BY teamname
						ORDER BY teamname";
                $draws=pg_query($con,$query);
				$query="SELECT teamname,count(*)
						FROM teams,matches
						WHERE (team_id=ht_id
						AND (competition=2 OR competition=3)
						AND matchdate>'".$d1."'
						AND matchdate<'".$d2."'
						AND fthg-ftag>0)
						OR (team_id=at_id
						AND (competition=2 OR competition=3)
						AND matchdate>'".$d1."'
						AND matchdate<'".$d2."'
						AND fthg-ftag<0)
						GROUP BY teamname
						ORDER BY teamname";
				$wins=pg_query($con,$query);
				$max=max(pg_num_rows($draws),pg_num_rows($wins));
                if ($max > 0) {
                     echo   "<table><tr>
                            <th>ΟΜΑΔΑ</th>
							<th>Ι</th>
							<th>N</th>
							<th style='text-align:right'>ΒΑΘΜΟΛΟΓΙΑ</th>
                            </tr>";
					$row = pg_fetch_array($draws);
					$row2 = pg_fetch_array($wins);
					$count=0;
                    while($count<30) {
						
						if($row[0]==$row2[0]){
							$score=3*$row2[1]+$row[1];
							echo "<tr><td> {$row[0]} <td> {$row[1]} <td> {$row2[1]} <td style='text-align:right'> {$score}
							</tr>";
							$row = pg_fetch_array($draws);
							$row2 = pg_fetch_array($wins);
						}
						else if ($row[0]!='' && row2[0]==''){
							$score=$row[1];
							echo "<tr><td> {$row[0]}  <td> {$row[1]} <td> 0 <td style='text-align:right'> {$score}
						</tr>";
						$row = pg_fetch_array($draws);
						}
						else if ($row[0]=='' && row2[0]!=''){
							$score=3*$row2[1];
							echo "<tr><td> {$row2[0]} <td> 0 <td> {$row2[1]} <td style='text-align:right'> {$score}
						</tr>";
						$row2 = pg_fetch_array($wins);
						}
						else if (($row[0]<$row2[0])){
							$score=$row[1];
							echo "<tr><td> {$row[0]}  <td> {$row[1]} <td> 0 <td style='text-align:right'> {$score}
						</tr>";
						$row = pg_fetch_array($draws);
						}
						else if (($row[0]>$row2[0])){
							$score=3*$row2[1];
							echo "<tr><td> {$row2[0]} <td> 0 <td> {$row2[1]} <td style='text-align:right'> {$score}
						</tr>";
						$row2 = pg_fetch_array($wins);
						}
						
						if($row[0]=='' && $row2[0]==''){
							$count=45;
						}
						$count++;
                    }
                }
                else{
                echo "0 results";
                }
            echo "</table>";
            }
            pg_close($con);
        ?>
    </div>
    <div id="15" class="tabcontent">
        <p>
                Όλες οι αγγλικές ομάδες που ενώ τελείωσαν το παιχνίδι με λιγότερους παίχτες
                 από την αντίπαλη ομάδα, κατάφεραν τελικά να μην ηττηθούν.
        </p>
        <?php

            
           
            $con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
            
            if(!$con){
                echo "Error : Unable to open database\n";
            }       

            

            $query="SELECT  teamname
                    FROM    teams,matches
                    WHERE   competition=1
                    AND     team_id=ht_id
                    AND     HR>=1
                    AND     fthg-ftag>=0
                    UNION
                    SELECT  teamname
                    FROM    teams,matches
                    WHERE   competition=1
                    AND     team_id=at_id
                    AND     AR>=1
                    AND     ftag-fthg>=0";
            $result=pg_query($con,$query);
				echo "<hr>";
                echo   "<table><tr>
                        <th>ΟΜΑΔΑ</th>
                        </tr>";
                while($row = pg_fetch_array($result)) {
                    echo "<tr><td>".$row['teamname']."</tr>";
                }
                
            echo "</table>";
            
            pg_close($con);

        ?>
    </div>
    <div id="16" class="tabcontent">
        <p>
            Tα ζευγάρια των ομάδων που στους μεταξύ τους
            αγώνες είχαν διαφορετικό αποτέλεσμα σε διαφορετικές διεξαγωγές του πρωταθλήματος
        </p>
        <?php

            
            
           
            $con = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$pass);
            
            if(!$con){
                echo "Error : Unable to open database\n";
            }       

            

            $query="(SELECT  t1.teamname,t2.teamname
                    FROM    teams t1, teams t2,matches
                    WHERE   t1.team_id=ht_id
                    AND     t2.team_id=at_id
                    AND     fthg-ftag>0
                    AND     competition=2
                    INTERSECT 
                    SELECT  t1.teamname,t2.teamname
                    FROM    teams t1, teams t2,matches
                    WHERE   t1.team_id=ht_id
                    AND     t2.team_id=at_id
                    AND     fthg-ftag<=0
                    AND     competition=3)
                    UNION
                    (SELECT  t1.teamname,t2.teamname
                    FROM    teams t1, teams t2,matches
                    WHERE   t1.team_id=ht_id
                    AND     t2.team_id=at_id
                    AND     fthg-ftag=0
                    AND     competition=2
                    INTERSECT 
                    SELECT  t1.teamname,t2.teamname
                    FROM    teams t1, teams t2,matches
                    WHERE   t1.team_id=ht_id
                    AND     t2.team_id=at_id
                    AND     fthg-ftag<>0
                    AND     competition=3)
                    UNION
                    (SELECT  t1.teamname,t2.teamname
                    FROM    teams t1, teams t2,matches
                    WHERE   t1.team_id=ht_id
                    AND     t2.team_id=at_id
                    AND     fthg-ftag<0
                    AND     competition=2
                    INTERSECT 
                    SELECT  t1.teamname,t2.teamname
                    FROM    teams t1, teams t2,matches
                    WHERE   t1.team_id=ht_id
                    AND     t2.team_id=at_id
                    AND     fthg-ftag>=0
                    AND     competition=3)";
            $result=pg_query($con,$query);
				echo "<hr>";
                echo   "<table><tr>
                        <th>ΓΗΠΕΔΟΥΧΟΣ</th>
                        <th>ΦΙΛΟΞΕΝΟΥΜΕΝΗ</th>
                        </tr>";
                while($row = pg_fetch_array($result)) {
                    echo "<tr><td>".$row[0]."<td>".$row[1]."</tr>";
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
