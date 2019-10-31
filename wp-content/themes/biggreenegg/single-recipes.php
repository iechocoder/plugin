<?php
/**
 * The template for displaying all recipes posts
 *
 */

get_header(); ?>

<?php $author_id=$post->post_author; ?>

<div class="b-promo b-promo_offset-photo b-promo_dark b-promo_texture b-promo_recipes">
    <div class="b-promo__content">
        <div class="b-promo__item">
            <div class="container">
                <div class="row-flex row-flex_start row-flex_vertical-center">
                    <div class="col col_img col-md-7 col-sm-6 col-xs-6">
                    	<?php if (get_field('recipe_detail_page_image')) { ?>
                        <div class="b-promo__item-img">
                            <img src="<?php the_field('recipe_detail_page_image');?>" alt="">
                        </div>
                    	<?php } ?>
                    </div>
                    <div class="col col-md-4 col-sm-6 col-xs-6">
                        <div class="b-promo__item-info">
                            <div class="b-promo__item-wrapper read-more-container">
                                <div class="subtitle animation" data-animation="slideInUp animated">
                                    POSTED BY: <?php the_author_meta( 'user_nicename' , $author_id ); ?> 
                                </div>
                                <div class="section__header animation" data-animation="slideInUp animated">
                                	<?php  if (get_field('one_line_heading') == 'yes') { ?>
	                                    <h1 class="text-white title-border">
	                                        <?php the_field('heading');?>
	                                         <span class="b-note"> 
	                                         	<?php the_field('styled_text');?>
	                                        </span>
	                                    </h1>
	                                <?php } ?>  
	                                <?php if (get_field('one_line_heading') == 'no') { ?>
	                                	<h1 class="text-white title-border">
	                                        <?php echo get_field('heading_line_1');?>
	                                        <span class="xss-inline">
	                                        	<?php the_field('heading_line_2');?> 
	                                        		<span class="b-note"> 
	                                        			<?php the_field('styled_text');?>		
	                                        		</span>
	                                        	</span>
	                                    </h1>
	                                    
	                                <?php } ?>    
                                </div>
                                <?php  if (get_field('excerpt')) { ?>
	                                <div class="b-promo__item-wrapper-up animation" data-animation="slideInUp animated">
	                                    <?php the_field('excerpt');?>
	                                </div>
	                            <?php } ?>    
                                <div class="b-promo__item-wrapper-down animation" data-animation="slideInUp animated">
                                    <!-- <p class="read-more-wrapper">
                                        <a href="#" class="read-more read-more-clicker">
                                            <i class="icon icon-plus"></i>
                                            Read more
                                        </a>
                                    </p> -->
                                    <?php if ( get_field( 'button_text' ) != '') {  ?>
                                        <div class="b-btn-action">
                                            <a class="b-btn" <?php if ( get_field( 'button_link' ) != '') {  ?> href="<?php the_field('button_link');?> " <?php } else { ?> href="#section-1" <?php } ?>>
                                                <?php the_field('button_text');?>
                                            </a>
                                        </div>
                                    <?php } ?>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="b-about b-about_light b-about_recipe b-about_only-header animation" data-animation="slideInUp animated" id="section-1">
    <div class="container">
        <div class="b-about__content">
            <div class="b-decor">
                <img class="b-decor__item" src="<?php bloginfo('template_url')?>/images/feather.svg" alt="">
            </div>
            <div class="row-flex row-flex_vertical-center ">
                <div class="col col-md-6 col-sm-6 col-xs-12">
                    <div class="b-about__content-info" ">
                        <div class="b-numerator b-numerator_light b-numerator_border-light">
                            01
                        </div>
                        <?php if (get_field('heading_step1')) { ?>
	                        <div class="b-about__content-info-wrapper">
	                            <h2 class="title-border">
	                                <?php the_field('heading_step1');?>
	                            </h2>
	                        </div>
	                    <?php } ?>    
                    </div>
                </div>
                <div class="col col-xs-12">
                    <div class="b-ingredients">
                        <div class="b-ingredients__list">
                            <div class="row-flex row-flex_start row-flex_stretch">
                            	<?php if( have_rows('boxes') ): 
                            			while ( have_rows('boxes') ) : the_row();
                            	?>
                                <div class="col col-md-6 col-sm-6 col-xs-12">
                                    <div class="b-ingredients__item">
                                        <div class="row-flex row-flex_start">
                                        	<?php if(get_sub_field('box_heading')) { ?>
	                                            <div class="col col-lg-3 col-md-4 col-sm-12 col-xs-12">
	                                                <div class="b-ingredients__item-img">
	                                                    <img src="<?php the_sub_field('box_image'); ?>" alt="">
	                                                </div>
	                                            </div>
	                                        <?php } ?>      
                                            <?php if(get_sub_field('box_heading')) { ?>
	                                            <div class=" col col-md-1 col sm-12 col-xs-12">
	                                                <h3>
	                                                    <?php the_sub_field('box_heading'); ?>
	                                                </h3>
	                                            </div>
	                                        <?php } ?>    
                                            <div class="col col-lg-9 col-md-7 col-sm-12 col-xs-12">
                                                <div class="b-ingredients__item-info">
                                                    <ul>
                                                    	<?php if( have_rows('box_items') ): 
                            								 while ( have_rows('box_items') ) : the_row();
                            							?>
                                                        <li><?php the_sub_field('item'); ?></li>
                                                        <?php 
						                                endwhile;
														endif;
						                                ?>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                endwhile;
								endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="b-video b-video_pict animation" data-animation="slideInUp animated">
	<?php if (get_field('big_image')) { ?>
	    <div class="container">
	        <div class="b-video__content">
	            <img src="<?php the_field('big_image');?>" alt="">
	        </div>
	    </div>
	<?php } ?>    
