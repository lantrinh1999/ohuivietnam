<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                {{-- {{dd(Auth::user())}} --}}
                <img src="{{Auth::check() && !empty(Auth::user()->avatar) ? Auth::user()->avatar : asset('assets/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::check() && !empty(Auth::user()->account->name) ? Auth::user()->account->name : 'Chưa cập nhập' }}</p>
                <a ><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        {{-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form> --}}

        <ul class="sidebar-menu" data-widget="tree">
            {{-- <li class="header">MAIN NAVIGATION</li> --}}
            <li class="{{ activeNav() }}">
                <a href="{{ route('admin.home') }}">
                    <i class="fa fa-dashboard"></i><span>Dashboard</span>
                    <span style="display: none" class="pull-right-container">
                        <small class="label pull-right bg-green">Hot</small>
                    </span>
                </a>
            </li>

        <!-- Danh sách đơn hàng -->
        <li class="treeview {{ activeNav('orders') }}">
            <a href="javascript:;">
                <i class="fa fa-shopping-cart"></i>
                <span>Đơn hàng <span
                        class="label label-danger">{{DB::table('orders')->where('status',1)->count()}}</span></span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ activeNav('orders','index') }}">
                    <a href="{{ route('admin.orders.index') }}"><i class="fa fa-list"></i>Danh sách</a>
                </li>
        
            </ul>
        </li>
        <!-- Sản phẩm -->
        <li
            class="treeview {{ activeNav('categories') }} {{ activeNav('attribute') }} {{ activeNav('products') }} {{ activeNav('colors') }}">
            <a href="javascript:;">
                <i class="fa fa-archive"></i>
                <span>Sản phẩm</span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ activeNav('products','index') }} ">
                    <a href="{{ route('admin.products.index') }}"><i class="fa fa-list"></i>Tất cả sản phẩm</a>
                </li>
                <li class="{{ activeNav('products','add') }}">
                    <a href="{{ route('admin.products.add') }}"><i class="fa fa-plus-square"></i>Thêm mới</a>
                </li>
                <li class="{{ activeNav('categories','index') }}">
                    <a href="{{ route('admin.categories.index') }}"><i class="fa fa-list"></i>Danh mục</a>
                </li>
                <li class="{{ activeNav('attribute') }}">
                    <a href="{{ route('admin.attribute.index') }}"><i class="fa  fa-eyedropper"></i>Các thuộc tính</a>
                </li>
            </ul>
        </li>

        <!-- Giảm giá -->
        <li class="treeview {{ Request::segment(2)  == 'discounts' ?  activeNav('discounts') : ' '}}  {{Request::segment(2)  == 'vouchers' ?  activeNav('vouchers') : '' }}">
                <a href="javascript:;">
                    <i class="fa fa-gift"></i>
                    <span>Giảm giá</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ activeNav('discounts','index') }}">
                        <a href="{{ route('admin.discounts.index') }}"><i class="fa fa-list"></i>Mã giảm giá</a>
                    </li>
                    <li class="{{ activeNav('vouchers','index') }}">
                        <a href="{{ route('admin.vouchers.index') }}"><i class="fa fa-list"></i>Vouchers</a>
                    </li>

                </ul>
            </li>

           
            <!-- Danh sách Tài khoản -->
            <li class="treeview {{ activeNav('users') }}">
                <a href="javascript:;">
                    <i class="fa fa-user"></i>
                    <span>Tài khoản</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ activeNav('users','index') }}">
                        <a href="{{ route('admin.users.index') }}"><i class="fa fa-list"></i>Danh sách</a>
                    </li>
                    <li class="{{ activeNav('users','add') }}">
                        <a href="{{ route('admin.users.add') }}"><i class="fa fa-plus-square"></i>Thêm mới</a>
                    </li>
                </ul>
            </li>


            <!-- Danh sách Bài viết -->
            <li class="treeview {{ activeNav('posts') }}">
                <a href="javascript:;">
                    <i class="fa fa-paste"></i>
                    <span>Bài viết</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ activeNav('posts','index') }}">
                        <a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i>Danh sách</a>
                    </li>
                    <li class="{{ activeNav('posts','add') }}">
                        <a href="{{ route('admin.posts.add') }}"><i class="fa fa-plus-square"></i>Thêm mới</a>
                    </li>
                </ul>
            </li>
            <!-- Danh sách Trang -->
             <li class="treeview {{ activeNav('pages') }}">
                <a href="javascript:;">
                    <i class="fa fa-copy"></i>
                    <span>Trang</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ activeNav('pages','index') }}">
                        <a href="{{ route('admin.pages.index') }}"><i class="fa fa-list"></i>Danh sách</a>
                    </li>
                    <li class="{{ activeNav('pages','add') }}">
                        <a href="{{ route('admin.pages.add') }}"><i class="fa fa-plus-square"></i>Thêm mới</a>
                    </li>
                </ul>
            </li>

         

            <li class="{{ activeNav('comments') }}">
                <a href="{{ route('admin.comments.index') }}">
                    <i class="fa fa-hand-peace-o"></i><span>Đánh giá sản phẩm</span>
                </a>
            </li>




            <li class="header">CẤU HÌNH WEBSITE</li>
            <li class="treeview {{ activeNav('options') }}">
                <a href="javascript:;">
                    <i class="fa fa-gear"></i>
                    <span>Thiết lập</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ activeNav('options','index') }}">
                        <a href="{{ route('admin.options.index') }}"><i class="fa  fa-circle-o"></i>Thiết lập chung</a>
                    </li>
                    <li class="{{ activeNav('options','add') }}">
                        <a href="{{ route('admin.options.add') }}"><i class="fa  fa-circle-o"></i>Thiết lập menu</a>
                    </li>
                </ul>
            </li>

            {{-- <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> --}}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
