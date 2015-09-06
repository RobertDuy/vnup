<?php

require_once config_item('root_dir') . '/wp-includes/class-phpass.php';

class User_model extends CI_Model {

    private $wp_hasher;

    public function __construct()
    {
        parent::__construct();
        $this->wp_hasher = new PasswordHash(8, true);
    }

    /**
     * @param $input_data
     * @return user object
     */
    public function get_user($input_data){
        $sql = "1=1";
        if(isset($input_data['id'])){
            $sql .= " and ID = ". (int)$input_data['id'];
        }
        if(isset($input_data['user_login'])){
            $sql .= " and user_login = ". $this->db->escape($input_data['user_login']);
        }
        if(isset($input_data['user_email'])){
            $sql .= " and user_email = ". $this->db->escape($input_data['user_email']);
        }
        if($sql == "1=1"){
            return null;
        }
        $query = $this->db->query("SELECT * FROM wp_users WHERE ". $sql);
        if($query->num_rows() > 0){
            return $query->result_array()[0];
        }
        return null;
    }

    /**
     * @param $email
     * @param $pass
     * @return bool  true or false
     */
    public function validate_login($email, $pass){
        if(empty($email) || empty($pass)){
            return false;
        }
        $user = $this->get_user(array('user_email' => $email));
        if(!empty($user) || isset($user['ID'])){
            $dataPass = $user['user_pass'];  // MD 5
            $isValid = $this->wp_hasher->CheckPassword($pass, $dataPass);
            return $isValid;
        }
        return false;
    }

    /**
     * @param $data = array
     *  have user_email, user_login, user_pass = raw passowrd
     */

    public function insert_user($data){
        if(isset($data['user_email']) && isset($data['user_login']) && isset($data['user_pass'])){
            $sql = "INSERT INTO wp_users SET
                        user_login = '". $this->db->escape($data['user_login']) ."',
                        user_email = '". $this->db->escape($data['user_email']) ."'
                        user_pass = '". $this->db->escape($data['user_pass']) ."'";
            if(isset($data['user_nicename']) && !empty($data['user_nicename'])){
                $sql .= ",user_nicename = '". $this->db->escape($data['user_nicename']). "'";
            }else{
                $sql .= ",user_nicename = '". $this->db->escape($data['user_login']). "'";
            }
            if(isset($data['username']) && !empty($data['username'])){
                $sql .= ",username = '". $this->db->escape($data['username']). "'";
            }else{
                $sql .= ",username = '". $this->db->escape($data['user_login']). "'";
            }
            if(isset($data['nickname']) && !empty($data['nickname'])){
                $sql .= ",nickname = '". $this->db->escape($data['nickname']). "'";
            }else{
                $sql .= ",nickname = '". $this->db->escape($data['user_login']). "'";
            }
            if(isset($data['display_name']) && !empty($data['display_name'])){
                $sql .= ",display_name = '". $this->db->escape($data['display_name']). "'";
            }else{
                $sql .= ",display_name = '". $this->db->escape($data['user_login']). "'";
            }
            try{
                $this->db->query($sql);
                return $this->db->getLastId();
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
    }

    public function update_user($data){
        if(isset($data['user_email']) && isset($data['user_login']) && isset($data['user_pass'])){
            $sql = "UPDATE wp_users SET
                        user_login = '". $this->db->escape($data['user_login']) ."',
                        user_email = '". $this->db->escape($data['user_email']) ."'
                        user_pass = '". $this->db->escape($data['user_pass']) ."'";
            if(isset($data['user_nicename']) && !empty($data['user_nicename'])){
                $sql .= ",user_nicename = '". $this->db->escape($data['user_nicename']). "'";
            }else{
                $sql .= ",user_nicename = '". $this->db->escape($data['user_login']). "'";
            }
            if(isset($data['username']) && !empty($data['username'])){
                $sql .= ",username = '". $this->db->escape($data['username']). "'";
            }else{
                $sql .= ",username = '". $this->db->escape($data['user_login']). "'";
            }
            if(isset($data['nickname']) && !empty($data['nickname'])){
                $sql .= ",nickname = '". $this->db->escape($data['nickname']). "'";
            }else{
                $sql .= ",nickname = '". $this->db->escape($data['user_login']). "'";
            }
            if(isset($data['display_name']) && !empty($data['display_name'])){
                $sql .= ",display_name = '". $this->db->escape($data['display_name']). "'";
            }else{
                $sql .= ",display_name = '". $this->db->escape($data['user_login']). "'";
            }
            try{
                $this->db->query($sql);
                return $this->db->getLastId();
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
    }

    public function delete_user($user_id){
        if(isset($user_id) && (int)$user_id > 0){
            try{
                $this->db->query("DELETE FROM wp_users WHERE ID = ". (int)$user_id);
                return true;
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
        return false;
    }
}