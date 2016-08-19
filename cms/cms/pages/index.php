<?php 
session_start();
require "../../../geotechfiles/includes/functions.php";
$app = new Enersmart();
$app->checkLoginAdmin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GGS</title>
    <link rel="shortcut icon" href="../images/favicon.ico"/>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="../js/index.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- adding jqte -->

    <script type="text/javascript" src="../js/jquery-te-1.4.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/jquery-te-1.4.0.css"/>
    <!-- including new scripts -->

    <link rel="stylesheet" href="../css/bootstrapDate.min.css"/>
    <link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
    <link rel="styleshett" href="../css/admin.css"/>
    <script type="text/javascript" src="../js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="../js/bootstrap-datetimepicker.js"></script>
    <!-- end of scripts -->

 <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet"/>

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/responsive.dataTables.css" rel="stylesheet"/>
     <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <img src="../../banners/logo.png" style="width: 50px; height: 50px; background-color: #7a1e21; border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;" />
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">MENU</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><span style="color: #7a1e21; font-weight: bold;">GHANA GEOTECHNICAL SOCIETY</span></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right" style="color: #7a1e21;">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #7a1e21;">
                        <i class="fa fa-envelope fa-fw bc" style="color: #7a1e21;"></i>  <i class="fa fa-caret-down bc" style="color: #7a1e21;"></i>
                    </a>
                    <?php 
                        $app->getMessages();
                    ?>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #7a1e21">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #7a1e21;">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <?php 
                        $app->systemAlerts();
                    ?>
                                        <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #7a1e21;">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user" style="color: #7a1e21;">
                        <li><a href="?profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#settings" data-toggle="modal"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="?logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="row">
                    <center><img src="../images/dp.png" class="img-circle" style="width: 70px; height: 70px;" /></center>
                </div>

                <div class="row">
                <center><span style="color: #7a1e21;">
                    <?php 
                        $result=$app->getFullDetails($_SESSION['gtadmin'],'admin');
                        echo $result[0];
                    ?>
                </span></center>
                </div>
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="divider">
                        <br/>
                        </li>
                        <li>
                        <a href="?dashboard" style="color: #7a1e21;"><i class="fa fa-dashboard fa-fw" style="color: #7a1e21;"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#" class="bc" style="color: #7a1e21;"><i class="fa fa-pencil fa-fw" style="color: #7a1e21;"></i> Manage Site<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level" style="color: #7a1e21;">
                                 <li>
                                    <a href="?menu" style="color: #7a1e21;"><span class="glyphicon glyphicon-th"></span> Menu(s)</a>
                                </li>
                                 <li>
                                    <a href="?articles" style="color: #7a1e21;"><span class="glyphicon glyphicon-pencil"></span> Articles</a>
                                </li>
                                <li>
                                    <a href="?banners" style="color: #7a1e21;"><span class="glyphicon glyphicon-picture"></span> Banners</a>
                                </li>
                                <li>
                                    <a href="?contact" style="color: #7a1e21;"><span class="glyphicon glyphicon-earphone"></span> Contact Us</a>
                                </li>
                                <li>
                                    <a href="?about" style="color: #7a1e21;"><span class="glyphicon glyphicon-info-sign"></span> About Us</a>
                                </li>
                                <li>
                                    <a href="?content" style="color: #7a1e21;"><span class="glyphicon glyphicon-info-sign"></span> Brief Content</a>
                                </li>
                                <li>
                                            <a href="?news" style="color: #7a1e21;"><span class="glyphicon glyphicon-envelope"></span> Latest News/Events</a>
                                        </li>
                                <li>
                                    <a href="?featurednews" style="color: #7a1e21;"><span class="glyphicon glyphicon-comment"></span> Featured News</a>
                                </li>
                                <li>
                                    <a href="?happenings" style="color: #7a1e21;"><span class="glyphicon glyphicon-comment"></span> News/Happenings</a>
                                </li>
                                <li>
                                    <a href="?photos" style="color: #7a1e21;"><span class="glyphicon glyphicon-picture"></span> Latest Photos</a>
                                </li>
                                <li>
                                    <a href="?world" style="color: #7a1e21;"><span class="glyphicon glyphicon-globe"></span> Around the world</a>
                                </li>
                                <li>
                                    <a href="?gallery" style="color: #7a1e21;"><span class="glyphicon glyphicon-picture"></span> Gallery</a>
                                </li>
                                <li>
                                    <a href="?downloads" style="color: #7a1e21;"><span class="glyphicon glyphicon-download"></span> Downloads</a>
                                </li>
                                <li>
                                    <a href="?videos" style="color: #7a1e21;"><span class="glyphicon glyphicon-facetime-video"></span> Videos</a>
                                </li>
                                <!-- <li>
                                    <a href="#" style="color: #7a1e21;"><span class="glyphicon glyphicon-link"></span> Page(s)<span class="fa arrow"></a>
                                    <ul class="nav nav-third-level" style="color: #7a1e21;">
                                        <li>
                                            <a href="#home" data-toggle="modal" style="color: #7a1e21;"><span class="glyphicon glyphicon-home"></span> Home</a>
                                        </li>
                                        <li>
                                            <a href="?about" style="color: #7a1e21;"><span class="glyphicon glyphicon-info-sign"></span> About Us</a>
                                        </li>
                                        <li>
                                            <a href="#membership" data-toggle="modal" style="color: #7a1e21;"><span class="glyphicon glyphicon-user"></span> Membership</a>
                                        </li>
                                        <li>
                                            <a href="?news" style="color: #7a1e21;"><span class="glyphicon glyphicon-envelope"></span> Latest News/Events</a>
                                        </li>
                                        <li>
                                            <a href="#resources" data-toggle="modal" style="color: #7a1e21;"><span class="glyphicon glyphicon-briefcase"></span> Resources</a>
                                        </li>
                                        <li>
                                            <a href="?contact"  style="color: #7a1e21;"><span class="glyphicon glyphicon-earphone"></span> Contact Us</a>
                                        </li>                                        
                                    </ul>
                                </li> -->
                                <li>
                                    <a href="?spotlight" style="color: #7a1e21;"><span class="glyphicon glyphicon-flash"></span> SpotLight</a>
                                </li>
                                <li>
                                    <a href="?calendar" style="color: #7a1e21;"><span class="glyphicon glyphicon-calendar"></span> Events Calendar</a>
                                </li>
                                <li>
                                    <a href="?announcements" style="color: #7a1e21;"><span class="glyphicon glyphicon-bell"></span> Announcements</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                                            <a href="#membership" data-toggle="modal" style="color: #7a1e21;"><span class="glyphicon glyphicon-user"></span> GGS Membership</a>
                        <li>
                            <a href="#" class="bc" style="color: #7a1e21;"><i class="fa fa-flash fa-fw" style="color: #7a1e21;"></i> AYGEC 2016<span class="fa arrow"></span></a>
                            <!-- providing dropdown for aygec2016 -->
                            <ul class="nav nav-second-level" style="color: #7a1e21;">
                                <li><a href="?aygec=registered" style="color: #7a1e21;"><span class="glyphicon glyphicon-pencil"></span> Registered Members</a></li>
                            </ul>
                            <!-- end of dropdown for aygec2016 -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            
                <?php 
                $app->loadContentAdmin(); 
                ?>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->



<?php 
include "../../../geotechfiles/includes/modals.php";
?>

</body>

</html>
