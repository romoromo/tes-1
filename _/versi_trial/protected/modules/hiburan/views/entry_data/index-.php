<?php define('ASSETS_URL',$data['theme_baseurl']); ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="well well-sm well-light bg-color-red txt-color-white">
            <h4><i class="fa fa-file fa-fw"></i> Enrty Data SPTPD Pajak Hiburan</h4>
        </div>
    </div>
</div>

<section class="widget-grid">
    <div class="jarviswidget jarviswidget-color-teal" id="wid-id-KJAJHAS" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
                <!-- widget options:
                usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                data-widget-colorbutton="false"
                data-widget-editbutton="false"
                data-widget-togglebutton="false"
                data-widget-deletebutton="false"
                data-widget-fullscreenbutton="false"
                data-widget-custombutton="false"
                data-widget-collapsed="true"
                data-widget-sortable="false"

            -->
            <header>
               <span class="widget-icon"> <i class="fa fa-table"></i> </span>
				<h2>Data Pajak</h2>
            </header>

            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body">

                    <div class="tab-content">
                        <form class="smart-form">
                            <fieldset>
                                <div class="row">
                                    <section class="col col-md-12">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="text-center" rowspan="2">
                                                        <h4>PEMERINTAH KOTA YOGYAKARTA </h4>
                                                        <h4><b>BADAN PENGELOLAAN KEUANGAN <br>DAN ASET DAERAH</b></h4>
                                                        Jl. Kenari No. 56 Yogyakarta Kode Pos : 55165 <br>Telp. (0274) 548519, 562835, 515865, 56282<br> Fax. (0274) 548519<br>
                                                        Email : bpkad@jogjakota.go.id HOTLINE SMS : 08122780001 <br> HOTLINE EMAIL : upik@jogjakota.go.id<br>WEBSITE : www.jogjakota.go.id
                                                    </td>
                                                    <td class="text-center" rowspan="2">
                                                        <h3>SURAT PEMBERITAHUAN <br>PAJAK DAERAH <br>(SPTPD)<br><br><br>PAJAK RESTORAN</h3>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <section class="col col-md-4"> Nomor </section>
                                                            <section class="col col-md-8"> 
                                                                <label class="input">
                                                                    <input type="text" name="card">
                                                                </label>
                                                            </section>
                                                        </div>
                                                        <div class="row">
                                                            <section class="col col-md-4"> Masa Pajak </section>
                                                            <section class="col col-md-8"> 
                                                                <label class="input">
                                                                    <input type="text" name="card">
                                                                </label>
                                                            </section>
                                                        </div>
                                                        <div class="row">
                                                            <section class="col col-md-4"> Tahun </section>
                                                            <section class="col col-md-8"> 
                                                                <label class="select">
                                                                    <select name="gender">
                                                                        <option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
                                                                    </select> <i></i> 
                                                                </label>
                                                            </section>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                       <div class="row">
                                                            <section class="col col-md-4">Tgl diterima BPKAD</section>
                                                            <section class="col col-md-8"> 
                                                                <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                                    <input type="text" name="request" class="datepicker " data-dateformat="dd/mm/yy" id="dp1492787144658">
                                                                </label>
                                                            </section>
                                                        </div> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <section class="col col-md-12">
                                                            Perhatian :
                                                            <ol>
                                                                <li>Baca petunjuk pengisian</li>
                                                                <li>Harap diisi dalam rangkap 2 (dua) ditulis dengan huruf cetak</li>
                                                                <li>Setelah diisi dan ditanda tangani, harap diserahkan kembali kepada badan pengelolaan keuangan dan aset daerah kota yogyakarta paling lambat 10 hari setelah masa pajak berakhir disertai dengan pembanyaran</li>
                                                                <li>Keterambatan penyerahan SPTPD sebagaimana dimaksudkan angka 3 (tiga) akan dilakukan penetapan secara jabatan dan atau sanksi sesuai peraturan daerah yang berlaku</li>
                                                            </ol>
                                                        </section>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <div class="row">
                                                            <section class="col col-md-3"><b>A. NPWPD</b></section>
                                                            <section class="col col-md-7">
                                                                <label class="input">
                                                                    <input type="text" name="card" data-mask="99-9999999-99-99" class="invalid">
                                                                </label>
                                                            </section>
                                                        </div>
                                                        <div class="row">
                                                            <section class="col col-md-3"><b>B. Nama Wajib Pajak</b></section>
                                                            <section class="col col-md-7">
                                                                <label class="input">
                                                                    <input type="text" name="card">
                                                                </label>
                                                            </section>
                                                        </div>
                                                        <div class="row">
                                                            <section class="col col-md-3"><b>C. Nama Usaha</b></section>
                                                            <section class="col col-md-7">
                                                                <label for="address" class="input">
                                                                    <input type="text" name="nama_usaha">
                                                                </label>
                                                            </section>
                                                        </div>
                                                        <div class="row">
                                                            <section class="col col-md-3"><b>D. Alamat tempat usaha</b></section>
                                                            <section class="col col-md-7">
                                                                <label class="textarea">                                        
                                                                    <textarea rows="3" name="alamat"></textarea> 
                                                                </label>
                                                            </section>
                                                        </div>
                                                        <div class="row">
                                                            <section class="col col-md-3"><b>E. Kecamatan</b></section>
                                                            <section class="col col-md-3">
                                                                <label class="select"> 
                                                                    <select class="select2" id="kecamatan">
                                                                        <option selected="" disabled="">== Silahkan Pilih ==</option>
                                                                        <option>Kecamatan Danurejan</option>
                                                                        <option>Kecamatan Gedong Tengen</option>
                                                                        <option>Kecamatan Gondokusuman</option>
                                                                    </select>
                                                                </label>
                                                            </section>
                                                            <section class="col col-md-1">Kelurahan</section>
                                                            <section class="col col-md-3">
                                                                <label class="select"> 
                                                                    <select class="select2" id="kelurahan">
                                                                        <option selected="" disabled="">== Silahkan Pilih ==</option>
                                                                        <option>Bausasran</option>
                                                                        <option>Tegal Panggung</option>
                                                                        <option>Suryatmajan</option>
                                                                    </select>
                                                                </label>
                                                            </section>
                                                        </div>
                                                        <div class="row">
                                                            <section class="col col-md-3"><b>F. Telephone</b></section>
                                                            <section class="col col-md-3">
                                                                <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                                                    <input type="text" name="phone" class="valid">
                                                                </label>
                                                            </section>
                                                        </div>
                                                        <div class="row">
                                                            <section class="col col-md-3"><b>G. Perubahan Identitas</b></section>
                                                            <section class="col col-md-8">
                                                                <span class="onoffswitch">
                                                                    <input type="checkbox" class="onoffswitch-checkbox" id="autoopen">
                                                                    <label class="onoffswitch-label" for="autoopen"> 
                                                                        <span class="onoffswitch-inner" data-swchon-text="Ada" data-swchoff-text="Tidak"></span> 
                                                                        <span class="onoffswitch-switch"></span>
                                                                    </label> 
                                                                </span>
                                                            </section>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </section>
                                </div>
                                <div class="row">
                                	<section class="col col-md-12">
                                		<div class="panel-group smart-accordion-default" id="accordion">
                                			<div class="panel panel-default">
                                				<div class="panel-heading">
                                					<h4 class="panel-title">
                                						<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> 
                                							<i class="fa fa-lg fa-angle-down pull-right"></i> 
                                							<i class="fa fa-lg fa-angle-up pull-right"></i> A. DIISI OLEH PENGURUS HIBURAN
                                						</a>
                                					</h4>
                                				</div>
                                				<div id="collapseOne" class="panel-collapse collapse">
                                					<div class="panel-body no-padding">
                                						<fieldset class="smart-form">
                                							<div class="row">
                                								<section class="col col-md-12">
                                									1. Hiburan yang diselenggarakan (di pilih yang sesuai)
                                								</section>
                                							</div>
                                							<div class="row">
                                								<section class="col col-md-12">
                                									<div class="row" style="margin-left: 4px;">
                                										<div class="col col-md-6">
                                											<div class="inline-group">
                                												<label class="checkbox" style="width: 100%;">
                                													<input type="checkbox" name="checkbox-inline" checked="checked">
                                													<i></i> Tontonan film
                                												</label>
                                												<label class="checkbox" style="width: 100%;">
                                													<input type="checkbox" name="checkbox-inline">
                                													<i></i> Pegelaran kesenian non tradisional, musik, tari/ busana
                                												</label>
                                												<label class="checkbox" style="width: 100%;">
                                													<input type="checkbox" name="checkbox-inline">
                                													<i></i> Pegelaran kesenian tradisional
                                												</label>
                                												<label class="checkbox" style="width: 100%;">
                                													<input type="checkbox" name="checkbox-inline">
                                													<i></i> Kontes kecantikan, binaraga dan sejenisnya 
                                												</label>
                                												<label class="checkbox" style="width: 100%;">
                                													<input type="checkbox" name="checkbox-inline">
                                													<i></i> Pameran
                                												</label>
                                												<label class="checkbox" style="width: 100%;">
                                													<input type="checkbox" name="checkbox-inline">
                                													<i></i> diskotik, klab malam dan sejenisnya
                                												</label>
                                												<label class="checkbox" style="width: 100%;">
                                													<input type="checkbox" name="checkbox-inline">
                                													<i></i> Karaoke
                                												</label>
                                											</div>
                                										</div>
                                										<div class="col col-md-6">
                                											<div class="inline-group">
                                												<label class="checkbox" style="width: 100%;">
                                													<input type="checkbox" name="checkbox-inline">
                                													<i></i> Sirkus, akrobat dan sulap
                                												</label>
                                												<label class="checkbox" style="width: 100%;">
                                													<input type="checkbox" name="checkbox-inline">
                                													<i></i> Permainan Billyard, golf, bowling
                                												</label>
                                												<label class="checkbox" style="width: 100%;">
                                													<input type="checkbox" name="checkbox-inline">
                                													<i></i> Pacuan Kuda dan kendaraan bermotor
                                												</label>
                                												<label class="checkbox" style="width: 100%;">
                                													<input type="checkbox" name="checkbox-inline">
                                													<i></i> Permainan ketangkasan
                                												</label>
                                												<label class="checkbox" style="width: 100%;">
                                													<input type="checkbox" name="checkbox-inline">
                                													<i></i> Panti pijat/massage, refleksi dan mandi uap
                                												</label>
                                												<label class="checkbox" style="width: 100%;">
                                													<input type="checkbox" name="checkbox-inline">
                                													<i></i> pertandingan olah raga
                                												</label>
                                												<label class="checkbox">
                                													<input type="checkbox" name="checkbox-inline">
                                													<i></i> Pusat Kebugaran
                                												</label>
                                											</div>
                                										</div>
                                									</div>
                                								</section>
                                							</div>
                                							<div class="row">
                                								<section class="col col-md-12">
                                									2. Harga tanda masuk yang berlaku
                                								</section>
                                							</div>
                                							<div class="row">
                                								<section class="col col-md-12">
                                									<table class="table table-bordered">
                                										<tbody>
                                											<tr>
                                												<td>
                                													<div class="input-group">
                                														<span class="input-group-addon">Kelas</span>
                                														<input class="form-control" id="prepend" type="text">
                                													</div>
                                												</td>
                                												<td>
                                													<div class="input-group">
                                														<span class="input-group-addon">Rp</span>
                                														<input class="form-control" id="prepend" type="text">
                                													</div>
                                												</td>
                                												<td>
                                													<div class="input-group">
                                														<span class="input-group-addon">Kelas</span>
                                														<input class="form-control" id="prepend" type="text">
                                													</div>
                                												</td>
                                												<td>
                                													<div class="input-group">
                                														<span class="input-group-addon">Rp</span>
                                														<input class="form-control" id="prepend" type="text">
                                													</div>
                                												</td>
                                												<td>
                                													<div class="input-group">
                                														<span class="input-group-addon">Kelas</span>
                                														<input class="form-control" id="prepend" type="text">
                                													</div>
                                												</td>
                                												<td>
                                													<div class="input-group">
                                														<span class="input-group-addon">Rp</span>
                                														<input class="form-control" id="prepend" type="text">
                                													</div>
                                												</td>
                                											</tr>
                                											<tr>
                                												<td>
                                													<div class="input-group">
                                														<span class="input-group-addon">Kelas</span>
                                														<input class="form-control" id="prepend" type="text">
                                													</div>
                                												</td>
                                												<td>
                                													<div class="input-group">
                                														<span class="input-group-addon">Rp</span>
                                														<input class="form-control" id="prepend" type="text">
                                													</div>
                                												</td>
                                												<td>
                                													<div class="input-group">
                                														<span class="input-group-addon">Kelas</span>
                                														<input class="form-control" id="prepend" type="text">
                                													</div>
                                												</td>
                                												<td>
                                													<div class="input-group">
                                														<span class="input-group-addon">Rp</span>
                                														<input class="form-control" id="prepend" type="text">
                                													</div>
                                												</td>
                                												<td>
                                													<div class="input-group">
                                														<span class="input-group-addon">Kelas</span>
                                														<input class="form-control" id="prepend" type="text">
                                													</div>
                                												</td>
                                												<td>
                                													<div class="input-group">
                                														<span class="input-group-addon">Rp</span>
                                														<input class="form-control" id="prepend" type="text">
                                													</div>
                                												</td>
                                											</tr>
                                											<tr>
                                												<td>
                                													<div class="input-group">
                                														<span class="input-group-addon">Kelas</span>
                                														<input class="form-control" id="prepend" type="text">
                                													</div>
                                												</td>
                                												<td>
                                													<div class="input-group">
                                														<span class="input-group-addon">Rp</span>
                                														<input class="form-control" id="prepend" type="text">
                                													</div>
                                												</td>
                                												<td>
                                													<div class="input-group">
                                														<span class="input-group-addon">Kelas</span>
                                														<input class="form-control" id="prepend" type="text">
                                													</div>
                                												</td>
                                												<td>
                                													<div class="input-group">
                                														<span class="input-group-addon">Rp</span>
                                														<input class="form-control" id="prepend" type="text">
                                													</div>
                                												</td>
                                												<td>
                                													<div class="input-group">
                                														<span class="input-group-addon">Kelas</span>
                                														<input class="form-control" id="prepend" type="text">
                                													</div>
                                												</td>
                                												<td>
                                													<div class="input-group">
                                														<span class="input-group-addon">Rp</span>
                                														<input class="form-control" id="prepend" type="text">
                                													</div>
                                												</td>
                                											</tr>
                                										</tbody>
                                									</table>
                                								</section>
                                							</div>
                                							<div class="row">
                                								<section class="col col-md-4">
                                									3. Jumlah petunjukan rata - rata pada hari biasa 
                                								</section>
                                								<section class="col col-md-2">
                                									<div class="input-group">
                                										<input class="form-control" id="append" type="text">
                                										<span class="input-group-addon">Kali</span>
                                									</div>
                                								</section>
                                							</div>
                                							<div class="row">
                                								<section class="col col-md-4">
                                									Jumlah petunjukan rata - rata pada hari libur/minggu 
                                								</section>
                                								<section class="col col-md-2">
                                									<div class="input-group">
                                										<input class="form-control" id="append" type="text">
                                										<span class="input-group-addon">Kali</span>
                                									</div>
                                								</section>
                                							</div>
                                							<div class="row">
                                								<section class="col col-md-4">
                                									4. Jumlah pengunjung rata - rata pada hari biasa 
                                								</section>
                                								<section class="col col-md-2">
                                									<div class="input-group">
                                										<input class="form-control" id="append" type="text">
                                										<span class="input-group-addon">orang</span>
                                									</div>
                                								</section>
                                							</div>
                                							<div class="row">
                                								<section class="col col-md-4">
                                									Jumlah pengunjung rata - rata pada hari libur/minggu 
                                								</section>
                                								<section class="col col-md-2">
                                									<div class="input-group">
                                										<input class="form-control" id="append" type="text">
                                										<span class="input-group-addon">orang</span>
                                									</div>
                                								</section>
                                							</div>
                                							<div class="row">
                                								<section class="col col-md-4">
                                									Jumlah pengunjung pada waktu pertunjukan insidental
                                								</section>
                                								<section class="col col-md-2">
                                									<div class="input-group">
                                										<input class="form-control" id="append" type="text">
                                										<span class="input-group-addon">orang</span>
                                									</div>
                                								</section>
                                							</div>
                                							<div class="row">
                                								<section class="col col-md-4">
                                									5. Jumlah meja/mesin
                                								</section>
                                								<section class="col col-md-2">
                                									<label class="input">
                                										<input type="text" name="card">
                                									</label>
                                								</section>
                                								<section class="col col-md-4">buah dengan koin / kartu elektronik dan sejenisnya </section>
                                							</div>
                                							<div class="row">
                                								<section class="col col-md-4">
                                									Harga Koin
                                								</section>
                                								<section class="col col-md-2">
                                									<div class="input-group">
                                										<span class="input-group-addon">Rp</span>
                                										<input class="form-control" id="prepend" type="text">
                                									</div>
                                								</section>
                                								<section class="col col-md-3">Harga kartu elektronik</section>
                                								<section class="col col-md-2">
                                									<div class="input-group">
                                										<span class="input-group-addon">Rp</span>
                                										<input class="form-control" id="prepend" type="text">
                                									</div>
                                								</section>
                                							</div>
                                							<div class="row">
                                								<section class="col col-md-4">
                                									6. Jumlah jalur bola bowling/ lubang golf
                                								</section>
                                								<section class="col col-md-2">
                                									<label class="input">
                                										<input type="text" name="card">
                                									</label>
                                								</section>
                                								<section class="col col-md-2">jalur/lubang</section>
                                							</div>
                                							<div class="row">
                                								<section class="col col-md-4">
                                									Tarif pemakaian
                                								</section>
                                								<section class="col col-md-2">
                                									<div class="input-group">
                                										<span class="input-group-addon">Rp</span>
                                										<input class="form-control" id="prepend" type="text">
                                									</div>
                                								</section>
                                								<section class="col col-md-2">per permainan</section>
                                							</div>
                                							<div class="row">
                                								<section class="col col-md-4">
                                									7. jumlah kamar / ruangan 
                                								</section>
                                								<section class="col col-md-2">
                                									<label class="input">
                                										<input type="text" name="card">
                                									</label>
                                								</section>
                                								<section class="col col-md-3">Buah dengan sewa kamar / jasa </section>
                                								<section class="col col-md-2">
                                									<div class="input-group">
                                										<span class="input-group-addon">Rp</span>
                                										<input class="form-control" id="prepend" type="text">
                                									</div>
                                								</section>
                                							</div>
                                							<div class="row">
                                								<section class="col col-md-4">
                                									8. Luaran anggota / sewa penggunaan fasilitas fitnes
                                								</section>
                                								<section class="col col-md-2">
                                									<div class="input-group">
                                									<span class="input-group-addon">Rp</span>
                                										<input class="form-control" id="appendprepend" type="text">
                                										<span class="input-group-addon">/ bulan</span>
                                									</div>
                                								</section>
                                								<section class="col col-md-1">atau</section>
                                								<section class="col col-md-2">
                                									<div class="input-group">
                                									<span class="input-group-addon">Rp</span>
                                										<input class="form-control" id="appendprepend" type="text">
                                										<span class="input-group-addon">/ hari</span>
                                									</div>
                                								</section>
                                							</div>
                                							<div class="row">
                                								<section class="col col-md-4">
                                									9. Penjualan karcis dengan mesin tiket
                                								</section>
                                								<section class="col col-md-2">
                                									<div class="inline-group">
                                										<label class="radio">
                                											<input type="radio" name="radio-inline" checked="">
                                											<i></i>Ya
                                										</label>
                                										<label class="radio">
                                											<input type="radio" name="radio-inline">
                                											<i></i>Tidak
                                										</label>
                                									</div>
                                								</section>
                                							</div>
                                							<div class="row">
                                								<section class="col col-md-4">
                                									10. Melaksanakan pembukuan / pencatatan 
                                								</section>
                                								<section class="col col-md-2">
                                									<div class="inline-group">
                                										<label class="radio">
                                											<input type="radio" name="radio-inline" checked="">
                                											<i></i>Ya
                                										</label>
                                										<label class="radio">
                                											<input type="radio" name="radio-inline">
                                											<i></i>Tidak
                                										</label>
                                									</div>
                                								</section>
                                							</div>
                                						</fieldset>
                                					</div>
                                				</div>
                                			</div>
                                			<div class="panel panel-default">
                                				<div class="panel-heading">
                                					<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i> Collapsible Group Item #2 </a></h4>
                                				</div>
                                				<div id="collapseTwo" class="panel-collapse collapse">
                                					<div class="panel-body">
                                						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                					</div>
                                				</div>
                                			</div>
                                			<div class="panel panel-default">
                                				<div class="panel-heading">
                                					<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i> Collapsible Group Item #3 </a></h4>
                                				</div>
                                				<div id="collapseThree" class="panel-collapse collapse">
                                					<div class="panel-body">
                                						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                					</div>
                                				</div>
                                			</div>
                                		</div>
                                	</section>
                                </div>
                            </fieldset>
                        </form>
                    </div>

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
</section><br>


