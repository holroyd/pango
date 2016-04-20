<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h1>Footer</h1>
	<?php foreach($scripts_to_load as $script):?>
		<?php if (strripos($script,".js")) :?>
			<script type='text/javascript' src = '../../js/<?= $script ?>'></script>
		<?php elseif (strripos($script,".css")) :?>
			<link rel="stylesheet" type="text/css" href="../../css/<?= $script ?>" />
		<?php endif; ?>
	 <?php endforeach; ?>
</body>
	
</html>