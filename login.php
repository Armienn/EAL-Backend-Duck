<?php
if(isset($_POST["user"]) && isset($_POST["pass"])){
	setcookie("user", $_POST["user"]);
	
	$filehandle = fopen("users","r");

	if($filehandle){
		$line;
		
		while($line = fgets($filehandle)){
			$line = trim($line);
			$comparetext = $_POST["user"]."=".$_POST["pass"];
			if($line == $comparetext){
				fclose($filehandle);
				header("Location: main.php");
				exit();
			}
		}
		
		fclose($filehandle);
	}

	header("Location: index.php");
	exit();
}
else{
	header("Location: index.php");
	exit();
}
?>