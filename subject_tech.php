<?php
include ("connect.php");
$page = "sub_tech";
include ("header.php");

//include();


$tech_id = $_SESSION['UserID'];
  $strSQL3 = "SELECT * FROM subjected ";
  $objQuery3 = mysqli_query($con,$strSQL3) or die ("Error Query [".$strSQL2."]");
  
?>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

        <div class="content">
                <div class="container-fluid">
                    <div class="card">
                      

                  
                        <script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
          <div class="card-body"> 
            <ol class="breadcrumb">
    <li class="breadcrumb-item active"><h4>ข้อมูลรายวิชา</h4></li>
  
</ol>
            <a href="tech_subjected.php" class="btn btn-success" ><p class="glyphicon glyphicon-plus-sign">เพิ่มรายวิชา</p></a>
<div class="card-body">
  <table class="table table-striped" id="example">
                <thead>
                    <tr>
                        <th >ลำดับ</th>
                        <th >รหัสนักศึกษา</th>
                        <th >ชื่อ-นามสกุล</th>
                        <th >จัดการ</th>
                    </tr>
                </thead>
               
                <tbody>
                 <?php
 $i=1;
   while($objResult3 = mysqli_fetch_array($objQuery3))
{
   ?>
  <tr>
  <td><div align="center">
    <?php

  echo $i; 
$i++;
  ?>
</div>
  </td>
    <td>
  <?php 

  echo $objResult3["su_no"]; 

  ?>
  </td>
   

<td> <?php 

  echo $objResult3["su_name"]; 

  ?> 
</td>

<td>
<div align="center">

<A HREF="su_tech_edit.php?su_id=<?=$objResult3["su_id"]?>" title="แก้ไข" class="btn btn-info"  onclick="return confirm('คุณต้องการแก้ไขหรือไม่ Y/N');"><i class="fa fa-edit" ></i></a>
 <A HREF="su_tech_del.php?su_id=<?=$objResult3["su_id"]?>" title="ลบ" class="btn btn-danger"  onclick="return confirm('คุณต้องการลบหรือไม่ Y/N');"><i class="fa fa-close" ></i></a></div>
</td>
           
                    </tr>
                   <?php
                    }
                    ?>
                </tbody>
            </table>


            </div>
                    </div>
                </div>
            </div>

       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- นำเข้า  CSS จาก Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <!-- นำเข้า  CSS จาก dataTables -->
        <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
         
        <!-- นำเข้า  Javascript จาก  Jquery -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- นำเข้า  Javascript  จาก   dataTables -->
        <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
 
       <script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    $('#example').dataTable( {
      "oLanguage": {
        "sProcessing":   "กำลังดำเนินการ...",
        "sLengthMenu":   "แสดง MENU แถว",
        "sZeroRecords":  "ไม่พบข้อมูล",
        "sInfo":         "แสดง START ถึง END จาก TOTAL แถว",
        "sInfoEmpty":    "แสดง 0 ถึง 0 จาก 0 แถว",
        "sInfoFiltered": "(กรองข้อมูล MAX ทุกแถว)",
        "sInfoPostFix":  "",
        "sSearch":       "ค้นหา: ",
        "sUrl":          "",
        "oPaginate": {
          "sFirst":    "หน้าแรก",
          "sPrevious": "ก่อนหน้า",
          "sNext":     "ถัดไป",
          "sLast":     "หน้าสุดท้าย"
        }
      }
    } );
  } );
</script>