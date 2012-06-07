<?php use_helper('I18N', 'Date') ?>

<div class="page-header">
  <h1><?php echo __('Dashboard', array(), 'messages') ?></h1>
</div>

<?php //include_partial('display/assets') ?>
<?php //include_partial('display/flashes') ?>

<div class="row-fluid">

  <div class="span4">
    <h2>Sites Favoritos</h2>
    <ul>
      <li>Site 1</li>
      <li>Site 2</li>
    </ul>
  </div>

  <div class="span4">
    <h2>Tarefas Pendentes</h2>
    <?php if(count($todos) > 0): ?>
      <ul> 
      <?php foreach($todos as $t): ?>
        <li><?php /* <?php echo $t->getCreatedAt() ?> - */ ?><?php echo link_to($t->getTitle(), 'asset/?id='.$t->getAssetId().'&action=edit') ?></li>
      <?php endforeach; ?>
      </ul> 
    <?php else: ?>
      <h4>Nenhuma tarefa pendente</h4>
    <?php endif; ?>
  </div>

  <div class="span4">
    <h2>Assets Recentes</h2>
    <?php if(count($assets) > 0): ?>
      <ul>
      <?php foreach($assets as $a): ?>
        <li><a href="<?php echo url_for('@homepage') ?>asset/<?php echo $a->getId() ?>/edit"><?php if($a->getSiteId() > 0): ?><?php echo $a->Site->getTitle() ?>: <?php endif; ?><?php echo $a->getTitle() ?></a></li>
      <?php endforeach; ?>
      </ul> 
    <?php endif; ?>
  </div>
  
</div>

<hr />

<div class="row-fluid">

  <div class="span4">
    <h2>Ferramentas & Serviços</h2>
    <ul>
      <li>Youtube</li>
      <li>Twitter</li>
      <li>Facebook</li>
    </ul>
    <p><a class="btn" href="#">Ver detalhes »</a></p>
  </div>

  <div class="span4">
    <h2>Documentação</h2>
    <ul>
      <li>Administradores</li>
      <li>Editores</li>
      <li>Colaboradores</li>
    </ul>
    <p><a class="btn" href="#">Ver detalhes »</a></p>
  </div>

  <div class="span4">
    <h2>Server Status</h2>
    <p><a class="btn" href="#">Ver detalhes »</a></p>
  </div>
  
</div>
