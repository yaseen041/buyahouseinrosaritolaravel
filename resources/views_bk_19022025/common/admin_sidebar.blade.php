<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" style="width: 50px;" src="{{ asset('admin_assets/img/profile_small.jpg') }}" />
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">Welcome {{ ucwords(Auth::guard('admin')->user()->username) }}</span>
                        <span class="text-muted text-xs block">
                            {{ get_section_content('project', 'site_title') }}
                        </span>
                    </a>
                </div>
                <div class="logo-element">
                    {{ ucwords(Auth::guard('admin')->user()->username) }}
                    <span class="text-muted text-xs block">
                        {{ get_section_content('project', 'short_site_title') }}
                    </span>
                </div>
            </li>
            <li class="{{ Request::is('admin') ? 'active' : '' }} {{ Request::is('admin/admin') ? 'active' : '' }} {{ Request::is('admin/change_password') ? 'active' : '' }}">
                <a href="{{ url('admin') }}"><i class="fa-solid fa-gauge-high"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <!-- <li class="{{ Request::is('admin/users') ? 'active' : '' }} {{ Request::is('admin/users/*') ? 'active' : '' }}">
                <a href="{{ url('admin/users') }}"><i class="fa-solid fa-users"></i> <span class="nav-label">Users Management</span></a>
            </li> -->
            <li class="{{ Request::is('admin/types') ? 'active' : '' }} {{ Request::is('admin/types/detail*') ? 'active' : '' }}">
                <a href="{{ url('admin/types') }}"><i class="fa-solid fa-tags"></i> <span class="nav-label">Property Types</span></a>
            </li>
            <li class="{{ Request::is('admin/features') ? 'active' : '' }} {{ Request::is('admin/features/detail*') ? 'active' : '' }}">
                <a href="{{ url('admin/features') }}"><i class="fa-solid fa-tasks"></i> <span class="nav-label">Property Features</span></a>
            </li>
            <li class="{{ Request::is('admin/communities') ? 'active' : '' }} {{ Request::is('admin/communities/*') ? 'active' : '' }}">
                <a href="{{ url('admin/communities') }}"><i class="fa-solid fa-location-arrow"></i> <span class="nav-label">Communities</span></a>
            </li>
            <li class="{{ Request::is('admin/property-listings') ? 'active' : '' }} {{ Request::is('admin/property-listings/*') ? 'active' : '' }}">
                <a href="{{ url('admin/property-listings') }}"><i class="fa-solid fa-th"></i> <span class="nav-label">Property Listings</span></a>
            </li>
            <!-- <li class="{{ Request::is('admin/evaluations') ? 'active' : '' }} {{ Request::is('admin/evaluations/*') ? 'active' : '' }}">
                <a href="{{ url('admin/evaluations') }}"><i class="fa-solid fa-home"></i> <span class="nav-label">Home Evaluations</span></a>
            </li> -->
            <li class="{{ Request::is('admin/cities') ? 'active' : '' }} {{ Request::is('admin/cities/*') ? 'active' : '' }}">
                <a href="{{ url('admin/cities') }}"><i class="fa-solid fa-city"></i> <span class="nav-label">Cities of Operation</span></a>
            </li>
            <li class="{{ Request::is('admin/testimonials') ? 'active' : '' }} {{ Request::is('admin/testimonials/*') ? 'active' : '' }}">
                <a href="{{ url('admin/testimonials') }}"><i class="fa-solid fa-comment"></i> <span class="nav-label">Testimonials</span></a>
            </li>
            <li class="{{ Request::is('admin/seo') ? 'active' : '' }} {{ Request::is('admin/seo/*') ? 'active' : '' }}">
                <a href="{{ url('admin/seo') }}"><i class="fa-solid fa-code"></i> <span class="nav-label">Page SEO</span></a>
            </li>
            <li class="{{ Request::is('admin/agents') ? 'active' : '' }} {{ Request::is('admin/agents/*') ? 'active' : '' }}">
                <a href="{{ url('admin/agents') }}"><i class="fa-solid fa-user"></i> <span class="nav-label">Real Estate Agents</span></a>
            </li>
            <li class="{{ Request::is('admin/newsletter') ? 'active' : '' }} {{ Request::is('admin/newsletter/*') ? 'active' : '' }}">
                <a href="{{ url('admin/newsletter') }}"><i class="fa-solid fa-envelope-open"></i> <span class="nav-label">Newsletter</span></a>
            </li>
            <li class="{{ Request::is('admin/contact') ? 'active' : '' }} {{ Request::is('admin/contact/*') ? 'active' : '' }}">
                <a href="{{ url('admin/contact') }}"><i class="fa-solid fa-phone"></i> <span class="nav-label">Contact Requests</span></a>
            </li>
            <li class="{{ Request::is('admin/tour') ? 'active' : '' }} {{ Request::is('admin/tour/*') ? 'active' : '' }}">
                <a href="{{ url('admin/tour') }}"><i class="fa-solid fa-car"></i> <span class="nav-label">Tour Requests</span></a>
            </li>
            <li class="{{ Request::is('admin/htaccess') ? 'active' : '' }} {{ Request::is('admin/htaccess/*') ? 'active' : '' }}">
                <a href="{{ url('admin/htaccess') }}"><i class="fa-solid fa-server"></i> <span class="nav-label">Htaccess</span></a>
            </li>
            <li class="{{ Request::is('admin/htaccess/sitemap') ? 'active' : '' }} {{ Request::is('admin/htaccess/sitemap/*') ? 'active' : '' }}">
                <a href="{{ url('admin/htaccess/sitemap') }}"><i class="fa-solid fa-sitemap"></i> <span class="nav-label">Sitemap</span></a>
            </li>
            <li class="{{ Request::is('admin/categories') ? 'active' : '' }} {{ Request::is('admin/categories*') ? 'active' : '' }}">
                <a href="{{ url('admin/categories') }}"><i class="fa fa-layer-group"></i><span class="nav-label">Blog Categories</span></a>
            </li>
            <li class="{{ Request::is('admin/blogs', 'admin/blogs/create', 'admin/blogs/edit*') ? 'active' : '' }}">
                <a href="{{ url('admin/blogs') }}" title="Blogs"><i class="fab fa-blogger-b"></i><span class="nav-label">Blogs</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ Request::is('admin/blogs/create') ? 'active' : '' }}">
                        <a href="{{ route('admin.blogs.create') }}">
                            Create Blog
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/blogs') ? 'active' : '' }} || {{ Request::is('admin/blogs/edit*') ? 'active' : '' }}">
                        <a href="{{ url('admin/blogs') }}">
                            Manage Blogs
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>