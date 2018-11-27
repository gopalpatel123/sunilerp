
<?php
/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 */
$this->set('title', 'App Brands');
?>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-sharp hide"></i>
					<span class="caption-subject font-green-sharp bold ">App Brands</span>
				</div>
				<div class="pull-right">
					<div class="row">	
						<div class="col-md-12">	
							<a href="<?php echo $this->url->build(['action'=>'add']) ?>" target="_blank"><button type="submit" class="go btn blue-madison input-sm" style="margin-bottom: -20px;">Add</button></a>
						</div>
					</div>		
				</div>
			</div>
			<div class="portlet-body">
				
				<table class="table table-bordered table-hover table-condensed">
					<thead>
						<tr>
							<th scope="col"><?= $this->Paginator->sort('Sr.no') ?></th>
							<th scope="col"><?= $this->Paginator->sort('Name') ?></th>
							<th scope="col"><?= $this->Paginator->sort('Status') ?></th>
							<th scope="col"><?= $this->Paginator->sort('Discount') ?></th>
							<th scope="col"><?= $this->Paginator->sort('Image') ?></th>
							<th scope="col" class="actions"><?= __('Actions') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php  $i=0; foreach ($appBrands as $appBrand): ?>
						
						<tr>
							<td><?= h(++$i) ?></td>
							<td><?= h($appBrand->name) ?></td>
							<td><?= h($appBrand->status) ?></td>
							<td><?= h($appBrand->discount) ?></td>
							
							<td>
							<?php
							
							$result=$awsFileLoad->cdnpath();
							echo $this->Html->image($result.'/'.$appBrand->brand_image,['class'=>'img-responsive','style'=>'height: 50px; width:50px','id'=>'imgshw1']); ?>
							</td>
							<td class="actions">
								
								<?= $this->Html->link(__('Edit'), ['action' => 'edit', $appBrand->id]) ?>
								<?php //$this->Form->postLink(__('Delete'), ['action' => 'delete', $appBrand->id], ['confirm' => __('Are you sure you want to delete ?', $appBrand->id)]) ?>
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

