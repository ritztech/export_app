
<?php include('../conf.php'); ?>
<?php
session_start();
if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }

$fid=$_SESSION['fid'];

$exc_id=$_GET['id'];


$result13_pro = mysql_query("SELECT `remarks` FROM `curr_exchange_main` cmn WHERE tab_auto_id = $exc_id");
$row1_pr = mysql_fetch_array($result13_pro);





?>

 <!DOCTYPE html>
<?php 
include('asw/db_con.php');
//include('../include/header.php');
include('../include/sidemenu.php');
 
?>
 <link href="asw/css/bootstrap.min.css" rel="stylesheet">
 
 <script language="javascript">

function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		} 	
		return xmlhttp;
    }
	

function deleterecord(deleteId) {
	
    if (confirm("Are you sure you want to delete this record  ?!") == true) {
	     	var strURL="delete_ex_rates.php?id="+deleteId;
			
		//	alert(strURL);
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
//	window.location='a7billspayment_view.php';
	
	
	} else {
        x = "You pressed Cancel!";
    }

}


</script>

          
     <h3 align="center" style="background-color:#004D71; margin-top:0px;"><span style="color:#FFFFFF;">Exchange Rate Master</span></h3>   

        <div id="page-wrapper">
            
            <!-- /.row -->
	
   <div class="row-blue">
                        
   <div class="row">

   

 
  
 

<div class="col-lg-8"  style="width:100%">
						   	       <div class="panel-body">
                            <div class="table-responsive" >
							
							  
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
							   

							   <thead>
							   
							            <tr  style="background-color:#22B5C1; color:#FFFFFF;">
										      <th><a href="add_front_curr_exchnage.php" ><button class="dropbtn">ADD NEW</button></a></th>
											  
											  <th colspan="9"  , align= "center"> <?php echo $row1_pr['0']; ?> </th>
                                      
                                            										
											
                                        </tr>
										
                                        <tr  style="background-color:#22B5C1; color:#FFFFFF;">
										      <th>SNO</th>
                                      
                                            <th>YEAR</th>
 <th>FROM</th>
 <th>TO</th>
 <th>IMPORT EXANGE RATE</th>
 <th>EXPORT EXANGE RATE</th>
 <th>NOTIFICATION NUMBER</th>
 <th>NOTIFICATION DATE</th>
 <th>REMARK</th> 
  <th>DELETE</th> 
											
                                        </tr>
                                    </thead>
                                    <tbody >
									<?php	
									$sno=1;
									
									
									
		$emp=("select cm.curr_name as curr_name,cmn.remarks as exch_type,cee.startdate as startdate,cee.enddate as enddate,cee.import_ex_rate as import_ex_rate,cee.export_ex_rate as export_ex_rate,cee.notice_num as notice_num,cee.notice_date as notice_date,cee.remarks as remarks,cee.year as year,cee.tab_auto_id as tab_auto_id FROM `curr_exchange_main` cmn,`currency_exchangee` cee,`currency_master` cm where cm.tab_auto_id=cee.currencyid and cmn.tab_auto_id=cee.curr_master_id  and cee.curr_master_id=$exc_id") or die(mysql_error());
		$fetch_res = $mysqli->query($emp);
		
		while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
		
		{
			
			$tab_auto_id=$show['tab_auto_id']
		
	?>
<tr class="odd gradeX">

<td style="width:50px;"> <?php  echo $sno  ?></td>


<td style="width:50px;"> <?php echo  $show['year']?></td>
<td style="width:50px;">  <?php echo date("d-M-Y", strtotime($show['startdate']));  ?>  </td>
<td style="width:50px;">   <?php echo date("d-M-Y", strtotime($show['enddate']));  ?>   </td>
<td style="width:50px;"> <?php echo  $show['import_ex_rate']?></td>
<td style="width:50px;"> <?php echo  $show['export_ex_rate']?></td>
<td style="width:50px;"> <?php echo  $show['notice_num']?></td>
<td style="width:50px;">  <?php echo date("d-M-Y", strtotime($show['notice_date']));  ?>  </td>
<td style="width:50px;"> <?php  if($show['remarks']=="0") { echo "";}   else {echo  $show['remarks'];}?></td>
<td style="width:50px;"><input type='button' name='btnprint' value='Delete' onclick='deleterecord(<?php echo $tab_auto_id ?>)'/></td>
 
                                        </tr>
                                     <?php $sno= $sno +1;} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                        </div>
					  </div>
                    </div>
      </div>
     </div>
         
	
    <!-- Core Scripts - Include with every page -->
    <script src="asw/js/jquery-1.10.2.js"></script>
    <script src="asw/js/bootstrap.min.js"></script>
    <script src="asw/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="asw/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="asw/js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="asw/js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script><!-- /.modal --><!-- /.modal -->
    <!-- /.modal -->
</tr>
</table>




</div>






</div>
</div>
</div>

</form>



</div>
</div>
</div>

</td>
    </tr>
  </tbody>
</table>

</body>
</html> 