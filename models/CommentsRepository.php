<?php

class CommentsRepository extends DbRepository
{
  public function addComment($menu_id, $user_id, $body)
    {
    $sql = "insert into comments(menu_id, user_id, body, created_at) values(:menu_id, :user_id, :body, now())";
    $stmt = $this->execute($sql, array(
      ':menu_id' => $menu_id,
      ':user_id' => $user_id,
      ':body' => $body
    ));
  }

  public function getComments($menu_id)
  {
    $sql = "select comments.body, comments.created_at, comments.id, comments.user_id, user.user_name from comments
    left join user on comments.user_id = user.id where menu_id = :menu_id order by created_at desc";
    // $sql = "select comments.body, comments.created_at, comments.id,
    // user.user_name, menus.title from comments
    // left join user on comments.user_id = user.user_name
    // left join menus on comments.menu_id = menu.title
    // where menu_id = :menu_id order by created_at desc";


    return $stmt = $this->fetchAll($sql, array(
      ':menu_id' => $menu_id,
    ));
  }

  public function deleteComment($comment_id)
    {
      $sql = "delete from comments where id = :id";

      $stmt = $this->execute($sql, array(
        ':id' => $comment_id,
      ));
    }

  // public function countComments($menu_id)
  // {
  //   $sql = "select count(id) as count from comments where menu_id = :menu_id";
  //
  //   $stmt = $this->db_manager->fetch($sql, array(
  //     ':menu_id' => $menu_id
  //   ));
  // }

}
