<?php define('ASSETS_URL',$data['theme_baseurl']); ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="well well-sm well-light bg-color-red txt-color-white">
            <h4><i class="fa fa-file fa-fw"></i> Pendaftaran Baru</h4>
        </div>
    </div>
</div>

<section class="widget-grid">
    <div class="jarviswidget jarviswidget-color-teal" id="wid-id-pendaftaran" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
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
                                <div class="row" style="display: none;">
                                    <section class="col col-md-12">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="row text-center">
                                                            <section class="col col-md-3 text-center">
                                                                <center><img align="center" src="/versi1.1/images/logo.png" class="pull-center" alt="LOGO" style="width: 29%;"></center>
                                                            </section>
                                                            <section class="col col-md-7">
                                                                <h4>PEMERINTAH KOTA YOGYAKARTA </h4>
                                                                <h4><b>BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH</b></h4>
                                                                Jl. Kenari No. 56 Yogyakarta Kode Pos : 55165 Telp. (0274) 548519, 562835, 515865, 56282<br> Fax. (0274) 548519<br>
                                                                Email : bpkad@jogjakota.go.id HOTLINE SMS : 08122780001  HOTLINE EMAIL : upik@jogjakota.go.id<br>WEBSITE : www.jogjakota.go.id
                                                            </section>
                                                            <section class="col col-md-1"></section>
                                                        </div>
                                                        <div class="row text-center">
                                                            <section class="col col-md-12"><h4><b>FORMULIR PENDAFTARAN WAJIB PAJAK BADAN/PEMILIK USAHA</b></h4></section>
                                                        </div>
                                                        <div class="row">
                                                            <section class="col col-md-1"></section>
                                                            <section class="col col-md-7">
                                                                <b>Nomor Formulir</b><br>
                                                                <h5>Seri A : 00173</h5>
                                                            </section>
                                                            <section class="col col-md-4">
                                                                Kepada Yth.<br>
                                                                -----------------------------------------------<br>
                                                                -----------------------------------------------<br>
                                                                di---------------------------------------------
                                                            </section>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <section class="col col-md-12">
                                                            <h5><b>Perhatian :</b></h5>
                                                            <ol style="margin-left: 3%;">
                                                                <li>Harap diisi dalam rangkap 2 (dua) ditulis dengan huruf cetak</li>
                                                                <li>Diberi tanda centang pada kotak yang tersedia untuk jawaban yang diberikan</li>
                                                                <li>Setelah Formulir Pendaftaran ini diisi dan ditanda - tangani harap diserahkan kembali kepada Badan Pengelolaan Keuanagan dan Aset Daerah Kota Yogyakarta langsung atau di kirim melaui pos paling lambat tanggal.</li>
                                                            </ol>
                                                        </section>
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
                                							<i class="fa fa-lg fa-angle-up pull-right"></i><p align="center"> DIISI OLEH SELURUH WAJIB PAJAK BADAN</p>
                                						</a>
                                					</h4>
                                				</div>
                                				<div id="collapseOne" class="panel-collapse">
                                					<div class="panel-body no-padding">
                                						<fieldset class="smart-form">
                                                            <div class="row">
                                                                <section class="col col-md-2">
                                                                    1. Nama Badan / Merk Usaha
                                                                </section>
                                                                <section class="col col-md-6">
                                                                    <label for="address" class="input">
                                                                        <input type="text" name="tnpwpddaftar_bumerk" id="tnpwpddaftar_bumerk">
                                                                    </label>
                                                                </section>
                                                            </div>
                                                            <div class="col col-3" style="display: none;">
                                                                <section>
                                                                    <div class="row">
                                                                        <label class="label col col-4">Jenis Usaha</label>
                                                                        <div class="col col-12">
                                                                            <div class="inline-group">
                                                                                <label class="radio">
                                                                                    <input type="radio" class="tblsubyek_jenisusaha" name="param[tblsubyek_jenisusaha]" id="isPerorangan" value="Perorangan">
                                                                                    <i></i> Perorangan
                                                                                </label>
                                                                                <label class="radio">
                                                                                    <input type="radio" class="tblsubyek_jenisusaha" name="param[tblsubyek_jenisusaha]" id="isBadanUsaha" value="Badan Usaha">
                                                                                    <i></i> Badan Usaha
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </section>
                                                            </div>
                                                            <div style="margin-left: 2%;">
                                                                <div class="row">
                                                                    <section class="col col-md-2">
                                                                        NIK
                                                                    </section>
                                                                    <section class="col col-md-3">
                                                                        <label for="address" class="input">
                                                                            <input data-mask="99.99.99.99.99.99.9999" value="" type="text" name="tnpwpddaftar_bunik" id="tnpwpddaftar_bunik">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-2">
                                                                        NPWP
                                                                    </section>
                                                                    <section class="col col-md-3">
                                                                        <label for="address" class="input">
                                                                            <input data-mask="99.999.999.9-999.999" value="" type="text" name="tnpwpddaftar_bunpwp" id="tnpwpddaftar_bunpwp">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                 <div class="row">
                                                                    <section class="col col-md-2">
                                                                        No. HP
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label for="address" class="input">
                                                                            <input type="text" id="tnpwpddaftar_buhp" name="tnpwpddaftar_buhp">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <section class="col col-md-12">
                                                                    2. Alamat (photo copy Surat Keterangan Domisili diampirkan)
                                                                </section>
                                                            </div>
                                                            <div style="margin-left: 2%;">
                                                                <div class="row">
                                                                    <section class="col col-md-2">
                                                                       Jalan / No.
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label for="address" class="input">
                                                                            <input type="text" id="tnpwpddaftar_bujalan" name="tnpwpddaftar_bujalan">
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                       Kabupaten / Kota
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label for="address" class="input">
                                                                            <input type="text" id="tnpwpddaftar_milikkabkota" name="tnpwpddaftar_milikkabkota">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-2">
                                                                       Rt/Rw / Rk
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label for="address" class="input">
                                                                            <input type="text" id="tnpwpddaftar_burtrwrk" name="tnpwpddaftar_burtrwrk">
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                       Nomor Telepon
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label for="address" class="input">
                                                                            <input type="text" id="tnpwpddaftar_butelp" name="tnpwpddaftar_butelp">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-2">
                                                                       Kecamatan
                                                                    </section>
                                                                    <section class="col col-md-3">
                                                                        <label class="select">
                                                                            <select class="select2" name="param[refkecamatan_id]" id="refkecamatan_id">
                                                                                <option value="">=== Pilih Kecamatan ===</option>
                                                                                 <?php foreach ($data['kecamatan'] as $r_kecamatan2): ?>
                                                                                <option value="<?php echo $r_kecamatan2['refkecamatan_id']; ?>"><?php echo $r_kecamatan2['refkecamatan_nama']; ?></option>
                                                                                <?php endforeach ?>
                                                                            </select> 
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                       File upload
                                                                    </section>
                                                                    <section class="col col-md-4">
                                                                        <label for="file" class="input input-file">
                                                                        <div class="button"><input type="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" readonly="">
                                                                        </label>
                                                                    </section>
                                                                </div>

                                                                <div class="row">
                                                                    <section class="col col-md-2">
                                                                       Kelurahan
                                                                    </section>
                                                                    <section class="col col-md-3">
                                                                        <label class="select">
                                                                             <select class="select2" name="param[refkelurahan_id]" id="refkelurahan_id">
                                                                                <option value="">=== Pilih Kelurahan ===</option>
                                                                                <?php foreach ($data['kelurahan'] as $r_kelurahan2): ?>
                                                                                <option value="<?php echo $r_kelurahan2['refkelurahan_id']; ?>"><?php echo $r_kelurahan2['refkelurahan_nama']; ?></option>
                                                                                <?php endforeach ?>
                                                                            </select>
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                       Kode Pos
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label for="address" class="input">
                                                                            <input type="text" id="tnpwpddaftar_bukodepos" name="tnpwpddaftar_bukodepos">
                                                                        </label>
                                                                    </section>
                                                                </div>                                                              

                                                            </div>
                                                            <div class="row">
                                                                <section class="col col-md-12">
                                                                    3. Surat izin yang dimiliki (Photo copy surat izin harap dilampirkan)
                                                                </section>
                                                            </div>
                                                            <div style="margin-left: 2%;">
                                                                <div class="row">
                                                                    <section class="col col-md-2">
                                                                       Surat Izin Gangguan
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label for="address" class="input">
                                                                            <input type="text" name="nama_usaha">
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                       Tanggal
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                                        <input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="tgl_izinganguan">
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-md-4">
                                                                        <label for="file" class="input input-file">
                                                                        <div class="button"><input type="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" readonly="">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-2">
                                                                       Surat Izin Usaha Kepariwisata
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label for="address" class="input">
                                                                            <input type="text" name="nama_usaha">
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                       Tanggal
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                                        <input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="tgl_izinkepariwisata">
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-md-4">
                                                                        <label for="file" class="input input-file">
                                                                        <div class="button"><input type="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" readonly="">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-2">
                                                                      No Akta Pendirian
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label for="address" class="input">
                                                                            <input type="text" id="tnpwpddaftar_bunoakta" name="tnpwpddaftar_bunoakta">
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                       Tanggal
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                                        <input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="tgl_izin..">
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-md-4">
                                                                        <label for="file" class="input input-file">
                                                                        <div class="button"><input type="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" readonly="">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <section class="col col-md-12">
                                                                    4. Bidang Usaha (harap diisi sesuai dengan bidang usahanya)
                                                                </section>
                                                            </div>
                                                            <div style="margin-left: 2%;">
                                                                <div class="row">
                                                                    <section class="col col-md-3">
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="checkbox" checked="checked">
                                                                            <i></i>Hotel
                                                                        </label>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="checkbox">
                                                                            <i></i>Restoran
                                                                        </label>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="checkbox">
                                                                            <i></i>Hiburan
                                                                        </label>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="checkbox">
                                                                            <i></i>Reklame
                                                                        </label>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="checkbox">
                                                                            <i></i>Penerangan Jalan
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-md-6">
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="checkbox">
                                                                            <i></i>Peyelenggaraan tempat parkir di luar badan jalan
                                                                        </label>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="checkbox">
                                                                            <i></i>Pengambilan dan atau Pemanfaatan air tanah
                                                                        </label>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="checkbox">
                                                                            <i></i>pengambilan dan atau pengusahaan sarang burung walet
                                                                        </label>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="checkbox">
                                                                            <i></i> PBB
                                                                        </label>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="checkbox">
                                                                            <i></i> BPHTB
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                					</div>
                                				</div>
                                			</div>
                                			<div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapsehree" class="collapsed"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i><p align="center"> KETERANGAN PEMILIK ATAU PENGELOLA </p></a></h4>
                                                </div>
                                                <div id="collapsehree" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <fieldset class="smart-form">
                                                            <div class="row">
                                                                <section class="col col-md-3">
                                                                   Nama Pemilik / Pengelola
                                                                </section>
                                                                <section class="col col-md-4">
                                                                    <label for="address" class="input">
                                                                        <input type="text" id="tnpwpddaftar_miliknama" name="tnpwpddaftar_miliknama">
                                                                    </label>
                                                                </section>
                                                            </div>
                                                            <div style="margin-left: 2%;">
                                                                <div class="row">
                                                                    <section class="col col-md-2">
                                                                        NIK
                                                                    </section>
                                                                    <section class="col col-md-3">
                                                                        <label for="address" class="input">
                                                                            <input data-mask="99.99.99.99.99.99.9999" value="" type="text" name="tnpwpddaftar_bunik" id="tnpwpddaftar_bunik">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-2">
                                                                        NPWP
                                                                    </section>
                                                                    <section class="col col-md-3">
                                                                        <label for="address" class="input">
                                                                            <input data-mask="99.999.999.9-999.999" value="" type="text" name="tnpwpddaftar_bunpwp" id="tnpwpddaftar_bunpwp">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                 <div class="row">
                                                                    <section class="col col-md-2">
                                                                        No. HP
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label for="address" class="input">
                                                                            <input type="text" id="tnpwpddaftar_buhp" name="tnpwpddaftar_buhp">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="display: none;">
                                                                <section class="col col-md-3">
                                                                   Jabatan
                                                                </section>
                                                                <section class="col col-md-4">
                                                                    <label class="select">
                                                                        <select id="tnpwpddaftar_milikjab" name="tnpwpddaftar_milikjab">
                                                                            <option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
                                                                        </select> <i></i> 
                                                                    </label>
                                                                </section>
                                                            </div>
                                                            <div class="row">
                                                                <section class="col col-md-12">
                                                                   Alamat Tempat Tinggal (Melampirkan Identitas yang dilaporkan)
                                                                </section>
                                                            </div>
                                                            <div style="margin-left: 2%;">
                                                                <div class="row">
                                                                    <section class="col col-md-2">
                                                                       Jalan / No.
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label for="address" class="input">
                                                                            <input type="text" id="tnpwpddaftar_milikjalan" name="tnpwpddaftar_milikjalan">
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                       Kabupaten / Kota
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label for="address" class="input">
                                                                            <input type="text" id="tnpwpddaftar_milikkabkota" name="tnpwpddaftar_milikkabkota">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-2">
                                                                       Rt/Rw / Rk
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label for="address" class="input">
                                                                            <input type="text" name="nama_usaha">
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                       Nomor Telepon
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label for="address" class="input">
                                                                            <input type="text" name="nama_usaha">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-2">
                                                                       Kelurahan
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label class="select">
                                                                            <select name="gender">
                                                                                <option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
                                                                            </select> <i></i> 
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                       Kode Pos
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label for="address" class="input">
                                                                            <input type="text" name="nama_usaha">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-2">
                                                                       Kecamatan
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label class="select">
                                                                            <select name="gender">
                                                                                <option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
                                                                            </select> <i></i> 
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                       File upload
                                                                    </section>
                                                                    <section class="col col-md-4">
                                                                        <label for="file" class="input input-file">
                                                                        <div class="button"><input type="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" readonly="">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <section class="col col-md-12">
                                                                   Kewajiban Pajak
                                                                </section>
                                                            </div>
                                                            <div style="margin-left: 2%;">
                                                                <div class="row">
                                                                    <section class="col col-md-3">
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="checkbox" checked="checked">
                                                                            <i></i>Pajak Hotel
                                                                        </label>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="checkbox">
                                                                            <i></i>Pajak Restoran
                                                                        </label>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="checkbox">
                                                                            <i></i>Pajak Hiburan
                                                                        </label>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="checkbox">
                                                                            <i></i>Pajak Reklame
                                                                        </label>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="checkbox">
                                                                            <i></i>Pajak Penerangan Jalan
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-md-6">
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="checkbox">
                                                                            <i></i>Pajak Parkir
                                                                        </label>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="checkbox">
                                                                            <i></i>Pajak Air Tanah
                                                                        </label>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="checkbox">
                                                                            <i></i>Pajak Sarang Burung Walet
                                                                        </label>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="checkbox">
                                                                            <i></i> PBB Perdesaan dan Perkantoran
                                                                        </label>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" name="checkbox">
                                                                            <i></i> BPHTB
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                            </div>
                                                            <div class="col col-md-4" style="float: right;">
                                                                <div class="row">
                                                                    <section class="col col-md-4">
                                                                        Tempat
                                                                    </section>
                                                                    <section class="col col-md-8">
                                                                        <label for="address" class="input">
                                                                            <input type="text" name="nama_usaha">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-4">
                                                                        Tanggal
                                                                    </section>
                                                                    <section class="col col-md-8">
                                                                        <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                                            <input type="text" name="request" class="datepicker " data-dateformat="dd/mm/yy" id="tagl_pengelola">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-4">
                                                                        Nama 
                                                                    </section>
                                                                    <section class="col col-md-8">
                                                                        <label for="address" class="input">
                                                                            <input type="text" name="nama_usaha">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row" style="display: none;">
                                                                    <section class="col col-md-4">
                                                                        Tanda Tangan 
                                                                    </section>
                                                                    <section class="col col-md-8">
                                                                        <label class="select">
                                                                            <select name="gender">
                                                                                <option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
                                                                            </select> <i></i> 
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default" style="display: none;">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapsefoot" class="collapsed"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i><p align="center"> DIISI OLEH PETUGAS PENERIMA </p></a></h4>
                                                </div>
                                                <div id="collapsefoot" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <fieldset class="smart-form">
                                                            <div class="row">
                                                                <section class="col col-md-2">
                                                                   Diterima tanggal
                                                                </section>
                                                                <section class="col col-md-3">
                                                                    <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                                        <input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="diterima_tanggal">
                                                                    </label>
                                                                </section>
                                                            </div>
                                                            <div class="row">
                                                                <section class="col col-md-2">
                                                                   Nama Jelas / NIP
                                                                </section>
                                                                <section class="col col-md-3">
                                                                    <label for="address" class="input">
                                                                        <input type="text" name="nama_usaha">
                                                                    </label>
                                                                </section>
                                                            </div>
                                                            <div class="row" style="display: none;">
                                                                <section class="col col-md-2">
                                                                  Tanda Tangan
                                                                </section>
                                                                <section class="col col-md-3">
                                                                    <label class="select">
                                                                        <select name="gender">
                                                                            <option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
                                                                        </select> <i></i> 
                                                                    </label>
                                                                </section>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default" style="display: none;">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapsesix" class="collapsed"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i><p align="center"> DIISI OLEH PETUGAS PENCATAT DATA </p></a></h4>
                                                </div>
                                                <div id="collapsesix" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <fieldset class="smart-form">
                                                            <div class="row">
                                                                <section class="col col-md-2">
                                                                   NPWPD yang diberikan
                                                                </section>
                                                                <section class="col col-md-3">
                                                                    <label for="address" class="input">
                                                                        <input type="text" name="nama_usaha">
                                                                    </label>
                                                                </section>
                                                            </div>
                                                            <div class="row">
                                                                <section class="col col-md-2">
                                                                   Nama Jelas / NIP
                                                                </section>
                                                                <section class="col col-md-3">
                                                                    <label for="address" class="input">
                                                                        <input type="text" name="nama_usaha">
                                                                    </label>
                                                                </section>
                                                            </div>
                                                            <div class="row" style="display: none;">
                                                                <section class="col col-md-2">
                                                                  Tanda Tangan
                                                                </section>
                                                                <section class="col col-md-3">
                                                                    <label class="select">
                                                                        <select name="gender">
                                                                            <option value="0" selected="" disabled="">== Silahkan Pilih ==</option>
                                                                        </select> <i></i> 
                                                                    </label>
                                                                </section>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                		</div>
                                	</section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-12">
                                        <p align="center " style="margin-top: 9px;">Gunting di sini</p>
                                    </section><header></header>
                                </div>
                                <div class="row" style="float: right;">
                                    <section class="col col-md-4">No. Formulir</section>
                                    <section class="col col-md-8">
                                        <label for="address" class="input">
                                            <input type="text" name="nama_usaha">
                                        </label>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col col-md-12"><h3 align="center">TANDA TERIMA</h3></section>
                                </div><hr><br>
                                <div class="row">
                                    <div class="col col-md-6">
                                        <div class="row">
                                            <section class="col col-md-4">
                                                Nama
                                            </section>
                                            <section class="col col-md-8">
                                                <label for="address" class="input">
                                                    <input type="text" name="nama_usaha">
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-md-4">
                                                Alamat
                                            </section>
                                            <section class="col col-md-8">
                                                <label class="textarea">                                        
                                                <textarea rows="3" name="info"></textarea> 
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-md-4">
                                                Estimasi Tanggal Jadi NPWPD
                                            </section>
                                            <section class="col col-md-5">
                                                <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                    <input type="text" name="request" class="datepicker " data-dateformat="dd/mm/yy" id="tagl_sah">
                                                </label>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="col col-md-6">
                                        <div class="row">
                                            <section class="col col-md-4">
                                                Tempat
                                            </section>
                                            <section class="col col-md-8">
                                                <label for="address" class="input">
                                                    <input type="text" name="nama_usaha">
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-md-4">
                                                Tanggal Terima
                                            </section>
                                            <section class="col col-md-5">
                                                <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                    <input type="text" name="request" class="datepicker " data-dateformat="dd/mm/yy" id="tagl_sah">
                                                </label>
                                            </section>
                                        </div>
                                        <div class="row">
                                            <section class="col col-md-4">
                                                Yang Menerima
                                            </section>
                                            <section class="col col-md-8">
                                                <label for="address" class="input">
                                                    <input type="text" name="nama_usaha">
                                                </label>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <footer>
                                <a style="float: right;" onclick="simpan()" href="javascript:void" class="btn btn-primary"></i> Simpan</a>
                                    <!-- <button onclick="simpan()" class="btn btn-primary">
                                        Simpan
                                    </button>
                                     -->
                                 <button type="reset" class="btn btn-default" data-dismiss="modal">
                                    Batal
                                </button>
                            </footer>
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
     jQuery(document).ready(function($) {
        window.cmd="tambah";
        window.id="";
    });

    function getdata(value) {
       $.ajax({
           url: 'hotel/entry_data/getdata',
           type: 'POST',
           dataType: 'json',
           data: {npwpd: value},
           success:function (respon) {
               if (respon.statusdata=='ada') {
                    window.cmd = "edit";
                    window.id = respon.idpajakhotel;
                    $('#idpajakhotel').val(respon.idpajakhotel);
                    $('#tpajakhotel_nomor').val(respon.tpajakhotel_nomor);
                    $('#tpajakhotel_mspajak').val(respon.tpajakhotel_mspajak);
                    $('#tpajakhotel_tahunpajak').val(respon.tpajakhotel_tahunpajak);
                    $('#tpajakhotel_tglditerima').val(respon.tpajakhotel_tglditerima);
                    $('#tnpwpddaftar_npwpd').val(respon.tnpwpddaftar_npwpd);
                    $('#omset_kamarhotel').val(respon.omset_kamarhotel);
                    $('#omset_fasilitaspenunjang').val(respon.omset_fasilitaspenunjang);
                    $('#omset_kamarkos').val(respon.omset_kamarkos);
                    $('#omset_jumlah').val(respon.omset_jumlah);
                    $('#omset_servis').val(respon.omset_servis);
                    $('#omset_jumlahtotal').val(respon.omset_jumlahtotal);
                    $('#pajak_terutang').val(respon.pajak_terutang);
                    $('#pajak_sudahdibayar').val(respon.pajak_sudahdibayar);
                    $('#penelitian_diterimatgl').val(respon.penelitian_diterimatgl);
                    $('#penelitian_namapetugas').val(respon.penelitian_namapetugas);
                    $('#penelitian_nip').val(respon.penelitian_nip);
                    $('#tt_no_sptpd').val(respon.tt_no_sptpd);
                    $('#tt_tanggal').val(respon.tt_tanggal);
                    $('#tt_yang_menerima').val(respon.tt_yang_menerima);
               }else{
                    window.cmd = "tambah";
               }
           }
       })
    }

    function simpan() {
        $.ajax({
            url: 'pendaftaran/pendaftaran_baru/simpandata',
            type: 'POST',
            dataType: 'json',
            data: {
                cmd : window.cmd,
                id : window.id,
                tnpwpddaftar_bumerk : $('#tnpwpddaftar_bumerk').val(),
                tnpwpddaftar_bunik : $('#tnpwpddaftar_bunik').val(),
                tnpwpddaftar_bunpwp : $('#tnpwpddaftar_bunpwp').val(),
                tnpwpddaftar_buhp : $('#tnpwpddaftar_buhp').val(),
                
                tnpwpddaftar_bujalan : $('#tnpwpddaftar_bujalan').val(),
                tnpwpddaftar_kabkota : $('#tnpwpddaftar_kabkota').val(),
                tnpwpddaftar_burtrwrk : $('#tnpwpddaftar_burtrwrk').val(),
                tnpwpddaftar_butelp : $('#tnpwpddaftar_butelp').val(),

                tnpwpddaftar_bukodepos : $('#tnpwpddaftar_bukodepos').val(),

                tnpwpddaftar_miliknama : $('#tnpwpddaftar_miliknama').val(),
                tnpwpddaftar_nik : $('#tnpwpddaftar_nik').val(),
                tnpwpddaftar_npwp : $('#tnpwpddaftar_npwp').val(),
                
                tnpwpddaftar_milikkabkota : $('#tnpwpddaftar_milikkabkota').val(),
                tnpwpddaftar_bunoakta : $('#tnpwpddaftar_bunoakta').val(),
                // tnpwpddaftar_npwpd : $('#tnpwpddaftar_npwpd').val(),
                // nama_wajib_pajak : $('#nama_wajib_pajak').val(),
                // nama_usaha : $('#nama_usaha').val(),
                // alamat_usaha : $('#alamat_usaha').val(),
                // wp_kecamatan : $('#wp_kecamatan').val(),
                // wp_kelurahan : $('#wp_kelurahan').val(),
                // wp_telepon : $('#wp_telepon').val(),
                // isperubahanidentitas : $('#isperubahanidentitas').val(),
                // omset_kamarhotel : $('#omset_kamarhotel').val(),
                // omset_fasilitaspenunjang : $('#omset_fasilitaspenunjang').val(),
                // omset_kamarkos : $('#omset_kamarkos').val(),
                // omset_jumlah : $('#omset_jumlah').val(),
                // omset_servis : $('#omset_servis').val(),
                // omset_jumlahtotal : $('#omset_jumlahtotal').val(),
                // pajak_terutang : $('#pajak_terutang').val(),
                // pajak_sudahdibayar : $('#pajak_sudahdibayar').val(),

                // penelitian_diterimatgl : $('#penelitian_diterimatgl').val(),
                // penelitian_namapetugas : $('#penelitian_namapetugas').val(),
                // penelitian_nip : $('#penelitian_nip').val(),

                // tt_no_sptpd : $('#tt_no_sptpd').val(),
                // tt_npwpd : $('#tt_npwpd').val(),
                // tt_tempat : $('#tt_tempat').val(),
                // tt_nama : $('#tt_nama').val(),
                // tt_tanggal : $('#tt_tanggal').val(),
                // tt_alamat : $('#tt_alamat').val(),
                // tt_yang_menerima : $('#tt_yang_menerima').val(),
            },
            success:function (respon) {
                if (respon.pesan=='success') {
                    notifikasi('sukses', 'Data Berhasil Disimapan', 'success', 0, 0, 1);
                    location.reload();
                }else{
                    notifikasi('Gagal', 'Data Gagal Disimapan', 'failed', 0, 0, 1);
                }
            }
        });
    }


    // $("#refkecamatan_id").change(function(event) {
    //     getkelurahan_by_kecamatan($("#refkecamatan_id").val());
    // });

    // function getkelurahan_by_kecamatan(kecid, kelid) {
    //         $("#refkelurahan_id").select2('val','');
    //         $.ajax({
    //             url: '<?php echo Yii::app()->getBaseUrl(1); ?>/open_data/get/data/kelurahan_by_kecamatan',
    //             type: 'GET',
    //             dataType: 'json',
    //             data: {id: kecid},
    //             success: function(json) {
    //                 window.jsonx = json;
    //                 setComboList('refkelurahan_id', 'Kelurahan', json);
    //                 if (kelid!=null) {
    //                     setTimeout(function() {
    //                         $("#refkelurahan_id").select2('val',kelid!="0" ? kelid : "" ); // set combo
    //                     }, 500);
    //                 }
    //             }
    //         });     
    //     }

</script>