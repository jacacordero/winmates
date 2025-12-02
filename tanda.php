<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-263120-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-263120-1', { 'optimize_id': 'GTM-MMWRCD5'});
</script>
<!-- Global site tag (gtag.js) - Google Ads: CONVERSION_ID -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-CONVERSION_ID"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config','AW-CONVERSION_ID');
  </script>
<title>Resoluci&oacute;n de Problemas</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" href="../css/estilos.css" >
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="../includes/main.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="DC.Language" SCHEME="RFC1766" CONTENT="Spanish">
<meta name="copyright" content="Copyright � 2002 winmates.net">
<meta name="robots" content="ALL">
<meta name="dc.creator" content="Juan A Cordero">
<meta name="AUTHOR" CONTENT="Juan A. Cordero">
<meta name="REPLY-TO" CONTENT="winmates@gmail.com">
<LINK REV="made" href="mailto:winmates@gmail.com">
<meta name="DESCRIPTION" CONTENT="Ejercicios de c&aacute;lculo mental">
<meta name="KEYWORDS" CONTENT="C&aacute;lculo, agilidad, rapidez mental">
<meta name="Resource-type" CONTENT="Document">
<meta name="DateCreated" CONTENT="Sun, 01 February 2004 08:23:00 GMT">
<meta name="Revisit-after" CONTENT="5 days">
<!-- Anuncio Adsense -->
<!-- <script data-ad-client="ca-pub-0982830990531460" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
</head>
<body>
<?php include("../includes.inc");

/////////
// Funciones tra�das de funcy
/////////
$usmet = $_SESSION['codigo'];//echo $usmet;
$t1=microtime(true);

?>
<script language="JavaScript">
function dicc(Codi){gl=open('mar/glosario.php#'+Codi,'glosario','width=400,height=4,status=no,toolbar=no,menubar=no,scrollbars=no');gl.focus();}
function vasmal(){alert("Llevas dos fallos seguidos. Si fallas &eacute;ste se acaba Winmates");}
</script>
<?php

//'Preparecion y lectura de los valores almacenados en Session.
if (!isset($_POST['texto_metido'])) {$_POST['texto_metido']=0;}
$texto_metido = $_POST['texto_metido'];
if (!isset($_POST['rmet'])) {$_POST['rmet']=0;}
$rmet = $_POST['rmet'];
//echo "rmet: ".$rmet;
$d_opor = $_SESSION['d_opor'];
$just = $_SESSION['just'];
$rrea = $_SESSION['rrea'];
$verif = $_SESSION['verif'];
$bAcer = $_SESSION['bAcer'];
$scod = $_SESSION['codigo'];
$ipact = (int)$_SESSION['p_act'];
$icurso = (int)$_SESSION['curso'];
$itot = $_SESSION['itot'];
$iat = $_SESSION['iat'];
$iet = $_SESSION['iet'];            // Errores acumulados tanda
$vez = $_SESSION['vez'];
$sal = $_SESSION['sal'];
$ntotal = $_SESSION['ta'];   //echo "ntotal: ".$ntotal."<br>";
$be = $_SESSION['be'];              //echo 'be: '.$be.'  ';
$ma = $_SESSION['ma'];              //echo 'ma: '.$ma.'  '; Errores acumulados
$inf5 = $_SESSION['inf5'];
//$ac_dopor = $_SESSION['ac_dopor'];
$contra=$_SESSION['contra'];//echo $contra;exit;
$fal = $_SESSION['fal'];
$vez = $_SESSION['vez'];
$acabo=0; $_SESSION['acabo']=$acabo;
if (isset($_SESSION['codigo'])) {$regis=$_SESSION['codigo']; } else  {$regis="Usuario no registrado";}
$t2=microtime(true);
$res = $conn->query("SELECT mod(Ex_pr,2),Email,Jus FROM informa WHERE Cod='".$scod."';");
while($fila=$res->fetch_row()){
//$erro = $fila[0];
$ex_pr = $fila[0];//echo "ex_pr: ".$ex_pr;exit;
$email = $fila[1];
$jus = $fila[2];
}
if ($ex_pr==1)      //Si informa.Ex_pr es impar, o hoy es el dia de 3 fallos
{
$aa="<center>Despu&eacute;s de fallar 3 problemas seguidos,<br>no puedes seguir
trabajando.<br>&iexcl;Hasta ma&ntilde;ana!</center>";
    ?>      <?php include("../includes/pie_ad_horizontal.inc");?>      <?php
exit;
}

