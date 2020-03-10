<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <div class="container mt-5">
        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800">Data Mahasiswa</h1>
        <!-- DataTales Example -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">                    
                        <a href="{{site_url('auth')}}" class="btn btn-danger" style="float: right;">Login</a>                    
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table-mahasiswa table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Jurusan</th>
                                        <th>Fakultas</th>                                      
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
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

    


    <!-- Core of Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <!-- Datatables Javascript -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>

    $(document).ready(function() {
        var table = $('.table-mahasiswa').DataTable({
            "dom": 'lTfgitp',
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "order": [],
            "ajax": {
                url: "{{base_url('welcome/ambil_data')}}",
                type: "POST"
            },            
            "pageLength": 10,
        });

        $('#tambah-mahasiswa').submit('click', function() {
            $.ajax({
                type: 'POST',
                url: "{{base_url('welcome/tambah_data')}}",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,                
                success: function(data) {
                    $('#tambahModal').modal('hide');
                    table.ajax.reload();
                },
                error: function(data) {
                    table.ajax.reload();
                }
            });
            return false;
        });

        $('.table-mahasiswa').on('click', '#get-ubahModal', function() {
            let id_mahasiswa = $(this).data('id');
            $.ajax({
                url: "{{base_url('welcome/ambil_satu_data')}}",
                method: "POST",
                data: {
                    id_mahasiswa: id_mahasiswa
                },
                dataType: "json",
                success: function(data) {
                    $('#ubahModal').modal('show');
                    $('#ubah-id').val(data.id);
                    $('#ubah-nim').val(data.nim);
                    $('#ubah-nama').val(data.nama);
                    $('#ubah-jurusan').val(data.jurusan);
                    $('#ubah-fakultas').val(data.fakultas);
                }
            })
        })

        $('#ubah-mahasiswa').submit('click', function() {
            $.ajax({
                type: "POST",
                url: "{{base_url('welcome/ubah_data')}}",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,                
                success: function(data) {
                    $('#ubahModal').modal('hide');
                    table.ajax.reload();
                },
                error: function(data) {
                    table.ajax.reload();
                }
            });
            return false;
        })

        $('.table-mahasiswa').on('click', '#get-hapusModal', function() {
            let id_mahasiswa = $(this).data('id');
            $.ajax({
                url: "{{base_url('welcome/ambil_satu_data')}}",
                method: "POST",
                data: {
                    id_mahasiswa: id_mahasiswa
                },
                dataType: "json",
                success: function(data) {
                    $('#hapusModal').modal('show');
                    $('#delete-id').val(data.id);                   
                }
            })
                        
        });

        $('#hapus-mahasiswa').submit('click', function() {
            $.ajax({
                type: 'POST',
                url: "{{base_url('welcome/hapus_Data')}}",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,                
                success: function(data) {
                    $('#hapusModal').modal('hide');
                    table.ajax.reload();
                },
                error: function(data) {
                    table.ajax.reload();
                }
            });
            return false;
        })
    });
    </script>
</body>

</html>