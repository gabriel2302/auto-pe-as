<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Options Admin - Responsive Web Application Kit</title>

        <!-- ========== COMMON STYLES ========== -->
        <link rel="stylesheet" href="/template/css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="/template/css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="/template/css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="/template/css/lobipanel/lobipanel.min.css" media="screen" >

        <!-- ========== PAGE STYLES ========== -->
        <link rel="stylesheet" href="/template/css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="/template/css/toastr/toastr.min.css" media="screen" >
        <link rel="stylesheet" href="/template/css/icheck/skins/line/blue.css" >
        <link rel="stylesheet" href="/template/css/icheck/skins/line/red.css" >
        <link rel="stylesheet" href="/template/css/icheck/skins/line/green.css" >
        <link rel="stylesheet" href="/template/css/bootstrap-tour/bootstrap-tour.css" >

        <!-- ========== THEME CSS ========== -->
        <link rel="stylesheet" href="/template/css/main.css" media="screen" >

        <!-- ========== MODERNIZR ========== -->
        <script src="/template/js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <nav class="navbar top-navbar bg-white box-shadow">
            	<div class="container-fluid">
                    <div class="row">
                        <div class="navbar-header no-padding">
                			<a class="navbar-brand" href="index.html">
                			    <img src="images/logo-dark.svg" alt="Options - Admin Template" class="logo">
                			</a>
                            <span class="small-nav-handle hidden-sm hidden-xs"><i class="fa fa-outdent"></i></span>
                			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                				<span class="sr-only">Toggle navigation</span>
                				<i class="fa fa-ellipsis-v"></i>
                			</button>
                            <button type="button" class="navbar-toggle mobile-nav-toggle" >
                				<i class="fa fa-bars"></i>
                			</button>
                		</div>
                        <!-- /.navbar-header -->

                		<div class="collapse navbar-collapse" id="navbar-collapse-1">
                			<ul class="nav navbar-nav" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <li class="hidden-sm hidden-xs"><a href="#" class="user-info-handle"><i class="fa fa-user"></i></a></li>
                                <li class="hidden-sm hidden-xs"><a href="#" class="full-screen-handle"><i class="fa fa-arrows-alt"></i></a></li>
                                <li class="hidden-sm hidden-xs"><a href="#"><i class="fa fa-search"></i></a></li>
                				<li class="hidden-xs hidden-xs"><!-- <a href="#">My Tasks</a> --></li>
                                <li class=""><a href="#" class="color-primary"><i class="fa fa-diamond"></i> Upgrade</a></li>
                			</ul>
                            <!-- /.nav navbar-nav -->

                			<ul class="nav navbar-nav navbar-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <li class="dropdown">
                					<a href="#" class="dropdown-toggle bg-primary tour-one" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus-circle"></i> Add New <span class="caret"></span></a>
                					<ul class="dropdown-menu" >
                						<li><a href="#"><i class="fa fa-plus-square-o"></i> Customer</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square-o"></i> Employee</a></li>
                						<li><a href="#"><i class="fa fa-plus-square-o"></i> Estimate</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square-o"></i> Task</a></li>
                						<li><a href="#"><i class="fa fa-plus-square-o"></i> Team Member</a></li>
                						<li role="separator" class="divider"></li>
                						<li><a href="#">Create Order</a></li>
                						<li role="separator" class="divider"></li>
                						<li><a href="#">Generate Report</a></li>
                					</ul>
                				</li>
                                <!-- /.dropdown -->
                                <li><a href="#" class=""><i class="fa fa-bell"></i><span class="badge badge-danger">6</span></a></li>
                				<li><a href="#" class=""><i class="fa fa-comments"></i><span class="badge badge-warning">2</span></a></li>
                				<li class="dropdown tour-two">
                					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">John Doe <span class="caret"></span></a>
                					<ul class="dropdown-menu profile-dropdown">
                						<li class="profile-menu bg-gray">
                						    <div class="">
                						        <img src="http://placehold.it/60/c2c2c2?text=User" alt="John Doe" class="img-circle profile-img">
                                                <div class="profile-name">
                                                    <h6>John Doe</h6>
                                                    <a href="pages-profile.html">View Profile</a>
                                                </div>
                                                <div class="clearfix"></div>
                						    </div>
                						</li>
                						<li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                						<li><a href="#"><i class="fa fa-sliders"></i> Account Details</a></li>
                						<li role="separator" class="divider"></li>
                						<li><a href="#" class="color-danger text-center"><i class="fa fa-sign-out"></i> Logout</a></li>
                					</ul>
                				</li>
                                <!-- /.dropdown -->
                                <li><a href="#" class="hidden-xs hidden-sm open-right-sidebar"><i class="fa fa-ellipsis-v"></i></a></li>
                			</ul>
                            <!-- /.nav navbar-nav navbar-right -->
                		</div>
                		<!-- /.navbar-collapse -->
                    </div>
                    <!-- /.row -->
            	</div>
            	<!-- /.container-fluid -->
            </nav>

            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                    <div class="left-sidebar fixed-sidebar bg-black-300 box-shadow tour-three">
                        <div class="sidebar-content">
                            <div class="user-info closed">
                                <img src="http://placehold.it/90/c2c2c2?text=User" alt="John Doe" class="img-circle profile-img">
                                <h6 class="title">John Doe</h6>
                                <small class="info">PHP Developer</small>
                            </div>
                            <!-- /.user-info -->

                            <div class="sidebar-nav">
                                <ul class="side-nav color-gray">
                                    <li class="nav-header">
                                        <span class="">Main Category</span>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li class="active"><a href="index.html"><i class="fa fa-bolt"></i> <span>Layout 1</span></a></li>
                                            <li><a href="dashboard-2.html"><i class="fa fa-bookmark"></i> <span>Layout 2</span></a></li><li><a href="dashboard-full-width.html"><i class="fa fa-dashboard"></i> <span>Layout 3</span></a></li>
                                        </ul>
                                    </li>

                                    <li class="nav-header">
                                        <span class="">Appearance</span>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>Page Layouts</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="layout-fixed-top.html"><i class="fa fa-lock"></i> <span>Fixed Navbar</span></a></li>
                                            <li><a href="layout-fixed-top-side.html"><i class="fa fa-thumb-tack"></i> <span>Fixed Top & Sidebar</span></a></li>
                                            <li><a href="layout-static-top-side.html"><i class="fa fa-unlock"></i> <span>Static Top & Sidebar</span></a></li>
                                            <li><a href="layout-small-sidebar.html"><i class="fa fa-sign-in"></i> <span>Small Sidebar</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-paint-brush"></i> <span>Color Schemes</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="color-primary.html"><i class="fa fa-bank"></i> <span>Primary Color</span></a></li>
                                            <li><a href="color-danger.html"><i class="fa fa-bell"></i> <span>Danger Color</span></a></li>
                                            <li><a href="color-success.html"><i class="fa fa-check"></i> <span>Success Color</span></a></li>
                                            <li><a href="color-warning.html"><i class="fa fa-info"></i> <span>Warning Color</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-map-signs"></i> <span>Sidebar Layouts</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="sidebar-light.html"><i class="fa fa-newspaper-o "></i> <span>Light Sidebar</span></a></li>
                                            <li><a href="sidebar-default.html"><i class="fa fa-leaf "></i> <span>Default Sidebar</span></a></li>
                                            <li><a href="sidebar-primary.html"><i class="fa fa-check"></i> <span>Primary Sidebar</span></a></li>
                                            <li><a href="sidebar-indigo.html"><i class="fa fa-info"></i> <span>Indigo Sidebar</span></a></li>
                                            <li><a href="sidebar-sea-green.html"><i class="fa fa-male"></i> <span>Sea Green Sidebar</span></a></li>
                                            <li><a href="sidebar-navy.html"><i class="fa fa-sign-in"></i> <span>Navy Sidebar</span></a></li>
                                        </ul>
                                    </li>

                                    <li class="nav-header">
                                        <span class="">Components</span>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-magic"></i> <span>UI Components</span> <span class="label label-success ml-5">Hot</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="ui-buttons.html"><i class="fa fa-plane"></i> <span>Buttons</span></a></li>
                                            <li><a href="ui-panels.html"><i class="fa fa-puzzle-piece"></i> <span>Panels</span></a></li>
                                            <li><a href="ui-modals.html"><i class="fa fa-random"></i> <span>Modals</span></a></li>
                                            <li><a href="ui-page-headers.html"><i class="fa fa-road"></i> <span>Page Headers</span></a></li>
                                            <li><a href="ui-loaders.html"><i class="fa fa-spinner"></i> <span>Loaders</span></a></li>
                                            <li><a href="ui-confirmation.html"><i class="fa fa-info"></i> <span>Confirmation</span></a></li>
                                            <li><a href="ui-dropdown-menu.html"><i class="fa fa-sitemap"></i> <span>Dropdown Menu</span></a></li>
                                            <li><a href="ui-media-objects.html"><i class="fa fa-photo"></i> <span>Media Objects</span></a></li>
                                            <li><a href="ui-timeout-idle.html"><i class="fa fa-ticket"></i> <span>Timeout Idle</span></a></li>
                                            <li><a href="ui-timeout-session.html"><i class="fa fa-suitcase"></i> <span>Timeout Session</span></a></li>
                                            <li><a href="ui-bootstrap-tour.html"><i class="fa fa-fighter-jet"></i> <span>Bootstrap Tour</span></a></li>
                                            <li><a href="ui-timeline.html"><i class="fa fa-clock-o"></i> <span>Timeline</span></a></li>
                                            <li><a href="ui-date-picker.html"><i class="fa fa-calendar"></i> <span>Date Picker</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-bars"></i> <span>Bootstrap Components</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="bt-accordions.html"><i class="fa fa-bar-chart"></i> <span>Accordions</span></a></li>
                                            <li><a href="bt-affix.html"><i class="fa fa-bell-o"></i> <span>Affix</span></a></li>
                                            <li><a href="bt-alerts.html"><i class="fa fa-info-circle"></i> <span>Alerts</span></a></li>
                                            <li><a href="bt-button-dropdown.html"><i class="fa fa-bookmark"></i> <span>Button Dropdown</span></a></li>
                                            <li><a href="bt-button-groups.html"><i class="fa fa-bomb"></i> <span>Button Groups</span></a></li>
                                            <li><a href="bt-buttons.html"><i class="fa fa-bug"></i> <span>Buttons</span></a></li>
                                            <li><a href="bt-carousel.html"><i class="fa fa-bullseye"></i> <span>Carousel</span></a></li>
                                            <li><a href="bt-code.html"><i class="fa fa-code"></i> <span>Code</span></a></li>
                                            <li><a href="bt-collapse.html"><i class="fa fa-plane"></i> <span>Collapse</span></a></li>
                                            <li><a href="bt-dropdowns.html"><i class="fa fa-calendar"></i> <span>Dropdowns</span></a></li>
                                            <li><a href="bt-grid.html"><i class="fa fa-th"></i> <span>Grid</span></a></li>
                                            <li><a href="bt-helpers.html"><i class="fa fa-hand-o-right"></i> <span>Helpers</span></a></li>
                                            <li><a href="bt-labels-badges.html"><i class="fa fa-signal"></i> <span>Labels & Badges</span></a></li>
                                            <li><a href="bt-modals.html"><i class="fa fa-shopping-cart"></i> <span>Modals</span></a></li>
                                            <li><a href="bt-pagination.html"><i class="fa fa-video-camera"></i> <span>Pagination</span></a></li>
                                            <li><a href="bt-popover.html"><i class="fa fa-camera"></i> <span>Popover</span></a></li>
                                            <li><a href="bt-scrollspy.html"><i class="fa fa-arrows-alt"></i> <span>Scrollspy</span></a></li>
                                            <li><a href="bt-tabs.html"><i class="fa fa-cloud"></i> <span>Tabs</span></a></li>
                                            <li><a href="bt-tooltips.html"><i class="fa fa-crop"></i> <span>Tooltips</span></a></li>
                                            <li><a href="bt-typography.html"><i class="fa fa-text-width"></i> <span>Typography</span></a></li>
                                            <li><a href="bt-progress-bar.html"><i class="fa fa-tasks"></i> <span>Progress Bar</span></a></li>
                                        </ul>
                                    </li>
                                     <li class="has-children">
                                        <a href="#"><i class="fa fa-comments-o"></i> <span>Tables</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="table-basic.html"><i class="fa fa-lock"></i> <span>Basic Tables</span></a></li>
                                            <li><a href="table-datatable.html"><i class="fa fa-list"></i> <span>Datatables</span></a></li>
                                            <li><a href="table-user-details.html"><i class="fa fa-table"></i> <span>Tabular User Details</span></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="font-awesome.html"><i class="fa fa-font-awesome"></i> <span>Font Awesome</span></a></li>
                                    <li><a href="animations.html"><i class="fa fa-spinner animate"></i> <span>CSS Animations</span></a></li>
                                    <li class="nav-header">
                                        <span class="">Charts</span>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span>Amcharts</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="chart-column-bar.html"><i class="fa fa-barcode"></i> <span>Column & Bar Charts</span></a></li>
                                            <li><a href="chart-line-area.html"><i class="fa fa-line-chart"></i> <span>Line & Area Charts</span></a></li>
                                            <li><a href="chart-pie-chart.html"><i class="fa fa-pie-chart"></i> <span>Pie Charts</span></a></li>
                                            <li><a href="chart-funnel.html"><i class="fa fa-area-chart"></i> <span>Funnel Chart</span></a></li>
                                            <li><a href="chart-others.html"><i class="fa fa-comments"></i> <span>Other Charts</span></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="charts-high-chart.html"><i class="fa fa-area-chart"></i> <span>High Chart</span></a></li>
                                    <li><a href="charts-chartjs.html"><i class="fa fa-area-chart"></i> <span>Chart.js</span></a></li>

                                    <li class="nav-header">
                                        <span class="">Forms</span>
                                    </li>
                                    <li class=""><a href="form-basic.html"><i class="fa fa-cloud"></i> <span>Basic Forms</span></a></li>
                                    <li class=""><a href="form-layouts.html"><i class="fa fa-bars"></i> <span>Form Layouts</span></a></li>
                                    <li class=""><a href="form-validations.html"><i class="fa fa-info"></i> <span>Validations</span></a></li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span>Form Components</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li class=""><a href="form-checkbox.html"><i class="fa fa-check"></i> <span>Checkboxes</span></a></li>
                                            <li class=""><a href="form-bt-switches.html"><i class="fa fa-bullhorn"></i> <span>Bootstrap Switch</span></a></li>
                                            <li class=""><a href="form-input-groups.html"><i class="fa fa-bullseye"></i> <span>Input Groups</span></a></li>
                                            <li class=""><a href="form-select2.html"><i class="fa fa-arrows-alt"></i> <span>Select 2</span></a></li>
                                            <li class=""><a href="form-switches.html"><i class="fa fa-check-square-o"></i> <span>Switches</span></a></li>
                                            <li class=""><a href="form-tags.html"><i class="fa fa-history"></i> <span>Tags</span></a></li>
                                        </ul>
                                    </li>
                                    <li class=""><a href="form-editable.html"><i class="fa fa-pencil"></i> <span>Editable Form</span></a></li>
                                    <li class=""><a href="form-steps.html"><i class="fa fa-server"></i> <span>Steps</span></a></li>
                                    <li class=""><a href="form-dropzone.html"><i class="fa fa-bullseye"></i> <span>Dropzone</span></a></li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-paperclip"></i> <span>Editors</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li class=""><a href="form-editor-ckeditor.html"><i class="fa fa-check"></i> <span>CKEditor</span></a></li>
                                            <li class=""><a href="form-editor-summernote.html"><i class="fa fa-bullhorn"></i> <span>Summernote</span></a></li>
                                        </ul>
                                    </li>

                                    <li class="nav-header">
                                        <span class="">Pages</span>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-lock"></i> <span>Login</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="pages-login.html"><i class="fa fa-lock"></i> <span>Option 1</span></a></li>
                                            <li><a href="pages-login-2.html"><i class="fa fa-sign-in"></i> <span>Option 2</span></a></li>
                                            <li><a href="pages-login-3.html"><i class="fa fa-sign-out"></i> <span>Option 3</span></a></li>
                                            <li><a href="pages-login-4.html"><i class="fa fa-lock"></i> <span>Option 4</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-sign-out"></i> <span>Register</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="pages-register.html"><i class="fa fa-lock"></i> <span>Option 1</span></a></li>
                                            <li><a href="pages-register-2.html"><i class="fa fa-sign-in"></i> <span>Option 2</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-lock"></i> <span>Ecommerce</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="ecommerce-dashboard.html"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                                            <li><a href="ecommerce-orders.html"><i class="fa fa-shopping-cart"></i> <span>Orders</span></a></li>
                                            <li><a href="ecommerce-order-view.html"><i class="fa fa-sign-out"></i> <span>Order View</span></a></li>
                                            <li><a href="ecommerce-products.html"><i class="fa fa-lock"></i> <span>Products</span></a></li>
                                        </ul>
                                    </li>
                                    <li class=""><a href="pages-error-404.html"><i class="fa fa-info"></i> <span>Error 404</span></a></li>
                                    <li class=""><a href="pages-error-500.html"><i class="fa fa-info-circle"></i> <span>Error 500</span></a></li>
                                    <li class=""><a href="pages-profile.html"><i class="fa fa-user"></i> <span>Profile</span></a></li>
                                    <li class=""><a href="pages-pricing.html"><i class="fa fa-user-secret"></i> <span>Pricing</span></a></li>
                                </ul>
                                <!-- /.side-nav -->
                                <div class="purchase-btn hidden-sm hidden-xs">
                                    <a href="https://themeforest.net/item/options-admin-responsive-web-application-ui-kit/19796742?license=regular&open_purchase_for_item_id=19796742&purchasable=source&ref=salttechno" target="_blank" class="btn btn-success btn-labeled">Purchase Now<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></a>
                                </div>
                            </div>
                            <!-- /.sidebar-nav -->
                        </div>
                        <!-- /.sidebar-content -->
                    </div>
                    <!-- /.left-sidebar -->

                    <div class="main-page">
                        @yield('conteudo')
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="#">
                                            <span class="number counter">1,411</span>
                                            <span class="name">Comments</span>
                                            <span class="bg-icon"><i class="fa fa-comments"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->

                                        <div class="src-code">
                                            <pre class="language-html"><code class="language-html">
