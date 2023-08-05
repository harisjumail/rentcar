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
            <li class="breadcrumb-item active">Return Car</li>
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
          <div class="card">
            <div class="card card-primary">
            <form name = "main" action = "{{ route('carrequest.main') }}" method ="post" >    
            @csrf 
                <div class="row">
                    <div class="col-md-6">
                             <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Return Form</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form>
                                        <div class="card-body">
                                        <div class="form-group">
                                            <label>Car ID:</label>
                                            <div class="input-group">
                                            <div class="input-group-addon">
                                            </div>
                                            <input type="text" name="carid"  
                                            value = "" id="carid" 
                                            class="form-control" autocomplete="off" required/>                                              
                                            </div>
                                          </div>
                                          <button type="button" id ="cecarid" value = "cecarid" class="btn btn-primary">Ceck car</button>

                     
                                      </div>                                
                                        </div>   

                                      <div class="container" id ="payment">
                 
                                        </div>

                                        <div class="card-footer">
                                        <button type="button" id="proses" name ="proses" value = "proses" class="btn btn-primary">Submit</button>
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
    $('#cecarid').click(function() {
            var carid = $('#carid').val();
              $.ajax({
                      url: '{{ route("carrequest.ceckpayment") }}', 
                      type: 'GET',
                      dataType: 'json',
                       data: {
                          carid: carid 
                      },

                      success: function(response) {
                                if (response.carid !== undefined) {
                                $('#payment').append('<div class="confirmation"><h2>Payment Confirmed</h2></div><div class="message"><p>Car ID : <input type="text" name="carid"  value = "'+ response.carid +'" id="carid" /><p>Transaction ID: <input type="text" name="carid"  value = "'+ response.transid +'" id="transid" /> <p>Total Amount: Rp.<input type="text" name="carid"  value = "'+ response.total +'" id="transid" /></p></div>');
                                } 
                            },
                       error: function() {
                                  alert('An error occurred while fetching car data.');}
                });
       });  
       
       
    $('#proses').click(function() {
            var transid = $('#transid').val();
            var carid = $('#carid').val();
              $.ajax({
                      url: '{{ route("carrequest.prosespayment") }}', 
                      type: 'GET',
                      dataType: 'json',
                       data: {
                          transid: transid,
                          carid: carid
                      },

                      success: function(response) {
                                alert('Success.');   
                            },
                       error: function() {
                     alert('An error occurred while fetching car data.');
                    }
                });
       });

  });


  
</script>



  
  @include('footer')