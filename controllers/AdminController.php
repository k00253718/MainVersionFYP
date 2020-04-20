<?php

/**
 * CLASS: ADMIN CONTROLLER / PLACEMENT OFFICER
 * 
 * THIS IS THE CONTROLLER FOR THE ADMINISTRATOR / PLACEMENT OFFICER USER TYPE
 *
 * @AUTHOR: ONYENZE CLINTON
 * 
 */
class AdminController extends Controller {

//CLASS PROPERTIES 
    
    private $postArray;                                                                   //A COPY OF THE CONTENT OF THE $_POST SUPERGLOBAL ARRAY
    private $getArray;                                                                    //A COPY OF THE CONTENT OF THE $_GET superglobal array
    private $viewData;                                                                    //AN ARRAY CONTAINING PAGE CONTENT GENERATED USING MODELS
    private $controllerObjects;                                                           //AN ARRAY CONTAINING MODELS USED BY THE CONTOLLER
    private $user;                                                                        //SESSION OBJECT
    private $db;                                                                          //DATABASE SYSTEM
    private $pageTitle;                                                                   //PAGE TITLE 

//CLASS METHODS

    //METHOD: CONSTRUCTOR
    
    function __construct($user,$db) { 
	
        parent::__construct($user->getLoggedinState());
        
    //INITIALISE ALL THE CLASS PROPERTIES
        
        $this->postArray = array();
        $this->getArray = array();
        $this->viewData=array();
        $this->controllerObjects=array();
        $this->user=$user;
        $this->db=$db;
        $this->pageTitle='WORK PLACEMENT APP';

    }//END METHOD: CONSTRUCTOR  

    //METHOD: RUN()
    
    public function run() {                                                                 //RUN THE CONTROLLER
        
        $this->getUserInputs();
        $this->updateView();
        
    }//END METHOD: RUN()

    //METHOD: GET USER INPUTS()
    
    public function getUserInputs() {                                                       //GET USER INPUT
       
    
    //THIS METHOD IS THE MAIN INTERFACE BETWEEN THE USER AND THE CONTROLLER
      
    //GET THE $_GET ARRAY VALUES
        
        $this->getArray = filter_input_array(INPUT_GET) ;                                   //used for PAGE navigation
        
    //GET THE $_POST ARRAY VALUES
        
        $this->postArray = filter_input_array(INPUT_POST);                                  //used for form data entry and buttons
        
    }//END METHOD: getUserInputs()

