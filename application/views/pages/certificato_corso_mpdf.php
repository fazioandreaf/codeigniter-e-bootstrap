
<!--mpdf  ob_start();mpdf-->

<span>
	ciaooooooo
	<?php
	// echo '<pre>';
	// 	var_dump($test[0]);
	// 	var_dump($corso[0]);
	// echo '</pre>';

	?>
</span>

<!--mpdf  $html = ob_get_contents();
		ob_end_clean();mpdf-->

<a href="/test/certificato_corso_mpdf_download/<?php echo  $test[0]->id.'/'.$corso[0]->id;?> ">
	<button>download</button>
</a>
