<?PHP
	$db_server='localhost';
	$db_username='rdaccess';
	$db_password='rdaccess';
	$db_name='phrasebook';
	$dbconn = pg_connect("host=$db_server user=$db_username password=$db_password dbname=$db_name");
	if (!$dbconn) 
	{
    		die('Could not connect: ' . psql_error());
	}
?>
