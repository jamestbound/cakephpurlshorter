<?php
namespace App\Model\Table;

use App\Model\Entity\ShortUrl;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShortUrls Model
 */
class ShortUrlsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('short_urls');
        $this->displayField('serial');
        $this->primaryKey('serial');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('serial', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('serial', 'create')
            ->requirePresence('shortUrl', 'create')
            ->notEmpty('shortUrl')
            ->requirePresence('longUrl', 'create')
            ->notEmpty('longUrl')
            ->add('timeStamp', 'valid', ['rule' => 'numeric'])
            ->requirePresence('timeStamp', 'create')
            ->notEmpty('timeStamp');

        return $validator;
    }
}
