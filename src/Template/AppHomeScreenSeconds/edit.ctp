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
                ['action' => 'delete', $appHomeScreenSecond->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $appHomeScreenSecond->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List App Home Screen Seconds'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stock Groups'), ['controller' => 'StockGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stock Group'), ['controller' => 'StockGroups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appHomeScreenSeconds form large-9 medium-8 columns content">
    <?= $this->Form->create($appHomeScreenSecond) ?>
    <fieldset>
        <legend><?= __('Edit App Home Screen Second') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('layout');
            echo $this->Form->control('section_show');
            echo $this->Form->control('preference');
            echo $this->Form->control('stock_group_id', ['options' => $stockGroups]);
            echo $this->Form->control('sub_category_id');
            echo $this->Form->control('screen_type');
            echo $this->Form->control('model_name');
            echo $this->Form->control('image');
            echo $this->Form->control('link_name');
            echo $this->Form->control('sub_title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
