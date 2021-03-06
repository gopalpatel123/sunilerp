<?php
/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 */
$this->set('title', 'Profit & Loss Statement');
?>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Trading Report & Profit and Loss Statement
				</div>
			</div>
			<div class="portlet-body">
				<form method="get">
						<div class="row">
							<div class="col-md-3">
								<?php echo $this->Form->control('from_date',['class'=>'form-control input-sm date-picker from_date','data-date-format'=>'dd-mm-yyyy', 'label'=>false,'placeholder'=>'DD-MM-YYYY','type'=>'text','data-date-start-date'=>@$coreVariable[fyValidFrom],'data-date-end-date'=>@$coreVariable[fyValidTo],'value'=>date('d-m-Y',strtotime($from_date)),'required'=>'required']); ?>
							</div>
							<div class="col-md-3">
								<?php echo $this->Form->control('to_date',['class'=>'form-control input-sm date-picker to_date','data-date-format'=>'dd-mm-yyyy', 'label'=>false,'placeholder'=>'DD-MM-YYYY','type'=>'text','data-date-start-date'=>@$coreVariable[fyValidFrom],'data-date-end-date'=>@$coreVariable[fyValidTo],'value'=>date('d-m-Y',strtotime($to_date)),'required'=>'required']); ?>
							</div>
							<div class="col-md-3">
								<span class="input-group-btn">
								<button class="btn blue" type="submit">Go</button>
								</span>
							</div>	
						</div>
				</form>
				<?php if($from_date){ 
				$LeftTotal=0; $RightTotal=0; ?>
				<div class="row">
					<table style="margin-top:20px" class="table table-bordered">
						<thead>
							<tr style="background-color: #c4ffbd;">
								<td width="50%">
									<table width="100%">
										<tbody>
											<tr>
												<td><b>Particulars</b></td>
												<td align="right"><b>Amount</b></td>
											</tr>
										</tbody>
									</table>
								</td>
								<td width="50%">
									<table width="100%">
										<tbody>
											<tr>
												<td><b>Particulars</b></td>
												<td align="right"><b>Amount</b></td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<table width="100%">
										<tbody>
											<?php if($openingValue>=0) { ?>
												<tr>
													<td>Opening Stock</td>
													<td align="right">
														<?php 
														echo $openingValue;
														$LeftTotal+=$openingValue;
														?>
													</td>
												</tr>
											<?php } ?>
											<?php foreach($groupForPrint as $key=>$groupForPrintRow){ 
												if(($groupForPrintRow['balance']>0) or ($groupForPrintRow['balance']==0 && $groupForPrintRow['nature']==4)){
													if($groupForPrintRow['name']=="Indirect Expenses"){
													
													} else{?>
												<tr>
													<td><a href="#" role='button' status='close' class="group_name" child='no' parent='yes' group_id='<?php  echo $key; ?>' style='color:black;'>
														<?php echo $groupForPrintRow['name']; ?>
															 </a></td>
													<td align="right">
														<?php if($groupForPrintRow['balance']!=0){
															echo $this->Money->moneyFormatIndia(abs($groupForPrintRow['balance']));
															$LeftTotal+=abs($groupForPrintRow['balance']);
														} ?>
													</td>
												</tr>
												<?php } } ?>
											<?php } ?>
										</tbody>
									</table>
								</td>
								<td>
									<table width="100%">
										<tbody>
											<?php if($openingValue<0) { ?>
												<tr>
													<td>Opening Stock</td>
													<td align="right">
														<?php 
														echo $this->Money->moneyFormatIndia($openingValue);
														$RightTotal+=$openingValue;
														?>
													</td>
												</tr>
											<?php } ?>
											<?php foreach($groupForPrint as $groupForPrintRow){ 
												if(($groupForPrintRow['balance']<0) or ($groupForPrintRow['balance']==0 && $groupForPrintRow['nature']==3)){ 
												if($groupForPrintRow['name']=="Indirect Incomes" ||$groupForPrintRow['name']=="Direct Incomes"){
													} else{
												?>
												<tr>
													<td><a href="#" role='button' status='close' class="group_name" child='no' parent='yes' group_id='<?php  echo $key; ?>' style='color:black;'>
														<?php echo $groupForPrintRow['name']; ?>
															 </a></td>
													<td align="right">
														<?php if($groupForPrintRow['balance']!=0){
															echo $this->Money->moneyFormatIndia(abs($groupForPrintRow['balance'])); 
															$RightTotal+=abs($groupForPrintRow['balance']); 
														} ?>
													</td>
												</tr>
												<?php } } ?>
											<?php } ?>
												<tr>
													<td>Closing Stock</td>
													<td align="right">
														<?php 
														echo $this->Money->moneyFormatIndia($closingValue); 
														$RightTotal+=$closingValue; 
														?>
													</td>
												</tr>
										</tbody>
									</table>
								</td>
							</tr>
							<tr >
								<td>
									<?php 
									$totalDiff=$RightTotal-$LeftTotal;
									if($totalDiff>=0){ ?>
									<table width="100%">
										<tbody>
											<tr>
												<td>Gross Profit</td>
												<td align="right">
													<?php echo $this->Money->moneyFormatIndia($totalDiff); $LeftTotal+=$totalDiff; ?>
												</td>
											</tr>
										</tbody>
									</table>
									<?php } ?>
								</td>
								<td>
									<?php if($totalDiff<0){ ?>
									<table width="100%">
										<tbody>
											<tr>
												<td>Gross Loss</td>
												<td align="right">
													<?php echo $this->Money->moneyFormatIndia(abs($totalDiff)); $RightTotal+=abs($totalDiff); ?>
												</td>
											</tr>
										</tbody>
									</table>
									<?php } ?>
								</td>
							</tr>
							
							
							
						</tbody>
						<tfoot>
							<tr>
								<td>
									<table width="100%">
										<tbody>
											<tr>
												<td><b>Total</b></td>
												<td align="right"><b><?php echo $this->Money->moneyFormatIndia($LeftTotal); ?></b></td>
											</tr>
										</tbody>
									</table>
								</td>
								<td>
									<table width="100%">
										<tbody>
											<tr>
												<td><b>Total</b></td>
												<td align="right"><b><?php echo $this->Money->moneyFormatIndia($RightTotal); ?></b></td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tfoot>
					</table>
					<?php $LeftpnlTotal=0;  $RightpnlTotal=0;  ?>
					<table class="table table-bordered">
						<thead>
							<tr style="background-color: #c4ffbd;">
								<td width="50%">
									<table width="100%">
										<tbody>
											<tr>
												<td><b>Particulars</b></td>
												<td align="right"><b>Balance</b></td>
											</tr>
										</tbody>
									</table>
								</td>
								<td width="50%">
									<table width="100%">
										<tbody>
											<tr>
												<td><b>Particulars</b></td>
												<td align="right"><b>Balance</b></td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<table width="100%">
										<tbody>
											<?php if($totalDiff < 0){ ?>
												<tr>
													<td>Gross Loss</td>
													<td align="right">
														<?php echo $this->Money->moneyFormatIndia(abs($totalDiff)); $LeftpnlTotal+=abs($totalDiff); ?>
													</td>
												</tr>
											<?php } ?>
											<?php foreach($groupForPrint as $key=>$groupForPrintRow){ 
												if(($groupForPrintRow['balance']>0) or ($groupForPrintRow['balance']==0 && $groupForPrintRow['nature']==4)){
												if($groupForPrintRow['name']=="Indirect Expenses"){
													?>
												<tr>
													<td>
													<a href="#" role='button' status='close' class="group_name" child='no' parent='yes' group_id='<?php  echo $key; ?>' style='color:black;'>
														<?php echo $groupForPrintRow['name']; ?>
															 </a>
													</td>
													<td align="right">
														<?php if($groupForPrintRow['balance']!=0){
															echo $this->Money->moneyFormatIndia(abs($groupForPrintRow['balance']));
															$LeftpnlTotal+=abs($groupForPrintRow['balance']);
														} ?>
													</td>
												</tr>
											<?php }} ?>
											<?php } ?>
										</tbody>
									</table>
								</td>
								<td>
									<table width="100%">
										<tbody>
											<?php if($totalDiff > 0){ ?>
												<tr>
													<td>Gross Profit</td>
													<td align="right">
														<?php echo $this->Money->moneyFormatIndia(abs($totalDiff)); $RightpnlTotal+=abs($totalDiff); ?>
													</td>
												</tr>
											<?php } ?>
											<?php foreach($groupForPrint as $key=>$groupForPrintRow){ 
												if(($groupForPrintRow['balance']<0) or ($groupForPrintRow['balance']==0 && $groupForPrintRow['nature']==3)){
												if($groupForPrintRow['name']=="Indirect Incomes" ||$groupForPrintRow['name']=="Direct Incomes"){
													?>
												<tr>
													<td>
													<a href="#" role='button' status='close' class="group_name" child='no' parent='yes' group_id='<?php  echo $key; ?>' style='color:black;'>
														<?php echo $groupForPrintRow['name']; ?>
															 </a>
													</td>
													<td align="right">
														<?php if($groupForPrintRow['balance']!=0){
															echo $this->Money->moneyFormatIndia(abs($groupForPrintRow['balance'])); 
															$RightpnlTotal+=abs($groupForPrintRow['balance']); 
														} ?>
													</td>
												</tr>
												<?php } } ?>
											<?php } ?>
												
										</tbody>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<?php 
									$totalDiff=$RightpnlTotal-$LeftpnlTotal;
									if($totalDiff>=0){ ?>
									<table width="100%">
										<tbody>
											<tr>
												<td>Net Profit</td>
												<td align="right">
													<?php echo $this->Money->moneyFormatIndia($totalDiff); $LeftpnlTotal+=$totalDiff; ?>
												</td>
											</tr>
										</tbody>
									</table>
									<?php } ?>
								</td>
								<td>
									<?php if($totalDiff<0){ ?>
									<table width="100%">
										<tbody>
											<tr>
												<td>Net Loss</td>
												<td align="right">
													<?php echo $this->Money->moneyFormatIndia(abs($totalDiff)); $RightpnlTotal+=abs($totalDiff); ?>
												</td>
											</tr>
										</tbody>
									</table>
									<?php } ?>
								</td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td>
									<table width="100%">
										<tbody>
											<tr>
												<td><b>Total</b></td>
												<td align="right"><b><?php echo $this->Money->moneyFormatIndia($LeftpnlTotal); ?></b></td>
											</tr>
										</tbody>
									</table>
								</td>
								<td>
									<table width="100%">
										<tbody>
											<tr>
												<td><b>Total</b></td>
												<td align="right"><b><?php echo $this->Money->moneyFormatIndia($RightpnlTotal); ?></b></td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
				<?php } ?>
				</ul>
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
	<!-- BEGIN VALIDATEION -->
	<?php echo $this->Html->script('/assets/global/plugins/jquery-validation/js/jquery.validate.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<!-- END VALIDATEION -->

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
	$js="
		$(document).ready(function() {
					$('.group_name').die().live('click',function(e){
				   var current_obj=$(this);
				   var group_id=$(this).attr('group_id');
				   var child=$(this).attr('child');
				   var status=$(this).attr('status');
				   var parent=$(this).attr('parent');
					if(child == 'yes' && status=='open' && parent=='no')
					{
						current_obj.attr('status','open');
						current_obj.attr('child','no');
						current_obj.closest('tr').next().remove();
						
					}else if(status=='open' && parent=='yes')
					{ 
						current_obj.attr('status','close');
						current_obj.attr('child','no');
						current_obj.closest('tr').next().remove();
						
						
					} else{  
						var from_date = $('.from_date').val();
						var to_date = $('.to_date').val(); 
						var url='".$this->Url->build(['controller'=>'AccountingEntries','action'=>'firstSubGroupsPnl']) ."';
						url=url+'/'+group_id +'/'+from_date+'/'+to_date, 
						$.ajax({
							url: url,
						}).done(function(response) { 
							current_obj.attr('status','open');
							current_obj.attr('child','yes');
							 current_obj.addClass('group_a');
							current_obj.closest('tr').find('span').addClass('group_a');
							var a='<tr><td colspan=2>'+response+'</td></tr>';
							$(a).insertAfter(current_obj.closest('tr'));
						});	
					}  
		  
			});	
			ComponentsPickers.init();	
		});
	";
?>
<?php echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom'));  ?>