&lt;a class="dashboard-stat bg-primary" href="#"&gt;
    &lt;span class="number counter"&gt;1,411&lt;/span&gt;
    &lt;span class="name"&gt;Comments&lt;/span&gt;
    &lt;span class="bg-icon"&gt;&lt;i class="fa fa-comments"&gt;&lt;/i&gt;&lt;/span&gt;
&lt;/a&gt;
&lt;!-- /.dashboard-stat --&gt;

&lt;!-- ========== JS ========== --&gt;
&lt;script&gt;
    $(function(){
        $('.counter').counterUp();
    });
&lt;/script&gt;
                                            </code></pre>
                                        </div>
                                        <!-- /.src-code -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-danger" href="#">
                                            <span class="number counter">322</span>
                                            <span class="name">Total Tickets</span>
                                            <span class="bg-icon"><i class="fa fa-ticket"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->

                                        <div class="src-code">
                                            <pre class="language-html"><code class="language-html">
&lt;a class="dashboard-stat bg-danger" href="#"&gt;
    &lt;span class="number counter"&gt;322&lt;/span&gt;
    &lt;span class="name"&gt;Total Tickets&lt;/span&gt;
    &lt;span class="bg-icon"&gt;&lt;i class="fa fa-ticket"&gt;&lt;/i&gt;&lt;/span&gt;
