<?include '../header.php';
if (setCookie('deflang', $_POST['deflang'], time()+(3600*24*1000), '/', $_SERVER["SERVER_NAME"])){
	echo $_POST['deflang'];
} else {
	echo 'false';
}
?>