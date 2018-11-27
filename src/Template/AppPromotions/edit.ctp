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
                ['action' => 'delete', $appPromotion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $appPromotion->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List App Promotions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List App Promotion Details'), ['controller' => 'AppPromotionDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Promotion Detail'), ['controller' => 'AppPromotionDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appPromotions form large-9 medium-8 columns content">
    <?= $this->Form->create($appPromotion) ?>
    <fieldset>
        <legend><?= __('Edit App Promotion') ?></legend>
        <?php
            echo $this->Form->control('offer_name');
            echo $this->Form->control('description');
            echo $this->Form->control('start_date');
            echo $this->Form->control('end_date');
            echo $this->Form->control('created_on');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
