<?php
/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 */
$this->set('title', 'Create App Menu');
?>
<style>
.noBorder{
	border:none;
}
</style>
<div class="row">
	<div class="col-md-8">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-sharp hide"></i>
					<span class="caption-subject font-green-sharp bold ">Create App Menu</span>
				</div>
			</div>
			<div class="portlet-body">
				<?= $this->Form->create($appMenu,['id'=>'form_sample_2','type'=>'file']) ?>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Name <span class="required">*</span></label>
									<?php echo $this->Form->control('name',['class'=>'form-control input-sm','placeholder'=>'Name','label'=>false,'autofocus']); ?>
								</div>
								<div class="form-group">
									<label>Link</label>
									<?php echo $this->Form->control('link',['class'=>'form-control input-sm','label'=>false,'placeholder'=>'link']); ?>
								</div>
								<div class="form-group">
									<label>Status  <span class="required"></span></label>
										<?php 
										$status=[];
										$status=[['text'=>'Active','value'=>'Active'],['text'=>'Deactivate','value'=>'Deactivate']];
										
										echo $this->Form->control('status',['class'=>'form-control input-sm select2me','label'=>false,'empty'=>'-Select-', 'options' => $status]); ?>
									
								</div>
								
								<div class="form-group">
									<label>Title content  <span class="required"></span></label>
									<?php 
										$title_content=[];
										$title_content=[['text'=>'Menu','value'=>'Menu'],['text'=>'Others','value'=>'Others']];
										
										echo $this->Form->control('title_content',['class'=>'form-control input-sm select2me','label'=>false,'empty'=>'-Select-', 'options' => $title_content]); ?>	
									
								</div>
								<!--<div class="form-group">
									<label>Under Group </label>
									<?php echo $this->Form->control('parent_id',['class'=>'form-control input-sm select2me','label'=>false,'empty'=>'-select-', 'options' => $parentAppMenus]); ?>
								</div>-->
								<div class="form-group">
									<label>Category</label>
									<?php echo $this->Form->control('stock_group_id',['class'=>'form-control input-sm select2me','label'=>false,'empty'=>'-Select-', 'options' => $parentStockGroups]); ?>
								</div>
								<div class="form-group">
									<label>Menu Icon</label>
									<?php echo $this->Form->control('menu_icon',['class'=>'form-control input-sm menu_icons','label'=>false, 'type' =>'file','id'=>'menu_icon']); ?>
									
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
					</div>
				</div>
				<?= $this->Form->button(__('Submit'),['class'=>'btn btn-success submit']) ?>
				<?= $this->Form->end() ?>
			</div>
		</div>
	</div>
</div>

	<!-- END COMPONENTS PICKERS -->

	<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-select/bootstrap-select.min.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/select2/select2.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/jquery-multi-select/css/multi-select.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
	<!-- BEGIN COMPONENTS PICKERS -->
	
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
		$(document).ready(function(){
			$(".menu_icons").change(function(){

   var fup = document.getElementById("menu_icon");
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

