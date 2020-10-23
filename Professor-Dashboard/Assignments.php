﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EvalSeer Professor Dashboard</title>
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
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="Dashboard.php">EvalSeer</a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="../logout.php" class="btn btn-danger square-btn-adjust">Logout</a>
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/Evalseer-logo-dash.png" class="user-image img-responsive" />
                    </li>

                    <li>
                        <a href="Dashboard.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="Charts.php"><i class="fa fa-bar-chart-o fa-3x"></i> Student Charts</a>
                    </li>
                    <li>
                        <a href="Leaderboard.php"><i class="fa fa-table fa-3x"></i> Leaderboards</a>
                    </li>
                    <li>
                        <a class="active-menu" href="Assignments.php"><i class="fa fa-edit fa-3x"></i> Assignments</a>
                    </li>

                    <li>
                        <a href="Courses.php"><i class="fa  fa-file-text-o fa-3x"></i>Courses</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Assignments Page</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Create Assignment
                            </div>
                            
                            <div class="panel-body">
                                <label>Select Course:</label>
                                <select style="margin-bottom:10px" name="courses" id="Course">
                                    <option value="default" selected disabled>--None--</option>
                                    <option value="CSC240">Algorithms I</option>
                                    <option value="CSC250">Algorithms II</option>
                                </select>
                                <div id="Assignment-Panel" style="display: none;" class="row">
                                    <div class="col-md-12">

                                        <form role="form">
                                            <div class="form-group">
                                                <label>Assignment Title</label>
                                                <input class="form-control" placeholder="Please enter title" />
                                            </div>
                                            <!-- Assignment Title -->
                                            <div class="form-group">
                                                <label>Assignment Description</label>
                                                <textarea class="form-control" rows="3"></textarea>
                                            </div>
                                            <!-- Assignment Description -->
                                            <div class="form-group">
                                                <label>PDF Instructions (Optional)</label>
                                                <input type="file" />
                                            </div>
                                            <!-- PDF instructions -->
                                            <div class="form-group">
                                                <label>Grading Criteria</label>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="" />Criterion 1
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="" />Criterion 1
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="" />Criterion 1
                                                    </label>
                                                </div>
                                                <!-- Grading Cirteria -->
                                                <div class="form-group">
                                                    <label>First Hint</label>
                                                    <input class="form-control" placeholder="Mandatory" />

                                                    <label>Second Hint</label>
                                                    <input class="form-control" placeholder="Optional" />

                                                    <label>Third Hint</label>
                                                    <input class="form-control" placeholder="Optional" />
                                                </div>
                                                <!-- Hints -->
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="" />Hide From Students
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn btn-success">Announce
                                                    Assignment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default" id="">
                            <div class="panel-heading">
                                Edit Assignments
                            </div>
                            <div class="panel-body">
                                <select id="assignments-edit-div" style="margin-bottom:10px" name="select_projects" id="select_projects">
                                    <option selected disabled>Select Assignment</option>
                                    <optgroup label="CSC 104">
                                        <option value="">Assignmet 1</option>
                                    </optgroup>
                                    <optgroup label="CSC 105">
                                        <option value="">Assignment 1</option>
                                        <option value="">Assignment 2</option>
                                    </optgroup>
                                </select>
                                <div style="display:none" id="edit-assignment">
                                        <form role="form">
                                            <div class="form-group">
                                                <label>Assignment Title</label>
                                                <input class="form-control" placeholder="Please enter title" value="Assignment 1" />
                                            </div>
                                            <!-- Assignment Title -->
                                            <div class="form-group">
                                                <label>Assignment Description</label>
                                                <textarea class="form-control" rows="3">Some to text to clarify the assigmnet requirments</textarea>
                                            </div>
                                            <!-- Assignment Description -->
                                            <div class="form-group">
                                                <label>PDF Instructions (Optional)</label>
                                                <input type="file" />
                                            </div>
                                            <!-- PDF instructions -->
                                            <div class="form-group">
                                                <label>Grading Criteria</label>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" checked value="" />Criterion 1
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" checked value="" />Criterion 1
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="" />Criterion 1
                                                    </label>
                                                </div>
                                                <!-- Grading Cirteria -->
                                                <div class="form-group">
                                                    <label>First Hint</label>
                                                    <input class="form-control" placeholder="Mandatory" value="You can use the variable in a loop" />

                                                    <label>Second Hint</label>
                                                    <input class="form-control" placeholder="Optional" />

                                                    <label>Third Hint</label>
                                                    <input class="form-control" placeholder="Optional" />
                                                </div>
                                                <!-- Hints -->
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="" />Hide From Students
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn btn-success">Announce
                                                    Assignment</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>           
                    </div>    
                </div>
            </div>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->

    
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>

    <script>
        $('#Course').change(function(){
             let selection = $('#Course option:selected').val();

                if(selection == 'CSC240' || selection == 'CSC250')
                {
                    $('#Assignment-Panel').css('display','block');
                }
            }); 

            $('#assignments-edit-div').change(function(){
             $('#edit-assignment').show();
            }); 
    </script>

</body>

</html>