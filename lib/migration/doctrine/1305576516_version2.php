<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version2 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('message', 'email', 'string', '255', array(
             ));
    }

    public function down()
    {
        $this->removeColumn('message', 'email');
    }
}