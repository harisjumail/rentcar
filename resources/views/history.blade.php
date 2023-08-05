@include('header')

@include('sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>My Request</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">View History</li>
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
              <h3 class="card-title">

            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <form name="formdel" action="" method="post">
                {{ csrf_field() }} <!-- sistem token hanya ada di Laravel keren cuk -->


                <table id="ex" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Req ID</th>
                      <th>Start Date / Time</th>
                      <th>End Date / Time</th>
                      <th>Car ID</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($requestt as $index => $p)

                    <tr>
                      <td>{{ $p->id  }} </td>                     
                      <td>{{ date('d-m-Y H:i', strtotime($p->start_date)) }}</td>
                      <td>{{ date('d-m-Y H:i', strtotime($p->end_date)) }}</td>
                      <td>{{ $p->name }}</td>
                      <td>
                         @if($p->status == '1')
                           <span class="badge bg-warning">Run</span>
                         @elseif($p->status == '2')
                           <span class="badge bg-info">Return</span>
                         @endif  
                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Req ID</th>
                      <th>Start Date / Time</th>
                      <th>End Date / Time</th>
                      <th>Car ID</th>
                      <th>Status</th>
                    </tr>

                    <tr>
                      <td colspan="8">
                        <small> {{ $requestt->links() }} </small>


                      </td>
                    </tr>

                  </tfoot>
                </table>

              </form>

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














<script type="text/javascript">
  $('#ex').on('click', '.ok', function() {

    var id = $(this).attr('data');

    $("#detail-data-edit").load("{{ url('') }}/carrequest/view/" + id + "");

    $("#modal_view").modal({
      backdrop: "static"
    });

    $("#modal_view").modal("show");

  });
</script>


@include('footer')