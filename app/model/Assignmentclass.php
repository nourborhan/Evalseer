<?php



class Assignment{

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
}

?>