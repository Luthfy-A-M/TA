<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Facilitators - Waiting</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('assets2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('assets2/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/LandingAdmin">
        <div class="sidebar-brand-icon">
          <i class="fa fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/LandingAdmin">
          <i class="fa fa-tachometer"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesEo" aria-expanded="true" aria-controls="collapsePagesEo">
          <i class="fas fa-fw fa-user"></i>
          <span>Facilitators</span>
        </a>
        <div id="collapsePagesEo" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-lightblue py-2 collapse-inner rounded">
          <a class="collapse-item" href="/Admin/Waitinglist">
              <i class="fas fa-fw fa-clock-o"></i>
              <span> Waiting List</span>
            </a>
            <a class="collapse-item" href="/Admin/Activelist">
              <i class="fas fa-fw fa-user-check"></i>
              <span> Activated</span>
            </a>
            <a class="collapse-item" href="/Admin/Nonactivelist">
              <i class="fas fa-fw fa-user-minus"></i>
              <span> Nonactivated</span>
            </a>            
            </div>
        </div>
      </li>

      <!-- Divider -->
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
               </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item"  data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Facilitator - Waiting</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-6">
              <table class="table table-hover table-responsive-lg" id="tEvent">
                <thead>
                  <tr class="text-dark">
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    <!-- <th scope="col" class="detailTableEvent text-center d-none">Detail</th> -->
                  </tr>
                </thead>
                <tbody>
                  @if($users->isEmpty() == false)
                    @foreach($users as $index => $user)
                    <tr data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-role="{{ $user->role }}" data-status="{{ $user->status }}"  >
                      <th scope="row">{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</th>
                      <td>{{ $user->name }}</td>
                      <td><p class="badge badge-warning">{{ $user->status }}</p></td>
                      <td>
                        <div class="row">
                          <div class="col-2 mx-1 my-1"> 
                            <button type="button" class="btn btn-secondary py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Configure Event">
                              <span class="fa fa-cogs">
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item confirmEO" href="{{ url('/Admin/'. $user -> id . '/activate')}}">Activate Facilitator</a>
                              <a class="dropdown-item rejectEO" href="{{ url('/Admin/'. $user -> id . '/deactivate')}}">Reject Facilitator</a>                              
                              </form>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
              {{ $users->links() }}
            </div>
            <div class="col-lg-6">
              <!-- Content Row -->
              @if($users->isEmpty() == false)
              <div class="container">
                <div class="row justify-content-center" id="cardEventShow">
                  <div class="card-lg shadow mb-4" style="width: 30rem;">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary d-inline-block" id="d_name_eo">
                        {{ $user->name }}
                      </h6>
                      <div class="clear-fix"></div>
                    </div>
                    <div class="card-body">
                      <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-1 mb-2" id="d_identity_card" style="width: 25rem;" src="" alt="">
                      </div>
                      <div class="row">
                        <div class="col-md-5">
                          <label for="" id="">Email</label>
                        </div>
                        <div class="col-md-7">
                          <p id="d_phone_number_eo">: {{ $user->email }}</p>
                        </div>
                      </div>                      
                      <div class="row">
                        <div class="col-md-5">
                          <label for="" id="">Status</label>
                        </div>
                        <div class="col-md-7" id="statusBadge">
                          :<p id="d_status" class="badge badge-warning"> {{ $user->status }}</p>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              @endif
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Luthfy Aqil Mahendra 2022</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are You Sure ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">??</span>
          </button>
        </div>
        <div class="modal-body">If you leave, your activity will be end.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>                                        
          <button class="btn btn-primary" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}                                    </a>   

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('assets2/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('assets2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('assets2/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('assets2/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/lib/moment.js') }}"></script>

  <script src="{{ asset('assets2/vendor/SweetAlert2/sweetalert2.js') }}"></script>

</body>

</html>

<script>
$(document).ready(function () {

  $('#tEvent tr').on('click', function (event){

    try{
      let name = $(this).attr('data-nam');
      let status = $(this).attr('data-status');
     
      let url = "{{ asset('assets3') }}"

      $('#cardEventShow').find('.card-header h6#d_name').text(name);     
      $('#cardEventShow').find('.card-body #d_status').text(": " + status);
      
      $('#cardEventShow').find('.card-body #statusBadge').empty();
      $('#cardEventShow').find('.card-body #statusBadge').append(':<p id="d_status" class="badge badge-warning">'+ status +'</p>');

      $('#cardEventShow').find('.card-body #d_identity_card').attr('src', url + "/identity_card/" +identity_card_eo);

    } catch(error){
      console.log(error);
    }
  
  });


  $('.confirmEO').on('click', function (e) {
    e.preventDefault();
    Swal.fire({
      title: 'Are You sure ?',
      text: "Acc this Facilitator ?.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Confirmed',
      cancelButtonText: 'Cancel'
    }).then((result) => {

      if (result.value) {
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: $(this).attr('href'),
            method: 'get',
            cache: false,

            success: function(response) {
              Swal.fire('Confirmed!', 'This Facilitator has been available.', 'success').then(function(){
                location.reload();
              });
            },

            error: function(xhr) {
              res = xhr.responseJSON;
              if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function(key, val) {
                  Swal.fire("Invalid!", val, "error");
                });
              }
            }
        });
      }
    });
  });

  $('.rejectEO').on('click', function (e) {
    e.preventDefault();
    Swal.fire({
      title: 'Are You sure ?',
      text: "Reject this Facilitator ?.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Rejected',
      cancelButtonText: 'Cancel'
    }).then((result) => {

      if (result.value) {
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: $(this).attr('href'),
            method: 'get',
            cache: false,

            success: function(response) {
              Swal.fire('Rejected!', 'This EO has been rejected.', 'success').then(function(){
                location.reload();
              });
            },

            error: function(xhr) {
              res = xhr.responseJSON;
              if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function(key, val) {
                  Swal.fire("Invalid!", val, "error");
                });
              }
            }
        });
      }
    });
  });

  $('.deleteEO').on('click', function (e) {
    e.preventDefault();

    Swal.fire({
      title: 'Are You sure ?',
      text: "Delete this EO ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Delete',
      cancelButtonText: 'Cancel'
    }).then((result) => {

      if (result.value) {
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: $(this).parents('form').attr('action'),
            method: 'delete',
            data: $(this).parents('form').serialize(),
            cache: false,

            success: function(response) {
              // console.log(response);
              Swal.fire('Deleted!', 'Your event has been deleted.', 'success').then(function(){
                location.reload();
              });
            },

            error: function(xhr) {
              res = xhr.responseJSON;
              if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function(key, val) {
                  Swal.fire("Invalid!", val, "error");
                });
              }
            }
        });
      }
    });
  });

});
</script>