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
                                <option selected disabled>None selected</option>
                                <option value="csc104">CSC 104</option>
                                <option value="csc105">CSC 105</option>
                            </select>
                            <div class="panel-group" id="accordion">
                                

                                <div id="csc104" style="display: none;">
                                    <h5><strong>Course Title</strong></h5><span>Computer Progamming I</span>
                                    <h5><strong>Course Code</strong></h5><span>CSC 104</span>
                                    <h5><strong>Total Grade</strong></h5><span>100</span>
                                    <h5><strong>Start Date</strong></h5><span>1/1/2001</span>
                                    <h5><strong>End Date</strong></h5><span>1/1/2001</span>
                                    <h5><strong>Course Description</strong></h5>
                                    <p><strong>CSC 104:</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, sunt voluptatibus ducimus sapiente corrupti minima quis officiis? Dolores eius incidunt nisi, iusto mollitia omnis asperiores, esse distinctio tempore, est et!</p>
                                    <div class="col-md-6">
                                        <h5><strong>Assigned Proffessors</strong></h5>
                                        <ul>
                                            <li>Dr. No</li>
                                            <li>Dr. Strange</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h5><strong>Assigned TAs</strong></h5>
                                        <ul>
                                            <li>Miss Moneypenny</li>
                                            <li>Jesse Pinkman</li>
                                            <li>Gale Boetticher</li>
                                        </ul>
                                    </div>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit Course</button>

                                </div>
                                <div id="csc105" style="display: none;">
                                    <h5><strong>Course Title</strong></h5><span>Computer Progamming II</span>
                                    <h5><strong>Course Code</strong></h5><span>CSC 105</span>
                                    <h5><strong>Total Grade</strong></h5><span>100</span>
                                    <h5><strong>Start Date</strong></h5><span>1/1/2001</span>
                                    <h5><strong>End Date</strong></h5><span>1/1/2001</span>
                                    <h5><strong>Course Description</strong></h5>
                                    <p><strong>CSC 105:</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, sunt voluptatibus ducimus sapiente corrupti minima quis officiis? Dolores eius incidunt nisi, iusto mollitia omnis asperiores, esse distinctio tempore, est et!</p>

                                    <div class="col-md-6">
                                    <h5><strong>Assigned Proffessors</strong></h5>
                                    <ul>
                                        <li>Dr. Zhivago</li>
                                        <li>Dr. Hannibal</li>
                                    </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h5><strong>Assigned TAs</strong></h5>
                                        <ul>
                                            <li>Al Neri</li>
                                            <li>Paulie Gualteri</li>
                                            <li>Frank Pentangli</li>
                                        </ul>
                                    </div>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit Course</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Edit Course</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Course Title</label>
                                  <input type="text" class="form-control" placeholder="Enter Course Title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Course Code</label>
                                    <input type="text" class="form-control" placeholder="Enter Course Code">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Course Total Grade</label>
                                    <input type="number" max="100" class="form-control" placeholder="Enter Course Total grade">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Course Start Date</label>
                                    <input type="date" class="form-control" placeholder="Enter Course Code">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Course End Date</label>
                                    <input type="date" class="form-control" placeholder="Enter Course Code">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Course Description</label>
                                    <textarea class="form-control" rows="5" id="comment"></textarea>
                                </div>
                                <div class="form-group">
                                    <div id="list1" class="dropdown-check-list" tabindex="100">
                                        <span class="anchor">Assign Proffessors</span>
                                        <ul class="items">
                                          <li><input type="checkbox" checked /> Dr. Hannibal </li>
                                          <li><input type="checkbox" /> Dr. No</li>
                                          <li><input type="checkbox" /> Dr. Strange </li>
                                          <li><input type="checkbox" /> Dr. Zhivago </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div id="list2" class="dropdown-check-list" tabindex="100">
                                        <span class="anchor">Assign Teaching Assistants</span>
                                        <ul class="items">
                                          <li><input type="checkbox" checked /> Jesse Pinkman </li>
                                          <li><input type="checkbox" /> Miss Moneypenny</li>
                                          <li><input type="checkbox" /> Gale Boetticher </li>
                                          <li><input type="checkbox" /> Al Neri </li>
                                          <li><input type="checkbox" /> Paulie Gualteri </li>
                                          <li><input type="checkbox" /> Frank Pentangli </li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                            <form>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Course Title</label>
                                  <input type="text" class="form-control" placeholder="Enter Course Title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Course Code</label>
                                    <input type="text" class="form-control" placeholder="Enter Course Code">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Course Description</label>
                                    <textarea class="form-control" rows="5" id="comment"></textarea>
                                </div>
                                <div class="form-group">
                                    <div id="list3" class="dropdown-check-list" tabindex="100">
                                        <span class="anchor">Assign Proffessors</span>
                                        <ul class="items">
                                          <li><input type="checkbox" /> Dr. Hannibal </li>
                                          <li><input type="checkbox" /> Dr. No</li>
                                          <li><input type="checkbox" /> Dr. Strange </li>
                                          <li><input type="checkbox" /> Dr. Zhivago </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div id="list4" class="dropdown-check-list" tabindex="100">
                                        <span class="anchor">Assign Teaching Assistants</span>
                                        <ul class="items">
                                          <li><input type="checkbox" /> Jesse Pinkman </li>
                                          <li><input type="checkbox" /> Miss Moneypenny</li>
                                          <li><input type="checkbox" /> Gale Boetticher </li>
                                          <li><input type="checkbox" /> Al Neri </li>
                                          <li><input type="checkbox" /> Paulie Gualteri </li>
                                          <li><input type="checkbox" /> Frank Pentangli </li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Publish Course</button>
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
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">CSC 105</label>
                                            <br>
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">CSC 104</label>
                                            

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