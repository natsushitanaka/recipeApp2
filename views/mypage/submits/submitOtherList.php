<form class="inline" action="<?= $base_url; ?>/mypage/otherList" method="post">
  <input class="big submit" type="submit" value="<?= $this->escape($menu['user_name']); ?>のレシピ一覧">
  <input type="hidden" name="otherUserName" value="<?= $this->escape($menu['user_name']); ?>">
</form>
