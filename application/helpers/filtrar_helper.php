<?php
	function filtrarCodigoTipoPonto($nome) {
		switch ($nome) {
			case 'Inicio expediente':
				return 1;
				break;
			case 'Saida Almoço':
				return 2;
				break;
			case 'retorno almoço':
				return 3;
				break;
			default:
				return 4;
				break;
		}
	}
