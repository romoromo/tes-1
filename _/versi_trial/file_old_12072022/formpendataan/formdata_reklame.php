<form id="form-pendataan" class="smart-form">
	<fieldset id="sss">
		<div class="widget-body">
			<ul id="myTabReklame" class="nav nav-tabs bordered">
				<li class="active">
					<a href="#tabrek1" onclick="$('#footer_reklame').show();" data-toggle="tab">Pendataan Reklame</a>
				</li>
				<li>
					<a style="display: none;" id="link_tabrek2" href="#tabrek2" onclick="$('#div_tabrek2').show();$('#footer_reklame').hide();setTabPerhitungan();" data-toggle="tab"> Perhitungan Reklame</a>
				</li>
			</ul>
			<div id="myTabReklameContent" class="tab-content padding-10">
				<div class="tab-pane fade in active" id="tabrek1">
					<div class="row">
						<section class="col col-4" style="border-right: 1px solid #000;">
							<div class="row" >
								<div class="col col-10">
									<label for="label" class="input">Tahun Pajak</label>
									<label class="select">
										<select name="param[tbltransaksiketetapan_tahunpajak]" class="select2" id="tbltransaksiketetapan_tahunpajak">
											<option selected="" value="">=== Pilih Tahun Pajak ====</option>
											<?php error_reporting(-1); $data['listtahun'] = Tahun::model()->findAll(); ?>
											<?php foreach ($data['listtahun'] as $tahun): ?>
												<option <?= $tahun['reftahun_nama']==date('Y') ? 'selected' : '' ?> value="<?= $tahun['reftahun_nama'] ?>"><?= $tahun['reftahun_nama'] ?></option>
											<?php endforeach ?>
										</select>
									</label>
								</div>
								<div class="col col-6">
									<br>
									<label for="label" class="input">Kode Lokasi</label>
									<label class="input">
										<input type="hidden" name="param[tbltransaksiketetapan_bulanpajak]" id="tbltransaksiketetapan_bulanpajak" value="0" />
										<input value="1" type="text" name="param[tblpendataanreklame_kodelokasi]" id="tblpendataanreklame_kodelokasi" placeholder="Kode Lokasi" maxlength="4" />
										<i class="icon-append fa fa-square "></i>
									</label>
								</div>
							</div>

							<br>

							<div style="display:none;" class="row" >
								<div class="col col-6">
									<label for="label" class="input">Masa Pajak Awal</label>
									<label class="input">
										<input class="disabled" readonly="" <?php /*class="datepicker" data-dateformat="dd-mm-yy"*/ ?> type="text" name="param[tbltransaksiketetapan_masaawal]" id="tbltransaksiketetapan_masaawal" placeholder="Masa Awal" />
										<i class="icon-append fa fa-calendar "></i>
									</label>
								</div>
								<div class="col col-6">
									<label for="label" class="input">Masa Pajak Akhir</label>
									<label class="input">
										<input class="disabled" readonly="" <?php /*class="datepicker" data-dateformat="dd-mm-yy"*/ ?> type="text" name="param[tbltransaksiketetapan_masaakhir]" id="tbltransaksiketetapan_masaakhir" placeholder="Masa Akhir" />
										<i class="icon-append fa fa-calendar "></i>
									</label>
								</div>
							</div>

							<br>

							<div class="row" >
								<div class="col col-6">
									<label for="label" class="input">Tanggal Pendataan</label>
									<label class="input">
										<input value="<?= date('d-m-Y') ?>" class="datepicker" data-dateformat="dd-mm-yy" type="text" name="param[tbltransaksiketetapan_tglentrisptpd]" id="tbltransaksiketetapan_tglentrisptpd" placeholder="Tanggal Pendataan" />
										<i class="icon-append fa fa-calendar "></i>
									</label>
								</div>
								<div class="col col-6">
									<label for="label" class="input">Tanggal Terima SPT</label>
									<label class="input">
										<input value="<?= date('d-m-Y') ?>" class="datepicker" data-dateformat="dd-mm-yy" type="text" name="param[tbltransaksiketetapan_tglterimasptpd]" id="tbltransaksiketetapan_tglterimasptpd" placeholder="Tanggal terima SPT" />
										<i class="icon-append fa fa-calendar "></i>
									</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-md-12">
									<label for="label" class="input">Cara Perhitungan</label>
									<label class="select">
										<select style="width: 100%" name="param[tbltransaksiketetapan_carapenetapan]" class="select2" id="tbltransaksiketetapan_carapenetapan">
											<option value="Self Assesment">Self Assesment</option>
											<option selected="" value="Official Assesment">Official Assesment</option>
										</select>
									</label>
								</div>
							</div>
						</section>
						<section class="col col-8 pull-right">
							<div class="row" >
								<div class="col col-12">
									<label class="bold">HARGA DASAR PERHITUNGAN PEMASANGAN (HDPP)</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-6">
									<label for="label" class="input">Lokasi Jalan</label>
									<table style="width: 100%; table-layout: fixed !important;"><tr><td>
									<label class="select">
										<select name="param[refreklamejalan_id]" class="select2" id="refreklamejalan_id">
											<option selected="" value="">--- Pilih Lokasi Jalan ---</option>
											<?php 
											$otherquery = array();
											$data['listlokasijln'] = DBFetch::query( array('from'=>'refreklamejalan','otherquery'=>$otherquery,'mode'=>'LIST') ); ?>
											<?php foreach ($data['listlokasijln'] as $lokasijln): ?>
												<option kelasjalan="<?= $lokasijln['refreklamejalan_kelasjalan'] ?>" skorstrategis="<?= $lokasijln['refreklamejalan_skorstrategis'] ?>" jeniskawasan="<?= $lokasijln['refreklamejalan_jeniskawasan'] ?>" hargakawasan="<?= $lokasijln['refreklamejalan_hargakawasan'] ?>" lebarjalan="<?= $lokasijln['refreklamejalan_lebarjalan'] ?>" nilailebarjalan="<?= $lokasijln['refreklamejalan_nilailebarjalan'] ?>" statusjalan="<?= $lokasijln['refreklamejalan_statusjalan'] ?>" value="<?= $lokasijln['refreklamejalan_id'] ?>"><?= $lokasijln['refreklamejalan_nama'] ?></option>
											<?php endforeach ?>
										</select>
									</label>
									</td></tr></table>
								</div>
								<div class="col col-6">
									<label for="label" class="input">Jenis Reklame</label>
									<table style="width: 100%; table-layout: fixed !important;"><tr><td>
									<label class="select">
										<select name="param[refjenisreklame_id]" class="select2" id="refjenisreklame_id">
											<option selected="" value="">--- Pilih Jenis Reklame ---</option>
											<?php 
											$otherquery = array(
												'join_reftarifreklame'=>array('reftarifreklame','reftarifreklame.refjenisreklame_id = refjenisreklame.refjenisreklame_id')
												,'group'=>'refjenisreklame.refjenisreklame_id'
											);
											$data['listjenisreklame'] = DBFetch::query( array('from'=>'refjenisreklame','otherquery'=>$otherquery,'mode'=>'LIST') ); ?>
											<?php foreach ($data['listjenisreklame'] as $reklame): ?>
												<option iskelasjalan="<?= $reklame['refjenisreklame_iskelasjalan'] ?>" keterangan="<?= $reklame['refjenisreklame_keterangan'] ?>" value="<?= $reklame['refjenisreklame_id'] ?>"><?= $reklame['refjenisreklame_nama'] ?></option>
											<?php endforeach ?>
										</select>
									</label>
									</td></tr></table>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-8 blink_me" id="blink_status" style="display: none;">
									<h4 style="font-weight: bold;color: red;"">Tidak Dikenai biaya Retribusi Tanah Reklame</h4>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-md-12">
									<label for="label" class="input">Judul / Tema</label>
									<label class="textarea textarea-expandable">
										<textarea rows="2" class="" name="param[tblpendataanreklame_judul]" id="tblpendataanreklame_judul" placeholder="Judul / Tema Reklame"></textarea>
									</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-4">
									<label for="label" class="input">Kelas Jalan</label>
									<label class="select">
										<select name="param[tblpendataanreklame_kelasjalan]" class="select2" id="tblpendataanreklame_kelasjalan">
											<option selected="" value="">--- Pilih Kelas Jalan ---</option>
											<option value="I">Kelas I</option>
											<option value="II">Kelas II</option>
											<option value="III">Kelas III</option>
											<option value="IV">Kelas IV</option>
										</select>
									</label>
								</div>
								<div class="col col-4">
									<label for="label" class="input">Skor Kelas Jalan</label>
									<label class="input">
										<input readonly="" class="format-desimal disabled" value="" type="text" name="param[tblpendataanreklame_skorkelasjalan]" id="tblpendataanreklame_skorkelasjalan" placeholder="Skor Kelas Jalan">
										<i class="icon-append fa fa-square"></i>
									</label>
								</div>
								<div class="col col-4">
									<label for="label" class="input">Skor Nilai Strategis</label>
									<label class="input">
										<input readonly="" class="format-desimal disabled" value="" type="text" name="param[tblpendataanreklame_skornilaistrategis]" id="tblpendataanreklame_skornilaistrategis" placeholder="Nilai Strategis">
										<i class="icon-append fa fa-square"></i>
									</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-md-12">
									<label for="label" class="input">Lokasi Pemasangan</label>
									<label class="textarea textarea-expandable">
										<textarea rows="3" class="" name="param[tblpendataanreklame_lokasi]" id="tblpendataanreklame_lokasi" placeholder="Lokasi Pemasangan"></textarea>
									</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-4">
									<label for="label" class="input">Jumlah Media/Reklame</label>
									<label class="input">
										<input class="format-ribuan" value="1" type="text" name="param[tblpendataanreklame_jumlahreklame]" id="tblpendataanreklame_jumlahreklame" placeholder="Jumlah Reklame">
										<i class="icon-append fa fa-square "></i>
									</label>
								</div>
							</div>
							<br>
							<div class="row" id="isNonPermanen">
								<div class="col col-6">
									<label for="label" class="input">Ukuran Panjang</label>
									<label class="input">
										<div class="input-group state-success">
											<input class="text-align-right" value="" type="text" name="param[tblpendataanreklame_panjang]" id="tblpendataanreklame_panjang" placeholder="Ukuran Panjang">
											<span class="input-group-addon">M</span>
										</div>
									</label>
								</div>
								<div class="col col-6">
									<label for="label" class="input">Ukuran Lebar</label>
									<label class="input">
										<div class="input-group state-success">
											<input class="text-align-right" value="" type="text" name="param[tblpendataanreklame_lebar]" id="tblpendataanreklame_lebar" placeholder="Ukuran Lebar">
											<span class="input-group-addon">M</span>
										</div>
									</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-6">
									<label for="label" id="ukuran_media" class="input">Ukuran Media</label>
									<label style="display: none;" for="label" id="jumlah_media" class="input">Jumlah Media</label>
									<label class="input">
										<div class="input-group state-success">
											<input class="text-align-right" value="" type="text" name="param[tblpendataanreklame_luas]" id="tblpendataanreklame_luas" placeholder="Ukuran Media">
											<span class="input-group-addon" id="satuanmedia">M2</span>
										</div>
									</label>
								</div>
								<div class="col col-6">
									<label for="label" class="input">Sudut Pandang (Sisi)</label>
									<label class="select">
										<select name="param[tblpendataanreklame_sisi]" class="" id="tblpendataanreklame_sisi">
										<?php $refsudutpdng = Yii::app()->db->createCommand()->select()->from('refreklamesudutpandang')->queryAll();
										foreach ($refsudutpdng as $sisi): ?>
											<option harga="<?= $sisi['refreklamesudutpandang_harga'] ?>" value="<?= $sisi['refreklamesudutpandang_id'] ?>.00"><?= $sisi['refreklamesudutpandang_id'] ?></option>											
										<?php endforeach ?>
										</select><i></i>
									</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-6">
									<label for="label" class="input">Masa Pasang Awal</label>
									<label class="input">
										<input type="text" name="param[tblpendataanreklame_masaawal]" id="tblpendataanreklame_masaawal" placeholder="Masa Pemasangan Awal" />
										<i class="icon-append fa fa-calendar "></i>
									</label>
								</div>
								<div class="col col-6">
									<label for="label" class="input">Masa Pasang Akhir</label>
									<label class="input">
										<input type="text" name="param[tblpendataanreklame_masaakhir]" id="tblpendataanreklame_masaakhir" placeholder="Masa Akhir" />
										<i class="icon-append fa fa-calendar "></i>
									</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-6">
									<label for="label" class="input">Jangka Waktu</label>
									<label class="input">
										<div class="input-group">
											<input class="text-align-right" type="text" name="param[tblpendataanreklame_jangkawaktu]" id="tblpendataanreklame_jangkawaktu" placeholder="Jangka Waktu" />
											<span class="input-group-addon" id="lbl_satuanwaktu">-</span>
										</div>
									</label>
								</div>
								<div class="col col-6">
									<label for="label" class="input">Harga Satuan</label>
									<label class="input">
										<input readonly="" class="format-rupiah disabled text-align-right" value="" type="text" name="param[tblpendataanreklame_tarifreklame]" id="tblpendataanreklame_tarifreklame" placeholder="Harga Satuan">
										<i class="icon-prepend fa fa-money "></i>
									</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-8">
								NILAI HDPP : <span class="lbl_nilai_hdpp bold font-lg"></span>
								<input type="hidden" name="param[tblpendataanreklame_nilaihdpp]" id="tblpendataanreklame_nilaihdpp" value="0">
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-12">
									<label class="bold">NILAI STRATEGIS LOKASI (NSL)</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-4">
									<label for="label" class="input">Kawasan</label>
									<label class="input">
										<input readonly="" class="format-rupiah disabled text-align-right" value="" type="text" name="param[tblpendataanreklame_nilaikawasan]" id="tblpendataanreklame_nilaikawasan" placeholder="Kawasan">
										<i class="icon-prepend fa fa-square "></i>
									</label>
								</div>
								<div class="col col-4">
									<label for="label" class="input">&nbsp;</label>
									<input type="hidden" value="" name="param[refreklamejalan_jeniskawasan]" id="refreklamejalan_jeniskawasan">
									<label class="input font-md refreklamejalan_jeniskawasan"></label>
								</div>
								<div class="col col-4">
									<label for="label" class="input">Lokasi Media</label>
									<label class="select">
										<select class="select2" name="param[tblpendataanreklame_lokasimedia]" id="tblpendataanreklame_lokasimedia">
											<?php foreach(
											array(array(1,'Prasarana Kota'),array(2,'Non Prasarana Kota')) as $lokasimed): ?>
											<option idlok="<?= $lokasimed[0] ?>" value="<?= $lokasimed[1] ?>"><?= $lokasimed[1] ?></option>
											<?php endforeach ?>
										</select>
									</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-4">
									<label for="label" class="input">Sudut Pandang (sisi)</label>
									<label class="input">
										<span class="tblpendataanreklame_sisi font-md">1</span>
									</label>
								</div>
								<div class="col col-6">
									<label for="label" class="input">&nbsp;</label>
									<label class="input text-align-right font-md tblpendataanreklame_sisinilai">Rp ...</label>
										<input readonly="" value="" type="hidden" name="param[tblpendataanreklame_sisinilai]" id="tblpendataanreklame_sisinilai">
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-4">
									<label for="label" class="input">Lebar Jalan</label>
									<label class="input">
										<div class="input-group">
											<input readonly="" class="format-desimal disabled text-align-right" type="text" name="param[tblpendataanreklame_lebarjalan]" id="tblpendataanreklame_lebarjalan" placeholder="Lebar Jalan" />
											<span class="input-group-addon" id="">M</span>
										</div>
									</label>
								</div>
								<div class="col col-6">
									<label for="label" class="input">&nbsp;</label>
									<label class="input text-align-right font-md tblpendataanreklame_lebarjalannilai">Rp ...</label>
										<input readonly="" value="" type="hidden" name="param[tblpendataanreklame_lebarjalannilai]" id="tblpendataanreklame_lebarjalannilai">
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-4">
									<label for="label" class="input">Ketinggian</label>
									<label class="select">
										<select class="select2" name="param[tblpendataanreklame_ketinggian]" id="tblpendataanreklame_ketinggian">
											<?php for($i=1; $i<=50; $i++): ?>
											<option value="<?= $i ?>"><?= $i ?></option>
											<?php endfor ?>
										</select>
									</label>
								</div>
								<div class="col col-6">
									<label for="label" class="input">&nbsp;</label>
									<label class="input text-align-right font-md tblpendataanreklame_ketinggiannilai">Rp ...</label>
										<input readonly="" value="" type="hidden" name="param[tblpendataanreklame_ketinggiannilai]" id="tblpendataanreklame_ketinggiannilai">
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-4">
									<label for="label" class="input">Skor Kepadatan</label>
									<label class="input">
										<input type="hidden" readonly="" name="param[tblpendataanreklame_skorkepadatan]" id="tblpendataanreklame_skorkepadatan">
									</label>
								</div>
								<div class="col col-6">
									<label class="input text-align-right font-md tblpendataanreklame_skorkepadatan">0,00</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-5">
								NSL : 
								</div>
								<div class="col col-4">
									<label class="input font-md tblpendataanreklame_nsl bold text-align-right"></label>
									<input type="hidden" name="param[tblpendataanreklame_nsl]" id="tblpendataanreklame_nsl">
								</div>
								<div class="col col-3">
									<label>(untuk non Permanen, NSL = 0)</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-5">
								NILAI SEWA REKLAME (NSR) : 
								</div>
								<div class="col col-4">
									<label class="font-md tblpendataanreklame_nsr bold text-align-right"></label>
									<input type="hidden" name="param[tblpendataanreklame_nsr]" id="tblpendataanreklame_nsr">
								</div>
								<div class="col col-3">
									<label>HDPP + NSL</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-4">
								TARIF : 
								</div>
								<div class="col col-5">
									<label class="input text-align-right font-md tblpendataanreklame_tarifpajak">25%</label>
									<input type="hidden" name="param[tblpendataanreklame_tarifpajak]" id="tblpendataanreklame_tarifpajak">
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-4">
								PAJAK REKLAME : 
								</div>
								<div class="col col-5">
									<label class="input text-align-right font-xl bold tblpendataanreklame_total">Rp. </label>
									<input type="hidden" name="param[tblpendataanreklame_total]" id="tblpendataanreklame_total">
								</div>
								<div class="col col-2">
								<label>NSR x TARIF (25%)</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-4">
								J. Reklame (Indoor/Outdoor) : 
								</div>
								<div class="col col-5">
									<label for="" class="select">
									<select class="select" name="param[tblpendataanreklame_jenisinout]" id="tblpendataanreklame_jenisinout">
										<option value="Indoor">Indoor</option>
										<option selected="" value="Outdoor">Outdoor</option>
									</select><i></i>
									</label>
								</div>
								<div class="col col-2">
								<label>Jika Indoor (Pengurangan 50%)</label>
								</div>
							</div>
							<div style="display: none"  class="row" >
								<div class="col col-8">
									<label for="label" class="input">Besar Omzet</label>
									<label class="input">
										<input class="format-rupiah" type="text" name="param[tbltransaksiketetapan_omzettotal]" id="tbltransaksiketetapan_omzettotal" placeholder="Besar Omzet" />
										<i class="icon-append fa fa-money "></i>
									</label>
								</div>
							</div>
							<br>
							<div style="display: none" class="row" >
								<div class="col col-8">
									<label for="label" class="input">Tarif Pajak</label>
									<label class="input">
										<div class="input-group">
											<?php $tarif = ( $rek = MasterRekening::model()->find('tblmasterrekening_kode=:kode', array(':kode'=>$data['rekening_kode'])) ) ? ($rek['tblmasterrekening_tarif'] * 100) : 0;  ?>
											<input readonly="" class="disabled" value="<?= $tarif ?>" type="text" name="param[tbltransaksiketetapan_tarif]" id="tbltransaksiketetapan_tarif" placeholder="Tarif Pajak" />
											<span class="input-group-addon">%</span>
										</div>
									</label>
								</div>
							</div>
							<br>
							<div style="display: none" class="row" >
								<div class="col col-8">
									<label for="label" class="input">Denda</label>
									<label class="input">
										<input class="format-rupiah-desimal" type="text" name="param[tbltransaksiketetapan_rupiahdenda]" id="tbltransaksiketetapan_rupiahdenda" placeholder="Nominal Denda" />
										<i class="icon-append fa fa-money "></i>
									</label>
								</div>
							</div>
							<br>
							<div class="row" style="display: none;">
								<div class="col col-8">
									<label for="label" class="input">Besaran Pajak</label>
									<label class="input">
										<input readonly="" class="format-rupiah-desimal disabled" type="text" name="param[tbltransaksiketetapan_pajak]" id="tbltransaksiketetapan_pajak" placeholder="Nominal Besaran Pajak" />
										<i class="icon-append fa fa-money "></i>
									</label>
								</div>
							</div>
						</section>
					</div>
				</div>
				<div class="tab-pane fade in active" id="tabrek2">
					<div style="display: none;" id="div_tabrek2" class="row">
						<section class="col col-3">
							<label for="label">Nilai Dasar Reklame</label>
							<br>
							<br>
							<br>
							<br>
							<label for="label">Nilai Strategis</label>
							<br>
							<br>
							<br>
							<br>
							<label for="label">Nilai Sewa Reklame</label>
							<br>
							<br>
							<br>
							<br>
							<label for="label">Nominal Pajak Terhutang</label>
						</section>
						<section class="col col-8">
							<div class="row">
								<label for="label">= Panjang x Lebar x Sisi x Harga Dasar x Jumlah Hari</label>
							</div>
							<div class="row">
								<label for="label">= <span class="tblpendataanreklame_panjang"></span> x <span class="tblpendataanreklame_lebar"></span> x <span class="tblpendataanreklame_sisi"></span> x <span class="tblpendataanreklame_tarifreklame"></span> x <span class="tblpendataanreklame_jumlahhari"></span> </label>
							</div>
							<div class="row">
								<label for="label">= <span class="tblpendataanreklame_nilaidasar"></span> </label>
							</div>

							<br>

							<div class="row">
								<label for="label">= (Nilai Strategis x Jumlah Reklame x Luas)</label>
							</div>
							<div class="row">
								<label for="label">= <span class="tblpendataanreklame_kelastarif"></span> x <span class="tblpendataanreklame_jumlahreklame"></span> x <span class="tblpendataanreklame_luas"></span> </label>
							</div>
							<div class="row">
								<label for="label">= <span class="tblpendataanreklame_nilaistrategis"></span> </label>
							</div>

							<br>

							<div class="row">
								<label for="label">= (Nilai Dasar + Nilai Strategis)</label>
							</div>
							<div class="row">
								<label for="label">= <span class="tblpendataanreklame_nilaidasar"></span> + <span class="tblpendataanreklame_nilaistrategis"></span> </label>
							</div>
							<div class="row">
								<label for="label">= <span class="tblpendataanreklame_nilaisewa"></span> </label>
							</div>

							<br>

							<div class="row">
								<label for="label">= (Tarif Pajak x Nilai Sewa Reklame)</label>
							</div>
							<div class="row">
								<label for="label">= <span class="tbltransaksiketetapan_tarif"></span> % x <span class="tblpendataanreklame_nilaisewa"></span> </label>
							</div>
							<div class="row">
								<label for="label">= <span class="tbltransaksiketetapan_pajak"></span> </label>
							</div>
						</section>
					</div>
				</div>
			</div>
			<input type="hidden" id="tblpendataanreklame_nilaidasar" name="param[tblpendataanreklame_nilaidasar]" />
			<input type="hidden" id="tblpendataanreklame_nilaistrategis" name="param[tblpendataanreklame_nilaistrategis]" />
			<input type="hidden" id="tblpendataanreklame_nilaisewa" name="param[tblpendataanreklame_nilaisewa]" />
			
			<?php /*section class="col col-md-6">
				<p style="margin-top: 25px;">
					<em> <i class="fa fa-info-circle"></i> Silahkan Pilih Bidang Usaha</em>
				</p>
			</section*/ ?>
		</div>
	</fieldset>
	<input type="hidden" name="param[tblobyek_id]" id="xxobyidxx" value="<?= $data['obyek_id'] ?>" />
	<footer id="footer_reklame">
		<button onclick="" id="btnHitung" class="btn btn-primary" type="submit">
			HITUNG!
		</button>
		<?php $xc = 'btnSimpanHitungx'; ?>
		<button onclick="simpanPendataan()" style="display: none;" btnid="btnSimpanHitung" id="btnSimpanHitung" class="btn btn-primary" type="button">
			SIMPAN PERHITUNGAN
		</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">
			Batal
		</button>
	</footer>
