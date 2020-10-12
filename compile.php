

<?php

	// $languageID=$_POST["language"];
        error_reporting(0);


	if($_FILES["file"]["name"]!="")
	{
		include "compilers/make.php";
	}
	else
	{
		
		include("compilers/cpp.php");
					
	}
?>


