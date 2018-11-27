<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppPromotionDetail $appPromotionDetail
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Promotion Detail'), ['action' => 'edit', $appPromotionDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Promotion Detail'), ['action' => 'delete', $appPromotionDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appPromotionDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Promotion Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Promotion Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Promotions'), ['controller' => 'AppPromotions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Promotion'), ['controller' => 'AppPromotions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stock Groups'), ['controller' => 'StockGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stock Group'), ['controller' => 'StockGroups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appPromotionDetails view large-9 medium-8 columns content">
    <h3><?= h($appPromotionDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('App Promotion') ?></th>
            <td><?= $appPromotionDetail->has('app_promotion') ? $this->Html->link($appPromotionDetail->app_promotion->id, ['controller' => 'AppPromotions', 'action' => 'view', $appPromotionDetail->app_promotion->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stock Group') ?></th>
            <td><?= $appPromotionDetail->has('stock_group') ? $this->Html->link($appPromotionDetail->stock_group->name, ['controller' => 'StockGroups', 'action' => 'view', $appPromotionDetail->stock_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $appPromotionDetail->has('item') ? $this->Html->link($appPromotionDetail->item->name, ['controller' => 'Items', 'action' => 'view', $appPromotionDetail->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Coupon Name') ?></th>
            <td><?= h($appPromotionDetail->coupon_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Coupon Code') ?></th>
            <td><?= h($appPromotionDetail->coupon_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Free Shipping') ?></th>
            <td><?= h($appPromotionDetail->is_free_shipping) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appPromotionDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Value') ?></th>
            <td><?= $this->Number->format($appPromotionDetail->order_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount In Percentage') ?></th>
            <td><?= $this->Number->format($appPromotionDetail->discount_in_percentage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount In Amount') ?></th>
            <td><?= $this->Number->format($appPromotionDetail->discount_in_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount Of Max Amount') ?></th>
            <td><?= $this->Number->format($appPromotionDetail->discount_of_max_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Buy Quntity') ?></th>
            <td><?= $this->Number->format($appPromotionDetail->buy_quntity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Get Quntity') ?></th>
            <td><?= $this->Number->format($appPromotionDetail->get_quntity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Get Item Id') ?></th>
            <td><?= $this->Number->format($appPromotionDetail->get_item_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cash Back') ?></th>
            <td><?= $this->Number->format($appPromotionDetail->cash_back) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Narration') ?></h4>
        <?= $this->Text->autoParagraph(h($appPromotionDetail->narration)); ?>
    </div>
</div>
