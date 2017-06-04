@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <form class="form">
                    <div class="form-group has-feedback">
                        <input type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" placeholder="Password">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
