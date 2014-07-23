<?php
if(!session_id()){
    session_start();
}
require_once(ABSPATH.WPINC.'/registration.php');
require_once(ABSPATH.'/wp-config.php');
require_once(ABSPATH.'/wp-load.php');
require_once(ABSPATH.'/wp-includes/wp-db.php');
require_once(ABSPATH.'/wp-includes/class-phpass.php');
require_once(TEMPLATEPATH.'/class.oracle.php');

if(empty($wp_error)){
	$wp_error = new WP_Error();
}
if(empty($wp_hasher)){
	$wp_hasher = new PasswordHash(8, TRUE);
}
if(empty($userSession)){
	$userSession = wp_get_current_user();
}
add_filter('show_admin_bar', '__return_false');
add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));

/*
* 
* MODIFICAR SEARCH
* 
*/
function searchAll($query){
	if($query->is_search){
		//, 'page', 'feed', 'videojuegos', 'peliculas'
		$query->set('post_type', array('post'));
	}
	return $query;
}
add_filter('the_search_query', 'searchAll');

if(!function_exists('salco_get_display_userdata')){
	function salco_get_display_userdata(){
		global $userSession;
		return $userSession->data;
	}
}
/*
* 
* SETUP
* 
*/
add_action('after_setup_theme', 'salco_setup');
if(!function_exists('salco_setup')){
	function salco_setup(){
		load_theme_textdomain('salcobrand', TEMPLATEPATH.'/languages');
		
		register_nav_menu('menu_principal', __('menu_principal', 'salcobrand'));
		register_nav_menu('menu_secundario', __('menu_secundario', 'salcobrand'));
		register_nav_menu('menu_mas_informacion', __('menu_mas_informacion', 'salcobrand'));
		register_nav_menu('menu_acerca_de', __('menu_acerca_de', 'salcobrand'));
		register_nav_menu('menu_contacto', __('menu_contacto', 'salcobrand'));
		
		register_nav_menu('sub_menu_noticias', __('sub_menu_noticias', 'salcobrand'));
		register_nav_menu('sub_menu_rse', __('sub_menu_rse', 'salcobrand'));
		register_nav_menu('sub_menu_beneficios', __('sub_menu_beneficios', 'salcobrand'));
		register_nav_menu('sub_menu_tarjeta', __('sub_menu_tarjeta', 'salcobrand'));
		register_nav_menu('sub_menu_servicios', __('sub_menu_servicios', 'salcobrand'));
		register_nav_menu('sub_menu_perfil', __('sub_menu_perfil', 'salcobrand'));
		register_nav_menu('sub_menu_despacho', __('sub_menu_despacho', 'salcobrand'));
		
		define("URL_BASE", esc_url(home_url("/")));
		define("URL_THEME", get_template_directory_uri());
		if(isset($_POST['cms_salco'])){
			$opcion = $_POST['cms_salco'];
			switch($opcion){
				case "login":
				case "destroy_login":
				case "recuperar":
				case "contacto":
				case "consulta":
				case "registro":
				case "modificar":
				case "avatar":
				case "despacho_domicilio":
					if(function_exists("salco_$opcion")){
						call_user_func("salco_$opcion");
					}
					break;
			}
		}
		salco_proxy();
		if(isset($_GET['migrar'])){
			salco_migrar();
		}
		//
	}
}
if(!function_exists('salco_proxy')){
	function salco_proxy(){
		if(isset($HTTP_X_FORWARDED_FOR)){
			if($HTTP_X_FORWARDED_FOR){
				define("PROXY_USER", 'true');
			}
		}else{
			define("PROXY_USER", 'false');
		}
	}
}
if(!function_exists('salco_browser')){
	function salco_browser(){
		$browser = array (
			"OPERA",
			"MSIE",
			"NETSCAPE",
			"FIREFOX",
			"SAFARI",
			"KONQUEROR",
			"MOZILLA"
		);
		$info[browser] = "OTHER";
		foreach($browser as $parent){ 
			if(($s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent)) !== FALSE){
				$f = $s + strlen($parent);
				$version = substr($_SERVER['HTTP_USER_AGENT'], $f, 5);
				$version = preg_replace('/[^0-9,.]/','',$version);
				$info[browser] = $parent;
				$info[version] = $version;
				break;
			}
		}
		return $info;
	}
}
if(!function_exists('salco_migrar')){
	function salco_migrar(){
		global $wpdb;
		//MIGRAR POSTS
		$key = $wpdb->get_results($wpdb->prepare("UPDATE sb_posts SET post_title = REPLACE(post_title, 'salcobrand.cl', 'salcobrand.cl/paginasb')"));
		$key = $wpdb->get_results($wpdb->prepare("UPDATE sb_posts SET post_content = REPLACE(post_content, 'salcobrand.cl', 'salcobrand.cl/paginasb')"));
		$key = $wpdb->get_results($wpdb->prepare("UPDATE sb_posts SET post_excerpt = REPLACE(post_excerpt, 'salcobrand.cl', 'salcobrand.cl/paginasb')"));
		$key = $wpdb->get_results($wpdb->prepare("UPDATE sb_posts SET guid = REPLACE(guid, 'salcobrand.cl', 'salcobrand.cl/paginasb')"));
		
		//MIGRAR POSTMETA
		$key = $wpdb->get_results($wpdb->prepare("UPDATE sb_postmeta SET meta_value = REPLACE(meta_value, 'salcobrand.cl', 'salcobrand.cl/paginasb')"));
	}
}

/*
* 
* REDIRECCIONAR SI
* 
*/

add_action('init','possibly_redirect');
if(!function_exists('possibly_redirect')){
	function possibly_redirect(){
		global $pagenow;
		if('wp-login.php' == $pagenow){
			//wp_redirect(URL_BASE.'?message=1');
		}
	}
}



if(!function_exists('salco_sustraer')){
	function salco_sustraer($text, $long = '', $append = '...'){
		if($long != ''){
			if(strlen($text) > (int)$long){
				$tamano = $long;
				$contador = 0;
				$arrayTexto = explode(' ', $text);
				$texto = '';
				while($tamano >= strlen($texto) + strlen($arrayTexto[$contador])){
				    $texto .= ' '.$arrayTexto[$contador];
				    $contador++;
				}
				return($texto.$append);
			}
			return $text;
		}else{
			return $text;
		}
	}
}

