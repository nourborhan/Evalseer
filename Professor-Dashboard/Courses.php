<!DOCTYPE html>
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

    <style>
        /* @media (max-width: 767px)
        {
            .resp{

            }
        } */
    </style>
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
                        <a href="Assignments.php"><i class="fa fa-edit fa-3x"></i> Assignments</a>
                    </li>

                    <li>
                        <a class="active-menu" href="Courses.php"><i class="fa fa-file-text-o fa-3x"></i>Courses</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Course Page</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <label>Select Student Type:</label>
                        <select name="students" id="Students">
                            <option value="default" selected disabled>--None--</option>
                            <option value="Av">Available Students</option>
                            <option value="As">Assigned Students</option>
                        </select>
                        <div class="panel panel-default" style="display: none;" id="Available">
                            <div class="panel-heading">
                                Available Students
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Student ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Academic Year</th>
                                                <th>GPA</th>
                                                <th>Total Credit Hours</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="checkbox" class="AvailableCheck" onclick="ButtonToggle()"></td>
                                                <td>2017/01234</td>
                                                <td>John</td>
                                                <td>Doe</td>
                                                <td>Sophomore</td>
                                                <td>2.91</td>
                                                <td>66</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary resp"
                                                        data-toggle="modal" data-target="#AssignModal">Assign to
                                                        course</button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox" class="AvailableCheck"></td>
                                                <td>2016/56789</td>
                                                <td>Peter</td>
                                                <td>Parker</td>
                                                <td>Senior</td>
                                                <td>3.01</td>
                                                <td>99</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary resp"
                                                        data-toggle="modal" data-target="#AssignModal">Assign to
                                                        course</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default" style="display: none;" id="AssignStudents">
                            <div class="panel-heading">
                                Assigned Students
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Student ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Academic Year</th>
                                                <th>GPA</th>
                                                <th>Total Credit Hours</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="checkbox" class="AssignCheck" onclick="ButtonToggle()"></td>
                                                <td>2017/958476</td>
                                                <td>Mary</td>
                                                <td>Jane</td>
                                                <td>Sophomore</td>
                                                <td>2.91</td>
                                                <td>66</td>
                                                <td>
                                                    <button type="button" class="btn btn-danger resp"
                                                        data-toggle="modal" data-target="#RemoveModal">Remove From
                                                        Course</button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox" class="AssignCheck"></td>
                                                <td>2016/28395</td>
                                                <td>Steven</td>
                                                <td>Strange</td>
                                                <td>Senior</td>
                                                <td>3.01</td>
                                                <td>99</td>
                                                <td>
                                                    <button type="button" class="btn btn-danger resp"
                                                        data-toggle="modal" data-target="#RemoveModal">Remove From
                                                        Course</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-default resp" id="AssignButton" style="display: none;"
                            data-toggle="modal" data-target="#AssignModal"> Assign Selected
                            Students </button>
                        <button type="button" class="btn btn-default resp" id="RemoveButton" style="display: none;">
                            Remove Selected
                            Students </button>
                    </div>
                </div>
                <!-- /. ROW  -->
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->


    <div id="AssignModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Assign student to course</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Course ID</th>
                                <th>Course Name</th>
                                <th>Required EHRS</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>CSC240</td>
                                <td>Algorithms I</td>
                                <td>33</td>
                                <td>
                                    <button type="button" class="btn btn-success">Assign</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--Courses Modal -->
    <div id="RemoveModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Warning</h4>
                </div>
                <div class="modal-body">
                    <p style="text-align: center;">You are about to remove a student or several students from their
                        courses, Are you sure?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Remove from course modal -->

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>

    <script>
        $('#Students').change(function () {
            let selection = $('#Students option:selected').val();

            if (selection == 'Av') {
                $('#AssignStudents').css('display', 'none');
                $('#Available').css('display', 'block');

            }
            if (selection == 'As') {
                $('#Available').css('display', 'none');
                $('#AssignStudents').css('display', 'block');
            }
        });
        // Panel Toggle //
        function ButtonToggle() {


            var AvCheck = document.getElementsByClassName("AvailableCheck");
            var AsCheck = document.getElementsByClassName("AssignCheck");

            if (AvCheck.checked) {
                $('#RemoveButton').css('display', 'none');
                $('#AssignButton').css('display', 'block');
            }

            else if (AsCheck.checked) {
                $('#AssignButton').css('display', 'none');
                $('#RemoveButton').css('display', 'block');
            }
        }
    </script>


</body>

</html>