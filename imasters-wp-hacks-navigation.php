<?php //print_r($menu[$imasters_wp_hacks->wp_menu['dashboard']['menu_number']]); ?>
<?php
if ( isset( $_POST['act'] ) ) :
	switch( $_POST['act'] ) :
		case __( 'Hide menu navigation', 'iwph' ) :

                    if ( isset( $_POST['imasters_wp_hacks_dashboard_access_level'] ) ) {
                        update_option( 'imasters_wp_hacks_dashboard_access_level', $_POST['imasters_wp_hacks_dashboard_access_level'] );
                    }
                    if ( isset( $_POST['imasters_wp_hacks_posts_access_level'] ) ) {
                        update_option( 'imasters_wp_hacks_posts_access_level', $_POST['imasters_wp_hacks_posts_access_level'] );
                    }
                    if ( isset( $_POST['imasters_wp_hacks_media_access_level'] ) ){
                        update_option( 'imasters_wp_hacks_media_access_level', $_POST['imasters_wp_hacks_media_access_level'] );
                    }
                    if ( isset( $_POST['imasters_wp_hacks_links_access_level'] ) ){
                        update_option( 'imasters_wp_hacks_links_access_level', $_POST['imasters_wp_hacks_links_access_level'] );
                    }
                    if ( isset( $_POST['imasters_wp_hacks_pages_access_level'] ) ){
                        update_option( 'imasters_wp_hacks_pages_access_level', $_POST['imasters_wp_hacks_pages_access_level'] );
                    }
                    if ( isset( $_POST['imasters_wp_hacks_comments_access_level'] ) ){
                        update_option( 'imasters_wp_hacks_comments_access_level', $_POST['imasters_wp_hacks_comments_access_level'] );
                    }
                    if ( isset( $_POST['imasters_wp_hacks_profile_access_level'] ) ){
                        update_option( 'imasters_wp_hacks_profile_access_level', $_POST['imasters_wp_hacks_profile_access_level'] );
                    }
                    if ( isset( $_POST['imasters_wp_hacks_tools_access_level'] ) ){
                        update_option( 'imasters_wp_hacks_tools_access_level', $_POST['imasters_wp_hacks_tools_access_level'] );
                    }
                    if ( !empty( $_POST['imasters_hacks_dashboard_redir'] ) and $_POST['imasters_hacks_dashboard_redir'] != 'http://' )
                        update_option( 'imasters_wp_hacks_dashboard_redir', $_POST['imasters_hacks_dashboard_redir'] );

                    $text_message_level = __( 'Level definition updated successfully', 'iwph' );
		break;
	endswitch;