/*
* 
* SESSION LOGIN
* 
*/
if(!function_exists('salco_login')){
	function salco_login(){
		global $wp_error, $wp_hasher, $wpdb;
		if(!isset($_POST['usuario']) || !isset($_POST['pass'])){
			
			
			$wp_error->add('login_usuario', __('Se produjo un error interno al iniciar sesi&oacute;n'));
			
			return;
			
		}
		$user_login = $_POST['usuario'];
		$user_pass = $_POST['pass'];
		if($user_login == "" || $user_pass == ""){
			$wp_error->add('login_usuario', __('Ingrese su usuario y clave para iniciar sesi&oacute;n'));
			return;
		}
		$creds = array();
		$creds['user_login'] = $user_login;
		$creds['user_password'] = $user_pass;
		$creds['remember'] = false;
		$user = wp_signon($creds, false);
		
		
		if(is_wp_error($user)){
			
			
			if(isset($user->errors["incorrect_password"])){
				$wp_error->add('login_usuario', __('Al parecer ingresaste mal tu contrase&ntilde;a'));
				return;
			}
			if(isset($user->errors["invalid_username"])){
				$cms_oracle = new cms_oracle();
				$setUser = explode("-", $user_login);
				if(!isset($setUser[0]) || $setUser[0] == "" || !isset($setUser[1]) || $setUser[1] == ""){
					$wp_error->add('login_usuario', __('Ingrese un rut valido'));
					return;
				}
				$consulta_cli = $cms_oracle->consulta_cli(Array(
					'rut' => $setUser[0],
					'dv' => $setUser[1]
				));
				if(!isset($consulta_cli[13])){
					$wp_error->add('login_usuario', __('Al parecer usted no es un usuario registrado'));
					return;
				}
				$user_id = wp_create_user($user_login, $user_pass, $consulta_cli[13]);
				if($user_id){
					$userdata = array (
						'ID' => $user_id, 
						'first_name' => $consulta_cli[0],
						'last_name' => $consulta_cli[2]." ".$consulta_cli[3],
						'display_name' => $consulta_cli[2]." ".$consulta_cli[3],
						'rich_editing' => '',
						'jabber' => '',
						'aim' => '',
						'yim' => ''
					);
					if($password){
						$userdata = array_merge(array('user_pass' => $user_pass), $userdata);
					}
					wp_update_user($userdata);
					update_user_meta($user_id, 'primer_nombre', $consulta_cli[0]);
					update_user_meta($user_id, 'segundo_nombre', "");
					update_user_meta($user_id, 'apellido_paterno', $consulta_cli[2]);
					update_user_meta($user_id, 'apellido_materno', $consulta_cli[3]);
					update_user_meta($user_id, 'fecha_nacimiento', "");
					update_user_meta($user_id, 'sexo', $consulta_cli[5]);
					update_user_meta($user_id, 'calle', $consulta_cli[6]);
					update_user_meta($user_id, 'user_numero', "");
					update_user_meta($user_id, 'depto', "");
					update_user_meta($user_id, 'comuna', $consulta_cli[9]);
					update_user_meta($user_id, 'provincia', "");
					update_user_meta($user_id, 'region', $consulta_cli[10]);
					update_user_meta($user_id, 'telefono_fijo', $consulta_cli[11]);
					update_user_meta($user_id, 'telefono_celular', "");
					update_user_meta($user_id, 'estado_civil', "");
					update_user_meta($user_id, 'avatar', "");
					
					salco_login();
				}
			}
		}else{
			
			salco_redirect(home_url("/"));
			return;
		}
	}
}
if(!function_exists('salco_redirect')){
	function salco_redirect($url=""){
		echo "<script type='text/javascript'> window.location = '".$url."'; </script>'";
	}
}

if(!function_exists('salco_error_login')){
	function salco_error_login(){
		global $wp_error;
		if(isset($wp_error->errors['login_usuario'][0])){
			return $wp_error->errors['login_usuario'][0];
		}
		return false;
	}
}
if(!function_exists('salco_destroy_login')){
	function salco_destroy_login(){
		$_SESSION["display_name"] = null;
		$_SESSION["user_email"] = null;
		$_SESSION["id"] = null;
	}
}

/*
* 
* DISPLAY NAME USER
* 
*/
if(!function_exists('salco_get_display_name')){
	function salco_get_display_name(){
		global $userSession;
		echo $userSession->data->display_name;
	}
}
$usuario_login_data = Array();
if(!function_exists('salco_get_vars_login')){
	function salco_get_vars_login($var = ""){
		global $wpdb, $usuario_login_data;
		if(isset($_SESSION["id"]) && $_SESSION["id"] != null){
			$user_email = $_SESSION["user_email"];
			if(count($usuario_login_data)==0){
				//var_dump($user_email);
				$key = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->users WHERE user_email = '$user_email'"));
				if(count($key)){
					$usuario_login_data = Array(
						"ID" => $key[0]->ID,
						"display_name" => $key[0]->display_name,
						"user_login" => $key[0]->display_name,
						"user_email" => $key[0]->user_email
					);
					/*
					$meta = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->users WHERE user_email = '$user_email'"));
					if(count($meta)){
						
					}*/
				}
			}
			if(isset($usuario_login_data[$var])){
				return $usuario_login_data[$var];
			}else{
				return "";
			}
		}else{
			return false;
		}
	}
}
if(!function_exists('salco_get_login')){
	function salco_get_login(){
		return (isset($_SESSION["id"]) && $_SESSION["id"] != null)? true : false;
	}
}


/*
* 
* RECUPERAR CLAVE
* 
*/
if(!function_exists('salco_recuperar')){
	function salco_recuperar(){
		global $wp_error, $wp_hasher, $wpdb;
		if(!isset($_POST['rut'])){
			$wp_error->add('recuperar_usuario', __('Se produjo un error interno al recuperar su contrase&ntilde;a'));
			return;
		}
		$rut = $_POST['rut'];
		
		$recuperar = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->users WHERE user_login = '$rut'"));
		
		if(count($recuperar)){
			$prefijo = substr(md5(uniqid(rand())),0,6);
			
			$userdata = array (
				'ID' => $recuperar[0]->ID, 
				'user_pass' => $prefijo
			);
			//wp_update_user($userdata);
			
			$encrypt = md5($prefijo);
			$wpdb->get_results($wpdb->prepare("UPDATE $wpdb->users SET user_pass='$encrypt' WHERE ID=".$userdata['ID']));
			
			$blog_title = get_bloginfo();
			$blog_email= get_bloginfo('admin_email');
			$headers = "From: $blog_title <$blog_email>" . "\r\n";
			$mensaje = body_message("Salcobrand", "Hola ".$recuperar[0]->display_name.",", "Tu nombre de usuario es $rut y tu contrase&ntilde;a $prefijo");
			
			wp_mail($recuperar[0]->user_email, "Recuperar clave", $mensaje, $headers);
			
			$wp_error->add('recuperar_usuario', __('Tu clave ha sido enviada al correo: <strong>'.$recuperar[0]->user_email.'</strong>'));
		}else{
			$wp_error->add('recuperar_usuario', __('Al parecer usted no es un usuario registrado'));
		}
	}
}
if(!function_exists('salco_error_recuperar')){
	function salco_error_recuperar(){
		global $wp_error;
		if(isset($wp_error->errors['recuperar_usuario'][0])){
			return $wp_error->errors['recuperar_usuario'][0];
		}
		return false;
	}
}
/*
* 
* COMMENTS
* 
*/
if(!function_exists('salco_comments')){
	function salco_comments(){
		$comment_args = array(
			'fields'				=> apply_filters('comment_form_default_fields', array(
					'author' => ($req? '<span class="required">*</span>' : '').'<input id="author" name="author" type="text" value="'.esc_attr($commenter['comment_author']).'" size="30"'.$aria_req.' />',
					'email'  => ($req? '<span class="required">*</span>' : '').'<input id="email" name="email" type="text" value="'.esc_attr($commenter['comment_author_email']).'" size="30"'.$aria_req.' />',
					'url'    => ''
				)
			),
			'label_submit'			=> '',
			'comment_field'			=> '<textarea class="text_cm" name="comment"></textarea>'.'',
			'comment_notes_after'	=> '',
			'title_reply'			=> '',
			'logged_in_as'			=> '<span>'.salco_get_vars_login("display_name").'</span>'
		);
		comment_form($comment_args);
	}
}
if(!function_exists('salco_get_avatar')){
	function salco_get_avatar($size="44"){
		global $userSession, $wp_error, $current_user;
		get_currentuserinfo();
		if($current_user->avatar==""){
			$image = "http://1.gravatar.com/avatar/5908cae2cc717dc87dd6672460d80cbf?s=".$size;
		}else{
			$image = $current_user->avatar;
		}
		echo '<img src="'.$image.'" width="'.$size.'" height="'.$size.'" alt="'.$userSession->data->display_name.'"/>';
	}
}

