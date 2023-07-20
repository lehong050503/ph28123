@extends('templates.appAdmin')
@section('css')
    <!-- third party css -->
    <link href="{{ asset('libs\datatables\dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('libs\datatables\responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('libs\datatables\buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('libs\datatables\select.bootstrap4.css') }}" rel="stylesheet" type="text/css">
    <!-- third party css end -->
@endsection
@section('content')


            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Green</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Account</a></li>
                                <li class="breadcrumb-item active">Users</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Datatables Users</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <div style="display: flex; justify-content:space-around;">
                                <div>
                                   <h4 class="header-title">Database Users</h4>
                                    <p class="text-muted font-13 mb-4">
                                        The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page
                                        that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                                    </p>  
                                </div>
                                <a href="{{ route('addUser') }}" class="btn btn-success  px-3 mb-0 h-50" style="background: #1ABC9C;" >Add</a>
                                  
                            </div>
                            

                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Credit Card No</th>
                                        <th>Role</th>

                                        <th>Action</th>
                                        
                                        <th>Full Name   :   </th>
                                        <th>Date Of Birth   :   </th>
                                        <th>Nationality   :   </th>
                                        <th>CCCD / Passport   :   </th>
                                        <th>Password   :   </th>
                                        
                                    </tr>
                                </thead>
                            
                            
                                <tbody>
                                    @php
                                        $stt = 1
                                    @endphp
                                    @foreach ($users as $user)
                                        
                                    <tr>
                                        <td>{{ $stt }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->credit_card_no }}</td>
                                        <td>{{ $user->role }}</td>

                                        <td>
                                            <a href="{{ route('deleteUser',['id'=>$user->id]) }}" onclick="return confirm('Are you sure ?');" class="btn btn-danger">Delete</a>
                                            <a href="{{ route('editUser',['id'=>$user->id]) }}" class="btn btn-info">Edit</a>
                                        </td>
                                        
                                        <td>{{ $user->full_name }}</td>
                                        <td>{{ $user->date_of_birth }}</td>
                                        <td>{{ $user->nationality }}</td>
                                        <td>{{ $user->cccd_passport }}</td>
                                        <td>{{ $user->password }}</td>
                                        
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
        
@endsection

@section('js')

    <!-- third party js -->
    <script src="{{ asset('libs\datatables\jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('libs\datatables\dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('libs\datatables\dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('libs\datatables\responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('libs\datatables\dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('libs\datatables\buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('libs\datatables\buttons.html5.min.js') }}"></script>
    <script src="{{ asset('libs\datatables\buttons.flash.min.js') }}"></script>
    <script src="{{ asset('libs\datatables\buttons.print.min.js') }}"></script>
    <script src="{{ asset('libs\datatables\dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('libs\datatables\dataTables.select.min.js') }}"></script>
    <script src="{{ asset('libs\pdfmake\pdfmake.min.js') }}"></script>
    <script src="{{ asset('libs\pdfmake\vfs_fonts.js') }}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{ asset('js\pages\datatables.init.js') }}"></script>

@endsection