<?php
/**
 *
 * posting template. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2018, mcalis
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace mmc\postingtemplate\migrations;

class install_acp_module extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['mmc_posting_template_board']);
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v31x\v314');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('mmc_posting_template_board', -1)),

			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'POSTING_TEMPLATE'
			)),
			array('module.add', array(
				'acp',
				'POSTING_TEMPLATE',
				array(
					'module_basename'	=> '\mmc\postingtemplate\acp\main_module',
					'modes'				=> array('settings'),
				),
			)),
		);
	}
}
