<?php define('ASSETS_URL',$data['theme_baseurl']); ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="well well-sm well-light bg-color-red txt-color-white">
            <h4><i class="fa fa-file fa-fw"></i> Enrty Data SPTPD Pajak Restoran</h4>
        </div>
    </div>
</div>

<section class="widget-grid">
    <div class="jarviswidget jarviswidget-color-teal" id="wid-id-7" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
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

                        <a data-toggle="tab" href="#hr1">  Entry Pajak Restoran  </a>

                    </li>

                    <li>
                        <a data-toggle="tab" href="#hr2"> Entry Obyek Pajak</a>
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
                                        <section class="col col-md-2">NPWPD</section>
                                        <section class="col col-md-4">
                                            <label class="input">
                                                <input type="text" name="card" data-mask="99-9999999-99-99" class="invalid">
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-md-2">NAMA USAHA</section>
                                        <section class="col col-md-4">
                                            <label for="address" class="input">
                                                <input type="text" name="nama_usaha">
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-md-2">ALAMAT TEMPAT USAHA</section>
                                        <section class="col col-md-4">
                                            <label class="textarea">                                        
                                                <textarea rows="3" name="alamat"></textarea> 
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-md-2">KECAMATAN</section>
                                        <section class="col col-md-4">
                                            <label class="select"> 
                                                <select class="select2" id="kecamatan">
                                                    <option selected="" disabled="">== Silahkan Pilih ==</option>
                                                    <option>Kecamatan Danurejan</option>
                                                    <option>Kecamatan Gedong Tengen</option>
                                                    <option>Kecamatan Gondokusuman</option>
                                                </select>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-md-2">KELURAHAN</section>
                                        <section class="col col-md-4">
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
                                        <section class="col col-md-2">TELEPHONE</section>
                                        <section class="col col-md-4">
                                            <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                                <input type="text" name="phone" class="valid">
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-md-2">PERUBAHAN IDENTITAS</section>
                                        <section class="col col-md-4">
                                            <span class="onoffswitch">
                                                <input type="checkbox" class="onoffswitch-checkbox" id="autoopen">
                                                <label class="onoffswitch-label" for="autoopen"> 
                                                    <span class="onoffswitch-inner" data-swchon-text="Ada" data-swchoff-text="Tidak"></span> 
                                                    <span class="onoffswitch-switch"></span>
                                                </label> 
                                            </span>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <div class="col col-md-4">
                                            <div class="row">
                                                <section class="col col-md-12">DASAR PENGENAAN PAJAK</section>
                                            </div>
                                        </div>
                                        <div class="col col-md-4">
                                            <div class="row">
                                                <section class="col col-md-12">OBSET PENJUALAN MAKANAN DAN MINUMAN</section>
                                            </div>
                                        </div>
                                        <div class="col col-md-4">
                                            <div class="row">
                                                <section class="col col-md-12">JUMLAH (Rp)</section>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <div class="tab-pane" id="hr2">
                        ya
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