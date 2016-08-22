<?php
require "dbconfig.php";



class Enersmart
{

	function __construct()
	{
		date_default_timezone_set('UTC');
		mysql_connect(HOST,USERNAME,PASSWORD);
		mysql_select_db(DB_NAME);
	}

//generate rss
function genrss(){
	$cDate=$this->genDate();
	$handle=fopen("rss.xml","w");
	fwrite($handle, " ");
	fclose($handle);
	$configData=$this->getConfigurationData();
	$data="<?xml version='1.0' encoding='UTF-8'?><rss version='2.0'
	xmlns:content='http://purl.org/rss/1.0/modules/content/'
	xmlns:wfw='http://wellformedweb.org/CommentAPI/'
	xmlns:dc='http://purl.org/dc/elements/1.1/'
	xmlns:atom='http://www.w3.org/2005/Atom'
	xmlns:sy='http://purl.org/rss/1.0/modules/syndication/'
	xmlns:slash='http://purl.org/rss/1.0/modules/slash/'
	>";
	$data.="<channel>";
	$data.="<title>
		".$configData[2].": News and Happenings
		</title>
		<link>/rss.xml</link>
		<language>en-us</language>
		<pubDate>".$cDate."</pubDate>
		<description>
		<![CDATA[
		Ghana Geotechnical Society
		]]>
		</description>";

		//selecting data from latest news
		$query="select * from news where status=1 order by date desc";
		$result=mysql_query($query);
		while($row=mysql_fetch_array($result)){
			$data.="<item>
			<title>".ucwords(strtolower($row['title']))."</title>
			<link>
			".$configData[6]."/?news&amp;id=".$row['id']."
			</link>
			<description>
			<![CDATA[
			<img src='".$configData[6]."/banners/".$row['image']."' align='left' hspace='10' alt='' /><p><a".substr($row['message'], 0, 250)."</p>
			]]>
			</description>
			<pubDate>".$row['date']."</pubDate>
			<author>GGS</author>
			<guid isPermaLink='true'>/?news&amp;id=".$row['id']."</guid>
			</item>";
		}

	$data.="</channel>";
	$data.="</rss>";
	$handle=fopen("rss.xml","w");
	fwrite($handle,$data);
	fclose($handle);
}

//search result
function loadSearchResult2(){
	$theme=$this->getTheme();
	if(isset($_POST['search'])){
		$search=$this->sanitize($_POST['search']);
		$query="select * from news where title like '%$search%' or message like '%search%' and status=1";
		$result=mysql_query($query);
		while($row=mysql_fetch_array($result)){
			echo "<div class='row well' style='margin: 15px;border-radius: 25px;-webkit-border-radius: 25px; -moz-border-radius: 25px;'>
					<div class='row' style='margin: 15px;'>
					<h4 style='font-size: 20px; color: ".$theme[2]."; font-weight: bold; text-decoration: underline'>".ucwords(strtolower($row['title']))."</h4>
					</div>
					<div class='row' style='margin: 15px;'>
						<div class='col-md-4'>
						<p><img src='../../banners/".$row['image']."' class='img-circle' style='width: 100px; height: 100px;'/></p>
						</div>
						<div class='col-md-8'>
						<p>".substr($row['message'], 0, 250)."..<a href='../../?news&id=".$row['id']."' target='_blank' class='btn btn-xs btn-primary' style='background-color: ".$theme[2]."; color: #fff; border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;'>Read more...</a></p>
						</div>
					</div>
				</div>";
		}
		$query="select * from articles where title like '%$search%' or message like '%search%' and status=1";
		$result=mysql_query($query);
		while($row=mysql_fetch_array($result)){
			echo "<div class='row well' style='margin: 15px;border-radius: 25px;-webkit-border-radius: 25px; -moz-border-radius: 25px;'>
					<div class='row' style='margin: 15px;'>
					<h4 style='font-size: 20px; ".$theme[2]."; font-weight: bold; text-decoration: underline'>".ucwords(strtolower($row['title']))."</h4>
					</div>
					<div class='row' style='margin: 15px;'>
						<div class='col-md-4'>
						<p><img src='../../banners/".$row['image']."' class='img-circle' style='width: 100px; height: 100px;'/></p>
						</div>
						<div class='col-md-8'>
						<p>".substr($row['message'], 0, 250)."..<a href='../../?articles&id=".$row['id']."' target='_blank' class='btn btn-xs btn-primary' style='background-color: ".$theme[2]."; color: #fff; border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;'>Read more...</a></p>
						</div>
					</div>
				</div>";
		}
	}else{
		$query="select * from news where  status=1";
		$result=mysql_query($query);
		while($row=mysql_fetch_array($result)){
			echo "<div class='row well' style='margin: 15px;border-radius: 25px;-webkit-border-radius: 25px; -moz-border-radius: 25px;'>
					<div class='row' style='margin: 15px;'>
					<h4 style='font-size: 20px; color: ".$theme[2]."; font-weight: bold; text-decoration: underline'>".ucwords(strtolower($row['title']))."</h4>
					</div>
					<div class='row' style='margin: 15px;'>
						<div class='col-md-4'>
						<p><img src='../../banners/".$row['image']."' class='img-circle' style='width: 100px; height: 100px;'/></p>
						</div>
						<div class='col-md-8'>
						<p>".substr($row['message'], 0, 250)."..<a href='../../?news&id=".$row['id']."' target='_blank' class='btn btn-xs btn-primary' style='background-color: ".$theme[2]."; color: #fff; border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;'>Read more...</a></p>
						</div>
					</div>
				</div>";
		}
		$query="select * from articles where status=1";
		$result=mysql_query($query);
		while($row=mysql_fetch_array($result)){
			echo "<div class='row well' style='margin: 15px;border-radius: 25px;-webkit-border-radius: 25px; -moz-border-radius: 25px;'>
					<div class='row' style='margin: 15px;'>
					<h4 style='font-size: 20px; color: ".$theme[2]."; font-weight: bold; text-decoration: underline'>".ucwords(strtolower($row['title']))."</h4>
					</div>
					<div class='row' style='margin: 15px;'>
						<div class='col-md-4'>
						<p><img src='../../banners/".$row['image']."' class='img-circle' style='width: 100px; height: 100px;'/></p>
						</div>
						<div class='col-md-8'>
						<p>".substr($row['message'], 0, 250)."..<a href='../../?articles&id=".$row['id']."' target='_blank' class='btn btn-xs btn-primary' style='background-color: ".$theme[2]."; color: #fff; border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;'>Read more...</a></p>
						</div>
					</div>
				</div>";
		}
	}
}
function loadSearchResult(){
	$theme=$this->getTheme();
	if(isset($_POST['search'])){
		$search=$this->sanitize($_POST['search']);
		$query="select * from news where title like '%$search%' or message like '%search%' and status=1";
		$result=mysql_query($query);
		while($row=mysql_fetch_array($result)){
			echo "<div class='row well' style='margin: 15px;border-radius: 25px;-webkit-border-radius: 25px; -moz-border-radius: 25px;'>
					<div class='row' style='margin: 15px;'>
					<h4 style='font-size: 20px; color:".$theme[2]."; font-weight: bold; text-decoration: underline'>".ucwords(strtolower($row['title']))."</h4>
					</div>
					<div class='row' style='margin: 15px;'>
						<div class='col-md-4'>
						<p><img src='banners/".$row['image']."' class='img-circle' style='width: 100px; height: 100px;'/></p>
						</div>
						<div class='col-md-8'>
						<p>".substr($row['message'], 0, 250)."..<a href='?news&id=".$row['id']."' class='btn btn-xs btn-primary' style='background-color:".$theme[2]."; color: #fff; border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;'>Read more...</a></p>
						</div>
					</div>
				</div>";
		}
		$query="select * from articles where title like '%$search%' or message like '%search%' and status=1";
		$result=mysql_query($query);
		while($row=mysql_fetch_array($result)){
			echo "<div class='row well' style='margin: 15px;border-radius: 25px;-webkit-border-radius: 25px; -moz-border-radius: 25px;'>
					<div class='row' style='margin: 15px;'>
					<h4 style='font-size: 20px; color: ".$theme[2]."; font-weight: bold; text-decoration: underline'>".ucwords(strtolower($row['title']))."</h4>
					</div>
					<div class='row' style='margin: 15px;'>
						<div class='col-md-4'>
						<p><img src='banners/".$row['image']."' class='img-circle' style='width: 100px; height: 100px;'/></p>
						</div>
						<div class='col-md-8'>
						<p>".substr($row['message'], 0, 250)."..<a href='?articles&id=".$row['id']."' class='btn btn-xs btn-primary' style='background-color: ".$theme[2]."; color: #fff; border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;'>Read more...</a></p>
						</div>
					</div>
				</div>";
		}
	}else{
		echo "<center><h2><span class='glyphicon glyphicon-search'></span> No results</h2></center>";
	}
}

//delete from links
function delFromLinks($link){
	$link=$this->sanitize($link);
	$query="delete from links where source='$link'";
	mysql_query($query);
}

//verifying article
function verifyArticle($id){
	$id=$this->sanitize($id);
	$query="select count(*) from articles where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	if($result[0] >=1){

	}else{
		echo "<script>window.location.assign('?home');</script>";
	}
}

//generating menu ids
function genMenuIds(){
	$query="select * from menu";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){
		echo "<option value='".$row['id']."'>".ucwords(strtolower($row['title']))."</option>";
	}
}

//add mainmenu
function addMainMenu(){
	$title=$this->sanitize($_POST['title']);
	$link=$this->sanitize($_POST['article']);
	$glyphicon=$this->sanitize($_POST['glyphicon']);
	$query="insert into menu(title,link,glyphicon,status) values('$title','$link','$glyphicon',0)";
	$result=mysql_query($query);
	if($result){
		echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Menu Added..</span></center><br/><br/>').fadeOut(5000);
						window.location.assign('?menu');
					</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
				window.location.assign('?menu');
			</script>";
	}
}

//add submenu
function addSubMenu(){
	$title=$this->sanitize($_POST['title']);
	$link=$this->sanitize($_POST['article']);
	$glyphicon=$this->sanitize($_POST['glyphicon']);
	$parent=$this->sanitize($_POST['parent']);
	$query="insert into submenu(title,link,glyphicon,parent,status) values('$title','$link','$glyphicon',$parent,0)";
	$result=mysql_query($query);
	if($result){
		echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>SubMenu Added..</span></center><br/><br/>').fadeOut(5000);
						window.location.assign('?menu');
					</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
				window.location.assign('?menu');
			</script>";
	}
}

//deleting from submenu
function delFromSubMenu($id){
	$id=$this->sanitize($id);
	$query="delete from submenu where parent=$id";
	mysql_query($query);
}

 //delete menu
function deleteMenu($id,$category){
	$id=$this->sanitize($id);
	$category=$this->sanitize($category);
	if($category=='main'){
		$query="delete from menu where id=$id";
		$res=mysql_query($query);
		if($res){
			//clearing submenu
			$this->delFromSubMenu($id);
			echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Menu Deleted..</span></center><br/><br/>').fadeOut(5000);
						window.location.assign('?menu');
					</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
				window.location.assign('?menu');
			</script>";
		}
	}else{
		$query="delete from submenu where id=$id";
		$res=mysql_query($query);
		if($res){
			echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>SubMenu Deleted..</span></center><br/><br/>').fadeOut(5000);
						window.location.assign('?menu');
					</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
				window.location.assign('?menu');
			</script>";
		}
	}
}

//toggle menu
function toggleMenu($id,$category){
	$id=$this->sanitize($id);
	$category=$this->sanitize($category);
	if($category=='main'){
		//getting current status
		$query="select status from menu where id=$id";
		$result=mysql_query($query);
		$result=mysql_fetch_row($result);
		if($result[0]==0){
			$query1="update menu set status=1 where id=$id";
		}else{
			$query1="update menu set status=0 where id=$id";
		}
		$res=mysql_query($query1);
		if($res){
			echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Menu Updated..</span></center><br/><br/>').fadeOut(5000);
						window.location.assign('?menu');
					</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
				window.location.assign('?menu');
			</script>";
		}
	}else{
		$query="select status from submenu where id=$id";
		$result=mysql_query($query);
		$result=mysql_fetch_row($result);
		if($result[0]==0){
			$query1="update submenu set status=1 where id=$id";
		}else{
			$query1="update submenu set status=0 where id=$id";
		}
		$res=mysql_query($query1);
		if($res){
			echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Menu Updated..</span></center><br/><br/>').fadeOut(5000);
						window.location.assign('?menu');
					</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
				window.location.assign('?menu');
			</script>";
		}
	}
}

//generate admin menu
function genMenuAdmin(){
	$query="select * from menu";
	$result=mysql_query($query);
	$theme=$this->getTheme();
	$data="<div class='panel-group well' id='accordion' style='border-radius: 25px; -webkit-border-radius: 25px; -moz-border-radius: 25px;'>";
	while($row=mysql_fetch_array($result)){
		if($row['status']==1){
			$btn="btn-success";
			$status="glyphicon glyphicon-ok";
		}else{
			$btn="btn-warning";
			$status="glyphicon glyphicon-off";
		}
		$disabled=" ";
		if($row['mydef']==1){
			$disabled="disabled";
		}
		$data.="<div class='panel panel-default' style='border-radius: 15px; -moz-border-radius: 15px; -webkit-border-radius: 15px;'>
      <div class='panel-heading' style='background-color: #fff; color: #035888; font-weight: bold;border-radius: 15px; -moz-border-radius: 15px; -webkit-border-radius: 15px;'>
        <h4 class='panel-title'>
        	<div class='row'>
					<div class='col-md-10'>
						<a data-toggle='collapse' data-parent='#accordion' href='#collapse".$row['id']."' style='font-weight: bold;'><span class='glyphicon glyphicon-".$row['glyphicon']."'></span> ".ucwords(strtolower($row['title']))."</a>
					</div>
					<div class='col-md-1'>
						<center><form method='post' action='#'><button type='submit' name='toggleMenu' value='".$row['id']."' class='btn btn-xs ".$btn." tooltip-bottom' title='Status' style='border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;' ".$disabled."><span class='".$status."' ></span></button></form></center>
					</div>
					<!--<div class='col-md-1'>
						<center><form method='post' action='#'><button type='submit' class='btn btn-xs btn-info tooltip-bottom' title='Edit Menu' style='border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;' ".$disabled."><span class='glyphicon glyphicon-pencil'></span></button></form></center>
					</div>-->
					<div class='col-md-1'>
						<center><form method='post' action='?menu'><button type='submit' name='deleteMenu' value='".$row['id']."' class='btn btn-xs btn-danger tooltip-bottom' title='Delete Menu' style='border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;' ".$disabled."><span class='glyphicon glyphicon-remove'></span></button></form></center>
					</div>
        	</div>
        </h4>
      </div>
      <div id='collapse".$row['id']."' class='panel-collapse collapse'>
        <div class='panel-body'>";
        		$parent=$this->sanitize($row['id']);
				$query1="select * from submenu where parent=$parent";
				$result1=mysql_query($query1);
				$data1=null;
				while($row1=mysql_fetch_array($result1)){
					if($row1['status']==1){
						$btn1="btn-success";
						$status1="glyphicon glyphicon-ok";
					}else{
						$btn1="btn-warning";
						$status1="glyphicon glyphicon-off";
					}
					$disabled1=" ";
					if($row1['mydef']==1){
						$disabled1="disabled";
					}
					$data1.="<div class='row' style='margin: 5px;border: 1px dashed ".$theme[2]."; padding: 5px;'>
					<div class='col-md-10'>
						<a data-toggle='collapse' data-parent='#accordion' href='#collapse".$row['id']."' style='font-weight: bold;'><span class='glyphicon glyphicon-".$row1['glyphicon']."'></span> ".ucwords(strtolower($row1['title']))."</a>
					</div>
					<div class='col-md-1'>
						<center><form method='post' action='#'><button type='submit' name='toggleSubMenu' value='".$row1['id']."' class='btn btn-xs ".$btn1." tooltip-bottom' title='Status' style='border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;' ".$disabled1."><span class='glyphicon ".$status1."' ></span></button></form></center>
					</div>
					<!--<div class='col-md-1'>
						<center><form method='post' action='#'><button type='submit' class='btn btn-xs btn-info tooltip-bottom' title='Edit SubMenu' style='border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;' ".$disabled1."><span class='glyphicon glyphicon-pencil'></span></button></form></center>
					</div>-->
					<div class='col-md-1'>
						<center><form method='post' action='#'><button type='submit' name='deleteSubMenu' value='".$row1['id']."' class='btn btn-xs btn-danger tooltip-bottom' title='Delete SubMenu' style='border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;' ".$disabled1."><span class='glyphicon glyphicon-remove'></span></button></form></center>
					</div>
        	</div>";
				}
		$data.=$data1;
        $data.="</div>
      </div>
    </div>";
	}
	$data.="</div>";
	echo $data;
}

//generate menu
function checksubnum($id){
	$id=$this->sanitize($id);
	$query="select count(*) from submenu where parent=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	return $result[0];
}
function genMenu(){
	$query="select * from menu where status=1 order by id";
	$result=mysql_query($query);
	$data=null;
	$theme=$this->getTheme();
	while($row=mysql_fetch_array($result)){
		$id=$this->sanitize($row['id']);
		$homeid=explode("?",$row['link']);
	//	$homeid2=$homeid[1];
		//checking if there is a submenu or not
		$num=$this->checksubnum($row['id']);
		if($num >=1){
			//sub menu exists
			$data.= "<li class='dropdown'>
                <a href='#' style='font-weight: bold; color: ".$theme[5].";' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span class='glyphicon glyphicon-".$row['glyphicon']."'></span> ".strtoupper($row['title'])."<span class='caret'></span></a>
                <ul class='dropdown-menu'>";
                $query1="select * from submenu where parent=$id and status=1";
                $result1=mysql_query($query1);
                $data1=null;
                while($row1=mysql_fetch_array($result1)){
                	$data1.= " <li><a href='".$row1['link']."' style='color: ".$theme[5].";' class='tooltip-bottom' title='".ucfirst(strtolower($row1['title']))."'><span class='glyphicon glyphicon-".$row1['glyphicon']."'></span> ".ucwords(strtolower($row1['title']))."</a></li>";
                }
             $data.=$data1;
            $data.= "</ul></li>";
		}else{
			
			//sub menu does not exist
			$data.= "<li><a href='".$row['link']."' style='color: ".$theme[5]."; font-weight: bold;' class='tooltip-bottom' title='".ucwords(strtolower($row['title']))."'><span class='glyphicon glyphicon-".$row['glyphicon']."'></span> ".strtoupper($row['title'])."</a></li>";
		}
	}
	echo $data;
}
//deleteAygecMember();
function deleteAygecMember(){
	$id=$_POST['delete'];
	$query="delete from aygecmembers where id=$id";
	$result=mysql_query($query);
	if($result){
		echo "<script>window.location.assign('?aygec'); </script>";
	}else{
		echo "<script>window.location.assign('?aygec'); </script>";	
	}
}


//###...gen aygec csv
function genaygeccsv(){
	$output = fopen('php://output', 'w');

	// output the column headings
	fputcsv($output, array('ID', 'Title', 'Last Name', 'Other Names','National Society','Institution', 'Category','Qualification','Address','City','Country','Mobile Number','Email Address','Travel Details','Arrival Time','Departure Time','Accommodation','Presenting','Tour 1','Tour 2','Special Need','Authentication Code'));

	// fetch the data
	$rows = mysql_query('SELECT id,title,lastname,onames,nationalsociety,institution,category,qualification,address,city,country,mobileNo,emailAddr,travel,arrivaltime,departuretime,accommodation,presenting,tour1,tour2,need,eCode FROM aygecmembers');

	while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);
}

function genggsmemberscsv(){
	$output = fopen('php://output', 'w');

	// output the column headings
	fputcsv($output, array('UserName','Full Name','Membership Type','Postal Address','Mobile Number','Email','Gender','Nationality','Employer Company','Employer Company Address','University','Year Completed','Qualification','University','Year Completed','Qualification','University','Year Completed','Qualification','Workplace','GhIE Member','GhIE Number','Date of Registration'));

	// fetch the data
	$rows = mysql_query('SELECT username,fullname,membershiptype,postaladdress,mobileNo,email,gender,nationality,employercompany,employercompanyaddr,university1,u1yearcomp,u1qualification,university2,u2yearcomp,u2qualification,university3,u3yearcomp,u3qualification,workplace,ghiemember,ghieno,datereg FROM gssmembership');

	while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);
}

