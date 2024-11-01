<?php

/*
Plugin Name: Social Site Sharer Links Widget
Plugin URI: http://hebeisenconsulting.com/Social-Site-Sharer-Links-Widget/
Description: Social site sharer links widget automatically places popular social share links in a widget placement without configuration.
Version: 1.0
Author: Hebeisen Consulting - R Bueno
Author URI: http://www.hebeisenconsulting.com
License: GPL v2.0.
    Copyright 2011 Hebeisen Consulting

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of 
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA


*/

class social_site_sharer_links_widget extends WP_Widget {
	
	/** constructor */
	function __construct() {
		parent::WP_Widget( /* Base ID */'social_site_sharer_links_widget', /* Name */'Social Site Sharer Links', array( 'description' => 'Social Site Sharer Links' ) );
	}
	/** @see WP_Widget::widget */
	function widget( $args, $instance ) {
		extract( $args );
		$widget_title = $instance['widget_title'];
		$short_desc = $instance[ 'short_desc' ];
		
		echo $before_widget;
		echo $before_title . $widget_title . $after_title;
		echo $short_desc . '<div class="clear"></div>';
		
		$url = get_site_url();
		$desc = get_bloginfo('name');
		
		if( $instance['twitter'] )
			echo '<a href="http://twitter.com/home/?status=' . $desc . '-' . $url . '" target="_blank"><img src="' . plugins_url('social-site-sharer-links-widget/icon/twitter.png') . '"> </a>';
			
		if( $instance['facebook'] )
			echo '<a href="https://www.facebook.com/sharer/sharer.php?u=' . $url . '&bt=' . $desc . '" target="_blank"><img src="' . plugins_url('social-site-sharer-links-widget/icon/facebook.png') . '"> </a>';
		
		if( $instance['delicious'] )
			echo '<a href="http://delicious.com/save?url=' . $url . '&title=' . $desc . '" target="_blank"><img src="' . plugins_url('social-site-sharer-links-widget/icon/delicious.png') . '"> </a>';
		
		if( $instance['digg'] )
			echo '<a href="http://digg.com/submit?url=' . $url . '&title=' . $desc . '" target="_blank"><img src="' . plugins_url('social-site-sharer-links-widget/icon/digg.png') . '"> </a>';
		
		if( $instance['posterous'] )
			echo '<a href="http://posterous.com/share?linkto=' . $url . '&titl' . $desc . '" target="_blank"><img src="' . plugins_url('social-site-sharer-links-widget/icon/posterous.png') . '"> </a>';
			
		if( $instance['stumbleupon'] )
			echo '<a href="http://www.stumbleupon.com/submit?url=' . $url . '&title=' . $desc . '" target="_blank"><img src="' . plugins_url('social-site-sharer-links-widget/icon/stumble_upon.png') . '"> </a>';
		
		if( $instance['friendfeed'] )
			echo '<a href="http://friendfeed.com/?url=' . $url . '&title=' . $desc . '" target="_blank"><img src="' . plugins_url('social-site-sharer-links-widget/icon/friendfeed.png') . '"> </a>';
			
		if( $instance['google_bookmarks'] )
			echo '<a href="http://www.google.com/bookmarks/mark?op=add&bkmk=' . $url . '&title=' . $desc . '" target="_blank"><img src="' . plugins_url('social-site-sharer-links-widget/icon/google.png') . '"> </a>';
			
		if( $instance['pinterest'] )
			echo '<a href="http://pinterest.com/pin/create/button/?url=' . $url . '" target="_blank"><img src="' . plugins_url('social-site-sharer-links-widget/icon/pinterest.png') . '"> </a>';
		
		if( $instance['google_plus'] )
			echo '<a href="https://plus.google.com/share?url=' . $url . '" target="_blank"><img src="' . plugins_url('social-site-sharer-links-widget/icon/google_plus.png') . '"> </a>';
			
		if( $instance['tumbler'] )
			echo '<a href="http://www.tumblr.com/share/link?url=' . $url . '&name=' . $desc . '" target="_blank"><img src="' . plugins_url('social-site-sharer-links-widget/icon/tumblr.png') . '"> </a>';
		
		
		echo $after_widget;
	}
	
	/** @see WP_Widget::update */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['widget_title'] = strip_tags($new_instance['widget_title']);
		$instance['twitter'] = strip_tags($new_instance['twitter']);
		$instance['facebook'] = strip_tags($new_instance['facebook']);
		$instance['delicious'] = strip_tags($new_instance['delicious']);
		$instance['digg'] = strip_tags($new_instance['digg']);
		$instance['posterous'] = strip_tags($new_instance['posterous']);
		$instance['stumbleupon'] = strip_tags($new_instance['stumbleupon']);
		$instance['friendfeed'] = strip_tags($new_instance['friendfeed']);
		$instance['google_bookmarks'] = strip_tags($new_instance['google_bookmarks']);
		$instance['pinterest'] = strip_tags($new_instance['pinterest']);
		$instance['google_plus'] = strip_tags($new_instance['google_plus']);
		$instance['tumbler'] = strip_tags($new_instance['tumbler']);
		
