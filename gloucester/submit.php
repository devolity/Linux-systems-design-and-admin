<?php
include_once(".gfcrc");



$db_conn   = gfc_mysql_connect();
gfc_add_favorite($db_conn, $_POST['url'], $_POST['description']);
gfc_mysql_disconnect($db_conn);

include_once("index.php");
?>
