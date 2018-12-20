<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppNotification $appNotification
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Notification'), ['action' => 'edit', $appNotification->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Notification'), ['action' => 'delete', $appNotification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appNotification->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Notifications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Notification'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Wish Lists'), ['controller' => 'AppWishLists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Wish List'), ['controller' => 'AppWishLists', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stock Groups'), ['controller' => 'StockGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stock Group'), ['controller' => 'StockGroups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Notification Customers'), ['controller' => 'AppNotificationCustomers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Notification Customer'), ['controller' => 'AppNotificationCustomers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appNotifications view large-9 medium-8 columns content">
    <h3><?= h($appNotification->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($appNotification->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image App') ?></th>
            <td><?= h($appNotification->image_app) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('App Link') ?></th>
            <td><?= h($appNotification->app_link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($appNotification->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $appNotification->has('item') ? $this->Html->link($appNotification->item->name, ['controller' => 'Items', 'action' => 'view', $appNotification->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('App Wish List') ?></th>
            <td><?= $appNotification->has('app_wish_list') ? $this->Html->link($appNotification->app_wish_list->id, ['controller' => 'AppWishLists', 'action' => 'view', $appNotification->app_wish_list->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stock Group') ?></th>
            <td><?= $appNotification->has('stock_group') ? $this->Html->link($appNotification->stock_group->name, ['controller' => 'StockGroups', 'action' => 'view', $appNotification->stock_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Screen Type') ?></th>
            <td><?= h($appNotification->screen_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Notification Type') ?></th>
            <td><?= h($appNotification->notification_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appNotification->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($appNotification->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($appNotification->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($appNotification->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($appNotification->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($appNotification->edited_on) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Message') ?></h4>
        <?= $this->Text->autoParagraph(h($appNotification->message)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related App Notification Customers') ?></h4>
        <?php if (!empty($appNotification->app_notification_customers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('App Notification Id') ?></th>
                <th scope="col"><?= __('App Customer Id') ?></th>
                <th scope="col"><?= __('Sent') ?></th>
                <th scope="col"><?= __('Send On') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($appNotification->app_notification_customers as $appNotificationCustomers): ?>
            <tr>
                <td><?= h($appNotificationCustomers->id) ?></td>
                <td><?= h($appNotificationCustomers->app_notification_id) ?></td>
                <td><?= h($appNotificationCustomers->app_customer_id) ?></td>
                <td><?= h($appNotificationCustomers->sent) ?></td>
                <td><?= h($appNotificationCustomers->send_on) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AppNotificationCustomers', 'action' => 'view', $appNotificationCustomers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AppNotificationCustomers', 'action' => 'edit', $appNotificationCustomers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AppNotificationCustomers', 'action' => 'delete', $appNotificationCustomers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appNotificationCustomers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