$mens = Array("<span id='rojo'>&iexcl;&iexcl;&iexcl;MAL!!!</span>","<span id='azul'>&iexcl;BIEN!</span>","Hemos de acabar","Segunda oportunidad",);
If (($vez==1)&&($vez-1 == $ntotal)&&($sal==3)) {$mens[0]=$mens[1]=$mens[2]="";}
If ($vez == 1)  //Acciones para la primera vez del bucle.
  {
   $f_tanda = $ipact+$ntotal;
   $sql="SELECT N,Rescavocu,Proble,Datos,Ayuda,Ati,Eti,At,Et FROM basedif0 WHERE (N >=".$ipact." AND N <".$f_tanda.")ORDER BY N_m;";     //Ayuda
   $stmt = $conn->query($sql);
      $x=1;      // echo "T1: ". time();
      while($fila=$stmt->fetch_row()){
         $mTand[$x][1]=$fila[0];$mTand[$x][2]=$fila[1];$mTand[$x][3]=$fila[2];$mTand[$x][4]=$fila[3];$mTand[$x][5]=$fila[4];
         $mTand[$x][6]=$fila[5];$mTand[$x][7]=$fila[6];$mTand[$x][8]=$fila[7];$mTand[$x][9]=$fila[8];//$mTand[$x][9]=$fila[9];
         //echo $x.".- ".$fila[0]." ".$fila[1]." ".$fila[2]." ".$fila[3]." ".$fila[4]." ".$fila[5]." ".$fila[6]." ".$fila[7]." ".$fila[8]." <br>";
         //echo " N: ".$mTand[$x][1]."Rescavocu: ".$mTand[$x][2]."Proble: ".$mTand[$x][3]."Datos: ".$mTand[$x][4]."Ayuda: ".$mTand[$x][5]."Ati: ".$mTand[$x][6]."Eti: ".$mTand[$x][7]."At: ".$mTand[$x][8]."Et: ".$mTand[$x][9]."<br>";
         $x++;
         }
   $_SESSION['mTand']=$mTand;
   $n_pr = 6001-$mTand[$vez][1];
   $iAv = round(substr($mTand[$vez][2],12,2));
   $rrea=  round(substr($mTand[$vez][2],0,11) + 131*$iAv - 1733*$n_pr)/100;
  // echo "T1: ".$t1. " XXX T2: ".$t2. " XXX T3: ".$t3;
  }
else
  {
   $mTand = $_SESSION['mTand'];
  }
//echo '<br>2&deg;.- /texto metido:'.$texto_metido.' /rrea:'.$rrea.' /rmet:'.$rmet.' /d_opor:'.$d_opor.' /just:'.$just.' /bAcer:'.$bAcer.' /vez:'.$vez;
//echo '<br> /rrea:'.$rrea.' /rmet:'.$rmet.' /d_opor:'.$d_opor.' /just:'.$just.' /bAcer:'.$bAcer.' /vez:'.$vez;

