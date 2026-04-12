<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>/icon.png"/>
    <title><?php echo $pageTitle; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 --
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
     <link href="<?php echo base_url(); ?>assets/bootstrap-daterangepicker-master/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.css" rel="stylesheet" type="text/css" />
   
    <link href="<?php echo base_url(); ?>assets/js/fileinput.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/prin.css" rel="stylesheet" type="text/css" />
    <link media="print" rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap-daterangepicker-master/daterangepicker.css"  type="text/css" />
    <style>
    	.error{
    		color:red;
    		font-weight: normal;
    	}
    </style>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- <body class="sidebar-mini skin-black-light"> -->
  <body class="skin-blue sidebar-mini sidebar-collapse">
    <div class="wrapper">
      <header class="main-header" style="position:fixed; width:100%">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>dashboard" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>AT</b></span>
          <!-- logo for regular state and mobile devices -->
          <?php /*if($this->session->userdata('role') != 3){
					$config = $this->config_model->getConfig();	  
					$cname = $config->name;
		  		}
				else{
					$cname = $this->session->userdata('c_name');
				}*/
		  ?>
          <span class="logo-lg"><b>Al Abrar Travels</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
                          <li><a href="#"><strong><?php echo $this->session->userdata('c_name');?></a></strong></li>
              <?php
            
            if($role == ROLE_ADMIN)
            {
            ?>

              <li>
                    <a href="<?php echo base_url()?>configration">
                    <i class="fa fa-gear"></i>
                        Setting
                    </a>
                </li>
                <?php }
				if($role == ROLE_AGENT){?>
                <li>
                    <a href="<?php echo base_url()?>Config">
                    <i class="fa fa-gear"></i>
                        Setting
                    </a>
                </li>
                <?PHP }?>

              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $name; ?>
                      <small><?php echo $role_text; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url(); ?>loadChangePass" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Change Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" style="position:fixed">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!--<div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>-->
      <!-- search form -->
      <!--<form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <!--<li class="header">MAIN NAVIGATION</li>-->
            <li class="treeview">
              <a href="<?php echo base_url(); ?>dashboard">
                <i class="fa fa-dashboard"></i> <span>Home</span></i>
              </a>
            </li>
            
            <?php
            //}
			if($role == ROLE_ADMIN || $role == ROLE_MANAGER){
            ?>
            <li class="treeview ">
                <a href="#">
                    <i class="fa fa-dropbox"></i>
                    <span>Hotels</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">                    
                    <li>
                        <a href="<?php echo base_url()?>packeg">
                        <i class="fa fa-building"></i>
                            Packeg List
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>hotel">
                        <i class="fa fa-building"></i>
                            Hotel List
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>add_hotel_agent">
                        <i class="fa fa-building"></i>
                            Agent Hotel
                        </a>
                    </li>
                    <!--<li class="">
                        <a href="<?php echo base_url()?>vehicle">
                        <i class="fa fa-car"></i>
                            Vehicles
                        </a>
                    </li>-->
                    <li class="">
                        <a href="<?php echo base_url()?>trip">
                        <i class="fa fa-rocket"></i>
                            Trip
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url()?>ziarat">
                        <i class="fa fa-eye"></i>
                            Ziarat
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url()?>flight">
                        <i class="fa fa-plane"></i>
                            Flights
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url()?>sector">
                        <i class="fa fa-map-marker"></i>
                            Sector
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url()?>visaCompany">
                        <i class="fa fa-cc-visa"></i>
                            Visa Company
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url()?>bank">
                        <i class="fa fa-building"></i>
                            Banks
                        </a>
                    </li>
                    <!--<li class="">
                        <a href="<?php echo base_url()?>agent">
                        <i class="fa fa-male"></i>
                            Agent
                        </a>
                    </li>-->
                </ul>
            </li>
            <?php }?>
            <li class="treeview ">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span>Reports</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu"> 
                    <li class="treeview">
                      <a href="<?php echo base_url()?>pilgrim_report" >
                        <i class="fa fa-file"></i>
                        <span> Pilgrim Report </span>
                      </a>
                    </li>
                    <li class="treeview">
                      <a href="<?php echo base_url()?>arrival_report" >
                        <i class="fa fa-file"></i>
                        <span>Arrival Report </span>
                      </a>
                    </li>
                    <li class="treeview">
                      <a href="<?php echo base_url()?>departure_report" >
                        <i class="fa fa-file"></i>
                        <span>Departure Report </span>
                      </a>
                    </li>
                    <li class="treeview">
                      <a href="<?php echo base_url()?>visa_report" >
                        <i class="fa fa-file"></i>
                        <span>Visa Report </span>
                      </a>
                    </li>
                    <li class="treeview">
                      <a href="<?php echo base_url()?>pilgrim_wise_report" >
                        <i class="fa fa-file"></i>
                        <span> Pilgrim Wise Report </span>
                      </a>
                    </li>
                </ul>
            </li>
            
            <?php
            
            if($role == ROLE_ADMIN || $role == ROLE_MANAGER)
            {
            ?>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>userListing">
                <i class="fa fa-users"></i>
                <span>Users / Agents</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url()?>client" >
                <i class="fa fa-male"></i>
                <span>Clients</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url()?>ticket_sale" >
                <i class="fa fa-file"></i>
                <span>Ticket Sale</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url()?>flight_transection" >
                <i class="fa fa-file"></i>
                <span>Flight Transection </span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url()?>bank_transection" >
                <i class="fa fa-building"></i>
                <span>Bank Transection </span>
              </a>
            </li>
                       
            <?php } 
            //if($role == ROLE_ADMIN || $role == ROLE_AGENT)
            //{
				
            ?>
            <?php
            
            if($role == ROLE_ADMIN || $role == ROLE_MANAGER)
            {
            ?>
            <li class="treeview">
              <a href="<?php echo base_url()?>balance" >
                <i class="fa fa-credit-card"></i>
                <span>Agent Balance</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url()?>addTransection" >
                <i class="fa fa-plus"></i>
                <span>Add Transection</span>
              </a>
            </li> 
            <?php }?>
            <?php
            
            if($role == ROLE_AGENT)
            {
            ?>
            <li class="treeview">
              <a href="<?php echo base_url()?>transection" >
                <i class="fa fa-plus"></i>
                <span> Transection</span>
              </a>
            </li>
            <?php }?>
            <?php
            
            if($role == ROLE_ADMIN || $role == ROLE_MANAGER)
            {
            ?>
            <li class="treeview">
              <a href="<?php echo base_url()?>permotion_number" >
                <i class="fa fa-plus"></i>
                <span> Permotion Numbers</span>
              </a>
            </li>
            <?php }?>
            <li class="treeview ">
                <a href="#">
                    <i class="fa fa-file"></i>
                    <span>Voucher</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu"> 
                    <li class="treeview">
                      <a href="<?php echo base_url()?>createVoucher" >
                        <i class="fa fa-file"></i>
                        <span> Create Voucher </span>
                      </a>
                    </li>
                    <li class="treeview">
                      <a href="<?php echo base_url()?>voucher" >
                        <i class="fa fa-file"></i>
                        <span>View Voucher </span>
                      </a>
                    </li>
                </ul>
            </li>
            
            
          </ul>
          
        </section>
        <!-- /.sidebar -->
      </aside>