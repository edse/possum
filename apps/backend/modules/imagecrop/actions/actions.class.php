<?php

/**
 * image_crop actions.
 *
 * @package    astolfo
 * @subpackage image_crop
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class imagecropActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeCrop(sfWebRequest $request)
  {
    if($request->getParameter('asset_id')){
      //$f = end(explode("/uploads/", $request->getParameter('file')));
      //die(sfConfig::get('sf_upload_dir')."/".$f);
      //die(is_file('/Users/emersonestrella/1b76f01a780f0c92da88549293bdb29f04ab7bee.jpg'));
      $asset = Doctrine::getTable('Asset')->find($request->getParameter('asset_id'));
      //die($asset->AssetImage->getJPGFull());
      $src1 = imagecreatefromjpeg($asset->AssetImage->getJPGFull());

      $src = imagecreatetruecolor($request->getParameter('iw'), $request->getParameter('ih'));
      imagecopyresampled(
        $src, 
        $src1, 
        0, 
        0, 
        0, 
        0, 
        $request->getParameter('iw'), 
        $request->getParameter('ih'), 
        imagesx($src1), 
        imagesy($src1)
      );

      $dst = imagecreatetruecolor($request->getParameter('cw'), $request->getParameter('ch'));
      imagecopyresized(
        $dst, 
        $src, 
        0, 
        0, 
        $request->getParameter('cx'), 
        $request->getParameter('cy'), 
        $request->getParameter('iw'), 
        $request->getParameter('ih'), 
        $request->getParameter('iw'), 
        $request->getParameter('ih')
      );
      //header('Content-Type: image/jpeg');
      //imagejpeg($dst);
      $new_file = "croped-".time();
      if(imagejpeg($dst, sfConfig::get('sf_upload_dir')."/assets/image/original/".$new_file.".jpg", 100)){
        $a = new Asset();
        $a->asset_type_id = 2;
        $a->title = $asset->getTitle()." - EDIT";
        $a->description = $asset->getDescription();
        $a->user_id = $asset->getUserId();
        $a->site_id = $asset->getSiteId();
        $a->save();
        $ai = new AssetImage();
        $ai->file = $new_file;
        $ai->original_file = $new_file.".jpg";
        $ai->width = $request->getParameter('cw');
        $ai->height = $request->getParameter('ch');
        $ai->extension = "jpg";
        $ai->asset_id = $a->getId();
        $ai->save();
        $ai->convertAndResize();
        $this->getUser()->setFlash('success', 'Imagem criada com sucesso!');
        $this->redirect(array('sf_route' => 'asset_edit', 'sf_subject' => $a));
      }else{
        $this->getUser()->setFlash('error', 'Erro ao salvar o arquivo.');
      }
    }
    else if(!$request->getParameter('id')){
      $this->getUser()->setFlash('notice', 'Nenhuma imagem encontrada.');
    }
    else{
      $this->asset = Doctrine::getTable('Asset')->find($request->getParameter('id'));
      if(!$this->asset){
        $this->getUser()->setFlash('notice', 'Nenhuma imagem encontrada.');
      }
    }
  }

  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('asset', 'index');
    $this->getUser()->setFlash('notice', 'Nenhuma imagem encontrada.');
  }
}
