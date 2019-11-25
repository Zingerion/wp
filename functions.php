<?php

add_action('wp_enqueue_scripts','ProjectTheme_RegisterScripts');

add_action('after_setup_theme','ProjectTheme_after_setup');

add_action('widgets_init','ProjectTheme_widgets');

add_filter('the_content',function($content){
	return str_replace(' ','!!!',$content);	
});

add_filter('pre_get_document_title',function($t){
	if(is_single()){
		$t=get_field('short_dscr');
	}
	//var_dump($t);
	return $t;
});

add_filter('document_title_parts', function($parts){
	$parts['tagline'].= '!';
	//var_dump($parts);
	return $parts;
});

add_filter('document_title_separator',function($sep){
	return '|';
	
});

add_shortcode('ProjectTheme_DoNothing','DoNothing');

// хук для регистрации
add_action( 'init', 'register_Check_post_taxonomy' );

add_action('wp_head','Project_js_delivery_vars');

add_shortcode( 'members_only', 'members_only_shortcode' );

	function ProjectTheme_RegisterScripts(){
		
		wp_enqueue_style('RegStyles',get_stylesheet_uri());
		
		wp_enqueue_script('qtest-script-jquery',get_template_directory_uri().'/assets/js/jquery-3.1.1.js');
		wp_enqueue_script('qtest-script-bootstrap',get_template_directory_uri().'/assets/js/bootstrap.min.js');
		wp_enqueue_script('qtest-script-owl',get_template_directory_uri().'/assets/js/owl.carousel.min.js');
		wp_enqueue_script('qtest-script-fontawesome', 'https://use.fontawesome.com/55b73bf748.js');
		wp_enqueue_script('qtest-script-magnific-popup',get_template_directory_uri().'/assets/js/jquery.magnific-popup.js');
		wp_enqueue_script('qtest-script-main',get_template_directory_uri().'/assets/js/script.js');
        wp_enqueue_script('slider',get_template_directory_uri().'/assets/js/slider.js');
	}
	function ProjectTheme_after_setup(){
		register_nav_menu( 'top', 'Шапка сайта' );
		register_nav_menu( 'bottom', 'Подвал сайта' );
		add_theme_support('post-thumbnails');
		add_theme_support('title-tag');
	}	
	function ProjectTheme_widgets(){
		register_sidebar( [
		'name'          => 'SidebarBase',
		'id'            => 'sidebar_base',
		'description'   => 'Основной сайдбар, он тут единственный',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>",
	] );
	
		register_sidebar( [
		'name'          => 'Header Sidebar',
		'id'            => 'sidebar_top',
		'description'   => 'Другой sidebar чисто по приколу',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>",
	] );
	}
		
	function DoNothing(){
	$attributes = shortcode_atts(array(
	'cnt'=>5
	),$attributes);
	
	$ConcatString = '';
			
	$PostFilterCharacteristics = [
	'numberposts' => $attributes['cnt'],
	'orderby'     => 'date',
	'order'       => 'DESC',
	'post_type'	  => 'post'	
	];
	
	$posts = get_posts($PostFilterCharacteristics);
	
	global $post;
	
foreach( $posts as $post ){
	
	setup_postdata($post);
	
	$CurrentLink =  get_the_permalink();
	$CurrentTitle = get_the_title();
	$CurrentDate=	get_the_date();
	$CustomField_ShortDescr = get_field('short_dscr');
	$ConcatString.="<div>
						,<div><em>$CurrentDate</em></div>
						 <div><strong>$CurrentTitle</strong></div>
						 <div>$CustomField_ShortDescr</div>
						 <a href=\"$CurrentLink\">Далее...</a>
					</div>";
}

wp_reset_postdata(); // сброс

return $ConcatString;
}


function register_Check_post_taxonomy(){

    // список параметров: wp-kama.ru/function/get_taxonomy_labels
    register_taxonomy( 'taxonomy', [ 'post' ], [
        'label'                 => 'Оценка качества', // определяется параметром $labels->name
        'labels'                => [
            'name'              => 'Оценки',
            'singular_name'     => 'Оценка',
            'search_items'      => 'Искать Оценки',
            'all_items'         => 'Все оценки',
            'view_item '        => 'Просмотреть оценку',
            'parent_item'       => 'Родительская оценка',
            'parent_item_colon' => 'Родительская оценка:',
            'edit_item'         => 'Редактировать оценку',
            'update_item'       => 'Обновить оценку',
            'add_new_item'      => 'Добавить новую оценку',
            'new_item_name'     => 'название Новой оценки',
            'menu_name'         => 'Оценка',
        ],
        'description'           => 'Таксономия для оценки администратора качества содержимого поста', // описание таксономии
        'public'                => true,
        // 'publicly_queryable'    => null, // равен аргументу public
        // 'show_in_nav_menus'     => true, // равен аргументу public
        // 'show_ui'               => true, // равен аргументу public
        // 'show_in_menu'          => true, // равен аргументу show_ui
        // 'show_tagcloud'         => true, // равен аргументу show_ui
        // 'show_in_quick_edit'    => null, // равен аргументу show_ui
        'hierarchical'          => false,

        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
        'show_in_rest'          => null, // добавить в REST API
        'rest_base'             => null, // $taxonomy
    ] );
}


	function members_only_shortcode( $atts, $content = null )
	{
	    if ( is_user_logged_in())
	    {
	        return $content;
	    }
        wp_login_form();
	}

