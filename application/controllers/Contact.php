<?php

/**
* 
*/
class Contact extends CI_Controller
{
  
  function __construct()
  {
    # code...
    parent::__construct();
  }

  function index(){
    $this->load-view('header');
    $this->load-view('footer');
  }
}