<?php define('ASSETS_URL',$data['theme_baseurl']); ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="well well-sm well-light bg-color-red txt-color-white">
            <h4><i class="fa fa-file fa-fw"></i> Enrty Data SPTPD Pajak Restoran</h4>
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
             <ul class="nav nav-tabs pull-left in">
                <li class="active">
                    <a data-toggle="tab" href="#hr1"> Data Pajak Restoran </a>
                </li>

                <li>
                    <a data-toggle="tab" href="#hr2"> Obyek Pajak </a>
                </li>
            </ul>
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
                        <div class="tab-pane active" id="hr1">
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
                                                                <section class="col col-md-2"><b>A. NPWPD</b></section>
                                                                <section class="col col-md-7">
                                                                    <label class="input">
                                                                        <input type="text" name="card" data-mask="99-9999999-99-99" class="invalid">
                                                                    </label>
                                                                </section>
                                                            </div>
                                                            <div class="row">
                                                                <section class="col col-md-2"><b>B. Nama Wajib Pajak</b></section>
                                                                <section class="col col-md-7">
                                                                    <label class="input">
                                                                        <input type="text" name="card">
                                                                    </label>
                                                                </section>
                                                            </div>
                                                            <div class="row">
                                                                <section class="col col-md-2"><b>C. Nama Usaha</b></section>
                                                                <section class="col col-md-7">
                                                                    <label for="address" class="input">
                                                                        <input type="text" name="nama_usaha">
                                                                    </label>
                                                                </section>
                                                            </div>
                                                            <div class="row">
                                                                <section class="col col-md-2"><b>D. Alamat tempat usaha</b></section>
                                                                <section class="col col-md-7">
                                                                    <label class="textarea">                                        
                                                                        <textarea rows="3" name="alamat"></textarea> 
                                                                    </label>
                                                                </section>
                                                            </div>
                                                            <div class="row">
                                                                <section class="col col-md-2"><b>E. Kecamatan</b></section>
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
                                                                <section class="col col-md-2"><b>F. Telephone</b></section>
                                                                <section class="col col-md-3">
                                                                    <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                                                        <input type="text" name="phone" class="valid">
                                                                    </label>
                                                                </section>
                                                            </div>
                                                            <div class="row">
                                                                <section class="col col-md-2"><b>G. Perubahan Identitas</b></section>
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
                                    							<i class="fa fa-lg fa-angle-up pull-right"></i><p align="center"> DATA PAJAK</p>
                                    						</a>
                                    					</h4>
                                    				</div>
                                    				<div id="collapseOne" class="panel-collapse collapse">
                                    					<div class="panel-body no-padding">
                                    						<fieldset class="smart-form">
                                                                <div class="row">
                                                                    <section class="col col-md-12">
                                                                        <table class="table table-bordered">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="width: 200px;"><b>H. Dasar Pengenaan Pajak</b></td>
                                                                                    <td style="width: 500px;">
                                                                                        <p align="center">Omset Penjualan Makanan dan Minuman</p>
                                                                                    </td>
                                                                                    <td style="width: 100px;">
                                                                                        <p align="center">Jumlah (Rp)</p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td rowspan="7"></td>
                                                                                    <td>1. Disantap ditempat</td>
                                                                                    <td>
                                                                                        <label for="address" class="input">
                                                                                            <input type="text" name="disantap">
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>2. Dibawa pulang</td>
                                                                                    <td>
                                                                                        <label for="address" class="input">
                                                                                            <input type="text" name="pulang">
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>3. Diantar ke konsumen</td>
                                                                                    <td>
                                                                                        <label for="address" class="input">
                                                                                            <input type="text" name="konsumen">
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>4. Katering / Jasa Boga</td>
                                                                                    <td>
                                                                                        <label for="address" class="input">
                                                                                            <input type="text" name="boga">
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="row">
                                                                                            <section class="col col-md-6"></section>
                                                                                            <section class="col col-md-6">Jumlah</section>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <label for="address" class="input">
                                                                                            <input type="text" name="jumlah">
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="row">
                                                                                            <section class="col col-md-6"></section>
                                                                                            <section class="col col-md-6">Service</section>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <label for="address" class="input">
                                                                                            <input type="text" name="service">
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="row">
                                                                                            <section class="col col-md-6"></section>
                                                                                            <section class="col col-md-6">Jumlah Total</section>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <label for="address" class="input">
                                                                                            <input type="text" name="jumlah_total">
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><b>I. Pajak Terutang</b></td>
                                                                                    <td>Tarif Pajak  10 % (sepuluh persen)</td>
                                                                                    <td>
                                                                                        <label for="address" class="input">
                                                                                            <input type="text" name="jumlah_total">
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><b>J. Kredit Pajak</b></td>
                                                                                    <td></td>
                                                                                    <td>
                                                                                        <label for="address" class="input">
                                                                                            <input type="text" name="jumlah_total">
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><b>K. Yang Harus Dibayar</b></td>
                                                                                    <td>Lajur huruf i - huruf j</td>
                                                                                    <td>
                                                                                        <label for="address" class="input">
                                                                                            <input type="text" name="jumlah_total">
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </section>
                                                                </div>
                                                            </fieldset>
                                    					</div>
                                    				</div>
                                    			</div>
                                    			<div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapsehree" class="collapsed"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i><p align="center"> PERNYATAAN</p></a></h4>
                                                    </div>
                                                    <div id="collapsehree" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <fieldset class="smart-form">
                                                                <div class="row">
                                                                    <section class="col col-md-12">
                                                                        <b> L. Penyataan Wajib Pajak Kuasanya</b><br>
                                                                       Dengan menyadari sepenuhnya akan segala akibat termasuk sanksi - sanksi sesuai dengan ketentuan perundang - undangan yang
                                                                       berlaku, saya atau yang saya beri kuasa menyatakan apa yang telah kami beritahukan tersebut diatas beserta lampir - lampiranya
                                                                       adalah benar, lengkap dan jelas.
                                                                    </section>
                                                                </div>
                                                                <div style="margin-left: 2%;">
                                                                    <div class="row">
                                                                        <section class="col col-md-2">
                                                                            Nama
                                                                        </section>
                                                                        <section class="col col-md-3">
                                                                            <label for="address" class="input">
                                                                                <input type="text" name="nama_usaha">
                                                                            </label>
                                                                        </section>
                                                                    </div>
                                                                    <div class="row">
                                                                        <section class="col col-md-2">
                                                                            Tempat
                                                                        </section>
                                                                        <section class="col col-md-3">
                                                                             <label for="address" class="input">
                                                                                <input type="text" name="nama_usaha">
                                                                            </label>
                                                                        </section>
                                                                    </div>
                                                                    <div class="row">
                                                                        <section class="col col-md-2">
                                                                            Tanggal
                                                                        </section>
                                                                        <section class="col col-md-3">
                                                                            <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                                                <input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="tgl_penyataan">
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
                                                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseseven" class="collapsed"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i><p align="center"> PEMBETULAN IDENTITAS</p></a></h4>
                                                    </div>
                                                    <div id="collapseseven" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <fieldset class="smart-form">
                                                                <div class="row">
                                                                    <section class="col col-md-12">
                                                                        <b> M. Pembetulan Identitas</b><br>
                                                                    </section>
                                                                </div>
                                                                <div style="margin-left: 2%;">
                                                                    <div class="row">
                                                                        <section class="col col-md-2">NPWPD</section>
                                                                        <section class="col col-md-7">
                                                                            <label class="input">
                                                                                <input type="text" name="card" data-mask="99-9999999-99-99" class="invalid">
                                                                            </label>
                                                                        </section>
                                                                    </div>
                                                                    <div class="row">
                                                                        <section class="col col-md-2">Nama Wajib Pajak</section>
                                                                        <section class="col col-md-7">
                                                                            <label class="input">
                                                                                <input type="text" name="card">
                                                                            </label>
                                                                        </section>
                                                                    </div>
                                                                    <div class="row">
                                                                        <section class="col col-md-2">Nama Usaha</section>
                                                                        <section class="col col-md-7">
                                                                            <label for="address" class="input">
                                                                                <input type="text" name="nama_usaha">
                                                                            </label>
                                                                        </section>
                                                                    </div>
                                                                    <div class="row">
                                                                        <section class="col col-md-2">Alamat tempat usaha</section>
                                                                        <section class="col col-md-7">
                                                                            <label class="textarea">                                        
                                                                                <textarea rows="3" name="alamat"></textarea> 
                                                                            </label>
                                                                        </section>
                                                                    </div>
                                                                    <div class="row">
                                                                        <section class="col col-md-2">Kecamatan</section>
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
                                                                        <section class="col col-md-2">Telephone</section>
                                                                        <section class="col col-md-3">
                                                                            <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                                                                <input type="text" name="phone" class="valid">
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
                                                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapsefoor" class="collapsed"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i><p align="center"> KOLOM PENELITIAN OLEH PETUGAS BPKAD </p></a></h4>
                                                    </div>
                                                    <div id="collapsefoor" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <fieldset class="smart-form">
                                                                <div style="margin-left: 2%;">
                                                                    <div class="row">
                                                                        <section class="col col-md-2">
                                                                            Diterima tanggal
                                                                        </section>
                                                                        <section class="col col-md-3">
                                                                            <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                                                <input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="tgl_terima">
                                                                            </label>
                                                                        </section>
                                                                    </div>
                                                                    <div class="row">
                                                                        <section class="col col-md-2">
                                                                            Nama Petugas
                                                                        </section>
                                                                        <section class="col col-md-3">
                                                                            <label for="address" class="input">
                                                                                <input type="text" name="nama_usaha">
                                                                            </label>
                                                                        </section>
                                                                    </div>
                                                                    <div class="row">
                                                                        <section class="col col-md-2">
                                                                            NIP
                                                                        </section>
                                                                        <section class="col col-md-3">
                                                                            <label for="address" class="input">
                                                                                <input type="text" name="nama_usaha">
                                                                            </label>
                                                                        </section>
                                                                    </div>
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
                                        <section class="col col-md-4">No. SPTPD</section>
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
                                                    NPWPD
                                                </section>
                                                <section class="col col-md-8">
                                                    <label for="address" class="input">
                                                        <input type="text" name="nama_usaha">
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
                                            <div class="row">
                                                <section class="col col-md-4">
                                                    Alamat
                                                </section>
                                                <section class="col col-md-8">
                                                    <label for="address" class="input">
                                                        <input type="text" name="nama_usaha">
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
                                                    Tanggal
                                                </section>
                                                <section class="col col-md-8">
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
                            </form>
                        </div>
                        <div class="tab-pane" id="hr2">
                             <form class="smart-form">
                                <fieldset>
                                    <div class="row smart-form">
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
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#obyek_pajak"> 
                                                                <i class="fa fa-lg fa-angle-down pull-right"></i> 
                                                                <i class="fa fa-lg fa-angle-up pull-right"></i><p align="center"> I DATA OBYEK PAJAK</p>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="obyek_pajak" class="panel-collapse collapse">
                                                        <div class="panel-body no-padding">
                                                            <fieldset class="smart-form">
                                                                <div class="row">
                                                                    <section class="col col-md-4">
                                                                        a. Jumlah Meja dan Kursi
                                                                    </section>
                                                                    <section class="col col-md-1">
                                                                        Meja
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label class="input">
                                                                            <input type="text" name="card">
                                                                        </label>
                                                                    </section>
                                                                    <section class="col col-md-1">
                                                                        Kursi
                                                                    </section>
                                                                    <section class="col col-md-2">
                                                                        <label class="input">
                                                                            <input type="text" name="card">
                                                                        </label>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-4">
                                                                        b. Menggunakan mesin kas register
                                                                    </section>
                                                                    <section class="col col-md-4">
                                                                        <div class="inline-group">
                                                                            <label class="radio">
                                                                                <input type="radio" name="mesin_register" checked="">
                                                                                <i></i>Ya
                                                                            </label>
                                                                            <label class="radio">
                                                                                <input type="radio" name="mesin_register">
                                                                                <i></i>Tidak
                                                                            </label>
                                                                        </div>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-4">
                                                                        c. Menggunakan Nota / Bil
                                                                    </section>
                                                                    <section class="col col-md-4">
                                                                        <div class="inline-group">
                                                                            <label class="radio">
                                                                                <input type="radio" name="nota/bill" checked="">
                                                                                <i></i>Ya
                                                                            </label>
                                                                            <label class="radio">
                                                                                <input type="radio" name="nota/bill">
                                                                                <i></i>Tidak
                                                                            </label>
                                                                        </div>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-4">
                                                                        d. Apabila "ya" Nota / Bill yang digunakan (coret yang tidak perlu)
                                                                    </section>
                                                                    <section class="col col-md-8">
                                                                        <div class="inline-group">
                                                                            <label class="radio">
                                                                                <input type="radio" name="nota_coret" checked="">
                                                                                <i></i>Nota / Bill Pemerintah Kota
                                                                            </label>
                                                                            <label class="radio">
                                                                                <input type="radio" name="nota_coret">
                                                                                <i></i>Nota / Bill Sendiri, diperporasikan ke BPKAD
                                                                            </label>
                                                                            <label class="radio">
                                                                                <input type="radio" name="nota_coret">
                                                                                <i></i>Nota sendiri tanpa perporasi
                                                                            </label>
                                                                        </div>
                                                                    </section>
                                                                </div>
                                                                <div class="row">
                                                                    <section class="col col-md-4">
                                                                        e. Menyediakan jasa pengiriman makanan
                                                                    </section>
                                                                    <section class="col col-md-4">
                                                                        <div class="inline-group">
                                                                            <label class="radio">
                                                                                <input type="radio" name="pengiriman_makan" checked="">
                                                                                <i></i>Ya
                                                                            </label>
                                                                            <label class="radio">
                                                                                <input type="radio" name="pengiriman_makan">
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
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#obyek_pajak2"> 
                                                                <i class="fa fa-lg fa-angle-down pull-right"></i> 
                                                                <i class="fa fa-lg fa-angle-up pull-right"></i><p align="center"> II DATA OBYEK PAJAK</p>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="obyek_pajak2" class="panel-collapse collapse">
                                                        <div class="panel-body no-padding">
                                                            <fieldset>
                                                                <div class="row">
                                                                    <section class="col col-md-12">
                                                                        <!-- widget content -->
                                                                        <div class="widget-body no-padding">
                                                                            <p class="alert alert-info" style="margin-bottom: 0px;"> 
                                                                                <button rel="tooltip" data-placement="right" data-original-title="digunakan untuk pencarian data multikriteria" class="btn btn-sm btn-primary" onclick="cari_obyek()" id="cari_dataobyek">
                                                                                    <i class="fa  fa-plus"></i>&nbsp;tambah
                                                                                </button>               
                                                                            </p>

                                                                            <div class="">
                                                                            
                                                                                <table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th class="text-center" rowspan="2"> No</th>
                                                                                            <th class="text-center" style="width: 31%;" data-hide="phone" colspan="2"> Makanan</th>
                                                                                            <th class="text-center" style="width: 31%;" data-hide="phone" colspan="2"> Minuman</th>
                                                                                            <th class="text-center" style="width: 20%;" data-class="expand" rowspan="2"> Keterangan</th>
                                                                                            <th class="text-center" data-hide="phone, tablet" rowspan="2">Kontrol Data</th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th class="text-center">Jenis Makanan</th>
                                                                                            <th class="text-center">Tarif</th>
                                                                                            <th class="text-center">Jenis Makanan</th>
                                                                                            <th class="text-center">Tarif</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>1.</td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td>
                                                                                                <button rel="tooltip" data-placement="right"  class="btn btn-sm btn-success" onclick="edit()">
                                                                                                   <i class="fa  fa-edit"></i>&nbsp;Edit
                                                                                               </button> 
                                                                                               <button rel="tooltip" data-placement="right" class="btn btn-sm btn-danger" onclick="hapus()">
                                                                                                   <i class="fa fa-trash-o"></i>&nbsp;Hapus
                                                                                               </button>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        <!-- end widget content -->
                                                                    </section>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#obyek_pajak3"> 
                                                                <i class="fa fa-lg fa-angle-down pull-right"></i> 
                                                                <i class="fa fa-lg fa-angle-up pull-right"></i><p align="center"> III REKAPITULASI OMSET PENDAPATAN</p>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="obyek_pajak3" class="panel-collapse collapse">
                                                        <div class="panel-body no-padding">
                                                            <fieldset>
                                                                <div class="row">
                                                                    <section class="col col-md-12">
                                                                        <!-- widget content -->
                                                                        <div class="widget-body no-padding">
                                                                            <p class="alert alert-info" style="margin-bottom: 0px;"> 
                                                                                <button rel="tooltip" data-placement="right" class="btn btn-sm btn-primary" onclick="tambah()">
                                                                                    <i class="fa  fa-plus"></i>&nbsp;tambah
                                                                                </button>               
                                                                            </p>

                                                                            <div class="">
                                                                            
                                                                                <table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th class="text-center" rowspan="2"> Bulan</th>
                                                                                            <th class="text-center" style="width: 30%;" data-hide="phone" colspan="2"> Disantap ditempat</th>
                                                                                            <th class="text-center" style="width: 30%;" data-hide="phone" colspan="2"> Diantar ke konsumen</th>
                                                                                            <th class="text-center" style="width: 30%;" data-class="expand" colspan="2"> Dibawa pullang konsumen</th>
                                                                                            <th class="text-center" data-hide="phone, tablet" rowspan="2">Kontrol Data</th>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th class="text-center">Jumlah Konsumen</th>
                                                                                            <th class="text-center">Omset (Rp)</th>
                                                                                            <th class="text-center">Jumlah Konsumen</th>
                                                                                            <th class="text-center">Omset (Rp)</th>
                                                                                            <th class="text-center">Jumlah Konsumen</th>
                                                                                            <th class="text-center">Omset (Rp)</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>1.</td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td>
                                                                                                <button rel="tooltip" data-placement="right" style="width: 69px;"  class="btn btn-sm btn-success" onclick="edit()">
                                                                                                   <i class="fa  fa-edit"></i>&nbsp;Edit
                                                                                               </button> 
                                                                                               <button rel="tooltip" data-placement="right" style="width: 69px;" class="btn btn-sm btn-danger" onclick="hapus()">
                                                                                                   <i class="fa fa-trash-o"></i>&nbsp;Hapus
                                                                                               </button>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        <!-- end widget content -->
                                                                    </section>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#obyek_pajak4"> 
                                                                <i class="fa fa-lg fa-angle-down pull-right"></i> 
                                                                <i class="fa fa-lg fa-angle-up pull-right"></i><p align="center"> IV OMSET PENJUALAN CATERING / JASA BOGA</p>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="obyek_pajak4" class="panel-collapse collapse">
                                                        <div class="panel-body no-padding">
                                                            <fieldset>
                                                                <div class="row">
                                                                    <section class="col col-md-12">
                                                                        <!-- widget content -->
                                                                        <div class="widget-body no-padding">
                                                                            <p class="alert alert-info" style="margin-bottom: 0px;"> 
                                                                                <button rel="tooltip" data-placement="right" class="btn btn-sm btn-primary" onclick="tambah()">
                                                                                    <i class="fa  fa-plus"></i>&nbsp;tambah
                                                                                </button>               
                                                                            </p>

                                                                            <div class="">
                                                                            
                                                                                <table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th class="text-center"> Bulan</th>
                                                                                            <th class="text-center" style="width: 30%;" data-hide="phone"> Jumlah Pesanan</th>
                                                                                            <th class="text-center" style="width: 30%;" data-hide="phone"> Omset Penjualan</th>
                                                                                            <th class="text-center" data-hide="phone, tablet">Kontrol Data</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>1.</td>
                                                                                            <td></td>
                                                                                            <td></td>
                                                                                            <td>
                                                                                                <button rel="tooltip" data-placement="right" style="width: 69px;"  class="btn btn-sm btn-success" onclick="edit()">
                                                                                                   <i class="fa  fa-edit"></i>&nbsp;Edit
                                                                                               </button> 
                                                                                               <button rel="tooltip" data-placement="right" style="width: 69px;" class="btn btn-sm btn-danger" onclick="hapus()">
                                                                                                   <i class="fa fa-trash-o"></i>&nbsp;Hapus
                                                                                               </button>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                                
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        <!-- end widget content -->
                                                                    </section>
                                                                </div>
                                                            </fieldset>
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