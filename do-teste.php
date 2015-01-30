<?php include "header.php"; ?>
		<section>
			<?php
				$values = $_POST['teste'];
				$resultado = implode(", ", $values);
				echo $resultado;
			?>
		</section>
<?php include "footer.php"; ?>