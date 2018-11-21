<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppCustomerAddress $appCustomerAddress
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Customer Address'), ['action' => 'edit', $appCustomerAddress->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Customer Address'), ['action' => 'delete', $appCustomerAddress->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appCustomerAddress->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Customer Addresses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Customer Address'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Customers'), ['controller' => 'AppCustomers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Customer'), ['controller' => 'AppCustomers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Orders'), ['controller' => 'AppOrders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Order'), ['controller' => 'AppOrders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appCustomerAddresses view large-9 medium-8 columns content">
    <h3><?= h($appCustomerAddress->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('App Customer') ?></th>
            <td><?= $appCustomerAddress->has('app_customer') ? $this->Html->link($appCustomerAddress->app_customer->name, ['controller' => 'AppCustomers', 'action' => 'view', $appCustomerAddress->app_customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($appCustomerAddress->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address Type') ?></th>
            <td><?= h($appCustomerAddress->address_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile No') ?></th>
            <td><?= h($appCustomerAddress->mobile_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Area') ?></th>
            <td><?= h($appCustomerAddress->area) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= $appCustomerAddress->has('state') ? $this->Html->link($appCustomerAddress->state->name, ['controller' => 'States', 'action' => 'view', $appCustomerAddress->state->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= $appCustomerAddress->has('city') ? $this->Html->link($appCustomerAddress->city->name, ['controller' => 'Cities', 'action' => 'view', $appCustomerAddress->city->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($appCustomerAddress->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pincode') ?></th>
            <td><?= h($appCustomerAddress->pincode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Latitude') ?></th>
            <td><?= h($appCustomerAddress->latitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Longitude') ?></th>
            <td><?= h($appCustomerAddress->longitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appCustomerAddress->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Default Address') ?></th>
            <td><?= $this->Number->format($appCustomerAddress->default_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($appCustomerAddress->is_deleted) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($appCustomerAddress->address)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related App Orders') ?></h4>
        <?php if (!empty($appCustomerAddress->app_orders)): ?>
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
            <?php foreach ($appCustomerAddress->app_orders as $appOrders): ?>
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
