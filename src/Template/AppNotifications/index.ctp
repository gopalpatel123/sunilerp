<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppNotification[]|\Cake\Collection\CollectionInterface $appNotifications
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Notification'), ['action' => 'add']) ?></li>
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
<div class="appNotifications index large-9 medium-8 columns content">
    <h3><?= __('App Notifications') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_app') ?></th>
                <th scope="col"><?= $this->Paginator->sort('app_link') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('app_wish_list_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stock_group_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('screen_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('edited_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('edited_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('notification_type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appNotifications as $appNotification): ?>
            <tr>
                <td><?= $this->Number->format($appNotification->id) ?></td>
                <td><?= h($appNotification->title) ?></td>
                <td><?= h($appNotification->image_app) ?></td>
                <td><?= h($appNotification->app_link) ?></td>
                <td><?= h($appNotification->name) ?></td>
                <td><?= $appNotification->has('item') ? $this->Html->link($appNotification->item->name, ['controller' => 'Items', 'action' => 'view', $appNotification->item->id]) : '' ?></td>
                <td><?= $appNotification->has('app_wish_list') ? $this->Html->link($appNotification->app_wish_list->id, ['controller' => 'AppWishLists', 'action' => 'view', $appNotification->app_wish_list->id]) : '' ?></td>
                <td><?= $appNotification->has('stock_group') ? $this->Html->link($appNotification->stock_group->name, ['controller' => 'StockGroups', 'action' => 'view', $appNotification->stock_group->id]) : '' ?></td>
                <td><?= h($appNotification->screen_type) ?></td>
                <td><?= $this->Number->format($appNotification->created_by) ?></td>
                <td><?= h($appNotification->created_on) ?></td>
                <td><?= $this->Number->format($appNotification->edited_by) ?></td>
                <td><?= h($appNotification->edited_on) ?></td>
                <td><?= $this->Number->format($appNotification->status) ?></td>
                <td><?= h($appNotification->notification_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appNotification->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appNotification->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appNotification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appNotification->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
