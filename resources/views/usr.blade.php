@include('header') 

@include('sidebar') 


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Management</li>
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

               <div class ="col-12">    
                      <form action="{{ route('usr.search') }}" method="GET">
                        {{ csrf_field() }} <!-- sistem token hanya ada di Laravel keren cuk -->  
                        <div class="col-12">
                              <div class="input-group">
                                      <input type="text" name="cari" id="cari" class="form-control" placeholder="Search User" 
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

              <form name="formdel" action="{{ route('usr.bulk')}}" method="post"> 
                {{ csrf_field() }} <!-- sistem token hanya ada di Laravel keren cuk -->  
                <div class="info-box-content">
     
                <button type="submit"  name="bulkbutton" value="approve" class="btn btn-primary btn-sm " 
                data-toggle="tooltip" data-original-title="Approve" onclick="return confirm('Anda akan mengaktifkan user ini?')">
                <i class="fa fa-check" aria-hidden="true"></i></button> 

                <button type="submit"  name="bulkbutton" value="cancel" class="btn btn-info btn-sm " 
                data-toggle="tooltip" data-original-title="Batal" onclick="return confirm('Anda akan menonaktifkan user ini?')">
                <i class="fa fa-times" aria-hidden="true"></i></button> 

                <button type="submit"  name="bulkbutton" value="delete" class="btn btn-danger btn-sm " 
                data-toggle="tooltip" data-original-title="Hapus" onclick="return confirm('Anda akan menghapus user ini?')">
                <i class="fa fa-trash" aria-hidden="true"></i></button> 

              </div>


                <table id="ex" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                     <th>Approval1</th>
                     <th>Approval2</th>
                    <th>Branch</th>
                    <th>Company</th>
                    
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($usr as $index => $p)
                  <tr>
                    <td><input type="checkbox" id="basic_checkbox_{{ $p->id }}" name="pick[]" class="filled-in" 
                        value="{{ $p->id }}"/></td>
                    <td>{{ $p->name  }}</td>
                    <td>{{ $p->email }}</td>
                    <td>
                      @if($p->role == 'user') 
                    
                      @else
                      Approval 
                      @endif

                      {{ $p->role }}
                    
                    </td>
                    <td>
                      <!-- <input name = "okok" value=""> -->
                    <select class="form-control app1"  name ="{{$p->id}}">
                        <option value ="">-</option>
                 
                        @foreach($app1 as $index => $xx)
                        <option value = "{{ $xx->id }}"
                         @if($p->approval1 == $xx->id)
                            selected
                            @endif                       
                        > {{ $xx->name }}- {{ $xx->branch_name }} - {{ $xx->company_name }} </option>
                        @endforeach

                    </select>
                    
                    </td>

                    <td>

                    <select class="form-control app2" name ="{{$p->id}}">
                        <option value ="">-</option>
                        @foreach($app2 as $index => $xx)
                        <option value = " {{  $xx->id }} "
                         @if($p->approval2 == $xx->id)
                            selected
                            @endif 
                        > {{ $xx->name }}- {{ $xx->branch_name }} - {{ $xx->company_name }} </option>
                        @endforeach
                    </select>

                    </td>

                    <td>{{ $p->branch_name }}</td>
                    <td>
                      {{ $p->company_name }}  
                        @if($p->user_status == '0')  
                            <span class="badge bg-danger">Non Aktif</span>
                        @elseif($p->user_status == '1')  
                            <span class="badge bg-info">Aktif</span>                            
                        @endif
                          </td>
             
                  </tr>
                  @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                     <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Approval1</th>
                    <th>Approval2</th>
                    <th>Branch</th>
                    <th>Company</th>
                  
                  </tr>

                  <tr>
                    <td colspan = "8">
                    <small> {{ $usr->links() }} </small>
    
                    
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
</form>
  <!-- Tooaster Start -->

    <script>
      @if (Session::has('pesan'))
            toastr.{{session::get('alert')}}("{{Session::get('message')}}");
     @endif
     </script>

     <script>
     $('.app1').on('change', function() {
        var id = this.name;
        var val =$(this).val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        //Call ajax
          $.ajax({
            url: "{{ route('usr.approval1') }}",
            type:"POST",
            data:{id:id,val:val,"_token": "{{ csrf_token() }}",
            },
        });
      });
    </script>

     <script>
     $('.app2').on('change', function() {
        var id = this.name;
        var val =$(this).val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        //Call ajax
          $.ajax({
            url: "{{ route('usr.approval2') }}",
            type:"POST",
            data:{id:id,val:val,"_token": "{{ csrf_token() }}",
            },
        });
      });
    </script>    

  <!-- Toaster End-->
  @include('footer') 


