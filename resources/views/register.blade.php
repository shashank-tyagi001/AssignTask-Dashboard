@extends('Dashboard.header')


@section('content')
@include('Dashboard.sidebar')
@if(session('success'))
   <p class="alert alert-success text-center alert-dismissible">{{ session('success') }}</p>
@endif
<div class="container">
    <div class="row header">
      <h1>User Registration &nbsp;</h1>
    </div>
    <div class="row body">
      <form action={{route('registerStore')}} method="POST" enctype="multipart/form-data">
        @csrf
        <ul>

        <div>
          <li>
            <p class="left">
              <label for="register_name">Username</label>
              <input type="text" name="register_name" placeholder="John" required/>
            </p>
          </li>
          @error('register_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

          <li>
            <p>
              <label for="email">Email<span class="req">*</span></label>
              <input type="email" name="register_email" placeholder="john@gmail.com"  required />
            </p>
          </li>

          <div>
            <li>
              <p class="left">
                <label for="password">Password</label>
                <input type="text" name="password" placeholder="*******" required/>
              </p>
            </li>
            @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>

          <li><div class="divider"></div></li>

          <li><select class="form-select" aria-label="size 3  example" name="role">
            <option value="0">Employee</option>
            <option value="1">Admin</option>
          </select></li>

              {{-- <label for="role">Role</label>
              <select name="role" id="role"></select>
                  <option value="1">Admin</option>
                  <option value="0">Employee</option>
                </select> --}}


          <li>
            <input class="btn btn-submit" type="submit" name="save" value="Submit" />
            <small>or press <strong>enter</strong></small>
          </li>

        </ul>
      </form>
    </div>
  </div>

@include('Dashboard.footer')
@endsection
