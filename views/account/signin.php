<?php $this->setLayoutvar('title', 'ログイン')?>
<?php $this->setLayoutvar('css', 'account')?>

<div class="top">
  <h1>My Recipes</h1>
  <h3>ログイン</h3>
</div>

<?php if(isset($messages) && count($messages) > 0): ?>
  <?= $this->render('messages', array('messages' => $messages)); ?>
<?php endif; ?>

<form action="<?= $base_url; ?>/account/authenticate" method="post">
  <input type="hidden" name="_token" value="<?= $this->escape($_token); ?>">

  <?= $this->render('account/accountForm', array(
    'user_name' => $user_name, 'password' => $password,
  )); ?>

  <input class="submit" type="submit" value="ログイン">
</form>

<a href="<?= $base_url; ?>/account/signup">アカウント登録</a>
