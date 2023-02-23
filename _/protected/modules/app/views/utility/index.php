<?php define('ASSETS_URL',Yii::app()->theme->baseurl); ?>
<section id="widget-grid" class="">
	<!-- row -->
	<article class="col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-11" data-widget-fullscreenbutton="false" data-widget-sortable="false" data-widget-editbutton="false" data-widget-deletebutton="false">
					<header>
			            <span class="widget-icon"> <i class="fa fa-table"></i> </span>
			            <h2>Setting Username dan Password</h2>
			 </header>
			<div class="widget-body" style="overflow-y: scroll; height: 420px; overflow-x: hidden; padding: 0px;">

				<div class="alert alert-info" style="margin: 5px 13px 0px;">
					<p>Beberapa tips/saran dalam membuat Password : </p>
					<ol>
						<li>Panjang Password sebaiknya minimal 12 karakter</li>
						<li>Terdiri atas kombinasi huruf dan angka, misal p45sw0rd54y4am4n</li>
						<li>Jangan menggunakan informasi pribadi sebagai Password, <b>misal nama anak, nama orang tua, tempat tinggal dll</b></li>
						<li>Ubahlah Password anda secara berkala, <b>misal 6 bulan sekali</b></li>
						<li>Jangan membuat Password yang sama dengan Userid anda, <b>misal Userid="abcde", Password="abcde"</b></li>
					</ol>
				</div>

				<form class="smart-form">

					<fieldset>			

					<legend>Foto Profil</legend>
						<section>
							<div class="row">										
								
								<div class="col col-5">
									<div class="row">
										<?php 
											$pengguna = Pengguna::model()->findByPk(Yii::app()->user->getId());
											$nama = !Yii::app()->user->isGuest ? $pengguna['TBLPENGGUNA_NAMA'] : "";
											$foto = !Yii::app()->user->isGuest ? $pengguna['TBLPENGGUNA_FOTO'] : "";
											$telp = !Yii::app()->user->isGuest ? $pengguna['TBLPENGGUNA_NOTELP'] : "";
											$email = !Yii::app()->user->isGuest ? $pengguna['TBLPENGGUNA_EMAIL'] : "";
										?>
										<div class="col-sm-3 profile-pic">
											<img src="uploads/pengguna/<?php echo $foto; ?>" onclick="editfp()" class="img-fp" title="Ganti Foto Profil"> 
										</div>
									</div>
								</div>
							</div>
						</section>
					</fieldset>

					<footer>
						<?php /*<button type="submit" class="btn btn-success">
							<i class="fa fa-exchange"></i>&nbsp;
							Change DP
						</button>*/ ?>
					</footer>

				</form>


				<form class="smart-form" id="uname_change">

					<fieldset>			

					<legend>Username</legend>
						<section>
							<div class="row">										
								<label class="label col col-3">Nama <i class="txt-color-red"> * </i></label>
								<div class="col col-5">
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input name="nama" id="nama" type="text" value="<?php echo $data->TBLPENGGUNA_NAMA; ?>">
									</label>
								</div>
							</div>
						</section>
						<section>
							<div class="row">										
								<label class="label col col-3">Username <i class="txt-color-red"> * </i></label>
								<div class="col col-5">
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input disabled="disabled" name="username" id="username" type="text" value="<?php echo $data->TBLPENGGUNA_USERNAME; ?>">
									</label>
								</div>
							</div>
						</section>
						<section>
							<div class="row">										
								<label class="label col col-3">Email <i class="txt-color-red"> * </i></label>
								<div class="col col-5">
									<label class="input"> <i class="icon-append fa fa-envelope"></i>
										<input name="email" id="email" type="email" value="<?php echo $data->TBLPENGGUNA_EMAIL; ?>">
									</label>
								</div>
							</div>
						</section>
					</fieldset>

					<footer>
						<button type="submit" class="btn btn-success">
							<i class="fa fa-exchange"></i>&nbsp;
							Ubah
						</button>								
					</footer>

				</form>	
				<form action="" id="login-form" class="smart-form">

				<fieldset>			

				<legend>Mengganti password</legend>

					<section>
						<div class="row">										
							<label class="label col col-3">Password Lama<i class="txt-color-red"> * </i></label>
							<div class="col col-5">
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input name="passlama" id="passlama" type="password">
								</label>
							</div>
						</div>
					</section>

					<section>
						<div class="row">										
							<label class="label col col-3">Password Baru<i class="txt-color-red"> * </i></label>
							<div class="col col-5">
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input id="passbaru" name="passbaru" type="password">
								</label>
							</div>
						</div>
					</section>

					<section>
						<div class="row">										
							<label class="label col col-3">Ulangi Password Baru<i class="txt-color-red"> * </i></label>
							<div class="col col-5">
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input name="ulangipass" id="ulangipass" type="password">
								</label>
							</div>
						</div>
					</section>


					
				</fieldset>

				<footer>
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-exchange"></i>&nbsp;
						Ganti
					</button>								
				</footer>

			</form>	
			</div>
		</div>
	</article>
