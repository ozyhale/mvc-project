<?php

require_once 'Config/config.php';
require_once 'Libs/Model.php';
require_once 'Libs/Controller.php';
require_once 'Libs/Session.php';
require_once 'Libs/smarty/libs/Smarty.class.php';
require_once 'Model/User_Model.php';

Session::start();

class Index extends Controller{
    
    private $smarty; //views
    private $user_model; //model
    
    public function __construct() {
        
        $this->smarty = new Smarty();
        $this->smarty->assign('title', 'Home');
        $this->smarty->assign('site', 'Sitename');
        $this->smarty->assign('alert', '');
        
        if(Session::is_username_set()){
            $this->smarty->assign('tpl_file', 'Views/logout.tpl');
        }else{
            $this->smarty->assign('tpl_file', 'Views/login.tpl');
        }
        
        $this->user_model = new User_Model();
    }
    
    public function login(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if($this->user_model->is_username_exist($username) and $this->user_model->is_password_exist($password)){
            Session::set_username($username);
            header('Location: /mvc/');
        }else{
            $this->smarty->assign('alert', '<h4><font color="red">Error Logging in!</font></h4>');
        }
    }
    
    public function logout(){
        Session::unset_username();
        Session::destroy();
        header('Location: /mvc/');
    }
    
    public function search_user($username){
        
        return $username;
        
    }
    
    public function display(){
        $this->perform_actions(); //perform actions according to what function is specified in index.php?action=[action]
        $this->user_model->close();
        $this->smarty->display('Views/template/simple.tpl');
    }
}

$controller = new Index();
$controller->display(); //display contents in the controller

?>