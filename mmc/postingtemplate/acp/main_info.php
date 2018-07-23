<?php
/**
 *
 * posting template. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2018, mcalis
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace mmc\postingtemplate\acp;

/**
 * posting template ACP module info.
 */
class main_info
{
	public function module()
	{
		return array(
			'filename'	=> '\mmc\postingtemplate\acp\main_module',
			'title'		=> 'ACP_DEMO_TITLE',
			'modes'		=> array(
				'settings'	=> array(
					'title'	=> 'ACP_DEMO',
					'auth'	=> 'ext_mmc/postingtemplate && acl_a_board',
					'cat'	=> array('ACP_DEMO_TITLE')
				),
			),
		);
	}
}
