<!DOCTYPE html>
<html lang="fr">
	<head>
		<title> MarketPlace </title>

	</head>
	<!------------------------------------------>
	<?php
		$penPrice = 2;
		$watchPrice = 10;
		session_start();
		//session_destroy();
			if(isset($_POST['add'])){
				if(!isset($_SESSION['panier'])){
					$_SESSION['panier'] = array();
					$_SESSION['panier'][$_POST['name']] = array();
				}
				if(isset($_SESSION['panier'][$_POST['name']]) && !empty($_SESSION['panier'][$_POST['name']])){
					$_SESSION['panier'][$_POST['name']]['quantity'] += $_POST['amount'];
				}
				else{
					$_SESSION['panier'][$_POST['name']]['name'] = $_POST['name'];
					$_SESSION['panier'][$_POST['name']]['quantity'] = $_POST['amount'];
					$_SESSION['panier'][$_POST['name']]['price'] = $_POST['price'];				
				}
			}
			if(isset($_POST['remove'])){
				if(isset($_SESSION['panier'][$_POST['name']]) && !empty($_SESSION['panier'][$_POST['name']])){
					$_SESSION['panier'][$_POST['name']]['quantity'] -= $_POST['amount'];
					if ($_SESSION['panier'][$_POST['name']]['quantity'] <= 0){
						unset($_SESSION['panier'][$_POST['name']]);
					}
				}
				
			}
	?>
	<!------------------------------------------>
	<body>
		<div id="Navbar">
			<?php
				include 'Nav.php';
			?>	
		</div>

		<div class="row">
		
			<div class="Article col-md-9 col-sm-10">
				<div class="Produit col-md-12 row">
					<h3 class="col-md-12">Stylo</h3>

					<div class="imgProduit col-lg-3 col-md-4 col-sm-6">
						<img src="http://perso-etudiant.u-pem.fr/~jtruon02/Test/Image/Stylo.jpg" alt="">
					</div>

					<div class="Description col-md-8 col-sm-6">
						<p>
							Via et quo logikh semel dividendo quae philosophiae si vero quaerendi sit iste ut putat non esse si sensibus quo tradit solvantur modo semel logikh ostendit partiendo ostendit in vero semel est ponit captiosa quae iudicia est quibus quo omne plane sensibus plane solvantur quae putat in falsi iste via.
						</p>
						<p class="prix"> Prix : <?php echo $penPrice; ?> euros.</p>

						<form method="POST" action="#"> Quantité : 
							<input type="number" name="amount" step="1" min="1" value="1">
							<input type="text" name="name" style="display: none;" value="Stylo">
							<input type="text" name="price" style="display: none;" value=<?php echo "'".$penPrice."'";?>>
							<br/><br/>
							<input class="add" type="submit" name="add" value="Ajouter">
							<input class="remove" type="submit" name="remove" value="Retirer">
						</form>

					</div>
				</div>
				<!------------------------------------------>
				<hr width="100%" size="2" color="black">
				<!------------------------------------------>

				<div class="Produit col-md-12 row">
					<h3 class="col-md-12" >Montre</h3>
						<div class="imgProduit col-lg-3 col-md-4 col-sm-6">
							<img src="http://perso-etudiant.u-pem.fr/~jtruon02/Test/Image/Montre.jpg" alt="">
						</div>
						<div class="Description col-md-8 col-sm-6">
							<p>
								Via et quo logikh semel dividendo quae philosophiae si vero quaerendi sit iste ut putat non esse si sensibus quo tradit solvantur modo semel logikh ostendit partiendo ostendit in vero semel est ponit captiosa quae iudicia est quibus quo omne plane sensibus plane solvantur quae putat in falsi iste via.
							</p>
							<p class="prix">
								Prix : <?php echo $watchPrice; ?> euros.
							</p>
						<form method="POST" action="#"> Quantité : 
							<input type="number" name="amount" step="1" min="1" value="1">
							<input type="text" name="name" style="display: none;" value="Watch">
							<input type="text" name="price" style="display: none;" value=<?php echo "'".$watchPrice."'";?>>
							<br/><br/>
							<input class="add" type="submit" name="add" value="Ajouter">
							<input class="remove" type="submit" name="remove" value="Retirer">
						</form>

						</div>

				</div>
		
			</div>

			<div class="Cart col-md-3 col-sm-2">
				<h3 class="titre"> Panier </h3>
				<!------------------------------------------>
				<?php
					if(isset($_SESSION['panier'])){
						$total = 0;
						foreach($_SESSION['panier'] as $item){
							echo "<br/>".$item['name']." x ".$item['quantity']." = ".($item['price']*$item['quantity'])."€";
							$total += $item['price']*$item['quantity'];
						}
						echo '
				<hr width="100%" size="1" color="grey" style="opacity:0.5">';
						echo "Total : ".$total."€";
					}
				?>
				<!------------------------------------------>
			</div>

		</div>
	</body>

</html>