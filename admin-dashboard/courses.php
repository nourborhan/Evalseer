<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   

   <style>
                    .dropdown-check-list {
                display: inline-block;
                }

                .dropdown-check-list .anchor {
                position: relative;
                cursor: pointer;
                display: inline-block;
                padding: 5px 50px 5px 10px;
                border: 1px solid #ccc;
                }

                .dropdown-check-list .anchor:after {
                position: absolute;
                content: "";
                border-left: 2px solid black;
                border-top: 2px solid black;
                padding: 5px;
                right: 10px;
                top: 20%;
                -moz-transform: rotate(-135deg);
                -ms-transform: rotate(-135deg);
                -o-transform: rotate(-135deg);
                -webkit-transform: rotate(-135deg);
                transform: rotate(-135deg);
                }

                .dropdown-check-list .anchor:active:after {
                right: 8px;
                top: 21%;
                }

                .dropdown-check-list ul.items {
                padding: 2px;
                display: none;
                margin: 0;
                border: 1px solid #ccc;
                border-top: none;
                }

                .dropdown-check-list ul.items li {
                list-style: none;
                }

                .dropdown-check-list.visible .anchor {
                color: #0094ff;
                }

                .dropdown-check-list.visible .items {
                display: block;
                }
   </style>


    <?php
        session_start();
        require_once("../app/model/admin-model.php");
        require_once("../app/controller/admin-controller.php");
        require_once("../app/view/admin-view.php");

        $adminModel = new Admin();
        $AdminController = new AdminController($adminModel);
        $AdminView = new AdminView($AdminController,$adminModel);

        if(isset($_POST["addCourse"])){

            $AdminController->PublishCourse();

        }
    ?>


</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Evalseer Admin</a> 
            </div>
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="../logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
           <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/Evalseer-logo-dash.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a  href="addbadge.php"><i class="fa fa-qrcode fa-3x"></i> Add Bagdes</a>
                    </li>
                    <li>
                        <a class="active-menu" href="courses.php"><i class="fa fa-desktop fa-3x"></i> Courses</a>
                    </li>
						   <li  >
                        <a   href="chart.php"><i class="fa fa-bar-chart-o fa-3x"></i> Charts</a>
                    </li>	
                      <li  >
                        <a  href="professorers.php"><i class="fa fa-table fa-3x"></i> Professors</a>
                    </li>
                    
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Courses</h2>   
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                                 
            
                   
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Course
                        </div>
                        
                        <div class="panel-body">
                            <select name="courses" id="courses">
                                <!-- <option selected disabled>None selected</option>
                                <option value="csc104">CSC 104</option>
                                <option value="csc105">CSC 105</option> -->
                                <?php $AdminView->readCoursesSelection();?>
                            </select>
                            <div class="panel-group" id="accordion">
                                
                                <?php $AdminView->readCourseDetalis();?>
     
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
            
                    <!-- /. ROW  -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Course
                        </div>
                        <div class="panel-body">
                            <form method="post">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Course Title</label>
                                  <input type="text" class="form-control" name="courseTitle" placeholder="Enter Course Title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Course Code</label>
                                    <input type="text" class="form-control" name="courseCode" placeholder="Enter Course Code">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Course Total Grade</label>
                                    <input type="number" class="form-control" min="0" max="100" name="courseTotalGrade" placeholder="Enter Course Total Grade">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Course Grade To Pass</label>
                                    <input type="number" class="form-control" min="0" max="100" name="courseTotalGradetopass" placeholder="Enter Course Grade To Pass">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Course Start Date</label>
                                    <input type="date" class="form-control" name="coursestart" placeholder="Enter Course Start Date">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Course End Date</label>
                                    <input type="date" class="form-control" name="courseend" placeholder="Enter Course End Date">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Course Description</label>
                                    <textarea class="form-control" rows="5" name="courseDesc" id="comment"></textarea>
                                </div>
                                <div class="form-group">
                                    <div id="list3" class="dropdown-check-list" tabindex="100">
                                        <span class="anchor">Assign Proffessors</span>
                                        <ul class="items">
                                          <?php $AdminView->readinstructos_publishcourse(); ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div id="list4" class="dropdown-check-list" tabindex="100">
                                        <span class="anchor">Assign Teaching Assistants</span>
                                        <ul class="items">
                                          <?php $AdminView->readTAs_publishcourse(); ?>
                                        </ul>
                                    </div>
                                </div>
                                
                                <button type="submit" name="addCourse" class="btn btn-primary">Publish Course</button>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
                    <!-- /. ROW  -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Suspend Courses
                                </div>
                                <div class="panel-body">
                                    <form>
                                        <div class="form-check">
                                         <?php $AdminView->readcourse__suspendsection(); ?>
                                            <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">CSC 104</label> -->
                                            

                                        </div>
                                        <button type="submit" class="btn btn-danger">Suspend Course</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                            <!-- /. ROW  -->
            

    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <!-- <script src="assets/js/jquery.metisMenu.js"></script> -->
      <!-- CUSTOM SCRIPTS -->
    <!-- <script src="assets/js/custom.js"></script> -->
    <script>
        $("#courses").change(function(){
            let val =  $(this).val();
            $('#' + val).css("display", "block").siblings().hide();
        });

        var checkList = document.getElementById('list1');
        checkList.getElementsByClassName('anchor')[0].onclick = function(evt) {
        if (checkList.classList.contains('visible'))
            checkList.classList.remove('visible');
        else
            checkList.classList.add('visible');
        }
        var checkList2 = document.getElementById('list2');
        checkList2.getElementsByClassName('anchor')[0].onclick = function(evt) {
        if (checkList2.classList.contains('visible'))
            checkList2.classList.remove('visible');
        else
            checkList2.classList.add('visible');
        }
        var checkList3 = document.getElementById('list3');
        checkList3.getElementsByClassName('anchor')[0].onclick = function(evt) {
        if (checkList3.classList.contains('visible'))
            checkList3.classList.remove('visible');
        else
            checkList3.classList.add('visible');
        }
        var checkList4 = document.getElementById('list4');
        checkList4.getElementsByClassName('anchor')[0].onclick = function(evt) {
        if (checkList4.classList.contains('visible'))
            checkList4.classList.remove('visible');
        else
            checkList4.classList.add('visible');
        }


        
    </script>
    
</body>
</html>
