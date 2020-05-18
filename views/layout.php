<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title><?php if(isset($title)): echo $title . '-'; endif; ?>My Recipes</title>
  <link rel="stylesheet" href="/css/<?= $css; ?>.css">
</head>
<body>
  <div class="body">
    <?= $_content; ?>
  </div>
</body>
</html>
