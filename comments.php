<?php if (have_comments() ) { ?>

    <h3><?php comments_number(
        __('No hay comentarios aún', 'imperium'),
        __('Hay un comentarios publicado', 'imperium'),
        __('Hay % comentarios', 'imperium')
    ); ?></h3>

    <ol class="comments"><?php wp_list_comments(); ?></ol>

    <?php paginate_comments_links(); ?>

<?php } ?>

<?php comment_form(); ?>