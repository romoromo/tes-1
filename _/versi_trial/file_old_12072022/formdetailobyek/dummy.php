<form id="form-pendaftaran" class="smart-form">
	<fieldset id="form-input-daftar">

		<div class="row" >
			<section class="col col-6">
				<label for="label" class="input">Bidang Usaha </label>
				<label class="select">
					<select name="param[tblizin_id]" class="select2" id="tblizin_id" onchange="formpenetapan(this.value)">
						<option selected="" value="">=== Pilih Bidang Usaha ====</option>
						<option value="hotel">Pajak Hotel</option>
						<option value="rumah_makan">Pajak Rumah Makan</option>
						<option value="hiburan">Pajak Hiburan</option>
						<option value="parkir">Pajak Parkir</option>
						<option value="walet">Pajak Sarang Burung Walet</option>
						<option value="reklame">Pajak Reklame</option>
						<option value="air_tanah">Pajak Air Tanah</option>
						<option value="galian">Pajak Galian / Gol C</option>
					</select>
					<b class="tooltip tooltip-bottom-right">Mohon Isikan Bidang Usaha</b>
				</label>
			</section>
			<section class="col col-md-6">
				<p style="margin-top: 25px;">
					<em> <i class="fa fa-info-circle"></i> Silahkan Pilih Bidang Usaha</em>
				</p>
			</section>
		</div>


		<div id="form1" style="display:none">
			<header style="border-color: rgb(255, 0, 19);">
				<p align="center">
					<i>Silahkan Lengkapi Data Dibawah ini</i>
				</p>
			</header>
			<br>
			<div class="row">
				<section class="col col-md-2">
					<p>Tanggal Penetapan </p>
				</section>
				<section class="col col-md-4">
					<label class="input"> <i class="icon-append fa fa-calendar"></i>
						<input type="text" name="tanggal_penetapan" class="datepicker " data-dateformat="dd/mm/yy" id="tanggal_penetapan">
					</label>
				</section>
				<section class="col col-md-2">
					<p>Besar Omset </p>
				</section>
				<section class="col col-md-4">
					<label class="input">
						<input class="input-sm" type="text" id="besar_omset" name="besar_omset">
					</label>
				</section>
			</div>
			<div class="row">
				<section class="col col-md-2">
					<p>Rekening Pendataan </p>
				</section>
				<section class="col col-md-4">
					<label class="select"> <i class="icon-append fa fa-search"></i>
						<select name="rekening_pendataan" id="rekening_pendataan" class="select2" placeholder="--- Pilih Rekening Pendataan---">
							<option>4.1.1.01.00.00 / Pajak Hotel</option>
							<option>4.1.1.01.09.00 / Hotel</option>
							<option>4.1.1.01.12.00 / Lospen /penginapan</option>
							<option>4.1.1.01.13.02 / Wisma</option>
						</select>
					</label>
				</section>
				<section class="col col-md-2">
					<p>Tarif Pajak </p>
				</section>
				<section class="col col-md-4">
					<div class="input-group">
						<input class="form-control" id="tarif" name="tarif" type="text">
						<span class="input-group-addon">%</span>
					</div>
				</section>
			</div>

			<div class="row">
				<section class="col col-md-2">
					<p>Keterangan </p>
				</section>
				<section class="col col-md-4">
					<label class="textarea textarea-resizable">
						<textarea rows="3" class="custom-scroll" id="ket" name="ket">
						</textarea>
					</label>
				</section>
				<section class="col col-md-2">
					<p>Denda </p>
				</section>
				<section class="col col-md-4">
					<label class="input">
						<input class="input-sm" type="text" id="denda" name="denda">
					</label>
				</section>
			</div>

			<div class="row">
				<section class="col col-md-6">
				</section>
				<section class="col col-md-2">
					<p>
						<strong>Besaran Pajak </strong>
					</p>
				</section>
				<section class="col col-md-3">
					<label class="input">
						<input class="input-sm" type="text" id="besar_pajak" name="besar_pajak">
					</label>
				</section>
				<section class="col col-md-1">
					<button class="btn btn-sm btn-default" onclick="hitung()">
						&nbsp;Hitung
					</button>
				</section>
			</div>
		</div>

		<div id="form2" style="display:none">
			<header style="border-color: rgb(255, 0, 19);">
				<p align="center">
					<i>Silahkan Lengkapi Data Dibawah ini</i>
				</p>
			</header>
			<br>
			<div class="row">
				<section class="col col-md-2">
					<p>Rekening Pendataan </p>
				</section>
				<section class="col col-md-5">
					<label class="select"> <i class="icon-append fa fa-search"></i>
						<select name="rekening_pendataan" id="rekening_pendataan" class="select2" placeholder="--- Pilih Rekening Pendataan---">
							<option>
							</option>
							<option>4.1.1.01.00.00 / Pajak Hotel</option>
							<option>4.1.1.01.09.00 / Hotel</option>
							<option>4.1.1.01.12.00 / Lospen /penginapan</option>
							<option>4.1.1.01.13.02 / Wisma</option>
						</select>
					</label>
				</section>
			</div>

			<div class="row">
				<section class="col col-md-2">
					<p>Tangga Penetapan</p>
				</section>
				<section class="col col-md-3">
					<label class="input"> <i class="icon-append fa fa-calendar"></i>
						<input type="text" name="tanggal_penetapan" class="datepicker " data-dateformat="dd/mm/yy" id="tanggal_penetapan">
					</label>
				</section>
			</div>

			<div class="widget-body">
				<hr class="simple">

				<ul id="myTab1" class="nav nav-tabs bordered">
					<li class="active">
						<a href="#s1" data-toggle="tab">Pendataan Reklame</a>
					</li>
					<li>
						<a href="#s2" data-toggle="tab"> Perhitungan Pajak I</a>
					</li>
					<li>
						<a href="#s3" data-toggle="tab"> Perhitungan Pajak II</a>
					</li>
					<li>
						<a href="#s4" data-toggle="tab"> Jaminan Bongkar</a>
					</li>
				</ul>

				<div id="myTabContent1" class="tab-content padding-10">
					<div class="tab-pane fade in active" id="s1">

						<div class="row">
							<section class="col col-md-2">
								<p>Nomor Izin Reklame </p>
							</section>
							<section class="col col-md-4">
								<label for="address" class="input">
									<input type="text" name="nomor_izin" id="nomor_izin">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Rokok / No Rokok</p>
							</section>
							<section class="col col-md-4">
								<label class="select">
									<select name="rokok">
										<option selected="" disabled="">Silahkan Pilih</option>
										<option>Rokok</option>
										<option>Non Rokok</option>
									</select> <i></i>
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Jenis Reklame</p>
							</section>
							<section class="col col-md-6">
								<label class="select">
									<select name="rokok">
										<option selected="" disabled="">Silahkan Pilih</option>
									</select> <i></i>
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Judul/Tema</p>
							</section>
							<section class="col col-md-6">
								<label class="textarea textarea-resizable">
									<textarea rows="3" class="custom-scroll" id="judul" name="judul">
									</textarea>
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Ukuran Panjang</p>
							</section>
							<section class="col col-md-3">
								<div class="input-group">
									<input class="form-control" id="panjang" type="text">
									<span class="input-group-addon">m</span>
								</div>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Ukuran Lebar</p>
							</section>
							<section class="col col-md-3">
								<div class="input-group">
									<input class="form-control" id="lebar" type="text">
									<span class="input-group-addon">m</span>
								</div>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Luas</p>
							</section>
							<section class="col col-md-3">
								<div class="input-group">
									<input class="form-control" id="luas" type="text">
									<span class="input-group-addon">m &sup2;</span>
								</div>
							</section>
							<section class="col col-md-3">
								<select class="form-control" disabled="disabled">
								</select>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Posisi Jalan</p>
							</section>
							<section class="col col-md-3">
								<label class="select">
									<select name="jalan">
										<option selected="" disabled="">Silahkan Pilih</option>
										<option>Tanah Negara</option>
										<option>Tanah Persil</option>
									</select> <i></i>
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Kelompok Jalan</p>
							</section>
							<section class="col col-md-6">
								<label class="select">
									<select name="kelompok_jln">
										<option selected="" disabled="">Silahkan Pilih</option>
									</select> <i></i>
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Nama Jalan</p>
							</section>
							<section class="col col-md-6">
								<label class="select">
									<select name="nama_jln">
										<option selected="" disabled="">Silahkan Pilih</option>
									</select> <i></i>
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Lokasi</p>
							</section>
							<section class="col col-md-6">
								<label for="address" class="input">
									<input type="text" name="lokasi" id="lokasi">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Lokasi Detail</p>
							</section>
							<section class="col col-md-6">
								<label class="textarea textarea-resizable">
									<textarea rows="3" class="custom-scroll" id="judul" name="judul">
									</textarea>
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Sudut Pandang</p>
							</section>
							<section class="col col-md-3">
								<label class="select">
									<select name="sudut_pandang">
										<option selected="" disabled="">Silahkan Pilih</option>
									</select> <i></i>
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Jumlah Pemasangan</p>
							</section>
							<section class="col col-md-3">
								<label class="input">
									<input type="text" name="jumlah" >
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Jumlah Pemasangan</p>
							</section>
							<section class="col col-md-3">
								<label class="input">
									<input type="text" name="jumlah" id="jumlah" >
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Masa Pajak</p>
							</section>
							<section class="col col-md-3">
								<input class="form-control" disabled="disabled" id="pajak" name="pajak" type="text" list="list">
							</section>
							<section class="col col-md-1">Satuan</section>
							<section class="col col-md-3">
								<select class="form-control" disabled="disabled">
								</select>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Lama Pemasangan</p>
							</section>
							<section class="col col-md-3">
								<label class="input">
									<input type="text" name="lama_pasang">
								</label>
							</section>
							<section class="col col-md-1">Satuan</section>
							<section class="col col-md-3">
								<label class="select">
									<select name="satuan">
										<option value="0" selected="" disabled="">Silahkan Pilih</option>
									</select> <i></i>
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Masa Berlaku</p>
							</section>
							<section class="col col-md-3">
								<label class="input"> <i class="icon-append fa fa-calendar"></i>
									<input type="text" name="masa" class="datepicker" data-dateformat="dd/mm/yy" id="masa">
								</label>
							</section>
							<section class="col col-md-1">s/d</section>
							<section class="col col-md-3">
								<label class="input"> <i class="icon-append fa fa-calendar"></i>
									<input type="text" name="berlaku" class="datepicker" data-dateformat="dd/mm/yy" id="berlaku">
								</label>
							</section>
						</div>

					</div>
					<div class="tab-pane fade" id="s2">
						<div class="alert alert-block alert-info ng-scope">
							A. Perhitungan Nilai Strategis (NS) = Perkalian antara bobot dan skor dari semua faktor nilai strategis (NS) dengan HDPP
						</div>

						<div class="row">
							<section class="col col-md-2">
								<p>Nilai Strategis</p>
							</section>
							<section class="col col-md-1">
								<p align="center">= &nbsp;&nbsp;&nbsp;&nbsp;(</p>
							</section>
							<section class="col col-md-1">
								<label class="input">
									<input type="text">
								</label>
							</section>
							<section class="col col-md-1">
								<p align="center"> &nbsp;&nbsp;&nbsp;&nbsp;x</p>
							</section>
							<section class="col col-md-1">
								<label class="input">
									<input type="text">
								</label>
							</section>
							<section class="col col-md-1">
								<p align="center"> &nbsp;&nbsp;&nbsp;&nbsp;%)</p>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Tanggal Penelitian</p>
							</section>
							<section class="col col-md-4">
								<label class="input"> <i class="icon-append fa fa-calendar"></i>
									<input type="text" name="tgl_penelitian" class="datepicker " data-dateformat="dd/mm/yy" id="tgl_penelitian">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>
									<strong>Perhitungan Pajak Baru</strong>
								</p>
							</section>
							<section class="col col-md-4">
								<label for="address" class="input">
									<input type="text" name="perhitungan" id="perhitungan">
								</label>
							</section>
						</div>
					</div>

					<div class="tab-pane fade" id="s3">
						<div class="alert alert-block alert-info ng-scope">
							A. Perhitungan NS dan HDPP
						</div>
						<div class="row">
							<section class="col col-md-2">
								Nilai Strategis (NS)
							</section>
							<section class="col col-md-3">
								<label class="input">
									<input type="text" name="ns" id="ns">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								HDPP
							</section>
							<section class="col col-md-3">
								<label class="input">
									<input type="text" name="HDPP" id="HDPP">
								</label>
							</section>
						</div>
						<div class="alert alert-block alert-info ng-scope">
							<p>B. Perhitungan Nilai Sewa Reklame (NSR) = HDPP + NS</p>
						</div>
						<div class="row">
							<section class="col col-md-2">
								Nilai Sewa Reklame (NSR)
							</section>
							<section class="col col-md-3">
								<input class="form-control" disabled="disabled" type="text" id="nsr" name="nsr">
							</section>
							<section class="col col-md-1">
								<p align="center">+</p>
							</section>
							<section class="col col-md-3">
								<input class="form-control" disabled="disabled" type="text" id="nsr1" name="nsr1">
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
							</section>
							<section class="col col-md-3">
								<input class="form-control" disabled="disabled" type="text" id="nsr" name="nsr">
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								Pajak Per Meter
							</section>
							<section class="col col-md-3">
								<input class="form-control" disabled="disabled" type="text" id="meter" name="meter">
							</section>
							<section class="col col-md-1">
								<p align="center">x</p>
							</section>
							<section class="col col-md-1">
								<input class="form-control" disabled="disabled" type="text" id="x" name="x">
							</section>
							<section class="col col-md-1">
								<p align="center">%</p>
							</section>
						</div>
						<div class="alert alert-block alert-info ng-scope">
							<p>C. Pajak Reklame = Pajak Per meter x Luas x Jumlah x Luas Per Pasang</p>
						</div>
						<div class="row">
							<section class="col col-md-2">
								Pajak Reklame
							</section>
							<section class="col col-md-3">
								<input class="form-control" disabled="disabled" type="text" id="nsr" name="nsr">
							</section>
							<section class="col col-md-1">
								<p align="center">x</p>
							</section>
							<section class="col col-md-1">
								<input class="form-control" disabled="disabled" type="text" id="nsr1" name="nsr1">
							</section>
							<section class="col col-md-1">
								<p align="center">x</p>
							</section>
							<section class="col col-md-1">
								<input class="form-control" disabled="disabled" type="text" id="nsr1" name="nsr1">
							</section>
							<section class="col col-md-1">
								<p align="center">x</p>
							</section>
							<section class="col col-md-1">
								<input class="form-control" disabled="disabled" type="text" id="nsr1" name="nsr1">
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
							</section>
							<section class="col col-md-3">
								<input class="form-control" disabled="disabled" type="text" id="nsr" name="nsr">
							</section>
						</div>
						<div class="alert alert-block alert-info ng-scope">
							<p>D. Keringanan Pajak dan Denda </p>
						</div>
						<div class="row">
							<section class="col col-md-2">
								Rokok / Non Rokok
							</section>
							<section class="col col-md-1">
								<p align="center">(</p>
							</section>
							<section class="col col-md-1">
								<label class="input">
									<input type="text" name="HDPP" id="HDPP">
								</label>
							</section>
							<section class="col col-md-1">
								<p align="center">% x</p>
							</section>
							<section class="col col-md-3">
								<input class="form-control" disabled="disabled" type="text" id="nsr1" name="nsr1">
							</section>
							<section class="col col-md-1">
								<p align="center">)</p>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
							</section>
							<section class="col col-md-3">
								<input class="form-control" disabled="disabled" type="text" id="nsr" name="nsr">
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								Keringanan
							</section>
							<section class="col col-md-2">
								<label class="input">
									<input type="text" name="HDPP" id="HDPP">
								</label>
							</section>
							<section class="col col-md-1">
								<p align="center">% x</p>
							</section>
							<section class="col col-md-3">
								<input class="form-control" disabled="disabled" type="text" id="nsr1" name="nsr1">
							</section>
							<section class="col col-md-1">
								<p align="center">)</p>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
							</section>
							<section class="col col-md-3">
								<input class="form-control" disabled="disabled" type="text" id="nsr" name="nsr">
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								Denda
							</section>
							<section class="col col-md-3">
								<label class="input">
									<input type="text" name="HDPP" id="HDPP">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<strong>Bayar</strong>
							</section>
							<section class="col col-md-3">
								<input class="form-control" disabled="disabled" type="text" id="bayar" name="bayar">
							</section>
						</div>

					</div>

					<div class="tab-pane fade" id="s4">
						<div class="row">
							<section class="col col-md-3">
								Jenis Biaya Bongkar
							</section>
							<section class="col col-md-6">
								<label class="select">
									<select name="satuan">
										<option value="0" selected="" disabled="">Silahkan Pilih</option>
									</select> <i></i>
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-3">
								Harga Satuan Pembongkaran
							</section>
							<section class="col col-3">
								<input class="form-control" disabled="disabled" type="text" id="pembongkaran" name="pembongkaran">
							</section>
						</div>
						<div class="row">
							<section class="col col-3">
								Jumlah Pemasangan
							</section>
							<section class="col col-3">
								<input class="form-control" disabled="disabled" type="text" id="pemasangan" name="pemasangan">
							</section>
						</div>
						<div class="row">
							<section class="col col-3">
								Luas Reklame
							</section>
							<section class="col col-3">
								<input class="form-control" disabled="disabled" type="text" id="luas" name="luas">
							</section>
						</div>
						<div class="row">
							<section class="col col-3">
								<strong>Biaya Pembongkaran</strong>
							</section>
							<section class="col col-3">
								<input class="form-control" disabled="disabled" type="text" id="luas" name="luas">
							</section>
							<section class="col col-1">
								<button class="btn btn-sm btn-primary">
									&nbsp;Hitung
								</button>
							</section>
						</div>
					</div>

				</div>
			</div>
		</div>
	</fieldset>
	<footer>
		<button class="btn btn-primary" data-dismiss="modal" onclick="simpan()">
			Simpan
		</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">
			Batal
		</button>
	</footer>
</form>