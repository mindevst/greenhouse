<?php
include_once("init.php");

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>POSNIC - Add Stock Category</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/date_pic/date_input.css">
        <link rel="stylesheet" href="lib/auto/css/jquery.autocomplete.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<?php include_once("tpl/common_js.php"); ?>
	<script src="js/script.js"></script>  
        <script src="js/date_pic/jquery.date_input.js"></script>  
        <script src="lib/auto/js/jquery.autocomplete.js "></script>  
 
		<script>
	/*$.validator.setDefaults({
		submitHandler: function() { alert("submitted!"); }
	});*/
	$(document).ready(function() {
		$("#supplier").autocomplete("supplier1.php", {
		width: 160,
		autoFill: true,
		selectFirst: true
	});
		$("#category").autocomplete("category.php", {
		width: 160,
		autoFill: true,
		selectFirst: true
	});
		// validate signup form on keyup and submit
		$("#form1").validate({
			rules: {
				name: {
					required: true,
					minlength: 3,
					maxlength: 200
				},
				stockid: {
					required: true,
					minlength: 3,
					maxlength: 200
				},
				cost: {
					required: true,
					
				},
				sell: {
					required: true,
					
				}
			},
			messages: {
				name: {
					required: "Ingrese nombre de especie",
					minlength: "Minimo 3 caracteres"
				},
				stockid: {
					required: "Inventario id,"
					minlength: "Minimo 3 caracteres"
				},
				sell: {
					required: " Ingrese precio de salida",
					minlength: "Minimo 3 caracteres"
				},
				cost: {
					required: "Ingrese precio",
					minlength: "Minimo 3 caracteres"
				}
			}
		});
	
	});
function numbersonly(e){
        var unicode=e.charCode? e.charCode : e.keyCode
        if (unicode!=8 && unicode!=46 && unicode!=37 && unicode!=38 && unicode!=39 && unicode!=40 && unicode!=9){ //if the key isn't the backspace key (which we should allow)
        if (unicode<48||unicode>57)
        return false
    }
    }
	</script>
	</script>

