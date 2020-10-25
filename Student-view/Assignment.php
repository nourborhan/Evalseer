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
   <?php include_once("partials/header.php") ?>
   <?php 
    require_once("../app/model/student-model.php");
    require_once("../app/controller/student-controller.php");
    require_once("../app/view/student-view.php");
    
    $studentmodel=new Student();
    $studentcontroller=new StudentController($studentmodel);
    $studentview=new StudentView($studentcontroller,$studentmodel);
    
    $studentcontroller->getAssignmentdetails();
    $assignment=$studentmodel->getAssignmentdetail();
    
    
    session_start();
	if(isset($_POST['Submitcode']))
	{	
        
		$studentcontroller->submitAssignment();

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
                    <p class="text-justify"> <?php echo $assignment->getAssignmentdesc(); ?> </p>
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
                        <li class="mb-4">Reward 4</li>
                        <li class="mb-4">Reward 5</li>
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
                    <form action="compile.php" id="form" name="f2" method="POST" >

                        <!-- <div class="form-group">
                            <input type="file" class="form-control-file" id="assignment-upload" name="assignment">
                        </div> -->

                        

                        <label for="ta">Write Your Code</label>
                        <textarea required class="lined" name="code" rows="10" cols="145" id="code"></textarea><br><br>
                        <label for="in">Enter Your Input</label>
                        <textarea class="form-control" name="input" rows="10" cols="50"></textarea><br><br>
                        <div class="row ml-2">
                            <input type="submit" id="st" class="btn btn-success mr-2" name="runcode" value="Run Code">
                            
                            




                            <!-- <input type="submit" class="btn btn-primary float-right mt-4" name="subbmit-assignment" value="Submit Assignment"> -->

                    </form>
                            <form action="" method="post">
                                <input type="submit"  class="btn btn-success ml-2" name="Submitcode" value="Submit Code">
                                <input type="hidden" name="assignmentid" value="<?php echo $_GET['id']?>">
                                <input type="hidden" name="userid" value="<?php echo $_SESSION['ID']?>">
                                <input type="hidden" name="code" id="assignmentcode" value="">
                                
                            </form>
                        </div>
                        <br><br><br>
                    <label for="out">Output</label>
                    <textarea readonly id='outputdiv' class="form-control" name="output" rows="10" cols="50"></textarea><br><br>
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

	$(document).ready(function(){

		$('#nav-courses').addClass("active");
        $("#code").linedtextarea();
	})

	</script>

        <script>
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
                            $('#outputdiv').html(result);
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
</body>


</html>