endif;
?>
<div class="wrap">
    <?php if( ! empty($text_message_level) ) : ?>
    <div id="message" class="updated fade">
        <p><?php echo $text_message_level; ?></p>
    </div>
    <?php endif; ?>
	<h2><img style="margin-right: 5px;" src="<?php echo plugins_url( 'imasters-wp-hacks/assets/images/imasters32.png' )?>" alt="imasters-ico"/><?php _e( 'iMasters Hacks Navigation', 'iwph' ) ?></h2>
        <form id="ah-frm-navigation" method="post" action="<?php echo htmlspecialchars( $_SERVER['REQUEST_URI'] ); ?>">
            <h3><?php _e( 'Dashboard', 'iwph' ) ?></h3>
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="imasters_wp_hacks_dashboard_access_level"> <?php _e( 'Minimum level to access this page', 'iwph' ) ?></label>
                        </th>
                        <td>
                            <select name="imasters_wp_hacks_dashboard_access_level" id="imasters_wp_hacks_dashboard_access_level">
                                <option value=""><?php _e('Select one','iwph') ?></option>
                                <option value="10"<?php echo ( get_option( 'imasters_wp_hacks_dashboard_access_level' ) == 10 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role administrator (Level 10)','iwph' ) ?></option>
                                <option value="7"<?php echo  ( get_option( 'imasters_wp_hacks_dashboard_access_level' ) ==  7 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role editor (Level 7)', 'iwph' ) ?></option>
                                <option value="2"<?php echo  ( get_option( 'imasters_wp_hacks_dashboard_access_level' ) ==  2 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role author (Level 2)', 'iwph' ) ?></option>
                                <option value="1"<?php echo  ( get_option( 'imasters_wp_hacks_dashboard_access_level' ) ==  1 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role contributor (Level 1)', 'iwph' ) ?></option>
                                <option value="0"<?php echo  ( get_option( 'imasters_wp_hacks_dashboard_access_level' ) ==  0 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role subscriber (Level 0)', 'iwph' ) ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="imasters_hacks_dashboard_redir"><?php _e( 'Redir page', 'iwph' ) ?></label>
                        </th>
                        <td>
                            <input type="text" name="imasters_hacks_dashboard_redir" id="imasters_hacks_dashboard_redir" class="regular-text code" value="<?php echo get_option( 'imasters_wp_hacks_dashboard_redir' ); ?>"/>
                        </td>
                    
                    </tr>
                </tbody>
            </table>
            <h3><?php _e( 'Posts', 'iwph' ) ?></h3>
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="imasters_wp_hacks_posts_access_level"> <?php _e( 'Minimum level to access this page', 'iwph' ) ?></label>
                        </th>
                        <td>
                            <select name="imasters_wp_hacks_posts_access_level" id="imasters_wp_hacks_posts_access_level">
                                <option value=""><?php _e('Select one','iwph') ?></option>
                                <option value="10"<?php echo ( get_option( 'imasters_wp_hacks_dashboard_access_level' ) == 10 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role administrator (Level 10)','iwph' ) ?></option>
                                <option value="7"<?php echo  ( get_option( 'imasters_wp_hacks_posts_access_level' ) ==  7 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role editor (Level 7)', 'iwph' ) ?></option>
                                <option value="2"<?php echo  ( get_option( 'imasters_wp_hacks_posts_access_level' ) ==  2 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role author (Level 2)', 'iwph' ) ?></option>
                                <option value="1"<?php echo  ( get_option( 'imasters_wp_hacks_posts_access_level' ) ==  1 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role contributor (Level 1)', 'iwph' ) ?></option>
                                <option value="0"<?php echo  ( get_option( 'imasters_wp_hacks_posts_access_level' ) ==  0 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role subscriber (Level 0)', 'iwph' ) ?></option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h3><?php _e( 'Media', 'iwph' ) ?></h3>
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="imasters_wp_hacks_media_access_level"> <?php _e( 'Minimum level to access this page', 'iwph' ) ?></label>
                        </th>
                        <td>
                            <select name="imasters_wp_hacks_media_access_level" id="imasters_wp_hacks_media_access_level">
                                <option value=""><?php _e('Select one','iwph') ?></option>
                                <option value="10"<?php echo ( get_option( 'imasters_wp_hacks_media_access_level' ) == 10 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role administrator (Level 10)','iwph' ) ?></option>
                                <option value="7"<?php echo  ( get_option( 'imasters_wp_hacks_media_access_level' ) ==  7 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role editor (Level 7)', 'iwph' ) ?></option>
                                <option value="2"<?php echo  ( get_option( 'imasters_wp_hacks_media_access_level' ) ==  2 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role author (Level 2)', 'iwph' ) ?></option>
                                <option value="1"<?php echo  ( get_option( 'imasters_wp_hacks_media_access_level' ) ==  1 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role contributor (Level 1)', 'iwph' ) ?></option>
                                <option value="0"<?php echo  ( get_option( 'imasters_wp_hacks_media_access_level' ) ==  0 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role subscriber (Level 0)', 'iwph' ) ?></option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h3><?php _e( 'Links', 'iwph' ) ?></h3>
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="imasters_wp_hacks_links_access_level"> <?php _e( 'Minimum level to access this page', 'iwph' ) ?></label>
                        </th>
                        <td>
                            <select name="imasters_wp_hacks_links_access_level" id="imasters_wp_hacks_links_access_level">
                                <option value=""><?php _e('Select one','iwph') ?></option>
                                <option value="10"<?php echo ( get_option( 'imasters_wp_hacks_links_access_level' ) == 10 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role administrator (Level 10)','iwph' ) ?></option>
                                <option value="7"<?php echo  ( get_option( 'imasters_wp_hacks_links_access_level' ) ==  7 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role editor (Level 7)', 'iwph' ) ?></option>
                                <option value="2"<?php echo  ( get_option( 'imasters_wp_hacks_links_access_level' ) ==  2 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role author (Level 2)', 'iwph' ) ?></option>
                                <option value="1"<?php echo  ( get_option( 'imasters_wp_hacks_links_access_level' ) ==  1 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role contributor (Level 1)', 'iwph' ) ?></option>
                                <option value="0"<?php echo  ( get_option( 'imasters_wp_hacks_links_access_level' ) ==  0 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role subscriber (Level 0)', 'iwph' ) ?></option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h3><?php _e( 'Pages', 'iwph' ) ?></h3>
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="imasters_wp_hacks_pages_access_level"> <?php _e( 'Minimum level to access this page', 'iwph' ) ?></label>
                        </th>
                        <td>
                            <select name="imasters_wp_hacks_pages_access_level" id="imasters_wp_hacks_pages_access_level">
                                <option value=""><?php _e('Select one','iwph') ?></option>
                                <option value="10"<?php echo ( get_option( 'imasters_wp_hacks_pages_access_level' ) == 10 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role administrator (Level 10)','iwph' ) ?></option>
                                <option value="7"<?php echo  ( get_option( 'imasters_wp_hacks_pages_access_level' ) ==  7 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role editor (Level 7)', 'iwph' ) ?></option>
                                <option value="2"<?php echo  ( get_option( 'imasters_wp_hacks_pages_access_level' ) ==  2 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role author (Level 2)', 'iwph' ) ?></option>
                                <option value="1"<?php echo  ( get_option( 'imasters_wp_hacks_pages_access_level' ) ==  1 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role contributor (Level 1)', 'iwph' ) ?></option>
                                <option value="0"<?php echo  ( get_option( 'imasters_wp_hacks_pages_access_level' ) ==  0 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role subscriber (Level 0)', 'iwph' ) ?></option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h3><?php _e( 'Comments', 'iwph' ) ?></h3>
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="imasters_wp_hacks_comments_access_level"> <?php _e( 'Minimum level to access this page', 'iwph' ) ?></label>
                        </th>
                        <td>
                            <select name="imasters_wp_hacks_comments_access_level" id="imasters_wp_hacks_comments_access_level">
                                <option value=""><?php _e('Select one','iwph') ?></option>
                                <option value="10"<?php echo ( get_option( 'imasters_wp_hacks_comments_access_level' ) == 10 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role administrator (Level 10)','iwph' ) ?></option>
                                <option value="7"<?php echo  ( get_option( 'imasters_wp_hacks_comments_access_level' ) ==  7 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role editor (Level 7)', 'iwph' ) ?></option>
                                <option value="2"<?php echo  ( get_option( 'imasters_wp_hacks_comments_access_level' ) ==  2 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role author (Level 2)', 'iwph' ) ?></option>
                                <option value="1"<?php echo  ( get_option( 'imasters_wp_hacks_comments_access_level' ) ==  1 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role contributor (Level 1)', 'iwph' ) ?></option>
                                <option value="0"<?php echo  ( get_option( 'imasters_wp_hacks_comments_access_level' ) ==  0 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role subscriber (Level 0)', 'iwph' ) ?></option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h3><?php _e( 'Profile', 'iwph' ) ?></h3>
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="imasters_wp_hacks_profile_access_level"> <?php _e( 'Minimum level to access this page', 'iwph' ) ?></label>
                        </th>
                        <td>
                            <select name="imasters_wp_hacks_profile_access_level" id="imasters_wp_hacks_profile_access_level">
                                <option value=""><?php _e('Select one','iwph') ?></option>
                                <option value="10"<?php echo ( get_option( 'imasters_wp_hacks_profile_access_level' ) == 10 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role administrator (Level 10)','iwph' ) ?></option>
                                <option value="7"<?php echo  ( get_option( 'imasters_wp_hacks_profile_access_level' ) ==  7 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role editor (Level 7)', 'iwph' ) ?></option>
                                <option value="2"<?php echo  ( get_option( 'imasters_wp_hacks_profile_access_level' ) ==  2 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role author (Level 2)', 'iwph' ) ?></option>
                                <option value="1"<?php echo  ( get_option( 'imasters_wp_hacks_profile_access_level' ) ==  1 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role contributor (Level 1)', 'iwph' ) ?></option>
                                <option value="0"<?php echo  ( get_option( 'imasters_wp_hacks_profile_access_level' ) ==  0 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role subscriber (Level 0)', 'iwph' ) ?></option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h3><?php _e( 'Tools', 'iwph' ) ?></h3>
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="imasters_wp_hacks_tools_access_level"> <?php _e( 'Minimum level to access this page', 'iwph' ) ?></label>
                        </th>
                        <td>
                            <select name="imasters_wp_hacks_tools_access_level" id="imasters_wp_hacks_comments_access_level">
                                <option value=""><?php _e('Select one','iwph') ?></option>
                                <option value="10"<?php echo ( get_option( 'imasters_wp_hacks_tools_access_level' ) == 10 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role administrator (Level 10)','iwph' ) ?></option>
                                <option value="7"<?php echo  ( get_option( 'imasters_wp_hacks_tools_access_level' ) ==  7 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role editor (Level 7)', 'iwph' ) ?></option>
                                <option value="2"<?php echo  ( get_option( 'imasters_wp_hacks_tools_access_level' ) ==  2 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role author (Level 2)', 'iwph' ) ?></option>
                                <option value="1"<?php echo  ( get_option( 'imasters_wp_hacks_tools_access_level' ) ==  1 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role contributor (Level 1)', 'iwph' ) ?></option>
                                <option value="0"<?php echo  ( get_option( 'imasters_wp_hacks_tools_access_level' ) ==  0 ) ? 'selected="selected"' : ''; ?>><?php _e( 'Role subscriber (Level 0)', 'iwph' ) ?></option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="submit">
            <input type="submit" name="act" class="button-primary" value="<?php _e( 'Hide menu navigation', 'iwph' ) ?>" />
            </p>
        </form>
</div>