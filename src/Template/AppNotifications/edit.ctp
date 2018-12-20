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
                ['action' => 'delete', $appNotification->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $appNotification->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List App Notifications'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Wish Lists'), ['controller' => 'AppWishLists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Wish List'), ['controller' => 'AppWishLists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stock Groups'), ['controller' => 'StockGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stock Group'), ['controller' => 'StockGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Notification Customers'), ['controller' => 'AppNotificationCustomers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Notification Customer'), ['controller' => 'AppNotificationCustomers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appNotifications form large-9 medium-8 columns content">
    <?= $this->Form->create($appNotification) ?>
    <fieldset>
        <legend><?= __('Edit App Notification') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('message');
            echo $this->Form->control('image_app');
            echo $this->Form->control('app_link');
            echo $this->Form->control('name');
            echo $this->Form->control('item_id', ['options' => $items]);
            echo $this->Form->control('app_wish_list_id', ['options' => $appWishLists]);
            echo $this->Form->control('stock_group_id', ['options' => $stockGroups]);
            echo $this->Form->control('screen_type');
            echo $this->Form->control('created_by');
            echo $this->Form->control('created_on');
            echo $this->Form->control('edited_by');
            echo $this->Form->control('edited_on');
            echo $this->Form->control('status');
            echo $this->Form->control('notification_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
