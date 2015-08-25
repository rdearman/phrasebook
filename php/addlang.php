<?PHP
require_once("db.inc");
require_once("session.php");

// Start auth check
//if (!$auth->acl_get('u_search'))
if ($user->data['user_id'] == ANONYMOUS)
  {
    trigger_error('NOT_AUTHORISED');
  }
else
  {
    echo "Welcome " . $user->data['username'] . "<P>\n";
  }

echo "User Type: " . $user->data['user_type'] . "<P>\n";
echo "User Lang: " . $user->data['user_lang'] . "<P>\n";
echo "User ID: " . $user->data['user_id'] . "<P>\n";
echo "User Last Visit: " . $user->data['user_lastvisit'] . "<P>\n";

?>

</HTML>