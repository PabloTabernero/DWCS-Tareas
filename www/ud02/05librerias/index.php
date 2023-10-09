<?php 
include("logo.php");
include("menu.php");
include("pictures.php");
include("content.php");
include("sidebar.php");
include("footer.php");
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
			<title>Web Portal - Includes and requires</title>
			<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
		</head>
		<body>

			<div id="header" class="container">

				<?php 
                    imprimirLogo(); 
                    imprimirMenu();
                ?>

			</div>

			<?php imprimirPictures(); ?>

			<div id="page">
				<div id="bg1">
					<div id="bg2">
						<div id="bg3">
							<?php
                                imprimirContent();
                                imprimirSidebar();
                            ?>
						</div>
					</div>
				</div>
			</div>
			
            <?php imprimirFooter() ?>
		</body>
	</html>