&lt;/a&gt;
&lt;!-- /.dashboard-stat --&gt;

&lt;!-- ========== JS ========== --&gt;
&lt;script&gt;
    $(function(){
        $('.counter').counterUp();
    });
&lt;/script&gt;
                                            </code></pre>
                                        </div>
                                        <!-- /.src-code -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-warning" href="#">
                                            <span class="number counter">5,551</span>
                                            <span class="name">Bank Credits</span>
                                            <span class="bg-icon"><i class="fa fa-bank"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->

                                        <div class="src-code">
                                            <pre class="language-html"><code class="language-html">
&lt;a class="dashboard-stat bg-warning" href="#"&gt;
    &lt;span class="number counter"&gt;5,551&lt;/span&gt;
    &lt;span class="name"&gt;Bank Credits&lt;/span&gt;
    &lt;span class="bg-icon"&gt;&lt;i class="fa fa-bank"&gt;&lt;/i&gt;&lt;/span&gt;
&lt;/a&gt;
&lt;!-- /.dashboard-stat --&gt;

&lt;!-- ========== JS ========== --&gt;
&lt;script&gt;
    $(function(){
        $('.counter').counterUp();
    });
&lt;/script&gt;
                                            </code></pre>
                                        </div>
                                        <!-- /.src-code -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-success" href="#">
                                            <span class="number counter">16,710</span>
                                            <span class="name">Thumbs Up</span>
                                            <span class="bg-icon"><i class="fa fa-thumbs-o-up"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->

                                        <div class="src-code">
                                            <pre class="language-html"><code class="language-html">
