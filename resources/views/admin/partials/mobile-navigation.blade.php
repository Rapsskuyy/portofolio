<header class="mobile-navbar d-flex d-xl-none justify-content-between align-items-center" aria-label="Header admin">
    <a class="admin-brand-link d-flex align-items-center gap-2" href="{{ route('admin.dashboard') }}">
        <span class="brand-icon" aria-hidden="true">R</span>
        <span class="fw-bold">Admin Raffa</span>
    </a>
    <button
        class="btn btn-outline-light admin-menu-trigger"
        type="button"
        data-bs-toggle="offcanvas"
        data-bs-target="#mobileSidebar"
        aria-controls="mobileSidebar"
        aria-expanded="false"
        aria-label="Buka menu admin"
    >
        <i class="fas fa-bars" aria-hidden="true"></i>
        <span>Menu</span>
    </button>
</header>
