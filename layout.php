<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>LocTime</title>
  <link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo $root ?>/stylesheets/main.css" />
  <script type="text/javascript">
    var root = '<?= dirname($_SERVER['SCRIPT_NAME']); ?>';
  </script>
  <script type="text/javascript" src="<?php echo $root ?>/javascripts/main.js"></script>
</head>
<body onload="document.getElementById('url').focus();">
  <p>Please not that <strong>fbloader</strong> works only on browsers that support MP4/H264.</p>

  <form action="" method="get" onsubmit="return handleFormSubmission(this);">
    <fieldset>
      <input type="text" autocomplete="off" name="url" id="url" value="<?php if (isset($url)) { echo $url; } ?>" />
      <input type="submit" value="Go" />
    </fieldset>
  </form>

  <?php
    if (isset($CONTENT_FOR_LAYOUT)) {
  	  echo '<div id="videos">' . $CONTENT_FOR_LAYOUT . '</div>';
    }
  ?>
</body>
</html>
