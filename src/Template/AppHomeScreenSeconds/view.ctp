<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppHomeScreenSecond $appHomeScreenSecond
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Home Screen Second'), ['action' => 'edit', $appHomeScreenSecond->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Home Screen Second'), ['action' => 'delete', $appHomeScreenSecond->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appHomeScreenSecond->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Home Screen Seconds'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Home Screen Second'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stock Groups'), ['controller' => 'StockGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stock Group'), ['controller' => 'StockGroups', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appHomeScreenSeconds view large-9 medium-8 columns content">
    <h3><?= h($appHomeScreenSecond->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($appHomeScreenSecond->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Layout') ?></th>
            <td><?= h($appHomeScreenSecond->layout) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Section Show') ?></th>
            <td><?= h($appHomeScreenSecond->section_show) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stock Group') ?></th>
            <td><?= $appHomeScreenSecond->has('stock_group') ? $this->Html->link($appHomeScreenSecond->stock_group->name, ['controller' => 'StockGroups', 'action' => 'view', $appHomeScreenSecond->stock_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Screen Type') ?></th>
            <td><?= h($appHomeScreenSecond->screen_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Model Name') ?></th>
            <td><?= h($appHomeScreenSecond->model_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($appHomeScreenSecond->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link Name') ?></th>
            <td><?= h($appHomeScreenSecond->link_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Title') ?></th>
            <td><?= h($appHomeScreenSecond->sub_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appHomeScreenSecond->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Preference') ?></th>
            <td><?= $this->Number->format($appHomeScreenSecond->preference) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Category Id') ?></th>
            <td><?= $this->Number->format($appHomeScreenSecond->sub_category_id) ?></td>
        </tr>
    </table>
</div>
