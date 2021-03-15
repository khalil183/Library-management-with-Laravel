@extends('layouts.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Book Form
            </h1>
            <ol class="breadcrumb">
                <a href="{{ route('book.index') }}" class="btn btn-success pull-right"><i class="fa fa-eye" aria-hidden="true"></i> View Book</a>
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
                        <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="category" id="" class="form-control select2">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $item)
                                    <option {{ old('category')==$item->id ? 'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Book Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Book Name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Book Author</label>
                                <input name="author" type="text"  class="form-control" placeholder="Book Author" value="{{ old('author') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Book Publication</label>
                                <input name="publication" type="text" class="form-control" placeholder="Book Publication" value="{{ old('publication') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Purchase Date</label>
                                <input name="purchase_date" type="date" class="form-control" value="{{ old('purchase_date') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input name="price" type="text" class="form-control" placeholder="Price" value="{{ old('price') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Qty</label>
                                <input name="qty" type="number" class="form-control" placeholder="Qty" value="{{ old('qty') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input name="image" type="file" class="form-control" >
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
