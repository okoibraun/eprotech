<?php include("app.php"); ?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>
    <?php include("includes/head.phtml"); ?>
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

    <header id="page-topbar">
        <div class="layout-width">
            <?php include("includes/nav.phtml"); ?>
        </div>
    </header>
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <?php include("includes/logo.phtml"); ?>
            <div id="scrollbar">
                <?php include("includes/sidebar.phtml"); ?>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Users</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">EPM</a></li>
                                <li class="breadcrumb-item active">Users</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <div class="flex-grow-1">
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="hstack text-nowrap gap-2">
                                        <button class="btn btn-info add-btn" data-bs-toggle="modal" data-bs-target="#addUserModal"><i class="ri-add-fill me-1 align-bottom"></i> Add New User</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-xxl-12">
                    <div class="card" id="companyList">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="table-responsive table-card mb-3 dataTables_wrapper">
                                    <table class="table align-middle table-nowrap mb-0" id="dataTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" style="width: 50px;">#</th>
                                                <th class="sort" data-sort="Company" scope="col">Username</th>
                                                <th class="sort" data-sort="location" scope="col">User Group</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            <?php
                                                $sn=0;
                                                $users = $crud->list_all($conn, "tbl_users");
                                                foreach($users as $user) {
                                                    $sn++;
                                            ?>
                                            <tr>
                                                <td class="id" style=""><?php echo $sn; ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img src="assets/images/brands/dribbble.png" alt="" class="avatar-xxs rounded-circle image_src object-cover">
                                                        </div>
                                                        <div class="flex-grow-1 ms-2 name"><?php echo  $user['first_name']; ?> <?php echo $user['last_name']; ?></div>
                                                    </div>
                                                </td>
                                                <td class="industry_type"><?php echo $user['group_name']; ?></td>
                                                <td>
                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="View">
                                                            <a href="?task=user_details&user_id=<?php echo $user['id']; ?>" class="view-item-btn"><i class="ri-eye-fill align-bottom text-muted"></i></a>
                                                        </li>
                                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                            <a class="edit-item-btn" href="#editCompanyModal" data-bs-toggle="modal"><i class="ri-pencil-fill align-bottom text-muted"></i></a>
                                                        </li>
                                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Delete">
                                                            <a class="remove-item-btn" data-bs-toggle="modal" href="#deleteRecordModal">
                                                                <i class="ri-delete-bin-fill align-bottom text-muted"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Begin Edit Company Modal -->
                            <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="Add User" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content border-0">
                                        <div class="modal-header bg-soft-info p-3">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Company</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                        </div>
                                        <form action="">
                                            <div class="modal-body">
                                                <input type="hidden" id="id-field" />
                                                <div class="row g-3">
                                                    <div class="col-lg-12">
                                                        <div class="text-center">
                                                            <div class="position-relative d-inline-block">
                                                                <div class="position-absolute bottom-0 end-0">
                                                                    <label for="company-logo-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                                                        <div class="avatar-xs cursor-pointer">
                                                                            <div class="avatar-title bg-light border rounded-circle text-muted">
                                                                                <i class="ri-image-fill"></i>
                                                                            </div>
                                                                        </div>
                                                                    </label>
                                                                    <input class="form-control d-none" value="" id="company-logo-input" type="file" accept="image/png, image/gif, image/jpeg">
                                                                </div>
                                                                <div class="avatar-lg p-1">
                                                                    <div class="avatar-title bg-light rounded-circle">
                                                                        <img src="assets/images/users/multi-user.jpg" id="companylogo-img" class="avatar-md rounded-circle object-cover" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h5 class="fs-13 mt-3">Company Logo</h5>
                                                        </div>
                                                        <div>
                                                            <label for="companyname-field" class="form-label">Company Name</label>
                                                            <input type="text" id="companyname" name="comp_name" class="form-control" placeholder="Enter company name" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div>
                                                            <label for="address" class="form-label">Address</label>
                                                            <input type="text" id="address" name="address" class="form-control" placeholder="Company Address" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div>
                                                            <label for="phone" class="form-label">Phone</label>
                                                            <input type="text" id="phone" class="form-control" placeholder="Phone Number" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div>
                                                            <label for="emailAdd" class="form-label">Email Address</label>
                                                            <input type="text" id="owner-field" class="form-control" placeholder="Email Address" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div>
                                                            <label for="website" class="form-label">Website</label>
                                                            <input type="text" id="website" class="form-control" placeholder="Company Website" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div>
                                                            <label for="cat" class="form-label">Category</label>
                                                            <input type="text" id="cat_id" class="form-control" placeholder="Enter Category" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div>
                                                            <label for="specialization" class="form-label">Specialization</label>
                                                            <textarea name="specialization" id="specialization" cols="30" rows="10" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div>
                                                            <label for="products" class="form-label">Enter Products <small>separated by comma</small></label>
                                                            <textarea name="products" id="products" cols="30" rows="10" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success" id="add-btn">Add Company</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--end add modal-->
                            <!-- Begin Add Company Modal -->
                            <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="Add User" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content border-0">
                                        <div class="modal-header bg-soft-info p-3">
                                            <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                        </div>
                                        <form action="" method="POST">
                                            <div class="modal-body">
                                                <input type="hidden" id="id-field" />
                                                <div class="row g-3">
                                                    <div class="col-lg-12">
                                                        <div class="text-center">
                                                            <div class="position-relative d-inline-block">
                                                                <div class="position-absolute bottom-0 end-0">
                                                                    <label for="company-logo-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                                                        <div class="avatar-xs cursor-pointer">
                                                                            <div class="avatar-title bg-light border rounded-circle text-muted">
                                                                                <i class="ri-image-fill"></i>
                                                                            </div>
                                                                        </div>
                                                                    </label>
                                                                    <input class="form-control d-none" value="" id="company-logo-input" type="file" accept="image/png, image/gif, image/jpeg">
                                                                </div>
                                                                <div class="avatar-lg p-1">
                                                                    <div class="avatar-title bg-light rounded-circle">
                                                                        <img src="assets/images/users/multi-user.jpg" id="companylogo-img" class="avatar-md rounded-circle object-cover" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h5 class="fs-13 mt-3">Company Logo</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div>
                                                            <label for="firstname" class="form-label">First Name</label>
                                                            <input type="text" name="first_name" id="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div>
                                                            <label for="last_name" class="form-label">Surname</label>
                                                            <input type="text" name="last_name" id="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div>
                                                            <label for="Gender" class="form-label">Gender</label>
                                                            <select name="gender" id="gender" class="form-control">
                                                                <option value="">Select..</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Male">Male</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div>
                                                            <label for="dob" class="form-label">Date of Birth</label>
                                                            <input type="date" id="dob" name="dob" class="form-control" placeholder="mm/dd/yyyy" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div>
                                                            <label for="phone" class="form-label">Phone</label>
                                                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone Number" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div>
                                                            <label for="emailAdd" class="form-label">Email Address</label>
                                                            <input type="text" id="owner-field" name="email" class="form-control" placeholder="Email Address" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div>
                                                            <label for="password" class="form-label">Password</label>
                                                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter User Password" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div>
                                                            <label for="group_name" class="form-label">User Group</label>
                                                            <select name="group_name" id="" class="form-control">
                                                                <option value="">Select Group....</option>
                                                                <?php
                                                                    $user_groups = $crud->list_all($conn, "tbl_user_groups");
                                                                    foreach($user_groups as $group) {
                                                                ?>
                                                                <option value="<?php echo $group['group_name']; ?>"><?php echo $group['group_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success" name="addUserBtn" id="add-btn">Add User</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--end add modal-->

                        </div>
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    
    <?php include("includes/footer.phtml"); ?>
</div>
<!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info btn-rounded shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- Theme Settings -->
    <?php include("includes/theme_customizer.phtml"); ?>

    <?php include("includes/scripts.phtml"); ?>
</body>

</html>