@include('header') @include('sidebar')
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
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active">Car Master</li>
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
              <form action="{{ route('car.storeedit') }}" method="post" enctype="multipart/form-data"> 
                @csrf 
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputRounded0">Car ID <code>*</code>
                    </label>
                    <input type = "hidden" value = "{{ $car->c_id }}" name = "c_id">
                    <input type="text" value = "{{ $car->car_id }}" class="form-control rounded-0" name="carid" id="exampleInputRounded0" placeholder="" required>
                  </div>
                  <label for="exampleInputRounded0">Brand <code>*</code>
                  </label>
                  <div class="form-group">
                    
                    <select class="form-control select2" id="brand" name="brand" required>
                      
                          @foreach($brand as $index => $p)
                            <option value="{{ $p->cb_id }}" 
                            @if($car->brand == $p->cb_id)
                            selected
                            @endif 
                            >{{ $p->cb_name }}</option>
                            @endforeach 
                    
                    </select>
                  </div>
                  <label for="exampleInputRounded0">Model <code>*</code>
                  </label>
                  <div class="form-group">
                    <select class="form-control select2" id="model" name="model" required>
                    @foreach($model as $index => $p)
                      <option value = "{{ $p->cm_id }}"                      
                      @if($car->model == $p->cm_id)
                            selected
                            @endif    
                      >
                      {{ $p->cm_name }}</option>
                    @endforeach  
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputRounded0">Price <code>*</code>
                    </label>
                    <input type="number" name="price" value = "{{ $car->price }}"  class="form-control rounded-0" id="exampleInputRounded0" placeholder="" required>
                  </div>
                </div>
                <!-- /.card-body -->
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
  </section>
  
  @include('footer')