/*
* 
* BUSCADOR DE LOCALES
* 
*/
if(!function_exists('salco_regiones')){
	function salco_regiones(){
		global $wp_error, $wp_hasher, $wpdb;
		$key = $wpdb->get_results($wpdb->prepare("SELECT * FROM ".$wpdb->prefix."regiones ORDER BY orden ASC"));
		if(count($key)){
			return $key;
		}else{
			return Array();
		}
	}
}
if(!function_exists('salco_regiones_locales')){
	function salco_regiones_locales(){
		global $wp_error, $wp_hasher, $wpdb;
		//$key = $wpdb->get_results($wpdb->prepare("SELECT * FROM ".$wpdb->prefix."regiones ORDER BY nombre ASC"));
		$key = $wpdb->get_results($wpdb->prepare("SELECT r.idregion,r.nombre
FROM ".$wpdb->prefix."locales AS l
JOIN ".$wpdb->prefix."regiones AS r ON r.idregion = l.region_id
GROUP BY l.region_id
ORDER BY r.orden ASC "));
		if(count($key)){
			return $key;
		}else{
			return Array();
		}
	}
}
if(!function_exists('salco_comunas')){
	function salco_comunas(){
		global $wp_error, $wp_hasher, $wpdb;//ORDER BY region_id ASC
		$key = $wpdb->get_results($wpdb->prepare("SELECT * FROM ".$wpdb->prefix."comunas ORDER BY nombre ASC"));
		if(count($key)){
			return $key;
		}else{
			return Array();
		}
	}
}
if(!function_exists('salco_provincias')){
	function salco_provincias(){
		global $wp_error, $wp_hasher, $wpdb;
		$key = $wpdb->get_results($wpdb->prepare("SELECT * FROM ".$wpdb->prefix."provincia ORDER BY nombre ASC"));
		if(count($key)){
			return $key;
		}else{
			return Array();
		}
	}
}
if(!function_exists('salco_farmacia')){
	function salco_farmacia($page, $idregion, $idcomuna){
		global $wp_error, $wp_hasher, $wpdb;
		//$por_page = 5;
		$por_page = 10000;
		$total = $wpdb->get_results($wpdb->prepare("SELECT * FROM ".$wpdb->prefix."locales WHERE region_id='$idregion' AND comuna='$idcomuna'"));
		$pages = ceil(count($total)/$por_page);
		$post_ini = $por_page*($page-1);
		$query = "SELECT * FROM ".$wpdb->prefix."locales WHERE region_id='$idregion' LIMIT $post_ini,$por_page";
		$key = $wpdb->get_results($wpdb->prepare("SELECT * FROM ".$wpdb->prefix."locales WHERE region_id='$idregion' AND comuna='$idcomuna' LIMIT $post_ini,$por_page"));
		if(count($key)){
			return Array($key, $pages, $page);
		}else{
			return Array(Array(), 0, 0);
		}
	}
}
if(!function_exists('salco_farmacia_turno')){
	function salco_farmacia_turno($listado){
		global $wp_error, $wp_hasher, $wpdb;
		$where = "( 1=2";
		foreach($listado AS $id_local){
			$idlocal = (int)$id_local;
			$where .= ($where=="")? "id='$idlocal'" : " OR id='$idlocal'";
		}
		if(isset($_GET["comuna"])  && is_numeric($_GET["comuna"]) ){
		
			$where .= " )AND comuna = ".$_GET["comuna"];
		}else{
			$where .= " )";
		}
		$query = "SELECT * FROM ".$wpdb->prefix."locales WHERE $where";
		//echo $query;
		$key = $wpdb->get_results($wpdb->prepare($query));
		if(count($key)){
			return $key;
		}else{
			return Array();
		}
	}
}



if(!function_exists('salco_comunas_horarios')){
	function salco_comunas_horarios(){
			global $wpdb;
			$category = get_categories(array(
				'slug' => 'locales-de-turno'
			));
			$posts_array = get_posts(array(
				'numberposts'     => 1,
				'category'        => $category[0]->cat_ID,
				'post_type'       => 'post',
				'orderby'         => 'post_date',
				'order'           => 'DESC',
				'post_status'     => 'publish'
			));
			$listado_locales = Array();
			$detalle_local_turno = Array();
			foreach($posts_array AS $post){
				$fila_local = explode(";", $post->post_content);
				foreach($fila_local AS $local_info){
					$detalle_local = explode(",", $local_info);
					if($detalle_local[1] == date("d/m/y", strtotime($_GET['dia_turno']))){
						$detalle_local_turno[$detalle_local[0]] = $detalle_local;
						array_push($listado_locales, $detalle_local[0]);
					}
				}
			}
			$where = "";
			//var_dump($listado_locales);
			$listado = $listado_locales;
			foreach($listado AS $id_local){
				$idlocal = (int)$id_local;
				$where .= ($where=="")? "l.id='$idlocal'" : " OR l.id='$idlocal'";
			}
			$query = "SELECT c.idcomunas, c.nombre FROM ".$wpdb->prefix."locales  AS l JOIN ".$wpdb->prefix."comunas AS c ON c.idcomunas = l.comuna WHERE $where GROUP BY l.comuna ORDER BY c.nombre ASC";
			//echo $query;
			$key = $wpdb->get_results($wpdb->prepare($query));
			if(count($key)){
				return $key;
			}else{
				return Array();
			}
			
	
	
	}
	
	if(isset($_REQUEST["comsalhor"])){
		$result = salco_comunas_horarios();
		if(count($result) > 0){
			foreach($result AS $r){
				echo '<option value="'.$r->idcomunas.'">'.$r->nombre.'</option>';
			}
		}
		die();
	}
}



if(!function_exists('salco_comunas_por_region')){
	function salco_comunas_por_region($region){
		global $wp_error, $wp_hasher, $wpdb;
		$region = str_replace("'","\'",$region);
		$where = " UCASE(region) = UCASE('$region')";
		
		$query = "SELECT comuna FROM ".$wpdb->prefix."asociados WHERE $where GROUP BY comuna ORDER BY comuna ASC";
		//echo $query;
		$key = $wpdb->get_results($wpdb->prepare($query));
		if(count($key)){
			return $key;
		}else{
			return Array();
		}
	}
	
	if(isset($_REQUEST["com_per_reg"])){
		$region = salco_comunas_por_region($_REQUEST["com_per_reg"]);
		if(count($region) > 0){
			foreach($region AS $r){
				echo '<option value="'.$r->comuna.'">'.$r->comuna.'</option>';
			}
		}
		die();
	}
}



if(!function_exists('salcolocales_comunas_por_region')){
	function salcolocales_comunas_por_region($region){
		global $wp_error, $wp_hasher, $wpdb;
		$region = str_replace("'","\'",$region);
		
		$query = "SELECT c.idcomunas, c.nombre
FROM sb_locales AS l
JOIN sb_comunas AS c ON l.comuna = c.idcomunas
WHERE l.region_id =$region
GROUP BY l.comuna
ORDER BY c.nombre ASC";
		//echo $query;
		$key = $wpdb->get_results($wpdb->prepare($query));
		if(count($key)){
			return $key;
		}else{
			return Array();
		}
	}
	
	if(isset($_REQUEST["comloc_per_reg"])){
		$loc = salcolocales_comunas_por_region($_REQUEST["comloc_per_reg"]);
		if(count($loc) > 0){
			foreach($loc AS $r){
				echo '<option value="'.$r->idcomunas.'">'.($r->nombre).'</option>';
			}
		}
		die();
	}
}


if(!function_exists('salco_rubro_por_comuna')){
	function salco_rubro_por_comuna($var){
		global $wp_error, $wp_hasher, $wpdb;
		$varia = explode("|",$var);
		$region = $varia[0];
		$comuna = $varia[1];
		$region = str_replace("'","\'",$region);
		$comuna = str_replace("'","\'",$comuna);
		$where = " UCASE(region) = UCASE('$region') AND UCASE(comuna) = UCASE('$comuna') ";
		$query = "SELECT rubro FROM ".$wpdb->prefix."asociados WHERE $where GROUP BY rubro ORDER BY rubro ASC";
		//echo $query;
		$key = $wpdb->get_results($wpdb->prepare($query));
		if(count($key)){
			return $key;
		}else{
			return Array();
		}
	}
	
	if(isset($_REQUEST["rub_per_com"])){
		$rubros = salco_rubro_por_comuna($_REQUEST["rub_per_com"]);
		if(count($rubros) > 0){
			foreach($rubros AS $r){
				echo '<option value="'.$r->rubro.'">'.$r->rubro.'</option>';
			}
		}
		die();
	}
}


/*
* 
* FORM CONTACTO
* 
*/
if(!function_exists('salco_contacto')){
	function salco_contacto(){
		global $wp_error;
		
		$nombre = "";
		if(isset($_POST['nombre']) && $_POST['nombre'] != ""){
			$nombre = $_POST['nombre'];
		}else{
			$wp_error->add('contacto_usuario', __('El campo nombre es obligatorio'));
			return;
		}
		
		$apellido = "";
		if(isset($_POST['apellido']) && $_POST['apellido'] != ""){
			$apellido = $_POST['apellido'];
		}else{
			$wp_error->add('contacto_usuario', __('El campo apellido es obligatorio'));
			return;
		}
		
		$email = "";
		
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
				$wp_error->add('contacto_usuario', __('El campo email debe contener un email válido'));
		}	
		
		if(isset($_POST['email']) && $_POST['email'] != ""){
			$email = $_POST['email'];
		}else{
			$wp_error->add('contacto_usuario', __('El campo email es obligatorio'));
			return;
		}
		
		$rut = "";
		if(isset($_POST['rut']) && $_POST['rut'] != ""){
			$rut = $_POST['rut'];
		
		  if ($rut != "admin1"){	
			if(validar_cadena($_POST['rut'],'0123456789')!=true){
					$wp_error->add('contacto_usuario', __('El campo rut debe contener sólo números'));
					return;
			}
		  }

		}else{
			$wp_error->add('contacto_usuario', __('El campo rut es obligatorio'));
			return;
		}
		
		$cv = "";
		if(isset($_POST['cv']) && $_POST['cv'] != ""){
			$cv = $_POST['cv'];
		}else{
			$wp_error->add('contacto_usuario', __('El campo rut es obligatorio'));
			return;
		}
		
		$asunto = "";
		if(isset($_POST['asunto'])){
			$asunto = $_POST['asunto'];
		}
		$region = "";
		if(isset($_POST['region'])){
			foreach(salco_regiones() AS $item){
				if($item->idregion == $_POST['region']){
					$region = $item->nombre;
				}
			}
		}
		
		$provincia = "";
		if(isset($_POST['provincia'])){
			foreach(salco_provincias() AS $item){
				if($item->idprovincia == $_POST['provincia']){
					$provincia = $item->nombre;
				}
			}
		}
		
		$comuna = "";
		if(isset($_POST['comuna'])){
			foreach(salco_comunas() AS $item){
				if($item->idcomunas == $_POST['comuna']){
					$comuna = $item->nombre;
				}
			}
		}
		
		$tel_cod = "";
		if(isset($_POST['tel_cod'])){
			$tel_cod = $_POST['tel_cod'];
		}
		
		$tel_num = "";
		if(isset($_POST['tel_num'])){
			$tel_num = $_POST['tel_num'];
		}
		
		$msj = "";
		if(isset($_POST['mensaje']) && $_POST['mensaje'] != ""){
			$msj = $_POST['mensaje'];
		}else{
			$wp_error->add('contacto_usuario', __('El campo mensaje es obligatorio'));
			return;
		}
		
		$blog_title = get_bloginfo();
		$blog_email= get_bloginfo('admin_email');
		$headers = "From: $blog_title <$blog_email>\r\n";
		//MENSAJE USUARIO
		$mensaje = body_message("Salcobrand", "Hola $nombre $apellido,", "Tu mensaje se ha enviado correctamente, nos contactaremos contigo a la brevedad.");
		wp_mail($email, "Contacto", $mensaje, $headers);
		
		//MENSAJE USUARIO
		$mensaje = body_message("Salcobrand", "Mensaje enviado por $nombre $apellido,", "Nombre: $nombre<br/>Apellido: $apellido<br/>Email: $email<br/>RUT: $rut-$cv<br/>Asunto: $asunto<br/>Regi&oacute;n: $region<br/>Provincia: $provincia<br/>Comuna: $comuna<br/>Tel&eacute;fono: ($tel_cod) $tel_num<br/>Mensaje: $msj");
		
		
		
		
		if ($asunto == "Exclusivo Tarjeta Crédito"){
			wp_mail("clientes@sb.cl", "Contacto", $mensaje, $headers);
			
		
		}else{
		
			wp_mail("atencionclientes@sb.cl", "Contacto", $mensaje, $headers);
		}
		
		
	//	wp_mail("pbaltierra@gmail.com", "Contacto", $mensaje, $headers);
		
		
		$wp_error->add('contacto_usuario', __('exito'));
	}
}
if(!function_exists('status_contacto')){
function status_contacto(){
	global $wp_error;
	if(isset($wp_error->errors['contacto_usuario'])){
		return $wp_error->errors['contacto_usuario'][0];
	}
	return false;
}
}
/*
* 
* FORM CONTACTO
* 
*/
if(!function_exists('salco_consulta')){
	function salco_consulta(){
		global $wp_error;
		
		$nombre = "";
		if(isset($_POST['nombre']) && $_POST['nombre'] != ""){
			$nombre = $_POST['nombre'];
		}else{
			$wp_error->add('consulta_usuario', __('El campo nombre es obligatorio'));
			return;
		}
		
		$apellido = "";
		if(isset($_POST['apellido']) && $_POST['apellido'] != ""){
			$apellido = $_POST['apellido'];
		}else{
			$wp_error->add('consulta_usuario', __('El campo apellido es obligatorio'));
			return;
		}
		
		$email = "";
		if(isset($_POST['email']) && $_POST['email'] != ""){
			$email = $_POST['email'];
			
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
				$wp_error->add('registro_usuario', __('El campo email debe contener un email válido'));
			}	
			
			
			
		}else{
			$wp_error->add('consulta_usuario', __('El campo email es obligatorio'));
			return;
		}
		
		$rut = "";
		if(isset($_POST['rut']) && $_POST['rut'] != ""){
			$rut = $_POST['rut'];
			
		  if ($rut != "admin1"){	
			if(validar_cadena($_POST['rut'],'0123456789')!=true){
					$wp_error->add('contacto_usuario', __('El campo rut debe contener sólo números'));
					return;
			}
		  }
			
			
		}else{
			$wp_error->add('consulta_usuario', __('El campo rut es obligatorio'));
			return;
		}
		
		$cv = "";
		if(isset($_POST['cv']) && $_POST['cv'] != ""){
			$cv = $_POST['cv'];
		}else{
			$wp_error->add('consulta_usuario', __('El campo rut es obligatorio'));
			return;
		}
		$region = "";
		if(isset($_POST['region'])){
			foreach(salco_regiones() AS $item){
				if($item->idregion == $_POST['region']){
					$region = $item->nombre;
				}
			}
		}
		
		$provincia = "";
		if(isset($_POST['provincia'])){
			foreach(salco_provincias() AS $item){
				if($item->idprovincia == $_POST['provincia']){
					$provincia = $item->nombre;
				}
			}
		}
		
		$comuna = "";
		if(isset($_POST['comuna'])){
			foreach(salco_comunas() AS $item){
				if($item->idcomunas == $_POST['comuna']){
					$comuna = $item->nombre;
				}
			}
		}
		
		$tel_cod = "";
		if(isset($_POST['tel_cod'])){
			$tel_cod = $_POST['tel_cod'];
		}
		
		$tel_num = "";
		if(isset($_POST['tel_num'])){
			$tel_num = $_POST['tel_num'];
		}
		
		$msj = "";
		if(isset($_POST['mensaje']) && $_POST['mensaje'] != ""){
			$msj = $_POST['mensaje'];
		}else{
			$wp_error->add('consulta_usuario', __('El campo mensaje es obligatorio'));
			return;
		}
		
		$blog_title = get_bloginfo();
		$blog_email= get_bloginfo('admin_email');
		$headers = "From: $blog_title <$blog_email>\r\n";
		//MENSAJE USUARIO
		$mensaje = body_message("Salcobrand", "Hola $nombre $apellido,", "Tu consulta se ha enviado correctamente, nos contactaremos contigo a la brevedad.");
		wp_mail($email, "Consulta", $mensaje, $headers);
		
		//MENSAJE USUARIO
		$mensaje = body_message("Salcobrand", "Consulta enviado por $nombre $apellido,", "Nombre: $nombre<br/>Apellido: $apellido<br/>Email: $email<br/>RUT: $rut-$cv<br/>Regi&oacute;n: $region<br/>Provincia: $provincia<br/>Comuna: $comuna<br/>Tel&eacute;fono: ($tel_cod) $tel_num<br/>Mensaje: $msj");
		
		//wp_mail("pbaltierra@gmail.com", "Consulta", $mensaje, $headers);
		
		wp_mail("atencionclientes@sb.cl", "Consulta", $mensaje, $headers);
		
		
		
		$wp_error->add('consulta_usuario', __('exito'));
	}
}
if(!function_exists('status_consulta')){
function status_consulta(){
	global $wp_error;
	if(isset($wp_error->errors['consulta_usuario'])){
		return $wp_error->errors['consulta_usuario'][0];
	}
	return false;
}
}

