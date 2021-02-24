<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="/upload/profile/{{Auth::user()->image}}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth:: user()->name }}</div>
            <div class="email">{{ Auth:: user()->email }}</div>
            <div class="btn-group user-helper-dropdown">

                <ul class="dropdown-menu pull-right">

                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            {{--   admin menubar         --}}
            @if (Request::is('admin*'))
            <li class="header">Admin Panel</li>
            <li class="{{Request::is('admin/dashboard') ? 'active' : ''}}">
                <a href="{{route('admin.dashboard')}}">
                    <i class="material-icons">home</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="{{Request::is('admin/member*') ? 'active' : ''}}">
                <a href="{{url('admin/member')}}">
                    <i class="material-icons">person</i>
                    <span>All Member</span>
                </a>
            </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle {{Request::is('admin/product*') ? 'active' : ''}}">
                    <i class="material-icons">donut_large</i>
                    <span>Product</span>
                </a>
                <ul class="ml-menu">

                    <li>
                        <a href="{{url('admin/product')}}" class="{{Request::is('admin/product*') ? 'active' : ''}}">All Products</a>
                    </li>
                    <li>
                        <a href="{{url('admin/product/create')}}" class="{{Request::is('admin/product*') ? 'active' : ''}}">Add Product</a>
                    </li>
                    <li>
                        <a href="{{url('admin/product_category')}}" class="{{Request::is('admin/product_category*') ? 'active' : ''}}">All Category</a>
                    </li>
                    <li>
                        <a href="{{url('admin/product_category/create')}}" class="{{Request::is('admin/sale*') ? 'active' : ''}}"> Add New Category</a>
                    </li>


                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle {{Request::is('admin/product*') ? 'active' : ''}}">
                    <i class="material-icons col-red">donut_large</i>
                    <span>Sale</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{url('admin/sale')}}" class="{{Request::is('admin/sale*') ? 'active' : ''}}">All Sell</a>
                    </li>
                    <li>
                        <a href="{{url('admin/sale/create')}}" class="{{Request::is('admin/sale*') ? 'active' : ''}}">New Sell</a>
                    </li>



                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle {{Request::is('admin/product*') ? 'active' : ''}}">
                    <i class="material-icons col-amber">donut_large</i>
                    <span>Purchase</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{url('admin/purchase')}}" class="{{Request::is('admin/purchase*') ? 'active' : ''}}">All Purchase</a>
                    </li>
                    <li>
                        <a href="{{url('admin/purchase/create')}}" class="{{Request::is('admin/sale*') ? 'active' : ''}}">New Purchase</a>
                    </li>



                </ul>
            </li>
            <li class="{{Request::is('admin/stock*') ? 'active' : ''}}">
                <a href="{{url('admin/stock')}}">
                    <i class="material-icons col-light-blue">donut_large</i>
                    <span>Product Stock</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle {{Request::is('admin/payment*') ? 'active' : ''}}">
                    <i class="material-icons">money</i>
                    <span>Payment</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{route('admin.category.index')}}">Payment Categories</a>

                    </li>
                    <li>
                        <a href="{{ route('admin.payment.index') }}">Payment Application</a>

                    </li>
                    <li>
                         <a href="{{ route('admin.payment.pending') }}">Pending Application</a>

                    </li>
                    <li>
                         <a href="{{ route('admin.payment.pending') }}">Pending Application</a>

                    </li>
                    <li>
                         <a href="{{ route('admin.payment.approved') }}">Approve Application</a>

                    </li>



                </ul>
            </li>
             <li class="{{Request::is('admin/total_receive') ? 'active' : ''}}">
                <a href="{{url('admin/total_receive')}}">
                    <i class="material-icons">library_books</i>
                    <span>Total Payment Amount</span>
                </a>
            </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle {{Request::is('admin/management*') ? 'active' : ''}}">
                    <i class="material-icons">person</i>
                    <span>Management</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{url('admin/management')}}" class="{{Request::is('admin/management*') ? 'active' : ''}}">Management List</a>
                    </li>
                    <li>
                        <a href="{{url('admin/desig')}}" class="{{Request::is('admin/desig*') ? 'active' : ''}}">Designation</a>
                    </li>


                </ul>
            </li>
            <li class="{{Request::is('admin/account*') ? 'active' : ''}}">
                <a href="{{url('admin/account')}}">
                    <i class="material-icons">layers</i>
                    <span>BIBS Account</span>
                </a>
            </li>




            
          
           



            <li class="{{Request::is('admin/expense*') ? 'active' : ''}}">
                <a href="{{ route('admin.expense.index') }}">
                    <i class="material-icons">money</i>
                    <span>Expense</span>
                </a>
            </li>
            <li class="{{Request::is('admin/policy*') ? 'active' : ''}}">
                <a href="{{ url('admin/policy') }}">
                    <i class="material-icons">content_copy</i>
                    <span>Privacy Policy</span>
                </a>
            </li>
            <li class="{{Request::is('admin/invest*') ? 'active' : ''}}">
                <a href="{{ url('admin/invest') }}">
                    <i class="material-icons">swap_calls</i>
                    <span>Investment</span>
                </a>
            </li>
            <li class="{{Request::is('admin/notice*') ? 'active' : ''}}">
                <a href="{{ url('admin/notice') }}">
                    <<i class="material-icons">layers</i>
                    <span>Notice</span>
                </a>
            </li>

            <li class="header">System</li>
            <li>

                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                    <i class="material-icons">input</i>  <span>Log Out</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </li>
            @endif

            {{--member sidebar--}}
            @if (Request::is('member*'))
            <li class="header">Member Panel</li>
            <li class="{{Request::is('member/dashboard') ? 'active' : ''}}">
                <a href="{{route('member.dashboard')}}">
                    <i class="material-icons">home</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="{{Request::is('member/management') ? 'active' : ''}}">
                <a href="{{ url('member/management') }}">
                    <i class="material-icons">person</i>
                    <span>Management</span>
                </a>
            </li>

            <li class="{{Request::is('member/payment*') ? 'active' : ''}}">
                <a href="{{ route('member.payment.index') }}">
                    <i class="material-icons">money</i>
                    <span>Payment</span>
                </a>
            </li>
            <li>
                <a href="{{url('member/dashboard/profile')}}">
                    <i class="material-icons">person</i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="{{Request::is('member/invest*') ? 'active' : ''}}">
                <a href="{{ url('member/invest') }}">
                    <i class="material-icons">money</i>
                    <span>Investment Part</span>
                </a>
            </li>
            <li class="{{Request::is('member/notice*') ? 'active' : ''}}">
                <a href="{{ url('member/notice') }}">
                    <i class="material-icons">money</i>
                    <span>Notice</span>
                </a>
            </li>
            <li class="{{Request::is('member/policy*') ? 'active' : ''}}">
                <a href="{{ url('member/policy') }}">
                    <i class="material-icons">content_copy</i>
                    <span>Privacy Policy</span>
                </a>
            </li>
            <li class="header">System</li>
            <li>

                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                    <i class="material-icons">input</i>  <span>Log Out</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </li>
            @endif
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2020 - 2021 <a href="javascript:void(0);">Developed By IT WAY BD </a>.
        </div>

    </div>
    <!-- #Footer -->
</aside>
