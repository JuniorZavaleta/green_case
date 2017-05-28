@extends('layouts.base')

@section('content')
    <h1>home</h1>
    <!-- Page content-->
         <div class="content-wrapper">
            <h3>Form Elements
               <small>Standard and custom elements for any form</small>
            </h3>
            <!-- START panel-->
            <div class="panel panel-default">
               <div class="panel-heading">Inline form</div>
               <div class="panel-body">
                  <form role="form" class="form-inline">
                     <div class="form-group">
                        <label for="input-email" class="sr-only">Email address</label>
                        <input id="input-email" type="email" placeholder="Type your email" class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="input-password" class="sr-only">Password</label>
                        <input id="input-password" type="password" placeholder="Type your password" class="form-control">
                     </div>
                     <div class="checkbox c-checkbox">
                        <label>
                           <input type="checkbox">
                           <span class="fa fa-check"></span>Remember</label>
                     </div>
                     <button type="submit" class="btn btn-default">Sign in</button>
                  </form>
               </div>
            </div>
            <!-- END panel-->
            <!-- START row-->
            <div class="row">
               <div class="col-sm-6">
                  <!-- START panel-->
                  <div class="panel panel-default">
                     <div class="panel-heading">Stacked form</div>
                     <div class="panel-body">
                        <form role="form">
                           <div class="form-group">
                              <label>Email address</label>
                              <input type="email" placeholder="Enter email" class="form-control">
                           </div>
                           <div class="form-group">
                              <label>Password</label>
                              <input type="password" placeholder="Password" class="form-control">
                           </div>
                           <div class="checkbox c-checkbox">
                              <label>
                                 <input type="checkbox" checked="">
                                 <span class="fa fa-times"></span>Check me out</label>
                           </div>
                           <button type="submit" class="btn btn-sm btn-default">Submit</button>
                        </form>
                     </div>
                  </div>
                  <!-- END panel-->
               </div>
@endsection