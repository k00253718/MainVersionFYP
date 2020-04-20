<?php
/**
 * Class: UnderConstruction
 * 
 * This is a template/empty class that provides 'under construction' content.
 * 
 * It handles bot logged in and not logged in usee cases. 
 *
 * @AUTHOR: CLINTON ONYENZE
 * 
 */

class ViewApplicantUnderC extends Model{

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
            $this->panelHead_1='<h3>VIEW JOB APPLICATIONS</h3>';   
        }
        else{        
            $this->panelHead_1='<h3>LOGIN TO VIEW APPLICATIONS</h3>'; 
        }       
    }//end METHOD - //set the panel 1 heading
    public function setPanelContent_1(){//set the panel 1 content
        if($this->loggedin){
            $this->panelContent_1=file_get_contents('forms/view-applicant.html');
        }
        else{        
            $this->panelContent_1=file_get_contents('forms/clinton_form_signIn.html'); 
        }
    }//end METHOD - //set the panel 1 content        

    //Panel 2
    public function setPanelHead_2(){ //set the panel 2 heading
        if($this->loggedin){
            $this->panelHead_2='<h3>FULL APPLICATION DETAILS</h3>';   
        }
        else{        
            $this->panelHead_2='<h3>FULL APPLICATION DETAILS</h3>'; 
        }
    }//end METHOD - //set the panel 2 heading        
    public function setPanelContent_2(){//set the panel 2 content
        if($this->loggedin){
			
            $this->panelContent_2='JOB ID and HTML name is jobID'.'</br>'.'</br>';
			
			 $this->panelContent_2.='First Name and HTML name is firstname'.'</br>'.'</br>';
			 
			 $this->panelContent_2.='Last Name and HTML name is lastname'.'</br>'.'</br>';
			 
			 $this->panelContent_2.='Address and HTML name is address'.'</br>'.'</br>';
			 
			 $this->panelContent_2.='Email Address and HTML name is email1'.'</br>'.'</br>';
			 
			 $this->panelContent_2.='Email Confirmation and HTML name is email2'.'</br>'.'</br>';
			 
			 $this->panelContent_2.='Mobile Phone and HTML name is phone'.'</br>'.'</br>';
			 
			 $this->panelContent_2.='County and HTML name is county'.'</br>'.'</br>';
			 
			 $this->panelContent_2.='Country and HTML name is country'.'</br>'.'</br>';
			 
			 $this->panelContent_2.='Tell us why you think you would be suitable for this role and HTML name is skills'.'</br>'.'</br>';
			 
			 $this->panelContent_2.='Do you hold EU Citizenship or have the right to work full-time in Ireland? and HTML name is right'.'</br>'.'</br>';
			 
			 $this->panelContent_2.='Applicant CV and HTML name is filename'.'</br>'.'</br>';
			 
			 $this->panelContent_2.=' I give consent for the Company to manage my personal data in accordance with our privacy policy and HTML name is terms&conditions'.'</br>'.'</br>';
			 
			 $this->panelContent_2.='Are you available to travel? and HTML name is travel'.'</br>'.'</br>';
			 
			$this->panelContent_2.='What is your notice period? and HTML name is notice period'.'</br>'.'</br>'; 
        }
        else{        
            $this->panelContent_2='PLEASE LOGIN TO VIEW FULL APPLICATION DETAILS';
        }
    }//end METHOD - //set the panel 2 content  

    //Panel 3
    public function setPanelHead_3(){ //set the panel 3 heading
        if($this->loggedin){
            $this->panelHead_3='<h3>LIST OF JOB APPLICANTS</h3>'; 
        }
        else{        
            $this->panelHead_3='<h3>LIST OF JOB APPLICANTS</h3>'; 
        }
    } //end METHOD - //set the panel 3 heading
    public function setPanelContent_3(){ //set the panel 2 content
        if($this->loggedin){
            $this->panelContent_3='INSERT THE STUDENT ID OF APPLICANTS'.'</br>'.'</br>';
			
			$this->panelContent_3.='INSERT A BUTTON TO VIEW STUDENT APPLICATION ON PANEL PANEL 2'.'</br>';
        }
        else{        
            $this->panelContent_3='PLEASE LOGIN TO VIEW LIST OF APPLICANTS';
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
        