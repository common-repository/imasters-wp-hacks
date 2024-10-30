<?php
/*
Plugin Name: iMasters WP Hacks
Plugin URI: http://code.imasters.com.br/wordpress/plugins/imasters-wp-hacks/
Description: iMasters WP Hacks is a solution to personalize the WordPress admin to final users. Hide some widgets, show anothers, hide menu itens and controll what your client can see.
Version: 0.2.2
Author: Apiki
Author URI: http://apiki.com/
*/

/*  Copyright 2009  Apiki (email : leandro@apiki.com)

   This program is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 2 of the License, or
   (at your option) any later version.

   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with this program; if not, write to the Free Software
   Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class IMASTERS_WP_Hacks {

        var $wp_menu = array(
            'dashboard' => array(
                'menu_number' => 0,
                'page' => 'index.php'
            ),
            'posts' => array(
                'menu_number' => 5,
                'page' => array(
                    'edit.php',
                    'post-new.php',
                    'edit-tags.php',
                    'categories.php'
                )
            ),
            'media' => array(
                'menu_number' => 10,
                'page' => array(
                    'upload.php',
                    'media-new.php'
                )
            ),
            'links' => array(
                'menu_number' => 15,
                'page' => array(
                    'link-manager.php',
                    'link-add.php',
                    'edit-link-categories.php'
                )
            ),
            'pages' => array(
                'menu_number' => 20,
                'page' => array(
                    'edit-pages.php',
                    'page-new.php'
                )
            ),
            'comments' => array(
                'menu_number' => 25,
                'page' => 'edit-comments.php'
            ),
            'profile' => array(
                'menu_number' => 70,
                'page' => 'profile.php'
            ),
            'tools' => array(
                'menu_number' => 75,
                'page' => 'tools.php'
            )
        );

        /**
        * Store the URL to redir the user that canÂ´t access dashboard page
        * @var string
        */
        var $imasters_wp_hacks_dashboard_redir = '';

	/**
	 * Construct function
	 */
	function IMASTERS_WP_Hacks()
	{
            //Call the function to install the plugin
            add_action( 'activate_imasters-wp-hacks/imasters-wp-hacks.php', array( &$this, 'install' ) );
            //print the scripts on the header
            add_action( 'wp_print_scripts', array( &$this, 'scripts' ) );
            //print the scripts on the header
            add_action( 'admin_head', array( &$this, 'header' ) );
            //call the function when modify dashboard
            add_action( 'init', array( &$this, 'dashboard_redir' ) );
            //call the function when translate language
            add_action( 'init', array( &$this, 'textdomain' ) );
            //call function whem verify the access header url
            add_action( 'init', array( &$this, 'check_url_menu' ) );
            //call function whem create the menu
            add_action( 'admin_menu', array( &$this, 'menu' ) );
            //call the function when modify widgets
            add_action( 'admin_menu', array( &$this, 'widgets' ) );
            //call the function when modify navigations
            add_action( 'admin_menu', array( &$this, 'navigation' ) );
            
	}

        /**
        * This function is called in the plugin is activated.
        */
	function install()
	{


        $role = get_role( 'administrator' );
        if( !$role->has_cap( 'mananger_hacks' ) ) :
           $role->add_cap( 'mananger_hacks' );
        endif;

        //Add the options used by this plugin.
        $empty_array = serialize( array() );


        add_option( 'imasters_wp_hacks_remove_dashboard_widgets', $empty_array );
        add_option( 'imasters_wp_hacks_remove_post_widgets',      $empty_array );
        add_option( 'imasters_wp_hacks_remove_page_widgets',      $empty_array );
        add_option( 'imasters_wp_hacks_remove_link_widgets',      $empty_array );
        add_option( 'imasters_wp_hacks_dashboard_access_level',     -1 );
        add_option( 'imasters_wp_hacks_posts_access_level',         -1 );
        add_option( 'imasters_wp_hacks_media_access_level',         -1 );
        add_option( 'imasters_wp_hacks_links_access_level',         -1 );
        add_option( 'imasters_wp_hacks_pages_access_level',         -1 );
        add_option( 'imasters_wp_hacks_comments_access_level',      -1 );
        add_option( 'imasters_wp_hacks_profile_access_level',       -1 );
        add_option( 'imasters_wp_hacks_tools_access_level',         -1 );
        add_option( 'imasters_wp_hacks_dashboard_redir',    get_bloginfo( 'siteurl' ) );
	}

        /**
         * Print the Javascript on the reader to use the functions in code
         */
        function header()
        {
            if ( ! empty ($_GET['page']) )
                if ( strpos( $_GET['page'], 'imasters-wp-hacks' ) !== false ) :
                    $IMASTERS_WP_Hacks_version = filemtime( dirname( __FILE__ ) . '/imasters-wp-hacks-scripts.js' );
                    wp_enqueue_script( 'imasters-wp-hacks', WP_PLUGIN_URL . '/imasters-wp-hacks/imasters-wp-hacks-scripts.js', array( 'jquery' ), $IMASTERS_WP_Hacks_version );
                    wp_print_scripts( array( 'jquery', 'imasters-wp-hacks' ) );
                endif;
        }

	/**
	 * Create the menu in sidebar the navigate and use the functionalities
	 */
	function menu()
	{
		if ( function_exists( 'add_menu_page' ) )
			add_menu_page( __( 'iMasters WP Hacks', 'imasters-wp-hacks' ), __( 'iMasters WP Hacks', 'imasters-wp-hacks' ), 'mananger_hacks', 'imasters-wp-hacks/imasters-wp-hacks-index.php', '' , plugins_url( 'imasters-wp-hacks/assets/images/imasters.png' ) );

		if ( function_exists( 'add_submenu_page' ) ) :
			add_submenu_page( 'imasters-wp-hacks/imasters-wp-hacks-index.php', __( 'Widgets', 'iwph' ), __( 'Widgets', 'iwph' ), 'mananger_hacks', 'imasters-wp-hacks/imasters-wp-hacks-widgets.php' );
			add_submenu_page( 'imasters-wp-hacks/imasters-wp-hacks-index.php', __( 'Navigation', 'iwph' ), __( 'Navigation', 'iwph' ), 'mananger_hacks', 'imasters-wp-hacks/imasters-wp-hacks-navigation.php' );
                        add_submenu_page( 'imasters-wp-hacks/imasters-wp-hacks-index.php', __( 'Uninstall', 'iwph' ), __( 'Uninstall', 'iwph' ), 'mananger_hacks', 'imasters-wp-hacks/imasters-wp-hacks-uninstall.php' );
		endif;

	}

        /**
         *
         *Create the textdomain for translation language
         */
        function textdomain()
        {
            load_plugin_textdomain('iwph',False,'wp-content/plugins/imasters-wp-hacks/assets/languages');
        }

	/**
	 * This function is called after all
	 * WordPress environment has been loaded.
	 */
	function widgets()
	{
		global $imasters_wp_hacks;

		/**
		 * Get the options that define what widgets was marked
		 */
		$dashboard_widgets_selected =  get_option( 'imasters_wp_hacks_remove_dashboard_widgets' ) ;
		$imasters_wp_hacks->_remove_widgets( 'dashboard', $dashboard_widgets_selected );

		$post_widgets_selected =  get_option( 'imasters_wp_hacks_remove_post_widgets' );

                //it verifies the version of wordpress and alters the name of id widget for correct use
                $tag_key = array_keys( array($post_widgets_selected), 'tagsdiv-post_tag' );
                if (! empty ($tag_key))
                   $tag_key = $tag_key[0];
                if ( get_bloginfo( 'version' ) < 2.8 )
                $post_widgets_selected[$tag_key] = 'tagsdiv';


                $imasters_wp_hacks->_remove_widgets( 'post', $post_widgets_selected );

		$page_widgets_selected =  get_option( 'imasters_wp_hacks_remove_page_widgets' );
                $imasters_wp_hacks->_remove_widgets( 'page', $page_widgets_selected );


		$link_widgets_selected =  get_option( 'imasters_wp_hacks_remove_link_widgets' );
		$imasters_wp_hacks->_remove_widgets( 'link', $link_widgets_selected );
	}

	/**
	 *
	 */
	function _remove_widgets( $widget_place, $widgets )
	{
            if ( $this->_is_admin_user() )
                return;

		foreach( (array)$widgets as $widget_name )
                    remove_meta_box( $widget_name, $widget_place, 'advanced' );
	}

        /**
         * Check if the current user is the administrator.
         *
         * @return bool Returns true if the logged user is the administrador, false if not.
         */
        function _is_admin_user()
        {
            $current_user 	= 	wp_get_current_user();
            $user_roles 	= 	$current_user->roles;

            return in_array( 'administrator', $user_roles );
        }

	function navigation()
	{
            global $menu;

            $current_user = wp_get_current_user();
            $current_user_level = $current_user->user_level;

            $dashboard_access_level   =   get_option( 'imasters_wp_hacks_dashboard_access_level' );
            $posts_access_level       =   get_option( 'imasters_wp_hacks_posts_access_level'     );
            $media_access_level       =   get_option( 'imasters_wp_hacks_media_access_level'     );
            $links_access_level       =   get_option( 'imasters_wp_hacks_links_access_level'     );
            $pages_access_level       =   get_option( 'imasters_wp_hacks_pages_access_level'     );
            $comments_access_level    =   get_option( 'imasters_wp_hacks_comments_access_level'  );
            $profile_access_level     =   get_option( 'imasters_wp_hacks_profile_access_level'   );
            $tools_access_level       =   get_option( 'imasters_wp_hacks_tools_access_level'     );

           
            if ( $current_user_level < $dashboard_access_level )
                unset( $menu[$this->wp_menu['dashboard']['menu_number']] );
                
            if ( $current_user_level < $posts_access_level )
                unset($menu[$this->wp_menu['posts']['menu_number']]);

            if ( $current_user_level < $media_access_level )
                unset( $menu[$this->wp_menu['media']['menu_number']] );

            if ( $current_user_level < $links_access_level ) 
                unset( $menu[$this->wp_menu['links']['menu_number']] );

            if ( $current_user_level < $pages_access_level ) 
                unset( $menu[$this->wp_menu['pages']['menu_number']] );

            if ( $current_user_level < $comments_access_level ) 
                unset( $menu[$this->wp_menu['comments']['menu_number']] );

            if ( $current_user_level < $profile_access_level ) :
                if ( get_bloginfo( 'version' ) < 2.8 )
                    unset( $menu[50] );
                else
                    unset( $menu[$this->wp_menu['profile']['menu_number']] );
            endif;
            if ( $current_user_level < $tools_access_level ) :
                if ( get_bloginfo( 'version' ) < 2.8 )
                    unset( $menu[55] );
                else
                    unset( $menu[$this->wp_menu['tools']['menu_number']] );
            endif;
	}

        function check_url_menu()
        {

            global $current_user;
            $current_user = wp_get_current_user();

            if ( is_user_logged_in() ) 
                $current_user_level = $current_user->user_level;
            else
                $current_user_level = '';
            $dashboard_access_level   =   get_option( 'imasters_wp_hacks_dashboard_access_level' );
            $posts_access_level       =   get_option( 'imasters_wp_hacks_posts_access_level'     );
            $media_access_level       =   get_option( 'imasters_wp_hacks_media_access_level'     );
            $links_access_level       =   get_option( 'imasters_wp_hacks_links_access_level'     );
            $pages_access_level       =   get_option( 'imasters_wp_hacks_pages_access_level'     );
            $comments_access_level    =   get_option( 'imasters_wp_hacks_comments_access_level'  );
            $profile_access_level     =   get_option( 'imasters_wp_hacks_profile_access_level'   );
            $tools_access_level       =   get_option( 'imasters_wp_hacks_tools_access_level'     );
            $dashboard_redir          =   get_option( 'imasters_wp_hacks_dashboard_redir'        );

            $dashboard_access   =   ( $current_user_level >= $dashboard_access_level );
            $posts_access       =   ( $current_user_level >= $posts_access_level     );
            $media_access       =   ( $current_user_level >= $media_access_level     );
            $links_access       =   ( $current_user_level >= $links_access_level     );
            $pages_access       =   ( $current_user_level >= $pages_access_level     );
            $comments_access    =   ( $current_user_level >= $comments_access_level  );
            $profile_access     =   ( $current_user_level >= $profile_access_level   );
            $tools_access       =   ( $current_user_level >= $tools_access_level     );
            
            $text_message = __( 'You do not have sufficient permissions to manage this page.', 'iwph' );

            //verification of the access header the dashboard
            if ( !headers_sent() and strpos( $_SERVER['PHP_SELF'], 'wp-admin/index.php' ) and !$dashboard_access ) :
                wp_redirect( $dashboard_redir );
                exit();
            endif;
            //verification of the access header the menu post
            if ( !headers_sent() and strpos( $_SERVER['PHP_SELF'], 'wp-admin/edit.php' ) and !$posts_access )
                wp_die( $text_message );

            if ( !headers_sent() and strpos( $_SERVER['PHP_SELF'], 'wp-admin/post-new.php' ) and !$posts_access ) 
                wp_die( $text_message );

            if ( !headers_sent() and strpos( $_SERVER['PHP_SELF'], 'wp-admin/edit-tags.php' ) and !$posts_access )
                wp_die( $text_message );

            if ( !headers_sent() and strpos( $_SERVER['PHP_SELF'], 'wp-admin/categories.php' ) and !$posts_access )
                wp_die( $text_message );

            //verification of the access header the menu media
            if ( !headers_sent() and strpos( $_SERVER['PHP_SELF'], 'wp-admin/upload.php' ) and !$media_access )
                wp_die( $text_message );

            if ( !headers_sent() and strpos( $_SERVER['PHP_SELF'], 'wp-admin/media-new.php' ) and !$media_access )
                wp_die( $text_message );

            //verification of the access header the menu links
            if ( !headers_sent() and strpos( $_SERVER['PHP_SELF'], 'wp-admin/link-manager.php' ) and !$links_access )
                wp_die( $text_message );

            if ( !headers_sent() and strpos( $_SERVER['PHP_SELF'], 'wp-admin/link-add.php' ) and !$links_access )
                wp_die( $text_message );

            if ( !headers_sent() and strpos( $_SERVER['PHP_SELF'], 'wp-admin/edit-link-categories.php' ) and !$links_access )
                wp_die( $text_message );

            //verification of the access header the menu pages
            if ( !headers_sent() and strpos( $_SERVER['PHP_SELF'], 'wp-admin/edit-pages.php' ) and !$pages_access )
                wp_die( $text_message );

            if ( !headers_sent() and strpos( $_SERVER['PHP_SELF'], 'wp-admin/page-new.php' ) and !$pages_access )
                wp_die( $text_message );

            //verification of the access header the menu comments
            if ( !headers_sent() and strpos( $_SERVER['PHP_SELF'], 'wp-admin/edit-comments.php' ) and !$comments_access )
                wp_die( $text_message );
            //verification of the access header the menu profile
            if ( !headers_sent() and strpos( $_SERVER['PHP_SELF'], 'wp-admin/profile.php' ) and !$profile_access )
                wp_die( $text_message );
            //verification of the access header the menu tools
            if ( !headers_sent() and strpos( $_SERVER['PHP_SELF'], 'wp-admin/tools.php' ) and !$tools_access )
                wp_die( $text_message );
        }

	function is_widget_selected( $widget_place, $widget_name )
	{
		/**
		 * Get the options that define what widgets was marked
		 */
		$widgets_selected = get_option( "imasters_wp_hacks_remove_{$widget_place}_widgets" ) ;

		echo ( in_array( $widget_name, (array)$widgets_selected ) ) ? ' checked="checked"' : '';
	}
        
        function dashboard_redir()
        {
            $menu_hacks = get_option( 'imasters_wp_hacks_dashboard_access_level' );

            if ( is_user_logged_in() ) :
                $current_user = wp_get_current_user();
                $current_user_level = $current_user->user_level;

                $dashboard_access = ( $current_user_level >= $menu_hacks  );
            endif;

            if ( !headers_sent() and strpos( $_SERVER['PHP_SELF'], 'wp-admin/index.php' ) and !$dashboard_access ) :
                wp_redirect( get_option( 'imasters_wp_hacks_dashboard_redir' ) );
                exit();
            endif;
        }

        /**
        * This function insert JS in admin plugin
        */
        function scripts()
        {
            if (! empty($_GET['page'] ))
            if ( strpos( $_GET['page'], 'imasters-wp-hacks' ) !== false ) :
                echo "\n<!-- START - Generated by iMasters WP Hacks -->";
                echo '<script type="text/javascript">' . "\n";
                echo '/* <![CDATA[ */';
                printf( 'var imasters_hacks_dashboard_redir_message = "%s";', __( '<strong> You need to inform the page to redirect users when he can not access the dashboard.</strong>', 'iwph' ) );
                echo '/* ]]> */';
                echo '</script>';
                echo "\n<!-- END - Generated by iMasters WP Hacks -->\n";
            endif;
        }

}
//Create capability from plugin management
$role = get_role('administrator');
	if(!$role->has_cap('manage_hacks')) {
		$role->add_cap('manage_hacks');
        }

$imasters_wp_hacks = new IMASTERS_WP_Hacks;
?>