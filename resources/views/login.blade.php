@extends('base')

@section('cont')
<div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form method="POST">
              @csrf
            <div class="form-group">
              <div class="form-label-group">
                 <label for="inputName">User Name</label>
                <input type="username" id="username" name="username" class="form-control" placeholder="User Name" required="required" autofocus="autofocus">
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <label for="inputPassword">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </form>
          <div>
            {{session('msg')}}
          </div>
        </div>
      </div>
@endsection