<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $appCustomer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $appCustomer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List App Customers'), ['action' => 'index']) ?></li>
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
<div class="appCustomers form large-9 medium-8 columns content">
    <?= $this->Form->create($appCustomer) ?>
    <fieldset>
        <legend><?= __('Edit App Customer') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('mobile');
            echo $this->Form->control('email');
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('otp');
            echo $this->Form->control('created_on');
            echo $this->Form->control('mobile_verify');
            echo $this->Form->control('status');
            echo $this->Form->control('image_url');
            echo $this->Form->control('social_type');
            echo $this->Form->control('device_token');
            echo $this->Form->control('social_image');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
