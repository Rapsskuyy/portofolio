<style>
    html,
    body {
        max-width: 100%;
    }

    body {
        overflow-x: clip;
    }

    .admin-brand-link {
        color: var(--text-main, #f8fafc);
        text-decoration: none;
    }

    .admin-brand-caption {
        font-size: 0.6875rem;
    }

    .admin-menu-trigger {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        min-height: 44px;
        padding-inline: 0.875rem;
        font-weight: 600;
    }

    .admin-offcanvas {
        --bs-offcanvas-width: min(86vw, 340px);
        background: var(--card-bg, #1e293b);
        border-right: 1px solid var(--border-color, rgba(255, 255, 255, 0.1));
    }

    .btn-close {
        min-width: 44px;
        min-height: 44px;
        background-size: 0.875rem;
    }

    .text-secondary {
        color: #cbd5e1 !important;
    }

    .text-success {
        color: #86efac !important;
    }

    .text-warning {
        color: #fde68a !important;
    }

    .text-danger {
        color: #fca5a5 !important;
    }

    .text-info {
        color: #7dd3fc !important;
    }

    .btn-primary,
    .nav-link-custom.active {
        background-color: #4f46e5 !important;
        border-color: #4f46e5 !important;
        color: #ffffff !important;
    }

    .admin-offcanvas .offcanvas-header {
        min-height: 78px;
        border-bottom: 1px solid var(--border-color, rgba(255, 255, 255, 0.1));
    }

    .admin-close-trigger {
        min-width: 44px;
        min-height: 44px;
        background-size: 0.875rem;
    }

    .admin-nav-divider {
        margin: 1rem 0;
        border-color: var(--border-color, rgba(255, 255, 255, 0.1));
        opacity: 1;
    }

    .nav-link-custom {
        min-height: 44px;
    }

    .nav-link-custom:focus-visible,
    .admin-brand-link:focus-visible,
    .btn:focus-visible,
    .form-control:focus-visible,
    .form-select:focus-visible,
    .form-check-input:focus-visible,
    a:focus-visible {
        outline: 3px solid #c4b5fd;
        outline-offset: 3px;
        box-shadow: none !important;
    }

    .admin-page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 0.75rem 1rem;
    }

    .admin-page-header > * {
        min-width: 0;
    }

    .admin-page-header > .d-flex {
        flex-wrap: wrap;
        min-width: 0;
    }

    .admin-row-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .admin-row-actions .btn,
    .admin-row-actions form,
    .admin-row-actions form .btn {
        min-height: 44px;
    }

    .admin-row-actions form {
        display: inline-flex;
    }

    .admin-break-text,
    .table-dark-custom td,
    .table-dark-custom code,
    .form-text,
    .alert,
    .card-custom {
        overflow-wrap: anywhere;
        word-break: break-word;
    }

    .form-control,
    .form-select,
    .btn {
        min-height: 44px;
    }

    textarea.form-control {
        min-height: 7rem;
    }

    .modal-dialog-scrollable {
        max-height: calc(100dvh - 2rem);
    }

    .modal-dialog-scrollable .modal-content,
    .modal-content {
        max-height: calc(100dvh - 2rem);
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .modal-content > form {
        display: flex;
        flex-direction: column;
        flex: 1 1 auto;
        min-height: 0;
        max-height: 100%;
        overflow: hidden;
    }

    .modal-dialog-scrollable .modal-body,
    .modal-content > form > .modal-body,
    .modal-body {
        overflow-y: auto !important;
        -webkit-overflow-scrolling: touch;
        overscroll-behavior: contain;
        flex: 1 1 auto;
        min-height: 0;
        max-height: calc(100dvh - 12rem);
    }

    .modal-header,
    .modal-footer {
        flex-shrink: 0;
    }

    .modal-body::-webkit-scrollbar {
        width: 8px;
    }

    .modal-body::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 4px;
    }

    .modal-body::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.25);
        border-radius: 4px;
    }

    .modal-body::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.4);
    }

    .note-toolbar {
        display: flex;
        flex-wrap: wrap;
        gap: 0.25rem;
    }

    .note-toolbar > .note-btn-group {
        margin: 0 !important;
    }

    .note-editor,
    .note-editable {
        max-width: 100%;
    }

    @media (max-width: 1199.98px) {
        .container-fluid,
        .container-fluid > .row {
            width: 100%;
            max-width: 100%;
            margin-inline: 0;
            padding-inline: 0;
        }

        .mobile-navbar {
            min-height: 68px;
            padding: 12px 24px;
            position: sticky;
            top: 0;
            z-index: 1020;
        }

        .main-content {
            width: 100%;
            max-width: 100%;
            padding: 24px !important;
            margin: 0 !important;
        }

        .card-custom {
            max-width: 100%;
        }

        .modal-dialog {
            max-width: min(720px, calc(100vw - 3rem));
        }
    }

    @media (max-width: 768px) {
        .mobile-navbar {
            min-height: 64px;
            padding: 10px 16px;
        }

        .mobile-navbar .brand-icon {
            width: 38px;
            height: 38px;
        }

        .main-content {
            padding: 16px !important;
        }

        .row-cols-md-2 > * {
            width: 100%;
        }

        .main-content h1,
        .main-content h2,
        .main-content h3 {
            font-size: clamp(1.35rem, 6vw, 1.75rem);
            line-height: 1.25;
        }

        .admin-page-header {
            align-items: stretch;
            flex-direction: column;
            margin-bottom: 1.25rem !important;
        }

        .admin-page-header > .btn,
        .admin-page-header > form,
        .admin-page-header > form .btn {
            width: 100%;
        }

        .card-custom {
            border-radius: 14px;
        }

        .table-responsive {
            overflow: visible;
        }

        .admin-mobile-table,
        .admin-mobile-table tbody,
        .admin-mobile-table tr,
        .admin-mobile-table td {
            display: block;
            width: 100%;
        }

        .admin-mobile-table thead {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        .admin-mobile-table tbody {
            display: grid;
            gap: 0.75rem;
            padding: 0.75rem;
        }

        .admin-mobile-table tbody tr {
            background: rgba(15, 23, 42, 0.45);
            border: 1px solid var(--border-color, rgba(255, 255, 255, 0.1));
            border-radius: 12px;
            overflow: hidden;
        }

        .admin-mobile-table tbody td {
            display: grid;
            grid-template-columns: minmax(88px, 32%) minmax(0, 1fr);
            gap: 0.75rem;
            align-items: start;
            padding: 12px 14px !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.07) !important;
            text-align: left !important;
            white-space: normal;
        }

        .admin-mobile-table tbody td::before {
            content: attr(data-label);
            color: #cbd5e1;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.02em;
        }

        .admin-mobile-table tbody td:last-child {
            border-bottom: 0 !important;
        }

        .admin-mobile-table .admin-table-primary {
            grid-template-columns: 1fr;
        }

        .admin-mobile-table .admin-table-primary::before {
            margin-bottom: -0.25rem;
        }

        .admin-mobile-table .admin-row-actions {
            justify-content: flex-start;
        }

        .admin-mobile-table .admin-row-actions .btn,
        .admin-mobile-table .admin-row-actions form,
        .admin-mobile-table .admin-row-actions form .btn {
            flex: 1 1 44px;
        }

        .admin-mobile-table .admin-empty-row {
            display: block;
        }

        .admin-mobile-table .admin-empty-row td {
            display: block;
            text-align: center !important;
        }

        .admin-mobile-table .admin-empty-row td::before {
            content: none;
        }

        .text-truncate {
            max-width: 100% !important;
            white-space: normal !important;
            overflow: visible !important;
            text-overflow: clip !important;
        }

        .project-thumb {
            flex: 0 0 auto;
        }

        .modal-dialog,
        .modal-dialog.modal-lg {
            width: auto;
            max-width: none;
            margin: 0.5rem;
            min-height: calc(100dvh - 1rem);
        }

        .modal-content {
            max-height: calc(100dvh - 1rem);
        }

        .modal-header,
        .modal-body,
        .modal-footer {
            padding-inline: 1rem;
        }

        .modal-footer {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.5rem;
        }

        .modal-footer > * {
            width: 100%;
            margin: 0 !important;
        }

        .card-header-dark {
            align-items: stretch !important;
            flex-direction: column;
            gap: 0.75rem;
            padding: 14px 16px !important;
        }

        .card-header-dark .btn {
            width: 100%;
        }

        .schema-row,
        .snippet-row {
            padding: 14px;
        }

        .schema-row .row,
        .snippet-row .row {
            --bs-gutter-y: 0.75rem;
        }

        .schema-row .admin-remove-row,
        .snippet-row .admin-remove-row {
            width: 100%;
        }

        .main-content .row-cols-1 .card-custom .btn {
            width: 100%;
        }

        .admin-form-actions {
            display: grid !important;
            grid-template-columns: 1fr;
            gap: 0.75rem;
        }

        .admin-form-actions .btn,
        .admin-form-actions a {
            width: 100%;
            margin: 0 !important;
        }

        body.admin-login {
            min-height: 100dvh;
            align-items: flex-start;
            padding: max(16px, env(safe-area-inset-top)) 16px max(24px, env(safe-area-inset-bottom));
        }

        .admin-login .login-card {
            margin-block: auto;
            padding: 28px 20px;
            border-radius: 18px;
        }

        .admin-login .brand-logo {
            width: 56px;
            height: 56px;
            margin-bottom: 18px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            scroll-behavior: auto !important;
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }
</style>
