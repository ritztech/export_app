<?php



include("../conf.php");
$fid=41;
$st_1 = '01/04/2015';
$end_1 = '20/05/2015';



$result01 = mysql_query("SELECT a1.transactiondate,a2.stockid,a1.billno,a1.bag1,a1.grossweight1,
a1.billweight,a1.billvalue1,a1.partyname FROM mandia4 a1,stock_ref a2 WHERE 
a1.a4id=a2.formid and a1.transactiondate between STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y')  
and a2.tempid='A4'  and fid=$fid   order by 1 desc");

  
  
  while($row1 = mysql_fetch_array($result01))
  {   
$bal = 0 - $row1[6] ;

$qry1="INSERT INTO ledger_rep(transactiondate, type, stkitm, billvoucher, greqty, billqty, netqty, billed, debit, credit, balance) VALUES 
('$row1[0]','Purchase','$row1[1]','$row1[2]','$row1[3]','','$row1[5]','','','$row1[6]',$bal)";
  
  if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
}




  

  

 


$result18 = mysql_query("SELECT a1.date,a2.stockid,a1.billno,a1.bag1,a1.grossweight1,
a1.billweight,a1.billvalue1,a1.partyname FROM mandia6 a1,stock_ref a2 WHERE a1.siid=a2.formid and a1.date 
between STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y')  
and a2.tempid='A6'  and fid=$fid order by 1 desc");



while($row2 = mysql_fetch_array($result18))
  {   
 $bal = $row2[6] - 0;
 
$qry2="INSERT INTO ledger_rep(transactiondate, type, stkitm, billvoucher, greqty, billqty, netqty, billed, debit, credit, balance) VALUES 
('$row2[0]','Sales','$row2[1]','$row2[2]','$row2[3]','','$row2[5]','','$row2[6]','',$bal)"; 


  if (!mysql_query($qry2,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
}




 
 

 

  
  // **********************************************
  
  
  
$result15= mysql_query("SELECT  suppliername,total,saudadate FROM mandia7 where fid=$fid and saudadate between
 STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y') order by 3 desc");


 
 while($row2 = mysql_fetch_array($result15))
  {   
  $bal = $row2[1] - 0;
 

$qry3="INSERT INTO ledger_rep(transactiondate, type, stkitm, billvoucher, greqty, billqty, netqty, billed, debit, credit, balance) VALUES 
('$row2[2]','Payment','','','','','','','$row2[1]','',$bal)"; 


  if (!mysql_query($qry3,$connection))
  {
  die('Error: ' . mysql_error());
  }

  
}



  // **********************************************

  
  
  
    // **********************************************
  
  
  
$result17= mysql_query("SELECT  suppliername,total,saudadate FROM mandia8 where fid=$fid and 
saudadate between STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y') order by 3 desc");

 
  
   while($row2 = mysql_fetch_array($result17))
  {   
   $bal = 0-$row2[1];
 

$qry4="INSERT INTO ledger_rep(transactiondate, type, stkitm, billvoucher, greqty, billqty, netqty, billed, debit, credit, balance) VALUES 
('$row2[2]','Fund Receipt','','','','','','','','$row2[1]',$bal)"; 


  if (!mysql_query($qry4,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
}




  // **********************************************
  
  
$result19= mysql_query("SELECT date,value from mandi15 where fid=$fid and date 
between STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y') order by 1 desc");

 
  
   while($row2 = mysql_fetch_array($result19))
  {   
   $bal = $row2[1] -0;
 

$qry4="INSERT INTO ledger_rep(transactiondate, type, stkitm, billvoucher, greqty, billqty, netqty, billed, debit, credit, balance) VALUES 
('$row2[0]','Expenses','','','','','','','$row2[1]','',$bal)"; 


  if (!mysql_query($qry4,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
}


 
?>
