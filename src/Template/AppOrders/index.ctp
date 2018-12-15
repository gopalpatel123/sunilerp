<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppOrder[]|\Cake\Collection\CollectionInterface $appOrders
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Order'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Customers'), ['controller' => 'AppCustomers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Customer'), ['controller' => 'AppCustomers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Customer Addresses'), ['controller' => 'AppCustomerAddresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Customer Address'), ['controller' => 'AppCustomerAddresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Delivery Charges'), ['controller' => 'DeliveryCharges', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Delivery Charge'), ['controller' => 'DeliveryCharges', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Order Details'), ['controller' => 'AppOrderDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Order Detail'), ['controller' => 'AppOrderDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appOrders index large-9 medium-8 columns content">
    <h3><?= __('App Orders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('app_customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('app_customer_address_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('voucher_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ccavvenue_tracking_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ccavvenue_order_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount_percent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_gst') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grand_total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('round_off') ?></th>
                <th scope="col"><?= $this->Paginator->sort('delivery_charge_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('delivery_charge_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('delivery_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payment_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_from') ?></th>
                <th scope="col"><?= $this->Paginator->sort('packing_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('packing_flag') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dispatch_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dispatch_flag') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_applicable_for_cancel') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appOrders as $appOrder): ?>
            <tr>
                <td><?= $this->Number->format($appOrder->id) ?></td>
                <td><?= $appOrder->has('app_customer') ? $this->Html->link($appOrder->app_customer->name, ['controller' => 'AppCustomers', 'action' => 'view', $appOrder->app_customer->id]) : '' ?></td>
                <td><?= $appOrder->has('app_customer_address') ? $this->Html->link($appOrder->app_customer_address->name, ['controller' => 'AppCustomerAddresses', 'action' => 'view', $appOrder->app_customer_address->id]) : '' ?></td>
                <td><?= h($appOrder->order_no) ?></td>
                <td><?= $this->Number->format($appOrder->voucher_no) ?></td>
                <td><?= h($appOrder->ccavvenue_tracking_no) ?></td>
                <td><?= h($appOrder->ccavvenue_order_no) ?></td>
                <td><?= $this->Number->format($appOrder->discount_percent) ?></td>
                <td><?= $this->Number->format($appOrder->total_gst) ?></td>
                <td><?= $this->Number->format($appOrder->grand_total) ?></td>
                <td><?= $this->Number->format($appOrder->round_off) ?></td>
                <td><?= $appOrder->has('delivery_charge') ? $this->Html->link($appOrder->delivery_charge->id, ['controller' => 'DeliveryCharges', 'action' => 'view', $appOrder->delivery_charge->id]) : '' ?></td>
                <td><?= h($appOrder->delivery_charge_amount) ?></td>
                <td><?= h($appOrder->order_type) ?></td>
                <td><?= h($appOrder->delivery_date) ?></td>
                <td><?= h($appOrder->order_status) ?></td>
                <td><?= h($appOrder->order_date) ?></td>
                <td><?= h($appOrder->payment_status) ?></td>
                <td><?= h($appOrder->order_from) ?></td>
                <td><?= h($appOrder->packing_on) ?></td>
                <td><?= h($appOrder->packing_flag) ?></td>
                <td><?= h($appOrder->dispatch_on) ?></td>
                <td><?= h($appOrder->dispatch_flag) ?></td>
                <td><?= h($appOrder->is_applicable_for_cancel) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appOrder->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appOrder->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appOrder->id)]) ?>
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
