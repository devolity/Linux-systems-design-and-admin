<?php
$db_host = 'localhost';

/*************************
 * EDIT THESE LINES
 */
$db_user = 'DB_USER_NAME';    
$db_pass = 'DB_USER_PASSWD';
$db_name = 'DB_DATABASE';
/*
 * EDIT THESE LINES
 *************************/

$db_conn = mysql_connect($db_host, $db_user, $db_pass); 
mysql_select_db($db_name, $db_conn);

if($_POST[f_desc] && $_POST[f_link])
{
  $db_result =
    mysql_query("INSERT INTO Links VALUES ('$_POST[f_desc]', '$_POST[f_link]')", $db_conn)
    or die("Database Error");
}


$db_result = mysql_query("SELECT label,link FROM Links", $db_conn) or die("Database Error");

print '
<html>
 <head>
   <title>The Water Pokemon</title>
 </head>
 <body bgcolor="#66BBBB">
  <center>
';

if(mysql_num_rows($db_result) < 1)
{
  print '
   <h2>No water type pokemon have entered their pages.</h2>
';
}
else
{
  print '
   <h2>The Water Pokemon</h2>
   <table border="1">
    <tr><th>Name</th><th>Web Site</th></tr>
';
  
  while($db_row = mysql_fetch_array($db_result))
    {
      print '<tr><td>'.$db_row[label].'</td>';
      print '<td><a href="'.$db_row[link].'">'.$db_row[link].'</a></td></tr>';
    }
  print '
   </table>
';
}

print '
   <br>
   <br>
   <hr>
   <br>
   <br>
   <form method="post" action="index.php">
   <table border="0">
     <tr>
       <td>Pokemon Name:</td><td><input type="text" name="f_desc"></td>
     </tr>
     <tr>
       <td>Site URL:</td><td><input type="text" size="50" name="f_link"></td>
     </tr>
     <tr>
       <td colspan="2" align="center"><input type="submit" value="Add Link"></td>
     </tr>
   </table>
   <form>
';

print '
  </center>
 </body>
</html>
';
?>
