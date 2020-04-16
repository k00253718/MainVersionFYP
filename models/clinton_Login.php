<?php

/*
 * CLASS: LOGIN MODEL
 *
 * @AUTHOR: ONYENZE CLINTON
 * 
 */

class Login extends Model{
    
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
            
        $this->setPanelHead_1();
            
        $this->setPanelContent_1();


        //SET THE SECOND PANEL CONTENT 
            
        $this->setPanelHead_2();
            
        $this->setPanelContent_2();
        
        
        //SET THE THIRD PANEL CONTENT 
            
        $this->setPanelHead_3();
            
        $this->setPanelContent_3();
        
	}//END METHOD: CONSTRUCTOR 
      
        //SETTER METHODS
        
        //HEADINGS
        
        public function setPageTitle($pageTitle){               //SET THE PAGE TITLE    
                
        $this->pageTitle=$pageTitle;
        
        }//END METHOD - SET THE PAGE TITLE 
        
        
        
        public function setPageHeading($pageHead){              //SET THE PAGE HEADING   
                
        $this->pageHeading=$pageHead;
        
        }//END METHOD - SET THE PAGE HEADING 
        

//PANEL 1
        
        public function setPanelHead_1(){                     //SET THE PANEL 1 HEADING 
            
        if($this->loggedin){  
            
        $this->panelHead_1='<h3>Login Successful</h3>'; 
            
        }
            
        else{        
                
        $this->panelHead_1='<h3>Login Form</h3>'; 
            
        }       
        
        }//END METHOD - SET THE PANEL 1 HEADING 
        
        public function setPanelContent_1(){                //SET THE PANEL 1 CONTENT
            
        if($this->loggedin){                                //DISPLAY THE CALCULATOR FORM
                    
        $this->panelContent_1='Welcome - your login has been successful';      
                
        }
                
        else{                                               //IF USER IS NOT LOGGED IN THEY SEE SOME INFO ABOUT BOOTSTRAP                                   
                    
        $this->panelContent_1 = file_get_contents('forms/clinton_form_signIn.html');  //THIS READS AN EXTERNAL FORM FILE INTO THE STRING
                
        }
        
        }//END METHOD - SET THE PANEL 1 CONTENT        

//PANEL 2
        
        public function setPanelHead_2(){                   //SET THE PANEL 2 HEADING 
            
        if($this->loggedin){
                
        $this->panelHead_2='<h3>Result</h3>';   
            
        }
            
        else{        
                $this->panelHead_2='<h3>Result</h3>'; 
        }
       
        }//END METHOD - SET THE PANEL 2 HEADING      
        
        public function setPanelContent_2(){                //SET THE PANEL 2 CONTENT    
            
        if($this->loggedin){
                 
        $this->panelContent_2= "Welcome ".$this->user->getUserFirstName().' '.$this->user->getUserLastName()."Your Login has been successful! <br>You are logged in as a ". $this->user->getUserType();
            
        }
            
        else{
                
                $this->panelContent_2=$this->user->getErrMsg().'<br> Login attempts ='.$this->user->getLoginAttempts();
        }
            
        }//END METHOD - SET THE PANEL 2 CONTENT   
        
//PANEL 3
        
        public function setPanelHead_3(){                   //SET THE PANEL 3 HEADING 
            
        if($this->loggedin){
                
        $this->panelHead_3='<h3>Panel 3</h3>';   
            
        }
        
        else{        
                $this->panelHead_3='<h3>Panel 3</h3>'; 
        }
        
        } //END METHOD - //SET THE PANEL 3 HEADING 
        
        public function setPanelContent_3(){                //SET THE PANEL PANEL 2 CONTENT 
            
        if($this->loggedin){
                
        $this->panelContent_3='Panel 3 content - unser construction (user logged in)';
            
        }
            else{        
                $this->panelContent_3='Panel 3 content - unser construction (user not logged in)';
            }
            
        }  //END METHOD - SET THE PANEL 2 CONTENT        
       
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
        public function getUser(){return $this->user;
        
        }//END GETTER METHODS

        }//END CLASS

?>

