<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List App Orders'), ['action' => 'index']) ?></li>
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
<div class="appOrders form large-9 medium-8 columns content">
    <?= $this->Form->create($appOrder) ?>
    <fieldset>
        <legend><?= __('Add App Order') ?></legend>
        <?php
            echo $this->Form->control('app_customer_id', ['options' => $appCustomers]);
            echo $this->Form->control('app_customer_address_id', ['options' => $appCustomerAddresses]);
            echo $this->Form->control('customer_address_info');
            echo $this->Form->control('order_no');
            echo $this->Form->control('voucher_no');
            echo $this->Form->control('ccavvenue_tracking_no');
            echo $this->Form->control('ccavvenue_order_no');
            echo $this->Form->control('discount_percent');
            echo $this->Form->control('total_gst');
            echo $this->Form->control('grand_total');
            echo $this->Form->control('round_off');
            echo $this->Form->control('delivery_charge_id', ['options' => $deliveryCharges]);
            echo $this->Form->control('delivery_charge_amount');
            echo $this->Form->control('order_type');
            echo $this->Form->control('delivery_date');
            echo $this->Form->control('order_status');
            echo $this->Form->control('order_date');
            echo $this->Form->control('payment_status');
            echo $this->Form->control('order_from');
            echo $this->Form->control('narration');
            echo $this->Form->control('packing_on');
            echo $this->Form->control('packing_flag');
            echo $this->Form->control('dispatch_on');
            echo $this->Form->control('dispatch_flag');
            echo $this->Form->control('is_applicable_for_cancel');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