$t3=microtime(true);     //echo "de fila 85 a fila 155 (comienzo del bucle ve>1: ".$t3-$t2."<br>";
if ($vez>1) //Acciones de la segunda vez y posteriores.
  {
   if (strstr($rmet,',')) {$rmet = str_replace(',', '.',$rmet);}
   if ($rmet == "") $rmet = 0;     // gettype($rmet) != float
   $rmet=(float)$rmet;             //echo "rmet ".$rmet."TIPO".gettype($rmet);
   $iFtie = time();                // Timer
   $iTtie = round($iFtie-$_SESSION['tiempo']);
   if ($iTtie>420) $iTtie=420;
   $n_pr = 6001-$mTand[$vez-1][1];
   $iAv = round(substr($mTand[$vez-1][2],12,2));
   $rrea=  round(substr($mTand[$vez-1][2],0,11) + 131*$iAv - 1733*$n_pr)/100;
   $iLpro = strlen($mTand[$vez-1][3]);
   $a2 = 131*$iAv;
   $a3 = 1733*$n_pr;
   $a1 = round(substr($mTand[$vez-1][2],0,11));
   $a4 = round(($a1+$a2-$a3)/100);
   $dj=Array("<span id='azul'>&iexcl;BIEN!</span>","<span id='rojo'>&iexcl;&iexcl;&iexcl;MAL!!!</span>",
             "<span id='azul'>Justificaci&oacute;n BIEN</span>","<span id='rojo'>Justificacion MAL</span>");
   $_SESSION['dj']=$dj;
   //4 mensaje de dopo_justificar
   $c_dj=Array('dopa','dope','jusa','juse');
   if ($rrea == $rmet) //' Evalua respuesta del problema anterior (si la hubo).
     {
      if ($d_opor==0.5)
        {   $ind= 1;   }
      if (($just==0) AND ($d_opor==0))
        {  $iat++;  $itot++;  $be++;   }
      $bAcer = 1; $_SESSION['bAcer']=$bAcer;   //echo "bAcer:".$bAcer;exit;
      $_SESSION['be']=$be;
      $sal = 0;
      $tabla = "padma";
      //Si la respuesta es correcta, disminuye valor campo N_m.
      if ($just==0)
        {
         $ipa = strval(intval($ipact)-1); //echo "Anterior Acierto: ".$ipa;
         $rs=$conn->query("UPDATE basedif0 Set N_m=N_m-1 WHERE N='".$ipa."';");
        } // Fin Else si Respuesta es correcta.
     }
   else //Comienzo de Respuesta incorrecta
     {
      $bAcer = 0;      $_SESSION['bAcer']=$bAcer;
      //echo "PARADA SI FALLA LA RESPUESTA";exit;
      if ($d_opor==0.5)
        {  $ind= 2;  }
      if ($just==0.5)
        {  $ind= 4;  }
      if (($just==0) AND ($d_opor==0))
        {  $iet++;  $itot++;  $sal++;   }
      $_SESSION['ma']=$ma;
      if ($sal==3)
        {
         $rs = $conn->query("UPDATE informa SET Ex_pr=Ex_pr+1 WHERE Cod='".$scod."';");
         $aa="<br><br><center> Tres fallos seguidos.<br><br>&iexcl;Hasta ma&ntilde;ana!</center>";
         //$ipact=inc_punt($ipact,$ma/($ma+$be));
         $ipact = $ipact-0.2*$ipact;
         // Actualiza el puntero de los problemas en informa.
        $sql="UPDATE informa set P_act='".$ipact."'WHERE Cod='".$scod."'";//"UPDATE informa set P_act= ? WHERE Cod= ?";
        $stmt = $conn->prepare($sql);        //$var1='mume'; # asignamos valores al paramentro puntos
        $stmt->bind_param('is',$ipact,$scod);
        $stmt->execute();
        ?>          <?php include("../includes/pie_ad_horizontal.inc");?>            <?php
        exit;
        }
      if ($sal>1)
        {
         $mensaje= "<body onload='vasmal()'>";echo $mensaje;
        }
      $ma++;
      $_SESSION['ma']= $ma;
      $tabla = "pedma";
      //Si la respuesta es incorrecta, lleva problema a dificil.
      $strSQL ="INSERT INTO dificil (Cod,N_p,R_mal) VALUES ('".$scod."','".$mTand[$vez-1][1]."','".$rmet."')";
      $rs = $conn->query($strSQL);
      if ($d_opor==0)
        {
         //Si la respuesta es incorrecta, aumenta valor campo N_m.
         $ipa = strval(intval($ipact)-1);   //echo "Anterior fallado: ".$ipa;
         $rs=$conn->query("UPDATE basedif0 Set N_m=N_m+1 WHERE N='".$ipa."';");
        }
     } // Fin Else si Respuesta es incorrecta.
   if (($just==0) AND ($d_opor==0))
     {
      // Actualiza el puntero de los problemas en informa.
      $strSQL = "UPDATE informa set P_act='".$ipact."'WHERE Cod='".$scod."'";
      $rs = $conn->query($strSQL)or DIE($conn->ErrorMsg());
      //Actualiza datos en tabla erraci.
      $nc = Array("N_p","Ati","Eti","At","Et");
      // Busca el problema o &iquest;El problema ha sido hecho antes?
      $strSQL="SELECT * FROM erraci WHERE N_p='".$mTand[$vez-1][1]."';";
      $rs = $conn->query($strSQL) or DIE($conn->ErrorMsg());
      $c2=$nc[2-($bAcer)];
      $c3=$nc[4-($bAcer)];
//      if (!$rs)
      if (isset($rs))
        {
         // Si encuentra problema en erraci, actualiza tiempo y veces hecho
         $strSQL = "UPDATE erraci Set ".$c2."=".$c2."+'".$iTtie."',".$c3."=".$c3."+'1' "."WHERE N_p = '".$mTand[$vez-1][1]."';";
         $rs = $conn->query($strSQL);
         //echo "problema encontrado en erraci";
        }
      Else
        {
         // Si no encuentra problema en erraci, actualiza tiempo y veces hecho
         $strSQL= "INSERT INTO erraci(N_p,".$c2.",".$c3.") VALUES ('".$mTand[$vez-1][1]."','".$iTtie."',1);"; //echo $strSQL;
         $rs = $conn->query($strSQL) ;
         //echo "problema no encontrado en erraci";
        }
      //Actualiza datos en tabla basedif0. **********************************************************************
      $nc = Array("N","Ati","Eti","At","Et");
      // Busca el problema o &iquest;El problema ha sido hecho antes?
      $strSQL="SELECT * FROM basedif0 WHERE N='".$mTand[$vez-1][1]."';";
      $rs = $conn->query($strSQL);
      //echo "----".$mTand[$vez-1][1];echo $strSQL;
      $c2=$nc[2-($bAcer)];
      $c3=$nc[4-($bAcer)];
      if ($rs)
        {
         // Si encuentra problema en basedif0, actualiza tiempo y veces hecho **********************************
         $strSQL = "UPDATE basedif0 Set ".$c2."=".$c2."+'".$iTtie."',".$c3."=".$c3."+'1' "."WHERE N = '".$mTand[$vez-1][1]."';";  //********************************************
         $rs = $conn->query($strSQL);
        }

      //Actualiza informa en Aciertos, Errores, Tiempo Aciertos, Tiempo Errores.
      $dy = $bAcer;
      $iy = 1-$dy;
      $ti = $iTtie;
      $strSQL="UPDATE informa Set Acipro=Acipro+".$dy.",Errpro=Errpro+".$iy.",Tapr=
      Tapr+".$dy*$ti.",Tepr=Tepr+".$ti*$iy." WHERE Cod='".$scod."';";
      $rs = $conn->query($strSQL)or DIE($conn->ErrorMsg());
      //Actualiza tabla restanda
      $cRet=Array("Cod","Anop","Enop","Aopb","Eopb","Amul","Emul","Aryp","Eryp",
      "Aecu","Eecu","Appr","Eppr","Asmd","Esmd","Amyd","Emyd","Ageo",
      "Egeo","Aado","Eado","Aate","Eate");
      $strSQL="SELECT * FROM restanda WHERE Cod ='".$scod."';";
      $rs = $conn->query($strSQL);
      $iAv1=2*round($iAv/10)+2-$bAcer;
      $cX=$cRet[$iAv1];
      If ($rs)   // Si usuario existe, actualiza de Anop a Eate, a&ntilde;ade 1 a su valor
        {  $strSQL="UPDATE restanda Set ".$cX."=".$cX."+1 WHERE Cod='".$scod."';";    }
      Else       // Si no existe usuario (no encuentra Cod). Lo a&ntilde;ade y inicializa campo
        {  $strSQL="INSERT INTO restanda (Cod, ".$cRet[$iAv1].") VALUES ('".$scod."',1);";   }
       $rs =$conn->query($strSQL);       //echo $strSQL;
     }// Fin Actualiza informa, erraci, restanda
  } // Fin acciones para vez>1
