
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
	     	var strURL="a7billspayment_delete.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='a7billspayment_view.php';
	
	
	} else {
        x = "You pressed Cancel!";
    }

}


</script>

          
     <h3 align="center" style="background-color:#004D71; margin-top:0px;"><span style="color:#FFFFFF;">BANK Master</span></h3>   

        <div id="page-wrapper">
            
            <!-- /.row -->
	
   <div class="row-blue">
                        
   <div class="row">

   

 
  
 

<div class="col-lg-8"  style="width:100%">
						   	       <div class="panel-body">
                            <div class="table-responsive" >
							
							  Add new   
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
							   

							   <thead>
							   
							            <tr  style="background-color:#22B5C1; color:#FFFFFF;">
										      <th><a href="mybank_add_front.php" ><button class="dropbtn">ADD NEW</button></a></th>
                                      
                                            <th></th>	<th></th> 	<th> </th> 	<th>  </th> 	<th>  </th> 	<th> </th>  
										
											
                                        </tr>
										
                                        <tr  style="background-color:#22B5C1; color:#FFFFFF;">
										      <th>SNO</th>
                                      
                                            <th>Bank name</th>	<th>Account No.</th> 	<th>Account name</th>  
												<th>IFSC</th>    	<th>SWIF</th>   	<th>Branch Address</th>  
										
											
                                        </tr>
                                    </thead>
                                    <tbody >
									<?php	
									$sno=1;
									
									
									
		$emp=("SELECT `bank_id`, `bnkname`, `branchaddr`, `accname`, `accnum`, `ifsc`, `swidt` FROM `mybanks`") or die(mysql_error());
		$fetch_res = $mysqli->query($emp);
		
		while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
		
		{
		
	?>
<tr class="odd gradeX">

<td style="width:50px;"> <?php  echo $sno  ?></td>

<td style="width:150px;"> 
<a href="mybank_add_front_edit.php?id= <?php echo  $show['bank_id']?> ">
 <?php  echo $show['bnkname'];  ?></a></td>
 
 
<td style="width:100px;"> <?php  echo $show['accnum'];  ?></td>
<td style="width:250px;"> <?php  echo $show['accname'];  ?></td>


<td style="width:250px;"> <?php  echo $show['ifsc'];  ?></td>
<td style="width:250px;"> <?php  echo $show['swidt'];  ?></td>
<td style="width:250px;"> <?php  echo $show['branchaddr'];  ?></td>







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