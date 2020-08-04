<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$this->_pars['project_title']; ?></title>
    <style>
        #app {
            font-family: Avenir, Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-align: center;
            color: #2c3e50;
            margin-top: 60px;
        }

        .error {
            color: red;
        }

        .success {
            color: darkgreen;
        }

        input {
            width: 400px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div id="app">
        <?php require_once $view; ?>
    </div>
</body>
</html>
