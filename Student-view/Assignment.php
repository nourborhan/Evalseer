<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
     <title>Evalseer - Assignment</title>    
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/evalico.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Numbered Text Area CSS -->
    <link rel="stylesheet" href="css/jquery-linedtextarea.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Created By Khaled -->
    <link rel="stylesheet" href="css/assignment.css">


    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="host_version"> 

	

    <!-- LOADER -->
	<div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div>
	<!-- END LOADER -->	

   <!-- Start header -->
   <?php  ?>
   <?php
    
    session_start();

    include_once("partials/header.php");
    require_once("../app/model/student-model.php");
    require_once("../app/controller/student-controller.php");
    require_once("../app/view/student-view.php");
    // require_once("../app/view/assignmentclass.php");

    $assignmentclass=new assignment();
    $assignmentclass->gettestcase($_GET['id']);
    $assignmentclass->getgrades($_GET['id']);
    $inputarray=$assignmentclass->getInputvars();
    $outputarray=$assignmentclass->getExpectedoutput();

    $compilingweight=$assignmentclass->getCompilingweight();
    $syntaxweight=$assignmentclass->getSyntaxweight();
    $logicweight=$assignmentclass->getLogicweight();
    $styleweight=$assignmentclass->getStyleweight();
    


    $studentmodel=new Student();
    $studentcontroller=new StudentController($studentmodel);
    $studentview=new StudentView($studentcontroller,$studentmodel);
    
    $studentcontroller->getAssignmentdetails();
    
    $assignment=$studentmodel->getAssignmentdetail();
    
    $assignmentgrade=$assignment->getAssignmentgrade();
    
	if(isset($_POST['Submitcode']))
	{
        if($_POST["assignmentcode"]=="")
        {
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'>
            </script><script> swal('Please Write Your Code','','error');</script>";
        }
        else if($_COOKIE["compilinggrade"]=="")
        {
            echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'>
            </script><script> swal('Please Run Your Code','','error');</script>";
        }
        else
        {
        $studentcontroller->submitAssignment($compilingweight,$syntaxweight,$logicweight,$styleweight,$assignmentgrade);
        }
	}

    
    
    ?>

        <?php

        $stylefeedback = "";
        
        $testcasesinputs="";

        for($i=0;$i<count($inputarray);$i++)
        {
            $testcasesinputs = $testcasesinputs.$inputarray[$i]."~!";
        }

        $_SESSION["testcasesinputs"]= $testcasesinputs;

        // intital function to check variable names (backup func)
        function checkvariablename($filename)
        {
            $handle = fopen($filename, "r");
            if ($handle) {
                while (($line = fgets($handle)) !== false) {
                    // echo $line."<br>";


                        if(strpos($line, '//') !== false || strpos($line, 'main()') !== false)
                        {
                            
                        }
                        else if(strpos($line, '//') == false)
                        {
                            if (strpos($line, 'int ') !== false) {
                                //should apply regex here
                                echo 'true'.'<br>';
                                
                            }
                            if (strpos($line, 'float ') !== false) {
                                //should apply regex here
                                echo 'true'.'<br>';
                            }
                            if (strpos($line, 'double ') !== false) {
                                //should apply regex here
                                echo 'true'.'<br>';
                            }
                            if (strpos($line, 'boolean ') !== false) {
                                //should apply regex here
                                echo 'true'.'<br>';
                            }
                            if (strpos($line, 'char ') !== false) {
                                //should apply regex here
                                echo 'true'.'<br>';
                            }
                        }      
                }
                fclose($handle);
            } else {
                // error opening the file.
                echo "error opening file";
            } 
        }


        $filedata="";
        if(isset($_POST['uploadfile']))
        {
            $target_dir = "uploads/";
            
            
            $ext = pathinfo($_FILES["fileToUpload"]['name'], PATHINFO_EXTENSION);
            
            if($ext=="cpp")
            {
                $target_file = $target_dir . $_SESSION['ID']. "-".$_GET['id'].".".$ext;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                    <script> swal('File Uploaded Successfuly','Please click on submit file to finish submitting','success');
                    </script>
                    ";
                } else {
                    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                    <script> swal('File Failed To Upload','','error');</script>
                    ";
                }
        
                $myfile = fopen("uploads/".$_SESSION['ID']. "-".$_GET['id'].".".$ext, "r") or die("Unable to open file!");
                $filedata = fread($myfile,filesize("uploads/".$_SESSION['ID']. "-".$_GET['id'].".".$ext));
                fclose($myfile);   

                putenv('PATH=' . $_SERVER['PATH']);
                $styleout = array();

                $stylecheck=shell_exec("cd uploads && cpplint ".$_SESSION['ID']."-".$_GET['id'].".".$ext."");

                $stylecheck=explode("\n",$stylecheck);

                $originalstyle=$stylecheck;



                array_pop($stylecheck);
                array_pop($stylecheck);
                array_pop($stylecheck);
                array_pop($originalstyle);
                array_pop($originalstyle);
                array_pop($originalstyle);
                

                for ($i=0;$i<count($stylecheck);$i++)
                {
                    // echo "line $i <br>";
                    if (strpos($stylecheck[$i], ':'))
                    {
                        $stylecheck[$i]=substr($stylecheck[$i],strrpos($stylecheck[$i],":")+1);
                    }
                    // echo $stylecheck[$i]."<br>";
                   
                }

                $newarrayofstyle=array_unique($stylecheck);

                
                
                foreach ($newarrayofstyle as $newline)
                {
                    $linenumbers="";

                   for ($i=0;$i<count($originalstyle);$i++)
                   {
                        $substringline=substr($originalstyle[$i],strrpos($originalstyle[$i],":")+1);

                        if($substringline===$newline)
                        {

                            $length=strrpos($originalstyle[$i],":")-(strpos($originalstyle[$i],":")+1);
                             
                            $newnumber=substr($originalstyle[$i],strpos($originalstyle[$i],":")+1,$length);

                            $linenumbers=$linenumbers.(string) $newnumber. " ";
                        }
                   }

                   $stylefeedback = $stylefeedback."In line ".$linenumbers." Error found :" .$newline. "<br><br>";
                } 
                
                $_SESSION["stylefeedback"] = $stylefeedback;

                // checkvariablename("uploads/".$_SESSION['ID']. "-".$_GET['id'].".".$ext);
                
                
            }
            else
            {
                echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                <script> swal('File Failed To Upload','Please enter a file with extenstion .cpp ','error');</script>
                    ";
            }
        }
        ?>
	<!-- End header -->
    
    <!-- Page First View -->
	<div class="all-title-box" style="background: url(images/assignmentbanner.jpg)no-repeat;background-size: cover;background-position: center;min-height: 300px;">
		<div class="container text-center">
			<h1><?php echo $assignment->getAssignmentname(); ?></h1>
		</div>
    </div>
    
    
    
    <!-- Main Body Content -->
    <div id="MainContent" class="section wb">
        <div class="container p-0">
            <div class="row mb-4">
                <div class="col-12 add-pad mx-auto">
                    <!-- Assignment Details div -->
                    <h2 class="font-weight-normal mb-3 ">Assignment Details</h2>
                    <p class="text-justify"> <?php echo $assignment->getAssignmentdesc(); ?> <br><br> 
                    
                    Assignment Grade : <?php echo $assignment->getAssignmentgrade();?> Marks
                    </p>
                </div>
            </div>
            
            <!-- Rewards div -->

            <div class="row mt-4 mb-4">

                <div class="col-12 add-pad mx-auto">
                    <h2 class="font-weight-normal mb-3 ">Rewards</h2>
                    <ul class="">
                        <li class="mb-4"> <img src="images/coin.png" width="60" height='35' class="mr-3">Loot Coins</li>
                        <li class="mb-4"> <img src="images/points.png" width="60" height='60' class="mr-3">Earn Points</li>
                        <li class="mb-4"> <img src="images/exp.png" width="60" height='60' class="mr-3">Gain Experience</li>
                    </ul>
                </div>
            
            </div>

            <div class="row mt-4 mb-4">

                <div class="col-12 add-pad mx-auto">
                    <h2 class="font-weight-normal mb-3 ">Hints</h2>
                    
                    <table class="table table-hover table-dark" id="hints-table">
                        
                        <tbody>
                      
                            <tr>
                                <th scope="row" ><img class="mr-2" src="images/hint1.png" width="24" height="24"> Hint 1</th>
                                <td>
                                    
                                    <form action="" method="post">
                                        <input type="submit"  value="Click To Buy Hint With Coins!">
                                    </form>
                                        
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" ><img class="mr-2" src="images/hint1.png" width="24" height="24"> Hint 2</th>
                                <td>
                                    
                                    <form action="" method="post">
                                        <input type="submit"  value="Click To Buy Hint With Coins!">
                                    </form>
                                        
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" ><img class="mr-2" src="images/hint1.png" width="24" height="24"> Hint 3</th>
                                <td>
                                    
                                    <form action="" method="post">
                                        <input type="submit"  value="Click To Buy Hint With Coins!">
                                    </form>
                                        
                                </td>
                            </tr>
                            
                        
                            
                       
                        
                        </tbody>
                    </table>    
           
            
                </div>
            
            </div>



            <div class="row mt-4 mb-4">

                <div class="col-12 add-pad mx-auto">
                    <h2 class="font-weight-normal mb-3 ">Submit Your Assignment</h2>
                    <h6>Click Run Code Then Submit Assignment</h6>

                    <form action="" method="post" enctype="multipart/form-data">
                        Select image to upload:
                        <input type="file" name="fileToUpload"  id="fileToUpload" accept=".cpp">
                        <input type="submit" value="Upload File" class="btn" name="uploadfile">
                    </form>


                    <form  action="compile.php" id="form" name="f2" method="POST" >

                        <!-- <div class="form-group">
                            <input type="file" class="form-control-file" id="assignment-upload" name="assignment">
                        </div> -->

                        
                        <input type="hidden" name="assignmentid" value="<?php echo $_GET['id']?>">
                        <input type="hidden" name="userid" value="<?php echo $_SESSION['ID']?>">
                        <label style="display:none" for="ta">Write Your Code</label>
                        <textarea style="display:none"  name="code" rows="10" cols="145" id="code"><?php echo htmlspecialchars($filedata,ENT_QUOTES);?>
                        </textarea>
                        <label style="display:none" for="in">Enter Your Input</label>
                        <textarea style="display:none" class="form-control" name="input" id="inputtext" rows="2" cols="50"></textarea>
                        <div style="display:none"  class="row ml-2">
                            <input  type="submit" id="st" class="btn btn-success mr-2" name="runcode" value="Run Code">
                            
                            

                            


                            <!-- <input type="submit" class="btn btn-primary float-right mt-4" name="subbmit-assignment" value="Submit Assignment"> -->

                    </form>
                            
                        </div>
                    

                        
                    <label style="display:none" for="out">Output</label>
                    <form class="mb-4" action="" method="post">
                                <div id="pac-loader" class="col-12 col-lg-8 mx-auto mt-4 " style="display:none;flex-direction:column;align-items: center;">
                                    <img src="images/pac-loader.gif">
                                    <h3 class='font-weight-bold'>Processing assignment</h3>
                                </div>
                                <input type="submit" style="display: none" id="Submit_assinment_btn"  class="btn btn-success ml-2" name="Submitcode" value="Submit Code">
                                <input type="hidden" name="assignmentid" value="<?php echo $_GET['id']?>">
                                <input type="hidden" name="userid" value="<?php echo $_SESSION['ID']?>">
                                <textarea type="hidden" style="display:none;" name="actualoutput" id="actualoutput" ></textarea>
                                <textarea type="hidden" style="display:none;" name="expectedoutput" id="dboutput"><?php for($i=0;$i<count($outputarray);$i++)
                                                                                                                                {
                                                                                                                                    echo $outputarray[$i]."~!";
                                                                                                                                }?></textarea>
                                <input type="hidden" name="assignmentcode" id="assignmentcode" value="<?php echo htmlspecialchars($filedata,ENT_QUOTES);?>">
                                
                            </form>
                </div>

                <div class="row mx-auto" style="width:98%"> 
                    <div class="table-responsive">
                        <table class="table table-hover table-dark "style="margin-bottom: 0px;">
                            <thead>
                            <tr>
                                
                                <th scope="col">Submitted Date</th>
                                <th scope="col">Submitted Code</th>
                                <th scope="col">Submitted Grade</th>
                            
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                
                                <?php  
                                        $studentcontroller->getAssignmentdetails();  
                                        $assignment=$studentmodel->getAssignmentdetail();
                                        if($assignment->getSubmissiondate()==null && $assignment->getFilepath()==null )
                                        {   
                                            echo "<td colspan='3'> No Submissions Yet</td>";
                                        }
                                        else
                                        {
                                            echo "<td>". $assignment->getSubmissiondate()."</td>
                                                <td>". $assignment->getFilepath()."</td>
                                                <td>" .$assignment->getGrade()."</td>
                                                "
                                                ;
                                        }                     
                            ?>
                                
                            </tr>
                            
                            
                            </tbody>
                        </table>
                    </div>
                </div><!-- end row -->

            
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-12  add-pad mx-auto" style="width=98%">
                    <h2 >Feedback on latest submission</h2>

                    <h4 class="mt-3">Logic Feedback</h4>
                    
                    <div class="mt-3" id="logic-feedback"> <?php echo $assignment->getLogicfeedback(); ?> </div>

                    <h4 class="mt-3">Compliation Feedback</h4>
                    <div class="mt-3" id="compile-feedback"> <?php echo $assignment->getCompilefeedback(); ?> </div>

                    <h4 class="mt-3">Style Feedback</h4>
                    <div class="mt-3" id="style-feedback"> <?php echo $assignment->getStylefeedback(); ?> </div>

                </div>                 
            </div>

            
            


        </div>
    </div><!-- end section -->



    <div class="parallax section dbcolor">
        <div class="container">
            <div class="row logos">
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="images/logo_01.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="images/logo_02.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="images/logo_03.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="images/logo_04.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="images/logo_05.png" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="images/logo_06.png" alt="" class="img-repsonsive"></a>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
    <textarea style="display:none;" id="inputvariablstests"  ><?php
            for($i=0;$i<count($inputarray);$i++)
            {
                echo $inputarray[$i]."~!";
            }
            ?>
     </textarea>


    <?php include_once('partials/footer.php') ?> 

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-center">                   
                    <p class="footer-company-name">All Rights Reserved. &copy; 2018 <a href="#">SmartEDU</a> Design By : <a href="https://html.design/">html design</a></p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
    <script src="js/assingment.js"></script>
    <script src="js/jquery-linedtextarea.js"></script>

    <script>


	</script>

        <script>

            let stringofinput=$("#inputvariablstests").val();
            let splitofinp=stringofinput.split("~!");
            $("#inputtext").html(splitofinp[0]);
            let counter=splitofinp.length;
            splitofinp.shift();

            document.addEventListener('readystatechange', event => {
                if (event.target.readyState === 'complete') {

                    let valueofcode=$("#code").val();
                    valueofcode=valueofcode.replace(/\s/g,'');
                    
                    if(valueofcode!="")
                    {
                        $("#pac-loader").attr('style','display:flex;flex-direction:column;align-items: center;');
                        $('#st').click();
                    }    
                }
            });
            //wait for page load to initialize script
            $(document).ready(function(){
                //listen for form submission
                
                
                $('#form').on('submit', function(e){
                //prevent form from submitting and leaving page
                e.preventDefault();

                // AJAX 
                $.ajax({
                        type: "POST", //type of submit
                        cache: false, //important or else you might get wrong data returned to you
                        url: "compile.php", //destination
                        datatype: "html", //expected data format from process.php
                        data: $('form').serialize(), //target your form's data and serialize for a POST
                        success: function(result) { // data is the var which holds the output of your process.php

                            // locate the div with #result and fill it with returned data from process.php
                            let actualoutputval;
                            if ($('#actualoutput').val()=="")
                            {
                                actualoutputval=result;
                            }
                            else
                            {
                                actualoutputval=$("#actualoutput").val()+"~!"+result;
                            }
                            $('#actualoutput').html(actualoutputval);

                            counter=splitofinp.length-1;
                            if(counter>0)
                            {
                                $("#inputtext").html(splitofinp[0]);
                                splitofinp.shift();
                                $('#st').click();
                            }
                            else
                            {
                                $("#pac-loader").attr('style','display:none');
                                $('#Submit_assinment_btn').show();
                            }
                            
                           
                        }
                    });
                });

                
            });
        </script>

        <script>
            $("#code").keyup(function(){
                let text=$("#code").val();
                $("#assignmentcode").val(text);
               
            })
        </script>

        <script type="text/javascript">
        
        $(document).ready(function(){

            $("#st").click(function(){
        
                $("#outputdiv").html("Loading ......");


            });

        });


        </script>

        <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'> </script></body>


</html>