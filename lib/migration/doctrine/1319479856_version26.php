<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version26 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('program', 'is_a_course', 'boolean', '25', array(
             'default' => '0',
             ));
    }

    public function down()
    {
        $this->removeColumn('program', 'is_a_course');
    }
}