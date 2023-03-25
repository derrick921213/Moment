<?php
// require_once('./SessionMG.php');
require_once('config.php');
require_once('core/controller.Class.php');
// define('ROOT_PATH', dirname(__DIR__) . '/');
// require_once(ROOT_PATH.'SessionMG.php');
session_start();
?>
<?php

if (isset($_SESSION['ucode'])) {
    $Controller = new Controller($user, $passwd);
    if ($Controller->checkUserStatus($_COOKIE["id"], $_COOKIE["sss"])) {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Responsive Dashboard using HTML CSS and JavaScript</title>
            <script src="https://code.jquery.com/jquery-3.6.4.js"
                integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
            <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Sharp" rel="stylesheet"> -->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
            <link rel="stylesheet" href="./style.css">
        </head>

        <body>
            <div class="container">
                <!-- --------START OF ASIDE-------- -->
                <aside>
                    <div class="top">
                        <div class="logo">
                            <img src="./images/logo.png">
                            <h2>EGA<span class="danger">TOR</span></h2>
                        </div>
                        <div class="close" id="close-btn">
                            <span class="material-icons-sharp">close</span>
                        </div>
                    </div>
                    <div class="sidebar">
                        <a href="#" class="active">
                            <span class="material-icons-sharp">space_dashboard</span>
                            <h3>Dashboard</h3>
                        </a>

                        <a href="#">
                            <span class="material-icons-sharp">person_outline</span>
                            <h3>Customers</h3>
                        </a>

                        <a href="#">
                            <span class="material-icons-sharp">receipt_long</span>
                            <h3>Orders</h3>
                        </a>

                        <a href="#">
                            <span class="material-icons-sharp">insights</span>
                            <h3>Analytics</h3>
                        </a>

                        <a href="#">
                            <span class="material-icons-sharp">mail_outline</span>
                            <h3>Messages</h3>
                            <span class="message-count">26</span>
                        </a>

                        <a href="#">
                            <span class="material-icons-sharp">inventory</span>
                            <h3>Products</h3>
                        </a>

                        <a href="#">
                            <span class="material-icons-sharp">report_gmailerrorred</span>
                            <h3>Reports</h3>
                        </a>

                        <a href="#">
                            <span class="material-icons-sharp">settings</span>
                            <h3>Settings</h3>
                        </a>

                        <a href="#">
                            <span class="material-icons-sharp">add</span>
                            <h3>Add Product</h3>
                        </a>

                        <a href="logout.php">
                            <span class="material-icons-sharp">logout</span>
                            <h3>Logout</h3>
                        </a>
                    </div>
                </aside>
                <!-- --------END OF ASIDE-------- -->
                <main>
                    <h1>Dashboard</h1>
                    <div class="date">
                        <!-- <input type="date"> -->
                        <script language="javascript">
                            var Today = new Date();
                            document.write("今天日期是 " + Today.getFullYear() + " 年 " + (Today.getMonth() + 1) + " 月 " + Today.getDate() + " 日");
                        </script>
                    </div>
                    <div class="insights">
                        <!-- START OF SALES -->
                        <div class="sales">
                            <span class="material-icons-sharp">analytics</span>
                            <div class="middle">
                                <div class="left">
                                    <h3>Total Sales</h3>
                                    <h1>$25,024</h1>
                                </div>
                                <div class="progress">
                                    <svg>
                                        <circle cx="38" cy="38" r="36"></circle>
                                    </svg>
                                    <div class="number">
                                        <p>81%</p>
                                    </div>
                                </div>
                            </div>
                            <small class="text-muted">Last 24 Hours</small>
                        </div>
                        <!-- END OF SALES -->
                        <!-- START OF EXPENSES -->
                        <div class="expenses">
                            <span class="material-icons-sharp">bar_chart</span>
                            <div class="middle">
                                <div class="left">
                                    <h3>Total Expenses</h3>
                                    <h1>$14,160</h1>
                                </div>
                                <div class="progress">
                                    <svg>
                                        <circle cx="38" cy="38" r="36"></circle>
                                    </svg>
                                    <div class="number">
                                        <p>62%</p>
                                    </div>
                                </div>
                            </div>
                            <small class="text-muted">Last 24 Hours</small>
                        </div>
                        <!-- END OF EXPENSES -->
                        <!-- START OF  INCOMES-->
                        <div class="income">
                            <span class="material-icons-sharp">stacked_line_chart</span>
                            <div class="middle">
                                <div class="left">
                                    <h3>Total Income</h3>
                                    <h1>$10,864</h1>
                                </div>
                                <div class="progress">
                                    <svg>
                                        <circle cx="38" cy="38" r="36"></circle>
                                    </svg>
                                    <div class="number">
                                        <p>44%</p>
                                    </div>
                                </div>
                            </div>
                            <small class="text-muted">Last 24 Hours</small>
                        </div>
                        <!-- END OF INCOMES -->
                    </div>
                    <!-- END OF INSIGHTS -->
                    <div class="recent-orders">
                        <h2>Recent Orders</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Number</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Foldable Mini Drone</td>
                                    <td>85631</td>
                                    <td>Due</td>
                                    <td class="warning">Pending</td>
                                    <td class="primary">Details</td>
                                </tr>
                                <tr>
                                    <td>Foldable Mini Drone</td>
                                    <td>85631</td>
                                    <td>Due</td>
                                    <td class="warning">Pending</td>
                                    <td class="primary">Details</td>
                                </tr>
                                <tr>
                                    <td>Foldable Mini Drone</td>
                                    <td>85631</td>
                                    <td>Due</td>
                                    <td class="warning">Pending</td>
                                    <td class="primary">Details</td>
                                </tr>
                                <tr>
                                    <td>Foldable Mini Drone</td>
                                    <td>85631</td>
                                    <td>Due</td>
                                    <td class="warning">Pending</td>
                                    <td class="primary">Details</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="#">Show All</a>
                    </div>
                </main>
                <!-- ----------- END OF MAIN ------------ -->
                <div class="right">
                    <div class="top">
                        <button id="menu-btn">
                            <span class="material-icons-sharp">menu</span>
                        </button>
                        <div class="theme-toggler">
                            <span class="material-icons-sharp active">light_mode</span>
                            <span class="material-icons-sharp ">dark_mode</span>
                        </div>
                        <div class="profile">
                            <div class="info">
                                <p>Hey, <b>Daniel</b></p>
                                <small class="text-muted">Admin</small>
                            </div>
                            <div class="profile-photo">
                                <img src="./images/profile-1.jpg">
                            </div>
                        </div>
                    </div>
                    <!-- ----END OF TOP---- -->
                    <div class="recent-updates">
                        <h2>Recent Updates</h2>
                        <div class="updates">
                            <div class="update">
                                <div class="profile-photo">
                                    <img src="./images/profile-2.jpg">
                                </div>
                                <div class="message">
                                    <p><b>Mike Tyson</b> received his order of Night lion tech GPS drone.</p>
                                    <small class="text-muted">2 Minutes Ago</small>
                                </div>
                            </div>
                            <div class="update">
                                <div class="profile-photo">
                                    <img src="./images/profile-3.jpg">
                                </div>
                                <div class="message">
                                    <p><b>Mike Tyson</b> received his order of Night lion tech GPS drone.</p>
                                    <small class="text-muted">2 Minutes Ago</small>
                                </div>
                            </div>
                            <div class="update">
                                <div class="profile-photo">
                                    <img src="./images/profile-4.jpg">
                                </div>
                                <div class="message">
                                    <p><b>Mike Tyson</b> received his order of Night lion tech GPS drone.</p>
                                    <small class="text-muted">2 Minutes Ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ======== END OF RECENT UPDATES ========= -->
                    <div class="sales-analytics">
                        <h2>Sales Analytics</h2>

                        <div class="item online">
                            <div class="icon">
                                <span class="material-icons-sharp">shopping_cart</span>
                            </div>
                            <div class="right">
                                <div class="info">
                                    <h3>ONLINE ORDERS</h3>
                                    <small class="text-muted">Last 24 Hours</small>
                                </div>
                                <h5 class="success">+39%</h5>
                                <h3>3849</h3>
                            </div>
                        </div>

                        <div class="item offline">
                            <div class="icon">
                                <span class="material-icons-sharp">local_mall</span>
                            </div>
                            <div class="right">
                                <div class="info">
                                    <h3>OFFLINE ORDERS</h3>
                                    <small class="text-muted">Last 24 Hours</small>
                                </div>
                                <h5 class="danger">-17%</h5>
                                <h3>1100</h3>
                            </div>
                        </div>

                        <div class="item customers">
                            <div class="icon">
                                <span class="material-icons-sharp">person</span>
                            </div>
                            <div class="right">
                                <div class="info">
                                    <h3>NEW CUSTOMERS</h3>
                                    <small class="text-muted">Last 24 Hours</small>
                                </div>
                                <h5 class="success">+25%</h5>
                                <h3>849</h3>
                            </div>
                        </div>
                        <div class="item add-product">
                            <span class="material-icons-sharp">add</span>
                            <h3>Add Product</h3>
                        </div>
                    </div>
                </div>
            </div>
            <script src="./test.js"></script>
        </body>
    </html>
<?php
    } else {
        header('location:index.php');
    }
} else {
    header('location:index.php');
    die();
}
?>