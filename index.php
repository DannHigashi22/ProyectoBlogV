<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog De Videojuegos</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>
    <!--Cabecera-->
    <header id="header">
        <!-- logo-->
        <div id="logo">
            <a href="index.php">
                Blog de Videojuegos
            </a>
        </div>
        <!--Menu-->
        <nav id="nav">
            <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="">Categoria 1</a></li>
            <li><a href="">Categoria 2</a></li>
            <li><a href="">Categoria 3</a></li>
            <li><a href="">Categoria 4</a></li>
            <li><a href="index.php">Sobre Mi</a></li>
            <li><a href="index.php">Contacto</a></li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
    
    <div id="container">
        <!--Barra Lateral-->
        <aside id="sidebar">
            <div id="login" class="block-aside">
                <h3>Identificate</h3>
                <form action="Login.php" method="POST">
                    <label for="email">Email</label>
                    <input type="email" name="email">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password">
                    <input type="submit" value="Entrar">

                </form>
            </div>
            <div id="register" class="block-aside">
                <h3>Registrate</h3>
                <form action="register.php" method="POST">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre">

                    <label for="apellidos">Apellidos</label>
                    <input type="email" name="email">

                    <label for="email">Email</label>
                    <input type="email" name="email">

                    <label for="password">Contraseña</label>
                    <input type="password" name="password">

                    <input type="submit" value="Entrar">

                </form>
            </div>
        </aside>
        <!--Contenido principal-->
        <div id="main-content">
            <h1>Ultimas entradas</h1>
            <article class="art-recents">
                <a href="">
                    <h2>Titulo de la entrada</h2>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati laboriosam 
                    iure suscipit saepe earum assumenda repellendus iusto tempora odit quos ducimus 
                    rerum ratione necessitatibus, molestias neque autem in est numquam?
                    </p>
                </a>
            </article>
            <article class="art-recents">
                <a href="">
                    <h2>Titulo de la entrada</h2>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati laboriosam 
                    iure suscipit saepe earum assumenda repellendus iusto tempora odit quos ducimus 
                    rerum ratione necessitatibus, molestias neque autem in est numquam?
                    </p>
                </a>
            </article>
            <article class="art-recents">
                <a href="">
                    <h2>Titulo de la entrada</h2>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati laboriosam 
                    iure suscipit saepe earum assumenda repellendus iusto tempora odit quos ducimus 
                    rerum ratione necessitatibus, molestias neque autem in est numquam?
                    </p>
                </a>
            </article>
            <div id="vertodas">
                <a href="">Ver Todas las entradas</a>
           </div>
        </div><!---fin principal--->
        <div class="clearfix"></div>
    </div>

    <!--Pie de pagina-->
    <footer>
    <p>Desarollado por Dann Higashi &COPY; 2022</p>
    </footer>
    
</body>
</html>