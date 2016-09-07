<?php 
session_start();
require "../../../geotechfiles/includes/functions.php";
$app= new Enersmart();
$app->checkIfLoggedInAdmin();
$theme=$app->getTheme();
$configData=$app->getConfigurationData();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $configData[3];?> | CMS - Log In</title>
    <link rel="shortcut icon" href="../../banners/<?php echo $configData[5]; ?>"/>
    <link rel="stylesheet" href="../css/index.css"/>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
 
  <link rel="stylesheet" href="../css/bootstrapDate.min.css"/>
  <link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css"/>
  <link rel="stylesheet" href="../css/bootstrapValidator.css"/>
  <script type="text/javascript" src="../js/bootstrapValidator.js"></script>
  <script type="text/javascript" src="../js/bootstrap-datetimepicker.js"></script>


    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="../js/index.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="row" style="background-color: <?php echo $theme[2]; ?>;">
        <center><h4 href="#" style="color: #fff; font-size: 20px;"><span style="color: #fff; font-weight: bold;"><?php echo $configData[2];?> (<?php echo $configData[3];?>)&nbsp;&nbsp;&nbsp;&nbsp;</span>| &nbsp;&nbsp;&nbsp;Administrative Panel</h4></center>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" style="background-color: <?php echo $theme[2]; ?>; color: #fff;">
                        <h3 class="panel-title" style="font-size: 25px; font-weight: bold;"><center><img src="../../banners/<?php echo $configData[4]; ?>" style="width: 50px; height: 50px; border-radius: 15px; -webkit-border-radius: 15px; -moz-border-radius: 15px;" /></center></h3>
                    </div>
                    <div class="panel-body">
                         <div class="row" id="displayRes">

                        </div>
                        <div class="row">
                        <br/>
                        </div>
                        <form role="form" method="post" action="#" class="form" id="loginForm">
                            <fieldset>
                                <div class="form-group input-group input-group-md">
                                 <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-user"></span>
                                 </span>
                                    <input class="form-control" id="username" placeholder="Username" name="username" type="text" autofocus required>
                                </div>
                                <div class="form-group input-group input-group-md">
                                <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-lock"></span>
                                 </span>
                                    <input class="form-control" id="password" placeholder="Password" name="password" type="password" required>
                                </div>
                                
                                <center><button type="submit" class="btn btn-sm btn-success tooltip-bottom" title="Click to Log In" style="background-color: <?php echo $theme[2]; ?>; border: 1px solid <?php echo $theme[2]; ?>; border-radius: 10px; -webkit-border-radius: 10px; -webkit-border-radius: 10px;"><span class="glyphicon glyphicon-log-in"></span> Log In</button></center>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- adding jqte -->

    <script type="text/javascript" src="../js/jquery-te-1.4.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/jquery-te-1.4.0.css"/>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
<?php
$app->verifyAdmin();
?>
<script type="text/javascript">
    $(function(){
        $('#loginForm').bootstrapValidator({
            message: 'This is not valid',
            feedbackIcons:{
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields:{
                username:{
                    validators:{
                        notEmpty:{
                            message: 'Username can\'t be empty'
                        },
                        stringLength:{
                            min: 5,
                            max: 20,
                            message: 'Invalid field length'
                        }
                    }
                },
                password:{
                    validators:{
                        notEmpty:{
                            message: 'Password can\'t be empty'
                        },
                        stringLength:{
                            min: 5,
                            max: 20,
                            message: 'Invalid field length'
                        }
                    }
                }
            }
        });
    });
</script>
</body>

</html>
