@extends('backend.layout.backend')

@section('content')

    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$title}}
                <a href="{{route($route .'create')}}" class="btn btn-success">Create</a>

            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Sn</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Short-Description</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($data['row'] as $i=>$cat)
                <tr>
                    <td>{{$i+1}} </td>
                    <td>{{$cat->name}}</td>
                    <td>Rs {{$cat->price}}</td>
                    <td>{{$cat->Category->name}}</td>
                    <td>{!! $cat->description !!}</td>
                    <td>{!! $cat->short_description !!}</td>
                    <td>
                        <input data-id="{{$cat->id}}" class="toggle-class" type="checkbox" data-onstyle="success"
                               data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="De-Active"
                            {{ $cat->status ? 'checked' : '' }}>

                    </td>
                    <td>
                        <img src="{{asset('uploads/images/product/'.$cat->image)}}"  alt="" style="height: 100px; width: 100px; boarder:15px" >
                    </td>

                    <td>   <a href="{{route($route .'show',$cat->id)}}" class="btn btn-sm btn-primary">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{route($route .'edit',$cat->id)}}" class="btn btn-sm btn-warning">
                            <i class="fa fa-pencil-alt"></i>
                        </a>




                    </td>


                </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>Sn</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Short-Description</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('csss')
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@endsection
@section('jss')

    <script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
{{--    </script>--}}
//     <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeStatusproduct',
                    data: {'status': status, 'id': id},
                    success: function(data){
                        console.log(data.success)
                    }
                });
            })
        })
    </script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection
