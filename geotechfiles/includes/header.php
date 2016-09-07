<?php 
  $theme=$geotech->getTheme();
  $configData=$geotech->getConfigurationData();
  $topheader=$geotech->getTopHeaderConfig();
  $social=$geotech->getSocialLinks();
?>
<?php 
  echo "<style>
    .header2{
    background-color: ".$theme[2].";
    color: #fff;
      margin: 0px 0px 0px 0px;
    padding: 0px;
  background-image: -webkit-gradient(linear, left top, left bottom, from(".$theme[2]."), to(".$theme[2]."));
  background-image: -webkit-linear-gradient(top, ".$theme[2]." 0%, ".$theme[2]." 100%);
  background-image:      -o-linear-gradient(top, ".$theme[2]." 0%, ".$theme[2]." 100%);
  background-image:         linear-gradient(to bottom, ".$theme[2]." 0%,".$theme[2]." 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#248f82', endColorstr='".$theme[2]."',GradientType=0 ); /* IE6-9 */
  background-repeat: repeat-x; /* Repeat the gradient */
  border-bottom: 1px solid ".$theme[2].";
}
    </style>";
?>
<div class="row header">
<div class="col-md-2">

</div>
 
<div class="col-md-2">
<center><a href="<?php echo $topheader[0][1]; ?>" <?php if($topheader[0][4]==0){ echo "target='_blank'"; } ?> class="noTd tooltip-bottom" title="<?php echo $topheader[0][2]; ?>"><span class="glyphicon glyphicon-<?php echo $topheader[0][3]; ?>"></span> <?php echo $topheader[0][2]; ?></center>
</div>

<div class="col-md-2">
<center><a href="<?php echo $topheader[1][1]; ?>" <?php if($topheader[1][4]==0){ echo "target='_blank'"; } ?> class="noTd tooltip-bottom" title="<?php echo $topheader[1][2]; ?>"><span class="glyphicon glyphicon-<?php echo $topheader[1][3]; ?>"></span> <?php echo $topheader[1][2]; ?></center>
</div>

<div class="col-md-2">
<center><a href="<?php echo $topheader[2][1]; ?>" <?php if($topheader[2][4]==0){ echo "target='_blank'"; } ?> class="noTd tooltip-bottom" title="<?php echo $topheader[2][2]; ?>"><span class="glyphicon glyphicon-<?php echo $topheader[2][3]; ?>"></span> <?php echo $topheader[2][2]; ?></center>
</div>

<div class="col-md-2">
<center><a href="<?php echo $social[0][1]; ?>" class="noTd tooltip-bottom" title="Facebook" target="_blank"><img class="headerImg" src="images/fb.png"></a> &nbsp;
<a href="<?php echo $social[1][1]; ?>" class="noTd tooltip-bottom" title="Instagram" target="_blank"><img class="headerImg" src="images/instagram.ico"></a>&nbsp;
<a href="<?php echo $social[2][1]; ?>" class="noTd tooltip-bottom" title="YouTube" target="_blank"><img class="headerImg" src="images/youtube.png"></a>&nbsp;
<a href="<?php echo $social[3][1]; ?>" class="noTd tooltip-bottom" title="Twitter" target="_blank"><img class="headerImg" src="images/twitter.png"></a></center>
</div>

<div class="col-md-2">

</div>
</div>

<!--header2-->
<div class="row header2" style="padding-right: 0px; margin-right: 0px;">
<div class="col-md-2">

</div>

<div class="col-md-2">
<center>
	<span style="font-size: 15px; font-weight: bold;"><img class="rotM1e" src="banners/<?php echo $configData[4]; ?>" style="width: 60px; height: 60px; margin-top:10px; border-radius: 15px; -moz-border-radius: 15px; -webkit-border-radius: 15px;"> <span id="e1" style="color:<?php echo $theme[3]; ?>;"><br/><?php echo $configData[2];?></span></span>
</center>
</div>

<div class="col-md-3">

</div>

<div class="col-md-3">
<form method="post" action="?search" class="searchForm">
<input type="text" name="search" placeholder="Search.." style="color: #000; margin-bottom: 8px;" required/>
<select name="field" style="color: #000" style="padding-top: 10px;">
	<option value="all">The Whole Site</option>
	<option value="news">News</option>
</select>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Go" style="color: #000">
</form>
</div>

<div class="col-md-2" style="margin-right: 0px; padding-right: 0px;">

</div>

</div>
<!--end of header2-->


<!--menubar -->
<div class="row" style="padding: 0px; margin: 0px;">
<div class="col-md-1" style="background-color: <?php echo $theme[2]; ?>" class="header2">
&nbsp;
</div>

<div class="col-md-10" style="padding: 0px; margin: 0px;">
 <nav class="navbar navbar-default">
        <div class="container-fluid">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">MENU</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="?home"><?php echo $configData[3]; ?></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
             <?php $geotech->genMenu(); ?>
            </ul>
          </div><!--/.nav-collapse -->
           </div><!--/.container-fluid -->
      </nav>
</div>

<div class="col-md-1" style="background-color: <?php echo $theme[2]; ?>" class="header2">
&nbsp;
</div>
</div>
<!--end of menubar -->
