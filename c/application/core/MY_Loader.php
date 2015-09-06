<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader{
	
	public function __construct($config = array())
    {
        parent::__construct($config);
    }
       
    //Customize view loading   
    public function view($view, $vars = array(), $return = FALSE)
    {
        $theme = config_item('themes');
        
        $theme_path = ($theme == 'default')? 'themes/default/template/' : 'themes/'.$theme.'/template/';
        
        return $this->_ci_load(array('_ci_view' => $theme_path.$view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
    }
	
}