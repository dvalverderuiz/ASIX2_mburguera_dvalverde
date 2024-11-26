<?php







?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.min.css" rel="stylesheet"/>
    <title>Expedity</title>
</head>

<body style="background-color: #F4F1E9;">

    <div class="center-screen">
        <div class="creador-guias-box">
            <form id="register-form" action="" method="POST">
                <div data-mdb-ripple-init class="mb-5">
                    <a href="../index.php">
                      <img src="../assets/img/logo.png" width="100px" height="100px" alt="Logo">
                    </a>
                </div>
                <div style="justify-items: center;" class="mb-4">
                  <h3>PANEL DE ADMINSTADOR</h3>
                  <p>Aplicativo para añadir una nueva guía</p>
                </div>
                
                <div class="row mb-4">
                  <div class="col">
                    <div data-mdb-input-init class="form-outline">
                      <input type="text" id="nombre-register" name="nombre-register" class="form-control" required />
                      <label class="form-label">Titulo</label>
                    </div>
                  </div>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                  <label class="form-label">Descripcion</label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <label for="archivo" class="form-label"></label>
                    <input type="file" class="form-control form-control-lg" id="archivo_añadir_guia" name="archivo" accept="image/*, .pdf, .doc, .docx" required>
                </div>
                
                <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">AÑADIR GUIA</button>
            </form>
        </div>
    </div>












    <style type="text/css">
        


        .nav-bar {
            display: flex;
            align-items: center;
            justify-content: center;
            list-style-type: none;
            width: 100%;
            margin-top: 30px;
            padding: 0;
        }

        .center-screen {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 100vh;
        }

        .creador-guias-box {
          background-color: #CAD2C5; 
          width: 750px; 
          height: 800px; 
          padding: 50px; 
          border-radius: 5px;
        }
    </style>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
