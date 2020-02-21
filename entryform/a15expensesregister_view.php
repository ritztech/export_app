
<?php include('../conf.php'); ?>
<?php
session_start();
if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }

$fid=$_SESSION['fid'];
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
	     	var strURL="a15expensesregister_delete.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='a15expensesregister_view.php';
	
	
	} else {
        x = "You pressed Cancel!";
    }

}


</script>

          
      <h3 align="center" style="background-color:#004D71; margin-top:0px;"><span style="color:#FFFFFF;">GENERAL VOUCHER</span></h3>   

        <div id="page-wrapper">
            
            <!-- /.row -->
	
   <div class="row-blue">
                        
   <div class="row">

   
  
 

<div class="col-lg-8" style="width:100%">
						   	       <div class="panel-body">
                            <div class="table-responsive" >
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
									<tr> <td colspan = 9 , align = "center">  	<a href="#" onclick="window.open('a15expensesregister_front.php');"> <input type="button" value="Add NEW" />   </td>  </tr>
                                        <tr  style="background-color:#22B5C1; color:#FFFFFF;">
										      <th>SNO</th>
                                      
                                            <th>DATE</th>	<th>DEBIT LEDGER	</th>  <th>DEBIT VALUE</th>
											  <th>DEBIT NARATION </th>

											  <th>CREDIT LEDGER </th>  <th>CREDIT VALUE</th>
											  <th>CREDIT NARATION </th>

																																	  <th>Delete</th>
										
											
                                        </tr>
                                    </thead>
                                    <tbody >
									<?php	
									$sno=1;
									
									
									
		$emp=("SELECT `regid` ,debitname, `debitvalue`, `debitnarrtion`, `crdname`, `credvalue`, `crdnarration`, DATE_FORMAT(trans_date,'%d/%m/%Y')  as trans_date  FROM `mandi15` where fid = $fid ") or die(mysql_error());
		$fetch_res = $mysqli->query($emp);
		
		while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
		
		{
		
	?>
<tr class="odd gradeX">

<td style="width:150px;"> <?php  echo $sno  ?></td>

<td style="width:150px;"> <?php  echo $show['trans_date'];  ?></td>
<td style="width:150px;"> <?php  echo $show['debitname'];  ?></td>
<td style="width:200px;"><?php  echo $show['debitvalue'];  ?></td>
<td style="width:150px;"> <?php  echo $show['debitnarrtion'];  ?></td>

<td style="width:150px;"> <?php  echo $show['crdname'];  ?></td>
<td style="width:200px;"><?php  echo $show['credvalue'];  ?></td>
<td style="width:150px;"> <?php  echo $show['crdnarration'];  ?></td>

<td><input type='button' name='btnprint' value='Delete' onclick='deleterecord(<?php echo  $show['regid']?>)'/></td>





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