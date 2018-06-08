<?php
 require_once 'init.php';
// print_r($lodgeController->display_related_lodges(1, 3, "res/"));
// echo "<br />";
// echo "<br />";
// //print_r($newsControler->get_news_comments_by_id('posts',1));
// echo $_SESSION['new']."<br />";
// echo "<br />";
// echo $_SESSION['old']."<br />";
// function foo1($bar) {
//
// $qux = $bar;
//
// $bar += 1;
//
// return $qux;
//
// }
// $new = urlencode(htmlentities( "<a href='test'>&>Test</a>"));
    $url = rawurlencode(htmlentities('/t-app/signup.php'));
    //echo rawurlencode($url);
     echo $url;
        echo '<br />';
     echo urldecode($url);
//$groupController->INSERT();