Else    // (Del bucle if ($vez>1). Es decir, si es el primer problema.)
  {
   //$bAcer=0;
   $mal = "";
   $mens[0]="";
  }
$t4=microtime(true);     //echo "de fila 165 a fila 330 (final del bucle vez>1: ".$t4-$t3."<br>";
//Actualizar sesiones despues de procesar vez>1
$_SESSION['itot'] = $itot;
$_SESSION['iat'] = $iat;
$_SESSION['iet'] = $iet;
//$vez=$vez + 1;
$_SESSION['vez'] = $vez+1;
$_SESSION['sal'] = $sal;
$_SESSION['tiempo'] = Time();
$aq = $mens[$bAcer];
//echo "<p><p>vez-1: ".$vez-1,"ntotal: ".$ntotal;
// Si se llega al final o hay 3 fallos, se acaba la Tanda
If ($vez-1 == $ntotal)        //|| ($sal == 3))
  {
   $inf1="<center><br>Has terminado la Tanda.<BR></center>
          <center>$scod ha hecho $iat acierto(s) en Primera Oportunidad <br><br> sobre $itot problemas
          realizados.</center><hr>";
   $acabo=1; 
   // Salto en el Puntero. Eleminada llamada a funcy
   if (($iet/($iat+$iet))>0.25) {$ipact = $ipact-0.1*$ipact;}
   if (($just==0) AND ($d_opor==0))
     {      //echo 'Actualizo puntero prob informa';      // Actualiza el puntero de los problemas en informa.
      $strSQL = "UPDATE informa set P_act='".$ipact."'WHERE Cod='".$scod."'";
      $rs = $conn->query($strSQL);
     }// Fin Actualiza el puntero de los problemas en informa
   $_SESSION['itot'] = 0;
   $_SESSION['iat'] = 0;
   $_SESSION['iet'] = 0;
   $_SESSION['vez'] = 1;
   $_SESSION['sal'] = 0;
   $_SESSION['acabo']=$acabo;
   $_SESSION['scod']=$scod;
   $_SESSION['contra']=$contra;

   //$_POST['CampoUsuario']=$usmet;
   //$_POST['CampoPwd']=$contra;
   // Pasa por Sesion los valores de Usmet (Usuario) y Password (Contrase&ntilde;a) a verifica,
   // que lo devuelve a Index con dichos valores ya introducidos.
   $aa="<b>
   <center>
     <table>
         <tr><td> $inf1<br> </td></tr>
         <tr><td><center>
             <form action='verifica2.php' method='post' target='_self' enctype='text/plain' name='miform'>

             <input type = 'submit' value ='C o n t i n u a r    e n    P r o b l e m a s'></form>
         </center><td></tr>
     <table>
   </center><b>
   ";
   include("../includes/pie_ad_horizontal.inc");
   exit;
  }
