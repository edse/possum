            <?php if ($form->hasGlobalErrors()): ?>
            <ul class="nav nav-list">
            <?php foreach ($form->getGlobalErrors() as $name => $error): ?>
              <li class="nav-header">Error</li>
              <li><?php echo $error ?></li>
            <?php endforeach; ?>
            </ul>
            <?php endif; ?>

            <div class="span4" style="margin-top: 15px">
              <form class="form-horizontal" id="signin" method="post" action="<?php echo url_for('@sf_guard_signin') ?>">
                <fieldset>
                  <div class="control-group">
                    <label class="control-label" for="signin_username"><?php echo __('Email', array(), 'messages') ?></label>
                    <div class="controls">
                      <input type="text" class="input-medium" id="signin_username" name="signin[username]" placeholder="<?php echo __('Enter your email address', array(), 'messages') ?>" />
                      <!--<p class="help-block">Entre com seu endereço de email</p>-->
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="signin_password"><?php echo __('Password', array(), 'messages') ?></label>
                    <div class="controls">
                      <input type="password" class="input-medium" id="signin_password" name="signin[password]" placeholder="<?php echo __('Enter your password', array(), 'messages') ?>" />
                      <!--<p class="help-block">Entre com sua senha</p>-->
                    </div>
                  </div>
                  <!--
                  <div class="control-group">
                    <label class="control-label" for="optionsCheckbox2">Continuar conectado:</label>
                    <div class="controls">
                      <label class="checkbox">
                        <input type="checkbox" id="optionsCheckbox2" value="option1">Lembre-me
                      </label>
                    </div>
                  </div>
                  -->
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary" id="btn1"><?php echo __('Sign In', array(), 'messages') ?></button>
                    <button id="cancel" class="btn"><?php echo __('Cancel', array(), 'messages') ?></button>
                  </div>
                </fieldset>
                <?php echo $form->renderHiddenFields() ?>
              </form>
            </div>
            <script>
              $(document).ready(function(){
                $("#cancel").click(function() {
                  self.location.href='http://cmais.com.br';
                });
                $('#signin').validate({
                  rules: {
                    "signin[username]": {
                      required: true/*,
                      email: true*/
                    },
                    "signin[password]": {
                      required: true
                    }
                  },
                  highlight: function(label) {
                    $(label).closest('.control-group').addClass('error');
                  },
                  success: function(label) {
                    label
                      .text('OK!').addClass('valid')
                      .closest('.control-group').addClass('success');
                  }
                });
              });
            </script>