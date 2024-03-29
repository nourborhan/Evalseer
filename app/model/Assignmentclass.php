<?php
require_once("../app/model/model.php");



class Assignment extends model{

    protected $studentid;
    protected $courseid;
    protected $assignmentid;
    protected $assignmentgrade;
    protected $assignmenttimecreated;
    protected $nbofsubmissions;
    protected $assignmentdesc;
    protected $assignmentname;
    protected $filepath;
    protected $submissiondate;
    protected $submitted;
    protected $grade;
    protected $assignmentstartdate;
    protected $assignmentcutoffdate;
    protected $inputvars=array();
    protected $expectedoutput=array();
    protected $compilingweight;
    protected $syntaxweight;
    protected $logicweight;
    protected $styleweight;
    protected $stylefeedback;
    protected $compilefeedback;
    protected $logicfeedback;
    protected $syntaxfeedback;


    function __construct()
    {
        $this->dbh=$this->connect();
    }
    
    function gettestcase($id)
    {

        $sql="select * from test_case  where AssignmentsID='$id'";
        $result=mysqli_query($this->db->getConn(),$sql);
        while($row=$result->fetch_assoc())
        {
            array_push($this->inputvars,$row['Input_variable']);
            array_push($this->expectedoutput,$row['Expected_output']);
        }
    }

    function getgrades($id)
    {
        $sql="select * from gradingcriteria join assignments on gradingcriteria.FeaturesID=assignments.GradingcriteriaID where assignments.AssignmentID='$id'";
        $result=mysqli_query($this->db->getConn(),$sql);
        while($row=$result->fetch_assoc())
        {
            $this->compilingweight=$row['Compiling_weight'];
            $this->syntaxweight=$row['Syntax_weight'];
            $this->logicweight=$row['Logic_weight'];
            $this->styleweight=$row['Styling_weight'];
        }
    }

   
    
   

    /**
     * Get the value of studentid
     */ 
    public function getStudentid()
    {
        return $this->studentid;
    }

    /**
     * Set the value of studentid
     *
     * @return  self
     */ 
    public function setStudentid($studentid)
    {
        $this->studentid = $studentid;

        return $this;
    }

    /**
     * Get the value of courseid
     */ 
    public function getCourseid()
    {
        return $this->courseid;
    }

    /**
     * Set the value of courseid
     *
     * @return  self
     */ 
    public function setCourseid($courseid)
    {
        $this->courseid = $courseid;

        return $this;
    }

    /**
     * Get the value of assignmentid
     */ 
    public function getAssignmentid()
    {
        return $this->assignmentid;
    }

    /**
     * Set the value of assignmentid
     *
     * @return  self
     */ 
    public function setAssignmentid($assignmentid)
    {
        $this->assignmentid = $assignmentid;

        return $this;
    }

    /**
     * Get the value of assignmentgrade
     */ 
    public function getAssignmentgrade()
    {
        return $this->assignmentgrade;
    }

    /**
     * Set the value of assignmentgrade
     *
     * @return  self
     */ 
    public function setAssignmentgrade($assignmentgrade)
    {
        $this->assignmentgrade = $assignmentgrade;

        return $this;
    }

    /**
     * Get the value of assignmenttimecreated
     */ 
    public function getAssignmenttimecreated()
    {
        return $this->assignmenttimecreated;
    }

    /**
     * Set the value of assignmenttimecreated
     *
     * @return  self
     */ 
    public function setAssignmenttimecreated($assignmenttimecreated)
    {
        $this->assignmenttimecreated = $assignmenttimecreated;

        return $this;
    }

    /**
     * Get the value of nbofsubmissions
     */ 
    public function getNbofsubmissions()
    {
        return $this->nbofsubmissions;
    }

    /**
     * Set the value of nbofsubmissions
     *
     * @return  self
     */ 
    public function setNbofsubmissions($nbofsubmissions)
    {
        $this->nbofsubmissions = $nbofsubmissions;

        return $this;
    }

    /**
     * Get the value of assignmentdesc
     */ 
    public function getAssignmentdesc()
    {
        return $this->assignmentdesc;
    }

    /**
     * Set the value of assignmentdesc
     *
     * @return  self
     */ 
    public function setAssignmentdesc($assignmentdesc)
    {
        $this->assignmentdesc = $assignmentdesc;

        return $this;
    }

    /**
     * Get the value of assignmentname
     */ 
    public function getAssignmentname()
    {
        return $this->assignmentname;
    }

    /**
     * Set the value of assignmentname
     *
     * @return  self
     */ 
    public function setAssignmentname($assignmentname)
    {
        $this->assignmentname = $assignmentname;

        return $this;
    }

    /**
     * Get the value of submitted
     */ 
    public function getSubmitted()
    {
        return $this->submitted;
    }

    /**
     * Set the value of submitted
     *
     * @return  self
     */ 
    public function setSubmitted($submitted)
    {
        $this->submitted = $submitted;

        return $this;
    }

    /**
     * Get the value of filepath
     */ 
    public function getFilepath()
    {
        return $this->filepath;
    }

