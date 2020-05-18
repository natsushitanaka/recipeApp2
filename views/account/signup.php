<?php $this->setLayoutVar('title', 'アカウント登録') ?>
<?php $this->setLayoutvar('css', 'account')?>

<div class="top">
  <h1>My Recipes</h1>
  <h3>アカウント登録</h3>
</div>

<?php if(isset($messages) && count($messages) > 0): ?>
  <?= $this->render('messages', array('messages' => $messages)); ?>
<?php endif; ?>

<form action="<?= $base_url; ?>/account/register" method="post">
  <input type="hidden" name="_token" value="<?= $this->escape($_token); ?>">

  <?= $this->render('account/accountForm', array(
    'user_name' => $user_name, 'password' => $password,
  )); ?>

  <input class="submit" type="submit" value="登録">
</form>
<a href="<?= $base_url; ?>/account">ログイン画面へ</a>
