<?php
$requestid=$_GET['id'];
$requesturl=$_GET['url'];
$requestget= $_GET;
$requestpost= $_POST;
$requestbody = file_get_contents("php://input");
$enderecoip = $_SERVER["REMOTE_ADDR"];
$data = date('d/m/y h:m:s');


$jsonget=json_encode($requestget);
$jsonpost=json_encode($requestpost);
$bodycontent =$requestbody;
$navegador= "";

$conexao = mysqli_connect('localhost', 'root', '', 'ninjacats');
$query = "INSERT INTO requestlogs (idrequest, requestcontentpost,requestcontentget,requestcontentbody,requestsendto,enderecoip,daterequest,navegador	) values ('{$requestid}', '{$jsonpost}','{$jsonget}','{$requestbody}','{$requesturl}','{$enderecoip}','{$data}','{$navegador}')";
mysqli_query($conexao, $query);
mysqli_close($conexao);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DebugContent</title>
    <link rel="stylesheet" type="text/css" href="/css/captivescreen.css" media="screen" />
    <style>

    </style>
</head>
<body class="papereffect">
    <section>
        <nav class="menucontainer">
            <div>
                <div>
                    <img class="logo" src="./ninjacat_logo.png"/>
                </div>
                <div>
                    <h1 class="logo">NinjaCathers Debug Service</h1>
                </div>
            </div>
        </nav>
    </section>
    <section class="grafitewritting">
        <div>
            <h1>Segue os dados que consegui com sua requisicao </h1>
            <div>
                <h3>Requisicao POST</h3>
                <code>
                    <?php echo $jsonpost; ?>
                </code>
            </div>
            <div>
                <h3>Requisicao GET</h3>
                <code class="content">
                <?php echo $jsonget; ?>
                </code>
            </div>
            <div>
                <h3>Requisicao Body</h3>
                <code>
                    <?php echo $bodycontent; ?>
                </code>
            </div>
            <div>
                <h3>Resposta do servidor ao reencaminhar a requisicao </h3>
                <code>
                    error 403
                </code>
            </div>
            <div>
                <h3>Client Info </h3>
                <h4>IP:<?php echo $enderecoip; ?></h4>
                <h4>Destino Original Da Requisicao :<?php echo $requesturl; ?></h4>
                <h4>Debug Log Gravado com sucesso no servidor </h4>
            </div>
        </div>
    </section>
</body>
</html>