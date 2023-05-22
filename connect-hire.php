<?php
	$service_needed = $_POST['service_needed'];
	$staff_required = $_POST['staff_required'];
	$start_date = $_POST['start_date'];
	$company_name = $_POST['company_name'];
	$companyType = $_POST['companyType'];
	$category = $_POST['category'];
	$phone = $_POST['phone'];	
	$email = $_POST['email'];
	$address = $_POST['address'];	
	$state = $_POST['state'];
	$city = $_POST['city'];
	$pin_code = $_POST['pin_code'];
	
	// Database connection
	$conn = new mysqli('localhost','root','','hire_us');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into company_data(service_needed, staff_required, start_date,company_name,companyType,category,phone, email,address,state,city,pin_code) values(?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssssssss", $service_needed, $staff_required, $start_date, $company_name, $companyType, $category, $phone, $email, $address,  $state, $city,  $pin_code);
		$execval = $stmt->execute();
		// $link = "<script>window.open('http://localhost/php_workspace/HIRE.html')</script>";
		
		// echo $execval;
		
		// echo "<script>alert('submitted successfully!')</script>";
		// $url = 'HIRE.html' ;
		// header( "Location: $url" ) ;

		
		echo ("<script LANGUAGE='JavaScript'>
    	window.alert('Succesfully Registered Your Request');
    window.location.href='index1.html';
	
    </script>");
	
		$stmt->close();
		$conn->close();
		
	
	
	}

?>