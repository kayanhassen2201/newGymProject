<?php
            include("connection.php");
            if (isset($_POST['submitAddition'])){

                $name=$_POST['Name'];
                $des=$_POST['description'];
                $sub=$_POST['URL'];

                $locurl=$_POST['LocURL'];
                $loc=$_POST['Location'];
                 $id1=$_GET["id"];


                $query=$sql = "UPDATE gym_info SET name='$name' , description='$des' , subscribe='$sub' , location='$locurl' ,loc='  $loc' WHERE id='$id1'";
                if ($p=mysqli_query($db,$query)){
                    echo  '<p id="ok">It has been successfully modifiedy</p>';
                }
                else {
                    echo '<p id="ok" style="background:red;">Failed</p>';
                }

                if(!empty($_FILES["logo"]["name"])){

                  $target_dir = "images/";
                  $target_file = $target_dir . basename($_FILES["logo"]["name"]);
                  $uploadOk = 1;

                  if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
                    $target_f = $target_file;

                  } else {
                    $target_f = '';
                  }

                    mysqli_query($db,"UPDATE gym_info SET photo='$target_f' WHERE id='$id1'");
              }
              }

			?>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Gym</title>
<link href="style1.css" rel="stylesheet" type="text/css">
</head>
<body>

<br>
  <header>
    <nav class="topnav">
      <div class="links">
        <a href="admin.php">HOME</a>
      </div>
    </nav>
  </header>

<?php
// Get info of gym
$GYM_ID = $_GET['id'];
$Sql_Gym = mysqli_query($db,"SELECT * FROM  gym_info where id='$GYM_ID'");
$GymData = mysqli_fetch_assoc($Sql_Gym);

$GymName = $GymData['name'];
$GymDesc = $GymData['description'];
$GymSubs = $GymData['subscribe'];
$GymLocationMap = $GymData['location'];
$GymLocRiyadh = $GymData['loc'];
$GymLogo = $GymData['photo'];
?>

<table id="content" cellpadding="10">
<tr style="border-radius: 20px;">
	<td valign="middle" colspan="2" style="height: 70px;background: #C4C2C2">
    <form name="myform" method='post' enctype="multipart/form-data">
      <h1 style="color:#6D089D; text-align:center;">Edit Gym</h1> <br>
            <ul>
            
              <label for="gym_name" class='add'>Gym Name:</label><br>
            <input type="text" value="<?php echo $GymName; ?>" name='Name' class='add'><br>
            <label for="gym_description"class='add' >Gym description:</label><br>
            <textarea name='description' placeholder="Enter gym description here ....." class='add' ><?php echo $GymDesc; ?></textarea><br> <!--hieeght and width-->
            <label for="subscribe_URL" class='add'>Subscription URL:</label><br>
            <input type="text" value="<?php echo $GymSubs; ?>" name='URL' class='add'><br>
            <label for="logo" class='add'>Upload gym's logo:</label><br>
            <div class="logoholder"><img width="100" heigh="100" src="<?php echo $GymLogo; ?>"></div>
            <input type="file" name='logo' class='add'><br>
             <label for="loc" class='add'>Location in Riyadh:</label><br>
             <input type="text" value="<?php echo $GymLocRiyadh; ?>" name='Location' class='add'><br>
             <label for="locationURL" class='add'>Location URL:</label><br>
            <input type="text" value="<?php echo $GymLocationMap; ?>" name='LocURL' class='add'><br>
            <input type="submit" name="submitAddition" value='Submit' id='submitAddition'>
</ul>
            </form>
	</td>
</tr>


</table>
</body>
</html>


</table>

</body>
</html>
