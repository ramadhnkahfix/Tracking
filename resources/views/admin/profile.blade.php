@extends('admin.layouts.master')

@section('content')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8"> 
                    <div class="panel">
                        <div class="panel-heading">
                          <h2 class="panel-title">Profile Account</h2>
                        </div>
                      <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{asset('assets/img/avatar5.png')}}"
                                            alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center"></h3>

                                    <p class="text text-primary text-center" data-toggle="modal" data-target="#profileModal">
                                      Edit Photo Profile
                                    </p>

                                    <!-- Modal -->
                                  <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Edit Photo</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <form action="#" method="post" enctype="multipart/form-data">
                                            @csrf
                                          <input type="file" name="avatar" id="avatar">
                                          
                                        </div>
                                        <div class="modal-footer">
                                          <input type="submit" value="Submit" class="btn btn-primary btn-sm">
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                             <b>Email</b> <a class="float-right"></a>
                                        </li>
                                         <li class="list-group-item">
                                             <a href="/changepw"><b>Change Password</b></a> 
                                        </li>
                                        <li class="list-group-item">
                                        <a href="/logout"><b>Logout</b></a>
                                         </li>
                                    </ul>

                                    <a href="/" class="btn btn-primary btn-block"><b>Kembali</b></a>
                                </div>
                                
                                <!-- /.card-body -->
                            </div>
                      </div>
                    </div>
        </div>
      </div>
    </div>
  </div>

@endsection