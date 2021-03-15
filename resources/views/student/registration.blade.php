@include('layouts.header')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3"></div>
         <!-- right column -->
         <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Student Registration</h3>
              </div><!-- /.box-header -->
              <!-- form start -->

              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
              <form class="form-horizontal" method="POST" action="{{ route('store.student.reg') }}">
                  @csrf
                <div class="box-body">
                  <div class="form-group">
                    <label for="Name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" id="Name" placeholder="Name" value="{{ old('name') }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" value="{{ old('email') }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Phone" class="col-sm-2 control-label">Phone</label>
                    <div class="col-sm-10">
                      <input type="text" name="phone" class="form-control" id="Phone" placeholder="Phone" value="{{ old('phone') }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Roll" class="col-sm-2 control-label">Roll</label>
                    <div class="col-sm-10">
                      <input type="text" name="roll" class="form-control" id="Roll" placeholder="Roll" value="{{ old('roll') }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Registration" class="col-sm-2 control-label">Registration</label>
                    <div class="col-sm-10">
                      <input type="text" name="registration" class="form-control" id="Registration" placeholder="Registration" value="{{ old('registration') }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Registration" class="col-sm-2 control-label">Class</label>
                    <div class="col-sm-10">
                      <select name="class" id="" class="form-control">
                          <option value="">Select Class</option>
                          <option {{ old('class')=='1' ? 'selected' :'null' }} value="1">1</option>
                          <option {{ old('class')=='2' ? 'selected' :'null' }} value="2">2</option>
                          <option {{ old('class')=='3' ? 'selected' :'null' }} value="3">3</option>
                          <option {{ old('class')=='4' ? 'selected' :'null' }} value="4">4</option>
                          <option {{ old('class')=='5' ? 'selected' :'null' }} value="5">5</option>
                          <option {{ old('class')=='6' ? 'selected' :'null' }} value="6">6</option>
                          <option {{ old('class')=='7' ? 'selected' :'null' }} value="7">7</option>
                          <option {{ old('class')=='8' ? 'selected' :'null' }} value="8">8</option>
                          <option {{ old('class')=='9' ? 'selected' :'null' }} value="9">9</option>
                          <option {{ old('class')=='10' ? 'selected' :'null' }} value="10">10</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="Year" class="col-sm-2 control-label">Year</label>
                    <div class="col-sm-10">
                      <input type="text" name="year" class="form-control" id="Year" placeholder="Year" value="{{ old('year') }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" value="{{ old('password') }}">
                    </div>
                  </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <a href="{{ route('login') }}" class="btn btn-default btn-danger">Cancel</a>
                  <button type="submit" class="btn btn-info pull-right">Register</button>
                </div><!-- /.box-footer -->
              </form>
            </div><!-- /.box -->
        </div>
    </div>
</div>
@include('layouts.footer')
