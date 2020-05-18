<?php foreach($messages as $message): ?>
  <p class="<?= $this->escape($class); ?>"><?= $this->escape($message); ?></p>
<?php endforeach; ?>
