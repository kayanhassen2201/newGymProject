<?php session_start(); ?>
<html>
<head>
<meta charset="UTF-8">
<title>DO IT - SPORTS CLUBS</title>
<link href="style1.css" rel="stylesheet" type="text/css">
</head>
<body>

<table id="content" cellpadding="10">
<tr style="border-radius: 20px;">
	<td valign="middle" colspan="2" style="height: 70px;background: #C4C2C2">

	</td>
</tr>
<tr>
<td  align="right">
<img src="imgs/logo1.png" id="logo">
</td>
	<td>
	<h1 align="left">
	DO IT - SPORTS CLUBS </h1>
</td>
</tr>
	<script type = "text/javascript">
      function validate() {

         if( document.myForm.UserID.value == "" ) {
            alert( "Please provide User ID!" );
            document.myForm.UserID.focus() ;
            return false;
         }
         if( document.myForm.Password.value == "" ) {
            alert( "Please provide your Password!" );
            document.myForm.Password.focus() ;
            return false;
         }
			var len = document.myForm.Password.value.length;
		  if(len <8) {
			  alert( "Password must be at least 8 letters!" );
			   document.myForm.Password.focus() ;
			   return false;
		  }

         return( true );
      }
   //-->
</script>

<?php
include("connection.php");
if(isset($_POST['loginsubmit'])) {
	$adminID = $_POST['UserID'];
	$password = $_POST['Password'];
	 $q = "SELECT * FROM admin WHERE adminID='$adminID' ";

	$run = mysqli_query($db, $q);
	$no = mysqli_num_rows($run);

	if($no ==1) {
		$rec = mysqli_fetch_array($run);
		if(password_verify($password, $rec["password"]) && !empty($rec["password"])){
			$_SESSION['adminID'] =  $rec['adminID'];
			$_SESSION['firstname'] = $rec['Fname'];
			$_SESSION['lastname'] = $rec['Lname'];


			echo '<META HTTP-EQUIV="Refresh" Content="1; URL=admin.php">';
			exit();
		} else {
			echo '<p  style="color:red;"id="not">password is not correct</p>';
		}
	} else {
		echo '<p  style="color:red;" id="not">username is not correct</p>';
	}
}
?>


<form action="" method="POST" name = "myForm" onsubmit = "return(validate());">
<tr>
<td colspan="2" align="center">
	<h2>Admin Log-In</h2>
</td>
</tr>
		<tr>
	<td align="right">
		User ID
	</td>
	<td align="center">
		<input type="text" id="UserID" name="UserID" placeholder="Your User ID..">
	</td>
</tr>

<tr>
	<td align="right">
		Password
	</td>
	<td align="center">
		<input type="password" id="Password" name="Password" placeholder="Your  Password..">
	</td>
</tr>
<tr>
	<td colspan="2" align="right">
		<input type = "submit" value = "Log-In" id="UserButton" name="loginsubmit" />
</td>
	</tr>
</form>


</table>


</body>
</html>
