<?php /* Template Name: Recipe */ ?>
<?php get_header(); ?>

<div class="b-promo b-promo_with-scroll b-promo_pattern">
    <a class="b-scroll h3 anchor" href="#section-1">Scroll</a>
    <div class="b-promo__content">
        <div class="b-promo__item">
            <div class="container">
                <div class="row-flex row-flex_start row-flex_vertical-center">
                    <div class="col col-md-6 col-sm-6 col-xs-6">
                        <div class="b-promo__item-img b-promo__item-img_composite">
                            <img src="<?php bloginfo('template_url')?>/images/b-recipes/first-composite.png" alt="">
                        </div>
                    </div>
                    <div class="col col-md-5 col-sm-6 col-xs-6">
                        <div class="b-promo__item-info">
                            <div class="b-promo__item-wrapper read-more-container">
                                <?php if ( get_field( 'sub_text' ) != '') {  ?>
                                    <div class="subtitle animation" data-animation="slideInUp animated">
                                        <?php the_field('sub_text');?>
                                    </div>
                                <?php } ?>
                                <?php if ( get_field( 'heading' ) != '') {  ?>    
                                    <div class="section__header animation" data-animation="slideInUp animated">
                                        <h1 class="text-white title-border">
                                            <?php the_field('heading');?>
                                        </h1>
                                    </div>
                                <?php } ?>
                                <?php if ( get_field( 'excerpt' ) != '') {  ?>
                                    <div class="b-promo__item-wrapper-up animation" data-animation="slideInUp animated">
                                        <p>
                                            <?php the_field('excerpt');?>    
                                        </p>
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


<div class="b-recipes section" id="section-1">
    <div class="container">
        <div class="row-flex row-flex_center">
            <div class="col col-lg-11 col-md-11 col-xs-12">
                <?php if ( get_field( 'body_heading' ) != '') {  ?>
                    <div class="b-recipes__header">
                        <h2 class="title-border">
                            <?php the_field('body_heading');?>
                        </h2>
                    </div>
                <?php } ?>    
                <div class="b-recipes__content">
                    <div class="b-recipes__list tab-content">
                        <div class="b-recipes__item-wrapper tab-pane active" id="tab-1">
                            <div class="row-flex row-flex_start row-flex_stretch">
                                <?php 
                                    $loop = new WP_Query( array( 'post_type' => 'recipes', 'paged' => $paged ) );
                                    if ( $loop->have_posts() ) :
                                        while ( $loop->have_posts() ) : $loop->the_post(); ?>       
                                <div class="col col-md-4 col-sm-6 col-xs-6">
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
                    <div class="b-nav-mob-pages">
                        <ul>
                            <li><a class="rhombus" href="#/"><i class="icon icon-back"></i></a></li>
                            <li class="active"><a href="#/">1</a></li>
                            <li><a href="#/">2</a></li>
                            <li><a href="#/">3</a></li>
                            <li><a href="#/">...</a></li>
                            <li><a href="#/">10</a></li>
                            <li><a class="rhombus" href="#/"><i class="icon icon-next"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
