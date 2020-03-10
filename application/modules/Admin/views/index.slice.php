@extends('layouts.app')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-mahasiswa" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>NIM</th>
						<th>Nama</th>
						<th>Jurusan</th>
						<th>Fakultas</th>
                        <th width="5%">Aksi</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
@endsection
@section('js')
<script>
	$(document).ready(function () {
		var table = $('.table-mahasiswa').DataTable({
			"dom": 'lTfgitp',
			"processing": true,
			"serverSide": true,
			"responsive": true,
			"order": [],
			"ajax": {
				url: "{{base_url('admin/ambil_data')}}",
				type: "POST"
			},
			"pageLength": 10,
		});

		// $('#tambah-mahasiswa').submit('click', function () {
		// 	$.ajax({
		// 		type: 'POST',
		// 		url: "{{base_url('welcome/tambah_data')}}",
		// 		data: new FormData(this),
		// 		processData: false,
		// 		contentType: false,
		// 		cache: false,
		// 		success: function (data) {
		// 			$('#tambahModal').modal('hide');
		// 			table.ajax.reload();
		// 		},
		// 		error: function (data) {
		// 			table.ajax.reload();
		// 		}
		// 	});
		// 	return false;
		// });

		// $('.table-mahasiswa').on('click', '#get-ubahModal', function () {
		// 	let id_mahasiswa = $(this).data('id');
		// 	$.ajax({
		// 		url: "{{base_url('welcome/ambil_satu_data')}}",
		// 		method: "POST",
		// 		data: {
		// 			id_mahasiswa: id_mahasiswa
		// 		},
		// 		dataType: "json",
		// 		success: function (data) {
		// 			$('#ubahModal').modal('show');
		// 			$('#ubah-id').val(data.id);
		// 			$('#ubah-nim').val(data.nim);
		// 			$('#ubah-nama').val(data.nama);
		// 			$('#ubah-jurusan').val(data.jurusan);
		// 			$('#ubah-fakultas').val(data.fakultas);
		// 		}
		// 	})
		// })

		// $('#ubah-mahasiswa').submit('click', function () {
		// 	$.ajax({
		// 		type: "POST",
		// 		url: "{{base_url('welcome/ubah_data')}}",
		// 		data: new FormData(this),
		// 		processData: false,
		// 		contentType: false,
		// 		cache: false,
		// 		success: function (data) {
		// 			$('#ubahModal').modal('hide');
		// 			table.ajax.reload();
		// 		},
		// 		error: function (data) {
		// 			table.ajax.reload();
		// 		}
		// 	});
		// 	return false;
		// })

		// $('.table-mahasiswa').on('click', '#get-hapusModal', function () {
		// 	let id_mahasiswa = $(this).data('id');
		// 	$.ajax({
		// 		url: "{{base_url('welcome/ambil_satu_data')}}",
		// 		method: "POST",
		// 		data: {
		// 			id_mahasiswa: id_mahasiswa
		// 		},
		// 		dataType: "json",
		// 		success: function (data) {
		// 			$('#hapusModal').modal('show');
		// 			$('#delete-id').val(data.id);
		// 		}
		// 	})

		// });

		// $('#hapus-mahasiswa').submit('click', function () {
		// 	$.ajax({
		// 		type: 'POST',
		// 		url: "{{base_url('welcome/hapus_Data')}}",
		// 		data: new FormData(this),
		// 		processData: false,
		// 		contentType: false,
		// 		cache: false,
		// 		success: function (data) {
		// 			$('#hapusModal').modal('hide');
		// 			table.ajax.reload();
		// 		},
		// 		error: function (data) {
		// 			table.ajax.reload();
		// 		}
		// 	});
		// 	return false;
		// })
	});

</script>
</script>
@endsection
