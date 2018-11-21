<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List App Customer Addresses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List App Customers'), ['controller' => 'AppCustomers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Customer'), ['controller' => 'AppCustomers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Orders'), ['controller' => 'AppOrders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Order'), ['controller' => 'AppOrders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appCustomerAddresses form large-9 medium-8 columns content">
    <?= $this->Form->create($appCustomerAddress) ?>
    <fieldset>
        <legend><?= __('Add App Customer Address') ?></legend>
        <?php
            echo $this->Form->control('app_customer_id', ['options' => $appCustomers]);
            echo $this->Form->control('name');
            echo $this->Form->control('address_type');
            echo $this->Form->control('mobile_no');
            echo $this->Form->control('address');
            echo $this->Form->control('area');
            echo $this->Form->control('state_id', ['options' => $states]);
            echo $this->Form->control('city_id', ['options' => $cities]);
            echo $this->Form->control('country');
            echo $this->Form->control('pincode');
            echo $this->Form->control('latitude');
            echo $this->Form->control('longitude');
            echo $this->Form->control('default_address');
            echo $this->Form->control('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
