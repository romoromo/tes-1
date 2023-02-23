<?php
/*
	Source : http://emka.web.id/programming/php/2010/encoding-string-dengan-base64-dengan-key/
	#### Penggunaan
		$key = "k3ySup3r5ecur3";
		$stringhidden = "string yg akan diencrypt";

	// enkripsi dengan fungsi base64_encrypt
		$stringterenkripsi = DMSec::encrypt($stringhidden,$key);
		echo $stringterenkripsi;

	// dekripsi dengan base64_decrypt
		$stringdekripsi = DMSec::decrypt($stringterenkripsi,$key);
		echo $stringdekripsi;
*/

class DMSec extends CApplicationComponent {
	static function encrypt($plain_text, $password, $iv_len = 16)
	{
		// fungsi enkripsi base64 dengan key
		$plain_text .= "\x13";
		$n = strlen($plain_text);
		if ($n % 16) $plain_text .= str_repeat("\0", 16 - ($n % 16));
		$i = 0;
		$enc_text = self::get_rnd_iv($iv_len);
		$iv = substr($password ^ $enc_text, 0, 512);
		while ($i < $n) {
			$block = substr($plain_text, $i, 16) ^ pack('H*', md5($iv));
			$enc_text .= $block;
			$iv = substr($block . $iv, 0, 512) ^ $password;
			$i += 16;
		}
		$hasil=base64_encode($enc_text);
		return str_replace('+', '@', $hasil);
	}

	static function decrypt($enc_text, $password, $iv_len = 16)
	{
		// fungsi base64 decrypt
		// untuk mendekripsi string base64
		$enc_text = str_replace('@', '+', $enc_text);
		$enc_text = base64_decode($enc_text);
		$n = strlen($enc_text);
		$i = $iv_len;
		$plain_text = '';
		$iv = substr($password ^ substr($enc_text, 0, $iv_len), 0, 512);
		while ($i < $n) {
			$block = substr($enc_text, $i, 16);
			$plain_text .= $block ^ pack('H*', md5($iv));
			$iv = substr($block . $iv, 0, 512) ^ $password;
			$i += 16;
		}
		return preg_replace('/\\x13\\x00*$/', '', $plain_text);
	}

	function get_rnd_iv($iv_len)
	{
		$iv = '';
		while ($iv_len-- > 0) {
			$iv .= chr(mt_rand() & 0xff);
		}
		return $iv;
	}

	static function Hex2String($hex){
		$string = NULL;
  	// strip linebreaks and spaces
		$hex = str_replace( array("\n","\r"," "), "", $hex );

		for ( $ix=0; $ix < strlen($hex); $ix=$ix+2 ) {
			$ord = hexdec( substr( $hex, $ix, 2 ) );
			$string .= chr( $ord );
		}

		return $string;
	}

	static function sdenc($encrypted)
	{
		// fungsi untuk decrypt dari kiriman senc JS
		return $dencrypted = strval( strrev( self::Hex2String( base64_decode($encrypted) ) ) );
	}
}
