<div class="row header">
<div class="col-md-2">

</div>
 
<div class="col-md-2">
<center><a href="?register" data-toggle="modal" data-keyboard="false" data-backdrop="static" class="noTd tooltip-bottom" title="Gallery"><span class="glyphicon glyphicon-user"></span> Register as GGS Member</center>
</div>

<div class="col-md-2">
<center><a href="portal/" class="noTd tooltip-bottom" title=""><span class="glyphicon glyphicon-user"></span> Member's Portal</center></a>
</div>

<div class="col-md-2">
<center><a href="#contact" class="noTd tooltip-bottom" title="Contact Us"><span class="glyphicon glyphicon-earphone"></span> Contact Us</center></a>
</div>

<div class="col-md-2">
<center><a href="#" class="noTd tooltip-bottom" title="Facebook"><img class="headerImg" src="images/fb.png"></a> &nbsp;
<a href="#" class="noTd tooltip-bottom" title="Instagram"><img class="headerImg" src="images/instagram.ico"></a>&nbsp;
<a href="#" class="noTd tooltip-bottom" title="YouTube"><img class="headerImg" src="images/youtube.png"></a>&nbsp;
<a href="#" class="noTd tooltip-bottom" title="Twitter"><img class="headerImg" src="images/twitter.png"></a></center>
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
	<span style="font-size: 15px; font-weight: bold;"><img class="rotM1e" src="banners/logo.png"/ style="width: 60px; height: 55px; margin-top:10px; border-radius: 15px; -moz-border-radius: 15px; -webkit-border-radius: 15px;"> <span id="e1" style="color:#ffda4c"><br/>GHANA GEOTECHNICAL SOCIETY</span></span>
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
<div class="col-md-1" style="background-color: #7a1e21" class="header2">
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
            <a class="navbar-brand" href="index.php">GGS</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
             <?php $geotech->genMenu(); ?>
            </ul>
          </div><!--/.nav-collapse -->
           </div><!--/.container-fluid -->
      </nav>
</div>

<div class="col-md-1" style="background-color: #7a1e21" class="header2">
&nbsp;
</div>
</div>
<!--end of menubar -->
