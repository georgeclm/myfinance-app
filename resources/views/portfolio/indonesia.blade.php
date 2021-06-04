<!DOCTYPE html>
<html lang="in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Epafroditus George</title>
    <link rel="shortcut icon" href="{{ asset('img/logoicon.ico') }}" />
    <!--My style setting here-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!--My font here-->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap">
    <!--My bootstrap here-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid" style="width: 90%;">
            <a class="navbar-brand" href="#">George</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li> -->
                </ul>
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#skill">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#award">Awards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#project">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('english') }}">English</a>
                    </li>



                </ul>
            </div>
        </div>
    </nav>
    <div class="pb-2 text-center bg-image"
        style="background-image: url({{ asset('projects/fotolowres.jpg') }});height: 42rem; background-size: cover; background-position: center;">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
            <div class="d-flex">
                <div class="align-self-center p-2 w-75">
                    <div class="text-white">
                        <h3 class="mb-3">HELLO I'M</h3>
                        <h1 class="display-2 mb-3"><strong>Epafroditus George</strong></h1>
                        <h4 class="mb-3"> Web Developer</h4>
                    </div>
                </div>
                <div class="card float-end mss-auto p-2 flex-shrink-1"
                    style="width: 25rem; height: 42rem; border:none;">
                    <div class="text-center">
                        <img src="{{ asset('projects/3farsquare.jpg') }}" class="card-img-top rounded-circle mt-4"
                            style="width: 10rem; height: 10rem;">
                        <div class="card-body mt-3">
                            <h4 class="card-title mb-4">Epafroditus George Clement Djaja</h4>
                            <div class="card-text">Information Technology</div>
                            <div class="card-text">Web Developer</div>
                            <div class="card-text mb-5">Jawa Tengah, Semarang</div>
                            <div class="card-text">cavidjaja@gmail.com</div>
                            <div class="card-text">089647590083</div>
                        </div>
                        <div class="card-body">
                            <a href="https://www.instagram.com/george_clm/" class="card-link" target="_blank"><img
                                    src="{{ asset('img/instagram.png') }}" style="width: 1.5rem; height: 1.5rem;"></a>
                            <a href="https://www.linkedin.com/in/epafroditus-george-5b66bb1b7/" class="card-link"
                                target="_blank"><img src="{{ asset('img/linkedin.png') }}"
                                    style="width: 1.5rem; height: 1.5rem;"></a>
                            <a href="https://github.com/georgeclm" class="card-link" target="_blank"><img
                                    src="{{ asset('img/github.png') }}" style="width: 1.5rem; height: 1.5rem;"></a>
                            <a href="https://api.whatsapp.com/send/?phone=6289647590083&text&app_absent=0"
                                class="card-link" target="_blank"><img src="{{ asset('img/whatsapp.png') }}"
                                    style="width: 1.5rem; height: 1.5rem;"></a>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-outline-dark btn-lg" href="{{ route('login') }}">@guest Login to My
                            Finance @else My Finance @endguest</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mask" style="background-color: rgba(226, 226, 226, 0.6)">
    <div class="container m-auto p-lg-5">
        <div class="col-md-10 p-3">
            <div class="text-start">
                <h1 class="mb-2" id="about"><strong>About Me</strong></h1>
                <h6 class="mb-3 fw-lighter">My Background</h6>
                <div class="fs-5 lh-lg">Saya seorang mahasiswa di Tahun Kedua saya. Pengembangan web sangat membuat
                    saya bersemangat,
                    terutama untuk pengembangan Backend. Saya banyak menggunakan Laravel untuk proyek saya untuk
                    backend tetapi saya tahu Django dan masih mempelajari Codeigniter untuk Frontend saya biasanya
                    menggunakan Vue JS. Saya melakukan program lain untuk Analisis Data, Machine Learning, OOP,
                    beberapa game, dan masalah Algoritma. Bahasa Pemrograman yang saya gunakan terutama adalah
                    Python dan yang lainnya, PHP, C #, Java, JavaScript, SQL. Saya bisa bekerja dengan tim dan
                    selalu berusaha yang terbaik untuk memotivasi dan mencapai tujuan saya. Saya seorang mahasiswa
                    dan saya belum lulus tetapi IPK Kumulatif saya sampai saat ini adalah 3.87 dan IPK 4
                    untuk Kelas Pemrograman Web. </div>
            </div>
        </div>
    </div>

