<?php 
/**
*	@package Portfolio
*   ////////////////////
*   // Widgets
*   ////////////////////
* 
*/


class Chomikoo_Profile_Widget extends WP_Widget {
	
	public function __construct() {

		$widget_ops = array(
			'classname' => 'chomikoo-profile',
			'description' => 'Custom Chomikoo Widget',
		);

		parent::__construct( 'chomikoo_profile', 'Chomikoo Profile', $widget_ops );


	}
	// backend display forms
	public function form( $instance ) {
		echo '<p><stron>Brak opcji dla tego widgetu!</strong><br>Możesz zminic zawartość edytująć tę<a href="admin.php?page=chomikoo_theme"> stronę</a> </p>';
	}
		// frontend display widgets 
	public function widget( $args, $instance ) {

			$picture = esc_attr( get_option( 'profile_picture' ) );
			// echo $picture;
			$firstName = esc_attr( get_option( 'first_name' ) );
			$lastName = esc_attr( get_option( 'last_name' ) );
			$fullName = $firstName . ' ' . $lastName;
			$description = esc_attr( get_option( 'user_description' ) );

			$twitter_icon = esc_attr( get_option( 'twitter_handler' ) );
			$facebook_icon = esc_attr( get_option( 'facebook_handler' ) );
			$gplus_icon = esc_attr( get_option( 'gplus_handler' ) );
			
			echo $args['before_widget'];
			?>
			<div class="text-center">
				<div class="image-container">
					<div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>);"></div>
				</div>
				<h1 class="sunset-username"><?php print $fullName; ?></h1>
				<h2 class="sunset-description"><?php print $description; ?></h2>
				<div class="icons-wrapper">
					<?php if( !empty( $twitter_icon ) ): ?>
						<a href="https://twitter.com/<?php echo $twitter_icon; ?>" target="_blank"><span class="sunset-icon-sidebar sunset-icon sunset-twitter"></span></a>
					<?php endif; 
					if( !empty( $gplus_icon ) ): ?>
						<a href="https://plus.google.com/u/0/+<?php echo $gplus_icon; ?>" target="_blank"><span class="sunset-icon-sidebar sunset-icon sunset-googleplus"></span></a>
					<?php endif; 
					if( !empty( $facebook_icon ) ): ?>
						<a href="https://facebook.com/<?php echo $facebook_icon; ?>" target="_blank"><span class="sunset-icon-sidebar sunset-icon sunset-facebook"></span></a>
					<?php endif; ?>
				</div>
			</div>
			<?php
			echo $args['after_widget'];

	}
}

add_action( 'widgets_init', function(){

	register_widget( 'Chomikoo_Profile_Widget' );

} );

/* 
	Custom Tag cloud widget 
*/

function chomikoo_tag_cloud_font_change( $args ){

	$args['smallest'] = 8;
	$args['largest'] = 8;

	return $args;

}

add_filter( 'widget_tag_cloud_args', 'chomikoo_tag_cloud_font_change' );

/* 
	Categories List  
*/


function chomikoo_list_categories_output_change( $links ){

	$links = str_replace( '</a> (', '</a><span>', $links );
	$links = str_replace( ')', '</span>', $links );

	return $links;


}

add_filter( 'wp_list_categories', 'chomikoo_list_categories_output_change' );

/*
	Save Post Views
*/

function chomikoo_save_post_views( $postID ){

	$metaKey = 'chomikoo_post_views';
	$views = get_post_meta( $postID, $metaKey, true );

	$count = ( empty( $views ) ? 0 : $views );
	$count++;
	update_post_meta( $postID, $metaKey, $count );
	// echo $count;
}

// remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

/*
	Popular posts widget
*/

class Chomikoo_Popular_Posts_Widget extends WP_Widget {
	
	public function __construct() {
		
		$widget_ops = array(
			'classname' 	=> 'chomikoo-popular-posts-widget',
			'description' 	=> 'Popularne Posty',
		);

		parent::__construct( 'chomikoo_popular_post', 'Chomikoo Popularne Posty', $widget_ops );

	}

	public function form( $instance ){

		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Popularne Posty' );
		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );

		$output = '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id('title') ) . '" >Tytuł: </label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id('title') ) .  '" name="' . esc_attr( $this->get_field_name('title') )  . '" value="' . esc_attr( $title ) . '" ';
		$output .= '</p>';

		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id('tot') ) . '" >Liczba postów: </label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id('tot') ) .  '" name="' . esc_attr( $this->get_field_name('tot') )  . '" value="' . esc_attr( $tot ) . '" ';
		$output .= '</p>';

		echo $output;

	}

	public function update( $new_instance, $old_instance ){

		$instance = array();
		$instance[ 'title' ] = ( !empty($new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'tot' ] = ( !empty($new_instance[ 'tot' ] ) ? absint( $new_instance[ 'tot' ] ) : '0' );

		return $instance;

	}

	// FrontEnd
	public function widget( $args, $instance ){

		$tot = absint( $instance[ 'tot' ] );

		$posts_args = array(
			'post_type' 	=> 'post',
			'posts_per_page' => $tot,
			'meta_key' 		=> 'chomikoo_post_views',
			'orderby'		=> 'meta_value_num',
			'order'			=> 'DESC',
		);

		$posts_query = new WP_Query( $posts_args );

		echo $args[ 'before_widget' ];
		// echo "string " . esc_html($args[ 'before_widget' ]);
		echo "tot " . $tot ;


		if( !empty( $insance[ 'title' ] ) ){
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
		} 

		if( $posts_query->have_posts() ){

			while( $posts_query->have_posts() ): $posts_query->the_post();

				echo '<div class="media">';
				echo '<div class="media-left"><img class="media-left" src="' . get_template_directory_uri() . '/img/post-' . ( get_post_format() ? get_post_format() : 'standard') . '.png" alt="' . get_the_title() . '"/></div>';
				echo '<div class="media-body">' . get_the_title() . '</div>';
				echo '</div>';

			endwhile;

		}

		echo $args[ 'after_widget' ];

	}
}

add_action( 'widgets_init', function() {
	register_widget(  'Chomikoo_Popular_Posts_Widget' );
});