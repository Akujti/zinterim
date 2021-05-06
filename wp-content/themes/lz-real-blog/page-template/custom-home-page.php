<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<?php do_action( 'lz_real_blog_above_slider' ); ?>

<section id="slider">
  	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
	    <?php $slider_pages = array();
	      	for ( $count = 1; $count <= 4; $count++ ) {
		        $mod = intval( get_theme_mod( 'lz_real_blog_slider' . $count ));
		        if ( 'page-none-selected' != $mod ) {
		          $slider_pages[] = $mod;
		        }
	      	}
	      	if( !empty($slider_pages) ) :
	        $args = array(
	          	'post_type' => 'page',
	          	'post__in' => $slider_pages,
	          	'orderby' => 'post__in'
	        );
	        $query = new WP_Query( $args );
	        if ( $query->have_posts() ) :
	          $i = 1;
	    ?>     
	    <div class="carousel-inner" role="listbox">
	      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
	        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
	          	<a href="<?php echo esc_url( get_permalink() );?>"><img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title();?> post thumbnail image"/></a>
	          	<div class="carousel-caption">
		            <div class="inner_carousel">
		            	<hr class="hori-slider">
		              	<h1><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title();?></a><span class="screen-reader-text"><?php the_title();?></span></h1>		              	
		              	<div class="metabox">
			              <i class="far fa-calendar-alt"></i><span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
			              <i class="fas fa-user"></i><span class="entry-author"><?php the_author(); ?></span>
			              <i class="fas fa-comments"></i><span class="entry-comments"><?php comments_number( __('0 Comments','lz-real-blog'), __('0 Comments','lz-real-blog'), __('% Comments','lz-real-blog') ); ?></span>
			        	</div>
		            </div>
	          	</div>
	        </div>
	      	<?php $i++; endwhile; 
	      	wp_reset_postdata();?>
	    </div>
	    <?php else : ?>
	    <div class="no-postfound"></div>
	      <?php endif;
	    endif;?>
	    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
	      <span class="screen-reader-text"><?php esc_html_e( 'Prev','lz-real-blog' );?></span>
	    </a>
	    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
	      <span class="screen-reader-text"><?php esc_html_e( 'Next','lz-real-blog' );?></span>
	    </a>
  	</div>  
  	<div class="clearfix"></div>
</section> 

<?php do_action('lz_real_blog_below_slider'); ?>

<?php /*--trending post--*/?>
<section id="our-services">
	<div class="container">
		<div class="trending-items">
			<div class="treding-title">
	    		<?php if( get_theme_mod('lz_real_blog_trending_title') != ''){ ?>     
            		<h2><?php echo esc_html(get_theme_mod('lz_real_blog_trending_title','')); ?></h2>
            	<?php }?>
            </div>
	    	<div class="row">
	      		<?php 
	      		$catData=  get_theme_mod('lz_real_blog_trendingcategory_setting');
	            if($catData){
	            $page_query = new WP_Query(array( 'category_name' => esc_html( $catData ,'lz-real-blog')));?>
	        	<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>     	
		          	<div class="col-lg-4 col-md-6">
		          		<div class="postbox smallpostimage">
					      	<?php 
					          if(has_post_thumbnail()) { ?>
						        <div class="padd-box">
						          	<div class="box-image">
						            	<?php the_post_thumbnail();  ?>
						            	<div class="overlay">
						            		<h3><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title();?></a></h3>
						            		<p><?php $excerpt = get_the_excerpt(); echo esc_html( lz_real_blog_string_limit_words( $excerpt,10 ) ); ?></p>
						            		<div class="date-box">
						            			<span><i class="far fa-calendar-alt"></i></span>
						            			<span class=""><?php the_time( get_option( 'date_format' ) ); ?></span>
						            		</div>
						            	</div>
						          	</div>
						        </div>
					      	<?php } ?>
					      	<div class="clearfix"></div> 
					  	</div>
		          	</div>	          	
	          		<?php endwhile; 
	          	wp_reset_postdata();
	      		} ?>
	      	</div>
		</div>
	</div>
</section>

<?php do_action('lz_real_blog_after_trending_items'); ?>

<div class="container">
  	<?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>