		return $instance;
	}
	
	/** @see WP_Widget::form */
	function form( $instance ) {
		if ( $instance ) {
			$widget_title = esc_attr( $instance[ 'widget_title' ] );
			$twitter = esc_attr( $instance['twitter'] );
			$facebook = esc_attr( $instance['facebook'] );
			$delicious = esc_attr( $instance['delicious'] );
			$digg = esc_attr( $instance['digg'] );
			$posterous = esc_attr( $instance['posterous'] );
			$stumbleupon = esc_attr( $instance['stumbleupon'] );
			$friendfeed = esc_attr( $instance['friendfeed'] );
			$google_bookmarks = esc_attr( $instance['google_bookmarks'] );
			$pinterest = esc_attr( $instance['pinterest'] );
			$google_plus = esc_attr( $instance['google_plus'] );
			$tumbler = esc_attr( $instance['tumbler'] );
		}
		else {
			$widget_title = __( 'Social Site Sharer Links', 'text_domain' );
			$twitter = __( 'true', 'text_domain' );
			$facebook = __( 'true', 'text_domain' );
			$delicious = __( 'true', 'text_domain' );
			$digg = __( 'true', 'text_domain' );
			$posterous = __( 'true', 'text_domain' );
			$stumbleupon = __( 'true', 'text_domain' );
			$friendfeed = __( 'true', 'text_domain' );
			$google_bookmarks = __( 'true', 'text_domain' );
			$pinterest = __( 'true', 'text_domain' );
			$google_plus = __( 'true', 'text_domain' );
			$tumbler = __( 'true', 'text_domain' );
		}
		?>
		
		<p>
		<label for="<?php echo $this->get_field_id('widget_title'); ?>"><?php _e('Widget Title:'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('widget_title'); ?>" name="<?php echo $this->get_field_name('widget_title'); ?>" type="text" value="<?php echo $widget_title; ?>" />
		</p>				
		
		<p>
		<input class="checkbox" type="checkbox" <?php checked( $twitter, 'true' ); ?> value="true" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" /> 
		<label for="<?php echo $this->get_field_id( 'twitter' ); ?>">Twitter</label>
		</p>
		
		<p>
		<input class="checkbox" type="checkbox" <?php checked( $facebook, 'true' ); ?> value="true" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" /> 
		<label for="<?php echo $this->get_field_id( 'facebook' ); ?>">Facebook</label>
		</p>
		
		<p>
		<input class="checkbox" type="checkbox" <?php checked( $delicious, 'true' ); ?> value="true" id="<?php echo $this->get_field_id( 'delicious' ); ?>" name="<?php echo $this->get_field_name( 'delicious' ); ?>" /> 
		<label for="<?php echo $this->get_field_id( 'delicious' ); ?>">Delicious</label>
		</p>
		
		<p>
		<input class="checkbox" type="checkbox" <?php checked( $digg, 'true' ); ?> value="true" id="<?php echo $this->get_field_id( 'digg' ); ?>" name="<?php echo $this->get_field_name( 'digg' ); ?>" /> 
		<label for="<?php echo $this->get_field_id( 'digg' ); ?>">Twitter</label>
		</p>
		
		<p>
		<input class="checkbox" type="checkbox" <?php checked( $posterous, 'true' ); ?> value="true" id="<?php echo $this->get_field_id( 'posterous' ); ?>" name="<?php echo $this->get_field_name( 'posterous' ); ?>" /> 
		<label for="<?php echo $this->get_field_id( 'posterous' ); ?>">Posterous</label>
		</p>
		
		<p>
		<input class="checkbox" type="checkbox" <?php checked( $stumbleupon, 'true' ); ?> value="true" id="<?php echo $this->get_field_id( 'stumbleupon' ); ?>" name="<?php echo $this->get_field_name( 'stumbleupon' ); ?>" /> 
		<label for="<?php echo $this->get_field_id( 'stumbleupon' ); ?>">StumbleUpon</label>
		</p>
		
		<p>
		<input class="checkbox" type="checkbox" <?php checked( $friendfeed, 'true' ); ?> value="true" id="<?php echo $this->get_field_id( 'friendfeed' ); ?>" name="<?php echo $this->get_field_name( 'friendfeed' ); ?>" /> 
		<label for="<?php echo $this->get_field_id( 'friendfeed' ); ?>">FriendFeed</label>
		</p>
		
		<p>
		<input class="checkbox" type="checkbox" <?php checked( $google_bookmarks, 'true' ); ?> value="true" id="<?php echo $this->get_field_id( 'google_bookmarks' ); ?>" name="<?php echo $this->get_field_name( 'google_bookmarks' ); ?>" /> 
		<label for="<?php echo $this->get_field_id( 'google_bookmarks' ); ?>">Google Bookmarks</label>
		</p>
		
		<p>
		<input class="checkbox" type="checkbox" <?php checked( $pinterest, 'true' ); ?> value="true" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" /> 
		<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>">Pinterest</label>
		</p>
		
		<p>
		<input class="checkbox" type="checkbox" <?php checked( $google_plus, 'true' ); ?> value="true" id="<?php echo $this->get_field_id( 'google_plus' ); ?>" name="<?php echo $this->get_field_name( 'google_plus' ); ?>" /> 
		<label for="<?php echo $this->get_field_id( 'google_plus' ); ?>">Google +</label>
		</p>
		
		<p>
		<input class="checkbox" type="checkbox" <?php checked( $tumbler, 'true' ); ?> value="true" id="<?php echo $this->get_field_id( 'tumbler' ); ?>" name="<?php echo $this->get_field_name( 'tumbler' ); ?>" /> 
		<label for="<?php echo $this->get_field_id( 'tumbler' ); ?>">Tumbler</label>
		</p>
		
		<p style="font-size: 11px;"><i>Icon Credits: <a href="http://umar123.deviantart.com/" target="_blank">Umar123</a>, <a href="http://paulrobertlloyd.com/" target="_blank">P Lloyd</a>, <a href="http://designsidea.com/" target="_blank">DesignsIdea</a></i></p>
		
		<?php
	}
}	

add_action( 'widgets_init', create_function( '', 'register_widget("social_site_sharer_links_widget");' ) );

?>