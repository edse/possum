<?php

/**
 * TrebuchetCategory form.
 *
 * @package    astolfo
 * @subpackage form
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TrebuchetCategoryForm extends BaseTrebuchetCategoryForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
  }
}
