@include('header') @include('sidebar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Company Master</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active">Company Master</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card card-primary">
       
              <!-- /.card-header -->
              <form action="{{ route('company.storenew') }}" method="post" enctype="multipart/form-data"> @csrf <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputRounded0">Company Code <code>*</code>
                    </label>
                    <input type="text" class="form-control rounded-0" name="companycode" id="exampleInputRounded0" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputRounded0">Company Name <code>*</code>
                    </label>
                    <input type="text" name="copanyname" class="form-control rounded-0" id="exampleInputRounded0" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputRounded0">Initial <code>*</code>
                    </label>
                    <input type="text" name="initial" class="form-control rounded-0" id="exampleInputRounded0" placeholder="" required>
                  </div>
                <div class="modal-footer justify-content-between">
                       <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
  
  @include('footer')