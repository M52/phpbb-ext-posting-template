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
	static public function getSubscribedEvents()
	{
		return array(
			'core.display_forums_modify_template_vars'	=> 'load_posting_templates',
		);
	}

	/**
	 * A sample PHP event
	 * Modifies the names of the forums on index
	 *
	 * @param \phpbb\event\data	$event	Event object
	 */
	public function load_posting_templates($event, \phpbb\template\template $template)
	{
		for ($i = 0; $i < 2; $i++)
		{
		   $template->assign_block_vars('somerow', array(
		      'VAR1' => "Option \$i: $i",
		   ));
		}
		// $forum_row = $event['forum_row'];
		// $forum_row['FORUM_NAME'] .= ' :: Acme Event ::';
		// $event['forum_row'] = $forum_row;
	}
}
