<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ShortUrlsFixture
 *
 */
class ShortUrlsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'serial' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'shortUrl' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'longUrl' => ['type' => 'string', 'length' => 2000, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'timeStamp' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'serial' => ['type' => 'index', 'columns' => ['serial'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['serial'], 'length' => []],
        ],
        '_options' => [
'engine' => 'MyISAM', 'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'serial' => 1,
            'shortUrl' => 'Lorem ipsum dolor ',
            'longUrl' => 'Lorem ipsum dolor sit amet',
            'timeStamp' => 1
        ],
    ];
}