<script type="text/javascript">

    pageSetUp();
    
    
    // pagefunction 
    var pagefunction = function() {
        //console.log("cleared");

        /* BASIC ;*/
            var responsiveHelper_dt_basic = undefined;
            var responsiveHelper_datatable_fixed_column = undefined;
            var responsiveHelper_datatable_col_reorder = undefined;
            var responsiveHelper_datatable_tabletools = undefined;
            
            var breakpointDefinition = {
                tablet : 1024,
                phone : 480
            };

            $('#dt_basic').dataTable({
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
                    "t"+
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                "autoWidth" : true,
                "preDrawCallback" : function() {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_dt_basic) {
                        responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
                    }
                },
                "rowCallback" : function(nRow) {
                    responsiveHelper_dt_basic.createExpandIcon(nRow);
                },
                "drawCallback" : function(oSettings) {
                    responsiveHelper_dt_basic.respond();
                }
            });


            $('#dt_basic1').dataTable({
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
                    "t"+
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                "autoWidth" : true,
                "preDrawCallback" : function() {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_dt_basic) {
                        responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic1'), breakpointDefinition);
                    }
                },
                "rowCallback" : function(nRow) {
                    responsiveHelper_dt_basic.createExpandIcon(nRow);
                },
                "drawCallback" : function(oSettings) {
                    responsiveHelper_dt_basic.respond();
                }
            });

            $('#dt_basic2').dataTable({
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
                    "t"+
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                "autoWidth" : true,
                "preDrawCallback" : function() {
                    // Initialize the responsive datatables helper once.
                    if (!responsiveHelper_dt_basic) {
                        responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic2'), breakpointDefinition);
                    }
                },
                "rowCallback" : function(nRow) {
                    responsiveHelper_dt_basic.createExpandIcon(nRow);
                },
                "drawCallback" : function(oSettings) {
                    responsiveHelper_dt_basic.respond();
                }
            });

        /* END BASIC */

    };
    
    // load related plugins
    
    loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/jquery.dataTables.min.js", function(){
        loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.colVis.min.js", function(){
            loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.tableTools.min.js", function(){
                loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.bootstrap.min.js", function(){
                    loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/datatables.responsive.min.js", pagefunction)
                });
            });
        });
    });
</script>