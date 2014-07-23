<script type="text/javascript" src="<?php echo URL_THEME;?>/js/jquery-1.10.2.min.js"></script>
<script>
  jQuery(document).ready(function(){
    $( "#contenido" ).load( "<?php echo URL_THEME; ?>/vademecum/INDICES/INDLAB.HTM", function() {
    });
    
  });
  jQuery("#contenido table tbody tr td a").click(function(){
	   $("#contenido").load("<?php echo URL_THEME; ?>/vademecum/INDICES/LABS/L55.HTM");
	});

  
</script>

          <div class="titulo-busqueda"><p>Listado de Laboratorios</p></div>
          <div id="contenido" name="destino">
          
          </div>
          
          

