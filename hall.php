<?php
/*
 * Template Name: Общий зал
 * Template Post Type: page
 */
?>
<?php if(is_user_logged_in()): ?>
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
                    </br>
                        <p><?php the_post() ?></p>
                        <a class="btn vira-btn" href="#">Explore us</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section>
    <?php the_title(); ?>
      <div><img src="http://dummyimage.com/850x700/99cccc/ffffff.gif&text=The+Slide+1" alt="Первый зал"></div>
        <div class="FormBackCall">
            <h2>Онлайн заявка</h2>
            <form id="contact" action="#" method="post" name="contact">
                <input name="id_user" type="hidden" value="<?php echo $current_user->ID?>">
                <input name="id_hall" type="hidden" value="<?php echo get_queried_object_id()?>">
                <input name="CurrentTime" type="hidden" value="<?php echo current_time('mysql')?>" >
                <input type="date" name="calendar" placeholder="Выберите дату">
                C <input name="time" type="time" placeholder="На какой время забронировать?"> до
                <input name="time2" type="time" placeholder="До какого времени бронировать?">
                <input name="phone" type="phone" placeholder="Ваш телефон">
                <textarea name="msg" placeholder="Ваш комментарий:"></textarea>
                <button class="submit_button_hall">Отправить</button>
            </form>
        </div>
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
<?php else: ?>
   <?php wp_login_form(); ?>
<?php endif; ?>
