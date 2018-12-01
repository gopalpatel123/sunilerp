<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppWishList[]|\Cake\Collection\CollectionInterface $appWishLists
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Wish List'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Customers'), ['controller' => 'AppCustomers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Customer'), ['controller' => 'AppCustomers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Notifications'), ['controller' => 'AppNotifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Notification'), ['controller' => 'AppNotifications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appWishLists index large-9 medium-8 columns content">
    <h3><?= __('App Wish Lists') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('app_customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appWishLists as $appWishList): ?>
            <tr>
                <td><?= $this->Number->format($appWishList->id) ?></td>
                <td><?= $appWishList->has('app_customer') ? $this->Html->link($appWishList->app_customer->name, ['controller' => 'AppCustomers', 'action' => 'view', $appWishList->app_customer->id]) : '' ?></td>
                <td><?= h($appWishList->created_on) ?></td>
                <td><?= $this->Number->format($appWishList->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appWishList->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appWishList->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appWishList->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appWishList->id)]) ?>
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
