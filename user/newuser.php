

<html>
<head>
<title>College Amenity Booking System || Registration Form</title>
</head>
<script>
        function validateform()
        {
            var a=document.f1.passwordd.value;
            var b=document.f1.password.value;
            if(a==b){
                return true;
            }
            else{
                alert("Password must be same");
                return false;
				
            }
		}
		
    </script>
<body align="center">
<form  method="post" action="register.php" name="f1" onsubmit="return validateform()">
<div class="transbox">
	<p>
    <div class="container">
	

 <U><H2>REGISTRATION FORM</H2></U>
<b>Username</b>&nbsp;&nbsp;<input type="text" placeholder="Enter Username" name="uname" required><br>
<b>Mobile Number</b>&nbsp;&nbsp;<input type="number" placeholder="Enter your mobile number" name="phno" required><br>
	<label ><b>Email Id</b></label>
    <input type="Email" placeholder="Enter email id" name="email" required><br>
    <label ><b>Create Password</b></label>
    <input type="password" placeholder="Enter your Password" name="password"  id="password" class="formcontrol" required><br>
<label ><b>Re-enter Password</b></label>
    <input type="password" placeholder="Re-Enter your Password" name="passwordd" id="passwordd" class="formcontrol" required><br>
    <button type="submit" name="login">Login</button><br>
    
  </div>  
    <button type="button" class ="cancelbtn"><a href="login.php">Cancel</A></button><br>
   
  </div>
  </DIV>
  </P>
</form>

<style>
div.transbox {
  margin: 20px;
  background-color: #ffffff;
  opacity: 0.8;
}

div.transbox p {
  margin: 3%;
  font-weight: strong;
  color: #000000;
}
body{
background-image : url("2.jpg");
background-repeat : no-repeat;
background-position : right;
background-size : 100%;
}

/* Full-width inputs */
input[type=text], input[type=password] ,input[type=number],input[type=Email] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  align:right;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  align:center;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 30%;
  border-radius: 8px;
}

form {
 width:450px;
 padding:1px;
 border-radius:8px;
 align:right;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;





/* Add padding to containers */
.container {
  padding: 8px;
}
</style>


</body>
</html>