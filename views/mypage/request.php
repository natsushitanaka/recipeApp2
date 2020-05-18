<?php $this->setLayoutVar('title', 'リクエスト') ?>
<?php $this->setLayoutVar('css', 'mypage') ?>

<?= $this->render('mypage/layout/navi'); ?>

<div class="body">
  <h1>R<span class="fs30">equest Menus</span>
  <span class="fs20 margin15 marginleft50">Free word:【<?= $this->escape($find_freeword); ?>】
  </span><span class="fs20 margin15">Category:【<?= $this->escape($find_category); ?>】</span></h1>

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
      <?php if($this->escape($user_id) !== $this->escape($menu['user_id'])): ?>
        <?= $this->render('mypage/submits/submitGood', array('menu' => $menu)); ?>
      <?php endif; ?>
    </div>
    <div class="BODY">
      <p><?= $this->escape($menu['body']); ?></p>
    </div>
  </div>
  <?php endforeach; ?>
