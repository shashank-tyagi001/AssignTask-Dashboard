@extends('Dashboard.header')

@section('content')
@include('Dashboard.sidebar')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daily Reports</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Project Name</th>
                <th>Today date</th>
                <th>9-11 am</th>
                <th>11-1 am</th>
                <th>2-4 pm</th>
                <th>4-6 pm</th>
              </tr>
        </thead>
        <tbody class="showReports" id="showReports">

        {{-- <tr>
          <td>Trident</td>
          <td>Internet
            Explorer 4.0
          </td>
          <td>Win 95+</td>
          <td> 4</td>
        </tr> --}}

        </tbody>
        <tfoot>
            <tr>
                <th>Employee Name</th>
                <th>Project Name</th>
                <th>Today date</th>
                <th>9-11 am</th>
                <th>11-1 am</th>
                <th>2-4 pm</th>
                <th>4-6 pm</th>
              </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->





@include('Dashboard.footer')
@endsection
