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
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
           <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/Evalseer-logo-dash.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a   href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a  href="addbadge.php"><i class="fa fa-qrcode fa-3x"></i> Add Bagdes</a>
                    </li>
                    <li>
                        <a  href="courses.php"><i class="fa fa-desktop fa-3x"></i> Courses</a>
                    </li>
						   <li  >
                        <a   href="chart.php"><i class="fa fa-bar-chart-o fa-3x"></i> Charts</a>
                    </li>	
                      <li  >
                        <a class="active-menu" href="professorers.php"><i class="fa fa-table fa-3x"></i> Professors</a>
                    </li>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Instructors Control</h2>   
                       
                </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Edit Instructors
                            </div>
                            <div class="panel-body">
                                <select id="profs-select">
                                    <option selected disabled>None selected</option>
                                    <option value="1">Instructor 1</option>
                                    <option value="2">Instructor 2</option>
                                </select>

                                <div id="prof-div">
                                    <div id="1" style="display: none;">
                                        <form>
                                            <h3>Edit Name</h3>
                                            <select>
                                                <option selected disabled>Select Prefix</option>
                                                <option value="">Doctor</option>
                                                <option value="">Eng</option>
                                            </select>
                                            <input type="text" value="Instructor1">
                                            <h3>Edit Bio</h3>
                                            <textarea class="form-control" rows="5" id="comment"></textarea>
                                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                    <div id="2" style="display: none;">
                                        <form>
                                            <h3>Edit Name</h3>
                                            <select>
                                                <option selected disabled>Select Prefix</option>
                                                <option value="">Doctor</option>
                                                <option value="">Eng</option>
                                            </select>
                                            <input type="text" value="Instructor2">
                                            <h3>Edit Bio</h3>
                                            <textarea class="form-control" rows="5" id="comment"></textarea>
                                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>
                    <!-- /. ROW  -->

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Add Instructors
                                </div>
                                <div class="panel-body">
                                    
                                    <form>
                                        <h3>Enter Name</h3>
                                        <select>
                                            <option selected disabled>Select Prefix</option>
                                            <option value="">Doctor</option>
                                            <option value="">Eng</option>
                                        </select>
                                        <input type="text" value="Instructor1">
                                        <h3>Enter Bio</h3>
                                        <textarea class="form-control" rows="5" id="comment"></textarea>
                                        <button type="submit" style="margin-top: 10px;" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                            <!--End Advanced Tables -->
                        </div>
                    </div>
                        <!-- /. ROW  -->    

                        <div class="row">
                            <div class="col-md-12">
                                <!-- Advanced Tables -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Add Instructors
                                    </div>
                                    <div class="panel-body">
                                        
                                        <form>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">Instructor 1</label>
                                                <br>
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">Instructor 2</label>
                                                
    
                                            </div>
                                            <button type="submit" class="btn btn-danger">Suspend Instructor</button>
                                        </form>
                                    </div>
                                </div>
                                <!--End Advanced Tables -->
                            </div>
                        </div>
                            <!-- /. ROW  -->       
                
            </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });

            $("#profs-select").change(function(){
                
            let val =  $(this).val();
            $('#' + val).css("display", "block").siblings().hide();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
