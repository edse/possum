<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version27 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addIndex('program', 'is_in_menu_idx', array(
             'fields' => 
             array(
              0 => 'is_in_menu',
             ),
             ));
        $this->addIndex('program', 'is_a_course_idx', array(
             'fields' => 
             array(
              0 => 'is_a_course',
             ),
             ));
    }

    public function down()
    {
        $this->removeIndex('program', 'is_in_menu_idx', array(
             'fields' => 
             array(
              0 => 'is_in_menu',
             ),
             ));
        $this->removeIndex('program', 'is_a_course_idx', array(
             'fields' => 
             array(
              0 => 'is_a_course',
             ),
             ));
    }
}