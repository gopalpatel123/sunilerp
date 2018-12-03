<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ItemReviewRating[]|\Cake\Collection\CollectionInterface $itemReviewRatings
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Item Review Rating'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Customers'), ['controller' => 'AppCustomers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Customer'), ['controller' => 'AppCustomers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="itemReviewRatings index large-9 medium-8 columns content">
    <h3><?= __('Item Review Ratings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('app_customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rating') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($itemReviewRatings as $itemReviewRating): ?>
            <tr>
                <td><?= $this->Number->format($itemReviewRating->id) ?></td>
                <td><?= $itemReviewRating->has('item') ? $this->Html->link($itemReviewRating->item->name, ['controller' => 'Items', 'action' => 'view', $itemReviewRating->item->id]) : '' ?></td>
                <td><?= $itemReviewRating->has('app_customer') ? $this->Html->link($itemReviewRating->app_customer->name, ['controller' => 'AppCustomers', 'action' => 'view', $itemReviewRating->app_customer->id]) : '' ?></td>
                <td><?= $this->Number->format($itemReviewRating->rating) ?></td>
                <td><?= $this->Number->format($itemReviewRating->status) ?></td>
                <td><?= h($itemReviewRating->created_on) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $itemReviewRating->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $itemReviewRating->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $itemReviewRating->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemReviewRating->id)]) ?>
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
