<div class="row">
	<div class="col-md-12">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-sharp hide"></i>
					<span class="caption-subject font-green-sharp bold ">App Home Screen</span>
				</div>
				<div class="pull-right">
					<div class="row">	
						<div class="col-md-12">	
							<a href="<?php echo $this->Url->build(['action'=>'add']) ?>" target="_blank"><button type="submit" class="go btn blue-madison input-sm" style="margin-bottom: -20px;">Add</button></a>
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
			<?php $page_no=$this->Paginator->current('appHomeScreens');
					 $page_no=($page_no-1)*100; 
									?>				
				<table class="table table-condensed table-hover table-bordered">
					<thead>
						<tr>
							<th scope="col"><?= $this->Paginator->sort('Sr') ?></th>
							<th scope="col"><?= $this->Paginator->sort('Title') ?></th>
							<th scope="col"><?= $this->Paginator->sort('Category') ?></th>
							<th scope="col"><?= $this->Paginator->sort('Layout') ?></th>
							<th scope="col"><?= $this->Paginator->sort('Activate') ?></th>
							<th scope="col" class="actions"><?= __('Actions') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($appHomeScreens as $apphomescreen): ?>
						<tr>
							<td><?= h(++$page_no) ?></td>
							<td><?= h($apphomescreen->title) ?></td>
							<td><?= h($apphomescreen->stock_group->name) ?></td>
							<td><?= h($apphomescreen->layout) ?></td>
							<td><?= h($apphomescreen->section_show) ?></td>
							<td class="actions">
							<?php if (in_array("57", $userPages)){?>
								<?= $this->Html->link(__('Edit'), ['action' => 'edit', $apphomescreen->id]) ?>
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