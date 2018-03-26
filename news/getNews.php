<?php
require '../init.php';
if (isset($_POST['id'])) {
$newsControler->display_latest_post(8, "");
}
