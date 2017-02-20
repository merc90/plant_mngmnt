<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Satyam Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!--link rel="stylesheet/less" href="<?php echo base_url();?>less/bootstrap.less" type="text/css" /-->
  <!--link rel="stylesheet/less" href="<?php echo base_url();?>less/responsive.less" type="text/css" /-->
  <!--script src="<?php echo base_url();?>js/less-1.3.3.min.js"></script-->
  <!--append ?#!watch? to the browser URL, then refresh the page. -->

  <link href="<?php echo base_url();?>css/satyamAdmin.css" rel="stylesheet">
  <link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
<!--   <link href="<?php echo base_url();?>css/bootstrap.vertical-tabs.min.css" rel="stylesheet" /> -->
  <link href="<?php echo base_url();?>css/sb-admin-2.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>css/font-awesome/css/font-awesome.min.css" rel="stylesheet" />

<style type="text/css">
  #idletimeout { background:#CC5100; border:3px solid #FF6500; color:#fff; font-family:arial, sans-serif; text-align:center; font-size:14px; padding-top:70px; position:relative; top:0px; left:0; right:0; z-index:99; display:none;};
  #idletimeout a { color:#fff; font-weight:bold };
  #idletimeout span { font-weight:bold };
</style>

<div id="idletimeout">
  You will be logged off in <span id = "timer"></span>&nbsp;seconds due to inactivity.
  <a id="idletimeout-resume" href="#">Click here to continue using this web page</a>.
</div>


  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>img/apple-touch-icon-57-precomposed.png">
  <!-- <link rel="shortcut icon" href="<?php echo base_url();?>img/favicon.ico"> -->

    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.formatCurrency-1.4.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/metisMenu.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/sb-admin-2.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.idle.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>datatable/media/css/jquery.dataTables.css" />
    <script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>datatable/media/js/jquery.dataTables.js"></script>

  <!-- Scripts -->
  <script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
    var site_url = "<?php echo site_url(); ?>";

    $(document).ready(function(){
        open=true;
        $("li.dropdown").click(function(){
            if(open==true)
            {
                $("li.dropdown").addClass("open");
                open=false;
            }
            else
            {
                $("li.dropdown").removeClass("open");
                open=true;
            }
        });
    });
  </script>


</head>

 <script type="text/javascript">
//     var timeOut;
//     var timeInterval;
//     var countDown = 30; // countDown = 30 seconds

//     $(document).idle({
//       onIdle: function(){
//         $('#timer').html (countDown--);
//         $('#idletimeout').slideDown();
        

//         console.log("countDown"+countDown);
//         console.log("timeOut"+timeOut);
//         timeOut = setTimeout(function() {
//           $('#idletimeout').slideUp();
//           window.location = site_url+"logout";
//         }, 30000); // 30 seconds = 30000ms
        
//         timeInterval = setInterval(function() {
//           $('#timer').html (countDown--);
//         }, 1000);
//       },
//       // idle: 1800000// 5 minutes = 600000ms
//     })

//     $('#idletimeout-resume').click (function (){
//       $('#idletimeout').slideUp();
      
//       clearTimeout (timeOut);
//       clearInterval (timeInterval);
//       countDown = 30;
//     });
// </script>

<body>
  <div id="wrapper" style="background-color:#99d5cf;">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

       
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            

            <?php $email = $this->satyam_config_validation->getAdminEmail();
                  $name = $this->satyam_config_validation->get_admin_user_name(); 
                  $role = $this->satyam_config_validation->getAdminRole();?>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user" style="width:200px; right:30px">
                     <li style="padding-left:25px;"><a href="#"><i class="fa fa-user fa-fw"></i> Admin Profile</a>
                    </li>
                    <li style="padding-left:5px;"><i style="font-weight:bold">Name :</i></li>
                    <li style="padding-left:5px"><?php if(!empty($name))echo $name; ?></li>
                    <li style="padding-left:5px"><i style="font-weight:bold">User ID :</i></li>
                    <li style="padding-left:5px"><?php echo $email; ?></li>
                    <li style="padding-left:5px"><i style="font-weight:bold">Access Level :</i></li>
                    <li style="padding-left:5px"><?php echo $role; ?></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo site_url().'/change_password/'; ?>"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo site_url().'/logout/'; ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->
        <?php $module= $this->satyam_config_validation->get_main_menu();
        $controller = $this->router->fetch_class(); ?>
        <?php if( ! (isset($hideSidebar) && $hideSidebar )) { ?>
        <div class="sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                <?php foreach ($module as $parentName => $row): ?>
                    <?php if(count($row) == 1  && array_key_exists(0, $row)){ $childRow = $row[0];  ?>
                        <li role="presentation">
                            <a class="<?php if($controller == $childRow['_NAME']) echo 'active'; ?>"  href="<?php echo site_url().$childRow['_NAME']; ?>">
                                <?php echo $childRow['_DISPLAYNAME'];?>
                            </a>
                        </li>

                    <?php } else {?>

                    <?php
                        $class = '';
                        $submenu = '';
                        $activeclass = '';

                        foreach ($row as $childRow) {
                            $class = ($controller == $childRow['_NAME'])? 'active' : '';

                            if($class == 'active')
                                $activeclass = 'active';

                            $submenu .= '<li role="presentation">
                                          <a class="'.(($controller == $childRow['_NAME']) ? 'active' : '').'"  href="'.site_url().$childRow['_NAME'].'">'
                                              .$childRow['_DISPLAYNAME']
                                          .'</a>
                                        </li>';
                        } ?>
                    <li class="<?php echo $activeclass; ?>">
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> <?php echo $parentName; ?><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <?php echo $submenu; ?>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <?php } ?>
                <?php endforeach ?>

                </ul>
            </div>
        </div>
        <?php } ?>
</nav>

