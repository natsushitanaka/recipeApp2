<?php $this->setLayoutVar('title', 'レシピ詳細') ?>
<?php $this->setLayoutVar('css', 'mypage') ?>

<?= $this->render('mypage/layout/navi'); ?>

<h1>D<span class="fs30">etail Recipe</span></h1>
<div class="body">
  <div class="add_form">
    <div class="left">
      <p class="addMenu fs15">料理名：</p>
      <p class="addMenu border"><?= $this->escape($detail['title']); ?></p>
      <p class="addMenu fs15">ひとことアピール：</p>
      <p class="addMenu border"><?= $this->escape($detail['appeal']); ?></p>
      <p class="addCost fs15">カテゴリー：</p>
      <p class="addCost border"><?= $this->escape($detail['category']); ?></p>
      <p class="category fs15">原価：</p>
      <p class="category border"><?= $this->escape($detail['cost']); ?>円</p>
    </div>
    <div class="right text_border">
      <p>   レシピ：</p>
      <p>   <?= $this->escape($detail['body']); ?></p>
    </div>
    </form>
  </div>
</div>