Else    // Si la Tanda contin&uacute;a. Problema y respuesta solicitada.
  {
   $vez++;
   //$_SESSION['ini']=0;
   //echo $vez;
   $s1 = $mTand[$vez-1][3];
   $ve = $vez-1;
   $men = $mens[$bAcer];//echo $men;//echo "OJO ". $bAcer;
   $vete = "tanda.php";
   $titu="<table><tr><td></td></tr></table>";
   //$titu="<H1>Tanda de problemas<H1>";
   if ($be+$ma>0)
     {
      $p_error1 = round(1000*$ma/($be+$ma))/10;// Porcentaje de error 2 dec.
      $p_error = 100*$ma/($be+$ma);//Porcentaje de error con muchos decimales
     }
   else
     {// Solo la primera vez (primer ejercicio);
      $p_error1=$p_error=0;
     }
   $t="";
   $t1="<td><div align='right'><font color='#E12B01'>&nbsp;&nbsp;[";
   $t2="]</font></div></td>";
   // Carga de sem&aacute;foros para d_opor y justificacion
   $p_error2=sem_dop($scod); //echo 'p_errror2: '.$p_error2.'<br>';
   $p_error3=sem_jus($scod); //echo 'p_errror3: '.$p_error3; exit;
   
   if ($p_error2<=15) $semaf2='../imagen/bverde.png';
   if ($p_error2>15)  $semaf2='../imagen/bamar.gif';
   if ($p_error2>=21) $semaf2='../imagen/broja.png';
   if ($p_error2>=26) $semaf2='../imagen/bnegra.gif';
   if ($p_error3<=15) $semaf3='../imagen/bverde.png';
   if ($p_error3>15)  $semaf3='../imagen/bamar.gif';
   if ($p_error3>=21) $semaf3='../imagen/broja.png';
   if ($p_error3>=26) $semaf3='../imagen/bnegra.gif';
   //Carga semaforo segun porcentaje de errores
   if ($p_error<=15)  $semaforo='../imagen/bverde.png';
   if ($p_error>15)   $semaforo='../imagen/bamar.gif';
   if ($p_error>=21)  $semaforo='../imagen/broja.png';
   if ($p_error>=26)  $semaforo='../imagen/bnegra.gif';
// echo $semaf2." /// ".$semaf3." /// ".$semaforo;
// Segunda Oportunidad.
   if (($bAcer==0) AND ($vez-1>1)) //Ha fallado y no es 1er problema
     {
      //echo 'd_opor acertado: '.$d_opor.'<br>';
      $d_opor+=0.5;
      $vez--;
      $s1 = $mTand[$vez-1][3];
      $ve--;
      //$_SESSION['rrea']=$rrea;
      //echo '2� oportunidad->'.$d_opor.'<br>';
      $ipact--;
      if ($d_opor==1)     // Si 2 fallos en 2&deg; oportunidad
        {
         $vez++;
         $s1 = $mTand[$vez-1][3];
         $ve++;
         $ipact++;
         $d_opor=0;
        }
     }
    $_SESSION['vez'] = $vez;
    $_SESSION['ve'] = $vez;
    $_SESSION['d_opor'] = $d_opor;
    if ($bAcer==1)
      {
       $d_opor=0;
       $_SESSION['vez'] = $vez;
       $_SESSION['ve'] = $vez;
       $_SESSION['d_opor'] = $d_opor;
      }
//    echo '<br>5&deg;.-  /texto metido:'.$texto_metido.' /rrea:'.$rrea.' /rmet:'.$rmet.' /d_opor:'.$d_opor.' /just:'.$just.' /bAcer:'.$bAcer.' /vez:'.$vez;
// Justificaci&oacute;n
    if ($jus==1)            // Solo para aquellos alumnos con jus=1
      {
       if ($bAcer==1)
         {
          $just+=0.5;
          //echo 'justificacion->'.$just.'<br>';
          $ipact--;
          $vez--;
          $ve--;
          $s1 = $mTand[$vez-1][3];
          $s4=$mTand[$vez-1][4];
          if ($s4==' �..?')
            {
             $just+=0.5;
            }
          $_SESSION['vez'] = $vez;
          $_SESSION['ve'] = $vez;
          $_SESSION['ipact'] = $ipact;
          $_SESSION['s4']=$s4;        //Carga SESSION[s4]: datos
          $_SESSION['rrea']=$rrea;    //Carga SESSION[rrea] R correcta
          $_SESSION['just'] = $just;
          if (($just==1) OR ($s4==' NO')) //No Justificar
            {
             $vez++;
             $ve++;
             $ipact++;
             $s1 = $mTand[$vez-1][3];
             $just=0;
             $_SESSION['just'] = $just;
             $_SESSION['vez'] = $vez;
             $_SESSION['ve'] = $vez;
             $_SESSION['ipact'] = $ipact;
            }
          if ($s4!=' NO')
            {
            $s4=$s4." 1";
            if (substr($texto_metido,0,1)=="(") $texto_metido="1*".$texto_metido;
                //echo "just ".$just;
                //if (substr($texto_metido,0,1)=="(" and ($jus==0.5)) { $texto_metido = "1*(".$texto_metido.")";  }
                if (($texto_metido!=0))
                  {
                   $c_met=trans($texto_metido);//      echo "c_met:".$c_met;
                   $dat=explode(" ",$c_met);   //      echo " dat:". $dat;
                   $n_dat=count($dat);         //      echo " n_dat:".$n_dat ;
                   for ($l=0; $l<$n_dat; $l++)
                     {
                      $trobat = strrpos($s4,strval($dat[$l]));//  echo '<br>'.$trobat;
                      if ((!$trobat) or ($trobat==0))
                       {  $no_trobat=1; } //echo"NO encontrado";exit;
                     }
                   if (!isset($no_trobat)) //todos encontrados
                    {
                      $resul = Justifica($texto_metido);// exit;
                      //echo "rmet: ".$rmet." resul: ".$resul;
                      //   $dj=Array("<span id='azul'>2� Oport. BIEN</span>","<span id='rojo'>'2� Oport. MAL</span>","<span id='azul'>Justificaci&oacute;n BIEN</span>","<span id='rojo'>Justificacion MAL</span>");
                      if (strval($rmet)==strval($resul))
                        { $men="<span id='azul'>BIEN justificado</span>"; $ind= 3; }  //echo "bien justificado";//exit;
                      else
                        { $men="<span id='rojo'>MAL justificado</span>"; $ind= 4; }
                    }
                  else
                    { $men="<span id='rojo'>Datos incorrectoso</span>";$ind= 4;  }
                 }
                   if ((intval($texto_metido)==0) and ($just==0))
                    { $men="<span id='rojo'>Datos incorrectos</span>";$ind= 4; }
            }
            /*          if ($s4==' NO')            {              $ind=3;//echo "Este es solo de 1";echo "Metida: ".$rmet; echo "Real: ". $rrea;//exit;            }            */
         }
      }
      // Fin bucle Justificaci&oacute;n (informa.Jus=1)
    if (isset($ind))
      {
       $sql="SELECT * FROM justidop WHERE Cod ='".$scod."';"; mysqli_query($conn, $sql);
       $rs = $conn->query($sql)or DIE($conn->ErrorMsg());
       //echo '<br> -> '.$dj[$ind-1];
       $men=$dj[$ind-1];   //echo '<br> -> '.$dj[$ind-1];
       If ($rs)     // Si usuario existe, actualiza el campo correspondiente
         { $sql="UPDATE justidop Set ".$c_dj[$ind-1]."=".$c_dj[$ind-1]."+1 WHERE Cod='".$scod."';";     }
       Else         // Si no existe usuario (no encuentra Cod). Lo a&ntilde;ade y inicializa campo
         {  $sql="INSERT INTO justidop (Cod, ".$c_dj[$ind-1].") VALUES ('".$scod."',1);";     }
       mysqli_query($conn, $sql); //$rs = $conn->query($strSQL)or DIE($conn->ErrorMsg());
      }

    $res=$conn->query("SELECT Total FROM contador WHERE Campo='prob'") or DIE($conn->ErrorMsg());
    while($fila=$res->fetch_row()){$nume = $fila[0];}  //echo "nume".$nume; 
    // Incrementar contador.Prob si no es 2&deg;opor ni justificacion
    if (($just==0) AND ($d_opor==0))
      {  $rs = $conn->query("UPDATE contador SET Total=Total+1 WHERE Campo='prob'"); }
//    $rs->Close();
    if ($vez-1==$ntotal)
    //    if ($vez-1==$ta)
      {$ipact--;}
    $_SESSION['p_act'] = $ipact + 1; // $pact controla el n&deg; o rango del proble
    $titu.=$t."</tr></table>";//echo $titu;
    // Carga de sem&aacute;foros para d_opor y justificacion
    $p_error2=sem_dop($scod); //echo 'p_errror2: '.$p_error2.'<br>';
    //Carga semaforo segun porcentaje de errores
    if ($p_error2<=15) $semaf2='../imagen/bverde.png';
    if ($p_error2>15)  $semaf2='../imagen/bamar.gif';
    if ($p_error2>=21) $semaf2='../imagen/broja.png';
    if ($p_error2>=26) $semaf2='../imagen/bnegra.gif';
    if ($p_error3<=15) $semaf3='../imagen/bverde.png';
    if ($p_error3>15)  $semaf3='../imagen/bamar.gif';
    if ($p_error3>=21) $semaf3='../imagen/broja.png';
    if ($p_error3>=26) $semaf3='../imagen/bnegra.gif';
    if ($p_error<=15) $semaforo='../imagen/bverde.png';
    if ($p_error>15)  $semaforo='../imagen/bamar.gif';
    if ($p_error>=21) $semaforo='../imagen/broja.png';
    if ($p_error>=26) $semaforo='../imagen/bnegra.gif';
    // Caja de control de errores.
   // echo "Valor de vez: ".$vez;    echo "N&ordm; problema: ".$mTand[$vez-1][1];
    $nn=$mTand[$vez-1][1];
    $inf2=
      "
      <div id='content' align='center'>
       <table style='width:50%' class='header' border='1'>
         <tr>
           <td colspan='4'>
             <p id='tit1'>Tanda de Problemas.</p>
             <b><center>Usuario: $regis</center></b>
           </td>
         </tr>
         <tr id='tit3'>
           <td style='width=10%; text-align:center;font-size:13px'>Puntero[1-6000]</td>
           <td style='width=20%; text-align:center;font-size:13px'>Tanda actual: fallos</td>
           <td style='width=15%; text-align:center;font-size:13px'>Problemas servidos</td>
           <td style='width=20%; text-align:center;font-size:13px'>Respuesta anterior</td>
         </tr>
         <tr>
           <td style='width=10%; text-align:center;font-size:13px'>$nn</td>
           <td style='width=20%; text-align:center;font-size:13px'>$iet/$ntotal</td>
           <td style='width=15%; text-align:center;font-size:13px'>$nume</td>
           <td width='20%'><center>";
            if ($d_opor==0.5) { $inf2.="<span id='azul'>&nbsp $men</span>";  }
            else { $inf2.=" $men";  }
            $inf2.="</I></B></font></td></tr>  ";
            $_SESSION['inf2']=$inf2;
    $inf3="<center><tr><td valign = 'top' colspan='4' id='tit3'><center>";
    if ($d_opor==0.5)
      { $inf3.="<span id='azul'>&nbsp  &nbsp $ve"."&deg;]<b>&nbsp $s1 &nbsp</b></span><br><br>"; }
    if (($d_opor!=0.5) AND ($just!=0.5))
      { $inf3.="<span id='azul'>&nbsp $ve"."&deg;]&nbsp $s1 &nbsp</b></span><br><br>"; }
    if ($just==0)
      {
       $inf3=$inf3."
       <FORM METHOD='Post' ACTION = 'tanda.php' NAME = resp_dada><center>
       <input autofocus='autofocus' TYPE= 'Text' NAME='rmet' size='10'><BR></center></FORM>
       </body></td></tr>
       ";
       //echo "inf3: ".$inf3;
       //echo "solo si no hay que justificar inf3: ".$inf3;
      }
    if ($just==0.5)  // Justificaci&oacute;n ded la respuesta.
      {
       $inf3.=
           "<tr>
             <td align='center' colspan='4'>
               <span id='azul'>&nbsp; $s1 <b>$rrea </span>&nbsp;&nbsp;&nbsp;&iexcl;BIEN!</b><HR>
               <FORM METHOD='Post' ACTION='tanda.php' NAME=justi_res>
                <center>
                <span id='azul'><font size='2'> Justificar la Respuesta con datos y operaciones.</font></span><br>
                <B>&nbsp;$rmet &nbsp;</B>=&nbsp;</body>
                <input autofocus='autofocus' TYPE= 'Text' NAME='texto_metido' size='40'>
                <input TYPE= hidden NAME =rmet value='".$rmet."'>
               </FORM>";
      }
//    $inf3.= "</td></tr></table>";
    $inf3.= "</td></tr></table></div>";
    $inf4= "<center> <table border> <tr> <td> <br><font size='3'>$ve]&nbsp $s1
            &nbsp; <br><center>Respuesta Correcta: <b>$rrea</b><BR><br>
            </center> </td> </tr></table> </center></html> ";
    $inf5 = $titu.$inf2.$inf4;//echo $inf5;
    $_SESSION['inf5'] = $inf5;
    $aa=$inf2."".$inf3;
 }
//echo $aa;
$t5=microtime(true);   //  echo "de fila 330 a fila 667 (final del bucle vez>1: ".$t5-$t4."<br>";
include("../includes/pie_ad_horizontal.inc");?>
</body>
</html>