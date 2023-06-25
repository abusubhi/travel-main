<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.home')}}" class="brand-link">

        <span class="brand-text font-weight-light">Travelers</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->email }}</a>
                <span>{{auth()->user()->phone }}</span>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->


                <li class="nav-item">
                    <a href="{{route('admin.home')}}" class="nav-link {{request()->is('admin') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> {{__('الصفحة الرئيسية')}}</p>
                    </a>
                </li>




                @if(auth()->user()->can('Manger users') )
                    <li class="nav-item {{request()->is('admin/users*') ? 'nav-item-open' : ''}}">
                        <a href="{{route('admin.users')}}"
                           class="nav-link {{request()->is('admin/users') ? 'active' : ''}} ">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                {{__("المستخدمين")}}
                                <span
                                    class="badge badge-info right">{{App\Models\User::whereNull('deleted_at')->count()}}</span>
                            </p>
                        </a>
                    </li>
                @endif





                @if(auth()->user()->can('Manger posts') )
                    <li class="nav-item {{request()->is('admin/posts*') ? 'nav-item-open' : ''}}">
                        <a href="{{route('admin.posts')}}"
                           class="nav-link {{request()->is('admin/posts') ? 'active' : ''}} ">
                            <i class="nav-icon fa fa-paper-plane"></i>
                            <p>
                                {{__("الأخبار")}}
                                <span
                                    class="badge badge-info right">{{App\Models\Post::whereNull('deleted_at')->count()}}</span>
                            </p>
                        </a>
                    </li>
                @endif





                @if(auth()->user()->can('Manger travelers') )
                    <li class="nav-item {{request()->is('admin/travelers*') ? 'nav-item-open' : ''}}">
                        <a href="{{route('admin.travelers')}}"
                           class="nav-link {{request()->is('admin/travelers') ? 'active' : ''}} ">
                            <i class="nav-icon fas fa-plane"></i>
                            <p>
                                {{__("المسافرين")}}
                                <span
                                    class="badge badge-info right">{{App\Models\Traveler::whereNull('deleted_at')->count()}}</span>
                            </p>
                        </a>
                    </li>
                @endif



{{--                @if(auth()->user()->can('settings') )--}}
{{--                    <li class="nav-item {{request()->is('admin/settings*') ? 'nav-item-open' : ''}}">--}}
{{--                        <a href="{{route('admin.settings')}}"--}}
{{--                           class="nav-link {{request()->is('admin/settings') ? 'active' : ''}} ">--}}
{{--                            <i class="nav-icon fa fa-cogs"></i>--}}
{{--                            <p>--}}
{{--                                {{__("الإعدادات")}}--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endif--}}


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
