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
                  <h3 class="box-title">Book Table</h3>
                  <a href="{{ route('book.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add Book</a>
                  <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>ACtion</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                     @foreach ($books as $item)
                     <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->price }}</td>
                        <td><img width="60px" src="{{ $item->image }}" alt=""></td>
                        <td>
                            <a href="{{ route('book.edit',$item->id) }}" class="btn btn-primary"><i class="fa fa-edit "></i></a>
                            <a href="" onclick="deleteData({{ $item->id }})" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="modal" data-target="#modelId-{{ $item->id }}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                     @endforeach
                    </tbody>

                  </table>
                    <!-- Button trigger modal -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->



      <script>
        function deleteData(id){
            $("#deleteForm").attr("action",'{{ url("book/") }}'+"/"+id)
        }
    </script>

    @foreach ($books as $item)


    <!-- Modal -->
    <div class="modal fade" id="modelId-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Book Details</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                   <table class="table table-bordered">
                       <tr>
                           <td>Book Name</td>
                           <td>{{ $item->name }}</td>
                       </tr>
                       <tr>
                           <td>Book Slug</td>
                           <td>{{ $item->slug }}</td>
                       </tr>
                       <tr>
                           <td>Author</td>
                           <td>{{ $item->author }}</td>
                       </tr>

                       <tr>
                           <td>Book Category</td>
                           <td>{{ $item->category->name }}</td>
                       </tr>
                       <tr>
                           <td>Publication</td>
                           <td>{{ $item->publication }}</td>
                       </tr>
                       <tr>
                           <td>Purchase Date</td>
                           <td>{{ $item->purchase_date }}</td>
                       </tr>
                       <tr>
                           <td>Qauntity</td>
                           <td>{{ $item->qty }}</td>
                       </tr>
                       <tr>
                           <td>Price</td>
                           <td>{{ $item->price }}</td>
                       </tr>
                       <tr>
                           <td>Image</td>
                           <td><img src="{{ $item->image }}" alt=""></td>
                       </tr>





                   </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection

