<style>
  .resp {
      width: 100%;
      height: 85vh;
    }
  @media (max-width: 650px) {
    .resp {
      width: 100%;
      height: 70vh;
    }
  }
</style>
@extends('Layout.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
<!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container">
        <!-- Insert Looker Studio report here -->
        <div class="row">
          <div class="col-12">
            
              <!-- </div> -->
              <!-- /.card-header -->
              <!-- <div class="card-body"> -->
                <div class="border resp">
                  <iframe style="height: 100%; width: 100%;"
                  src="https://lookerstudio.google.com/embed/reporting/78834fd9-597f-44d7-a373-b77ce6e47e80/page/aOt9D" frameborder="0" style="border:0" allowfullscreen sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox">
                </iframe>
                </div>
              <!-- </div> -->
              <!-- /.card-body -->
            <!-- </div> -->
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
