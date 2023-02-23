<!-- Modal -->
<div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Detail NOP
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form class="smart-form" id="form-daftarnop" novalidate="novalidate">
					<fieldset>
						<section>
							<div class="row">
								<div class="col col-2">
									NOP
								</div>
								<div class="col col-4">
									<label class="input">
										<input class="input-sm form-control text-align-left" type="text" id="list_daftarnop_nop" name="list_daftarnop_nop" data-mask="34.71.999.999.999.9999">
									</label>
								</div>
								</div>
						</section>

					</fieldset>

					<footer>
						<button type="button" onclick="daftarnop_save()" style="float: left; margin-left: 17%;" class="btn btn-primary">
							<i class="fa fa-save "></i> Simpan NOP
						</button>
					</footer>

				</form>

				<div class="" id="tabel">
				<table id="dt_basic" class="table table-bordered table-striped table-condensed table-hover has-tickbox" width="100%">
					<thead>			                
						<tr>
							<th width="1%"> <div align="center">No</div></th>
							<th width="30%" data-class="expand"> <div align="center">NOP</div></th>
							<th width="19%"><div align="center">Aksi</div></th>
						</tr>
					</thead>
					<tbody id="daftarnop_list">
					</tbody>
				</table>
				</div>
				<!-- <div class="modal-footer">
					<a href="javascript:void(0);" class="btn btn-default " data-dismiss="modal"><i class="fa fa-ban"></i> Batal</a>
					<a href="javascript:void(0);" onclick="simpan()" data-dismiss="modal" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</a>
				</div> -->	
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">
	pageSetUp();
	$("#nop").change(function(event) {
		var nopx = $(event.target).val()
		if (nopx != '') {
			$('a[onclick="detail_nop()"]').show()
			if (typeof tbldaftarnop[0] == 'undefined') {
				tbldaftarnop = [{tbldaftarnop_nop: nopx}]
				localStorage.setItem("tbldaftarnop", JSON.stringify(tbldaftarnop))
			}
			if (typeof tbldaftarnop[0] != 'undefined' && tbldaftarnop[0].tbldaftarnop_nop != nopx) {
				tbldaftarnop[0].tbldaftarnop_nop = nopx
				localStorage.setItem("tbldaftarnop", JSON.stringify(tbldaftarnop))
			}
		} else {
			$('a[onclick="detail_nop()"]').hide()
		}
		daftarnop_reload()
	});
	daftarnop_ada = <?php echo CJSON::encode(array()) ?>;
	<?php /*if (count($data['daftarnop'])>0): ?>
		localStorage.setItem("tbldaftarnop", JSON.stringify(<?php echo CJSON::encode($data['daftarnop']) ?>));
	<?php else:*/ ?>
		localStorage.setItem("tbldaftarnop", '[]');
	<?php /*endif*/ ?>
	// daftarnop_reload();

	jQuery(document).ready(function($) {
		operation = "A"; //"A"=Adding; "E"=Editing
		selected_index = -1; //Index of the selected list item
		if (typeof localStorage.tbldaftarnop == 'undefined') {
			localStorage.setItem("tbldaftarnop",'[]');
		}

		tbldaftarnop = localStorage.getItem("tbldaftarnop");//Retrieve the stored data
		tbldaftarnop = JSON.parse(tbldaftarnop); //Converts string to object

		daftarnop_reload();

		$('a[onclick="detail_nop()"]').hide()
		$("#nop").trigger('change')
	});

	function detail_nop(){
		$('#modal_detail').modal('show');
	}

	function daftarnop_save(type) {
			var nop = $.trim($("#list_daftarnop_nop").val());
			rs = {
				"tbldaftarnop_id": 0,
				"tbldaftarnop_nop": nop,
			};

			if (operation=='E') {
				tbldaftarnop[selected_index] = rs;
				operation = 'A';
			} else if (operation=='A') {
				tbldaftarnop.push( rs );
			}
			localStorage["tbldaftarnop"] = JSON.stringify( tbldaftarnop );
			$("#form-daftarnop input, #form-daftarnop textarea, #form-daftarnop select").val('');
			$("#form-daftarnop select.select2").select2('val', '');
			daftarnop_reload();
			window.selected_index = -1;
	}

	function daftarnop_edit(selected_index, type){
		$("#form-daftarnop input, #form-daftarnop select").val('');
		operation = "E"; //Edit
		window.selected_index = selected_index;
		rs = tbldaftarnop[selected_index];

		$("#list_daftarnop_nop").val(rs.tbldaftarnop_nop);
	 	return true;
	}

	function daftarnop_delete(selected_index) {
		tbldaftarnop.splice(selected_index, 1);
		localStorage.setItem("tbldaftarnop", JSON.stringify(tbldaftarnop));
		daftarnop_reload();
	}

	function daftarnop_reload() {
		operation = "A"; //"A"=Adding; "E"=Editing
		selected_index = -1; //Index of the selected list item
		$("#list_daftarnop_nop").val("");
		$("#daftarnop_list").html("");
		$("#daftarnop_list2").html("");
		tbldaftarnop = JSON.parse(localStorage["tbldaftarnop"]);
		for(var i in tbldaftarnop){ 
			var rs = (tbldaftarnop[i]);
			var ke = parseInt(i)+parseInt(1);
			$("#daftarnop_list").append(
				'<tr>'
					+'<td><div align="right">'+ ke +'</div></td>'
					+'<td><div align="left">'+((rs.tbldaftarnop_nop)) +'</div></td>'
					+'<td><a class="btn btn-sm btn-warning  btn-circle" onclick="daftarnop_edit('+i+',\'A\')"><i class="fa fa-pencil"></i></a>'
					+'<a class="btn btn-sm  btn-danger btn-circle" onclick="daftarnop_delete('+i+')"><i class="fa fa-times"></i></a></td>'
				+'</tr>'
			);
		}
	}
</script>