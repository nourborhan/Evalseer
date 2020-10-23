﻿<!DOCTYPE html>
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
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-bar"></span>
                    <span class="fa fa-bar"></span>
                    <span class="fa fa-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Evalseer Admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="../logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
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
                        <a class="active-menu"  href="addbadge.php"><i class="fa fa-qrcode fa-3x"></i> Add Bagdes</a>
                    </li>
                    <li>
                        <a  href="courses.php"><i class="fa fa-desktop fa-3x"></i> Courses</a>
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
                     <h2>Badges</h2>   
                        
                       
                    </div>
                </div>
    
                 <hr />
                 <div class="row">
                    
                    <div class="col-md-12">
                      <div class="panel panel-default">
                              <div class="panel-heading">
                              System Badges
                              </div>        
                                            
                            <div class="panel-body"> 

                                <div class="table-responsive">
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col" style="text-align: center;"><img data-toggle="modal" data-target="#myModal" src="assets/img/test.png" width="100" height="100"></img><div>Badge Name</div><input type="checkbox"></th>
                                        <th scope="col" style="text-align: center;"><img data-toggle="modal" data-target="#myModal" src="assets/img/test.png" width="100" height="100"></img><div>Badge Name</div><input type="checkbox"></th>
                                        <th scope="col" style="text-align: center;"><img data-toggle="modal" data-target="#myModal" src="assets/img/test.png" width="100" height="100"></img><div>Badge Name</div><input type="checkbox"></th>
                                        <th scope="col" style="text-align: center;"><img data-toggle="modal" data-target="#myModal" src="assets/img/test.png" width="100" height="100"></img><div>Badge Name</div><input type="checkbox"></th>
                                      </tr>
                                      <tr>
                                        <th scope="col" style="text-align: center;"><img data-toggle="modal" data-target="#myModal" src="assets/img/test.png" width="100" height="100"></img><div>Badge Name</div><input type="checkbox"></th>
                                        <th scope="col" style="text-align: center;"><img data-toggle="modal" data-target="#myModal" src="assets/img/test.png" width="100" height="100"></img><div>Badge Name</div><input type="checkbox"></th>
                                        <th scope="col" style="text-align: center;"><img data-toggle="modal" data-target="#myModal" src="assets/img/test.png" width="100" height="100"></img><div>Badge Name</div><input type="checkbox"></th>
                                        <th scope="col" style="text-align: center;"><img data-toggle="modal" data-target="#myModal" src="assets/img/test.png" width="100" height="100"></img><div>Badge Name</div><input type="checkbox"></th>
                                      </tr>
                                      <tr>
                                        <th scope="col" style="text-align: center;"><img data-toggle="modal" data-target="#myModal" src="assets/img/test.png" width="100" height="100"></img><div>Badge Name</div><input type="checkbox"></th>
                                        <th scope="col" style="text-align: center;"><img data-toggle="modal" data-target="#myModal" src="assets/img/test.png" width="100" height="100"></img><div>Badge Name</div><input type="checkbox"></th>
                                        <th scope="col" style="text-align: center;"><img data-toggle="modal" data-target="#myModal" src="assets/img/test.png" width="100" height="100"></img><div>Badge Name</div><input type="checkbox"></th>
                                        <th scope="col" style="text-align: center;"><img data-toggle="modal" data-target="#myModal" src="assets/img/test.png" width="100" height="100"></img><div>Badge Name</div><input type="checkbox"></th>
                                      </tr>
                                      <tr>
                                        <th scope="col" style="text-align: center;"><img data-toggle="modal" data-target="#myModal" src="assets/img/test.png" width="100" height="100"></img><div>Badge Name</div><input type="checkbox"></th>
                                        <th scope="col" style="text-align: center;"><img data-toggle="modal" data-target="#myModal" src="assets/img/test.png" width="100" height="100"></img><div>Badge Name</div><input type="checkbox"></th>
                                        <th scope="col" style="text-align: center;"><img data-toggle="modal" data-target="#myModal" src="assets/img/test.png" width="100" height="100"></img><div>Badge Name</div><input type="checkbox"></th>
                                        <th scope="col" style="text-align: center;"><img data-toggle="modal" data-target="#myModal" src="assets/img/test.png" width="100" height="100"></img><div>Badge Name</div><input type="checkbox"></th>
                                      </tr>
                                      
                                      
                                      
                                    </thead>
                                  </table>
                                  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Disable Badge</button>
                                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Badge Name</h4>
                                            </div>
                                            <div class="modal-body">
                                                Badge Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                            Add New Badge
                        </div>
                       
                        <div class="panel-body">
                            <!-- <form>
                          <h5>Upload Badge Image (PNG ONLY)</h5>
                          <input required type="file" accept=".png">
                          <br>
                          <h5>Enter Badge Description</h5>
                          <textarea class="form-control" style="width: 50%;" rows="5"></textarea>
                          <br>
                          <button style="margin-top: 5px;" class="btn btn-primary">Add Badge</button>
                                </form> -->

                                <form>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Upload Badge Image</label>
                                      <input required type="file" accept=".png">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Enter Badge Description</label>
                                      <textarea class="form-control" style="width: 50%;" rows="5"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Badge</button>
                                  </form>

                        </div>
                        
                    </div>
                    </div>
                    
                 
                </div>
                <!--end 2nd row-->
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
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
 
</body>
</html>
