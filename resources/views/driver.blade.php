@include('header') 

@include('sidebar') 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Driver Master</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Driver Master</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">      

        <div class="row">        
          <div class="col-12">

                 @include('message')
    

            <div class="card">
              <div class="card-header">      
             

                <div class = "row">    

                <div class ="col-1"> 
                    <a href ="{{ route('driver.addnew')}}" class="btn btn-info">
                        New Driver
                    </a>
                </div>
           
               <div class ="col-11">    
                      <form action="{{ route('driver.search') }}" method="GET">
                        {{ csrf_field() }} <!-- sistem token hanya ada di Laravel keren cuk -->  
                        <div class="col-12">
                              <div class="input-group">
                                      <input type="text" name="cari" id="cari" class="form-control" placeholder="Search Driver" 
                                      value="<?php echo request('cari') ?>" autocomplete="off" >
                                      <span class="input-group-btn">
                                      <input type="submit" name="submit" value="Search" class="btn btn-info" />
                                      </span>
                              </div>
                        </div>
                      </form>
              </div>


              <!-- /.card-header -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="ex" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Driver ID</th>
                    <th>Name</th>
                    <th>HP</th>
                    <th>Branch</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($driver as $index => $p)
                  <tr>
                    <td>{{ $p->driver_id  }}</td>
                    <td>{{ $p->d_name }}</td>
                    <td>{{ $p->hp }}</td>
                    <td>{{ $p->branch_name }}</td>
                    <td>

                    <a href = "{{ url('/driver/edit') }}/{{$p->d_id}}" class="pull-right btn btn-primary btn-sm"> <i class="fa fa-tag" aria-hidden="true"></i> </a>

                    <a href = "{{ url('/driver/delete') }}/{{$p->d_id}}" class="pull-right btn btn-danger btn-sm" onclick="return confirm('Anda akan menghapus data ini?')"> <i class="fa fa-trash" aria-hidden="true" ></i></a>      
               
     


                      </button> 
                     </td>
                  </tr>
                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Driver ID</th>
                    <th>Name</th>
                    <th>HP</th>
                    <th>Branch</th>
                    <th></th>
                  </tr>

                  <tr>
                    <td colspan = "8">
                    <small> {{ $driver->links() }} </small>
    
                    
                    </td>
                  </tr>
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

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

  <!-- Tooaster Start -->


  <!-- Toaster End-->
  @include('footer') 


