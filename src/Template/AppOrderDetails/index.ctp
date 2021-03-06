<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppOrderDetail[]|\Cake\Collection\CollectionInterface $appOrderDetails
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Order Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Orders'), ['controller' => 'AppOrders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Order'), ['controller' => 'AppOrders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Gst Figures'), ['controller' => 'GstFigures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gst Figure'), ['controller' => 'GstFigures', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appOrderDetails index large-9 medium-8 columns content">
    <h3><?= __('App Order Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('app_order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount_percent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('promo_percent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('promo_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('taxable_value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gst_percentage') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gst_figure_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gst_value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('net_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_item_cancel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appOrderDetails as $appOrderDetail): ?>
            <tr>
                <td><?= $this->Number->format($appOrderDetail->id) ?></td>
                <td><?= $appOrderDetail->has('app_order') ? $this->Html->link($appOrderDetail->app_order->id, ['controller' => 'AppOrders', 'action' => 'view', $appOrderDetail->app_order->id]) : '' ?></td>
                <td><?= $appOrderDetail->has('item') ? $this->Html->link($appOrderDetail->item->name, ['controller' => 'Items', 'action' => 'view', $appOrderDetail->item->id]) : '' ?></td>
                <td><?= $this->Number->format($appOrderDetail->quantity) ?></td>
                <td><?= $this->Number->format($appOrderDetail->rate) ?></td>
                <td><?= $this->Number->format($appOrderDetail->amount) ?></td>
                <td><?= $this->Number->format($appOrderDetail->discount_percent) ?></td>
                <td><?= $this->Number->format($appOrderDetail->discount_amount) ?></td>
                <td><?= $this->Number->format($appOrderDetail->promo_percent) ?></td>
                <td><?= $this->Number->format($appOrderDetail->promo_amount) ?></td>
                <td><?= $this->Number->format($appOrderDetail->taxable_value) ?></td>
                <td><?= $this->Number->format($appOrderDetail->gst_percentage) ?></td>
                <td><?= $appOrderDetail->has('gst_figure') ? $this->Html->link($appOrderDetail->gst_figure->name, ['controller' => 'GstFigures', 'action' => 'view', $appOrderDetail->gst_figure->id]) : '' ?></td>
                <td><?= $this->Number->format($appOrderDetail->gst_value) ?></td>
                <td><?= $this->Number->format($appOrderDetail->net_amount) ?></td>
                <td><?= h($appOrderDetail->is_item_cancel) ?></td>
                <td><?= h($appOrderDetail->item_status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appOrderDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appOrderDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appOrderDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appOrderDetail->id)]) ?>
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
