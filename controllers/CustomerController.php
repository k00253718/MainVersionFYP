<?php

/**
 * Class: CustomerController
 * 
 * This is the controller for the CUSTOMER user type
 *
 * @AUTHOR: ONYENZE CLINTON
 * 
 */
class CustomerController extends Controller {

//CLASS properties
    private $postArray;     //a copy of the content of the $_POST superglobal array
    private $getArray;      //a copy of the content of the $_GET superglobal array
    private $viewData;          //an array containing page content generated using models
    private $controllerObjects;          //an array containing models used by the controller
    private $user; //session object
    private $db;
    private $pageTitle;

//CLASS methods

    //METHOD: constructor 
    function __construct($user,$db) { //constructor   
        parent::__construct($user->getLoggedinState());
        $this->user=$user;
        //initialise all the class properties
        $this->postArray = array();
        $this->getArray = array();
        $this->viewData=array();
        $this->controllerObjects=array();
        $this->user=$user;
        $this->db=$db;
        $this->pageTitle='WORK PLACEMENT APP';
    }
    //END METHOD: constructor 

    //METHOD: run()
    public function run() {  // run the controller
        $this->getUserInputs();
        $this->updateView();
    }
    //END METHOD: run()

    //METHOD: getUserInputs()
    public function getUserInputs() { // get user input
        //
        //This method is the main interface between the user and the controller.
        //
        //Get the $_GET array values
        $this->getArray = filter_input_array(INPUT_GET) ; //used for PAGE navigation
        
        //Get the $_POST array values
        $this->postArray = filter_input_array(INPUT_POST);  //used for form data entry and buttons
        
    }
    //END METHOD: getUserInputs()

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
                    $data['panelHeadLHS'] = $home->getPanelHead_1(); // A string containing the LHS panel heading/title
                    $data['panelHeadMID'] = $home->getPanelHead_2();
                    $data['panelHeadRHS'] = $home->getPanelHead_2(); // A string containing the RHS panel heading/title
                    $data['stringLHS'] = $home->getPanelContent_1();     // A string intended of the Left Hand Side of the page
                    $data['stringMID'] = $home->getPanelContent_2();     // A string intended of the Left Hand Side of the page
                    $data['stringRHS'] = $home->getPanelContent_2();     // A string intended of the Right Hand Side of the page
                    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
                    //
                    //update the view
                    include_once 'views/view_navbar_2_panel.php';  //load the view    
                    break;
                
                
                case "viewJobs":
                    //create objects to generate view content
                    $jobs = new ViewJobsUnderC ($this->user, $this->pageTitle, strtoupper($this->getArray['pageID']));
                    $navigation = new Navigation($this->user, $this->getArray['pageID']);
                    array_push($this->controllerObjects,$jobs,$navigation);

                    //get the content from the navigation model - put into the $data array for the view:
                    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
                    //get the content from the page content model  - put into the $data array for the view:
                    $data['pageTitle'] = $jobs->getPageTitle();
                    $data['pageHeading'] = $jobs->getPageHeading();
                    $data['panelHeadLHS'] = $jobs->getPanelHead_1(); // A string containing the LHS panel heading/title
                    $data['panelHeadMID'] = $jobs->getPanelHead_2();
                    $data['panelHeadRHS'] = $jobs->getPanelHead_3(); // A string containing the RHS panel heading/title
                    $data['stringLHS'] = $jobs->getPanelContent_1();     // A string intended of the Left Hand Side of the page
                    $data['stringMID'] = $jobs->getPanelContent_2();     // A string intended of the Left Hand Side of the page
                    $data['stringRHS'] = $jobs->getPanelContent_3();     // A string intended of the Right Hand Side of the page
                    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
                    //
                    //update the view
                    include_once 'views/view_navbar_3_panel.php';  //load the view    
                    break;
                
                
                case "jobApplication":
                    //create objects to generate view content
                    $application = new JobApplicationUnderC ($this->user, $this->pageTitle, strtoupper($this->getArray['pageID']));
                    $navigation = new Navigation($this->user, $this->getArray['pageID']);
                    array_push($this->controllerObjects,$application,$navigation);

