<? 
$db = (new mysqli("mysql.vmi.se","etc2015_se","7RPyt4g4","etc2015_se")) or die("Could not open database.");

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

?>