    /**
     * Set the value of filepath
     *
     * @return  self
     */ 
    public function setFilepath($filepath)
    {
        $this->filepath = $filepath;

        return $this;
    }

    /**
     * Get the value of submissiondate
     */ 
    public function getSubmissiondate()
    {
        return $this->submissiondate;
    }

    /**
     * Set the value of submissiondate
     *
     * @return  self
     */ 
    public function setSubmissiondate($submissiondate)
    {
        $this->submissiondate = $submissiondate;

        return $this;
    }

    /**
     * Set the value of grade
     *
     * @return  self
     */ 
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get the value of grade
     */ 
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Get the value of assignmentstartdate
     */ 
    public function getAssignmentstartdate()
    {
        return $this->assignmentstartdate;
    }

    /**
     * Set the value of assignmentstartdate
     *
     * @return  self
     */ 
    public function setAssignmentstartdate($assignmentstartdate)
    {
        $this->assignmentstartdate = $assignmentstartdate;

        return $this;
    }

    /**
     * Get the value of assignmentcutoffdate
     */ 
    public function getAssignmentcutoffdate()
    {
        return $this->assignmentcutoffdate;
    }

    /**
     * Set the value of assignmentcutoffdate
     *
     * @return  self
     */ 
    public function setAssignmentcutoffdate($assignmentcutoffdate)
    {
        $this->assignmentcutoffdate = $assignmentcutoffdate;

        return $this;
    }

    /**
     * Get the value of expectedoutput
     */ 
    public function getExpectedoutput()
    {
        return $this->expectedoutput;
    }

    /**
     * Set the value of expectedoutput
     *
     * @return  self
     */ 
    

    /**
     * Get the value of inputvars
     */ 
    public function getInputvars()
    {
        return $this->inputvars;
    }

    /**
     * Set the value of inputvars
     *
     * @return  self
     */ 
  

    /**
     * Set the value of inputvars
     *
     * @return  self
     */ 
    public function setInputvars($inputvars)
    {
        $this->inputvars = $inputvars;

        return $this;
    }

    /**
     * Set the value of expectedoutput
     *
     * @return  self
     */ 
    public function setExpectedoutput($expectedoutput)
    {
        $this->expectedoutput = $expectedoutput;

        return $this;
    }

    /**
     * Get the value of styleweight
     */ 
    public function getStyleweight()
    {
        return $this->styleweight;
    }

    /**
     * Set the value of styleweight
     *
     * @return  self
     */ 
    public function setStyleweight($styleweight)
    {
        $this->styleweight = $styleweight;

        return $this;
    }

    /**
     * Get the value of logicweight
     */ 
    public function getLogicweight()
    {
        return $this->logicweight;
    }

    /**
     * Set the value of logicweight
     *
     * @return  self
     */ 
    public function setLogicweight($logicweight)
    {
        $this->logicweight = $logicweight;

        return $this;
    }

    /**
     * Get the value of syntaxweight
     */ 
    public function getSyntaxweight()
    {
        return $this->syntaxweight;
    }

    /**
     * Set the value of syntaxweight
     *
     * @return  self
     */ 
    public function setSyntaxweight($syntaxweight)
    {
        $this->syntaxweight = $syntaxweight;

        return $this;
    }

    /**
     * Get the value of compilingweight
     */ 
    public function getCompilingweight()
    {
        return $this->compilingweight;
    }

    /**
     * Set the value of compilingweight
     *
     * @return  self
     */ 
    public function setCompilingweight($compilingweight)
    {
        $this->compilingweight = $compilingweight;

        return $this;
    }

    /**
     * Get the value of stylefeedback
     */ 
    public function getStylefeedback()
    {
        return $this->stylefeedback;
    }

    /**
     * Set the value of stylefeedback
     *
     * @return  self
     */ 
    public function setStylefeedback($stylefeedback)
    {
        $this->stylefeedback = $stylefeedback;

        return $this;
    }

    /**
     * Get the value of compilefeedback
     */ 
    public function getCompilefeedback()
    {
        return $this->compilefeedback;
    }

    /**
     * Set the value of compilefeedback
     *
     * @return  self
     */ 
    public function setCompilefeedback($compilefeedback)
    {
        $this->compilefeedback = $compilefeedback;

        return $this;
    }

    /**
     * Get the value of logicfeedback
     */ 
    public function getLogicfeedback()
    {
        return $this->logicfeedback;
    }

    /**
     * Set the value of logicfeedback
     *
     * @return  self
     */ 
    public function setLogicfeedback($logicfeedback)
    {
        $this->logicfeedback = $logicfeedback;

        return $this;
    }

    /**
     * Get the value of syntaxfeedback
     */ 
    public function getSyntaxfeedback()
    {
        return $this->syntaxfeedback;
    }

    /**
     * Set the value of syntaxfeedback
     *
     * @return  self
     */ 
    public function setSyntaxfeedback($syntaxfeedback)
    {
        $this->syntaxfeedback = $syntaxfeedback;

        return $this;
    }
}

?>