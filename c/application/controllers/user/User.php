<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    /**
     * Cauth controller.
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }

    public function index()
    {
        $this->login();
    }

    //function process normal user login
    public function login(){
        if(isset($_POST['LoginForm'])){
            // kiem tra email existed?

            return;
        }

        $this->form_validation->set_rules('LoginForm_email', 'Email', 'required');
        $this->form_validation->set_rules('text', 'text', 'required');

        $this->load->view('common/tpl_header');
        $this->load->view('user/tpl_login');
        $this->load->view('common/tpl_footer');
    }

    public function do_login(){
        if(isset($_POST['LoginForm'])){
            $email = $_POST['LoginForm']['email'];
            $pass = $_POST['LoginForm']['password'];
            $isValid = $this->user_model->validate_login($email, $pass);
            if($isValid){
                echo "Dang nhap thanh cong";
            }else{
                echo "Sai username hoac password";
            }
        }else{
            echo "tac vu khong hop le";
        }

    }

    //function process facebook user login
    public function flogin()
    {
        $this->load->view('welcome_message');
    }

    //function process linkedin  user login
    public function ilogin()
    {
        $this->load->view('welcome_message');
    }

    //function process normal user registration
    public function signup()
    {

        $this->load->view('common/tpl_header');
        $this->load->view('user/tpl_signup');
        $this->load->view('common/tpl_footer');
    }

    //function process facebook user registration
    public function fregister()
    {
        $this->load->view('welcome_message');

    }

    //function process linkedin user registration
    public function iregister()
    {
        $this->load->view('welcome_message');

    }

    //function process user activation
    public function activate()
    {
        $this->load->view('user/tpl_activate');

    }

    //function process user activation
    public function user_exist()
    {

    }

    //function send mail to user
    public function sendmail()
    {


    }
}