</head>
<body>

	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar.php"); ?>
	<!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
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
			<a href="#" id="company-branding-small" class="fr"><img src="<?php if(isset($_SESSION['logo'])) { echo "upload/".$_SESSION['logo'];}else{ echo "upload/posnic.png"; } ?>" alt="Point of Sale" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>Inventario</h3>
				<ul>
					<li><a href="add_stock.php">Agregar Especie</a></li>
					<li><a href="view_product.php">Ver Especies</a></li>
					<li><a href="add_category.php">Agregar Familia botánica</a></li>
					<li><a href="view_category.php">Ver Familia botánica</a></li>
					<li><a href="view_stock_availability.php">Ver Disponibilidad</a></li>
				
                                  
                                </ul>
                               
                                
			</div> <!-- end side-menu -->
                        
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Add Stock </h3>
						<span class="fr expand-collapse-text">Click para colapsar</span>
                                                <div style="margin-top: 15px;margin-left: 150px"></div>
						<span class="fr expand-collapse-text initial-expand">Click para expandir</span>
					
					</div> <!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				
							
					<?php
					//Gump is libarary for Validatoin
					
					if(isset($_POST['name'])){
					$_POST = $gump->sanitize($_POST);
					$gump->validation_rules(array(
						'name'    	  => 'required|max_len,100|min_len,3',
						'stockid'     => 'required|max_len,200',
						'sell'     => 'required|max_len,200',
						'cost'     => 'required|max_len,200',
						'supplier'     => 'max_len,200',
						'category'     => 'max_len,200'

					));
				
					$gump->filter_rules(array(
						'name'    	  => 'trim|sanitize_string|mysql_escape',
						'stockid'     => 'trim|sanitize_string|mysql_escape',
						'sell'     => 'trim|sanitize_string|mysql_escape',
						'cost'     => 'trim|sanitize_string|mysql_escape',
						'category'     => 'trim|sanitize_string|mysql_escape',
						'supplier'     => 'trim|sanitize_string|mysql_escape'

					));
				
					$validated_data = $gump->run($_POST);
					$name 		= "";
					$stockid 	= "";
					$sell           = "";
					$cost    	= "";
					$supplier 	= "";
					$category 	= "";
			

					if($validated_data === false) {
							echo $gump->get_readable_errors(true);
					} else {
						
						
							$name=mysql_real_escape_string($_POST['name']);
							$stockid=mysql_real_escape_string($_POST['stockid']);
							$sell=mysql_real_escape_string($_POST['sell']);
							$cost=mysql_real_escape_string($_POST['cost']);
							$supplier=mysql_real_escape_string($_POST['supplier']);
							$category=mysql_real_escape_string($_POST['category']);
							
						
						$count = $db->countOf("stock_details", "stock_name ='$name'");
		if($count>1)
			{
	        $data='Registro duplicado!';
                                            $msg='<p style=color:red;font-family:gfont-family:Georgia, Times New Roman, Times, serif>'.$data.'</p>';//
                                            ?>
                                                    
 <script  src="dist/js/jquery.ui.draggable.js"></script>
<script src="dist/js/jquery.alerts.js"></script>
<script src="dist/js/jquery.js"></script>
<link rel="stylesheet"  href="dist/js/jquery.alerts.css" >
                                                  
                                            <script type="text/javascript">
	
					jAlert('<?php echo  $msg; ?>', 'POSNIC');
			
</script>
                                                        <?php
			}
			else
			{
				
			if($db->query("insert into stock_details(stock_id,stock_name,stock_quatity,supplier_id,company_price,selling_price,category,campo) values('$stockid','$name',0,'$supplier',$cost,$sell,'$category','algo2')"))
			{ 
				$db->query("insert into stock_avail(name,quantity) values('$name',0)");
                                  $msg=" $name Agregado en base de datos" ;
				header("Location: add_stock.php?msg=$msg");
                        }else
			echo "<br><font color=red size=+1 >Problem in Adding !</font>" ;
			
			}
			
			
			}
							
							}
						
				if(isset($_GET['msg'])){
                                             $data=$_GET['msg'];
                                            $msg='<p style=color:#153450;font-family:gfont-family:Georgia, Times New Roman, Times, serif>'.$data.'</p>';//
                                            ?>
                                                    
 <script  src="dist/js/jquery.ui.draggable.js"></script>
<script src="dist/js/jquery.alerts.js"></script>
<script src="dist/js/jquery.js"></script>
<link rel="stylesheet"  href="dist/js/jquery.alerts.css" >
                                                  
                                            <script type="text/javascript">
	
					jAlert('<?php echo  $msg; ?>', 'POSNIC');
			
</script>
                                                        <?php
                                         }
				
				?>
				
				<form name="form1" method="post" id="form1" action="">
                  
                
                  <table class="form"  border="0" cellspacing="0" cellpadding="0">
                    <tr>
                          <?php
					  $max = $db->maxOfAll("id", "stock_details");
					  $max=$max+1;
					  $autoid="SD".$max."";
					  ?>
                      <td><span class="man">*</span>ID:</td>
                      <td><input name="stockid" type="text" id="stockid" readonly="readonly" maxlength="200"  class="round default-width-input" value="<?php echo $autoid; ?>" /></td>
                       
                      <td><span class="man">*</span>Especie:</td>
                      <td><input name="name"placeholder="Ingrese especie" type="text" id="name" maxlength="200"  class="round default-width-input" value="<?php echo $name; ?>" /></td>
                       
                    </tr>
                    <tr>
                      <td><span class="man">*</span>Costo:</td>
                      <td><input name="cost" placeholder="Ingrese precio" type="text" id="cost"  maxlength="200"  class="round default-width-input" onkeypress="return numbersonly(event)" value="<?php echo $cost; ?>" /></td>
                       
                      <td><span class="man">*</span>Salida:</td>
                      <td><input name="sell" placeholder="Ingrese precio de Salida" type="text" id="sell" maxlength="200"  class="round default-width-input" onkeypress="return numbersonly(event)" value="<?php echo $sell; ?>" /></td>
                       
                    </tr>
                    <tr>
                      <td>Proveedor:</td>
                      <td><input name="supplier" placeholder="Ingrese nombre de proveedor" type="text" id="supplier"  maxlength="200"  class="round default-width-input" value="<?php echo $supplier; ?>" /></td>
                       
                      <td>Familia Botánica:</td>
                      <td><input name="category" placeholder="Ingrese familia botánica " type="text" id="category" maxlength="200"  class="round default-width-input" value="<?php echo $category; ?>" /></td>
                       
                       <!--DAtos botanicos-->
                       <tr>
                       <td>Aréa:</td>
                      <td><input name="area" placeholder="Ingrese area" type="text" id="area" maxlength="200"  class="round default-width-input" value="" /></td>
                       </tr></tr>



                    </tr>
                   
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    
                    
                    <tr>
                      <td>
					 &nbsp;
					  </td>
                      <td>
                        <input  class="button round blue image-right ic-add text-upper" type="submit" name="Submit" value="Agregar">
						(Control + S)
					  
					  <td align="right"><input class="button round red   text-upper"  type="reset" name="Reset" value="Limpiar"> </td>
                    </tr>
                  </table>
                </form>  
						
				
					</div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
				
		
		</div> <!-- end full-width -->
		  	
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">
        
		
	
	</div> <!-- end footer -->

</body>
</html>