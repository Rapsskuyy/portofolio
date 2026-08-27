@extends('layouts.portfolio')

@section('title', 'Raffa Nur Musyaffa — Backend Architect & Systems Engineer | Cyber-Telemetry Cockpit')

@section('content')
    {{-- ==========================================================================
         PROGRESSIVE REVEAL COCKPIT: MASTER ASSEMBLY (SECTIONS 01 - 06)
         Authoritative Candidate: Raffa Nur Musyaffa (SMKN 1 Depok - PPLG)
         Design System: Cosmic Navy (#080D1A), Royal Cobalt (#2563EB), Trophy Gold (#FACC15)
         Iconography: Strict Zero-Emoji Standard (100% Lucide Vector Line Icons)
         ========================================================================== --}}

    {{-- 01. Hero Cockpit (Executive Hook & Real-Time Telemetry Status) --}}
    @include('portfolio.components.hero')

    {{-- 02. Honors & Merit Spotlight (Asymmetric Bento Grid: Gold Medal CS, Rank 1 Parallel, TOEIC) --}}
    @include('portfolio.components.honors')

    {{-- 03. Flagship Architecture Spotlight (Interactive E-Voting Kiosk TPS Deep Dive) --}}
    @include('portfolio.components.flagship')

    {{-- 04. Industrial Experience & MPK Leadership (Dual-Track Architecture & Legislative Governance) --}}
    @include('portfolio.components.experience')

    {{-- 05. Project Arsenal & 3D Spatial Lab (Native Kotlin Android, Fullstack Web, Blender 3D Simulations) --}}
    @include('portfolio.components.projects')

    {{-- 06. Engineering Toolkit & 2027 Scholarship Roadmap (Systems Matrix & Türkiye Bursları Horizon) --}}
    @include('portfolio.components.toolkit')
@endsection

@section('footer')
    {{-- 07. Command Center Telemetry Footer & Infinite Kinetic Double-Buffered Marquee Crawl --}}
    @include('portfolio.components.footer')
@endsection
