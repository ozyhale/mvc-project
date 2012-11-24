<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Mao ni ang main controller... i.extend ni sa every controller para mainherit nia ang method nga read_url()
 *
 * @author Manipis
 */
abstract class Controller {

    public function perform_actions() {
        
        if (isset($_GET['action'])) { 
           
            //kung na set ang $_GET['action'] matawag nato ang method nga gi.specify sa action
            //for example:
            //www.site.com/index.php?action=login
            //
            //'index' ang atong CLASS
            //ang METHOD nato kay 'login'
            //so pag.instantiate sa index nga class ($class = new Index();)
            //ma.tawag pod ang login nga function
            
            $method = $_GET['action'];

            if (count($_GET) == 1) {
                
                //ang count($_GET)... ihapon niya kung pila kbouk ang elements sa sulod sa 
                //$_GET nga variable kung
                //kung 1 gane
                //meaning.. walay parameters
                //pero kung greater than 1 gne
                //naa nay PARAMETERS
                
                @call_user_func(array($this, $method));
                
                //tawagon na nato ang function nga gihatag sa url...
                //ang function nga call_user_func() mao na xia ang mutawag sa 
                //method nga gispecify sa url 
            } else {

                //else kung naay PARAMETERS, 
                //for example: www.site.com/administrator.php?action=filter&year=3rd&course=IT
                //so meaning to say ang 'year' ug ang 'course' kay mga PARAMETERS... 

                $parameters = array_slice($_GET, 1);

                //sliced nako para ang $_GET['action'] kay dili maapil as parameter

                @call_user_func_array(array($this, $method), $parameters);
            }
        }
    }
    
    public abstract function display();
}

?>