    //METHOD: updateView()
    public function updateView() { //update the VIEW based on the users page selection
        if (isset($this->getArray['pageID'])) { //check if a page id is contained in the URL
            switch ($this->getArray['pageID']) {
				
                case "home":
                    //create objects to generate view content
                    $home = new Home($this->user, $this->pageTitle, strtoupper($this->getArray['pageID']));
                    $navigation = new Navigation($this->user, $this->getArray['pageID']);
                    array_push($this->controllerObjects,$home,$navigation);
                    
                    //get the content from the navigation model - put into the $data array for the view:
                    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
                    //get the content from the page content model  - put into the $data array for the view:
                    $data['pageTitle'] = $home->getPageTitle();
                    $data['pageHeading'] = $home->getPageHeading();
                    
                  /*   $data['pageTitle'] = $home->getPageTitle();
                    $data['pageHeading'] = $home->getPageHeading(); */
                    $data['panelHeadLHS'] = $home->getPanelHead_1(); // A string containing the LHS panel heading/title
                    //$data['panelHeadMID'] = $home->getPanelHead_2();
                    $data['panelHeadRHS'] = $home->getPanelHead_2(); // A string containing the RHS panel heading/title
                    $data['stringLHS'] = $home->getPanelContent_1();     // A string intended of the Left Hand Side of the page
                    //$data['stringMID'] = $home->getPanelContent_2();     // A string intended of the Left Hand Side of the page
                    $data['stringRHS'] = $home->getPanelContent_2();     // A string intended of the Right Hand Side of the page
					
					
                    //
                    //update the view
                    include_once 'views/view_navbar_2_panel.php';  //load the view          
					
                    break;  
					
/*                 case "register":
                    //get the model
                    $register = new Register($this->postArray,$this->pageTitle, strtoupper($this->getArray['pageID']),$this->db,$this->user);
                    $navigation = new Navigation($this->user, $this->getArray['pageID']);
                    array_push($this->controllerObjects,$register,$navigation);

                    //get the content from the navigation model - put into the $data array for the view:
                    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
                    //get the content from the model - put into the $data array for the view:
                    $data['pageTitle'] = $register->getPageTitle();
                    $data['pageHeading'] = $register->getPageHeading();
                    $data['panelHeadRHS'] = $register->getPanelHead_2(); // A string containing the RHS panel heading/title
                    $data['panelHeadLHS'] = $register->getPanelHead_1(); // A string containing the LHS panel heading/title
                    $data['stringLHS'] = $register->getPanelContent_1();     // A string intended of the Left Hand Side of the page
                    $data['stringRHS'] = $register->getPanelContent_2();     // A string intended of the Right Hand Side of the page
                    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
                    //update the view
                    include_once 'views/view_navbar_2_panel.php'; //load the view
                    break; */   

					case "postJobs":
                    //create objects to generate view content
                    $sendjobs = new PostJobUnderC($this->user, $this->pageTitle, strtoupper($this->getArray['pageID']));
                    $navigation = new Navigation($this->user, $this->getArray['pageID']);
                    array_push($this->controllerObjects,$sendjobs,$navigation);
                    
                    //get the content from the navigation model - put into the $data array for the view:
                    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
                    //get the content from the page content model  - put into the $data array for the view:
                    $data['pageTitle'] = $sendjobs->getPageTitle();
                    $data['pageHeading'] = $sendjobs->getPageHeading();
                    
                    $data['pageTitle'] = $sendjobs->getPageTitle();
                    $data['pageHeading'] = $sendjobs->getPageHeading();
                    $data['panelHeadLHS'] = $sendjobs->getPanelHead_1(); // A string containing the LHS panel heading/title
                    $data['panelHeadMID'] = $sendjobs->getPanelHead_2();
                    $data['panelHeadRHS'] = $sendjobs->getPanelHead_3(); // A string containing the RHS panel heading/title
                    $data['stringLHS'] = $sendjobs->getPanelContent_1();     // A string intended of the Left Hand Side of the page
                    $data['stringMID'] = $sendjobs->getPanelContent_2();     // A string intended of the Left Hand Side of the page
                    $data['stringRHS'] = $sendjobs->getPanelContent_3();     // A string intended of the Right Hand Side of the page
                    $this->viewData = $data;
					
					//
                    //update the view
                    include_once 'views/view_navbar_3_panel.php';  //load the view                      
                    break;
					
					
					case "viewApplicants":
                    //create objects to generate view content
                    $applicant = new ViewApplicantUnderC($this->user, $this->pageTitle, strtoupper($this->getArray['pageID']));
                    $navigation = new Navigation($this->user, $this->getArray['pageID']);
                    array_push($this->controllerObjects,$applicant,$navigation);
                    
                    //get the content from the navigation model - put into the $data array for the view:
                    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
                    //get the content from the page content model  - put into the $data array for the view:
                    $data['pageTitle'] = $applicant->getPageTitle();
                    $data['pageHeading'] = $applicant->getPageHeading();
                    
                    $data['pageTitle'] = $applicant->getPageTitle();
                    $data['pageHeading'] = $applicant->getPageHeading();
                    $data['panelHeadLHS'] = $applicant->getPanelHead_1(); // A string containing the LHS panel heading/title
                    $data['panelHeadMID'] = $applicant->getPanelHead_2();
                    $data['panelHeadRHS'] = $applicant->getPanelHead_3(); // A string containing the RHS panel heading/title
                    $data['stringLHS'] = $applicant->getPanelContent_1();     // A string intended of the Left Hand Side of the page
                    $data['stringMID'] = $applicant->getPanelContent_2();     // A string intended of the Left Hand Side of the page
                    $data['stringRHS'] = $applicant->getPanelContent_3();     // A string intended of the Right Hand Side of the page
                    $this->viewData = $data;
					
					//
                    //update the view
                    include_once 'views/view_navbar_3_panel.php';  //load the view                      
                    break; 
                
                case "chatRoom":
                    //create objects to generate view content
                    $chat = new ChatRoomUnderC($this->user, $this->pageTitle, strtoupper($this->getArray['pageID']));
                    $navigation = new Navigation($this->user, $this->getArray['pageID']);
                    array_push($this->controllerObjects,$chat,$navigation);
                    
                    //get the content from the navigation model - put into the $data array for the view:
                    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
                    //get the content from the page content model  - put into the $data array for the view:
                    $data['pageTitle'] = $chat->getPageTitle();
                    $data['pageHeading'] = $chat->getPageHeading();
                    
                    $data['pageTitle'] = $chat->getPageTitle();
                    $data['pageHeading'] = $chat->getPageHeading();
                    $data['panelHeadLHS'] = $chat->getPanelHead_1(); // A string containing the LHS panel heading/title
                    $data['panelHeadMID'] = $chat->getPanelHead_2();
                    $data['panelHeadRHS'] = $chat->getPanelHead_2(); // A string containing the RHS panel heading/title
                    $data['stringLHS'] = $chat->getPanelContent_1();     // A string intended of the Left Hand Side of the page
                    $data['stringMID'] = $chat->getPanelContent_2();     // A string intended of the Left Hand Side of the page
                    $data['stringRHS'] = $chat->getPanelContent_2();     // A string intended of the Right Hand Side of the page
                    $this->viewData = $data;
					
					//
                    //update the view
                    include_once 'views/view_navbar_1_panel.php';  //load the view                      
                    break; 
					
					
                case "accountEdit":
                    //get the model
                    $register = new Account($this->postArray,$this->pageTitle, strtoupper($this->getArray['pageID']),$this->db,$this->user,$this->getArray['pageID']);
                    $navigation = new Navigation($this->user, $this->getArray['pageID']);
                    array_push($this->controllerObjects,$register,$navigation);

                    //get the content from the navigation model - put into the $data array for the view:
                    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
                    //get the content from the model - put into the $data array for the view:
                    $data['pageTitle'] = $register->getPageTitle();
                    $data['pageHeading'] = $register->getPageHeading();
                    $data['panelHeadRHS'] = $register->getPanelHead_2(); // A string containing the RHS panel heading/title
                    $data['panelHeadLHS'] = $register->getPanelHead_1(); // A string containing the LHS panel heading/title
                    $data['stringLHS'] = $register->getPanelContent_1();     // A string intended of the Left Hand Side of the page
                    $data['stringRHS'] = $register->getPanelContent_2();     // A string intended of the Right Hand Side of the page
                    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
                    //update the view
                    include_once 'views/view_navbar_2_panel.php'; //load the view
                    break; 
                case "accountPasswordChange":
                    //get the model
                    $register = new Account($this->postArray,$this->pageTitle, strtoupper($this->getArray['pageID']),$this->db,$this->user,$this->getArray['pageID']);
                    $navigation = new Navigation($this->user, $this->getArray['pageID']);
                    array_push($this->controllerObjects,$register,$navigation);

                    //get the content from the navigation model - put into the $data array for the view:
                    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
                    //get the content from the model - put into the $data array for the view:
                    $data['pageTitle'] = $register->getPageTitle();
                    $data['pageHeading'] = $register->getPageHeading();
                    $data['panelHeadRHS'] = $register->getPanelHead_2(); // A string containing the RHS panel heading/title
                    $data['panelHeadLHS'] = $register->getPanelHead_1(); // A string containing the LHS panel heading/title
                    $data['stringLHS'] = $register->getPanelContent_1();     // A string intended of the Left Hand Side of the page
                    $data['stringRHS'] = $register->getPanelContent_2();     // A string intended of the Right Hand Side of the page
                    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
                    //update the view
                    include_once 'views/view_navbar_2_panel.php'; //load the view
                    break;  

					
/*                 case 'login':                   
                    //process the login details from the login form if the button has been pressed
                    if(isset($this->postArray['btnLogin'])){  //check that the login button is pressed
                        $this->loggedin=$this->user->login($this->postArray['userID'], $this->postArray['password']);                       
                        if(!$this->loggedin){  //if login is not successful keep track of login attempts
                            $this->user->setLoginAttempts($this->user->getLoginAttempts()+1); //add 1 to current login attempts
                        }
                    }

                    //create objects to generate view content
                    $login = new Login($this->postArray,$this->pageTitle, strtoupper($this->getArray['pageID']),$this->db,$this->user);
                    $navigation = new Navigation($this->user, $this->getArray['pageID']);
                    array_push($this->controllerObjects,$login,$navigation);

                    //get the content from the navigation model - put into the $data array for the view:
                    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
                    $data['pageTitle'] = $login->getPageTitle();
                    $data['pageHeading'] = $login->getPageHeading();
                    $data['panelHeadRHS'] = $login->getPanelHead_2(); // A string containing the RHS panel heading/title

                    $data['stringRHS'] = $login->getPanelContent_2();     // A string intended of the Right Hand Side of the page
                    $data['panelHeadLHS'] = $login->getPanelHead_1(); // A string containing the LHS panel heading/title
                    $data['stringLHS'] = $login->getPanelContent_1();     // A string intended of the Left Hand Side of the page
                    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
                    //update the view
                    include_once 'views/view_navbar_2_panel.php'; //load the view                  
                    break; */
					
                case "logout":                    
                    //Change the login state to false
                    $this->user->logout(FALSE);
                    $this->loggedin=FALSE;

                    //create objects to generate view content
                    $home = new Home($this->user, $this->pageTitle, 'HOME');
                    $navigation = new Navigation($this->user, 'home');
                    array_push($this->controllerObjects,$home,$navigation);

                    //get the content from the navigation model - put into the $data array for the view:
                    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
                    //get the content from the page content model  - put into the $data array for the view:
                    $data['pageTitle'] = $home->getPageTitle();
                    $data['pageHeading'] = $home->getPageHeading();
                    $data['pageHeading'] = $home->getPageHeading();
                    $data['panelHeadLHS'] = $home->getPanelHead_1(); // A string containing the LHS panel heading/title
                    //$data['panelHeadMID'] = $home->getPanelHead_2();
                    $data['panelHeadRHS'] = $home->getPanelHead_2(); // A string containing the RHS panel heading/title
                    $data['stringLHS'] = $home->getPanelContent_1();     // A string intended of the Left Hand Side of the page
                    //$data['stringMID'] = $home->getPanelContent_2();     // A string intended of the Left Hand Side of the page
                    $data['stringRHS'] = $home->getPanelContent_2();     // A string intended of the Right Hand Side of the page
                    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
                    //update the view
                    include_once 'views/view_navbar_2_panel.php'; //load the view                  
                    break;
                

                
                default:
                    //no page selected by user/landing page
                    //create objects to generate view content
                    $home = new Home($this->user, $this->pageTitle, strtoupper($this->getArray['pageID']));
                    $navigation = new Navigation($this->user, $this->getArray['pageID']);
                    array_push($this->controllerObjects,$home,$navigation);

                    //get the content from the navigation model - put into the $data array for the view:
                    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
                    //get the content from the page content model  - put into the $data array for the view:
                    $data['pageTitle'] = $home->getPageTitle();
                    $data['pageHeading'] = $home->getPageHeading();
                    
                    $data['pageHeading'] = $home->getPageHeading();
                    $data['panelHeadLHS'] = $home->getPanelHead_1(); // A string containing the LHS panel heading/title
                    //$data['panelHeadMID'] = $home->getPanelHead_2();
                    $data['panelHeadRHS'] = $home->getPanelHead_2(); // A string containing the RHS panel heading/title
                    $data['stringLHS'] = $home->getPanelContent_1();     // A string intended of the Left Hand Side of the page
                    //$data['stringMID'] = $home->getPanelContent_2();     // A string intended of the Left Hand Side of the page
                    $data['stringRHS'] = $home->getPanelContent_2();     // A string intended of the Right Hand Side of the page
                    
                    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
                    //update the view
                    include_once 'views/view_navbar_2_panel.php';
                    break;
            }
        } 
        else {//no page selected and NO page ID passed in the URL 
            //no page selected - default loads HOME page
            //create objects to generate view content
            $home = new Home($this->user, $this->pageTitle, 'HOME');
            $navigation = new Navigation($this->user, 'home');
            array_push($this->controllerObjects,$home,$navigation);

            //get the content from the navigation model - put into the $data array for the view:
            $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
            //get the content from the page content model  - put into the $data array for the view:
            $data['pageTitle'] = $home->getPageTitle();
            $data['pageHeading'] = $home->getPageHeading();
            
            $data['pageTitle'] = $home->getPageTitle();
            $data['pageHeading'] = $home->getPageHeading();
            $data['panelHeadLHS'] = $home->getPanelHead_1(); // A string containing the LHS panel heading/title
            //$data['panelHeadMID'] = $home->getPanelHead_2();
            $data['panelHeadRHS'] = $home->getPanelHead_2(); // A string containing the RHS panel heading/title
            $data['stringLHS'] = $home->getPanelContent_1();     // A string intended of the Left Hand Side of the page
            //$data['stringMID'] = $home->getPanelContent_2();     // A string intended of the Left Hand Side of the page
            $data['stringRHS'] = $home->getPanelContent_2();     // A string intended of the Right Hand Side of the page
            
            $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
            //update the view
            include_once 'views/view_navbar_3_panel.php';  //load the view
        }
    }
    //END METHOD: updateView()
       
