<?php use_helper('I18N', 'Date') ?>
        <div class="navbar navbar-fixed-top">
          <div class="navbar-inner">
            <div class="container">
              <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
              <a class="brand" href="<?php echo url_for('@homepage') ?>">Possum-CMS</a>
              <div class="nav-collapse">
                <ul class="nav">
                  <?php if(($sf_user->hasPermission('admin')) || ($sf_user->hasPermission('editor'))): ?>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                      <?php if($sf_user->hasPermission('admin')): ?>
                        <li class="nav-header">Admin</li>
                        <li><?php echo link_to(__('Organizations'), 'organization/index') ?></li>
                        <li><?php echo link_to(__('Channels'), 'channel/index') ?></li>
                        <!-- <li class="divider"></li>
                        <li class="nav-header">Assets & Images</li> -->
                        <li><?php echo link_to(__('Image Usage'), 'image_usage/index') ?></li>
                        <li><?php echo link_to(__('Asset Types'), 'assettype/index') ?></li>
                        <!-- <li class="divider"></li>
                        <li class="nav-header">Users</li> -->
                        <li><?php echo link_to(__('Users'), 'guard/users') ?></li>
                        <!-- <li class="divider"></li>
                        <li class="nav-header">User logs</li> -->
                        <li><?php echo link_to(__('Log'), 'log/index') ?></li>
                      <?php endif; ?>
                        <li class="divider"></li>
                        <li class="nav-header"><?php echo __('Editor')?></li>
                        <li><?php echo link_to(__('Programs'), 'program/index') ?></li>
                        <li><?php echo link_to(__('Sites'), 'site/index') ?></li>
                        <li><?php echo link_to(__('Categories'), 'category/index') ?></li>
                        <!--<li class="divider"></li>
                        <li class="nav-header">Grade & EPG</li>-->
                        <li><?php echo link_to(__('Schedule'), 'schedule/index') ?></li>
                        <li class="divider"></li>
                        <li class="nav-header"><?php echo __('Tools')?></li>
                        <!--<li class="divider"></li>
                        <li class="nav-header">Youtube</li>-->
                        <li><?php echo link_to(__('Youtube Dropbox'), 'video_dropbox/index')?></li>
                        <!--<li class="divider"></li>
                        <li class="nav-header">Twitter</li>-->
                        <li><?php echo link_to(__('Twitter Monitor'), 'tweet_monitor/index')?></li>
                        <!--<li class="divider"></li>
                        <li class="nav-header">Sony</li>-->
                        <li><?php echo link_to(__('Sonny App'), 'sony/index')?></li>
                      </ul>
                    </li>
                    <li class="divider-vertical"></li>
                  <?php endif; ?>
                  <?php if($sf_user->isAuthenticated()): ?>
                  <form class="navbar-search pull-left" action="<?php echo url_for('homepage')?>search/do" method="get">
                    <input type="text" id="search_query" name="search_query" class="search-query span2" placeholder="<?php echo __('Search Assets')?>">
                  </form>
                  <li class="divider-vertical"></li>
                  <?php endif; ?>
                </ul>
  
                <?php if($sf_user->isAuthenticated()): ?>
                <a class="btn btn-success pull-left" href="<?php echo url_for('upload/index') ?>" style="margin-right: 15px;"><i class="icon-arrow-up icon-white"></i> Upload</a>
                <a class="btn btn-primary pull-left" href="<?php echo url_for('asset/index') ?>" style="margin-right: 15px"><i class="icon-th-list icon-white"></i> Assets</a>
                <div class="btn-group pull-left">
                  <a class="btn btn-warning dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-plus icon-white"></i> Asset <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><?php echo link_to(__('Content'), 'assetnew/content'); ?></li>
                    <li><?php echo link_to(__('Image'), 'upload/index'); ?></li>
                    <li><?php echo link_to(__('Audio'), 'upload/index'); ?></li>
                    <li><?php echo link_to(__('Video'), 'upload/index'); ?></li>
                    <li><?php echo link_to(__('Youtube Vídeo'), 'assetnew/youtubevideo'); ?></li>
                    <li class="divider"></li>
                    <li><?php echo link_to(__('Episode'), 'assetnew/episode'); ?></li>
                    <li><?php echo link_to(__('Podcast'), 'assetnew/podcast'); ?></li>
                    <li><?php echo link_to(__('Playlist'), 'assetnew/playlist'); ?></li>
                    <li><?php echo link_to(__('Album'), 'assetnew/gallery'); ?></li>
                    <li class="divider"></li>
                    <li><?php echo link_to(__('Questionnaire'), 'assetnew/questionnaire'); ?></li>
                    <li><?php echo link_to(__('Question'), 'assetnew/question'); ?></li>
                    <li><?php echo link_to(__('Answer'), 'assetnew/answer'); ?></li>
                    <li class="divider"></li>
                    <li><?php echo link_to(__('Person'), 'assetnew/people'); ?></li>
                    <li class="divider"></li>
                    <li><?php echo link_to(__('Broadcast'), 'assetnew/broadcast'); ?></li>
                  </ul>
                </div>
                <a class="btn btn-danger pull-left" href="<?php echo url_for('site/index') ?>" style="margin-left: 15px"><i class="icon-folder-open icon-white"></i> Sites</a>

                <div class="btn-group pull-right">
                  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="icon-user"></i> <?php echo $sf_user->getName(); ?>
                    <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo url_for(url_for('@homepage').'guard/users/'.$sf_user->getGuardUser()->getId().'/edit') ?>">Profile</a></li>
                    <li class="divider"></li>
                    <li><?php echo link_to('To-do', 'todo/index'); ?></li>
                    <li><?php echo link_to('Sign Out', 'logout/index'); ?></li>
                  </ul>
                </div>
                <?php endif; ?>
              </div>
                
            </div><!-- /.nav-collapse -->

          </div><!-- /navbar-inner -->
        </div>
