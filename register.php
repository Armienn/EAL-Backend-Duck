<?php
if(isset($_POST["user"]) && isset($_POST["pass"])){
	
	$filehandle = fopen("users","r");

	//$filehandle = fopen("users","a");
	//fwrite($filehandle, "writingwriting");
	
	if($filehandle){
		$line;
		
		while($line = fgets($filehandle)){
			$line = trim(explode("=",$line)[0]);
			
			if($line == $_POST["user"]){
				setcookie("user", $_POST["user"]);
				fclose($filehandle);
				header("Location: registerpage.php");
				exit();
			}
		}
		
		fclose($filehandle);
	}
	//user does not already exist
	$filehandle = fopen("users","a");
	fwrite($filehandle, "\n".$_POST["user"]."=".$_POST["pass"]);
	fclose($filehandle);

	header("Location: index.php");
	exit();
}
else{
	header("Location: registerpage.php");
	exit();
}
?>