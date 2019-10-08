<?php
echo '1';
$username = $_POST['name1'];
$did = $_POST['did'];
if(isset($_POST['sacc'])) 
	{ 
        echo '2';
		accept($username,$did); 
    }
    #if(isset($_POST['srej'])) { 
	#	decline(); 
	#}
    function accept($name,$did){
        echo '3';
        $conn = new mysqli('localhost', 'root', '', 'se_database') 
					or die ('Cannot connect to db');
        $status="Accepted";
        echo $name.$did;
        $sql = "UPDATE book SET Status='".$status."' WHERE Fname='$name' AND DID='$did'";
        if (mysqli_query($conn, $sql)){
            echo "Approved";
            }
        else{
            echo 'declined';
        }

    }
    ?>