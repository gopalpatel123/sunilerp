
<?php
/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 */
$this->set('title', 'Create App Home Screen');
?>
<div class="row">
	<div class="col-md-6">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-sharp hide"></i>
					<span class="caption-subject font-green-sharp bold ">Create App Home Screen</span>
				</div>
			</div>
			<div class="portlet-body">
				<?= $this->Form->create($appHomeScreen,['onsubmit'=>'return checkValidation()','type'=>'file']) ?>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Title <span class="required">*</span></label>
							<?php echo $this->Form->control('title',['class'=>'form-control input-sm','placeholder'=>'Title','label'=>false,'autofocus']); ?>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Layout</label>
									<?php 
									$layout=[];
									$layout=[['text'=>'Circle','value'=>'circle'],['text'=>'Horizontal','value'=>'horizontal'],['text'=>'Banner','value'=>'banner'],['text'=>'Store Directory','value'=>'store directory']];
									
									echo $this->Form->control('layout',['class'=>'form-control input-sm select2me','label'=>false,'empty'=>'-Layout-', 'options' => $layout]); ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Link URL </label>
									<?php echo $this->Form->control('link_name',['class'=>'form-control input-sm','placeholder'=>'Link URL','label'=>false,'autofocus']); ?>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Preference</label>
									<?php 
									$preference=[];
									$preference=[['text'=>'1','value'=>'1'],['text'=>'2','value'=>'2'],['text'=>'3','value'=>'3'],['text'=>'4','value'=>'4'],['text'=>'5','value'=>'5'],['text'=>'6','value'=>'6'],['text'=>'7','value'=>'7'],['text'=>'8','value'=>'8'],['text'=>'9','value'=>'9'],['text'=>'10','value'=>'10']];
									
									echo $this->Form->control('preference',['class'=>'form-control input-sm select2me','label'=>false,'empty'=>'-Preference-', 'options' => $preference]); ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Category</label>
									<?php echo $this->Form->control('stock_group_id',['class'=>'form-control input-sm select2me','label'=>false,'empty'=>'-Primary Group-', 'options' => $parentStockGroups]); ?>
								</div>
							</div>
						</div>	
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Screen Type</label>
									<?php 
									$screen_type=[];
									$screen_type=[['text'=>'Home','value'=>'Home'],['text'=>'Product Detail','value'=>'Product Detail']];
									
									echo $this->Form->control('screen_type',['class'=>'form-control input-sm select2me','label'=>false,'empty'=>'-Screen Type-', 'options' => $screen_type]); ?>
								</div>
							
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Model Name</label>
									<?php 
									$model_name=[];
									$model_name=[['text'=>'Brands','value'=>'Brands'],['text'=>'Category','value'=>'Category']];
									
									echo $this->Form->control('model_name',['class'=>'form-control input-sm select2me','label'=>false,'empty'=>'-Screen Type-', 'options' => $model_name]); ?>
								</div>
							
							</div>
						</div>
						<div class="row">	
							<div class="col-md-6">
								<div class="form-group">
									<label>Image</label>
									<?php echo $this->Form->control('image',['class'=>'form-control input-sm image','label'=>false, 'type' =>'file','id'=>'image']); ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Status</label>
									<?php 
									$section_show=[];
									$section_show=[['text'=>'Active','value'=>'Yes'],['text'=>'Deactivate','value'=>'No']];
									
									echo $this->Form->control('section_show',['class'=>'form-control input-sm select2me','label'=>false,'empty'=>'-Status-', 'options' => $section_show]); ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<?= $this->Html->image('/img/download.png',['class'=>'img-responsive thumbnail','style'=>'height: 98px;','id'=>'imgshw1'])?>
										
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
	<!-- BEGIN COMPONENTS PICKERS -->
	<?php echo $this->Html->css('/assets/global/plugins/clockface/css/clockface.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<!-- END COMPONENTS PICKERS -->

	<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-select/bootstrap-select.min.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/select2/select2.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/jquery-multi-select/css/multi-select.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
	<!-- BEGIN COMPONENTS PICKERS -->
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/clockface/js/clockface.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-daterangepicker/moment.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<!-- END COMPONENTS PICKERS -->
	
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
    $(".image").change(function(){

   var fup = document.getElementById("stock_group_image");
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
	function checkValidation()
	{
	        $(".submit").attr("disabled","disabled");
	        $(".submit").text("Submiting...");
    }
	';

echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom')); 
?>