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
                ['action' => 'delete', $appOrderDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $appOrderDetail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List App Order Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List App Orders'), ['controller' => 'AppOrders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Order'), ['controller' => 'AppOrders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Gst Figures'), ['controller' => 'GstFigures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gst Figure'), ['controller' => 'GstFigures', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appOrderDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($appOrderDetail) ?>
    <fieldset>
        <legend><?= __('Edit App Order Detail') ?></legend>
        <?php
            echo $this->Form->control('app_order_id', ['options' => $appOrders]);
            echo $this->Form->control('item_id', ['options' => $items]);
            echo $this->Form->control('quantity');
            echo $this->Form->control('rate');
            echo $this->Form->control('amount');
            echo $this->Form->control('discount_percent');
            echo $this->Form->control('discount_amount');
            echo $this->Form->control('promo_percent');
            echo $this->Form->control('promo_amount');
            echo $this->Form->control('taxable_value');
            echo $this->Form->control('gst_percentage');
            echo $this->Form->control('gst_figure_id', ['options' => $gstFigures]);
            echo $this->Form->control('gst_value');
            echo $this->Form->control('net_amount');
            echo $this->Form->control('is_item_cancel');
            echo $this->Form->control('item_status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