&lt;a class="dashboard-stat bg-success" href="#"&gt;
    &lt;span class="number counter"&gt;16,710&lt;/span&gt;
    &lt;span class="name"&gt;Thumbs Up&lt;/span&gt;
    &lt;span class="bg-icon"&gt;&lt;i class="fa fa-thumbs-o-up"&gt;&lt;/i&gt;&lt;/span&gt;
&lt;/a&gt;
&lt;!-- /.dashboard-stat --&gt;

&lt;!-- ========== JS ========== --&gt;
&lt;script&gt;
    $(function(){
        $('.counter').counterUp();
    });
&lt;/script&gt;
                                            </code></pre>
                                        </div>
                                        <!-- /.src-code -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                        <section class="section pt-10">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="panel border-primary no-border border-3-top" data-panel-control>
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Production Change <small>over years</small></h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div id="production-chart" class="op-chart"></div>

                                                <div class="src-code">
                                                    <pre class="language-html"><code class="language-html">
&lt;div id="production-chart" class="op-chart"&gt;&lt;/div&gt;

&lt;!-- ========== JS ========== --&gt;
&lt;script src="/template/js/production-chart.js"&gt;&lt;/script&gt;
                                                    </code></pre>
                                                </div>
                                                <!-- /.src-code -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="panel border-primary no-border border-3-top" data-panel-control>
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Traffic Stats <small>over years</small></h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div id="traffic-chart" class="op-chart"></div>

                                                <div class="src-code">
                                                    <pre class="language-html"><code class="language-html">
