<?php
/**
 * Main code for the HTML Tags extension
 *
 * @file
 * @ingroup HTML Tags
 */

class HTMLTags {

	/**
	 * @param Parser $parser
	 */
	public static function register( $parser ) {
		$parser->setHook( 'htmltag', [ __CLASS__, 'render' ] );
	}

	/**
	 * Handle the <htmltag> tag.
	 *
	 * @param string $input
	 * @param string[] $args
	 * @param Parser $parser
	 * @param PPFrame $frame
	 * @return string
	 */
	public static function render( $input, $args, $parser, $frame ) {
		global $wgHTMLTagsAttributes;

		if ( !array_key_exists( 'tagname', $args ) ) {
			return wfMessage( 'htmltags-notagname' )->escaped();
		}

		$tagName = $args['tagname'];

		if ( !array_key_exists( $tagName, $wgHTMLTagsAttributes ) ) {
			return wfMessage( 'htmltags-unsupportedtag', $tagName )->escaped();
		}

		$input = $parser->replaceVariables( $input, $frame );

		$attributes = [];
		foreach ( $args as $key => $value ) {
			if ( $key === 'tagname' ) {
				continue;
			}

			if ( in_array( $key, $wgHTMLTagsAttributes[$tagName] ) ) {
				$value = $parser->replaceVariables( $value, $frame );
				// Prevent JS injection into, for instance,
				// the "href" attribute.
				$value = htmlspecialchars( $value, ENT_QUOTES );

				// Undo the escaping of '&', since it's used
				// frequently in URLs. (Hopefully this isn't
				// by itself unsafe.)
				$value = str_replace( '&amp;', '&', $value );

				$attributes[$key] = $value;
			}
		}

		// The use of Html::element() should prevent any further attempt
		// at JavaScript injection.
		if ( class_exists( 'MediaWiki\Html\Html' ) ) {
			// MW 1.40+
			$htmlClass = 'MediaWiki\Html\Html';
		} else {
			$htmlClass = 'Html';
		}
		return $htmlClass::element( $tagName, $attributes, $input );
	}

}
