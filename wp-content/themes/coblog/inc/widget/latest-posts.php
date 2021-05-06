<?php

add_action('widgets_init','coblog_blog_posts_widget');

function coblog_blog_posts_widget() {
	register_widget('coblog_blog_posts_widget');
}

class coblog_blog_posts_widget extends WP_Widget{

	function __construct(){
		parent::__construct( 'coblog_blog_posts_widget',__('Coblog blog Posts','coblog'),array('description' => __('Coblog post widget to display blog posts','coblog')));
	}

	function widget($args, $instance) {
		extract($args);
		$title 			= apply_filters('widget_title', isset($instance['title']) ? $instance['title'] : '', $args['widget_id']);
		$count 			= isset($instance['count']) ? $instance['count'] : 5;
		$order_by 		= isset($instance['order_by']) ? $instance['order_by'] : 'DESC';
		echo wp_kses_post($before_widget);
		$output = '';
		if ( $title ){
			echo wp_kses_post($before_title) . esc_html($title) . wp_kses_post($after_title);
		}
		global $post;
		if ( $order_by == 'latest' ) {
			$args = array( 
						'posts_per_page' 	=> $count,
						'order' 			=> 'DESC'
					);
		} else if ( $order_by == 'popular' ) {
			$args = array( 
						'orderby' 			=> 'comment_count',
						'posts_per_page' 	=> $count,
						'order' 			=> 'DESC'
					);
		} else {
			$args = array( 
                'orderby' 			=> 'comment_count',
                'order' 			=> 'DESC',
                'posts_per_page' 	=> $count
            );
		}
		$postQuery = get_posts( $args );
		if(count($postQuery)>0){
			$output .='<div class="coblog-blog-widget-wrap ' . esc_attr($order_by) . '">';
            foreach ($postQuery as $item): setup_postdata($item);
                $coblog_date_format = get_option( 'date_format' );
				$output .='<div class="coblog-blog-media media">';
					if(has_post_thumbnail()):	
						$output .='<a href="'.esc_url(get_permalink($item->ID)).'">'.get_the_post_thumbnail( $item->ID, 'thumbnail', array('class' => 'd-flex mr-3')).'</a>';	
					endif;
					$output .='<div class="media-body">';
					$output .= '<h4 class="coblog-blog-widget-title mt-0"><a href="'.esc_url(get_permalink($item->ID)).'">'. get_the_title($item->ID) .'</a></h4>';
					$output .= '<span class="coblog-blog-widget-date">'. get_the_date($coblog_date_format, $item->ID) .'</span>';
					$output .='</div>';
				$output .='</div>';
			endforeach;
			wp_reset_postdata();
			$output .='</div>';
		}
		echo wp_kses_post($output);
		echo wp_kses_post($after_widget);
	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 			= strip_tags( $new_instance['title'] );
		$instance['order_by'] 		= strip_tags( $new_instance['order_by'] );
		$instance['count'] 			= strip_tags( $new_instance['count'] );
		return $instance;
	}


	function form($instance) {
		$defaults = array( 
			'title' 	=> __('Popular Posts', 'coblog'),
			'order_by' 	=> 'latest',
			'count' 	=> 2
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Widget Title', 'coblog'); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'order_by' )); ?>"><?php esc_html_e('Ordered By', 'coblog'); ?></label>
			<?php 
				$options = array(
					'popular' 	=> __('Popular', 'coblog'),
					'latest' 	=> __('Latest', 'coblog'),
					'comments'	=> __('Most Commented', 'coblog'),
				);
				if(isset($instance['order_by'])) $order_by = $instance['order_by'];
			?>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'order_by' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'order_by' )); ?>">
				<?php
				$op = '<option value="%s"%s>%s</option>';
				foreach ($options as $key=>$value ) {
					if ($order_by === $key) {
			            printf($op, $key, ' selected="selected"', $value);
			        } else {
			            printf($op, $key, '', $value);
			        }
			    }
				?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'count' )); ?>"><?php esc_html_e('Count', 'coblog'); ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'count' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'count' )); ?>" value="<?php echo esc_attr($instance['count']); ?>" style="width:100%;" />
		</p>
	<?php
	}
}