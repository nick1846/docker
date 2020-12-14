<?php
session_start();
if(!empty($_SESSION['username'])) {
header("Location:home.php");
}
	try{
		$myPDO = new PDO("pgsql:host=postgres;dbname=devops_db","postgres","postgres2020");
		$email = $_POST['email'];
		$password = $_POST['password'];
		if(empty($email)){
			header("Location: index.html");
		}
		$r="md5";
		$hash_password = hash($r,$password);
		$sql = $myPDO->prepare("SELECT * FROM accounts WHERE email=? AND password=? ");
		$sql->execute(array($email, $hash_password));
		$row = $sql->fetch(PDO::FETCH_BOTH);
		if($sql->rowCount()>0){
			 $_SESSION['username'] = $email;
			 header("Location: home.php");
		}else{
			echo "User not exists";
		}
	}catch(PDOException $e){
		echo $e->getMessage();
	}
?>