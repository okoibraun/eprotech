<?php
include("app.php");
$crud->logged_in_not($_SESSION['login_status'], "login.php");
?>
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
                    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
                        <div class="chat-leftsidebar">
                            <div class="px-4 pt-4 mb-4">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <h5 class="mb-4">Chats</h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="bottom" title="Add Contact">

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-soft-success btn-sm">
                                                <i class="ri-add-line align-bottom"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- .p-4 -->

                            <div class="chat-room-list" data-simplebar>

                                <div class="d-flex align-items-center px-4 mb-2">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0 fs-11 text-muted text-uppercase">Direct Messages</h4>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="bottom" title="New Message">

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-soft-success btn-sm">
                                                <i class="ri-add-line align-bottom"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="chat-message-list">

                                    <ul class="list-unstyled chat-list chat-user-list" id="userList">
                                        <?php $get_online_users = $crud->get($conn, "SELECT * FROM tbl_users WHERE id != {$_SESSION['id']}"); foreach($get_online_users as $online_user) {?>
                                        <li class="<?php echo ((isset($_GET['a']) && $_GET['a'] == "convo") && $_GET['msg'] == $online_user['id']) ? "active" : ""; ?>">
                                            <a href="?a=convo&msg=<?php echo $online_user['id']; ?>">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                        <div class="avatar-xxs">
                                                            <img src="assets/images/users/<?php echo $online_user['avatar']; ?>" class="rounded-circle img-fluid userprofile" alt="">
                                                        </div>
                                                        <span class="<?php echo ($online_user['online'] == 1) ? "user-status": ""; ?>"></span>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-truncate mb-0"><?php echo "{$online_user['first_name']} {$online_user['last_name']}"; ?></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!-- end chat leftsidebar -->
                        <!-- Start User chat -->
                        <?php
                            if(isset($_GET['a']) && $_GET['a'] == "convo") {
                                $get_chat_user = $crud->get($conn, "SELECT * FROM tbl_users WHERE id={$_GET['msg']}");
                                $chat_user = $get_chat_user->fetch_assoc();
                        ?>
                        <div class="user-chat w-100 overflow-hidden">

                            <div class="chat-content d-lg-flex">
                                <!-- start chat conversation section -->
                                <div class="w-100 overflow-hidden position-relative">
                                    <!-- conversation user -->
                                    <div class="position-relative">
                                        <div class="p-3 user-chat-topbar">
                                            <div class="row align-items-center">
                                                <div class="col-sm-4 col-8">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 d-block d-lg-none me-3">
                                                            <a href="javascript: void(0);" class="user-chat-remove fs-18 p-1"><i class="ri-arrow-left-s-line align-bottom"></i></a>
                                                        </div>
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 chat-user-img online user-own-img align-self-center me-3 ms-0">
                                                                    <img src="assets/images/users/<?php echo $chat_user['avatar']; ?>" class="rounded-circle avatar-xs" alt="">
                                                                    <span class="<?php echo ($chat_user['online'] == 1) ? "user-status": ""; ?>"></span>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <h5 class="text-truncate mb-0 fs-16">
                                                                        <a class="text-reset username" data-bs-toggle="offcanvas" href="#userProfileCanvasExample" aria-controls="userProfileCanvasExample">
                                                                            <?php echo "{$chat_user['first_name']} {$chat_user['last_name']}"; ?>
                                                                        </a>
                                                                    </h5>
                                                                    <p class="text-truncate text-muted fs-14 mb-0 userStatus"><small><?php echo ($chat_user['online'] == 1) ? "Online": "Offline"; ?></small></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8 col-4">
                                                </div>
                                            </div>

                                        </div>
                                        <!-- end chat user head -->

                                        <div class="position-relative" id="users-chat">
                                            <div class="chat-conversation p-3 p-lg-4 " id="chat-conversation" data-simplebar>
                                                <ul class="list-unstyled chat-conversation-list" id="users-conversation">
                                                    <li class="chat-list left">
                                                        <div class="conversation-list">
                                                            <div class="chat-avatar">
                                                                <img src="assets/images/users/avatar-2.jpg" alt="">
                                                            </div>
                                                            <div class="user-chat-content">
                                                                <div class="ctext-wrap">
                                                                    <div class="ctext-wrap-content">
                                                                        <p class="mb-0 ctext-content">Good morning 😊</p>
                                                                    </div>
                                                                    <div class="dropdown align-self-start message-box-drop">
                                                                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="ri-more-2-fill"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item reply-message" href="#"><i class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                                            <a class="dropdown-item" href="#"><i class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                                            <a class="dropdown-item delete-item" href="#"><i class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="conversation-name">
                                                                    <small class="text-muted time">09:07 am</small>
                                                                    <span class="text-success check-message-icon">
                                                                        <i class="ri-check-double-line align-bottom"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- chat-list -->

                                                    <li class="chat-list right">
                                                        <div class="conversation-list">
                                                            <div class="user-chat-content">
                                                                <div class="ctext-wrap">
                                                                    <div class="ctext-wrap-content">
                                                                        <p class="mb-0 ctext-content">Good morning, How are you? What about our next meeting?</p>
                                                                    </div>
                                                                    <div class="dropdown align-self-start message-box-drop">
                                                                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="ri-more-2-fill"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item reply-message" href="#"><i class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                                            <a class="dropdown-item" href="#"><i class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                                            <a class="dropdown-item delete-item" href="#"><i class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="conversation-name"><small class="text-muted time">09:08 am</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span></div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- chat-list -->

                                                    <li class="chat-list left">
                                                        <div class="conversation-list">
                                                            <div class="chat-avatar">
                                                                <img src="assets/images/users/avatar-2.jpg" alt="">
                                                            </div>
                                                            <div class="user-chat-content">
                                                                <div class="ctext-wrap">
                                                                    <div class="ctext-wrap-content">
                                                                        <p class="mb-0 ctext-content">Yeah everything is fine. Our next meeting tomorrow at 10.00 AM</p>
                                                                    </div>
                                                                    <div class="dropdown align-self-start message-box-drop">
                                                                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="ri-more-2-fill"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item reply-message" href="#"><i class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                                            <a class="dropdown-item" href="#"><i class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                                            <a class="dropdown-item copy-message" href="#"><i class="ri-file-copy-line me-2 text-muted align-bottom"></i>Copy</a>
                                                                            <a class="dropdown-item" href="#"><i class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                            <a class="dropdown-item delete-item" href="#"><i class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="ctext-wrap">
                                                                    <div class="ctext-wrap-content">
                                                                        <p class="mb-0 ctext-content">Hey, I'm going to meet a friend of mine at the department store. I have to buy some presents for my parents 🎁.</p>
                                                                    </div>
                                                                    <div class="dropdown align-self-start message-box-drop">
                                                                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="ri-more-2-fill"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item reply-message" href="#"><i class="ri-reply-line me-2 text-muted align-bottom"></i>Reply</a>
                                                                            <a class="dropdown-item" href="#"><i class="ri-share-line me-2 text-muted align-bottom"></i>Forward</a>
                                                                            <a class="dropdown-item copy-message" href="#"><i class="ri-file-copy-line me-2 text-muted align-bottom"></i>Copy</a>
                                                                            <a class="dropdown-item" href="#"><i class="ri-bookmark-line me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                            <a class="dropdown-item delete-item" href="#"><i class="ri-delete-bin-5-line me-2 text-muted align-bottom"></i>Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="conversation-name"><small class="text-muted time">09:10 am</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span></div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- chat-list -->
                                                </ul>
                                                <!-- end chat-conversation-list -->

                                            </div>
                                            <div class="alert alert-warning alert-dismissible copyclipboard-alert px-4 fade show " id="copyClipBoard" role="alert">
                                                Message copied
                                            </div>
                                        </div>

                                        <!-- end chat-conversation -->

                                        <div class="chat-input-section p-3 p-lg-4">

                                            <form id="chatinput-form" enctype="multipart/form-data">
                                                <div class="row g-0 align-items-center">
                                                    <div class="col-auto">
                                                        <div class="chat-input-links me-2">
                                                            <div class="links-list-item">
                                                                <button type="button" class="btn btn-link text-decoration-none emoji-btn" id="emoji-btn">
                                                                    <i class="bx bx-smile align-middle"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="chat-input-feedback">
                                                            Please Enter a Message
                                                        </div>
                                                        <input type="text" class="form-control chat-input bg-light border-light" id="chat-input" placeholder="Type your message..." autocomplete="off">
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="chat-input-links ms-2">
                                                            <div class="links-list-item">
                                                                <button type="submit" class="btn btn-success chat-send waves-effect waves-light">
                                                                    <i class="ri-send-plane-2-fill align-bottom"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>

                                        <div class="replyCard">
                                            <div class="card mb-0">
                                                <div class="card-body py-3">
                                                    <div class="replymessage-block mb-0 d-flex align-items-start">
                                                        <div class="flex-grow-1">
                                                            <h5 class="conversation-name"></h5>
                                                            <p class="mb-0"></p>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <button type="button" id="close_toggle" class="btn btn-sm btn-link mt-n2 me-n3 fs-18">
                                                                <i class="bx bx-x align-middle"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } else {?>
                        <div class="user-chat w-100 overflow-hidden">

                            <div class="chat-content d-lg-flex">
                                <!-- start chat conversation section -->
                                <div class="w-100 overflow-hidden position-relative">
                                    <!-- conversation user -->
                                    <div class="position-relative">

                                        <div class="position-relative" id="users-chat">
                                            <div class="chat-conversation p-3 p-lg-4 " id="chat-conversation" data-simplebar>
                                                Please select a user to start conversation with the user
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- end chat-wrapper -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php include("includes/footer.phtml"); ?>
            <!-- end main content-->
        </div>
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