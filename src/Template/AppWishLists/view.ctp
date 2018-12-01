<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppWishList $appWishList
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Wish List'), ['action' => 'edit', $appWishList->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Wish List'), ['action' => 'delete', $appWishList->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appWishList->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Wish Lists'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Wish List'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Customers'), ['controller' => 'AppCustomers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Customer'), ['controller' => 'AppCustomers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Notifications'), ['controller' => 'AppNotifications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Notification'), ['controller' => 'AppNotifications', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appWishLists view large-9 medium-8 columns content">
    <h3><?= h($appWishList->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('App Customer') ?></th>
            <td><?= $appWishList->has('app_customer') ? $this->Html->link($appWishList->app_customer->name, ['controller' => 'AppCustomers', 'action' => 'view', $appWishList->app_customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appWishList->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($appWishList->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($appWishList->created_on) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related App Notifications') ?></h4>
        <?php if (!empty($appWishList->app_notifications)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Image App') ?></th>
                <th scope="col"><?= __('App Link') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('App Wish List Id') ?></th>
                <th scope="col"><?= __('Stock Group Id') ?></th>
                <th scope="col"><?= __('Screen Type') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Edited By') ?></th>
                <th scope="col"><?= __('Edited On') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Notification Type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($appWishList->app_notifications as $appNotifications): ?>
            <tr>
                <td><?= h($appNotifications->id) ?></td>
                <td><?= h($appNotifications->title) ?></td>
                <td><?= h($appNotifications->message) ?></td>
                <td><?= h($appNotifications->image_app) ?></td>
                <td><?= h($appNotifications->app_link) ?></td>
                <td><?= h($appNotifications->name) ?></td>
                <td><?= h($appNotifications->item_id) ?></td>
                <td><?= h($appNotifications->app_wish_list_id) ?></td>
                <td><?= h($appNotifications->stock_group_id) ?></td>
                <td><?= h($appNotifications->screen_type) ?></td>
                <td><?= h($appNotifications->created_by) ?></td>
                <td><?= h($appNotifications->created_on) ?></td>
                <td><?= h($appNotifications->edited_by) ?></td>
                <td><?= h($appNotifications->edited_on) ?></td>
                <td><?= h($appNotifications->status) ?></td>
                <td><?= h($appNotifications->notification_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AppNotifications', 'action' => 'view', $appNotifications->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AppNotifications', 'action' => 'edit', $appNotifications->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AppNotifications', 'action' => 'delete', $appNotifications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appNotifications->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
