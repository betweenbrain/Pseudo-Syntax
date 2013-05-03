<?php defined('_JEXEC') or die;

/**
 * File       pseudo-syntax.php
 * Created    2/11/13 11:19 AM
 * Author     Matt Thomas
 * Website    http://betweenbrain.com
 * Email      matt@betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

jimport('joomla.plugin.plugin');

class plgSystemPseudosyntax extends JPlugin {
	function onAfterRender() {
		$app = JFactory::getApplication();

		if ($app->isAdmin()) {
			return TRUE;
		}

		$buffer = JResponse::getBody();

		$pseudoTags = array('{i}', '{/i}', '{em}', '{/em}', '{strong}', '{/strong}', '{small}', '{/small}', '{br}');
		$realTags   = array('<i>', '</i>', '<em>', '</em>', '<strong>', '</strong>', '<small>', '</small>', '<br>');

		// Convert pseudo tags to real HTML tags
		$buffer = str_replace($pseudoTags, $realTags, $buffer);

		// Match title tag
		preg_match('/<title>(.*?)<\/title>/i', $buffer, $matches);

		// Sanitize title tag
		$buffer = str_replace($matches[0], '<title>' . str_replace($realTags, '', $matches[1]) . '</title>', $buffer);

		JResponse::setBody($buffer);

		return TRUE;
	}
}