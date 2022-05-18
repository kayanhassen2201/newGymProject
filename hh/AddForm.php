


<html>
<head>
<meta charset="UTF-8">
<title>Add Gym</title>
<link href="style1.css" rel="stylesheet" type="text/css">
</head>
<body>

  <header>
    <nav class="topnav">
      <div class="links">
        <a href="admin.php">HOME</a>

      </div>

    </nav>
  </header>
<body>
<script>
   function validate() {
      	if( document.myForm.Name.value == "" ) {
            alert( "Please provide gym's name!" );
            document.myForm.Name.focus() ;
            return false;
         }
         if( document.myForm.description.value == "" ) {
            alert( "Please provide gym's description!" );
            document.myForm.description.focus() ;
            return false;
         }
         if( document.myForm.URL.value == "" ) {
            alert( "Please provide gym's Subscription URL!" );
            document.myForm.URL.focus() ;
            return false;
         }
         if( document.myForm.logo.value == "" ) {
            alert( "Please Upload gym's logo!" );
            document.myForm.logo.focus() ;
            return false;}

            if( document.myForm.GymLoc.value == "1" ) {
            alert( "Please select gym's location!" );
            document.myForm.GymLoc.focus() ;
            return false;}
            if( document.myForm.LocURL.value == "" ) {
            alert( "Please provide gym's location URL!" );
            document.myForm.LocURL.focus() ;
            return false;
         }
         return( true );
      }
</script>
<table id="content" cellpadding="10">
<tr style="border-radius: 20px;">
	<td valign="middle" colspan="2" style="height: 70px;background: #C4C2C2">
    <form action="" name="myForm" method='post' onsubmit = "return(validate());" enctype="multipart/form-data">
      <h1 style="color:#6D089D; text-align:center;">Add New Gym</h1> <br>
            <ul>
            <label for="gym_name" class='add'>Gym Name:</label><br>
            <input type="text" name='Name' class='add'><br><hr>
            <label for="gym_description"class='add' >Gym description:</label><br>
            <textarea name='description' placeholder="Enter gym description here ....." class='add'></textarea><br> <hr>
            <label for="subscribe_URL" class='add'>Subscription URL:</label><br>
            <input type="text" name='URL' class='add'><br><hr>
            <label for="logo" class='add'>Upload gym's logo:</label><br>
            <input type="file" name='logo' class='add'><br><hr>
             <label for="loc" class='add'>Location in Riyadh:</label>

   <select name="GymLoc" id="GymLoc">
<option value="1">Choose Location</option>
<option type="submit" name="north" value="north">north</option>
<option type="submit" name="south" value="south">south</option>
<option type="submit" name="west" value="west">west</option>
<option type="submit" name="east" value="east">east</option>

</select>

            <br><br><hr> <label for="locationURL" class='add'>Location URL:</label><br>
            <input type="text" name='LocURL' class='add'><br>
            <input type="submit" name="submitAddition" value='Submit Gym' id='submitAddition'>
</ul>
            </form>
	</td>
</tr>


<?php
            include("connection.php");
            if (isset($_POST['submitAddition'])){

                $name=$_POST['Name'];
                $des=$_POST['description'];
                $sub=$_POST['URL'];
                $locurl=$_POST['LocURL'];
                $loc=$_POST['GymLoc'];

                $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES["logo"]["name"]);
                $uploadOk = 1;

                if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
                  $target_f = $target_file;

                } else {
                  $target_f = '';
                }
            

                $query="INSERT into gym_info (name,description,subscribe,photo,location,loc) VALUES
                ('$name','$des','$sub','$target_f','$locurl','$loc')";
                if ($p=mysqli_query($db,$query)){
                    echo  '<p id="ok">Gym has been added successfully</p>';
                }
                else {
                    echo '<p id="ok" style="background:red;">Failed</p>';
                }
                      }

			?>
</table>
</body>
</html>


</table>

</body>
</html>