</div>

<?php $enable = get_field('enable_section'); if( $enable && in_array('yes', $enable) ): ?>

	<!-- Step 2 if Imag is on right -->
	<?php if (get_field('image_position') == 'right') { ?>
		<div class="b-about b-about_light b-about_gray animation" data-animation="slideInUp animated">
		    <div class="container">
		        <div class="b-about__content">
		            <div class="row-flex row-flex_vertical-center">
		                <div class="col col-md-6 col-sm-6 col-xs-6">
		                    <div class="b-about__content-info">
		                        <div class="b-numerator b-numerator_light b-numerator_border-light">
		                            02
		                        </div>
		                        <div class="b-about__content-info-wrapper">
		                        	<?php if(get_field('content_heading')) { ?>
			                            <h2 class="title-border">
			                                <?php the_field('content_heading');?>
			                            </h2>
			                        <?php } ?>    
		                            <ul>
		                            	<?php if( have_rows('content_items') ): 
		                            			while ( have_rows('content_items') ) : the_row();
		                            	?>
			                                <li>
			                                    <?php the_sub_field('content_item');?>
			                                </li>
		                                <?php 
		                                endwhile;
										endif;
		                                ?>
		                                
		                            </ul>
		                        </div>
		                    </div>
		                </div>
		                <div class="col col-md-6 col-sm-6 col-xs-6  col_img">
		                	<?php if(get_field('image_2')) { ?>
			                    <div class="b-about__content-img">
			                        <img src="<?php the_field('image_2');?>" alt="">
			                    </div>
		                	<?php }?>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	<?php } ?>
	<!-- Step 2 if Imag is on left -->
	<?php if (get_field('image_position') == 'left') { ?>
		<div class="b-about b-about_light b-about_gray animation" data-animation="slideInUp animated">
		    <div class="container">
		        <div class="b-about__content">
		            <div class="row-flex row-flex_vertical-center">
		            	<div class="col col-md-6 col-sm-6 col-xs-6  col_img">
		                	<?php if(get_field('image_2')) { ?>
			                    <div class="b-about__content-img">
			                        <img src="<?php the_field('image_2');?>" alt="">
			                    </div>
		                	<?php }?>
		                </div>
		                <div class="col col-md-6 col-sm-6 col-xs-6">
		                    <div class="b-about__content-info">
		                        <div class="b-numerator b-numerator_light b-numerator_border-light">
		                            02
		                        </div>
		                        <div class="b-about__content-info-wrapper">
		                        	<?php if(get_field('content_heading')) { ?>
			                            <h2 class="title-border">
			                                <?php the_field('content_heading');?>
			                            </h2>
			                        <?php } ?>    
		                            <ul>
		                            	<?php if( have_rows('content_items') ): 
		                            			while ( have_rows('content_items') ) : the_row();
		                            	?>
			                                <li>
			                                    <?php the_sub_field('content_item');?>
			                                </li>
		                                <?php 
		                                endwhile;
										endif;
		                                ?>
		                                
		                            </ul>
		                        </div>
		                    </div>
		                </div>
		                
		            </div>
		        </div>
		    </div>
		</div>
	<?php } ?>

<?php endif; ?>

