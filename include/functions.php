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

    echo '<ul class="red-text text-darken-4">'. $error_text. '</ul>';
  }
}
