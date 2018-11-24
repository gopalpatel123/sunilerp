<?php
/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 */
$this->set('title', 'Create App Banners');
?>
<div class="row">
	<div class="col-md-12">
			<div class="portlet light ">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-bar-chart font-green-sharp hide"></i>
						<span class="caption-subject font-green-sharp bold ">Create App Banners</span>
					</div>
				</div>
				<div class="portlet-body">
					<?= $this->Form->create($appBanner,['onsubmit'=>'return checkValidation()','type'=>'file']) ?>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Select Category </label>
										<?php echo $this->Form->control('stock_group_id',['class'=>'form-control input-sm select2me stock_group_id','label'=>false,'empty'=>'-Category-', 'options' => $options]); ?>
										
									</div>
								</div>	
								<div class="col-md-4">
									<div class="form-group">
										<label>Select Item </label>
										<?php echo $this->Form->control('item_id',['class'=>'form-control input-sm select2me','label'=>false,'empty'=>'-Items-', 'options' => '','id'=>'item_id']); ?>
										
									</div>
								</div>	
								<div class="col-md-4">
									<div class="form-group">
										<label>Status</label>
										<?php 
										$status=[];
										$status=[['text'=>'Active','value'=>'Active'],['text'=>'Deactivate','value'=>'Deactivate']];
										
										echo $this->Form->control('status',['class'=>'form-control input-sm select2me','label'=>false,'empty'=>'-Status-', 'options' => $status]); ?>
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Link Name</label>
										<?php echo $this->Form->control('link_name',['class'=>'form-control input-sm','label'=>false,'type'=>'text','id'=>'link_name']); ?>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Name</label>
										<?php echo $this->Form->control('name',['class'=>'form-control input-sm','label'=>false,'type'=>'text','id'=>'name']); ?>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Image</label>
										<?php echo $this->Form->control('banner_image',['class'=>'form-control input-sm image','label'=>false, 'type' =>'file','id'=>'image_url']); ?>
									</div>
								</div>
							</div>
							
							<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<?= $this->Html->image('/img/download.png',['class'=>'img-responsive thumbnail','style'=>'height: 160px;','id'=>'imgshw1'])?>
										
								</div>
							</div>
						</div>
							<div class="row"><span class="loading"></span>
								<div class="col-md-6">
									<div class="form-group">
										<?= $this->Form->button(__('Submit'),['class'=>'btn btn-success submit']) ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
					
					<?= $this->Form->end() ?>
				</div>
			</div>
		</div>
	</div>	
<!-- BEGIN PAGE LEVEL STYLES -->

	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-select/bootstrap-select.min.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/select2/select2.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/jquery-multi-select/css/multi-select.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
	
	
	<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-select/bootstrap-select.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/select2/select2.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<!-- BEGIN COMPONENTS PICKERS -->
	<?php echo $this->Html->script('/assets/admin/pages/scripts/components-pickers.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<!-- END COMPONENTS PICKERS -->

	<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->script('/assets/global/scripts/metronic.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/layout/scripts/layout.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/layout/scripts/quick-sidebar.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/layout/scripts/demo.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/pages/scripts/components-dropdowns.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- END PAGE LEVEL SCRIPTS -->

<?php
	$js='
	$(document).ready(function() {
	  ComponentsPickers.init();
    $(".stock_group_id").change(function(){
		var stock_group_id = $(this).val();
		var url="'.$this->Url->build(["controller"=>"Items","action"=>"getItems"]).'";
					url=url+"/"+stock_group_id;
					$.ajax({ 
						url:url,
						type:"GET",
						}).done(function(response){   
						$("#item_id").html(response);
						$("select[name=item_id]").select2();
					}); 
		
		
	});
	});
	';
	$js.='
		$(document).ready(function(){
			$(".image").change(function(){

   var fup = document.getElementById("image_url");
	var fileName = fup.value;
	var ext = fileName.substring(fileName.lastIndexOf(".") + 1);
	if(ext == "jpg" || ext == "jpeg" || ext == "png")
	{
		
                 readPathh(this);

	} 
	else
	{
		alert("Upload jpg/jpeg/png  files only");
		fup.focus();
		return false;
	}

});
	
		});
	
		 function readPathh(input)
		{ 
			if (input.files && input.files[0])
			{
				var reader = new FileReader();
				reader.onload = function (e)
				{
					$("#imgshw1").attr("src",e.target.result);

				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		
	';

echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom')); 
?>