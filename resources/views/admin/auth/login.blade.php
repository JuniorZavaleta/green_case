@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Login</h2>
            </div>
            <div class="panel-body">
                <form class="form" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group has-feedback">
                        <input type="text" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="clearfix">
                        <button class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
