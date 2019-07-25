<?require '../header.php';

if (!$_COOKIE['deflang']) {
	header('Location: ../');
} elseif (!$_COOKIE['login']) {
	header('Location: /login-registration/');
} else {?>
	<div class="uk-container uk-margin-large-top">
		<div>
			<a class="cook uk-button uk-button-default <?if ($lang == 'UA') {echo 'uk-button-primary';}?>" var="UA">UA</a>
			<a class="cook uk-button uk-button-default <?if ($lang == 'RU') {echo 'uk-button-primary';}?>" var="RU">RU</a>
			<a class="cook uk-button uk-button-default <?if ($lang == 'EN') {echo 'uk-button-primary';}?>" var="EN">EN</a>
		</div>
		
		<input type="hidden" id="checkpage" value="profile">
		<input id="lang" type="hidden" value=<?=$lang;?>>
		
		<div class="uk-margin" id="scontent"></div>
		
		<div class="uk-margin-top">
			<form action="../upload-photo/" method="post" enctype="multipart/form-data">
				<input class="main-input" type="file" name="fileToUpload" id="fileToUpload">
				<div class="uk-margin">
					<input type="hidden" id="userid" value="<?=$_COOKIE['login'];?>" name="id">
					<input class="uk-button uk-button-primary" type="submit" value="<?echo $MESS['UPLOAD_'.$lang]?>" name="submit">
				</div>
			</form>
		</div>
	</div>
<?}

require '../footer.php';?>