    //METHOD: debug()
    public function debug() {   //Diagnostics/debug information - dump the application variables if DEBUG mode is on
            echo '<section>';
            echo '<!-- The Debug SECTION -->';
            echo '<div class="container-fluid"   style="background-color: #AAAAAA">'; //outer DIV

            echo '<h2>Lecturer Controller Class - Debug information</h2><br>';

            echo '<div class="container">';  //INNER DIV
            //SECTION 1
            echo '<section style="background-color: #AAAAAA">';
            echo '<h3>Lecturer Controller (CLASS) properties</h3>';
            echo '<section style="background-color: #BBBBB">';
            echo '<h4>User Logged in Status:</h4>';
            echo '<section style="background-color: #FFFFFF">';
            if ($this->loggedin) {
                echo 'User Logged In state is TRUE ($loggedin) <br>';
            } else {
                echo 'User Logged In state is FALSE ($loggedin) <br>';
            }
            echo '</section>';

            echo '<h4>$postArray Values</h4>';
            echo '<pre>';
            var_dump($this->postArray);
            echo '</pre>';
            echo '<br>';

            echo '<h4>$getArray Values</h4>';
            echo '<pre>';
            var_dump($this->getArray);
            echo '</pre>';
            echo '<br>';

            echo '<h4>$data Array Values</h4>';
            echo '<pre>';
            var_dump($this->viewData);
            echo '</pre>';
            echo '<br>';
            echo '</section>';
            echo '</section>';


            //SECTION 2
            echo '<section style="background-color: #AAAAAA">';
            echo '<h3>SERVER - Super Global Arrays</h3>';

            echo '<section style="background-color: #AAAAAA">';
            echo '<h4>$_GET Arrays</h4>';
            echo '<section style="background-color: #FFFFFF">';
            echo '<table class="table table-bordered"><thead><tr><th>KEY</th><th>VALUE</th></tr></thead>';
            foreach ($_GET as $key => $value) {
                echo '<tr><td>' . $key . '</td><td>' . $value . '</td></tr>';
            }
            echo '</table>';
            echo '</section>';

            echo '<h4>$_POST Array</h4>';
            echo '<section style="background-color: #FFFFFF">';
            echo '<table class="table table-bordered"><thead><tr><th>KEY</th><th>VALUE</th></tr></thead>';
            foreach ($_POST as $key => $value) {
                echo '<tr><td>' . $key . '</td><td>' . $value . '</td></tr>';
            }
            echo '</table>';
            echo '</section>';
            echo '</section>';
            echo '</section>';

            echo '</div>';  //END INNER DIV
            echo '</div>';  //END outer DIV
            echo '</section>';
        
    }//END METHOD: debug()
     
}//end CLASS
