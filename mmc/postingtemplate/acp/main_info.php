<?php
namespace mmc\postingtemplate\acp;

class main_info
{
    public function module()
    {
        return array(
            'filename'  => '\mmc\postingtemplate\acp\main_module',
            'title'     => 'MMC_POSTING_TEMPLATE_TITLE',
            'modes'    => array(
                'settings'  => array(
                    'title' => 'Posting Template',
                    'auth'  => 'ext_mmc/postingtemplate && acl_a_board',
                    'cat'   => array('MMC_POSTING_TEMPLATE_TITLE'),
                ),
            ),
        );
    }
}
