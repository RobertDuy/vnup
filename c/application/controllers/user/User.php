<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(config_item('root_dir') . 'c/application/libraries/Facebook/FacebookSession.php');
require_once(config_item('root_dir') . 'c/application/libraries/Facebook/FacebookRequest.php');
require_once(config_item('root_dir') . 'c/application/libraries/Facebook/FacebookResponse.php');
require_once(config_item('root_dir') . 'c/application/libraries/Facebook/FacebookSDKException.php');
require_once(config_item('root_dir') . 'c/application/libraries/Facebook/FacebookRequestException.php');
require_once(config_item('root_dir') . 'c/application/libraries/Facebook/FacebookRedirectLoginHelper.php');
require_once(config_item('root_dir') . 'c/application/libraries/Facebook/FacebookAuthorizationException.php');
require_once(config_item('root_dir') . 'c/application/libraries/Facebook/GraphObject.php');
require_once(config_item('root_dir') . 'c/application/libraries/Facebook/GraphUser.php');
require_once(config_item('root_dir') . 'c/application/libraries/Facebook/GraphAlbum.php');
require_once(config_item('root_dir') . 'c/application/libraries/Facebook/GraphSessionInfo.php');
require_once(config_item('root_dir') . 'c/application/libraries/Facebook/Entities/AccessToken.php');
require_once(config_item('root_dir') . 'c/application/libraries/Facebook/HttpClients/FacebookCurl.php');
require_once(config_item('root_dir') . 'c/application/libraries/Facebook/HttpClients/FacebookHttpable.php');
require_once(config_item('root_dir') . 'c/application/libraries/Facebook/HttpClients/FacebookCurlHttpClient.php');

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookCurl;
use Facebook\FacebookHttpable;
use Facebook\FacebookCurlHttpClient;

class User extends CI_Controller
{

    private $app_id = '651313361641726';
    private $app_secret = '2b4fd78d7d3acdfcfff6e50c064b8f37';
    private $default_redirectURL;
    private $helper;

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('user_model');

        $this->default_redirectURL = config_item('base_url') . 'user/user';
        FacebookSession::setDefaultApplication($this->app_id, $this->app_secret);
        $this->helper = new FacebookRedirectLoginHelper($this->default_redirectURL);
    }

    public function index(){
        $this->login();
    }

    //function process normal user login
    public function login(){
        if(isset($_POST['LoginForm'])){
            $email = $_POST['LoginForm']['email'];
            $pass = $_POST['LoginForm']['password'];
            $isValid = $this->user_model->validate_login($email, $pass);
            if($isValid){
                echo "Dang nhap thanh cong";
            }else{
                echo "Sai username hoac password";
            }
        }else if(isset($_GET)){
            $this->form_validation->set_rules('LoginForm_email', 'Email', 'required');
            $this->form_validation->set_rules('text', 'text', 'required');

            $sess = $this->helper->getSessionFromRedirect();
            if(isset($sess)){
                $request = new FacebookRequest($sess, 'GET', '/me');
                $response = $request->execute();
                $graph = $response->getGraphObject(GraphUser::className());
                $name = $graph->getName();
                $email = $graph->getProperty('email');
                $id = $graph->getId();
                $image = 'https://graph.facebook.com/'. $id . '/picture?width=100';

                $args = array(
                    'name' => $name,
                    'email' => $email,
                    'image' => $image
                );
                // insert new customer

                // set current user

                // redirect to current page
                $this->session->set_userdata($args);
                $data = $args;
                $data['facebookLoginUrl'] = '#';
            }else{
                $data['facebookLoginUrl'] = $this->helper->getLoginUrl();
            }

            $data['name'] = $this->session->userdata('name');
            $data['email'] = $this->session->userdata('email');
            $data['image'] = $this->session->userdata('image');

            $this->load->view('common/tpl_header');
            $this->load->view('user/tpl_login', $data);
            $this->load->view('common/tpl_footer');

        }
    }

    //function process linkedin  user login
    public function ilogin()
    {
        $this->load->view('welcome_message');
    }

    //function process normal user registration
    public function signup(){
        if(isset($_GET)){
            $this->form_validation->set_rules('EmailMemberRegistration_fname', 'text', 'required');
            $this->form_validation->set_rules('EmailMemberRegistration_lname', 'text', 'required');
            $this->form_validation->set_rules('EmailMemberRegistration_email', 'email', 'required');
            $this->form_validation->set_rules('EmailMemberRegistration_password', 'password', 'required');
            $this->form_validation->set_rules('ytEmailMemberRegistration_memType', 'text', 'required');

            $sess = $this->helper->getSessionFromRedirect();
            if(isset($sess)){
                $request = new FacebookRequest($sess, 'GET', '/me');
                $response = $request->execute();
                $graph = $response->getGraphObject(GraphUser::className());
                $name = $graph->getName();
                $email = $graph->getProperty('email');
                $id = $graph->getId();
                $image = 'https://graph.facebook.com/'. $id . '/picture?width=30';

                $args = array(
                    'name' => $name,
                    'email' => $email,
                    'image' => $image
                );
                // insert new customer

                // set current user

                // redirect to current page
                $this->session->set_userdata($args);
                $data = $args;
                $data['loginFacebookLink'] = '#';
            }else{
                $data['loginFacebookLink'] = $this->helper->getLoginUrl();
            }

            $data['name'] = $this->session->userdata('name');
            $data['email'] = $this->session->userdata('email');
            $data['image'] = $this->session->userdata('image');
            $data['loginLinkedInLink'] = '';

            $this->load->view('common/tpl_header');
            $this->load->view('user/tpl_signup', $data);
            $this->load->view('common/tpl_footer');
        }else if(isset($_POST['EmailMemberRegistration'])){
            $fname = $_POST['EmailMemberRegistration']['fname'];
            $lname = $_POST['EmailMemberRegistration']['lname'];
            $email = $_POST['EmailMemberRegistration']['email'];
            $password = $_POST['EmailMemberRegistration']['password'];
            $memType = $_POST['EmailMemberRegistration']['memType'];
        }
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