//####send mail function
function sendHMail($sender,$receiver,$subject,$message){
                $headers="MIME-Version: 1.0"."\r\n";
                $headers .="Content-type:text/html;charset=UTF-8"."\r\n";
                $headers .="From: ".$sender."\r\n";
                $this->sendMail($receiver,$subject,$message,$headers);
}

function sendMail($receiver,$subject,$message,$headers){
                mail($receiver,$subject,$message,$headers);
}
function sendPMail($sender,$receiver,$subject,$message){
                $headers="From: ".$sender. "\r\n";
                $this->sendMail($receiver,$subject,$message,$headers);
}
//end of send mail

//####updating loggedIn table
function updatelogin($username,$value){
	$value=$this->sanitize($value);
	$value=intval($value);
	$query="select * from loggedIn where username='$username'";
	$result=mysql_query($query);
	$num=mysql_num_rows($result);
	if($num < 1){
		$query="insert into loggedIn values('$username',$value)";
	}else{
		$query="update loggedIn set status=$value where username='$username'";
	}
	mysql_query($query);
}
//### end of updating loggedIn table


//#####...creating links.....
function createLinks($title,$source){
	$query="insert into links values('$title','$source')";
	mysql_query($query);
}

function getLinkTitle($source){
	$query="select title from links where source='$source'";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	if($result[0]==null){
		return "None";
	}else{
		return $result[0];
	}
}
//##..end of creating links....

//getting latestnews content from article
function getNewsContent($id){
	$id=$this->sanitize($id);
	$query="select message from articles where id=$id limit 1";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	return $this->sanitize2($result[0]);
}

//generating glyphicon
function genGlyphicon(){
	$query="select * from glyphicon";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){
		echo "<option value='".$row['name']."'>".ucwords(strtolower($row['name']))."</option>";
	}
}

function genLinks2(){
	$query="select * from articles";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){
		echo "<option value='".$row['id']."'>".$row['title']."</option>";
	}
}

//###..generating links...
function genLinks(){
	$query="select * from links";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){
		echo "<option value='".$row['source']."'>".$row['title']."</option>";
	}
}
//####.....

//delete ggs member
function deleteggsmember($id){
	$id=$this->sanitize($id);
	$query="delete from gssmembership where id=$id";
	$result=mysql_query($query);
	echo "<script>window.location.assign('?registeredMembers');</script>";
}

//###generating ggs registration members
function genGGSRegMembers(){
	$query="select * from gssmembership";
	$result=mysql_query($query);
	$count=1;
	while($row=mysql_fetch_array($result)){
		echo "<tr><td>".$count."</td><td>".$row['fullname']."</td><td>".$row['mobileNo']."</td><td>".$row['email']."</td><td><center><form method='post' action='?registeredMembers'><button type='submit' name='deleteggsmember' value='".$row['id']."' class='btn btn-danger btn-xs tooltip-bottom' title='Delete Details' style='border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;'><span class='glyphicon glyphicon-remove'></span></button></form></center></td></tr>";
		$count++; 
	}
}

function genGGSActiveMembers(){
	$query="select username from loggedIn where status=1";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){
		$username=$row['username'];
		$query="select * from gssmembership where username='$username'";
		$result=mysql_query($query);
		$count=1;
		while($row=mysql_fetch_array($result)){
			echo "<tr><td>".$count."</td><td>".$row['fullname']."</td><td>".$row['mobileNo']."</td><td>".$row['email']."</td><td><center><button class='btn btn-xs btn-success' style='border-radius: 25px; -moz-border-radius: 25px; -webkit-border-radius: 25px;'><span class='glyphicon glyphicon-flash'></span> active</button></center></td></tr>";
			$count++;
		}
	}
}
//end of ggs registration members	

function dfilesize($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}

//##previewing downloads
function previewDownloads(){
	if(isset($_POST['category'])){
			//echo "<h1>working</h1>";
		$category=$this->sanitize($_POST['category']);
	}else{
		$query="select category from downloads where status=1";
		$result=mysql_query($query);
		$gen=0;
		$category=null;
		while($row=mysql_fetch_array($result)){
			if($gen==1){
				break;
			}
			$category=$row['category'];
			$gen++;
		}

	}
	//acquired category---querying
	$query="select * from downloadslist where category='$category'";
	$result=mysql_query($query);

	//###########generating three pictures each...
	$data="<legend><center><span class='glyphicon glyphicon-th'></span> ".$category." (click to download files)</center></legend>";
	$data.="<table class='table table-hover table-bordered'>";
	$data.="<thead><tr><th><center>File Description</center></th><th><center>Download Link</center></th><th><center>File Size</center></th></tr>";
	$data.="</thead>";
	$data.="</tbody>";
	while($row=mysql_fetch_array($result)){
		$fsize=filesize("downloads/".$row['filename']);
		$fsize=$this->dfilesize($fsize);
		$data.="<tr><td>".ucfirst($row['description'])."</td><td><center><a href='downloads/".$row['filename']."' class='btn btn-xs btn-success tooltip-bottom' title='Download ".$row['description']."'><span class='glyphicon glyphicon-download'></span></a></center></td><td><center>".$fsize."</center></td></tr>";
	}
	$data.="</tbody>";
	$data.="</table>";
	echo $data;
	//#####end of generating three pictures each..
}
//##end of previewing downloads


//###previewing video in video section
function previewVideo(){
	if(isset($_POST['category'])){
			//echo "<h1>working</h1>";
		$category=$this->sanitize($_POST['category']);
	}else{
		$query="select category from videos where status=1";
		$result=mysql_query($query);
		$gen=0;
		$category=null;
		while($row=mysql_fetch_array($result)){
			if($gen==1){
				break;
			}
			$category=$row['category'];
			$gen++;
		}

	}
	//acquired category---querying
	$query="select * from videoslist where category='$category'";
	$result=mysql_query($query);

	//###########generating three pictures each...
	$data="<legend><center><span class='glyphicon glyphicon-th'></span> ".$category." (click to preview videos)</center></legend>";
	$data.="<div id='links'>";
	while($row=mysql_fetch_array($result)){
		$data.="<a href='".$row['source']."' class='img-thumbnail' style='margin: 15px;' data-gallery>
		        <iframe width='200px' height='150px' src='".$row['source']."' frameborder='0' clas='img-thumbnail' allowfullscreen  title='".$row['description']."' data-gallery></iframe>
		        <p style='color: #000;'><center>".$row['description']."</center></p>
		    </a>";
	}
	$data.="</div>";
	echo $data;
	//#####end of generating three pictures each..
}
//##end of previewing video in video section

function previewGallery(){
	if(isset($_POST['category'])){
			//echo "<h1>working</h1>";
		$category=$this->sanitize($_POST['category']);
	}else{
		$query="select category from gallery where status=1";
		$result=mysql_query($query);
		$gen=0;
		$category=null;
		while($row=mysql_fetch_array($result)){
			if($gen==1){
				break;
			}
			$category=$row['category'];
			$gen++;
		}

	}
	//acquired category---querying
	$query="select * from gallerylist where category='$category'";
	$result=mysql_query($query);

	//###########generating three pictures each...
	$data="<legend><center><span class='glyphicon glyphicon-th'></span> ".$category." (click to preview images)</center></legend>";
	$data.="<div id='links'>";
	while($row=mysql_fetch_array($result)){
		$data.="<a href='banners/".$row['image']."' title='".$row['description']."' class='img-thumbnail' style='margin: 15px;' data-gallery>
		        <img src='banners/".$row['image']."' style='margin: 5px; width: 150px; height: 150px;''  alt='".$row['description']."' class='img-thumbnail'>
		    </a>";
	}
	$data.="</div>";
	echo $data;
	//#####end of generating three pictures each..
}

function previewContactGGS(){
	$query="select * from contact where status=1";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	echo $result[2];
}

function previewAboutGGS(){
	$query="select * from about where status=1";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	echo $result[2];
}

function previewWorld(){
	$query="select * from world where status=1";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	$data="<div class='row' style='margin: 2px;'>";
	$data.="<div class='col-md-5'>";
	$data.="<iframe width='200px' height='150px' src='".$result[2]."' frameborder='0' clas='img-thumbnail' allowfullscreen></iframe>";
	$data.="</div>";
	$data.="<div class='col-md-1'></div>";
	$data.="<div class='col-md-6'>";
	$data.="<p><a href='".$result[4]."' style='text-decoration: none; color: #000;'>".$result[3]."</a></p>";
	$data.="</div>";
	$data.="</div>";
	echo $data;
}

function previewLatestPhotos(){
	$query="select * from photos where status=1";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	$data="<div class='row' style='margin: 2px;'>";
	$data.="<div class='col-md-4'>";
	$data.="<img src='banners/".$result[2]."' class='img-thumbnail' style='width: 150px; height: 150px;'/>";
	$data.="</div>";
	$data.="<div class='col-md-8'>";
	$data.="<p><a href='".$result[4]."' style='text-decoration: none; color: #000;'>".$result[3]."</a></p>";
	$data.="</div>";
	$data.="</div>";
	echo $data;
}

function previewHappenings(){
	$query="select * from happenings where status=1";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	echo $result[2];
}


function previewFeaturedNews(){
	$query="select * from featurednews where status=1";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	echo $result[2];
}

//#######################GGS MEMBER FUNCTIONS.....
function loadContentPortal(){
	if(isset($_GET['logout'])){
		$this->updatelogin($_SESSION['gtmember'],0);
		unset($_SESSION['gtmember']);
		echo "<script>
				window.location.assign('login.php');
			</script>";
	}elseif(isset($_GET['dashboard'])){
		include "portaldashboard.php";
	}elseif(isset($_GET['changepwd'])){
		include "portal/chngpwd.php";
	}elseif(isset($_GET['editdetails'])){
		include "portal/profile.php";
	}elseif(isset($_GET['latestnews'])){
		include "portal/news.php";
	}else{
		include "portaldashboard.php";
	}
}
function verifyGGSMember(){
	$username=$this->sanitize($_POST['username']);
	$password=$this->sanitize($_POST['password']);
	$password=md5($password);
	$query="select * gssmembership where username='$username' and password='$password'";
	$result=mysql_query($query);
	$result=$this->verifyCredentials($username,$password,'gssmembership');
			if($result==1){
				$this->updateLastLogin($username);
				$_SESSION['gtmember']=$username;
				$this->updatelogin($username,1);
				echo "<script>
					window.location.assign('index.php');
					</script>";
			}else{
				echo "<script>
						$('#displayRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Credentials Invalid</span><br/></center>').fadeOut(5000);
					</script>";
			}
}
//#########################..end of ggs memer functions...



//##########################..ggs member registration
function addGGSMember(){
	$username=$this->sanitize($_POST['username']);
	$password=$this->sanitize($_POST['password']);
	$password=md5($password);
	$fullname=$this->sanitize($_POST['fullname']);
	$mobileNo=$this->sanitize($_POST['mobileNo']);
	$nationality=$this->sanitize($_POST['nationality']);
	$membershiptype=$this->sanitize($_POST['membershiptype']);
	$emailAddress=$this->sanitize($_POST['emailAddress']);
	$employerCompany=$this->sanitize($_POST['employerCompany']);
	$postalAddress=$this->sanitize($_POST['postaladdress']);
	$gender=$this->sanitize($_POST['gender']);
	$employerCompanyAddress=$this->sanitize($_POST['employerCompanyAddress']);
	$university1=$this->sanitize($_POST['university1']);
	$university2=$this->sanitize($_POST['university2']);
	$university3=$this->sanitize($_POST['university3']);
	$year1=$this->sanitize($_POST['year1']);
	$year2=$this->sanitize($_POST['year2']);
	$year3=$this->sanitize($_POST['year3']);
	$qualify1=$this->sanitize($_POST['qualify1']);
	$qualify2=$this->sanitize($_POST['qualify2']);
	$qualify3=$this->sanitize($_POST['qualify3']);
	$workplace=$this->sanitize($_POST['workplace']);
	$ghiemember=$this->sanitize($_POST['ghiemember']);
	$ghieno=$this->sanitize($_POST['ghieno']);
	$cDate=$this->genDate();
	//username,password,fullname,membershiptype,postaladdress,mobileNo,email,gender,nationality,employercompany,employercompanyaddr,university1,u1yearcomp,u1qualification,university2,u2yearcomp,u2qualification,university3,u3yearcomp,u3qualification,workplace,ghiemember,ghieno,datereg

	$query="select * from gssmembership where username='$username' and password='$password'";
	$result=mysql_query($query);
	$num=mysql_num_rows($result);
	if($num >= 1){
		echo "<script>
				alert('Choose a different username');
			</script>";
	}else{
		$query="insert into gssmembership(username,password,fullname,membershiptype,postaladdress,mobileNo,email,gender,nationality,employercompany,employercompanyaddr,university1,u1yearcomp,u1qualification,university2,u2yearcomp,u2qualification,university3,u3yearcomp,u3qualification,workplace,ghiemember,ghieno,datereg) values('$username','$password','$fullname','$membershiptype','$postalAddress','$mobileNo','$emailAddress','$gender','$nationality','$employerCompany','$employerCompanyAddress','$university1','$year1','$qualify1','$university2','$year2','$qualify2','$university3','$year3','$qualify3','$workplace','$ghiemember','$ghieno','$cDate')";
		$result=mysql_query($query);
		if($result){
				echo "<script>
						alert('Registration successful...');
						window.location.assign('portal/');
					</script>";
		}else{
			echo "<script>
					alert('Process failed.. Please try again!!!');
				</script>";
		}
	}
}
//#########################..end of ggs member registration



////###############downloads CATEGORY.................
function editdownloadsCategory(){
	include "editdownloadcategory.php";
}

function viewdownloadsCategory(){
	if(isset($_POST['deletedownload'])){
			$imgname=$this->sanitize($_POST['deletedownload']);
			$query="delete from downloadslist where filename='$imgname'";
			$result=mysql_query($query);
			if($result){
				//unliking image
				unlink("../../downloads/".$imgname);
				echo "<script>
					$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Image deleted from  category..</span></center><br/><br/>').fadeOut(5000);
					window.location.assign('?downloads');
					</script>";
			}else{
				echo "<script>
					$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);window.location.assign('?downloads');
				</script>";
			}	
	}else{
		$id=$this->sanitize($_POST['view']);
		$id=intval($id);
		$query="select category from downloads where id=$id";
		$result=mysql_query($query);
		$result=mysql_fetch_row($result);
		$category=$result[0];

		$query="select * from downloadslist where category='$category'";
		$result=mysql_query($query);
		$numImages=mysql_num_rows($result);
		$data="<div class='row' style='margin: 5px;'>";
		$data.="<legend><center><span class='glyphicon glyphicon-th'></span> ".$category."</center></legend>";
		$count=1;
		while($row=mysql_fetch_array($result)){
			//generating three files
			if($count==1){ 
				$data.="<div class='row' style='margin: 5px;'>";
			}
			
					$data.="<div class='col-md-4 well' style='margin: 5px;'>";
					$data.="<p><center><a href='../../downloads/".$row['filename']."' class='btn btn-xs btn-info'><span class='glyphicon glyphicon-download'></span> Click to download</a></center></p>";
					$data.="<p><center><b>".$row['description']."</b></center></p>";
					$data.="<p><center><form method='post' action='#'><button type='submit' name='deletedownload' value='".$row['filename']."' class='btn btn-danger btn-xs' style='border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;'><span class='glyphicon glyphicon-remove'></span></button></form></center></p>";
					$data.="</div>";
			if($count==3){ 
				$data.="</div>";
				$count=0;
			}
			$count++;
		}
		$data.="</div>";
		echo $data;
	}
}

function addFileToCategory(){
	$category=$this->sanitize($_POST['category']);
	$description=$this->sanitize2($_POST['description']);
	if($_FILES['bannerImg']['name']==null){
		$query="insert into downloadslist(category,description,status) values('$category','$description',0)";
		$result=mysql_query($query);
		if($result){
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>File Added to category..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?downloads');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
	}else{
		//processing if image name is not null
		//checking the validity of uploaded file..
			$mime=explode(".", $_FILES['bannerImg']['name']);
			$mime=$mime[1];
			$imgname=date('Y-m-d-h-i-s').".".$mime;
			if($mime=='pdf' || $mime=='docx' || $mime=='doc' || $mime=='ppt' || $mime=='pptx'){
					$res=move_uploaded_file($_FILES['bannerImg']['tmp_name'], "../../downloads/".$imgname);
					if($res){
						
						$query="insert into downloadslist(category,filename,description,status) values('$category','$imgname','$description',1)";
						mysql_query($query);
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>File Added to Category..</span></center><br/><br/>').fadeOut(5000);
						window.location.assign('?downloads');
					</script>";
					}else{
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
					</script>";
					}
			}else{
				echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Wrong file uploaded..Try again!!!</span></center><br/><br/>').fadeOut(10000);
					</script>";
			}
	}
}
function gendownloadsCategory(){
	$query="select category from downloads";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){
		echo "<option value='".$row['category']."'>".$row['category']."</option>";
	}
}
function deletedownloadsCategory(){
	$id=$this->sanitize($_POST['delete']);
	$id=intval($id);
	$query="delete from downloads where id=$id";
	$result=mysql_query($query);
	if($result){
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Category deleted..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?downloads');
				</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(5000);
				</script>";	
	}
}
function toggledownloadsCategory(){
	$id=$this->sanitize($_POST['toggle']);
	$id=intval($id);
	$query="select status from downloads where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	$status=$result[0];
	if($status==1){
		$query="update downloads set status=0 where id=$id";
	}else{
		$query="update downloads set status=1 where id=$id";
	}
	$result=mysql_query($query);
	if($result){
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Category status updated..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?downloads');
				</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(5000);
				</script>";	
	}
}
function adddownloadsCategory(){
	$category=$this->sanitize($_POST['category']);
	$query="insert into downloads(category,status) values('$category',0)";
	$res=mysql_query($query);
	if($res){
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Category Added..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?downloads');
				</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(5000);
				</script>";
	}
}


function loaddownloadsCategory(){
	$query="select * from downloads order by status desc";
	$result=mysql_query($query);
	$data="<table class='table table-hover table-bordered' id='bannerList'>";
	$data.="<thead><tr><th><center>ID</center></th><th><center>Category</center></th><th><center>Status</center></th><th><center><span class='glyphicon glyphicon-eye-open'></span></center></th><th><center><span class='glyphicon glyphicon-pencil'></span></center></th><th><center><span class='glyphicon glyphicon-remove'></span></center></th></tr></thead>";
	$data.="<tbody>";
	$count=1;
	while($row=mysql_fetch_array($result)){
		$query2="select * from downloadslist where category='{$row['category']}'";
		$result2=mysql_query($query2);
		if(mysql_num_rows($result2) < 1){
			$allow="disabled";
		}else{
			$allow="";
		}

		if($row['status']==1){
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-success tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-ok'></span></button></form></center>";
		}else{
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-warning tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-off'></span></button></form></center>";
		}
		$view="<center><form method='post' action='?downloads&view' class='form'><button name='view' type='submit' value='".$row['id']."' class='btn btn-xs btn-primary tooltip-bottom' title='View downloads' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px; background-color: #035888;' ".$allow."><span class='glyphicon glyphicon-eye-open'></span></button></form></center>";
		$edit="<center><form method='post' action='?downloads&edit' class='form'><button name='edit' type='submit' value='".$row['id']."' class='btn btn-xs btn-info tooltip-bottom' title='Edit' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-pencil'></span></button></form></center>";
		$delete="<center><form method='post' action='#' class='form'><button name='delete' type='submit' value='".$row['id']."' class='btn btn-xs btn-danger tooltip-bottom' title='Delete' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;' ><span class='glyphicon glyphicon-remove'></span></button></form></center>";

		$data.="<tr><td><center>".$count."</center></td><td>".$row['category']."</td><td>".$status."</td><td>".$view."</td><td>".$edit."</td><td>".$delete."</td></tr>";
		$count++;
	}
	$data.="</tbody>";
	$data.="</table>";
	echo $data;
}
///##############END OF downloads CATEGORIES..........


////###############videos CATEGORY.................
function editvideosCategory(){
	include "editvideoscategory.php";
}

function getCategoryName($id,$table){
	$id=$this->sanitize($id);
	$table=$this->sanitize($table);
	$query="select category from $table where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	return $result[0];
}

