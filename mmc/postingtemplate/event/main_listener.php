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
	protected $db;
	protected $config;

	public function __construct(\phpbb\template\template $template, \phpbb\user $user, \phpbb\db\driver\driver_interface $db, \phpbb\config\config $config)
	{
		$this->template = $template;
		$this->user = $user;
		$this->db = $db;
		$this->config = $config;
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
		if (isset($this->config['mmc_posting_template_board'])) {
			if ($this->config['mmc_posting_template_board'] != -1) {
				$user_id = $this->user->data['user_id'];
				$sql = 'SELECT * FROM '.POSTS_TABLE.' WHERE `forum_id` = '.$this->config['mmc_posting_template_board'].'  AND `poster_id` = '.$user_id;

				$result = $this->db->sql_query($sql);

				while($row = $this->db->sql_fetchrow($result)) {
					$this->template->assign_block_vars('posting_template_options', array(
						'NAME' => $row['post_subject'],
						'TEXT' => strip_tags($row['post_text']),
						'ID' => $row['post_id']
					));
				}
			}
		}
	}
}