</section>

<!-- Modal Upload -->
<div class="modal fade" id="updatefoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" align="center">
                    Ganti Foto Profil
                </h4>
            </div>
            <div class="modal-body no-padding">
                <form method="post" enctype="multipart/form-data" class="smart-form" action="app/tblpengguna/gantifp" id="form-simpanfile">

                    <fieldset>
                        <section>
                            <div class="row">
                            <div class="col col-10" align="center">
                            <span>Foto Profil lama</span>
                                <div align="center">
                                 <img src="uploads/pengguna/<?php echo $foto; ?>" onclick="editfp()" style="width: 50%;" class="img-modal" title="Foto Profil Lama"> 
                                </div>
                            </div>
                               
                                <div class="col col-10">
                                <input type="hidden" name="id" id="id" value="<?php echo Yii::app()->user->getId(); ?>">
                                    <label for="file" class="input input-file">
                                        <div class="button">
                                            <input type="file" name="fotoprofil" id="fotoprofil" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="Pilih Foto" readonly="">

                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="progress progress-lg progress-striped active" id="progress">
                                <div class="progress-bar bg-color-green"  id="bar"  role="progressbar" style="width: 0%;"></div>
                            </div>
                        </section>  
                    </fieldset>

                    <footer>
                        <button type="submit" class="btn btn-success">
                            Simpan
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Batal
                        </button>

                    </footer>
                </form>                     
                        

            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript" src="themes/ui/js/jquery.form.js"></script>
<script type="text/javascript"> 
pageSetUp();
//window.location.reload();

// Load form valisation dependency
var $loginForm = $("#uname_change").validate({
	// Rules for form validation
	rules : {
		nama : {
			required : true,
			minlength : 3,
			maxlength : 30
		},
		username : {
			required : true,
			minlength : 3,
			maxlength : 20
		},
		email : {
			required : true,
			minlength : 3,
			maxlength : 50,
		}
	},

	// Messages for form validation
	messages : {
		nama : {
			required : 'Mohon isikan Nama'
		},
		username : {
			required : 'Mohon isikan username',
			minlength : 'Nama kurang dari 3 karakter',
			maxlength : 'USername maksimal 20 karakter'					
		},
		email : {
			required : 'Masukan Email',
			minlength : 'Email kurang dari 3 karakter',			
			maxlength : 'Email maksimal 50 karakter'			
		}
	},

	// Do not change code below
	errorPlacement : function(error, element) {
		error.insertAfter(element.parent());
	},
	submitHandler : function(form) {
		// saat validasi benar semua, jalankan simpan()
		return gantiuname();
	}
});

