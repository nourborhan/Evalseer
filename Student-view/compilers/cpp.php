<?php
	session_start();
    putenv("PATH=C:\\xampp\\htdocs\\Evalseer\\Student-view\\Dev-Cpp\\MinGW64\\bin");
	$CC="g++";
	$out="a.exe";
	$code=$_POST["code"];
	$input=$_POST["input"];
	$filename_code="main.cpp";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$executable="a.exe";
	$command=$CC." -lm ".$filename_code;	
	$command_error=$command." 2>".$filename_error;


	
	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
	exec("cacls  $executable /g everyone:f"); 
	exec("cacls  $filename_error /g everyone:f");	

	shell_exec($command_error);
	$error=file_get_contents($filename_error);

	if(trim($error)=="")
	{
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
			$output=str_replace("~"," ",$output);
		}
		echo "$output";
		$grade = 100;
		setcookie("compilinggrade", $grade); 
		// $_SESSION["compilinggrade"] = $grade;
   }
	else if(!strpos($error,"error"))
	{
		echo "<pre style='color:red'>$error</pre>";
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
			$output=str_replace("~"," ",$output);
		}
		echo "$output";
		$grade = 100;
		setcookie("compilinggrade", $grade); 
		            
	}
	else
	{
		echo "<pre>$error</pre>";
		$grade = 0;
		setcookie("compilinggrade", $grade); 

	}
	exec("del $filename_code");
	exec("del *.o");
	exec("del *.txt");
	exec("del $executable");
?>
