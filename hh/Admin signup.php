<html>
<head>
<meta charset="UTF-8">
<title> DO IT - SPORTS CLUBS</title>
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

<tr>
<td colspan="2" align="center">
	<h2>Admin Sign up</h2>
</td>
</tr>
<script type = "text/javascript">
  function validate() {

	 if( document.myForm.UserID.value == "" ) {
		alert( "Please provide User ID!" );
		document.myForm.UserID.focus() ;
		return false;
	 }
	 if( document.myForm.firstname.value == "" ) {
		alert( "Please provide your frist name!" );
		document.myForm.firstname.focus() ;
		return false;
	 }
	 if( document.myForm.lastname.value == "" ) {
		alert( "Please provide your last name!" );
		document.myForm.lastname.focus() ;
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
</script>

<?php
include("connection.php");
if(isset($_POST['signUpsubmit'])) {

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$adminID = $_POST['UserID'];
	$password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

	$q1 = "SELECT * FROM admin WHERE adminID='$adminID'";
	$run = mysqli_query($db, $q1);
	$no1 = mysqli_num_rows($run);
	if($no1 ==1) {
		echo '<p style="color:red;" id="not">This admin is found into system</p>';
			echo '<META HTTP-EQUIV="Refresh" Content="4; URL=Admin signup.php">';
	} else {
		$q2 = "INSERT INTO admin VALUES('$adminID','$firstname', '$lastname',  '$password')";
		$run2 = mysqli_query($db, $q2);
    if(!$run2) echo mysqli_error($db);
		if($run2) {
			$_SESSION['firstname'] = $firstname;
			$_SESSION['lastname'] = $lastname;
			$_SESSION['adminID'] = $adminID;


			echo '<p id="ok">Creating Account Successfully</p>';
			echo '<META HTTP-EQUIV="Refresh" Content="2; URL=admin.php">';
		}
	}


}
?>




<form action="Admin signup.php"  method="post" name = "myForm" onsubmit = "return(validate());">
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
		First Name
	</td>
	<td align="center">
		<input type="text" id="fname" name="firstname" placeholder="Your first name..">
	</td>
</tr>
<tr>
	<td align="right">
		Last Name
	</td>
	<td align="center">
		<input type="text" id="lastname" name="lastname" placeholder="Your last name..">
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
		<input type = "submit" value = "Sign Up" id="UserButton" name='signUpsubmit'  />
</td>
	</tr>
</form>

</table>
</body>
</html>
