<?php get_header(); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="color-b">
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <article>
                <header>
                    <h2><?php the_title(); ?></h2>
                    <small><?php the_time( get_option('date_format')); ?><a href="#"> <?php the_category(' , '); ?></a></small>
                </header>
                <div>
                    <?php the_content(); ?>
                </div>
                <a><?php the_tags(); ?></a>
            </article>
            <hr>
            <?php comments_template(); ?>
        </div>
        
        <?php endwhile; endif; ?>
        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
</div>

<?php get_footer(); ?>