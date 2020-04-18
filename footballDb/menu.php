<!DOCTYPE html>
<html>
<style>
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 20px;
    color: #818181;
    display: block;
    transition: 0.3s
}

.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<body>
<?php include 'credentials.php';?>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index.php">Εισαγωγή</a>
  <a href="delete.php">Διαγραφή</a>
  <a href="players.php">Παρουσίαση πρωταθλημάτων, ομάδων και παιχτών</a>
  <a href="stadiums.php">Παρουσίαση πόλεων και σταδίων</a>
  <a href="nation.php">Παρουσίαση εθνικοτήτων και παιχτών</a>
  <a href="4.php">Απαντήσεις σε ερωτήματα</a>
  
  
</div>


  <span style="font-size: 28px;cursor:pointer;padding: 4.5px 10px;border: 1px solid black; float:left;" onclick="openNav()">&#9776;</span>


<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
</script>
     
</body>
</html> 
