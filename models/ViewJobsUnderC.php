<?php
/**
 * CLASS: VIEW JOBS UNDER CONSTRUCTION
 * 
 * THIS IS THE CLASS THAT THE STUDENTS USES TO VIEW THE JOBS OPPORTUNITIES PAGE.
 * 
 * IT HANDLES BOTH LOGGED IN AND NOT LOGGED IN STUDENTS. 
 *
 * @AUTHOR: CLINTON ONYENZE
 * 
 */

class ViewJobsUnderC extends Model{

//CLASS properties
    private $pageTitle;         //String: containing page title
    private $pageHeading;       //String: Containing Page Heading
    private $user;              //User: Containning reference to user class object
    private $panelHead_1;       //String: Panel 1 Heading
    private $panelHead_2;       //String: Panel 2 Heading
    private $panelHead_3;       //String: Panel 3 Heading
    private $panelContent_1;    //String: Panel 1 Content
    private $panelContent_2;    //String: Panel 2 Content     
    private $panelContent_3;    //String: Panel 3 Content    

//CLASS methods	

    //METHOD: constructor 
    //$home = new Home($this->user, $this->pageTitle, strtoupper($this->getArray['pageID']));
    function __construct($user,$pageTitle,$pageHead) {  
        
        $this->user=$user;
        
        parent::__construct($this->user->getLoggedinState());

        //set the PAGE title
        $this->setPageTitle($pageTitle);

        //set the PAGE heading
        $this->setPageHeading($pageHead);

        //set the FIRST panel content
        $this->setPanelHead_1();
        $this->setPanelContent_1();


        //set the DECOND panel content
        $this->setPanelHead_2();
        $this->setPanelContent_2();

        //set the THIRD panel content
        $this->setPanelHead_3();
        $this->setPanelContent_3();
    }
    //END METHOD: constructor 

    //setter methods
    
    //headings
    public function setPageTitle($pageTitle){ //set the page title    
            $this->pageTitle=$pageTitle;
    }  //end METHOD -   set the page title       
    public function setPageHeading($pageHead){ //set the page heading  
            $this->pageHeading=$pageHead;
    }  //end METHOD -   set the page heading

    //Panel 1
    public function setPanelHead_1(){//set the panel 1 heading
        if($this->loggedin){
            $this->panelHead_1='<h3>FILTER JOBS</h3>';   
        }
        else{        
            $this->panelHead_1='<h3>LOGIN TO FILTER JOBS</h3>'; 
        }       
    }//end METHOD - //set the panel 1 heading
    public function setPanelContent_1(){//set the panel 1 content
        if($this->loggedin){
            $this->panelContent_1=file_get_contents('forms/view-job.html');
        }
        else{        
            $this->panelContent_1=file_get_contents('forms/clinton_form_signIn.html');
        }
    }//end METHOD - //set the panel 1 content        

    //Panel 2
    public function setPanelHead_2(){ //set the panel 2 heading
        if($this->loggedin){
            $this->panelHead_2='<h3>JOB FULL DESCRIPTION</h3>';   
        }
        else{        
            $this->panelHead_2='<h3>JOB FULL DESCRIPTION</h3>'; 
        }
    }//end METHOD - //set the panel 2 heading        
    public function setPanelContent_2(){//set the panel 2 content
        if($this->loggedin){
            $this->panelContent_2='Please Display Job ID and HTML name is jobID'.'<br>'.'</br>';
            $this->panelContent_2='Please Display Job Title and HTML name is jobTitle'.'<br>'.'</br>';
            $this->panelContent_2.='Please Display Company Name and HTML name is companyName'.'<br>'.'</br>';
            $this->panelContent_2.='Please Display Job Location and HTML name is jobLocation'.'<br>'.'</br>';
            $this->panelContent_2.='Please Display Job Description and HTML name is jobDescription'.'<br>'.'</br>';
            $this->panelContent_2.='Please Display Job Salary and HTML name is jobSalary'.'<br>'.'</br>';
            $this->panelContent_2.='Please Display Job Duration and HTML name is jobDuration'.'<br>'.'</br>';
            $this->panelContent_2.='Please Display Job Type and HTML name is jobType'.'<br>'.'</br>';
            $this->panelContent_2.='Please Display Job Qualification and HTML name is qualifications'.'<br>'.'</br>'.'</br>';
            
            $this->panelContent_2.='Please insert a button to allow user to apply to this particular job';
        }
        else{        
            $this->panelContent_2='Please Login to view available work placement opportunities';
        }
    }//end METHOD - //set the panel 2 content  

    //Panel 3
    public function setPanelHead_3(){ //set the panel 3 heading
        if($this->loggedin){
            $this->panelHead_3='<h3>JOB BRIEF</h3>';   
        }
        else{        
            $this->panelHead_3='<h3>JOB BRIEF</h3>'; 
        }
    } //end METHOD - //set the panel 3 heading
    
    public function setPanelContent_3(){ //set the panel 2 content
        if($this->loggedin){
            $this->panelContent_3='Please Display Job Title '.'<br>'.'</br>';
            $this->panelContent_3.='Please Display Company Name '.'<br>'.'</br>';
            $this->panelContent_3.='Please Display Job Location '.'<br>'.'</br>';
            $this->panelContent_3.='Please Insert a button to view full details to the Job on Panel 2 '.'</br>';
        }
        else{        
            $this->panelContent_3='Please Login to view available work placement opportunities';
        }
    }  //end METHOD - //set the panel 2 content 
   
    //getter methods
    public function getPageTitle(){return $this->pageTitle;}
    public function getPageHeading(){return $this->pageHeading;}
    public function getMenuNav(){return $this->menuNav;}
    public function getPanelHead_1(){return $this->panelHead_1;}
    public function getPanelContent_1(){return $this->panelContent_1;}
    public function getPanelHead_2(){return $this->panelHead_2;}
    public function getPanelContent_2(){return $this->panelContent_2;}
    public function getPanelHead_3(){return $this->panelHead_3;}
    public function getPanelContent_3(){return $this->panelContent_3;}
        

        
}//end class
        