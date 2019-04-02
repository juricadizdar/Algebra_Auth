<?php 

	$items = Session::all();
	foreach ($items as $item => $value){
		switch($item){
			case 'success':
			case 'danger':
			case 'warning':
			case 'info':
			?>
				<div class="alert alert-<?php echo $item; ?>" role="alert"><?php echo $value; ?></div>
			<?php
			
			Session::destroy($item);
			break;
		}
	}
