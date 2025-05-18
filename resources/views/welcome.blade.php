<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reoil Collect</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('Template/assets/static/images/logo/logo-reoil-2.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, rgba(168, 85, 247, 0.95) 0%, rgba(126, 34, 206, 0.95) 100%);
        }

        .wave-shape {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }

        .wave-shape svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 100px;
        }

        .wave-shape .shape-fill {
            fill: #FFFFFF;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
                0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-sans antialiased text-gray-800">
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center">
                        <i class="fas fa-recycle text-3xl text-purple-600 mr-2"></i>
                        <span class="font-bold text-xl text-purple-800">REOIL.COLLECT</span>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-purple-600 font-medium hover:text-purple-800 transition">Beranda</a>
                    <a href="#about" class="text-gray-600 hover:text-purple-600 transition">Tentang Kami</a>
                    <a href="#contact" class="text-gray-600 hover:text-purple-600 transition">Kontak</a>
                    <a href="{{ route('login') }}"
                        class="bg-purple-600 text-white px-4 py-2 rounded-md hover:bg-purple-700 transition">
                        <i class="fas fa-lock mr-2"></i>Login Admin
                    </a>
                </div>

                <div class="md:hidden flex items-center">
                    <button class="mobile-menu-button">
                        <i class="fas fa-bars text-gray-600 text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile menu -->
        <div class="mobile-menu hidden md:hidden bg-white pb-4 px-4">
            <a href="#home" class="block py-2 text-purple-600 font-medium">Beranda</a>
            <a href="#about" class="block py-2 text-gray-600 hover:text-purple-600">Tentang Kami</a>
            <a href="#contact" class="block py-2 text-gray-600 hover:text-purple-600">Kontak</a>
            <a href="{{ route('login') }}"
                class="block bg-purple-600 text-white px-4 py-2 rounded-md mt-2 text-center hover:bg-purple-700 transition">
                <i class="fas fa-lock mr-2"></i>Login Admin
            </a>
        </div>

    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative hero-gradient text-white pt-20 pb-32">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-12 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6" id="typewriter">

                    </h1>
                    <p class="text-xl mb-8 opacity-90">
                        Kami mengumpulkan dan mendaur ulang oli bekas dengan cara yang bertanggung jawab terhadap
                        lingkungan. Bergabunglah dengan kami dalam menjaga bumi yang lebih bersih.
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="#contact"
                            class="bg-white text-purple-600 px-6 py-3 rounded-lg font-semibold text-center hover:bg-gray-100 transition">
                            Hubungi Kami
                        </a>
                        <a href="#about"
                            class="border-2 border-white text-white px-6 py-3 rounded-lg font-semibold text-center hover:bg-white hover:bg-opacity-10 hover:text-purple-100 transition">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>

                </div>
                <div class="md:w-1/2">
                    <img src="{{ asset('Template/assets/static/images/logo/logo-reoil-2.png') }}" alt="Oil recycling"
                        class="rounded-xl shadow-2xl border-4 border-white w-full max-w-md object-contain">
                </div>

            </div>
        </div>
        <div class="wave-shape">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Mengapa Memilih Reoil Collect?</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Kami memberikan solusi terbaik untuk pengelolaan oli bekas dengan standar lingkungan tertinggi.
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="feature-card bg-white p-8 rounded-xl shadow-md transition duration-300">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-leaf text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-purple-800">Ramah Lingkungan</h3>
                    <p class="text-gray-600">
                        Proses daur ulang kami memenuhi standar lingkungan internasional untuk meminimalkan dampak
                        ekologis.
                    </p>
                </div>
                <div class="feature-card bg-white p-8 rounded-xl shadow-md transition duration-300">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-award text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-purple-800">Profesional</h3>
                    <p class="text-gray-600">
                        Tim ahli kami siap memberikan layanan terbaik dengan peralatan modern dan prosedur yang aman.
                    </p>
                </div>
                <div class="feature-card bg-white p-8 rounded-xl shadow-md transition duration-300">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-clock text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-purple-800">Layanan Cepat</h3>
                    <p class="text-gray-600">
                        Penjemputan tepat waktu dengan sistem penjadwalan yang fleksibel sesuai kebutuhan Anda.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-12 md:mb-0 md:pr-12">
                    <img src="https://images.unsplash.com/photo-1605152276897-4f618f831968?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1080&q=80"
                        alt="About ReoilCollect" class="rounded-xl shadow-lg">
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Tentang Kami</h2>
                    <p class="text-gray-600 mb-6">
                        REOIL.COLLECT adalah perusahaan yang bergerak di bidang pengumpulan dan
                        pengelolaan limbah oli bekas dari berbagai bengkel kendaraan dan pelaku
                        usaha otomotif.
                    </p>
                    <p class="text-gray-600 mb-6">
                        Perusahaan ini hadir sebagai solusi atas permasalahan
                        pencemaran lingkungan yang disebabkan oleh pembuangan oli bekas secara
                        sembarangan.
                    </p>
                    <div class="bg-purple-50 border-l-4 border-purple-500 p-4 mb-6">
                        <p class="text-purple-800 font-medium">
                            <i class="fas fa-quote-left mr-2"></i> Visi kami adalah Menjadi penggerak utama dalam
                            pengurangan limbah oli bekas demi lingkungan
                            yang lebih bersih dan berkelanjutandengan konsep 3R (Reuse, Reduce dan Recycle).
                        </p>
                    </div>
                    <div class="flex items-center">
                        <div class="bg-purple-100 p-3 rounded-full mr-4">
                            <i class="fas fa-recycle text-purple-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-purple-800">Proses Daur Ulang Kami</h4>
                            <p class="text-sm text-gray-600">Menggunakan teknologi terbaru dengan efisiensi 98%</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-purple-700 text-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 text-center">
                <div class="p-4">
                    <div class="text-4xl font-bold mb-2">500+</div>
                    <div class="text-purple-200">Klien Perusahaan</div>
                </div>
                <div class="p-4">
                    <div class="text-4xl font-bold mb-2">10K+</div>
                    <div class="text-purple-200">Liter Oli Didaur Ulang</div>
                </div>
                <div class="p-4">
                    <div class="text-4xl font-bold mb-2">50+</div>
                    <div class="text-purple-200">Kota Terlayani</div>
                </div>
                <div class="p-4">
                    <div class="text-4xl font-bold mb-2">100%</div>
                    <div class="text-purple-200">Kepuasan Pelanggan</div>
                </div>
            </div>
        </div>
    </section>


    <section id="contact" class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Hubungi Kami</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Siap membantu pengelolaan oli bekas Anda dengan profesional dan ramah lingkungan.
                </p>
            </div>
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="md:flex">
                    <div class="md:w-1/2 bg-purple-600 text-white p-12">
                        <h3 class="text-2xl font-bold mb-6">Informasi Kontak</h3>
                        <div class="flex items-start mb-8">
                            <div class="bg-purple-500 p-3 rounded-full mr-4">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">WhatsApp</h4>
                                <p class="opacity-90">+62 812 3456 7890</p>
                                <a href="https://wa.me/6281234567890"
                                    class="inline-block mt-2 bg-white text-purple-600 px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-100 transition">
                                    <i class="fab fa-whatsapp mr-2"></i> Chat Sekarang
                                </a>
                            </div>
                        </div>
                        <div class="flex items-start mb-8">
                            <div class="bg-purple-500 p-3 rounded-full mr-4">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">Email</h4>
                                <p class="opacity-90">info@ReoilCollect.id</p>
                                <a href="mailto:info@ReoilCollect.id"
                                    class="inline-block mt-2 bg-white text-purple-600 px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-100 transition">
                                    <i class="fas fa-paper-plane mr-2"></i> Kirim Email
                                </a>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-purple-500 p-3 rounded-full mr-4">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">Alamat Kantor</h4>
                                <p class="opacity-90">Jl. Lingkungan Hijau No. 45, Jakarta Selatan, Indonesia</p>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-1/2 p-12">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">Kirim Pesan</h3>
                        <form class="space-y-6" action="{{ route('kontak.store') }}" method="POST">
                            @csrf
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama
                                    Anda</label>
                                <input type="text" id="name" name="nama"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition">
                            </div>
                            <div>
                                <label for="email"
                                    class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" id="email" name="email"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor
                                    Telepon</label>
                                <input type="tel" id="phone" name="phone"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition">
                            </div>
                            <div>
                                <label for="message"
                                    class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                                <textarea id="message" name="message" rows="4"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition"></textarea>
                            </div>
                            <button type="submit"
                                class="w-full bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-700 transition focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 mb-12">
                <div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-recycle text-3xl text-emerald-500 mr-2"></i>
                        <span class="font-bold text-xl">ReoilCollect</span>
                    </div>
                    <p class="text-gray-400">
                        Solusi profesional untuk pengumpulan dan daur ulang oli bekas dengan standar lingkungan
                        tertinggi.
                    </p>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Tautan Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-white transition">Beranda</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white transition">Tentang Kami</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition">Kontak</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Login Admin</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Layanan</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Penjemputan Oli
                                Bekas</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Daur Ulang Oli</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Konsultasi
                                Lingkungan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Pelatihan Pengelolaan
                                Limbah</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Berlangganan</h4>
                    <p class="text-gray-400 mb-4">
                        Dapatkan informasi terbaru tentang layanan dan promosi kami.
                    </p>
                    <form class="flex">
                        <input type="email" placeholder="Email Anda"
                            class="px-4 py-2 w-full rounded-l-lg focus:outline-none text-gray-800">
                        <button type="submit"
                            class="bg-emerald-600 px-4 py-2 rounded-r-lg hover:bg-emerald-700 transition">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 mb-4 md:mb-0">
                    &copy; 2025 ReoilCollect. All rights reserved.
                </p>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white transition">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white transition">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });

                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                    }
                }
            });
        });

        const text = "Transformasi Limbah Oil Bekas Menjadi Peluang Bisnis";
        const typewriter = document.getElementById("typewriter");
        let i = 0;

        function typeWrite() {
            if (i < text.length) {
                typewriter.innerHTML += text.charAt(i);
                i++;
                setTimeout(typeWrite, 100);
            } else {
                setTimeout(resetTypewriter, 2000);
            }
        }

        function resetTypewriter() {
            typewriter.innerHTML = "";
            i = 0;
            typeWrite();
        }
        typeWrite();
    </script>

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'warning',
                    title: 'Formulir Belum Lengkap',
                    text: 'Mohon isi semua kolom yang diperlukan sebelum mengirim pesan.',
                    confirmButtonText: 'Tutup',
                    customClass: {
                        popup: 'swal2-popup-custom',
                        title: 'swal2-title-custom',
                        confirmButton: 'swal2-button-custom'
                    }
                });
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        </script>
    @endif
</body>

</html>
