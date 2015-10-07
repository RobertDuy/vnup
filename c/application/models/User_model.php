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
     * @return 0 = false, > 0 = true
     */
    public function validate_login($email, $pass){
        if(empty($email) || empty($pass)){
            return 0;
        }
        $user = $this->get_user(array('user_email' => $email));
        if(!empty($user) || isset($user['ID'])){
            $dataPass = $user['user_pass'];  // MD 5
            $isValid = $this->wp_hasher->CheckPassword($pass, $dataPass);
            if($isValid){
                return $user['ID'];
            }else{
                return 0;
            }
        }
        return 0;
    }

    /**
     * @param $data = array
     *  have user_email, user_login, user_pass = raw passowrd
     */

    public function insert_user($data){
        if(isset($data['user_email']) && isset($data['user_login']) && isset($data['user_pass'])){
            $sql = "INSERT INTO wp_users SET
                        user_login = ". $this->db->escape($data['user_login']) .",
                        user_email = ". $this->db->escape($data['user_email']) .",
                        user_pass = ". $this->db->escape($data['user_pass']);
            if(isset($data['user_nicename']) && !empty($data['user_nicename'])){
                $sql .= ",user_nicename = ". $this->db->escape($data['user_nicename']);
            }else{
                $sql .= ",user_nicename = ". $this->db->escape($data['user_login']);
            }
            if(isset($data['display_name']) && !empty($data['display_name'])){
                $sql .= ",display_name = ". $this->db->escape($data['display_name']);
            }else{
                $sql .= ",display_name = ". $this->db->escape($data['user_login']);
            }
            //first name
            if(isset($data['first_name'])){
                $sql .= ", first_name = ". $this->db->escape($data['first_name']);
            }
            //last_name
            if(isset($data['last_name'])){
                $sql .= ", last_name = ". $this->db->escape($data['last_name']);
            }
            //in_access_token
            if(isset($data['in_access_token'])){
                $sql .= ", in_access_token = ". $this->db->escape($data['in_access_token']);
            }
            //in_token_expire
            if(isset($data['in_token_expire'])){
                $sql .= ", in_token_expire = ". $this->db->escape($data['in_token_expire']);
            }
            // user_activation_key
            if(isset($data['user_activation_key'])){
                $sql .= ", user_activation_key = ". $this->db->escape($data['user_activation_key']);
            }
            try{
                $this->db->query($sql);
                return $this->db->insert_id();
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
    }

    public function update_user($data){
        if(isset($data['user_email']) && isset($data['user_login']) && isset($data['user_pass']) && isset($data['ID'])){
            $sql = "UPDATE wp_users SET
                        user_login = ". $this->db->escape($data['user_login']) .",
                        user_email = ". $this->db->escape($data['user_email']) .",
                        user_pass = ". $this->db->escape($data['user_pass']);
            if(isset($data['user_nicename']) && !empty($data['user_nicename'])){
                $sql .= ",user_nicename = ". $this->db->escape($data['user_nicename']);
            }else{
                $sql .= ",user_nicename = ". $this->db->escape($data['user_login']);
            }
            if(isset($data['display_name']) && !empty($data['display_name'])){
                $sql .= ",display_name = ". $this->db->escape($data['display_name']);
            }else{
                $sql .= ",display_name = ". $this->db->escape($data['user_login']);
            }
            //first name
            if(isset($data['first_name'])){
                $sql .= ", first_name = ". $this->db->escape($data['first_name']);
            }
            //last_name
            if(isset($data['last_name'])){
                $sql .= ", last_name = ". $this->db->escape($data['last_name']);
            }
            //in_access_token
            if(isset($data['in_access_token'])){
                $sql .= ", in_access_token = ". $this->db->escape($data['in_access_token']);
            }
            //in_token_expire
            if(isset($data['in_token_expire'])){
                $sql .= ", in_token_expire = ". $this->db->escape($data['in_token_expire']);
            }
            //user_activation_key
            if(isset($data['user_activation_key'])){
                $sql .= ", user_activation_key = ". $this->db->escape($data['user_activation_key']);
            }

            $sql .= " WHERE ID = ". (int)$data['ID'];
            try{
                $this->db->query($sql);
                return $data['ID'];
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }else{
            return null;
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

    public function getuser_by_activate_code($activate_code){
        $sql = "SELECT * FROM wp_users WHERE user_activation_key = ". $this->db->escape($activate_code);
        $query = $this->db->query($sql);
        if($query->num_rows() == 1){
            return $query->result_array()[0];
        }else{
            return null;
        }
    }
}