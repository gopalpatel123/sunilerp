<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppBrand[]|\Cake\Collection\CollectionInterface $appBrands
  */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Brand'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appBrands index large-9 medium-8 columns content">
    <h3><?= __('App Brands') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('brand_image') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appBrands as $appBrand): ?>
            <tr>
                <td><?= $this->Number->format($appBrand->id) ?></td>
                <td><?= h($appBrand->name) ?></td>
                <td><?= h($appBrand->status) ?></td>
                <td><?= $this->Number->format($appBrand->discount) ?></td>
                <td><?= $this->Number->format($appBrand->created_by) ?></td>
                <td><?= h($appBrand->created_on) ?></td>
                <td><?= h($appBrand->brand_image) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appBrand->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appBrand->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appBrand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appBrand->id)]) ?>
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
</div>-->


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

