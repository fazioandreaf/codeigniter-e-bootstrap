<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
	<style>
		.certificato{
			background:lightblue;
			padding:2rem;
			display:flex;
			flex-direction:column;
			align-items:center
			page-break-before: always;
		}
		.certificato .utente{
			display:flex;
			flex-wrap:wrap;
		}
		.certificato {
			text-align:center;
		}
		.certificato .utente span{
			padding:1rem;
			flex-basis:50%
		}
		.certificato .utente span:nth-child(2n+1){
			text-align:right
		}
			.certificato .utente span:nth-child(2n){
			text-align:left
		}
	</style>
<body>
	