//delete from a category
function delFromCategory(){
	$imgname=$this->sanitize($_POST['deleteimg']);
		$query="delete from gallerylist where image='$imgname'";
		$result=mysql_query($query);
		if($result){
			//unliking image
			unlink("../../banners/".$imgname);
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Image deleted from  category..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?gallery');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);window.location.assign('?gallery');
			</script>";
		}
}

function viewvideosCategory(){
	if(isset($_POST['deletevideo'])){
		$imgname=$this->sanitize($_POST['deletevideo']);
		$query="delete from videoslist where id='$imgname'";
		$result=mysql_query($query);
		if($result){
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Video deleted from  category..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?videos');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);window.location.assign('?videos');
			</script>";
		}
}else{
	$id=$this->sanitize($_POST['view']);
	$id=intval($id);
	$query="select category from videos where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	$category=$result[0];

	$query="select * from videoslist where category='$category'";
	$result=mysql_query($query);
	$numImages=mysql_num_rows($result);
	$data="<div class='row' style='margin: 5px;'>";
	$data.="<legend><center><span class='glyphicon glyphicon-th'></span> ".$category."</center></legend>";
	$count=1;
	while($row=mysql_fetch_array($result)){
		//generating three videos..
		if($count==1){ 
			$data.="<div class='row' style='margin: 5px;'>";
		}
		
				$data.="<div class='col-md-4'>";
				$data.="<p><center><iframe width='220' height='220' src='".$row['source']."' frameborder='0' allowfullscreen></iframe></center></p>";
				$data.="<p><center><b>".$row['description']."</b></center></p>";
				$data.="<p><center><form method='post' action='#'><button type='submit' value='".$row['id']."' name='deletevideo' class='btn btn-danger btn-xs tooltip-bottom' title='Delete Video' style='border-radius: 25px; -webkit-border-radius: 25px; -moz-border-radius: 25px;'><span class='glyphicon glyphicon-remove'></span> Delete Video</button></form></center></p>";
				$data.="</div>";
		if($count==3){ 
			$data.="</div>";
			$count=0;
		}
		$count++;
	}
	$data.="</div>";
	echo $data;
}
}

function addVideoToCategory(){
	$category=$this->sanitize($_POST['category']);
	$description=$this->sanitize2($_POST['description']);
	$source=$this->sanitize2($_POST['bannerImg']);

		$query="insert into videoslist(category,source,description,status) values('$category','$source','$description',1)";
		$result=mysql_query($query);
		if($result){
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Video Added to category..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?videos');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
}
function genvideosCategory(){
	$query="select category from videos";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){
		echo "<option value='".$row['category']."'>".$row['category']."</option>";
	}
}
function deletevideosCategory(){
	$id=$this->sanitize($_POST['delete']);
	$id=intval($id);
	$query="delete from videos where id=$id";
	$result=mysql_query($query);
	if($result){
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Category deleted..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?videos');
				</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(5000);
				</script>";	
	}
}
function togglevideosCategory(){
	$id=$this->sanitize($_POST['toggle']);
	$id=intval($id);
	$query="select status from videos where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	$status=$result[0];
	if($status==1){
		$query="update videos set status=0 where id=$id";
	}else{
		$query="update videos set status=1 where id=$id";
	}
	$result=mysql_query($query);
	if($result){
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Category status updated..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?videos');
				</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(5000);
				</script>";	
	}
}
function addvideosCategory(){
	$category=$this->sanitize($_POST['category']);
	$query="insert into videos(category,status) values('$category',0)";
	$res=mysql_query($query);
	if($res){
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Category Added..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?videos');
				</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(5000);
				</script>";
	}
}


function loadvideosCategory(){
	$query="select * from videos order by status desc";
	$result=mysql_query($query);
	$data="<table class='table table-hover table-bordered' id='bannerList'>";
	$data.="<thead><tr><th><center>ID</center></th><th><center>Category</center></th><th><center>Status</center></th><th><center><span class='glyphicon glyphicon-eye-open'></span></center></th><th><center><span class='glyphicon glyphicon-pencil'></span></center></th><th><center><span class='glyphicon glyphicon-remove'></span></center></th></tr></thead>";
	$data.="<tbody>";
	$count=1;
	while($row=mysql_fetch_array($result)){
		$query2="select * from videoslist where category='{$row['category']}'";
		$result2=mysql_query($query2);
		if(mysql_num_rows($result2) < 1){
			$allow="disabled";
		}else{
			$allow="";
		}
		if($row['status']==1){
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-success tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-ok'></span></button></form></center>";
		}else{
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-warning tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-off'></span></button></form></center>";
		}
		$view="<center><form method='post' action='?videos&view' class='form'><button name='view' type='submit' value='".$row['id']."' class='btn btn-xs btn-primary tooltip-bottom' title='View videos' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px; background-color: #035888;' ".$allow."><span class='glyphicon glyphicon-eye-open'></span></button></form></center>";
		$edit="<center><form method='post' action='?videos&edit' class='form'><button name='edit' type='submit' value='".$row['id']."' class='btn btn-xs btn-info tooltip-bottom' title='Edit' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-pencil'></span></button></form></center>";
		$delete="<center><form method='post' action='#' class='form'><button name='delete' type='submit' value='".$row['id']."' class='btn btn-xs btn-danger tooltip-bottom' title='Delete' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-remove'></span></button></form></center>";

		$data.="<tr><td><center>".$count."</center></td><td>".$row['category']."</td><td>".$status."</td><td>".$view."</td><td>".$edit."</td><td>".$delete."</td></tr>";
		$count++;
	}
	$data.="</tbody>";
	$data.="</table>";
	echo $data;
}
///##############END OF videos CATEGORIES..........


////###############GALLERY CATEGORY.................
function editGalleryCategory(){
	include "gallerycategoryedit.php";
}

function viewGalleryCategory(){
	if(isset($_POST['deleteimg'])){
		$imgname=$this->sanitize($_POST['deleteimg']);
		$query="delete from gallerylist where image='$imgname'";
		$result=mysql_query($query);
		if($result){
			//unliking image
			unlink("../../banners/".$imgname);
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Image deleted from  category..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?gallery');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);window.location.assign('?gallery');
			</script>";
		}
	}else{
		$id=$this->sanitize($_POST['view']);
		$id=intval($id);
		$query="select category from gallery where id=$id";
		$result=mysql_query($query);
		$result=mysql_fetch_row($result);
		$category=$result[0];

		$query="select * from gallerylist where category='$category'";
		$result=mysql_query($query);
		$numImages=mysql_num_rows($result);
		$data="<div class='row' style='margin: 5px;'>";
		$data.="<legend><center><span class='glyphicon glyphicon-th'></span> ".$category."</center></legend>";
		$count=1;
		while($row=mysql_fetch_array($result)){
			//generating three images..
			if($count==1){ 
				$data.="<div class='row' style='margin: 5px;'>";
			}
			
					$data.="<div class='col-md-4'>";
					$data.="<p><center><img src='../../banners/".$row['image']."' class='img-thumbnail' style='width: 150px; height: 150px;'/></center></p>";
					$data.="<p><center><b>".$row['description']."</b></center></p>";
					$data.="<p><center><form method='post' action='?gallery&view'><button type='submit' style='border-radius: 25px; -webkit-border-radius: 25px; -moz-border-radius: 25px;' name='deleteimg' value='".$row['image']."' class='btn btn-danger btn-xs tooltip-bottom' title='Delete Image'><span class='glyphicon glyphicon-remove'></span> Delete Image</button></form></center></p>";
					$data.="</div>";
			if($count==3){ 
				$data.="</div>";
				$count=0;
			}
			$count++;
		}
		$data.="</div>";
		echo $data;
	}
}

function addImageToCategory(){
	$category=$this->sanitize($_POST['category']);
	$description=$this->sanitize2($_POST['description']);
	if($_FILES['bannerImg']['name']==null){
		$query="insert into gallerylist(category,description,status) values('$category','$description',0)";
		$result=mysql_query($query);
		if($result){
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Image Added to category..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?gallery');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
	}else{
		//processing if image name is not null
		//checking the validity of uploaded file..
			$mime=explode(".", $_FILES['bannerImg']['name']);
			$mime=$mime[1];
			$imgname=date('Y-m-d-h-i-s').".".$mime;
			if($mime=='jpg' || $mime=='png' || $mime=='jpeg' || $mime=='JPG' || $mime=='PNG' || $mime=='JPEG'){
					$res=move_uploaded_file($_FILES['bannerImg']['tmp_name'], "../../banners/".$imgname);
					if($res){
						
						$query="insert into gallerylist(category,image,description,status) values('$category','$imgname','$description',1)";
						mysql_query($query);
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Image Added to Category..</span></center><br/><br/>').fadeOut(5000);
						window.location.assign('?gallery');
					</script>";
					}else{
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
					</script>";
					}
			}else{
				echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Wrong file uploaded..Try again!!!</span></center><br/><br/>').fadeOut(10000);
					</script>";
			}
	}
}
function updateCategory($table1,$table2,$link){
	$oldcategoryname=$this->sanitize($_POST['oldcategoryname']);
	$newcategoryname=$this->sanitize($_POST['newcategoryname']);
	$query="update $table1 set category='$newcategoryname' where category='$oldcategoryname'";
	$result=mysql_query($query);
	if($result){
		mysql_query("update $table2 set category='$newcategoryname' where category='$oldcategoryname'");
		echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>CategoryName updated..</span></center><br/><br/>').fadeOut(5000);
						window.location.assign('?".$link."');
					</script>";
	}else{
		echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000); 
						//window.location.assign('?".$link."');
					</script>";
	}
}
function updateGalleryCategory(){
	$oldcategoryname=$this->sanitize($_POST['oldcategoryname']);
	$newcategoryname=$this->sanitize($_POST['newcategoryname']);
	$query="update gallery set category='$newcategoryname' where category='$oldcategoryname'";
	$result=mysql_query($query);
	if($result){
		mysql_query("update gallerylist set category='$newcategoryname' where category='$oldcategoryname'");
		echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>CategoryName updated..</span></center><br/><br/>').fadeOut(5000);
						window.location.assign('?gallery');
					</script>";
	}else{
		echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000); 
						//window.location.assign('?gallery');
					</script>";
	}
}
function getGalleryCategoryName($id){
	$id=$this->sanitize($id);
	$query="select category from gallery where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	return $result[0];
}
function genGalleryCategory(){
	$query="select category from gallery";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){
		echo "<option value='".$row['category']."'>".$row['category']."</option>";
	}
}
function deleteGalleryCategory(){
	$id=$this->sanitize($_POST['delete']);
	$id=intval($id);
	$query="delete from gallery where id=$id";
	$result=mysql_query($query);
	if($result){
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Category deleted..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?gallery');
				</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(5000);
				</script>";	
	}
}
function toggleGalleryCategory(){
	$id=$this->sanitize($_POST['toggle']);
	$id=intval($id);
	$query="select status from gallery where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	$status=$result[0];
	if($status==1){
		$query="update gallery set status=0 where id=$id";
	}else{
		$query="update gallery set status=1 where id=$id";
	}
	$result=mysql_query($query);
	if($result){
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Category status updated..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?gallery');
				</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(5000);
				</script>";	
	}
}
function addGalleryCategory(){
	$category=$this->sanitize($_POST['category']);
	$query="insert into gallery(category,status) values('$category',0)";
	$res=mysql_query($query);
	if($res){
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Category Added..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?gallery');
				</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(5000);
				</script>";
	}
}


function loadGalleryCategory(){
	$query="select * from gallery order by status desc";
	$result=mysql_query($query);
	$data="<table class='table table-hover table-bordered' id='bannerList'>";
	$data.="<thead><tr><th><center>ID</center></th><th><center>Category</center></th><th><center>Status</center></th><th><center><span class='glyphicon glyphicon-eye-open'></span></center></th><th><center><span class='glyphicon glyphicon-pencil'></span></center></th><th><center><span class='glyphicon glyphicon-remove'></span></center></th></tr></thead>";
	$data.="<tbody>";
	$count=1;
	while($row=mysql_fetch_array($result)){
		$query2="select * from gallerylist where category='{$row['category']}'";
		$result2=mysql_query($query2);
		if(mysql_num_rows($result2) <1){
			$allow="disabled";
		}else{
			$allow="";
		}
		if($row['status']==1){
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-success tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-ok'></span></button></form></center>";
		}else{
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-warning tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-off'></span></button></form></center>";
		}
		$view="<center><form method='post' action='?gallery&view' class='form'><button name='view' type='submit' value='".$row['id']."' class='btn btn-xs btn-primary tooltip-bottom' title='View Gallery' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px; background-color: #035888;' ".$allow."><span class='glyphicon glyphicon-eye-open'></span></button></form></center>";
		$edit="<center><form method='post' action='?gallery&edit' class='form'><button name='edit' type='submit' value='".$row['id']."' class='btn btn-xs btn-info tooltip-bottom' title='Edit' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-pencil'></span></button></form></center>";
		$delete="<center><form method='post' action='#' class='form'><button name='delete' type='submit' value='".$row['id']."' class='btn btn-xs btn-danger tooltip-bottom' title='Delete' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-remove'></span></button></form></center>";

		$data.="<tr><td><center>".$count."</center></td><td>".$row['category']."</td><td>".$status."</td><td>".$view."</td><td>".$edit."</td><td>".$delete."</td></tr>";
		$count++;
	}
	$data.="</tbody>";
	$data.="</table>";
	echo $data;
}
///##############END OF GALLERY CATEGORIES..........


//load articles list
function loadarticlesList(){
	$query="select * from articles order by status desc";
	$result=mysql_query($query);
	$data="<table class='table table-hover table-bordered' id='bannerList'>";
	$data.="<thead><tr><th><center>ID</center></th><th><center>Title</center></th><th><center>Status</center></th><th><center><span class='glyphicon glyphicon-pencil'></span></center></th><th><center><span class='glyphicon glyphicon-remove'></span></center></th></tr></thead>";
	$data.="<tbody>";
	$count=1;
	while($row=mysql_fetch_array($result)){
		if($row['status']==1){
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-success tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-ok'></span></button></form></center>";
		}else{
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-warning tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-off'></span></button></form></center>";
		}
		$edit="<center><form method='post' action='?articles&edit' class='form'><button name='edit' type='submit' value='".$row['id']."' class='btn btn-xs btn-info tooltip-bottom' title='Edit' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-pencil'></span></button></form></center>";
		$delete="<center><form method='post' action='#' class='form'><button name='delete' type='submit' value='".$row['id']."' class='btn btn-xs btn-danger tooltip-bottom' title='Delete' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-remove'></span></button></form></center>";

		$data.="<tr><td><center>".$count."</center></td><td>".$row['title']."</td><td>".$status."</td><td>".$edit."</td><td>".$delete."</td></tr>";
		$count++;
	}
	$data.="</tbody>";
	$data.="</table>";
	echo $data;
}

//##NEWS
function loadnewsList(){
	$query="select * from news order by status desc";
	$result=mysql_query($query);
	$data="<table class='table table-hover table-bordered' id='bannerList'>";
	$data.="<thead><tr><th><center>ID</center></th><th><center>Title</center></th><th><center>Status</center></th><th><center><span class='glyphicon glyphicon-pencil'></span></center></th><th><center><span class='glyphicon glyphicon-remove'></span></center></th></tr></thead>";
	$data.="<tbody>";
	$count=1;
	while($row=mysql_fetch_array($result)){
		if($row['status']==1){
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-success tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-ok'></span></button></form></center>";
		}else{
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-warning tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-off'></span></button></form></center>";
		}
		$edit="<center><form method='post' action='?news&edit' class='form'><button name='edit' type='submit' value='".$row['id']."' class='btn btn-xs btn-info tooltip-bottom' title='Edit' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-pencil'></span></button></form></center>";
		$delete="<center><form method='post' action='#' class='form'><button name='delete' type='submit' value='".$row['id']."' class='btn btn-xs btn-danger tooltip-bottom' title='Delete' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-remove'></span></button></form></center>";

		$data.="<tr><td><center>".$count."</center></td><td>".$row['title']."</td><td>".$status."</td><td>".$edit."</td><td>".$delete."</td></tr>";
		$count++;
	}
	$data.="</tbody>";
	$data.="</table>";
	echo $data;
}
//delete articles
function deletearticles(){
	$id=$this->sanitize($_POST['delete']);
	$id=intval($id);

	//getting image name
	$query="select image from articles where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	$imgname=$result[0];

	$query="delete from articles where id=$id";
	$res=mysql_query($query);
	if($res){
		unlink("../../banners/".$imgname);
		$this->deleteLinksFromEdit($id,"articles");
		echo "<script>
				window.location.assign('?articles');
			</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..Try again!!!</span></center><br/><br/>').fadeOut(10000);
			</script>";
	}
}

//delete news
function deletenews(){
	$id=$this->sanitize($_POST['delete']);
	$id=intval($id);

	//getting image name
	$query="select image from news where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	$imgname=$result[0];

	$query="delete from news where id=$id";
	$res=mysql_query($query);
	if($res){
		unlink("../../banners/".$imgname);
		$this->deleteLinksFromEdit($id,"news");
		echo "<script>
				window.location.assign('?news');
			</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..Try again!!!</span></center><br/><br/>').fadeOut(10000);
			</script>";
	}
}

function sanitize2($data){
	return mysql_real_escape_string($data);
}

//update articles
function editarticles(){
	$title=$this->sanitize($_POST['title']);
	$image=$_FILES['bannerImg']['name'];
	$message=$this->sanitize2($_POST['briefmessage']);
	$link=$this->sanitize2($_POST['link']);
	$id=$this->sanitize($_POST['imgid']);
	$id=intval($id);
	if($_FILES['bannerImg']['name']==null){
		$query="update articles set title='$title',message='$message',link='$link' where id=$id";
		$result=mysql_query($query);
		if($result){
			$this->updateLinksFromEdit($id,$title,"articles");
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Article Updated..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?articles');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>".mysql_error();

		}
	}else{
		//processing if image name is not null
		//checking the validity of uploaded file..
			$mime=explode(".", $_FILES['bannerImg']['name']);
			$mime=$mime[1];
			/*echo "<script>
					alert('".$_FILES['bannerImg']['name']."');
				</script>";*/
			//getting previous file name and deleting to save disk space
			$query="select image from articles where id=$id";
			$result=mysql_query($query);
			$result=mysql_fetch_row($result);

			$imgname=date('Y-m-d-h-i-s').".".$mime;
			if($mime=='jpg' || $mime=='png' || $mime=='jpeg' || $mime=='JPG' || $mime=='PNG' || $mime=='JPEG'){
					$res=move_uploaded_file($_FILES['bannerImg']['tmp_name'], "../../banners/".$imgname);
					if($res){
						unlink("../../banners/".$result[0]);
						$query="update articles set title='$title', image='$imgname', message='$message',link='$link' where id=$id";
						mysql_query($query);
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Articles Updated..</span></center><br/><br/>').fadeOut(5000);
						window.location.assign('?articles');
					</script>";
					}else{
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
					</script>";
					}
			}else{
				echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Wrong file uploaded..Try again!!!</span></center><br/><br/>').fadeOut(10000);
					</script>";
			}
	}
}
//delete links 
function deleteLinksFromEdit($id,$category){
	$id=$this->sanitize($id);
	$category=$this->sanitize($category);
	if($category=="news"){
		$link="?news&id=".$id;
	}else{
		$link="?articles&id=".$id;
	}
	$query="delete from links where source='$link'";
	mysql_query($query);	
}

//updating links
function updateLinksFromEdit($id,$title,$category){
	$id=$this->sanitize($id);
	$title=$this->sanitize($title);
	$category=$this->sanitize($category);
	if($category=="news"){
		$link="?news&id=".$id;
	}else{
		$link="?articles&id=".$id;
	}
	$query="update links set title='$title' where source='$link'";
	mysql_query($query);
}

