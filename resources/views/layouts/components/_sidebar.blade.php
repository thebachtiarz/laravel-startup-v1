<aside class="main-sidebar sidebar-dark-lime elevation-4">
    <a href="/" class="brand-link">
        <img src="{{ icon_title() }}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app_handler.app_name') }}</span>
    </a>
    <div class="sidebar">
        @if(auth()->check())
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ offline_asset() }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>
        <div class="user-panel mt-2 pb-2 mb-2" id="sidebarLink"></div>
        @else
        <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-between noAuthSidebar" id="sidebarLoginPanel"></div>
        <div class="user-panel mt-2 pb-2 mb-2" id="sidebarLink"></div>
        @endif
        <nav class="mt-2">
            @if(!Request::segment(1))
            <ul class="nav nav-pills nav-sidebar flex-column" id="sidebar-categories" data-widget="treeview" role="menu" data-accordion="false"></ul>
            @endif
        </nav>
    </div>
</aside>
