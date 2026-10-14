@php
    $adminLinks = [
        ['key' => 'dashboard', 'route' => 'admin.dashboard', 'icon' => 'fa-comments', 'label' => 'Testimoni'],
        ['key' => 'guestbook', 'route' => 'admin.guestbook.index', 'icon' => 'fa-book', 'label' => 'Buku Tamu'],
        ['key' => 'projects', 'route' => 'admin.projects.index', 'icon' => 'fa-images', 'label' => 'Galeri Project'],
        ['key' => 'coding-projects', 'route' => 'admin.coding_projects.index', 'icon' => 'fa-laptop-code', 'label' => 'Project Coding'],
        ['key' => 'posts', 'route' => 'admin.posts.index', 'icon' => 'fa-newspaper', 'label' => 'Blog Posts'],
        ['key' => 'mock-apis', 'route' => 'admin.mock_apis.index', 'icon' => 'fa-server', 'label' => 'Mock APIs'],
        ['key' => 'project-details', 'route' => 'admin.project-details.index', 'icon' => 'fa-layer-group', 'label' => 'Detail Specs'],
    ];
@endphp

<nav class="col-xl-2 d-none d-xl-block sidebar" aria-label="Navigasi admin">
    <div class="brand-header">
        <div class="brand-icon" aria-hidden="true">R</div>
        <div>
            <h6 class="fw-bold mb-0">Raffa Admin</h6>
            <small class="text-secondary admin-brand-caption">CMS Dashboard</small>
        </div>
    </div>

    <div class="nav flex-column">
        @foreach($adminLinks as $link)
            <a
                class="nav-link-custom {{ $active === $link['key'] ? 'active' : '' }}"
                href="{{ route($link['route']) }}"
                @if($active === $link['key']) aria-current="page" @endif
            >
                <i class="fas {{ $link['icon'] }}" aria-hidden="true"></i>
                <span>{{ $link['label'] }}</span>
            </a>
        @endforeach

        <hr class="admin-nav-divider">
        <a class="nav-link-custom" href="{{ route('portfolio.index') }}" target="_blank" rel="noopener">
            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
            <span>Lihat Website</span>
        </a>
        <form action="{{ route('admin.logout') }}" method="POST" class="mt-2">
            @csrf
            <button type="submit" class="nav-link-custom w-100 text-start text-danger border-0 bg-transparent">
                <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</nav>

<div
    class="offcanvas offcanvas-start admin-offcanvas text-white"
    tabindex="-1"
    id="mobileSidebar"
    aria-labelledby="mobileSidebarLabel"
>
    <div class="offcanvas-header">
        <div>
            <h2 class="offcanvas-title h5 fw-bold mb-1" id="mobileSidebarLabel">Menu Admin</h2>
            <p class="text-secondary small mb-0">Kelola isi portfolio</p>
        </div>
        <button type="button" class="btn-close btn-close-white admin-close-trigger" data-bs-dismiss="offcanvas" aria-label="Tutup menu admin"></button>
    </div>
    <div class="offcanvas-body">
        <nav class="nav flex-column" aria-label="Navigasi admin mobile">
            @foreach($adminLinks as $link)
                <a
                    class="nav-link-custom {{ $active === $link['key'] ? 'active' : '' }}"
                    href="{{ route($link['route']) }}"
                    @if($active === $link['key']) aria-current="page" @endif
                >
                    <i class="fas {{ $link['icon'] }}" aria-hidden="true"></i>
                    <span>{{ $link['label'] }}</span>
                </a>
            @endforeach

            <hr class="admin-nav-divider">
            <a class="nav-link-custom" href="{{ route('portfolio.index') }}" target="_blank" rel="noopener">
                <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                <span>Lihat Website</span>
            </a>
            <form action="{{ route('admin.logout') }}" method="POST" class="mt-2">
                @csrf
                <button type="submit" class="nav-link-custom w-100 text-start text-danger border-0 bg-transparent">
                    <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                    <span>Logout</span>
                </button>
            </form>
        </nav>
    </div>
</div>
