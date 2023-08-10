<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Animal+</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Red+Rose:wght@600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid py-2 d-none d-lg-flex">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div>
                    <small class="me-3"><i class="fa fa-map-marker-alt me-2"></i>2036 La Soukra, Ariana, Tunisie</small>
                    <small class="me-3"><i class="fa fa-clock me-2"></i>7/7 , 24H/24H</small>
                </div>
                <nav class="breadcrumb mb-0">
                    <a class="breadcrumb-item small text-body" href="#">Support</a>
                    <a class="breadcrumb-item small text-body" href="#">Terms</a>
                    <a class="breadcrumb-item small text-body" href="#">FAQs</a>
                </nav>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Brand Start -->
    <div class="container-fluid bg-primary text-white pt-4 pb-5 d-none d-lg-flex">
        <div class="container pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex">
                    <i class="bi bi-telephone-inbound fs-2"></i>
                    <div class="ms-3">
                        <h5 class="text-white mb-0">Nous Appelez</h5>
                        <span>+216 27 888 536</span>
                    </div>
                </div>
                <a href="/" class="h1 text-white mb-0">Ani<span class="text-dark">mal</span><span class="text-danger">+</span></a>
                <div class="d-flex">
                    <i class="bi bi-envelope fs-2"></i>
                    <div class="ms-3">
                        <h5 class="text-white mb-0">Nous Contactez</h5>
                        <span>animal+@gmail.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-lg-0 px-lg-3">
                <a href="/" class="navbar-brand d-lg-none">
                    <h1 class="text-primary m-0">Ani<span class="text-dark">mal</span><span class="text-danger">+</span></h1>
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="/dashboard" class="nav-item nav-link">Dashboard</a>
                        <a href="/mesanimeaux" class="nav-item nav-link">Mes Animeaux</a>
                        <a href="/accouplement" class="nav-item nav-link active">Accouplement</a>
                        <a href="/marketplace" class="nav-item nav-link">Marketplace</a>
                        <a href="#contact" class="nav-item nav-link">Contact</a>
                        @if(Agent::isMobile())
                        <a href="{{ route('profile.show') }}" class="nav-item nav-link active">Profil</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">Déconnexion</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> 
                        @else
                        <!-- <div class="nav-item dropdown d-flex ms-auto align-items-center">
    <img class="rounded-circle" src="{{ Auth::user()->profile_photo_url }}" alt="" style="width: 40px; height: 40px;">
    <div class="dropdown-menu bg-light m-0">
                                <a href="{{ route('profile.show') }}" class="dropdown-item">Profil</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">Déconnexion</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> 
                            </div>
</div> -->
@endif

                    </div>
                    
                    <div class="ms-auto d-none d-lg-flex">
                    <div class="nav-item dropdown d-flex ms-auto align-items-center">
    <img class="rounded-circle" src="{{ Auth::user()->profile_photo_url }}" alt="" style="width: 40px; height: 40px;">
    <div class="dropdown-menu bg-light m-0">
                                <a href="{{ route('profile.show') }}" class="dropdown-item">Profil</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">Déconnexion</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> 
                            </div>
</div>
</div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- <img src="{{ asset('storage/'.Auth::user()->profile_photo_path) }}" alt="Photo de profil"> -->

    <div class="container-fluid py-5">
    <div class="container">

                <!-- success  -->
                @if(session('success'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
            <!-- fin success -->

        <form id="search-form" class="row g-3">

        <div class="col-sm-3">
                <div class="form-floating">
                    <select class="form-select" id="type" name="type" id="breed-filter">
                        <option value="toutes">Toutes</option>
                        <option value="chien">chien</option>
                        <option value="chat">chat</option>
                        <!-- Autres options de races -->
                    </select>
                    <label for="sex">Type</label>
                </div>
            </div>

        <div class="col-sm-3">
                <div class="form-floating">
                    <select class="form-select" name="sex" id="breed-filter">
                        <option value="toutes">Toutes</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                        <!-- Autres options de races -->
                    </select>
                    <label for="sex">Sex</label>
                </div>
            </div>

            <div class="col-sm-3">
            <div class="form-floating">
                            <!-- <input type="text" class="form-control" id="email" placeholder="Your Email" name="race" :value="old('race')" required autofocus /> -->
                            <select class="form-select" id="race" name="race" :value="old('race')">
                            <option selected value="toutes">Toutes</option>
    <!-- Options de race seront ajoutées dynamiquement -->
</select>    
                            <label for="mail">Race</label>
                            </div>
            </div>

            <div class="col-sm-3">
                <button class="btn btn-primary w-50 py-3" type="submit"><i class="bi bi-search-heart"></i></button>
            </div>

        </form>
    </div>
</div>

<div id="search-results"></div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#search-form').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('animals.search') }}",
            method: 'GET',
            data: formData,
            success: function(response) {
                var animals = response;
                var resultsContainer = $('#search-results');
                resultsContainer.empty();

                if (animals.length > 0) {
                    var rowDiv = $('<div class="row g-4"></div>'); // Crée une div avec la classe "row g-4"

                    $.each(animals, function(index, animal) {
                        var card = '<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">' +
                            '<div class="service-item">' +
                            '<div class="icon-box-primary mb-4">' +
                            '<img width="210" height="210" src="{{ asset('storage/animal-images/') }}/' + animal.image + '" alt="Image de l\'animal">' +
                            '</div>' +
                            '<h5 class="mb-3">' + animal.nom + '</h5>' +
                            '<p class="mb-4">Type: ' + animal.type + '</p>' +
                            '<p class="mb-4">Race: ' + animal.race + '</p>' +
                            '<p class="mb-4">Sex: ' + animal.sex + '</p>' +
                            '<p class="mb-4">Date de naissance: ' + animal.date_naissance + '</p>' +
                            '<p class="mb-4">Propriétaire: ' + animal.user_name + '</p>' +
                            // '<p class="mb-4">id: ' + animal.id + '</p>' +
                            '<a class="btn btn-success px-3" href="/match/edit/' + animal.id + '">Matcher<i class="bi bi-arrow-through-heart ms-1"></i></a>' +
                            '</div>';

                        rowDiv.append(card); // Ajoute chaque carte d'animal à la div "rowDiv"
                    });

                    resultsContainer.append(rowDiv); // Ajoute la div "rowDiv" contenant toutes les cartes à la div "resultsContainer"
                } else {
                    resultsContainer.append('<div>Aucun animal trouvé.</div>');
                }
            }
        });
    });
});

