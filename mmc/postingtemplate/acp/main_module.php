<?php
namespace mmc\postingtemplate\acp;

class main_module {

    public $u_action;
    public $tpl_name;
    public $page_title;

    public function main($id, $mode)
    {
        global $language, $template, $request, $config;

        $this->tpl_name = 'acp_posting_template';
        $this->page_title = 'ACP - Posting Template';

        // TODO: use language independent. See line below this one.
        // $this->page_title = $language->lang('ACP_POSTING_TEMPLATE_TITLE');

        add_form_key('acp_posting_template');

        if ($request->is_set_post('submit'))
        {
            if (!check_form_key('acp_posting_template'))
            {
                trigger_error('FORM_INVALID');
            }

            $config->set('mmc_posting_template_board', $request->variable('mmc_posting_template_board', 0));
            trigger_error('Settings saved') . adm_back_link($this->u_action);

            // TODO: again language independence
            // trigger_error($this->$language->lang('MMC_POSTING_TEMPLATE_SETTINGS_SAVED') . adm_back_link($this->u_action));

        }

        $template->assign_var('U_ACTION', $this->u_action);
        $template->assign_var('MMC_POSTING_TEMPLATE_BOARD', $config['mmc_posting_template_board']);
    }
}
