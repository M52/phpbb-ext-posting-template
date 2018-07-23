<?php
class main_info
{
    public function module()
    {
        return array(
            'filename'  => '\mmc\postingtemplate\acp\main_module',
            'title'     => 'ACP_POSTING_TEMPLATE_TITLE',
            'modes'    => array(
                'settings'  => array(
                    'title' => 'Posting Template',
                    'auth'  => 'ext_acme/demo && acl_a_board',
                    'cat'   => array('ACP_POSTING_TEMPLATE_TITLE'),
                ),
            ),
        );
    }
}
