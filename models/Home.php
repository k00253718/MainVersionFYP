<?php
/**
 * CLASS: HOME
 * 
 * BOTH STUDENT AND PLACEMENT OFFICER HOME 
 * 
 * THIS CLASS IS USED TO GENERATE TEXT CONTENT FOR THE HOME PAGE VIEW.
 * 
 * THIS IS THE LANDING PAGE FOR THE WEB APPLICATION.  
 * 
 * IT HANDLES BOTH LOGGED IN AND NOT LOGGED IN USER CASES AND ADMINISTRATORS AND CUSTOMER USER TYPES.
 *
 * @AUTHOR: ONYENZE CLINTON
 * 
 */

class Home extends Model{
    
//CLASS properties
        private $db;                //MySQLi object: the database connection ( 
        private $user;              //object of User class
        private $pageTitle;         //String: containing page title
        private $pageHeading;       //String: Containing Page Heading
        private $panelHead_1;       //String: Panel 1 Heading
        private $panelHead_2;       //String: Panel 2 Heading
        private $panelHead_3;       //String: Panel 3 Heading
        private $panelContent_1;    //String: Panel 1 Content
        private $panelContent_2;    //String: Panel 2 Content     
        private $panelContent_3;    //String: Panel 3 Content
    
//CLASS methods
        //METHOD: constructor 
	function __construct($user,$pageTitle,$pageHead){   
            parent::__construct($user->getLoggedInState());
            $this->user=$user;

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
      
        //SETTER METHODS
        
        //Headings
        public function setPageTitle($pageTitle){ //set the page title    
                $this->pageTitle=$pageTitle;
        }  //end METHOD -   set the page title       
        public function setPageHeading($pageHead){ //set the page heading  
                $this->pageHeading=$pageHead;
        }  //end METHOD -   set the page heading
        
        //Panel 1
        public function setPanelHead_1(){//set the panel 1 heading
                $this->panelHead_1='<h2>WORK PLACEMENT APP</h2>';
        }//end METHOD - //set the panel 1 heading
    public function setPanelContent_1(){//set the panel 1 content
            if($this->loggedin){                
                if ($this->user->getUserType()==='ADMINISTRATOR'){ //A Lecturer is logged in 
                    $this->panelContent_1='<h4>WELCOME TO ADMIN HOMEPAGE</h4>';
                    $this->panelContent_1.=''; 
                    $this->panelContent_1.=file_get_contents('forms/Diary.html');
                }
                else{//A Student is logged in 
                    $this->panelContent_1='<h4>WELCOME TO STUDENT HOMEPAGE</h4>';
                    $this->panelContent_1.='';
                    $this->panelContent_1.=file_get_contents('forms/Diary.html');
                }
            }
            else{ //User is not logged in
                
                $this->panelContent_1='<p>YOU NEED TO REGISTER AS A STUDENT OR PLACEMENT OFFICER.'; 
             
				$this->panelContent_1.='<img src="images/General-Homepage.jpg" alt="HomePage" /> ';
			 
                $this->panelContent_1.= file_get_contents('forms/homeLeft.html');  
            }
        }//end METHOD - //set the panel 1 content        

        //Panel 2
        public function setPanelHead_2(){ //set the panel 2 heading
            if($this->loggedin){
                $this->panelHead_2='<h3>HELLO !!!</h3>';
            }
            else{        
                $this->panelHead_2='<h2>FOOTER INFORMATION</h2>';
            }
        }//end METHOD - //set the panel 2 heading    
        public function setPanelContent_2(){//set the panel 2 content
            //get the Middle panel content
            if($this->loggedin){
                
                if ($this->user->getUserType()==='ADMINISTRATOR'){ //A Placement officer is logged in
                    $this->panelContent_2=' Thank you ' .$this->user->getUserFirstName().' '. $this->user->getUserLastName() .' for logging in successfully as PLACEMENT OFFICER and ADMINISTRATOR.'.'</br>'.'</br>';
                    $this->panelContent_2.='<img src="images/placement-officers.jpg" alt="placement-officers" /> '.'<br/>'.'</br>'.'</br>';
                    $this->panelContent_2.='<h3>USER FUNCTIONALITIES</h3>'.'</br>';
                    $this->panelContent_2.='Post Available Work Placement Opportunities'.'</br>'.'</br>';
                    $this->panelContent_2.='View Job Applicants'.'</br>'.'</br>';
                    $this->panelContent_2.='Chat with Other Users through the Chat Room'.'</br>'.'</br>';
                    $this->panelContent_2.='Don\'t forget to LOGOUT when you are done';
                }
                else{ //a Student is logged in
                    $this->panelContent_2=' Thank you ' .$this->user->getUserFirstName().' '. $this->user->getUserLastName() .' for logging in successfully as a STUDENT.'.'</br>'.'</br>';
                    $this->panelContent_2.='<img src="images/students.jpg" alt="students" /> '.'</br>'.'</br>'.'</br>';
                    $this->panelContent_2.='<h3>USER FUNCTIONALITIES</h3>'.'</br>';
                    $this->panelContent_2.='View Available Work Placement Opportunities'.'</br>'.'</br>';
                    $this->panelContent_2.='Apply Available Work Placement Opportunities'.'</br>'.'</br>';
                    $this->panelContent_2.='Chat with Other Users through the Chat Room'.'</br>'.'</br>';
                    $this->panelContent_2.='Don\'t forget to LOGOUT when you are done';
                }   
            }
            else{  //User is not logged in        
                $this->panelContent_2=file_get_contents('forms/homeRight.html');
            }
        }//end METHOD - //set the panel 2 content  
        
        //Panel 3
        public function setPanelHead_3(){ //set the panel 3 heading
            if($this->loggedin){
                $this->panelHead_3='<h2>FOOTER INFORMATION</h2>';
            }
            else{        
                $this->panelHead_3='<h2>FOOTER INFORMATION</h2>';
            } 
        } //end METHOD - //set the panel 3 heading  
        public function setPanelContent_3(){ //set the panel 2 content
            if($this->loggedin){ 

			if ($this->user->getUserType()==='ADMINISTRATOR'){ //A Placement officer is logged in
                    $this->panelContent_2=' Thank you ' .$this->user->getUserFirstName().' '. $this->user->getUserLastName() .' for logging in successfully as PLACEMENT OFFICER and ADMINISTRATOR.'.'</br>'.'</br>';
                    $this->panelContent_2.='<img src="images/placement-officers.jpg" alt="placement-officers" /> '.'<br/>'.'</br>'.'</br>';
                    $this->panelContent_2.='<h3>USER FUNCTIONALITIES</h3>'.'</br>';
                    $this->panelContent_2.='Post Available Work Placement Opportunities'.'</br>'.'</br>';
                    $this->panelContent_2.='View Job Applicants'.'</br>'.'</br>';
                    $this->panelContent_2.='Chat with Other Users through the Chat Room'.'</br>'.'</br>';
                    $this->panelContent_2.='Don\'t forget to LOGOUT when you are done';
                }
                else{ //a Student is logged in
                    $this->panelContent_2=' Thank you ' .$this->user->getUserFirstName().' '. $this->user->getUserLastName() .' for logging in successfully as a STUDENT.'.'</br>'.'</br>';
                    $this->panelContent_2.='<img src="images/students.jpg" alt="students" /> '.'</br>'.'</br>'.'</br>';
                    $this->panelContent_2.='<h3>USER FUNCTIONALITIES</h3>'.'</br>';
                    $this->panelContent_2.='View Available Work Placement Opportunities'.'</br>'.'</br>';
                    $this->panelContent_2.='Apply Available Work Placement Opportunities'.'</br>'.'</br>';
                    $this->panelContent_2.='Chat with Other Users through the Chat Room'.'</br>'.'</br>';
                    $this->panelContent_2.='Don\'t forget to LOGOUT when you are done';
                }   
               // $this->panelContent_3=file_get_contents('forms/homeRight.html');
            }
            else{        
                $this->panelContent_3=file_get_contents('forms/homeRight.html');
            } 
        }  //end METHOD - //set the panel 2 content        
       
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
        //END GETTER METHODS        
        
}//end class
  
