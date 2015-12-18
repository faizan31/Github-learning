<?php require_once("includes/session.php");?>
<?php require_once("includes/connection.php");?>
<?php require_once("includes/function.php");?>
<?php if (!logged_in()) {redirect_to("login.php");}?>

<?php

/*
$run_qry = 'y';
$query4  = "select d.maincode,cname,count(*) as Records
				from
				(select distinct c.maincode,cname
				from
				(select m.maincode,s.cname 
				from pr_multiple_del m inner join company s on m.maincode = s.maincode ) c)  d
				,price p, trade_symbol t,security s
				where p.marksymbol=t.marksymbol and t.symbol=s.symbol and 
				s.maincode=d.maincode and  p.markcode='RD'
				group by d.maincode";
				//echo $query4;
$result4 = mysql_query ($query4);
$row_count = mysql_num_rows($result4);
if ($row_count == 0) {
$run_qry = 'n';
}*/

// server error message variable to store server site error

$msgchk="";

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<title>Zakhira Database</title>

			<!-- check date format function js file -->
		
        <!-- add for jquery -->

        <script type='text/javascript' src=" /sites/all/modules/graph/jquery-1.4.2.min.js"></script>

		<script type='text/javascript' src=" /sites/all/modules/graph/jquery-ui-1.8.2.custom.min.js"></script>

		 <LINK href=" /sites/all/modules/graph/jquery-ui-1.8.2.custom.css" rel="stylesheet" type="text/css" />
		  <LINK href="css/tblstyle.css" media="all" rel="stylesheet" type="text/css"/>

		      <!-- datepicker and sumbit function in jquery -->

		<script type='text/javascript' src=" /sites/all/modules/graph/jquerydate.js"></script>
		 
  <!--      <LINK href="/drupal/sites/all/modules/graph/fromheader.css" media="all" rel="stylesheet" type="text/css" /> -->


        
	<script type="text/javascript">
			
		</script>
		
		<style>
	thead {background:lightblue;}
	td {width:80px;}
	th {width:80px;}
	.namecol {width:300px;}
	</style>

	</head>

<a href="/dataupload/database.php">Back<a>	
	
<body>

<form id="fld_selc" name= "fld_selc" action="#"  method="POST"  style="background-color:#E8F0F0"> 

<TABLE>

<tr>

<td>

<span> Missing Data </span>

</td>

<td><A href="dulogout.php">Log out</A></td>

</tr>

    </table>                 

  </form>

        <!-- end the form code hear -->

<hr />        

				<div>
				<?php
				$db_con = mysql_connect("localhost","root","urzs007%");
	             mysql_select_db("economy",$db_con);
				?>


				<span id="maincode_title"> Following Companies Data will delete </span><br><br>
				
				
				<?php
				echo "<table>";
				echo "<thead><tr><th> acode</th>
				<th class='namecol'> Dailydate</th>
				
				
				
				</tr> </thead>";
				$rs = mysql_query("CALL proc_daily_missing()");
               while($nt4 = mysql_fetch_array($rs))
			   {
			   echo "<tbody><tr>
					<td align='center'> $nt4[acode]</td>
					 <td align='center'> $nt4[dailydate] </td>
					
					 
					 
					</tr>";
				}
				echo "</tbody></table>";
				?>

				


				</div>
				
<div id="displayview">
<p id="message"> <?php echo $msgchk ; ?> </p>
</div>
<div id="status"></div>

    </html>

