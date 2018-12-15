<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppOrder $appOrder
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Order'), ['action' => 'edit', $appOrder->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Order'), ['action' => 'delete', $appOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appOrder->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Order'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Customers'), ['controller' => 'AppCustomers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Customer'), ['controller' => 'AppCustomers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Customer Addresses'), ['controller' => 'AppCustomerAddresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Customer Address'), ['controller' => 'AppCustomerAddresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Delivery Charges'), ['controller' => 'DeliveryCharges', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Delivery Charge'), ['controller' => 'DeliveryCharges', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Order Details'), ['controller' => 'AppOrderDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Order Detail'), ['controller' => 'AppOrderDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appOrders view large-9 medium-8 columns content">
    <h3><?= h($appOrder->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('App Customer') ?></th>
            <td><?= $appOrder->has('app_customer') ? $this->Html->link($appOrder->app_customer->name, ['controller' => 'AppCustomers', 'action' => 'view', $appOrder->app_customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('App Customer Address') ?></th>
            <td><?= $appOrder->has('app_customer_address') ? $this->Html->link($appOrder->app_customer_address->name, ['controller' => 'AppCustomerAddresses', 'action' => 'view', $appOrder->app_customer_address->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order No') ?></th>
            <td><?= h($appOrder->order_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ccavvenue Tracking No') ?></th>
            <td><?= h($appOrder->ccavvenue_tracking_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ccavvenue Order No') ?></th>
            <td><?= h($appOrder->ccavvenue_order_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Delivery Charge') ?></th>
            <td><?= $appOrder->has('delivery_charge') ? $this->Html->link($appOrder->delivery_charge->id, ['controller' => 'DeliveryCharges', 'action' => 'view', $appOrder->delivery_charge->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Delivery Charge Amount') ?></th>
            <td><?= h($appOrder->delivery_charge_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Type') ?></th>
            <td><?= h($appOrder->order_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Status') ?></th>
            <td><?= h($appOrder->order_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Status') ?></th>
            <td><?= h($appOrder->payment_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order From') ?></th>
            <td><?= h($appOrder->order_from) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Packing Flag') ?></th>
            <td><?= h($appOrder->packing_flag) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dispatch Flag') ?></th>
            <td><?= h($appOrder->dispatch_flag) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Applicable For Cancel') ?></th>
            <td><?= h($appOrder->is_applicable_for_cancel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appOrder->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Voucher No') ?></th>
            <td><?= $this->Number->format($appOrder->voucher_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount Percent') ?></th>
            <td><?= $this->Number->format($appOrder->discount_percent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Gst') ?></th>
            <td><?= $this->Number->format($appOrder->total_gst) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Grand Total') ?></th>
            <td><?= $this->Number->format($appOrder->grand_total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Round Off') ?></th>
            <td><?= $this->Number->format($appOrder->round_off) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Delivery Date') ?></th>
            <td><?= h($appOrder->delivery_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Date') ?></th>
            <td><?= h($appOrder->order_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Packing On') ?></th>
            <td><?= h($appOrder->packing_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dispatch On') ?></th>
            <td><?= h($appOrder->dispatch_on) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Customer Address Info') ?></h4>
        <?= $this->Text->autoParagraph(h($appOrder->customer_address_info)); ?>
    </div>
    <div class="row">
        <h4><?= __('Narration') ?></h4>
        <?= $this->Text->autoParagraph(h($appOrder->narration)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related App Order Details') ?></h4>
        <?php if (!empty($appOrder->app_order_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('App Order Id') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Rate') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Discount Percent') ?></th>
                <th scope="col"><?= __('Discount Amount') ?></th>
                <th scope="col"><?= __('Promo Percent') ?></th>
                <th scope="col"><?= __('Promo Amount') ?></th>
                <th scope="col"><?= __('Taxable Value') ?></th>
                <th scope="col"><?= __('Gst Percentage') ?></th>
                <th scope="col"><?= __('Gst Figure Id') ?></th>
                <th scope="col"><?= __('Gst Value') ?></th>
                <th scope="col"><?= __('Net Amount') ?></th>
                <th scope="col"><?= __('Is Item Cancel') ?></th>
                <th scope="col"><?= __('Item Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($appOrder->app_order_details as $appOrderDetails): ?>
            <tr>
                <td><?= h($appOrderDetails->id) ?></td>
                <td><?= h($appOrderDetails->app_order_id) ?></td>
                <td><?= h($appOrderDetails->item_id) ?></td>
                <td><?= h($appOrderDetails->quantity) ?></td>
                <td><?= h($appOrderDetails->rate) ?></td>
                <td><?= h($appOrderDetails->amount) ?></td>
                <td><?= h($appOrderDetails->discount_percent) ?></td>
                <td><?= h($appOrderDetails->discount_amount) ?></td>
                <td><?= h($appOrderDetails->promo_percent) ?></td>
                <td><?= h($appOrderDetails->promo_amount) ?></td>
                <td><?= h($appOrderDetails->taxable_value) ?></td>
                <td><?= h($appOrderDetails->gst_percentage) ?></td>
                <td><?= h($appOrderDetails->gst_figure_id) ?></td>
                <td><?= h($appOrderDetails->gst_value) ?></td>
                <td><?= h($appOrderDetails->net_amount) ?></td>
                <td><?= h($appOrderDetails->is_item_cancel) ?></td>
                <td><?= h($appOrderDetails->item_status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AppOrderDetails', 'action' => 'view', $appOrderDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AppOrderDetails', 'action' => 'edit', $appOrderDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AppOrderDetails', 'action' => 'delete', $appOrderDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appOrderDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
