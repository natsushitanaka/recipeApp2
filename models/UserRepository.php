<?php

class UserRepository extends DbRepository
{
  public function isUniqueUserName($user_name)
  {
    $sql = "select count(id) as count from user where user_name = :user_name";

    $row = $this->fetch($sql, array(
      ':user_name' => $user_name
    ));
    if($row['count'] === '0'){
        return true;
    }
        return false;
  }

  public function addUser($user_name, $password)
  {
    $password = $this->hashPassword($password);

    $sql = "insert into user(user_name, password, created_at) values(:user_name, :password, now())";
    $stmt = $this->execute($sql, array(
      ':user_name' => $user_name,
      ':password' => $password,
    ));
  }

  public function hashPassword($password)
  {
    return sha1($password. 'SecretKey');
  }

  public function fetchByUserName($user_name)
  {
    $sql = "select * from user where user_name = :user_name";

    return $this->fetch($sql, array(':user_name' => $user_name));
  }
}