&lt;div id="traffic-chart" class="op-chart"&gt;&lt;/div&gt;

&lt;!-- ========== JS ========== --&gt;
&lt;script src="/template/js/traffic-chart.js"&gt;&lt;/script&gt;
                                                    </code></pre>
                                                </div>
                                                <!-- /.src-code -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                        <section class="section pt-n">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="panel border-primary no-border border-3-top">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>User Table Details</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">

                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs border-bottom border-primary" role="tablist">
                                                    <li role="presentation" class="active"><a class="" href="#home7" aria-controls="home7" role="tab" data-toggle="tab">Approved</a></li>
                                                    <li role="presentation"><a class="" href="#profile7" aria-controls="profile7" role="tab" data-toggle="tab">Pending</a></li>
                                                </ul>

                                                <!-- Tab panes -->
                                                <div class="tab-content bg-white p-15">
                                                    <div role="tabpanel" class="tab-pane active" id="home7">
                                                        <table class="table table-clean">
                                                        	<tbody>
                                                        		<tr>
                                                        			<td class="line-height-60"><img src="images/letter/a.png" alt="" class="border-radius-50 img-size-50"></td>
                                                        			<td class="line-height-30"><small><b>Alepy Macintyre</b> <br>Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br><span class="color-success">Approved</span></small></td>
                                                                    <td class="w-10">10.10pm</td>
                                                        		</tr>
                                                        		<tr>
                                                        			<td><img src="images/letter/profile-image-1.jpg" alt="" class="border-radius-50 img-size-50"></td>
                                                        			<td class="line-height-30"><small><b>Alepy Macintyre</b> <br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum <br><span class="color-success">Approved</span></small></td>
                                                                    <td>12.15am</td>
                                                        		</tr>
                                                        	</tbody>
                                                        </table>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane" id="profile7">
                                                        <table class="table table-clean">
                                                        	<tbody>
                                                                <tr>
                                                                    <td><img src="images/letter/profile-image-1.jpg" alt="" class="border-radius-50 img-size-50"></td>
                                                                    <td class="line-height-30"><small><b>Alepy Macintyre</b> <br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum<br><span class="color-warning">Pending</span></small></td>
                                                                    <td>09:58am</td>
                                                                </tr>
                                                        		<tr>
                                                        			<td class="line-height-60"><img src="images/letter/c.png" alt="" class="border-radius-50 img-size-50"></td>
                                                        			<td class="line-height-30"><small><b>Celpy Macintyre</b> <br>Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br><span class="color-warning">Pending</span></small></td>
                                                                    <td class="w-10">8:16pm</td>
                                                        		</tr>
                                                        	</tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="src-code">
                                            <pre class="language-html">
                                                <code class="language-html">
