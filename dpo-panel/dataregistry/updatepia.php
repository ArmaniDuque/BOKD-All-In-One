<?php require "../../config/config.php"; ?>
<?php require "../../libs/app.php"; ?>
<?php include "../../layouts/url.php"; ?>
<?php require "../../validate.php"; ?>
<?php



if (isset($_POST['update'])) {


    // echo $transp2 = $_POST['transp2'];
    echo $piaid = $_POST['piaid'];
    echo $refid = $_POST['refid'];
    $transp1 = $_POST['transp1'];
    $transp2 = $_POST['transp2'];
    $transp3 = $_POST['transp3'];
    $transp4 = $_POST['transp4'];
    $transp4desc = $_POST['transp4desc'];
    $transp5 = $_POST['transp5'];
    $transp6 = $_POST['transp6'];
    $transp7 = $_POST['transp7'];
    $legit1 = $_POST['legit1'];
    $legit2 = $_POST['legit2'];
    $proport1 = $_POST['proport1'];
    $proport2 = $_POST['proport2'];
    $collect1 = $_POST['collect1'];
    $collect2 = $_POST['collect2'];
    $collect2desc = $_POST['collect2desc'];
    $collect3 = $_POST['collect3'];
    $collect4 = $_POST['collect4'];
    $collect5 = $_POST['collect5'];
    $collect6 = $_POST['collect6'];
    $collect7 = $_POST['collect7'];
    $collect8 = $_POST['collect8'];
    $collect9 = $_POST['collect9'];
    $collect10 = $_POST['collect10'];
    $usendis1 = $_POST['usendis1'];
    $usendis2 = $_POST['usendis2'];
    $dq1 = $_POST['dq1'];
    $dq12 = $_POST['dq12'];
    $dq13 = $_POST['dq13'];
    $dq14 = $_POST['dq14'];
    $dq15 = $_POST['dq15'];
    $dq16 = $_POST['dq16'];
    $dq17 = $_POST['dq17'];
    $dq18 = $_POST['dq18'];
    $dq19 = $_POST['dq19'];
    $dq19disc = $_POST['dq19disc'];
    $ds1 = $_POST['ds1'];
    $os1 = $_POST['os1'];
    $os2 = $_POST['os2'];
    $os3 = $_POST['os3'];
    $os4 = $_POST['os4'];
    $ps1 = $_POST['ps1'];
    $ps2 = $_POST['ps2'];
    $ps3 = $_POST['ps3'];
    $ts11 = $_POST['ts11'];
    $ts12 = $_POST['ts12'];
    $ts13 = $_POST['ts13'];
    $ts14 = $_POST['ts14'];
    $ts2 = $_POST['ts2'];
    $ts3 = $_POST['ts3'];
    $ts31 = $_POST['ts31'];
    $ts32 = $_POST['ts32'];
    $ts33 = $_POST['ts33'];
    $ts34 = $_POST['ts34'];
    $ts35 = $_POST['ts35'];
    $dsy1 = $_POST['dsy1'];
    $dsy1desc = $_POST['dsy1desc'];
    $cdf1 = $_POST['cdf1'];
    $cdf1desc = $_POST['cdf1desc'];
    $cdf2 = $_POST['cdf2'];
    $cdf3 = $_POST['cdf3'];
    $cdf3desc = $_POST['cdf3desc'];
    $prmthreats = $_POST['prmthreats'];
    echo $prmimpact = $_POST['prmimpact'];
    echo $prmprobability = $_POST['prmprobability'];
    echo $prrating = $_POST['prrating'];
    echo $prresult = $prmimpact * $prmprobability;
    $rpsdesc = $_POST['rpsdesc'];



    $query = "UPDATE dpopia SET transp1=:transp1, transp2=:transp2, transp3=:transp3, transp4=:transp4, transp4desc=:transp4desc,
     transp5=:transp5, transp6=:transp6, transp7=:transp7, legit1=:legit1, legit2=:legit2, proport1=:proport1, proport2=:proport2,
      collect1=:collect1, collect2=:collect2, collect2desc=:collect2desc, collect3=:collect3, collect4=:collect4, collect5=:collect5,
       collect6=:collect6, collect7=:collect7, collect8=:collect8, collect9=:collect9, collect10=:collect10, usendis1=:usendis1,
        usendis2=:usendis2, dq1=:dq1, dq12=:dq12, dq13=:dq13, dq14=:dq14, dq15=:dq15, dq16=:dq16, dq17=:dq17, dq18=:dq18, dq19=:dq19,
         dq19disc=:dq19disc, ds1=:ds1, os1=:os1, os2=:os2, os3=:os3, os4=:os4, ps1=:ps1, ps2=:ps2, ps3=:ps3, ts11=:ts11, ts12=:ts12,
          ts13=:ts13, ts14=:ts14, ts2=:ts2, ts3=:ts3, ts31=:ts31, ts32=:ts32, ts33=:ts33, ts34=:ts34, ts35=:ts35, dsy1=:dsy1,
           dsy1desc=:dsy1desc, cdf1=:cdf1, cdf1desc=:cdf1desc, cdf2=:cdf2, cdf3=:cdf3, cdf3desc=:cdf3desc, prmthreats=:prmthreats,
            prmimpact=:prmimpact, prmprobability=:prmprobability, prrating=:prrating, prresult=:prresult, rpsdesc=:rpsdesc
             WHERE piaid='$piaid'";


    $arr = [

        // ":refid" => $refid,
        ":transp1" => $transp1,
        ":transp2" => $transp2,
        ":transp3" => $transp3,
        ":transp4" => $transp4,
        ":transp4desc" => $transp4desc,
        ":transp5" => $transp5,
        ":transp6" => $transp6,
        ":transp7" => $transp7,
        ":legit1" => $legit1,
        ":legit2" => $legit2,
        ":proport1" => $proport1,
        ":proport2" => $proport2,
        ":collect1" => $collect1,
        ":collect2" => $collect2,
        ":collect2desc" => $collect2desc,
        ":collect3" => $collect3,
        ":collect4" => $collect4,
        ":collect5" => $collect5,
        ":collect6" => $collect6,
        ":collect7" => $collect7,
        ":collect8" => $collect8,
        ":collect9" => $collect9,
        ":collect10" => $collect10,
        ":usendis1" => $usendis1,
        ":usendis2" => $usendis2,
        ":dq1" => $dq1,
        ":dq12" => $dq12,
        ":dq13" => $dq13,
        ":dq14" => $dq14,
        ":dq15" => $dq15,
        ":dq16" => $dq16,
        ":dq17" => $dq17,
        ":dq18" => $dq18,
        ":dq19" => $dq19,
        ":dq19disc" => $dq19disc,
        ":ds1" => $ds1,
        ":os1" => $os1,
        ":os2" => $os2,
        ":os3" => $os3,
        ":os4" => $os4,
        ":ps1" => $ps1,
        ":ps2" => $ps2,
        ":ps3" => $ps3,
        ":ts11" => $ts11,
        ":ts12" => $ts12,
        ":ts13" => $ts13,
        ":ts14" => $ts14,
        ":ts2" => $ts2,
        ":ts3" => $ts3,
        ":ts31" => $ts31,
        ":ts32" => $ts32,
        ":ts33" => $ts33,
        ":ts34" => $ts34,
        ":ts35" => $ts35,
        ":dsy1" => $dsy1,
        ":dsy1desc" => $dsy1desc,
        ":cdf1" => $cdf1,
        ":cdf1desc" => $cdf1desc,
        ":cdf2" => $cdf2,
        ":cdf3" => $cdf3,
        ":cdf3desc" => $cdf3desc,
        ":prmthreats" => $prmthreats,
        ":prmimpact" => $prmimpact,
        ":prmprobability" => $prmprobability,
        ":prrating" => $prrating,
        ":prresult" => $prresult,
        ":rpsdesc" => $rpsdesc,
    ];

    $path = "pia.php?id=$refid";
    $app->update($query, $arr, $path);

}
?>