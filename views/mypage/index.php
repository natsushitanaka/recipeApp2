<?php $this->setLayoutVar('title', 'ホーム') ?>
<?php $this->setLayoutVar('css', 'mypage') ?>

<?= $this->render('mypage/layout/navi'); ?>

  <div class="body">
    <h1 class="homeh1"><span class="fs30">Welcome to</span>My Recipes</span></h1>
    <div class="find_menu">
      <form action="<?= $base_url; ?>/mypage/request" method="post">
        <input type="hidden" name="_token" value="<?= $this->escape($_token); ?>">
        <input class="find" type="text" name="find_freeword" placeholder="  メニュー検索：">
        <select class="homeSelect" name="find_category">
          <option value="No Category">--Category--</option>
          <option value="前菜">前菜</option>
          <option value="サラダ">サラダ</option>
          <option value="メイン">メイン</option>
          <option value="ご飯・麺">ご飯・麺</option>
          <option value="おつまみ">おつまみ</option>
          <option value="ドリンク">ドリンク</option>
        </select>
        <input class="find_submit" type="submit" value="検索">
      </form>
    </div>
  </div>
