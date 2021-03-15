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
                  <h3 class="box-title">Issue Book Table</h3>
                  <a href="{{ route('issue-book.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i>Create Issue</a>
                  <hr>
                </div><!-- /.box-header -->
                <div class="box-body">
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
                    <!-- Button trigger modal -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


      <script>
        function deleteData(id){
            $("#deleteForm").attr("action",'{{ url("issue-book/") }}'+"/"+id)
        }
    </script>
@endsection