//update news
function editnews(){
	$title=$this->sanitize($_POST['title']);
	$image=$_FILES['bannerImg']['name'];
	$message=$this->sanitize2($_POST['briefmessage']);
	$link=$this->sanitize2($_POST['link']);
	$id=$this->sanitize($_POST['imgid']);
	$id=intval($id);
	if($_FILES['bannerImg']['name']==null){
		$query="update news set title='$title',message='$message',link='$link' where id=$id";
		$result=mysql_query($query);
		if($result){
			$this->updateLinksFromEdit($id,$title,"news");
			//$this->genrss();
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>news Updated..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?news');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>".mysql_error();

		}
	}else{
		//processing if image name is not null
		//checking the validity of uploaded file..
			$mime=explode(".", $_FILES['bannerImg']['name']);
			$mime=$mime[1];
			/*echo "<script>
					alert('".$_FILES['bannerImg']['name']."');
				</script>";*/
			//getting previous file name and deleting to save disk space
			$query="select image from news where id=$id";
			$result=mysql_query($query);
			$result=mysql_fetch_row($result);

			$imgname=date('Y-m-d-h-i-s').".".$mime;
			if($mime=='jpg' || $mime=='png' || $mime=='jpeg' || $mime=='JPG' || $mime=='PNG' || $mime=='JPEG'){
					$res=move_uploaded_file($_FILES['bannerImg']['tmp_name'], "../../banners/".$imgname);
					if($res){
						unlink("../../banners/".$result[0]);
						$query="update news set title='$title', image='$imgname', message='$message',link='$link' where id=$id";
						mysql_query($query);
						$this->updateLinksFromEdit($id,$title,"news");
						//$this->genrss();
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>news Updated..</span></center><br/><br/>').fadeOut(5000);
						window.location.assign('?news');
					</script>";
					}else{
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
					</script>";
					}
			}else{
				echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Wrong file uploaded..Try again!!!</span></center><br/><br/>').fadeOut(10000);
					</script>";
			}
	}
}

// article
function editarticlesList(){
		$id=$this->sanitize($_POST['edit']);
	$id=intval($id);
	$query="select * from articles where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);

echo "<script type='text/javascript'>
		$('#addnewsV').hide();
	</script>
	<div class='row' style='margin: 30px;'>
				<form method='post' action='?articles' class='form' enctype='multipart/form-data'>
					<div class='row well'>
						<div class='form-group'>
							<label for='title'><span class='glyphicon glyphicon-edit'></span> Title</label>
							<input type='text' id='title' name='title' class='form-control' placeholder='Title' value='".$result[1]."' required/>
							<input type='hidden' name='imgid' value='".$result[0]."'/>
						</div>
						<div class='form-group'>
							<label for='bannerImg'><span class='glyphicon glyphicon-open'></span> Load Image</label>
							<input type='file' id='bannerImg' name='bannerImg' accept='image/*' placeholder='Upload banner' onchange='showMyImage(this)' class='form-control'/><br/>
							<center><img src='../../banners/".$result[2]."' style='width: 150px; height: 150px;' class='img-thumbnail' id='displayPic'/></center>
						</div>
						<div class='form-group'>
							<label for='briefmessage'><span class='glyphicon glyphicon-info-sign'></span> Message</label>
							<textarea  class='form-control' style='color: #000;' type='text' id='briefmessage' name='briefmessage'>".$result[3]."</textarea>
						</div>
						<div class='form-group'>
							<label for='link'><span class='glyphicon glyphicon-link'></span> Link</label>
							<select class='form-control' id='link' name='link'>
								<option value=''>None</option>
								<option value='".$result[4]."' selected>".$result[4]."</option>
							</select>
						</div>
					</div>
					<div class='row'>
						<center><button type='submit' name='updateBannerBtn' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-upload'></span> Update news</button>&nbsp;&nbsp;&nbsp;<a href='?articles' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Close</a></center>
					</div>
				</form>
			</div>";
}