                    //get the content from the navigation model - put into the $data array for the view:
                    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
                    //get the content from the page content model  - put into the $data array for the view:
                    $data['pageTitle'] = $application->getPageTitle();
                    $data['pageHeading'] = $application->getPageHeading();
                    $data['panelHeadLHS'] = $application->getPanelHead_1(); // A string containing the LHS panel heading/title
                    //$data['panelHeadMID'] = $home->getPanelHead_2();
                    $data['panelHeadRHS'] = $application->getPanelHead_2(); // A string containing the RHS panel heading/title
                    $data['stringLHS'] = $application->getPanelContent_1();     // A string intended of the Left Hand Side of the page
                    //$data['stringMID'] = $home->getPanelContent_2();     // A string intended of the Left Hand Side of the page
                    $data['stringRHS'] = $application->getPanelContent_2();     // A string intended of the Right Hand Side of the page
                    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
                    //
                    //update the view
                    include_once 'views/view_navbar_2_panel.php';  //load the view    
                    break;
                
                case "chatRoom":
                    //create objects to generate view content
                    $chat = new StudentChatRoomUnderC ($this->user, $this->pageTitle, strtoupper($this->getArray['pageID']));
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
                    $data['panelHeadRHS'] = $chat->getPanelHead_3(); // A string containing the RHS panel heading/title
                    $data['stringLHS'] = $chat->getPanelContent_1();     // A string intended of the Left Hand Side of the page
                    $data['stringMID'] = $chat->getPanelContent_2();     // A string intended of the Left Hand Side of the page
                    $data['stringRHS'] = $chat->getPanelContent_3();     // A string intended of the Right Hand Side of the page
                    //
                    //update the view
                    include_once 'views/view_navbar_1_panel.php';  //load the view                      
                    break; 

                case "accountEdit":
                    //get the model
                    $account = new Account($this->postArray,$this->pageTitle, strtoupper($this->getArray['pageID']),$this->db,$this->user,$this->getArray['pageID']);
                    $navigation = new Navigation($this->user, $this->getArray['pageID']);
                    array_push($this->controllerObjects,$account,$navigation);

                    //get the content from the navigation model - put into the $data array for the view:
                    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
                    //get the content from the model - put into the $data array for the view:
                    $data['pageTitle'] = $account->getPageTitle();
                    $data['pageHeading'] = $account->getPageHeading();
                    $data['panelHeadLHS'] = $account->getPanelHead_1(); // A string containing the LHS panel heading/title
                    $data['panelHeadRHS'] = $account->getPanelHead_2(); // A string containing the RHS panel heading/title
                    $data['stringLHS'] = $account->getPanelContent_1();     // A string intended of the Left Hand Side of the page
                    $data['stringRHS'] = $account->getPanelContent_2();     // A string intended of the Right Hand Side of the page
                    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
                    //update the view
                    include_once 'views/view_navbar_2_panel.php'; //load the view
                    break; 
                
                case "accountPasswordChange":
                    //get the model
                    $account = new Account($this->postArray,$this->pageTitle, strtoupper($this->getArray['pageID']),$this->db,$this->user,$this->getArray['pageID']);
                    $navigation = new Navigation($this->user, $this->getArray['pageID']);
                    array_push($this->controllerObjects,$account,$navigation);

