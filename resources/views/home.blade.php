@extends('layouts.layout')
@section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Tables
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    @if (Auth::user()->user_type==2)
                    <h3 class="box-title">Book Table</h3>
                    @else
                    <h3 class="box-title">New Issue Book</h3>

                    @endif


                </div><!-- /.box-header -->
                <div class="box-body">
                    @if (Auth::user()->user_type==2)
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
                                <a href="{{ route('add.issue',$item->id) }}" class="btn btn-primary">Added Issue</a>

                                <a href="#" data-toggle="modal" data-target="#modelId-{{ $item->id }}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            </td>
                          </tr>
                         @endforeach
                        </tbody>

                      </table>
                        <!-- Button trigger modal -->
                      @else
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Roll</th>
                            <th>Class</th>
                            <th>Book</th>
                            <th>Issue Date</th>
                            <th>Qty</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($IssueBooks as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->student->user->name }}</td>
                                    <td>{{ $item->student->phone }}</td>
                                    <td>{{ $item->student->roll }}</td>
                                    <td>{{ $item->student->class }}</td>
                                    <td>{{ $item->book->name }}</td>
                                    <td>{{ $item->issue_date }}</td>
                                    <td>{{ $item->qty }}</td>

                                    <td>
                                        @if ($item->status==0)
                                            <a href="" onclick="deleteData({{ $item->id }})" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            <a href="{{ url('approved-issue/'.$item->id) }}" class="btn btn-primary btn-sm">approved</a>
                                        @else
                                            <a href="" class="btn btn-danger disabled"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        @endif
                                    </td>
                                </tr>

                            @endforeach

                        </tbody>

                      </table>
                    @endif
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


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
