<?php

/**
 * @package Salcobrand
 * @subpackage salco_theme
 * @since Salcobrand 1.0
 */
?>

  

<?php get_header(); ?>


<link rel="stylesheet" href="<?php echo URL_THEME;?>/css/normalize.css">
<link rel="stylesheet" href="<?php echo URL_THEME;?>/css/estilos.css">

<!-- SIDEBAR -->
<div id="sidebar">
	<?php get_template_part('content_sidebar_login', get_post_format());?>
	<?php get_template_part('content_sub_perfil', get_post_format());?>
	<?php get_template_part('content_menu_izq', get_post_format());?>
	<?php get_template_part('content_banner_sidebar', get_post_format());?>
</div>
<!-- END SIDEBAR -->
<!-- REGISTRO -->
<div id="registro">
	<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
	<?php
	global $current_user;
	get_currentuserinfo();
	?>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.form_r_ubi').customStyle({width:227});
		jQuery('.form_r_fecha_dia').customStyle({width:60});
		jQuery('.form_r_fecha_mes').customStyle({width:90});
		jQuery('.form_r_fecha_year').customStyle({width:70});
		jQuery('.form_r_estado').customStyle({width:227});
	});
	</script>
    
    
<script type="text/javascript">
function checkKey(e,codigo) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    te = String.fromCharCode(tecla);
    
	switch(codigo)
	{
	case 1:
		patron 	=/[1234567890]/;
  		if (!patron.test(te)) {
      		return false;
    	}
  	break;
	case 2:
  		patron 	=/[1234567890kK]/;
  		if (!patron.test(te)) {
      		return false;
    	}
  	break;
	
	default:
		patron 	=/[1234567890]/;
  		if (!patron.test(te)) {
      		return false;
    	}
	}
	
} 
</script>
<script type='text/javascript'>
function setIframeSource() {
     document.getElementById("resultadoabcd").style.display="block";
     var theSelect = document.getElementById('location');
     var theUrl;
      
     theUrl = theSelect.options[theSelect.selectedIndex].value;
     $( "#destino" ).load( theUrl );
}

</script>
<script type='text/javascript'>
    $(document).ready(function() {
        $('#contenido table tbody tr td font font a').click(function () {
            var url = $(this).attr('rel');
            $( "#destino" ).load( url );
        });
    });
</script>    

    <div class="content-meds">

      <nav>
          <ul>
              <li><a href="?item=productos">PRODUCTOS</a></li>
              <li><a href="?item=drogas">DROGAS</a></li>
              <li><a href="?item=laboratorios">LABORATORIOS</a></li>
              <li><a href="?item=acciones">ACCIONES</a></li>
              <li><a href="?item=interacciones">INTERACCIONES</a></li>
              <li class="last"><a href="?item=online">ONLINE</a></li><br class="limpiar">
          </ul>
      </nav>
      
      <div class="banner">
          <img src="<?php echo URL_THEME;?>/images/banner-medicamentos.jpg">
          <p class="txt-banner"><span class="lupa"></span><span>A continuación puedes buscar por:</span></p>
          <p id="clickayuda" class="ayuda" data-toggle="clickover"  data-placement="top" data-title ="¿CÓMO REALIZO UNA BÚSQUEDA?" ><span class="pregunta"></span>¿Necesitas ayuda?</p>
      </div>
      
      <?php
		if ( isset($_GET['item']) && $_GET['item']=="productos") {
		    include('vademecum-productos.php');
		} elseif ( isset($_GET['item']) && $_GET['item']=="drogas") {
		    include('vademecum-drogas.php');
		} elseif ( isset($_GET['item']) && $_GET['item']=="laboratorios") {
		    include('vademecum-laboratorios.php');
		} elseif ( isset($_GET['item']) && $_GET['item']=="acciones") {
		    include('vademecum-acciones.php');
		} elseif ( isset($_GET['item']) && $_GET['item']=="interacciones") {
		    include('vademecum-interacciones.php');
		} elseif ( isset($_GET['item']) && $_GET['item']=="online") {
		    include('vademecum-online.php');    
		} else {
		    include('vademecum-productos.php');
		}
      ?>

      <div class="row resultado-busqueda" id="resultadoabcd"  style="display:none;">
          <div class="titulo-busqueda"><p>Resultados de la búsqueda por abecedario</p></div>
          <div id="destino" name="destino">
          
          </div>
          
          

      </div>
      
      <div class="resulatdo-gs">
        <gcse:searchresults>
      </div>
  </div>
	
</div>
<!-- END REGISTRO -->
<div id="vitrina_grad"></div>
<?php get_template_part('content_destacados_long', get_post_format());?>
<?php get_footer(); ?>
  
  <script src="<?php echo URL_THEME;?>/js/bootstrap.min.js"></script>
  <script src="<?php echo URL_THEME;?>/js/docs.min.js"></script>
  <script>
       var elem = '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>'+
        '<a id="close-popover" data-toggle="clickover" class="btn btn-small pull-right"     onclick="$(&quot;#clickayuda&quot;).popover(&quot;hide&quot;);"><img src="<?php echo URL_THEME;?>/images/tooltip-close.png"></a>';



        $('#clickayuda').popover({animation:true, content:elem, html:true});
  </script>