<?php
require '../init.php';
if (isset($_POST['id'])) {
  $newsControler->display_latest_news(8, "");
}
