@extends('layouts.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Category Form
            </h1>
            <ol class="breadcrumb">
                <a href="{{ route('category.index') }}" class="btn btn-success pull-right"><i class="fa fa-eye" aria-hidden="true"></i> View Category</a>
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
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Category Name</label>
                                <input name="name" type="text" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success">Add New</button>
                        </form>
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
            </div>
          </div><!-- /.row (main row) -->
        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->
@endsection
