<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppHomeScreenSecond[]|\Cake\Collection\CollectionInterface $appHomeScreenSeconds
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Home Screen Second'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stock Groups'), ['controller' => 'StockGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stock Group'), ['controller' => 'StockGroups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appHomeScreenSeconds index large-9 medium-8 columns content">
    <h3><?= __('App Home Screen Seconds') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('layout') ?></th>
                <th scope="col"><?= $this->Paginator->sort('section_show') ?></th>
                <th scope="col"><?= $this->Paginator->sort('preference') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stock_group_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('screen_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('model_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_title') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appHomeScreenSeconds as $appHomeScreenSecond): ?>
            <tr>
                <td><?= $this->Number->format($appHomeScreenSecond->id) ?></td>
                <td><?= h($appHomeScreenSecond->title) ?></td>
                <td><?= h($appHomeScreenSecond->layout) ?></td>
                <td><?= h($appHomeScreenSecond->section_show) ?></td>
                <td><?= $this->Number->format($appHomeScreenSecond->preference) ?></td>
                <td><?= $appHomeScreenSecond->has('stock_group') ? $this->Html->link($appHomeScreenSecond->stock_group->name, ['controller' => 'StockGroups', 'action' => 'view', $appHomeScreenSecond->stock_group->id]) : '' ?></td>
                <td><?= $this->Number->format($appHomeScreenSecond->sub_category_id) ?></td>
                <td><?= h($appHomeScreenSecond->screen_type) ?></td>
                <td><?= h($appHomeScreenSecond->model_name) ?></td>
                <td><?= h($appHomeScreenSecond->image) ?></td>
                <td><?= h($appHomeScreenSecond->link_name) ?></td>
                <td><?= h($appHomeScreenSecond->sub_title) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appHomeScreenSecond->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appHomeScreenSecond->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appHomeScreenSecond->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appHomeScreenSecond->id)]) ?>
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
