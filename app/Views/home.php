<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toolbox - Ferramentas para os desenvolvedores VOZ</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>      

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>
<body>
    <section class="hero is-small is-link">
        <div class="hero-body">
            <p class="title">VOZ Devs Toolbox</p>
        </div>
    </section> 
    
    <div class="container is-fluid">
        <div class="columns">
            <div class="column is-8">
                <div class="card">
                    <header class="card-header">
                        <div class="container is-fluid">
                            <div class="columns">
                                <div class="column">
                                    <p class="card-header-title">
                                        Repasses - Exportar Excel                           
                                    </p>
                                </div>
                            </div>
                        </div>                       
                    </header>
                    <div class="card-content">
                        <div class="columns">

                            <form action="Repasses" target="_blank" method="GET">

                                <div class="column">
                                    <div class="field">
                                        <label for="dataBusca">Data de início: </label>
                                        <div class="control">
                                            <input type="date" class="input" id="dataBusca" name="dataBusca" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label for="dataFinal">Data do fim: </label>
                                        <div class="control">
                                            <input type="date" class="input" id="dataFinal" name="dataFinal" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <div class="control">
                                            <button type="submit" class="button is-primary" id="btnBuscar">Buscar</button>                                            
                                        </div>
                                    </div>                                    
                                </div>

                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>