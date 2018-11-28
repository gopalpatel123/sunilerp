<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher; //include this line
use Cake\ORM\Entity;

/**
 * AppCustomer Entity
 *
 * @property int $id
 * @property string $name
 * @property string $mobile
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $otp
 * @property \Cake\I18n\FrozenTime $created_on
 * @property string $mobile_verify
 * @property string $status
 * @property string $image_url
 * @property string $social_type
 * @property string $device_token
 * @property string $social_image
 *
 * @property \App\Model\Entity\AppCustomerAddress[] $app_customer_addresses
 * @property \App\Model\Entity\AppNotificationCustomer[] $app_notification_customers
 * @property \App\Model\Entity\AppOrder[] $app_orders
 * @property \App\Model\Entity\AppWishList[] $app_wish_lists
 * @property \App\Model\Entity\Cart[] $carts
 * @property \App\Model\Entity\ItemReviewRating[] $item_review_ratings
 */
class AppCustomer extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
	
	protected function _setPassword($password)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }
	
}
