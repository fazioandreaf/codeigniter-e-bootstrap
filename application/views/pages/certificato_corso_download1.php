	<div class="certificato" style="page-break-after: always; text-align:center">
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
