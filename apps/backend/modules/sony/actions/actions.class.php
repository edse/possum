<?php

require_once dirname(__FILE__).'/../lib/sonyGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/sonyGeneratorHelper.class.php';

/**
 * sony actions.
 *
 * @package    astolfo
 * @subpackage sony
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sonyActions extends autoSonyActions
{


  public function executeIndex(sfWebRequest $request){
    $this->push_url = 'http://dev.internet.sony.tv/trebuchet/remoteCommands/TREBpushImport/?service_name='.urlencode('BR-Cultura').'&method=fromFeed&feed_id=6264&timestamp='.urlencode($this->makeRFC3339(time()));
    $sig=md5($this->push_url . 'aeghieMooy3bo');
    $this->push_url .= "&sig=".$sig;
    parent::executeIndex($request);    
  }

	public function executeListAssets(sfWebRequest $request){
		//$this->redirect('@asset?section_id='.$request->getParameter('id'));
		//$this->forward('asset', 'index', array('section_id' => $request->getParameter('id')));
		$this->forward('sony_category_assets', 'index', array('category_id' => $request->getParameter('id'), 'category' => $this->getRoute()->getObject()));
	}
	
	public function executeAjaxupdate(sfWebRequest $request)
	{
		$this->setLayout(false);
	  $this->query = Doctrine_Query::create()
			->select('c.*')
			->from('SonyCategory c')
			->orderBy('c.display_order');
	  $this->pager = $this->getPager();
		$this->sort = $this->getSort();
	}
	
	protected function getPager()
	{
		$pager = $this->configuration->getPager('SonyCategory');
		$pager->setQuery($this->query);
		$pager->setPage($this->getPage());
		$pager->init();
		return $pager;
	}
	
	public function executeAjaxorder(sfWebRequest $request)
	{
		$order = 1;
		foreach($request->getParameter('listItem') as $i){
			$cat = Doctrine::getTable('SonyCategory')->find($i);
			if($cat){
				$cat->setDisplayOrder($order);
				$cat->save();
				$order++;
			}
		}
		die();
	}

	public function executeAjaxdelete(sfWebRequest $request)
	{
		$this->setLayout(false);
		$cat = Doctrine::getTable('SonyCategory')->find($request->getParameter('id'));
		if($cat)
			$cat->delete();
		die();
	}
	


  public function executeListDeactivate(sfWebRequest $request)
  {
    $this->setLayout(false);
    if($request->getParameter('id') > 0){
      $obj = Doctrine::getTable('SonyCategory')->find($request->getParameter('id'));
      if($obj){
        $obj->setIsActive(0);
        $obj->save();
      }
    }
    $this->redirect($this->generateUrl("homepage")."sony");
  }

  public function executeListActivate(sfWebRequest $request)
  {
    $this->setLayout(false);
    if($request->getParameter('id') > 0){
      $obj = Doctrine::getTable('SonyCategory')->find($request->getParameter('id'));
      if($obj){
        $obj->setIsActive(1);
        $obj->save();
      }
    }
    $this->redirect($this->generateUrl("homepage")."sony");
  }


	public function executeGenerateXML(sfWebRequest $request){

	  	$categories = Doctrine_Query::create()
			->select('c.*')
			->from('SonyCategory c')
			->where('c.id != ?', 1)
			->andWhere('c.is_active = ?', 1)
			->orderBy('c.display_order')
			->execute();

		$root = Doctrine::getTable('SonyCategory')->find(1);

		//$categories = Doctrine::getTable('SonyCategory')->findAll();

		$xml = <<<EOT
<?xml version="1.0" encoding="UTF-8" ?>
<trebuchet version="2">
  <header>
    <config> 
      <fallback_language>pt</fallback_language>
      <playlist_enabled>true</playlist_enabled>
      <rebuffering_url threshold="0">http://200.136.27.181/sony-rebuffer/rebuffer.php</rebuffering_url>
    </config>
  </header>
  
  <regions>
    <region id="1">
      <country fallback_language="pt">BR</country> <!-- Brazil -->
      <country fallback_language="pt">US</country> <!-- United States -->
    </region>
  </regions>

  <root_category id="RootCategory">
    <default_icons>
      <icon_std>http://200.136.27.50/sony/categories/{$root->getImage()}</icon_std>
    </default_icons>
    <languages>
      <language id="pt">
      	<title>{$root->getTitle()}</title>
      	<description>{$root->getDescription()}</description>
      </language>     
    </languages>

EOT;
		$order = 1;
		foreach($categories as $c){

			$xml .= <<<EOT

    <category id="{$c->getSlug()}" style="tile" order="{$order}">
      <region_ref id="1"/>
      <default_icons>
        <icon_std>http://200.136.27.50/sony/categories/{$c->getImage()}</icon_std>
      </default_icons>
      <languages>
      	<language id="pt">
      	  <title>{$c->getTitle()}</title>
      	  <description>{$c->getDescription()}</description>
      	</language>
      </languages>
    </category>

EOT;

			$order++;
		}

		$xml .= <<<EOT

  </root_category>

  <assets>
EOT;

		$order = 0;
		foreach($categories as $c){


      $assets = Doctrine_Query::create()
        ->select('a.*')
        ->from('SonyAsset a, SonyCategoryAsset ca')
        ->where('a.id = ca.sony_asset_id')
        ->andWhere('ca.sony_category_id = ?', (int)$c->getId())
        ->orderBy('ca.display_order asc')
        ->execute();

			//$assets = $c->getAssets();

			foreach($assets as $a){
				$order++;
        //sizeof("http://200.136.27.50/assets/".$c->getSlug()."/".$a->getYoutubeId().".jpg")
        if($a->getDescription() != "" && $a->getDuration() > 0){

				$xml .= <<<EOT

    <asset id="{$a->getYoutubeId()}" pay_content="false">
      <region_ref id="1" />
      <in_category id="{$c->getSlug()}" order="{$order}" />
      <type>video</type>
      <default_icons>
        <icon_std>http://200.136.27.50/assets/{$c->getSlug()}/{$a->getYoutubeId()}.jpg</icon_std>
      </default_icons>
      <languages>
        <language id="pt">
    	  <title>{$a->getTitle()}</title>
	      <description>{$a->getDescription()}</description>
        </language>
      </languages>
      <asset_url bitrate="3000">http://200.136.27.50/assets/{$c->getSlug()}/{$a->getYoutubeId()}-1.mp4</asset_url>
      <asset_url bitrate="700">http://200.136.27.50/assets/{$c->getSlug()}/{$a->getYoutubeId()}-2.mp4</asset_url>
      <rating scheme="urn:age">1</rating>
      <duration>{$a->getDuration()}</duration>
      <metafile_type>m3u</metafile_type>
      <container_type>MP4</container_type>
      <video_type>AVC</video_type>
      <audio_type>AAC</audio_type>      
    </asset>
EOT;

      }

			}

		}

		$xml .= <<<EOT

  </assets>

</trebuchet>
EOT;

		$fp = fopen('/var/astolfo/web/uploads/storage/sony/ingest.xml', 'w');
		fwrite($fp, $xml);
		fclose($fp);
    
    $this->getUser()->setFlash('notice', 'XML criado com sucesso!');
    $this->redirect('@sony');
	}


  public function makeRFC3339($timestamp) {
    $timestring=date("Y-m-d\TH:i:s",$timestamp);
    $offset=date("O");
    for ($i=0; $i<5; $i++) {
      $timestring.=$offset[$i];
      if ($i==2) {
        $timestring.=':';
      }
    }
    return $timestring;
  }

	
}