                    //get the content from the navigation model - put into the $data array for the view:
                    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
                    //get the content from the model - put into the $data array for the view:
                    $data['pageTitle'] = $account->getPageTitle();
                    $data['pageHeading'] = $account->getPageHeading();
                    $data['panelHeadRHS'] = $account->getPanelHead_2(); // A string containing the RHS panel heading/title
                    $data['panelHeadLHS'] = $account->getPanelHead_1(); // A string containing the LHS panel heading/title
                    $data['stringLHS'] = $account->getPanelContent_1();     // A string intended of the Left Hand Side of the page
                    $data['stringRHS'] = $account->getPanelContent_2();     // A string intended of the Right Hand Side of the page
                    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
                    //update the view
                    include_once 'views/view_navbar_2_panel.php'; //load the view
                    break; 
                
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
                    $data['panelHeadLHS'] = $home->getPanelHead_1(); // A string containing the LHS panel heading/title
                    $data['panelHeadMID'] = $home->getPanelHead_2(); // A string containing the MID panel heading/title
                    $data['panelHeadRHS'] = $home->getPanelHead_3(); // A string containing the RHS panel heading/title
                    $data['stringLHS'] = $home->getPanelContent_1();     // A string intended of the Left Hand Side of the page
                    $data['stringMID'] = $home->getPanelContent_2();     // A string intended of the Left Hand Side of the page
                    $data['stringRHS'] = $home->getPanelContent_3();     // A string intended of the Right Hand Side of the page
                    $this->viewData = $data;  //put the content array into a class property for diagnostic purposes                    
                    
                    //update the view
                    include_once 'views/view_navbar_2_panel.php'; //load the view                  

                    break;                 
             
                default:
                    //no page selected 
                    //create objects to generate view content
                    $home = new Home($this->user, $this->pageTitle, strtoupper($this->getArray['pageID']));
                    $navigation = new Navigation($this->user, $this->getArray['pageID']);
                    array_push($this->controllerObjects,$home,$navigation);

                    //get the content from the navigation model - put into the $data array for the view:
                    $data['menuNav'] = $navigation->getMenuNav();       // an array of menu items and associated URLS
                    //get the content from the page content model  - put into the $data array for the view:
                    $data['pageTitle'] = $home->getPageTitle();
                    $data['pageHeading'] = $home->getPageHeading();
                    $data['panelHeadLHS'] = $home->getPanelHead_1(); // A string containing the LHS panel heading/title
                    $data['panelHeadMID'] = $home->getPanelHead_2();
                    $data['panelHeadRHS'] = $home->getPanelHead_3(); // A string containing the RHS panel heading/title
                    $data['stringLHS'] = $home->getPanelContent_1();     // A string intended of the Left Hand Side of the page
                    $data['stringMID'] = $home->getPanelContent_2();     // A string intended of the Left Hand Side of the page
                    $data['stringRHS'] = $home->getPanelContent_3();     // A string intended of the Right Hand Side of the page
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
            $data['panelHeadRHS'] = $home->getPanelHead_3(); // A string containing the RHS panel heading/title
            $data['panelHeadLHS'] = $home->getPanelHead_1(); // A string containing the LHS panel heading/title
            $data['panelHeadMID'] = $home->getPanelHead_2();
            $data['stringLHS'] = $home->getPanelContent_1();     // A string intended of the Left Hand Side of the page
            $data['stringMID'] = $home->getPanelContent_2();     // A string intended of the Left Hand Side of the page
            $data['stringRHS'] = $home->getPanelContent_3();     // A string intended of the Right Hand Side of the page
            $this->viewData = $data;  //put the content array into a class property for diagnostic purposes
            //update the view
            include_once 'views/view_navbar_2_panel.php';  //load the view
        }
    }
    //END METHOD: updateView()
    
    //METHOD: debug()
    public function debug() {   //Diagnostics/debug information - dump the application variables if DEBUG mode is on
            echo '<section>';
            echo '<!-- The Debug SECTION -->';
            echo '<div class="container-fluid"   style="background-color: #AAAAAA">'; //outer DIV

            echo '<h2>CUSTOMER Controller Class - Debug information</h2><br>';

            echo '<div class="container">';  //INNER DIV
            //SECTION 1
            echo '<section style="background-color: #AAAAAA">';
            echo '<h3>CUSTOMER Controller (CLASS) properties</h3>';
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
        
    }
    //END METHOD: debug()

    
    
}

//end CLASS
