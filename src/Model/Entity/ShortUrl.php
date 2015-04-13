<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShortUrl Entity.
 */
class ShortUrl extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'shortUrl' => true,
        'longUrl' => true,
        'timeStamp' => true,
    ];
}
