<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author Manipis
 */
class Model {
    
    public function __construct() {
        
        $this->con = mysql_connect(SERVER, USERNAME, PASSWORD);
        
        if(!$this->con){
            echo mysql_error();
        }else{
            mysql_select_db('db_mvc');
        }
    }
    
    public function close(){
        mysql_close($this->con);
    }
}

?>