&lt;div class="panel-body p-20"&gt;

    &lt;!-- Nav tabs --&gt;
    &lt;ul class="nav nav-tabs border-bottom border-primary" role="tablist"&gt;
        &lt;li role="presentation" class="active"&gt;&lt;a class="" href="#home7" aria-controls="home7" role="tab" data-toggle="tab"&gt;Approved&lt;/a&gt;&lt;/li&gt;
        &lt;li role="presentation"&gt;&lt;a class="" href="#profile7" aria-controls="profile7" role="tab" data-toggle="tab"&gt;Pending&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;

    &lt;!-- Tab panes --&gt;
    &lt;div class="tab-content bg-white p-15"&gt;
        &lt;div role="tabpanel" class="tab-pane active" id="home7"&gt;
            &lt;table class="table table-clean"&gt;
            	&lt;tbody&gt;
            		&lt;tr&gt;
            			&lt;td class="line-height-60"&gt;&lt;img src="images/letter/a.png" alt="" class="border-radius-50 img-size-50"&gt;&lt;/td&gt;
            			&lt;td class="line-height-30"&gt;&lt;b&gt;Alepy Macintyre&lt;/b&gt; &lt;br&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry.&lt;br&gt;&lt;span class="color-success"&gt;Approved&lt;/span&gt;&lt;/td&gt;
                        &lt;td class="w-10"&gt;10.10pm&lt;/td&gt;
            		&lt;/tr&gt;
                    ...
            	&lt;/tbody&gt;
            &lt;/table&gt;
        &lt;/div&gt;
        &lt;div role="tabpanel" class="tab-pane" id="profile7"&gt;
            &lt;table class="table table-clean"&gt;
            	&lt;tbody&gt;
            		&lt;tr&gt;
            			&lt;td class="line-height-60"&gt;&lt;img src="images/letter/a.png" alt="" class="border-radius-50 img-size-50"&gt;&lt;/td&gt;
            			&lt;td class="line-height-30"&gt;&lt;b&gt;Alepy Macintyre&lt;/b&gt; &lt;br&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry.&lt;br&gt;&lt;span class="color-warning"&gt;Pending&lt;/span&gt;&lt;/td&gt;
                        &lt;td class="w-10"&gt;8:16pm&lt;/td&gt;
            		&lt;/tr&gt;
                    ...
            	&lt;/tbody&gt;
            &lt;/table&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
                                                </code>
                                            </pre>
                                        </div>
                                        <!-- /.src-code -->
                                    </div>

                                    <!-- /.col-md-8 -->

                                    <div class="col-md-4">
                                        <div class="panel border-primary no-border border-3-top" data-panel-control>
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Tasks <small>with priority indicator</small></h5>
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">

                                                <p>Following is the list of all the pending tasks. Click on task to mark it done. You can toggle the status by clicking on an item.</p>

                                                <div class="row">
                                                    <div class="tasks-list col-md-12">
                                                        <div class="task mb-10">
                                                            <input type="checkbox" name="one" class="line-style-blue">
                                                            <label>This is medium priority task. It is indicated in primary color.</label>
                                                        </div>
                                                        <!-- /.task -->

                                                        <div class="task mb-10">
                                                            <input type="checkbox" name="one" class="line-style-red">
                                                            <label>This is top priority task. It is indicated in danger color.</label>
                                                        </div>
                                                        <!-- /.task -->

                                                        <div class="task mb-10">
                                                            <input type="checkbox" name="one" class="line-style-green">
                                                            <label>This is low priority task. It is indicated in success color. </label>
                                                        </div>
                                                        <!-- /.task -->

                                                        <div class="task mb-10">
                                                            <input type="checkbox" name="one" class="line-style-blue" checked="">
                                                            <label>This is medium priority task. It is indicated in primary color.</label>
                                                        </div>
                                                        <!-- /.task -->

                                                    </div>
                                                    <!-- /.tasks-list -->
                                                </div>

                                                <div class="src-code">
                                                    <pre class="language-html"><code class="language-html">
