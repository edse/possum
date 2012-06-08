    <?php use_helper('I18N') ?>

    <div class="container">
      
      <div class="row">
        <div class="span12">
        <div class="alert alert-block alert-warning fade in">
          <button class="close" data-dismiss="alert">×</button>
          <h4 class="alert-heading"><?php echo __('Warning', array(), 'messages') ?>!</h4>
          <p><?php echo sfConfig::get('app_name').__(' is changing and you can help by sending your feedback', array(), 'messages') ?>.</p>
          <p>
            <a class="btn btn-success" href="https://spreadsheets.google.com/viewform?key=ttTqfA0XBz9_hb41cLNjwiw" target="_blank"><?php echo __('Send your feedback', array(), 'messages') ?>!</a>
          </p>
        </div>
        </div>
      </div>
      
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <div class="row">
        <div class="span6">
          <h1><?php echo sfConfig::get('app_name')?></h1>
          <!-- <h4>Para acessar o Astolfo, entre com o login e senha fornecidos.</h4> -->
          <br />
          <p><?php echo sfConfig::get('app_name').__(' is an open source Content Management System that allows you easily manage multiple websites at same time', array(), 'messages') ?>.</p>
          <h2><?php echo __('Try it now', array(), 'messages') ?></h2>
          <p><?php echo __('Sign-in with the email: test, and password: test', array(), 'messages') ?></p>
          <!-- <p><a class="btn btn-primary btn-large">Learn more »</a></p> -->
        </div>
        <?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>
        </div>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        
        <div class="span4">
          <h2><?php echo __('Editing and publishing content', array(), 'messages') ?></h2>
           <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
           <p><a class="btn" href="#"><?php echo __('Details', array(), 'messages') ?> »</a></p>
        </div>
        <div class="span4">
          <h2><?php echo __('Youtube Integration', array(), 'messages') ?></h2>
           <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
           <p><a class="btn" href="#"><?php echo __('Details', array(), 'messages') ?> »</a></p>
       </div>
        <div class="span4">
          <h2><?php echo __('Calendar and scheduling system', array(), 'messages') ?></h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn" href="#"><?php echo __('Details', array(), 'messages') ?> »</a></p>
        </div>
      </div>

      <hr />
