<?php
include_once(".gfcrc");

$db_conn   = gfc_mysql_connect();
$favorites = gfc_get_favorites($db_conn);
gfc_mysql_disconnect($db_conn);

print "<html><title>GFC</title><body>\n";

print
"<div align=\"center\"><hr>
<form action=\"submit.php\" method=\"post\">
  <table>
    <tr>
      <td align=\"right\">URL:</td>
      <td><input type=\"text\" name=\"url\" value=\"\"></td>
    </tr>
    <tr>
      <td align=\"right\">Description:</td>
      <td><input type=\"text\" name=\"description\" value=\"\"></td>
    </tr>
    <tr>
      <td colspan=\"2\"><input type=\"submit\" value=\"Add Favorite\"></td>
    </tr>
  </table>
</form>
<hr>
<br>
<h3>Favorites</h3><br>
<table width=\"600\">";


foreach($favorites as $fav)
{
  printf("<tr><td align=\"left\"><a href=\"%s\">%s</a></td></tr><td align=\"left\">%s</td></tr><tr><td></td></tr>\n",
	 $fav['url'],
	 $fav['url'],
	 $fav['description']
	 );
}
print "</table></div></body></html>\n";

?>
