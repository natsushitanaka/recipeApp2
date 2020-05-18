<?php

class MypageController extends Controller

{
  protected $auth_actions = true;

  public function indexAction()
  {
    return $this->render(array(
      '_token' => $this->generateCsrfToken('mypage/index'),
    ));
  }

  public function requestAction()
  {
    if(!$this->request->isPost()){
      $this->forward404();
    }

    if(isset($_POST['find_freeword']) || ($_POST['find_category'])){
      $_SESSION['find_freeword'] = $this->request->getPost('find_freeword');
      $_SESSION['find_category'] = $this->request->getPost('find_category');
    }

    $menus = $this->db_manager->get('Menus')->findMenu($_SESSION['find_freeword'], $_SESSION['find_category']);

    return $this->render(array(
      'find_freeword' => $_SESSION['find_freeword'],
      'find_category' => $_SESSION['find_category'],
      'user_id' => $_SESSION['user']['id'],
      'menus' => $menus,
      '_token' => $this->generateCsrfToken('mypage/index'),
    ));
  }

  public function registerMenuAction()
  {
    // if(!$this->request->isPost()){
    //   $this->forward404();
    // }

    // $token = $this->request->getPost('_token');
    // if(!$this->checkCsrfToken('mypage/registerMenu', $token)){
    //   return $this->redirect('/mypage/registerMenu');
    // }

    $title = $this->request->getPost('title');
    $appeal = $this->request->getPost('appeal');
    $cost = $this->request->getPost('cost');
    $category = $this->request->getPost('category');
    $body = $this->request->getPost('body');

    $messages = array();

    if(empty($title) || empty($body)){
      $messages[] = "＊メニュー名とレシピは必須項目です。";
    }
    // if(!$this->db_manager->get('Menus')->isUniqueMenuTitle($title)){
    //   $messages[] = "＊「{$title}」はすでに登録されています。同じメニュー名は登録できません";
    // }
    if(count($messages) === 0){
      $this->db_manager->get('Menus')->onMenus($_SESSION['user']['id'], $title, $appeal, $category, $body, $cost);
      $messages[] = "＊新メニュー「{$title}」が登録されました。";
    }

    return $this->render(array(
      'messages' => $messages,
      '_token' => $this->generateCsrfToken('mypage/registerMenu'),
    ));
  }

  public function editMenuAction()
  {
    if(!$this->request->isPost()){
      $this->forward404();
    }

    $messages = array();

    if(isset($_POST['editMenuId'])){
      $_SESSION['editMenuId'] = $this->request->getPost('editMenuId');
    }

    $preTitle = $this->db_manager->get('Menus')->getDetail($_SESSION['editMenuId']);
    $_SESSION['preTitle'] = $preTitle['title'];

    if(isset($_POST['eid'])){
      $_SESSION['editMenuId'] = $this->request->getPost('eid');
      $title = $this->request->getPost('etitle');
      $appeal = $this->request->getPost('eappeal');
      $cost = $this->request->getPost('ecost');
      $category = $this->request->getPost('ecategory');
      $body = $this->request->getPost('ebody');

      if(empty($title) || empty($body)){
        $messages[] = "＊メニュー名とレシピは必須項目です。";
      }

      // if(!$this->db_manager->get('Menus')->isUniqueEditMenuTitle($title, $_SESSION['preTitle'])){
      //   $messages[] = "＊「{$title}」はすでに登録されています。";
      // }

      if(count($messages) === 0){
        $this->db_manager->get('Menus')->editMenu($_SESSION['editMenuId'], $title, $appeal, $category, $body, $cost);
        $messages[] = "＊レシピが編集されました。";
      }
    }

    $detail = $this->db_manager->get('Menus')->getDetail($_SESSION['editMenuId']);

    return $this->render(array(
      'detail' => $detail,
      'messages' => $messages,
      '_token' => $this->generateCsrfToken('mypage/editmenu'),
    ));
  }

