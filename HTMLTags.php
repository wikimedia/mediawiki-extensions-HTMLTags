<?php
/**
 * HTML Tags extension
 *
 * @file
 * @ingroup Extensions
 *
 * This is the main include file for the HTML Tags extension for
 * MediaWiki.
 *
 * Usage: Add the following line in LocalSettings.php:
 * require_once( "$IP/extensions/HTMLTags/HTMLTags.php" );
 */

// Check environment
if ( !defined( 'MEDIAWIKI' ) ) {
	echo( "This is an extension to the MediaWiki package and cannot be run standalone.\n" );
	die( -1 );
}

/* Configuration */

// Credits
$wgExtensionCredits['parserhook'][] = array(
	'path'			=> __FILE__,
	'name'			=> 'HTML Tags',
	'author'		=> 'Yaron Koren',
	'version'		=> '0.2',
	'url'			=> 'https://www.mediawiki.org/wiki/Extension:HTML_Tags',
	'descriptionmsg'	=> 'htmltags-desc',
	'license-name'		=> 'GPL-2.0+'
);

// Internationalization
$wgMessagesDirs['HTMLTags'] = __DIR__ . '/i18n';

// Register classes
$wgAutoloadClasses['HTMLTags'] = __DIR__ . '/HTMLTags_body.php';

// Register parser hook
$wgHooks['ParserFirstCallInit'][] = 'HTMLTags::register';

// Settings
$wgHTMLTagsAttributes = array();
