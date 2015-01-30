<?php include "header.php"; ?>
		<section>
			<form action="do-teste.php" method="POST">
				<?php
					$sql = mysql_query("SELECT * FROM profissionais");
					while ($linha = mysql_fetch_array($sql)) {
						$profissional = $linha['nome'];
						echo "<input type='checkbox' name='profissionais[]' value='".$profissional."'>".$profissional;
						echo "<br />";
					}
				?>
				<input type="submit" value="Enviar">
			</form>
		</section>
<?php include "footer.php"; ?>