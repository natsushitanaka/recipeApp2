<div class="account">
  <span class="login">ログインユーザー：<span class="login_user"><?= $this->escape($_SESSION['user']['user_name']); ?></span>
  <form class="logout_form" action="<?= $base_url; ?>/account/signout" method="post">
    <input type="hidden" name="logout" value="<?= $this->escape($_SESSION['user']['user_name']); ?>">
    <input class="logout" type="submit" value="ログアウト"><br>
  </form>
</div>
<div class="navi">
  <a class="blue" href="<?= $base_url; ?>">HOME</a>
  <a class="green" href="<?= $base_url; ?>/mypage/registerMenu">新メニュー登録</a>
  <a class="white" href="<?= $base_url; ?>/mypage/myMenuList">マイメニューリスト</a>
  <a class="red" href="<?= $base_url; ?>/mypage/others">他のユーザーのレシピ</a>
</div>
