<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Portfolio - Futuristik 2025</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('resources/css/style.css') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        /* Tailwind custom theme */
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ["Poppins", "ui-sans-serif", "system-ui"],
                    },
                    colors: {
                        base: {
                            900: "#0a0f14",
                            800: "#0d141c",
                            700: "#111a24",
                            600: "#182330",
                        },
                        neon: {
                            mint: "#a8ffdf",
                            blue: "#6ee7ff",
                            purple: "#c4b5fd",
                        },
                    },
                    boxShadow: {
                        soft: "0 10px 30px rgba(0,0,0,0.25)",
                        hover: "0 12px 35px rgba(0,0,0,0.35)",
                        glow: "0 0 0 1px rgba(168,255,223,0.32), 0 8px 30px rgba(110,231,255,0.08)",
                    },
                    backdropBlur: {
                        xs: '2px',
                    }
                }
            },
            darkMode: 'class'
        }
    </script>

    <script src="https://unpkg.com/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://unpkg.com/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>


    <style>
        /* Variabel CSS untuk aksen futuristik */
        :root {
            --ring-1: rgba(110, 231, 255, 0.25);
            --ring-2: rgba(196, 181, 253, 0.20);
            --card: rgba(255, 255, 255, 0.04);
            --card-strong: rgba(255, 255, 255, 0.06);
            --border: rgba(168, 255, 223, 0.18);
        }

        html {
            scroll-behavior: smooth;
        }

        /* Garis grid lembut di background */
        .grid-bg {
            background-image:
                radial-gradient(circle at 1px 1px, rgba(255, 0, 0, 0.06) 1px, transparent 0),
                radial-gradient(circle at 1px 1px, rgba(255, 255, 255, 0.03) 1px, transparent 0);
            background-size: 24px 24px, 80px 80px;
            background-position: 0 0, 0 0;
        }

        /* Gradient ring dekoratif */
        .ring-gradient {
            position: absolute;
            inset: -1px;
            border-radius: 1.25rem;
            padding: 1px;
            background: linear-gradient(135deg, var(--ring-1), transparent 35%, var(--ring-2));
            -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
        }


        /* gradient moving hero section */
        .gradient-text {
            background: linear-gradient(90deg, #00f0ff, #a200ff, #00ffa3);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientMove 6s ease infinite;
        }

        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Card base dengan glassmorphism */
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            box-shadow: var(--shadow, 0 10px 30px rgba(0, 0, 0, 0.25));
        }

        /* Hover halus untuk kartu */
        .card-hover {
            transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 40px rgba(0, 0, 0, .35);
            border-color: rgba(110, 231, 255, .28);
        }

        /* Tombol utama futuristik */
        .btn-primary {
            position: relative;
        }

        .btn-primary::after {
            content: "";
            position: absolute;
            inset: -1px;
            border-radius: 9999px;
            background: linear-gradient(90deg, rgba(110, 231, 255, .35), rgba(196, 181, 253, .25));
            z-index: -1;
            filter: blur(6px);
            opacity: .55;
            transition: opacity .2s ease;
        }

        .btn-primary:hover::after {
            opacity: .85;
        }


        /* efek kursor */
        .cursor-ring {
            position: fixed;
            left: 0;
            top: 0;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            pointer-events: none;
            z-index: -1;
            /* agar di belakang */
            opacity: 1;
            mix-blend-mode: lighten;
            will-change: transform, opacity;
            background: radial-gradient(circle,
                    rgba(255, 0, 255, 0.9) 0%,
                    rgba(180, 0, 255, 0.8) 70%,
                    rgba(255, 0, 200, 0.7) 100%);
            box-shadow:
                0 0 30px rgba(255, 0, 255, 0.6),
                0 0 60px rgba(180, 0, 255, 0.5),
                0 0 100px rgba(255, 0, 200, 0.4);
            animation: pulse 2s infinite ease-in-out;
            filter: blur(20px);
        }

        /* Echo Ripple Ring */
        .cursor-echo {
            position: fixed;
            border-radius: 50%;
            pointer-events: none;
            transform: translate(-50%, -50%);
            width: 40px;
            height: 40px;
            opacity: 0.8;
            z-index: 9999;
            border: 2px solid rgba(255, 0, 255, 0.7);
            box-shadow: 0 0 10px rgba(255, 0, 255, 0.7),
                0 0 25px rgba(180, 0, 255, 0.6),
                0 0 40px rgba(255, 0, 200, 0.5);
            animation: echoRing 1s ease-out forwards;
        }

        @keyframes echoRing {
            from {
                transform: translate(-50%, -50%) scale(0.3);
                opacity: 0.9;
            }

            to {
                transform: translate(-50%, -50%) scale(4);
                opacity: 0;
            }
        }



        /* Sembunyikan di layar kecil / touch */
        @media (max-width: 768px),
        (pointer: coarse) {
            .cursor-ring {
                display: none;
            }
        }

        /* Respect prefers-reduced-motion */
        @media (prefers-reduced-motion: reduce) {
            .cursor-ring {
                display: none;
            }
        }

        .slide-open {
            transform: translateX(0);
        }

        .slide-closed {
            transform: translateX(350px);
        }

        #clockContainer {
            transition: transform 0.5s ease-in-out;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .album-spin {
            animation: spin 5s linear infinite;
        }

        #album-art {
            border: 3px solid transparent;
            border-radius: 9999px;
            position: relative;
            box-shadow: 0 0 15px rgba(0, 255, 200, 0.7),
                0 0 30px rgba(0, 255, 200, 0.5);
            background: conic-gradient(from 0deg,
                    #00ffd5, #00ffaa, #00ffd5, #00ffaa);
            padding: 4px;
            /* buat ring glowing */
        }

        #album-art::after {
            content: "";
            position: absolute;
            inset: 3px;
            border-radius: 9999px;
            background: #1f2937;
            /* isi tengah (abu-abu / bisa isi gambar) */
        }

        /* Animasi muter */
        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .album-spin {
            animation: spin 6s linear infinite;
        }

        /* Soft glow for bar */
        .shadow-neon-soft {
            box-shadow: 0 0 6px #7dd0ff, 0 0 12px #dba8ff, 0 0 16px #90ffc4;
        }

        /* Soft glow for text */
        .glow-text-soft {
            text-shadow: 0 0 3px #7dd0ff, 0 0 6px #dba8ff, 0 0 10px #90ffc4;
        }
    </style>

