<?php get_header(); ?>


    <div class="kapo">
        <h1><?php bloginfo('name'); ?></h1>
        <h2><?php bloginfo('description'); ?></h2>
    </div>
    <div class="color-b">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <center><img class="ico" src="<?php echo get_theme_mod('image-a', get_template_directory_uri('template_directory').'/img/01.jpg'); ?>"/>
                    <p><?php echo get_theme_mod('text-a', 'Lorem ipsum'); ?></p></center>
                </div>
                <div class="col-md-4">
                    <center><img class="ico" src="<?php echo get_theme_mod('image-b', get_template_directory_uri('template_directory').'/img/02.jpg'); ?>"/>
                        <p><?php echo get_theme_mod('text-b', 'Lorem ipsum'); ?></p></center>
                </div>
                <div class="col-md-4">
                    <center><img class="ico" src="<?php echo get_theme_mod('image-c', get_template_directory_uri('template_directory').'/img/03.jpg'); ?>"/>
                        <p><?php echo get_theme_mod('text-c', 'Lorem ipsum'); ?></p></center>
                </div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-6">
                    <h2><?php echo get_theme_mod('image-title', 'Lorem ipsum'); ?></h2>
                    <p><?php echo get_theme_mod('image-text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'); ?></p>
                </div>
                <div class="col-md-6 unua wow slideInRight">
                    <img src="<?php echo get_theme_mod('image-unu', get_template_directory_uri('template_directory').'/img/popu.jpg'); ?>">
                </div>
                <div class="col-md-12"><br/></div>
                <div class="col-md-6 unua wow slideInLeft">
                    <img src="<?php echo get_theme_mod('image-du', get_template_directory_uri('template_directory').'/img/rec.jpg'); ?>">
                </div>
                <div class="col-md-6">
                <h2><?php echo get_theme_mod('image-title-du', 'Lorem ipsum'); ?></h2>
                    <p><?php echo get_theme_mod('image-text-du', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'); ?></p>
                </div>
                <div class="col-md-12">
                    <br/><hr><br/>
                </div>
                <div class="col-md-12">
                    <h2><?php echo get_theme_mod('blog-name', 'Noticias'); ?></h2>
                </div>
                <?php if (have_posts() ) : while(have_posts() ) : the_post(); ?>

                <div class="col-md-8 wow fadeInLeft">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <small><?php the_time( get_option('date_format')); ?><a href="#"> <?php the_category(' , '); ?></a></small>

                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>"> <?php _e('Leer más...', 'imperium'); ?></a>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInRight">
                    <center>
                    <?php if (has_post_thumbnail() ) { the_post_thumbnail('img-post'); } ?>
                    </center>
                </div>
                <div class="col-md-12">
                    <br/><hr><br/>
                </div>

                <?php endwhile; else: ?>
                <div class="col-md-8 wow fadeInLeft">
                <h3><?php _e('No hay contenido disponible', 'imperium'); ?></h3>
                    <div>
                        <p><?php _e('No hay contenido disponible, por favor realiza una búsqueda.', 'imperium'); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                </div>
                <?php endif; ?>
                    
                <?php if ( get_next_posts_link() || get_previous_posts_link() ) { ?>

                <div class="col-md-12 as">
                    <center>
                    <?php next_posts_link(__('&larr; Anteriones', 'imperium')); ?>
                    <?php previous_posts_link(__('Siguientes &rarr;', 'imperium')); ?>
                    </center>
                </div>

                <?php } ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>