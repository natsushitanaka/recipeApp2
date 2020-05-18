<form  class="inline"action="<?= $base_url; ?>/mypage/comments" method="post">
  <input class="submit margin15" type="submit" value="コメント一覧">
  <input type="hidden" name="commentList" value="<?= $this->escape($menu['id']); ?>">
</form>
