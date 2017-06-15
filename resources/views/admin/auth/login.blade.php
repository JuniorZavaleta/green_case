@extends('app.layout.base')

@section('content')
<div class="block-center mt-xl wd-xl">
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="panel-title">Login</div>
    </div>
    <div class="panel-body">
      <form class="form" method="POST">
        {{ csrf_field() }}
        <div class="form-group has-feedback">
          <label>Email</label>
          <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'parsley-error' : '' }}" placeholder="Email">
          @if ($errors->has('email'))
          <!-- Errors for email -->
          <ul class="parsley-errors-list filled">
            @foreach ($errors->get('email') as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif
        </div>
        <div class="form-group has-feedback">
          <label>Password</label>
          <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'parsley-error' : '' }}" placeholder="Password">
          @if ($errors->has('password'))
          <!-- Errors for password -->
          <ul class="parsley-errors-list filled">
            @foreach ($errors->get('password') as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif
        </div>
        <div class="clearfix">
          <button type="submit" class="btn btn-square btn-info">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
