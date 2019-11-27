<aside class="main-sidebar sidebar-dark-lime elevation-4">
    <a href="/" class="brand-link">
        <img src="{{ icon_title() }}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app_handler.app_name') }}</span>
    </a>
    <div class="sidebar">
        <div id="sidebar-user-panel"></div>
        <nav class="mt-2">
            @if(!Request::segment(1))
            <ul class="nav nav-pills nav-sidebar flex-column" id="sidebar-categories" data-widget="treeview" role="menu" data-accordion="false"></ul>
            @endif
        </nav>
    </div>
</aside>
