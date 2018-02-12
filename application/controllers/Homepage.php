<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  /**
  * 
  */
  class Homepage extends CI_Controller
  {
    
    function __construct()
    {
      # code...
      parent::__construct();
    }

    function index(){
      $this->load->view('landing/index');
    }

    function galeri(){
      $this->load->view('landing/galeri');
    }

    function contact(){
      $this->load->view('landing/contact-us');
    }
  }