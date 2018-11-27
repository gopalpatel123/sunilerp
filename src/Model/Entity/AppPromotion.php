<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppPromotion Entity
 *
 * @property int $id
 * @property string $offer_name
 * @property string $description
 * @property \Cake\I18n\FrozenTime $start_date
 * @property \Cake\I18n\FrozenTime $end_date
 * @property \Cake\I18n\FrozenTime $created_on
 * @property string $status
 *
 * @property \App\Model\Entity\AppPromotionDetail[] $app_promotion_details
 */
class AppPromotion extends Entity
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
}
