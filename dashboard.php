<?php
include_once("init.php");

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<?php include_once("tpl/common_js.php"); ?>
	<script src="js/script.js"></script>  
</head>
<body>

	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar.php"); ?>
	<!-- end top-bar -->
	<?php include_once("analyticstracking.php") ?>
	
	
		<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width ">
	
			<ul id="tabs" class="fl">
				<li><a href="dashboard.php" class="active-tab dashboard-tab">Panel Principal</a></li>
				<li><a href="view_sales.php" class="sales-tab">Salidas</a></li>
				<li><a href="view_customers.php" class=" customers-tab">Clientes</a></li>
				<li><a href="view_purchase.php" class="purchase-tab">Compras</a></li>
				<li><a href="view_supplier.php" class=" supplier-tab">Proveedores</a></li>
				<li><a href="view_product.php" class=" stock-tab">Inventario</a></li>
				<li><a href="view_payments.php" class="payment-tab">Pagos</a></li>
				<li><a href="view_report.php" class="report-tab">Reportes</a></li>
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
                         <?php $line = $db->queryUniqueObject("SELECT * FROM store_details ");
			$_SESSION['logo']=$line->log; 
			 ?>
                        <a href="#" id="company-branding-small" class="fr"><img src="<?php if(isset($_SESSION['logo'])) { echo "upload/".$_SESSION['logo'];}else{ echo "upload/posnic.png"; } ?>" alt="Point of Sale" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	<br></br>
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>Accesos rapidos</h3>
				<ul>
					<li><a href="add_sales.php">Agregar Salida</a></li>
					<li><a href="add_purchase.php">Agregar Compra</a></li>
					<li><a href="add_supplier.php">Agregar Provedor</a></li>
					<li><a href="add_customer.php">Agregar Cliente</a></li>
					<li><a href="view_report.php">Ver Reporte</a></li>
				</ul>
                                
                                 
			</div> <!-- end side-menu -->
                        
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Estadística</h3>
						<span class="fr expand-collapse-text">Click para colapsar</span>
						<span class="fr expand-collapse-text initial-expand">Click para colapsar</span>
					
					</div> <!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				
							
								<table style="width:350px; float:left;" border="0" cellpadding="0" cellspacing="0">
								  <tr>
									<td width="250" align="left">&nbsp;</td>
									<td width="150" align="left">&nbsp;</td>
								  </tr>
								  <tr>
									<td align="left">Numero de especies</td>
									<td align="left"><?php echo  $count = $db->countOfAll("stock_avail");?>&nbsp;</td>
								  </tr>
								  <tr>
									<td align="left">&nbsp;</td>
									<td align="left">&nbsp;</td>
								  </tr>
								  <tr>
									<td align="left">Total de Salidas</td>
									<td align="left"><?php echo  $count = $db->countOfAll("stock_sales");?></td>
								  </tr>
								  <tr>
									<td align="left">&nbsp;</td>
									<td align="left">&nbsp;</td>
								  </tr>
								  <tr>
									<td align="left">Total de provedores</td>
									<td align="left"><?php echo $count = $db->countOfAll("supplier_details");?></td>
								  </tr>
								  <tr>
									<td align="left">&nbsp;</td>
									<td align="left">&nbsp;</td>
								  </tr>
								  <tr>
									<td align="left">Total de clientes</td>
									<td align="left"><?php echo $count = $db->countOfAll("customer_details");?></td>
								  </tr>
								  <tr>
									<td align="left">&nbsp;</td>
									<td align="left">&nbsp;</td>
								  </tr>
								  <tr>
									<td align="left">&nbsp;</td>
									<td align="left">&nbsp;</td>
								  </tr>
						  </table>
		
						<!--<ul class="temporary-button-showcase">
							<li><a href="#" class="button round blue image-right ic-add text-upper">Add</a></li>
							<li><a href="#" class="button round blue image-right ic-edit text-upper">Edit</a></li>
							<li><a href="#" class="button round blue image-right ic-delete text-upper">Delete</a></li>
							<li><a href="#" class="button round blue image-right ic-download text-upper">Download</a></li>
							<li><a href="#" class="button round blue image-right ic-upload text-upper">Upload</a></li>
							<li><a href="#" class="button round blue image-right ic-favorite text-upper">Favorite</a></li>
							<li><a href="#" class="button round blue image-right ic-print text-upper">Print</a></li>
							<li><a href="#" class="button round blue image-right ic-refresh text-upper">Refresh</a></li>
							<li><a href="#" class="button round blue image-right ic-search text-upper">Search</a></li>
						</ul>-->
				
					</div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
			    
		
		</div> <!-- end full-width -->
			
                </div>
            </div>
        <div>
     
        </div>
	
	<!-- FOOTER -->
	<div id="footer">
	
	
	</div> <!-- end footer -->

</body>
</html>