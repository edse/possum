<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version25 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->changeColumn('tweet', 'content', 'text', '610', array(
             'notnull' => '1',
             ));
    }

    public function down()
    {

    }
}