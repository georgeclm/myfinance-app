<!DOCTYPE html>
<html lang="en">

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
                        <a class="nav-link" href="{{ route('indo') }}">Indonesia</a>
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
                <div class="card float-end ms-auto p-2 flex-shrink-1" style="width: 25rem; height: 42rem; border:none;">
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
                            Finance @else My Finance @endguest </a>
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
                <div class="fs-5 lh-lg">I am a university student in my Sophomore Year. Web development really
                    excited me,
                    especially for Backend development. I use Laravel a lot for my project for the backend but I
                    know Django and still learning Codeigniter for the Frontend I usually use Vue JS. I do other
                    programs for Data Analysis, Machine Learning, OOP, some games, and Algorithm problems.
                    Programming Language that I mainly use is Python and for the other, PHP, C#, Java, JavaScript,
                    SQL. I can work with the team and always try my best to motivate and achieve my goals. I am a
                    student and I haven't graduated yet but my Cumulative GPA until now is 3.87 and 4 GPA
                    for Web Programming Course. </div>
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
                            target="_blank"><img src="{{ asset('projects/courseralic.png') }}" class="img-fluid"
                                style="width: 20rem;"></a>
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
                    <div class="fs-5 lh-lg mb-3">This is the latest project that I created for my university
                        assignment basically commerce that sells services. This uses Laravel 8.0, Vue JS, Blade,
                        jQuery, AJAX for autocomplete, and MySQL basically the more advanced version of my previous
                        project E-Commerce. There is a rating system, display review, chat with the seller, ask
                        about the product, online payment.</div>
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
                    <div class="fs-5 lh-lg mb-3">This project is basically an Instagram clone. This uses Laravel
                        8.0, Vue JS, Blade, jQuery for select user search, Axios a lot for live request, and MySQL.
                        The chat is live and integrated with the pusher in this case for live notification with
                        event manager for each message and like with double click and comment is live. </div>
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
                    <div class="fs-5 lh-lg mb-3">This uses Laravel 8.0, Blade File, MySQL. It can Register, Log In
                        Check Products, Create Toko, Create a product, Add a product to cart, Order Products, Search
                        query, Check order lists.</div>
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
                    <div class="fs-5 lh-lg mb-3">This uses Laravel 8.0, Inertia JS, Full Vue JS, and MySQL for the
                        database. Admin program that can add any user to the database, for each user can add
                        reminder and in the home, screen admin can see their reminder today that need to be done for
                        each user and can create or modify package and auto email each admin for their reminders
                        today with the event handler.</div>
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
                    <div class="fs-5 lh-lg">This project is using python for creating the algorithm a simple data
                        analysis project. There is 2 function, the first one counts the momentum of stocks that is
                        based on 1-year price return until 1-month price return for the data I take from LQ45
                        Stocks. The second project is for value investing by taking PE, PB, PS, Enterprise Value
                        divided by Earnings before taxes, depreciation, and amortization, EV/Gross Profit Ratio then
                        count the most undervalued stocks I use S&P500 data that is free. </div>
                    <img src="{{ asset('projects/trading.png') }}" class="img-fluid">

                </li>
                <li class="mb-3">
                    <div class="fs-5 lh-lg mb-2 h3"><a href="https://github.com/georgeclm?tab=repositories"
                            target="_blank" class="link-dark"><strong> Other Projects </strong></a></div>
                    <div class="fs-5 lh-lg mb-3">These other projects inside my repositories contain a simple to-do
                        list android application with Kotlin, a simple machine learning program using TensorFlow in
                        python, some answer to algorithm question with python, my final project on the final exam
                        WebProg, Traditional Pong games, Snakes games with python, and other Laravel Projects.</div>
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
