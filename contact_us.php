<?php
	$Name = $_POST['Name'];
	$company_name = $_POST['company_name'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];	
	
			
	
	// Database connection
	$conn = new mysqli('localhost','root','','contact_us');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into feedback(Name, company_name, phone, message) values(?, ?, ?, ? )");
		$stmt->bind_param("ssss", $Name, $company_name,$phone, $message);

        $execval = $stmt->execute();
		
		
		echo ("<script LANGUAGE='JavaScript'>
    	window.alert('Succesfully Updated');
    window.location.href='index1.html';
	
    </script>");
	
		$stmt->close();
		$conn->close();
		
		
	
	}

  
    

?>