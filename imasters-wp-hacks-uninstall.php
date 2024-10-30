<!-- Uninstall iMasters WP Hacks -->
<?php
    if( !current_user_can('install_plugins')):
        die('Access Denied');
    endif;

$base_name = plugin_basename('imasters-wp-hacks/imasters-wp-hacks.php');
$base_page = 'admin.php?page='.$base_name;
$mode = trim($_GET['mode']);
$iwph_settings = array('imasters_wp_hacks_remove_dashboard_widgets','imasters_wp_hacks_remove_post_widgets', 'imasters_wp_hacks_remove_page_widgets', 'imasters_wp_hacks_remove_link_widgets',  'imasters_wp_hacks_dashboard_access_level', 'imasters_wp_hacks_posts_access_level', 'imasters_wp_hacks_media_access_level', 'imasters_wp_hacks_links_access_level', 'imasters_wp_hacks_pages_access_level', 'imasters_wp_hacks_comments_access_level', 'imasters_wp_hacks_profile_access_level', 'imasters_wp_hacks_tools_access_level', 'imasters_wp_hacks_dashboard_redir' );

//Form Process
if( isset( $_POST['do'], $_POST['uninstall_iwph_yes'] ) ) :
    echo '<div class="wrap">';
    ?>
    <h2><img style="margin-right: 5px;" style="margin-right: 5px;" src="<?php echo plugins_url( 'imasters-wp-hacks/assets/images/imasters32.png' )?>" alt="imasters-ico"/><?php _e('Uninstall iMasters WP Hacks', 'iwph') ?></h2>
    <?php
    switch($_POST['do']) {
        //  Uninstall iMasters WP Hacks
        case __('Uninstall iMasters WP Hacks', 'iwph') :
        if(trim($_POST['uninstall_iwph_yes']) == 'yes') :
        echo '<h3>'.__( 'Options', 'iwph').'</h3>';
        echo '<ol>';
        foreach($iwph_settings as $setting) :
            $delete_setting = delete_option($setting);
            if($delete_setting) {
            printf(__('<li>Option \'%s\' has been deleted.</li>', 'iwph'), "<strong><em>{$setting}</em></strong>");
            }
            else {
                printf(__('<li>Error deleting Option \'%s\'.</li>', 'iwph'), "<strong><em>{$setting}</em></strong>");
                }
        endforeach;
        echo '</ol>';
        echo '<br/>';
        $mode = 'end-UNINSTALL';
        endif;
        break;
    }
endif;
    switch($mode) {
    //  Deactivating Uninstall iMasters WP Hacks
    case 'end-UNINSTALL':
        $deactivate_url = 'plugins.php?action=deactivate&amp;plugin=imasters-wp-hacks/imasters-wp-hacks.php';
        if(function_exists('wp_nonce_url')) {
            $deactivate_url = wp_nonce_url($deactivate_url, 'deactivate-plugin_imasters-wp-hacks/imasters-wp-hacks.php');
        }
    echo sprintf(__('<a href="%s" class="button-primary">Deactivate iMasters WP Hacks</a> Disable that plugin to conclude the uninstalling.', 'iwph'), $deactivate_url);
    echo '</div>';
    break;
    default:
    ?>
    <!-- Uninstall iMasters WP Hacks -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo plugin_basename(__FILE__); ?>">
        <div class="wrap">
            <h2><img style="margin-right: 5px;" src="<?php echo plugins_url( 'imasters-wp-hacks/assets/images/imasters32.png' )?>" alt="imasters-ico"/><?php _e('Uninstall iMasters WP Hacks', 'iwph'); ?></h2>
            <p><?php _e('Uninstaling this plugin the options used by iMasters WP Hacks will be removed.', 'iwph'); ?></p>
            <div class="error">
            <p><?php _e('Warning:', 'iwph'); ?>
            <?php _e('This process is irreversible. We suggest that you do a database backup first.', 'iwph'); ?></p>
            </div>
            <table>
                <tr>
                    <td>
                    <?php _e('The following WordPress Options will be deleted:', 'iwph'); ?>
                    </td>
                </tr>
            </table>
            <table class="widefat">
                <thead>
                    <tr>
                        <th><?php _e('WordPress Options', 'iwph'); ?></th>
                    </tr>
                </thead>
                <tr>
                    <td valign="top">
                        <ol>
                        <?php
                        foreach($iwph_settings as $settings)
                            printf( "<li>%s</li>\n", $settings );
                        ?>
                        </ol>
                    </td>
                </tr>
            </table>
            <p>
                <input type="checkbox" name="uninstall_iwph_yes" id="uninstall_iwph_yes" value="yes" />
                <label for="uninstall_iwph_yes"><?php _e('Yes. Uninstall iMasters WP Hacks now', 'iwph'); ?></label>
            </p>
            <p>
                <input type="submit" name="do" value="<?php _e('Uninstall iMasters WP Hacks', 'iwph'); ?>" class="button-primary" />
            </p>
        </div>
    </form>
<?php
}
?>