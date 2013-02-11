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

class plgContentPseudosyntax extends JPlugin {
	function onPrepareContent(&$article, &$params, $limitstart) {
		$article->title = str_replace(
			array('{i}', '{/i}', '{em}', '{/em}', '{strong}', '{/strong}', '{small}', '{/small}'),
			array('<i>', '</i>', '<em>', '</em>', '<strong>', '</strong>', '<small>', '</small>'),
		$article->title);
	}
}