<?php ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> @yield('page-title') </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        th {
            text-align: center;
           }
        .font {
            font-size: 180px;
        }
        .special_costumer {
            font-size: 1.2em;
        }
        .success {
          font-size: 2em;
        }
        .my_margin {
            margin-right: 5px;
        }
        .my_link {
            color: #878787;
        }
    </style>
</head>
<body>
    <div class="container">
     <!-- adicionando o conteúdo das views -->
        <div class="row">
            @yield('content')
        </div>
    </div>
</body>
</html>