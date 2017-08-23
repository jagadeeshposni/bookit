<html>
<head>
<link rel="stylesheet" href="css/blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="css/blueprint/print.css" type="text/css" media="print"> 
<!--[if lt IE 8]>
  <link rel="stylesheet" href="css/blueprint/ie.css" type="text/css" media="screen, projection">
<![endif]-->
<title>Bookit Login </title>
<script type="text/javascript">

function regValidate(){
//alert("hi");
var userName = document.getElementById("regusername").value;
var password = document.getElementById("regpassword1").value;
var password2 = document.getElementById("regpassword2").value;
//alert(userName);
if(!userName.match(/\S/) || !password.match(/\S/) || !password2.match(/\S/)) {
        alert ('Empty values are not allowed');
        return false;
    }
var emailPattern = /[a-z]+@nisum.com/;
if(!userName.match(emailPattern)){
document.getElementById("regSpace").innerHTML = "Please enter valid username !";
return false;
}

	if(document.getElementById("regpassword1").value != document.getElementById("regpassword2").value)
		{
			alert("Passwords do NOT match !");
			return false;
		}


}

</script>
</head>
<body></br>
<center><img src="./images/logo.gif"/></center>
<h1 align="center"> Welcome to BookIt </h1>
<div class="button-container">
<table>
<tr>
<td>
<form name="loginform" method = "POST" action = "validateUser.php">
	<center>
<fieldset>
	<legend>Login </legend>

		<label>Username</label>
			<input type="text" name="username" placeholder="Registered Username"/><br>
		<label>Password</label>
			<input type="password" name="password" placeholder="Registered Password"/><br></br>
		<?php
		if(isset($_GET['info'])) echo '<label class="errorText">Login Failed !</label>';
		
		?>
		</br></br><input type="submit" value="Login" onclick="validate()" class="fsSubmitButton"/></br></br>
	
	</form>
</fieldset>
</td>
<td>
<label>OR</label></center>
</td>
<td>
<form name="registerform" method="POST" onsubmit="return regValidate();" action="registerUser.php">
<center>
<fieldset>
<legend>Register </legend>
<label>Username </label><input placeholder="whatever@nisum.com" type="text" id="regusername" name="regusername"/><br/>
<label>Password </label><input placeholder="desired password" type="password" id="regpassword1" name="regpassword1"/><br/>
<label>Password </label><input placeholder="retype password" type="password" id="regpassword2"/><br/><br/>
<div id="regSpace" class="errorText"></div></br>
<input type="submit" value="Register !" class="fsSubmitButton"/>
</center>
</fieldset>
</form>

</td>
</tr>
</table>
</body>
</html>