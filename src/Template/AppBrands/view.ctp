<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppBrand $appBrand
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Brand'), ['action' => 'edit', $appBrand->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Brand'), ['action' => 'delete', $appBrand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appBrand->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Brands'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Brand'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appBrands view large-9 medium-8 columns content">
    <h3><?= h($appBrand->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($appBrand->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($appBrand->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Brand Image') ?></th>
            <td><?= h($appBrand->brand_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appBrand->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount') ?></th>
            <td><?= $this->Number->format($appBrand->discount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($appBrand->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($appBrand->created_on) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Items') ?></h4>
        <?php if (!empty($appBrand->items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Edited On') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Item Code') ?></th>
                <th scope="col"><?= __('Hsn Code') ?></th>
                <th scope="col"><?= __('Unit Id') ?></th>
                <th scope="col"><?= __('Stock Group Id') ?></th>
                <th scope="col"><?= __('Company Id') ?></th>
                <th scope="col"><?= __('Size Id') ?></th>
                <th scope="col"><?= __('Shade Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Gst Figure Id') ?></th>
                <th scope="col"><?= __('First Gst Figure Id') ?></th>
                <th scope="col"><?= __('Gst Amount') ?></th>
                <th scope="col"><?= __('Second Gst Figure Id') ?></th>
                <th scope="col"><?= __('Kind Of Gst') ?></th>
                <th scope="col"><?= __('Sales Rate Update On') ?></th>
                <th scope="col"><?= __('Sales Rate') ?></th>
                <th scope="col"><?= __('Max Purchase Qty') ?></th>
                <th scope="col"><?= __('Sales For') ?></th>
                <th scope="col"><?= __('Discount') ?></th>
                <th scope="col"><?= __('Print Rate') ?></th>
                <th scope="col"><?= __('App Brand Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($appBrand->items as $items): ?>
            <tr>
                <td><?= h($items->id) ?></td>
                <td><?= h($items->created_on) ?></td>
                <td><?= h($items->edited_on) ?></td>
                <td><?= h($items->name) ?></td>
                <td><?= h($items->item_code) ?></td>
                <td><?= h($items->hsn_code) ?></td>
                <td><?= h($items->unit_id) ?></td>
                <td><?= h($items->stock_group_id) ?></td>
                <td><?= h($items->company_id) ?></td>
                <td><?= h($items->size_id) ?></td>
                <td><?= h($items->shade_id) ?></td>
                <td><?= h($items->description) ?></td>
                <td><?= h($items->gst_figure_id) ?></td>
                <td><?= h($items->first_gst_figure_id) ?></td>
                <td><?= h($items->gst_amount) ?></td>
                <td><?= h($items->second_gst_figure_id) ?></td>
                <td><?= h($items->kind_of_gst) ?></td>
                <td><?= h($items->sales_rate_update_on) ?></td>
                <td><?= h($items->sales_rate) ?></td>
                <td><?= h($items->max_purchase_qty) ?></td>
                <td><?= h($items->sales_for) ?></td>
                <td><?= h($items->discount) ?></td>
                <td><?= h($items->print_rate) ?></td>
                <td><?= h($items->app_brand_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $items->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
