<!-- LOGIN -->
<?php if(isset($_GET['olvidaste'])){?>
	<div id="login" class="login_recuperar_bgr">
		<div id="login_titulo_recuperar">
			<p>Bienvenido <br />
			<span>a Salcobrand</span></p>
		</div>
		<!-- LOGIN RECUPERAR -->
		<div id="login_recuperar">
			<span>Si deseas recuperar tu clave,<br />s&oacute;lo debes ingresar tu RUT.</span>
			<form id="form_login_recuperar" method="post" action="<?php echo esc_url(home_url("/?olvidaste"));?>">
				<input type="text" class="rut" value="RUT usuario (xxxxxxx-x)" onfocus="if(this.value=='RUT usuario (xxxxxxx-x)')this.value=''" onblur="if(this.value=='')this.value='RUT usuario (xxxxxxx-x)'" name="rut" />
				<input type="hidden" name="cms_salco" value="recuperar"/>
				<input type="submit" class="enviar" value="Enviar" />
			</form>
		</div>
		<!-- END LOGIN RECUPERAR -->
	</div>
	<?php if(salco_error_recuperar()){?>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("#alerta_wrap .alerta_close").click(function(){
				jQuery("#alerta_wrap").hide();
				return false;
			});
			jQuery("#alerta_wrap h1").html("&igrave;Atenci&oacute;n!");
			jQuery("#alerta_wrap p").html("<?php echo salco_error_recuperar();?>");
			jQuery("#alerta_wrap").show();
		});
	</script>
	<?php }?>
<?php }else if(current_user_can('level_0')):?>
   	<div id="login" class="login_on_bgr">
       	<div id="login_titulo_on">
           	<p>Bienvenido<br /><span>a Salcobrand</span></p>
		</div>
		<div id="login_av">
			<?php salco_get_avatar("78");?>
		</div>
		<div id="login_name">
			<span><?php salco_get_display_name();?></span>
		</div>
		<div id="login_actualiza">
			<a href="<?php echo esc_url(home_url("/perfil"));?>">Actualiza tus datos aqu&iacute;</a>
		</div>
		<!--
		<div id="login_promo">
			<a href="<?php echo esc_url(home_url("/category/promociones"));?>"></a>
		</div>
		-->
		<div id="login_logout">
			<a href="<?php echo wp_logout_url(esc_url(home_url("/"))); ?>"></a>
		</div>
	</div>
<?php else:?>
	<div id="login" class="login_off_bgr">
		<div id="login_titulo">
			<p>Bienvenido<br/><span>a Salcobrand</span></p>
		</div>
		<form id="login_form" action="<?php echo esc_url(home_url("/")); ?>" method="post">
			<input type="text" name="usuario" class="usuario" id="usuario" value="RUT usuario (xxxxxxx-x)" size="20" onfocus="if(this.value=='RUT usuario (xxxxxxx-x)')this.value=''" onblur="if(this.value=='')this.value='RUT usuario (xxxxxxx-x)'" />
			
			<input class="pass" type="password" id="pass" name="pass" style="display:none;" class="login-user box_login" value="" onfocus="" onclick="" onblur="if(this.value==''){jQuery('#pass_fake').css('display','block');jQuery(this).css('display','none');}"/>
			<input class="pass" type="text" id="pass_fake" name="pwd_fake" class="login-user box_login" value="Contrase&ntilde;a" onfocus="jQuery(this).css('display','none');jQuery('#pass').css('display','block');jQuery('#pass').focus();" onclick="jQuery(this).css('display','none');jQuery('#pass').css('display','block');jQuery('#pass').focus();" onblur=""/>
			
			<a href="<?php echo esc_url(home_url("/?olvidaste"));?>" class="olvidaste">&iquest;Olvidaste tu clave?</a>
			<!--<a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword">Recover password</a>-->
			<input type="submit" name="submit" value="Enviar" class="enviar" />
			<input name="rememberme" id="rememberme" type="checkbox" value="forever" style="display:none;" />
			<input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url("/")); ?>" />
			<input type="hidden" name="cms_salco" value="login" />
			<a href="<?php echo esc_url(home_url("/registrate"));?>" class="registrarse">Regístrate</a>
		</form>
	</div>
	<?php if(salco_error_login()){?>
		<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("#alerta_wrap .alerta_close").click(function(){
				jQuery("#alerta_wrap").hide();
				return false;
			});
			jQuery("#alerta_wrap h1").html("&igrave;Atenci&oacute;n!");
			jQuery("#alerta_wrap p").html("<?php echo salco_error_login();?>");
			jQuery("#alerta_wrap").show();
		});
		</script>
	<?php }?>
<?php endif;?>
<!-- END LOGIN -->