<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppBanner $appBanner
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Banner'), ['action' => 'edit', $appBanner->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Banner'), ['action' => 'delete', $appBanner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appBanner->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Banners'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Banner'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stock Groups'), ['controller' => 'StockGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stock Group'), ['controller' => 'StockGroups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appBanners view large-9 medium-8 columns content">
    <h3><?= h($appBanner->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Link Name') ?></th>
            <td><?= h($appBanner->link_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($appBanner->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stock Group') ?></th>
            <td><?= $appBanner->has('stock_group') ? $this->Html->link($appBanner->stock_group->name, ['controller' => 'StockGroups', 'action' => 'view', $appBanner->stock_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $appBanner->has('item') ? $this->Html->link($appBanner->item->name, ['controller' => 'Items', 'action' => 'view', $appBanner->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Banner Image') ?></th>
            <td><?= h($appBanner->banner_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($appBanner->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appBanner->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($appBanner->created_on) ?></td>
        </tr>
    </table>
</div>
