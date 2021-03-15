@extends('layouts.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Category Table</h3>
                  <a href="{{ route('category.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add Category</a>
                  <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>ACtion</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                     @foreach ($categories as $item)
                     <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->slug }}</td>
                        <td>
                            <a href="{{ route('category.edit',$item->id) }}" class="btn btn-primary"><i class="fa fa-edit "></i></a>
                            <a href="" onclick="deleteData({{ $item->id }})" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                     @endforeach
                    </tbody>

                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->



      <script>
        function deleteData(id){
            $("#deleteForm").attr("action",'{{ url("category/") }}'+"/"+id)
        }
    </script>
@endsection

