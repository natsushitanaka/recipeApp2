<form class="inline" action="<?= $base_url; ?>/mypage/review" method="post">
  <input type="hidden" name="review" value="<?= $this->escape($menu['id']); ?>">
  <input class="submit" type="submit" value="コメントする">
</form>
