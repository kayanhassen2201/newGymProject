<?php
global $db;
$server = 'localhost';
$user = 'root';
$pass = 'root';
$dbname = 'doit';
$db = mysqli_connect($server,$user,$pass,$dbname);
if(!$db) {
  exit("connection string failed");
}

$ch=$_GET['chosen'];
$str='';

if (ch != 'all'){
  $str ='kayan';
}
else{

  $q ="select * from gym_info";
  $run = mysqli_query($db, $q);
  while($rec = mysqli_fetch_array($run)) {

  $str = '
    <div class="column">
  <div class="content">
  <form method ="get">
              <img src='.$rec["photo"].' alt="" style="width:100%"><hr>
              <p class="table-name">'.$rec["name"].' </p>
                   <h2> Rating:</h2>
      <span class="fa fa-star checked"></span>
      <span class="fa fa-star checked"></span>
      <span class="fa fa-star checked"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
        <p class="table-loc">LOCATION: "'.$rec["loc"].'"</p><br>
        <a href="gym_information_admin.php?id='.$rec['id'].'">veiw details</a><br>

  <a href="deleteScript.php?id='.$rec['id'].'"><i class="fa fa-trash-o" style="font-size:36px;float: right;"></i></a>
  <a href="EditForm.php"><i class="fa fa-edit" style="font-size:36px;float: right;"></i></a>



              </form>
  </div></div>';}
}

echo "$str";
 ?>
