<?php

if ( function_exists( 'wfLoadExtension' ) ) {
	wfLoadExtension( 'HTMLTags' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$wgMessagesDirs['HTMLTags'] = __DIR__ . '/i18n';
	wfWarn(
		'Deprecated PHP entry point used for the HTMLTags extension. ' .
		'Please use wfLoadExtension() instead, ' .
		'see https://www.mediawiki.org/wiki/Special:MyLanguage/Manual:Extension_registration for more details.'
	);
	return;
} else {
	die( 'This version of the HTMLTags extension requires MediaWiki 1.29+' );
}
