<?include '../header.php';

if (!$_COOKIE['deflang']) {
	header('Location: ../');
} elseif (!$_COOKIE['login']) {?>
	<div class="uk-container uk-margin-large-top">
		<div>
			<a class="cook uk-button uk-button-default <?if ($lang == 'UA') {echo 'uk-button-primary';}?>" var="UA">UA</a>
			<a class="cook uk-button uk-button-default <?if ($lang == 'RU') {echo 'uk-button-primary';}?>" var="RU">RU</a>
			<a class="cook uk-button uk-button-default <?if ($lang == 'EN') {echo 'uk-button-primary';}?>" var="EN">EN</a>
		</div>

		<ul class="uk-subnav uk-subnav-pill" uk-switcher>
			<li><a href="#"><?echo $MESS['LOGIN_'.$lang]?></a></li>
			<li><a href="#"><?echo $MESS['REG_'.$lang]?></a></li>
		</ul>

		<ul class="uk-switcher uk-margin">

			<li>
				<form>
					<fieldset class="uk-fieldset">

						<div class="uk-margin">
							<input id="log-email" class="uk-input main-input" type="text" placeholder="<?echo $MESS['EMAIL_'.$lang]?>">
						</div>
						<div class="uk-margin">
							<input id="log-password" class="uk-input main-input" type="password" placeholder="<?echo $MESS['PAS_'.$lang]?>">
						</div>
						<div class="uk-margin">
							<a id="log-user" class="uk-button uk-button-primary"><?echo $MESS['LOGIN_'.$lang]?></a>
						</div>

					</fieldset>
				</form>
			</li>

			<li>
				<form>
					<fieldset class="uk-fieldset">

						<div class="uk-margin">
							<input id="reg-username" uk-tooltip="title: <?echo $MESS['HNAME_'.$lang]?>; pos: top-right; delay: 500" class="uk-input main-input" type="text" placeholder="<?echo $MESS['YNAME_'.$lang].' *'?>">
						</div>
						<div class="uk-margin">
							<input id="reg-email" uk-tooltip="title: <?echo $MESS['HEMAIL_'.$lang]?>; pos: top-right; delay: 500" class="uk-input main-input" type="text" placeholder="<?echo $MESS['EMAIL_'.$lang].' *'?>">
						</div>
						<div class="uk-margin">
							<input id="reg-password" uk-tooltip="title: <?echo $MESS['HPAS_'.$lang]?>; pos: top-right; delay: 500" class="uk-input main-input" type="password" placeholder="<?echo $MESS['PAS_'.$lang].' *'?>">
						</div>
						<div class="uk-margin">
							<a id="reg-user" class="uk-button uk-button-primary"><?echo $MESS['REG_'.$lang]?></a>
						</div>
						<input id="lang" type="hidden" value=<?=$lang;?>>

						
					</fieldset>
				</form>
			</li>

		</ul>
	</div>
<?} else {
	header('Location: /profile/');
}

include '../footer.php';?>