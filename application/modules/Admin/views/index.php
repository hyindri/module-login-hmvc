@extends('layouts.app')
@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
		<button class="btn btn-primary" style="float: right" data-toggle="modal" data-target="#tambahModal">Tambah
			Data</button>
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

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			{{form_open('',['id' => 'tambah-mahasiswa','role' => 'form'])}}
			<div class="modal-body">
				@php
				$nim = [
				'type' => 'number',
				'id' => 'id_nim',
				'name' => 'nim',
				'class' => 'form-control',
				'required' => 'required'
				];

				$nama = [
				'type' => 'text',
				'id' => 'id_nama',
				'name' => 'nama',
				'class' => 'form-control',
				'required' => 'required'
				];

				$jurusan = [
				'type' => 'text',
				'id' => 'id_jurusan',
				'name' => 'jurusan',
				'class' => 'form-control',
				'required' => 'required'
				];

				$fakultas = [
				'type' => 'text',
				'id' => 'id_fakultas',
				'name' => 'fakultas',
				'class' => 'form-control',
				'required' => 'required'
				];
				@endphp

				<div class="form-group">
					{{form_label('NIM Mahasiswa')}}
					{{form_input($nim)}}
				</div>
				<div class="form-group">
					{{form_label('Nama Mahasiswa')}}
					{{form_input($nama)}}
				</div>
				<div class="form-group">
					{{form_label('Jurusan')}}
					{{form_input($jurusan)}}
				</div>
				<div class="form-group">
					{{form_label('Fakultas')}}
					{{form_input($fakultas)}}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
				{{form_submit('submit', 'Simpan', 'class="btn btn-primary"')}}
			</div>
			{{form_close()}}
		</div>
	</div>
</div>

<div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			{{form_open('',['id' => 'ubah-mahasiswa','role' => 'form'])}}
			<div class="modal-body">
				@php
				$id_mahasiswa = [
				'type' => 'hidden',
				'id' => 'ubah-id',
				'name' => 'id_mahasiswa',
				'class' => 'form-control',
				'required' => 'required'
				];

				$nim = [
				'type' => 'number',
				'id' => 'ubah-nim',
				'name' => 'nim',
				'class' => 'form-control',
				'required' => 'required'
				];

				$nama = [
				'type' => 'text',
				'id' => 'ubah-nama',
				'name' => 'nama',
				'class' => 'form-control',
				'required' => 'required'
				];

				$jurusan = [
				'type' => 'text',
				'id' => 'ubah-jurusan',
				'name' => 'jurusan',
				'class' => 'form-control',
				'required' => 'required'
				];

				$fakultas = [
				'type' => 'text',
				'id' => 'ubah-fakultas',
				'name' => 'fakultas',
				'class' => 'form-control',
				'required' => 'required'
				];
				@endphp

				{{form_input($id_mahasiswa)}}
				<div class="form-group">
					{{form_label('NIM Mahasiswa')}}
					{{form_input($nim)}}
				</div>
				<div class="form-group">
					{{form_label('Nama Mahasiswa')}}
					{{form_input($nama)}}
				</div>
				<div class="form-group">
					{{form_label('Jurusan')}}
					{{form_input($jurusan)}}
				</div>
				<div class="form-group">
					{{form_label('Fakultas')}}
					{{form_input($fakultas)}}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
				{{form_submit('submit', 'Simpan', 'class="btn btn-primary"')}}
			</div>
			{{form_close()}}
		</div>
	</div>
</div>

<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<h5 class="modal-title text-white" id="exampleModalLabel">Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			{{form_open('',['id' => 'hapus-mahasiswa','role' => 'form'])}}
			<div class="modal-body">
				@php
				$id_mahasiswa = [
				'type' => 'hidden',
				'id' => 'delete-id',
				'name' => 'id_mahasiswa',
				'class' => 'form-control',
				'required' => 'required'
				];


				@endphp

				{{form_input($id_mahasiswa)}}
				<p>Apakah anda yakin ingin menghapus data ini ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				{{form_submit('submit', 'Hapus', 'class="btn btn-danger"')}}
			</div>
			{{form_close()}}
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

		$('#tambah-mahasiswa').submit('click', function () {
			$.ajax({
				type: 'POST',
				url: "{{base_url('admin/tambah_data')}}",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				success: function (data) {
					$('#tambahModal').modal('hide');
					table.ajax.reload();
				},
				error: function (data) {
					table.ajax.reload();
				}
			});
			return false;
		});

		$('.table-mahasiswa').on('click', '#get-ubahModal', function () {
			let id_mahasiswa = $(this).data('id');
			$.ajax({
				url: "{{base_url('admin/ambil_satu_data')}}",
				method: "POST",
				data: {
					id_mahasiswa: id_mahasiswa
				},
				dataType: "json",
				success: function (data) {
					$('#ubahModal').modal('show');
					$('#ubah-id').val(data.id);
					$('#ubah-nim').val(data.nim);
					$('#ubah-nama').val(data.nama);
					$('#ubah-jurusan').val(data.jurusan);
					$('#ubah-fakultas').val(data.fakultas);
				}
			})
		});

		$('#ubah-mahasiswa').submit('click', function () {
			$.ajax({
				type: "POST",
				url: "{{base_url('admin/ubah_data')}}",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				success: function (data) {
					$('#ubahModal').modal('hide');
					table.ajax.reload();
				},
				error: function (data) {
					table.ajax.reload();
				}
			});
			return false;
		});

		$('.table-mahasiswa').on('click', '#get-hapusModal', function () {
			let id_mahasiswa = $(this).data('id');
			$.ajax({
				url: "{{base_url('admin/ambil_satu_data')}}",
				method: "POST",
				data: {
					id_mahasiswa: id_mahasiswa
				},
				dataType: "json",
				success: function (data) {
					$('#hapusModal').modal('show');
					$('#delete-id').val(data.id);
				}
			})

		});

		$('#hapus-mahasiswa').submit('click', function () {
			$.ajax({
				type: 'POST',
				url: "{{base_url('admin/hapus_data')}}",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				success: function (data) {
					$('#hapusModal').modal('hide');
					table.ajax.reload();
				},
				error: function (data) {
					table.ajax.reload();
				}
			});
			return false;
		})
	});

</script>
</script>
@endsection
