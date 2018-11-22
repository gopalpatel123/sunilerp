<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\DeliveryCharge $deliveryCharge
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Delivery Charge'), ['action' => 'edit', $deliveryCharge->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Delivery Charge'), ['action' => 'delete', $deliveryCharge->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deliveryCharge->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Delivery Charges'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Delivery Charge'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Orders'), ['controller' => 'AppOrders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Order'), ['controller' => 'AppOrders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="deliveryCharges view large-9 medium-8 columns content">
    <h3><?= h($deliveryCharge->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= $deliveryCharge->has('city') ? $this->Html->link($deliveryCharge->city->name, ['controller' => 'Cities', 'action' => 'view', $deliveryCharge->city->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($deliveryCharge->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($deliveryCharge->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($deliveryCharge->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Charge') ?></th>
            <td><?= $this->Number->format($deliveryCharge->charge) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($deliveryCharge->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($deliveryCharge->created_on) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related App Orders') ?></h4>
        <?php if (!empty($deliveryCharge->app_orders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('App Customer Id') ?></th>
                <th scope="col"><?= __('App Customer Address Id') ?></th>
                <th scope="col"><?= __('Customer Address Info') ?></th>
                <th scope="col"><?= __('Order No') ?></th>
                <th scope="col"><?= __('Voucher No') ?></th>
                <th scope="col"><?= __('Ccavvenue Tracking No') ?></th>
                <th scope="col"><?= __('Ccavvenue Order No') ?></th>
                <th scope="col"><?= __('Discount Percent') ?></th>
                <th scope="col"><?= __('Total Gst') ?></th>
                <th scope="col"><?= __('Grand Total') ?></th>
                <th scope="col"><?= __('Round Off') ?></th>
                <th scope="col"><?= __('Delivery Charge Id') ?></th>
                <th scope="col"><?= __('Delivery Charge Amount') ?></th>
                <th scope="col"><?= __('Order Type') ?></th>
                <th scope="col"><?= __('Delivery Date') ?></th>
                <th scope="col"><?= __('Order Status') ?></th>
                <th scope="col"><?= __('Order Date') ?></th>
                <th scope="col"><?= __('Payment Status') ?></th>
                <th scope="col"><?= __('Order From') ?></th>
                <th scope="col"><?= __('Narration') ?></th>
                <th scope="col"><?= __('Packing On') ?></th>
                <th scope="col"><?= __('Packing Flag') ?></th>
                <th scope="col"><?= __('Dispatch On') ?></th>
                <th scope="col"><?= __('Dispatch Flag') ?></th>
                <th scope="col"><?= __('Is Applicable For Cancel') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($deliveryCharge->app_orders as $appOrders): ?>
            <tr>
                <td><?= h($appOrders->id) ?></td>
                <td><?= h($appOrders->app_customer_id) ?></td>
                <td><?= h($appOrders->app_customer_address_id) ?></td>
                <td><?= h($appOrders->customer_address_info) ?></td>
                <td><?= h($appOrders->order_no) ?></td>
                <td><?= h($appOrders->voucher_no) ?></td>
                <td><?= h($appOrders->ccavvenue_tracking_no) ?></td>
                <td><?= h($appOrders->ccavvenue_order_no) ?></td>
                <td><?= h($appOrders->discount_percent) ?></td>
                <td><?= h($appOrders->total_gst) ?></td>
                <td><?= h($appOrders->grand_total) ?></td>
                <td><?= h($appOrders->round_off) ?></td>
                <td><?= h($appOrders->delivery_charge_id) ?></td>
                <td><?= h($appOrders->delivery_charge_amount) ?></td>
                <td><?= h($appOrders->order_type) ?></td>
                <td><?= h($appOrders->delivery_date) ?></td>
                <td><?= h($appOrders->order_status) ?></td>
                <td><?= h($appOrders->order_date) ?></td>
                <td><?= h($appOrders->payment_status) ?></td>
                <td><?= h($appOrders->order_from) ?></td>
                <td><?= h($appOrders->narration) ?></td>
                <td><?= h($appOrders->packing_on) ?></td>
                <td><?= h($appOrders->packing_flag) ?></td>
                <td><?= h($appOrders->dispatch_on) ?></td>
                <td><?= h($appOrders->dispatch_flag) ?></td>
                <td><?= h($appOrders->is_applicable_for_cancel) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AppOrders', 'action' => 'view', $appOrders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AppOrders', 'action' => 'edit', $appOrders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AppOrders', 'action' => 'delete', $appOrders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appOrders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