&lt;div class="tasks-list col-md-8 col-md-offset-2"&gt;
    &lt;div class="task mb-10"&gt;
        &lt;input type="checkbox" name="one" class="line-style-blue"&gt;
        &lt;label&gt;This is medium priority task. It is indicated in primary color.&lt;/label&gt;
    &lt;/div&gt;
    &lt;!-- /.task --&gt;

    &lt;div class="task mb-10"&gt;
        &lt;input type="checkbox" name="one" class="line-style-red"&gt;
        &lt;label&gt;This is top priority task. It is indicated in danger color.&lt;/label&gt;
    &lt;/div&gt;
    &lt;!-- /.task --&gt;

    &lt;div class="task mb-10"&gt;
        &lt;input type="checkbox" name="one" class="line-style-green"&gt;
        &lt;label&gt;This is low priority task. It is indicated in success color. &lt;/label&gt;
    &lt;/div&gt;
    &lt;!-- /.task --&gt;

    &lt;div class="task mb-10"&gt;
        &lt;input type="checkbox" name="one" class="line-style-blue" checked=""&gt;
        &lt;label&gt;This is medium priority task. It is indicated in primary color.&lt;/label&gt;
    &lt;/div&gt;
    &lt;!-- /.task --&gt;

&lt;/div&gt;
&lt;!-- /.tasks-list --&gt;

