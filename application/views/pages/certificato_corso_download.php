	<div class="certificato" style="page-break-after: always; text-align:center;background:red;">
			<h4>Certificato del corso</h4>
			<h1><?php  echo strtoupper($corso[0]->titolo[0]).substr($corso[0]->titolo,1)?></h1>
			<p><?php  echo $corso[0]->descrizione?></p>
		<div>
				<h2>Utente iscritto al corso</h2>
				<div class="utente">
					<span>
						<h3>Nome</h3>
						<?php  echo $test[0]->nome?></span>
					<span>
						<h3>Cognome</h3>
						<?php  echo $test[0]->cognome?></span>
					<span>
						<h3>Eta</h3>
						<?php  echo $test[0]->eta?></span>
					<span>
						<h3>Genere</h3>
						<?php  echo $test[0]->genere?></span>
				</div>
		</div>
	</div>

	<div class="form" style="display:flex; flex-direction:column; align-items:center; justify-content:space-evenly">
	 <?php
			// $filename='/upload/'.$test[0]->id.'-'.$corso[0]->id.'.pdf';
			$filename='/upload/prova.png';
			//  echo $filename;
				// header("Content-Length: " . filesize($filename));

			if(!file_exists('.'.$filename)){
				if (!empty($paragrafo))
					echo $paragrafo;
					else{
						echo form_open_multipart('/test/appendpdf/'.$test[0]->id.'/'.$corso[0]->id,'method="post" class="d-flex flex-column align-items-center justify-content-evenly" enctype="multipart/form-data" ');
						echo '<label for="file">File</label><input type="file" name="pdf" id="pdf" value="pdf"/>';
						echo '<input style="margin-bottom:1rem" class="mt-4 p-2" type="submit" name="submit" value="Append pdf" >';			 
						echo form_close();
				}
			}else
				echo '<img src="'.$filename.'" alt="ola" style="width:100px;height:100px">';
				// echo $filename;
				//  echo '<div>
				//  	<object data="'.$filename.'" type="application/pdf" width="300" height="200">
				//  	<a href="'.$filename.'">test.pdf</a>
				//  	</object>
				//  </div>';
				//  echo '<iframe src="'.$filename.'" width="50%" style="height:400px;margin-top:1re,"></iframe>';
		?>
		<img src="/upload/prova.png" alt="ciaoooo" style="width:100px;height:100px">
	</div>
