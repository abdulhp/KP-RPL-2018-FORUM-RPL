<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class ckeditor extends CI_Model
{
	
	public function __construct() {
		parent::__construct();
        $this->load->library(array('ckeditor')); //library ckeditor diload
    }

    function editor($width,$height) {
    //configure base path of ckeditor folder
    	$this->ckeditor->basePath = base_url().'plugins/ckeditor/';
    	$this->ckeditor-> config['toolbar'] = 'Full';
    	$this->ckeditor->config['language'] = 'en';
    	$this->ckeditor-> config['width'] = $width;
    	$this->ckeditor-> config['height'] = $height;
    }
}

?>