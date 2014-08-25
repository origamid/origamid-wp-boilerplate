<?php

// Funções para Limpar o Header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3 );
remove_action('wp_head', 'wp_generator' );

// Habilitar Menus

add_theme_support('menus');

// Diferentes tamanhos de imagens

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'titulo', 1400, 560, true );
	add_image_size( 'titulo_m', 800, 560, true );
}

// Modificando o Wordpress para o Cliente

// Logo personalizada no Login

function my_login_logo() { ?>
	<style type="text/css">
		body.login div#login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/og-image.png);
			padding-bottom: 30px;
			background-size: 300px 300px;
			width: 300px;
			height: 300px;
		}
	</style>
<?php }

add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Definir o que o Cliente pode ver

if ( current_user_can('editor') ) {
	function my_remove_menu_pages() {
		remove_menu_page('index.php');
		remove_menu_page('edit.php');
		remove_menu_page('edit-comments.php');
		remove_menu_page('tools.php');
	}
	add_action( 'admin_menu', 'my_remove_menu_pages' );

// Retira o Símbolo do Wordpress e dos comentários

	function annointed_admin_bar_remove() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('wp-logo');
		$wp_admin_bar->remove_menu('comments');
	}

	add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);
}

// Corrige a questão das colunas no dashboard

function wpse126301_dashboard_columns() {
		add_screen_option(
			'layout_columns',
			array(
				'max'			=> 2,
				'default'	=> 1
			)
		);
}
add_action( 'admin_head-index.php', 'wpse126301_dashboard_columns' );

// Custom Posts Types Vão Aqui

// Custom post de Produtos

add_action('init', 'cptui_register_my_cpt_produtos');
function cptui_register_my_cpt_produtos() {
register_post_type('produtos', array(
'label' => 'Produtos',
'description' => 'Produtos',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'produtos', 'with_front' => true),

'query_var' => true,
'supports' => array('title','page-attributes','post-formats'),
'labels' => array (
	'name' => 'Produtos',
	'singular_name' => 'Produto',
	'menu_name' => 'Produtos',
	'add_new' => 'Adicionar Novo',
	'add_new_item' => 'Adicionar Novo Produto',
	'edit' => 'Editar',
	'edit_item' => 'Editar Produto',
	'new_item' => 'Novo Produto',
	'view' => 'Ver Produto',
	'view_item' => 'Ver Produto',
	'search_items' => 'Procurar Produtos',
	'not_found' => 'Nenhum Produto Encontrado',
	'not_found_in_trash' => 'Nenhum Produto Encontrado no Lixo',
	'parent' => 'Parent Produto',
)
) ); }

// Final dos custom posts

?>