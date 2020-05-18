<?php $this->setLayoutVar('title', 'コメント一覧') ?>
<?php $this->setLayoutVar('css', 'mypage') ?>

<?= $this->render('mypage/layout/navi'); ?>

<div class="body">
  <h1><?= $this->escape($menu_title); ?><span class="fs30">'s Comments</span></h1>

  <?php if(isset($messages) && count($messages) > 0): ?>
  <?= $this->render('messages', array('messages' => $messages, 'class' => 'warning')); ?>
<?php else: ?>

  <div class="COMMENT">
    <?php foreach($comments as $comment): ?>
    <div class="TOP">
      <p>ユーザー：<?= $this->escape($comment['user_name']); ?></p>
      <p class="border-left">投稿日：<?= $this->escape($comment['created_at']); ?></p>

      <?php if($user === $comment['user_id']): ?>
        <?= $this->render('mypage/submits/submitDelete', array('target' => $comment, 'formName' => 'Comment')); ?>
      <?php endif; ?>

    </div>
    <div class="MIDDLE">
      <p>内容：<?= $this->escape($comment['body']); ?></p>
    </div>

    <?php endforeach; ?>
  </div>
  <?php endif; ?>
</div>