// Registration validation script
var $loginForm = $("#login-form").validate({
	// Rules for form validation
	rules : {
		passlama : {
			required : true,
			minlength : 3,
			maxlength : 20
		},
		passbaru : {
			required : true,
			minlength : 3,
			maxlength : 20
		},
		ulangipass : {
			required : true,
			minlength : 3,
			maxlength : 20,
			equalTo : '#passbaru'
		}
	},

	// Messages for form validation
	messages : {
		passlama : {
			required : 'Mohon isikan kata sandi lama'
		},
		passbaru : {
			required : 'Mohon isikan kata sandi baru',
			minlength : 'Kata sandi kurang dari 3 karakter'					
		},
		ulangipass : {
			required : 'Ulangi kata sandi baru',
			equalTo : 'Kata sandi tidak cocok'					
		}
	},

	// Do not change code below
	errorPlacement : function(error, element) {
		error.insertAfter(element.parent());
	},
	submitHandler : function(form) {
		// saat validasi benar semua, jalankan simpan()
		return gantipass();
	}
});
	function gantipass () {
		$.ajax({
			url: 'app/utility/gantipass',
			type: 'post',
			data: {
				passlama: $("#passlama").val(),
				pass: $("#passbaru").val(),
				repass: $("#ulangipass").val(),
			},
			success:function (respon) {
				if (respon=='success') {
					notifikasi("Berhasil", "Kata Sandi Berhasil diubah", 'success');					
				}
				else {
					notifikasi("Gagal", "Kata Sandi Gagal diubah, silakan cek kembali", 'fail', false, false);
				}
			}
		});
	}

	function gantiuname () {
		$.ajax({
			url: 'app/utility/gantiuname',
			type: 'post',
			data: {
				nama: $("#nama").val(),
				username: $("#username").val(),
				email: $("#email").val(),
			},
			success:function (respon) {
				if (respon=='success') {
					notifikasi("Berhasil", "Data Berhasil diubah", 'success');					
				}
				else if(respon=='sama') {
					notifikasi("Gagal", "Username yang anda masukan telah digunakan", 'fail', false, false);
				}
				else {
					notifikasi("Gagal", "Data Gagal diubah, silakan cek kembali", 'fail', false, false);
				}
			}
		});
	}

	function editfp () {
	    $("#updatefoto").modal("show");
	}

	loadScript("<?php echo ASSETS_URL; ?>/js/jquery.form.js",defineAjaxForm);
	    function defineAjaxForm() {
	        var options = { 
	            beforeSend: function() 
	            {
	                $("#progress").show();
	                var cek = $("#fotoprofil").val();
	                if (cek == "") {
	                    $("#updatefoto").modal("hide");
	                    notifikasi('Batal','Batal Upload Foto, foto kosong','cancel');
	                    complete.die();
	                }

	                //clear everything
	                $("#bar").width('0%');

	            },
	            uploadProgress: function(event, position, total, percentComplete) 
	            {
	                $("#bar").width(percentComplete+'%');

	            },
	            success: function() 
	            {
	                $("#bar").width('100%');

	            },
	            complete: function(response) 
	            {
	                //alert("Sukses diupload");
	                //window.responsefile = response.responseText;
	                $("#updatefoto").modal("hide");
	              
	                notifikasi('Berhasil','Foto Profil berhasil diperbaharui','success');
	                //window.location.reload();
	            },
	            error: function()
	            {
	                notifikasi('Error','File gagal diupload','fail');

	            }

	        }; 

	        $("#form-simpanfile").ajaxForm(options);
	    }
</script>

<style type="text/css">
	<style type="text/css">
    .img-fp {
        cursor: pointer;
        border: 2px solid transparent;
    }

    .img-fp:hover {
        border: 2px solid #333;
        transition: all 0.5s;
    }
    .img-modal {
        width: 100%;
        height: auto;
        margin-bottom: 30px;
        text-align: center;
        box-shadow: 2px 3px 3px #333;
        -moz-box-shadow: 2px 3px 3px #333;
        -webkit-box-shadow: 2px 3px 3px #333;
        -ms-box-shadow: 2px 3px 3px #333;
        -o-box-shadow: 2px 3px 3px #333;
    }
</style>
</style>