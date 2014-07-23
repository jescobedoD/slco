  <link rel="stylesheet" href="<?php echo URL_THEME;?>/css/normalize.css">
  <link rel="stylesheet" href="<?php echo URL_THEME;?>/css/estilos.css">
  
    <!--[if IE]>
      <style type="text/css">
        @import ("<?php echo URL_THEME;?>/css/ie.css");
      </style>
    <![endif]-->

<SCRIPT LANGUAGE="JavaScript">

<!-- Begin
function loadFrames(frame1,page1,frame2,page2) {
eval("parent."+frame1+".location='"+page1+"'");
eval("parent."+frame2+".location='"+page2+"'");
}
// End -->

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


  <div class="content-meds">

      <nav>
          <ul>
              <li><a href="index.html">PRODUCTOS</a></li>
              <li><a href="drogas.html">DROGAS</a></li>
              <li><a href="javascript:loadFrames('menu', 'LABORATO.HTM', 'manual', 'F_LABORA.HTM')">LABORATORIOS</a></li>
              <li><a href="javascript:loadFrames('menu', 'ACCIONES.HTM', 'manual', 'F_ACCION.HTM')">ACCIONES</a></li>
              <li><a href="interacciones.html">INTERACCIONES</a></li>
              <li class="last"><a href="javascript:loadFrames('menu', 'ONLINE.HTM', 'manual', 'vademecum/INDICES/NOVEDAD.HTM')">ONLINE</a></li><br class="limpiar">
          </ul>
      </nav>
      
      <div class="banner">
          <img src="<?php echo URL_THEME;?>/images/banner-medicamentos.jpg">
          <p class="txt-banner"><span class="lupa"></span><span>A continuación puedes buscar por:</span></p>
          <p id="clickayuda" class="ayuda" data-toggle="clickover"  data-placement="top" data-title ="¿CÓMO REALIZO UNA BÚSQUEDA?" ><span class="pregunta"></span>¿Necesitas ayuda?</p>
      </div>
      
      <div class="row">
          <div class="col-md-4">
              <p>Nombre o Componente</p>
          </div>
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
              <p>Indice Alfabético</p>
          </div>
          <form role="form" method="post">
              <div class="col-md-8">
                  <script>
                    (function() {
                      var cx = '013996852336361137773:zdgacrocsfe';
                      var gcse = document.createElement('script');
                      gcse.type = 'text/javascript';
                      gcse.async = true;
                      gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                          '//www.google.com/cse/cse.js?cx=' + cx;
                      var s = document.getElementsByTagName('script')[0];
                      s.parentNode.insertBefore(gcse, s);
                    })();
                  </script>
                  <gcse:searchbox>
              </div>
              <div class="col-md-4-select">
                  <select class="form-control" id="location" onchange="setIframeSource()">
                      <option>SELECCIONE UNA OPCIÓN</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPA.HTM" >A</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPB.HTM" >B</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPC.HTM" >C</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPD.HTM" >D</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPE.HTM" >E</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPF.HTM" >F</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPG.HTM" >G</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPH.HTM" >H</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPI.HTM" >I</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPJ.HTM" >J</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPK.HTM" >K</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPL.HTM" >L</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPM.HTM" >M</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPN.HTM" >N</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPO.HTM" >O</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPP.HTM" >P</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPQ.HTM" >Q</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPR.HTM" >R</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPS.HTM" >S</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPT.HTM" >T</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPU.HTM" >U</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPV.HTM" >V</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPW.HTM" >W</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPX.HTM" >X</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPY.HTM" >Y</option>
                      <option value="<?php echo URL_THEME;?>/vademecum/INDICES/INDESPZ.HTM" >Z</option>
                  </select>
              </div><br class="limpiar">
              <br class="limpiar">
          </form>
      </div>
      
      <div class="row resultado-busqueda" id="resultadoabcd"  style="display:none;">
          <div class="titulo-busqueda"><p>Resultados de la búsqueda por nombre</p></div>
          <div id="destino" name="destino">
          
          </div>
          
          

      </div>
      <div class="resulatdo-gs">
        <gcse:searchresults>
      </div>
  </div>
  
<script type="text/javascript" src="<?php echo URL_THEME;?>/js/jquery-1.10.2.min.js"></script>
  <script src="<?php echo URL_THEME;?>/js/bootstrap.min.js"></script>
  <script src="<?php echo URL_THEME;?>/js/docs.min.js"></script>
  <script>
       var elem = '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>'+
        '<a id="close-popover" data-toggle="clickover" class="btn btn-small pull-right"     onclick="$(&quot;#clickayuda&quot;).popover(&quot;hide&quot;);"><img src="<?php echo URL_THEME;?>/images/tooltip-close.png"></a>';



        $('#clickayuda').popover({animation:true, content:elem, html:true});
  </script>