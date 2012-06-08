    <?php use_helper('I18N') ?>

    <div class="container">
      
      <div class="row">
        <div class="span12">
        <div class="alert alert-block alert-warning fade in">
          <button class="close" data-dismiss="alert">×</button>
          <h4 class="alert-heading">ATENÇÃO!</h4>
          <p>O Astolfo está mudando e você pode colaborar enviando suas sugestões de melhorias.</p>
          <p>
            <a class="btn btn-success" href="https://spreadsheets.google.com/viewform?key=ttTqfA0XBz9_hb41cLNjwiw" target="_blank">Envie suas sugestões!</a>
          </p>
        </div>
        </div>
      </div>
      
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <div class="row">
        <div class="span6">
          <h1>Astolfo</h1>
          <!-- <h4>Para acessar o Astolfo, entre com o login e senha fornecidos.</h4> -->
          <br />
          <p>O Astolfo faz o gerenciamento de todos os web-assets da Fundação Padre Anchieta.</p>
          <p>Entre com suas credênciais ou peça a criação de sua conta.</p>
          <!-- <p><a class="btn btn-primary btn-large">Learn more »</a></p> -->
        </div>
        <?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>
        </div>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        
        <div class="span4">
          <h2>Edição de e publicação conteúdo</h2>
           <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
           <p><a class="btn" href="#">Ver detalhes »</a></p>
        </div>
        <div class="span4">
          <h2>Publicação de vídeos para o Youtube</h2>
           <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
           <p><a class="btn" href="#">Ver detalhes »</a></p>
       </div>
        <div class="span4">
          <h2>Gerenciamento de grades e EPGs</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn" href="#">Ver detalhes »</a></p>
        </div>
      </div>

      <hr />
