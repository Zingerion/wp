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


                                <a class="btn vira-btn" href="#">Explore us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

    <div class="slider">
        <div class="item">
            <a href="<?php echo home_url() ?>/hall-1"><img src="http://dummyimage.com/150x60/99cccc/ffffff.gif&text=The+Slide+1" alt="Первый зал"></a>
            <a href="<?php echo home_url() ?>/hall-3"><div class="slideText">Заголовок слайда 1</div></a>
        </div>

        <div class="item">
           <a href="<?php echo home_url() ?>/hall-2"><img src="http://dummyimage.com/150x60/99cccc/ffffff.gif&text=The+Slide+2" alt="Второй зал"></a>
            <a href="<?php echo home_url() ?>/hall-3"><div class="slideText">Заголовок слайда 2</div></a>
        </div>

        <div class="item">
            <a href="<?php echo home_url() ?>/hall-3"><img src="http://dummyimage.com/150x60/99cccc/ffffff.gif&text=The+Slide+3" alt="Третий зал"></a>
            <a href="<?php echo home_url() ?>/hall-3"><div class="slideText">Заголовок слайда 3</div></a>
        </div>

        <a class="prev" onclick="minusSlide()">&#10094;</a>
        <a class="next" onclick="plusSlide()">&#10095;</a>
    </div>

    <div class="slider-dots">
        <span class="slider-dots_item" onclick="currentSlide(1)"></span>
        <span class="slider-dots_item" onclick="currentSlide(2)"></span>
        <span class="slider-dots_item" onclick="currentSlide(3)"></span>
    </div>


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