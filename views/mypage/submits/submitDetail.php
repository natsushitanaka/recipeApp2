<form class="inline" action="<?= $base_url; ?>/mypage/detail" method="post">
  <input class="submit margin15" type="submit" value="レシピ詳細">
  <input type="hidden" name="detail" value="<?= $this->escape($menu['id']); ?>">
</form>
