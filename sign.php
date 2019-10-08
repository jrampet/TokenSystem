<?php


function newUser()
{
    include 'dbconfig.php';
    $name=$_POST['fname'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['pwd'];
    $prepeat=$_POST['pwdr'];
    echo $username.'insert';
		$sql = "INSERT INTO patient (Name, Gender, DOB,Contact,Email,Username,Password) 
        VALUES ('$name','$gender','$dob','$contact','$email','$username','$password') ";

	if (mysqli_query($conn, $sql)) 
	{
		echo "<h2>Record created successfully!! Redirecting to login page....</h2>";
		header( "Refresh:3; url=cover.php");

	} 
	else
	{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
function checkusername()
{
	include 'dbconfig.php';
	$usn=$_POST['username'];
    $sql= "SELECT * FROM patient WHERE Username = '$usn'";
    echo $usn;

	$result=mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)!=0)
		{
			echo"<b><br>Username already exists!!";
		}
		else if($_POST['pwd']!=$_POST['pwdr'])
		{
			echo"Passwords dont match";
		}
		else if(isset($_POST['signup']))
		{ 
			newUser();
		}

	
}
if(isset($_POST['signup']))
{
	if(!empty($_POST['username']) && !empty($_POST['pwd']) &&!empty($_POST['fname']) &&!empty($_POST['dob'])&& !empty($_POST['gender']) &&!empty($_POST['email']) && !empty($_POST['contact']))
			checkusername();
}
?>