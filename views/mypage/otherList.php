<?php $this->setLayoutVar('title', '他ユーザーメニューリスト') ?>
<?php $this->setLayoutVar('css', 'mypage') ?>

<?= $this->render('mypage/layout/navi'); ?>

<div class="body">
  <h1><?= $this->escape($user); ?><span class="fs30">'s Menus</span></h1>
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
      <?= $this->render('mypage/submits/submitComments', array('menu' => $menu)); ?>
      <?= $this->render('mypage/submits/submitGood', array('menu' => $menu)); ?>
    </div>
    <div class="BODY">
      <p class="menu_body"><?= $this->escape($menu['body']); ?></p>
    </div>
  </div>
  <?php endforeach; ?>
