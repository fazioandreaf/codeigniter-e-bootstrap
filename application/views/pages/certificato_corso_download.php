	<div class="certificato" >
			<h4>Certificato del corso</h4>
			<h1><?php  echo strtoupper($corso[0]->titolo[0]).substr($corso[0]->titolo,1)?></h1>
			<p><?php  echo $corso[0]->descrizione?></p>
		<div>
				<h2>Utente iscritto al corso</h2>
				<table>
					<tr>
						<th style="text-align:right">Nome</th><th style="text-align:left">cognome</th>
					</tr>
					<tr>
						<td  style="text-align:right"><?php  echo $test[0]->nome?></td><td style="text-align:left"><?php  echo $test[0]->cognome?></td>
					</tr>
				</table>
				<table>
					<tr>
						<th style="text-align:right">Eta</th><th style="text-align:left">Genere</th>
					</tr>
					<tr>
						<td style="text-align:right"><?php  echo $test[0]->eta?></td><td style="text-align:left"><?php  echo $test[0]->genere?></td>
					</tr>
				</table>
				<!-- <div class="utente">
					<span style="width:50vw;"  >
						<span>Nome</span> <br>
						<span>
							<?php  echo $test[0]->nome?>
						</span></span><br>
					<span style="width:50vw;"  >
						<span>Cognome</span> <br>
						<span>
							<?php  echo $test[0]->cognome?>
						</span></span><br>
					<span style="width:50vw;"  >
						<span>Eta</span> <br>
						<span>
							<?php  echo $test[0]->eta?>
						</span></span><br>
					<span style="width:50vw;"  >
						<span>Genere</span> <br>
						<span>
							<?php  echo $test[0]->genere?>
						</span></span><br>
				</div> -->
		</div>
	</div>

	<div class="form" >
	 <?php
			// $filename='/upload/'.$test[0]->id.'-'.$corso[0]->id.'.pdf';
			$filename='/upload/'.$test[0]->id.'-'.$corso[0]->id.'.pdf';
			//  echo $filename;
				// header("Content-Length: " . filesize($filename));

			if(!$stampa){
				if(!file_exists('.'.$filename)){
					if (!empty($paragrafo) && $stampa)
						echo $paragrafo;
						else{
							echo form_open_multipart('/test/appendpdf/'.$test[0]->id.'/'.$corso[0]->id,'method="post" enctype="multipart/form-data" ');
							echo '<label for="file">File</label><input type="file" name="pdf" id="pdf" value="pdf"/>';
							echo '<input style="margin-bottom:1rem" class="mt-4 p-2" type="submit" name="submit" value="Append pdf" >';			 
							echo form_close();
					}
				}else
					echo '<strong>Hai inserito gi?? un pdf</strong>: '.$filename;
			}else{
				echo 'inserire il file';
			}
		?>
	</div>
