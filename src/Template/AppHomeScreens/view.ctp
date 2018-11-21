<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppHomeScreen $appHomeScreen
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Home Screen'), ['action' => 'edit', $appHomeScreen->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Home Screen'), ['action' => 'delete', $appHomeScreen->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appHomeScreen->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Home Screens'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Home Screen'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stock Groups'), ['controller' => 'StockGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stock Group'), ['controller' => 'StockGroups', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appHomeScreens view large-9 medium-8 columns content">
    <h3><?= h($appHomeScreen->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($appHomeScreen->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Layout') ?></th>
            <td><?= h($appHomeScreen->layout) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Section Show') ?></th>
            <td><?= h($appHomeScreen->section_show) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stock Group') ?></th>
            <td><?= $appHomeScreen->has('stock_group') ? $this->Html->link($appHomeScreen->stock_group->name, ['controller' => 'StockGroups', 'action' => 'view', $appHomeScreen->stock_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Screen Type') ?></th>
            <td><?= h($appHomeScreen->screen_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Model Name') ?></th>
            <td><?= h($appHomeScreen->model_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($appHomeScreen->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link Name') ?></th>
            <td><?= h($appHomeScreen->link_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appHomeScreen->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Preference') ?></th>
            <td><?= $this->Number->format($appHomeScreen->preference) ?></td>
        </tr>
    </table>
</div>
