<?php get_header() ?>
    <div class="main">
    <header class="bg-img header">
        <nav class="navbar navbar-default navbar-vira">
            <div class="container">
                <div class="navigation-bar">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="logo">
                                <a href="index.php"><span class="fa fa-viacoin"></span></a>
                                <div class = "menu-top">
                                    <?php wp_nav_menu([
                                        'theme_location'  => 'top',
                                        'container' => false,
                                        'items_wrap'=> '%3$s',
                                    ]);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="intro-box">
                    <div class="intro">
                        <a href="<?php echo home_url() ?>" class="logo"><?php bloginfo('name') ?></a>
                        <p><?php bloginfo('description') ?></p>


                        <p></p>
                        <a class="btn vira-btn" href="#">Explore us</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
			<section class="single-template">
			<?php the_post();?>
            <article class="content-full">
				<a><?php the_post_thumbnail('large');?></a>
				<h2 class="single-title"><?php the_title(); ?></h2>
				<div class="single-text"><?php the_content(); ?></div>
			</article>
			</section>
            <section class="subscribe section bg-img">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <p>Subscribe to our newsletter to get update</p>
                            <form class="form-inline">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="user-email" placeholder="Write your email here....">
                                </div>
                                <button type="submit" class="btn vira-btn">Send me</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
			<?php get_footer(); ?>