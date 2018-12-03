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
                ['action' => 'delete', $itemReviewRating->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $itemReviewRating->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Item Review Ratings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Customers'), ['controller' => 'AppCustomers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Customer'), ['controller' => 'AppCustomers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="itemReviewRatings form large-9 medium-8 columns content">
    <?= $this->Form->create($itemReviewRating) ?>
    <fieldset>
        <legend><?= __('Edit Item Review Rating') ?></legend>
        <?php
            echo $this->Form->control('item_id', ['options' => $items]);
            echo $this->Form->control('app_customer_id', ['options' => $appCustomers]);
            echo $this->Form->control('rating');
            echo $this->Form->control('comment');
            echo $this->Form->control('status');
            echo $this->Form->control('created_on');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
