
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
	     	var strURL="freight_letter_delete.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='freight_letter_view.php';
	
	
	} else {
        x = "You pressed Cancel!";
    }

}


</script>

          
      <h3 align="center" style="background-color:#004D71; margin-top:0px;"><span style="color:#FFFFFF;"><i>FREIGHT DETAILS</i></span></h3>   

        <div id="page-wrapper">
            
            <!-- /.row -->
	
   <div class="row-blue">
                        
   <div class="row">
 

<div class="col-lg-8" style="width:100%">
						   	       <div class="panel-body">
                            <div class="table-responsive" >
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
									<tr> <td colspan = 11 , align = "center">  	<a href="#" onclick="window.open('freight_letter_front.php');"> <input type="button" value="Add NEW" />   </td>  </tr>
                                        <tr  style="background-color:#22B5C1; color:#FFFFFF;">
										      <th>SNO</th>
                                      
                                          	<th>Party Name</th>
											  <th>Broker Name</th>
                                              <th>Jins</th>
											  <th>Truck no </th>
											  <th>Qty</th>
											  <th>Truck Fare</th>
											  <th>Advance</th>
											  <th>Balance</th>
											  <th>Date</th>
											  <th>Print</th>
											  <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody >
									<?php	
									$sno=1;
									
		$emp=("SELECT `id`, `sno`, `mesars`, `t_date`, `p_date`, `broker`, `jins`, `truckno`, `qty`,
		`truck_fare`, `advance`, `balance`, `billno`, `billtyno`, `beema_dec` FROM `freight_letter` order by id desc") or die(mysql_error());
		$fetch_res = $mysqli->query($emp);
		
		while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
		
		{
			$legr_name=$show['mesars'];
			
			$broker=$show['broker'];
			
			$result1 = mysql_query("SELECT `leg_name`, `fac_addr`, `off_addr`
			FROM `ledger_master` where legid  = $legr_name");

                $row1 = mysql_fetch_array($result1);
				
				
				$result1_1 = mysql_query("SELECT `leg_name`, `fac_addr`, `off_addr`
			FROM `ledger_master` where legid  = $broker");

                $row1_1 = mysql_fetch_array($result1_1);
			
			
			
			
			
			
		
	?>
<tr class="odd gradeX">

<td style="width:10px;"> <?php  echo $show['sno'];  ?></td>

<td style="width:500px;"><a href="freight_letter_front_edit.php?id= <?php echo  $show['id']?> "> <?php  echo $row1['leg_name'];  ?></a></td>
<td style="width:150px;"> <?php  echo $row1_1['leg_name'];  ?></td>
<td style="width:50px;"><?php  echo $show['jins'];  ?></td>
<td style="width:50px;"><?php  echo $show['truckno'];  ?></td>
<td style="width:150px;"> <?php  echo $show['qty'];  ?></td>
<td style="width:150px;"><?php  echo $show['truck_fare'];  ?> </td>

<td style="width:150px;"><?php  echo $show['advance'];  ?> </td>
<td style="width:150px;"><?php  echo $show['balance'];  ?></td>

<td style="width:150px;"><?php  echo $show['t_date'];  ?></td>


<td style="width:201px;padding-left:10px;">
<a href="freight_letter_front_view.php?id= <?php echo  $show['id']?> "> PRINT </a>
</td>


<td><input type='button' name='btnprint' value='Delete' onclick='deleterecord(<?php echo  $show['id']?>)'/></td>





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