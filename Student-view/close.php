<?php
session_start();
putenv('PATH'.$_SERVER['PATH']);
$command="start taskkill /F /IM ".$_SESSION['ID']."-".$_SESSION['assignmentid'].".exe /T";
$test=shell_exec($command);

$grade = 0;
setcookie("compilinggrade", $grade); 

setcookie("compilefeedback","compile fail due to infinite loop");



shell_exec("start del ".$_SESSION['ID']."-".$_SESSION['assignmentid'].".cpp && start taskkill /F /IM cmd.exe /T");
shell_exec("start del *.o && start taskkill /F /IM cmd.exe /T");
shell_exec("start del ".$_SESSION['ID']."-".$_SESSION['assignmentid']."-input.txt && start taskkill /F /IM cmd.exe /T");
shell_exec("start del ".$_SESSION['ID']."-".$_SESSION['assignmentid']."-error.txt && start taskkill /F /IM cmd.exe /T");
shell_exec("start del ".$_SESSION['ID']."-".$_SESSION['assignmentid'].".exe && start taskkill /F /IM cmd.exe /T");

echo "hello from the close.cpp <br>";
echo $_COOKIE['compilefeedback']."<br> $test";

// echo "$test";
// echo ("<script>console.log('IM HEEEEEREREEEEEEEE')</script>")

?>