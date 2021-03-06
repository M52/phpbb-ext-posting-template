<?php
/**
 *
 * posting template. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2018, mcalis
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'MMC_POSTING_TEMPLATE_SETTINGS_SAVED' => 'Posting template settings saved succesfully!',
	'L_MMC_POSTING_TEMPLATE_BOARD_SELECT' => 'Select a board that will host the posting templates.'
));
