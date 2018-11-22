<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AwsFile Entity
 *
 * @property int $id
 * @property string $bucket_name
 * @property string $access_key
 * @property string $secret_access_key
 * @property string $cdn_path
 * @property int $merchant_id
 * @property string $working_key
 * @property string $access_code
 *
 * @property \App\Model\Entity\Merchant $merchant
 */
class AwsFile extends Entity
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
