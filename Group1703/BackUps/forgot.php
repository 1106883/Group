<html>
<head>
</head>
<body>
<form action="" method="POST">
Your Email: <br /><input type="text" name="email" size="30" /><br />
<input type="submit" name="submit" value="Submit" />
</form>
<?php
$email = $_POST['email'];
$submit - $_POST['submit'];

//connect to the db
$connect = mysql_connect ("mysql:host=eu-cdbr-azure-north-d.cloudapp.net", "b52b6c6935c6d2", "26ebeed0", "db1510646_gameshare");
mysql_select_db("forgot", $connect);

if ($submit) {

//check if email exists
$email_check = mysql_query("SELECT * FROM members WHERE email ='".$email."'");
$count = mysql_num_rows(email_check);

if ($count !=0){
//generate a new password
$random = rand(72891, 92729);
$new_password = $random;

//create a copy of the new password
$email_password = $new_password;

//encrypt the new password
$new_password = md5($new_password);

//update the db
mysql_query("update members set password='".$new_password."' WHERE email='".$email."'");

//send the password to the user
$subject = "Login Information";
$message = "Your password has been changed to $email_password";
$from = "From Gameshare RGU";

mail($email, $subject, $message, $from);
}

else{
echo "This email does not exist.";
}

}

?>
</body>
</html>