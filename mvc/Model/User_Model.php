<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_Model
 *
 * @author Manipis
 */
class User_Model extends Model {

    private $username;
    private $password;

    public function is_username_exist($username) {
        $result = mysql_query("SELECT * FROM tbl_users WHERE username='$username'");

        return mysql_num_rows($result) > 0;
    }

    public function is_password_exist($password) {
        $result = mysql_query("SELECT * FROM tbl_users WHERE password='$password'");

        return mysql_num_rows($result) > 0;
    }

    public function set_username($username) {
        $this->username = $username;
    }

    public function set_password($password) {
        $this->password = $password;
    }

    public function save() {

        $query = "INSERT INTO tbl_users"
                . "(username, password)"
                . "VALUES"
                . "($this->username, $this->password)";

        $result = mysql_query($query);

        return $result;
    }

}

?>
