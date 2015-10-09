<?php

class User_cookie_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function get_user_cookie($user_token, $user_agent, $user_ip){
        $sql = "SELECT * FROM wp_user_cookie uc
                         LEFT JOIN wp_users u ON uc.ID = u.ID
                         WHERE user_token= ". $this->db->escape($user_token) .
                         " AND user_agent=". $this->db->escape($user_agent) .
                         " AND user_ip=". $this->db->escape($user_ip);
        $query = $this->db->query($sql);
        if($query->num_rows() == 1){
            return $query->result_array()[0];
        }else{
            return null;
        }
    }

    public function insert($data){
        $sql = "INSERT INTO wp_user_cookie SET
                        user_token = ". $this->db->escape($data['user_token']) .",
                        user_ip = ". $this->db->escape($data['user_ip']) .",
                        user_agent = ". $this->db->escape($data['user_agent']) .",
                        ID = ". (int)$data['ID'];
        $this->db->query($sql);
        return $this->db->insert_id();
    }
}