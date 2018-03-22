<?php
 function getExcerpt($content, $length) {
    if (strlen($content) < $length) {
        return $content;
    } else {
        $content = substr($content, 0, $length);
        return $content . ' ...';
    }
}

function display_error(){
  global $error,$error_text;

  if ($error !== 0){

    echo '<div class="alert alert-danger">'. $error_text. '</div>';
  }
}
