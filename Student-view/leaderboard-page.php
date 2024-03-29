<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
     <title>Evalseer - Leaderboards</title>   
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
    <?php
        session_start();
        include_once("partials/header.php")
    ?>
	<!-- End header -->
	
	<!-- <div style="background: url(images/b4.png)no-repeat;" class="all-title-box">
		<div class="container text-center">
			<h1 class= "text-dark">Elite Hackers
            </h1>
		</div>
    </div> -->
    

	
    <div style="background: url(images/b4.png)no-repeat;" id="overviews" class="section wb">
        
        <div class="container">
            <h1 style="text-align: center; font-family: Verdana, Geneva, Tahoma, sans-serif;font-size: 40px;font-weight: bold;" class="text-dark">Elite Hackers</h1>
            <hr class="invis"> 

            <div class="row"> 
                <div class="table-responsive">
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

    <script>

	$(document).ready(function(){

		$('#nav-leaderboards').addClass("active");
	})

	</script>

</body>
</html>