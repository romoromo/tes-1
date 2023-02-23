<?php
//	Template Klasse
//	---------------
//	Diese Klasse ersetzt Variablen in Templates und gibt die Templates
//	anschliessend aus.
//	
//	Im Template müssen die auszutauschenden Texte mit dem unten festgelegten
//	Delimiter beginnen und enden.
//	Auszutauschende Blöcke müssen mit dem in $block_limit festegelegten
//	Delimiter beginnen und enden. Am Anfang des Blocks wird die Zeichenfolge
//	"-start" angehängt, am Ende des Blocks die Zeichenfolge "-end".
//	Beispiel: 
//	%%tplblock-start%%
//	zu ersetzender Text
//	noch mehr Text
//	%%tplblock-end%%
//	In diesem Beispiel würden alle 4 Zeilen durch das übergebene Array
//	ersetzt wobei jeder Satz im Array für eine zu ersetzende Zeile
//	steht.
	
	class template {
	
//	File-Handler für Template-File
		var $tpl_file = "";
		
//	Delimiters für Platzhalter
		var $delimiter="%";
		var $block_limit="{{";
		
//	Mailtext zum versenden von Templates per E-Mail
		var $mailtext="";
		
//	Template einlesen
		function read_file($filename){
			$this->tpl_file=file($filename);
			return $this->tpl_file;
		}
		
//	Platzhalter ersetzen
		function replace($get,$set){
			$this->source=$this->delimiter.$get.$this->delimiter;
			for($i=0;$i<count($this->tpl_file);$i++){
				$this->tpl_file[$i]=str_replace($this->source,$set,$this->tpl_file[$i]);
			};
			return $this->tpl_file;
		}
		function cek_file()
		{
			$file = $this->tpl_file;
			return $file;
		}
		
//	Ausgabe des fertig Templates
		function push(){
			for($i=0;$i<count($this->tpl_file);$i++){
				echo $this->tpl_file[$i];
			};
		}
		
//	Ausgabe des Templates als Email-Text in eine Variable
		function sendToVar(){
			for($i=0;$i<count($this->tpl_file);$i++){
				$this->ausgabe.=$this->tpl_file[$i];
			};
			return $this->ausgabe;
		}
		
//	Löschen des Template-Inhaltes
		function clear(){
			$this->tpl_file=NULL;
		}
		
	}
?>