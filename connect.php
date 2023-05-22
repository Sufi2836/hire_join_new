<?php
	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$DOB = $_POST['DOB'];
	$POB = $_POST['POB'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];	
	$aadhar = $_POST['aadhar'];
	$PAN = $_POST['PAN'];
	$Nationality = $_POST['Nationality'];
	$state = $_POST['state'];
	
	$city = $_POST['city'];
	$address = $_POST['address'];
	$pin_code = $_POST['pin_code'];
	$DOJ = $_POST['DOJ'];
	$relocate = $_POST['relocate'];
	// $Resume = $_POST['Resume'];
	$Resume = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$path = "files/".$Resume;
			
	
	// Database connection
	$conn = new mysqli('localhost','root','','join_company');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into employee_details(FirstName, LastName, DOB,POB,gender, phone, email, aadhar,PAN,Nationality,state,city,address,pin_code,DOJ,relocate,Resume) values(?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?,?, ?, ?, ?,?)");
		$stmt->bind_param("sssssssiissssisss", $FirstName, $LastName, $DOB, $POB, $gender, $phone, $email, $aadhar, $PAN, $Nationality, $state, $city, $address,  $pin_code, $DOJ, $relocate,$Resume);

       if($stmt){
            move_uploaded_file($fileTmpName,$path);
            echo "success";
        }
        else{
            echo "error".mysqli_error($conn);
        }
		
		$execval = $stmt->execute();
		
		
		echo ("<script LANGUAGE='JavaScript'>
    	window.alert('Succesfully Registered');
		
    window.location.href='index1.html';
	
    </script>");
	
		$stmt->close();
		$conn->close();
		

	}
    

?>