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

    <?php
        error_reporting(0);
        session_start();
        require_once("../app/model/instructor-model.php");
        require_once("../app/controller/instructor-controller.php");
        require_once("../app/view/instructor-view.php");

        $instructorModel = new Instructor();
        $instructorController = new InstructorController($instructorModel);
        $instructorView = new InstructorView($instructorController,$instructorModel);

        if(isset($_POST['addassignment']))
        {
            $instructorController->addAssignment_mainDetails();
            
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
                <a class="navbar-brand" href="Dashboard.php">EvalSeer</a>
            </div>
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;"> 
                Last access : 30 May 2014 &nbsp; <a href="../logout.php" class="btn btn-danger square-btn-adjust">Logout</a>
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
                            
                                    <form method="POST" action="" role="form">
                                        <div class="panel-body">
                                            <label>Select Course:</label>
                                            <select name="selectedcourse" style="margin-bottom:10px" name="courses" id="Course">
                                                <?php $instructorView->readCoursesSelection(); ?>
                                            </select>
                                            <div id="Assignment-Panel" style="display: none;" class="row">
                                                <div class="col-md-12">

                                        
                                            
                                            <div class="form-group">
                                                <label>Assignment Title</label>
                                                <input required class="form-control" name="assignment-title" placeholder="Please enter title" />
                                            </div>
                                            <!-- Assignment Title -->
                                            <div class="form-group">
                                                <label>Assignment Description</label>
                                                <textarea required name="assignment-desc" class="form-control" rows="3"></textarea>
                                            </div>
                                            <!-- Assignment Description -->
                                            <div class="form-group">
                                                <label>PDF Instructions (Optional)</label>
                                                <input type="file" />
                                            </div>
                                            <!-- PDF instructions -->

                                            <div class="form-group">
                                                <label>Start Date</label>
                                                <input required name="assignment-start-date" type="date" />
                                            </div>

                                            <div class="form-group">
                                                <label>Cutoff Date</label>
                                                <input required name="assignment-cuttoff-date" type="date" />
                                            </div>

                                            <div class="form-group">
                                                <label>Total Grade</label>
                                                <input required name="assignment-total-grade" type="number" />
                                            </div>

                                            <div class="form-group">
                                                <label>Number of Submissions Allowed</label>
                                                <input required type="number" name="assignment-nb" />
                                            </div>

                                            <div class="form-group">
                                                <label>Grading Type</label>
                                                <select name="assignment-type" style="margin-bottom:10px">
                                                    <option value="Automatic">Automatic</option>
                                                    <option value="Hybrid">Hybrid</option>
                                                    <option value="Manual">Manual</option>
                                                </select>
                                            </div>
                                             <!-- Grading Cirteria -->
                                            <div class="form-group">
                                                <label>Grading Criteria</label>
                                                <br>
                                                <br>
                                                Style with weight
                                                <input required type="number" name="assignment-style-weight" max="100" min="0" style="width: 8%;" value="0" /> %
                                                <br>
                                                <br>
                                                Compliation with weight
                                                <input required type="number" max="100" min="0" name="assignment-compile-weight" style="width: 8%;" value="0" /> %
                                                <br>
                                                <br>
                                                Syntax with weight
                                                <input required type="number" max="100" min="0" name="assignment-syntax-weight" style="width: 8%;" value="0" /> %
                    
                                                <br>
                                                <br>
                                                Logic with weight
                                                <input required type="number" max="100" name="assignment-logic-weight" min="0" style="width: 8%;" value="0" /> %
                                                <br><br>
                                                 
                                               
                                               <!-- Hints -->
                                                <div class="form-group">
                                                    <label>First Hint</label>
                                                    <input class="form-control" placeholder="Mandatory" />

                                                    <label>Second Hint</label>
                                                    <input class="form-control" placeholder="Optional" />

                                                    <label>Third Hint</label>
                                                    <input class="form-control" placeholder="Optional" />
                                                </div>

                                                <!-- Test Cases Growable Div -->
                                                <div id="testcasesparent" class="form-group">
                                                    <label>Test Cases</label>
                                                    <button id="btn1" type="button" class="btn btn-primary">Add Test Case</button>
                                                    <div id="test-cases"></div>
                                                    <input type="hidden" placeholder="hiddenfield" name="testcasenumberarray" id="hiddenfield">
                                                    
                                                </div>
                                                
                                                <hr>
                                                <div class="form-group">
                                                    <label>Other Options</label>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input name="assignment-hide-flag" type="checkbox" value="checked" />Hide From Students
                                                        </label>
                                                    </div>
                                                </div>
                                                <button type="submit" name="addassignment" class="btn btn-success">Announce
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
                                    <?php $instructorView->readAssignmentSelection();?>
                                </select>
                                <div style="display:none" id="edit-assignment">
                                    <?php $instructorView->readAssignments();?>
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
            //  let selection = $('#Course option:selected').val();

            //     if(selection == 'CSC240' || selection == 'CSC250')
            //     {
                    $('#Assignment-Panel').css('display','block');
                // }
            }); 

            $('#assignments-edit-div').change(function(){
             $('#edit-assignment').show();
             let val =  $(this).val();
             $('#' + val).css("display", "block").siblings().hide();
            }); 
    </script>

    <script>
        
        let arrayoftestcasenums = [];

        let testcasenum =0;
        $("#btn1").click(function(){
            let inputnum=1;
            testcasenum = testcasenum+1;
            arrayoftestcasenums.push(testcasenum);
            
            document.getElementById("hiddenfield").setAttribute('value', arrayoftestcasenums);
            console.log("test case added");
            var div="<div tsid='"+testcasenum+"' id='testcase"+testcasenum+"'> \
                <br>\
                <hr>\
                <div class='form-group'>\
                    <label>Test Case "+testcasenum+"</label>\
                    <div tsid='"+testcasenum+"' id='testcase"+testcasenum+"inputs'>\
                        Enter An Input <input id='testcase"+testcasenum+"inputsinputnum"+inputnum+"' name='"+testcasenum+"inputnum[]' type='text'> \
                        <button type='button' id='testcase"+testcasenum+"inputsbtn'  class='btn btn-primary'>Add Another input</button>\
                    </div>\
                    <br><br>\
                    Enter Expected Ouput <input id='testcase"+testcasenum+"expectedoutput' name='outputsArray[]' required type='text'> \
                </div>\
                <br>\
                <button type='button'  class='btn btn-danger removeDiv' id='removeDiv"+testcasenum+"'>Remove Test Case</button>\
            </div>";


            $('#test-cases').append(div);

            $('#'+"testcase"+testcasenum+"inputsbtn").click('click',function(){
                    let currenttestcase = $(this).parent().attr('id');
                    let testnumber = $(this).parent().attr('tsid');
                    inputnum = inputnum+1;
                    $(this).parent().append('<br><br>Enter An Input <input id="'+currenttestcase+'inputnum'+inputnum+'" name="'+testnumber+'inputnum[]" type="text">');
                });


            $('#'+"removeDiv"+testcasenum+"").on('click', function() {
                let testcasetoberemoved = $(this).parent().attr('tsid');

                let numbervalue=parseInt(testcasetoberemoved);
                // console.log(testcasetoberemoved);
                // console.log("remove clicked");
                // console.log("array of test numbs "+arrayoftestcasenums);
                const index =arrayoftestcasenums.indexOf(numbervalue);
                // console.log('console of index');
                // console.log(index);
                // doesnt want to remove
                if (index > -1) {
                arrayoftestcasenums.splice(index, 1);
                }
                console.log("array after remov clicked");
                console.log(arrayoftestcasenums);
                document.getElementById("hiddenfield").setAttribute('value', arrayoftestcasenums);
                $(this).parent().remove();
            });


        });


    </script>

    <!-- <script>
        const array = [];
        test = 1;
        test2=2;
        test3=3;
        array.push(test);
        array.push(test2);
        array.push(test3);

        console.log(array);

        const index = array.indexOf(test2);
        if (index > -1) {
        array.splice(index, 1);
        }

        // array = [2, 9]
        console.log(array); 
    </script> -->

</body>

</html>