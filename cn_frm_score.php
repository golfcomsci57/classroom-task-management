<?php

//error_reporting(0);
include ("connect.php");
include ("header.php");

//include();

//$std_name = $_POST['std_name'];
//$std_id = $_POST['std_id'];


//$strSQL ="SELECT * FROM examination Left join examination_list ON (examination.exa_id=examination_list.exa_id) Left join student ON (examination_list.std_id=student.std_id) WHERE examination_list.exa_id = '".$_GET["exa_id"]."'";
//$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");
$strSQL1 ="SELECT * FROM checkname Left join checkname_score ON (checkname.cn_id=checkname_score.cn_id) Left join student ON (checkname_score.std_id=student.std_id) WHERE checkname_score.regis_section = '".$_GET["sub_id"]."'";
$objQuery1 = mysqli_query($con,$strSQL1) or die ("Error Query [".$strSQL1."]");
$objResult1 = mysqli_fetch_array($objQuery1);
 $strSQL ="SELECT * FROM checkname Left join checkname_score ON (checkname.cn_id=checkname_score.cn_id) Left join student ON (checkname_score.std_id=student.std_id)  WHERE checkname_score.regis_section = '".$_GET["sub_id"]."' GROUP BY checkname_score.std_id ";
$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");


$strSQL2 = "SELECT * FROM subject WHERE sub_id = '".$_GET["sub_id"]."' ";
$objQuery2 = mysqli_query($con,$strSQL2) or die ("Error Query [".$strSQL2."]");
$objResult2 = mysqli_fetch_array($objQuery2);

$strSQL12 ="SELECT * FROM checkname Left join checkname_score ON (checkname.cn_id=checkname_score.cn_id) Left join student ON (checkname_score.std_id=student.std_id) WHERE checkname_score.regis_section = '".$_GET["sub_id"]."' ";
$objQuery12 = mysqli_query($con,$strSQL12) or die ("Error Query [".$strSQL12."]");
$objResult12 = mysqli_fetch_array($objQuery12);

$strSQL3 = "SELECT * FROM work WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL3."]");
$objResult3 = mysqli_fetch_array($objQuery3);

$strSQL1 ="SELECT DISTINCTROW student.std_number,student.std_name,student.std_lname,checkname_score.score FROM checkname Left join checkname_score ON (checkname.cn_id=checkname_score.cn_id) Left join student ON (checkname_score.std_id=student.std_id) WHERE checkname.regis_section = '".$_GET["sub_id"]."'";
$objQuery1 = mysqli_query($con,$strSQL1) or die ("Error Query [".$strSQL1."]");


//$strSQL10 ="SELECT * FROM examination Left join examination_list ON (examination.exa_id=examination_list.exa_id) Left join student ON (examination_list.std_id=student.std_id) WHERE examination.exa_id = '".$_GET["exa_id"]."'";
//$objQuery10 = mysqli_query($con,$strSQL10) or die ("Error Query [".$strSQL10."]");



