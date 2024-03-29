<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Imagen Entity
 *
 * @property int $id
 * @property int $merchandising_id
 * @property string $nombre
 *
 * @property \App\Model\Entity\Merchandising $merchandising
 */
class Imagen extends Entity
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
        'merchandising_id' => true,
        'nombre' => true,
        'merchandising' => true,
    ];
}