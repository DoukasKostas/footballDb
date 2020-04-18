<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="master.css">
</head>

<body>
    <div id="main">
        <ul class="tab">
        	<?php include 'menu.php';?>
            <li><a href="javascript:void(0)" class="tablinks active" onclick="openForm(event, 'Player')">Παίχτης</a></li>
            <li><a href="javascript:void(0)" class="tablinks" onclick="openForm(event, 'Team')">Ομάδα</a></li>
            <li><a href="javascript:void(0)" class="tablinks" onclick="openForm(event, 'Stadium')">Στάδιο</a></li>
            <li><a href="javascript:void(0)" class="tablinks" onclick="openForm(event, 'Match')">Αγώνας</a></li>
        </ul>
        <div id="Player" class="tabcontent activetab">
            <h3>Παίχτης</h3>
            <form action="Insert.php" name="insplayer" method="post">
                <p>
                    <label for="playername">Όνομα</label>
                    <input type="text" name="playername" />
                </p>
                <p>
                    <label for="surname">Επίθετο</label>
                    <input type="text" name="surname" />
                </p>
                <p>
                    <label for="age">Ηλικία</label>
                    <input type="number" name="age" min="10" max="100" />
                </p>
                <p>
                    <label for="nationality">Εθνικότητα</label>
                    <input type="text" name="nationality" />
                </p>
                <p>
                    <label for="position">Θέση</label>
                    <select name="position">
                        <option value="GK">Τερματοφύλακας</option>
                        <option value="CB">Κεντρικός αμυντικός</option>
                        <option value="LB">Αριστερός πλάγιος αμυντικός</option>
                        <option value="LWB">Αριστερό αμυντικό χαφ</option>
                        <option value="RB">Δεξιός πλάγιος αμυντικός</option>
                        <option value="RWB">Δεξιό αμυντικό χαφ</option>
                        <option value="CM">Κεντρικός μέσος</option>
                        <option value="CDM">Κεντρικός αμυντικός μέσος</option>
                        <option value="CAM">Κεντρικός επιθετικός μέσος</option>
                        <option value="LM">Αριστερός ακραίος μέσος</option>
                        <option value="RM">Δεξιός ακραίος μέσος</option>
                        <option value="ST">Δεύτερος επιθετικός</option>
                        <option value="CF">Κεντρικός επιθετικός</option>
                        <option value="LW">Αριστερός πλάγιος επιθετικός</option>
                        <option value="RW">Δεξιός πλάγιος επιθετικός</option>
                    </select>
                </p>
                <p>
                    <label for="team">Ομάδα</label>
                    <input type="text" name="team" />
                </p>
                <p>
                    <label for="contract">Λήξη Συμβολαίου</label>
                    <input type="date" name="contract" />
                </p>
                <h4>Στατιστικά</h4>
                <p>
                    <label for="speed">Ταχύτητα</label>
                    <input type="number" name="speed" min="0" max="100" />
                </p>
                <p>
                    <label for="shoot">Σούτ</label>
                    <input type="number" name="shoot" min="0" max="100" />
                </p>
                <p>
                    <label for="dribble">Ντρίπλα</label>
                    <input type="number" name="dribble" min="0" max="100" />
                </p>
                <p>
                    <label for="pass">Πάσα</label>
                    <input type="number" name="pass" min="0" max="100" />
                </p>
                <p>
                    <label for="defence">Άμυνα</label>
                    <input type="number" name="defence" min="0" max="100" />
                </p>
                <input type="submit" name="submplayer" value="Υποβολή">
            </form>
        </div>
        <div id="Team" class="tabcontent">
            <h3>Ομάδα</h3>
            <form action="Insert.php" name="insteam" method="post">
                <p>
                    <label for="teamname">Όνομα</label>
                    <input type="text" name="teamname" />
                </p>
                <p>
                    <label for="foundingyear">Έτος Ίδρυσης</label>
                    <input type="number" name="foundingyear" min="1800" max="2016" />
                </p>
                <p>
                    <label for="city">Πόλη</label>
                    <input type="text" name="city" />
                </p>
                <p>
                    <label for="homestadium">Έδρα</label>
                    <input type="text" name="homestadium" />
                </p>
                <input type="submit" name="submteam" value="Υποβολή">
            </form>
        </div>
        <div id="Stadium" class="tabcontent">
            <h3>Στάδιο</h3>
            <form action="Insert.php" name="insstadium" method="post">
                <p>
                    <label for="stadiumname">Όνομα</label>
                    <input type="text" name="stadiumname" />
                </p>
                <p>
                    <label for="capacity">Χωρητικότητα</label>
                    <input type="number" name="capacity" min="0" />
                </p>
                <input type="submit" name="submstadium" value="Υποβολή">
            </form>
        </div>
        <div id="Match" class="tabcontent">
            <h3>Αγώνας</h3>
            <form action="Insert.php" name="insmatch" method="post">
                <p>
                    <label for="division">Πρωτάθλημα</label>
                    <input type="text" name="division" />
                </p>
                <p>
                    <label for="hometeam">Γηπεδούχος Ομάδα</label>
                    <input type="text" name="hometeam" />
                </p>
                <p>
                    <label for="awayteam">Φιλοξενούμενη Ομάδα</label>
                    <input type="text" name="awayteam" />
                </p>
                <p>
                    <label for="mstadiumname">Στάδιο</label>
                    <input type="text" name="mstadiumname" />
                </p>
                <p>
                    <label for="matchdate">Ημερομηνία Αγώνα</label>
                    <input type="date" name="matchdate" />
                </p>
                <h4>Στατιστικά Αγώνα</h4>
                <h5>Στατιστικά Γηπεδούχου</h5>
                <p>
                    <label for="FTHG">Γκολ Γηπεδούχου</label>
                    <input type="number" name="FTHG" min="0" />
                </p>
                <p>
                    <label for="HS">Σούτ Γηπεδούχου</label>
                    <input type="number" name="HS" min="0" />
                </p>
                <p>
                    <label for="HST">Σούτ Στο Τέρμα Γηπεδούχου</label>
                    <input type="number" name="HST" min="0" />
                </p>
                <p>
                    <label for="HF">Φάουλ Γηπεδούχου</label>
                    <input type="number" name="HF" min="0" />
                </p>
                <p>
                    <label for="HC">Κόρνερ Γηπεδούχου</label>
                    <input type="number" name="HC" min="0" />
                </p>
                <p>
                    <label for="HY">Κίτρινες Γηπεδούχου</label>
                    <input type="number" name="HY" min="0" />
                </p>
                <p>
                    <label for="HR">Κόκκινες Γηπεδούχου</label>
                    <input type="number" name="HR" min="0" />
                </p>
                <h5>Στατιστικά Φιλοξενούμενης</h5>
                <p>
                    <label for="FTAG">Γκολ Φιλοξενούμενης</label>
                    <input type="number" name="FTAG" min="0" />
                </p>
                <p>
                    <label for="AS">Σούτ Φιλοξενούμενης</label>
                    <input type="number" name="AS" min="0" />
                </p>
                <p>
                    <label for="AST">Σούτ Στο Τέρμα Φιλοξενούμενης</label>
                    <input type="number" name="AST" min="0" />
                </p>
                <p>
                    <label for="AF">Φάουλ Φιλοξενούμενης</label>
                    <input type="number" name="AF" min="0" />
                </p>
                <p>
                    <label for="AC">Κόρνερ Φιλοξενούμενης</label>
                    <input type="number" name="AC" min="0" />
                </p>
                <p>
                    <label for="AY">Κίτρινες Φιλοξενούμενης</label>
                    <input type="number" name="AY" min="0" />
                </p>
                <p>
                    <label for="AR">Κόκκινες Φιλοξενούμενης</label>
                    <input type="number" name="AR" min="0" />
                </p>
                <input type="submit" name="submmatch" value="Υποβολή" />
            </form>
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
