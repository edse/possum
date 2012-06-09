    <?php use_helper('I18N') ?>
        <div class="navbar navbar-fixed-top">
          <div class="navbar-inner">
            <div class="container">
              <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
              <a class="brand" href="<?php echo url_for('@homepage') ?>"><?php echo sfConfig::get('app_name')?></a>
              <div class="nav-collapse">
                <ul class="nav">
                  <?php if(($sf_user->hasPermission('admin')) || ($sf_user->hasPermission('editor'))): ?>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                      <?php if($sf_user->hasPermission('admin')): ?>
                        <li class="nav-header"><?php echo __('Admin', array(), 'messages') ?></li>
                        <li><?php echo link_to(__('Organizations', array(), 'messages'), 'organization/index') ?></li>
                        <li><?php echo link_to(__('Channels', array(), 'messages'), 'channel/index') ?></li>
                        <!-- <li class="divider"></li>
                        <li class="nav-header">Assets & Images</li> -->
                        <li><?php echo link_to(__('Images Sizes', array(), 'messages'), 'image_usage/index') ?></li>
                        <li><?php echo link_to(__('Assets Types', array(), 'messages'), 'assettype/index') ?></li>
                        <!-- <li class="divider"></li>
                        <li class="nav-header">Users</li> -->
                        <li><?php echo link_to(__('Users', array(), 'messages'), 'guard/users') ?></li>
                        <!-- <li class="divider"></li>
                        <li class="nav-header">User logs</li> -->
                        <li><?php echo link_to(__('Logs', array(), 'messages'), 'log/index') ?></li>
                      <?php endif; ?>
                        <li class="divider"></li>
                        <li class="nav-header"><?php echo __('Editor', array(), 'messages')?></li>
                        <li><?php echo link_to(__('Program', array(), 'messages'), 'program/index') ?></li>
                        <li><?php echo link_to(__('Sites', array(), 'messages'), 'site/index') ?></li>
                        <li><?php echo link_to(__('Categories', array(), 'messages'), 'category/index') ?></li>
                        <!--<li class="divider"></li>
                        <li class="nav-header">Grade & EPG</li>-->
                        <li><?php echo link_to(__('Schedule', array(), 'messages'), 'schedule/index') ?></li>
                        <li class="divider"></li>
                        <li class="nav-header"><?php echo __('Tools', array(), 'messages')?></li>
                        <!--<li class="divider"></li>
                        <li class="nav-header">Youtube</li>-->
                        <li><?php echo link_to(__('Youtube Dropbox', array(), 'messages'), 'video_dropbox/index')?></li>
                        <!--<li class="divider"></li>
                        <li class="nav-header">Twitter</li>-->
                        <li><?php echo link_to(__('Twitter Monitor', array(), 'messages'), 'tweet_monitor/index')?></li>
                        <!--<li class="divider"></li>
                        <li class="nav-header">Sony</li>-->
                        <li><?php echo link_to(__('Sony App', array(), 'messages'), 'sony/index')?></li>
                      </ul>
                    </li>
                    <li class="divider-vertical"></li>
                  <?php endif; ?>
                  <?php if($sf_user->isAuthenticated()): ?>
                  <form class="navbar-search pull-left" action="<?php echo url_for('homepage')?>search/do" method="get">
                    <input type="text" id="search_query" name="search_query" class="search-query span2" placeholder="<?php echo __('Asset Search', array(), 'messages')?>">
                  </form>
                  <li class="divider-vertical"></li>
                  <?php endif; ?>
                </ul>
  
                <?php if($sf_user->isAuthenticated()): ?>
                <a class="btn btn-success pull-left" href="<?php echo url_for('upload/index') ?>" style="margin-right: 15px;"><i class="icon-arrow-up icon-white"></i> <?php echo __('Upload', array(), 'messages')?></a>
                <a class="btn btn-primary pull-left" href="<?php echo url_for('asset/index') ?>" style="margin-right: 15px"><i class="icon-th-list icon-white"></i> <?php echo __('Assets', array(), 'messages')?></a>
                <div class="btn-group pull-left">
                  <a class="btn btn-warning dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-plus icon-white"></i> <?php echo __('Asset', array(), 'messages')?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><?php echo link_to(__('Content', array(), 'messages'), 'assetnew/content'); ?></li>
                    <li><?php echo link_to(__('Image', array(), 'messages'), 'upload/index'); ?></li>
                    <li><?php echo link_to(__('Audio', array(), 'messages'), 'upload/index'); ?></li>
                    <li><?php echo link_to(__('Video', array(), 'messages'), 'upload/index'); ?></li>
                    <li><?php echo link_to(__('Youtube Video', array(), 'messages'), 'assetnew/video'); ?></li>
                    <li class="divider"></li>
                    <li><?php echo link_to(__('Episode', array(), 'messages'), 'assetnew/episode'); ?></li>
                    <li><?php echo link_to(__('Podcast', array(), 'messages'), 'assetnew/podcast'); ?></li>
                    <li><?php echo link_to(__('Playlist', array(), 'messages'), 'assetnew/playlist'); ?></li>
                    <li><?php echo link_to(__('Album', array(), 'messages'), 'assetnew/gallery'); ?></li>
                    <li class="divider"></li>
                    <li><?php echo link_to(__('Questionnaire', array(), 'messages'), 'assetnew/questionnaire'); ?></li>
                    <li><?php echo link_to(__('Question', array(), 'messages'), 'assetnew/question'); ?></li>
                    <li><?php echo link_to(__('Answer', array(), 'messages'), 'assetnew/answer'); ?></li>
                    <li class="divider"></li>
                    <li><?php echo link_to(__('Person', array(), 'messages'), 'assetnew/people'); ?></li>
                    <li class="divider"></li>
                    <li><?php echo link_to(__('Broadcast', array(), 'messages'), 'assetnew/broadcast'); ?></li>
                  </ul>
                </div>
                <a class="btn btn-danger pull-left" href="<?php echo url_for('site/index') ?>" style="margin-left: 15px"><i class="icon-folder-open icon-white"></i> <?php echo __('Sites', array(), 'messages')?></a>

                <div class="btn-group pull-right">
                  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="icon-user"></i> <?php echo $sf_user->getName(); ?>
                    <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo url_for(url_for('@homepage').'guard/users/'.$sf_user->getGuardUser()->getId().'/edit') ?>"><?php echo __('Profile', array(), 'messages')?></a></li>
                    <li class="divider"></li>
                    <li><?php echo link_to(__('To-do', array(), 'messages'), 'todo/index'); ?></li>
                    <li><?php echo link_to(__('Sign-Out', array(), 'messages'), 'logout/index'); ?></li>
                  </ul>
                </div>
                <?php endif; ?>
              </div>
                
            </div><!-- /.nav-collapse -->

          </div><!-- /navbar-inner -->
        </div>
