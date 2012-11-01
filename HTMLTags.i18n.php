<?php

/**
 * Messages file for the HTML Tags extension
 *
 * @file
 * @ingroup Extensions
 */

/**
 * Get all extension messages
 *
 * @return array
 */
$messages = array();

$messages['en'] = array(
    'htmltags-desc' => 'Allows for displaying HTML tags from a pre-specified set',
    'htmltags-notagname' => 'The attribute "tagname" must be set for this tag.',
    'htmltags-unsupportedtag' => 'The tag name "$1" is not supported for <htmltag>.',
);

$messages['qqq'] = array(
    'htmltags-desc' => '{{desc}}',
    'htmltags-notagname' => 'The error message if "tagname" is not set in <htmltag>.',
    'htmltags-unsupportedtag' => 'The error message if an invalid value for "tagname" is set in <htmltag>.',
);
