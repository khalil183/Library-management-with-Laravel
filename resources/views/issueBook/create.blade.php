@extends('layouts.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Issue Book Form
            </h1>
            <ol class="breadcrumb">
                <a href="{{ route('issue-book.index') }}" class="btn btn-success pull-right"><i class="fa fa-eye" aria-hidden="true"></i> Issue Book</a>
            </ol>
          </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
              <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-body">
                                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('issue-book.store') }}" method="POST" >
                            @csrf
                            <div class="form-group">
                                <label for="">Student</label>
                                <select name="student" id="" class="form-control select2">
                                    <option value="">Select Student</option>
                                    @foreach ($students as $item)
                                    <option {{ old('student')==$item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->user->name }} - ({{ $item->roll }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Book</label>
                                <select name="book" id="" class="form-control select2">
                                    <option value="">Select Book</option>
                                    @foreach ($books as $item)
                                    <option {{ old('book')==$item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Issue Date</label>
                                <input name="issue_date" type="date" class="form-control" value="{{ old('issue_date') }}">
                            </div>
                            <button type="submit" class="btn btn-success">Create Issue</button>
                        </form>
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
            </div>
          </div><!-- /.row (main row) -->
        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->
@endsection
