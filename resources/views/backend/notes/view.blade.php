@extends('backend.layout.backend')

@section('content')
    <div class="col-sm-6 col-md-9 col-lg-9">


            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$title}}
                        <a href="{{route($route .'index')}}" class="btn btn-success">List</a>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td>Semester</td>
                            <td>{{$data['row']->Semester->name}}</td>
                        </tr>
                        <tr>
                            <td>Subject</td>
                            <td>{{$data['row']->Subject->title}}</td>
                        </tr>
                        <tr>
                            <td>Chapter-Name</td>
                            <td>{{$data['row']->Chapter->name}}</td>
                        </tr>
                        <tr>
                            <td>Notes</td>
                            <td>{{$data['row']->notes}}</td>
                        </tr>


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>














@endsection


