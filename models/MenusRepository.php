<?php

class MenusRepository extends DbRepository
{
  public function onMenus($user_id, $title, $appeal, $category, $body, $cost)
    {
    $sql = "insert into menus(user_id, title, appeal, category, body, cost, good, created_at) values(:user_id, :title, :appeal, :category, :body, :cost, :good, now())";
    $stmt = $this->execute($sql, array(
      ':user_id' => $user_id,
      ':title' => $title,
      ':appeal' => $appeal,
      ':category' => $category,
      ':body' => $body,
      ':cost' => $cost,
      ':good' => 0,
    ));
  }

  public function getMyMenuAmount($user_id)
  {
    $sql = "select count(id) from menus where user_id = :user_id";
    return $this->fetch($sql, array(
      ':user_id' => $user_id,
    ));
  }

  public function isUniqueMenuTitle($title)
  {
    $sql = "select count(id) as count from menus where title = :title";

    $row = $this->fetch($sql, array(
      ':title' => $title,
    ));
    if($row['count'] === '0'){
        return true;
    }
        return false;
  }

  public function isUniqueEditMenuTitle($title, $preTitle)
  {
    $sql = "select count(id) as count from menus where title = :title";

    $row = $this->fetch($sql, array(
      ':title' => $title,
    ));
    if($row['count'] === '0' || $title === $preTitle){
        return true;
    }
        return false;
  }

  public function getMyAllMenus($user_id)
  {
    $sql = "select menus.id, menus.title, menus.body, menus.cost, menus.user_id, menus.created_at, menus.good, menus.category, menus.appeal, user.user_name
    from menus left join user on menus.user_id = user.id where menus.user_id = :id order by menus.created_at desc";

    return $this->fetchAll($sql, array(
      ':id' => $user_id,
    ));
  }

  public function getAllMenus($user_id)
  {
    $sql = "select menus.id, menus.title, menus.body, menus.cost, menus.user_id, menus.created_at, menus.good, menus.category, menus.appeal, user.user_name
    from menus left join user on menus.user_id = user.id where menus.user_id != :id order by menus.created_at desc";
    return $this->fetchAll($sql, array(
      ':id' => $user_id
    ));
  }

  public function getDetail($id)
  {
    $sql = "select * from menus where id = :id";
    return $this->fetch($sql, array(
      ':id' => $id
    ));
  }

  public function editMenu($id, $title, $appeal, $category, $body, $cost)
    {
      $sql = "update menus set
          title = :title,
          appeal = :appeal,
          category = :category,
          body = :body,
          cost = :cost,
          created_at = now()
          where id = :id
      ";
      $stmt = $this->execute($sql, array(
        ':title' => $title,
        ':appeal' => $appeal,
        ':category' => $category,
        ':body' => $body,
        ':cost' => $cost,
        ':id' => $id
      ));
    }
  public function addGood($id)
    {
      $sql = "update menus set
          good = good +1
          where id = :id
      ";
      $stmt = $this->execute($sql, array(
        ':id' => $id
      ));
    }

  public function deleteMenu($id)
    {
      $sql = "delete from menus where id = :id";

      $stmt = $this->execute($sql, array(
        ':id' => $id,
      ));
    }

  public function findMenu($find_freeword, $find_category)
    {
      if($find_category !== null){
        $sql = "select menus.id, menus.title, menus.body, menus.cost, menus.user_id, menus.created_at, menus.good, menus.category, menus.appeal, user.user_name
        from menus left join user on menus.user_id = user.id where category = :category and title like :title order by menus.created_at desc";
      }else{
        $sql = "select menus.id, menus.title, menus.body, menus.cost, menus.user_id, menus.created_at, menus.good, menus.category, menus.appeal, user.user_name
        from menus left join user on menus.user_id = user.id where title like :title order order by menus.created_at desc";
      }
      return $this->fetchAll($sql, array(
        ':category' => $find_category,
        ':title' => "%".$find_freeword."%"
      ));
    }

  public function getGood($user_id)
    {
      $sql = "select sum(good) from menus where user_id = :user_id";

      if($this->fetch($sql, array(':user_id' => $user_id)) === null){
        return 0;
      }
      return $this->fetch($sql, array(
        ':user_id' => $user_id
      ));
    }

}
