<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppNotificationCustomer $appNotificationCustomer
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Notification Customer'), ['action' => 'edit', $appNotificationCustomer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Notification Customer'), ['action' => 'delete', $appNotificationCustomer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appNotificationCustomer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Notification Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Notification Customer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Notifications'), ['controller' => 'AppNotifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Notification'), ['controller' => 'AppNotifications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Customers'), ['controller' => 'AppCustomers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Customer'), ['controller' => 'AppCustomers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appNotificationCustomers view large-9 medium-8 columns content">
    <h3><?= h($appNotificationCustomer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('App Notification') ?></th>
            <td><?= $appNotificationCustomer->has('app_notification') ? $this->Html->link($appNotificationCustomer->app_notification->name, ['controller' => 'AppNotifications', 'action' => 'view', $appNotificationCustomer->app_notification->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('App Customer') ?></th>
            <td><?= $appNotificationCustomer->has('app_customer') ? $this->Html->link($appNotificationCustomer->app_customer->name, ['controller' => 'AppCustomers', 'action' => 'view', $appNotificationCustomer->app_customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appNotificationCustomer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sent') ?></th>
            <td><?= $this->Number->format($appNotificationCustomer->sent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Send On') ?></th>
            <td><?= h($appNotificationCustomer->send_on) ?></td>
        </tr>
    </table>
</div>
