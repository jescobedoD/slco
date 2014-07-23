<?php
/**
 * @package Salcobrand
 * @subpackage salco_theme
 * @since Salcobrand 1.0
 */
?>
<?php get_header(); ?>
<!-- SIDEBAR -->
<div id="sidebar">
	<?php get_template_part('content_sidebar_login', get_post_format());?>
	<?php get_template_part('content_sub_noticias', get_post_format());?>
	<?php get_template_part('content_menu_izq', get_post_format());?>
	<?php get_template_part('content_banner_sidebar', get_post_format());?>
</div>
<!-- END SIDEBAR -->
<!-- APLICACIONES -->
<div id="aplicaciones">
	<?php get_template_part('content_breadcums', get_post_format());?>
	<div id="seccion_titulo"><?php wp_title('', true, 'right');?></div>
	<!-- APLICACIONES TABS -->
            
            <script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery(".app_tab").hide();
				jQuery("ul.aplicaciones_nav li:first").addClass("active").show();
				jQuery(".app_tab:first").show();
				jQuery("ul.aplicaciones_nav li").click(function() {
					jQuery("ul.aplicaciones_nav li").removeClass("active");
					jQuery(this).addClass("active");
					jQuery(".app_tab").hide();

					var activeTab = jQuery(this).find("a").attr("href");
					jQuery(activeTab).fadeIn();
					return false;
				});
			});
			function calcularIMC() {
				var wt = jQuery("#form_masa input[name='peso']").val();
				var ht = jQuery("#form_masa input[name='estatura']").val();
				if(wt=="" || isNaN(wt)){
					alert('Ingrese un valor para el Peso. Use el simbolo "." (punto) para numeros decimales.');
					return false;
				}
				if(ht == "" || isNaN(ht) || /\./.test(ht)){
					alert('Ingrese un valor entero para la Estatura. No use los simbolos "." (punto) ni "," (coma)');
					return false;
				}
				var h = ht/100;
				var imc = Math.round((wt/(h*h))*100)/100;
				jQuery(".form_masa_res .form_masa_res_a").html("<span>Tu Masa corporal es de: "+imc+"</span>");
				if(imc<20){
					jQuery(".form_masa_res .form_masa_res_b").html("<span>Bajo Peso</span>");
        		}else if(imc >= 20 && imc < 25){
					jQuery(".form_masa_res .form_masa_res_b").html("<span>Normal</span>");
				}else if(imc >= 25 && imc < 27.6){
					jQuery(".form_masa_res .form_masa_res_b").html("<span>Sobrepeso</span>");
				}else if(imc>27.6 && imc <= 30){
					jQuery(".form_masa_res .form_masa_res_b").html("<span>Obesidad Leve</span>");
				}else if(imc>30 && imc <= 40){
					jQuery(".form_masa_res .form_masa_res_b").html("<span>Obesidad Moderada</span>");
				}else if(imc>40){
					jQuery(".form_masa_res .form_masa_res_b").html("<span>Obesidad Severa</span>");
				}
				jQuery(".form_masa_res").show();
				return false;
			}
			jQuery(document).ready(function(){
				if(jQuery(".aplicaciones_nav li").size() == 1){
					jQuery(".aplicaciones_nav").hide();
				}
			});
			
			</script>
            <div id="aplicaciones_tabs">

            	<ul class="aplicaciones_nav">
                	<li><a href="#tab1"><span>Calcula<br />tu IMC</span></a></li>
                    <!--<li><a href="#tab2"><span>Calcula<br />tu peso ideal</span></a></li>
                    <li><a href="#tab3"><span>Calcula<br />tu peso ideal</span></a></li>
                    <li><a href="#tab4"><span>Calcula<br />tu peso ideal</span></a></li>
                    <li><a href="#tab5"><span>Calcula<br />tu peso ideal</span></a></li>-->
                </ul>

            	<div id="tab1" class="app_tab">
                	<img src="<?php echo URL_THEME;?>/images/app_tab_01.png" width="195" height="293" title="IMC" />
                    <div class="app_form_masa">
                    <h1>Calcula tu &Iacute;ndice de masa corporal</h1>
                    <p>Para conocer tu &iacute;ndice de masa corporal, te ofrecemos a continuaci&oacute;n una sencilla aplicaci&oacute;n que proporciona el valor seg&uacute;n los par&aacute;metros de peso y estatura de cada individuo. Por favor, para que los resultados sean v&aacute;lidos es importante que tus datos sean reales. El &iacute;ndice &oacute;ptimo de masa corporal est&aacute; entre 21 y 24 unidades.</p>
                    	<form id="form_masa" action="?" onsubmit="return calcularIMC();">
                        	<div class="form_masa_peso">
                            	<span>Peso (k)</span>
                                <input type="text" name="peso" value="<?php echo (isset($_GET['peso']))? (float)$_GET['peso'] : "";?>" />
                            </div>
                            <div class="form_masa_peso">
                            	<span>Estatura (m)</span>
                                <input type="text" name="estatura" value="<?php echo (isset($_GET['estatura']))? (float)$_GET['estatura'] : "";?>" />
                            </div>
                            <div class="form_masa_calc">
                            	<input type="submit" class="form_masa_btn" value="" />
                            </div>
                        </form>
                        <div class="form_masa_res" style="display:none;">
                            <div class="form_masa_res_a"></div>
							<div class="form_masa_res_b"></div>
						</div>
                    </div>
                </div>
                <!--
                <div id="tab2" class="app_tab">
                test
                </div>
                <div id="tab3" class="app_tab">
                test
                </div>
                <div id="tab4" class="app_tab">
                test
                </div>
                <div id="tab5" class="app_tab">
                test
                </div>-->
                
            </div>
            
            <!-- END APLICACIONES TABS -->
		</div>
        <!-- END APLICACIONES -->
<?php get_footer(); ?>