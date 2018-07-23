<?php
/**
 *
 * posting template. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2018, mcalis
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace mmc\postingtemplate\event;

/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * posting template Event listener.
 */
class main_listener implements EventSubscriberInterface
{
	protected $template;
	protected $user;

	public function __construct(\phpbb\template\template $template, \phpbb\user $user)
	{
		$this->template = $template;
		$this->user = $user;
	}

	static public function getSubscribedEvents()
	{
		// TODO: attach to a different hook. This one runs on every page load. Find one that runs on Posting.php
		return array(
			'core.user_setup'	=> 'load_posting_templates',
		);
	}

	/**
	 * A sample PHP event
	 * @param \phpbb\event\data	$event	Event object
	 */
	public function load_posting_templates($event)
	{
		for ($i = 0; $i < 2; $i++) {
	 		$this->template->assign_block_vars('posting_template_options', array(
				'OPTION_NAME' => 'Worst',
				'OPTION_ID' => $i
			));
		}
	}
}
