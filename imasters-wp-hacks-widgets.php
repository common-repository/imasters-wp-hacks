<?php
/**
 *
 */
if ( isset( $_POST['act'] ) ) :
	switch( $_POST['act'] ) :
		case __( 'Hide Dashboard widgets', 'iwph' ) :
			update_option( 'imasters_wp_hacks_remove_dashboard_widgets',  isset ($_POST['dashboard_widgets']) ? $_POST['dashboard_widgets'] : '' );
                        $text_message_hide = __( 'Dashboard Widgets hidden successfully', 'iwph' );
		break;
		case __( 'Hide Post widgets', 'iwph' ) :
			update_option( 'imasters_wp_hacks_remove_post_widgets',  $_POST['post_widgets']  );
                        $text_message_hide = __( 'Post Widgets hidden successfully', 'iwph' );
		break;
		case __( 'Hide Page widgets', 'iwph' ) :
			update_option( 'imasters_wp_hacks_remove_page_widgets',  $_POST['page_widgets']  );
                        $text_message_hide = __( 'Page Widgets hidden successfully', 'iwph' );
		break;
		case __( 'Hide Link widgets', 'iwph' ) :
			update_option( 'imasters_wp_hacks_remove_link_widgets',  $_POST['link_widgets']  );
                        $text_message_hide = __( 'Links Widgets hidden successfully', 'iwph' );
		break;
	endswitch;