</div>
<div class="container m-auto p-lg-5">
    <div class="col-md-10 p-3">
        <div class="text-start">
            <h1 class="mb-2" id="skill"><strong>Skills</strong></h1>
            <h6 class="mb-3 fw-light">WHAT I BRING TO THE TABLE</h6>
        </div>
        <div class="d-flex">
            <div class="fs-5 lh-lg5 mb-2 h3"><strong> HTML, CSS, JavaScript</strong></div>
            <div class="fs-5 lh-lg mb-2 ms-auto">90%</div>
        </div>
        <div class="progress mb-4" style="height: 2px; width: 100%;">
            <div class="progress-bar bg-dark" role="progressbar" style="width: 90%" aria-valuenow="90"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex">
            <div class="fs-5 lh-lg5 mb-2 h3"><strong>Vue JS, React JS, Blade</strong></div>
            <div class="fs-5 lh-lg mb-2 ms-auto">75%</div>
        </div>
        <div class="progress mb-4" style="height: 2px; width: 100%;">
            <div class="progress-bar bg-dark" role="progressbar" style="width: 75%" aria-valuenow="75"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex">
            <div class="fs-5 lh-lg mb-2 h3"><strong> PHP, Laravel</strong></div>
            <div class="fs-5 lh-lg mb-2 ms-auto">90%</div>
        </div>
        <div class="progress mb-4" style="height: 2px; width: 100%;">
            <div class="progress-bar bg-dark" role="progressbar" style="width: 90%" aria-valuenow="90"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex">
            <div class="fs-5 lh-lg mb-2 h3"><strong> MySQL, Database, MongoDB</strong></div>
            <div class="fs-5 lh-lg mb-2 ms-auto">80%</div>
        </div>
        <div class="progress mb-4" style="height: 2px; width: 100%;">
            <div class="progress-bar bg-dark" role="progressbar" style="width: 80%" aria-valuenow="80"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex">
            <div class="fs-5 lh-lg mb-2 h3"><strong> Python, Django</strong></div>
            <div class="fs-5 lh-lg mb-2 ms-auto">75%</div>
        </div>
        <div class="progress mb-4" style="height: 2px; width: 100%;">
            <div class="progress-bar bg-dark" role="progressbar" style="width: 75%" aria-valuenow="75"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex">
            <div class="fs-5 lh-lg mb-2 h3"><strong> Algorithms, Problem Solving</strong></div>
            <div class="fs-5 lh-lg mb-2 ms-auto">80%</div>
        </div>
        <div class="progress mb-4" style="height: 2px; width: 100%;">
            <div class="progress-bar bg-dark" role="progressbar" style="width: 80%" aria-valuenow="80"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="d-flex">
            <div class="fs-5 lh-lg mb-2 h3"><strong> C#, Java and .NET</strong></div>
            <div class="fs-5 lh-lg mb-2 ms-auto">65%</div>
        </div>
        <div class="progress mb-4" style="height: 2px; width: 100%;">
            <div class="progress-bar bg-dark" role="progressbar" style="width: 65%" aria-valuenow="65"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
