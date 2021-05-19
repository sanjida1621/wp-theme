<?php get_header(); ?>
<body <?php body_class();?>>
<?php get_template_part("/template-parts/hero"); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="posts">
                    <?php
                    while (have_posts()){
                        the_post();
                        ?>
                        <div class="post"<?php post_class();?>>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 offset-md-1 text-center">
                                        <h2 class="post-title">
                                            <?php the_title();?>
                                        </h2>
                                    </div>
                                    <div class="col-md-10 offset-md-1 text-center">
                                        <p>
                                            <strong><?php the_author();?></strong><br/>
                                            <?php echo get_the_date();?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 offset-md-1 text-center">
                                        <p>
                                            <?php
                                            if (has_post_thumbnail()){
                                                $post_thumbnail_url=get_the_post_thumbnail_url(null,"large");
                                                echo '<a href="'.$post_thumbnail_url.'" data-featherlight="image">';
                                                the_post_thumbnail("medium_large",array("class"=>'img-fluid'));
                                                echo '</a>';
                                            }
                                            ?>
                                        </p>
                                        <?php
                                        the_content();
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>