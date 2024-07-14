<?php 
include "../../koneksi.php";

ini_set('display_errors', 'On');
error_reporting(E_ALL);
    session_start();

    $success = isset($_SESSION['success']) ? $_SESSION['success'] : "";
    unset($_SESSION['success']);

    $error = isset($_SESSION['error']) ? $_SESSION['error'] : "";
    unset($_SESSION['error']);

    $sql = "SELECT * FROM taneman       ";

    $result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="./assets/images/logos/favicon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <!-- Core Css -->
    <link rel="stylesheet" href="../css/output.css" />
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .no-scroll {
            overflow: hidden;
        }

        .disable-pointer-events {
            pointer-events: none;
        }
    </style>
    <title>dad TailwindCSS HTML Admin</title>
</head>

<body class="bg-surface">
    <main>
        <!--start the project-->
        <div id="main-wrapper" class=" flex p-5 xl:pr-0">
            <aside id="application-sidebar-brand"
                class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed xl:top-5 xl:left-auto top-0 left-0 with-vertical h-screen z-[999] shrink-0 w-[270px] shadow-md xl:rounded-md rounded-none bg-white left-sidebar transition-all duration-300 overflow-y-auto">
                <!-- ---------------------------------- -->
                <!-- Start Vertical Layout Sidebar -->
                <!-- ---------------------------------- -->
                <div class="p-4 flex flex-row items-center gap-3">
                    <a href="../" class="text-nowrap">
                        <img src="../assets/LOGO.png" class="logo" alt="Logo-Dark" />
                    </a>
                    <div class="">
                        <a href="">UNIVERSITAS</a>
                        <a href="">GUNADARMA</a>
                    </div>
                </div>
                <div class="scroll-sidebar" data-simplebar="">
                    <nav class="w-full flex flex-col sidebar-nav px-4 mt-5">
                        <ul id="sidebarnav" class="text-gray-600 text-sm">
                            <li class="text-xs font-bold pb-[5px]">
                                <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                                <span class="text-xs text-gray-400 font-semibold">HOME</span>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
                                    href="./index.html">
                                    <i class="ti ti-layout-dashboard ps-2 text-2xl"></i> <span>Dashboard</span>
                                </a>
                            </li>

                            <li class="text-xs font-bold mb-4 mt-6">
                                <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                                <span class="text-xs text-gray-400 font-semibold">UI COMPONENTS</span>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
                                    href="./components/buttons.html">
                                    <i class="ti ti-article ps-2 text-2xl"></i> <span>Buttons</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
                                    href="./components/alerts.html">
                                    <i class="ti ti-alert-circle ps-2 text-2xl"></i> <span>Alerts</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
                                    href="./components/cards.html">
                                    <i class="ti ti-cards ps-2 text-2xl"></i> <span>Card</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
                                    href="./components/forms.html">
                                    <i class="ti ti-file-description ps-2 text-2xl"></i> <span>Forms</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
                                    href="./components/typography.html">
                                    <i class="ti ti-typography ps-2 text-2xl"></i> <span>Typography</span>
                                </a>
                            </li>

                            <li class="text-xs font-bold mb-4 mt-8">
                                <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                                <span class="text-xs text-gray-400 font-semibold">AUTH</span>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
                                    href="./pages/authentication-login.html">
                                    <i class="ti ti-login ps-2 text-2xl"></i> <span>Login</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
                                    href="./pages/authentication-register.html">
                                    <i class="ti ti-user-plus ps-2 text-2xl"></i> <span>Register</span>
                                </a>
                            </li>

                            <li class="text-xs font-bold mb-4 mt-8">
                                <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                                <span class="text-xs text-gray-400 font-semibold">EXTRA</span>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
                                    href="./pages/icons.html">
                                    <i class="ti ti-mood-happy ps-2 text-2xl"></i> <span>Icons</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
                                    href="./pages/sample-page.html">
                                    <i class="ti ti-aperture ps-2 text-2xl"></i> <span>Sample Page</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <div class="w-full page-wrapper xl:px-6 px-0">
                <!-- Main Content -->
                <main class="h-full max-w-full">
                    <div class="container full-container p-0 flex flex-col gap-6">
                        <!-- Header Start -->
                        <header class="bg-white shadow-md rounded-md w-full text-sm py-4 px-6">
                            <!-- ========== HEADER ========== -->
                            <nav class="w-full flex items-center justify-between" aria-label="Global">
                                <ul class="icon-nav flex items-center gap-4">
                                    <li class="relative xl:hidden">
                                        <a class="text-xl icon-hover cursor-pointer text-heading" id="headerCollapse"
                                            data-hs-overlay="#application-sidebar-brand"
                                            aria-controls="application-sidebar-brand" aria-label="Toggle navigation"
                                            href="javascript:void(0)">
                                            <i class="ti ti-menu-2 relative z-1"></i>
                                        </a>
                                    </li>
                                    <li class="relative">
                                        <div
                                            class="hs-dropdown relative inline-flex [--placement:bottom-left] sm:[--trigger:hover]">
                                            <a class="relative hs-dropdown-toggle inline-flex hover:text-gray-500 text-gray-300"
                                                href="#">
                                                <i class="ti ti-bell-ringing text-xl relative z-[1]"></i>
                                                <div
                                                    class="absolute inline-flex items-center justify-center text-white text-[11px] font-medium bg-blue-600 w-2 h-2 rounded-full -top-[1px] -right-[6px]">
                                                </div>
                                            </a>
                                            <div class="card hs-dropdown-menu transition-[opacity,margin] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max w-[300px] hidden z-[12]"
                                                aria-labelledby="hs-dropdown-custom-icon-trigger">
                                                <div>
                                                    <h3 class="text-gray-500 font-semibold text-base px-6 py-3">
                                                        Notification</h3>
                                                    <ul class="list-none flex flex-col">
                                                        <li>
                                                            <a href="#" class="py-3 px-6 block hover:bg-gray-200">
                                                                <p class="text-sm text-gray-500 font-medium">Roman
                                                                    Joined the Team!</p>
                                                                <p class="text-xs text-gray-400 font-medium">
                                                                    Congratulate him</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="py-3 px-6 block hover:bg-gray-200">
                                                                <p class="text-sm text-gray-500 font-medium">New message
                                                                    received</p>
                                                                <p class="text-xs text-gray-400 font-medium">Salma sent
                                                                    you new message</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="py-3 px-6 block hover:bg-gray-200">
                                                                <p class="text-sm text-gray-500 font-medium">New Payment
                                                                    received</p>
                                                                <p class="text-xs text-gray-400 font-medium">Check your
                                                                    earnings</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="py-3 px-6 block hover:bg-gray-200">
                                                                <p class="text-sm text-gray-500 font-medium">Jolly
                                                                    completed tasks</p>
                                                                <p class="text-xs text-gray-400 font-medium">Assign her
                                                                    new tasks</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="py-3 px-6 block hover:bg-gray-200">
                                                                <p class="text-sm text-gray-500 font-medium">Roman
                                                                    Joined the Team!</p>
                                                                <p class="text-xs text-gray-400 font-medium">
                                                                    Congratulate him</p>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="flex items-center gap-4">
                                    <div
                                        class="hs-dropdown relative inline-flex [--placement:bottom-right] sm:[--trigger:hover]">
                                        <a class="relative hs-dropdown-toggle cursor-pointer align-middle rounded-full">
                                            <img class="object-cover w-9 h-9 rounded-full" src="../assets/user-1.jpg"
                                                alt="" aria-hidden="true">
                                        </a>
                                        <div class="card hs-dropdown-menu transition-[opacity,margin] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max w-[200px] hidden z-[12]"
                                            aria-labelledby="hs-dropdown-custom-icon-trigger">
                                            <div class="card-body p-0 py-2">
                                                <a href="javscript:void(0)"
                                                    class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 text-gray-400">
                                                    <i class="ti ti-user text-xl"></i>
                                                    <p class="text-sm">My Profile</p>
                                                </a>
                                                <a href="javscript:void(0)"
                                                    class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 text-gray-400">
                                                    <i class="ti ti-mail text-xl"></i>
                                                    <p class="text-sm">My Account</p>
                                                </a>
                                                <a href="javscript:void(0)"
                                                    class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 text-gray-400">
                                                    <i class="ti ti-list-check text-xl"></i>
                                                    <p class="text-sm">My Task</p>
                                                </a>
                                                <div class="px-4 mt-[7px] grid">
                                                    <a href="../../pages/authentication-login.html"
                                                        class="btn-outline-primary font-medium text-[15px] w-full hover:bg-blue-600 hover:text-white">Logout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                            <!-- ========== END HEADER ========== -->
                        </header>
                        <!-- Header End -->

                        <!-- Alert -->
                        <div id="alert-placeholder"></div>

                        <?php if(!empty($success)) : ?>
                        <div class="bg-teal-400 border text-sm text-teal-500 rounded-sm p-4 flex justify-between"
                            role="alert" id="alert-box">
                            <div>
                                <span class="font-bold"><?php echo  $success; ?></span>
                            </div>
                            <div>
                                <button onclick="closeAlert()">
                                    <i class="ti ti-x"></i>
                                </button>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if (!empty($error)) : ?>
                        <div class="bg-teal-400 border text-sm text-teal-500 rounded-sm p-4 flex justify-between"
                            role="alert" id="alert-box">
                            <div>
                                <span class="font-bold"><?php echo $error; ?></span>
                            </div>
                            <div>
                                <button onclick="closeAlert()">
                                    <i class="ti ti-x"></i>
                                </button>
                            </div>
                        </div>
                        <?php endif; ?>
                        <!-- End Alert -->

                        <div class="flex justify-end">
                            <button id="open-modal" type="button"
                                class="max-[490px]:w-full py-2 px-7 block items-center gap-x-2 text-base font-medium rounded-2xl border border-blue-600 text-blue-600 hover:border-blue-600 hover:text-white hover:bg-blue-600">
                                TAMBAH
                            </button>
                        </div>

                        <!-- Modal Background Overlay -->
                        <div id="modal-overlay"
                            class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 hidden">
                            <!-- Modal Content -->
                            <div
                                class="bg-white rounded-lg shadow-lg p-6 w-full screenMin:max-w-md max-w-sm mx-auto pointer-events-auto max-[450]:mx-1">
                                <div class="flex justify-between items-center mb-4">
                                    <h4 class="text-lg font-semibold">TAMBAH TANEMAN</h4>
                                    <button id="close-modal" class="text-gray-500 hover:text-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="mb-4">
                                    <form method="post" action="insertTaneman.php">
                                        <div class="mb-6">
                                            <label for="input" class="block text-sm mb-2 text-gray-400">Nama
                                                Taneman</label>
                                            <input type="text" id="input" name="namaTaneman"
                                                class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0"
                                                placeholder="Nama Taneman" aria-describedby="email-helper-text"
                                                required>
                                        </div>
                                        <div class="mb-6">
                                            <label for="countries" class="block text-sm mb-2 text-gray-400">Select Jenis
                                                </label>
                                            <select id="countries" name="jenisTaneman"
                                                class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0"
                                                required>
                                                <option>Pilih Option</option>
                                                <option value="buah">buah</option>
                                                <option value="sayuran">sayuran</option>
                                            </select>
                                        </div>
                                        <div class="mb-6">
                                            <label for="input" class="block text-sm mb-2 text-gray-400">PIN MODE</label>
                                            <input type="text" id="input" name="pinMode"
                                                class="py-3 px-4 text-gray-500 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0"
                                                placeholder="Pin Mode" aria-describedby="email-helper-text"
                                                required>
                                        </div>
                                        <div class="flex justify-end">
                                            <button
                                                class="btn text-base py-2.5 text-white font-medium w-fit hover:bg-blue-700">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- CARD -->
                        <div class="grid grid-cols-1 xl:grid-cols-4 lg:gap-x-6 gap-x-0 lg:gap-y-6 gap-y-6 h-full">
                            <?php 
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '<div class="card">
                                    <div class="card-body">
                                        <div class="flex justify-between mb-5">
                                            <h4 class="text-gray-500 text-lg font-semibold sm:mb-0 mb-2 capitalize">' . $row['jenisTaneman'] . '</h4>
                                            <div class="hs-dropdown relative inline-flex [--placement:bottom-right] sm:[--trigger:hover]">
                                                <a class="relative hs-dropdown-toggle cursor-pointer align-middle rounded-full">
                                                    <i class="ti ti-dots-vertical text-2xl text-gray-400"></i>
                                                </a>
                                                <div class="card hs-dropdown-menu transition-[opacity,margin] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max w-[150px] hidden z-[12]" aria-labelledby="hs-dropdown-custom-icon-trigger">
                                                    <div class="card-body p-0 py-2">
                                                        <a href="javscript:void(0)" class="flex gap-2 items-center font-medium px-4 py-2.5 hover:bg-gray-200 text-gray-400">
                                                            <p class="text-sm">Action</p>
                                                        </a>
                                                        <a href="javscript:void(0)" class="flex gap-2 items-center font-medium px-4 py-2.5 hover:bg-gray-200 text-gray-400">
                                                            <p class="text-sm">Another Action</p>
                                                        </a>
                                                        <a href="javscript:void(0)" class="flex gap-2 items-center font-medium px-4 py-2.5 hover:bg-gray-200 text-gray-400">
                                                            <p class="text-sm">Something else here</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-row items-center justify-between mb-5">
                                            <h4 class="text-gray-500 text-lg font-bold sm:mb-0 mb-2 capitalize">' . $row['namaTaneman'] . '</h4>
                                            <div class="bg-blue-600 w-12 h-12 flex justify-center items-center text-white rounded-full">
                                                <i class="ti ti-apple text-4xl"></i>
                                            </div>
                                        </div>
                                        <div class="block">
                                            <form action="insert.php?id=' . $row['id'] . '" method="post" id="siramanForm">
                                                <button type="submit" class="w-full py-2 px-7 block items-center gap-x-2 text-base font-medium rounded-2xl border border-blue-600 text-blue-600 hover:border-blue-600 hover:text-white hover:bg-blue-600">
                                                    SIRAM
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>';
                                }
                            ?>
                        </div>
                        <!-- END CARD -->
                    </div>
                </main>
                <!-- Main Content End -->

                <!-- FOOTER -->
                <footer>
                    <p class="text-base text-gray-400 font-normal p-3 text-center">
                        Design and Developed by <a href="https://www.wrappixel.com/" target="_blank"
                            class="text-blue-600 underline hover:text-blue-700">wrappixel.com</a>
                    </p>
                </footer>
            </div>
        </div>
        <!--end of project-->
    </main>

    <script src="../js/script.js"></script>

    <!-- <script src="./assets/libs/jquery/dist/jquery.min.js"></script> -->
    <script src="../libs/dropdown/index.js"></script>
    <script src="../libs/overlay/index.js"></script>
    <script src="../js/sidebarmenu.js"></script>

    <script src="../js/dashboard.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.querySelector('.scroll-sidebar');
            // new SimpleBar(sidebar);
        });
    </script>
</body>

</html>