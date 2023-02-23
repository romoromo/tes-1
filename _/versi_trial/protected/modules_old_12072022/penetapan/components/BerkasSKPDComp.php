<?php
/**
 * 
 */
class BerkasSKPDComp extends CApplicationComponent
{
	private $path_template = '/file/esigning/template/';
	private $path_skpd_unsigned = '/file/esigning/skpd_unsigned/';
	private $TPL = '';
	private $path_tpl = '';

	private $array_variabel = array(
		'%kode_pajak%' => ''
		,'%jenis_pajak%' => ''
		,'%tahunpajak%' => ''
		,'%bulanpajak%' => ''
		,'%bulanpajak_nama%' => ''
		,'%obyek_nama%' => ''
		,'%obyek_npwpd%' => ''
	);

	public static function plug()
	{
		// self method chain
		$className = __CLASS__;
		return new $className(); // return class Instance
	}

	public function pdf2local($data_array = array())
	{
		$html = $this->TPL;

		Yii::import('ext.DMmPDF57');
		// $pdf = DMmPDF::set(array('format'=>'A4', 'mode'=>'c'));
		// $mpdf = new mPDF('utf-8', 'A4', 0, '', 5, 5, 5, 1, 1, 1, ''); // default sptpd zf3
		$pdf = DMmPDF57::set(
			'MANUAL'
			// array(
			// 'mode' => 'utf-8',
			// 'format' => 'A4',
			// 'default_font_size' => 0,
			// 'default_font' => '',
			// 'mgl' => 5,
			// 'mgr' => 5,
			// 'mgt' => 5,
			// 'mgb' => 1,
			// 'mgh' => 1,
			// 'mgf' => 1,
			// 'orientation' => '',
			// )
		);
		$pdf->SetTitle($data_array['title']);
		// $pdf->setFooter('<div align="left">Dicetak oleh Sistem ['. date('d-M-Y H:i:s') .']</div> {PAGENO}');
		$pdf->writeHTML(
			$html
		);
		$pdf->shrink_tables_to_fit = 1;
		$path_pdf = dirname(Yii::app()->getBasePath()) . $this->path_skpd_unsigned . $data_array['namafile'].'.pdf';
		$url_pdf  = Yii::app()->getBaseUrl(1) . $this->path_skpd_unsigned . $data_array['namafile'].'.pdf';
		$pdf->Output($path_pdf, 'F');
		// Yii::app()->end();
		return array('path' => $path_pdf, 'url' => $url_pdf,);
	}

	public function pdf2inline($data_array = array())
	{
		$html = $this->TPL;

		Yii::import('ext.DMmPDF57');
		// $pdf = DMmPDF::set(array('format'=>'A4', 'mode'=>'c'));
		// $mpdf = new mPDF('utf-8', 'A4', 0, '', 5, 5, 5, 1, 1, 1, ''); // default sptpd zf3
		$pdf = DMmPDF57::set(
			'MANUAL'
			// array(
			// 'mode' => 'utf-8',
			// 'format' => 'A4',
			// 'default_font_size' => 0,
			// 'default_font' => '',
			// 'mgl' => 5,
			// 'mgr' => 5,
			// 'mgt' => 5,
			// 'mgb' => 1,
			// 'mgh' => 1,
			// 'mgf' => 1,
			// 'orientation' => '',
			// )
		);
		$pdf->SetTitle($data_array['title']);
		// $pdf->setFooter('<div align="left">Dicetak oleh Sistem ['. date('d-M-Y H:i:s') .']</div> {PAGENO}');
		$pdf->writeHTML(
			$html
		);
		$pdf->shrink_tables_to_fit = 1;
		$path_pdf = dirname(Yii::app()->getBasePath()) . $this->path_skpd_unsigned . $data_array['namafile'].'.pdf';
		$url_pdf  = Yii::app()->getBaseUrl(1) . $this->path_skpd_unsigned . $data_array['namafile'].'.pdf';
		$pdf->Output("SKPD-Air-Tanah.pdf", 'I');
		// Yii::app()->end();
	}

