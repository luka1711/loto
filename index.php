<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <title>Loto</title>

</head>

<body>
<img src="https://www.lutrija.rs/CustomContent/Images/StaticLayout/DLS-cirilica-tri-reda-multi.png" height="100">
<img src="https://www.lutrija.rs/CustomContent/Images/StaticLayout/rez02.png" height="100">
    <div class="container mt-5">
        <div class="row">
            <div class="col-2">
                Broj 1
                <input type="number" class="form-control broj" name="" max="39" min="1" id="1">
            </div>
            <div class="col-2">
                Broj 2
                <input type="number" class="form-control broj" name="" max="39" min="1" id="2">
            </div>
            <div class="col-2">
                Broj 3
                <input type="number" class="form-control broj" name="" max="39" min="1" id="3">
            </div>
            <div class="col-2">
                Broj 4
                <input type="number" class="form-control broj" name="" max="39" min="1" id="4">
            </div>
            <div class="col-2">
                Broj 5
                <input type="number" class="form-control broj" name="" max="39" min="1" id="5">
            </div>
            <div class="col-2">
                Broj 6
                <input type="number" class="form-control broj" name="" max="39" min="1" id="6">
            </div>
            <div class="col-2">
                Broj 7
                <input type="number" class="form-control broj" name="" max="39" min="1" id="7">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                Naziv kola
                <input type="text" class="form-control" id="naziv">
            </div>
            <div class="col">
                Izvlaci se (koliko brojeva)
                <input type="number" class="form-control" name="" max="39" min="1" id="broj_izvucenih">
            </div>
            <div class="col">
                Pogodjeno (bice generisano)
                <input type="text" disabled class="form-control" name="" max="39" min="1" id="pogodjeno">
            </div>
            <div class="col">
                <div class="d-grid gap-2">
                    <p></p>
                    <button type="button" name="" id="generisi-kolo" class="btn btn-primary">Generisi!</button>
                </div>
            </div>
        </div>
        <hr>
        <table id="kola-tabela" class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Naziv</th>
                    <th>Izvlaceno</th>
                    <th>Pogodjeno</th>
                    <th>Obrisi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>
</body>

</html>