</head>

<body class="bg-base-900 text-white grid-bg">

    <!-- Preloader -->
    <div id="preloader" class="fixed inset-0 bg-black z-50 flex flex-col items-center justify-center">
        <!-- Neon Loading Bar Container -->
        <div class="w-64 h-3 bg-white/10 rounded-full overflow-hidden relative">
            <!-- Gradient bar -->
            <div id="loadingBar"
                class="h-3 w-0 rounded-full bg-gradient-to-r from-[#00f0ff] via-[#a200ff] to-[#00ffa3] shadow-neon">
            </div>
            <!-- Glowing moving “snail head” -->
            <div id="glowHead"
                class="absolute top-0 h-3 w-8 rounded-full bg-gradient-to-r from-[#00f0ff] via-[#a200ff] to-[#00ffa3] blur-xl">
            </div>
        </div>
        <p class="mt-4 text-white/70 tracking-widest text-sm font-mono gradient-text">LOADING...</p>
    </div>

    <div id="cursorRing" class="cursor-ring" aria-hidden="true"></div>

    <div aria-hidden="true" class="pointer-events-none fixed inset-0 overflow-hidden">
        <div
            class="absolute -top-40 -right-40 h-96 w-96 rounded-full blur-3xl opacity-20 bg-gradient-to-br from-neon-blue to-neon-purple">
        </div>
        <div
            class="absolute -bottom-48 -left-40 h-[28rem] w-[28rem] rounded-full blur-3xl opacity-20 bg-gradient-to-tr from-neon-mint to-neon-blue">
        </div>
    </div>

    <button id="burgerBtn" class="fixed top-4 left-4 z-50 p-2 rounded-lg bg-white/10 text-white md:hidden">
        &#9776;
    </button>

    <aside id="sidebar"
        class="fixed left-0 top-0 h-screen w-64 md:w-64 bg-base-800/70 backdrop-blur-md card rounded-2xl shadow-soft z-40 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
        <div class="relative h-full flex flex-col">
            <div class="flex items-center gap-3 px-4 py-4 border-b border-white/10">
                <div class="h-9 w-9 grid place-items-center rounded-xl bg-white/5 ring-1 ring-white/10">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M12 3l8 4.5v9L12 21l-8-4.5v-9L12 3z" stroke="currentColor" stroke-width="1.25" />
                        <path d="M12 8l5 2.8v5.4L12 19l-5-2.8V10.8L12 8z" stroke="currentColor" stroke-width="1.25" />
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <h1 id="brand-text" class="text-sm font-semibold tracking-wide whitespace-nowrap">Portfolio 2025
                    </h1>
                    <p class="text-[11px] text-white/60">Futuristic • Calm</p>
                </div>

            </div>

            <nav class=" overflow-y-auto py-4">
                <ul class="space-y-1 px-3" id="navList">
                    <li><a href="#home"
                            class="nav-link group flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-white/5 ring-1 ring-transparent hover:ring-white/10 transition">
                            <span class="inline-grid place-items-center h-6 w-6 rounded-md bg-white/5">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-4 w-4">
                                    <path d="M12 3l9 8h-3v9h-12v-9h-3l9-8z" />
                                </svg>
                            </span>
                            <span class="nav-text">Beranda</span>
                        </a></li>

                    <li><a href="#about"
                            class="nav-link group flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-white/5 ring-1 ring-transparent hover:ring-white/10 transition">
                            <span class="inline-grid place-items-center h-6 w-6 rounded-md bg-white/5">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-4 w-4">
                                    <path
                                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-3.33 0-10 1.67-10 5v3h20v-3c0-3.33-6.67-5-10-5z" />
                                </svg>
                            </span>
                            <span class="nav-text">About</span>
                        </a></li>

                    <li><a href="#projects"
                            class="nav-link group flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-white/5 ring-1 ring-transparent hover:ring-white/10 transition">
                            <span class="inline-grid place-items-center h-6 w-6 rounded-md bg-white/5">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-4 w-4">
                                    <path d="M4 6h16v12H4zM6 8v8h12V8z" />
                                </svg>
                            </span>
                            <span class="nav-text">Projects</span>
                        </a></li>

                    <li><a href="#skills"
                            class="nav-link group flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-white/5 ring-1 ring-transparent hover:ring-white/10 transition">
                            <span class="inline-grid place-items-center h-6 w-6 rounded-md bg-white/5">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-4 w-4">
                                    <path d="M12 2L2 7l10 5 10-5-10-5zm0 7l-10 5 10 5 10-5-10-5z" />
                                </svg>
                            </span>
                            <span class="nav-text">Skills</span>
                        </a></li>

                    <li><a href="#contact"
                            class="nav-link group flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-white/5 ring-1 ring-transparent hover:ring-white/10 transition">
                            <span class="inline-grid place-items-center h-6 w-6 rounded-md bg-white/5">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-4 w-4">
                                    <path d="M21 8V7l-3 2-2-1-3 2-2-1-3 2-2-1L3 11v9h18V8z" />
                                </svg>
                            </span>
                            <span class="nav-text">Contact</span>
                        </a></li>
                </ul>
            </nav>

            <div class="mt-auto p-5 border-t border-white/10 text-xs text-white/60">
                <p class="leading-tight">© <span id="year"></span> Nathaniello. All rights reserved.</p>
            </div>

            <div class="ring-gradient rounded-2xl pointer-events-none"></div>
        </div>
    </aside>

    <main class="relative transition-[margin] duration-300 ease-out md:ml-64" id="mainContent">
        <section id="home" class="min-h-[84vh] flex items-center">
            <div class="w-full px-6 md:px-10 lg:px-16 py-16">
                <div class="max-w-5xl">
                    <div
                        class="inline-flex items-center gap-2 rounded-full px-3 py-1.5 text-xs bg-white/5 ring-1 ring-white/10 mb-4">
                        <span class="h-2 w-2 rounded-full bg-neon-blue animate-pulse"></span>
                        <span>Software engineer - UI UX Designer</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl lg:text-6xl font-semibold tracking-tight leading-[1.15]">
                        Muhammad <span class="gradient-text">Nathaniello</span> Bintang Widiyanto
                    </h2>

                    <p class="mt-4 text-white/70 max-w-2xl">
                        Menggabungkan kekuatan backend dengan keindahan UI/UX untuk menciptakan pengalaman digital yang
                        elegan dan
                        fungsional.
                    </p>
                    <div class="mt-8 flex flex-wrap items-center gap-3">
                        <a href="#projects"
                            class="btn-primary inline-flex items-center gap-2 rounded-full px-5 py-2.5 bg-white/10 ring-1 ring-white/15 hover:bg-white/15 transition">
                            <span>Lihat Projects</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path d="M13 5l7 7-7 7v-4H4v-6h9V5z" />
                            </svg>
                        </a>
                        <a href="#contact"
                            class="inline-flex items-center gap-2 rounded-full px-5 py-2.5  ring-2 ring-white/10 hover:bg-white/10 transition">
                            <span>Download CV</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path d="M21 8V7l-3 2-2-1-3 2-2-1-3 2-2-1L3 11v9h18V8z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="px-6 md:px-10 lg:px-16 py-20">
            <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-8 items-stretch">
                <div class="relative">
                    <div id="imageSlider" class="card card-hover rounded-2xl p-3 backdrop-blur-xs relative h-[420px]">
                        <img src="{{ asset('asset/IMG_4867 2.JPG') }}" alt="Foto Profil 1"
                            class="rounded-xl object-cover h-full w-full absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100" />
                        <img src="{{ asset('asset/IMG_6236.jpg') }}" alt="Foto Profil 2"
                            class="rounded-xl object-cover h-full w-full absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0" />
                        <img src="{{ asset('asset/IMG_4805.jpg') }}" alt="Foto Profil 3"
                            class="rounded-xl object-cover h-full w-full absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0" />
                    </div>
                    <div aria-hidden="true"
                        class="absolute -z-10 -inset-3 rounded-3xl bg-gradient-to-tr from-neon-blue/10 via-neon-purple/10 to-neon-mint/10 blur-xl">
                    </div>
                </div>
                <div class="flex flex-col justify-center">
                    <h3 class="text-2xl md:text-3xl font-semibold">Tentang Saya</h3>
                    <p class="mt-4 text-white/70 leading-relaxed">
                        Halo! Saya <span class="font-medium text-white">Nathaniello</span>, seorang Software Engineer &
                        UI/UX
                        Enthusiast yang fokus pada performa, aksesibilitas, dan pengalaman pengguna. Saya suka membangun
                        antarmuka
                        bersih, modern, dan scalable.
                    </p>
                    <p class="mt-3 text-white/70 leading-relaxed">
                        Keahlian saya meliputi pengembangan web dengan skill backend, desain sistem, dan integrasi API.
                        Saya percaya
                        kolaborasi, dokumentasi yang jelas.
                    </p>
                </div>
            </div>
        </section>

        <section id="projects" class="px-6 md:px-10 lg:px-16 py-20">
            <div class="max-w-6xl mx-auto">
                <div class="flex items-end justify-between gap-4">
                    <h3 class="text-2xl md:text-3xl font-semibold">Projects Terpilih</h3>
                    <a href="https://github.com/NathanTzy" target="_blank"
                        class="text-sm text-neon-blue hover:underline">Semua repos di GitHub →</a>
                </div>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                    @forelse ($projects as $project)
                        <article class="card card-hover rounded-2xl overflow-hidden">
                            <img src="{{ $project->image ? asset('storage/' . $project->image) : 'https://via.placeholder.com/400x200?text=No+Image' }}"
                                alt="{{ $project->name }}" class="h-40 w-full object-cover" />
                            <div class="p-5">
                                <h4 class="font-semibold">{{ $project->name }}</h4>
                                <p class="mt-1 text-sm text-white/70">{{ $project->description }}</p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span
                                        class="text-xs text-white/50">{{ implode(' • ', $project->technologies) }}</span>
                                    <a href="https://github.com/username/{{ Str::slug($project->name) }}"
                                        target="_blank"
                                        class="inline-flex items-center gap-1 text-sm text-neon-blue hover:underline">
                                        GitHub
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path d="M14 3h7v7h-2V6.414l-9.293 9.293-1.414-1.414L17.586 5H14V3z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @empty
                        <p class="text-white/70 col-span-full">Belum ada project yang ditambahkan.</p>
                    @endforelse
                </div>
            </div>
        </section>


        <section id="skills" class="px-6 md:px-10 lg:px-16 py-20">
            <div class="max-w-5xl mx-auto">
                <h3 class="text-2xl md:text-3xl font-semibold">Keahlian</h3>
                <p class="mt-2 text-white/70">Klik tiap judul untuk menampilkan daftar skill detail.</p>
                <div class="mt-6 space-y-4">
                    @forelse($skills as $skill)
                        <details class="group card rounded-2xl p-4 open:shadow-glow">
                            <summary class="flex cursor-pointer list-none items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <span
                                        class="inline-grid place-items-center h-8 w-8 rounded-lg bg-white/5 ring-1 ring-white/10">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" class="h-5 w-5">
                                            <path d="M3 3h7v7H3V3zm11 0h7v7h-7V3zM3 14h7v7H3v-7zm11 0h7v7h-7v-7z" />
                                        </svg>
                                    </span>
                                    <h4 class="font-medium">{{ $skill->name }}</h4>
                                </div>
                                <svg class="h-5 w-5 transition-transform duration-200 group-open:rotate-180"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                                        clip-rule="evenodd" />
                                </svg>
                            </summary>
                            <ul class="mt-3 grid sm:grid-cols-2 gap-2 text-sm text-white/80">
                                @foreach ($skill->details as $detail)
                                    <li class="rounded-xl bg-white/5 ring-1 ring-white/10 px-3 py-2">
                                        {{ $detail }}</li>
                                @endforeach
                            </ul>
                        </details>
                    @empty
                        <p class="text-white/70">Belum ada skill yang ditambahkan.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="experience" class="px-6 md:px-10 lg:px-16 py-20">
            <div class="max-w-6xl mx-auto">
                <h3 class="text-2xl md:text-3xl font-semibold">Pengalaman</h3>
                <p class="mt-2 text-white/70">
                    Beberapa langkah penting dalam perjalanan karier saya di dunia teknologi.
                </p>

                <div class="relative mt-12">
                    <!-- Garis timeline -->
                    <div
                        class="absolute left-1/2 transform -translate-x-1/2 top-0 bottom-0 w-[2px] bg-gradient-to-b from-neon-blue/30 via-neon-purple/30 to-neon-mint/30">
                    </div>

                    <div class="flex flex-col gap-16 relative z-10">
                        @foreach ($experiences as $index => $exp)
                            @php
                                $isLeft = $index % 2 === 0;
                                $dotColors = [
                                    'from-neon-blue via-neon-purple to-neon-mint',
                                    'from-neon-purple via-neon-mint to-neon-blue',
                                    'from-neon-mint via-neon-blue to-neon-purple',
                                ];
                                $dotColor = $dotColors[$index % count($dotColors)];
                                $textColor = ['text-neon-blue', 'text-neon-purple', 'text-neon-mint'][$index % 3];
                            @endphp

                            <div
                                class="flex md:justify-{{ $isLeft ? 'start' : 'end' }} relative experience-card {{ $isLeft ? 'from-left' : 'from-right' }}">
                                <!-- Titik timeline -->
                                <div
                                    class="absolute left-1/2 -translate-x-1/2 top-8 h-5 w-5 rounded-full bg-gradient-to-tr {{ $dotColor }} ring-4 ring-white/10 shadow-md shadow-neon-blue/30">
                                </div>

                                <!-- Card -->
                                <div
                                    class="card transition-transform duration-300 ease-out hover:-translate-y-2 hover:border-neon-blue/40 bg-white/5 border border-white/10 ring-1 ring-white/10 backdrop-blur-sm p-8 rounded-2xl md:w-[78%] {{ $isLeft ? 'md:mr-auto md:pr-12' : 'md:ml-auto md:pl-12' }}">
                                    <h4 class="text-xl font-medium text-white">{{ $exp->title }}</h4>
                                    <p class="text-sm {{ $textColor }} font-medium mt-1">{{ $exp->company }}</p>
                                    <p class="text-xs text-white/50 mt-0.5">{{ $exp->start_year }} –
                                        {{ $exp->end_year ?? 'Sekarang' }}</p>
                                    <p class="mt-3 text-sm text-white/70 leading-relaxed">{{ $exp->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>


        <section id="contact" class="px-6 md:px-10 lg:px-16 py-20">
            <div class="max-w-5xl mx-auto">
                <h3 class="text-2xl md:text-3xl font-semibold">Kontak</h3>
                <p class="mt-2 text-white/70">Siap berdiskusi? Pilih jalur favoritmu.</p>
                <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($contacts as $contact)
                        <div class="card card-hover rounded-2xl p-5 flex flex-col gap-3">
                            <div class="flex items-center gap-3">
                                <span
                                    class="inline-grid place-items-center h-10 w-10 rounded-xl bg-white/5 ring-1 ring-white/10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path
                                            d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                                    </svg>
                                </span>
                                <h4 class="font-medium">{{ $contact->title }}</h4>
                            </div>
                            <p class="text-sm text-white/70">{{ $contact->name }}</p>
                            <a href="{{ $contact->link }}" target="_blank"
                                class="mt-auto inline-flex items-center gap-1 text-sm text-neon-blue hover:underline">
                                Hubungi →
                            </a>
                        </div>
                    @empty
                        <p class="text-white/70 col-span-full">Belum ada kontak yang ditambahkan.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="comments" class="px-6 md:px-10 lg:px-16 py-20 w-full">
            <div class="w-full">
                <h3 class="text-2xl md:text-3xl font-semibold mb-6">Komentar</h3>

                <!-- Form komentar -->
                <form id="commentForm" class="flex flex-col gap-4 mb-8 w-full" method="POST"
                    action="{{ route('comments.store') }}">
                    @csrf
                    <input type="text" name="name" placeholder="Nama kamu"
                        class="card card-hover bg-card-strong border border-border rounded-2xl p-3 text-white placeholder-white/50 focus:outline-none focus:ring-1 focus:ring-neon-mint w-full"
                        required>
                    <textarea name="message" id="message" rows="3"
                        class="card card-hover bg-card-strong border border-border rounded-2xl p-4 text-white placeholder-white/50 focus:outline-none focus:ring-1 focus:ring-neon-mint w-full"
                        placeholder="Tulis komentar kamu..." required></textarea>
                    <button type="submit"
                        class="btn-primary inline-flex items-center justify-center px-6 py-2 rounded-xl bg-white/10 text-white font-medium hover:bg-white/15 transition w-full">
                        Tambah Komentar
                    </button>
                </form>

                <!-- Popup -->
                <div id="successPopup"
                    class="fixed inset-0 flex items-center justify-center bg-black/50 opacity-0 pointer-events-none transition-opacity duration-300 z-50">
                    <div class="bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg text-center w-72 relative">
                        <!-- Tombol tutup -->
                        <button id="closePopup"
                            class="absolute top-2 right-2 text-white font-bold hover:text-black">&times;</button>

                        <p>Pesan kamu sudah tersampaikan 😎👍</p>
                        <div class="h-1 bg-white/30 rounded-full mt-3 overflow-hidden">
                            <div id="popupProgress" class="h-1 bg-white w-0"></div>
                        </div>
                    </div>
                </div>



            </div>
        </section>

        <!-- Tombol buka tutup -->
        <button id="toggleWidget"
            class="fixed bottom-4 right-6 z-50 px-3 py-2 rounded-xl bg-white/20 text-white shadow-inner text-sm font-semibold hover:bg-white/30 transition-colors">
            ⏱️
        </button>

        <!-- Widget Jam -->
        <div id="clockContainer"
            class="fixed bottom-16 right-6 z-40 w-[300px] p-4 rounded-2xl 
       bg-white/10 backdrop-blur-sm shadow-lg 
       flex flex-col items-center gap-4 font-sans
       outline outline-white/30 
       slide-open">

            <!-- Region Display -->
            <div id="regionDisplay" class="flex items-center gap-2 text-white font-semibold text-sm">
                🌏 Local
            </div>

            <!-- Clock -->
            <div class="flex flex-col items-center">
                <div id="digitalClock" class="text-white font-mono text-2xl drop-shadow-lg">00:00:00</div>
                <canvas id="analogClock" width="120" height="120" class="hidden drop-shadow-lg mt-1"></canvas>
            </div>

            <!-- Date info -->
            <div id="dateDisplay" class="text-white/80 text-sm font-medium text-center"></div>

            <!-- Dropdown Timezone -->
            <select id="timezoneSelect"
                class="w-full bg-white/20 text-white rounded-xl px-3 py-1 text-sm shadow-inner">
                <option value="local" selected>🌏 Local</option>
                <option value="Asia/Jakarta">🇮🇩 Jakarta</option>
                <option value="Asia/Tokyo">🇯🇵 Tokyo</option>
                <option value="Europe/London">🇬🇧 London</option>
                <option value="America/New_York">🇺🇸 New York</option>
                <option value="UTC">🕒 UTC</option>
            </select>

            <!-- Toggle Clock -->
            <button id="toggleClock"
                class="w-full px-3 py-2 rounded-xl bg-white/20 text-white shadow-inner text-sm font-semibold hover:bg-white/30 transition-colors">
                Analog
            </button>
        </div>



        <footer class="px-6 md:px-10 lg:px-16 pb-16">
            <div class="max-w-6xl mx-auto">
                <div class="card rounded-2xl p-6 flex flex-col md:flex-row items-center justify-between gap-4">
                    <p class="text-white/70 text-sm">Terima kasih sudah mampir. Dibuat dengan Tailwind + GSAP.</p>
                    <div class="flex items-center gap-3">
                        <a href="#home"
                            class="inline-flex items-center gap-2 rounded-xl px-4 py-2 bg-white/5 ring-1 ring-white/10 hover:bg-white/10 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8-8-8z" />
                            </svg>
                            <span>Back to Top</span>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </main>

    <script>
        // cursor effect

        (function() {
            const ring = document.getElementById('cursorRing');
            if (!ring) return;

            const RING_SIZE = 100;
            const EASE = 0.08; // Bikin smooth delay
            let targetX = 0,
                targetY = 0;
            let x = 0,
                y = 0;

            // Ambil posisi kursor setiap gerakan mouse
            window.addEventListener('mousemove', e => {
                targetX = e.clientX - RING_SIZE / 2;
                targetY = e.clientY - RING_SIZE / 2;
                ring.style.opacity = 1;
            }, {
                passive: true
            });

            function tick() {
                // Interpolasi biar smooth
                x += (targetX - x) * EASE;
                y += (targetY - y) * EASE;

                // Update posisi elemen
                ring.style.transform = `translate3d(${x}px, ${y}px, 0)`;

                requestAnimationFrame(tick);
            }
            tick();

            // Hide saat keluar window
            window.addEventListener('mouseleave', () => ring.style.opacity = 0);
            window.addEventListener('mouseenter', () => ring.style.opacity = 1);

            // Efek echo pas klik
            window.addEventListener('click', e => {
                const echo = document.createElement('div');
                echo.className = 'cursor-echo';
                echo.style.left = e.clientX + 'px';
                echo.style.top = e.clientY + 'px';

                document.body.appendChild(echo);

                // Hapus setelah animasi selesai
                echo.addEventListener('animationend', () => {
                    echo.remove();
                });
            });
        })();
    </script>

    <script>
        // ===================================
        // GLOBAL UTILITY FUNCTIONS
        // ===================================

        // Util: elemen
        const $ = (sel, parent = document) => parent.querySelector(sel)
        const $$ = (sel, parent = document) => Array.from(parent.querySelectorAll(sel))

        // Set tahun dinamis di footer
        $('#year').textContent = new Date().getFullYear()


        // ===================================
        // SIDEBAR & NAVIGASI MOBILE
        // ===================================

        // Dapatkan elemen yang diperlukan
        const burgerBtn = document.getElementById('burgerBtn');
        const sidebar = document.getElementById('sidebar');

        // Tambahkan event listener untuk tombol burger
        burgerBtn.addEventListener('click', () => {
            // Toggle class untuk menampilkan/menyembunyikan sidebar
            sidebar.classList.toggle('-translate-x-full');

            // Cek apakah sidebar terbuka
            if (sidebar.classList.contains('-translate-x-full')) {
                // Jika sidebar tertutup, tampilkan tombol burger
                burgerBtn.style.display = 'block';
            } else {
                // Jika sidebar terbuka, sembunyikan tombol burger
                burgerBtn.style.display = 'none';
            }
        });

        // Tambahkan event listener untuk memantau transisi sidebar
        sidebar.addEventListener('transitionend', () => {
            // Logika hanya berjalan di layar mobile (ukuran di bawah 768px)
            if (window.innerWidth < 768) {
                if (sidebar.classList.contains('-translate-x-full')) {
                    // Jika sidebar sudah selesai ditutup, pastikan tombol burger muncul
                    burgerBtn.style.display = 'block';
                } else {
                    // Jika sidebar sudah selesai dibuka, pastikan tombol burger hilang
                    burgerBtn.style.display = 'none';
                }
            }
        });

        // Event listener untuk menutup sidebar saat klik di luar area
        window.addEventListener('click', (e) => {
            // Logika hanya berlaku untuk layar mobile
            if (window.innerWidth < 768 && !sidebar.contains(e.target) && !burgerBtn.contains(e.target)) {
                // Tambahkan class untuk menutup sidebar
                sidebar.classList.add('-translate-x-full');
            }
        });

        // Event listener untuk mengatur tampilan saat ukuran layar berubah
        window.addEventListener('resize', () => {
            // Jika layar > 768px (desktop), sembunyikan tombol burger
            if (window.innerWidth >= 768) {
                burgerBtn.style.display = 'none';
                // Pastikan sidebar terbuka di desktop
                sidebar.classList.remove('-translate-x-full');
            } else {
                // Jika layar <script 768px (mobile)
                if (sidebar.classList.contains('-translate-x-full')) {
                    // Jika sidebar tertutup, tampilkan tombol burger
                    burgerBtn.style.display = 'block';
                } else {
                    // Jika sidebar terbuka, sembunyikan tombol burger
                    burgerBtn.style.display = 'none';
                }
            }
        });

        // Nav aktif saat scroll dengan GSAP
        const sections = ['home', 'about', 'projects', 'skills', 'contact', 'gallery'].map(id => ({
            id,
            el: document.getElementById(id)
        }))
        const navLinks = $$('.nav-link')

        const activateNav = (id) => {
            navLinks.forEach(a => a.classList.remove('bg-white/5', 'ring-white/10'))
            const link = navLinks.find(a => a.getAttribute('href') === `#${id}`)
            if (link) link.classList.add('bg-white/5', 'ring-white/10')
        }


        // ===================================
        // GSAP ANIMATIONS
        // ===================================

        gsap.registerPlugin(ScrollTrigger)

        // Reveal anim tiap section
        sections.forEach(({
            id,
            el
        }) => {
            if (!el) return

            gsap.from(el, {
                opacity: 0,
                y: 40,
                duration: 1,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: el,
                    start: "top 80%", // mulai animasi saat 80% layar
                    toggleActions: "play none none reverse"
                }
            })

            // ScrollSpy nav aktif
            ScrollTrigger.create({
                trigger: el,
                start: "top center",
                end: "bottom center",
                onEnter: () => activateNav(id),
                onEnterBack: () => activateNav(id),
            })
        })


        // Hover parallax pada card galeri (tipis)
        $$('#gallery img').forEach(img => {
            img.addEventListener('mousemove', (e) => {
                const r = img.getBoundingClientRect()
                const dx = (e.clientX - (r.left + r.width / 2)) / r.width
                const dy = (e.clientY - (r.top + r.height / 2)) / r.height
                img.style.transform = `translateY(-2px) rotateX(${dy * -2}deg) rotateY(${dx * 2}deg)`
            })
            img.addEventListener('mouseleave', () => img.style.transform = 'translateY(0) rotateX(0) rotateY(0)')
            img.style.transition = 'transform .2s ease'
        })

        // Smooth scroll untuk anchor nav
        navLinks.forEach(a => a.addEventListener('click', (e) => {
            // default behavior ok karena html {scroll-behavior:smooth}
            // berikan efek klik halus
            gsap.to(window, {
                duration: .4,
                scrollTo: a.getAttribute('href')
            })
        }))


        window.addEventListener('load', () => {
            const slider = document.getElementById('imageSlider');
            const images = slider.querySelectorAll('img');
            let currentImageIndex = 0;

            function startSlider() {
                setInterval(() => {
                    // Sembunyikan foto saat ini
                    images[currentImageIndex].classList.remove('opacity-100');
                    images[currentImageIndex].classList.add('opacity-0');

                    // Pindah ke foto berikutnya
                    currentImageIndex = (currentImageIndex + 1) % images.length;

                    // Tampilkan foto berikutnya
                    images[currentImageIndex].classList.remove('opacity-0');
                    images[currentImageIndex].classList.add('opacity-100');
                }, 2000); // Ganti gambar setiap 5 detik
            }

            startSlider();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                const popup = document.getElementById('successPopup');
                const progress = document.getElementById('popupProgress');
                const closeBtn = document.getElementById('closePopup');

                // tampilkan popup
                popup.classList.remove('opacity-0', 'pointer-events-none');
                popup.classList.add('opacity-100');

                // animasi progress bar 3 detik
                let width = 0;
                const interval = setInterval(() => {
                    width += 1;
                    progress.style.width = width + '%';
                    if (width >= 100) {
                        clearInterval(interval);
                        popup.classList.add('opacity-0', 'pointer-events-none');
                        popup.classList.remove('opacity-100');
                    }
                }, 30); // 30ms * 100 ~ 3 detik

                // tombol tutup manual
                closeBtn.addEventListener('click', () => {
                    clearInterval(interval); // stop progress
                    popup.classList.add('opacity-0', 'pointer-events-none');
                    popup.classList.remove('opacity-100');
                });
            @endif
        });
    </script>

    <script>
        const digitalClock = document.getElementById('digitalClock');
        const analogClock = document.getElementById('analogClock');
        const toggleBtn = document.getElementById('toggleClock');
        const timezoneSelect = document.getElementById('timezoneSelect');
        const dateDisplay = document.getElementById('dateDisplay');
        const regionDisplay = document.getElementById('regionDisplay');

        let showAnalog = false;
        toggleBtn.addEventListener('click', () => {
            showAnalog = !showAnalog;
            digitalClock.style.display = showAnalog ? 'none' : 'block';
            analogClock.style.display = showAnalog ? 'block' : 'none';
            toggleBtn.textContent = showAnalog ? 'Digital' : 'Analog';
        });

        let currentTZ = 'local';
        timezoneSelect.addEventListener('change', (e) => {
            currentTZ = e.target.value;
            const selected = timezoneSelect.options[timezoneSelect.selectedIndex];
            regionDisplay.textContent = selected.textContent;
        });

        function getTimeParts(tz) {
            const now = new Date();
            if (tz === 'local') return {
                h: now.getHours(),
                m: now.getMinutes(),
                s: now.getSeconds(),
                dateStr: now.toLocaleDateString('en-US', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                })
            };
            const options = {
                hour: 'numeric',
                minute: 'numeric',
                second: 'numeric',
                hour12: false,
                timeZone: tz
            };
            const dateOptions = {
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                year: 'numeric',
                timeZone: tz
            };
            const timeStr = now.toLocaleTimeString('en-US', options);
            const dateStr = new Intl.DateTimeFormat('en-US', dateOptions).format(now);
            const [h, m, s] = timeStr.split(':').map(Number);
            return {
                h,
                m,
                s,
                dateStr
            };
        }

        function updateDigital() {
            const {
                h,
                m,
                s,
                dateStr
            } = getTimeParts(currentTZ);
            digitalClock.textContent =
                `${String(h).padStart(2,'0')}:${String(m).padStart(2,'0')}:${String(s).padStart(2,'0')}`;
            dateDisplay.textContent = dateStr;
        }

        // Analog setup
        const ctx = analogClock.getContext('2d');
        const radius = analogClock.width / 2;
        ctx.translate(radius, radius);

        function drawClock() {
            const {
                h,
                m,
                s
            } = getTimeParts(currentTZ);

            ctx.clearRect(-radius, -radius, analogClock.width, analogClock.height);

            // Outer circle
            ctx.beginPath();
            ctx.arc(0, 0, radius - 2, 0, 2 * Math.PI);
            ctx.fillStyle = '#00000030';
            ctx.fill();
            ctx.lineWidth = 2;
            ctx.strokeStyle = '#6ee7ff88';
            ctx.stroke();

            // Numbers
            ctx.fillStyle = '#ffffffcc';
            ctx.font = `${radius*0.15}px Poppins`;
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            for (let num = 1; num <= 12; num++) {
                const ang = num * Math.PI / 6;
                const x = Math.sin(ang) * (radius * 0.8);
                const y = -Math.cos(ang) * (radius * 0.8);
                ctx.fillText(num, x, y);
            }

            // Hour hand
            let hour = h % 12;
            let hourAngle = ((hour + m / 60) * Math.PI / 6);
            ctx.beginPath();
            ctx.lineWidth = 4;
            ctx.strokeStyle = '#6ee7ff';
            ctx.moveTo(0, 0);
            ctx.lineTo(Math.sin(hourAngle) * (radius * 0.5), -Math.cos(hourAngle) * (radius * 0.5));
            ctx.stroke();

            // Minute hand
            let minAngle = ((m + s / 60) * Math.PI / 30);
            ctx.beginPath();
            ctx.lineWidth = 3;
            ctx.strokeStyle = '#c4b5fd';
            ctx.moveTo(0, 0);
            ctx.lineTo(Math.sin(minAngle) * (radius * 0.7), -Math.cos(minAngle) * (radius * 0.7));
            ctx.stroke();

            // Second hand
            let secAngle = (s * Math.PI / 30);
            ctx.beginPath();
            ctx.lineWidth = 1.5;
            ctx.strokeStyle = '#a8ffdf';
            ctx.moveTo(0, 0);
            ctx.lineTo(Math.sin(secAngle) * (radius * 0.8), -Math.cos(secAngle) * (radius * 0.8));
            ctx.stroke();

            // Center dot
            ctx.beginPath();
            ctx.arc(0, 0, 4, 0, 2 * Math.PI);
            ctx.fillStyle = '#a8ffdf';
            ctx.fill();
        }

        function tick() {
            if (!showAnalog) updateDigital();
            else drawClock();
            requestAnimationFrame(tick);
        }
        tick();
    </script>

    <script>
        const toggleWidgetBtn = document.getElementById("toggleWidget");
        const clockContainer = document.getElementById("clockContainer");

        let isOpen = true;

        toggleWidgetBtn.addEventListener("click", () => {
            if (isOpen) {
                clockContainer.classList.remove("slide-open");
                clockContainer.classList.add("slide-closed");
            } else {
                clockContainer.classList.remove("slide-closed");
                clockContainer.classList.add("slide-open");
            }
            isOpen = !isOpen;
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            gsap.registerPlugin(ScrollTrigger);

            gsap.utils.toArray('.experience-card').forEach(card => {
                const fromLeft = card.classList.contains('from-left');

                gsap.from(card, {
                    x: fromLeft ? -200 : 200,
                    opacity: 0,
                    scale: 0.95,
                    duration: 1,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: card,
                        start: 'top 80%',
                        toggleActions: 'play none none none'
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const preloader = document.getElementById('preloader');
            const loadingBar = document.getElementById('loadingBar');
            const glowHead = document.getElementById('glowHead');
            const duration = 3.5;

            // Cek localStorage, kalau pernah load, hide preloader langsung
            if (localStorage.getItem('preloaderShown')) {
                preloader.style.display = 'none';
                return;
            }

            // Tampilkan preloader
            preloader.style.display = 'flex';

            gsap.to(loadingBar, {
                width: '100%',
                duration: duration,
                ease: 'power2.inOut'
            });

            gsap.to(glowHead, {
                x: 'calc(100% - 2rem)',
                duration: duration,
                ease: 'power2.inOut'
            });

            // Fade out preloader dan simpan state di localStorage
            gsap.delayedCall(duration, () => {
                gsap.to(preloader, {
                    opacity: 0,
                    duration: 0.5,
                    onComplete: () => {
                        preloader.style.display = 'none';
                        localStorage.setItem('preloaderShown', 'true');
                    }
                });
            });
        });
    </script>




    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollToPlugin.min.js"></script>
</body>

</html>
