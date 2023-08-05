@include('header') 
@include('sidebar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          
          <h1>Car Request</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active">Car Request</li>
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
       @include('message')

        <!-- {{ Session::get('success') }} -->

      <!-- Session::get('success') -->

          <!-- @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif -->

          <div class="card">
            <div class="card card-primary">

            <form name = "main" action = "{{ route('carrequest.main') }}" method ="post" >    
            @csrf 
                <div class="row">
                    <div class="col-md-6">
                             <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Request Form</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form>
                                        <div class="card-body">


                                        <div class="form-group">
                                            <label>Date and time range:</label>
                                            <div class="input-group">
                                            <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                            </div>
                                            <input type="text" name="datetimes"  
                                            value = "{{ $datetimes }}" id="datetimes" 
                                            class="form-control" autocomplete="off" required/>

                                                <script>
                                                $(function() {
                                                $('input[name="datetimes"]').daterangepicker({
                                                    timePicker: true,
                                                    startDate: moment().startOf('hour'),
                                                    endDate: moment().startOf('hour').add(32, 'hour'),
                                                    locale: {
                                                    format: 'DD/M/Y HH:mm'
                                                    //format : 'DD/M/Y H:i:s'
                                                    },
                                                    //pick12HourFormat: false   
                                                });
                                                });
                                                </script>
                                            </div>

                                            </div>


                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Going to</label>
                                            <input type="text" name ="goingto"  value = "{{ $goingto }}"  autocomplete="off"  class="form-control" id="goingto" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Aditional information</label>
                                            <textarea class="form-control" rows="5" name= "aditional" id = "aditional">{{ $addinform }}</textarea>
                                        </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                        <button type="submit" name ="proses" value = "proses" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                        </div>  
                        <div class="col-md-6">
                         
                        <div class="card">
                            <div class="card-header">
                                <div class= "row">    
                                     <div class="col-md-11">
                                        <h3 class="card-title">Passanger</h3>   
                                     </div>   
                                     <div class="col-md-1">
                                        <button type="button" class="btn btn-info " id ="addpess" data-toggle="modal" data-target="#addpesangger">
                                        <i class="fa fa-user-plus"  aria-hidden="true"></i></button>
                                     </div>
                                </div>    

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Assignment</th>
                                    <th style="width: 110px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pessangertmp as $index => $p)
                                    <tr>
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $p->pe_name }}</td>
                                    <td>
                                         {{ $p->r_name }}
                                    </td>
                                    <td>
                                        
                                        <a href = "#" class="pull-right btn btn-primary btn-sm"> <i class="fa fa-tag" aria-hidden="true"></i> </a>


                      <button type="submit" value="{{ $p->pe_id }}" name="idhapus" class="btn btn-danger btn-sm " 
                      data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Anda akan menghapus data ini?')">
                     <i class="fa fa-trash" aria-hidden="true"></i></button> 
                                    </td>
                                    </tr>
                                  @endforeach  
                                </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        </div>

                        </div>    
                        
                </div>             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
  </form>

<div class="modal fade" id="addpesangger">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Add Pesanger</h4>
<button type="button" class="close" data-dismiss="modal"  aria-label="Close">
<span aria-hidden="true">&times;</span></button>

</div>
    <div class="modal-body">
    <!-- <form action="{{ route('carrequest.addnewpessangertmp') }}" method="post" enctype="multipart/form-data"> @csrf -->
      <form action="{{ route('carrequest.addnewpessangertmp') }}" method="post" enctype="multipart/form-data"> @csrf 

                     <input type = "hidden" id ="dateok" name = "dateok">
                     
                     <input type = "hidden" id ="goingtook" name = "goingtook">

                     <input type = "hidden" id ="additionalok" name = "additionalok">

                    <div class="form-group">
                        <label for="exampleInputRounded0">Name <code>*</code>
                        </label>
                        <input type="text" autocomplete="off"  name="pesname" class="form-control rounded-0" id="exampleInputRounded0" placeholder="" required>
                    </div>
                    <label for="exampleInputRounded0">Reason <code>*</code>
                  </label>
                  <div class="form-group">

                    <select class="form-control select2" id="reason" name="reason" required>
                      
                      @foreach($reason as $index => $p)
                        <option value = "{{ $p->r_id }}">{{ $p->r_name }}</option>
                      @endforeach    
                      
                      </select>
                </div>   
                                              
    </div>
<div class="modal-footer">
<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
<button type="submit" id = "simpantmp" class="btn btn-primary">Save changes</button>
</div>
</div>
</form>  
</div>

</div>


<script>

$(document).ready(function() {

  $('#addpess').on('click', function() {
    $('#dateok').val($('#datetimes').val());
    $('#goingtook').val($('#goingto').val());
    $('#additionalok').val($('#aditional').val());
   });
  
  });
</script>



  
  @include('footer')