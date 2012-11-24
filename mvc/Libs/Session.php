<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Session
 *
 * @author Manipis
 */
class Session {
    
    public static function start(){
        session_start();
    }
    
    public static function set_username($username){
        $_SESSION['username'] = $username;
    }
    
    public static function get_username(){
        return $_SESSION['username'];
    }
    
    public static function is_username_set(){
        return isset($_SESSION['username']);
    }
    
    public static function unset_username(){
        unset($_SESSION['username']);
    }

    public static function destroy(){
        session_destroy();
    }
}

?>