</div>
<div class="mask" style="background-color: rgba(197, 186, 186, 0.301)">

    <div class="container m-auto p-lg-5">
        <div class="col-md-12 p-3">
            <div class="text-start">
                <h1 class="mb-2" id="award"><strong>Awards</strong></h1>
                <h6 class="mb-3 fw-light">SERTIFICATION, FINALIST</h6>
                <ul>
                    <li class="mb-3">
                        <div class="fs-5 lh-lg mb-2 h3"><strong> Google IT Support (Paid)</strong></div>
                        <a href="https://www.coursera.org/account/accomplishments/specialization/certificate/F8ZQT8BU9QR3"
                            target="_blank"><img src="{{ asset('projects/courseralic.png') }}"
                                class="img-fluid"></a>
                    </li>
                    <li class="mb-3">
                        <div class="fs-5 lh-lg mb-2 h3"><strong> Finalist National Young Inventor Award
                                (NYIA)</strong></div>
                        <img src="{{ asset('projects/certificate3.jpg') }}" class="img-fluid">
                    </li>
                    <li class="mb-3">
                        <div class="fs-5 lh-lg mb-2 h3"><strong> Event in High School as IT</strong></div>
                        <img src="{{ asset('projects/certificate1.jpg') }}" class="img-fluid">
                        <img src="{{ asset('projects/certificate2.jpg') }}" class="img-fluid">
                    </li>
                    <li class="mb-3">
                        <div class="fs-5 lh-lg mb-2 h3"><strong> Other Coursera Sertificate</strong></div>
                        <img src="{{ asset('projects/coursera1.png') }}" class="img-fluid">
                        <img src="{{ asset('projects/coursera2.png') }}" class="img-fluid">
                        <img src="{{ asset('projects/coursera3.png') }}" class="img-fluid">
                        <img src="{{ asset('projects/coursera4.png') }}" class="img-fluid">
                        <img src="{{ asset('projects/coursera5.png') }}" class="img-fluid">
                        <img src="{{ asset('projects/coursera6.jpg') }}" class="img-fluid">
                        <img src="{{ asset('projects/coursera7.jpg') }}" class="img-fluid">
                        <img src="{{ asset('projects/coursera8.jpg') }}" class="img-fluid">

                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container m-auto p-lg-5">
    <div class="col-md-11 p-3">
        <div class="text-start">
            <h1 class="mb-2" id="project"><strong>Projects</strong></h1>
            <h6 class="mb-3 fw-lighter">Projects code in Github</h6>
            <ul>
                <li class="mb-3">
                    <div class="fs-5 lh-lg mb-2 h3"><a href="https://github.com/georgeclm/colance-app"
                            target="_blank" class="link-dark"><strong> Laravel Colance </strong></a></div>
                    <div class="fs-5 lh-lg mb-3">Ini adalah proyek terbaru yang saya buat untuk tugas kuliah saya
                        pada dasarnya perdagangan yang menjual jasa. Ini menggunakan Laravel 8.0, Vue JS, Blade,
                        jQuery, AJAX untuk pelengkapan otomatis, dan MySQL pada dasarnya adalah versi yang lebih
                        canggih dari proyek E-Commerce saya sebelumnya. Ada sistem rating, tampilan review, chat
                        dengan penjual, tanya tentang produk, pembayaran online.</div>
                    <img src="{{ asset('projects/colance1.png') }}" class="img-fluid">
                    <img src="{{ asset('projects/colance2.png') }}" class="img-fluid">
                    <img src="{{ asset('projects/colance3.png') }}" class="img-fluid">
                    <img src="{{ asset('projects/colance4.png') }}" class="img-fluid">
                    <img src="{{ asset('projects/colance7.png') }}" class="img-fluid">
                    <img src="{{ asset('projects/colance8.png') }}" class="img-fluid">
                    <img src="{{ asset('projects/colance9.png') }}" class="img-fluid">
                    <img src="{{ asset('projects/colance10.png') }}" class="img-fluid">
                    <img src="{{ asset('projects/colance11.png') }}" class="img-fluid">


                </li>
                <li class="mb-3">
                    <div class="fs-5 lh-lg mb-2 h3"><a href="https://github.com/georgeclm/socmedApplication"
                            target="_blank" class="link-dark"><strong> Laravel SocMed App</strong></a></div>
                    <div class="fs-5 lh-lg mb-3">
                        Proyek ini pada dasarnya adalah tiruan Instagram. Ini menggunakan Laravel 8.0, Vue JS,
                        Blade, jQuery untuk pencarian pengguna tertentu, Axios banyak untuk permintaan langsung, dan
                        MySQL. Obrolan langsung dan terintegrasi dengan pendorong dalam hal ini untuk pemberitahuan
                        langsung dengan pengelola acara untuk setiap pesan dan suka dengan klik dua kali dan
                        komentar langsung. </div>
                    <img src="{{ asset('projects/socmed1.png') }}" class="img-fluid">
                    <img src="{{ asset('projects/socmed2.png') }}" class="img-fluid">
                    <img src="{{ asset('projects/socmed3.png') }}" class="img-fluid">
                    <img src="{{ asset('projects/socmed4.png') }}" class="img-fluid">
                    <img src="{{ asset('projects/socmed5.png') }}" class="img-fluid">
                    <img src="{{ asset('projects/socmed6.png') }}" class="img-fluid">
                </li>
                <li class="mb-3">
                    <div class="fs-5 lh-lg mb-2 h3"><a href="https://github.com/georgeclm/E-Commerce"
                            target="_blank" class="link-dark"><strong> Laravel E-Commerce </strong></a></div>
                    <div class="fs-5 lh-lg mb-3">Ini menggunakan Laravel 8.0, Blade File, MySQL. Itu dapat
                        Mendaftar, Masuk Periksa Produk, Buat Toko, Buat produk, Tambahkan produk ke keranjang,
                        Pesan Produk, Permintaan pencarian, Periksa daftar pesanan.</div>
                    <img src="{{ 'projects/ecomm1.png' }}" class="img-fluid">
                    <img src="{{ 'projects/ecomm2.png' }}" class="img-fluid">
                    <img src="{{ 'projects/ecomm4.png' }}" class="img-fluid">
                    <img src="{{ 'projects/ecomm6.png' }}" class="img-fluid">
                    <img src="{{ 'projects/ecomm7.png' }}" class="img-fluid">
                    <img src="{{ 'projects/ecomm8.png' }}" class="img-fluid">
                </li>
                <li class="mb-3">
                    <div class="fs-5 lh-lg mb-2 h3"><a href="https://github.com/georgeclm/admin-program"
                            target="_blank" class="link-dark"><strong> Laravel Admin Website </strong></a></div>
                    <div class="fs-5 lh-lg mb-3">Ini menggunakan Laravel 8.0, Inertia JS, Full Vue JS, dan MySQL
                        untuk database. Program Admin yang dapat menambahkan pengguna mana pun ke database, untuk
                        setiap pengguna dapat menambahkan pengingat dan di beranda, admin layar dapat melihat
                        pengingat mereka hari ini yang perlu dilakukan untuk setiap pengguna dan dapat membuat atau
                        memodifikasi paket dan email otomatis setiap admin untuk mereka pengingat hari ini dengan
                        event handler.</div>
                    <img src="{{ asset('projects/admin1.png') }}" class="img-fluid">
                    <img src="{{ asset('projects/admin2.png') }}" class="img-fluid">
                    <img src="{{ asset('projects/admin3.png') }}" class="img-fluid">
                    <img src="{{ asset('projects/admin4.png') }}" class="img-fluid">
                    <img src="{{ asset('projects/admin5.png') }}" class="img-fluid">
                    <img src="{{ asset('projects/admin6.png') }}" class="img-fluid">
                </li>
                <li class="mb-3">
                    <div class="fs-5 lh-lg mb-2 h3"><a href="https://github.com/georgeclm/tradingalgorithm"
                            target="_blank" class="link-dark"><strong> Investing Algorithm </strong></a></div>
                    <div class="fs-5 lh-lg">Proyek ini menggunakan python untuk membuat algoritma proyek analisis
                        data sederhana. Ada 2 fungsi, yang pertama menghitung momentum saham yang didasarkan pada
                        return harga 1 tahun hingga return harga 1 bulan untuk data yang saya ambil dari Saham LQ45.
                        Proyek kedua adalah untuk investasi nilai dengan mengambil PE, PB, PS, Nilai Perusahaan
                        dibagi dengan Penghasilan sebelum pajak, depresiasi, dan amortisasi, EV / Rasio Laba Kotor
                        kemudian menghitung saham yang paling undervalued Saya menggunakan data S & P500 yang
                        gratis. </div>
                    <img src="{{ asset('projects/trading.png') }}" class="img-fluid">

                </li>
                <li class="mb-3">
                    <div class="fs-5 lh-lg mb-2 h3"><a href="https://github.com/georgeclm?tab=repositories"
                            target="_blank" class="link-dark"><strong> Other Projects </strong></a></div>
                    <div class="fs-5 lh-lg mb-3">Proyek-proyek lain di dalam repositori saya ini berisi aplikasi
                        android daftar tugas sederhana dengan Kotlin, program pembelajaran mesin sederhana
                        menggunakan TensorFlow di python, beberapa jawaban untuk pertanyaan algoritma dengan python,
                        proyek akhir saya pada ujian akhir WebProg, game Pong Tradisional, Ular game dengan python,
                        dan Proyek Laravel lainnya.</div>
                </li>


            </ul>
        </div>
    </div>
</div>
@include('layouts.footer')
<!--My javscript for bootstrap here-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>
</body>

</html>
