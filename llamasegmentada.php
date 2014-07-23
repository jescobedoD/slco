
<?
$p_rut="13541563";
$p_dv="1";

$dbProd  = "(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=172.20.1.153)(PORT = 1521)))(CONNECT_DATA =(SID=PRODSBF)))";
$conProd = OCILogon('puntos','puntos',$dbProd) or die("Ocurrio un error de coneccion");

	
	$p_cod_error="";
    $p_glosa_error="";
	


$query = "begin adm_comunidadsb_pkg.recupera_segmentada4($p_rut,'$p_dv',														:l_lin1,:l_lin2,:l_lin3,:l_cupon1,:l_fec_ven1,:l_lin1_b,:l_lin2_b,:l_lin3_b,:l_cupon2,:l_fec_ven2,:l_lin1_c,:l_lin2_c,:l_lin3_c,:l_cupon3,:l_fec_ven3,:l_lin1_d,:l_lin2_d,:l_lin3_d,:l_cupon4,:l_fec_ven4,:l_Codigo_error,:l_Msg_error); end;"; 

		$stmt = OCIParse($conProd, $query) or die ('Ocurrio un problema a ejecutar : '.$query);

		OCIBindByName($stmt,":l_lin1" ,$l_lin1, 250)   or die   ('Can not bind variable'); 
		OCIBindByName($stmt,":l_lin2" ,$l_lin2, 650)   or die   ('Can not bind variable'); 
		OCIBindByName($stmt,":l_lin3" ,$l_lin3, 500)   or die   ('Can not bind variable'); 
		OCIBindByName($stmt,":l_cupon1" ,$l_cupon1, 250)   or die   ('Can not bind variable'); 		
		OCIBindByName($stmt,":l_fec_ven1" ,$l_fec_ven1, 250)   or die   ('Can not bind variable'); 		
		OCIBindByName($stmt,":l_lin1_b" ,$l_lin1_b, 250)   or die   ('Can not bind variable'); 		
		OCIBindByName($stmt,":l_lin2_b" ,$l_lin2_b, 250)   or die   ('Can not bind variable'); 		
		OCIBindByName($stmt,":l_lin3_b" ,$l_lin3_b, 250)   or die   ('Can not bind variable');
		OCIBindByName($stmt,":l_cupon2" ,$l_cupon2, 250)   or die   ('Can not bind variable'); 				
		OCIBindByName($stmt,":l_fec_ven2" ,$l_fec_ven2, 250)   or die   ('Can not bind variable'); 
		OCIBindByName($stmt,":l_lin1_c" ,$l_lin1_c, 250)   or die   ('Can not bind variable'); 
		OCIBindByName($stmt,":l_lin2_c" ,$l_lin2_c, 650)   or die   ('Can not bind variable'); 
		OCIBindByName($stmt,":l_lin3_c" ,$l_lin3_c, 500)   or die   ('Can not bind variable'); 		
		OCIBindByName($stmt,":l_cupon3" ,$l_cupon3, 250)   or die   ('Can not bind variable'); 				
		OCIBindByName($stmt,":l_fec_ven3" ,$l_fec_ven3, 250)   or die   ('Can not bind variable'); 		
		OCIBindByName($stmt,":l_lin1_d" ,$l_lin1_d, 250)   or die   ('Can not bind variable'); 		
		OCIBindByName($stmt,":l_lin2_d" ,$l_lin2_d, 250)   or die   ('Can not bind variable'); 		
		OCIBindByName($stmt,":l_lin3_d" ,$l_lin3_d, 250)   or die   ('Can not bind variable'); 
		OCIBindByName($stmt,":l_cupon4" ,$l_cupon4, 250)   or die   ('Can not bind variable'); 				
		OCIBindByName($stmt,":l_fec_ven4" ,$l_fec_ven4, 250)   or die   ('Can not bind variable'); 								
		OCIBindByName($stmt,":l_codigo_error" ,$l_codigo_error, 250)   or die   ('Can not bind variable'); 								
		OCIBindByName($stmt,":l_msg_error" ,$l_msg_error, 250)   or die   ('Can not bind variable'); 										
$cod_error=0;		
		OCIExecute ($stmt)  or die   ('No se ejecuto el procedimiento almacenado'.$query); 
        OCIFreeStatement($stmt);
if($l_codigo_error!=0)
{
    $cod_error=$l_codigo_error;
	$msg_err=$l_msg_error;
}

		
			$xmlresp="<?xml ><datos><cupones>";
			if($l_lin1!="")
			 {
			   $cupon1="<p>".$l_lin1."</p><p>".$l_lin2."</p><p>".$l_lin3."</p><p>".$l_fec_ven1."</p><p>".$l_cupon1."</p>";
			   $imagen1="http://www.barcodesoft.com/barcodesoft.ashx?text=".$l_cupon1."&s=EAN13&r=96&hrfontsize=2&h=0&w=200";			   
			}
			
			if($l_lin1_b!="")
			 {
			   $cupon2.= "<p>".$l_lin1_b."</p><p>".$l_lin2_b."</p><p>".$l_lin3_b."</p><p>".$l_fec_ven2."</p><p>".$l_cupon2."</p>";
			   $imagen2="http://www.barcodesoft.com/barcodesoft.ashx?text=".$l_cupon2."&s=EAN13&r=96&hrfontsize=2&h=0&w=200";			   
			}
			
			if($l_lin1_c!="")
			 {
			   $cupon3="<p>".$l_lin1_c."</p><p>".$l_lin2_c."</p><p>".$l_lin3_c."</p><p>".$l_fec_ven3."</p><p>".$l_cupon3."</p>";
			   $imagen3="http://www.barcodesoft.com/barcodesoft.ashx?text=".$l_cupon3."&s=EAN13&r=96&hrfontsize=2&h=0&w=200";			   
			}
			
			if($l_lin1_d!="")
			 {
			   $cupon4= "<p>".$l_lin1_d."</p><p>".$l_lin2_d."</p><p>".$l_lin3_d."</p><p>".$l_fec_ven4."</p><p>".$l_cupon4."</p>";
			   $imagen4="http://www.barcodesoft.com/barcodesoft.ashx?text=".$l_cupon4."&s=EAN13&r=96&hrfontsize=2&h=0&w=200";
			}
            
?>
<!--
<table width="754" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="378" height="265" align="center"><?=$cupon1;?>   
    &nbsp;<img src="<?=$imagen1;?>" /></td>
    <td width="376" align="center"><?=$cupon2;?>
    <img src="<?=$imagen2;?>" alt="" /></td>
  </tr>
  <tr>
    <td height="188" align="center"><?=$cupon3;?>
    <img src="<?=$imagen3;?>" alt="" /></td>
    <td align="center"><?=$cupon4;?>
    <img src="<?=$imagen4;?>" alt="" /></td>
  </tr>
</table>-->