add_action( 'init', 'register_post_Clientapplication' );

function register_post_Clientapplication(){
    register_post_type('application', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'Заявки', // основное название для типа записи
            'singular_name'      => 'Заявка', // название для одной записи этого типа
            'add_new'            => 'Добавить заявку', // для добавления новой записи
            'add_new_item'       => 'Добавление заявки', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование заявки', // для редактирования типа записи
            'new_item'           => 'Новая заявка', // текст новой записи
            'view_item'          => 'Смотреть заявку', // для просмотра записи этого типа.
            'search_items'       => 'Искать заявку', // для поиска по этим типам записи
            'not_found'          => 'Не найдено заявок', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Заявки не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Заявки', // название меню
        ),
        'description'         => 'Заявки клиентов на проведение мероприятий',
        'public'              => true,
        'show_in_menu'        => true , // показывать ли в меню адмнки
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'menu_position'       => 15,
        'menu_icon'           => "dashicons-text-page",
        'hierarchical'        => false,
        'supports'            => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => false,
    ) );
}
function Project_js_delivery_vars(){
	    $vars = array(
	        'ajax_url'=>admin_url('admin-ajax.php')
        );
	    echo "<script>window.wp = ".json_encode($vars)."</script>";
}

add_action('wp_ajax_flatapp', 'ProjectTheme_ajax_flatapp');
add_action('wp_ajax_nopriv_flatapp', 'ProjectTheme_ajax_flatapp');

function ProjectTheme_ajax_flatapp(){
	    $rcs=array(
	        'success'=>"Данные успешно переданы",
            'err'=>'Попробуйте еще раз'
        );
	    echo json_encode($rcs);
	    wp_die();
}

add_action('add_meta_boxes', 'my_extra_fields', 1);

function my_extra_fields() {
    add_meta_box( 'extra_fields', 'Поля заявки', 'extra_fields_box_func', 'application', 'normal', 'high'  );
}

function extra_fields_box_func( $post ){
    ?>
    <p>ID помещения:
        <textarea type="text" name="extra[HallId]" style="width:30%;height:25px;"><?php echo get_post_meta($post->ID, 'HallId', 1); ?></textarea>
    </p>
    <p>ID юзера:
        <textarea type="text" name="extra[UserID]" style="width:30%;height:25px;"><?php echo get_post_meta($post->ID, 'UserID', 1); ?></textarea>
    </p>
    <p>Дата подачи заявления:
        <textarea type="date" name="extra[OrderDay]" style="width:30%;height:25px;"><?php echo get_post_meta($post->ID, 'OrderDay', 1); ?></textarea>
    </p>
    <p>Время начала:
        <textarea type="text" name="extra[TimeBegin]" style="width:30%;height:25px;"><?php echo get_post_meta($post->ID, 'TimeBegin', 1); ?></textarea>
    </p>
    <p>Время окончания:
        <textarea type="text" name="extra[TimeEnd]" style="width:30%;height:25px;"><?php echo get_post_meta($post->ID, 'TimeEnd', 1); ?></textarea>
    </p>
    <p>Комментарий:
        <textarea type="text" name="extra[description]" style="width:30%;height:25px;"><?php echo get_post_meta($post->ID, 'description', 1); ?></textarea>
    </p>


    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
    <?php

}

add_action( 'save_post', 'my_extra_fields_update', 0 );

## Сохраняем данные, при сохранении поста
function my_extra_fields_update( $post_id ){
  //  remove_action();
    // базовая проверка
    if (
        empty( $_POST['extra'] )
        || ! wp_verify_nonce( $_POST['extra_fields_nonce'], __FILE__ )
        || wp_is_post_autosave( $post_id )
        || wp_is_post_revision( $post_id )
    )
        return false;

    // Все ОК! Теперь, нужно сохранить/удалить данные
    $_POST['extra'] = array_map( 'sanitize_text_field', $_POST['extra'] ); // чистим все данные от пробелов по краям
    foreach( $_POST['extra'] as $key => $value ){
        if( empty($value) ){
            delete_post_meta( $post_id, $key ); // удаляем поле если значение пустое
            continue;
        }

        update_post_meta( $post_id, $key, $value ); // add_post_meta() работает автоматически
    }

    return $post_id;
}

$post_data = array(
	'post_status'    => 'draft',         // Статус создаваемой записи.
	'post_type'      => 'application', // Тип записи.
);

// Вставляем запись в базу данных
$post_id = wp_insert_post( $post_data );
