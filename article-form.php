<?php if(!empty($errors)): ?>

  <ul>
    <?php foreach ($errors as $error): ?>
      <li> <?= $errors?> </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>



<form method="post">

  <div>
      <label for="title">Title</label>
      <input name="title" id="title" placeholder="Article title" value="<?=htmlspecialchars($title);?>" required>
  </div>

  <div>
    <label for="content">Content</label>
    <textarea name="content" rows="4" cols="40" id="content" placeholder="Article content"  required><?=htmlspecialchars($content);?></textarea>
  </div>

  <div>
    <label for="published_at"> Publication date</label>
    <input type="datetime-local" name="published_at" id="published_at" value="<?=htmlspecialchars($published_at);?>" required>
  </div>

  <button>SAVE</button>
</form>
