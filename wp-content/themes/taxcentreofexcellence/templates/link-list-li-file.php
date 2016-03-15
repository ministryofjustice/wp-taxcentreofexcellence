<?php
$filenameParts = explode('.', $link['file']['filename']);
$ext = array_pop($filenameParts);
?>
<li>
  <a href="<?php echo $link['file']['url']; ?>"><?php echo $link['name']; ?></a>
  <span class="help-text">(<?php echo $ext; ?>)</span>
</li>
