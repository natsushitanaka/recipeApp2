<?php $this->setLayoutVar('title', 'マイメニューリスト') ?>
<?php $this->setLayoutVar('css', 'mypage') ?>

<?= $this->render('mypage/layout/navi'); ?>

<div class="body">
  <h1><?= $this->escape($_SESSION['user']['user_name']); ?><span class="fs30">'s Menus</span></h1>

  <?php if(isset($messages) && count($messages) > 0): ?>
  <?= $this->render('messages', array('messages' => $messages, 'class' => 'warning')); ?>
  <?php endif; ?>

  <?php foreach($menus as $menu): ?>
  <div class="LIST">
    <div class="TOP">
      <p>料理名：<?= $this->escape($menu['title']); ?></p>
      <?= $this->render('mypage/submits/submitDelete', array('target' => $menu, 'formName' => '')); ?>
    </div>
    <div class="TOP">
      <p><?= $this->escape($menu['category']); ?></p>
      <p class="border-left">いいね！：<?= $this->escape($menu['good']); ?></p>
      <p class="border-left">投稿日：<?= $this->escape($menu['created_at']); ?></p>
    </div>
    <div class="MIDDLE">
      <?= $this->render('mypage/submits/submitDetail', array('menu' => $menu)); ?>
      <?= $this->render('mypage/submits/submitComments', array('menu' => $menu)); ?>
      <?= $this->render('mypage/submits/submitEdit', array('menu' => $menu)); ?>
    </div>
    <?php if($menu['appeal'] !== null): ?>
    <div class="BODY">
      <p class="menu_body"><?= $this->escape($menu['appeal']); ?></p>
    </div>
    <?php endif; ?>
  </div>
<?php endforeach; ?>
</div>