add_action('wp_footer', 'add_googleanalytics');
if(!function_exists('add_googleanalytics')){
	function add_googleanalytics() {
		// Pega el c�digo de Google Analytics aqu�
	}
}

if(!function_exists('salco_avatar')){
	function salco_avatar() {
		global $wp_error, $current_user;
		get_currentuserinfo();
		$user_id = $current_user->ID;
		$aid = upload_image_front($_FILES['avatar'], true);
		update_usermeta($user_id, 'avatar', $aid[1]['guid']);
		$wp_error->add('avatar_usuario', __('exito'));
	}
}
if(!function_exists('status_avatar')){
function status_avatar(){
	global $wp_error;
	if(isset($wp_error->errors['avatar_usuario'])){
		return $wp_error->errors['avatar_usuario'][0];
	}
	return false;
}
}
if(!function_exists('upload_image_front')){
	function upload_image_front($upload, $delete = false){
		require_once(ABSPATH.'wp-admin/includes/file.php');
		require_once(ABSPATH.'wp-admin/includes/image.php');
		$wpUploadDir = wp_upload_dir();
		
		if(file_is_displayable_image($upload['tmp_name'])){
			if($upload['size'] > 716800){
				$error = array('error' => true);
				echo json_encode($error);
				break;
			}
			$overrides = array('test_form' => false);
			$file = wp_handle_upload($upload, $overrides);
			if($file){
				$image_url = $file['url'];
				$thumbpath = image_resize( $file['file'], 50, 50, true );
				$Athumb = explode('uploads', $thumbpath);
				$baseUrl = $wpUploadDir['baseurl'] . $Athumb[1];
				$attachment = array(
					'post_mime_type' => $file['type'],
					'guid' => $image_url,
					'post_parent' => 0
				);
				$aid = wp_insert_attachment($attachment, $file['file'], 0);
				if(!is_wp_error($aid)){
					wp_update_attachment_metadata($aid, wp_generate_attachment_metadata($aid, $file['file']));
				}
			}
			if($delete)
				wp_delete_attachment($delete, true);
			return Array($aid, $attachment);
		}else {
			return false;
		}
	}
}
if(!function_exists('salco_registro')){
	function salco_registro(){
		global $wp_error;
		if(isset($_POST)){
			
			
	
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
				$wp_error->add('registro_usuario', __('El campo email debe contener un email válido'));
			}
			
			if(validar_cadena($_POST['rut_digito'],'0123456789')!=true){
				$wp_error->add('registro_usuario', __('El campo rut debe contener sólo números'));
			}
			
			if(validar_cadena($_POST['rut_verificador'],'0123456789kK')!=true){
				$wp_error->add('registro_usuario', __('El dígito verificador del rut debe contener sólo números o K'));
			}			
			
			if(($_POST['tel_particular'] != "") && (validar_cadena($_POST['tel_particular'],'0123456789')!=true)){
            	$wp_error->add('registro_usuario', __('El campo teléfono debe contener sólo números'));
			}
			
			if (($_POST['tel_celular'] != "") && (validar_cadena($_POST['tel_celular'],'0123456789')!=true)){
				$wp_error->add('registro_usuario', __('El campo teléfono debe contener sólo números'));	
			}
					
			
			
			if(!isset($_POST['nombre']) || $_POST['nombre']==""){
				$wp_error->add('registro_usuario', __('El campo nombre es obligatorio'));
			}
			if(!isset($_POST['segundo_nombre'])){
				$wp_error->add('registro_usuario', __('El campo segundo nombre es obligatorio'));
			}
			if(!isset($_POST['apellido_paterno']) || $_POST['apellido_paterno']==""){
				$wp_error->add('registro_usuario', __('El campo apellido paterno es obligatorio'));
			}
			if(!isset($_POST['apellido_materno']) || $_POST['apellido_materno']==""){
				$wp_error->add('registro_usuario', __('El campo apellido materno es obligatorio'));
			}
			if(!isset($_POST['rut_digito']) || !isset($_POST['rut_verificador']) || $_POST['rut_digito']=="" || $_POST['rut_verificador']==""){
				$wp_error->add('registro_usuario', __('El campo rut es obligatorio'));
			}
			if(!isset($_POST['estado_civil']) || $_POST['estado_civil']=="0"){
				$wp_error->add('registro_usuario', __('El campo estado civil es obligatorio'));
			}
			if(!isset($_POST['sexo'])){
				$wp_error->add('registro_usuario', __('El campo sexo es obligatorio'));
			}
			if(!isset($_POST['email']) || $_POST['email']==""){
				$wp_error->add('registro_usuario', __('El campo e-mail es obligatorio'));
			}
			if(!isset($_POST['fecha_de_nacimiento_dia']) || $_POST['fecha_de_nacimiento_dia']=="0"){
				$wp_error->add('registro_usuario', __('El campo d&iacute;a de nacimiento es obligatorio'));
			}
			if(!isset($_POST['fecha_de_nacimiento_mes']) || $_POST['fecha_de_nacimiento_mes']=="0"){
				$wp_error->add('registro_usuario', __('El campo mes de nacimiento es obligatorio'));
			}
			if(!isset($_POST['fecha_de_nacimiento_anio']) || $_POST['fecha_de_nacimiento_anio']=="0"){
				$wp_error->add('registro_usuario', __('El campo a&ntilde;o de nacimiento es obligatorio'));
			}
			
			
			if(!isset($_POST['region']) || $_POST['region']=="0"){
				$wp_error->add('registro_usuario', __('El campo regi&oacute;n es obligatorio'));
			}
			if(!isset($_POST['comuna']) || $_POST['comuna']=="0"){
				$wp_error->add('registro_usuario', __('El campo comuna es obligatorio'));
			}
			if(!isset($_POST['dir_calle']) || $_POST['dir_calle']==""){
				$wp_error->add('registro_usuario', __('El campo Av. Calle o Psje. es obligatorio'));
			}
			if(!isset($_POST['dir_numero']) || $_POST['dir_numero']==""){
				$wp_error->add('registro_usuario', __('El campo N&ordm; es obligatorio'));
			}
			if(!isset($_POST['dir_depto'])){
				$wp_error->add('registro_usuario', __('El campo N&ordm; de Block, Depto. es obligatorio'));
			}
			
			/*
			if(!isset($_POST['tel_particular'])){
				$wp_error->add('registro_usuario', __('El campo tel&eacute;fono particular es obligatorio'));
			}
			if(!isset($_POST['tel_celular'])){
				$wp_error->add('registro_usuario', __('El campo tel&eacute;fono celular es obligatorio'));
			}
			*/
			
			if(	($_POST['tel_particular'] == "") && ($_POST['tel_celular'] == "")){
              $wp_error->add('registro_usuario', __('Debes ingresar al menos un teléfono'));
			}
			
			if(!isset($_POST['password']) || $_POST['password'] == ""){
				$wp_error->add('registro_usuario', __('El campo contrase&ntilde;a es obligatorio'));
			}
			
			if( !isset($_POST['re_password']) ){
				$wp_error->add('registro_usuario', __('El campo repetir contrase&ntilde;a es obligatorio'));
			}
			
			if($_POST['password'] != $_POST['re_password']){
				$wp_error->add('registro_usuario', __('La contrase&ntilde;a repetida no corresponde'));
			}			
			

			
			
			$set = Array(
				'rut'				=> $_POST['rut_digito'],
				'DV'				=> $_POST['rut_verificador'],
				'primer_nombre'		=> $_POST['nombre'],
				'segundo_nombre'	=> $_POST['segundo_nombre'],
				'apellido_paterno'	=> $_POST['apellido_paterno'],
				'apellido_materno'	=> $_POST['apellido_materno'],
				'fecha_nacimiento'	=> $_POST['fecha_de_nacimiento_dia']."-".$_POST['fecha_de_nacimiento_mes']."-".$_POST['fecha_de_nacimiento_anio'],
				'sexo'				=> $_POST['sexo'],
				'calle'				=> $_POST['dir_calle'],
				'user_numero'		=> $_POST['dir_numero'],
				'depto'				=> $_POST['dir_depto'],
				'comuna'			=> $_POST['comuna'],
				'provincia'			=> $_POST['provincia'],
				'region'			=> $_POST['region'],
				'telefono_fijo'		=> $_POST['tel_particular'],
				'telefono_celular'	=> $_POST['tel_celular'],
				'email'				=> $_POST['email'],
				'estado_civil'		=> $_POST['estado_civil'],
				'password'			=> $_POST['password'],
				'acepto'			=> (isset($_POST['acepto']) && $_POST['acepto']=="true")? "1" : "0",
				'acepto_sms'		=> (isset($_POST['acepto_sms']) && $_POST['acepto_sms']=="true")? "1" : "0",
				
			);
			
			if(isset($wp_error->errors['registro_usuario'])){
				//var_dump($wp_error->errors['registro_usuario']);
				return;
			}
			//var_dump($set);
			$user_name = $set['rut']."-".$set['DV'];
			$password = $set['password'];
			$user_email = $set['email'];
			//
			if(email_exists($user_email) || username_exists($user_name)){
				$wp_error->add('registro_usuario', __('Nombre de usuario o correo existente'));
				return;
			}else{
				$cms_oracle = new cms_oracle();
				$oracle_user = $cms_oracle->consulta_cli(Array(
					'rut'	=> $_POST['rut_digito'],
					'dv'	=>$_POST['rut_verificador']
				));
				if(!$oracle_user){
					$wp_error->add('registro_usuario', __('Error de conexi&oacute;n'));
					return;
				}
				if($oracle_user[18]==="2"){
					/* USUARIO NUNCA REGISTRADO */
					$cms_oracle->registro($set);
				}
				
				$user_id = wp_create_user($user_name, $password, $user_email);
				if($user_id){
					$userdata = array (
						'ID' => $user_id, 
						'first_name' => $set['primer_nombre'],
						'last_name' => $set['apellido_paterno']." ".$set['apellido_materno'],
						'display_name' => $set['primer_nombre']." ".$set['apellido_paterno'],
						'rich_editing' => '',
						'jabber' => '',
						'aim' => '',
						'yim' => ''
					);
					if($password){
						$userdata = array_merge(array('user_pass' => $password), $userdata);
					}
					wp_update_user($userdata);
					
					//update_user_meta($user_id, 'avatar', $imagen);
					
					update_user_meta($user_id, 'primer_nombre', $set['primer_nombre']);
					update_user_meta($user_id, 'segundo_nombre', $set['segundo_nombre']);
					update_user_meta($user_id, 'apellido_paterno', $set['apellido_paterno']);
					update_user_meta($user_id, 'apellido_materno', $set['apellido_materno']);
					update_user_meta($user_id, 'fecha_nacimiento', $set['fecha_nacimiento']);
					update_user_meta($user_id, 'sexo', $set['sexo']);
					update_user_meta($user_id, 'calle', $set['calle']);
					update_user_meta($user_id, 'user_numero', $set['user_numero']);
					update_user_meta($user_id, 'depto', $set['depto']);
					update_user_meta($user_id, 'comuna', $set['comuna']);
					update_user_meta($user_id, 'provincia', $set['provincia']);
					update_user_meta($user_id, 'region', $set['region']);
					update_user_meta($user_id, 'telefono_fijo', $set['telefono_fijo']);
					update_user_meta($user_id, 'telefono_celular', $set['telefono_celular']);
					update_user_meta($user_id, 'estado_civil', $set['estado_civil']);
					update_user_meta($user_id, 'avatar', '');
					
					$creds = array();
					$creds['user_login'] = $user_name;
					$creds['user_password'] = $password;
					$creds['remember'] = true;
					$user = wp_signon($creds, false);
					$wp_error->add('registro_usuario', __('exito'));
					
					
					$message = body_message("Registro Salcobrand", "Hola ".$set['primer_nombre']." ".$set['apellido_paterno']." ".$set['apellido_materno'], ",Bienvenido a Farmacia Salcobrand");
					
					$headers = "From: Salcobrand" . "\r\n";
					wp_mail($user_email, 'Bienvenido Salcobrand', $message, $headers);
					
					//wp_redirect(get_bloginfo('wpurl')."/");					
				}
			}
		}
	}
}


