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

class JobApplicationUnderC extends Model{

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
            $this->panelHead_1='<h3>APPLY FOR POSITION</h3>';   
        }
        else{        
            $this->panelHead_1='<h3>APPLY FOR POSITION</h3>'; 
        }       
    }//end METHOD - //set the panel 1 heading
    public function setPanelContent_1(){//set the panel 1 content
        if($this->loggedin){
            $this->panelContent_1=file_get_contents('forms/job-application.html');
        }
        else{        
            $this->panelContent_1='PLEASE LOGIN TO CONTINUE APPLICATION';
        }
    }//end METHOD - //set the panel 1 content        

    //Panel 2
    public function setPanelHead_2(){ //set the panel 2 heading
        if($this->loggedin){
            $this->panelHead_2='<h3>APPLICATION CONFIRMATION</h3>';   
        }
        else{        
            $this->panelHead_2='<h3>LOGIN TO APPLY</h3>'; 
        }
    }//end METHOD - //set the panel 2 heading        
    public function setPanelContent_2(){//set the panel 2 content
        if($this->loggedin){
            $this->panelContent_2='Please Display Application Details Here'.'</br>'.'</br>';
            $this->panelContent_2.='Display First Name and HTML name is firstname '.'</br>'.'</br>';
            $this->panelContent_2.='Display Last Name and HTML name is lastname'.'</br>'.'</br>';
            $this->panelContent_2.='Display Address and HTML name is address'.'</br>'.'</br>';
            $this->panelContent_2.='Display Email Address and HTML name is email1'.'</br>'.'</br>';
            $this->panelContent_2.='Display Confirmation Email and HTML name is email2 '.'</br>'.'</br>';
            $this->panelContent_2.='Display Mobile Phone and HTML name is phone'.'</br>'.'</br>';
            $this->panelContent_2.='Display County and HTML name is county'.'</br>'.'</br>';
            $this->panelContent_2.='Display Country and HTML name is country'.'</br>'.'</br>';
            $this->panelContent_2.='Display Skills and HTML name is skills'.'</br>'.'</br>';
            $this->panelContent_2.='Display Right to Work and HTML name is right'.'</br>'.'</br>';
            $this->panelContent_2.='Display Cv and HTML name is filename'.'</br>'.'</br>';
            $this->panelContent_2.='Display Consent to Terms&Conditions and HTML name is terms&conditions'.'</br>'.'</br>';
            $this->panelContent_2.='Display Travel Availablility and HTML name is travel'.'</br>'.'</br>';
            $this->panelContent_2.='Display Your Notice Period and HTML name is noticePeriod'.'</br>'.'</br>';
        }
        else{        
            $this->panelContent_2=file_get_contents('forms/clinton_form_signIn.html');
        }
    }//end METHOD - //set the panel 2 content  

    //Panel 3
    public function setPanelHead_3(){ //set the panel 3 heading
        if($this->loggedin){
            $this->panelHead_3='<h3>APPLICATION CONFIRMATION</h3>';   
        }
        else{        
            $this->panelHead_3='<h3>LOGIN TO APPLY</h3>'; 
        }
    } //end METHOD - //set the panel 3 heading
    public function setPanelContent_3(){ //set the panel 2 content
        if($this->loggedin){
            $this->panelContent_3='Please Display Application Details Here';
            $this->panelContent_3.='Display First Name '.'</br>';
            $this->panelContent_3.='Display First Name '.'</br>';
        }
        else{        
            $this->panelContent_3=file_get_contents('forms/clinton_form_signIn.html');
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
        