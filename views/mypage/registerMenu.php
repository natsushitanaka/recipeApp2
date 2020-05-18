<?php $this->setLayoutVar('title', '新メニュー登録') ?>
<?php $this->setLayoutVar('css', 'mypage') ?>

<?= $this->render('mypage/layout/navi'); ?>

<div class="body">
  <h1>N<span class="fs30">ew Recipe</span></h1>

  <?php if(isset($messages) && count($messages) > 0): ?>
    <?= $this->render('messages', array('messages' => $messages, 'class' => 'notice')); ?>
  <?php endif; ?>

  <div class="add_form">
    <form action="" method="post">
    <div class="left">
      <input class="addMenu" type="text" maxlength="40" name="title" placeholder="  料理名：（全角20字以内）">
      <input class="addMenu" type="text" maxlength="40" name="appeal" placeholder="  ひとことアピール：（全角20字以内）">
      <input class="addCost" type="text" name="cost" placeholder="  原価：（円）">
      <select class="category" name="category">
        <option value="No Category">--Category--</option>
        <option value="前菜">前菜</option>
        <option value="サラダ">サラダ</option>
        <option value="メイン">メイン</option>
        <option value="ご飯・麺">ご飯・麺</option>
        <option value="おつまみ">おつまみ</option>
        <option value="ドリンク">ドリンク</option>
      </select>
      <input class="add" type="submit" value="追加する">
    </div>
    <div class="right">
      <textarea class="textarea" rows="15" cols="65" name="body" placeholder="Recipe:"></textarea>
    </div>
    </form>
  </div>
</div>
