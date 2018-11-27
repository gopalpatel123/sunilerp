<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppPromotionDetail[]|\Cake\Collection\CollectionInterface $appPromotionDetails
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Promotion Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Promotions'), ['controller' => 'AppPromotions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Promotion'), ['controller' => 'AppPromotions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stock Groups'), ['controller' => 'StockGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stock Group'), ['controller' => 'StockGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appPromotionDetails index large-9 medium-8 columns content">
    <h3><?= __('App Promotion Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('app_promotion_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stock_group_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount_in_percentage') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount_in_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount_of_max_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('coupon_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('coupon_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('buy_quntity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('get_quntity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('get_item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cash_back') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_free_shipping') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appPromotionDetails as $appPromotionDetail): ?>
            <tr>
                <td><?= $this->Number->format($appPromotionDetail->id) ?></td>
                <td><?= $appPromotionDetail->has('app_promotion') ? $this->Html->link($appPromotionDetail->app_promotion->id, ['controller' => 'AppPromotions', 'action' => 'view', $appPromotionDetail->app_promotion->id]) : '' ?></td>
                <td><?= $appPromotionDetail->has('stock_group') ? $this->Html->link($appPromotionDetail->stock_group->name, ['controller' => 'StockGroups', 'action' => 'view', $appPromotionDetail->stock_group->id]) : '' ?></td>
                <td><?= $appPromotionDetail->has('item') ? $this->Html->link($appPromotionDetail->item->name, ['controller' => 'Items', 'action' => 'view', $appPromotionDetail->item->id]) : '' ?></td>
                <td><?= $this->Number->format($appPromotionDetail->order_value) ?></td>
                <td><?= $this->Number->format($appPromotionDetail->discount_in_percentage) ?></td>
                <td><?= $this->Number->format($appPromotionDetail->discount_in_amount) ?></td>
                <td><?= $this->Number->format($appPromotionDetail->discount_of_max_amount) ?></td>
                <td><?= h($appPromotionDetail->coupon_name) ?></td>
                <td><?= h($appPromotionDetail->coupon_code) ?></td>
                <td><?= $this->Number->format($appPromotionDetail->buy_quntity) ?></td>
                <td><?= $this->Number->format($appPromotionDetail->get_quntity) ?></td>
                <td><?= $this->Number->format($appPromotionDetail->get_item_id) ?></td>
                <td><?= $this->Number->format($appPromotionDetail->cash_back) ?></td>
                <td><?= h($appPromotionDetail->is_free_shipping) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appPromotionDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appPromotionDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appPromotionDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appPromotionDetail->id)]) ?>
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
