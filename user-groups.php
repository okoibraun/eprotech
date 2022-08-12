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
                        <h4 class="mb-sm-0">Suppliers</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">EPM</a></li>
                                <li class="breadcrumb-item active">Suppliers</li>
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
                                    <!-- <button class="btn btn-info add-btn" data-bs-toggle="modal" data-bs-target="#addCompanyModal"><i class="ri-add-fill me-1 align-bottom"></i> Add Company</button> -->
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="hstack text-nowrap gap-2">
                                        <!-- <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addmembers"><i class="ri-filter-2-line me-1 align-bottom"></i> Filters</button>
                                        <button class="btn btn-soft-success">Import</button>
                                        <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-soft-info"><i class="ri-more-2-fill"></i></button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                            <li><a class="dropdown-item" href="#">All</a></li>
                                            <li><a class="dropdown-item" href="#">Last Week</a></li>
                                            <li><a class="dropdown-item" href="#">Last Month</a></li>
                                            <li><a class="dropdown-item" href="#">Last Year</a></li>
                                        </ul> -->
                                        <button class="btn btn-info add-btn" data-bs-toggle="modal" data-bs-target="#addCompanyModal"><i class="ri-add-fill me-1 align-bottom"></i> Add Company</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-xxl-<?php if(isset($_GET['task']) && $_GET['task']=="comp_details") {echo "9"; } else { echo "12"; } ?>">
                    <div class="card" id="companyList">
                        <div class="card-header">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <div class="search-box">
                                        <input type="text" class="form-control search" placeholder="Search for company...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                                <div class="col-md-2 ms-auto">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="text-muted">Sort by: </span>
                                        <select class="form-control mb-0" data-choices data-choices-search-false id="choices-single-default">
                                            <option value="Company">Company</option>
                                            <option value="location">Location</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="table-responsive table-card mb-3 dataTables_wrapper">
                                    <table class="table align-middle table-nowrap mb-0" id="dataTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                    </div>
                                                </th>
                                                <th class="sort" data-sort="Company" scope="col">Company Name</th>
                                                <!-- <th class="sort" data-sort="industry_type" scope="col">Industry Type</th> -->
                                                <th class="sort" data-sort="location" scope="col">Location</th>
                                                <th class="sort" data-sort="email" scope="col">Email</th>
                                                <th class="sort" data-sort="phone" scope="col">Phone</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            <?php
                                                $suppliers = $crud->list_all($conn, "tbl_suppliers");
                                                foreach($suppliers as $supplier) {
                                            ?>
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                    </div>
                                                </th>
                                                <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ001</a></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <!-- <div class="flex-shrink-0">
                                                            <img src="assets/images/brands/dribbble.png" alt="" class="avatar-xxs rounded-circle image_src object-cover">
                                                        </div> -->
                                                        <div class="flex-grow-1 ms-2 name"><?php echo $supplier['comp_name']; ?></div>
                                                    </div>
                                                </td>
                                                <td class="industry_type"><?php echo $supplier['location']; ?></td>
                                                <td><span class="star_value"><?php echo $supplier['email']; ?></td>
                                                <td class="location"><?php echo $supplier['phone']; ?></td>
                                                <td>
                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="View">
                                                            <a href="?task=comp_details&comp_id=<?php echo $supplier['id']; ?>" class="view-item-btn"><i class="ri-eye-fill align-bottom text-muted"></i></a>
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
                                    <div class="noresult" style="display: none">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                            <p class="text-muted mb-0">We've searched more than 150+ companies We did not find any companies for you search.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <div class="pagination-wrap hstack gap-2">
                                        <a class="page-item pagination-prev disabled" href="#">
                                            Previous
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="#">
                                            Next
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Begin Edit Company Modal -->
                            <div class="modal fade" id="editCompanyModal" tabindex="-1" aria-labelledby="Add Company" aria-hidden="true">
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
                            <div class="modal fade" id="addCompanyModal" tabindex="-1" aria-labelledby="Add Company" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content border-0">
                                        <div class="modal-header bg-soft-info p-3">
                                            <h5 class="modal-title" id="exampleModalLabel">Add New Company</h5>
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
                                                        <div>
                                                            <label for="companyname-field" class="form-label">Company Name</label>
                                                            <input type="text" id="companyname" name="comp_name" class="form-control" placeholder="Enter company name" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div>
                                                            <label for="address" class="form-label">Address</label>
                                                            <input type="text" id="address" name="address" class="form-control" placeholder="Company Address" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div>
                                                            <label for="address" class="form-label">Location</label>
                                                            <input type="text" id="location" name="location" class="form-control" placeholder="Location" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div>
                                                            <label for="phone" class="form-label">Phone</label>
                                                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone Number" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div>
                                                            <label for="emailAdd" class="form-label">Email Address</label>
                                                            <input type="text" id="owner-field" name="email" class="form-control" placeholder="Email Address" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div>
                                                            <label for="website" class="form-label">Website</label>
                                                            <input type="text" id="website" name="website" class="form-control" placeholder="Company Website" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div>
                                                            <label for="cat" class="form-label">Category</label>
                                                            <input type="text" id="cat_id" name="cat_id" class="form-control" placeholder="Enter Category" required />
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
                                                    <button type="submit" class="btn btn-success" name="addCompBtn" id="add-btn">Add Company</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--end add modal-->
                            <!-- Begin Delete Company Modal -->
                            <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                        </div>
                                        <div class="modal-body p-5 text-center">
                                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                                            <div class="mt-4 text-center">
                                                <h4 class="fs-semibold">You are about to delete a company ?</h4>
                                                <p class="text-muted fs-14 mb-4 pt-1">Deleting your company will remove all of your information from our database.</p>
                                                <div class="hstack gap-2 justify-content-center remove">
                                                    <button class="btn btn-link link-success fw-medium text-decoration-none" data-bs-dismiss="modal">
                                                        <i class="ri-close-line me-1 align-middle"></i> Close
                                                    </button>
                                                    <button class="btn btn-danger" id="delete-record">Yes, Delete It!!</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end delete modal -->

                        </div>
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                <?php if(isset($_GET['task']) && isset($_GET['comp_id']) && $_GET['task']=="comp_details") { ?>
                <div class="col-xxl-3">
                    <div class="card" id="company-view-detail">
                        <div class="card-body text-center">
                            <div class="position-relative d-inline-block">
                                <div class="avatar-md">
                                    <div class="avatar-title bg-light rounded-circle">
                                        <img src="assets/images/brands/mail_chimp.png" alt="" class="avatar-sm rounded-circle object-cover">
                                    </div>
                                </div>
                            </div>
                            <h5 class="mt-3 mb-1"><?php echo $company['comp_name']; ?></h5>
                            <p class="text-muted"><?php echo $company['cat_id']; ?></p>

                            <ul class="list-inline mb-0">
                                <li class="list-inline-item avatar-xs">
                                    <a href="javascript:void(0);" class="avatar-title bg-soft-success text-success fs-15 rounded">
                                        <i class="ri-global-line"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item avatar-xs">
                                    <a href="javascript:void(0);" class="avatar-title bg-soft-danger text-danger fs-15 rounded">
                                        <i class="ri-mail-line"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item avatar-xs">
                                    <a href="javascript:void(0);" class="avatar-title bg-soft-warning text-warning fs-15 rounded">
                                        <i class="ri-question-answer-line"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h6 class="text-muted text-uppercase fw-semibold mb-3">Information</h6>
                            <p class="text-muted mb-4"><?php echo $company['specialization']; ?></p>
                            <div class="table-responsive table-card">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="fw-medium" scope="row">Industry Type</td>
                                            <td><?php echo $company['cat_id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium" scope="row">Location</td>
                                            <td><?php echo $company['location']; ?></td>
                                        </tr>
                                       
                                        <tr>
                                            <td class="fw-medium" scope="row">Phone</td>
                                            <td><?php echo $company['phone']; ?></td></td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium" scope="row">Website</td>
                                            <td>
                                                <a href="javascript:void(0);" class="link-primary text-decoration-underline"><?php echo $company['website']; ?></td></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium" scope="row">Contact Email</td>
                                            <td><?php echo $company['email']; ?></td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--end card-->
                </div>
                <?php } ?>
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