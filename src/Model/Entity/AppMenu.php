<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AppMenu Entity
 *
 * @property int $id
 * @property string $name
 * @property string $link
 * @property int $status
 * @property int $parent_id
 * @property int $lft
 * @property int $rght
 * @property string $title_content
 *
 * @property \App\Model\Entity\ParentAppMenu $parent_app_menu
 * @property \App\Model\Entity\ChildAppMenu[] $child_app_menus
 */
class AppMenu extends Entity
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
