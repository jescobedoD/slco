<script type="text/javascript" src="<?php echo URL_THEME;?>/js/jquery-1.10.2.min.js"></script>
<script>
  jQuery(document).ready(function(){
    $( "#contenido" ).load( "<?php echo URL_THEME; ?>/vademecum/INDICES/INDINT.HTM", function() {
    });
    
  });
 
 <?php

 	function Reemplazar($texto){ 
	    return str_replace("º","&deg;", str_replace(chr(13),"<br>", str_replace("'", "&#39", 
	    str_replace("ñ", "&ntilde;", str_replace("Ñ", "&Ntilde;", str_replace("à", "&agrave;", str_replace("á", "&aacute;", 
	    str_replace("À", "&Agrave;", str_replace("Á", "&Aacute;", str_replace("é", "&eacute;", str_replace("è", "&egrave;", 
	    str_replace("È", "&Egrave;", str_replace("É", "&Eacute;", str_replace("í", "&iacute;", str_replace("Í", "&Iacute;", 
	    str_replace("ó", "&oacute;", str_replace("ò", "&ograve;", str_replace("Ó", "&Oacute;", str_replace("Ò", "&Ograve;", 
	    str_replace("ú", "&uacute;", str_replace("Ú", "&Uacute;", str_replace("ü", "&uuml;", str_replace("'", "`", 
	    str_replace('"', "`", str_replace("ç", "&ccedil;", str_replace("Ç", "&Ccedil;", str_replace("¿", "&iquest;", 
	    str_replace("¡", "&iexcl;", str_replace("º", "&deg;", $texto))))))))))))))))))))))))))))); 
	}  


 ?>

  
</script>

          <div class="titulo-busqueda"><p>Listado de Interacciones</p></div>
          <div id="contenido" name="destino">
          
          </div>
          
          

