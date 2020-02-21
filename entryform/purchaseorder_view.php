
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
          
     <h3 align="center" style="background-color:#004D71; margin-top:0px;"><span style="color:#FFFFFF;"><I>PURCHASE ORDER DETAILS</I></span></h3>   

        <div id="page-wrapper">
            
            <!-- /.row -->
	
   <div class="row-blue">
                        
   <div class="row" >
 

<div class="col-lg-8" style="width:100%">
						   	       <div class="panel-body">
                            <div class="table-responsive" >
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr  style="background-color:#22B5C1; color:#FFFFFF;">
										                                             <th>SNO</th>
                                      
                                            <th>Supplier Name</th>
											<th>Broker Name</th>
                                            
                                              <th>Delivery due date</th>
											  <th>Payment Terms</th>
											  <th>Mode of supply</th>
											  <th>Sauda date</th>
											  <th>Edit/View</th>
											  <th>Delete</th>
										
											
                                        </tr>
                                    </thead>
                                    <tbody >
									<?php	
									$sno=1;
									
		$emp=("SELECT `poid`, `suppliername`, `brokername`, `deleveryduedate`, `paymentterms`, `modeofsupply`, `saudadate`, `status` FROM `purchase_order`  where fid = $fid order by poid desc") or die(mysql_error());
		$fetch_res = $mysqli->query($emp);
		
		while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
		
		{
		
	?>
<tr class="odd gradeX">

<td style="width:150px;"> <?php  echo $sno  ?></td>

<td style="width:150px;"> <?php  echo $show['suppliername'];  ?></td>
<td style="width:150px;"> <?php  echo $show['brokername'];  ?></td>
<td style="width:200px;"><?php  echo $show['deleveryduedate'];  ?></td>
<td style="width:150px;"> <?php  echo $show['paymentterms'];  ?></td>
<td style="width:150px;"> <?php  echo $show['modeofsupply'];  ?></td>
<td style="width:150px;"> <?php  echo $show['saudadate'];  ?></td>

<td style="width:201px;padding-left:10px;">
<a href="purchaseorder_edit.php?poid= <?php echo  $show['poid']?> "> Edit/Full View </a>
</td>


<td><input type='button' name='btnprint' value='Delete' onclick='deleterecord($poid)'/></td>





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