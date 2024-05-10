<?php
include_once(".gfcrc");

$db_conn = gfc_mysql_connect();
gfc_create_tables($db_conn);
gfc_mysql_disconnect($db_conn);
?>
<html>
<body>
Installation of tables was successful.  Remember to delete this file.
</body>
</html>
