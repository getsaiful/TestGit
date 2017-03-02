<?php
/* Search suggest class in PHP
   @author Gareth Peoples
   @email mail[at]gpeopl.es
*/
require_once("admin/connection.php");
class suggest {
    // Suggest function for AJAX search box script
    function suggest($string) {
        $query = mysql_query('select book_name from books where book_name like "'. mysql_real_escape_string($string) .'%"  and ');
        if(!$query) die('Invalid query: '.mysql_error());
        $numrows = mysql_num_rows($query);
       
            if ($numrows > 0) {
            $numresults = 3;
            if ($numresults > $numrows) $numresults = $numrows;
            for ($i = 1; $i <= $numresults; $i++) {
                 $title = stripslashes(mysql_result($query, ($i-1), 'title'));
              $description = stripslashes(mysql_result($query, ($i-1), 'description'));
              $videoid = stripslashes(mysql_result($query, ($i-1), 'id'));
              if ($i == 1 && $numresults != 1) echo "<div id='suggestion' style='border-top: 1px #444444 solid; border-bottom: 1px #444444 dashed;'>";
              else if ($numresults == 1) echo "<div id='suggestion' style='border-bottom: 1px #444444 solid; border-top: 1px #444444 solid;'>";
              else if ($i == $numresults) echo "<div id='suggestion' style='border-bottom: 1px #444444 solid;'>";
              else echo "<div id='suggestion' style='border-bottom:  1px #444444 dashed;'>";
              echo "YOUR QUERY RESULT CONTENT IN HERE</div>";
            }
        }
    }
}

// If POST suggest != do an AJAX query on database
if ($_POST['suggest'] != null) {
    $string = $_POST['suggest'];
    $suggest = new suggest($string);
}
?>
</div></div>