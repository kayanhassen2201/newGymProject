<?php
            include("connection.php");
            if (isset($_POST['submitAddition'])){
                $name=$_POST['Name'];
                $des=$_POST['description'];
                $sub=$_POST['URL'];
                $logo=$_POST['logo'];
                $locurl=$_POST['LocURL'];
                $loc=$_POST['Location'];
                 $id1=$_GET["id"];
                $query=$sql = "UPDATE gym_info SET name='$name' , description='$des' , subscribe='$sub', photo='$logo' , location='$locurl' ,loc='  $loc' WHERE id='$id1'";
                if ($p=mysqli_query($db,$query)){
                    echo  '<p id="ok">It has been successfully modified</p>';
                }
                else {
                    echo '<p id="ok" style="background:red;">Failed</p>';
                }
                      }

			?>
<html>
<head>
<meta charset="UTF-8">
<title>Add Gym</title>
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


<table id="content" cellpadding="10">
<tr style="border-radius: 20px;">
	<td valign="middle" colspan="2" style="height: 70px;background: #C4C2C2">
    <form name="myform" method='post'>
      <h1 style="color:#6D089D; text-align:center;">Edit Gym</h1> <br>
            <ul>
              <label for="gym_name" class='add'>Gym Name:</label><br>
            <input type="text" name='Name' class='add'><br>
            <label for="gym_description"class='add' >Gym description:</label><br>
            <textarea name='description' placeholder="Enter gym description here ....." class='add' required rows="7"></textarea><br> <!--hieeght and width-->
            <label for="subscribe_URL" class='add'>Subscription URL:</label><br>
            <input type="text" name='URL' class='add'><br>
            <label for="logo" class='add'>Upload gym's logo:</label><br>
            <input type="file" name='logo' class='add'><br>
             <label for="loc" class='add'>Location in Riyadh:</label><br>
             <input type="text" name='Location' class='add'><br>
             <label for="locationURL" class='add'>Location URL:</label><br>
            <input type="text" name='LocURL' class='add'><br>
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
