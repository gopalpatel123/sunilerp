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
                ['action' => 'delete', $appWishList->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $appWishList->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List App Wish Lists'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List App Customers'), ['controller' => 'AppCustomers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Customer'), ['controller' => 'AppCustomers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Notifications'), ['controller' => 'AppNotifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Notification'), ['controller' => 'AppNotifications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appWishLists form large-9 medium-8 columns content">
    <?= $this->Form->create($appWishList) ?>
    <fieldset>
        <legend><?= __('Edit App Wish List') ?></legend>
        <?php
            echo $this->Form->control('app_customer_id', ['options' => $appCustomers]);
            echo $this->Form->control('created_on');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
