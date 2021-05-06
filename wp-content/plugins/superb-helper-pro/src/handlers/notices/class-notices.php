<?php

namespace SuperbHelperPro\Notices;

use SuperbHelperPro\Data\DataController;
use SuperbHelperPro\Modules\UpdateNotification;
use SuperbHelperPro\Handlers\CronController;

use Exception;

if (! defined('WPINC')) {
    die;
}

class NoticeController
{
    private $db;
    private $disable = false;
    public function __construct()
    {
        add_action('admin_notices', array($this, 'superbhelperpro_notices'));
    }

    public function superbhelperpro_notices()
    {
        $this->recommended_notices();
        $this->update_notices();
    }

    private function update_notices()
    {
        new UpdateNotification(get_transient(CronController::UPDATES_TRANSIENT));
    }

    private function recommended_notices()
    {
        try {
            $this->db = DataController::GetInstance();
            $settings = $this->db->get_settings();
            if (!$settings['recommended']) {
                return false;
            }
        } catch (Exception $ex) {
            return false;
        }
        require_once "data-notices.php";
        try {
            $time_diff = time() - $this->db->get_time();
            $current_notice_idx = floor($time_diff / 604800);
            if ($current_notice_idx === false || $current_notice_idx>=count($spbhlprpro_notices)) {
                $current_notice_idx=0;
                $this->db->reset_time();
            }
            $current_notice = $spbhlprpro_notices[$current_notice_idx];
            //$current_notice = $spbhlprpro_notices[rand(0, count($spbhlprpro_notices)-1)];
            $current_identity = $current_notice['Identity'];
            if (isset($_COOKIE['spbhlprpro-notice-never'])) {
                $never_cookie = json_decode(stripslashes($_COOKIE['spbhlprpro-notice-never']));
                if (isset($never_cookie->$current_identity) && $never_cookie->$current_identity===true) {
                    return false;
                }
            }
            if (isset($_COOKIE['spbhlprpro-notice-later'])) {
                $later_cookie = json_decode(stripslashes($_COOKIE['spbhlprpro-notice-later']));
                if (isset($later_cookie->$current_identity) && is_numeric($later_cookie->$current_identity) && strtotime("+2 days", $later_cookie->$current_identity) > time()) {
                    return false;
                }
            }
        } catch (Exception $ex) {
            return false;
        } ?>
        <div class="spbhlprpro-notice-notice" id="spbhlprpro-notice-notice">
        <style>
        <?php echo $current_notice['CSS']; ?>
        </style>
            <div class="spbhlprpro-notice-message">
                <p>
                <span><?php echo esc_html($current_notice['Title']); ?></span> 
                <?php echo esc_html($current_notice['Description']); ?>
                </p>
                <?php
                    foreach ($current_notice['Buttons'] as &$button) { ?>
                        <a href="<?php echo esc_url($button['CTA']);?>" target="_blank" rel="nofollow noopener"><?php echo esc_html($button['Title']);?></a> 
                    <?php }
        unset($button); ?>
                <button type="button" id="spbhlprpro_notice_later" data-element="<?php echo esc_attr($current_notice['Identity']); ?>" data-time="<?php echo esc_attr(time()); ?>">Ask me later</button>
                <button type="button" id="spbhlprpro_notice_never" data-element="<?php echo esc_attr($current_notice['Identity']); ?>">Don't show me this again</button>
            </div>
        </div>
        <?php
    }
}
