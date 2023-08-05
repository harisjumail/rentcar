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

                                        <div>
                                        <button type="button" id ="cekavaliablity" value = "cekavl" class="btn btn-primary">cek car avaliabilty</button>
                                       
                                         
                                      
                                      </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Car</label>
                                              <select class="form-control select2" id="caravbl" name="caravbl" required>
                                             
                                                        </select>
                                              </select>         
                                        </div>

                              
                                        </div>
                                  

                                        <div class="card-footer">
                                        <button type="submit" name ="proses" value = "proses" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                           
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




<script>

$(document).ready(function() {

  $('#addpess').on('click', function() {
    $('#dateok').val($('#datetimes').val());
    $('#goingtook').val($('#goingto').val());
    $('#additionalok').val($('#aditional').val());
   });
    $('#cekavaliablity').click(function() {
           var datetimes = $('#datetimes').val();
              $.ajax({
                      url: '{{ route("carrequest.caravaliablity") }}', 
                      type: 'GET',
                      dataType: 'json',
                       data: {
                          datetimes: datetimes 
                      },
                      success: function(data) {
                              $('#caravbl').empty();
                                  $.each(data, function(index, car) {
                                  $('#caravbl').append('<option value="' + car.c_id + '">' + car.car_id + '</option>');
                                  });
                              },
                      error: function() {
                                  alert('An error occurred while fetching car data.'); }
                            });
               });                           
  });
</script>



  
  @include('footer')