<?php $this->setLayoutVar('title', 'メニュー編集') ?>
<?php $this->setLayoutVar('css', 'mypage') ?>

<?= $this->render('mypage/layout/navi'); ?>

<div class="body">
  <h1><?= $this->escape($detail['title']); ?><span class="fs30">'s Recipe【edit】</span></h1>

  <?php if(isset($messages) && count($messages) > 0): ?>
    <?= $this->render('messages', array('messages' => $messages, 'class' => 'notice')); ?>
  <?php endif; ?>

  <div class="add_form">
    <form action="" method="post">
    <div class="left">
      <input type="hidden" name="eid" value="<?= $this->escape($detail['id']); ?>">
      <input class="addMenu" type="text" maxlength="40" name="etitle" value="<?= $this->escape($detail['title']); ?>">
      <input class="addMenu" type="text" maxlength="40" name="eappeal" value="<?= $this->escape($detail['appeal']); ?>">
      <input class="addCost" type="text" name="ecost" value="<?= $this->escape($detail['cost']); ?>">
      <select class="category" name="ecategory" value="<?= $this->escape($detail['category']); ?>">
        <option value="No Category">--Category--</option>
        <option value="前菜">前菜</option>
        <option value="サラダ">サラダ</option>
        <option value="メイン">メイン</option>
        <option value="ご飯・麺">ご飯・麺</option>
        <option value="おつまみ">おつまみ</option>
        <option value="ドリンク">ドリンク</option>
      </select>
      <input class="add" type="submit" value="変更する">
    </div>
    <div class="right">
      <textarea class="textarea" rows="15" cols="65" name="ebody"><?= $this->escape($detail['body']); ?></textarea>
    </div>
    </form>
  </div>
</div>
