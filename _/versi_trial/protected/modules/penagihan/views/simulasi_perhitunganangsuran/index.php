<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-pencil"></i> Simulasi Perhitungan Angsuran </h4>
		</div>
	</div>
</div>


<section id="" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-validasi_penyetoran" 
			data-widget-editbutton="false"
			data-widget-deletebutton="false"
			data-widget-custombutton="false"
			data-widget-fullscreenbutton="false"
			data-widget-colorbutton="false"	
			data-widget-togglebutton="false"			
			>
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
<span class="widget-icon"> <i class="fa fa-search"></i> </span>
<h2>Validasi Penyetoran</h2>

</header>

<!-- widget div-->
<div>

<!-- widget edit box -->
<div class="jarviswidget-editbox">
<!-- This area used as dropdown edit box -->

</div>
<!-- end widget edit box -->

<!-- widget content -->
<div class="widget-body no-padding">

<form action="" id="" class="smart-form" novalidate>
	<fieldset>
	
	<div class="row">
		<section class="col col-sm-2">
			<p><b>Tahun</b></p>
		</section>
		<section class="col col-md-2">
			<label class="input">
				<input type="text" placeholder="Tahun">
			</label>
		</section>
		<section class="col col-sm-1">
			<p><b>Bulan</b></p>
		</section>
		<section class="col col-md-2">
			<label class="input">
				<input type="text" placeholder="Bulan">
			</label>
		</section>
	</div>
	<div class="row">
		<section class="col col-sm-2">
			<p><b>Nomor Pokok</b></p>
		</section>
		<section class="col col-md-2">
			<label class="input">
				<input type="text" placeholder="">
			</label>
		</section>
	</div>

	<div class="row">

		<section class="col col-md-2">
			<p><b>Setoran Ke</b></p>
		</section>

		<section class="col col-md-2">
			<label class="input">
				<input type="number" name="myNumber">
			</label>
		</section>

		<section class="col col-md-2">
			<button type="button" class="btn btn-sm btn-primary" onclick="cari()">
			&nbsp;Enter
			</button>
		</section>
	</div>
			
	</fieldset>		
				
						</form>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

		</article>
		<!-- WIDGET END -->

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-validasi_penyetoran" 
			data-widget-editbutton="false"
			data-widget-deletebutton="false"
			data-widget-custombutton="false"
			data-widget-fullscreenbutton="false"
			data-widget-colorbutton="false"	
			data-widget-togglebutton="false"			
			>
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
		<span class="widget-icon"> <i class="fa fa-user"></i> </span>
		<h2>Perorangan</h2>

	</header>

	<!-- widget div-->
	<div>

		<!-- widget edit box -->
		<div class="jarviswidget-editbox">
			<!-- This area used as dropdown edit box -->

		</div>
		<!-- end widget edit box -->
		<div class="widget-body no-padding">
			
			<form action="" id="" class="smart-form" novalidate>
				<fieldset>
				
	<div class="row">
		<section class="col col-sm-1">
			<p><b>Nama</b></p>
		</section>
		<section class="col col-md-2">
			<label class="input">
				<input type="text" placeholder="" disabled="disabled" style="background-color: #ccc">
			</label>
		</section>
		<section class="col col-sm-1">
			<p><b>SPT Nama</b></p>
		</section>
		<section class="col col-md-2">
			<label class="input">
				<input type="text" placeholder="" disabled="disabled" style="background-color: #ccc">
			</label>
		</section>
		<section class="col col-sm-1">
			<p><b>Rekening</b></p>
		</section>
		<section class="col col-3">
                        <label class="select">
                         <select class="input-md" disabled="disabled" style="background-color: #ccc">
                            <option value="0"> - </option>
                         </select><i></i>
                        </label>
                </section>
        </div>

	<div class="row">
		<section class="col col-sm-1">
			<p><b>Alamat</b></p>
		</section>
		<section class="col col-md-2">
			<label class="input">
				<input type="text" placeholder="" disabled="disabled" style="background-color: #ccc">
			</label>
		</section>
		<section class="col col-sm-1">
			<p><b>Tgl. Pajak</b></p>
		</section>
		<section class="col col-md-2">
			<label class="input">
				<input type="text" placeholder="" disabled="disabled" style="background-color: #ccc">
			</label>
		</section>
		<section class="col col-sm-1">
			<p><b>Jenis Pajak</b></p>
		</section>
		<section class="col col-md-2">
			<label class="input">
				<input type="text" disabled="disabled" placeholder="" disabled="disabled" style="background-color: #ccc">
			</label>
		</section>
		<section class="col col-sm-1">
			<p><b>Rekening</b></p>
		</section>
		<section class="col col-md-2">
			<label class="input">
				<input type="text" disabled="disabled" placeholder="" disabled="disabled" style="background-color: #ccc">
			</label>
		</section>
	</div>
				<div class="row">
					<section class="col col-sm-3">
						<h2><b>Ketetapan Angsuran Pajak</b></h2>
					</section>
				</div>
                        <div class="row">
                         <section class="col col-2">
                                <p>Tgl. SKP-A</p>
                          </section>
                         <section class="col col-2">
                           <label class="select">
                              <select class="input-md"  disabled="" ="disabled" style="background-color:#ccc">
                                <option value="0" ></option>
                                <option value="1" ></option>
                                <option value="2" ></option>
                                <option value="3" ></option>
                                <option value="4" ></option>
                              </select><i></i>
                           </label>
                         </section>
                         <section class="col col-1">
                                <p>Batas</p>
                          </section>
                         <section class="col col-2">
                           <label class="select">
                              <select class="input-md"  disabled="" ="disabled" style="background-color:#ccc">
                                <option value="0" ></option>
                                <option value="1" ></option>
                                <option value="2" ></option>
                                <option value="3" ></option>
                                <option value="4" ></option>
                              </select><i></i>
                           </label>
                         </section>
                        </div>
                        <div class="row">
                                <section class="col col-sm-2">
                                        <p>Nomor Kohir</p>
                                </section>
                                <section class="col col-md-3">
                                        <label class="input">
                                                <input type="text" disabled="disabled" style="background-color:#ccc">
                                        </label>
                                </section>
                        </div>
                        <div class="row">
                                <section class="col col-sm-2">
                                        <p>Jumlah Pajak</p>
                                </section>
                                <section class="col col-md-3">
                                        <label class="input">
                                                <input type="text" disabled="disabled" style="background-color:#ccc">
                                        </label>
                                </section>
                        </div>
                        <div class="row">
                         <section class="col col-2">
                                <p>Tgl. Setor</p>
                          </section>
                         <section class="col col-2">
                           <label class="select">
                              <select class="input-md"  disabled="" ="disabled" style="background-color:#ccc">
                                <option value="0" ></option>
                                <option value="1" ></option>
                                <option value="2" ></option>
                                <option value="3" ></option>
                                <option value="4" ></option>
                              </select><i></i>
                           </label>
                         </section>
                        </div>
                        <div class="row">
                                <section class="col col-sm-2">
                                        <p>Jumlah Angsuran</p>
                                </section>
                                <section class="col col-md-3">
                                        <label class="input">
                                                <input type="text" disabled="disabled" style="background-color:#ccc">
                                        </label>
                                </section>
                        </div>
                         <div class="row">
                                <section class="col col-sm-2">
                                        <p>Bunga</p>
                                </section>
                                <section class="col col-md-3">
                                        <label class="input">
                                                <input type="text" disabled="disabled" style="background-color:#ccc">
                                        </label>
                                </section>
                        </div>
                        <div class="row">
                                <section class="col col-sm-2">
                                        <p>Jumlah Pokok</p>
                                </section>
                                <section class="col col-md-3">
                                        <label class="input">
                                                <input type="text">
                                        </label>
                                </section>
                        </div><br>
                        <div class="row">
                                <section class="col col-sm-2">
                                        <p>Denda</p>
                                </section>
                                <section class="col col-md-3">
                                        <label class="input">
                                                <input type="text">
                                        </label>
                                </section>
                         </div>       
                        <div class="row">
                                <section class="col col-sm-2">
                                        <p>Total Setoran</p>
                                </section>
                                <section class="col col-md-3">
                                        <label class="input">
                                                <input type="text">
                                        </label>
                                </section>
                        </div>        
                        <div class="row">
                                <section class="col col-sm-2">
                                        <p>Nomor Setoran</p>
                                </section>
                                <section class="col col-md-2">
                                        <label class="input">
                                                <input type="text" style="background-color:#ccc">
                                        </label>
                                </section>
                        </div>
                        <div class="row">
                         <section class="col col-2">
                                <p>Tanggal Hitung Denda</p>
                         </section>
                         <section class="col col-md-2">
                            <label class="input">
                                <i class="icon-append fa fa-calendar"></i>
                                    <input name="tanggal_setor" class="datepicker Datepicker" data-dateformat="dd/mm/yy" id="tgldenda">
                            </label>
                         </section> 
                        </div>
                        <div class="row">
                         <section class="col col-2">
                                <p>Tanggal Entry SSPD</p>
                         </section>
                         <section class="col col-md-2">
                            <label class="input">
                                <i class="icon-append fa fa-calendar"></i>
                                    <input name="tanggal_setor" class="datepicker Datepicker" data-dateformat="dd/mm/yy" id="tglsspd">
                            </label>
                         </section> 
                        </div> 
		<!-- widget content -->
		</div>
		<!-- end widget content -->

	</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

		</article>
		<!-- WIDGET END -->
	</div>
	<!-- end row -->

</section>


<script type="text/javascript">
	pageSetUp();



</script>