if(!function_exists('validar_cadena')){
	function validar_cadena($texto,$permitidos){
		for ($i=0; $i<strlen($texto); $i++){
      		if (strpos($permitidos, substr($texto,$i,1))===false){
         		return false;
      		}
   		}
   		return true;		
	}
}

if(!function_exists('salco_modificar')){
	function salco_modificar(){
		global $wp_error, $current_user;
		get_currentuserinfo();
		if(isset($_POST)){
			
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
				$wp_error->add('registro_usuario', __('El campo email debe contener un email válido'));
			}
			
		if	($_POST['rut_digito']!="admin1"){
			if(validar_cadena($_POST['rut_digito'],'0123456789')!=true){
				$wp_error->add('registro_usuario', __('El campo rut debe contener sólo números'));
			}
		}
			if(validar_cadena($_POST['rut_verificador'],'0123456789kK')!=true){
				$wp_error->add('registro_usuario', __('El dígito verificador del rut debe contener sólo números o K'));
			}				
			
			
			if(($_POST['tel_particular'] != "") && (validar_cadena($_POST['tel_particular'],'0123456789')!=true)){
            	$wp_error->add('registro_usuario', __('El campo teléfono debe contener sólo números'));
			}
			
			if (($_POST['tel_celular'] != "") && (validar_cadena($_POST['tel_celular'],'0123456789')!=true)){
				$wp_error->add('registro_usuario', __('El campo teléfono debe contener sólo números'));	
			}
			
			
			if(!isset($_POST['nombre']) || $_POST['nombre']==""){
				$wp_error->add('registro_usuario', __('El campo nombre es obligatorio'));
			}
			if(!isset($_POST['segundo_nombre'])){
				$wp_error->add('registro_usuario', __('El campo segundo nombre es obligatorio'));
			}
			if(!isset($_POST['apellido_paterno']) || $_POST['apellido_paterno']==""){
				$wp_error->add('registro_usuario', __('El campo apellido paterno es obligatorio'));
			}
			if(!isset($_POST['apellido_materno']) || $_POST['apellido_materno']==""){
				$wp_error->add('registro_usuario', __('El campo apellido materno es obligatorio'));
			}
			if(!isset($_POST['estado_civil']) || $_POST['estado_civil']=="0"){
				$wp_error->add('registro_usuario', __('El campo estado civil es obligatorio'));
			}
			if(!isset($_POST['sexo'])){
				$wp_error->add('registro_usuario', __('El campo sexo es obligatorio'));
			}
			if(!isset($_POST['email']) || $_POST['email']==""){
				$wp_error->add('registro_usuario', __('El campo e-mail es obligatorio'));
			}
			if(!isset($_POST['fecha_de_nacimiento_dia']) || $_POST['fecha_de_nacimiento_dia']=="0"){
				$wp_error->add('registro_usuario', __('El campo d&iacute;a de nacimiento es obligatorio'));
			}
			if(!isset($_POST['fecha_de_nacimiento_mes']) || $_POST['fecha_de_nacimiento_mes']=="0"){
				$wp_error->add('registro_usuario', __('El campo mes de nacimiento es obligatorio'));
			}
			if(!isset($_POST['fecha_de_nacimiento_anio']) || $_POST['fecha_de_nacimiento_anio']=="0"){
				$wp_error->add('registro_usuario', __('El campo a&ntilde;o de nacimiento es obligatorio'));
			}
			if(!isset($_POST['region']) || $_POST['region']=="0"){
				$wp_error->add('registro_usuario', __('El campo regi&oacute;n es obligatorio'));
			}
			if(!isset($_POST['comuna']) || $_POST['comuna']=="0"){
				$wp_error->add('registro_usuario', __('El campo comuna es obligatorio'));
			}
			if(!isset($_POST['dir_calle']) || $_POST['dir_calle']==""){
				$wp_error->add('registro_usuario', __('El campo Av. Calle o Psje. es obligatorio'));
			}
			if(!isset($_POST['dir_numero']) || $_POST['dir_numero']==""){
				$wp_error->add('registro_usuario', __('El campo N&ordm; es obligatorio'));
			}
			if(!isset($_POST['dir_depto'])){
				$wp_error->add('registro_usuario', __('El campo N&ordm; de Block, Depto. es obligatorio'));
			}
			
			if(	($_POST['tel_particular'] == "") && ($_POST['tel_celular'] == "")){
              $wp_error->add('registro_usuario', __('Debes ingresar al menos un teléfono'));
			}
			/*
			if(!isset($_POST['tel_celular'])){
				$wp_error->add('registro_usuario', __('El campo tel&eacute;fono celular es obligatorio'));
			}
			*/
			if(!isset($_POST['password']) || $_POST['password'] == ""){
				$wp_error->add('registro_usuario', __('El campo contrase&ntilde;a es obligatorio'));
			}
			
			if(!isset($_POST['re_password'])){
				$wp_error->add('registro_usuario', __('El campo repetir contrase&ntilde;a es obligatorio'));
			}
			
			if($_POST['password'] != $_POST['re_password']){
				$wp_error->add('registro_usuario', __('La contrase&ntilde;a repetida no corresponde'));
			}
			$rut = explode("-", $current_user->user_login);
			$set = Array(
				'rut'				=> $rut[0],
				'DV'				=> $rut[1],
				'primer_nombre'		=> $_POST['nombre'],
				'segundo_nombre'	=> $_POST['segundo_nombre'],
				'apellido_paterno'	=> $_POST['apellido_paterno'],
				'apellido_materno'	=> $_POST['apellido_materno'],
				'fecha_nacimiento'	=> $_POST['fecha_de_nacimiento_dia']."-".$_POST['fecha_de_nacimiento_mes']."-".$_POST['fecha_de_nacimiento_anio'],
				'sexo'				=> $_POST['sexo'],
				'calle'				=> $_POST['dir_calle'],
				'user_numero'		=> $_POST['dir_numero'],
				'depto'				=> $_POST['dir_depto'],
				'comuna'			=> $_POST['comuna'],
				'provincia'			=> $_POST['provincia'],
				'region'			=> $_POST['region'],
				'telefono_fijo'		=> $_POST['tel_particular'],
				'telefono_celular'	=> $_POST['tel_celular'],
				'email'				=> $_POST['email'],
				'estado_civil'		=> $_POST['estado_civil'],
				'password'			=> $_POST['password'],
				/*'acepto'			=> (isset($_POST['acepto']) && $_POST['acepto']=="true")? "1" : "0"*/
				'acepto'			=> (isset($_POST['acepto']) && $_POST['acepto']=="true")? "1" : "0",
				'acepto_sms'		=> (isset($_POST['acepto_sms']) && $_POST['acepto_sms']=="true")? "1" : "0",
				
				
				
				
			);
			
			if(isset($wp_error->errors['registro_usuario'])){
				return;
			}
			$user_id = $current_user->ID;
						
			$user_name = $set['rut']."-".$set['DV'];
			$password = $set['password'];
			$user_email = $set['email'];
			
			$userdata = array (
				'ID' => $user_id, 
				'user_pass' => $password
			);
			wp_update_user($userdata);
			
			
			$cms_oracle = new cms_oracle();
			$cms_oracle->actualizar($set);
			
			
			

			
			update_user_meta($user_id, 'primer_nombre', $set['primer_nombre'], $current_user->primer_nombre);
			update_user_meta($user_id, 'segundo_nombre', $set['segundo_nombre'], $current_user->segundo_nombre);
			update_user_meta($user_id, 'apellido_paterno', $set['apellido_paterno'], $current_user->apellido_paterno);
			update_user_meta($user_id, 'apellido_materno', $set['apellido_materno'], $current_user->apellido_materno);
			update_user_meta($user_id, 'fecha_nacimiento', $set['fecha_nacimiento'], $current_user->fecha_nacimiento);
			update_user_meta($user_id, 'sexo', $set['sexo'], $current_user->sexo);
			update_user_meta($user_id, 'calle', $set['calle'], $current_user->calle);
			update_user_meta($user_id, 'user_numero', $set['user_numero'], $current_user->user_numero);
			update_user_meta($user_id, 'depto', $set['depto'], $current_user->depto);
			update_user_meta($user_id, 'comuna', $set['comuna'], $current_user->comuna);
			update_user_meta($user_id, 'provincia', $set['provincia'], $current_user->provincia);
			update_user_meta($user_id, 'region', $set['region'], $current_user->region);
			update_user_meta($user_id, 'telefono_fijo', $set['telefono_fijo'], $current_user->telefono_fijo);
			update_user_meta($user_id, 'telefono_celular', $set['telefono_celular'], $current_user->telefono_celular);
			update_user_meta($user_id, 'estado_civil', $set['estado_civil'], $current_user->estado_civil);
			
			

			
			
			
			
			
			$wp_error->add('registro_usuario', __('exito'));
		}
	}
}
if(!function_exists('status_registro')){
function status_registro(){
	global $wp_error;
	if(isset($wp_error->errors['registro_usuario'])){
		return $wp_error->errors['registro_usuario'][0];
	}
	return false;
}
}
if(!function_exists('get_dias')){
	function get_dias(){
		return Array(
			1,2,3,4,5,6,7,8,9,10,
			11,12,13,14,15,16,17,18,19,20,
			21,22,23,24,25,26,27,28,29,30,31
		);
	}
}
if(!function_exists('get_meses')){
	function get_meses(){
		return Array(
			"JAN" => "enero",
			"FEB" => "febrero",
			"MAR" => "marzo",
			"APR" => "abril",
			"MAY" => "mayo",
			"JUN" => "junio",
			"JUL" => "julio",
			"AUG" => "agosto",
			"SEP" => "septiembre",
			"OCT" => "octubre",
			"NOV" => "noviembre",
			"DEC" => "diciembre"
		);
	}
}
if(!function_exists('get_anios')){
	function get_anios(){
		return Array(
			2011,2010,
			2009,2008,2007,2006,2005,2004,2003,2002,2001,2000,1999,1998,1997,1996,1995,1994,1993,1992,1991,1990,
			1989,1988,1987,1986,1985,1984,1983,1982,1981,1980,1979,1978,1977,1976,1975,1974,1973,1972,1971,1970,
			1969,1968,1967,1966,1965,1964,1963,1962,1961,1960,1959,1958,1957,1956,1955,1954,1953,1952,1951,1950,
			1949,1948,1947,1946,1945,1944,1943,1942,1941,1940,1939,1938,1937,1936,1935,1934,1933,1932,1931,1930,
			1929,1928,1927,1926,1925,1924,1923,1922,1921,1920,1919,1918,1917,1916,1915,1914,1913,1912,1911,1910,
			1909,1908,1907,1906,1905,1904,1903,1902,1901,1900
		);
	}
}
if(!function_exists('body_message')){
	function body_message($title="Salcobrand", $msj_title="", $msj_body=""){
		$html = '';
		$html .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$html .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$html .= '<head>';
		$html .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$html .= '<title>'.$title.'</title>';
		$html .= '</head>';
		$html .= '<body style="background:#CCC; margin:0px;">';
			$html .= '<div id="wrap" style="width:550px; margin:0 auto;">';
				$html .= '<div id="header" style="width:550px; height:109px; background:url('.URL_THEME.'/images/email_header.png);"></div>';
				$html .= '<div id="content" style="width:510px; background:#FFFFFF; padding:20px;">';
					$html .= '<h1 style="font-family:Arial; font-size:18px; font-weight:normal; color:#23B7E7;">'.$msj_title.'</h1>';
	            	$html .= '<p style="font-family:Arial; font-size:12px; font-weight:normal; color:#999999;">'.$msj_body.'</p>';
	        	$html .= '</div>';
	        	$html .= '<div id="footer" style="width:550px; height:48px; background:url('.URL_THEME.'/images/email_footer.png);"></div>';
			$html .= '</div>';
		$html .= '</body>';
		$html .= '</html>';
		return $html;
	}
}



