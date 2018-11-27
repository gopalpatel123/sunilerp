<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppPromotion $appPromotion
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Promotion'), ['action' => 'edit', $appPromotion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Promotion'), ['action' => 'delete', $appPromotion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appPromotion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Promotions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Promotion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Promotion Details'), ['controller' => 'AppPromotionDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Promotion Detail'), ['controller' => 'AppPromotionDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appPromotions view large-9 medium-8 columns content">
    <h3><?= h($appPromotion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Offer Name') ?></th>
            <td><?= h($appPromotion->offer_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($appPromotion->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appPromotion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($appPromotion->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($appPromotion->end_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($appPromotion->created_on) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($appPromotion->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related App Promotion Details') ?></h4>
        <?php if (!empty($appPromotion->app_promotion_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('App Promotion Id') ?></th>
                <th scope="col"><?= __('Stock Group Id') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('Order Value') ?></th>
                <th scope="col"><?= __('Discount In Percentage') ?></th>
                <th scope="col"><?= __('Discount In Amount') ?></th>
                <th scope="col"><?= __('Discount Of Max Amount') ?></th>
                <th scope="col"><?= __('Coupon Name') ?></th>
                <th scope="col"><?= __('Coupon Code') ?></th>
                <th scope="col"><?= __('Buy Quntity') ?></th>
                <th scope="col"><?= __('Get Quntity') ?></th>
                <th scope="col"><?= __('Get Item Id') ?></th>
                <th scope="col"><?= __('Narration') ?></th>
                <th scope="col"><?= __('Cash Back') ?></th>
                <th scope="col"><?= __('Is Free Shipping') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($appPromotion->app_promotion_details as $appPromotionDetails): ?>
            <tr>
                <td><?= h($appPromotionDetails->id) ?></td>
                <td><?= h($appPromotionDetails->app_promotion_id) ?></td>
                <td><?= h($appPromotionDetails->stock_group_id) ?></td>
                <td><?= h($appPromotionDetails->item_id) ?></td>
                <td><?= h($appPromotionDetails->order_value) ?></td>
                <td><?= h($appPromotionDetails->discount_in_percentage) ?></td>
                <td><?= h($appPromotionDetails->discount_in_amount) ?></td>
                <td><?= h($appPromotionDetails->discount_of_max_amount) ?></td>
                <td><?= h($appPromotionDetails->coupon_name) ?></td>
                <td><?= h($appPromotionDetails->coupon_code) ?></td>
                <td><?= h($appPromotionDetails->buy_quntity) ?></td>
                <td><?= h($appPromotionDetails->get_quntity) ?></td>
                <td><?= h($appPromotionDetails->get_item_id) ?></td>
                <td><?= h($appPromotionDetails->narration) ?></td>
                <td><?= h($appPromotionDetails->cash_back) ?></td>
                <td><?= h($appPromotionDetails->is_free_shipping) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AppPromotionDetails', 'action' => 'view', $appPromotionDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AppPromotionDetails', 'action' => 'edit', $appPromotionDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AppPromotionDetails', 'action' => 'delete', $appPromotionDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appPromotionDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
