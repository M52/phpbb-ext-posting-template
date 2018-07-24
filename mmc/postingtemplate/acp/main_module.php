<?php
namespace mmc\postingtemplate\acp;

class main_module {

    public $u_action;
    public $tpl_name;
    public $page_title;

    protected $language;
    protected $template;
    protected $request;
    protected $config;
    protected $db;

    public function main($id, $mode)
    {
        global $phpbb_container;

        $this->language = $phpbb_container->get('language');
        $this->template = $phpbb_container->get('template');
        $this->request = $phpbb_container->get('request');
        $this->config = $phpbb_container->get('config');
        $this->db = $phpbb_container->get('dbal.conn');

        $this->tpl_name = 'acp_posting_template';
        $this->page_title = 'ACP - Posting Template';

        // TODO: use language independent. See line below this one.
        $this->page_title = $this->language->lang('MMC_POSTING_TEMPLATE_TITLE');

        add_form_key('acp_posting_template');

        if ($this->request->is_set_post('submit'))
        {
            if (!check_form_key('acp_posting_template'))
            {
                trigger_error('FORM_INVALID');
            }

            $this->config->set('mmc_posting_template_board', $this->request->variable('mmc_posting_template_board', 0));
            trigger_error('Settings saved') . adm_back_link($this->u_action);

            // TODO: again language independence
            // trigger_error($this->$language->lang('MMC_POSTING_TEMPLATE_SETTINGS_SAVED') . adm_back_link($this->u_action));

        }

        $sql = 'SELECT `forum_id`, `forum_name` FROM '.FORUMS_TABLE;
        $result = $this->db->sql_query($sql);

        while($row = $this->db->sql_fetchrow($result))
        {
            $this->template->assign_block_vars('posting_template_forums', array(
                'ID' => $row['forum_id'],
                'NAME' => $row['forum_name']
            ));
        }

        $this->template->assign_var('U_ACTION', $this->u_action);
        $this->template->assign_var('MMC_POSTING_TEMPLATE_BOARD', $this->config['mmc_posting_template_board']);
    }
}