/*
* 
* FORM ASOCIADO
* 
*/
if(!function_exists('salco_asociado')){
	function salco_asociado(){
		global $wp_error;
		global $wpdb;
		$por_page = 10;
		$region_id = "";
		if(isset($_GET['region_id']) && $_GET['region_id'] != "0"){
			$region_id = $_GET['region_id'];
		}
		$comuna_id = "";
		if(isset($_GET['comuna_id']) && $_GET['comuna_id'] != "0"){
			$comuna_id = $_GET['comuna_id'];
		}
		$rubro_id = "";
		if(isset($_GET['rubro_id']) && $_GET['rubro_id'] != "0"){
			$rubro_id = $_GET['rubro_id'];
		}
		$page = "0";
		if(isset($_GET['page']) && $_GET['page'] != "0"){
			$page = $_GET['page'];
		}
		if($comuna_id == "" || $rubro_id == ""){
			$query = "SELECT * FROM ".$wpdb->prefix."asociados ORDER BY RAND() LIMIT 10";
		}else{
			$query = "SELECT * FROM ".$wpdb->prefix."asociados WHERE comuna='$comuna_id' AND rubro='$rubro_id'";
		}
		//echo $query;
		//echo "SELECT * FROM ".$wpdb->prefix."asociados WHERE comuna='$comuna_id' AND rubro='$rubro_id'";
		$total = $wpdb->get_results($wpdb->prepare($query));
		$pages = ceil(count($total)/$por_page);
		$post_ini = $por_page*($page-1);
		
		
		$key = $wpdb->get_results($wpdb->prepare($query));
		
		if(count($key)){
			return Array($key, $pages, $page);
		}else{
			return Array(Array(), 0, 0);
		}
	}
}
if(!function_exists('salco_asociado_rubros')){
	function salco_asociado_rubros(){
		global $wpdb;
		$key = $wpdb->get_results($wpdb->prepare("SELECT rubro FROM ".$wpdb->prefix."asociados GROUP BY rubro ORDER BY rubro ASC"));
		if(count($key)){
			return $key;
		}else{
			return Array();
		}
	}
}
if(!function_exists('salco_asociado_comuna')){
	function salco_asociado_comuna(){
		global $wpdb;
		$key = $wpdb->get_results($wpdb->prepare("SELECT comuna FROM ".$wpdb->prefix."asociados GROUP BY comuna ORDER BY comuna ASC"));
		if(count($key)){
			return $key;
		}else{
			return Array();
		}
	}
}
if(!function_exists('salco_asociado_region')){
	function salco_asociado_region(){
		global $wpdb;
		$key = $wpdb->get_results($wpdb->prepare("SELECT region FROM ".$wpdb->prefix."asociados GROUP BY region ORDER BY region ASC"));
		if(count($key)){
			return $key;
		}else{
			return Array();
		}
	}
}


