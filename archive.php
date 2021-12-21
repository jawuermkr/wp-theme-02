<?php get_header(); ?>
<div class="color-b">
<div class="container">
<div class="row">
<?php if (have_posts() ) : while(have_posts() ) : the_post(); ?>
    <div class="col-md-12 blog">
        <article>
            <header>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <small><?php the_time( get_option('date_format')); ?><a href="#"> <?php the_category(' , '); ?></a></small>
            </header>
            <div>
                <?php if (has_post_thumbnail() ) { the_post_thumbnail('img-post'); } ?>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>"> <?php _e('Leer más...', 'imperium'); ?></a>
            </div>
        </article>
    </div>
    <?php endwhile; endif; ?>
</div>
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
<?php get_footer(); ?>