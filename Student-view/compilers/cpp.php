<?php
	session_start();
    putenv("PATH=C:\\xampp\\htdocs\\Evalseer\\Student-view\\Dev-Cpp\\MinGW64\\bin");
	$CC="g++";
	$out=$_SESSION['ID']."-".$_POST['assignmentid'].".exe";
	$code=$_POST["code"];
	$input=$_POST["input"];
	$filename_code=$_SESSION['ID']."-".$_POST['assignmentid'].".cpp";
	$filename_in=$_SESSION['ID']. "-".$_POST['assignmentid']."-input.txt";
	$filename_error=$_SESSION['ID']."-".$_POST['assignmentid']."-error.txt";
	$executable=$_SESSION['ID']."-".$_POST['assignmentid'].".exe";
	$command=$CC." -lm -o ".$_SESSION['ID']."-".$_POST['assignmentid'].".exe ".$filename_code;	
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
		setcookie("compilefeedback", "Your Code Compiled Successfully"); 
		// $_COOKIE[""] = $grade;
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
		setcookie("compilefeedback", "Your Code Compiled Successfully"); 
		
	}
	else
	{
		echo "<pre>$error</pre>";
		$grade = 0;
		setcookie("compilinggrade", $grade); 
		setcookie("compilefeedback", "Your Code Failed to Compile"); 
		
	}
	exec("del $filename_code");
	exec("del *.o");
	exec("del ".$_SESSION['ID']."-".$_SESSION['assignmentid']."-input.txt");
	exec("del ".$_SESSION['ID']."-".$_SESSION['assignmentid']."-error.txt");
	exec("del $executable");
?>