if(!function_exists('salco_despacho_domicilio')){
	function salco_despacho_domicilio(){
		global $wpdb;
		global $wp_error;
		if(isset($_POST)){
			
			
			if	($_POST['rut']!="admin1"){
				if(validar_cadena($_POST['rut'],'0123456789')!=true){
					$wp_error->add('registro_usuario', __('El campo rut debe contener sólo números'));
				}
				if(validar_cadena($_POST['dv'],'0123456789kK')!=true){
				$wp_error->add('registro_usuario', __('El dígito verificador del rut debe contener sólo números o K'));
				}	
				
			}
			if(validar_cadena($_POST['numero'],'0123456789')!=true){
				$wp_error->add('registro_usuario', __('El campo número debe contener sólo números'));
			}
			
			if(!isset($_POST['nombre']) || $_POST['nombre']==""){
				$wp_error->add('despacho_domicilio', __('El campo nombre es obligatorio'));
			}
			if(!isset($_POST['apellido']) || $_POST['apellido']==""){
				$wp_error->add('despacho_domicilio', __('El campo apellido es obligatorio'));
			}
			if(!isset($_POST['telefono1']) || $_POST['telefono1']==""){
				$wp_error->add('despacho_domicilio', __('El campo teléfono1 es obligatorio'));
			}
			if(!isset($_POST['rut']) || $_POST['rut']=="" || !isset($_POST['dv']) || $_POST['dv']==""){
				$wp_error->add('despacho_domicilio', __('El campo rut es obligatorio'));
			}
			if(!isset($_POST['calle']) || $_POST['calle']==""){
				$wp_error->add('despacho_domicilio', __('El campo calle es obligatorio'));
			}
			if(!isset($_POST['numero']) || $_POST['numero']==""){
				$wp_error->add('despacho_domicilio', __('El campo número es obligatorio'));
			}
			if(!isset($_POST['region']) || $_POST['region']=="0"){
				$wp_error->add('despacho_domicilio', __('El campo región es obligatorio'));
			}
			if(!isset($_POST['comuna']) || $_POST['comuna']=="0"){
				$wp_error->add('despacho_domicilio', __('El campo comuna es obligatorio'));
			}
			/*if(!isset($_POST['forma_de_pago']) || $_POST['forma_de_pago']=="0"){
				$wp_error->add('despacho_domicilio', __('El campo forma_de_pago es obligatorio'));
			}*/
			$productos_cantidad = Array();
			for($i=1; $i<=10; $i++){
				if(isset($_POST["producto_$i"]) && isset($_POST["cantidad_$i"]) && $_POST["producto_$i"] != "" && $_POST["cantidad_$i"] != ""){
					array_push($productos_cantidad, Array(
						'producto' => $_POST["producto_$i"],
						'cantidad' => $_POST["cantidad_$i"]
					));
				}
			}
			if(count($productos_cantidad)==0){
				$wp_error->add('despacho_domicilio', __('Los campos producto y cantidad son obligatorios'));
			}
		}
		if(isset($wp_error->errors['despacho_domicilio'])){
			return;
		}
		$set = Array(
			'rut'				=> $_POST['rut'],
			'dv'				=> $_POST['dv'],
			'nombre'			=> $_POST['nombre'],
			'apellido'			=> $_POST['apellido'],
			'telefono1'			=> $_POST['telefono1'],
			'telefono2'			=> $_POST['telefono2'],
			'calle'				=> $_POST['calle'],
			'numero'			=> $_POST['numero'],
			'depto'				=> $_POST['depto'],
			'region'			=> $_POST['region'],
			'comuna'			=> $_POST['comuna'],
			'forma_de_pago'		=> $_POST['forma_de_pago'],
			'dd_email'			=> (isset($_POST['dd_email']))? $_POST['dd_email'] : "0",
			'dd_sms'			=> (isset($_POST['dd_sms']))? $_POST['dd_email'] : "0",
			'productos'			=> $productos_cantidad
		);
		$cms_oracle = new cms_oracle();
		//$cms_oracle->getPedido($set);
		$return = $cms_oracle->generaPedidoCliente($set);
		if($return[1] == "00"){
			$wp_error->add('despacho_domicilio', __('exito'));
		}
		return;
		
	}
}

if(!function_exists('recoge_puntos')){
	function recoge_puntos(){	
		$cms_oracle = new cms_oracle();
		$rut[0] 	= "17069852";
		return $cms_oracle->getPuntos(Array('rut' => $rut[0]));
	}
}



if(!function_exists('recoge_cupon')){
	function recoge_cupon(){	
		$cms_oracle = new cms_oracle();
		$rut[0] 	= "17069852";
		$rut[1] 	= "5";
		return $cms_oracle->getCupon(Array('rut' => $rut[0],'dv' => $rut[1]));
	}
}


if(!function_exists('status_despacho_domicilio')){
	function status_despacho_domicilio(){
		global $wp_error;
		if(isset($wp_error->errors['despacho_domicilio'])){
			return $wp_error->errors['despacho_domicilio'][0];
		}
		return false;
	}
}
?>