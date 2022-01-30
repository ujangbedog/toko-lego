<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
        <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="{{ url('admin/home') }}">Dashboard</a></li>
            </ul>
        </li>
    </ul>
    <br>
    <h3>Master</h3>
    <ul class="nav side-menu">
        <li><a><i class="fa fa-edit"></i> Data <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="{{ url('admin/products') }}">Products</a></li>
                <li><a href="{{ url('admin/users') }}">Users</a></li>
                <li><a href="{{ url('admin/orders') }}">Orders</a></li>
            </ul>
        </li>
    </ul>
    </div>
    </div>
    </div>
</div>