<?php
/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 */
$this->set('title', 'App Promotions');
?>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-sharp hide"></i>
					<span class="caption-subject font-green-sharp bold ">App Promotions</span>
				</div>
				<div class="pull-right">
					<div class="row">	
						<div class="col-md-12">	
							<a href="<?php echo $this->url->build(['action'=>'add']) ?>" target="_blank"><button type="submit" class="go btn blue-madison input-sm" style="margin-bottom: -20px;">Add</button></a>
						</div>
					</div>		
				</div>
				<div class="actions">
					<form method="GET" id="">
						<div class="row">
							<div class="col-md-9">
								<?php echo $this->Form->input('search',['class'=>'form-control input-sm pull-right','label'=>false, 'placeholder'=>'Search','autofocus'=>'autofocus','value'=> @$search]);
								?>
							</div>
							<div class="col-md-1">
								<button type="submit" class="go btn blue-madison input-sm">Go</button>
							</div> 
						</div>
					</form>
				</div>
			</div>
			<div class="portlet-body">
			<?php $page_no=$this->Paginator->current('appPromotions');
					 $page_no=($page_no-1)*100; 
									?>				
				<table class="table table-condensed table-hover table-bordered">
					<thead>
						<tr>
							<th scope="col"><?= $this->Paginator->sort('Sr') ?></th>
							<th scope="col"><?= $this->Paginator->sort('Offer Name') ?></th>
							<th scope="col"><?= $this->Paginator->sort('Start Date') ?></th>
							<th scope="col"><?= $this->Paginator->sort('End Date') ?></th>
							<th scope="col"><?= $this->Paginator->sort('Status') ?></th>
							<th scope="col" class="actions"><?= __('Actions') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($appPromotions as $apppromotion): ?>
						<tr>
							<td><?= h(++$page_no) ?></td>
							<td><?= h($apppromotion->offer_name) ?></td>
							<td><?= h(date('d-m-Y',strtotime($apppromotion->start_date)))?></td>
							<td><?= h(date('d-m-Y',strtotime($apppromotion->end_date)))?></td>
							<td><?= h($apppromotion->status) ?></td>
							<td class="actions">
							<?php if (in_array("57", $userPages)){?>
								<?= $this->Html->link(__('View'), ['action' => 'view', $apppromotion->id]) ?>
								<?php }?>
							<?php if (in_array("57", $userPages)){?>
								<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $apppromotion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apppromotion->id)]) ?>
								
								<?php }?>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<div class="paginator">
					<ul class="pagination">
						<?= $this->Paginator->first('<< ' . __('first')) ?>
						<?= $this->Paginator->prev('< ' . __('previous')) ?>
						<?= $this->Paginator->numbers() ?>
						<?= $this->Paginator->next(__('next') . ' >') ?>
						<?= $this->Paginator->last(__('last') . ' >>') ?>
					</ul>
					<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
				</div>
			</div>
		</div>
	</div>
</div>