<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AppCustomer $appCustomer
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App Customer'), ['action' => 'edit', $appCustomer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Customer'), ['action' => 'delete', $appCustomer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appCustomer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Customer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Customer Addresses'), ['controller' => 'AppCustomerAddresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Customer Address'), ['controller' => 'AppCustomerAddresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Notification Customers'), ['controller' => 'AppNotificationCustomers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Notification Customer'), ['controller' => 'AppNotificationCustomers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Orders'), ['controller' => 'AppOrders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Order'), ['controller' => 'AppOrders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List App Wish Lists'), ['controller' => 'AppWishLists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Wish List'), ['controller' => 'AppWishLists', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Carts'), ['controller' => 'Carts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cart'), ['controller' => 'Carts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Item Review Ratings'), ['controller' => 'ItemReviewRatings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item Review Rating'), ['controller' => 'ItemReviewRatings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appCustomers view large-9 medium-8 columns content">
    <h3><?= h($appCustomer->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($appCustomer->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile') ?></th>
            <td><?= h($appCustomer->mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($appCustomer->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($appCustomer->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($appCustomer->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Otp') ?></th>
            <td><?= h($appCustomer->otp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile Verify') ?></th>
            <td><?= h($appCustomer->mobile_verify) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($appCustomer->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Url') ?></th>
            <td><?= h($appCustomer->image_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Social Type') ?></th>
            <td><?= h($appCustomer->social_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Device Token') ?></th>
            <td><?= h($appCustomer->device_token) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Social Image') ?></th>
            <td><?= h($appCustomer->social_image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appCustomer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($appCustomer->created_on) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related App Customer Addresses') ?></h4>
        <?php if (!empty($appCustomer->app_customer_addresses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('App Customer Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Address Type') ?></th>
                <th scope="col"><?= __('Mobile No') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Area') ?></th>
                <th scope="col"><?= __('State Id') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('Country') ?></th>
                <th scope="col"><?= __('Pincode') ?></th>
                <th scope="col"><?= __('Latitude') ?></th>
                <th scope="col"><?= __('Longitude') ?></th>
                <th scope="col"><?= __('Default Address') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($appCustomer->app_customer_addresses as $appCustomerAddresses): ?>
            <tr>
                <td><?= h($appCustomerAddresses->id) ?></td>
                <td><?= h($appCustomerAddresses->app_customer_id) ?></td>
                <td><?= h($appCustomerAddresses->name) ?></td>
                <td><?= h($appCustomerAddresses->address_type) ?></td>
                <td><?= h($appCustomerAddresses->mobile_no) ?></td>
                <td><?= h($appCustomerAddresses->address) ?></td>
                <td><?= h($appCustomerAddresses->area) ?></td>
                <td><?= h($appCustomerAddresses->state_id) ?></td>
                <td><?= h($appCustomerAddresses->city_id) ?></td>
                <td><?= h($appCustomerAddresses->country) ?></td>
                <td><?= h($appCustomerAddresses->pincode) ?></td>
                <td><?= h($appCustomerAddresses->latitude) ?></td>
                <td><?= h($appCustomerAddresses->longitude) ?></td>
                <td><?= h($appCustomerAddresses->default_address) ?></td>
                <td><?= h($appCustomerAddresses->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AppCustomerAddresses', 'action' => 'view', $appCustomerAddresses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AppCustomerAddresses', 'action' => 'edit', $appCustomerAddresses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AppCustomerAddresses', 'action' => 'delete', $appCustomerAddresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appCustomerAddresses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related App Notification Customers') ?></h4>
        <?php if (!empty($appCustomer->app_notification_customers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('App Notification Id') ?></th>
                <th scope="col"><?= __('App Customer Id') ?></th>
                <th scope="col"><?= __('Sent') ?></th>
                <th scope="col"><?= __('Send On') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($appCustomer->app_notification_customers as $appNotificationCustomers): ?>
            <tr>
                <td><?= h($appNotificationCustomers->id) ?></td>
                <td><?= h($appNotificationCustomers->app_notification_id) ?></td>
                <td><?= h($appNotificationCustomers->app_customer_id) ?></td>
                <td><?= h($appNotificationCustomers->sent) ?></td>
                <td><?= h($appNotificationCustomers->send_on) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AppNotificationCustomers', 'action' => 'view', $appNotificationCustomers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AppNotificationCustomers', 'action' => 'edit', $appNotificationCustomers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AppNotificationCustomers', 'action' => 'delete', $appNotificationCustomers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appNotificationCustomers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related App Orders') ?></h4>
        <?php if (!empty($appCustomer->app_orders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('App Customer Id') ?></th>
                <th scope="col"><?= __('App Customer Address Id') ?></th>
                <th scope="col"><?= __('Customer Address Info') ?></th>
                <th scope="col"><?= __('Order No') ?></th>
                <th scope="col"><?= __('Voucher No') ?></th>
                <th scope="col"><?= __('Ccavvenue Tracking No') ?></th>
                <th scope="col"><?= __('Ccavvenue Order No') ?></th>
                <th scope="col"><?= __('Discount Percent') ?></th>
                <th scope="col"><?= __('Total Gst') ?></th>
                <th scope="col"><?= __('Grand Total') ?></th>
                <th scope="col"><?= __('Round Off') ?></th>
                <th scope="col"><?= __('Delivery Charge Id') ?></th>
                <th scope="col"><?= __('Delivery Charge Amount') ?></th>
                <th scope="col"><?= __('Order Type') ?></th>
                <th scope="col"><?= __('Delivery Date') ?></th>
                <th scope="col"><?= __('Order Status') ?></th>
                <th scope="col"><?= __('Order Date') ?></th>
                <th scope="col"><?= __('Payment Status') ?></th>
                <th scope="col"><?= __('Order From') ?></th>
                <th scope="col"><?= __('Narration') ?></th>
                <th scope="col"><?= __('Packing On') ?></th>
                <th scope="col"><?= __('Packing Flag') ?></th>
                <th scope="col"><?= __('Dispatch On') ?></th>
                <th scope="col"><?= __('Dispatch Flag') ?></th>
                <th scope="col"><?= __('Is Applicable For Cancel') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($appCustomer->app_orders as $appOrders): ?>
            <tr>
                <td><?= h($appOrders->id) ?></td>
                <td><?= h($appOrders->app_customer_id) ?></td>
                <td><?= h($appOrders->app_customer_address_id) ?></td>
                <td><?= h($appOrders->customer_address_info) ?></td>
                <td><?= h($appOrders->order_no) ?></td>
                <td><?= h($appOrders->voucher_no) ?></td>
                <td><?= h($appOrders->ccavvenue_tracking_no) ?></td>
                <td><?= h($appOrders->ccavvenue_order_no) ?></td>
                <td><?= h($appOrders->discount_percent) ?></td>
                <td><?= h($appOrders->total_gst) ?></td>
                <td><?= h($appOrders->grand_total) ?></td>
                <td><?= h($appOrders->round_off) ?></td>
                <td><?= h($appOrders->delivery_charge_id) ?></td>
                <td><?= h($appOrders->delivery_charge_amount) ?></td>
                <td><?= h($appOrders->order_type) ?></td>
                <td><?= h($appOrders->delivery_date) ?></td>
                <td><?= h($appOrders->order_status) ?></td>
                <td><?= h($appOrders->order_date) ?></td>
                <td><?= h($appOrders->payment_status) ?></td>
                <td><?= h($appOrders->order_from) ?></td>
                <td><?= h($appOrders->narration) ?></td>
                <td><?= h($appOrders->packing_on) ?></td>
                <td><?= h($appOrders->packing_flag) ?></td>
                <td><?= h($appOrders->dispatch_on) ?></td>
                <td><?= h($appOrders->dispatch_flag) ?></td>
                <td><?= h($appOrders->is_applicable_for_cancel) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AppOrders', 'action' => 'view', $appOrders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AppOrders', 'action' => 'edit', $appOrders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AppOrders', 'action' => 'delete', $appOrders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appOrders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related App Wish Lists') ?></h4>
        <?php if (!empty($appCustomer->app_wish_lists)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('App Customer Id') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($appCustomer->app_wish_lists as $appWishLists): ?>
            <tr>
                <td><?= h($appWishLists->id) ?></td>
                <td><?= h($appWishLists->app_customer_id) ?></td>
                <td><?= h($appWishLists->created_on) ?></td>
                <td><?= h($appWishLists->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AppWishLists', 'action' => 'view', $appWishLists->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AppWishLists', 'action' => 'edit', $appWishLists->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AppWishLists', 'action' => 'delete', $appWishLists->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appWishLists->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Carts') ?></h4>
        <?php if (!empty($appCustomer->carts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('App Customer Id') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Rate') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Cart Count') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($appCustomer->carts as $carts): ?>
            <tr>
                <td><?= h($carts->id) ?></td>
                <td><?= h($carts->app_customer_id) ?></td>
                <td><?= h($carts->item_id) ?></td>
                <td><?= h($carts->quantity) ?></td>
                <td><?= h($carts->rate) ?></td>
                <td><?= h($carts->amount) ?></td>
                <td><?= h($carts->cart_count) ?></td>
                <td><?= h($carts->created_on) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Carts', 'action' => 'view', $carts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Carts', 'action' => 'edit', $carts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Carts', 'action' => 'delete', $carts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Item Review Ratings') ?></h4>
        <?php if (!empty($appCustomer->item_review_ratings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('App Customer Id') ?></th>
                <th scope="col"><?= __('Rating') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($appCustomer->item_review_ratings as $itemReviewRatings): ?>
            <tr>
                <td><?= h($itemReviewRatings->id) ?></td>
                <td><?= h($itemReviewRatings->item_id) ?></td>
                <td><?= h($itemReviewRatings->app_customer_id) ?></td>
                <td><?= h($itemReviewRatings->rating) ?></td>
                <td><?= h($itemReviewRatings->comment) ?></td>
                <td><?= h($itemReviewRatings->status) ?></td>
                <td><?= h($itemReviewRatings->created_on) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ItemReviewRatings', 'action' => 'view', $itemReviewRatings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ItemReviewRatings', 'action' => 'edit', $itemReviewRatings->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ItemReviewRatings', 'action' => 'delete', $itemReviewRatings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemReviewRatings->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