	public function pdf2string($data_array = array())
	{
		$html = $this->TPL;

		Yii::import('ext.DMmPDF57');
		// $pdf = DMmPDF::set(array('format'=>'A4', 'mode'=>'c'));
		// $mpdf = new mPDF('utf-8', 'A4', 0, '', 5, 5, 5, 1, 1, 1, ''); // default sptpd zf3
		$pdf = DMmPDF57::set(
			'MANUAL'
			// array(
			// 'mode' => 'utf-8',
			// 'format' => 'A4',
			// 'default_font_size' => 0,
			// 'default_font' => '',
			// 'mgl' => 5,
			// 'mgr' => 5,
			// 'mgt' => 5,
			// 'mgb' => 1,
			// 'mgh' => 1,
			// 'mgf' => 1,
			// 'orientation' => '',
			// )
		);
		$pdf->SetTitle($data_array['title']);
		// $pdf->setFooter('<div align="left">Dicetak oleh Sistem ['. date('d-M-Y H:i:s') .']</div> {PAGENO}');
		$pdf->writeHTML(
			$html
		);
		$pdf->shrink_tables_to_fit = 1;
		$path_pdf = dirname(Yii::app()->getBasePath()) . $this->path_skpd_unsigned . $data_array['namafile'].'.pdf';
		$url_pdf  = Yii::app()->getBaseUrl(1) . $this->path_skpd_unsigned . $data_array['namafile'].'.pdf';
		$str = $pdf->Output("SKPD-Air-Tanah.pdf", 'S');
		return base64_encode($str);
	}

	public function load_template($filename)
	{
		$path_tpl = dirname(Yii::app()->getBasePath()) . $this->path_template;
		$this->path_tpl = $path_tpl . $filename;
		if (empty($filename) OR !file_exists($this->path_tpl)) {
			$this->TPL = '';
		} else {
			$this->TPL = file_get_contents($this->path_tpl);
		}
		return $this;
	}

	public function parseTPL($data_replace = array())
	{
		$txt = $this->TPL;
		$var = $this->array_variabel;

		// $trans = $data_replace['trans'];

		// if ($trans) {
		// 	// $rek     = MasterRekening::model()->findByPk(isset($trans['tblmasterrekening_id']) ? $trans['tblmasterrekening_id'] : 0);
		// 	// $rek_utm = $rek ? MasterRekening::model()->find('tblmasterrekening_kode=:koderekutm', array(':koderekutm'=>substr($rek['tblmasterrekening_kode'], 0, 5))) : '';

		// 	$dataTrans = array(
		// 		'%kode_pajak%'       => $rek_utm ? $rek_utm['tblmasterrekening_kode'] : ''
		// 		,'%jenis_pajak%'     => $rek_utm ? $rek_utm['tblmasterrekening_nama'] : ''
		// 		,'%tahunpajak%'      => isset($trans['tbltransaksiketetapan_tahunpajak']) ? $trans['tbltransaksiketetapan_tahunpajak'] : ''
		// 		,'%bulanpajak%'      => isset($trans['tbltransaksiketetapan_bulanpajak']) ? $trans['tbltransaksiketetapan_bulanpajak'] : ''
		// 		,'%bulanpajak_nama%' => isset($trans['tbltransaksiketetapan_bulanpajak']) ? LokalIndonesia::getBulan($trans['tbltransaksiketetapan_bulanpajak']) : ''
		// 	);

		// 	$var = array_merge($var, $dataTrans);
		// }

		$var = array_merge($var, $data_replace);

		foreach ($var as $kodevar => $isivar) {
			$txt = str_replace($kodevar, $isivar, $txt);
		}

		$this->TPL = $txt;
		// var_dump($this);Yii::app()->end();

		return $this;
	}
}