<!DOCTYPE html>
<html lang='fr'>
<head>
 <meta charset='UTF-8'>
 <meta name='viewport' content='widht=devive-wihdt, initial-scale=1.0'>
 <meta http-equiv='X-UA-Compatible' content='ie=edge'>
 <meta name='author' content='John Yakou'>
 <title>CRUD PHP OO</title>
 
 <!-- CSS de Bootstrap -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

 <link rel='stylesheet' href='css/style.css'>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#index1.php">Accueil</a>
                        </li>
                    
                        <li class="nav-item">
                            <a class="nav-link" href="#">Ajouter un employé</a>
                        </li>
                    
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <h1 class="text-center my-5"><?= $title ?></h1>
    </header>



    <main class="container">
        <?= $content ?>
    </main>



    <footer>

    </footer>
 
    <!-- Bundle de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 <script src='js/script.js'></script>
 </body>
</html>