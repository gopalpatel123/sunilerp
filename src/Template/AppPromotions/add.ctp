<?php
/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 */
$this->set('title', 'Create AppPromotions');
?>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-sharp hide"></i>
					<span class="caption-subject font-green-sharp bold ">Create AppPromotions</span>
				</div>
			</div>
			<div class="portlet-body">
				<?= $this->Form->create($appPromotion,['onsubmit'=>'return checkValidation()','allow_to_submit'=>'0','id'=>'CreateItem']) ?>
				<div class="row">
					<div class="col-md-6">
					    <div class="form-group">
							<label>Offer Name <span class="required">*</span></label>
							<?php echo $this->Form->control('offer_name',['class'=>'form-control input-sm','label'=>false,'placeholder'=>'Offer Name']); ?>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">
							<label>Offer Start From To<span class="required">*</span></label>
							<div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
								<input type="text" class="form-control" name="from">
								<span class="input-group-addon">
								to </span>
								<input type="text" class="form-control" name="to">
							</div>
						</div>	
					</div>
					<div class="col-md-2">
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
					<div class="col-md-12">
					    <div class="form-group">
							<label>Offer Description <span class="required">*</span></label>
							<?php echo $this->Form->control('description',['class'=>'form-control input-sm','label'=>false,'rows'=>'2','id'=>'summernote_1']); ?>
						</div>
					</div>
					
				</div>	
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table id="main_table" class="table table-condensed table-bordered">
								<thead>
									<tr>
										<th width="10%" rowspan="2">Coupan Name</th>
										<th width="10%" rowspan="2">Coupan Code</th>
										<th width="10%" rowspan="2">Category</th>
										<th width="10%" rowspan="2">Items</th>
										<th width="10%" colspan="2">Discount</th>
										<th width="10%" rowspan="2">Discount OF MAX Amount</th>
										<th width="10%" rowspan="2">CASH BACK</th>
										<th width="10%" rowspan="2">Free Shipping</th>
										<th width="10%" rowspan="2">Action</th>
									</tr>
									<tr>
										<th>%</th>
										<th>Amt</th>
										
										
										
									</tr>
								</thead>
								<tbody id='main_tbody' class="tab">
								</tbody>
								<tfoot>
									<tr>
										<td colspan="10">	
										<button type="button" class="add_row btn btn-default input-sm"><i class="fa fa-plus"></i> Add row</button>
										</td>
									</tr>
								</tfoot>	
							</table>
						</div>	
					</div>
				</div>	
			
				<?= $this->Form->button(__('Submit'),['class'=>'btn btn-success submit']) ?>
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
	<?php echo $this->Html->script('https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- END PAGE LEVEL SCRIPTS -->

<table id="sample_table" style="display:none;" width="100%">
	<tbody>
		<tr class="main_tr" class="tab">
			<td width="10%">
				<?php echo $this->Form->input('q', ['label' => false,'class' => 'form-control input-sm coupon_name','id'=>'coupon_name','required'=>'required','placeholder'=>'Coupon Name']); ?>
			</td>			
			<td width="10%">
				<?php echo $this->Form->input('q', ['label' => false,'class' => 'form-control input-sm coupon_code','id'=>'coupon_code','required'=>'required','placeholder'=>'Coupon Code']); ?>
			</td>
			<td width="20%">
				<?php echo $this->Form->input('q', ['empty'=>'-Category-', 'options'=>$options,'label' => false,'class' =>'form-control input-medium input-sm category_id','required'=>'required','style'=>'width:100% !important;']); ?>
			</td>
			<td width="20%">
				<?php echo $this->Form->input('q', ['empty'=>'-Item-', 'options'=>$Items,'label' => false,'class' =>'form-control input-medium input-sm item_id','required'=>'required','style'=>'width:100% !important;']); ?>
			</td>
			<td width="10%">
				<?php echo $this->Form->input('q', ['label' => false,'class' => 'form-control input-sm discount','placeholder'=>'Dis.','value'=>0]); ?>	
				
			</td>
			<td width="10%">
				<?php echo $this->Form->input('q', ['label' => false,'class' => 'form-control input-sm discount_amt','placeholder'=>'Dis.','value'=>0]); ?>	
			</td>
			<td width="10%">
				<?php echo $this->Form->input('q', ['label' => false,'class' => 'form-control input-sm discount_max_amt','placeholder'=>'Dis.','value'=>0]); ?>	
			</td>
			<td width="10%">
				<?php echo $this->Form->input('q', ['label' => false,'class' => 'form-control input-sm cash_back','placeholder'=>'Dis.','value'=>0]); ?>	
			</td>
			<td width="10%">
				<?php 
				$shipping=[];
				$shipping=[['text'=>'Yes','value'=>'Yes'],['text'=>'No','value'=>'No']];
				echo $this->Form->input('q', ['empty'=>'', 'options'=>$shipping,'label' => false,'class' =>'form-control input-medium input-sm shipping','style'=>'width:100% !important;']); ?>	
			</td>
			<td align="center">
				<a class="btn btn-danger delete-tr btn-xs dlt" href="#" role="button" style="margin-bottom: 5px;"><i class="fa fa-times"></i></a>
				
			</td>
			
		</tr>
	</tbody>
</table>
<?php
	$js="
	$(document).ready(function() {
		 ComponentsPickers.init();
		 CKEDITOR.replace('description');
		 
		 
		$('.delete-tr').die().live('click',function() 
		{
			var l=$(this).closest('table tbody').find('tr').length;
			if (confirm('Are you sure to remove row ?') == true) {
				if(l>1){
					$(this).closest('tr').remove();
					rename_rows();
				}
			} 
			
		}); 
		 
		 $('.add_row').click(function(){
			add_row();
		}) ;
		
		$( document ).ready(add_row);
	function add_row()
	{
		var tr=$('#sample_table tbody tr.main_tr').clone();
		$('#main_table tbody#main_tbody').append(tr);
		rename_rows();
	}
	
	rename_rows();
	function rename_rows()
	{
		var i=0;
		$('#main_table tbody#main_tbody tr.main_tr').each(function(){ 
			
$(this).find('.coupon_name').attr({name:'app_promotion_details['+i+'][coupon_name]',id:'app_promotion_details['+i+'][coupon_name]'});
$(this).find('.coupon_code').attr({name:'app_promotion_details['+i+'][coupon_code]',id:'app_promotion_details['+i+'][coupon_code]'});
$(this).find('.category_id').attr({name:'app_promotion_details['+i+'][stock_group_id]',id:'app_promotion_details['+i+'][stock_group_id]'});
$(this).find('.item_id').attr({name:'app_promotion_details['+i+'][item_id]',id:'app_promotion_details['+i+'][item_id]'});
$(this).find('.discount')
.attr({name:'app_promotion_details['+i+'][discount_in_percentage]',id:'app_promotion_details['+i+'][discount_in_percentage]'});			
$(this).find('.discount_amt')
.attr({name:'app_promotion_details['+i+'][discount_in_amount]',id:'app_promotion_details['+i+'][discount_in_amount]'});			
$(this).find('.discount_max_amt')
.attr({name:'app_promotion_details['+i+'][discount_of_max_amount]',id:'app_promotion_details['+i+'][discount_of_max_amount]'});			
$(this).find('.cash_back').attr({name:'app_promotion_details['+i+'][cash_back]',id:'app_promotion_details['+i+'][cash_back]'});			
$(this).find('.shipping').
attr({name:'app_promotion_details['+i+'][is_free_shipping]',id:'app_promotion_details['+i+'][is_free_shipping]'});			
			i++;
		});
	}
		 
	});";

echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom'));
?>