
<?php
/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 */
$this->set('title', 'Create App Home Screen');
?>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-sharp hide"></i>
					<span class="caption-subject font-green-sharp bold ">Create App Home Screen Second</span>
				</div>
			</div>
			<div class="portlet-body">
				<?= $this->Form->create($appHomeScreen,['onsubmit'=>'return checkValidation()','type'=>'file']) ?>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Title <span class="required">*</span></label>
									<?php echo $this->Form->control('title',['class'=>'form-control input-sm','placeholder'=>'Title','label'=>false,'autofocus']); ?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Sub Title </label>
									<?php echo $this->Form->control('sub_title',['class'=>'form-control input-sm','placeholder'=>'Title','label'=>false,'autofocus']); ?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Layout</label>
									<?php 
									$layout=[];
									$layout=[['text'=>'Landscape','value'=>'Landscape'],['text'=>'Category','value'=>'category'],['text'=>'Landscape Full','value'=>'Landscape Full'],['text'=>'Multiple Image with Text Title','value'=>'Multiple Image with Text Title'],['text'=>'Multiple Image with Title','value'=>'Multiple Image with Title'],['text'=>'Multiple Image with Text Title Background','value'=>'Multiple Image with Text Title Background'],['text'=>'Multiple Image with Text Title Square','value'=>'Multiple Image with Text Title Square'],['text'=>'Brand','value'=>'brand'],['text'=>'Multiple Image with Text Title Small','value'=>'Multiple Image with Text Title Small'],['text'=>'Multiple Image Big','value'=>'Multiple Image Big'],['text'=>'Multiple Join Image','value'=>'Multiple Join Image']
									];
									
									echo $this->Form->control('layout',['class'=>'form-control input-sm select2me','label'=>false,'empty'=>'-Layout-', 'options' => $layout]); ?>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label>Main Category Add</label>
									<?php echo $this->Form->control('sub_category_id',['class'=>'form-control input-sm select2me','label'=>false,'options' => $stockGroups]); ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Link URL </label>
									<?php echo $this->Form->control('link_name1',['class'=>'form-control input-sm','placeholder'=>'Link URL','label'=>false,'autofocus']); ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Preference</label>
									<?php 
									$preference=[];
									for($i=1;$i<101;$i++){
										$preference[$i]=$i;
										
									}
									
									echo $this->Form->control('preference',['class'=>'form-control input-sm select2me','label'=>false,'empty'=>'-Preference-', 'options' => $preference]); ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Category</label>
									<?php echo $this->Form->control('stock_group_id',['class'=>'form-control input-sm select2me stock_group_id','label'=>false,'empty'=>'-Category Group-', 'options' => $parentStockGroups]); ?>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Screen Type</label>
									<?php 
									$screen_type=[];
									$screen_type=[['text'=>'Home','value'=>'Home'],['text'=>'Product Detail','value'=>'Product Detail']];
									
									echo $this->Form->control('screen_type',['class'=>'form-control input-sm select2me','label'=>false,'empty'=>'-Screen Type-', 'options' => $screen_type,'value'=>'Home']); ?>
								</div>
							
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Status</label>
									<?php 
									$section_show=[];
									$section_show=[['text'=>'Active','value'=>'Yes'],['text'=>'Deactivate','value'=>'No']];
									
									echo $this->Form->control('section_show',['class'=>'form-control input-sm select2me','label'=>false,'empty'=>'-Status-', 'options' => $section_show]); ?>
								</div>
							</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Image</label>
										<?php echo $this->Form->control('image',['class'=>'form-control input-sm image','label'=>false, 'type' =>'file','id'=>'image']); ?>
									</div>
								</div>
						</div>	
						
					</div>
				</div>
				
				
				<div class="row" >
						<div class="col-md-12">
							<div class="form-group"><label><b>Add Multiple Image</b></label>
								<table id="file_table" style="line-height:2.5">
									<tr class="tr1">
										<td>
											<?php echo $this->Form->control('name[]',['class'=>'form-control input-sm','placeholder'=>'Name','label'=>false,'autofocus']); ?>
										</td>
										<td>
											<?php echo $this->Form->control('stock_group_name[]',['class'=>'form-control input-sm select2me ','label'=>false,'empty'=>'-Category Group-', 'options' => $parentStockGroups]); ?>
										</td>
										<td>
											<?php echo $this->Form->control('link_name[]',['class'=>'form-control input-sm','placeholder'=>'Link Name','label'=>false,'autofocus']); ?>
										</td>
										<td>
											<?php echo $this->Form->control('multiple_image[]',['class'=>'form-control input-sm select_file','label'=>false, 'type' =>'file']); ?>
										</td>
										
										<td>
											<?= $this->Form->button($this->Html->tag('i', '', ['class'=>'fa fa-plus']) . __(''), ['class'=>'btn btn-block btn-primary btn-sm add_more','type'=>'button']) ?>
										</td>
										<td></td>
									</tr>
								</table>
							</div>	
						</div>	
				</div>
				
				<div class="row">
					<span class="loading"></span>
						<div class="col-md-6">
							<div class="form-group">
								<?= $this->Form->button(__('Submit'),['class'=>'btn btn-success submit']) ?>
							</div>
						</div>
				</div>
				
				<?= $this->Form->end() ?>
			</div>
		</div>
	</div>
	
</div>

<table id="copy_row" style="display:none;">	
	<tbody>
		<tr>
			<td>
				<?php echo $this->Form->control('name[]',['class'=>'form-control input-sm','placeholder'=>'Name','label'=>false,'autofocus']); ?>
			</td>
			<td>
				<?php echo $this->Form->control('stock_group_name[]',['class'=>'form-control new_select input-sm ','label'=>false,'empty'=>'-Category Group-', 'options' => $parentStockGroups]); ?>
			</td>
			<td>
				<?php echo $this->Form->control('link_name[]',['class'=>'form-control input-sm','placeholder'=>'Link Name','label'=>false,'autofocus']); ?>
			</td>
			<td>
				<?php echo $this->Form->control('multiple_image[]',['class'=>'form-control input-sm select_file','label'=>false, 'type' =>'file']); ?>
			</td>
			<td><?= $this->Form->button($this->Html->tag('i', '', ['class'=>'fa fa-plus']) . __(''), ['class'=>'btn btn-block btn-primary btn-sm add_more','type'=>'button']) ?>
			</td>
			<td style="padding: 5px;">
			<?= $this->Form->button($this->Html->tag('i', '', ['class'=>'fa fa-trash']) . __(''), ['class'=>'btn btn-block btn-danger btn-sm delete_row','type'=>'button']) ?></td>
		</tr>
	</tbody>
</table>	

	
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
	 $(document).on("click","button.add_more",function() {
				var row=$("#copy_row tbody").html();
				$("#file_table tbody").append(row);
				$("#file_table tbody").find(".new_select").addClass("select2me");
				$("#file_table tbody tr:last").find(".new_select").select2();
			});
			
		$(document).on("click","button.delete_row",function() {
			$(this).closest("tr").remove();
		});
	
	$(document).ready(function() { 
	  ComponentsPickers.init();
    $(".stock_group_id").change(function(){
		var stock_group_id = $(this).val();
		var url="'.$this->Url->build(["controller"=>"StockGroups","action"=>"stockSubGroup"]).'";
					url=url+"/"+stock_group_id;
					$.ajax({ 
						url:url,
						type:"GET",
						}).done(function(response){  
						$("#sub_category_id").html(response);
						$("select[name=sub_category_id]").select2();
					}); 
		
		
	});
	///
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