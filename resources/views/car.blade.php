@include('header') 

@include('sidebar') 


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Car Master</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Car Master</li>
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

                    <a href ="{{ route('car.addnew')}}" class="btn btn-info">
                        New Car
                    </a>
                  </div>


            <div class="col-11">    
                <form action="{{ route('car.search') }}" method="GET">
                    {{ csrf_field() }} <!-- sistem token hanya ada di Laravel keren cuk -->  
                    <div class="col-12">
                        <div class="input-group">
                            <!-- Brand filter -->
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="brand">Brand</label>
                                <select name="brand" class="form-control" id="brand">
                                    <option value="">Select Brand</option>
                                    @foreach($brand as $p)
                                        <option value="{{ $p->cb_id }}" {{ old('brand') == $p->cb_id ? 'selected' : '' }}>
                                            {{ $p->cb_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Model filter -->
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="model">Model</label>
                                <select name="model" class="form-control" id="model">
                                    <option value="">Select Model</option>
                                    @foreach($model as $p)
                                        <option value="{{ $p->cm_id }}" {{ old('model') == $p->cm_id ? 'selected' : '' }}>
                                            {{ $p->cm_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Ready status filter -->
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="ready_status">Ready Status</label>
                                <select name="ready_status" class="form-control" id="ready_status">
                                    <option value="">Select Ready Status</option>
                                    <option value="yes" {{ old('ready_status') == 'yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="no" {{ old('ready_status') == 'no' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
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
                    <th>Car ID</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Price / Day</th>
                    <th>Ready</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($car as $index => $p)
                  <tr>
                    <td>{{ $p->car_id  }}</td>
                    <td>{{ $p->cb_name }}</td>
                    <td>{{ $p->cm_name }}</td>
                    <td>{{ $p->price }}</td>
                    <td>{{ $p->ready_status }}</td>
                    <td>

                    <a href = "{{ url('car/edit/') }}/{{$p->c_id}}" class="pull-right btn btn-primary btn-sm"> <i class="fa fa-tag" aria-hidden="true"></i> </a>

                    <!-- <a href="/car/del/{{ $p->car_id }}" title="delete" class="delete" onclick="return confirm('Are you sure you want to delete this item')">Delete</a> -->


                    <a href = "{{ url('car/delete') }}/{{$p->c_id}}" class="pull-right btn btn-danger btn-sm" onclick="return confirm('Anda akan menghapus data ini?')"> <i class="fa fa-trash" aria-hidden="true" ></i></a>      
               
     


                      </button> 
                     </td>
                  </tr>
                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Car ID</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Price / Day</th>
                    <th>Ready</th>
                    <th></th>
                  </tr>

                  <tr>
                    <td colspan = "8">
                    <small> {{ $car->links() }} </small>
    
                    
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

    <script>
      @if (Session::has('pesan'))
            toastr.{{session::get('alert')}}("{{Session::get('message')}}");
     @endif
    </script>

  <!-- Toaster End-->
  @include('footer') 


