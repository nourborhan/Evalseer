<?php



class Course{

    protected $courseid;
    protected $coursecode;
    protected $coursename;
    protected $coursedesc;
    protected $coursestartdate;
    protected $courseenddate;
    protected $active;
    protected $intructorname;
    protected $intructorbio;
    protected $intructortitle;
    protected $doctorflag;
    protected $taflag;
    protected $coursegrade;
    protected $gradetopass;
    public $assignedinstructorsnames = array();
    public $assignedTAssnames = array();
   

   

    

    /**
     * Get the value of taflag
     */ 
    public function getTaflag()
    {
        return $this->taflag;
    }

    /**
     * Set the value of taflag
     *
     * @return  self
     */ 
    public function setTaflag($taflag)
    {
        $this->taflag = $taflag;

        return $this;
    }

    /**
     * Get the value of doctorflag
     */ 
    public function getDoctorflag()
    {
        return $this->doctorflag;
    }

    /**
     * Set the value of doctorflag
     *
     * @return  self
     */ 
    public function setDoctorflag($doctorflag)
    {
        $this->doctorflag = $doctorflag;

        return $this;
    }

    /**
     * Get the value of intructorname
     */ 
    public function getInstructorname()
    {
        return $this->intructorname;
    }

    /**
     * Set the value of intructorname
     *
     * @return  self
     */ 
    public function setInstructorname($intructorname)
    {
        $this->intructorname = $intructorname;

        return $this;
    }

    /**
     * Get the value of active
     */ 
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the value of active
     *
     * @return  self
     */ 
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get the value of courseenddate
     */ 
    public function getCourseenddate()
    {
        return $this->courseenddate;
    }

    /**
     * Set the value of courseenddate
     *
     * @return  self
     */ 
    public function setCourseenddate($courseenddate)
    {
        $this->courseenddate = $courseenddate;

        return $this;
    }

    /**
     * Get the value of coursestartdate
     */ 
    public function getCoursestartdate()
    {
        return $this->coursestartdate;
    }

    /**
     * Set the value of coursestartdate
     *
     * @return  self
     */ 
    public function setCoursestartdate($coursestartdate)
    {
        $this->coursestartdate = $coursestartdate;

        return $this;
    }

    /**
     * Get the value of coursedesc
     */ 
    public function getCoursedesc()
    {
        return $this->coursedesc;
    }

    /**
     * Set the value of coursedesc
     *
     * @return  self
     */ 
    public function setCoursedesc($coursedesc)
    {
        $this->coursedesc = $coursedesc;

        return $this;
    }

    /**
     * Get the value of coursename
     */ 
    public function getCoursename()
    {
        return $this->coursename;
    }

    /**
     * Set the value of coursename
     *
     * @return  self
     */ 
    public function setCoursename($coursename)
    {
        $this->coursename = $coursename;

        return $this;
    }

    /**
     * Get the value of coursecode
     */ 
    public function getCoursecode()
    {
        return $this->coursecode;
    }

    /**
     * Set the value of coursecode
     *
     * @return  self
     */ 
    public function setCoursecode($coursecode)
    {
        $this->coursecode = $coursecode;

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
     * Get the value of intructorbio
     */ 
    public function getInstructorbio()
    {
        return $this->intructorbio;
    }

    /**
     * Set the value of intructorbio
     *
     * @return  self
     */ 
    public function setInstructorbio($intructorbio)
    {
        $this->intructorbio = $intructorbio;

        return $this;
    }

    /**
     * Get the value of intructortitle
     */ 
    public function getInstructortitle()
    {
        return $this->intructortitle;
    }

    /**
     * Set the value of intructortitle
     *
     * @return  self
     */ 
    public function setInstructortitle($intructortitle)
    {
        $this->intructortitle = $intructortitle;

        return $this;
    }

    /**
     * Get the value of coursegrade
     */ 
    public function getCoursegrade()
    {
        return $this->coursegrade;
    }

    /**
     * Set the value of coursegrade
     *
     * @return  self
     */ 
    public function setCoursegrade($coursegrade)
    {
        $this->coursegrade = $coursegrade;

        return $this;
    }

    /**
     * Get the value of gradetopass
     */ 
    public function getGradetopass()
    {
        return $this->gradetopass;
    }

    /**
     * Set the value of gradetopass
     *
     * @return  self
     */ 
    public function setGradetopass($gradetopass)
    {
        $this->gradetopass = $gradetopass;

        return $this;
    }
}

?>