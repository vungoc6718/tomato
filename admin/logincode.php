<?php 
include 'security.php';



if(isset($_POST['login_btn']))
 {

 	$email_login = $_POST['email'];
 	$password_login = $_POST['password'];
 	$username = $_POST['username'];

 	$query = "SELECT * FROM register WHERE email = '$email_login' AND password = '$password_login'";
 	$query_run= mysqli_query($connection,$query);
 	$usertypes = mysqli_fetch_array($query_run);

 	if($usertypes['usertype'] == 'superadmin')
 	{
 		$_SESSION['email'] = $email_login;
 		$_SESSION['username'] = $username;
 		header('Location: index1.php');

 	}
 	else if($usertypes['usertype'] == 'admin')
 	{
 		$_SESSION['email'] = $email_login;
 		$_SESSION['username'] = $username;
 		header('Location: index.php');

 	}
 	else if ($usertypes['usertype'] == 'student') 
 	{
 		# code...
 		$_SESSION['email'] = $email_login;
 		$_SESSION['username'] = $username;
 		header('Location: lich_hocst.php');
 	}
 	else if ($usertypes['usertype'] == 'accountant') 
 	{
 		# code...
 		$_SESSION['email'] = $email_login;
 		$_SESSION['username'] = $username;
 		header('Location: accountant.php');
 	}
 	else if ($usertypes['usertype'] == 'teacher') 
 	{
 		# code...
 		$_SESSION['email'] = $email_login;
 		$_SESSION['username'] = $username;
 		header('Location: diem_danhtc.php');
 	}
 	else if ($usertypes['usertype'] == 'parents') 
 	{
 		# code...
 		$_SESSION['email'] = $email_login;
 		$_SESSION['username'] = $username;
 		header('Location: diem_danh_viewph.php');
 	}
 	else
 	{
 		$_SESSION['status'] = 'Email id / Password is Invalid';
 		header('Location: login.php');
 	}
 }

 ?>