<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ArticlesTable extends Table
{
    /**
     * @name  initialize
     * @param array $config configuration array
     */
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
    
    /**
     * @name validationDefault
     * @param Validator $validator validator
     * @return Validator return Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
                ->notEmpty('title')
                ->notEmpty('body');
        return $validator;
    }
    
    /**
     * @name findPublished
     * @param Query $query query
     * @param array $options options
     * @return Query return executed query
     */
    public function findPublished(Query $query, array $options)
    {
        $query->where([
            $this->alias() . '.published' => 1
        ]);
        $query->select(['id', 'title']);
        return $query;
    }
}
