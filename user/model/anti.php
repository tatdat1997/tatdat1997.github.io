<?php
function checkInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = str_replace("'","",$data);
  return $data;
}
function cleanInput($input) {
    $search = array(
      '@<script[^>]*?>.*?</script>@si',   // Loại bỏ javascript
      '@<[\/\!]*?[^<>]*?>@si',            // Loại bỏ HTML tags
      '@<style[^>]*?>.*?</style>@siU',    // Loại bỏ style tags
      '@<![\s\S]*?--[ \t\n\r]*>@'         // Loại bỏ multi-line comments
    );                   
      $output = preg_replace($search, '', $input);
      return $output;
    }

  function sanitize($input) {
    $dbc=mysqli_connect('localhost','root','','question');
      if (is_array($input)) {
          foreach($input as $var=>$val) {
              $output[$var] = sanitize($val);
          }
      }
      else {
          if (get_magic_quotes_gpc()) {
              $input = stripslashes($input);
          }
          $input  = cleanInput($input);
          $output = mysqli_real_escape_string($dbc,$input);
      }
      return $output;
  }
?>
