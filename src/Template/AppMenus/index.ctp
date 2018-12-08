<?php
/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 */
$this->set('title', 'App Menus');
?>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-sharp hide"></i>
					<span class="caption-subject font-green-sharp bold ">App Menus</span>
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
							<th scope="col"><?= $this->Paginator->sort('link') ?></th>
							<th scope="col"><?= $this->Paginator->sort('Title content') ?></th>
							<th scope="col"><?= $this->Paginator->sort('Status') ?></th>
							<th scope="col" class="actions"><?= __('Actions') ?></th>
						</tr>
					</thead>
					<tbody>
					
						 <?php $i=0;  foreach ($appMenus as $appMenu): ?>
						<tr>
							<td><?= h(++$i) ?></td>
							<td><?= h($appMenu->name) ?></td>
							<td><?= h($appMenu->link) ?></td>
							<td><?= h($appMenu->title_content) ?></td>
							<td><?= h($appMenu->status) ?></td>
							<td class="actions">
								
								<?= $this->Html->link(__('Edit'), ['action' => 'edit', $appMenu->id]) ?>
								<!--<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appMenu->id], ['confirm' => __('Are you sure you want to delete ?', $appMenu->id)]) ?>-->
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


