<?php

namespace App\Vues;

class VueConnexion
{

    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function render(array $parameters)
    {
        $vue =  <<<END
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <title>Hangar Local</title>
            <!-- Favicon-->
            <link rel="icon" type="image/x-icon" href="../web/assets/favicon.ico" />
            <!-- Bootstrap icons-->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
            <!-- Core theme CSS (includes Bootstrap)-->
            <link href="../web/css/styles.css" rel="stylesheet" />
            <link href="../web/css/card.css" rel="stylesheet" />
            <link href="../web/css/custom.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>

        <body>
            <!-- Responsive navbar-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-lg-5 ">
                    <a class="navbar-brand justi" href="{$parameters['routeContext']->getRouteParser()->urlFor('Accueil')}">Hangar Local <br>Espace producteur</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul id="tabs" class="navbar-nav ms-auto mb-2 mb-lg-0">
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Header-->

            <!-- Page Content-->
            <section class="pt-4">
                <div class="container ">
                    <!-- Page Features-->

                    <div class="px-4 py-5 my-5 text-center">
                        <h1 class="display-5 fw-bold">Producteur ? <br> Connectez-vous : </h1>

                        <form id="formLogin" action="{$parameters['routeContext']->getRouteParser()->urlFor('Connexion')}" method="post>
                            <div class="mb-2">
                                <label for="login" class="form-label">Email address</label>
                                <input type="text" class="form-control" id="login" aria-describedby="loginHelp" value="abc">
                                <div id="loginHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-5">
                                <label for="pass" class="form-label">Password</label>
                                <input type="password" class="form-control" id="pass" value="pass">
                            </div>
                            <div class="mb-3 form-check text-start">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Souvenez-vous de moi</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>

                    <audio id="myAudio" class='d-none' controls autoplay>
                        <source src="../web/assets/mp3/IleEnfant.mp3" type="audio/mp3">
                    </audio>

                </div>
            </section>

            <!-- Footer-->
            <footer class="py-5 bg-dark">
                <div class="container">
                    <p class="m-0 text-center text-white">Copyright &copy; Hangar Local 2021</p>
                </div>
            </footer>
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Core theme JS-->
            <script type="module" src="../web/js/scripts.js"></script>
            <script type="module" src="../web/js/espaceProducteur.js"></script>
        </body>

        </html>
END;
        return $vue;
    }
}