//edit news
function editnewsList(){
	$id=$this->sanitize($_POST['edit']);
	$id=intval($id);
	$query="select * from news where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);

echo "<script type='text/javascript'>
		$('#addnewsV').hide();
	</script>
	<div class='row' style='margin: 30px;'>
				<form method='post' action='?news' class='form' enctype='multipart/form-data'>
					<div class='row well'>
						<div class='form-group'>
							<label for='title'><span class='glyphicon glyphicon-edit'></span> Title</label>
							<input type='text' id='title' name='title' class='form-control' placeholder='Title' value='".$result[1]."' required/>
							<input type='hidden' name='imgid' value='".$result[0]."'/>
						</div>
						<div class='form-group'>
							<label for='bannerImg'><span class='glyphicon glyphicon-open'></span> Load Image</label>
							<input type='file' id='bannerImg' name='bannerImg' accept='image/*' placeholder='Upload banner' onchange='showMyImage(this)' class='form-control'/><br/>
							<center><img src='../../banners/".$result[2]."' style='width: 150px; height: 150px;' class='img-thumbnail' id='displayPic'/></center>
						</div>
						<div class='form-group'>
							<label for='briefmessage'><span class='glyphicon glyphicon-info-sign'></span> Message</label>
							<textarea  class='form-control' style='color: #000;' type='text' id='briefmessage' name='briefmessage'>".$result[3]."</textarea>
						</div>
						<div class='form-group'>
							<label for='link'><span class='glyphicon glyphicon-link'></span> Link</label>
							<select class='form-control' id='link' name='link'>
								<option value=''>None</option>
								<option value='".$result[4]."' selected>".$result[4]."</option>
							</select>
						</div>
					</div>
					<div class='row'>
						<center><button type='submit' name='updateBannerBtn' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-upload'></span> Update news</button>&nbsp;&nbsp;&nbsp;<a href='?news' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Close</a></center>
					</div>
				</form>
			</div>";
}
//adding articles
function addarticles(){
	$title=$this->sanitize($_POST['title']);
	$image=$_FILES['bannerImg']['name'];
	$message=$this->sanitize2($_POST['briefmessage']);
	$link=" ";
	$cDate=$this->genDate();
	
	if($_FILES['bannerImg']['name']==null){
		$query="insert into articles(title,message,link,status,date) values('$title','$message','$link',0,'$cDate')";
		$result=mysql_query($query);
		if($result){
			//createLinks($title,$source)
			$query="select id from articles where title='$title'";
			$result=mysql_query($query);
			$result=mysql_fetch_row($result);
			$id=$result[0];
			$nlink="?articles&id=".$id;
			$nlink=$this->sanitize2($nlink);
			$this->createLinks($title,$nlink);
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Article Added..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?articles');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
	}else{
		//processing if image name is not null
		//checking the validity of uploaded file..
			$mime=explode(".", $_FILES['bannerImg']['name']);
			$mime=$mime[1];
			$imgname=date('Y-m-d-h-i-s').".".$mime;
			if($mime=='jpg' || $mime=='png' || $mime=='jpeg' || $mime=='JPG' || $mime=='PNG' || $mime=='JPEG'){
					$res=move_uploaded_file($_FILES['bannerImg']['tmp_name'], "../../banners/".$imgname);
					if($res){
						
						$query="insert into articles(title,image,message,link,status) values('$title','$imgname','$message','$link',0)";
						mysql_query($query);
							$query="select id from articles where title='$title'";
							$result=mysql_query($query);
							$result=mysql_fetch_row($result);
							$id=$result[0];
							$nlink="?articles&id=".$id;
							$nlink=$this->sanitize2($nlink);
							$this->createLinks($title,$nlink);
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Article Updated..</span></center><br/><br/>').fadeOut(5000);
						window.location.assign('?articles');
					</script>";
					}else{
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
					</script>";
					}
			}else{
				echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Wrong file uploaded..Try again!!!</span></center><br/><br/>').fadeOut(10000);
					</script>";
			}
	}
}

//adding news
function addnews(){
	$title=$this->sanitize($_POST['title']);
	$image=$_FILES['bannerImg']['name'];
	$article=$this->sanitize($_POST['articles']);
	$article=intval($article);
	//checking whether user selected article or not
	if($article != 0){
		//user selected article
		$message=$this->getNewsContent($article);
	}else{
		$message=$this->sanitize2($_POST['briefmessage']);
	}
	$link=" ";
	$cDate=$this->genDate();
	
	if($_FILES['bannerImg']['name']==null){
		$query="insert into news(title,message,link,status,date) values('$title','$message','$link',0,'$cDate')";
		$result=mysql_query($query);
		if($result){
			//createLinks($title,$source)
			$query="select id from news where title='$title'";
			$result=mysql_query($query);
			$result=mysql_fetch_row($result);
			$id=$result[0];
			$nlink="?news&id=".$id;
			$nlink=$this->sanitize2($nlink);
			$this->createLinks($title,$nlink);
			//$this->genrss();
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>news Added..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?news');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
	}else{
		//processing if image name is not null
		//checking the validity of uploaded file..
			$mime=explode(".", $_FILES['bannerImg']['name']);
			$mime=$mime[1];
			$imgname=date('Y-m-d-h-i-s').".".$mime;
			if($mime=='jpg' || $mime=='png' || $mime=='jpeg' || $mime=='JPG' || $mime=='PNG' || $mime=='JPEG'){
					$res=move_uploaded_file($_FILES['bannerImg']['tmp_name'], "../../banners/".$imgname);
					if($res){
						
						$query="insert into news(title,image,message,link,status) values('$title','$imgname','$message','$link',0)";
						mysql_query($query);
							$query="select id from news where title='$title'";
							$result=mysql_query($query);
							$result=mysql_fetch_row($result);
							$id=$result[0];
							$nlink="?news&id=".$id;
							$nlink=$this->sanitize2($nlink);
							$this->createLinks($title,$nlink);
							//$this->genrss();
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>News Updated..</span></center><br/><br/>').fadeOut(5000);
						window.location.assign('?news');
					</script>";
					}else{
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
					</script>";
					}
			}else{
				echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Wrong file uploaded..Try again!!!</span></center><br/><br/>').fadeOut(10000);
					</script>";
			}
	}
}

//toggle articles
function togglearticlesList(){
	if(isset($_POST['toggle'])){
		$id=$this->sanitize($_POST['toggle']);
		$id=intval($id);

		//getting current status
		$query="select status from articles where id=$id";
		$res=mysql_query($query);
		$result=mysql_fetch_row($res);
		if($result[0]==1){
			$query="update articles set status=0";
		}else{
			$query="update articles set status=1";
		}
		$res=mysql_query($query);
		if($res){
			$query="update articles set status=1 where id=$id";
			$result=mysql_query($query);
			if($result){
				echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Processing..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?articles');
				</script>";
			}else{
				echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";	
			}
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";	
		}

	}
}

//toggle news
function togglenewsList(){
	if(isset($_POST['toggle'])){
		$id=$this->sanitize($_POST['toggle']);
		$id=intval($id);

		//restricting user to just one live preview
		$query="update news set status=0";
		$res=mysql_query($query);
		if($res){
			$query="update news set status=1 where id=$id";
			$result=mysql_query($query);
			if($result){
				//$this->genrss();
				echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Processing..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?news');
				</script>";
			}else{
				echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";	
			}
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";	
		}

	}
}


//##calendar
function loadcalendarList(){
	$query="select * from calendar order by status desc";
	$result=mysql_query($query);
	$data="<table class='table table-hover table-bordered' id='bannerList'>";
	$data.="<thead><tr><th><center>ID</center></th><th><center>Topic</center></th><th><center>Date</center></th><th><center>Status</center></th><th><center><span class='glyphicon glyphicon-pencil'></span></center></th><th><center><span class='glyphicon glyphicon-remove'></span></center></th></tr></thead>";
	$data.="<tbody>";
	$count=1;
	while($row=mysql_fetch_array($result)){
		if($row['status']==1){
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-success tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-ok'></span></button></form></center>";
		}else{
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-warning tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-off'></span></button></form></center>";
		}
		$edit="<center><form method='post' action='?calendar&edit' class='form'><button name='edit' type='submit' value='".$row['id']."' class='btn btn-xs btn-info tooltip-bottom' title='Edit' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-pencil'></span></button></form></center>";
		$delete="<center><form method='post' action='#' class='form'><button name='delete' type='submit' value='".$row['id']."' class='btn btn-xs btn-danger tooltip-bottom' title='Delete' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-remove'></span></button></form></center>";

		$data.="<tr><td><center>".$count."</center></td><td>".$row['title']."</td><td>".$row['date']."</td><td>".$status."</td><td>".$edit."</td><td>".$delete."</td></tr>";
		$count++;
	}
	$data.="</tbody>";
	$data.="</table>";
	echo $data;
}

//delete calendar
function deletecalendar(){
	$id=$this->sanitize($_POST['delete']);
	$id=intval($id);


	$query="delete from calendar where id=$id";
	$res=mysql_query($query);
	if($res){
		echo "<script>
				window.location.assign('?calendar');
			</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..Try again!!!</span></center><br/><br/>').fadeOut(10000);
			</script>";
	}
}

//update calendar
function editcalendar(){
	$title=$this->sanitize($_POST['title']);
	$cDate=$this->sanitize($_POST['date']);
	$link=$this->sanitize2($_POST['link']);
	$id=$this->sanitize($_POST['imgid']);
	$id=intval($id);

	$query="update calendar set title='$title',date='$cDate',link='$link' where id=$id";
		$result=mysql_query($query);
		if($result){
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>calendar Updated..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?calendar');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
}

//edit calendar
function editcalendarList(){
	$id=$this->sanitize($_POST['edit']);
	$id=intval($id);
	$query="select * from calendar where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);

echo "<script type='text/javascript'>
		$('#addcalendarV').hide();
	</script>
	<div class='row' style='margin: 30px;'>
				<form method='post' action='?calendar' class='form' enctype='multipart/form-data'>
					<div class='row well'>
						<div class='form-group'>
							<label for='title'><span class='glyphicon glyphicon-edit'></span> Topic</label>
							<input type='text' id='title' name='title' class='form-control' placeholder='Title' value='".$result[1]."' required/>
							<input type='hidden' name='imgid' value='".$result[0]."'/>
						</div>
						<div class='form-group'>
							<label for='date'><span class='glyphicon glyphicon-calendar'></span> Date</label>
							<input type='date' id='date' name='date' class='form-control' placeholder='Date..' value='".$result[2]."' required/>
						</div>
						<div class='form-group'>
							<label for='link'><span class='glyphicon glyphicon-link'></span> Link</label>
							<select class='form-control' id='link' name='link'>
								<option value='".$result[3]."' selected>";
								echo $this->getLinkTitle($result[3]);

							echo "</option>";
							$this->genLinks();
							echo "</select>
						</div>
					</div>
					<div class='row'>
						<center><button type='submit' name='updateBannerBtn' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-upload'></span> Update calendar</button>&nbsp;&nbsp;&nbsp;<a href='?calendar' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Close</a></center>
					</div>
				</form>
			</div>";
}

//adding calendar
function addcalendar(){
	$title=$this->sanitize($_POST['title']);
	$cDate=$this->sanitize($_POST['date']);
	$link=$this->sanitize2($_POST['link']);
	
	$query="insert into calendar(title,date,link,status) values('$title','$cDate','$link',0)";
		$result=mysql_query($query);
		if($result){
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>calendar Added..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?calendar');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
}

//toggle calendar
function togglecalendarList(){
	if(isset($_POST['toggle'])){
		$id=$this->sanitize($_POST['toggle']);
		$id=intval($id);

		//restricting user to just one live preview
		$query="update calendar set status=0";
		$res=mysql_query($query);
		if($res){
			$query="update calendar set status=1 where id=$id";
			$result=mysql_query($query);
			if($result){
				echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Processing..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?calendar');
				</script>";
			}else{
				echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";	
			}
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";	
		}

	}
}



//###announcements
function loadannouncementsList(){
	$query="select * from announcements order by status desc";
	$result=mysql_query($query);
	$data="<table class='table table-hover table-bordered' id='bannerList'>";
	$data.="<thead><tr><th><center>ID</center></th><th><center>Title</center></th><th>Status</center></th><th><center><span class='glyphicon glyphicon-pencil'></span></center></th><th><center><span class='glyphicon glyphicon-remove'></span></center></th></tr></thead>";
	$data.="<tbody>";
	$count=1;
	while($row=mysql_fetch_array($result)){
		if($row['status']==1){
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-success tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-ok'></span></button></form></center>";
		}else{
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-warning tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-off'></span></button></form></center>";
		}
		$edit="<center><form method='post' action='?announcements&edit' class='form'><button name='edit' type='submit' value='".$row['id']."' class='btn btn-xs btn-info tooltip-bottom' title='Edit' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-pencil'></span></button></form></center>";
		$delete="<center><form method='post' action='#' class='form'><button name='delete' type='submit' value='".$row['id']."' class='btn btn-xs btn-danger tooltip-bottom' title='Delete' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-remove'></span></button></form></center>";

		$data.="<tr><td><center>".$count."</center></td><td>".$row['title']."</td><td>".$status."</td><td>".$edit."</td><td>".$delete."</td></tr>";
		$count++;
	}
	$data.="</tbody>";
	$data.="</table>";
	echo $data;
}	
//delete announcements
function deleteannouncements(){
	$id=$this->sanitize($_POST['delete']);
	$id=intval($id);

	$query="delete from announcements where id=$id";
	$res=mysql_query($query);
	if($res){
		echo "<script>
				window.location.assign('?announcements');
			</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..Try again!!!</span></center><br/><br/>').fadeOut(10000);
			</script>";
	}
}

//update announcements
function editannouncements(){
	$title=$this->sanitize($_POST['title']);
	$message=$this->sanitize2($_POST['briefmessage']);
	$id=$this->sanitize($_POST['imgid']);
	$id=intval($id);

	$query="update announcements set title='$title',message='$message' where id=$id";
		$result=mysql_query($query);
		if($result){
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>announcements Updated..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?announcements');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
}

//edit announcements
function editannouncementsList(){
	$id=$this->sanitize($_POST['edit']);
	$id=intval($id);
	$query="select * from announcements where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);

echo "<script type='text/javascript'>
		$('#addannouncementsV').hide();
	</script>
	<div class='row' style='margin: 30px;'>
				<form method='post' action='?announcements' class='form' enctype='multipart/form-data'>
					<div class='row well'>
						<div class='form-group'>
							<label for='title'><span class='glyphicon glyphicon-edit'></span> Title</label>
							<input type='text' id='title' name='title' class='form-control' placeholder='Title' value='".$result[1]."' required/>
							<input type='hidden' name='imgid' value='".$result[0]."'/>
						</div>
						<div class='form-group'>
							<label for='briefmessage'><span class='glyphicon glyphicon-info-sign'></span> Message</label>
							<textarea  class='form-control editfield' style='color: #000;' type='text' id='briefmessage2' name='briefmessage'>".$result[2]."</textarea>
						</div>
					</div>
					<div class='row'>
						<center><button type='submit' name='updateBannerBtn' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-upload'></span> Update announcements</button>&nbsp;&nbsp;&nbsp;<a href='?announcements' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Close</a></center>
					</div>
				</form>
			</div>";
}

//adding announcements
function addannouncements(){
	$title=$this->sanitize($_POST['title']);
	$message=$this->sanitize2($_POST['briefmessage']);

	

		$query="insert into announcements(title,message,status) values('$title','$message',0)";
		$result=mysql_query($query);
		if($result){
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>announcements Added..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?announcements');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
}

//toggle announcements
function toggleannouncementsList(){
	if(isset($_POST['toggle'])){
		$id=$this->sanitize($_POST['toggle']);
		$id=intval($id);

		//restricting user to just one live preview
		$query="update announcements set status=0";
		$res=mysql_query($query);
		if($res){
			$query="update announcements set status=1 where id=$id";
			$result=mysql_query($query);
			if($result){
				echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Processing..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?announcements');
				</script>";
			}else{
				echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";	
			}
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";	
		}

	}
}
//END OF announcements

//##spotlight
function loadspotlightList(){
	$query="select * from spotlight order by status desc";
	$result=mysql_query($query);
	$data="<table class='table table-hover table-bordered' id='bannerList'>";
	$data.="<thead><tr><th><center>ID</center></th><th><center>Title</center></th><th><center>Message</center></th><th><center>Status</center></th><th><center><span class='glyphicon glyphicon-pencil'></span></center></th><th><center><span class='glyphicon glyphicon-remove'></span></center></th></tr></thead>";
	$data.="<tbody>";
	$count=1;
	while($row=mysql_fetch_array($result)){
		if($row['status']==1){
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-success tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-ok'></span></button></form></center>";
		}else{
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-warning tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-off'></span></button></form></center>";
		}
		$edit="<center><form method='post' action='?spotlight&edit' class='form'><button name='edit' type='submit' value='".$row['id']."' class='btn btn-xs btn-info tooltip-bottom' title='Edit' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-pencil'></span></button></form></center>";
		$delete="<center><form method='post' action='#' class='form'><button name='delete' type='submit' value='".$row['id']."' class='btn btn-xs btn-danger tooltip-bottom' title='Delete' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-remove'></span></button></form></center>";

		$data.="<tr><td><center>".$count."</center></td><td>".$row['title']."</td><td>".$row['message']."</td><td>".$status."</td><td>".$edit."</td><td>".$delete."</td></tr>";
		$count++;
	}
	$data.="</tbody>";
	$data.="</table>";
	echo $data;
}

//delete spotlight
function deletespotlight(){
	$id=$this->sanitize($_POST['delete']);
	$id=intval($id);

	//getting image name
	$query="select image from spotlight where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	$imgname=$result[0];

	$query="delete from spotlight where id=$id";
	$res=mysql_query($query);
	if($res){
		unlink("../../banners/".$imgname);
		echo "<script>
				window.location.assign('?spotlight');
			</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..Try again!!!</span></center><br/><br/>').fadeOut(10000);
			</script>";
	}
}

//update spotlight
function editspotlight(){
	$title=$this->sanitize($_POST['title']);
	$image=$_FILES['bannerImg']['name'];
	$message=$this->sanitize2($_POST['briefmessage']);
	$link=$this->sanitize2($_POST['link']);
	$id=$this->sanitize($_POST['imgid']);
	$linkMsg=$this->sanitize($_POST['linkMsg']);
	$id=intval($id);
	if($_FILES['bannerImg']['name']==null){
		$query="update spotlight set title='$title',message='$message',link='$link',linkMsg='$linkMsg' where id=$id";
		$result=mysql_query($query);
		if($result){
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Content Updated..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?spotlight');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
	}else{
		//processing if image name is not null
		//checking the validity of uploaded file..
			$mime=explode(".", $_FILES['bannerImg']['name']);
			$mime=$mime[1];
			/*echo "<script>
					alert('".$_FILES['bannerImg']['name']."');
				</script>";*/
			//getting previous file name and deleting to save disk space
			$query="select image from spotlight where id=$id";
			$result=mysql_query($query);
			$result=mysql_fetch_row($result);

			$imgname=date('Y-m-d-h-i-s').".".$mime;
			if($mime=='jpg' || $mime=='png' || $mime=='jpeg' || $mime=='JPG' || $mime=='PNG' || $mime=='JPEG'){
					$res=move_uploaded_file($_FILES['bannerImg']['tmp_name'], "../../banners/".$imgname);
					if($res){
						unlink("../../banners/".$result[0]);
						$query="update spotlight set title='$title', image='$imgname', message='$message',link='$link', linkMsg='$linkMsg' where id=$id";
						mysql_query($query);
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Content Updated..</span></center><br/><br/>').fadeOut(5000);
						window.location.assign('?spotlight');
					</script>";
					}else{
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
					</script>";
					}
			}else{
				echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Wrong file uploaded..Try again!!!</span></center><br/><br/>').fadeOut(10000);
					</script>";
			}
	}
}

//edit spotlight
function editspotlightList(){
	$id=$this->sanitize($_POST['edit']);
	$id=intval($id);
	$query="select * from spotlight where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);

echo "<script type='text/javascript'>
		$('#addContentV').hide();
	</script>
	<div class='row' style='margin: 30px;'>
				<form method='post' action='?spotlight' class='form' enctype='multipart/form-data'>
					<div class='row well'>
						<div class='form-group'>
							<label for='title'><span class='glyphicon glyphicon-edit'></span> Title</label>
							<input type='text' id='title' name='title' class='form-control' placeholder='Title' value='".$result[1]."' required/>
							<input type='hidden' name='imgid' value='".$result[0]."'/>
						</div>
						<div class='form-group'>
							<label for='bannerImg'><span class='glyphicon glyphicon-open'></span> Load Image</label>
							<input type='file' id='bannerImg' name='bannerImg' accept='image/*' placeholder='Upload banner' onchange='showMyImage(this)' class='form-control'/><br/>
							<center><img src='../../banners/".$result[2]."' class='img-thumbnail' id='displayPic'/></center>
						</div>
						<div class='form-group'>
							<label for='briefmessage'><span class='glyphicon glyphicon-info-sign'></span> Message</label>
							<textarea  class='form-control' style='color: #000;' type='text' id='briefmessage' name='briefmessage'>".$result[3]."</textarea>
						</div>
						<div class='form-group'>
							<label for='link'><span class='glyphicon glyphicon-link'></span> Link</label>
							<select class='form-control' id='link' name='link'>
								<<option value='".$result[4]."' selected>";
								echo $this->getLinkTitle($result[4]);

							echo "</option>";
							$this->genLinks();
							echo "</select>
						</div>
						<div class='form-group'>
							<label for='linkMsg'><span class='glyphicon glyphicon-link'></span> Link Message</label>
							<input type='text' id='linkMsg' name='linkMsg' class='form-control' placeholder='Title' value='".$result[5]."'/>
						</div>
					</div>
					<div class='row'>
						<center><button type='submit' name='updateBannerBtn' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-upload'></span> Update Content</button>&nbsp;&nbsp;&nbsp;<a href='?spotlight' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Close</a></center>
					</div>
				</form>
			</div>";
}

//adding spotlight
function addspotlight(){
	$title=$this->sanitize($_POST['title']);
	$image=$_FILES['bannerImg']['name'];
	$message=$this->sanitize2($_POST['briefmessage']);
	$link=$this->sanitize2($_POST['link']);
	$linkMsg=$this->sanitize($_POST['linkMsg']);
	
	if($_FILES['bannerImg']['name']==null){
		$query="insert into spotlight(title,message,link, linkMsg, status) values('$title','$message','$link','$linkMsg',0)";
		$result=mysql_query($query);
		if($result){
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Content Added..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?spotlight');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
	}else{
		//processing if image name is not null
		//checking the validity of uploaded file..
			$mime=explode(".", $_FILES['bannerImg']['name']);
			$mime=$mime[1];
			$imgname=date('Y-m-d-h-i-s').".".$mime;
			if($mime=='jpg' || $mime=='png' || $mime=='jpeg' || $mime=='JPG' || $mime=='PNG' || $mime=='JPEG'){
					$res=move_uploaded_file($_FILES['bannerImg']['tmp_name'], "../../banners/".$imgname);
					if($res){
						
						$query="insert into spotlight(title,image,message,link,status) values('$title','$imgname','$message','$link',0)";
						mysql_query($query);
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Banner Updated..</span></center><br/><br/>').fadeOut(5000);
						window.location.assign('?spotlight');
					</script>";
					}else{
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
					</script>";
					}
			}else{
				echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Wrong file uploaded..Try again!!!</span></center><br/><br/>').fadeOut(10000);
					</script>";
			}
	}
}

//toggle spotlight
function togglespotlightList(){
	if(isset($_POST['toggle'])){
		$id=$this->sanitize($_POST['toggle']);
		$id=intval($id);

		//restricting user to just one live preview
		$query="update spotlight set status=0";
		$res=mysql_query($query);
		if($res){
			$query="update spotlight set status=1 where id=$id";
			$result=mysql_query($query);
			if($result){
				echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Processing..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?spotlight');
				</script>";
			}else{
				echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";	
			}
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";	
		}

	}
}
//#end of spotlight

//###contact
function loadcontactList(){
	$query="select * from contact order by status desc";
	$result=mysql_query($query);
	$data="<table class='table table-hover table-bordered' id='bannerList'>";
	$data.="<thead><tr><th><center>ID</center></th><th><center>Title</center></th><th>Status</center></th><th><center><span class='glyphicon glyphicon-pencil'></span></center></th><th><center><span class='glyphicon glyphicon-remove'></span></center></th></tr></thead>";
	$data.="<tbody>";
	$count=1;
	while($row=mysql_fetch_array($result)){
		if($row['status']==1){
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-success tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-ok'></span></button></form></center>";
		}else{
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-warning tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-off'></span></button></form></center>";
		}
		$edit="<center><form method='post' action='?contact&edit' class='form'><button name='edit' type='submit' value='".$row['id']."' class='btn btn-xs btn-info tooltip-bottom' title='Edit' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-pencil'></span></button></form></center>";
		$delete="<center><form method='post' action='#' class='form'><button name='delete' type='submit' value='".$row['id']."' class='btn btn-xs btn-danger tooltip-bottom' title='Delete' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-remove'></span></button></form></center>";

		$data.="<tr><td><center>".$count."</center></td><td>".$row['title']."</td><td>".$status."</td><td>".$edit."</td><td>".$delete."</td></tr>";
		$count++;
	}
	$data.="</tbody>";
	$data.="</table>";
	echo $data;
}	
//delete contact
function deletecontact(){
	$id=$this->sanitize($_POST['delete']);
	$id=intval($id);

	$query="delete from contact where id=$id";
	$res=mysql_query($query);
	if($res){
		echo "<script>
				window.location.assign('?contact');
			</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..Try again!!!</span></center><br/><br/>').fadeOut(10000);
			</script>";
	}
}

//update contact
function editcontact(){
	$title=$this->sanitize($_POST['title']);
	$message=$this->sanitize2($_POST['briefmessage']);
	$id=$this->sanitize($_POST['imgid']);
	$id=intval($id);

	$query="update contact set title='$title',message='$message' where id=$id";
		$result=mysql_query($query);
		if($result){
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>contact Updated..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?contact');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
}

//edit contact
function editcontactList(){
	$id=$this->sanitize($_POST['edit']);
	$id=intval($id);
	$query="select * from contact where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);

echo "<script type='text/javascript'>
		$('#addcontactV').hide();
	</script>
	<div class='row' style='margin: 30px;'>
				<form method='post' action='?contact' class='form' enctype='multipart/form-data'>
					<div class='row well'>
						<div class='form-group'>
							<label for='title'><span class='glyphicon glyphicon-edit'></span> Title</label>
							<input type='text' id='title' name='title' class='form-control' placeholder='Title' value='".$result[1]."' required/>
							<input type='hidden' name='imgid' value='".$result[0]."'/>
						</div>
						<div class='form-group'>
							<label for='briefmessage'><span class='glyphicon glyphicon-info-sign'></span> Message</label>
							<textarea  class='form-control editfield' style='color: #000;' type='text' id='briefmessage2' name='briefmessage'>".$result[2]."</textarea>
						</div>
					</div>
					<div class='row'>
						<center><button type='submit' name='updateBannerBtn' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-upload'></span> Update contact</button>&nbsp;&nbsp;&nbsp;<a href='?contact' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Close</a></center>
					</div>
				</form>
			</div>";
}

//adding contact
function addcontact(){
	$title=$this->sanitize($_POST['title']);
	$message=$this->sanitize2($_POST['briefmessage']);

	

		$query="insert into contact(title,message,status) values('$title','$message',0)";
		$result=mysql_query($query);
		if($result){
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>contact Added..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?contact');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
}

//toggle contact
function togglecontactList(){
	if(isset($_POST['toggle'])){
		$id=$this->sanitize($_POST['toggle']);
		$id=intval($id);

		//restricting user to just one live preview
		$query="update contact set status=0";
		$res=mysql_query($query);
		if($res){
			$query="update contact set status=1 where id=$id";
			$result=mysql_query($query);
			if($result){
				echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Processing..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?contact');
				</script>";
			}else{
				echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";	
			}
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";	
		}

	}
}
//END OF contact


//###about
function loadaboutList(){
	$query="select * from about order by status desc";
	$result=mysql_query($query);
	$data="<table class='table table-hover table-bordered' id='bannerList'>";
	$data.="<thead><tr><th><center>ID</center></th><th><center>Title</center></th><th>Status</center></th><th><center><span class='glyphicon glyphicon-pencil'></span></center></th><th><center><span class='glyphicon glyphicon-remove'></span></center></th></tr></thead>";
	$data.="<tbody>";
	$count=1;
	while($row=mysql_fetch_array($result)){
		if($row['status']==1){
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-success tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-ok'></span></button></form></center>";
		}else{
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-warning tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-off'></span></button></form></center>";
		}
		$edit="<center><form method='post' action='?about&edit' class='form'><button name='edit' type='submit' value='".$row['id']."' class='btn btn-xs btn-info tooltip-bottom' title='Edit' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-pencil'></span></button></form></center>";
		$delete="<center><form method='post' action='#' class='form'><button name='delete' type='submit' value='".$row['id']."' class='btn btn-xs btn-danger tooltip-bottom' title='Delete' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-remove'></span></button></form></center>";

		$data.="<tr><td><center>".$count."</center></td><td>".$row['title']."</td><td>".$status."</td><td>".$edit."</td><td>".$delete."</td></tr>";
		$count++;
	}
	$data.="</tbody>";
	$data.="</table>";
	echo $data;
}	
//delete about
function deleteabout(){
	$id=$this->sanitize($_POST['delete']);
	$id=intval($id);

	$query="delete from about where id=$id";
	$res=mysql_query($query);
	if($res){
		echo "<script>
				window.location.assign('?about');
			</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..Try again!!!</span></center><br/><br/>').fadeOut(10000);
			</script>";
	}
}

//update about
function editabout(){
	$title=$this->sanitize($_POST['title']);
	$message=$this->sanitize2($_POST['briefmessage']);
	$id=$this->sanitize($_POST['imgid']);
	$id=intval($id);

	$query="update about set title='$title',message='$message' where id=$id";
		$result=mysql_query($query);
		if($result){
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>about Updated..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?about');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
}

//edit about
function editaboutList(){
	$id=$this->sanitize($_POST['edit']);
	$id=intval($id);
	$query="select * from about where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);

echo "<script type='text/javascript'>
		$('#addaboutV').hide();
	</script>
	<div class='row' style='margin: 30px;'>
				<form method='post' action='?about' class='form' enctype='multipart/form-data'>
					<div class='row well'>
						<div class='form-group'>
							<label for='title'><span class='glyphicon glyphicon-edit'></span> Title</label>
							<input type='text' id='title' name='title' class='form-control' placeholder='Title' value='".$result[1]."' required/>
							<input type='hidden' name='imgid' value='".$result[0]."'/>
						</div>
						<div class='form-group'>
							<label for='briefmessage'><span class='glyphicon glyphicon-info-sign'></span> Message</label>
							<textarea  class='form-control editfield' style='color: #000;' type='text' id='briefmessage2' name='briefmessage'>".$result[2]."</textarea>
						</div>
					</div>
					<div class='row'>
						<center><button type='submit' name='updateBannerBtn' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-upload'></span> Update about</button>&nbsp;&nbsp;&nbsp;<a href='?about' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Close</a></center>
					</div>
				</form>
			</div>";
}

//adding about
function addabout(){
	$title=$this->sanitize($_POST['title']);
	$message=$this->sanitize2($_POST['briefmessage']);

	

		$query="insert into about(title,message,status) values('$title','$message',0)";
		$result=mysql_query($query);
		if($result){
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>about Added..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?about');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
}

//toggle about
function toggleaboutList(){
	if(isset($_POST['toggle'])){
		$id=$this->sanitize($_POST['toggle']);
		$id=intval($id);

		//restricting user to just one live preview
		$query="update about set status=0";
		$res=mysql_query($query);
		if($res){
			$query="update about set status=1 where id=$id";
			$result=mysql_query($query);
			if($result){
				echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Processing..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?about');
				</script>";
			}else{
				echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";	
			}
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";	
		}

	}
}
//END OF about



//###around the world
	function loadworldList(){
	$query="select * from world order by status desc";
	$result=mysql_query($query);
	$data="<table class='table table-hover table-bordered' id='bannerList'>";
	$data.="<thead><tr><th><center>ID</center></th><th><center>Title</center></th><th><center>Video Source</center></th><th><center>Status</center></th><th><center><span class='glyphicon glyphicon-pencil'></span></center></th><th><center><span class='glyphicon glyphicon-remove'></span></center></th></tr></thead>";
	$data.="<tbody>";
	$count=1;
	while($row=mysql_fetch_array($result)){
		if($row['status']==1){
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-success tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-ok'></span></button></form></center>";
		}else{
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-warning tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-off'></span></button></form></center>";
		}
		$edit="<center><form method='post' action='?world&edit' class='form'><button name='edit' type='submit' value='".$row['id']."' class='btn btn-xs btn-info tooltip-bottom' title='Edit' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-pencil'></span></button></form></center>";
		$delete="<center><form method='post' action='#' class='form'><button name='delete' type='submit' value='".$row['id']."' class='btn btn-xs btn-danger tooltip-bottom' title='Delete' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-remove'></span></button></form></center>";

		$data.="<tr><td><center>".$count."</center></td><td>".$row['title']."</td><td>".$row['video']."</td><td>".$status."</td><td>".$edit."</td><td>".$delete."</td></tr>";
		$count++;
	}
	$data.="</tbody>";
	$data.="</table>";
	echo $data;
}	
//delete world
function deleteworld(){
	$id=$this->sanitize($_POST['delete']);
	$id=intval($id);

	$query="delete from world where id=$id";
	$res=mysql_query($query);
	if($res){
		echo "<script>
				window.location.assign('?world');
			</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..Try again!!!</span></center><br/><br/>').fadeOut(10000);
			</script>";
	}
}

//update world
function editworld(){
	$title=$this->sanitize($_POST['title']);
	$video=$this->sanitize2($_POST['bannerImg']);
	$message=$this->sanitize2($_POST['briefmessage']);
	$link=$this->sanitize2($_POST['link']);
	$id=$this->sanitize($_POST['imgid']);
	$id=intval($id);

	$query="update world set title='$title',video='$video', message='$message',link='$link' where id=$id";
		$result=mysql_query($query);
		if($result){
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>world Updated..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?world');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
}

//edit world
function editworldList(){
	$id=$this->sanitize($_POST['edit']);
	$id=intval($id);
	$query="select * from world where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);

echo "<script type='text/javascript'>
		$('#addworldV').hide();
	</script>
	<div class='row' style='margin: 30px;'>
				<form method='post' action='?world' class='form' enctype='multipart/form-data'>
					<div class='row well'>
						<div class='form-group'>
							<label for='title'><span class='glyphicon glyphicon-edit'></span> Title</label>
							<input type='text' id='title' name='title' class='form-control' placeholder='Title' value='".$result[1]."' required/>
							<input type='hidden' name='imgid' value='".$result[0]."'/>
						</div>
						<div class='form-group'>
							<label for='bannerImg'><span class='glyphicon glyphicon-open'></span> Video Source</label>
							<textarea  class='form-control' style='color: #000;' type='text' id='briefmessage3' name='bannerImg'>".$result[2]."</textarea>
						</div>
						<div class='form-group'>
							<label for='briefmessage'><span class='glyphicon glyphicon-info-sign'></span> Message</label>
							<textarea  class='form-control editfield' style='color: #000;' type='text' id='briefmessage2' name='briefmessage'>".$result[3]."</textarea>
						</div>
						<div class='form-group'>
							<label for='link'><span class='glyphicon glyphicon-link'></span> Link</label>
							<select class='form-control' id='link' name='link'>
								<option value='".$result[4]."' selected>";
								echo $this->getLinkTitle($result[4]);

							echo "</option>";
							$this->genLinks();
							echo "</select>
						</div>
					</div>
					<div class='row'>
						<center><button type='submit' name='updateBannerBtn' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-upload'></span> Update world</button>&nbsp;&nbsp;&nbsp;<a href='?world' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Close</a></center>
					</div>
				</form>
			</div>";
}

//adding world
function addworld(){
	$title=$this->sanitize($_POST['title']);
	$video=$this->sanitize2($_POST['bannerImg']);
	$message=$this->sanitize2($_POST['briefmessage']);
	$link=$this->sanitize2($_POST['link']);
	

		$query="insert into world(title,video,message,link,status) values('$title','$video','$message','$link',0)";
		$result=mysql_query($query);
		if($result){
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>world Added..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?world');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
}

//toggle world
function toggleworldList(){
	if(isset($_POST['toggle'])){
		$id=$this->sanitize($_POST['toggle']);
		$id=intval($id);

		//restricting user to just one live preview
		$query="update world set status=0";
		$res=mysql_query($query);
		if($res){
			$query="update world set status=1 where id=$id";
			$result=mysql_query($query);
			if($result){
				echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Processing..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?world');
				</script>";
			}else{
				echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";	
			}
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";	
		}

	}
}

//END OF world


//########PHOTOS
function loadphotosList(){
	$query="select * from photos order by status desc";
	$result=mysql_query($query);
	$data="<table class='table table-condensed table-stripped table-hover table-bordered' id='bannerList'>";
	$data.="<thead><tr><th><center>ID</center></th><th><center>Title</center></th><th><center>Status</center></th><th><center><span class='glyphicon glyphicon-pencil'></span></center></th><th><center><span class='glyphicon glyphicon-remove'></span></center></th></tr></thead>";
	$data.="<tbody>";
	$count=1;
	while($row=mysql_fetch_array($result)){
		if($row['status']==1){
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-success tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-ok'></span></button></form></center>";
		}else{
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-warning tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-off'></span></button></form></center>";
		}
		$edit="<center><form method='post' action='?photos&edit' class='form'><button name='edit' type='submit' value='".$row['id']."' class='btn btn-xs btn-info tooltip-bottom' title='Edit' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-pencil'></span></button></form></center>";
		$delete="<center><form method='post' action='#' class='form'><button name='delete' type='submit' value='".$row['id']."' class='btn btn-xs btn-danger tooltip-bottom' title='Delete' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-remove'></span></button></form></center>";

		$data.="<tr><td><center>".$count."</center></td><td>".$row['title']."</td><td>".$status."</td><td>".$edit."</td><td>".$delete."</td></tr>";
		$count++;
	}
	$data.="</tbody>";
	$data.="</table>";
	echo $data;
}	
//delete photos
function deletephotos(){
	$id=$this->sanitize($_POST['delete']);
	$id=intval($id);

	//getting image name
	$query="select image from photos where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	$imgname=$result[0];

	$query="delete from photos where id=$id";
	$res=mysql_query($query);
	if($res){
		unlink("../../banners/".$imgname);
		echo "<script>
				window.location.assign('?photos');
			</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..Try again!!!</span></center><br/><br/>').fadeOut(10000);
			</script>";
	}
}

//update photos
function editphotos(){
	$title=$this->sanitize($_POST['title']);
	$image=$_FILES['bannerImg']['name'];
	$message=$this->sanitize2($_POST['briefmessage']);
	$link=$this->sanitize2($_POST['link']);
	$id=$this->sanitize($_POST['imgid']);
	$id=intval($id);
	if($_FILES['bannerImg']['name']==null){
		$query="update photos set title='$title',message='$message',link='$link' where id=$id";
		$result=mysql_query($query);
		if($result){
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>photos Updated..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?photos');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
	}else{
		//processing if image name is not null
		//checking the validity of uploaded file..
			$mime=explode(".", $_FILES['bannerImg']['name']);
			$mime=$mime[1];
			/*echo "<script>
					alert('".$_FILES['bannerImg']['name']."');
				</script>";*/
			//getting previous file name and deleting to save disk space
			$query="select image from photos where id=$id";
			$result=mysql_query($query);
			$result=mysql_fetch_row($result);

			$imgname=date('Y-m-d-h-i-s').".".$mime;
			if($mime=='jpg' || $mime=='png' || $mime=='jpeg' || $mime=='JPG' || $mime=='PNG' || $mime=='JPEG'){
					$res=move_uploaded_file($_FILES['bannerImg']['tmp_name'], "../../banners/".$imgname);
					if($res){
						unlink("../../banners/".$result[0]);
						$query="update photos set title='$title', image='$imgname', message='$message',link='$link' where id=$id";
						mysql_query($query);
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>photos Updated..</span></center><br/><br/>').fadeOut(5000);
						window.location.assign('?photos');
					</script>";
					}else{
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
					</script>";
					}
			}else{
				echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Wrong file uploaded..Try again!!!</span></center><br/><br/>').fadeOut(10000);
					</script>";
			}
	}
}

//edit photos
function editphotosList(){
	$id=$this->sanitize($_POST['edit']);
	$id=intval($id);
	$query="select * from photos where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);

echo "<script type='text/javascript'>
		$('#addphotosV').hide();
	</script>
	<div class='row' style='margin: 30px;'>
				<form method='post' action='?photos' class='form' enctype='multipart/form-data'>
					<div class='row well'>
						<div class='form-group'>
							<label for='title'><span class='glyphicon glyphicon-edit'></span> Title</label>
							<input type='text' id='title' name='title' class='form-control' placeholder='Title' value='".$result[1]."' required/>
							<input type='hidden' name='imgid' value='".$result[0]."'/>
						</div>
						<div class='form-group'>
							<label for='bannerImg'><span class='glyphicon glyphicon-open'></span> Load Image</label>
							<input type='file' id='bannerImg' name='bannerImg' accept='image/*' placeholder='Upload banner' onchange='showMyImage(this)' class='form-control'/><br/>
							<center><img src='../../banners/".$result[2]."' style='width: 150px; height: 150px;' class='img-thumbnail' id='displayPic'/></center>
						</div>
						<div class='form-group'>
							<label for='briefmessage'><span class='glyphicon glyphicon-info-sign'></span> Message</label>
							<textarea  class='form-control' style='color: #000;' type='text' id='briefmessage' name='briefmessage'>".$result[3]."</textarea>
						</div>
						<div class='form-group'>
							<label for='link'><span class='glyphicon glyphicon-link'></span> Link</label>
							<select class='form-control' id='link' name='link'>
								<option value='".$result[4]."' selected>";
								echo $this->getLinkTitle($result[4]);

							echo "</option>";
							$this->genLinks();
							echo "</select>
						</div>
					</div>
					<div class='row'>
						<center><button type='submit' name='updateBannerBtn' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-upload'></span> Update photos</button>&nbsp;&nbsp;&nbsp;<a href='?photos' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Close</a></center>
					</div>
				</form>
			</div>";
}

//adding photos
function addphotos(){
	$title=$this->sanitize($_POST['title']);
	$image=$_FILES['bannerImg']['name'];
	$message=$this->sanitize2($_POST['briefmessage']);
	$link=$this->sanitize2($_POST['link']);
	
	if($_FILES['bannerImg']['name']==null){
		$query="insert into photos(title,message,link,status) values('$title','$message','$link',0)";
		$result=mysql_query($query);
		if($result){
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>photos Added..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?photos');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
	}else{
		//processing if image name is not null
		//checking the validity of uploaded file..
			$mime=explode(".", $_FILES['bannerImg']['name']);
			$mime=$mime[1];
			$imgname=date('Y-m-d-h-i-s').".".$mime;
			if($mime=='jpg' || $mime=='png' || $mime=='jpeg' || $mime=='JPG' || $mime=='PNG' || $mime=='JPEG'){
					$res=move_uploaded_file($_FILES['bannerImg']['tmp_name'], "../../banners/".$imgname);
					if($res){
						
						$query="insert into photos(title,image,message,link,status) values('$title','$imgname','$message','$link',0)";
						mysql_query($query);
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Banner Updated..</span></center><br/><br/>').fadeOut(5000);
						window.location.assign('?photos');
					</script>";
					}else{
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
					</script>";
					}
			}else{
				echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Wrong file uploaded..Try again!!!</span></center><br/><br/>').fadeOut(10000);
					</script>";
			}
	}
}

//toggle photos
function togglephotosList(){
	if(isset($_POST['toggle'])){
		$id=$this->sanitize($_POST['toggle']);
		$id=intval($id);

		//restricting user to just one live preview
		$query="update photos set status=0";
		$res=mysql_query($query);
		if($res){
			$query="update photos set status=1 where id=$id";
			$result=mysql_query($query);
			if($result){
				echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Processing..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?photos');
				</script>";
			}else{
				echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";	
			}
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";	
		}

	}
}

//END OF PHOTOS



//#############NEWS AND HAPPENINGS
//update happenings
function updateFeaturedNews1(){
	$topic=$this->sanitize($_POST['topic']);
	$source=$this->sanitize2($_POST['source']);
	$id=$this->sanitize($_POST['id']);
	$id=intval($id);

	$query="update happenings set topic='$topic',source='$source' where id=$id";
	mysql_query($query);
	echo "<script>	
			window.location.assign('?happenings');
		</script>";
}

//add happenings
function addFeaturedNews1(){
	$topic=$this->sanitize($_POST['topic']);
	$source=$this->sanitize2($_POST['source']);
	$query="insert into happenings(topic,source,status) values('$topic','$source',0)";
	mysql_query($query);
	echo "<script>	
			window.location.assign('?happenings');
		</script>";
}

//toggle happenings
function toogleFN1(){
	$id=$this->sanitize($_POST['toggle']);
	$id=intval($id);
	$query="update happenings set status=0";
	mysql_query($query);
	$query="update happenings set status=1 where id=$id";
	mysql_query($query);
	echo "<script>
				window.location.assign('?happenings');
		</script>";
}

//delete happenings
function deleteFeaturedNews1(){ 
	$id=$this->sanitize($_POST['delete']);
	$id=intval($id);
	
	$query="delete from happenings where id=$id";
	mysql_query($query);
	echo "<script>
				window.location.assign('?happenings');
		</script>";	
}

//edit happenings
function editFeaturedNews1(){
	$id=$this->sanitize($_POST['edit']);
	$id=intval($id);
	$query="select * from happenings where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	echo "		<script>$('#addFeaturedNewsb').hide(); 
	function updateView(x){
		var info =x;
		document.getElementById('addFNView').innerHTML=x;
		} 
</script>
				<div class='row' style='margin: 2px;'>
					<div class='col-md-6'>
					<form method='post' action='?happenings' class='form'>
						<div class='form-group'>
							<label for='topic'>Topic:</label>
							<input type='text' name='topic' id='topic' class='form-control' placeholder='Topic'/ required value='".$result[1]."'>
							<input type='hidden' name='id' value='".$result[0]."'/>
						</div>
						<div class='form-group'>
							<label for='source'>Source:</label>
							<textarea class='form-control' name='source' onkeyup='updateView(this.value)' id='source' required>".$result[2]."</textarea>
						</div>
						<div class='form-group'>
							<center><button type='submit' name='updateFNBtn' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-plus'></span> Update Featured News</button>&nbsp;&nbsp;&nbsp;<a href='?happenings' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Close</a></center>
						</div>
					</form>
					</div>
					<div class='col-md-6'>
						
						<div class='form-group'>
							<div class='row' id='addFNView' style='margin: 5px;'>".$result[2]."</div>
						</div>
						<p><center><span class='glyphicon glyphicon-eye-open'></span> Preview</center></p>
					</div>
				</div>
			";
}


//load loadFeaturedNews()
function loadFeaturedNews1(){
	$query="select * from happenings order by status desc";
	$result=mysql_query($query);
	$data="<table class='table table-bordered table-condensed table-stripped table-hover table-bordered' id='bannerList'>";
	$data.="<thead><tr><th><center>No.</center></th><th><center>Topic</center></th><th><center>Status</center></th><th><center><span class='glyphicon glyphicon-pencil'></span></center></th><th><span class='glyphicon glyphicon-remove'></span></th></tr></thead>";
	$data.="</tbody>";
	$count=1;
	while($row=mysql_fetch_array($result)){
		if($row['status']==1){
			$status="<center><form method='post' action='?happenings' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-success tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-ok'></span></button></form></center>";
		}else{
			$status="<center><form method='post' action='?happenings' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-warning tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-off'></span></button></form></center>";
		}
		$edit="<center><form method='post' action='?happenings&edit' class='form'><button name='edit' type='submit' value='".$row['id']."' class='btn btn-xs btn-info tooltip-bottom' title='Edit' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-pencil'></span></button></form></center>";
		$delete="<center><form method='post' action='?happenings' class='form'><button name='delete' type='submit' value='".$row['id']."' class='btn btn-xs btn-danger tooltip-bottom' title='Delete' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-remove'></span></button></form></center>";

		$data.="<tr><td><center>".$count."</center></td><td>".$row['topic']."</td><td>".$status."</td><td>".$edit."</td><td>".$delete."</td></tr>";
		$count++;
	}
	$data.="</tbody>";
	$data.="</table>";
	echo $data;
}
//############END OF NEWS AND HAPPENINGS





//update featuredNews
function updateFeaturedNews(){
	$topic=$this->sanitize($_POST['topic']);
	$source=$this->sanitize2($_POST['source']);
	$id=$this->sanitize($_POST['id']);
	$id=intval($id);

	$query="update featurednews set topic='$topic',source='$source' where id=$id";
	mysql_query($query);
	echo "<script>	
			window.location.assign('?featurednews');
		</script>";
}

//add featuredNews
function addFeaturedNews(){
	$topic=$this->sanitize($_POST['topic']);
	$source=$this->sanitize2($_POST['source']);
	$query="insert into featurednews(topic,source,status) values('$topic','$source',0)";
	mysql_query($query);
	echo "<script>	
			window.location.assign('?featurednews');
		</script>";
}

//toggle featurednews
function toogleFN(){
	$id=$this->sanitize($_POST['toggle']);
	$id=intval($id);
	$query="update featurednews set status=0";
	mysql_query($query);
	$query="update featurednews set status=1 where id=$id";
	mysql_query($query);
	echo "<script>
				window.location.assign('?featurednews');
		</script>";
}

//delete featuredNews
function deleteFeaturedNews(){ 
	$id=$this->sanitize($_POST['delete']);
	$id=intval($id);
	
	$query="delete from featurednews where id=$id";
	mysql_query($query);
	echo "<script>
				window.location.assign('?featurednews');
		</script>";	
}

//edit featuredNews
function editFeaturedNews(){
	$id=$this->sanitize($_POST['edit']);
	$id=intval($id);
	$query="select * from featurednews where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	echo "		<script>$('#addFeaturedNewsb').hide(); 
	function updateView(x){
		var info =x;
		document.getElementById('addFNView').innerHTML=x;
		} 
</script>
				<div class='row' style='margin: 2px;'>
					<div class='col-md-6'>
					<form method='post' action='?featurednews' class='form'>
						<div class='form-group'>
							<label for='topic'>Topic:</label>
							<input type='text' name='topic' id='topic' class='form-control' placeholder='Topic'/ required value='".$result[1]."'>
							<input type='hidden' name='id' value='".$result[0]."'/>
						</div>
						<div class='form-group'>
							<label for='source'>Source:</label>
							<textarea class='form-control' name='source' onkeyup='updateView(this.value)' id='source' required>".$result[2]."</textarea>
						</div>
						<div class='form-group'>
							<center><button type='submit' name='updateFNBtn' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-plus'></span> Update Featured News</button>&nbsp;&nbsp;&nbsp;<a href='?featurednews' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Close</a></center>
						</div>
					</form>
					</div>
					<div class='col-md-6'>
						
						<div class='form-group'>
							<div class='row' id='addFNView' style='margin: 5px;'>".$result[2]."</div>
						</div>
						<p><center><span class='glyphicon glyphicon-eye-open'></span> Preview</center></p>
					</div>
				</div>
			";
}

//load loadFeaturedNews()
function loadFeaturedNews(){
	$query="select * from featurednews order by status desc";
	$result=mysql_query($query);
	$data="<table class='table table-bordered table-condensed table-stripped table-hover' id='bannerList'>";
	$data.="<thead><tr><th><center>No.</center></th><th><center>Topic</center></th><th><center>Status</center></th><th><center><span class='glyphicon glyphicon-pencil'></span></center></th><th><span class='glyphicon glyphicon-remove'></span></th></tr></thead>";
	$data.="</tbody>";
	$count=1;
	while($row=mysql_fetch_array($result)){
		if($row['status']==1){
			$status="<center><form method='post' action='?featurednews' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-success tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-ok'></span></button></form></center>";
		}else{
			$status="<center><form method='post' action='?featurednews' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-warning tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-off'></span></button></form></center>";
		}
		$edit="<center><form method='post' action='?featurednews&edit' class='form'><button name='edit' type='submit' value='".$row['id']."' class='btn btn-xs btn-info tooltip-bottom' title='Edit' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-pencil'></span></button></form></center>";
		$delete="<center><form method='post' action='?featurednews' class='form'><button name='delete' type='submit' value='".$row['id']."' class='btn btn-xs btn-danger tooltip-bottom' title='Delete' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-remove'></span></button></form></center>";

		$data.="<tr><td><center>".$count."</center></td><td>".$row['topic']."</td><td>".$status."</td><td>".$edit."</td><td>".$delete."</td></tr>";
		$count++;
	}
	$data.="</tbody>";
	$data.="</table>";
	echo $data;
}

//delete briefcontent
function deleteBriefContent(){
	$id=$this->sanitize($_POST['delete']);
	$id=intval($id);

	//getting image name
	$query="select image from briefcontent where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	$imgname=$result[0];

	$query="delete from briefcontent where id=$id";
	$res=mysql_query($query);
	if($res){
		unlink("../../banners/".$imgname);
		echo "<script>
				window.location.assign('?content');
			</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..Try again!!!</span></center><br/><br/>').fadeOut(10000);
			</script>";
	}
}

//update briefcontent
function editBriefContent(){
	$title=$this->sanitize($_POST['title']);
	$image=$_FILES['bannerImg']['name'];
	$message=$this->sanitize2($_POST['briefmessage']);
	$link=$this->sanitize2($_POST['link']);
	$id=$this->sanitize($_POST['imgid']);
	$id=intval($id);
	if($_FILES['bannerImg']['name']==null){
		$query="update briefcontent set title='$title',message='$message',link='$link' where id=$id";
		$result=mysql_query($query);
		if($result){
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Content Updated..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?content');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
	}else{
		//processing if image name is not null
		//checking the validity of uploaded file..
			$mime=explode(".", $_FILES['bannerImg']['name']);
			$mime=$mime[1];
			/*echo "<script>
					alert('".$_FILES['bannerImg']['name']."');
				</script>";*/
			//getting previous file name and deleting to save disk space
			$query="select image from briefcontent where id=$id";
			$result=mysql_query($query);
			$result=mysql_fetch_row($result);

			$imgname=date('Y-m-d-h-i-s').".".$mime;
			if($mime=='jpg' || $mime=='png' || $mime=='jpeg' || $mime=='JPG' || $mime=='PNG' || $mime=='JPEG'){
					$res=move_uploaded_file($_FILES['bannerImg']['tmp_name'], "../../banners/".$imgname);
					if($res){
						unlink("../../banners/".$result[0]);
						$query="update briefcontent set title='$title', image='$imgname', message='$message',link='$link' where id=$id";
						mysql_query($query);
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Content Updated..</span></center><br/><br/>').fadeOut(5000);
						window.location.assign('?content');
					</script>";
					}else{
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
					</script>";
					}
			}else{
				echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Wrong file uploaded..Try again!!!</span></center><br/><br/>').fadeOut(10000);
					</script>";
			}
	}
}

//edit briefcontent
function editBriefContentList(){
	$id=$this->sanitize($_POST['edit']);
	$id=intval($id);
	$query="select * from briefcontent where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);

echo "<script type='text/javascript'>
		$('#addContentV').hide();
	</script>
	<div class='row' style='margin: 30px;'>
				<form method='post' action='?content' class='form' enctype='multipart/form-data'>
					<div class='row well'>
						<div class='form-group'>
							<label for='title'><span class='glyphicon glyphicon-edit'></span> Title</label>
							<input type='text' id='title' name='title' class='form-control' placeholder='Title' value='".$result[1]."' required/>
							<input type='hidden' name='imgid' value='".$result[0]."'/>
						</div>
						<div class='form-group'>
							<label for='bannerImg'><span class='glyphicon glyphicon-open'></span> Load Image</label>
							<input type='file' id='bannerImg' name='bannerImg' accept='image/*' placeholder='Upload banner' onchange='showMyImage(this)' class='form-control'/><br/>
							<center><img src='../../banners/".$result[2]."' style='width: 150px; height: 150px;' class='img-thumbnail' id='displayPic'/></center>
						</div>
						<div class='form-group'>
							<label for='briefmessage'><span class='glyphicon glyphicon-info-sign'></span> Message</label>
							<textarea  class='form-control' style='color: #000;' type='text' id='briefmessage' name='briefmessage'>".$result[3]."</textarea>
						</div>
						<div class='form-group'>
							<label for='link'><span class='glyphicon glyphicon-link'></span> Link</label>
							<select class='form-control' id='link' name='link'>
								<option value='".$result[4]."' selected>";
								echo $this->getLinkTitle($result[4]);

							echo "</option>";
							$this->genLinks();
							echo "</select>
						</div>
					</div>
					<div class='row'>
						<center><button type='submit' name='updateBannerBtn' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-upload'></span> Update Content</button>&nbsp;&nbsp;&nbsp;<a href='?content' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Close</a></center>
					</div>
				</form>
			</div>";
}

//adding briefcontent
function addBriefContent(){
	$title=$this->sanitize($_POST['title']);
	$image=$_FILES['bannerImg']['name'];
	$message=$this->sanitize2($_POST['briefmessage']);
	$link=$this->sanitize2($_POST['link']);
	
	if($_FILES['bannerImg']['name']==null){
		$query="insert into briefcontent(title,message,link,status) values('$title','$message','$link',0)";
		$result=mysql_query($query);
		if($result){
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Content Added..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?content');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
	}else{
		//processing if image name is not null
		//checking the validity of uploaded file..
			$mime=explode(".", $_FILES['bannerImg']['name']);
			$mime=$mime[1];
			$imgname=date('Y-m-d-h-i-s').".".$mime;
			if($mime=='jpg' || $mime=='png' || $mime=='jpeg' || $mime=='JPG' || $mime=='PNG' || $mime=='JPEG'){
					$res=move_uploaded_file($_FILES['bannerImg']['tmp_name'], "../../banners/".$imgname);
					if($res){
						
						$query="insert into briefcontent(title,image,message,link,status) values('$title','$imgname','$message','$link',0)";
						mysql_query($query);
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Banner Updated..</span></center><br/><br/>').fadeOut(5000);
						window.location.assign('?content');
					</script>";
					}else{
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
					</script>";
					}
			}else{
				echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Wrong file uploaded..Try again!!!</span></center><br/><br/>').fadeOut(10000);
					</script>";
			}
	}
}

//toggle briefcontent
function toggleBriefContentList(){
	if(isset($_POST['toggle'])){
		$id=$this->sanitize($_POST['toggle']);
		$id=intval($id);

		//restricting user to just one live preview
		$query="update briefcontent set status=0";
		$res=mysql_query($query);
		if($res){
			$query="update briefcontent set status=1 where id=$id";
			$result=mysql_query($query);
			if($result){
				echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Processing..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?content');
				</script>";
			}else{
				echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";	
			}
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";	
		}

	}
}


//edit banner
function updateBannerInfo(){
	$info=$this->sanitize($_POST['description']);
	$link=$this->sanitize2($_POST['link']);
	$id=$this->sanitize($_POST['imgid']);
	$id=intval($id);
	if($_FILES['bannerImg']['name']==null){
		$query="update banner set info='$info',link='$link' where id=$id";
		$result=mysql_query($query);
		if($result){
			echo "<script>
			$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Banner Added..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?banners');
				</script>";
		}else{
			echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
		}
	}else{
		//processing if image name is not null
		//checking the validity of uploaded file..
			$mime=explode(".", $_FILES['bannerImg']['name']);
			$mime=$mime[1];
			/*echo "<script>
					alert('".$_FILES['bannerImg']['name']."');
				</script>";*/
			//getting previous file name and deleting to save disk space
			$query="select imgname from banner where id=$id";
			$result=mysql_query($query);
			$result=mysql_fetch_row($result);

			$imgname=date('Y-m-d-h-i-s').".".$mime;
			if($mime=='jpg' || $mime=='png' || $mime=='jpeg' || $mime=='JPG' || $mime=='PNG' || $mime=='JPEG'){
					$res=move_uploaded_file($_FILES['bannerImg']['tmp_name'], "../../banners/".$imgname);
					if($res){
						unlink("../../banners/".$result[0]);
						$query="update banner set imgname='$imgname',info='$info',link='$link' where id=$id";
						mysql_query($query);
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Banner Updated..</span></center><br/><br/>').fadeOut(5000);
						window.location.assign('?banners');
					</script>";
					}else{
						echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
					</script>";
					}
			}else{
				echo "<script>
						$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Wrong file uploaded..Try again!!!</span></center><br/><br/>').fadeOut(10000);
					</script>";
			}
	}
}


//adding banner
function addBanner(){
	$info=$this->sanitize($_POST['description']);
	$link=$this->sanitize2($_POST['link']);

	//checking the validity of uploaded file..
	$mime=explode(".", $_FILES['bannerImg']['name']);
	$mime=$mime[1];
	/*echo "<script>
			alert('".$_FILES['bannerImg']['name']."');
		</script>";*/
	$imgname=date('Y-m-d-h-i-s').".".$mime;
	if($mime=='jpg' || $mime=='png' || $mime=='jpeg'){
			$res=move_uploaded_file($_FILES['bannerImg']['tmp_name'], "../../banners/".$imgname);
			if($res){
				$query="insert into banner(imgname,info,link,status) values('{$imgname}','{$info}','{$link}',0)";
				mysql_query($query);
				echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-success\' role=\'alert\'>Banner Added..</span></center><br/><br/>').fadeOut(5000);
				window.location.assign('?banners');
			</script>";
			}else{
				echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..</span></center><br/><br/>').fadeOut(10000);
			</script>";
			}
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Wrong file uploaded..Try again!!!</span></center><br/><br/>').fadeOut(10000);
			</script>";
	}
}



//updating aygec member details
function updateaygecMember(){
	$title=$this->sanitize($_POST['title']);
	$lastname=$this->sanitize($_POST['lastName']);
	$othernames=$this->sanitize($_POST['otherNames']);
	$nationalSociety=$this->sanitize($_POST['nationalsociety']);
	$institution=$this->sanitize($_POST['institution']);
	$category=$this->sanitize($_POST['category']);
	$qualification=$this->sanitize($_POST['qualification']);
	$address=$this->sanitize($_POST['address']);
	$city=$this->sanitize($_POST['city']);
	$country=$this->sanitize($_POST['country']);
	$mobileNo=$this->sanitize($_POST['mobileNo']);
	$emailAddress=$this->sanitize($_POST['emailAddress']);
	$travelDetails=$this->sanitize($_POST['travelDetails']);
	$arrivalTime=$this->sanitize($_POST['arrivaltime']);
	$departureTime=$this->sanitize($_POST['departuretime']);
	$accDetails=$this->sanitize($_POST['accDetail']);
	$presenting=$this->sanitize($_POST['presenting']);
	$tour1=intval($this->sanitize($_POST['tour']));
	$tour2=intval($this->sanitize($_POST['tour2']));
	$need=$this->sanitize($_POST['need']);

	$query="update aygecmembers set title='{$title}',lastname='{$lastname}',onames='{$othernames}',nationalsociety='{$nationalSociety}',institution='{$institution}',category='{$category}',qualification='{$qualification}',address='{$address}',city='{$city}',country='{$country}',mobileNo='{$mobileNo}',emailAddr='{$emailAddress}',travel='{$travelDetails}',arrivaltime='{$arrivalTime}',departuretime='{$departureTime}',accommodation='{$accDetails}',presenting='{$presenting}',tour1={$tour1},tour2={$tour2},need='{$need}' where eCode='{$_SESSION['aygecmember']}'";
	$result=mysql_query($query);
	if($result){
		
		echo "<script>
			alert('Details updated....');
			document.getElementById('aygecform').reset();
			window.location.assign('print.php?register');
		</script>";
	}else{
		echo "<script>
			alert('Process failed..Please try again');
		</script>";
	}
}



//getting member details
function getMemberDetails($code){
	$query="select * from aygecmembers where eCode='$code'";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	return $result;
}


function verifyAuthCode($authcode){
	$query="select * from aygecmembers where eCode='$authcode'";
	$result=mysql_query($query);
	$num=mysql_num_rows($result);
	if($num >=1){
		$_SESSION['aygecmember']=$authcode;
		echo 1;
	}else{
		echo 0;
	}
}


function loadRegistrationView(){
	if(isset($_GET['aygec2016'])){
		include "5aygec.php";
	}elseif(isset($_GET['aygec2016edit'])){
		include "aygecedit.php";
	}else{
		include "registration.php";
	}
}

function loadContent(){
	if(isset($_GET['home'])){
		include "home.php";
	}elseif(isset($_GET['about'])){
		include "about.php";
	}elseif(isset($_GET['register'])){
		include "register.php";
	}elseif(isset($_GET['news'])){
		include "news.php";
	}elseif(isset($_GET['gallery'])){
		include "gallery.php";
	}elseif(isset($_GET['videos'])){
		include "videos.php";
	}elseif(isset($_GET['downloads'])){
		include "downloads.php";
	}elseif(isset($_GET['contact'])){
		include "contact.php";
	}elseif(isset($_GET['articles'])){
		include "articlesmain.php";
	}elseif(isset($_GET['search'])){
		include "searchengine.php";
	}else{
		include "home.php";
	}
}

//###########################..ADMIN...#############################

function addaygecMember(){
	$title=$this->sanitize($_POST['title']);
	$lastname=$this->sanitize($_POST['lastName']);
	$othernames=$this->sanitize($_POST['otherNames']);
	$nationalSociety=$this->sanitize($_POST['nationalsociety']);
	$institution=$this->sanitize($_POST['institution']);
	$category=$this->sanitize($_POST['category']);
	$qualification=$this->sanitize($_POST['qualification']);
	$address=$this->sanitize($_POST['address']);
	$city=$this->sanitize($_POST['city']);
	$country=$this->sanitize($_POST['country']);
	$mobileNo=$this->sanitize($_POST['mobileNo']);
	$emailAddress=$this->sanitize($_POST['emailAddress']);
	$travelDetails=$this->sanitize($_POST['travelDetails']);
	$arrivalTime=$this->sanitize($_POST['arrivaltime']);
	$departureTime=$this->sanitize($_POST['departuretime']);
	$accDetails=$this->sanitize($_POST['accDetail']);
	$presenting=$this->sanitize($_POST['presenting']);
	$tour1=intval($this->sanitize($_POST['tour']));
	$tour2=intval($this->sanitize($_POST['tour2']));
	$need=$this->sanitize($_POST['need']);
	$curDate=$this->genDate();
	$eCode=$lastname . rand(1000,9999);
	$query="insert into aygecmembers(title,lastname,onames,nationalsociety,institution,category,qualification,address,city,country,mobileNo,emailAddr,travel,arrivaltime,departuretime,accommodation,presenting,tour1,tour2,need,regDate,eCode) values('$title','$lastname','$othernames','$nationalSociety','$institution','$category','$qualification','$address','$city','$country','$mobileNo','$emailAddress','$travelDetails','$arrivalTime','$departureTime','$accDetails','$presenting',$tour1,$tour2,'$need','$curDate','$eCode')";
	$result=mysql_query($query);
	if($result){
		$_SESSION['aygecmember']=$eCode;
		//$this->sendHMail($sender,$receiver,$subject,$message)
		echo "<script>
			alert('Registration successful....');
			document.getElementById('aygecform').reset();
			window.location.assign('print.php?register');
		</script>";
	}else{
		echo "<script>
			alert('Registration failed..Please try again');
		</script>";
	}
}

function listHostels(){
	$query="select * from hotels";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){
		echo "<option value='".$row['name']."'>".$row['name']."</option>";
	}
}

function getTitles(){
	$query="select * from titles";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){
		echo "<option value='".$row['name']."'>".$row['name']."</option>";
	}
}

function addChat($user,$msg){
	$username=$this->sanitize($user);
	$message=$this->sanitize($msg);
	$cd=$this->genDate();
	$query="insert into realtimechat values('$username','$message','$cd')";
	$result=mysql_query($query);
	if($result){
		echo 1;
	}else{
		echo 0;
	}
}

function getChatList(){
	$query="select * from realtimechat order by date desc";
	$result=mysql_query($query);

	$data="<ul class='chat'>";
                          
	$count=0;

	while($row=mysql_fetch_array($result)){
		if($count%2==0){
			$data.="<li class='left clearfix'>";
			$data.="<span class='chat-img pull-left'>";
			$data.="<img src='../images/dp.png' style='height: 50px; width: 50px;' class='img-circle'>";
			$data.="</span>";
			$data.="<div class='chat-body clearfix'>";
			$data.="<div class='header'>";
			$data.="<strong class='primary-font'>".$row['username']."</strong>";
			$data.="<small class='pull-right text-muted'>";
			$data.="<i class='fa fa-clock-o fa-fw'></i> ".$row['date']. "</small>";
			$data.="</div>";
			$data.="<p>".$row['message']."</p>";
			$data.="</div></li>";

		}else{
			$data.="<li class='right clearfix'>";
			$data.="<span class='chat-img pull-right'>";
			$data.="<img src='../images/dp.png' style='height: 50px; width: 50px;' class='img-circle'>";
			$data.="</span>";
			$data.="<div class='chat-body clearfix'>";
			$data.="<div class='header'>";
			$data.="<small class='text-muted'>";
			$data.="<i class='fa fa-clock-o fa-fw'></i> ".$row['date']. "</small>";
			$data.="<strong class='pull-right primary-font'>".$row['username']."</strong>";
			$data.="</div>";
			$data.="<p>".$row['message']."</p>";
			$data.="</div></li>";
		}

		$count++;
	}
	$data.="</ul>";
	echo $data;
}


function getNumber($table){
	$query="select count(*) from $table";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	echo $result[0];
}
function getLastPass($username){
	$query="select * from passwdupate where username='$username' order by date desc";
	$result=mysql_query($query);
	$data=null;
	$count=0;
	while($row=mysql_fetch_array($result)){
		if($count==1){
			break;
		}
		$data=$row['date'];
		$count++;
	}
	return $data;
}

function genDate(){
	return date('Y-m-d h:i:s');
}

function updateLastLogin($username){
	$cdate=$this->genDate();
	$ip=$_SERVER['REMOTE_ADDR'];
	$query="insert into lastlogin values('$username','$ip','$cdate')";
	mysql_query($query);
}

function getLastLogin($username){
	$query="select * from lastlogin where username='$username' order by date desc";
	$result=mysql_query($query);
	$data=[];
	$count=0;
	while($row=mysql_fetch_array($result)){
		if($count==2){
			break;
		}
		$data[0]=$row['ip'];
		$data[1]=$row['date'];
		$count++;
	}
	return $data;
}

function loadAnnouncements(){
	$theme=$this->getTheme();
	$query="select * from announcements where status=1";
	$result=mysql_query($query);
	$data=null;
	while($row=mysql_fetch_array($result)){
	$data.="<div class='row'>";
	$data.="<p style='border: 1px dashed ".$theme[2]."; padding: 5px;'>";
	$data.="<b>".$row['title']."</b><br/>";
	$data.=$row['message']."<br/>";
	$data.="</p>";
	$data.="</row>";
	}
	
	echo $data;
}

function getFullDetails($username,$table){
	$query="select * from $table where username='$username'";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	return $result;
}


function systemAlerts(){
	$query="select * from sysnotifications order by date desc";
	$result=mysql_query($query);
	$data=" <ul class='dropdown-menu dropdown-alerts'>";
	$count=1;
	$num=mysql_num_rows($result);
	while($row=mysql_fetch_array($result)){
		if($count==4){
			break;
		}
		$data.="<li>";
			$data.="<a href='#'><div><i class='fa fa-envelope fa-fw'></i> ".$row['message']."<span class='pull-right text-muted small'>".$row['date']."</span></div></a>";
		$data.="</li>";
		
			$data.="<li class='divider'></li>";


		$count++;
	}

	$data.="<li>
                            <a class='text-center' href='?alerts'>
                                <strong>Read All Alerts</strong>
                                <i class='fa fa-angle-right'></i>
                            </a>
                        </li>";
	$data.="</ul>";
	echo $data;
}


function getMessages(){
	$query="select * from chat order by date desc";
	$result=mysql_query($query);
	$data=" <ul class='dropdown-menu dropdown-messages'>";
	$count=1;
	$num=mysql_num_rows($result);
	while($row=mysql_fetch_array($result)){
		$info=$this->getFullDetails($row['username'],'members');
		$fullname=$info[0];
		if($count==4){
			break;
		}
		$data.="<li>";
			$data.="<a href='#'><div><strong>".$fullname."</strong><span class='pull-right text-muted'><em>".$row['date']."</em></div><div>".$row['message']."</div></a>";
		$data.="</li>";

				$data.="<li class='divider'></li>";
		
		$count++;
	}
	$data.="<li>
                            <a class='text-center' href='?messages'>
                                <strong>Read All Messages</strong>
                                <i class='fa fa-angle-right'></i>
                            </a>
                        </li>";
	$data.="</ul>";
	echo $data;
}

function loadContentAdmin(){
	if(isset($_GET['logout'])){
		session_destroy();
		echo "<script>
				window.location.assign('login.php');
			</script>";
	}elseif(isset($_GET['dashboard'])){
		include "dashboard.php";
	}elseif(isset($_GET['profile'])){
		include "profile.php";
	}elseif(isset($_GET['changepwd'])){
		include "changepwd.php";
	}elseif(isset($_GET['editdetails'])){
		include "editdetails.php";
	}elseif(isset($_GET['messages'])){
		include "messages.php";
	}elseif(isset($_GET['alerts'])){
		include "sysnotify.php";
	}elseif(isset($_GET['banners'])){
		include "banner.php";
	}elseif(isset($_GET['content'])){
		include "briefcontent.php";
	}elseif(isset($_GET['photos'])){
		include "latestphotos.php";
	}elseif(isset($_GET['world'])){
		include "aroundtheworld.php";
	}elseif(isset($_GET['aygec'])){
		include "aygec.php";
	}elseif(isset($_GET['viewaygec'])){
		include "aygecview.php";
	}elseif(isset($_GET['featurednews'])){
		include "featurednews.php";
	}elseif(isset($_GET['happenings'])){
		include "happenings.php";
	}elseif(isset($_GET['about'])){
		include "aboutadmin.php";
	}elseif(isset($_GET['contact'])){
		include "contactadmin.php";
	}elseif(isset($_GET['spotlight'])){
		include "spotlight.php";
	}elseif(isset($_GET['announcements'])){
		include "announcements.php";
	}elseif(isset($_GET['calendar'])){
		include "calendar.php";
	}elseif(isset($_GET['news'])){
		include "newsadmin.php";
	}elseif(isset($_GET['gallery'])){
		include "galleryadmin.php";
	}elseif(isset($_GET['videos'])){
		include "videosadmin.php";
	}elseif(isset($_GET['downloads'])){
		include "downloadsadmin.php";
	}elseif(isset($_GET['registeredMembers'])){
		include "gssregmembers.php";
	}elseif(isset($_GET['activeMembers'])){
		include "gssactivemembers.php";
	}elseif(isset($_GET['menu'])){
		include "menu.php";
	}elseif(isset($_GET['articles'])){
		include "articles.php";
	}elseif(isset($_GET['configuration'])){
		include "configuration.php";
	}else{
		include "dashboard.php";
	}
}




function getaygecMember(){
	$id=$_POST['registerMember'];
	$query="select * from aygecmembers where id='$id'";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	return $result;
}

function genAygecRegMembers(){
	$query="select * from aygecmembers order by regDate";
	$result=mysql_query($query);
	$count=1;
	/*<tr><th><center>Title</center></th><th><center>Last Name</center></th><th><center>Other Name(s)</center></th>
					<th><center>Institution</center></th><th><center>Country</center></th><th><center>Details</center></th></tr>*/
	while($row=mysql_fetch_array($result)){
		/*echo "<tr><td>".$count."</td><td>".$row['title']."</td><td>".$row['lastname']."</td><td>".$row['onames']."</td><td>".$row['institution']."</td><td>".$row['country']."</td><td><form method='post' action='?viewaygec'><center><button type='submit' value='".$row['id']."' name='registerMember' class='tooltip-bottom btn btn-xs btn-info' style='border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;' title='View Details'><span class='glyphicon glyphicon-eye-open'></span></button></center></form></td></tr>";*/
		echo "<tr><td>".$count."</td><td>".$row['title']."</td><td>".$row['lastname']."</td><td>".$row['onames']."</td><td>".$row['institution']."</td><td>".$row['country']."</td><td>".$row['eCode']."</td><td><form method='post' action'?aygec'><center><button class='btn btn-xs btn-danger tooltip-bottom' title='Delete' style='-moz-border-radius: 15px; -webkit-border-radius: 15px; border-radius: 15px;' type='submit' name='delete' value='".$row['id']."'><span class='glyphicon glyphicon-remove'></span></button></center></form></form></tr>";
		$count++;
	} 
}

function getNewsLinks(){
	$theme=$this->getTheme();
	$query="select * from news where status=1 order by date desc";
	$result=mysql_query($query);
	while ($row=mysql_fetch_array($result)) {
		echo "<div class='row' style='padding: 5px; border: 1px dashed ".$theme[2].";'>";
		echo "<a href='?news&info=".$row['id']."' style='color: #000;' class='tooltip-bottom link' title='".$row['title']."'>".ucfirst($row['title'])."</a>";
		echo "</div>";
	}
}

function getNewsLinks2(){
	$theme=$this->getTheme();
	$query="select * from news where status=1 order by date desc";
	$result=mysql_query($query);
	$data=null;
	while ($row=mysql_fetch_array($result)) {
		$data.="<div class=\'row\' style=\'padding: 5px; border: 1px dashed ".$theme[2].";\'>";
		$data.="<a href=\'?news&info=".$row['id']."\' style=\'color: #000;\' class=\'tooltip-bottom link\' title=\'".$row['title']."\'>".ucfirst($row['title'])."</a>";
		$data.= "</div>";
	}
	return $data;
}

function loadCurrentArticles(){
	if(isset($_GET['id'])){
		$info=$this->sanitize($_GET['id']);
		$info=intval($info);
		$query="select * from articles where id=$info";	
		$result=mysql_query($query);
		$num=mysql_num_rows($result);
		if($num >= 1){ 
		while($row=mysql_fetch_array($result)){
		echo "<h3 style='font-weight: bold;'><center><u>".$row['title']."</u></center></h3>";
		echo "<p><center><img src='banners/".$row['image']."' class='img-thumbnail' style='height: 170px; width: 170px;'/></center></p>";
		echo "<p>".$row['message']."</p>";
		}
		}else{
			echo "<script>window.location.assign('?home');</script>";
		}
	}else{
		echo "<script>window.location.assign('?home');</script>";
	}
}

function loadCurrentNews(){
	if(isset($_GET['info'])){
		$info=$this->sanitize($_GET['info']);
		$info=intval($info);
		$query="select * from news where id=$info";	
		$result=mysql_query($query);
		$num=mysql_num_rows($result);
		if($num >= 1){ 
		while($row=mysql_fetch_array($result)){
		echo "<h3 style='font-weight: bold;'><center><u>".$row['title']."</u></center></h3>";
		echo "<p><center><img src='banners/".$row['image']."' style='height: 170px; width: 170px;'/></center></p>";
		echo "<p>".$row['message']."</p>";
		}
		}else{
			//load default view
			$query="select * from news where status=1 order by date desc";
			$result=mysql_query($query);
			$count=0;
			while($row=mysql_fetch_array($result)){
				if($count==1){
					break;
				}
				echo "<h3 style='font-weight: bold;'><center><u>".$row['title']."</u></center></h3>";
				echo "<p><center><img src='banners/".$row['image']."' style='height: 170px; width: 170px;'/></center></p>";
				echo "<p>".$row['message']."</p>";
				$count++;
			}
		}
	}else{
	$query="select * from news where status=1 order by date desc";
	$result=mysql_query($query);
	$count=0;
	while($row=mysql_fetch_array($result)){
		if($count==1){
			break;
		}
		echo "<h3 style='font-weight: bold;'><center><u>".$row['title']."</u></center></h3>";
		echo "<p><center><img src='banners/".$row['image']."' style='height: 170px; width: 170px;'/></center></p>";
		echo "<p>".$row['message']."</p>";
		$count++;
	}
}
}

function genQualifications(){
	$query="select * from qualifications";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){
		echo "<option value='".$row['id']."'>".$row['name']."</option>";
	}
}

function loadGender(){
	$query="select * from gender";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){
		echo "<option value='".$row['id']."'>".$row['name']."</option>";
	}
}


function loadMembershipType(){
	$query="select * from membershiptype";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){
		echo "<option value='".$row['id']."'>".$row['name']."</option>";
	}
}



function loadSpotlight(){
	$theme=$this->getTheme();
	$query="select * from spotlight where status=1";
	$result=mysql_query($query);
	while ($row=mysql_fetch_array($result)) {
		if($row['image']!=null){ 
		echo "<center><p><img src='banners/".$row['image']."' style='width: 70px; height: 70px'/></p></center>";
		}
		echo "<p style='font-weight: 100; border: 1px dashed ".$theme[2]."; color: #909057; font-weight: bold;' class='row well'>".$row['message']."</p>";
		if($row['link']!=null){
		echo "<p><center><a href='".$row['link']."' class='btn btn-xs btn-success blink' style='background-color: #ca9a1c; color: #fff; border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px; border: 1px solid ".$theme[2]."; font-weight: bold;'><span class='glyphicon glyphicon-pecil'></span> ".$row['linkMsg']."</a></center></p>";
		}
	}
}


function loadATWList(){
	$query="select * from atw order by status desc";
	$result=mysql_query($query);
	$data="<table class='table table-hover table-bordered' id='bannerList'>";
	$data.="<thead><tr><th><center>ID</center></th><th><center>Title</center></th><th><center>Video Name</center></th><th><center>Link</center></th><th><center>Status</center></th><th><center><span class='glyphicon glyphicon-pencil'></span></center></th><th><center><span class='glyphicon glyphicon-remove'></span></center></th></tr></thead>";
	$data.="<tbody>";
	while($row=mysql_fetch_array($result)){
		if($row['status']==1){
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-success tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-ok'></span></button></form></center>";
		}else{
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-warning tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-off'></span></button></form></center>";
		}
		$edit="<center><form method='post' action='#' class='form'><button name='edit' type='submit' value='".$row['id']."' class='btn btn-xs btn-info tooltip-bottom' title='Edit' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-pencil'></span></button></form></center>";
		$delete="<center><form method='post' action='#' class='form'><button name='delete' type='submit' value='".$row['id']."' class='btn btn-xs btn-danger tooltip-bottom' title='Delete' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-remove'></span></button></form></center>";

		$data.="<tr><td><center>".$row['id']."</center></td><td>".$row['title']."</td><td>".$row['video']."</td><td>".$row['link']."</td><td>".$status."</td><td>".$edit."</td><td>".$delete."</td></tr>";
	}
	$data.="</tbody>";
	$data.="</table>";
	echo $data;
}

function loadLatestPhotosList(){
	$query="select * from photos order by status desc";
	$result=mysql_query($query);
	$data="<table class='table table-hover table-bordered' id='bannerList'>";
	$data.="<thead><tr><th><center>ID</center></th><th><center>Title</center></th><th><center>Image Name</center></th><th><center>Link</center></th><th><center>Status</center></th><th><center><span class='glyphicon glyphicon-pencil'></span></center></th><th><center><span class='glyphicon glyphicon-remove'></span></center></th></tr></thead>";
	$data.="<tbody>";
	$count=1;
	while($row=mysql_fetch_array($result)){
		if($row['status']==1){
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-success tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-ok'></span></button></form></center>";
		}else{
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-warning tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-off'></span></button></form></center>";
		}
		$edit="<center><form method='post' action='?content&edit' class='form'><button name='edit' type='submit' value='".$row['id']."' class='btn btn-xs btn-info tooltip-bottom' title='Edit' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-pencil'></span></button></form></center>";
		$delete="<center><form method='post' action='#' class='form'><button name='delete' type='submit' value='".$row['id']."' class='btn btn-xs btn-danger tooltip-bottom' title='Delete' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-remove'></span></button></form></center>";

		$data.="<tr><td><center>".$count."</center></td><td>".$row['title']."</td><td>".$row['image']."</td><td>".$row['link']."</td><td>".$status."</td><td>".$edit."</td><td>".$delete."</td></tr>";
		$count++;
	}
	$data.="</tbody>";
	$data.="</table>";
	echo $data;
}


function loadBriefContentList(){
	$query="select * from briefcontent order by status desc";
	$result=mysql_query($query);
	$data="<table class='table table-condensed table-stripped table-hover table-bordered' id='bannerList'>";
	$data.="<thead><tr><th><center>ID</center></th><th><center>Title</center></th><th><center>Status</center></th><th><center><span class='glyphicon glyphicon-pencil'></span></center></th><th><center><span class='glyphicon glyphicon-remove'></span></center></th></tr></thead>";
	$data.="<tbody>";
	$count=1;
	while($row=mysql_fetch_array($result)){
		if($row['status']==1){
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-success tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-ok'></span></button></form></center>";
		}else{
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-warning tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-off'></span></button></form></center>";
		}
		$edit="<center><form method='post' action='?content&edit' class='form'><button name='edit' type='submit' value='".$row['id']."' class='btn btn-xs btn-info tooltip-bottom' title='Edit' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-pencil'></span></button></form></center>";
		$delete="<center><form method='post' action='#' class='form'><button name='delete' type='submit' value='".$row['id']."' class='btn btn-xs btn-danger tooltip-bottom' title='Delete' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-remove'></span></button></form></center>";

		$data.="<tr><td><center>".$count."</center></td><td>".$row['title']."</td><td>".$status."</td><td>".$edit."</td><td>".$delete."</td></tr>";
		$count++;
	}
	$data.="</tbody>";
	$data.="</table>";
	echo $data;
}

function loadBriefContent(){
	$theme=$this->getTheme();
	$query="select * from briefcontent where status=1";
	$result=mysql_query($query);
	$data="<h4 style='font-weight: bold;'><center>";
	while($row=mysql_fetch_array($result)){
		$data.="<img src='banners/".$row['image']."' style='width: 70px; height: 70px;'/> ".ucwords($row['title'])."</center></h4>";
		$data.="<p>".$row['message']."...<a href='".$row['link']."' class='btn btn-xs btn-success' style='background-color: ".$theme[2]."; color: #ff; border-radius: 30px; -webkit-border-radius: 30px; -moz-border-radius: 30px;'>Read more..<span class='glyphicon glyphicon-forward'></span></a><p>";
	}
	echo $data;
}


function deleteBanner(){
	$id=$this->sanitize($_POST['delete']);
	$id=intval($id);

	//getting image name
	$query="select imgname from banner where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	$imgname=$result[0];

	$query="delete from banner where id=$id";
	$res=mysql_query($query);
	if($res){
		unlink("../../banners/".$imgname);
		echo "<script>
				window.location.assign('?banners');
			</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..Try again!!!</span></center><br/><br/>').fadeOut(10000);
			</script>";
	}
}


//edit banner details
function loadEditBanner(){
	if(isset($_POST['edit'])){ 
		$id=$this->sanitize($_POST['edit']);
		$id=intval($id);
		$query="select * from banner where id=$id";
		$result=mysql_query($query);
		$result=mysql_fetch_row($result);
	echo "
					<script>
					$('#addBannerV').hide();				
					</script>
					<div class='row' style='margin: 15px;'>
						<div class='col-md-6'>
							<form method='post' action='?banners' class='form' enctype='multipart/form-data'>
						<div class='row well'>
						<div class='form-group'>
							<label for='bannerImg'><span class='glyphicon glyphicon-open'></span> Load Image</label>
							<input type='file' id='bannerImg' name='bannerImg' accept='image/*,image/png,image/jpg,image/jpeg' placeholder='Upload banner' onchange='showMyImage(this)' class='form-control'/>
							<input type='hidden' name='imgid' value='".$result[0]."'/>
						</div>
						<div class='form-group'>
							<label for='description'><span class='glyphicon glyphicon-info-sign'></span> Description</label>
							<textarea type='text' id='description' name='description' placeholder='Short Info' class='form-control' maxlength='500'>".$result[2]."</textarea>
						</div>
						<div class='form-group'>
							<label for='link'><span class='glyphicon glyphicon-link'></span> Link</label>
							<select class='form-control' id='link' name='link'>
								<option value='".$result[3]."' selected>";
								echo $this->getLinkTitle($result[3]);

							echo "</option>";
							$this->genLinks();
							echo "</select>
						</div>
					</div>
					<div class='row'>
						<center><button type='submit' name='updateBannerBtn' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-upload'></span> Update Info</button>&nbsp;&nbsp;&nbsp;<a href='?banners' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Close</a></center>
					</div>
				</form>
						</div>
						<div class='col-md-6'>
						<center><img src='../../banners/".$result[1]."' id='displayPic' class='img-thumbnail'/></center>
						</div>
					</div>
				
				
	";
	}else{
		echo "<script>
				window.location.assign('?banners');
			</script>";
	}
}


function toggleBanner(){
	$id=$this->sanitize($_POST['toggle']);
	$id=intval($id);

	$query="select status from banner where id=$id";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	$status=$result[0];

	if($status==1){
		$idn=0;
	}else{
		$idn=1;
	}
	$query="update banner set status=$idn where id=$id";
	$res=mysql_query($query);
	if($res){
		echo "<script>
				window.location.assign('?banners');
			</script>";
	}else{
		echo "<script>
				$('#bannerRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Process failed..Try again!!!</span></center><br/><br/>').fadeOut(10000);
			</script>";
	}
}


function loadBannerList(){
	$query="select * from banner order by status desc";
	$result=mysql_query($query);
	$data="<table class='table table-condensed table-stripped table-hover table-bordered' id='bannerList'>";
	$data.="<thead><tr><th><center>ID</center></th><th><center>Info</center></th><th><center>Status</center></th><th><center><span class='glyphicon glyphicon-pencil'></span></center></th><th><center><span class='glyphicon glyphicon-remove'></span></center></th></tr></thead>";
	$data.="<tbody>";
	$count=1;
	while($row=mysql_fetch_array($result)){
		if($row['status']==1){
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-success tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-ok'></span></button></form></center>";
		}else{
			$status="<center><form method='post' action='#' class='form'><button name='toggle' type='submit' value='".$row['id']."' class='btn btn-xs btn-warning tooltip-bottom' title='Click to toggle status' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-off'></span></button></form></center>";
		}
		$edit="<center><form method='post' action='?banners&edit' class='form'><button name='edit' type='submit' value='".$row['id']."' class='btn btn-xs btn-info tooltip-bottom' title='Edit banner details' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-pencil'></span></button></form></center>";
		$delete="<center><form method='post' action='#' class='form'><button name='delete' type='submit' value='".$row['id']."' class='btn btn-xs btn-danger tooltip-bottom' title='Delete banner' style='border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px;'><span class='glyphicon glyphicon-remove'></span></button></form></center>";

		$data.="<tr><td><center>".$count."</center><td>".$row['info']."</td><td>".$status."</td><td>".$edit."</td><td>".$delete."</td></tr>";
		$count++;
	}
	$data.="</tbody>";
	$data.="</table>";
	echo $data;
}


function loadBannerIndicators(){
	$query="select * from banner where status=1";
	$result=mysql_query($query);
	$num=mysql_num_rows($result);
	for($i=0; $i<$num;$i++){
		if($i==0){
			echo "<li data-target='#myCarousel' data-slide-to='".$i."' class='active'></li>";
		}else{ 
			echo "<li data-target='#myCarousel' data-slide-to='".$i."'></li>";
		}
	}
}

function loadBanner(){
	$query="select * from banner where status=1";
	$result=mysql_query($query);
	$count=0;
	while($row=mysql_fetch_array($result)){
		if($count==0){
			echo "<div class='item active'>";
		}else{
			echo "<div class='item'>";
		}
		echo "<a href='".$row['link']."' class='first-slide'><img class='first-slide tooltip-bottom' title='".$row['info']."' src='banners/".$row['imgname']."' alt='Slider' style='width: 100%; height: 100%;'></a>";
		echo "</div>";
		$count++;
	}

}

function loadCalendar(){
	$theme=$this->getTheme();
	$query="select * from calendar where status=1";
	$result=mysql_query($query);
	$data=null;
	while($row=mysql_fetch_array($result)){
	$data.="<div class='row'>";
	$data.="<a href='".$row['link']."' style='text-decoration: none;color: #000;'><p style='border: 1px dashed ".$theme[2]."; padding: 5px;'>";
	$data.="<span class='glyphicon glyphicon-envelope'></span> <b>".$row['title']."</b><br/><span class='glyphicon glyphicon-time'></span> ";
	$data.=$row['date']."<br/>";
	$data.="</p></a>";
	$data.="</row>";
	}
	
	echo $data;
}

function loadSysNotify(){
	$query="select * from sysnotifications order by date desc";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){
		echo "<tr><td>".$row['message']."</td><td>".$row['date']."</td></tr>";
	}
}

function loadAdminMessages(){
	$query="select * from chat order by date desc";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){
		echo "<tr><td>".$row['username']."</td><td>".$row['message']."</td><td>".$row['date']."</td></tr>";
	}
}

function updateAdminProfile($username,$fullname,$email,$mobileNo){
	$username=$this->sanitize($username);
	$fullname=$this->sanitize($fullname);
	$email=$this->sanitize($email);
	$mobileNo=$this->sanitize($mobileNo);
	$query="update admin set fullname='$fullname',email='$email',mobileNo='$mobileNo' where username='$username'";
	$result=mysql_query($query);
	if($result==1){
								echo "<script>
								$('#profileEditRes').html('<center><span class=\'alert alert-success\' role=\'alert\'> Profile Updated successfully!!!</span></center>').fadeOut(5000);
									window.location.assign('?profile');
									</script>";
	}else{
								echo "<br/><script>
									$('#profileEditRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'> Profile Update failed..Try again!!</span></center>').fadeOut(5000);
									</script><br/>";
	}
}

function updateGssProfile($username,$fullname,$email,$mobileNo){
	$username=$this->sanitize($username);
	$fullname=$this->sanitize($fullname);
	$email=$this->sanitize($email);
	$mobileNo=$this->sanitize($mobileNo);
	$query="update gssmembership set fullname='$fullname',email='$email',mobileNo='$mobileNo' where username='$username'";
	$result=mysql_query($query);
	if($result==1){
								echo "<script>
								$('#profileEditRes').html('<center><span class=\'alert alert-success\' role=\'alert\'> Profile Updated successfully!!!</span></center>').fadeOut(5000);
									window.location.assign('?editdetails');
									</script>";
	}else{
								echo "<br/><script>
									$('#profileEditRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'> Profile Update failed..Try again!!</span></center>').fadeOut(5000);
									</script><br/>";
	}
}

function updatePassChng($username){
	$myD=$this->genDate();
	$query="insert into passwdupate values('$username','$myD')";
	mysql_query($query);
}

function updatePass($username,$oldpass,$newpass,$table){
	//checking if user exists
	$username=$this->sanitize($username);
	$oldpass=$this->sanitize($oldpass);
	$newpass=$this->sanitize($newpass);
	$oldpass=md5($oldpass);
	$newpass=md5($newpass);
	$query="select * from $table where username='$username' and password='$oldpass'";
	$result=mysql_query($query);
	$num=mysql_num_rows($result);
	if($num >=1){
		$query="update $table set password='$newpass' where username='$username'";
		$result=mysql_query($query);
		if($result){
			//update last login
			$this->updatePassChng($username);
			return 1;
		}else{
			return 0;
		}
	}else{
		return 0;
	}
}

function checkLoginAdmin(){
	if(!isset($_SESSION['gtadmin']) || $_SESSION['gtadmin']==null){
		echo "<script>
				window.location.assign('login.php');
			</script>";
	}
}


function checkIfLoggedInAdmin(){
	if(isset($_SESSION['gtadmin']) && $_SESSION['gtadmin'] != null){
		echo "<script>
				window.location.assign('index.php');
			</script>";
	}
}	

function checkLoginMember(){
	if(!isset($_SESSION['gtmember']) || $_SESSION['gtmember']==null){
		echo "<script>
				window.location.assign('login.php');
			</script>";
	}
}


function checkIfLoggedInMember(){
	if(isset($_SESSION['gtmember']) && $_SESSION['gtmember'] != null){
		echo "<script>
				window.location.assign('index.php');
			</script>";
	}
}



function sanitize($data){
	$data=trim($data);
	$data=htmlentities($data);
	return mysql_real_escape_string($data);
}


function verifyAdmin(){
	if(isset($_POST['username']) && isset($_POST['password'])){
			$username=$this->sanitize($_POST['username']);
			$password=$this->sanitize($_POST['password']);
			$password=md5($password);
			$result=$this->verifyCredentials($username,$password,'admin');
			if($result==1){
				$this->updateLastLogin($username);
				$_SESSION['gtadmin']=$username;
				echo "<script>
					window.location.assign('index.php');
					</script>";
			}else{
				echo "<script>
						$('#displayRes').html('<center><span class=\'alert alert-danger\' role=\'alert\'>Credentials Invalid</span><br/></center>').fadeOut(5000);
					</script>";
			}
	}
}

function verifyCredentials($username,$password,$dbtable){
	$query="select * from $dbtable where username='$username' and password='$password'";
	$result=mysql_query($query);
	$num=mysql_num_rows($result);
	if($num >=1){
		return 1;
	}else{
		return 0;
	}
}


function getConfigurationData(){
	$query="select * from configuration limit 1";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	return $result;
}

function getTheme(){
	$query="select * from theme where status=1";
	$result=mysql_query($query);
	$result=mysql_fetch_row($result);
	return $result;
}

function genThemeList(){
	$query="select * from theme order by status desc";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){
		if($row['status']==1){
			$status="selected";
		}else{
			$status="";
		}
		echo "<option value='".$row['id']."' ".$status.">".$row['name']."</option>";
	}
}

//updating configuration data
function updateConfigurationData(){
	//post parameters
	
}
//#########################################################..ADMIN....




}//end of enersmart class
?>
