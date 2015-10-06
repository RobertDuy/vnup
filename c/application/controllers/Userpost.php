<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userpost extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

    public function index(){
        echo 'This is wirte a post page' .'<br>';
        echo 'User info in session '.'<br>';
        echo 'User name: ' . $this->session->user_login .'<br>';
        echo 'User email: ' . $this->session->user_email .'<br>';
        echo 'User image: ' . $this->session->user_image .'<br>';
        echo 'User id: ' . $this->session->user_id .'<br>';
        echo 'User first name: ' . $this->session->user_first_name .'<br>';
        echo 'User last name: ' . $this->session->user_last_name .'<br>';
    }
}