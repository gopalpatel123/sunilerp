<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List App Promotion Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List App Promotions'), ['controller' => 'AppPromotions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Promotion'), ['controller' => 'AppPromotions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stock Groups'), ['controller' => 'StockGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stock Group'), ['controller' => 'StockGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appPromotionDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($appPromotionDetail) ?>
    <fieldset>
        <legend><?= __('Add App Promotion Detail') ?></legend>
        <?php
            echo $this->Form->control('app_promotion_id', ['options' => $appPromotions]);
            echo $this->Form->control('stock_group_id', ['options' => $stockGroups, 'empty' => true]);
            echo $this->Form->control('item_id', ['options' => $items, 'empty' => true]);
            echo $this->Form->control('order_value');
            echo $this->Form->control('discount_in_percentage');
            echo $this->Form->control('discount_in_amount');
            echo $this->Form->control('discount_of_max_amount');
            echo $this->Form->control('coupon_name');
            echo $this->Form->control('coupon_code');
            echo $this->Form->control('buy_quntity');
            echo $this->Form->control('get_quntity');
            echo $this->Form->control('get_item_id');
            echo $this->Form->control('narration');
            echo $this->Form->control('cash_back');
            echo $this->Form->control('is_free_shipping');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
