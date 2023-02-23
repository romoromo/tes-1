<?php define('ASSETS_URL',$data['theme_baseurl']); ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="well well-sm well-light bg-color-red txt-color-white">
            <h4><i class="fa fa-file fa-fw"></i> Enrty Data SPTPD Pajak Hotel</h4>
        </div>
    </div>
</div>

<section class="widget-grid">
    <div class="jarviswidget jarviswidget-color-teal" id="wid-id-menerima_sptpd" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
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
                                                        <h3>SURAT PEMBERITAHUAN <br>PAJAK DAERAH <br>(SPTPD)<br><br><br>PAJAK REKLAME</h3>
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
                                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapsefoor" class="collapsed"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i><p align="center"> C. KOLOM PENELITIAN OLEH PETUGAS BPKAD </p></a></h4>
                                                </div>
                                                <div id="collapsefoor" class="panel-collapse collapse in">
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
                            </fieldset>
                            <footer>
                                <button class="btn btn-sm btn-primary">Simpan</button>
                                <button class="btn btn-sm btn-default">Batal</button>
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