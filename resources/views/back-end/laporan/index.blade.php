@extends('layouts.dashboard')
@section('plugins.Datatables', true)

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Webinar</h3>
                        <div class="float-right">
                            <a href="{{route('admin.manage-moderator.create')}}" class="btn btn-success btn-flat btn-sm"
                               title="Tambah">Tambah</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table id="data" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nama Webinar</th>
                                    <th>Narasumber</th>
                                    <th>Jumlah Peserta</th>
                                    <th>Tanggal Pelaksanaan</th>
                                    
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
                    url: '{{route('admin.manage-laporan.index')}}',
                },
                columns: [
                    {data: 'judul'},
                    {data: 'narasumber_name'},
                    {data: 'jumlah_peserta'},
                    {data: 'jadwal'},

                ]
            });
        });
    </script>
@endpush
