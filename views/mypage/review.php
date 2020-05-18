<?php $this->setLayoutVar('title', 'レビュー') ?>
<?php $this->setLayoutVar('css', 'mypage') ?>

<?= $this->render('mypage/layout/navi'); ?>

<div class="body">
  <h1>R<span class="fs30">eview for</span><?= $this->escape($detail['title']); ?></h1>
    <div class="body">
      <div class="commnet_form">
        <div class="comment_top">
          <form class="inline" action="" method="post">
          <textarea class="comment_area" rows="1" cols="20" type="text" name="review_form"
          placeholder="<?= $this->escape($message); ?>"></textarea>
        </div>
      <div class="comment_bottom">
        <input class="submit" type="submit" value="コメントする">
        </form>
      </div>
    </div>
  </div>
</div>
