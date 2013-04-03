<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ui-lightness/jquery-ui-1.10.0.custom.css">
    <style>
      body {
        //background-image: url('<?php echo base_url(); ?>assets/images/bg-body-bright.png');
      }
      
    	.container-fluid {
        width: 1300px;
        margin: 0 auto;
		  }
  		label {
  			color: red;
  		}
  		.span10 {
  		}
    </style>
</head>

<body>
<div class="container-fluid">
    <div class="navbar">
      <div class="navbar-inner">
        <a class="brand" href="#">NIT PATNA</a>
        <ul class="nav">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li><a href="#">Articles</a></li>
          <li><a href="#">Downloads</a></li>
          <li><a href="#">Blogs</a></li>
          <li><a href="<?php echo base_url(); ?>teaching/pay_details">Pay Details</a></li>
          <ul class="nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Employee
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url(); ?>teaching/add_teacher">Add New Teacher</a></li>
                <li><a href="#">Download</a></li>
                <li><a href="#">Tutorials</a></li>
                <li><a href="#">Blogs</a></li>
                <li><a href="#">About Us</a></li>
              </ul>
            </li>
          </ul>
        </ul>
        <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form>
      </div>
    </div>
    
    <div class="row-fluid">
      <div class="span2">
        <ul class="nav nav-list">
            <li class="nav-header">Teaching Staff</li>
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><a href="<?php echo base_url(); ?>teaching/pay_details">Pay Details</a></li>
            <li><a href="#">Download</a></li>
            <li><a href="#">Tutorials</a></li>
            <li><a href="#">Blogs</a></li>
            <li><a href="#">About Us</a></li>
            <li class="divider"></li>
            <li class="nav-header">Non-teaching Staff</li>
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Library</a></li>
            <li><a href="#">Download</a></li>
            <li><a href="#">Tutorials</a></li>
            <li><a href="#">Blogs</a></li>
            <li><a href="#">About Us</a></li>
          </ul>
      </div>
      <script type="text/javascript">
        $(document).ready(function(){
          var url = window.location;
          $('.nav li a[href="'+url+'"]').parent().addClass('active');
        })
    </script>