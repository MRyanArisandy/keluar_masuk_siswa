<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistem Izin Keluar Masuk Siswa - SMK Negeri 1</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Theme Mode Initializer (Prevent FOUC) -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (savedTheme === 'dark' || (!savedTheme && prefersDark) || (savedTheme === 'system' && prefersDark)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            transition: background-color 0.25s ease, color 0.25s ease;
        }
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        .toast-animate {
            animation: slideInRight 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        @media print {
            aside, header, button, .no-print {
                display: none !important;
            }
            body {
                background: white !important;
                color: black !important;
            }
            .print-area {
                width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
            }
        }

        /* ================================================================= */
        /* DARK MODE DYNAMIC OVERRIDES                                       */
        /* ================================================================= */
        html.dark {
            color-scheme: dark;
        }
        html.dark body {
            background-color: #0b0f19 !important;
            color: #f1f5f9 !important;
        }
        html.dark ::-webkit-scrollbar-track {
            background: #0f172a;
        }
        html.dark ::-webkit-scrollbar-thumb {
            background: #334155;
        }
        html.dark ::-webkit-scrollbar-thumb:hover {
            background: #475569;
        }
        html.dark #view-login {
            background-color: #0b0f19 !important;
        }
        html.dark .bg-white {
            background-color: #151d2e !important;
            color: #f8fafc !important;
        }
        html.dark .bg-slate-100 {
            background-color: #0b0f19 !important;
            color: #cbd5e1 !important;
        }
        html.dark .bg-slate-50,
        html.dark .bg-slate-50\/80,
        html.dark .bg-slate-50\/70,
        html.dark .bg-slate-50\/50,
        html.dark .bg-slate-50\/40,
        html.dark .bg-slate-50\/20 {
            background-color: #111827 !important;
            color: #cbd5e1 !important;
        }
        html.dark .bg-slate-200,
        html.dark .bg-slate-200\/80 {
            background-color: #1e293b !important;
            color: #94a3b8 !important;
        }
        html.dark .border-slate-100,
        html.dark .border-slate-200,
        html.dark .border-slate-200\/60,
        html.dark .border-slate-200\/70,
        html.dark .border-slate-200\/80,
        html.dark .border-slate-200\/90 {
            border-color: #1e293b !important;
        }
        html.dark .divide-slate-100 > :not([hidden]) ~ :not([hidden]),
        html.dark .divide-slate-200 > :not([hidden]) ~ :not([hidden]) {
            border-color: #1e293b !important;
        }
        html.dark .text-slate-800,
        html.dark .text-blue-900 {
            color: #f8fafc !important;
        }
        html.dark .text-slate-700 {
            color: #e2e8f0 !important;
        }
        html.dark .text-slate-600 {
            color: #cbd5e1 !important;
        }
        html.dark .text-slate-500 {
            color: #94a3b8 !important;
        }
        html.dark .text-slate-400 {
            color: #64748b !important;
        }
        html.dark header {
            background-color: #151d2e !important;
            border-color: #1e293b !important;
        }
        html.dark #sidebar {
            background-color: #0b0f19 !important;
            border-color: #1e293b !important;
        }
        html.dark input,
        html.dark select {
            background-color: #0f172a !important;
            border-color: #334155 !important;
            color: #f8fafc !important;
        }
        html.dark input:read-only {
            background-color: #1e293b !important;
            color: #94a3b8 !important;
        }
        html.dark .hover\:bg-slate-50:hover,
        html.dark .hover\:bg-slate-50\/70:hover,
        html.dark .hover\:bg-slate-50\/80:hover,
        html.dark .hover\:bg-slate-100:hover,
        html.dark .hover\:bg-slate-200:hover {
            background-color: #1e293b !important;
        }
        html.dark tr.bg-slate-50 {
            background-color: #111827 !important;
        }
        html.dark .shadow-sm,
        html.dark .shadow-md,
        html.dark .shadow-lg,
        html.dark .shadow-xl,
        html.dark .shadow-2xl {
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.5) !important;
        }
        html.dark #modal-calendar-day-detail > div,
        html.dark #modal-detail > div {
            background-color: #151d2e !important;
            border-color: #1e293b !important;
        }
        html.dark #notification-dropdown {
            background-color: #151d2e !important;
            border-color: #1e293b !important;
        }
        html.dark .bg-emerald-100 {
            background-color: rgba(6, 78, 59, 0.45) !important;
            color: #6ee7b7 !important;
            border-color: #065f46 !important;
        }
        html.dark .bg-amber-100 {
            background-color: rgba(120, 53, 15, 0.45) !important;
            color: #fcd34d !important;
            border-color: #78350f !important;
        }
        html.dark .bg-rose-100 {
            background-color: rgba(136, 19, 55, 0.45) !important;
            color: #fda4af !important;
            border-color: #881337 !important;
        }
        html.dark .bg-blue-100 {
            background-color: rgba(30, 58, 138, 0.45) !important;
            color: #93c5fd !important;
            border-color: #1e3a8a !important;
        }
        html.dark .bg-emerald-50 {
            background-color: rgba(6, 78, 59, 0.25) !important;
            border-color: #065f46 !important;
            color: #a7f3d0 !important;
        }
        html.dark .bg-amber-50 {
            background-color: rgba(120, 53, 15, 0.25) !important;
            border-color: #78350f !important;
            color: #fde68a !important;
        }
        html.dark .bg-blue-50 {
            background-color: rgba(30, 58, 138, 0.25) !important;
            border-color: #1e3a8a !important;
            color: #bfdbfe !important;
        }
        html.dark .bg-rose-50 {
            background-color: rgba(136, 19, 55, 0.25) !important;
            border-color: #881337 !important;
            color: #fecdd3 !important;
        }
    </style>
