@extends('layouts.dashboard')
@section('plugins.Datatables', true)

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Sertifikat</h3>
                        <div class="float-right">
                            <a href="" class="btn btn-success btn-flat btn-sm"
                               title="Tambah">Tambah</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table id="data" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nama Kategori Pekerjaan</th>
                                    <th>Logo</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
@push('js')
    <script>
        $(function() {
            $('#data').DataTable({
                serverSide: true,
                processing: true,
                searchDelay: 1000,
                ajax: {
                    url: '',
                },
                columns: [{
                    data: 'name'
                },
                    {data: 'logo', name: 'logo',render: function(datum, type, row) {
                            if(row.logo){
                                return `<a href="/storage/${row.logo}" target="_BLANK">
                            <img width="50px" src="/storage/${row.logo}" />
                            </a>`;
                            }else{
                                return ""
                            }

                        }},
                    {
                        data: 'status', name: 'deleted_at', render: function (datum, type, row) {
                            if (row.status == 'Active') {
                                return `<span class="badge badge-success">${row.status}<span>`;
                            } else {
                                return `<span class="badge badge-danger">${row.status}<span>`;
                            }

                        }
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    },

                ]
            });
        });
    </script>
@endpush
