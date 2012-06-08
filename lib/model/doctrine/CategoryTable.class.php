<?php

/**
 * CategoryTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CategoryTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object CategoryTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Category');
    }
    
    public function findAll2()
    {
    	$sql = Doctrine_Query::create()
    	->select('c.*')
    	->from('Category c')
    	->where('c.is_active = 1')
    	->orderBy('c.title');
    	return  $sql;
    }
    
}