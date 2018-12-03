<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ItemReviewRating $itemReviewRating
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item Review Rating'), ['action' => 'edit', $itemReviewRating->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item Review Rating'), ['action' => 'delete', $itemReviewRating->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemReviewRating->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Item Review Ratings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item Review Rating'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Customers'), ['controller' => 'AppCustomers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Customer'), ['controller' => 'AppCustomers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="itemReviewRatings view large-9 medium-8 columns content">
    <h3><?= h($itemReviewRating->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $itemReviewRating->has('item') ? $this->Html->link($itemReviewRating->item->name, ['controller' => 'Items', 'action' => 'view', $itemReviewRating->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('App Customer') ?></th>
            <td><?= $itemReviewRating->has('app_customer') ? $this->Html->link($itemReviewRating->app_customer->name, ['controller' => 'AppCustomers', 'action' => 'view', $itemReviewRating->app_customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($itemReviewRating->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rating') ?></th>
            <td><?= $this->Number->format($itemReviewRating->rating) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($itemReviewRating->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($itemReviewRating->created_on) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($itemReviewRating->comment)); ?>
    </div>
</div>
