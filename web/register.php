<?php
	try{
		$myPDO = new PDO("pgsql:host=postgres;dbname=devops_db","postgres","postgres2020");
		$nickname = $_POST['nickname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		if(!isset($nickname)||empty(
			$email)||empty($password)){
			header("Location: register.html");
		}
		$r="md5";
		$hash_password = hash($r, $password);
		$sql = $myPDO->prepare("INSERT INTO accounts (username, password, email) VALUES (?,?,?)");
		$result = $sql->execute(array($nickname, $hash_password, $email));
		$row = $sql->fetch(PDO::FETCH_BOTH);
		if($result){
			 $_SESSION['username'] = $email;
			 header("Location: index.html");
		}else{
			echo "Something went wrong";
		}
	}catch(PDOException $e){
		echo $e->getMessage();
	}
?>
