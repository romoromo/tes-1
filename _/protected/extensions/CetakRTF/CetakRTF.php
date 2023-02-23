<?php 
	/**
	* Suryo Prasetyo W <the.oyrus@gmail.com>
	* Extension untuk mereplace template RTF
	*/
	class CetakRTF extends CApplicationComponent
	{
		public $handle;
		public $content;
		public $arraydatabaru;
		public $filenya;

		public function init()
		{
			parent::init();
			$dir = dirname(__FILE__);
	        $alias = md5($dir);
	        Yii::setPathOfAlias($alias,$dir);
	        
		}

		public function loadFileRTF($pathfile)
		{
			$this->filenya = $pathfile;
			if ( file_exists($pathfile) ) {
				$this->handle = fopen ($this->filenya, 'r');
				$this->content = fread($this->handle, filesize($this->filenya));
				//echo "loaded";
			} else
				echo "rtf not found";
		}

		public function setData(array $arraydatanya)
		{
			/*$arraydatanya = array
			(
			 '$tbldaftarrencanasurvey_nomorizin' => ,
			 '$tbldaftarrencanasurvey_tglizin' => $img->getContent(),
			 '$tbldaftarrencanasurvey_pemilikizin' => $account->date,
			 '$tbldaftarrencanasurvey_lokasi' => $account->link
			);*/

			$this->arraydatabaru = $arraydatanya;
		}

		public function getData()
		{
			print_r($this->arraydatabaru);
		}

		public function mulaiGanti()
		{
			// mulai ganti setiap datanya
			foreach($this->arraydatabaru as $from => $to) {
				if (substr($to, 0,4) =='img-') {
					Yii::import('ext.CetakRTF.CImageHex');
					$namaimg = '/'.substr($to, 5,strlen($to));
					$gambar = new CImageHex($namaimg,100,100);
					$to = $gambar->getContent();
				}
				$this->content = str_replace($from, $to, $this->content);
			   //echo "replaced ".$from." to ".$to;
			}

			//echo $this->content;
		}

		public function simpanFile($namabaru)
		{
			file_put_contents($this->filenya, $this->content);
			fclose($this->handle);

		}

		public function getFile($namanya)
		{
			return Yii::app()->getRequest()->sendFile($namanya, $this->content,'application/rtf');
			Yii::app()->end();
			/*header('Pragma: public');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header("Content-type: application/rtf");
                header("Content-Disposition: attachment; filename=\"$namanya\"");
                header('Content-Transfer-Encoding: binary');
                    echo $this->content;*/
		}

		public function align($where = 'left')
		{
			$alignment = "";
			switch ( strtolower ($where) )
			{
				case 'left': 		$alignment = "\\ql ";	break;
				case 'center':		$alignment = "\\qc ";	break;
				case 'right':		$alignment = "\\qr ";	break;
				case 'justify':	    $alignment = "\\qj ";	break;
				default:			$this->align('left');		break;
			}
			return $alignment;
		}

		public function addRow()
		{
			return "{\\trowd\\trgaph144";
		}

		public function endRow()
		{
			return "\\row}";
		}

		/**
	     * Method untuk membuat cell sebuah tabel
	     * @arg1		text
	     * @arg2		size of the cell
		 * @arg3		keyword  (left|center|right|justify)
		 * @return		string
	     */
		public function addCell($txt, $sizeCell, $align="left")
		{
			$cell = "";
			### kalkulasi ukuran cell
			//$sizeCell = (10800*($sizeCell/100)) + $this->previousResult;
			//karena 100% nya tabel adalah 10000
			$sizeCell = $sizeCell*100; // dikalikan 100
			//$this->previousResult = $sizeCell;

			### Assemble the cells of the table (the sum of the sizes of the cells should not exceed 21,600)
			$cell .= "\\cellx".$sizeCell."\n";

			$cell .= "\\pard \\intbl ";
			//$cell  .= $this->align($align);
			$cell .= $txt." \\cell\n";

			return $cell;
		}

		/*new method to loop data*/

		public function cetakLoop($DT, $arrSplit=array('start'=>'#start#','stop'=>'#stop#'))
		{
			error_reporting(0);
			$konten = '';
			$template = $this->content;

			$result = $DT['result'];
			$arraydata = $DT['arraydata'];
			//print_r($arraydata);die();

			$pecah = explode($arrSplit['start'], $template);

			$bersih1 = $pecah[1];

			$pecah2 = explode($arrSplit['stop'], $bersih1);

			$clean_tabel = $pecah2[0];
			$clean_tabel = str_replace("\par ", "", $clean_tabel);
			$clean_tabel = str_replace("\pard ", "", $clean_tabel);
			$clean_tabel = str_replace("\\tab ", "", $clean_tabel);
			//die();

			// mulai looping data
			$tabel = "";

			//foreach ($result as $row) {
				foreach ($arraydata as $row =>$arr) {
					$tmp_tabel = $clean_tabel;
					foreach ($arr as $variabel => $isian) {
						//var_dump($isian);
						$tmp_tabel = str_replace($variabel, $isian, $tmp_tabel);
					}
					//echo $variabel.'=>'.$isian;
					$tabel .= $tmp_tabel;
				}
				//exit();

			//}

			$document = $tabel;

			$konten = $pecah[0];
			$konten .= $document;
			$konten .= $pecah2[1];

			/*timpa ulang data*/

			$this->content = $konten;
		}

		public function createRtfImage($pathImage, $size = array())
		{
			$b=fopen($pathImage,"rb"); 

			$imgData=getimagesize($pathImage); 
			$scalex = 100;
			$scaley = 100;

			if (count($size)>0) {
				// $size['width'] & $size['height'] is in cm
				// $size['scalex'] & $size['scaley'] is in %
				//  1 cm = 565 aprox (564,971)  satuan Picture RTF
				// so multiply with cm
				$imgData[0] = ( isset($size['width']) && $size['width']!=0 ) ? $size['width'] * 565 : $imgData[0];
				$imgData[1] = ( isset($size['height']) && $size['height']!=0 ) ? $size['height'] * 565 : $imgData[1];
				$scalex = (isset($size['scalex']) && $size['scalex']!=0) ? intval($size['scalex']) : 100; //default = 100
				$scaley = (isset($size['scaley']) && $size['scaley']!=0) ? intval($size['scaley']) : 100; //default = 100

				$imgData[0] = intval($imgData[0]);
				$imgData[1] = intval($imgData[1]);
			}
			//print_r($imgData);print_r($size);Yii::app()->end();


			$newImagePre="{\\*\\shppict{\\pict \\jpegblip \\picw".$imgData[0]." \\pich".$imgData[1]."\\picwgoal".$imgData[0]."\\pichgoal".$imgData[1]."\\picscalex".$scalex."\\picscaley".$scaley." \\wbmbitspixel24 "; 
			//echo $newImagePre;Yii::app()->end();
			$newImage='';
			while (!feof($b)) { 
				$newImage.= fgets($b); 
			} 
			$hex=bin2hex($newImage);
			$imgData=$newImagePre.$hex."}}";
		    //echo $imgData;
		    //die();
			//insert img to rtf

			return $imgData;
		}

		public function addBarcode($text, $size = array())
		{
			Yii::import('ext.Barcode39');
			$path = dirname(Yii::app()->basePath).'/assets/'; // letakkan di foler assets
			$bc = new Barcode39($text);
			$bc->draw($path."barcode.png");

			$b=fopen($path."barcode.png","rb"); 

			$imgData=getimagesize($path."barcode.png"); 
			$scalex = 100;
			$scaley = 100;

			if (count($size)>0) {
				// $size['width'] & $size['height'] is in cm
				// $size['scalex'] & $size['scaley'] is in %
				//  1 cm = 565 aprox (564,971)  satuan Picture RTF
				// so multiply with cm
				$imgData[0] = ( isset($size['width']) && $size['width']!=0 ) ? $size['width'] * 565 : $imgData[0];
				$imgData[1] = ( isset($size['height']) && $size['height']!=0 ) ? $size['height'] * 565 : $imgData[1];
				$scalex = (isset($size['scalex']) && $size['scalex']!=0) ? intval($size['scalex']) : 100; //default = 100
				$scaley = (isset($size['scaley']) && $size['scaley']!=0) ? intval($size['scaley']) : 100; //default = 100

				$imgData[0] = intval($imgData[0]);
				$imgData[1] = intval($imgData[1]);
			}
			//print_r($imgData);print_r($size);Yii::app()->end();


			$newImagePre="{\\*\\shppict{\\pict \\jpegblip \\picw".$imgData[0]." \\pich".$imgData[1]."\\picwgoal".$imgData[0]."\\pichgoal".$imgData[1]."\\picscalex".$scalex."\\picscaley".$scaley." \\wbmbitspixel24 "; 
			//echo $newImagePre;Yii::app()->end();
			$newImage='';
			while (!feof($b)) { 
				$newImage.= fgets($b); 
			} 
			$hex=bin2hex($newImage);
			$imgData=$newImagePre.$hex."}}";
		    //echo $imgData;
		    //die();
			//insert img to rtf

			return $imgData;
		}
	}