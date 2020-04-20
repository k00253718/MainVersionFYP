<?php

/*
 * CLASS: REGISTER 
 *
 * THIS CLASS PROCESSES A USER REGISTRATION FORM 
 *
 * @AUTHOR: ONYENZE CLINTON
 * 
 */

class Register extends Model{
    
    //CLASS PROPERTIES
    private $db;                                 //MYSQLI OBJECT: THE DATABASE CONNECTION 
    private $user;                               //OBJECT OF USER CLASS
    private $pageTitle;                          //STRING: CONTAINING PAGE TITLE
    private $pageHeading;                        //STRING: CONTAINING PAGE HEADING
    private $postArray;                          //ARRAY: CONTAINING COPY OF $_POST ARRAY 
    private $panelHead_1;                        //STRING: PANEL 1 HEADING 
    private $panelHead_2;                        //STRING: PANEL 2 HEADING 
    private $panelHead_3;                        //STRING: PANEL 3 HEADING 
    private $panelContent_1;                     //STRING: PANEL 1 CONTENT
    private $panelContent_2;                     //STRING: PANEL 2 CONTENT     
    private $panelContent_3;                     //STRING: PANEL 3 CONTENT       
        
    //CLASS METHODS
    
    //METHOD: CONSTRUCTOR 
	
    function __construct($postArray,$pageTitle,$pageHead,$database, $user){   
            
        parent::__construct($user->getLoggedinState());
            
        $this->db=$database;

        $this->user=$user;
            
    //SET THE PAGE TITLE
        
        $this->setPageTitle($pageTitle);
            
    //SET THE PAGE HEADING
            
        $this->setPageHeading($pageHead);

    //GET THE POST ARRAY
            
        $this->postArray=$postArray;
            
    //SET THE FIRST PANEL CONTENT
            
        $this->setPanelHead_1();                        //LEFT PANEL HEADING
            
        $this->setPanelContent_1();                     //LEFT PANEL CONTENT


    //SET THE SECOND PANEL CONTENT
            
        $this->setPanelHead_2();                        //MIDDLE PANEL HEADING
            
        $this->setPanelContent_2();                     //MIDDLE PANEL CONTENT
        
    //SET THE THIRD PANEL CONTENT
            
        $this->setPanelHead_3();                        //RIGHT PANEL HEADING   
            
        $this->setPanelContent_3();                     //RIGHT PANEL CONTENT
	
        
    }//END METHOD: CONSTRUCTOR 
        
    //SETTER METHODS
        
    //HEADINGS
        
    public function setPageTitle($pageTitle){          //SET THE PAGE TITLE    
                
    $this->pageTitle=$pageTitle;
        
    }//END METHOD - SET THE PAGE TITLE   
    
        
    public function setPageHeading($pageHead){         //SET THE PAGE HEADING   
                
    $this->pageHeading=$pageHead;
        
    }//END METHOD - SET THE PAGE HEADING
        
        
//PANEL 1
    
    public function setPanelHead_1(){               //SET THE PANEL 1 HEADING 
            
    $this->panelHead_1='<h3>REGISTRATION FORM</h3>';       
        
    }//END METHOD - //SET THE PANEL 1 HEADING 
    
    
    public function setPanelContent_1(){            //SET THE PANEL 1 CONTENT                                   
             
    $this->panelContent_1 = file_get_contents('forms/clinton_form_SignUp.html');      //EXTERNAL FILE READER FROM FORM FOLDER INTO THE STRING 
        
    }//END METHOD - SET THE PANEL 1 CONTENT   
    
    
//PANEL 2
    
