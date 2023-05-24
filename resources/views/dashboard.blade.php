<x-app-layout>
    @include('partials.nav_left')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Dossiers</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Dossier</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_salary"><i
                                class="fa fa-plus"></i> Nouveau Dossier</a>
                    </div>
                </div>
            </div>


            <div class="row filter-row">
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating">
                        <label class="focus-label">Employee Name</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <div class="form-group custom-select">
                        <select class="select floating">
                            <option value="">Select Role</option>
                            <option value="">Employee</option>
                            <option value="1">Manager</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <div class="form-group custom-select">
                        <select class="select floating">
                            <option>Leave Status</option>
                            <option> Pending </option>
                            <option> Approved </option>
                            <option> Rejected </option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text">
                        </div>
                        <label class="focus-label">From</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input class="form-control floating datetimepicker" type="text">
                        </div>
                        <label class="focus-label">To</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <a href="#" class="btn btn-success w-100"> Search </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Plaque</th>
                                    <th>Email</th>
                                    <th>Join Date</th>
                                    <th>Role</th>
                                    <th>Salary</th>
                                    <th>Payslip</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile" class="avatar"><img
                                                    src="assets/img/profiles/avatar-01.jpg" alt=""></a>
                                            <a href="profile">Lesley Grauer <span>Team Leader</span></a>
                                        </h2>
                                    </td>
                                    <td>FT-0008</td>
                                    <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="dbb7bea8b7bea2bca9baaebea99bbea3bab6abb7bef5b8b4b6">[email&#160;protected]</a>
                                    </td>
                                    <td>1 Jun 2015</td>
                                   
                                    <td>$75500</td>
                                    <td><a class="btn btn-sm btn-primary" href="salary_view">Generate Slip</a></td>
                                    <td class="text-end">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i>
                                                    Edit</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile" class="avatar"><img
                                                    src="assets/img/profiles/avatar-16.jpg" alt=""></a>
                                            <a href="profile">Jeffery Lalor <span>Team Leader</span></a>
                                        </h2>
                                    </td>
                                    <td>FT-0009</td>
                                    <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="1d77787b7b786f64717c71726f5d78657c706d7178337e7270">[email&#160;protected]</a>
                                    </td>
                                    <td>1 Jan 2013</td>
                                   
                                    <td>$73550</td>
                                    <td><a class="btn btn-sm btn-primary" href="salary_view">Generate Slip</a></td>
                                    <td class="text-end">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i>
                                                    Edit</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile" class="avatar"><img
                                                    src="assets/img/profiles/avatar-04.jpg" alt=""></a>
                                            <a href="profile">Loren Gatlin <span>Android Developer</span></a>
                                        </h2>
                                    </td>
                                    <td>FT-0010</td>
                                    <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="8de1e2ffe8e3eaecf9e1e4e3cde8f5ece0fde1e8a3eee2e0">[email&#160;protected]</a>
                                    </td>
                                    <td>1 Jan 2013</td>
                                   
                                    <td>$55000</td>
                                    <td><a class="btn btn-sm btn-primary" href="salary_view">Generate Slip</a></td>
                                    <td class="text-end">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i>
                                                    Edit</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile" class="avatar"><img
                                                    src="assets/img/profiles/avatar-03.jpg" alt=""></a>
                                            <a href="profile">Tarah Shropshire <span>Android Developer</span></a>
                                        </h2>
                                    </td>
                                    <td>FT-0011</td>
                                    <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="9aeefbe8fbf2e9f2e8f5eae9f2f3e8ffdaffe2fbf7eaf6ffb4f9f5f7">[email&#160;protected]</a>
                                    </td>
                                    <td>1 Jan 2013</td>
                                   
                                    <td>$92400</td>
                                    <td><a class="btn btn-sm btn-primary" href="salary_view">Generate Slip</a></td>
                                    <td class="text-end">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i>
                                                    Edit</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div id="add_salary" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Staff Salary</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Select Staff</label>
                                        <select class="select">
                                            <option>John Doe</option>
                                            <option>Richard Miles</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Net Salary</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="text-primary">Earnings</h4>
                                    <div class="form-group">
                                        <label>Basic</label>
                                        <input class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>DA(40%)</label>
                                        <input class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>HRA(15%)</label>
                                        <input class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Conveyance</label>
                                        <input class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Allowance</label>
                                        <input class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Medical Allowance</label>
                                        <input class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Others</label>
                                        <input class="form-control" type="text">
                                    </div>
                                    <div class="add-more">
                                        <a href="#"><i class="fa fa-plus-circle"></i> Add More</a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="text-primary">Deductions</h4>
                                    <div class="form-group">
                                        <label>TDS</label>
                                        <input class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>ESI</label>
                                        <input class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>PF</label>
                                        <input class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Leave</label>
                                        <input class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Prof. Tax</label>
                                        <input class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Labour Welfare</label>
                                        <input class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Others</label>
                                        <input class="form-control" type="text">
                                    </div>
                                    <div class="add-more">
                                        <a href="#"><i class="fa fa-plus-circle"></i> Add More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div id="edit_salary" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Staff Salary</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Select Staff</label>
                                        <select class="select">
                                            <option>John Doe</option>
                                            <option>Richard Miles</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Net Salary</label>
                                    <input class="form-control" type="text" value="$4000">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="text-primary">Earnings</h4>
                                    <div class="form-group">
                                        <label>Basic</label>
                                        <input class="form-control" type="text" value="$6500">
                                    </div>
                                    <div class="form-group">
                                        <label>DA(40%)</label>
                                        <input class="form-control" type="text" value="$2000">
                                    </div>
                                    <div class="form-group">
                                        <label>HRA(15%)</label>
                                        <input class="form-control" type="text" value="$700">
                                    </div>
                                    <div class="form-group">
                                        <label>Conveyance</label>
                                        <input class="form-control" type="text" value="$70">
                                    </div>
                                    <div class="form-group">
                                        <label>Allowance</label>
                                        <input class="form-control" type="text" value="$30">
                                    </div>
                                    <div class="form-group">
                                        <label>Medical Allowance</label>
                                        <input class="form-control" type="text" value="$20">
                                    </div>
                                    <div class="form-group">
                                        <label>Others</label>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="text-primary">Deductions</h4>
                                    <div class="form-group">
                                        <label>TDS</label>
                                        <input class="form-control" type="text" value="$300">
                                    </div>
                                    <div class="form-group">
                                        <label>ESI</label>
                                        <input class="form-control" type="text" value="$20">
                                    </div>
                                    <div class="form-group">
                                        <label>PF</label>
                                        <input class="form-control" type="text" value="$20">
                                    </div>
                                    <div class="form-group">
                                        <label>Leave</label>
                                        <input class="form-control" type="text" value="$250">
                                    </div>
                                    <div class="form-group">
                                        <label>Prof. Tax</label>
                                        <input class="form-control" type="text" value="$110">
                                    </div>
                                    <div class="form-group">
                                        <label>Labour Welfare</label>
                                        <input class="form-control" type="text" value="$10">
                                    </div>
                                    <div class="form-group">
                                        <label>Fund</label>
                                        <input class="form-control" type="text" value="$40">
                                    </div>
                                    <div class="form-group">
                                        <label>Others</label>
                                        <input class="form-control" type="text" value="$15">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal custom-modal fade" id="delete_salary" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Salary</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-bs-dismiss="modal"
                                        class="btn btn-primary cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>

</x-app-layout>
