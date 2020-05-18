<form class="inline" action="<?= $base_url; ?>/mypage/editMenu" method="post">
  <input class="submit margin15" type="submit" value="編集する">
  <input type="hidden" name="editMenuId" value="<?= $this->escape($menu['id']); ?>">
</form>
