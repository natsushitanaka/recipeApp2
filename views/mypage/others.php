<?php $this->setLayoutVar('title', '他ユーザーメニューリスト') ?>
<?php $this->setLayoutVar('css', 'mypage') ?>

<?= $this->render('mypage/layout/navi'); ?>

<div class="body">
  <h1>O<span class="fs30">ther's Recipes</span></h1>

  <?php if(isset($messages) && count($messages) > 0): ?>
  <?= $this->render('messages', array('messages' => $messages, 'class' => 'warning')); ?>
  <?php endif; ?>

<?php foreach($menus as $menu): ?>
<div class="LIST">
  <div class="TOP">
    <p>料理名：<?= $this->escape($menu['title']); ?></p>
  </div>
  <div class="TOP">
    <p>ユーザー：<?= $this->escape($menu['user_name']); ?></p>
    <p class="border-left"><?= $this->escape($menu['category']); ?></p>
    <p class="border-left">いいね！：<?= $this->escape($menu['good']); ?></p>
    <p class="border-left">投稿日：<?= $this->escape($menu['created_at']); ?></p>
  </div>
  <div class="MIDDLE">
    <?= $this->render('mypage/submits/submitDetail', array('menu' => $menu)); ?>
    <?= $this->render('mypage/submits/submitReview', array('menu' => $menu)); ?>
    <?= $this->render('mypage/submits/submitOtherList', array('menu' => $menu)); ?>
    <?= $this->render('mypage/submits/submitComments', array('menu' => $menu)); ?>
    <?= $this->render('mypage/submits/submitGood', array('menu' => $menu)); ?>
  </div>
  <?php if($menu['appeal'] !== null): ?>
  <div class="BODY">
    <p class="menu_body"><?= $this->escape($menu['appeal']); ?></p>
  </div>
  <?php endif; ?>
  </div>
</div>
<?php endforeach; ?>
