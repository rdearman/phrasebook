<?PHP
require_once("./db.inc");
?>
<HTML>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<TITLE>Database Test Page</TITLE>
<head>
<style>
<!--
body {
  font-family: Times New Roman;
  font-size: 8pt;
}

dt {
  font-weight: bold;
  text-decoration: underline;
  font-size: 10pt;
}

dd {
  font-size: 9pt;
  margin-left: 18pt;
}

th.day {
  background: #dddddd;
  font-size: 9pt;
}

th.heading {
  background: #dddddd;
  font-size: 10pt;
  padding-left: 4px;
  padding-right: 4px;
}

td.normal {
  background: #ffffff;
  font-size: 8pt;
  text-align: center;
}

td.rd {
      border: 1px solid #c6c9ff; 
      color: #000;
}

h2 {
  margin: 0px;
}
-->
</style>


<table BORDER=0 WIDTH="75%" CELLPADDING=2 CELLSPACING=2 ALIGN="CENTER">
<TR>
	<TH style="border: 1px solid #c6c9ff; color: #00F;">ISO ID</TH>
	<TH style="border: 1px solid #c6c9ff; color: #00F;">LOCALE ID</TH>
	<TH style="border: 1px solid #c6c9ff; color: #00F;">Friendly ISO Name</TH>
	<TH style="border: 1px solid #c6c9ff; color: #00F;">Friendly Locale Name</TH>
</TR>

<?PHP
$query = "select * from tbllanguagelist";
$result = pg_query( $dbconn , $query );
$my_style = "border: 1px solid #000; color: #000;";
$flip=2;
while ($row = pg_fetch_row($result)) {
      if ($flip  % 2 == 0 ) { $TR = "<TR BORDERCOLOR='Silver' BGCOLOR='Silver'>"; } else { $TR = "<TR BORDERCOLOR='Silver' BGCOLOR='White'>";}
      echo $TR . "\n";
      echo "<td style='$my_style'>" . $row[1] . "</td>\n";
      echo "<td style='$my_style'>" . $row[2] . "</td>\n";
      echo "<td style='$my_style'>" . $row[3] . "</td>\n";
      echo "<td style='$my_style'>" . $row[4] . "</td>\n";
      echo "</TR>\n";
      $flip++;
}
echo "</table>";
?>
<HR>
<FORM name="addlang" method="post" action="addlang.php">
<TR BORDERCOLOR='Silver' BGCOLOR='Silver'>

<table BORDER=0 WIDTH="75%" CELLPADDING=2 CELLSPACING=2 ALIGN="CENTER">
<TR>
	<TH style="border: 1px solid #c6c9ff; color: #00F;">ISO ID</TH>
	<TH style="border: 1px solid #c6c9ff; color: #00F;">LOCALE ID</TH>
	<TH style="border: 1px solid #c6c9ff; color: #00F;">Friendly ISO Name</TH>
	<TH style="border: 1px solid #c6c9ff; color: #00F;">Friendly Locale Name</TH>
</TR>

<TR BORDERCOLOR='Silver' BGCOLOR='Silver'>
<td style='border: 1px solid #000; color: #000;'><input  type="text" name="iso" maxlength="5" size="5"></td>
<td style='border: 1px solid #000; color: #000;'><input  type="text" name="locale" maxlength="5" size="5"></td>
<td style='border: 1px solid #000; color: #000;'><input  type="text" name="iso_friendly" maxlength="25" size="25"></td>
<td style='border: 1px solid #000; color: #000;'><input  type="text" name="locale_friendly" maxlength="25" size="25"></td>
</TR>
<TABLE>
<P>
<center>
<input type="submit" value="Add New Language"> 
</center>
</form>

</HTML>