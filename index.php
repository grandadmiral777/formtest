<?include 'header.php';
$lang = $_COOKIE['deflang'];

if (!$_COOKIE['deflang']) {?>
	<div class="uk-container uk-margin-large-top">
		<div>Choose your language, please:</div>
		<div class="uk-margin-top">
			<a class="cook uk-button uk-button-default <?if ($lang == 'UA') {echo 'uk-button-primary';}?>" var="UA">UA</a>
			<a class="cook uk-button uk-button-default <?if ($lang == 'RU') {echo 'uk-button-primary';}?>" var="RU">RU</a>
			<a class="cook uk-button uk-button-default <?if ($lang == 'EN') {echo 'uk-button-primary';}?>" var="EN">EN</a>
		</div>
	</div>
<?} elseif (!$_COOKIE['login']) {
	header('Location: /login-registration/');
} else {
	header('Location: /profile/');
}

include 'footer.php';?>