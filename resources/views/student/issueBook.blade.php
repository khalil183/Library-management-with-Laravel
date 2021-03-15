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
                        <th>Return Date</th>
                        <th>Qty</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($issuedBooks as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->student->user->name }}</td>
                                <td>{{ $item->student->phone }}</td>
                                <td>{{ $item->student->roll }}</td>
                                <td>{{ $item->student->class }}</td>
                                <td>{{ $item->book->name }}</td>
                                <td>{{ $item->issue_date }}</td>
                                <td>{{ $item->return_date }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>
                                    @if ($item->status==1)
                                        <span class="badge badge-success">Issued</span>
                                    @elseif($item->status==2)
                                        <span class="badge badge-primary">return</span>
                                    @else
                                    <span class="badge badge-danger">pending</span>
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


@endsection

