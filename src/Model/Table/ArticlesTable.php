<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ArticlesTable extends Table
{
    /*
     * name @initialize
     */ 
    public function initialize(array $config)
    {        
        $this->addBehavior('Timestamp');
    }
    
    /*
     * name @validationDefault
     */
    public function validationDefault(Validator $validator)
    {    
        $validator
                ->notEmpty('title')
                ->notEmpty('body');
        return $validator;
    }
    
    /*
     * name @findPublished
     */
    public function findPublished(Query $query, array $options)
    {
        $query->where([
            $this->alias() . '.published' => 1
        ]);
        $query->select(['id','title']);
        return $query;
    }
}