endif;
?>
<div class="wrap">
    <?php if( !empty( $text_message_hide ) ): ?>
    <div id="message" class="updated fade">
        <p><?php echo $text_message_hide ?></p>
    </div>
    <?php endif; ?>

	<h2><img style="margin-right: 5px;" src="<?php echo plugins_url( 'imasters-wp-hacks/assets/images/imasters32.png' )?>" alt="imasters-ico"/><?php _e('iMasters Hacks Widgets','iwph') ?></h2>

    <h3><?php _e('Dashboard widgets','iwph') ?></h3>

    <form method="post" action="<?php echo htmlspecialchars( $_SERVER['REQUEST_URI'] ); ?>">
    	<table class="widefat">
        	<thead>
            	<tr>
                	<th class="check-column" scope="col"><input type="checkbox" /></th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            	<tr>
                	<th class="check-column" scope="row">
                    	<input type="checkbox" name="dashboard_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'dashboard', 'dashboard_right_now' ); ?> id="dashboard_right_now" value="dashboard_right_now" />
                    </th>
                    <td><label for="dashboard_right_now"><?php _e('Right now','iwph') ?></label></td>
                </tr>
                <tr>
                	<th class="check-column" scope="row">
                    	<input type="checkbox" name="dashboard_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'dashboard', 'dashboard_quick_press' ); ?> id="dashboard_quick_press" value="dashboard_quick_press" />
                    </th>
                    <td><label for="dashboard_quick_press"><?php _e('QuickPress','iwph') ?></label></td>
                </tr>
                <tr>
                	<th class="check-column" scope="row">
                    	<input type="checkbox" name="dashboard_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'dashboard', 'dashboard_recent_comments' ); ?> id="dashboard_recent_comments" value="dashboard_recent_comments" />
                    </th>
                    <td><label for="dashboard_recent_comments"><?php _e('Recent comments','iwph') ?></label></td>
                </tr>
                <tr>
                	<th class="check-column" scope="row">
                    	<input type="checkbox" name="dashboard_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'dashboard', 'dashboard_recent_drafts' ); ?> id="dashboard_recent_drafts" value="dashboard_recent_drafts" />
                    </th>
                    <td><label for="dashboard_recent_drafts"><?php _e('Recent drafts','iwph') ?></label></td>
                </tr>
                <tr>
                	<th class="check-column" scope="row">
                    	<input type="checkbox" name="dashboard_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'dashboard', 'dashboard_incoming_links' ); ?> id="dashboard_incoming_links" value="dashboard_incoming_links" />
                    </th>
                    <td><label for="dashboard_incoming_links"><?php _e('Incoming links','iwph') ?></label></td>
                </tr>
                <tr>
                	<th class="check-column" scope="row">
                    	<input type="checkbox" name="dashboard_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'dashboard', 'dashboard_primary' ); ?> id="dashboard_primary" value="dashboard_primary" />
                    </th>
                    <td><label for="dashboard_primary"><?php _e('WordPress Development blog','iwph') ?></label></td>
                </tr>
                <tr>
                	<th class="check-column" scope="row">
                    	<input type="checkbox" name="dashboard_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'dashboard', 'dashboard_secondary' ); ?> id="dashboard_secondary" value="dashboard_secondary" />
                    </th>
                    <td><label for="dashboard_secondary"><?php _e('Other WordPress News','iwph') ?></label></td>
                </tr>
                <tr>
                	<th class="check-column" scope="row">
                    	<input type="checkbox" name="dashboard_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'dashboard', 'dashboard_plugins' ); ?> id="dashboard_plugins" value="dashboard_plugins" />
                    </th>
                    <td><label for="dashboard_plugins"><?php _e('Plugins','iwph') ?></label></td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="act" class="button-primary" value="<?php _e('Hide Dashboard widgets','iwph') ?>" />
        </p>
    </form>

    <h3>Posts widgets</h3>

    <form method="post" action="<?php echo htmlspecialchars( $_SERVER['REQUEST_URI'] ); ?>">
    	<table class="widefat">
        	<thead>
            	<tr>
                    <th class="check-column" scope="col"><input type="checkbox" /></th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="check-column" scope="row">
                    <input type="checkbox" name="post_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'post', 'tagsdiv-post_tag' ); ?> id="tagsdiv-post_tag" value="tagsdiv-post_tag" />
                    </th>
                    <td><label for="tagsdiv-post_tag"><?php _e('Post tags','iwph') ?></label></td>
                </tr>
                <tr>
                    <th class="check-column" scope="row">
                    <input type="checkbox" name="post_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'post', 'categorydiv' ); ?> id="categorydiv" value="categorydiv" />
                    </th>
                    <td><label for="categorydiv"><?php _e('Post categories','iwph') ?></label></td>
                </tr>
                <tr>
                    <th class="check-column" scope="row">
                    <input type="checkbox" name="post_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'post', 'postexcerpt' ); ?> id="postexcerpt" value="postexcerpt" />
                    </th>
                    <td><label for="postexcerpt"><?php _e('Post excerpt','iwph') ?></label></td>
                </tr>
                <tr>
                    <th class="check-column" scope="row">
                    <input type="checkbox" name="post_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'post', 'trackbacksdiv' ); ?> id="trackbacksdiv" value="trackbacksdiv" />
                    </th>
                    <td><label for="trackbacksdiv"><?php _e('Post Send Trackbacks','iwph') ?></label></td>
                </tr>
                <tr>
                    <th class="check-column" scope="row">
                    <input type="checkbox" name="post_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'post', 'postcustom' ); ?> id="postcustom" value="postcustom" />
                    </th>
                    <td><label for="postcustom"><?php _e('Post Custom Fields','iwph') ?></label></td>
                </tr>
                <tr>
                    <th class="check-column" scope="row">
                    <input type="checkbox" name="post_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'post', 'commentstatusdiv' ); ?> id="commentstatusdiv" value="commentstatusdiv" />
                    </th>
                    <td><label for="commentstatusdiv"><?php _e('Post Discussion','iwph') ?></label></td>
                </tr>
                <tr>
                    <th class="check-column" scope="row">
                    <input type="checkbox" name="post_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'post', 'commentsdiv' ); ?> id="commentsdiv" value="commentsdiv" />
                    </th>
                    <td><label for="commentsdiv"><?php _e('Comments','iwph') ?></label></td>
                </tr>
                <tr>
                    <th class="check-column" scope="row">
                    <input type="checkbox" name="post_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'post', 'authordiv' ); ?> id="authordiv" value="authordiv" />
                    </th>
                    <td><label for="authordiv"><?php _e('Post Author','iwph') ?></label></td>
                </tr>
                <tr>
                    <th class="check-column" scope="row">
                    <input type="checkbox" name="post_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'post', 'revisionsdiv' ); ?> id="revisionsdiv" value="revisionsdiv" />
                    </th>
                    <td><label for="revisionsdiv"><?php _e('Post Revisions','iwph') ?></label></td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="act" class="button-primary" value="<?php _e('Hide Post widgets','iwph') ?>" />
        </p>
    </form>

    <h3>Pages widgets</h3>

    <form method="post" action="<?php echo htmlspecialchars( $_SERVER['REQUEST_URI'] ); ?>">
    	<table class="widefat">
        	<thead>
            	<tr>
                    <th class="check-column" scope="col"><input type="checkbox" /></th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="check-column" scope="row">
                    <input type="checkbox" name="page_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'page', 'pagecustomdiv' ); ?> id="pagecustomdiv" value="pagecustomdiv" />
                    </th>
                    <td><label for="pagecustomdiv"><?php _e('Page Custom Fields','iwph') ?></label></td>
                </tr>
                <tr>
                    <th class="check-column" scope="row">
                    <input type="checkbox" name="page_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'page', 'pagecommentstatusdiv' ); ?> id="pagecommentstatusdiv" value="pagecommentstatusdiv" />
                    </th>
                    <td><label for="pagecommentstatusdiv"><?php _e('Page Discussion','iwph') ?></label></td>
                </tr>
                <tr>
                    <th class="check-column" scope="row">
                    <input type="checkbox" name="page_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'page', 'pageparentdiv' ); ?> id="pageparentdiv" value="pageparentdiv" />
                    </th>
                    <td><label for="pageparentdiv"><?php _e('Page Attributes','iwph') ?></label></td>
                </tr>
                <tr>
                    <th class="check-column" scope="row">
                    <input type="checkbox" name="page_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'page', 'pageauthordiv' ); ?> id="pageauthordiv" value="pageauthordiv" />
                    </th>
                    <td><label for="pageauthordiv"><?php _e('Page Author','iwph') ?></label></td>
                </tr>
                <tr>
                    <th class="check-column" scope="row">
                    <input type="checkbox" name="page_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'page', 'revisionsdiv' ); ?> id="revisionsdiv" value="revisionsdiv" />
                    </th>
                    <td><label for="revisionsdiv"><?php _e('Page Revisions','iwph') ?></label></td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="act" class="button-primary" value="<?php _e('Hide Page widgets','iwph') ?>" />
        </p>
    </form>

    <h3>Links</h3>

	<form method="post" action="<?php echo htmlspecialchars( $_SERVER['REQUEST_URI'] ); ?>">
    	<table class="widefat">
        	<thead>
            	<tr>
                	<th class="check-column" scope="col"><input type="checkbox" /></th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                	<th class="check-column" scope="row">
                    	<input type="checkbox" name="link_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'link', 'linkcategorydiv' ); ?> id="linkcategorydiv" value="linkcategorydiv" />
                    </th>
                    <td><label for="linkcategorydiv"><?php _e('Link Categories','iwph') ?></label></td>
                </tr>
                <tr>
                	<th class="check-column" scope="row">
                    	<input type="checkbox" name="link_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'link', 'linktargetdiv' ); ?> id="linktargetdiv" value="linktargetdiv" />
                    </th>
                    <td><label for="linktargetdiv"><?php _e('link Target','iwph') ?></label></td>
                </tr>
                <tr>
                	<th class="check-column" scope="row">
                    	<input type="checkbox" name="link_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'link', 'linkxfndiv' ); ?> id="linkxfndiv" value="linkxfndiv" />
                    </th>
                    <td><label for="linkxfndiv"><?php _e('Link Relationship (XFN)','iwph') ?></label></td>
                </tr>
                <tr>
                	<th class="check-column" scope="row">
                    	<input type="checkbox" name="link_widgets[]" <?php $imasters_wp_hacks->is_widget_selected( 'link', 'linkadvanceddiv' ); ?> id="linkadvanceddiv" value="linkadvanceddiv" />
                    </th>
                    <td><label for="linkadvanceddiv"><?php _e('Link Advanced','iwph') ?></label></td>
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="act" class="button-primary" value="<?php _e('Hide Link widgets','iwph') ?>" />
        </p>
    </form>

</div>