<?php
/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 */
$this->set('title', 'View');
?>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-9">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-sharp hide"></i>
					<span class="caption-subject font-green-sharp bold ">Promotion Details</span>
				</div>
			</div>
			<div class="portlet-body">
				<div class="row">
					<div class="col-md-6">
						<label>Offer Name:<?php echo $appPromotion->offer_name; ?></label>
					</div>
					<div class="col-md-6 form-group">
						<label>Status: <?php echo $appPromotion->status; ?></label>
					</div>
				</div>
				<div class="row">	
					<div class="col-md-6 form-group">
						<label>Valid From: <?php echo date('d-m-Y',strtotime($appPromotion->start_date)); ?></label>
					</div>
					<div class="col-md-6 form-group">
						<label>Valid To: <?php echo date('d-m-Y',strtotime($appPromotion->end_date)); ?></label>
					</div>
				</div>
				<div class="row">	
					<div class="col-md-6 form-group">
						<label>Description: <?php echo $appPromotion->description; ?></label>
					</div>
					<div class="col-md-6 form-group">
						<label>Created On: <?php echo date('d-m-Y',strtotime($appPromotion->created_on)); ?></label>
					</div>
				</div>	
				<br>
				<div class="row">
					<div class="table-responsive">
					<?php if (!empty($appPromotion->app_promotion_details)): 
					//pr($grn->grn_rows);exit;
					?>
						<table id="main_table" class="table table-condensed table-bordered" style="margin-bottom: 4px;" width="100%">
							<thead>
								<tr>
									<td><label>Coupon<label></td>
									<td><label>Category<label></td>
									<td><label>Item<label></td>
									<td><label>Dis Per<label></td>
									<td><label>Dis Amt<label></td>
									<td><label>Max Order Value<label></td>
									<td><label>Cash Back<label></td>
									<td><label>Free Shipping<label></td>
								</tr>
							</thead>
							<tbody id='main_tbody' class="tab">
								<?php
								foreach ($appPromotion->app_promotion_details as $app_promotion_detail): 
								
								?>
								<tr class="main_tr" class="tab">
									<td><?= h($app_promotion_detail->coupon_name) ?></td>
									<td><?= h($app_promotion_detail->stock_group->name) ?></td>
									<td><?= h($app_promotion_detail->item->name) ?></td>
									<td><?= h($app_promotion_detail->discount_in_percentage) ?></td>
									<td><?= h($app_promotion_detail->discount_in_amount) ?></td>
									<td><?= h($app_promotion_detail->discount_of_max_amount) ?></td>
									<td><?= h($app_promotion_detail->cash_back) ?></td>
									<td><?= h($app_promotion_detail->is_free_shipping) ?></td>
									
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