$strSQL5 = "SELECT COUNT(DISTINCT checkname_score.cn_id) as countnum FROM checkname_score WHERE regis_section = '".$_GET["sub_id"]."'";
$objQuery5 = mysqli_query($con,$strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysqli_fetch_array($objQuery5);

$strSQL6 = "SELECT * FROM checkname WHERE regis_section = '".$_GET["sub_id"]."' ";
$objQuery6 = mysqli_query($con,$strSQL6) or die ("Error Query [".$strSQL6."]");

$strSQL5 = "SELECT COUNT(DISTINCT checkname_score.cn_id) as countnum FROM checkname_score WHERE regis_section = '".$_GET["sub_id"]."'";
$objQuery5 = mysqli_query($con,$strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysqli_fetch_array($objQuery5);


function renderScore($txt){
  switch ($txt) {
    case 1: return  
  
     "<font color=\"green\">มา</font>";
    break;
    case 2: return 
  "<font color=\"red\">สาย</font>";
    break;
    case 3: return 
      "<font color=\"red\">ลา</font>";
    break;
    case 4: return 

  "<font color=\"red\">ขาด</font>";
    break;
  
  }
}

?>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="content">
            
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
<ol class="breadcrumb">
    <li class="breadcrumb-item active"><h4>จัดการข้อมูลคาบเรียน&nbsp;/&nbsp;ข้อมูลการเข้าเรียน</h4></li>
  
</ol>
 <hr>

        <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title">รหัสวิชา : <?php echo $objResult2["subject_no"];?></p>
                            <p class="card-title">รายวิชา : <?php echo $objResult2["sub_name"];?></p>
                                 <p class="card-title">Section : <?php echo $objResult2["section"];?></p>
                        </div>

                      <div class="card-body">
                           
                <div class="container">
                <div class="btn-group">

                   <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">นักศึกษา<span class="caret"></span></button>
              <ul class="dropdown-menu" role="menu">
                      <li><a href="regis_stu.php?sub_id=<?=$objResult2["sub_id"]?>">ตรวจสอบนักศึกษา</a></li>
                    </ul>

                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    การเข้าเรียน <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="cn_frm.php?sub_id=<?=$objResult2["sub_id"]?>">เกณฑ์การให้คะแนน</a></li>
                      <li><a href="cn_frm_show.php?sub_id=<?=$objResult2["sub_id"]?>">จัดการคะแนน</a></li>
                      <li><a href="cn_frm_score.php?sub_id=<?=$objResult2["sub_id"]?>">สรุปการเข้าเรียน</a></li>

                    </ul>
                  </div>

                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    การส่งงาน <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                     <li><a href="send_work.php?sub_id=<?=$objResult2["sub_id"]?>">เกณฑ์การให้คะแนน</a></li>
                    <li><a href="work_line.php?sub_id=<?=$objResult2["sub_id"]?>">เช็คงาน</a></li>
                      <li><a href="work_show.php?sub_id=<?=$objResult2["sub_id"]?>">จัดการคะแนน</a></li>
                      <li><a href="work_score.php?sub_id=<?=$objResult2["sub_id"]?>">รวมคะแนน</a></li>
                    </ul>
                  </div>

              <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    การสอบ <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                       <li><a href="exam.php?sub_id=<?=$objResult2["sub_id"]?>">เกณฑ์การให้คะแนน</a></li>
                      <li><a href="exam_show.php?sub_id=<?=$objResult2["sub_id"]?>">จัดการคะแนน</a></li>
                      <li><a href="exam_score.php?sub_id=<?=$objResult2["sub_id"]?>">รวมคะแนน</a>
                    </ul>
                  </div>

                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    ผลการเรียน <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="score_total.php?sub_id=<?=$objResult2["sub_id"]?>">จัดการคะแนน</a></li>
                      <li><a href="score_show.php?sub_id=<?=$objResult2["sub_id"]?>">คะแนนทั้งหมด</a></li>
                    </ul>
                  </div>
                </div>
              </div>
                        </div>
                        <script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
                        <div class="card-body">   
                        
<table class="table table-bordered" border="1">
  <tr>
     <th > <div align="center">ลำดับ </div></th>
    <th > <div align="center">รหัสนักศึกษา </div></th>
    <th > <div align="center">ชื่อ-นามสกุล </div></th>
   
 
    <?php 
 $x=1;
    while($objResult6 = mysqli_fetch_array($objQuery6))
    {

      ?>
  <th > <div align="center"> คาบที่ <?php 

  echo $x; 

  ?></div></th>
   
  <?php 
    $x++;
}
?>
<th > <div align="center">มา/ครั้ง </div></th>
  <th > <div align="center">สาย/ครั้ง </div></th>
  <th > <div align="center">ลา/ครั้ง </div></th>
    <th > <div align="center">ขาด/ครั้ง </div></th>
  <th ></th>

  </tr>

 
   <?php
  $j=1;
  
 while ($objResult = mysqli_fetch_array($objQuery))
  
{

   ?>
  <tr>
  <td align="center"> <?php 

  echo $j; 

  ?></td>
    <td>
  <?php 

  echo ($objResult["std_number"]); 

  ?>
  </td>


   

<td>

<?php

  echo ($objResult["std_name"]); 

  ?>&nbsp;&nbsp;<?php

  echo ($objResult["std_lname"]); 

  ?></div>
  </td>




<?php 
$id = $objResult5['countnum'];
//$id=$objResult5["work_id"];
//$id2=$objResult4["work_name"];
$std=$objResult1["std_number"];


?>


  <?php 
  $strSQL6 = "SELECT * FROM checkname WHERE regis_section = '".$_GET["sub_id"]."' ";
  $objQuery6 = mysqli_query($con,$strSQL6) or die ("Error Query [".$strSQL6."]");
    while ($p2 = mysqli_fetch_array($objQuery6)) {
  ?>
  <td align="center">
    <?php
      $score = mysqli_fetch_array(mysqli_query($con,"SELECT score FROM checkname_score WHERE std_id = '".$objResult["std_id"]."' AND cn_id = '".$p2["cn_id"]."' "));
      echo renderScore($score[0]);
    ?>
  </td>
  <?php
    }
  ?>

<td align=center>
  <?php
 $strSQL160 = "SELECT * FROM checkname WHERE regis_section = '".$_GET["sub_id"]."' ";
  $objQuery160 = mysqli_query($con,$strSQL160) or die ("Error Query [".$strSQL160."]");
  $p3 = mysqli_fetch_array($objQuery160);
  $strSQL161 = "SELECT count(score) as score2 FROM checkname_score WHERE std_id = '".$objResult["std_id"]."' and score='1' and regis_section = '".$_GET["sub_id"]."'  ";
$objQuery161 = mysqli_query($con,$strSQL161) or die ("Error Query [".$strSQL161."]");
  $p13 = mysqli_fetch_array($objQuery161);
      echo $p13["score2"];

  ?>
</td>
<td align=center>
  <?php
 
  $strSQL162 = "SELECT count(score) as score2 FROM checkname_score WHERE std_id = '".$objResult["std_id"]."' and score='2' and regis_section = '".$_GET["sub_id"]."'  ";
$objQuery190 = mysqli_query($con,$strSQL162) or die ("Error Query [".$strSQL162."]");
  $p14 = mysqli_fetch_array($objQuery190);
      echo $p14["score2"];

  ?>
</td>
<td align=center>
  <?php
 
  $strSQL163 = "SELECT count(score) as score2 FROM checkname_score WHERE std_id = '".$objResult["std_id"]."' and score='3' and regis_section = '".$_GET["sub_id"]."'  ";
$objQuery191 = mysqli_query($con,$strSQL163) or die ("Error Query [".$strSQL163."]");
  $p15 = mysqli_fetch_array($objQuery191);
      echo $p15["score2"];

  ?>
</td>
<td align=center>
  <?php
 
  $strSQL164 = "SELECT count(score) as score2 FROM checkname_score WHERE std_id = '".$objResult["std_id"]."' and score='4' and regis_section = '".$_GET["sub_id"]."'  ";
$objQuery192 = mysqli_query($con,$strSQL164) or die ("Error Query [".$strSQL164."]");
  $p16 = mysqli_fetch_array($objQuery192);
      echo $p16["score2"];

  ?>
</td>
<td></td>

  </tr>

<?php
$j++;
}

?>
 

  
 
</table>
  

<center>
   <form name="frmMain" method="post" action="export_cn.php?sub_id=<?=$objResult2["sub_id"]?>">
    <a href="work_show.php?sub_id=<?=$objResult2["sub_id"]?>"><button type="button" class="btn btn-primary"> ย้อนกลับ</button></a>
  <input type="submit" name="export" class="btn btn-success" value="Export" />
</form></center>

            </div>
                    </div>
                </div>
            </div>
<?php
include ("footer.php"); 
?>
<?php
     function thaidate($tDate) //แปลงวันที่เป็นวันที่ไทย
  {
    $y = substr($tDate, 0, 4) + 543;
    $m = substr($tDate, 5, 2);
    $d = substr($tDate, 8, 9);
    if ($tDate == "")
    {
      return "";
    } else
    {
      return $d . "/" . $m . "/" . $y;
    }
  }
?>