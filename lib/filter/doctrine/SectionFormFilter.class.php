<?php

/**
 * Section filter form.
 *
 * @package    astolfo
 * @subpackage filter
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SectionFormFilter extends BaseSectionFormFilter
{
  public function configure()
  {
	$this->disableLocalCSRFProtection();
  }
}
