<!DOCTYPE html>
<?php 
include('db_con.php');
 
?>
 <link href="css/bootstrap.min.css" rel="stylesheet">
          
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
               
			     
                 
				 <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        <!-- /.navbar-static-side -->

        <div id="page-wrapper">
            
            <!-- /.row -->
	
   <div class="row-blue">
                        
   <div class="row">
 <div class="col-lg-12">
 	
 	 
 	
                    <div class="panel panel-default" >
                     <div class="panel-heading" style="background-color:#46b8da;">
					
                     </div>
					   	<div class="row">            </div>
						</br></br>
              
				
		<div class="row">
            	
						</br>
						</br>
						</br>
       
                        <!-- /.panel-heading -->
						<div class="col-lg-8" style="position:relative; top:-90px;min-height:100px;">
						   	<div class="row-blue-inner" style="overflow:hidden;min-height:100px">
                       <div class="panel-body">
                            <div class="table-responsive" >
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Picture</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody >
									<?php	
		$emp=("SELECT `purchaseid`, `p_date`, `vendor_id`, `p_receipt`, `p_type`, `total`, `amount_paid`, `balance`, `p_notes`, `user_ent` FROM `purchase_invoice`") or die(mysql_error());
		$fetch_res = $mysqli->query($emp);
		
		while($show = $fetch_res->fetch_array(MYSQLI_ASSOC))
		
		{
		
	?>
                                        <tr class="odd gradeX" >
<td style="width:20px;padding-left:10px;"><?php  echo $show['purchaseid'];  ?></td>
 <td style="width:200px;"><?php  echo $show['p_date'];  ?></td>
<td> <?php  echo $show['amount_paid'];  ?></td>
										
                                  
                                        </tr>
                                     <?php } ?>
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
          </div>
					
					
					
					
					
					
					
					
					
        </div>
	
	
	
            
            </div>
           
        </div>
      

    </div>
  






    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script><!-- /.modal --><!-- /.modal -->
    <!-- /.modal -->
    </body>
    </html>