  public function myMenuListAction()
  {
    $messages = array();
    $user_id = $_SESSION['user']['id'];

    if(!is_null($this->request->getPost('delete'))){
      $menu_id = $this->request->getPost('delete');
      $this->db_manager->get('Menus')->deleteMenu($menu_id);

      $menus = $this->db_manager->get('Menus')->getMyAllMenus($user_id);
      // $this->db_manager->get('Comments')->countComments($menu['id']);
    }

    $menus = $this->db_manager->get('Menus')->getMyAllMenus($user_id);

    if(count($menus) === 0){
      $messages[] = '＊まだメニューの登録がありません。';
    }

    return $this->render(array(
      'menus' => $menus,
      'messages' => $messages,
      '_token' => $this->generateCsrfToken('mypage/myMenuList'),
    ));
  }

  public function othersAction()
  {
    $messages = array();
    $user_id = $_SESSION['user']['id'];
    $menu_id = $this->request->getPost('good');

    if(isset($menu_id)){
      $this->db_manager->get('Menus')->addGood($menu_id);
      return $this->redirect('/mypage/others');
    }

    $menus = $this->db_manager->get('Menus')->getAllMenus($user_id);

      // $this->db_manager->get('Comments')->countComments($menu['id']);

    if(count($menus) === 0){
      $messages[] = '＊まだメニューの登録がありません。';
    }

    return $this->render(array(
      'user_id' => $user_id,
      'menus' => $menus,
      'messages' => $messages,
      '_token' => $this->generateCsrfToken('mypage/others'),
    ));
  }

  public function detailAction()
  {
    if(!$this->request->isPost()){
      $this->forward404();
    }

    $menu_id = $this->request->getPost('detail');

    if(isset($menu_id)){
      $detail = $this->db_manager->get('Menus')->getDetail($menu_id);
    }

    return $this->render(array(
      'detail' => $detail,
      '_token' => $this->generateCsrfToken('mypage/detail'),
    ));
  }

  public function reviewAction()
  {
    if(!$this->request->isPost()){
      $this->forward404();
    }

    if(isset($_POST['review'])){
      $_SESSION['review_menu_id'] = $this->request->getPost('review');
    }

    if(isset($_POST['review_form'])){
      $body = $this->request->getPost('review_form');
    }

    $detail = $this->db_manager->get('Menus')->getDetail($_SESSION['review_menu_id']);

    if(empty($body)){
      $message = "＊コメントを入力してください。";
    }elseif(mb_strlen($body) > 20 ){
      $message = "＊２０文字以上の投稿はできません。";
    }else{
      $this->db_manager->get('Comments')->addComment($_SESSION['review_menu_id'], $_SESSION['user']['id'], $body);
      return $this->redirect('/mypage/review');
    }

    return $this->render(array(
      'detail' => $detail,
      'message' => $message,
      '_token' => $this->generateCsrfToken('mypage/review'),
    ));
  }

  public function commentsAction()
  {
    if(!$this->request->isPost()){
      $this->forward404();
    }

    $messages = array();

    if(isset($_POST['commentList'])){
      $menu_id = $this->request->getPost('commentList');
      $menu = $this->db_manager->get('Menus')->getDetail($menu_id);
      $comments = $this->db_manager->get('Comments')->getComments($menu_id);
    }

    if(isset($_POST['deleteComment'])){
      $comment_id = $this->request->getPost('deleteComment');
      $this->db_manager->get('Comments')->deleteComment($comment_id);
    }

    if(count($comments) === 0){
      $messages[] = "＊まだコメントがありません。";
    }

    return $this->render(array(
      'user' => $_SESSION['user']['id'],
      'menu_title' => $menu['title'],
      'comments' => $comments,
      'messages' => $messages,
      '_token' => $this->generateCsrfToken('mypage/comments'),
    ));
  }

  public function otherListAction()
  {
    if(!$this->request->isPost()){
      $this->forward404();
    }

    $user_name = $this->request->getPost('otherUserName');

    if(isset($user_name)){
      $user = $this->db_manager->get('User')->fetchByUserName($user_name);
      $menus = $this->db_manager->get('Menus')->getMyAllMenus($user['id']);
    }

    return $this->render(array(
      'user' => $user['user_name'],
      'menus' => $menus,
      '_token' => $this->generateCsrfToken('mypage/otherList'),
    ));
  }
}
