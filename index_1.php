<?php
session_start();
if(isset($_SESSION['uname'])) {
		
if($_SESSION['securitylevel']=="ADMIN")
			{
				echo '<script>window.location="basicform/welcome1.php"</script>';
				//header('Location: basicform/welcome1.php');
				}
				
				else {
					
					echo '<script>window.location="basicform/welcome.php"</script>';
					//header('Location: basicform/welcome.php');
					
				}
				
}

?>
<?php 
$handle = fopen("counter.txt", "r");
if(!$handle){
 echo "could not open the file" ;
}
else {
	$counter = ( int ) fread ($handle,20) ;
	fclose ($handle) ;
	$counter++ ;
	echo" <strong> VISITOR NO ".  $counter . "  " ;
$handle =  fopen("counter.txt", "w" ) ;
fwrite($handle,$counter) ;
fclose ($handle) ;
	}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62306045-1', 'auto');
  ga('send', 'pageview');

</script>
<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
<div id="gutter"></div>
<div id="col4">
  <h2>Welcome to <span style="color:#F17327;">Sunrise Associates</span></h2>
  <blockquote>
    <p><strong><img class="myimage2" src="img/logo.jpg" alt="berries" title="berries" />SUNRISE ASSOCIATE, </strong>&nbsp;is a team of distinguished Advocate and accountant, corporate  financial advisors and tax consultants in Madhya Pradesh India. Our firm of  Computerised accountants represents a coalition of specialized skills that is  geared to offer sound financial solutions and advices. The organization is a  congregation of professionally qualified and experienced persons who are  committed to add value and optimize the benefits accruing to clients.</p>
    <p>&nbsp;</p>
  </blockquote>
  <h2> Company Overview</h2>
  <p>Our client list includes Madhyapradesh and Interstate  entities of various sizes from different industries, Trader And Contractor .  Our team of experienced professionals provide financial solutions in a manner  where client satisfaction is top priority.</p>
  <p><strong><u>Accounting outsourcing : </u></strong>A refinance allows you  to take out new personal loansthat pay off your current mortgage. Although you  are then obligated to make payments on the new top up card loan, your costs  typically are lower after refinancing.<br />
    In today&rsquo;s  scenario of globalization and technology convergance, the process of doing  business has been redefined. Outsourcing various processes makes a lot of  business sense. Most businesses and large companies are outsourcing their  accounting processes for better management of their finances,and time etc.<br />
    These  services are structured to suit an individual client&rsquo;s needs and requirements.  Some of the accounts outsourcing services offered by,Accounting Outsourcing  Company are as under:<br />
    <strong><u>Book keeping and  General Accounting Service</u></strong> <br />
    The service  involves preparing and maintaining day to day bookkeeping and monthly or  quarterly management accounts.These books are prepared as per the US GAAP  accounting standards and can also be made as per specific client instructions.<br />
    <strong><u>Preparation of  Financial Statements</u></strong> <br />
  The service  involves preparing a company&rsquo;s annual accounts and schedules ready for the  statutory annual audit.</p>
  <p><em><strong><u>SERVICE TAX</u></strong></em> <br />
    Service tax is a central tax, which has  been imposed on certain services and is the latest addition to the genus of  indirect taxes like customs and central excise duty. India, a developing  country, was somewhat slow in discovering the potential of this kind of  indirect taxation for enhancement of revenue collection and it was the Finance  Act 1994 that first introduced the service tax provisions through its Chapter  V. Service Tax is collected by Central Excise Department.<br />
  <em><strong><u>Some of our services include :</u></strong></em> <br />
  &bull; Compiling and calculating the net service  tax on output services after taking benefit of Cenvat Credits.<br />
  &bull; Compiling the data of Cenvat Credits for  service tax.<br />
  &bull; Preparing &amp; Filing of Service tax  Returns.<br />
  &bull; Advising on the issues relating to  Service tax.<br />
  &bull; Consultancy on the maintenance of  prescribed records.<br />
  &bull; Tax Planning as regards the minimization  of Service Tax Liabilit<br />
  <em><strong><u>VALUE ADDED TAX (VAT)</u></strong></em> <br />
  &ldquo;Value Added Tax&rdquo; (VAT) is a tax on value  addition and a multi point tax, which is levied at every stage of sale. It is  collected at the stage of manufacture/resale and contemplates rebating of tax  paid on inputs and purchases.<br />
    Some of our VAT related services include :<br />
  &bull; Rendering assistance in registration  under VAT<br />
  &bull; Assistance in claiming input tax credit<br />
  &bull; Assistance in furnishing tax returns and  claiming refunds<br />
  &bull; Advice on the legal aspects of VAT<br />
  &bull; Rendering advice on the wide range of  issues in relation to tax invoices and retails invoices<br />
  &bull; Internal Audit and Compliance Reviews<br />
  &bull; Helping with audit of accounts necessary  for a registered dealer</p>
  <p><strong>Direct Tax Consultancy</strong> <br />
    Direct tax  consultancy together with innovative tax efficient strategies, provided by us  form an integral part of viable business decisions. These help our clients  attain the desired goals. We adopt a &ldquo;result oriented approach&rdquo; which is  flexible and emphasizes delivery and value. It enhances the effect of  commercially viable decisions and minimizes the tax burden.</p>
</div>
<div id="col3">
  <?php include('include/rightmenu.php');?>
</div>
<?php include('include/footer.php');?>
</body>
</html>