    public function setPanelHead_2(){               //SET THE PANEL 2 HEADING        
            
    $this->panelHead_2='<h3>REGISTRATION RESULT </h3>'; 
            
    }//END METHOD - //SET THE PANEL 2 HEADING   
    
        
    public function setPanelContent_2(){            //SET THE PANEL 2 CONTENT 
            
    //PROCESS THE REGISTRATION BUTTON 
            
    if (isset($this->postArray['btn'])){            //CHECK THE BUTTON IS PRESSED 
                
    if ($this->postArray['studentPassword1']===$this->postArray['studentPassword2']){         //VERIFY PASSWORDS MATCH
                    
    //PROCESS THE REGISTRATION DATA
                    
    $this->panelContent_2='Passwords Match<br>';
                    
    $this->panelContent_2.='email   : '.$this->postArray['email'].'<br>';
                    
    $this->panelContent_2.='Firstname : '.$this->postArray['FirstName'].'<br>';
                    
    $this->panelContent_2.='Lastname  : '.$this->postArray['LastName'].'<br>';
                    
    $this->panelContent_2.='Password1 : '.$this->postArray['studentPassword1'].'<br>';
                    
    $this->panelContent_2.='Password2 : '.$this->postArray['studentPassword2'].'<br>';
    
    $this->panelContent_2.='Gender : '.$this->postArray['gender'].'<br>';
    
    $this->panelContent_2.='Country : '.$this->postArray['country'].'<br>';
    
    $this->panelContent_2.='Date of Birth : '.$this->postArray['day'].$this->postArray['month'].$this->postArray['year'].'<br>';
    
    $this->panelContent_2.='Best Friend Name : '.$this->postArray['best_friend_name'].'<br>';
    
    
                    
                    
    if ($this->user->register($this->postArray)){          //CALL THE USER: REGISTRATION()METHOD 
                        
    $this->panelContent_2.='REGISTRATION SUCCESSFUL - please log in<br>';
                    
    }
    
    else{
                        
    $this->panelContent_2.='REGISTRATION NOT SUCCESSFUL - '.$this->user->getErrMsg().'<br>';
                        
    }
                    
    }
                
    else{
                   
    $this->panelContent_2='Passwords DONT Match<br>';
        
    $this->panelContent_2.='email   : '.$this->postArray['email'].'<br>';
                    
    $this->panelContent_2.='Firstname : '.$this->postArray['FirstName'].'<br>';
                    
    $this->panelContent_2.='Lastname  : '.$this->postArray['LastName'].'<br>';
                    
    $this->panelContent_2.='Password1 : '.$this->postArray['studentPassword1'].'<br>';
                    
    $this->panelContent_2.='Password2 : '.$this->postArray['studentPassword2'].'<br>';
    
    $this->panelContent_2.='Gender : '.$this->postArray['gender'].'<br>';
    
    $this->panelContent_2.='Country : '.$this->postArray['country'].'<br>';
    
    $this->panelContent_2.='Date of Birth : '.$this->postArray['day'].$this->postArray['month'].$this->postArray['year'].'<br>';               
                
    }
            
    }
            
    else{
                
        $this->panelContent_2='Please enter details in the form';
            
    }           
        
    }//END METHOD - SET THE PANEL 2 CONTENT   
        
//PANEL 3
        
    public function setPanelHead_3(){               //SET THE PANEL 3 HEADING 
            
    if($this->loggedin){
                
    $this->panelHead_3='<h3>Panel 3</h3>';   
            
    }
            
    else{        
                
    $this->panelHead_3='<h3>Panel 3</h3>'; 
            
    }
        
    } //END METHOD -SET THE PANEL 3 HEADING 
        
    public function setPanelContent_3(){            //SET THE PANEL 2 CONTENT 
            
    if($this->loggedin){
                
    $this->panelContent_3='Panel 3 content - unser construction (user logged in)';
            
    }
            
    else{        
                
    $this->panelContent_3='Panel 3 content - unser construction (user not logged in)';
            
    }
        }  //END METHOD -SET THE PANEL 2 CONTENT         
       

    //GETTER METHODS
        
    public function getPageTitle(){return $this->pageTitle;}
    public function getPageHeading(){return $this->pageHeading;}
    public function getMenuNav(){return $this->menuNav;}
    public function getPanelHead_1(){return $this->panelHead_1;}
    public function getPanelContent_1(){return $this->panelContent_1;}
    public function getPanelHead_2(){return $this->panelHead_2;}
    public function getPanelContent_2(){return $this->panelContent_2;}
    public function getPanelHead_3(){return $this->panelHead_3;}
    public function getPanelContent_3(){return $this->panelContent_3;}
    public function getUser(){return $this->user;}

        
}//END CLASS
        

?>

