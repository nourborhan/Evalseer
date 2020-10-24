<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
	 <title>Evalseer - Course</title>   
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
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

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
	<!-- End header -->
	<?php 
	
	require_once("../app/model/student-model.php");
    require_once("../app/controller/student-controller.php");
    require_once("../app/view/student-view.php");
	session_start();
    
    $studentmodel=new Student();
    $studentcontroller=new StudentController($studentmodel);
	$studentview=new StudentView($studentcontroller,$studentmodel); 
	
	$studentcontroller->getCoursedetails();
	$studentcontroller->getCourseAssignments();
	$studentcontroller->getinstructors();
	?>
	
	<div class="all-title-box" style="background: url(images/courseimage.jpg)no-repeat;background-size: cover;background-position: center;min-height: 300px;">
		
	</div>
	
    <div id="overviews" class="section wb"style="background-image:url('images/c2.jpg');background-size: cover;background-repeat: no-repeat;overflow: hidden;">
        <div class="container">
            <div class="row"> 
                <div class="col-12 col-9 mx-auto blog-post-single">
                    <div class="blog-item">
						<div class="post-content">
							<?php $studentview->coursedetails(); ?>
						</div>
					</div>
					
					<?php $studentview->outputcourseinstructors(); ?>

					<div class="mt-5" >
                        <div class="table-responsive">
                            <h2 class="text-light">Course Masters</h2>
                            <table class="table table-hover table-dark "style="margin-bottom: 0px;">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Division</th>
                                        <th scope="col">Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark Otto</td>
                                        <td>50</td>
                                        <td>D1</td>
                                        <td>GrandHacker</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry cuilvert</td>
                                        <td>10</td>
                                        <td>D2</td>
                                        <td>Apperentice</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>JacobThornton</td>
                                        <td>1</td>
                                        <td>D5</td>
                                        <td>Novice</td>
                                    </tr>
                    
                                </tbody>
                            </table> 
                        </div> 
                    </div>

                    <div class="mt-5">
                    </div>
					
                </div><!-- end col -->
				
            </div><!-- end row -->
            
            
            
        </div><!-- end container -->


    </div><!-- end section -->

    <section class="section lb page-section">
		<div class="container">
			 <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Assignment Timeline</h3>
                    
                </div>
            </div><!-- end title -->
			<div class="timeline" >
				<div class="timeline__wrap">
					<div class="timeline__items">
						<?php $studentview->outputcourseassignments(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

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

    

    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
	<script src="js/timeline.min.js"></script>
	<?php $studentview->outputscriptincourse(); ?>

	<script>

	$(document).ready(function(){

		$('#nav-courses').addClass("active");
	})

	</script>

</body>
</html>