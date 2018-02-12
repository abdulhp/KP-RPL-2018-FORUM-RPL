<!DOCTYPE html>
<html lang="en">
<head>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <title>HOME | RPL</title>
     <link rel="shortcut icon" href="<?php echo base_url();?>assets/landing/images/favicon.png">
     <link rel="stylesheet" href="<?php echo base_url();?>assets/landing/css/bootstrap.min.css">
     <link rel="stylesheet" href="<?php echo base_url();?>assets/landing/css/animate.css">
     <link rel="stylesheet" href="<?php echo base_url();?>assets/landing/css/magnific-popup.css">
     <link rel="stylesheet" href="<?php echo base_url();?>assets/landing/css/font-awesome.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="<?php echo base_url();?>assets/landing/css/style.css">
</head>
<body>


     <nav id="mainNav" class="navbar navbar-default" style="background: #4785eb">
          <!--menu-->
          <div class="container">
               <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                         <span class="sr-only">Toggle navigation</span>
                         <span class="icon-bar top-bar"></span>
                         <span class="icon-bar middle-bar"></span>
                         <span class="icon-bar bottom-bar"></span>
                    </button>
                    <a href="index.html" class="navbar-brand page-scroll"><h3 style="font-family: 'AvenirNext-DemiBold';color: #fff;margin-top: 0;font-size: 28px;">RPL</h3></a>
               </div>

               <!--navigation-->
               <div class="collapse navbar-collapse" id="navigation">
                    <ul class="nav navbar-nav navbar-right">
                         <?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : ?>
                                   <?php if ($_SESSION['is_admin'] === true) : ?>
                                        <li><a href="<?= base_url('admin/users') ?>">Admin</a></li>
                                   <?php endif; ?>
                                   <li><a href="<?= base_url('user/' . $_SESSION['username']) ?>">Profile</a></li>
                                   <li><a href="<?= base_url('logout') ?>">Logout</a></li>
                              <?php else : ?>
                                   <li><a href="<?= base_url('register') ?>">Register</a></li>
                                   <li><a href="<?= base_url('login') ?>">Login</a></li>
                              <?php endif; ?>
                         </ul>

                    </li>
               </ul>
          </div>
     </div>
</nav>