<?php	
	function texto_estado(int $valor){
		switch($valor){
			case PHP_SESSION_DISABLED:
				return 'PHP_SESSION_DISABLED';
			case PHP_SESSION_NONE:
				return 'PHP_SESSION_NONE';
			case PHP_SESSION_ACTIVE:
				return 'PHP_SESSION_DISABLED';
		}
		return '?';		
	}
	echo 'Antes de session_start(): ',
	texto_estado(session_status()),"<br>\n";
	session_start();
	echo 'Después de session_start(): ',
	texto_estado(session_status()),"<br>\n";
	session_destroy();
	echo 'Después de session_destroy(): ',
	texto_estado(session_status()),"<br>\n";
?>
