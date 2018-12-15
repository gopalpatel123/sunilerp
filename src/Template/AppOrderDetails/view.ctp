<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppOrderDetail $appOrderDetail
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Order Detail'), ['action' => 'edit', $appOrderDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Order Detail'), ['action' => 'delete', $appOrderDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appOrderDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Order Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Order Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Orders'), ['controller' => 'AppOrders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Order'), ['controller' => 'AppOrders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Gst Figures'), ['controller' => 'GstFigures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gst Figure'), ['controller' => 'GstFigures', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appOrderDetails view large-9 medium-8 columns content">
    <h3><?= h($appOrderDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('App Order') ?></th>
            <td><?= $appOrderDetail->has('app_order') ? $this->Html->link($appOrderDetail->app_order->id, ['controller' => 'AppOrders', 'action' => 'view', $appOrderDetail->app_order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $appOrderDetail->has('item') ? $this->Html->link($appOrderDetail->item->name, ['controller' => 'Items', 'action' => 'view', $appOrderDetail->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gst Figure') ?></th>
            <td><?= $appOrderDetail->has('gst_figure') ? $this->Html->link($appOrderDetail->gst_figure->name, ['controller' => 'GstFigures', 'action' => 'view', $appOrderDetail->gst_figure->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Item Cancel') ?></th>
            <td><?= h($appOrderDetail->is_item_cancel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item Status') ?></th>
            <td><?= h($appOrderDetail->item_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appOrderDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($appOrderDetail->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rate') ?></th>
            <td><?= $this->Number->format($appOrderDetail->rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($appOrderDetail->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount Percent') ?></th>
            <td><?= $this->Number->format($appOrderDetail->discount_percent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount Amount') ?></th>
            <td><?= $this->Number->format($appOrderDetail->discount_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Promo Percent') ?></th>
            <td><?= $this->Number->format($appOrderDetail->promo_percent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Promo Amount') ?></th>
            <td><?= $this->Number->format($appOrderDetail->promo_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Taxable Value') ?></th>
            <td><?= $this->Number->format($appOrderDetail->taxable_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gst Percentage') ?></th>
            <td><?= $this->Number->format($appOrderDetail->gst_percentage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gst Value') ?></th>
            <td><?= $this->Number->format($appOrderDetail->gst_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Net Amount') ?></th>
            <td><?= $this->Number->format($appOrderDetail->net_amount) ?></td>
        </tr>
    </table>
</div>
