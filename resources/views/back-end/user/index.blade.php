@extends('layouts.dashboard')
@section('plugins.Datatables', true)

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                @if ($message = Session::get('success'))
                <div class="mt-4 alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Admin</h3>
                        <div class="float-right">
                            <a href="{{route('admin.manage-admin.create')}}" class="btn rounded-sm btn-success btn-flat btn-sm"
                               title="Tambah"><i class="fa fa-user" aria-hidden="true"></i> Tambah Admin</a>
                            
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table id="data" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Peran</th>
                                    <th>Perizinan</th>
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
                    url: '{{route('admin.manage-admin.index')}}',
                },
                columns: [
                    {data: 'name'},
                    {data: 'role'},
                    {data: 'permission'},
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