</head>
<body class="bg-slate-100 text-slate-800 antialiased min-h-screen">

    <!-- CONTAINER TOAST NOTIFICATION -->
    <div id="toast-container" class="fixed top-5 right-5 z-[100] flex flex-col space-y-3 max-w-sm w-full pointer-events-none"></div>

    <!-- ================================================================= -->
    <!-- 1. HALAMAN LOGIN (Foto 3)                                         -->
    <!-- ================================================================= -->
    <div id="view-login" class="min-h-screen flex items-center justify-center p-4 bg-slate-100 relative">
        <!-- Floating Theme Switcher on Login Page -->
        <div class="fixed top-5 right-5 z-40">
            <button onclick="toggleTheme()" class="px-3.5 py-2 bg-white/90 backdrop-blur-md border border-slate-200 rounded-2xl shadow-lg hover:bg-white text-slate-700 transition-all flex items-center space-x-2 text-xs font-bold" title="Ubah Tema (Terang / Gelap)">
                <i id="theme-login-icon" data-lucide="moon" class="w-4 h-4 text-blue-600"></i>
                <span id="theme-login-label">Mode Gelap</span>
            </button>
        </div>

        <div class="bg-white rounded-3xl shadow-2xl border border-slate-200/80 max-w-4xl w-full overflow-hidden grid grid-cols-1 md:grid-cols-2">

            <!-- LEFT PANEL: Branding & School Illustration -->
            <div class="bg-slate-50/80 p-8 flex flex-col justify-between items-center text-center border-b md:border-b-0 md:border-r border-slate-200/80">
                <div class="w-full pt-4">
                    <div class="w-14 h-14 rounded-2xl bg-blue-600 text-white flex items-center justify-center mx-auto mb-4 shadow-lg shadow-blue-600/30">
                        <i data-lucide="graduation-cap" class="w-8 h-8"></i>
                    </div>
                    <h1 class="text-lg md:text-xl font-extrabold text-slate-800 tracking-tight leading-tight uppercase">
                        SISTEM IZIN<br>KELUAR MASUK SISWA
                    </h1>
                    <p class="text-xs font-semibold text-slate-400 mt-1 uppercase tracking-wider">SMK NEGERI 1</p>
                </div>

                <div class="my-6 w-full max-w-[260px]">
                    <img src="/images/school_illustration.png" alt="SMK Negeri 1" class="w-full h-auto rounded-2xl shadow-sm border border-slate-200/60 object-cover" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1562774053-701939374585?w=500&q=80'">
                </div>

                <div class="text-[11px] text-slate-400 font-medium pb-2">
                    © 2025 SMK Negeri 1. All rights reserved.
                </div>
            </div>

            <!-- RIGHT PANEL: Role Selector & Login Form -->
            <div class="p-6 md:p-8 flex flex-col justify-center">
                <div class="text-center mb-5">
                    <h2 class="text-xs font-bold text-slate-700 tracking-wide uppercase mb-3">Pilih Jenis Login</h2>

                    <div class="grid grid-cols-3 gap-2">
                        <button id="login-tab-siswa" type="button" onclick="selectLoginRole('siswa')" class="flex flex-col items-center justify-center p-2.5 rounded-xl border transition-all bg-blue-50 border-blue-500 text-blue-600 font-bold shadow-sm">
                            <i data-lucide="user-round" class="w-5 h-5 mb-1"></i>
                            <span class="text-xs">Siswa</span>
                        </button>
                        <button id="login-tab-guru" type="button" onclick="selectLoginRole('guru')" class="flex flex-col items-center justify-center p-2.5 rounded-xl border border-slate-200 bg-white text-slate-500 font-semibold hover:bg-slate-50 transition-all">
                            <i data-lucide="briefcase" class="w-5 h-5 mb-1"></i>
                            <span class="text-xs">Guru Piket</span>
                        </button>
                        <button id="login-tab-admin" type="button" onclick="selectLoginRole('admin')" class="flex flex-col items-center justify-center p-2.5 rounded-xl border border-slate-200 bg-white text-slate-500 font-semibold hover:bg-slate-50 transition-all">
                            <i data-lucide="shield" class="w-5 h-5 mb-1"></i>
                            <span class="text-xs">Admin</span>
                        </button>
                    </div>
                </div>

                <div class="bg-slate-50/70 rounded-2xl border border-slate-200/90 p-5 shadow-sm">
                    <div class="mb-4">
                        <h3 id="login-form-title" class="text-base font-extrabold text-slate-800">Login Siswa</h3>
                        <p id="login-form-sub" class="text-xs text-slate-500 font-medium">Silakan login menggunakan NISN dan password Anda</p>
                    </div>

                    <form onsubmit="handleLoginSubmit(event)" class="space-y-3.5 text-xs">
                        <div>
                            <label id="label-field-id" class="block font-bold text-slate-700 mb-1">NISN</label>
                            <input type="text" id="input-username" required placeholder="Masukkan NISN" value="0076543210" class="w-full p-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 font-semibold text-slate-800">
                        </div>

                        <div>
                            <label class="block font-bold text-slate-700 mb-1">Password</label>
                            <input type="password" id="input-password" required placeholder="Masukkan password" value="123456" class="w-full p-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 font-semibold text-slate-800">
                        </div>

                        <div class="text-right">
                            <a href="#" onclick="showToast('info', 'Reset Password', 'Silakan hubungi Guru Piket atau Administrator sekolah.')" class="text-[11px] font-semibold text-blue-600 hover:underline">
                                Lupa password?
                            </a>
                        </div>

                        <button type="button" onclick="handleLoginSubmit(event)" id="btn-submit-login" class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-600/25 transition-all text-xs">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- ================================================================= -->
    <!-- 2. DASHBOARD MAIN APP                                             -->
    <!-- ================================================================= -->
    <div id="view-dashboard" class="hidden min-h-screen flex flex-col md:flex-row">

        <!-- Sidebar Navigation -->
        <aside id="sidebar" class="fixed md:static inset-y-0 left-0 z-50 w-64 bg-[#1e2530] text-slate-300 flex flex-col justify-between transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out shrink-0 min-h-screen border-r border-slate-800/50 shadow-xl md:shadow-none">
            <div>
                <div class="p-6 text-center border-b border-slate-800/80 flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full bg-slate-800 border-2 border-slate-700/80 flex items-center justify-center text-white mb-3 shadow-inner">
                        <i data-lucide="graduation-cap" class="w-8 h-8 text-blue-400"></i>
                    </div>
                    <h2 class="font-bold text-base text-white tracking-wide">SMK NEGERI 1</h2>
                    <p class="text-xs text-slate-400 font-medium mt-0.5">Sistem Perizinan Siswa</p>
                </div>

                <!-- SIDEBAR MENU: SISWA ONLY -->
                <nav id="sidebar-siswa" class="p-4 space-y-1.5 font-medium text-sm hidden">
                    <a href="#" onclick="switchTab('siswa-dashboard', event)" id="nav-siswa-dashboard" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-xl bg-blue-600 text-white font-semibold shadow-lg shadow-blue-600/25 transition-all">
                        <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="#" onclick="switchTab('siswa-ajukan', event)" id="nav-siswa-ajukan" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800/70 hover:text-white transition-all">
                        <i data-lucide="plus-circle" class="w-5 h-5"></i>
                        <span>Ajukan Izin</span>
                    </a>
                    <a href="#" onclick="switchTab('siswa-riwayat', event)" id="nav-siswa-riwayat" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800/70 hover:text-white transition-all">
                        <i data-lucide="history" class="w-5 h-5"></i>
                        <span>Riwayat Izin</span>
                    </a>
                    <a href="#" onclick="switchTab('siswa-konfirmasi', event)" id="nav-siswa-konfirmasi" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800/70 hover:text-white transition-all">
                        <i data-lucide="check-circle-2" class="w-5 h-5"></i>
                        <span>Konfirmasi Kembali</span>
                    </a>
                    <a href="#" onclick="switchTab('siswa-profil', event)" id="nav-siswa-profil" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800/70 hover:text-white transition-all">
                        <i data-lucide="user" class="w-5 h-5"></i>
                        <span>Profil</span>
                    </a>
                </nav>

                <!-- SIDEBAR MENU: GURU PIKET ONLY -->
                <nav id="sidebar-guru" class="p-4 space-y-1.5 font-medium text-sm hidden">
                    <a href="#" onclick="switchTab('guru-dashboard', event)" id="nav-guru-dashboard" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-xl bg-blue-600 text-white font-semibold shadow-lg shadow-blue-600/25 transition-all">
                        <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                        <span>Persetujuan Izin</span>
                    </a>
                    <a href="#" onclick="switchTab('guru-aktif', event)" id="nav-guru-aktif" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800/70 hover:text-white transition-all">
                        <i data-lucide="person-standing" class="w-5 h-5"></i>
                        <span>Siswa Di Luar</span>
                    </a>
                    <a href="#" onclick="switchTab('guru-laporan', event)" id="nav-guru-laporan" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800/70 hover:text-white transition-all">
                        <i data-lucide="calendar" class="w-5 h-5"></i>
                        <span>Kalender Laporan</span>
                    </a>
                </nav>

                <!-- SIDEBAR MENU: ADMIN ONLY -->
                <nav id="sidebar-admin" class="p-4 space-y-1.5 font-medium text-sm hidden">
                    <a href="#" onclick="switchTab('admin-dashboard', event)" id="nav-admin-dashboard" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-xl bg-blue-600 text-white font-semibold shadow-lg shadow-blue-600/25 transition-all">
                        <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="#" onclick="switchTab('admin-siswa', event)" id="nav-admin-siswa" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800/70 hover:text-white transition-all">
                        <i data-lucide="users" class="w-5 h-5"></i>
                        <span>Kelola Siswa</span>
                    </a>
                    <a href="#" onclick="switchTab('admin-guru', event)" id="nav-admin-guru" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800/70 hover:text-white transition-all">
                        <i data-lucide="user-check" class="w-5 h-5"></i>
                        <span>Kelola Guru</span>
                    </a>
                    <a href="#" onclick="switchTab('admin-kelas', event)" id="nav-admin-kelas" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800/70 hover:text-white transition-all">
                        <i data-lucide="school" class="w-5 h-5"></i>
                        <span>Kelola Kelas</span>
                    </a>
                    <a href="#" onclick="switchTab('admin-laporan', event)" id="nav-admin-laporan" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800/70 hover:text-white transition-all">
                        <i data-lucide="file-text" class="w-5 h-5"></i>
                        <span>Rekap Laporan</span>
                    </a>
                    <a href="#" onclick="switchTab('admin-pengaturan', event)" id="nav-admin-pengaturan" class="nav-item flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800/70 hover:text-white transition-all">
                        <i data-lucide="settings" class="w-5 h-5"></i>
                        <span>Pengaturan</span>
                    </a>
                </nav>
            </div>

            <div class="p-4 border-t border-slate-800/80">
                <button onclick="handleLogout()" class="w-full flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-rose-500/10 hover:text-rose-400 transition-all font-medium text-sm">
                    <i data-lucide="log-out" class="w-5 h-5"></i>
                    <span>Logout</span>
                </button>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-w-0">

            <!-- Top Header Navbar -->
            <header class="bg-white border-b border-slate-200 px-6 py-4 flex items-center justify-between shadow-sm sticky top-0 z-30">
                <div class="flex items-center space-x-3">
                    <button onclick="toggleSidebar()" class="md:hidden p-2 rounded-lg bg-slate-100 text-slate-600">
                        <i data-lucide="menu" class="w-5 h-5"></i>
                    </button>
                    <h1 class="text-base md:text-lg font-extrabold text-blue-900 tracking-tight uppercase">
                        SISTEM IZIN KELUAR MASUK SISWA
                    </h1>
                </div>

                <div class="flex items-center space-x-3 sm:space-x-4">

                    <!-- THEME TOGGLE BUTTON (Terang / Gelap) -->
                    <button id="btn-theme-toggle" onclick="toggleTheme()" class="p-2.5 text-slate-500 hover:text-slate-700 rounded-full hover:bg-slate-100 transition-all focus:outline-none" title="Ubah Tema (Terang / Gelap)">
                        <i id="theme-toggle-icon" data-lucide="moon" class="w-5 h-5"></i>
                    </button>

                    <!-- NOTIFICATION BELL CONTAINER -->
                    <div class="relative">
                        <button id="btn-notification-bell" onclick="toggleNotificationDropdown(event)" class="relative p-2.5 text-slate-500 hover:text-slate-700 rounded-full hover:bg-slate-100 transition-all focus:outline-none" title="Notifikasi">
                            <i data-lucide="bell" class="w-5 h-5"></i>
                            <span id="notif-badge-dot" class="absolute top-1.5 right-1.5 w-2.5 h-2.5 bg-rose-500 rounded-full ring-2 ring-white animate-pulse"></span>
                        </button>

                        <!-- NOTIFICATION DROPDOWN POPOVER -->
                        <div id="notification-dropdown" class="hidden absolute right-0 mt-2 w-80 sm:w-88 bg-white rounded-2xl shadow-2xl border border-slate-100 py-2 z-50 overflow-hidden">
                            <div class="px-4 py-3 border-b border-slate-100 flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <h3 class="font-extrabold text-sm text-slate-800">Notifikasi Status Izin</h3>
                                    <span id="notif-count-badge" class="px-2 py-0.5 bg-blue-100 text-blue-700 text-[10px] font-bold rounded-full">1 Baru</span>
                                </div>
                                <button onclick="markAllNotificationsRead()" class="text-[11px] font-bold text-blue-600 hover:underline">
                                    Tandai dibaca
                                </button>
                            </div>

                            <div class="p-3.5 hover:bg-slate-50/80 transition-colors flex items-start space-x-3 cursor-pointer text-xs" onclick="switchTab(loggedUserRole === 'siswa' ? 'siswa-dashboard' : 'guru-dashboard')">
                                <div id="notif-icon-bg" class="w-9 h-9 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                                    <i data-lucide="clock" class="w-5 h-5"></i>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-0.5">
                                        <span id="notif-item-title" class="font-extrabold text-slate-800">Pengajuan Izin PENDING</span>
                                        <span id="notif-item-time" class="text-[10px] text-slate-400 font-medium">Baru saja</span>
                                    </div>
                                    <p id="notif-item-desc" class="text-slate-500 leading-snug">Pengajuan izin keluar Anda sedang menunggu persetujuan guru piket.</p>
                                </div>
                            </div>

                            <div class="p-2.5 border-t border-slate-100 text-center bg-slate-50/50">
                                <span id="notif-footer-sub" class="text-[10px] font-semibold text-slate-400">Notifikasi khusus status akun Anda</span>
                            </div>
                        </div>
                    </div>

                    <!-- User Profile Pill -->
                    <div class="flex items-center space-x-2.5 p-1.5 pr-3.5 rounded-full bg-slate-50 border border-slate-200">
                        <div id="user-avatar-badge" class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-xs shadow">
                            AS
                        </div>
                        <div>
                            <div id="logged-user-name" class="text-xs font-bold text-slate-800 leading-tight">Andi Saputra</div>
                            <div id="logged-user-role" class="text-[10px] text-slate-400 font-medium">Siswa</div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Main Workspace -->
            <main class="flex-1 p-6 md:p-8 overflow-y-auto print-area">

                <!-- ------------------------------------------------------------- -->
                <!-- A. DASHBOARD VIEW: SISWA ONLY                                 -->
                <!-- ------------------------------------------------------------- -->
                <div id="tab-siswa-dashboard" class="tab-content hidden space-y-6">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <h2 class="text-2xl md:text-3xl font-extrabold text-slate-800 tracking-tight flex items-center gap-2">
                                <span>Selamat Datang, Andi Saputra</span>
                                <span class="inline-block">👋</span>
                            </h2>
                            <p class="text-sm font-semibold text-slate-400 mt-1">XII RPL • NISN 0076543210</p>
                        </div>
                        <button id="btn-ajukan-baru-dashboard" onclick="handleKlikAjukanIzin()" class="inline-flex items-center justify-center space-x-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow-lg shadow-blue-600/25 text-xs font-bold transition-all">
                            <i data-lucide="plus" class="w-4 h-4"></i>
                            <span id="btn-ajukan-text">+ Ajukan Izin Baru</span>
                        </button>
                    </div>

                    <!-- ACTIVE PERMIT NOTICE BANNER (Siswa Dashboard) -->
                    <div id="siswa-active-permit-banner" class="hidden p-4 rounded-2xl border flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 text-xs transition-all shadow-sm">
                        <div class="flex items-start space-x-3.5">
                            <div id="banner-icon-bg" class="p-2 rounded-xl shrink-0 mt-0.5">
                                <i id="banner-icon" data-lucide="info" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 id="banner-title" class="font-extrabold text-sm mb-0.5"></h4>
                                <p id="banner-desc" class="font-medium leading-relaxed"></p>
                            </div>
                        </div>
                        <div id="banner-action-area" class="shrink-0 self-end sm:self-auto"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                        <div class="bg-white rounded-xl p-5 border border-slate-200/90 shadow-sm">
                            <div class="text-xs font-bold text-slate-400 tracking-wider uppercase mb-2">STATUS IZIN SAAT INI</div>
                            <div class="mb-2">
                                <span id="siswa-status-badge" class="inline-block px-3 py-1 text-xs font-bold rounded-md bg-amber-100 text-amber-700 border border-amber-200">
                                    PENDING
                                </span>
                            </div>
                            <p id="siswa-status-subtext" class="text-xs text-slate-500 font-medium mb-3">Menunggu persetujuan guru piket</p>
                            <a href="#" onclick="openCurrentDetailSiswa()" class="inline-flex items-center text-xs font-bold text-blue-600 hover:underline">
                                <span>Lihat Detail</span>
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5 ml-1"></i>
                            </a>
                        </div>

                        <div class="bg-white rounded-xl p-5 border border-slate-200/90 shadow-sm">
                            <div class="flex items-center space-x-2 text-xs font-bold text-slate-400 tracking-wider uppercase mb-2">
                                <i data-lucide="clock" class="w-4 h-4 text-blue-500"></i>
                                <span>JAM KELUAR</span>
                            </div>
                            <div id="siswa-jam-keluar-card" class="text-3xl font-extrabold text-slate-800 tracking-tight mb-1">10:15</div>
                            <div id="siswa-tanggal-card" class="text-xs text-slate-400 font-medium">16 Juni 2025</div>
                        </div>

                        <div class="bg-white rounded-xl p-5 border border-slate-200/90 shadow-sm">
                            <div class="flex items-center space-x-2 text-xs font-bold text-slate-400 tracking-wider uppercase mb-2">
                                <i data-lucide="history" class="w-4 h-4 text-amber-500"></i>
                                <span>PERKIRAAN KEMBALI</span>
                            </div>
                            <div id="siswa-jam-kembali-card" class="text-3xl font-extrabold text-slate-800 tracking-tight mb-1">12:00</div>
                            <div class="text-xs text-slate-400 font-medium">16 Juni 2025</div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200/90 shadow-sm overflow-hidden">
                        <div class="p-5 flex items-center justify-between border-b border-slate-100">
                            <h3 class="text-base font-bold text-slate-800">Riwayat Izin Terakhir</h3>
                            <a href="#" onclick="switchTab('siswa-riwayat', event)" class="text-xs font-semibold text-blue-600 hover:underline">Lihat Semua</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-xs border-collapse">
                                <thead>
                                    <tr class="bg-slate-50 text-slate-400 font-bold border-b border-slate-200">
                                        <th class="py-3.5 px-5">Tanggal</th>
                                        <th class="py-3.5 px-5">Alasan</th>
                                        <th class="py-3.5 px-5">Jam Keluar</th>
                                        <th class="py-3.5 px-5 text-center">Status</th>
                                        <th class="py-3.5 px-5 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="siswa-table-body" class="divide-y divide-slate-100 text-slate-700 font-medium">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- SISWA SUB-PAGE 2: FORM AJUKAN IZIN KELUAR -->
                <div id="tab-siswa-ajukan" class="tab-content hidden space-y-6">
                    <div class="space-y-3">
                        <button onclick="switchTab('siswa-dashboard')" class="inline-flex items-center text-xs font-semibold text-blue-600 hover:text-blue-700 transition-colors">
                            <i data-lucide="arrow-left" class="w-4 h-4 mr-1"></i>
                            <span>Kembali</span>
                        </button>
                        <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Ajukan Izin Keluar</h2>
                    </div>

                    <!-- BLOCKED STATE ALERT (Tampil jika siswa masih memiliki izin PENDING atau DISETUJUI) -->
                    <div id="container-ajukan-blocked" class="hidden bg-white rounded-2xl border border-slate-200/90 p-6 md:p-8 shadow-sm space-y-6">
                        <div class="flex items-start space-x-4">
                            <div id="blocked-icon-box" class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center shrink-0 shadow-sm mt-0.5">
                                <i data-lucide="shield-alert" class="w-6 h-6"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex flex-wrap items-center gap-2 mb-1">
                                    <h3 class="text-lg font-extrabold text-slate-800">Pengajuan Izin Baru Dinonaktifkan</h3>
                                    <span id="blocked-status-badge" class="px-2.5 py-0.5 rounded-md text-[11px] font-bold bg-amber-100 text-amber-700 border border-amber-200">
                                        PENDING
                                    </span>
                                </div>
                                <p id="blocked-message-desc" class="text-xs text-slate-600 font-medium leading-relaxed">
                                    Anda masih memiliki pengajuan izin keluar yang belum selesai. Untuk mencegah penumpukan antrean dan penyalahgunaan izin ganda, Anda tidak dapat mengajukan izin baru.
                                </p>
                            </div>
                        </div>

                        <!-- Active permit info box -->
                        <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-4 text-xs space-y-3">
                            <div class="font-bold text-slate-700 flex items-center justify-between border-b border-slate-200/60 pb-2">
                                <span>Detail Izin yang Sedang Berjalan:</span>
                                <span id="blocked-permit-date" class="text-slate-500 font-medium">16 Juni 2025</span>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <div>
                                    <span class="text-slate-400 block text-[11px]">Alasan / Keperluan:</span>
                                    <span id="blocked-permit-alasan" class="font-bold text-slate-800">Keperluan Keluarga</span>
                                </div>
                                <div>
                                    <span class="text-slate-400 block text-[11px]">Waktu Izin:</span>
                                    <span id="blocked-permit-jam" class="font-bold text-slate-800">10:15 - 12:00 WIB</span>
                                </div>
                            </div>
                        </div>

                        <!-- Action buttons according to status -->
                        <div id="blocked-action-container" class="flex flex-col sm:flex-row items-center gap-3 pt-2">
                            <button id="btn-blocked-konfirmasi" onclick="switchTab('siswa-konfirmasi')" class="w-full sm:w-auto px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl font-bold text-xs shadow-md shadow-emerald-600/20 transition-all flex items-center justify-center space-x-1.5">
                                <i data-lucide="check-circle" class="w-4 h-4"></i>
                                <span>Konfirmasi Tiba di Sekolah</span>
                            </button>
                            <button id="btn-blocked-batal" onclick="handleBatalPendingActivePermit()" class="w-full sm:w-auto px-5 py-2.5 bg-rose-600 hover:bg-rose-700 text-white rounded-xl font-bold text-xs shadow-md shadow-rose-600/20 transition-all flex items-center justify-center space-x-1.5">
                                <i data-lucide="x-circle" class="w-4 h-4"></i>
                                <span>Batalkan Pengajuan Izin Ini</span>
                            </button>
                            <button onclick="switchTab('siswa-dashboard')" class="w-full sm:w-auto px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-semibold text-xs transition-colors">
                                Kembali ke Dashboard
                            </button>
                        </div>
                    </div>

                    <!-- CONTAINER FORM (Hanya tampil jika TIDAK ada izin aktif) -->
                    <div id="container-form-ajukan" class="bg-white rounded-2xl border border-slate-200/90 p-6 md:p-8 shadow-sm">
                        <form onsubmit="handleFormKirimPermohonan(event)" class="space-y-5 text-xs">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block font-medium text-slate-600 mb-1.5">Nama</label>
                                    <input type="text" id="form-nama-siswa" value="Andi Saputra" readonly class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-700 font-semibold focus:outline-none">
                                </div>
                                <div>
                                    <label class="block font-medium text-slate-600 mb-1.5">Kelas</label>
                                    <input type="text" id="form-kelas-siswa" value="XII RPL" readonly class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-700 font-semibold focus:outline-none">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                                <div>
                                    <label class="block font-medium text-slate-600 mb-1.5">Tanggal</label>
                                    <div class="relative">
                                        <input type="text" id="form-tanggal" value="06/16/2025" required class="w-full p-3 pr-10 bg-white border border-slate-200 rounded-xl text-slate-800 font-semibold focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                                        <i data-lucide="calendar" class="w-4 h-4 text-slate-400 absolute right-3.5 top-3.5"></i>
                                    </div>
                                </div>
                                <div>
                                    <label class="block font-medium text-slate-600 mb-1.5">Jam Keluar</label>
                                    <div class="relative">
                                        <input type="text" id="form-jam-keluar" value="10:15 AM" required class="w-full p-3 pr-10 bg-white border border-slate-200 rounded-xl text-slate-800 font-semibold focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                                        <i data-lucide="clock" class="w-4 h-4 text-slate-400 absolute right-3.5 top-3.5"></i>
                                    </div>
                                </div>
                                <div>
                                    <label class="block font-medium text-slate-600 mb-1.5">Perkiraan Jam Kembali</label>
                                    <div class="relative">
                                        <input type="text" id="form-jam-kembali" value="12:00 PM" required class="w-full p-3 pr-10 bg-white border border-slate-200 rounded-xl text-slate-800 font-semibold focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                                        <i data-lucide="clock" class="w-4 h-4 text-slate-400 absolute right-3.5 top-3.5"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block font-medium text-slate-600 mb-1.5">Alasan / Keperluan</label>
                                    <div class="relative">
                                        <select id="form-alasan-select" required class="w-full p-3 pr-10 bg-white border border-slate-200 rounded-xl text-slate-800 font-semibold focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 appearance-none">
                                            <option value="Keperluan Keluarga">Keperluan Keluarga</option>
                                            <option value="Keperluan Berobat">Keperluan Berobat</option>
                                            <option value="Keperluan Pribadi">Keperluan Pribadi</option>
                                            <option value="Mengantar Orang Tua">Mengantar Orang Tua</option>
                                            <option value="Tugas / Lomba Sekolah">Tugas / Lomba Sekolah</option>
                                        </select>
                                        <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 absolute right-3.5 top-3.5 pointer-events-none"></i>
                                    </div>
                                </div>
                                <div>
                                    <label class="block font-medium text-slate-600 mb-1.5">Keterangan (Opsional)</label>
                                    <input type="text" id="form-keterangan" value="Ada keperluan mendesak di luar sekolah." class="w-full p-3 bg-white border border-slate-200 rounded-xl text-slate-800 font-medium focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                                </div>
                            </div>

                            <div class="pt-4 flex justify-end space-x-3">
                                <button type="button" onclick="switchTab('siswa-dashboard')" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl font-semibold transition-colors">
                                    Batal
                                </button>
                                <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-md shadow-blue-600/20 transition-all">
                                    Kirim Permohonan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="tab-siswa-riwayat" class="tab-content hidden space-y-6">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-800">Riwayat Perizinan Lengkap</h2>
                        <p class="text-xs text-slate-500">Daftar riwayat perizinan keluar siswa (urut terbaru ke terlama)</p>
                    </div>
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                        <table class="w-full text-left text-xs border-collapse">
                            <thead>
                                <tr class="bg-slate-50 text-slate-400 font-bold border-b border-slate-200">
                                    <th class="py-3.5 px-5">Tanggal</th>
                                    <th class="py-3.5 px-5">Alasan</th>
                                    <th class="py-3.5 px-5">Jam Keluar</th>
                                    <th class="py-3.5 px-5">Perkiraan Kembali</th>
                                    <th class="py-3.5 px-5 text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody id="siswa-riwayat-table-body" class="divide-y divide-slate-100 font-medium">
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- SISWA SUB-PAGE 4: KONFIRMASI KEMBALI -->
                <div id="tab-siswa-konfirmasi" class="tab-content hidden space-y-6">
                    <div class="max-w-md bg-white rounded-3xl p-6 md:p-8 border border-slate-200/90 shadow-sm text-center space-y-5 mx-auto">
                        <div id="konfirmasi-icon-badge" class="w-16 h-16 bg-emerald-50 text-emerald-600 rounded-full flex items-center justify-center mx-auto shadow-inner border border-emerald-100">
                            <i data-lucide="check-circle-2" class="w-8 h-8"></i>
                        </div>

                        <div>
                            <h2 id="konfirmasi-card-title" class="text-xl font-extrabold text-slate-800 tracking-tight">Konfirmasi Kembali ke Sekolah</h2>
                            <p id="konfirmasi-card-sub" class="text-xs text-slate-500 mt-1 font-medium leading-relaxed">
                                Klik tombol di bawah ini jika Anda sudah kembali di lingkungan sekolah SMK Negeri 1.
                            </p>
                        </div>

                        <div class="bg-slate-50 p-4 rounded-2xl text-left text-xs space-y-2.5 border border-slate-200/70">
                            <div class="flex justify-between items-center">
                                <span class="text-slate-400 font-semibold">Status Izin:</span>
                                <span id="konfirmasi-status-text" class="font-extrabold px-2.5 py-0.5 rounded text-[11px] bg-emerald-100 text-emerald-700 border border-emerald-200">
                                    DISETUJUI
                                </span>
                            </div>
                            <div class="flex justify-between items-center border-t border-slate-100 pt-2">
                                <span class="text-slate-400 font-semibold">Jam Keluar:</span>
                                <span id="konfirmasi-jam-keluar" class="font-bold text-slate-700">10:15 WIB</span>
                            </div>
                            <div class="flex justify-between items-center border-t border-slate-100 pt-2">
                                <span class="text-slate-400 font-semibold">Perkiraan Kembali:</span>
                                <span id="konfirmasi-jam-kembali" class="font-bold text-slate-700">12:00 WIB</span>
                            </div>
                        </div>

                        <button id="btn-action-konfirmasi-kembali" onclick="handleKonfirmasiKembaliSiswaAction()" class="w-full py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold rounded-2xl shadow-lg shadow-emerald-600/25 text-xs transition-all flex items-center justify-center space-x-2">
                            <i data-lucide="check-circle" class="w-4 h-4"></i>
                            <span>Konfirmasi Saya Sudah Kembali</span>
                        </button>
                    </div>
                </div>

                <div id="tab-siswa-profil" class="tab-content hidden space-y-6">
                    <div class="max-w-md bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-4 mx-auto">
                        <div class="flex items-center space-x-4 border-b border-slate-100 pb-4">
                            <div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center font-extrabold text-xl shadow-md">
                                AS
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-slate-800">Andi Saputra</h2>
                                <p class="text-xs text-slate-400 font-medium">Siswa Aktif • XII RPL</p>
                            </div>
                        </div>
                        <div class="space-y-3 text-xs">
                            <div class="flex justify-between py-1 border-b border-slate-50">
                                <span class="text-slate-400">NISN:</span>
                                <span class="font-bold text-slate-700">0076543210</span>
                            </div>
                            <div class="flex justify-between py-1 border-b border-slate-50">
                                <span class="text-slate-400">Kelas & Jurusan:</span>
                                <span class="font-bold text-slate-700">XII RPL (Rekayasa Perangkat Lunak)</span>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- ------------------------------------------------------------- -->
                <!-- B. DASHBOARD VIEW: GURU PIKET ONLY                            -->
                <!-- ------------------------------------------------------------- -->
                <div id="tab-guru-dashboard" class="tab-content hidden space-y-6">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <h2 class="text-2xl font-extrabold text-slate-800">Panel Persetujuan Guru Piket</h2>
                            <p class="text-xs text-slate-500 font-medium">Verifikasi dan setujui permohonan izin keluar siswa hari ini.</p>
                        </div>
                        <span id="guru-pending-badge-count" class="px-3.5 py-1.5 bg-amber-100 text-amber-700 border border-amber-200 rounded-xl text-xs font-extrabold self-start sm:self-auto shadow-sm">
                            2 Permohonan Menunggu
                        </span>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-xs border-collapse">
                                <thead>
                                    <tr class="bg-slate-50 text-slate-400 font-bold border-b border-slate-200">
                                        <th class="py-3.5 px-5">Nama Siswa</th>
                                        <th class="py-3.5 px-5">Kelas</th>
                                        <th class="py-3.5 px-5">Alasan</th>
                                        <th class="py-3.5 px-5">Jam Keluar</th>
                                        <th class="py-3.5 px-5 text-center">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody id="guru-pending-table-body" class="divide-y divide-slate-100 font-medium">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="tab-guru-aktif" class="tab-content hidden space-y-6">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <h2 class="text-2xl font-extrabold text-slate-800">Siswa Sedang Di Luar Sekolah</h2>
                            <p class="text-xs text-slate-500 font-medium">Daftar siswa yang izin keluarnya telah DISETUJUI dan sedang di luar.</p>
                        </div>
                        <span id="guru-aktif-badge-count" class="px-3.5 py-1.5 bg-emerald-100 text-emerald-700 border border-emerald-200 rounded-xl text-xs font-extrabold self-start sm:self-auto shadow-sm">
                            1 Siswa Di Luar
                        </span>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-xs border-collapse">
                                <thead>
                                    <tr class="bg-slate-50 text-slate-400 font-bold border-b border-slate-200">
                                        <th class="py-3.5 px-5">Nama Siswa</th>
                                        <th class="py-3.5 px-5">Kelas</th>
                                        <th class="py-3.5 px-5">Alasan</th>
                                        <th class="py-3.5 px-5">Jam Keluar</th>
                                        <th class="py-3.5 px-5">Perkiraan Kembali</th>
                                        <th class="py-3.5 px-5 text-center">Status</th>
                                        <th class="py-3.5 px-5 text-center">Konfirmasi Tiba</th>
                                    </tr>
                                </thead>
                                <tbody id="guru-aktif-table-body" class="divide-y divide-slate-100 font-medium">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="tab-guru-laporan" class="tab-content hidden space-y-6">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <h2 class="text-2xl font-extrabold text-slate-800">Kalender Rekapitulasi Izin Siswa</h2>
                            <p class="text-xs text-slate-500 font-medium">Klik tanggal pada kalender untuk melihat seluruh siswa yang izin pada hari tersebut.</p>
                        </div>

                        <div class="flex items-center space-x-2 no-print">
                            <div class="flex items-center bg-slate-200/80 p-1 rounded-xl text-xs font-bold">
                                <button id="btn-view-calendar" onclick="setLaporanViewMode('calendar')" class="px-3 py-1.5 rounded-lg bg-white text-blue-600 shadow-sm transition-all flex items-center space-x-1.5">
                                    <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                                    <span>Tampilan Kalender</span>
                                </button>
                                <button id="btn-view-table" onclick="setLaporanViewMode('table')" class="px-3 py-1.5 rounded-lg text-slate-600 transition-all flex items-center space-x-1.5">
                                    <i data-lucide="table" class="w-3.5 h-3.5"></i>
                                    <span>Tampilan Tabel</span>
                                </button>
                            </div>

                            <button onclick="window.print()" class="px-4 py-2 bg-slate-800 hover:bg-slate-900 text-white rounded-xl text-xs font-bold flex items-center space-x-2 shadow-sm transition-all">
                                <i data-lucide="printer" class="w-4 h-4"></i>
                                <span>Cetak</span>
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm">
                            <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">TOTAL IZIN SEMESTER INI</div>
                            <div id="rekap-stat-total" class="text-2xl font-extrabold text-slate-800 mt-1">142</div>
                        </div>
                        <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm">
                            <div class="text-[11px] font-bold text-emerald-600 uppercase tracking-wider">IZIN DISETUJUI</div>
                            <div id="rekap-stat-disetujui" class="text-2xl font-extrabold text-emerald-700 mt-1">118</div>
                        </div>
                        <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm">
                            <div class="text-[11px] font-bold text-rose-600 uppercase tracking-wider">IZIN DITOLAK</div>
                            <div id="rekap-stat-ditolak" class="text-2xl font-extrabold text-rose-700 mt-1">24</div>
                        </div>
                        <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm">
                            <div class="text-[11px] font-bold text-blue-600 uppercase tracking-wider">SISWA SUDAH KEMBALI</div>
                            <div id="rekap-stat-selesai" class="text-2xl font-extrabold text-blue-700 mt-1">115</div>
                        </div>
                    </div>

                    <div id="container-laporan-calendar" class="space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-200/90 p-4 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div class="flex items-center space-x-3">
                                <button onclick="changeCalendarMonth(-1)" class="p-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold">
                                    <i data-lucide="chevron-left" class="w-5 h-5"></i>
                                </button>
                                <h3 id="calendar-month-year-title" class="text-base sm:text-lg font-extrabold text-slate-800 min-w-44 text-center">
                                    Juni 2025
                                </h3>
                                <button onclick="changeCalendarMonth(1)" class="p-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold">
                                    <i data-lucide="chevron-right" class="w-5 h-5"></i>
                                </button>
                            </div>

                            <div class="flex items-center space-x-2 text-xs">
                                <select id="calendar-select-month" onchange="onCalendarSelectChange()" class="p-2.5 bg-slate-50 border border-slate-200 rounded-xl font-bold text-slate-700">
                                    <option value="0">Januari</option>
                                    <option value="1">Februari</option>
                                    <option value="2">Maret</option>
                                    <option value="3">April</option>
                                    <option value="4">Mei</option>
                                    <option value="5" selected>Juni</option>
                                    <option value="6">Juli</option>
                                    <option value="7">Agustus</option>
                                    <option value="8">September</option>
                                    <option value="9">Oktober</option>
                                    <option value="10">November</option>
                                    <option value="11">Desember</option>
                                </select>
                                <select id="calendar-select-year" onchange="onCalendarSelectChange()" class="p-2.5 bg-slate-50 border border-slate-200 rounded-xl font-bold text-slate-700">
                                    <option value="2025" selected>2025</option>
                                    <option value="2026">2026</option>
                                </select>
                                <button onclick="jumpToCalendarToday()" class="px-3 py-2.5 bg-blue-600 text-white font-bold rounded-xl shadow">
                                    Hari Ini
                                </button>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm overflow-hidden p-4">
                            <div class="grid grid-cols-7 gap-2 mb-2 text-center text-xs font-bold text-slate-400 border-b border-slate-100 pb-2">
                                <div class="text-rose-500">Minggu</div>
                                <div>Senin</div>
                                <div>Selasa</div>
                                <div>Rabu</div>
                                <div>Kamis</div>
                                <div>Jumat</div>
                                <div class="text-blue-500">Sabtu</div>
                            </div>

                            <div id="calendar-grid-cells" class="grid grid-cols-7 gap-2 min-h-[360px]">
                            </div>
                        </div>
                    </div>

                    <div id="container-laporan-table" class="hidden space-y-4">
                        <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm overflow-hidden">
                            <div class="p-4 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                                <span class="text-xs font-bold text-slate-700">Tabel Rekapitulasi Izin Siswa (Urut Terbaru)</span>
                                <span id="laporan-row-count-badge" class="text-xs text-slate-400 font-medium">Menampilkan Data</span>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-xs border-collapse">
                                    <thead>
                                        <tr class="bg-slate-50 text-slate-400 font-bold border-b border-slate-200">
                                            <th class="py-3.5 px-5 w-12 text-center">No</th>
                                            <th class="py-3.5 px-5">Tanggal</th>
                                            <th class="py-3.5 px-5">Nama Siswa</th>
                                            <th class="py-3.5 px-5">Kelas</th>
                                            <th class="py-3.5 px-5">Alasan / Keperluan</th>
                                            <th class="py-3.5 px-5">Jam Keluar</th>
                                            <th class="py-3.5 px-5">Jam Kembali</th>
                                            <th class="py-3.5 px-5 text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="laporan-table-body" class="divide-y divide-slate-100 font-medium">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- ADMIN VIEW TABS -->
                <div id="tab-admin-dashboard" class="tab-content hidden space-y-6">
                    <h2 class="text-2xl font-bold text-slate-800">Admin Dashboard</h2>
                </div>
                <div id="tab-admin-siswa" class="tab-content hidden space-y-6">
                    <h2 class="text-2xl font-bold text-slate-800">Kelola Siswa</h2>
                </div>
                <div id="tab-admin-guru" class="tab-content hidden space-y-6">
                    <h2 class="text-2xl font-bold text-slate-800">Kelola Guru Piket</h2>
                </div>
                <div id="tab-admin-kelas" class="tab-content hidden space-y-6">
                    <h2 class="text-2xl font-bold text-slate-800">Kelola Kelas</h2>
                </div>
                <div id="tab-admin-laporan" class="tab-content hidden space-y-6">
                    <h2 class="text-2xl font-bold text-slate-800">Rekap Laporan Admin</h2>
                </div>
                <div id="tab-admin-pengaturan" class="tab-content hidden space-y-6">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-800">Pengaturan Sistem</h2>
                        <p class="text-xs text-slate-500 font-medium">Kelola preferensi antarmuka dan konfigurasi tema aplikasi.</p>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200/90 p-6 md:p-8 shadow-sm space-y-6">
                        <div class="border-b border-slate-100 pb-4">
                            <h3 class="text-base font-extrabold text-slate-800">Tema & Tampilan Antarmuka</h3>
                            <p class="text-xs text-slate-500 font-medium mt-0.5">Pilih mode tampilan terang atau gelap agar nyaman saat menggunakan sistem.</p>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <!-- Option Light -->
                            <div onclick="applyTheme('light')" id="theme-card-light" class="p-5 rounded-2xl border-2 cursor-pointer transition-all flex flex-col justify-between space-y-4 hover:shadow-md border-blue-500 bg-blue-50/20">
                                <div class="flex items-center justify-between">
                                    <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center font-bold">
                                        <i data-lucide="sun" class="w-5 h-5"></i>
                                    </div>
                                    <span id="badge-theme-light" class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-600 text-white">Aktif</span>
                                </div>
                                <div>
                                    <h4 class="font-extrabold text-sm text-slate-800">Mode Terang (Light)</h4>
                                    <p class="text-xs text-slate-500 font-medium mt-1 leading-snug">Warna latar cerah bersih dengan kontras tinggi, ideal untuk penggunaan siang hari.</p>
                                </div>
                            </div>

                            <!-- Option Dark -->
                            <div onclick="applyTheme('dark')" id="theme-card-dark" class="p-5 rounded-2xl border cursor-pointer transition-all flex flex-col justify-between space-y-4 hover:shadow-md border-slate-200 hover:border-slate-300">
                                <div class="flex items-center justify-between">
                                    <div class="w-10 h-10 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold">
                                        <i data-lucide="moon" class="w-5 h-5"></i>
                                    </div>
                                    <span id="badge-theme-dark" class="hidden px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-600 text-white">Aktif</span>
                                </div>
                                <div>
                                    <h4 class="font-extrabold text-sm text-slate-800">Mode Gelap (Dark)</h4>
                                    <p class="text-xs text-slate-500 font-medium mt-1 leading-snug">Nuansa gelap elegan yang ramah di mata untuk penggunaan malam hari.</p>
                                </div>
                            </div>

                            <!-- Option System -->
                            <div onclick="applyTheme('system')" id="theme-card-system" class="p-5 rounded-2xl border cursor-pointer transition-all flex flex-col justify-between space-y-4 hover:shadow-md border-slate-200 hover:border-slate-300">
                                <div class="flex items-center justify-between">
                                    <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center font-bold">
                                        <i data-lucide="laptop" class="w-5 h-5"></i>
                                    </div>
                                    <span id="badge-theme-system" class="hidden px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-600 text-white">Aktif</span>
                                </div>
                                <div>
                                    <h4 class="font-extrabold text-sm text-slate-800">Ikuti Sistem (Auto)</h4>
                                    <p class="text-xs text-slate-500 font-medium mt-1 leading-snug">Secara otomatis mengikuti pengaturan mode gelap/terang perangkat OS Anda.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <!-- MODAL: DETAIL SISWA PER TANGGAL DI KALENDER -->
    <div id="modal-calendar-day-detail" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-3xl max-w-lg w-full p-6 shadow-2xl border border-slate-100 space-y-4">
            <div class="flex justify-between items-center pb-3 border-b border-slate-100">
                <div>
                    <h3 id="modal-cal-date-title" class="text-base font-extrabold text-slate-800">
                        Data Izin Siswa - Tanggal 16 Juni 2025
                    </h3>
                    <p id="modal-cal-date-sub" class="text-xs text-slate-400 font-semibold">Tercatat 5 Siswa Mengajukan Izin</p>
                </div>
                <button onclick="closeCalendarDayModal()" class="p-1 text-slate-400 hover:text-slate-600 rounded-lg">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>

            <div id="modal-cal-students-list" class="space-y-2.5 max-h-80 overflow-y-auto pr-1">
            </div>

            <div class="pt-3 border-t border-slate-100 flex justify-between items-center">
                <button onclick="window.print()" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold flex items-center space-x-1.5">
                    <i data-lucide="printer" class="w-3.5 h-3.5"></i>
                    <span>Cetak Izin Tanggal Ini</span>
                </button>
                <button onclick="closeCalendarDayModal()" class="px-5 py-2 bg-slate-800 hover:bg-slate-900 text-white rounded-xl text-xs font-bold">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL: Detail View Normal -->
    <div id="modal-detail" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl max-w-sm w-full p-6 shadow-2xl border border-slate-100">
            <div class="flex justify-between items-center mb-4 pb-3 border-b border-slate-100">
                <h3 class="text-base font-bold text-slate-800">Detail Pengajuan Izin</h3>
                <button onclick="closeDetailModal()" class="text-slate-400 hover:text-slate-600">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
            <div class="space-y-3 text-xs">
                <div>
                    <span class="text-slate-400 font-medium block">Nama Siswa:</span>
                    <span id="detail-nama" class="font-bold text-sm text-slate-800"></span>
                </div>
                <div>
                    <span class="text-slate-400 font-medium block">Kelas:</span>
                    <span id="detail-kelas" class="font-semibold text-slate-700"></span>
                </div>
                <div>
                    <span class="text-slate-400 font-medium block">Alasan:</span>
                    <span id="detail-alasan" class="text-slate-700"></span>
                </div>
                <div>
                    <span class="text-slate-400 font-medium block">Jam Keluar:</span>
                    <span id="detail-jam" class="font-semibold text-slate-700"></span>
                </div>
                <div>
                    <span class="text-slate-400 font-medium block">Status:</span>
                    <span id="detail-status-pill" class="inline-block mt-1 px-2.5 py-1 text-[11px] font-bold rounded-md"></span>
                </div>
            </div>
            <div class="pt-4 mt-4 border-t border-slate-100 text-right">
                <button onclick="closeDetailModal()" class="px-4 py-2 bg-slate-800 text-white rounded-lg font-semibold">Tutup</button>
            </div>
        </div>
    </div>


    <!-- ================================================================= -->
    <!-- SCRIPT LOGIC (FORM SUBMIT & REALTIME GURU PIKET SYNC ENGINE)     -->
    <!-- ================================================================= -->
    <script>
        let currentSelectedRole = 'siswa';
        let loggedUserRole = null;

        let calCurrentMonth = 5; // 0 = Jan, 5 = Jun
        let calCurrentYear = 2025;

        // Master Database
        let masterArchiveDatabase = [
            { id: 1, nama: 'Andi Saputra', kelas: 'XII RPL', alasan: 'Keperluan Keluarga', jamKeluar: '10:15', jamKembali: '12:00', status: 'DISETUJUI', tanggal: '2025-06-16' },
            { id: 2, nama: 'Budi Santoso', kelas: 'X TKR', alasan: 'Keperluan Pribadi', jamKeluar: '11:00', jamKembali: '13:00', status: 'PENDING', tanggal: '2025-06-16' },
            { id: 3, nama: 'Siti Aisyah', kelas: 'XI TKJ', alasan: 'Keperluan Berobat', jamKeluar: '09:30', jamKembali: '11:30', status: 'DISETUJUI', tanggal: '2025-06-16' },
            { id: 4, nama: 'Dinda Ayu', kelas: 'XI AKL', alasan: 'Mengantar Orang Tua', jamKeluar: '10:45', jamKembali: '12:45', status: 'DITOLAK', tanggal: '2025-06-16' },
            { id: 5, nama: 'Rizky Pratama', kelas: 'XII RPL', alasan: 'Periksa Kesehatan', jamKeluar: '08:15', jamKembali: '10:15', status: 'SELESAI', tanggal: '2025-06-16' },
            { id: 6, nama: 'Ahmad Fauzi', kelas: 'XI RPL', alasan: 'Lomba FLS2N', jamKeluar: '08:00', jamKembali: '14:00', status: 'DISETUJUI', tanggal: '2025-06-20' },
            { id: 7, nama: 'Nadia Rahma', kelas: 'X AKL', alasan: 'Keperluan Berobat', jamKeluar: '09:15', jamKembali: '11:15', status: 'SELESAI', tanggal: '2025-06-20' },
            { id: 8, nama: 'Doni Kurniawan', kelas: 'XI TKJ', alasan: 'Urusan Keluarga', jamKeluar: '10:30', jamKembali: '12:30', status: 'DITOLAK', tanggal: '2025-06-10' },
            { id: 9, nama: 'Maya Sandi', kelas: 'XII MM', alasan: 'Bimbingan Magang', jamKeluar: '11:00', jamKembali: '13:00', status: 'DISETUJUI', tanggal: '2025-06-05' },
            { id: 10, nama: 'Eko Prasetyo', kelas: 'X TKR', alasan: 'Ambil berkas SIM', jamKeluar: '09:00', jamKembali: '11:00', status: 'SELESAI', tanggal: '2025-06-05' }
        ];

        // HELPER: AUTOMATIC DATE SORTING (NEWEST TO OLDEST)
        function getSortedMasterDatabase() {
            return [...masterArchiveDatabase].sort((a, b) => {
                if (b.tanggal !== a.tanggal) {
                    return b.tanggal.localeCompare(a.tanggal);
                }
                return b.jamKeluar.localeCompare(a.jamKeluar);
            });
        }

        const monthNamesIndo = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        // HELPER: SYNC DENGAN BACKEND DATABASE LARAVEL MYSQL
        async function fetchPerizinanFromApi() {
            try {
                const res = await fetch('/api/perizinan');
                if (res.ok) {
                    const result = await res.json();
                    if (result.success && Array.isArray(result.data) && result.data.length > 0) {
                        masterArchiveDatabase = result.data.map(item => ({
                            id: item.id,
                            nama: item.nama,
                            nisn: item.nisn || '',
                            kelas: item.kelas,
                            alasan: item.alasan,
                            jamKeluar: item.jam_keluar,
                            jamKembali: item.jam_kembali,
                            jamKembaliAktual: item.jam_kembali_aktual,
                            status: item.status,
                            tanggal: item.tanggal ? (typeof item.tanggal === 'string' ? item.tanggal.substring(0, 10) : '') : '',
                            keterangan: item.keterangan || '',
                            guruPiket: item.guru_piket || ''
                        }));
                        renderSiswaDashboard();
                        renderGuruTables();
                        renderCalendarGrid();
                        renderLaporanTable();
                        renderSiswaFormAjukanState();
                    }
                }
            } catch (err) {
                console.log('API database mode fallback:', err);
            }
        }

        // =================================================================
        // THEME MANAGEMENT ENGINE (LIGHT & DARK MODE)
        // =================================================================
        function initTheme() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            applyTheme(savedTheme, false);

            // Listen to OS color scheme changes if set to system
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                if (localStorage.getItem('theme') === 'system') {
                    applyTheme('system', false);
                }
            });
        }

        function applyTheme(theme, notify = true) {
            const html = document.documentElement;
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            let isDark = false;
            if (theme === 'dark') {
                isDark = true;
            } else if (theme === 'light') {
                isDark = false;
            } else if (theme === 'system') {
                isDark = prefersDark;
            }

            localStorage.setItem('theme', theme);

            if (isDark) {
                html.classList.add('dark');
            } else {
                html.classList.remove('dark');
            }

            // Update Header Icon & Button State
            const headerIcon = document.getElementById('theme-toggle-icon');
            const btnTheme = document.getElementById('btn-theme-toggle');
            if (headerIcon) {
                headerIcon.setAttribute('data-lucide', isDark ? 'sun' : 'moon');
            }
            if (btnTheme) {
                btnTheme.title = isDark ? 'Ubah ke Mode Terang (Light)' : 'Ubah ke Mode Gelap (Dark)';
                if (isDark) {
                    btnTheme.className = 'p-2.5 text-amber-400 hover:text-amber-300 rounded-full hover:bg-slate-800 transition-all focus:outline-none';
                } else {
                    btnTheme.className = 'p-2.5 text-slate-500 hover:text-slate-700 rounded-full hover:bg-slate-100 transition-all focus:outline-none';
                }
            }

            // Update Login Page Theme Switcher
            const loginIcon = document.getElementById('theme-login-icon');
            const loginLabel = document.getElementById('theme-login-label');
            if (loginIcon) {
                loginIcon.setAttribute('data-lucide', isDark ? 'sun' : 'moon');
                loginIcon.className = isDark ? 'w-4 h-4 text-amber-400' : 'w-4 h-4 text-blue-600';
            }
            if (loginLabel) {
                loginLabel.textContent = isDark ? 'Mode Terang' : 'Mode Gelap';
            }

            // Update Admin Pengaturan Cards
            const cardLight = document.getElementById('theme-card-light');
            const cardDark = document.getElementById('theme-card-dark');
            const cardSystem = document.getElementById('theme-card-system');
            const badgeLight = document.getElementById('badge-theme-light');
            const badgeDark = document.getElementById('badge-theme-dark');
            const badgeSystem = document.getElementById('badge-theme-system');

            if (cardLight && cardDark && cardSystem) {
                [cardLight, cardDark, cardSystem].forEach(c => {
                    c.className = "p-5 rounded-2xl border cursor-pointer transition-all flex flex-col justify-between space-y-4 hover:shadow-md border-slate-200 hover:border-slate-300";
                });
                if (badgeLight) badgeLight.classList.add('hidden');
                if (badgeDark) badgeDark.classList.add('hidden');
                if (badgeSystem) badgeSystem.classList.add('hidden');

                if (theme === 'light') {
                    cardLight.className = "p-5 rounded-2xl border-2 cursor-pointer transition-all flex flex-col justify-between space-y-4 hover:shadow-md border-blue-500 bg-blue-50/20";
                    if (badgeLight) badgeLight.classList.remove('hidden');
                } else if (theme === 'dark') {
                    cardDark.className = "p-5 rounded-2xl border-2 cursor-pointer transition-all flex flex-col justify-between space-y-4 hover:shadow-md border-blue-500 bg-blue-50/20";
                    if (badgeDark) badgeDark.classList.remove('hidden');
                } else if (theme === 'system') {
                    cardSystem.className = "p-5 rounded-2xl border-2 cursor-pointer transition-all flex flex-col justify-between space-y-4 hover:shadow-md border-blue-500 bg-blue-50/20";
                    if (badgeSystem) badgeSystem.classList.remove('hidden');
                }
            }

            lucide.createIcons();

            if (notify) {
                const label = theme === 'dark' ? 'Mode Gelap (Dark)' : (theme === 'light' ? 'Mode Terang (Light)' : 'Mode Otomatis (Sistem)');
                const iconToast = isDark ? '🌙' : '☀️';
                showToast('info', `Tema Diperbarui ${iconToast}`, `Tema antarmuka sistem telah diubah ke ${label}.`);
            }
        }

        function toggleTheme() {
            const isCurrentlyDark = document.documentElement.classList.contains('dark');
            applyTheme(isCurrentlyDark ? 'light' : 'dark', true);
        }

        document.addEventListener('DOMContentLoaded', () => {
            initTheme();
            lucide.createIcons();
            showView('login');
            fetchPerizinanFromApi();
        });

        // Toast Engine
        function showToast(type, title, message) {
            const container = document.getElementById('toast-container');
            if (!container) return;

            const toast = document.createElement('div');

            let bgClass = "bg-slate-900 text-white";
            let iconName = "info";

            if (type === 'success') {
                bgClass = "bg-emerald-600 text-white shadow-emerald-600/30";
                iconName = "check-circle-2";
            } else if (type === 'error' || type === 'reject') {
                bgClass = "bg-rose-600 text-white shadow-rose-600/30";
                iconName = "x-circle";
            } else if (type === 'info') {
                bgClass = "bg-blue-600 text-white shadow-blue-600/30";
                iconName = "info";
            }

            toast.className = `${bgClass} p-4 rounded-2xl shadow-xl flex items-start space-x-3 pointer-events-auto toast-animate text-xs border border-white/10`;
            toast.innerHTML = `
                <div class="p-1 bg-white/20 rounded-lg shrink-0 mt-0.5">
                    <i data-lucide="${iconName}" class="w-4 h-4 text-white"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <h4 class="font-extrabold text-xs tracking-tight">${title}</h4>
                    <p class="text-[11px] opacity-90 leading-snug mt-0.5">${message}</p>
                </div>
                <button onclick="this.parentElement.remove()" class="text-white/70 hover:text-white p-0.5">
                    <i data-lucide="x" class="w-3.5 h-3.5"></i>
                </button>
            `;

            container.appendChild(toast);
            lucide.createIcons();

            setTimeout(() => {
                if (toast && toast.parentElement) {
                    toast.style.opacity = '0';
                    toast.style.transition = 'opacity 0.3s ease';
                    setTimeout(() => toast.remove(), 300);
                }
            }, 4500);
        }

        // Login Handler
        function handleLoginSubmit(e) {
            if (e) {
                e.preventDefault();
                e.stopPropagation();
            }

            try {
                loggedUserRole = currentSelectedRole;
                showView('dashboard');

                const sidebarSiswa = document.getElementById('sidebar-siswa');
                const sidebarGuru = document.getElementById('sidebar-guru');
                const sidebarAdmin = document.getElementById('sidebar-admin');

                const userName = document.getElementById('logged-user-name');
                const userRole = document.getElementById('logged-user-role');
                const userAvatar = document.getElementById('user-avatar-badge');

                if (sidebarSiswa) sidebarSiswa.classList.add('hidden');
                if (sidebarGuru) sidebarGuru.classList.add('hidden');
                if (sidebarAdmin) sidebarAdmin.classList.add('hidden');

                if (loggedUserRole === 'siswa') {
                    if (sidebarSiswa) sidebarSiswa.classList.remove('hidden');
                    if (userName) userName.textContent = "Andi Saputra";
                    if (userRole) userRole.textContent = "Siswa (XII RPL)";
                    if (userAvatar) {
                        userAvatar.textContent = "AS";
                        userAvatar.className = "w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-xs shadow";
                    }

                    renderSiswaDashboard();
                    switchTab('siswa-dashboard');
                    showToast('info', 'Selamat Datang', 'Login berhasil sebagai Siswa Andi Saputra.');
                } else if (loggedUserRole === 'guru') {
                    if (sidebarGuru) sidebarGuru.classList.remove('hidden');
                    if (userName) userName.textContent = "Drs. Bambang Haryono";
                    if (userRole) userRole.textContent = "Guru Piket";
                    if (userAvatar) {
                        userAvatar.textContent = "BH";
                        userAvatar.className = "w-8 h-8 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold text-xs shadow";
                    }

                    renderGuruTables();
                    renderCalendarGrid();
                    renderLaporanTable();
                    switchTab('guru-dashboard');
                    showToast('info', 'Panel Guru Piket', 'Login berhasil sebagai Guru Piket Drs. Bambang Haryono.');
                } else if (loggedUserRole === 'admin') {
                    if (sidebarAdmin) sidebarAdmin.classList.remove('hidden');
                    if (userName) userName.textContent = "Administrator";
                    if (userRole) userRole.textContent = "System Admin";
                    if (userAvatar) {
                        userAvatar.textContent = "ADM";
                        userAvatar.className = "w-8 h-8 rounded-full bg-slate-800 text-white flex items-center justify-center font-bold text-xs shadow";
                    }

                    switchTab('admin-dashboard');
                    showToast('info', 'Administrator', 'Login berhasil sebagai Administrator.');
                }
            } catch (err) {
                console.error("Login Handler Error:", err);
                showView('dashboard');
            }

            return false;
        }

        function selectLoginRole(role) {
            currentSelectedRole = role;

            const tabSiswa = document.getElementById('login-tab-siswa');
            const tabGuru = document.getElementById('login-tab-guru');
            const tabAdmin = document.getElementById('login-tab-admin');

            const title = document.getElementById('login-form-title');
            const sub = document.getElementById('login-form-sub');
            const labelId = document.getElementById('label-field-id');
            const inputUser = document.getElementById('input-username');

            [tabSiswa, tabGuru, tabAdmin].forEach(tab => {
                if (tab) tab.className = "flex flex-col items-center justify-center p-2.5 rounded-xl border border-slate-200 bg-white text-slate-500 font-semibold hover:bg-slate-50 transition-all";
            });

            if (role === 'siswa') {
                if (tabSiswa) tabSiswa.className = "flex flex-col items-center justify-center p-2.5 rounded-xl border transition-all bg-blue-50 border-blue-500 text-blue-600 font-bold shadow-sm";
                if (title) title.textContent = "Login Siswa";
                if (sub) sub.textContent = "Silakan login menggunakan NISN dan password Anda";
                if (labelId) labelId.textContent = "NISN";
                if (inputUser) {
                    inputUser.placeholder = "Masukkan NISN";
                    inputUser.value = "0076543210";
                }
            } else if (role === 'guru') {
                if (tabGuru) tabGuru.className = "flex flex-col items-center justify-center p-2.5 rounded-xl border transition-all bg-blue-50 border-blue-500 text-blue-600 font-bold shadow-sm";
                if (title) title.textContent = "Login Guru Piket";
                if (sub) sub.textContent = "Silakan login menggunakan NIP/NIK dan password Anda";
                if (labelId) labelId.textContent = "NIP / NIK";
                if (inputUser) {
                    inputUser.placeholder = "Masukkan NIP/NIK";
                    inputUser.value = "19850115201001";
                }
            } else if (role === 'admin') {
                if (tabAdmin) tabAdmin.className = "flex flex-col items-center justify-center p-2.5 rounded-xl border transition-all bg-blue-50 border-blue-500 text-blue-600 font-bold shadow-sm";
                if (title) title.textContent = "Login Administrator";
                if (sub) sub.textContent = "Silakan login menggunakan Username/Email Admin";
                if (labelId) labelId.textContent = "Username / Email";
                if (inputUser) {
                    inputUser.placeholder = "Masukkan Username";
                    inputUser.value = "admin";
                }
            }
        }

        // HELPER: Cek apakah siswa memiliki izin aktif (PENDING atau DISETUJUI)
        function getActivePermitForStudent(studentName = 'Andi Saputra') {
            return masterArchiveDatabase.find(r => r.nama === studentName && (r.status === 'PENDING' || r.status === 'DISETUJUI'));
        }

        // Action: Siswa Klik Tombol "+ Ajukan Izin Baru"
        function handleKlikAjukanIzin() {
            const activePermit = getActivePermitForStudent('Andi Saputra');
            if (activePermit) {
                if (activePermit.status === 'PENDING') {
                    showToast('reject', 'Pengajuan Terkunci ⚠️', 'Anda masih memiliki permohonan izin berstatus PENDING. Harap tunggu persetujuan Guru Piket atau batalkan permohonan jika ingin mengajukan ulang.');
                } else if (activePermit.status === 'DISETUJUI') {
                    showToast('reject', 'Pengajuan Terkunci ⚠️', 'Izin Anda masih berstatus DISETUJUI dan belum kembali ke sekolah. Harap konfirmasi kembali terlebih dahulu.');
                }
                switchTab('siswa-ajukan');
                return;
            }
            switchTab('siswa-ajukan');
        }

        // Action: Siswa Batalkan Izin yang Masih Berstatus PENDING
        function handleBatalPendingActivePermit() {
            const activePermit = getActivePermitForStudent('Andi Saputra');
            if (!activePermit || activePermit.status !== 'PENDING') {
                showToast('info', 'Informasi', 'Hanya permohonan berstatus PENDING yang dapat dibatalkan.');
                return;
            }

            if (confirm('Apakah Anda yakin ingin membatalkan pengajuan izin keluar ini? Pengajuan akan dihapus dari antrean Guru Piket.')) {
                const targetId = activePermit.id;
                activePermit.status = 'DIBATALKAN';
                renderSiswaDashboard();
                renderGuruTables();
                renderCalendarGrid();
                renderLaporanTable();
                renderSiswaFormAjukanState();
                showToast('info', 'Pengajuan Dibatalkan', 'Pengajuan izin keluar berhasil dibatalkan. Anda sekarang dapat mengajukan izin baru.');

                // Sync ke backend database
                fetch(`/api/perizinan/${targetId}/batal`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    }
                }).catch(e => console.log('Sync batal DB:', e));
            }
        }

        // Render UI Form Ajukan Siswa: Tampilkan Form atau Tampilan Terkunci (Blocked State)
        function renderSiswaFormAjukanState() {
            const activePermit = getActivePermitForStudent('Andi Saputra');
            const containerBlocked = document.getElementById('container-ajukan-blocked');
            const containerForm = document.getElementById('container-form-ajukan');

            if (!containerBlocked || !containerForm) return;

            if (activePermit) {
                containerBlocked.classList.remove('hidden');
                containerForm.classList.add('hidden');

                const statusBadge = document.getElementById('blocked-status-badge');
                const iconBox = document.getElementById('blocked-icon-box');
                const msgDesc = document.getElementById('blocked-message-desc');
                const permitDate = document.getElementById('blocked-permit-date');
                const permitAlasan = document.getElementById('blocked-permit-alasan');
                const permitJam = document.getElementById('blocked-permit-jam');
                const btnKonfirmasi = document.getElementById('btn-blocked-konfirmasi');
                const btnBatal = document.getElementById('btn-blocked-batal');

                if (statusBadge) {
                    statusBadge.textContent = activePermit.status;
                    if (activePermit.status === 'DISETUJUI') {
                        statusBadge.className = 'px-2.5 py-0.5 rounded-md text-[11px] font-bold bg-emerald-100 text-emerald-700 border border-emerald-200';
                    } else {
                        statusBadge.className = 'px-2.5 py-0.5 rounded-md text-[11px] font-bold bg-amber-100 text-amber-700 border border-amber-200';
                    }
                }

                if (permitDate) permitDate.textContent = activePermit.tanggal;
                if (permitAlasan) permitAlasan.textContent = activePermit.alasan;
                if (permitJam) permitJam.textContent = `${activePermit.jamKeluar} - ${activePermit.jamKembali} WIB`;

                if (activePermit.status === 'PENDING') {
                    if (iconBox) {
                        iconBox.className = "w-12 h-12 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center shrink-0 shadow-sm mt-0.5";
                        iconBox.innerHTML = '<i data-lucide="clock" class="w-6 h-6"></i>';
                    }
                    if (msgDesc) {
                        msgDesc.textContent = 'Permohonan izin Anda saat ini masih berstatus PENDING dan sedang berada dalam antrean Guru Piket. Untuk mencegah antrean menumpuk dan izin ganda, Anda tidak dapat mengajukan izin baru sebelum permohonan ini diproses.';
                    }
                    if (btnKonfirmasi) btnKonfirmasi.classList.add('hidden');
                    if (btnBatal) btnBatal.classList.remove('hidden');
                } else if (activePermit.status === 'DISETUJUI') {
                    if (iconBox) {
                        iconBox.className = "w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0 shadow-sm mt-0.5";
                        iconBox.innerHTML = '<i data-lucide="shield-alert" class="w-6 h-6"></i>';
                    }
                    if (msgDesc) {
                        msgDesc.textContent = 'Izin keluar Anda telah DISETUJUI dan Anda saat ini tercatat sedang di luar sekolah. Anda belum dapat mengajukan izin baru sebelum melakukan konfirmasi bahwa Anda telah tiba kembali di sekolah.';
                    }
                    if (btnKonfirmasi) btnKonfirmasi.classList.remove('hidden');
                    if (btnBatal) btnBatal.classList.add('hidden');
                }
                lucide.createIcons();
            } else {
                containerBlocked.classList.add('hidden');
                containerForm.classList.remove('hidden');
            }
        }

        // Action: Siswa Submit Permohonan Izin Baru (DILENGKAPI PROTEKSI IZIN GANDA)
        function handleFormKirimPermohonan(e) {
            if (e) e.preventDefault();

            // VALIDASI KETAT: Larang pengajuan jika masih ada izin PENDING atau DISETUJUI
            const activePermit = getActivePermitForStudent('Andi Saputra');
            if (activePermit) {
                if (activePermit.status === 'PENDING') {
                    showToast('reject', 'Pengajuan Ditolak ⚠️', 'Anda masih memiliki permohonan izin berstatus PENDING. Harap tunggu persetujuan Guru Piket atau batalkan permohonan.');
                } else if (activePermit.status === 'DISETUJUI') {
                    showToast('reject', 'Pengajuan Ditolak ⚠️', 'Izin sebelumnya masih DISETUJUI dan Anda belum kembali ke sekolah. Harap konfirmasi kembali terlebih dahulu.');
                }
                renderSiswaDashboard();
                renderSiswaFormAjukanState();
                return false;
            }

            const alasan = document.getElementById('form-alasan-select').value;
            const jamKeluar = document.getElementById('form-jam-keluar').value;
            const jamKembali = document.getElementById('form-jam-kembali').value;
            const tanggalInput = document.getElementById('form-tanggal').value; // e.g. "06/16/2025"

            let formattedDate = '2025-06-16';
            if (tanggalInput) {
                if (tanggalInput.includes('/')) {
                    const p = tanggalInput.split('/');
                    if (p.length === 3) {
                        formattedDate = `${p[2]}-${p[0].padStart(2, '0')}-${p[1].padStart(2, '0')}`;
                    }
                } else {
                    formattedDate = tanggalInput;
                }
            }

            const newId = Date.now();
            const newRequest = {
                id: newId,
                nama: 'Andi Saputra',
                kelas: 'XII RPL',
                alasan: alasan,
                jamKeluar: jamKeluar.replace(' AM', '').replace(' PM', ''),
                jamKembali: jamKembali.replace(' AM', '').replace(' PM', ''),
                status: 'PENDING',
                tanggal: formattedDate
            };

            // Tambahkan izin baru ke antrean
            masterArchiveDatabase.unshift(newRequest);

            // RE-RENDER SEMUA VIEW
            renderSiswaDashboard();
            renderGuruTables();
            renderCalendarGrid();
            renderLaporanTable();
            renderSiswaFormAjukanState();

            showToast('success', 'Pengajuan Berhasil Dikirim! 📩', 'Permohonan izin Andi Saputra telah MASUK ke Panel Persetujuan Guru Piket.');
            switchTab('siswa-dashboard');

            // Simpan ke Database MySQL Backend
            fetch('/api/perizinan', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                },
                body: JSON.stringify({
                    nama: 'Andi Saputra',
                    nisn: '0076543210',
                    kelas: 'XII RPL',
                    tanggal: formattedDate,
                    jam_keluar: newRequest.jamKeluar,
                    jam_kembali: newRequest.jamKembali,
                    alasan: alasan,
                    keterangan: document.getElementById('form-keterangan')?.value || ''
                })
            }).then(r => r.json()).then(res => {
                if (res.success && res.data) {
                    newRequest.id = res.data.id;
                }
            }).catch(e => console.log('Sync insert DB:', e));
        }

        function handleKonfirmasiKembaliSiswaAction() {
            const andiItem = masterArchiveDatabase.find(r => r.nama === 'Andi Saputra' && (r.status === 'DISETUJUI' || r.status === 'PENDING'));
            if (andiItem) {
                if (andiItem.status === 'PENDING') {
                    showToast('reject', 'Izin Belum Disetujui ⚠️', 'Izin Anda masih dalam antrean PENDING dan belum disetujui Guru Piket.');
                    return;
                }
                const targetId = andiItem.id;
                andiItem.status = 'SELESAI';
                renderSiswaDashboard();
                renderGuruTables();
                renderCalendarGrid();
                renderLaporanTable();
                renderSiswaFormAjukanState();
                showToast('success', 'Konfirmasi Tiba Kembali 🎉', 'Terima kasih! Status perizinan Anda telah berhasil diperbarui menjadi SELESAI. Anda sekarang dapat mengajukan izin baru bila diperlukan.');

                // Sync ke backend database
                fetch(`/api/perizinan/${targetId}/konfirmasi`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    }
                }).catch(e => console.log('Sync konfirmasi DB:', e));
            }
        }

        // Render Siswa Dashboard
        function renderSiswaDashboard() {
            const sortedData = getSortedMasterDatabase();
            const activePermit = getActivePermitForStudent('Andi Saputra');
            const andiData = activePermit || sortedData.find(item => item.nama === 'Andi Saputra') || { jamKeluar: '-', jamKembali: '-', tanggal: '-', status: 'SELESAI', alasan: '-' };

            const statusBadge = document.getElementById('siswa-status-badge');
            const statusSub = document.getElementById('siswa-status-subtext');
            const jamKeluarCard = document.getElementById('siswa-jam-keluar-card');
            const jamKembaliCard = document.getElementById('siswa-jam-kembali-card');
            const tanggalCard = document.getElementById('siswa-tanggal-card');

            if (jamKeluarCard) jamKeluarCard.textContent = andiData.jamKeluar;
            if (jamKembaliCard) jamKembaliCard.textContent = andiData.jamKembali;
            if (tanggalCard) tanggalCard.textContent = andiData.tanggal;

            // UPDATE TOMBOL DASHBOARD "+ AJUKAN IZIN BARU" SESUAI STATUS
            const btnAjukan = document.getElementById('btn-ajukan-baru-dashboard');
            if (btnAjukan) {
                if (activePermit) {
                    btnAjukan.className = "inline-flex items-center justify-center space-x-2 px-5 py-2.5 bg-slate-200 hover:bg-slate-300 text-slate-600 rounded-xl text-xs font-bold transition-all shadow-none";
                    btnAjukan.innerHTML = `<i data-lucide="lock" class="w-4 h-4 text-slate-500"></i><span>Izin Sedang Aktif (${activePermit.status})</span>`;
                    btnAjukan.title = `Tidak dapat mengajukan izin baru saat status masih ${activePermit.status}`;
                } else {
                    btnAjukan.className = "inline-flex items-center justify-center space-x-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow-lg shadow-blue-600/25 text-xs font-bold transition-all";
                    btnAjukan.innerHTML = `<i data-lucide="plus" class="w-4 h-4"></i><span>+ Ajukan Izin Baru</span>`;
                    btnAjukan.title = "Ajukan izin keluar baru";
                }
            }

            // UPDATE BANNER PERINGATAN IZIN AKTIF DI DASHBOARD
            const banner = document.getElementById('siswa-active-permit-banner');
            const bannerIconBg = document.getElementById('banner-icon-bg');
            const bannerTitle = document.getElementById('banner-title');
            const bannerDesc = document.getElementById('banner-desc');
            const bannerAction = document.getElementById('banner-action-area');

            if (banner && bannerTitle && bannerDesc && bannerAction) {
                if (activePermit && activePermit.status === 'PENDING') {
                    banner.classList.remove('hidden');
                    banner.className = "p-4 rounded-2xl border flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 text-xs transition-all shadow-sm bg-amber-50 border-amber-200 text-amber-900";
                    if (bannerIconBg) {
                        bannerIconBg.className = "p-2 rounded-xl shrink-0 mt-0.5 bg-amber-100 text-amber-700";
                        bannerIconBg.innerHTML = '<i data-lucide="clock" class="w-5 h-5"></i>';
                    }
                    bannerTitle.textContent = "Pengajuan Izin Keluar Sedang Diproses (PENDING)";
                    bannerDesc.textContent = `Anda memiliki permohonan izin keluar (${activePermit.jamKeluar} - ${activePermit.jamKembali} WIB, alasan: "${activePermit.alasan}") yang sedang menunggu verifikasi Guru Piket. Anda tidak dapat membuat permohonan baru untuk mencegah antrean menumpuk.`;
                    bannerAction.innerHTML = `
                        <button onclick="handleBatalPendingActivePermit()" class="px-3.5 py-1.5 bg-rose-600 hover:bg-rose-700 text-white rounded-xl font-bold text-xs shadow-sm transition-all whitespace-nowrap flex items-center space-x-1.5">
                            <i data-lucide="x-circle" class="w-3.5 h-3.5"></i>
                            <span>Batalkan Antrean</span>
                        </button>
                    `;
                } else if (activePermit && activePermit.status === 'DISETUJUI') {
                    banner.classList.remove('hidden');
                    banner.className = "p-4 rounded-2xl border flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 text-xs transition-all shadow-sm bg-emerald-50 border-emerald-200 text-emerald-900";
                    if (bannerIconBg) {
                        bannerIconBg.className = "p-2 rounded-xl shrink-0 mt-0.5 bg-emerald-100 text-emerald-700";
                        bannerIconBg.innerHTML = '<i data-lucide="check-circle-2" class="w-5 h-5"></i>';
                    }
                    bannerTitle.textContent = "Izin Keluar Aktif: Anda Sedang Berada di Luar Sekolah (DISETUJUI)";
                    bannerDesc.textContent = `Izin keluar telah disetujui hingga pukul ${activePermit.jamKembali} WIB. Demi ketertiban dan pencegahan izin ganda, harap konfirmasi kepulangan Anda segera setelah kembali ke sekolah sebelum mengajukan izin baru.`;
                    bannerAction.innerHTML = `
                        <button onclick="switchTab('siswa-konfirmasi')" class="px-3.5 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl font-bold text-xs shadow-sm transition-all whitespace-nowrap flex items-center space-x-1.5">
                            <i data-lucide="check-circle" class="w-3.5 h-3.5"></i>
                            <span>Konfirmasi Tiba</span>
                        </button>
                    `;
                } else {
                    banner.classList.add('hidden');
                }
            }

            const notifTitle = document.getElementById('notif-item-title');
            const notifDesc = document.getElementById('notif-item-desc');
            const notifIconBg = document.getElementById('notif-icon-bg');

            const konfStatusText = document.getElementById('konfirmasi-status-text');
            const konfJamKeluar = document.getElementById('konfirmasi-jam-keluar');
            const konfJamKembali = document.getElementById('konfirmasi-jam-kembali');
            const btnKonfirmasi = document.getElementById('btn-action-konfirmasi-kembali');
            const konfCardTitle = document.getElementById('konfirmasi-card-title');
            const konfCardSub = document.getElementById('konfirmasi-card-sub');
            const konfIconBadge = document.getElementById('konfirmasi-icon-badge');

            if (konfJamKeluar) konfJamKeluar.textContent = `${andiData.jamKeluar} WIB`;
            if (konfJamKembali) konfJamKembali.textContent = `${andiData.jamKembali} WIB`;

            if (andiData.status === 'PENDING') {
                if (statusBadge) {
                    statusBadge.textContent = 'PENDING';
                    statusBadge.className = 'inline-block px-3 py-1 text-xs font-bold rounded-md bg-amber-100 text-amber-700 border border-amber-200';
                }
                if (statusSub) statusSub.textContent = 'Menunggu persetujuan guru piket';

                if (notifTitle) {
                    notifTitle.textContent = "Status Izin: PENDING";
                    notifDesc.textContent = `Pengajuan izin keluar Anda (${andiData.jamKeluar} WIB) sedang menunggu persetujuan guru piket.`;
                    notifIconBg.className = "w-9 h-9 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center shrink-0 mt-0.5 shadow-sm";
                    notifIconBg.innerHTML = '<i data-lucide="clock" class="w-5 h-5"></i>';
                }

                if (konfStatusText) {
                    konfStatusText.textContent = 'PENDING';
                    konfStatusText.className = 'font-extrabold px-2.5 py-0.5 rounded text-[11px] bg-amber-100 text-amber-700 border border-amber-200';
                    konfCardTitle.textContent = 'Konfirmasi Belum Dapat Dilakukan';
                    konfCardSub.textContent = 'Izin keluar Anda masih dalam status PENDING (Menunggu verifikasi guru piket).';
                    btnKonfirmasi.disabled = true;
                    btnKonfirmasi.className = 'w-full py-3.5 bg-slate-200 text-slate-400 font-bold rounded-2xl cursor-not-allowed text-xs';
                    btnKonfirmasi.innerHTML = '<i data-lucide="clock" class="w-4 h-4 mr-1"></i> Menunggu Persetujuan Guru';
                }
            } else if (andiData.status === 'DISETUJUI') {
                if (statusBadge) {
                    statusBadge.textContent = 'DISETUJUI';
                    statusBadge.className = 'inline-block px-3 py-1 text-xs font-bold rounded-md bg-emerald-100 text-emerald-700 border border-emerald-200';
                }
                if (statusSub) statusSub.textContent = 'Izin disetujui! Anda diperbolehkan keluar sekolah.';

                if (notifTitle) {
                    notifTitle.textContent = "Status Izin: DISETUJUI ✅";
                    notifDesc.textContent = `Izin keluar Anda (${andiData.jamKeluar} WIB) telah disetujui oleh Guru Piket. Harap kembali sebelum jam ${andiData.jamKembali} WIB.`;
                    notifIconBg.className = "w-9 h-9 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5 shadow-sm";
                    notifIconBg.innerHTML = '<i data-lucide="check-circle-2" class="w-5 h-5"></i>';
                }

                if (konfStatusText) {
                    konfStatusText.textContent = 'DISETUJUI';
                    konfStatusText.className = 'font-extrabold px-2.5 py-0.5 rounded text-[11px] bg-emerald-100 text-emerald-700 border border-emerald-200';
                    konfCardTitle.textContent = 'Konfirmasi Kembali ke Sekolah';
                    konfCardSub.textContent = 'Klik tombol di bawah ini jika Anda sudah kembali di lingkungan sekolah SMK Negeri 1.';
                    btnKonfirmasi.disabled = false;
                    btnKonfirmasi.className = 'w-full py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold rounded-2xl shadow-lg shadow-emerald-600/25 text-xs transition-all flex items-center justify-center space-x-2';
                    btnKonfirmasi.innerHTML = '<i data-lucide="check-circle" class="w-4 h-4"></i><span>Konfirmasi Saya Sudah Kembali</span>';
                }
            } else if (andiData.status === 'SELESAI') {
                if (statusBadge) {
                    statusBadge.textContent = 'SELESAI';
                    statusBadge.className = 'inline-block px-3 py-1 text-xs font-bold rounded-md bg-slate-100 text-slate-700 border border-slate-200';
                }
                if (statusSub) statusSub.textContent = 'Anda telah kembali ke lingkungan sekolah.';

                if (notifTitle) {
                    notifTitle.textContent = "Status Izin: SELESAI 🎉";
                    notifDesc.textContent = `Konfirmasi kehadiran kembali sekolah telah dicatat. Terima kasih!`;
                    notifIconBg.className = "w-9 h-9 rounded-full bg-slate-100 text-slate-700 flex items-center justify-center shrink-0 mt-0.5 shadow-sm";
                    notifIconBg.innerHTML = '<i data-lucide="check-check" class="w-5 h-5"></i>';
                }

                if (konfStatusText) {
                    konfStatusText.textContent = 'SELESAI';
                    konfStatusText.className = 'font-extrabold px-2.5 py-0.5 rounded text-[11px] bg-blue-100 text-blue-700 border border-blue-200';
                    konfCardTitle.textContent = 'Sudah Kembali di Sekolah 🎉';
                    konfCardSub.textContent = 'Kehadiran Anda kembali di lingkungan sekolah telah terkonfirmasi.';
                    if (konfIconBadge) konfIconBadge.className = "w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto shadow-inner border border-blue-100";
                    btnKonfirmasi.disabled = true;
                    btnKonfirmasi.className = 'w-full py-3.5 bg-blue-50 border border-blue-200 text-blue-700 font-extrabold rounded-2xl cursor-default text-xs flex items-center justify-center space-x-2';
                    btnKonfirmasi.innerHTML = '<i data-lucide="check-circle-2" class="w-4 h-4"></i><span>✓ Kehadiran Kembali Terkonfirmasi</span>';
                }
            } else if (andiData.status === 'DITOLAK') {
                if (statusBadge) {
                    statusBadge.textContent = 'DITOLAK';
                    statusBadge.className = 'inline-block px-3 py-1 text-xs font-bold rounded-md bg-rose-100 text-rose-700 border border-rose-200';
                }
                if (statusSub) statusSub.textContent = 'Permohonan izin Anda sebelumnya ditolak oleh Guru Piket.';

                if (notifTitle) {
                    notifTitle.textContent = "Status Izin: DITOLAK ❌";
                    notifDesc.textContent = `Pengajuan izin Anda telah ditolak oleh Guru Piket. Anda dapat mengajukan izin baru jika ada keperluan lain.`;
                    notifIconBg.className = "w-9 h-9 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center shrink-0 mt-0.5 shadow-sm";
                    notifIconBg.innerHTML = '<i data-lucide="x-circle" class="w-5 h-5"></i>';
                }

                if (konfStatusText) {
                    konfStatusText.textContent = 'DITOLAK';
                    konfStatusText.className = 'font-extrabold px-2.5 py-0.5 rounded text-[11px] bg-rose-100 text-rose-700 border border-rose-200';
                    konfCardTitle.textContent = 'Pengajuan Ditolak';
                    konfCardSub.textContent = 'Permohonan izin Anda ditolak. Anda tidak sedang dalam status izin keluar.';
                    btnKonfirmasi.disabled = true;
                    btnKonfirmasi.className = 'w-full py-3.5 bg-slate-200 text-slate-400 font-bold rounded-2xl cursor-not-allowed text-xs';
                    btnKonfirmasi.innerHTML = '<i data-lucide="x-circle" class="w-4 h-4 mr-1"></i> Tidak Ada Izin Aktif';
                }
            } else if (andiData.status === 'DIBATALKAN') {
                if (statusBadge) {
                    statusBadge.textContent = 'DIBATALKAN';
                    statusBadge.className = 'inline-block px-3 py-1 text-xs font-bold rounded-md bg-slate-100 text-slate-600 border border-slate-300';
                }
                if (statusSub) statusSub.textContent = 'Pengajuan izin sebelumnya telah dibatalkan.';

                if (notifTitle) {
                    notifTitle.textContent = "Status Izin: DIBATALKAN";
                    notifDesc.textContent = `Permohonan izin Anda telah dibatalkan. Anda dapat mengajukan izin baru.`;
                    notifIconBg.className = "w-9 h-9 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center shrink-0 mt-0.5 shadow-sm";
                    notifIconBg.innerHTML = '<i data-lucide="info" class="w-5 h-5"></i>';
                }

                if (konfStatusText) {
                    konfStatusText.textContent = 'DIBATALKAN';
                    konfStatusText.className = 'font-extrabold px-2.5 py-0.5 rounded text-[11px] bg-slate-100 text-slate-600 border border-slate-300';
                    konfCardTitle.textContent = 'Pengajuan Dibatalkan';
                    konfCardSub.textContent = 'Anda telah membatalkan permohonan izin sebelumnya.';
                    btnKonfirmasi.disabled = true;
                    btnKonfirmasi.className = 'w-full py-3.5 bg-slate-200 text-slate-400 font-bold rounded-2xl cursor-not-allowed text-xs';
                    btnKonfirmasi.innerHTML = '<i data-lucide="info" class="w-4 h-4 mr-1"></i> Tidak Ada Izin Aktif';
                }
            }

            const tbody = document.getElementById('siswa-table-body');
            const riwayatTbody = document.getElementById('siswa-riwayat-table-body');

            if (tbody) tbody.innerHTML = '';
            if (riwayatTbody) riwayatTbody.innerHTML = '';

            sortedData.forEach(item => {
                let badgeClass = "bg-amber-100 text-amber-700 border-amber-200";
                if (item.status === 'DISETUJUI') badgeClass = "bg-emerald-100 text-emerald-700 border-emerald-200";
                if (item.status === 'DITOLAK') badgeClass = "bg-rose-100 text-rose-700 border-rose-200";
                if (item.status === 'SELESAI') badgeClass = "bg-slate-100 text-slate-700 border-slate-200";
                if (item.status === 'DIBATALKAN') badgeClass = "bg-slate-100 text-slate-500 border-slate-300";

                let actionButtons = `
                    <button onclick="showDetailModal('${item.nama}', '${item.kelas}', '${item.alasan}', '${item.jamKeluar}', '${item.status}')" class="p-1 text-blue-600 hover:bg-blue-50 rounded" title="Lihat Detail">
                        <i data-lucide="eye" class="w-4 h-4"></i>
                    </button>
                `;

                if (item.nama === 'Andi Saputra' && item.status === 'PENDING') {
                    actionButtons += `
                        <button onclick="handleBatalPendingActivePermit()" class="p-1 text-rose-600 hover:bg-rose-50 rounded ml-1" title="Batalkan Pengajuan Izin Ini">
                            <i data-lucide="x-circle" class="w-4 h-4"></i>
                        </button>
                    `;
                }

                const tr = document.createElement('tr');
                tr.className = "hover:bg-slate-50/70 transition-colors";
                tr.innerHTML = `
                    <td class="py-4 px-5 font-semibold">${item.tanggal}</td>
                    <td class="py-4 px-5 font-bold text-slate-800">${item.alasan}</td>
                    <td class="py-4 px-5 font-semibold text-slate-600">${item.jamKeluar}</td>
                    <td class="py-4 px-5 text-center">
                        <span class="inline-block px-2.5 py-1 text-[11px] font-bold rounded-md border ${badgeClass}">
                            ${item.status}
                        </span>
                    </td>
                    <td class="py-4 px-5 text-center flex items-center justify-center">
                        ${actionButtons}
                    </td>
                `;
                if (tbody) tbody.appendChild(tr);

                if (riwayatTbody) {
                    const trRiwayat = document.createElement('tr');
                    trRiwayat.innerHTML = `
                        <td class="py-4 px-5 font-semibold">${item.tanggal}</td>
                        <td class="py-4 px-5 font-bold text-slate-800">${item.alasan}</td>
                        <td class="py-4 px-5 font-semibold text-slate-600">${item.jamKeluar}</td>
                        <td class="py-4 px-5 font-semibold text-slate-600">${item.jamKembali}</td>
                        <td class="py-4 px-5 text-center">
                            <span class="inline-block px-2.5 py-1 text-[11px] font-bold rounded-md border ${badgeClass}">
                                ${item.status}
                            </span>
                        </td>
                    `;
                    riwayatTbody.appendChild(trRiwayat);
                }
            });
            lucide.createIcons();
        }

        // Render Calendar Grid
        function renderCalendarGrid() {
            const cellsContainer = document.getElementById('calendar-grid-cells');
            const titleEl = document.getElementById('calendar-month-year-title');
            const monthSelect = document.getElementById('calendar-select-month');
            const yearSelect = document.getElementById('calendar-select-year');

            if (!cellsContainer) return;

            if (titleEl) titleEl.textContent = `${monthNamesIndo[calCurrentMonth]} ${calCurrentYear}`;
            if (monthSelect) monthSelect.value = calCurrentMonth;
            if (yearSelect) yearSelect.value = calCurrentYear;

            cellsContainer.innerHTML = '';

            const firstDay = new Date(calCurrentYear, calCurrentMonth, 1).getDay();
            const daysInMonth = new Date(calCurrentYear, calCurrentMonth + 1, 0).getDate();

            for (let i = 0; i < firstDay; i++) {
                const emptyCell = document.createElement('div');
                emptyCell.className = "bg-slate-50/40 rounded-2xl min-h-[95px] p-2 opacity-40";
                cellsContainer.appendChild(emptyCell);
            }

            for (let day = 1; day <= daysInMonth; day++) {
                const dateStr = `${calCurrentYear}-${String(calCurrentMonth + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                const dayRequests = masterArchiveDatabase.filter(r => r.tanggal === dateStr);

                const cell = document.createElement('div');
                let borderClass = "border border-slate-200/80 bg-white hover:border-blue-400 hover:shadow-md";

                if (dayRequests.length > 0) {
                    borderClass = "border-2 border-blue-400 bg-blue-50/20 hover:bg-blue-50/50 shadow-sm";
                }

                cell.className = `${borderClass} rounded-2xl min-h-[95px] p-2.5 flex flex-col justify-between cursor-pointer transition-all relative group`;
                cell.onclick = () => openCalendarDayDetailModal(dateStr, dayRequests);

                let badgesMarkup = '';
                if (dayRequests.length > 0) {
                    badgesMarkup = `<span class="px-2 py-0.5 rounded-full text-[10px] font-extrabold bg-blue-600 text-white shadow-sm">${dayRequests.length} Siswa</span>`;
                }

                let studentsListPreviewMarkup = '';
                if (dayRequests.length > 0) {
                    const top2 = dayRequests.slice(0, 2);
                    top2.forEach(req => {
                        let pillClass = "bg-amber-100 text-amber-700 border-amber-200";
                        if (req.status === 'DISETUJUI') pillClass = "bg-emerald-100 text-emerald-700 border-emerald-200";
                        if (req.status === 'DITOLAK') pillClass = "bg-rose-100 text-rose-700 border-rose-200";
                        if (req.status === 'SELESAI') pillClass = "bg-slate-100 text-slate-700 border-slate-200";

                        studentsListPreviewMarkup += `
                            <div class="truncate text-[10px] font-bold px-1.5 py-0.5 rounded border ${pillClass} leading-tight mb-1 flex items-center justify-between">
                                <span class="truncate">${req.nama.split(' ')[0]}</span>
                                <span class="text-[9px] opacity-80 ml-1 font-semibold">${req.jamKeluar}</span>
                            </div>
                        `;
                    });

                    if (dayRequests.length > 2) {
                        studentsListPreviewMarkup += `
                            <div class="text-[9px] font-extrabold text-blue-600 text-center">
                                +${dayRequests.length - 2} siswa lagi
                            </div>
                        `;
                    }
                }

                cell.innerHTML = `
                    <div class="flex items-center justify-between mb-1">
                        <span class="font-extrabold text-xs ${dayRequests.length > 0 ? 'text-blue-700 font-black text-sm' : 'text-slate-700'}">${day}</span>
                        ${badgesMarkup}
                    </div>
                    <div class="flex-1 flex flex-col justify-end">
                        ${studentsListPreviewMarkup}
                    </div>
                `;

                cellsContainer.appendChild(cell);
            }
        }

        function changeCalendarMonth(delta) {
            calCurrentMonth += delta;
            if (calCurrentMonth > 11) {
                calCurrentMonth = 0;
                calCurrentYear += 1;
            } else if (calCurrentMonth < 0) {
                calCurrentMonth = 11;
                calCurrentYear -= 1;
            }
            renderCalendarGrid();
        }

        function onCalendarSelectChange() {
            calCurrentMonth = parseInt(document.getElementById('calendar-select-month').value);
            calCurrentYear = parseInt(document.getElementById('calendar-select-year').value);
            renderCalendarGrid();
        }

        function jumpToCalendarToday() {
            calCurrentMonth = 5;
            calCurrentYear = 2025;
            renderCalendarGrid();
            showToast('info', 'Kalender', 'Melompat ke tanggal hari ini (16 Juni 2025).');
        }

        function openCalendarDayDetailModal(dateStr, requests) {
            const modal = document.getElementById('modal-calendar-day-detail');
            const title = document.getElementById('modal-cal-date-title');
            const sub = document.getElementById('modal-cal-date-sub');
            const container = document.getElementById('modal-cal-students-list');

            const parts = dateStr.split('-');
            const dayNum = parseInt(parts[2]);
            const monthNum = parseInt(parts[1]) - 1;
            const yearNum = parts[0];
            const formattedDateStr = `${dayNum} ${monthNamesIndo[monthNum]} ${yearNum}`;

            if (title) title.textContent = `Rekap Izin Siswa - Tanggal ${formattedDateStr}`;
            if (sub) sub.textContent = `Tercatat ${requests.length} Siswa Mengajukan Izin Keluar Sekolah`;

            if (container) {
                container.innerHTML = '';
                if (requests.length === 0) {
                    container.innerHTML = `
                        <div class="p-6 text-center text-slate-400 font-medium bg-slate-50 rounded-2xl border border-slate-100">
                            <i data-lucide="info" class="w-8 h-8 text-slate-300 mx-auto mb-2"></i>
                            Tidak ada perizinan keluar siswa pada tanggal ${formattedDateStr}.
                        </div>
                    `;
                } else {
                    requests.forEach((req, idx) => {
                        let statusPill = `<span class="px-2.5 py-1 text-[11px] font-bold rounded-md bg-amber-100 text-amber-700 border border-amber-200">PENDING</span>`;
                        if (req.status === 'DISETUJUI') statusPill = `<span class="px-2.5 py-1 text-[11px] font-bold rounded-md bg-emerald-100 text-emerald-700 border border-emerald-200">DISETUJUI</span>`;
                        if (req.status === 'DITOLAK') statusPill = `<span class="px-2.5 py-1 text-[11px] font-bold rounded-md bg-rose-100 text-rose-700 border border-rose-200">DITOLAK</span>`;
                        if (req.status === 'SELESAI') statusPill = `<span class="px-2.5 py-1 text-[11px] font-bold rounded-md bg-slate-100 text-slate-700 border border-slate-200">SELESAI</span>`;

                        const div = document.createElement('div');
                        div.className = "p-3.5 bg-slate-50/80 rounded-2xl border border-slate-200/80 flex items-center justify-between gap-3 hover:bg-slate-100/80 transition-colors text-xs";
                        div.innerHTML = `
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 rounded-full bg-blue-600 text-white font-extrabold flex items-center justify-center text-xs shrink-0">
                                    ${idx + 1}
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-800 text-sm leading-tight">${req.nama}</h4>
                                    <p class="text-slate-500 font-semibold text-[11px] mt-0.5">${req.kelas} • Alasan: <span class="text-slate-700">${req.alasan}</span></p>
                                </div>
                            </div>
                            <div class="text-right shrink-0">
                                <div class="mb-1">${statusPill}</div>
                                <div class="text-[10px] text-slate-400 font-semibold">Jam: ${req.jamKeluar} - ${req.jamKembali}</div>
                            </div>
                        `;
                        container.appendChild(div);
                    });
                }
            }

            if (modal) modal.classList.remove('hidden');
            lucide.createIcons();
        }

        function closeCalendarDayModal() {
            const modal = document.getElementById('modal-calendar-day-detail');
            if (modal) modal.classList.add('hidden');
        }

        function setLaporanViewMode(mode) {
            const calContainer = document.getElementById('container-laporan-calendar');
            const tableContainer = document.getElementById('container-laporan-table');
            const btnCal = document.getElementById('btn-view-calendar');
            const btnTable = document.getElementById('btn-view-table');

            if (mode === 'calendar') {
                if (calContainer) calContainer.classList.remove('hidden');
                if (tableContainer) tableContainer.classList.add('hidden');

                if (btnCal) btnCal.className = "px-3 py-1.5 rounded-lg bg-white text-blue-600 shadow-sm transition-all flex items-center space-x-1.5 font-bold";
                if (btnTable) btnTable.className = "px-3 py-1.5 rounded-lg text-slate-600 transition-all flex items-center space-x-1.5 font-semibold";
                renderCalendarGrid();
            } else {
                if (tableContainer) tableContainer.classList.remove('hidden');
                if (calContainer) calContainer.classList.add('hidden');

                if (btnTable) btnTable.className = "px-3 py-1.5 rounded-lg bg-white text-blue-600 shadow-sm transition-all flex items-center space-x-1.5 font-bold";
                if (btnCal) btnCal.className = "px-3 py-1.5 rounded-lg text-slate-600 transition-all flex items-center space-x-1.5 font-semibold";
                renderLaporanTable();
            }
        }

        function renderLaporanTable() {
            const sortedData = getSortedMasterDatabase();
            const tbody = document.getElementById('laporan-table-body');
            const countBadge = document.getElementById('laporan-row-count-badge');

            if (countBadge) countBadge.textContent = `Menampilkan ${sortedData.length} Data Perizinan (Urut Terbaru)`;

            const total = sortedData.length;
            const disetujui = sortedData.filter(d => d.status === 'DISETUJUI').length;
            const ditolak = sortedData.filter(d => d.status === 'DITOLAK').length;
            const selesai = sortedData.filter(d => d.status === 'SELESAI').length;

            const statTotal = document.getElementById('rekap-stat-total');
            const statDisetujui = document.getElementById('rekap-stat-disetujui');
            const statDitolak = document.getElementById('rekap-stat-ditolak');
            const statSelesai = document.getElementById('rekap-stat-selesai');

            if (statTotal) statTotal.textContent = total;
            if (statDisetujui) statDisetujui.textContent = disetujui;
            if (statDitolak) statDitolak.textContent = ditolak;
            if (statSelesai) statSelesai.textContent = selesai;

            if (tbody) {
                tbody.innerHTML = '';
                sortedData.forEach((item, index) => {
                    let badgeClass = "bg-amber-100 text-amber-700 border-amber-200";
                    if (item.status === 'DISETUJUI') badgeClass = "bg-emerald-100 text-emerald-700 border-emerald-200";
                    if (item.status === 'DITOLAK') badgeClass = "bg-rose-100 text-rose-700 border-rose-200";
                    if (item.status === 'SELESAI') badgeClass = "bg-slate-100 text-slate-700 border-slate-200";

                    const tr = document.createElement('tr');
                    tr.className = "hover:bg-slate-50/70 transition-colors";
                    tr.innerHTML = `
                        <td class="py-3.5 px-5 text-center text-slate-400 font-semibold">${index + 1}</td>
                        <td class="py-3.5 px-5 font-bold text-slate-800">${item.tanggal}</td>
                        <td class="py-3.5 px-5 font-bold text-slate-800">${item.nama}</td>
                        <td class="py-3.5 px-5 font-semibold text-slate-600">${item.kelas}</td>
                        <td class="py-3.5 px-5 text-slate-700">${item.alasan}</td>
                        <td class="py-3.5 px-5 font-semibold text-slate-700">${item.jamKeluar} WIB</td>
                        <td class="py-3.5 px-5 font-semibold text-slate-700">${item.jamKembali} WIB</td>
                        <td class="py-3.5 px-5 text-center">
                            <span class="inline-block px-2.5 py-1 text-[11px] font-bold rounded-md border ${badgeClass}">
                                ${item.status}
                            </span>
                        </td>
                    `;
                    tbody.appendChild(tr);
                });
            }
            lucide.createIcons();
        }

        // Render Guru Piket Tables
        function renderGuruTables() {
            const sortedData = getSortedMasterDatabase();
            const pendingRequests = sortedData.filter(item => item.status === 'PENDING');
            const approvedRequests = sortedData.filter(item => item.status === 'DISETUJUI');

            const pendingBadge = document.getElementById('guru-pending-badge-count');
            if (pendingBadge) pendingBadge.textContent = `${pendingRequests.length} Permohonan Menunggu`;

            const pendingTbody = document.getElementById('guru-pending-table-body');
            if (pendingTbody) {
                pendingTbody.innerHTML = '';
                if (pendingRequests.length === 0) {
                    pendingTbody.innerHTML = `
                        <tr>
                            <td colspan="5" class="py-8 text-center text-slate-400 font-medium">
                                <i data-lucide="check-circle-2" class="w-8 h-8 text-emerald-500 mx-auto mb-2 opacity-60"></i>
                                Semua permohonan perizinan telah diproses! Tidak ada pending saat ini.
                            </td>
                        </tr>
                    `;
                } else {
                    pendingRequests.forEach(item => {
                        const tr = document.createElement('tr');
                        tr.className = "hover:bg-slate-50/70 transition-colors";
                        tr.innerHTML = `
                            <td class="py-4 px-5 font-bold text-slate-800">${item.nama}</td>
                            <td class="py-4 px-5 font-semibold text-slate-600">${item.kelas}</td>
                            <td class="py-4 px-5 text-slate-700">${item.alasan}</td>
                            <td class="py-4 px-5 font-semibold text-slate-700">${item.jamKeluar}</td>
                            <td class="py-4 px-5 text-center space-x-2">
                                <button onclick="guruSetujuiIzin(${item.id})" class="px-3.5 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-lg shadow-sm transition-all text-xs">
                                    Setujui
                                </button>
                                <button onclick="guruTolakIzin(${item.id})" class="px-3.5 py-1.5 bg-rose-600 hover:bg-rose-700 text-white font-bold rounded-lg shadow-sm transition-all text-xs">
                                    Tolak
                                </button>
                            </td>
                        `;
                        pendingTbody.appendChild(tr);
                    });
                }
            }

            const aktifBadge = document.getElementById('guru-aktif-badge-count');
            if (aktifBadge) aktifBadge.textContent = `${approvedRequests.length} Siswa Di Luar`;

            const aktifTbody = document.getElementById('guru-aktif-table-body');
            if (aktifTbody) {
                aktifTbody.innerHTML = '';
                if (approvedRequests.length === 0) {
                    aktifTbody.innerHTML = `
                        <tr>
                            <td colspan="7" class="py-8 text-center text-slate-400 font-medium">
                                Tidak ada siswa yang sedang di luar sekolah saat ini.
                            </td>
                        </tr>
                    `;
                } else {
                    approvedRequests.forEach(item => {
                        const tr = document.createElement('tr');
                        tr.className = "hover:bg-slate-50/70 transition-colors";
                        tr.innerHTML = `
                            <td class="py-4 px-5 font-bold text-slate-800">${item.nama}</td>
                            <td class="py-4 px-5 font-semibold text-slate-600">${item.kelas}</td>
                            <td class="py-4 px-5 text-slate-700">${item.alasan}</td>
                            <td class="py-4 px-5 font-semibold text-slate-700">${item.jamKeluar}</td>
                            <td class="py-4 px-5 font-semibold text-slate-700">${item.jamKembali}</td>
                            <td class="py-4 px-5 text-center">
                                <span class="inline-block px-2.5 py-1 text-[11px] font-bold rounded-md bg-emerald-100 text-emerald-700 border border-emerald-200">
                                    DISETUJUI
                                </span>
                            </td>
                            <td class="py-4 px-5 text-center">
                                <button onclick="guruKonfirmasiTiba(${item.id})" class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg text-xs shadow-sm transition-all">
                                    Konfirmasi Kembali
                                </button>
                            </td>
                        `;
                        aktifTbody.appendChild(tr);
                    });
                }
            }

            lucide.createIcons();
        }

        function guruSetujuiIzin(id) {
            const item = masterArchiveDatabase.find(r => r.id === id);
            if (item) {
                item.status = 'DISETUJUI';
                renderGuruTables();
                renderCalendarGrid();
                renderSiswaDashboard();
                renderLaporanTable();
                renderSiswaFormAjukanState();
                showToast('success', 'Izin Disetujui! ✅', `Izin ${item.nama} (${item.kelas}) telah DISETUJUI dan dipindahkan ke menu 'Siswa Di Luar'.`);

                // Sync status ke backend database
                fetch(`/api/perizinan/${id}/status`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    },
                    body: JSON.stringify({ status: 'DISETUJUI', guru_piket: 'Drs. Bambang Haryono' })
                }).catch(e => console.log('Sync setujui DB:', e));
            }
        }

        function guruTolakIzin(id) {
            const item = masterArchiveDatabase.find(r => r.id === id);
            if (item) {
                item.status = 'DITOLAK';
                renderGuruTables();
                renderCalendarGrid();
                renderSiswaDashboard();
                renderLaporanTable();
                renderSiswaFormAjukanState();
                showToast('error', 'Izin Ditolak ❌', `Izin ${item.nama} (${item.kelas}) telah DITOLAK.`);

                // Sync status ke backend database
                fetch(`/api/perizinan/${id}/status`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    },
                    body: JSON.stringify({ status: 'DITOLAK', guru_piket: 'Drs. Bambang Haryono' })
                }).catch(e => console.log('Sync tolak DB:', e));
            }
        }

        function guruKonfirmasiTiba(id) {
            const item = masterArchiveDatabase.find(r => r.id === id);
            if (item) {
                item.status = 'SELESAI';
                renderGuruTables();
                renderCalendarGrid();
                renderSiswaDashboard();
                renderLaporanTable();
                renderSiswaFormAjukanState();
                showToast('success', 'Siswa Kembali 🎉', `${item.nama} (${item.kelas}) telah kembali ke sekolah (Status: SELESAI).`);

                // Sync status ke backend database
                fetch(`/api/perizinan/${id}/konfirmasi`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    }
                }).catch(e => console.log('Sync konfirmasi DB:', e));
            }
        }

        function openCurrentDetailSiswa() {
            const sortedData = getSortedMasterDatabase();
            const activePermit = getActivePermitForStudent('Andi Saputra');
            const andiData = activePermit || sortedData.find(item => item.nama === 'Andi Saputra') || sortedData[0];
            showDetailModal(andiData.nama, andiData.kelas, andiData.alasan, andiData.jamKeluar, andiData.status);
        }

        function showView(viewName) {
            const loginView = document.getElementById('view-login');
            const dashboardView = document.getElementById('view-dashboard');

            if (viewName === 'login') {
                if (loginView) loginView.classList.remove('hidden');
                if (dashboardView) dashboardView.classList.add('hidden');
            } else {
                if (loginView) loginView.classList.add('hidden');
                if (dashboardView) dashboardView.classList.remove('hidden');
            }
        }

        function switchTab(tabId, event) {
            if (event) event.preventDefault();

            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));

            const activeTab = document.getElementById(`tab-${tabId}`);
            if (activeTab) activeTab.classList.remove('hidden');

            document.querySelectorAll('.nav-item').forEach(nav => {
                nav.className = "nav-item flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800/70 hover:text-white transition-all font-medium text-sm";
            });

            const activeNav = document.getElementById(`nav-${tabId}`);
            if (activeNav) {
                activeNav.className = "nav-item flex items-center space-x-3 px-4 py-3 rounded-xl bg-blue-600 text-white font-semibold shadow-lg shadow-blue-600/25 transition-all font-medium text-sm";
            }

            if (tabId === 'siswa-ajukan') {
                renderSiswaFormAjukanState();
            } else if (tabId === 'siswa-dashboard') {
                renderSiswaDashboard();
            }

            lucide.createIcons();

            if (window.innerWidth < 768) {
                const sidebar = document.getElementById('sidebar');
                if (sidebar && !sidebar.classList.contains('-translate-x-full')) {
                    sidebar.classList.add('-translate-x-full');
                }
            }
        }

        function handleLogout() {
            if (confirm('Apakah Anda yakin ingin keluar dari sistem?')) {
                loggedUserRole = null;
                showView('login');
                showToast('info', 'Logout', 'Anda telah keluar dari sistem.');
            }
        }

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            if (sidebar) sidebar.classList.toggle('-translate-x-full');
        }

        function showDetailModal(nama, kelas, alasan, jam, status) {
            const elNama = document.getElementById('detail-nama');
            const elKelas = document.getElementById('detail-kelas');
            const elAlasan = document.getElementById('detail-alasan');
            const elJam = document.getElementById('detail-jam');
            const statusPill = document.getElementById('detail-status-pill');

            if (elNama) elNama.textContent = nama;
            if (elKelas) elKelas.textContent = kelas;
            if (elAlasan) elAlasan.textContent = alasan;
            if (elJam) elJam.textContent = jam;

            if (statusPill) {
                statusPill.textContent = status;
                if (status === 'DISETUJUI') {
                    statusPill.className = 'inline-block mt-1 px-2.5 py-1 text-[11px] font-bold rounded-md bg-emerald-100 text-emerald-700 border border-emerald-200';
                } else if (status === 'DITOLAK') {
                    statusPill.className = 'inline-block mt-1 px-2.5 py-1 text-[11px] font-bold rounded-md bg-rose-100 text-rose-700 border border-rose-200';
                } else if (status === 'SELESAI') {
                    statusPill.className = 'inline-block mt-1 px-2.5 py-1 text-[11px] font-bold rounded-md bg-slate-100 text-slate-700 border border-slate-200';
                } else {
                    statusPill.className = 'inline-block mt-1 px-2.5 py-1 text-[11px] font-bold rounded-md bg-amber-100 text-amber-700 border border-amber-200';
                }
            }

            const modal = document.getElementById('modal-detail');
            if (modal) modal.classList.remove('hidden');
        }

        function closeDetailModal() {
            const modal = document.getElementById('modal-detail');
            if (modal) modal.classList.add('hidden');
        }
    </script>
</body>
</html>
