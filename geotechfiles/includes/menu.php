<?php 
	$theme=$this->getTheme();
	$configData=$this->getConfigurationData();
?>
<div class="row">
<br/>
</div>



<div class="row">

	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header well" style="background-color: <?php echo $theme[2]; ?>;">
				<h5 style="font-size: 18px; color: #fff; height: 2px;"><center><span class="glyphicon glyphicon-th"></span> MENU(S)</center></h5>
			</div>

			<div class="modal-body">
			<div class="row" id="bannerRes" style="margin: 15px;"></div>
			<div class="row"><br/></div>
			<div class="row" style="margin: 5px;"  id="addContentV">
				<div class="col-md-6">
					<center><a href="#addMenu" data-toggle="modal" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-plus"></span> Add Menu</a></center>
				</div>
				<div class="col-md-6">
					<center><a href="#addSubMenu" data-toggle="modal" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-plus"></span> Add SubMenu</a></center>
				</div>
			</div>
			<div class="row">
			<br/>
			</div>

			<div class="row" style="margin: 15px;">
			 	<?php 
			 		if(isset($_POST['toggleMenu'])){
			 			$this->toggleMenu($_POST['toggleMenu'],'main');
			 		}elseif(isset($_POST['toggleSubMenu'])){
			 			$this->toggleMenu($_POST['toggleSubMenu'],'sub');
			 		}elseif(isset($_POST['deleteMenu'])){
			 			$this->deleteMenu($_POST['deleteMenu'],'main');
			 		}elseif(isset($_POST['deleteSubMenu'])){
			 			$this->deleteMenu($_POST['deleteSubMenu'],'sub');
			 		}elseif(isset($_POST['addSubMenuBtn'])){
			 			$this->addSubMenu();
			 		}elseif(isset($_POST['addMainMenuBtn'])){
			 			$this->addMainMenu();
			 		}else{
			 			$this->genMenuAdmin(); 
			 		}

			 	?>
			 </div>
			</div>

			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(function(){
	$('#bannerList').DataTable({
		responsive: true
	});	
	});
	
</script>