</script>

<!-- script 2 get race -->

<!-- script 2 get race -->
<script>
    var typeDropdown = document.getElementById('type');
    var raceDropdown = document.getElementById('race');

    typeDropdown.addEventListener('change', function() {
        var selectedType = typeDropdown.value;
        var url = '/get-races2?type=' + selectedType;

        // Effectuer une requête AJAX pour récupérer les races correspondantes
        fetch(url)
            .then(response => response.json())
            .then(data => {
                // Conserver la valeur actuelle de la liste déroulante "Race"
                var currentValue = raceDropdown.value;

                // Effacer les options actuelles de la liste déroulante "Race"
                raceDropdown.innerHTML = '';

                // Ajouter l'option "Toutes"
                var optionAll = document.createElement('option');
                optionAll.value = 'toutes';
                optionAll.text = 'Toutes';
                raceDropdown.appendChild(optionAll);

                // Vérifier si data est un tableau
                if (Array.isArray(data)) {
                    // data est un tableau, itérer sur les éléments
                    data.forEach(function(race) {
                        var optionElement = document.createElement('option');
                        optionElement.value = race.race;
                        optionElement.text = race.race;
                        raceDropdown.appendChild(optionElement);
                    });
                } else {
                    // data n'est pas un tableau, itérer sur les propriétés de l'objet
                    Object.keys(data).forEach(function(key) {
                        var optionElement = document.createElement('option');
                        optionElement.value = data[key];
                        optionElement.text = data[key];
                        raceDropdown.appendChild(optionElement);
                    });
                }

                // Restaurer la valeur sélectionnée précédemment
                if (currentValue !== '') {
                    raceDropdown.value = currentValue;
                }
            })
            .catch(error => {
                console.error('Une erreur s\'est produite lors de la récupération des races:', error);
            });
    });
</script>











<!-- fin script2 -->



    <!-- Footer Start -->
    <div class="container-fluid footer position-relative bg-dark text-white-50 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 py-5">
                <div class="col-lg-6 pe-lg-5">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="h1 text-primary mb-0">ANI<span class="text-white">MAL</span><span class="text-danger">+</span></h1>
                    </a>
                    <!-- <p class="fs-5 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue, iaculis id elit eget, ultrices pulvinar tortor.</p> -->
                    <p><i class="fa fa-map-marker-alt me-2"></i>2036 La Soukra, Ariana, Tunisie</p>
                    <p><i class="fa fa-phone-alt me-2"></i>+216 25 888 396</p>
                    <p><i class="fa fa-envelope me-2"></i>animal+@gmail.com</p>
                    <div class="d-flex mt-4">
                        <a class="btn btn-lg-square btn-primary me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-lg-square btn-primary me-2" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <div class="row g-5">
                        <div class="col-sm-6">
                            <h4 class="text-light mb-4">Quick Links</h4>
                            <a class="btn btn-link" href="#header-carousel">Accueil</a>
                            <a class="btn btn-link" href="#contact">Contact</a>
                            <a class="btn btn-link" href="#services">Services</a>
                            <a class="btn btn-link" href="">Terms & Condition</a>
                            <a class="btn btn-link" href="">Support</a>
                        </div>
                        <div class="col-sm-6">
                            <h4 class="text-light mb-4">Popular Links</h4>
                            <a class="btn btn-link" href="#about">A Propos</a>
                            <a class="btn btn-link" href="#contact">Contact</a>
                            <a class="btn btn-link" href="">Espace Client</a>
                            <a class="btn btn-link" href="">Terms & Condition</a>
                            <a class="btn btn-link" href="">Support</a>
                        </div>
                        <!-- <div class="col-sm-12">
                            <h4 class="text-light mb-4">Newsletter</h4>
                            <div class="w-100">
                                <div class="input-group">
                                    <input type="text" class="form-control border-0 py-3 px-4" style="background: rgba(255, 255, 255, .1);" placeholder="Your Email Address"><button class="btn btn-primary px-4">Sign Up</button>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark text-white-50 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; <a href="#">ANIMAL+</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    <p class="mb-0">Designed by <a href="https://htmlcodex.com">GROUP ANIMAL+</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>



</body>

</html>