</form>

<script type="text/javascript">
	function valNum(n) {
		n = (typeof n == "undefined") ? "0" : n;
		return !isNaN(toAngka(n)) ? Number(toAngka(n)) : 0;
	}
	jQuery(document).ready(function($) {
		setPriceFormat();
		setMasaPajak();
		pageSetUp();
		window.nilaidasar = 0;
		window.nilaistrategis = 0;
		window.nilaisewa = 0;
		window.pajak_terhutang = 0;
		$('#tbltransaksiketetapan_carapenetapan').select2("readonly", true);
		$('#tblpendataanreklame_kelasjalan').select2("readonly", true);

		setTimeout(function() {
		$("#tblpendataanreklame_sisi").trigger('change');
		$("#tblpendataanreklame_ketinggian").trigger('change');
		}, 2000);
		console.log('ready');
	});

	loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/moment-js/moment-with-locales.min.js", setMoment);
	function setMoment() {
		moment.locale('id');
	}

	$("#tbltransaksiketetapan_omzettotal, #tbltransaksiketetapan_tarif, #tbltransaksiketetapan_rupiahdenda").keyup(function(event) {
		hitungPajak();
	});

	$("#tbltransaksiketetapan_tahunpajak, #tbltransaksiketetapan_bulanpajak").change(function(event) {
		setMasaPajak();
	});
	$("#tblpendataanreklame_kodelokasi").change(function(event) {
		setMasaPajak();
	});

	$("#tblpendataanreklame_panjang, #tblpendataanreklame_lebar").keyup(function(event) {
		window.pjg = pjg = !isNaN( p = $("#tblpendataanreklame_panjang").val() ) ? Number(p) : 0;
		window.lbr = lbr = !isNaN( l = $("#tblpendataanreklame_lebar").val() ) ? Number(l) : 0;
		window.sisi_ = sisi_ = !isNaN( ss = $("#tblpendataanreklame_sisi").val() ) ? Number(ss) : 0;
		// $("#tblpendataanreklame_luas").val(pjg * lbr);

		getHargaDasar();
	});

	$("#tblpendataanreklame_sisi").change(function(event) {
		window.pjg = pjg = !isNaN( p = $("#tblpendataanreklame_panjang").val() ) ? Number(p) : 0;
		window.lbr = lbr = !isNaN( l = $("#tblpendataanreklame_lebar").val() ) ? Number(l) : 0;
		window.sisi_ = sisi_ = !isNaN( ss = $("#tblpendataanreklame_sisi").val() ) ? Number(ss) : 0;
		// $("#tblpendataanreklame_luas").val(pjg * lbr);

		getHargaDasar();
	});

	function setMasaPajak() {
		$("#tbltransaksiketetapan_masaawal").val('');
		$("#tbltransaksiketetapan_masaakhir").val('');
		thn = $("#tbltransaksiketetapan_tahunpajak").val();
		kodelokasi = $("#tblpendataanreklame_kodelokasi").val();
		if (thn!='' && kodelokasi!='') {
			el = "#tbltransaksiketetapan_tglentrisptpd, #tbltransaksiketetapan_tglterimasptpd, #tblpendataanreklame_judul, #tbltransaksiketetapan_pajak, #tblpendataanreklame_lokasi, #tblpendataanreklame_panjang, #tblpendataanreklame_lebar, #tblpendataanreklame_luas, #tblpendataanreklame_sisi, #tblpendataanreklame_jumlahreklame, #tblpendataanreklame_tarifreklame, #tblpendataanreklame_masaawal, #tblpendataanreklame_masaakhir, #tblpendataanreklame_jumlahhari";
			jQuery.each(el.split(', '), function(index, val) {
			  // $(val).val($(val)[0].defaultValue);
			});
			window.cmdp = 'tambah';
			window.idtranskttap = 0;
			// masapajak = moment([thn,(bln-1)]);
			// $("#tbltransaksiketetapan_masaawal").val(masapajak.format('L'));
			// $("#tbltransaksiketetapan_masaakhir").val(masapajak.endOf('month').format('L'));

			isSudahPendataan(thn,kodelokasi);
		}
	}

	$("#tblpendataanreklame_masaawal, #tblpendataanreklame_masaakhir").change(function(event) {
		$("#tblpendataanreklame_jumlahhari").val('');
		var aw = $("#tblpendataanreklame_masaawal").val(), 
		ak = $("#tblpendataanreklame_masaakhir").val();
		if (aw!='' && ak!='') {
			awal = moment( aw.split('-').reverse().join('-') );
			akhir = moment( ak.split('-').reverse().join('-') );
			jml = akhir.diff(awal, 'days');
			if (awal==akhir) jml=1;
			$("#tblpendataanreklame_jumlahhari").val( jml );
			getHargaDasar();

			$("#tbltransaksiketetapan_masaawal").val(aw);
			$("#tbltransaksiketetapan_masaakhir").val(ak);
		}
	});
	
	$("#tblpendataanreklame_sisi").change(function(event) {
		var nilai = $("#tblpendataanreklame_sisi option:selected").attr('harga');
		$("#tblpendataanreklame_sisinilai").val(nilai);
		$(".tblpendataanreklame_sisinilai").html(toRp(nilai));
		$(".tblpendataanreklame_sisi").html(window.sisi_);
	});
	$("#refreklamejalan_id").change(function(event) {
		var dtrekl = $("#refreklamejalan_id option:selected");

		var statusjln = $("#refreklamejalan_id option:selected").attr('statusjalan');
		if (statusjln=='Provinsi') {
			$("#blink_status").show('slow');
		} else {
			$("#blink_status").hide('slow');
		}

		$("#tblpendataanreklame_kelasjalan").select2('val', dtrekl.attr('kelasjalan') );
		$("#tblpendataanreklame_nilaikawasan").val( parseInt(dtrekl.attr('hargakawasan')) );
		$("#tblpendataanreklame_lebarjalan").val( dtrekl.attr('lebarjalan') );
		$("#tblpendataanreklame_lebarjalannilai").val( parseInt(dtrekl.attr('nilailebarjalan')) );
		$(".tblpendataanreklame_lebarjalannilai").html( toRp(dtrekl.attr('nilailebarjalan')) );
		$("#refreklamejalan_jeniskawasan").val( dtrekl.attr('jeniskawasan') );
		$(".refreklamejalan_jeniskawasan").html( dtrekl.attr('jeniskawasan') );
		if ($("#refjenisreklame_id").val()!='') {
			getHargaDasar();
		}
		setPriceFormat();
	});
	
	$("#refjenisreklame_id").change(function(event) {
		getHargaDasar();
	});

	function getHargaDasar() {
		$("#tblpendataanreklame_tarifreklame").val( 0 );

		var refjenisreklame_id = $("#refjenisreklame_id").val();
		kelasjalan = (kj = $("#tblpendataanreklame_kelasjalan").val())!='' ? kj : 0;
		var iskelasjalan = $("#refjenisreklame_id option:selected").attr('iskelasjalan');

		if(refjenisreklame_id!='' && kelasjalan!=''){
			$.post('<?= Yii::app()->getBaseUrl(1) ?>/open_data/get/data/tarif_reklame', {
				refjenisreklame_id: refjenisreklame_id
				,kelasjalan: kelasjalan
				,iskelasjalan: iskelasjalan
			}, function(respon) {
				if (respon.status=='found') {
					$("#tblpendataanreklame_skornilaistrategis").val(respon.info.refreklamehdpp_skorstrategis);
					$("#tblpendataanreklame_skorkelasjalan").val(respon.info.refreklamehdpp_skorkelasjalan);
					$("#lbl_satuanwaktu").html(respon.info.refreklamehdpp_satuan);
					$("#satuanmedia").html(respon.info.refreklamehdpp_satuanluas);
					$("#tblpendataanreklame_tarifreklame").val(parseInt(respon.info.refreklamehdpp_hargasatuan*respon.info.refreklamehdpp_jangkawaktu));

					setTimeout(function() {
						// hitungReklame();
						getHargaReklameKepadatan();
					}, 1000);
				}
				setPriceFormat();
			},"json");
		}
	}

	$("#tblpendataanreklame_ketinggian").change(function(event) {
		getHargaReklameTinggi();
	});

	function getHargaReklameTinggi() {
		$("#tblpendataanreklame_ketinggiannilai").val( 0 );
		$(".tblpendataanreklame_ketinggiannilai").val( "Rp ..." );

		var tinggi = $("#tblpendataanreklame_ketinggian").val();

		$.post('<?= Yii::app()->getBaseUrl(1) ?>/open_data/get/data/tarif_reklame_tinggi', {
			tinggi: tinggi
		}, function(respon) {
			if (respon.status=='found') {
				var hargatinggi = respon.info.refreklamenilaiketinggian_harga;
				$("#tblpendataanreklame_ketinggiannilai").val(hargatinggi);
				$(".tblpendataanreklame_ketinggiannilai").html(toRp(hargatinggi));
			}
			setPriceFormat();
			// hitungReklame();
			getHargaReklameKepadatan();
		},"json");
	}

	$("#tblpendataanreklame_lokasimedia, #tblpendataanreklame_luas").change(function(event) {
		getHargaReklameKepadatan();

		$("#refjenisreklame_id").trigger('change');
		$("#tblpendataanreklame_sisi").trigger('change');
	});

	function getHargaReklameKepadatan() {
		$("#tblpendataanreklame_skorkepadatan").val( 0 );
		$(".tblpendataanreklame_skorkepadatan").val( "Rp ..." );

		var id = $("#tblpendataanreklame_lokasimedia option:selected").attr('idlok');
		var ukuranmedia = valNum($("#tblpendataanreklame_luas").val());

		$.post('<?= Yii::app()->getBaseUrl(1) ?>/open_data/get/data/tarif_reklame_kepadatan', {
			id: id
			,ukuranmedia: ukuranmedia
		}, function(respon) {
			if (respon.status=='found') {
				var hargapadat = respon.info.refreklameskorkepadatan_harga;
				$("#tblpendataanreklame_skorkepadatan").val(hargapadat);
				$(".tblpendataanreklame_skorkepadatan").html(formatRibuan(hargapadat,0, 2));
				hitungNSL();
				hitungReklame();
			}
			setPriceFormat();
		},"json");
	}

	/*$("#tblpendataanreklame_jumlahreklame").keyup(function(event) {
		hitungStrategis();
	});
	$("#tblpendataanreklame_kelasjalan").change(function(event) {
		hitungStrategis();
	});*/

	function hitungHDPP() {
		var rekl_p = valNum( $('#tblpendataanreklame_panjang').val() )
		, rekl_l = valNum( $('#tblpendataanreklame_lebar').val() )
		, rekl_sisi = parseInt( ( $('#tblpendataanreklame_sisi').val() ) )
		// , rekl_luas = rekl_p * rekl_l
		, rekl_luas = rekl_p * rekl_l * rekl_sisi
		;

		var non_permanen = $("#satuanmedia").text();
		if(non_permanen!='lembar' && non_permanen!='unit') {
			$("#isNonPermanen").show();
			$("#tblpendataanreklame_luas").val(rekl_luas);
			$("#ukuran_media").show();
			$("#jumlah_media").hide();
        } else {
        	$("#jumlah_media").show();
			$("#ukuran_media").hide();
			$("#isNonPermanen").hide();
        }

		// $("#tblpendataanreklame_luas").val(rekl_luas);
		
		var kelasjalan = valNum($("#tblpendataanreklame_skorkelasjalan").val()),
		 skorstrategis = valNum($("#tblpendataanreklame_skornilaistrategis").val()),
		 ukuran = valNum($("#tblpendataanreklame_luas").val()),
		 jangkawaktu = valNum($("#tblpendataanreklame_jangkawaktu").val()),
		 hargasatuan = valNum($("#tblpendataanreklame_tarifreklame").val()),
		 jumlahrek = valNum($("#tblpendataanreklame_jumlahreklame").val());

		 console.log('kelasjalan = ' + kelasjalan + ' * ' + 'skorstrategis = ' + skorstrategis + ' * ' + 'ukuran = ' + ukuran + '*' + 'jangkawaktu = ' + jangkawaktu + ' * ' + ' hargasatuan = ' + hargasatuan + ' * ' + ' jumlahrek = ' + jumlahrek);

		hdpp = (kelasjalan * skorstrategis * ukuran * jangkawaktu * hargasatuan) * jumlahrek;
		$(".lbl_nilai_hdpp").html(toRp(hdpp));
		$("#tblpendataanreklame_nilaihdpp").val(hdpp);
	}

	function hitungNSL() {
		var keteranganreklame = $("#refjenisreklame_id option:selected").attr('keterangan')
		,isPermanen = keteranganreklame=='Permanen';
		var nkawasan = isPermanen ? valNum($("#tblpendataanreklame_nilaikawasan").val()) : 0
		, spandang = isPermanen ? valNum($(".tblpendataanreklame_sisinilai").html()) : 0
		, lebarjalan = isPermanen ? valNum($(".tblpendataanreklame_lebarjalannilai").html())  : 0
		, nketinggian = isPermanen ? valNum($(".tblpendataanreklame_ketinggiannilai").html())  : 0
		, skorkepadatan = isPermanen ? $("#tblpendataanreklame_skorkepadatan").val()  : 0
		, jmlmedia = isPermanen ? valNum($("#tblpendataanreklame_jumlahreklame").val())  : 0
		, NSL = 0
		;

		if (isPermanen) {
			NSL = ( (nkawasan + spandang + lebarjalan + nketinggian) * skorkepadatan ) * jmlmedia;
		}
		$(".tblpendataanreklame_nsl").html(toRp(NSL));
		$("#tblpendataanreklame_nsl").val(NSL);
	}

	function hitungReklame() {
		hitungHDPP();hitungNSL();/*getHargaReklameKepadatan();*/
		NSLval = $("#tblpendataanreklame_nsl").val();
		HDPPval = $("#tblpendataanreklame_nilaihdpp").val();
		NSR = Number(NSLval) + Number(HDPPval);

		$(".tblpendataanreklame_nsr").html(toRp(NSR));
		$("#tblpendataanreklame_nsr").val(NSR);
		$("#tbltransaksiketetapan_omzettotal").val(NSR);

		TOTALPAJAKREKLAME = NSR * (25/100);

		if($("#satuanmedia").text() == 'lembar'){
			TOTALPAJAKREKLAME = NSR;
    	}

		if ("Indoor"==$("#tblpendataanreklame_jenisinout").val()) {
			TOTALPAJAKREKLAME = TOTALPAJAKREKLAME*0.5;
		}

		TOTALPAJAKREKLAME = ceiling(TOTALPAJAKREKLAME,100);

		$(".tblpendataanreklame_total").html(toRp(TOTALPAJAKREKLAME));
		$("#tblpendataanreklame_total").val(TOTALPAJAKREKLAME);
		// $("#tbltransaksiketetapan_pajak").val(TOTALPAJAKREKLAME);
		$("#tbltransaksiketetapan_pajak").val( TOTALPAJAKREKLAME.toFixed(2) );
	}

	$("#refreklamejalan_id, #refjenisreklame_id, #tblpendataanreklame_jumlahreklame, #tblpendataanreklame_luas, #tblpendataanreklame_sisi, #tblpendataanreklame_jangkawaktu, #tblpendataanreklame_lokasimedia, #tblpendataanreklame_ketinggian, #tblpendataanreklame_jenisinout").change(function(event) {
		getHargaReklameKepadatan();
	});

	function setTabPerhitungan() {
		$(".tblpendataanreklame_panjang").html( window.pjg );
		$(".tblpendataanreklame_lebar").html( window.lbr );
		$(".tblpendataanreklame_sisi").html( window.sisi_ );
		$(".tblpendataanreklame_tarifreklame").html( $("#tblpendataanreklame_tarifreklame").val() );
		$(".tblpendataanreklame_jumlahhari").html( $("#tblpendataanreklame_jumlahhari").val() );
		/*===*/ $(".tblpendataanreklame_nilaidasar").html( toRp( window.nilaidasar ) );
		/*===*/ $("#tblpendataanreklame_nilaidasar").val( toRp( window.nilaidasar ) );

		$(".tblpendataanreklame_jumlahreklame").html( $("#tblpendataanreklame_jumlahreklame").val() );
		$(".tblpendataanreklame_kelastarif").html( $("#tblpendataanreklame_kelastarif").val() );
		$(".tblpendataanreklame_luas").html( $("#tblpendataanreklame_luas").val() );
		/*===*/ $(".tblpendataanreklame_nilaistrategis").html( toRp( window.nilaistrategis ) );
		/*===*/ $("#tblpendataanreklame_nilaistrategis").val( toRp( window.nilaistrategis ) );

		// $(".tblpendataanreklame_nilaidasar").html();
		// $(".tblpendataanreklame_nilaistrategis").html();
		/*===*/ $(".tblpendataanreklame_nilaisewa").html( toRp(window.nilaisewa = window.nilaidasar + window.nilaistrategis) );
		/*===*/ $("#tblpendataanreklame_nilaisewa").val( toRp(window.nilaisewa = window.nilaidasar + window.nilaistrategis) );

		$(".tbltransaksiketetapan_tarif").html( $("#tbltransaksiketetapan_tarif").val() );
		/*===*/ $(".tbltransaksiketetapan_pajak").html( toRp( window.pajak_terhutang = window.nilaisewa * ($("#tbltransaksiketetapan_tarif").val()/100) ) );
		/*===*/ $("#tbltransaksiketetapan_pajak").val( ( window.pajak_terhutang = window.nilaisewa * ($("#tbltransaksiketetapan_tarif").val()/100) ).toFixed(2) );
		setPriceFormat();
	}

	loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
	function runFormValidation() {
		jQuery.validator.addMethod("number_ID", function(value, element) {
			// allow any non-whitespace characters as the host part
			return this.optional(element) || /^-?(?:\d+|\d{1,3}(?:[\s\.,]\d{3})+)(?:[\.,]\d+)?$/.test(value);
		}, 'Mohon isikan dalam angka, pemisah desimal adalah koma (,)');

		var $FormDaftar = $("#form-pendataan").validate({
			// Rules for form validation
			rules : {
				"param[tbltransaksiketetapan_tahunpajak]" : {
					required : true
				}
				,"param[tblpendataanreklame_kodelokasi]" : {
					required : true
					,digits : true
				}
				,"param[tbltransaksiketetapan_tglentrisptpd]" : {
					required : true
				}
				,"param[tbltransaksiketetapan_tglterimasptpd]" : {
					required : true,
				}
				,"param[tbltransaksiketetapan_omzettotal]" : {
					required : true
				}
				,"param[refjenisreklame_id]" : {
					required : true
				}
				,"param[tblpendataanreklame_judul]" : {
					required : true
				}
				,"param[tblpendataanreklame_lokasi]" : {
					required : true
				}
				,"param[tblpendataanreklame_panjang]" : {
					required : true
				}
				,"param[tblpendataanreklame_lebar]" : {
					required : true
				}
				,"param[tblpendataanreklame_sisi]" : {
					required : true
				}
				,"param[tblpendataanreklame_jumlahreklame]" : {
					required : true
				}
				,"param[tblpendataanreklame_kelasjalan]" : {
					required : true
				}
				,"param[tblpendataanreklame_masaawal]" : {
					required : true
				}
				,"param[tblpendataanreklame_masaakhir]" : {
					required : true
				}
				,"param[tblpendataanreklame_luas]" : {
					required : true
					,number_ID : true
				}
			},

			// Messages for form validation
			messages : {
				"param[tbltransaksiketetapan_tahunpajak]" : {
					required : 'Mohon pilih tahun pajak'
				}
				,"param[tblpendataanreklame_kodelokasi]" : {
					required : 'Mohon isikan kode lokasi'
					,digits : 'Mohon isikan dalam angka'
				}
				,"param[tbltransaksiketetapan_tglentrisptpd]" : {
					required : 'Mohon entrikan tanggal pendataan',
				}
				,"param[tbltransaksiketetapan_tglterimasptpd]" : {
					required : 'Mohon entrikan tanggal terima',
				}
				,"param[tbltransaksiketetapan_omzettotal]" : {
					required : 'Mohon entrikan nilai omzet',
				}
				,"param[refjenisreklame_id]" : {
					required : 'Mohon pilih jenis reklame',
				}
				,"param[tblpendataanreklame_judul]" : {
					required : 'Mohon entrikan judul/tema reklame',
				}
				,"param[tblpendataanreklame_lokasi]" : {
					required : 'Mohon entrikan lokasi pemasangan reklame',
				}
				,"param[tblpendataanreklame_panjang]" : {
					required : 'Mohon entrikan panjang reklame',
				}
				,"param[tblpendataanreklame_lebar]" : {
					required : 'Mohon entrikan lebar reklame',
				}
				,"param[tblpendataanreklame_sisi]" : {
					required : 'Mohon entrikan jumlah sisi reklame',
				}
				,"param[tblpendataanreklame_jumlahreklame]" : {
					required : 'Mohon entrikan jumlah reklame',
				}
				,"param[tblpendataanreklame_kelasjalan]" : {
					required : 'Mohon pilih kelas jalan',
				}
				,"param[tblpendataanreklame_masaawal]" : {
					required : 'Mohon entrikan masa pemasangan awal',
				}
				,"param[tblpendataanreklame_masaakhir]" : {
					required : 'Mohon entrikan masa pemasangan akhir',
				}
				,"param[tblpendataanreklame_luas]" : {
					required : 'Mohon entrikan masa ukuran media'
				}
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			},
			submitHandler : function(form) {
				// saat validasi benar semua, jalankan simpan()
				// return simpanPendataan();
				$("#btnSimpanHitung").show();
				// $("#link_tabrek2").click();
				$("#btnHitung").hide();
				$("#footer_reklame").show(1000);
			}
		});
	}

	function simpanPendataan() {
		var addparam = {id: window.idtranskttap, cmd: window.cmdp};
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_ketetapan/simpan',
			type: 'POST',
			dataType: 'json',
			data: $("#form-pendataan").serialize()+'&'+jQuery.param(addparam),
			success: function(respon) {
				if (respon.status=='success') {
					// $("#modalPendataan").modal('hide');
					notifikasi('Berhasil','Pendataan berhasil dientrikan ke sistem','success',1,0);
					simpanDetailReklame(respon.pk, $("#form-pendataan").serialize());
					// detailIzinPemohon(window.idpemohon);
				} else {
				}
			}
		});
		
	}

	function simpanDetailReklame(id, formdata) {
		var addparam = {id: window.idtranskttap, cmd: window.cmdp};
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_ketetapan/simpanDetailReklame',
			type: 'POST',
			dataType: 'json',
			data: formdata+'&tbltransaksiketetapan_id='+id+'&'+jQuery.param(addparam),
			success: function(respon) {
				$("#modalPendataan").modal('hide');
				setTimeout(function() {
					detailIzinPemohon(window.idpemohon);
				}, 2000);
			}
		});
	}

	// Date Range Picker
	$("#tblpendataanreklame_masaawal").datepicker({
	    defaultDate: "+1w",
	    changeMonth: true,
	    numberOfMonths: 2,
	    dateFormat: "dd-mm-yy",
	    prevText: '<i class="fa fa-chevron-left"></i>',
	    nextText: '<i class="fa fa-chevron-right"></i>',
	    onClose: function (selectedDate) {
	        $("#tblpendataanreklame_masaakhir").datepicker("option", "minDate", selectedDate);
	    }

	});
	$("#tblpendataanreklame_masaakhir").datepicker({
	    defaultDate: "+1w",
	    changeMonth: true,
	    numberOfMonths: 2,
	    dateFormat: "dd-mm-yy",
	    prevText: '<i class="fa fa-chevron-left"></i>',
	    nextText: '<i class="fa fa-chevron-right"></i>',
	    onClose: function (selectedDate) {
	        $("#tblpendataanreklame_masaawal").datepicker("option", "maxDate", selectedDate);
	    }
	});

	function isSudahPendataan(t,b) {$.post('<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_ketetapan/isSudahPendataanReklame', {xxobyidxx: senc($("#xxobyidxx").val()),t:senc(t),b:senc(b)}, function(respon) {if (respon.status=='exist') {$("[btnid=<?= $xc ?>]").hide();konfirm(respon.id);notifikasi('Info','Lokasi reklame sudah ada, isikan kode lokasi lain.','fail',1,0); } else {$("[btnid=<?= $xc ?>]").show(); } },"json"); }
	function konfirm(id) {
		$.SmartMessageBox({
			title : "Pendataan reklame terpilih sudah ada", // judul Smart Alert
			content : "Apa yang akan dilakukan dengan data ini?", // konten dari smart alert
			buttons : '[Abaikan][Batalkan][Edit]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Edit") {
				$.ajax({
					url: 'pendaftaran/Data_ketetapan/getdatarekl',
					type: 'post',
					dataType: 'json',
					data: {
						id: id,
					},
					success: function (respon) {
						window.idtranskttap = id;
						window.respon = respon;
						exclude = ['tbltransaksiketetapan_tahunpajak','tbltransaksiketetapan_bulanpajak','tbltransaksiketetapan_carapenetapan','tblpendataanreklame_kodelokasi',];
						toTGL = ['tbltransaksiketetapan_tglentrisptpd','tbltransaksiketetapan_tglterimasptpd','tblpendataanreklame_masaawal','tblpendataanreklame_masaakhir'];
						toDuit = [];
						toNumber = ['tblpendataanreklame_panjang', 'tblpendataanreklame_lebar', 'tblpendataanreklame_luas']
						$.each(respon, function(index, val) {
							if(!inArray(index,exclude)) {
								$("#"+index).val(respon[index]);
								$("#"+index).select2('val',respon[index]!="0" ? respon[index] : "");
								$("input[type=radio][value='"+respon[index]+"']."+index).prop('checked', true); //pilih radio button
								// $("#"+index).html(respon[index]);
								if(inArray(index,toTGL)) {
									tgl = moment(respon[index]).format("LL");
									$("#"+index).html(tgl);
									$("#"+index).val(respon[index]!=null ? moment(respon[index]).format("L") : '');
								}
								if(inArray(index,toDuit)) {
									$("#"+index).html( formatRibuan(respon[index]) );
								}
								if(inArray(index,toNumber)) {
									$("#"+index).val( toNumberID(respon[index]) );
								}
							}
						});
						$("#tbltransaksiketetapan_tarif").val(respon.tbltransaksiketetapan_tarif*100);
						$("#tbltransaksiketetapan_omzettotal").val(parseInt(respon.tbltransaksiketetapan_pajak));
						// $("#tbltransaksiketetapan_rupiahdenda").val(respon.tbltransaksiketetapan_rupiahdenda);
						$("#tblpendataanreklame_masaawal, #tblpendataanreklame_masaakhir").trigger('change');
						$("#tblpendataanreklame_panjang, #tblpendataanreklame_lebar, #tblpendataanreklame_sisi").trigger('keyup');
						$("#tblpendataanreklame_jumlahreklame").trigger('keyup');
							$("#tblpendataanreklame_sisi").trigger('change');
						setTimeout(function() {
							$("#tblpendataanreklame_kelasjalan").trigger('change');
							$("#refreklamejalan_id").trigger('change');
							$("#tblpendataanreklame_ketinggian").trigger('change');
						}, 2000);

						// hitungPajak();
						$("[btnid=<?= $xc ?>]").show();
						window.cmdp = 'edit';
					}
				});
			} else if (ButtonPressed === 'Batalkan') {
				$.SmartMessageBox({
					title : "Anda akan membatalkan pendataan pajak reklame terpilih", // judul Smart Alert
					content : "Apakah anda yakin akan membatalkan?", // konten dari smart alert
					buttons : '[Tidak][Ya]' // pengaturan tombol
				}, function(ButtonPressed) {
					if (ButtonPressed === "Ya") {
						$.ajax({
							url: 'pendaftaran/Data_ketetapan/hapusrekl',
							type: 'post',
							dataType: 'json',
							data: {
								id: senc(id.toString()),
								token: senc(Math.random().toString())
							},
							success: function (respon) {
								if(respon.status=='success') {
									notifikasi('Sukses','Data berhasil dihapus', 'success',1,0);
									setTimeout(function() {
										setMasaPajak();
									}, 1000);
								} else {
									notifikasi('Gagal',respon.msg, 'fail',0,0);
								}
							}
						});
					}
				});
			} else if (ButtonPressed === 'Abaikan') {
				window.cmdp = 'tambah';
			}
		});
	}

	function toNumberID(number) {
		return number.toString().split('.').join(',');
	}
</script>
<style type="text/css">
	.disabled{
		background: #ddd !important;
	}

	.blink_me {
		-webkit-animation-name: blinker;
		-webkit-animation-duration: 1s;
		-webkit-animation-timing-function: linear;
		-webkit-animation-iteration-count: infinite;

		-moz-animation-name: blinker;
		-moz-animation-duration: 1s;
		-moz-animation-timing-function: linear;
		-moz-animation-iteration-count: infinite;

		animation-name: blinker;
		animation-duration: 1s;
		animation-timing-function: linear;
		animation-iteration-count: infinite;
	}

	@-moz-keyframes blinker {
		0% { opacity: 1.0; }
		50% { opacity: 0.0; }
		100% { opacity: 1.0; }
	}

	@-webkit-keyframes blinker {
		0% { opacity: 1.0; }
		50% { opacity: 0.0; }
		100% { opacity: 1.0; }
	}

	@keyframes blinker {
		0% { opacity: 1.0; }
		50% { opacity: 0.0; }
		100% { opacity: 1.0; }
	}
</style>