<?php $enable1 = get_field('enable_section_3'); if( $enable1 && in_array('yes', $enable1) ): ?>
<!-- Step 2 if Imag is on right -->
<?php if (get_field('image_position_3') == 'right') { ?>
	<div class="b-about b-about_light b-about_background b-about_recipe">
	    <div class="container">
	        <div class="b-about__content">
	            <div class="b-numerator-wrapper">
	                <div class="b-numerator b-numerator_light">
	                    03
	                </div>
	            </div>
	            <div class="row-flex row-flex_vertical-center">
	                
	                <div class="col col-md-6 col-sm-6 col-xs-6">
	                    <div class="b-about__content-info animation" data-animation="slideInUp animated">
	                        <div class="b-about__content-info-wrapper">
	                            <?php if(get_field('content_heading_3')) { ?>
		                            <h2 class="title-border">
		                                <?php the_field('content_heading_3');?>
		                            </h2>
		                        <?php } ?>
	                            <ul>
	                            	<?php if( have_rows('content_items_3') ): 
	                            			while ( have_rows('content_items_3') ) : the_row();
	                            	?>
	                                <li>
	                                    <?php the_sub_field('content_item_3');?>
	                                </li>
	                                <?php 
	                                endwhile;
									endif;
	                                ?>
	                                
	                            </ul>
	                        </div>
	                    </div>
	                </div>
	                <div class="col col-md-6 col-sm-6 col-xs-6 col_img">
	                	<?php if(get_field('image_3')) { ?>
		                    <div class="b-about__content-img animation" data-animation="slideInUp animated">
		                        <img src="<?php the_field('image_3');?>" alt="">
		                    </div>
		                <?php } ?>    
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
<?php } ?>

<!-- Step 2 if Imag is on left -->
<?php if (get_field('image_position_3') == 'left') { ?>
	<div class="b-about b-about_light b-about_background b-about_recipe">
	    <div class="container">
	        <div class="b-about__content">
	            <div class="b-numerator-wrapper">
	                <div class="b-numerator b-numerator_light">
	                    03
	                </div>
	            </div>
	            <div class="row-flex row-flex_vertical-center">
	                <div class="col col-md-6 col-sm-6 col-xs-6 col_img">
	                	<?php if(get_field('image_3')) { ?>
		                    <div class="b-about__content-img animation" data-animation="slideInUp animated">
		                        <img src="<?php the_field('image_3');?>" alt="">
		                    </div>
		                <?php } ?>    
	                </div>
	                <div class="col col-md-6 col-sm-6 col-xs-6">
	                    <div class="b-about__content-info animation" data-animation="slideInUp animated">
	                        <div class="b-about__content-info-wrapper">
	                            <?php if(get_field('content_heading_3')) { ?>
		                            <h2 class="title-border">
		                                <?php the_field('content_heading_3');?>
		                            </h2>
		                        <?php } ?>
	                            <ul>
	                            	<?php if( have_rows('content_items_3') ): 
	                            			while ( have_rows('content_items_3') ) : the_row();
	                            	?>
	                                <li>
	                                    <?php the_sub_field('content_item_3');?>
	                                </li>
	                                <?php 
	                                endwhile;
									endif;
	                                ?>
	                                
	                            </ul>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
<?php } ?>	

<?php endif; ?>

<div class="b-social b-social_line animation" data-animation="slideInUp animated">
    <div class="container">
        <div class="b-social__content">
            <?php $siteUrl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
            <ul>
                <li>
                    <a class="share" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $siteUrl; ?>">
                        <i class="icon icon-fb"></i>
                    </a>
                </li>
                <li>
                    <a class="share" href="https://twitter.com/intent/tweet?url=<?php echo $siteUrl; ?>&via=getboldify&text=yourtext">
                        <i class="icon icon-twitter icon_small"></i>
                    </a>
                </li>
                <li>
                    <a class="share" href="http://pinterest.com/pin/create/link/?url=<?php echo $siteUrl; ?>">
                        <i class="icon icon-pinterest"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="b-recipes section b-recipes_internal">
    <div class="container">
        <div class="row-flex row-flex_center">
            <div class="col col-lg-11 col-md-11 col-xs-12">
                <div class="b-recipes__header">
                    <h2 class="title-border">
                        More Egg-ready recipes
                    </h2>
                </div>
                <div class="b-recipes__content">
                    <div class="b-recipes__list">
                        <div class="b-recipes__item-wrapper">
                            <div class="row-flex row-flex_start row-flex_stretch">
                            	<?php 
                            	$args = array( 
								  'post_type' => 'custom_advert', 
								  'posts_per_page' => 2,
								  'orderby' => 'rand'
								);
                            	?>
                            	<?php 
                                    $loop = new WP_Query( array( 'post_type' => 'recipes','orderby' => 'rand', 'paged' => $paged ) );
                                    if ( $loop->have_posts() ) :
                                        while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                <div class="col col-md-4 col-sm-4 col-xs-6">
                                    <a class="b-single-culinary b-single-culinary_only-title animation" href="<?php the_permalink(); ?>" data-animation="slideInUp animated">
                                    	<?php if ( has_post_thumbnail() ) { ?>
                                            <div class="b-single-culinary__img">
                                                <?php the_post_thumbnail(); ?>
                                            </div>
                                        <?php } ?>
                                        <div class="b-single-culinary__info">
                                            <div class="b-single-culinary__info-title-wrapper">
                                                <div class="b-single-culinary__info-title">
                                                    <?php echo get_the_title(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php 
                                    endwhile;
                                endif;
                                    wp_reset_postdata();
                                ?>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