&lt;!-- ========== JS ========== --&gt;
&lt;script src="/template/js/task-list.js"&gt;&lt;/script&gt;
                                                    </code></pre>
                                                </div>
                                                <!-- /.src-code -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-4 -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->
                    </div>
                    <!-- /.main-page -->

                    <div class="right-sidebar bg-white fixed-sidebar">
                        <div class="sidebar-content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Useful Sidebar <i class="fa fa-times close-icon"></i></h4>
                                        <p>Code for help is added within the main page. Check for code below the example.</p>
                                        <p>You can use this sidebar to help your end-users. You can enter any HTML in this sidebar.</p>
                                        <p>This sidebar can be a 'fixed to top' or you can unpin it to scroll with main page.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                    <!-- /.col-md-12 -->

                                    <div class="text-center mt-20">
                                        <button type="button" class="btn btn-success btn-labeled">Purchase Now<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                    </div>
                                    <!-- /.text-center -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                        <!-- /.sidebar-content -->
                    </div>
                    <!-- /.right-sidebar -->

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="/template/js/jquery/jquery-2.2.4.min.js"></script>
        <script src="/template/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="/template/js/bootstrap/bootstrap.min.js"></script>
        <script src="/template/js/pace/pace.min.js"></script>
        <script src="/template/js/lobipanel/lobipanel.min.js"></script>
        <script src="/template/js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="/template/js/prism/prism.js"></script>
        <script src="/template/js/waypoint/waypoints.min.js"></script>
        <script src="/template/js/counterUp/jquery.counterup.min.js"></script>
        <script src="/template/js/amcharts/amcharts.js"></script>
        <script src="/template/js/amcharts/serial.js"></script>
        <script src="/template/js/amcharts/plugins/export/export.min.js"></script>
        <link rel="stylesheet" href="js/amcharts/plugins/export/export.css" type="text/css" media="all" />
        <script src="/template/js/amcharts/themes/light.js"></script>
        <script src="/template/js/toastr/toastr.min.js"></script>
        <script src="/template/js/icheck/icheck.min.js"></script>
        <script src="/template/js/bootstrap-tour/bootstrap-tour.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="/template/js/main.js"></script>
        <script src="/template/js/production-chart.js"></script>
        <script src="/template/js/traffic-chart.js"></script>
        <script src="/template/js/task-list.js"></script>
        <script>
            $(function(){

                // Counter for dashboard stats
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000
                });

                // Welcome notification
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "3500",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr["success"]("One stop solution to your website admin panel!", "Welcome to Options!");

            });
        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
