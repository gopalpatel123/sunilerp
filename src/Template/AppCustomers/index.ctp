<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppCustomer[]|\Cake\Collection\CollectionInterface $appCustomers
  */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Customer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Customer Addresses'), ['controller' => 'AppCustomerAddresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Customer Address'), ['controller' => 'AppCustomerAddresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Notification Customers'), ['controller' => 'AppNotificationCustomers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Notification Customer'), ['controller' => 'AppNotificationCustomers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Orders'), ['controller' => 'AppOrders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Order'), ['controller' => 'AppOrders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Wish Lists'), ['controller' => 'AppWishLists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Wish List'), ['controller' => 'AppWishLists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Carts'), ['controller' => 'Carts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cart'), ['controller' => 'Carts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Item Review Ratings'), ['controller' => 'ItemReviewRatings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item Review Rating'), ['controller' => 'ItemReviewRatings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appCustomers index large-9 medium-8 columns content">
    <h3><?= __('App Customers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('otp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile_verify') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('social_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('device_token') ?></th>
                <th scope="col"><?= $this->Paginator->sort('social_image') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appCustomers as $appCustomer): ?>
            <tr>
                <td><?= $this->Number->format($appCustomer->id) ?></td>
                <td><?= h($appCustomer->name) ?></td>
                <td><?= h($appCustomer->mobile) ?></td>
                <td><?= h($appCustomer->email) ?></td>
                <td><?= h($appCustomer->username) ?></td>
                <td><?= h($appCustomer->password) ?></td>
                <td><?= h($appCustomer->otp) ?></td>
                <td><?= h($appCustomer->created_on) ?></td>
                <td><?= h($appCustomer->mobile_verify) ?></td>
                <td><?= h($appCustomer->status) ?></td>
                <td><?= h($appCustomer->image_url) ?></td>
                <td><?= h($appCustomer->social_type) ?></td>
                <td><?= h($appCustomer->device_token) ?></td>
                <td><?= h($appCustomer->social_image) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appCustomer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appCustomer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appCustomer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appCustomer->id)]) ?>
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
$this->set('title', 'Customers');
?>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-sharp hide"></i>
					<span class="caption-subject font-green-sharp bold ">App Menus</span>
				</div>
				
			</div>
			<div class="portlet-body">
				<?php $page_no=$this->Paginator->current('Customers'); $page_no=($page_no-1)*100; ?>
				<table class="table table-bordered table-hover table-condensed">
					<thead>
						<tr>
							<th scope="col" class="actions"><?= __('Sr') ?></th>
							<th scope="col"><?= $this->Paginator->sort('name') ?></th>
							<th scope="col"><?= $this->Paginator->sort('Link') ?></th>
							<th scope="col"><?= $this->Paginator->sort('Parent') ?></th>
							
							<th scope="col"><?= $this->Paginator->sort('Title Content') ?></th>
							<th scope="col" class="actions"><?= __('Actions') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($customers as $customer): ?>
						<tr>
							<td><?= h(++$page_no) ?></td>
							<td><?= h(str_pad($customer->customer_id, 4, '0', STR_PAD_LEFT).' - '.$customer->name) ?></td>
							<td><?= h($customer->state->name) ?></td>
							<td><?= $customer->gstin ?></td>
							<td><?= h($customer->email) ?></td>
							<td><?= h($customer->mobile) ?></td>
							<td class="actions">
							<?php if (in_array("78", $userPages)){?>
								<?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id]) ?>
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



