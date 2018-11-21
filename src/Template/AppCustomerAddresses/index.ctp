<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppCustomerAddress[]|\Cake\Collection\CollectionInterface $appCustomerAddresses
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New App Customer Address'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Customers'), ['controller' => 'AppCustomers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Customer'), ['controller' => 'AppCustomers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List App Orders'), ['controller' => 'AppOrders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App Order'), ['controller' => 'AppOrders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appCustomerAddresses index large-9 medium-8 columns content">
    <h3><?= __('App Customer Addresses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('app_customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('area') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pincode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('latitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('longitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('default_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appCustomerAddresses as $appCustomerAddress): ?>
            <tr>
                <td><?= $this->Number->format($appCustomerAddress->id) ?></td>
                <td><?= $appCustomerAddress->has('app_customer') ? $this->Html->link($appCustomerAddress->app_customer->name, ['controller' => 'AppCustomers', 'action' => 'view', $appCustomerAddress->app_customer->id]) : '' ?></td>
                <td><?= h($appCustomerAddress->name) ?></td>
                <td><?= h($appCustomerAddress->address_type) ?></td>
                <td><?= h($appCustomerAddress->mobile_no) ?></td>
                <td><?= h($appCustomerAddress->area) ?></td>
                <td><?= $appCustomerAddress->has('state') ? $this->Html->link($appCustomerAddress->state->name, ['controller' => 'States', 'action' => 'view', $appCustomerAddress->state->id]) : '' ?></td>
                <td><?= $appCustomerAddress->has('city') ? $this->Html->link($appCustomerAddress->city->name, ['controller' => 'Cities', 'action' => 'view', $appCustomerAddress->city->id]) : '' ?></td>
                <td><?= h($appCustomerAddress->country) ?></td>
                <td><?= h($appCustomerAddress->pincode) ?></td>
                <td><?= h($appCustomerAddress->latitude) ?></td>
                <td><?= h($appCustomerAddress->longitude) ?></td>
                <td><?= $this->Number->format($appCustomerAddress->default_address) ?></td>
                <td><?= $this->Number->format($appCustomerAddress->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appCustomerAddress->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appCustomerAddress->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appCustomerAddress->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appCustomerAddress->id)]) ?>
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
