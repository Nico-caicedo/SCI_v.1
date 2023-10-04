<?php
session_start();

$rol = $_SESSION['rol'];
include '../controllers/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../assets/css/inicio.css">
    <link rel="stylesheet" href="../assets/css/ambiente.css">
    <link rel="stylesheet" href="../assets/css/operacion.css">
    <link rel="stylesheet" href="../assets/css/card.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <?php
    include_once '../template/header.php';

    ?>

    <main>

        <section class="operaciones">

            <div class='botones'>
                <button class="boton" id='boton-seccion-1' data-target='seccion-1'><img src="../assets/img/centros.svg"
                        alt="">centros de formación</button>

                <button class="boton" id='boton-seccion-2' data-target='seccion-2'><img
                        src="../assets/img/ambientes.svg" alt="">Ambientes</button>

                <button class="boton" id='boton-seccion-3' data-target='seccion-3'><img src="../assets/img/element.svg"
                        alt="">Elementos</button>

                <button class="boton" id='boton-seccion-4' data-target='seccion-4'><img src="../assets/img/history.svg"
                        alt="">Historial</button>


            </div>
            <div class='show_operaciones'>


                <div id="seccion-1">



                    <section class='container_inventario'>





                        <article class='container_elementos'>


                            <h2 class='subtitle_inventario'> Centros de formación</h2>
                            <!-- script de buscador -->
                            <div class='buscador'>
                                <input type="text" placeholder="buscar">
                            </div>
                            <div id='CF' class="elementos">
                                <div>

                                </div>



                            </div>



                        </article>

                        <!-- permite gestionar centros de formación -->
                        <article class='container_descripcion'>
                            <div class='section1'>
                                <div class="dato_ambiente">

                                    <img src="./assets/img/ambiente2.jpg" class="img_present" alt="">
                                    <h2 class='nombre_ambiente'>Ambiente 307</h2>
                                </div>
                            </div>

                            <div class='section2'>


                                <form action="" method="post" id="cf_form" enctype="multipart/form-data">

                                    <div>
                                        <label for="">Nombre Centro de formación</label>
                                        <input type="text" name="name_cf">
                                    </div>

                                    <div>
                                        <label for="">Dirección</label>
                                        <input type="text" name="direccion_cf">
                                    </div>

                                    <div>
                                        <label for="">Foto</label>
                                        <input type="file" name="imagenes" id="imagenes" multiple>

                                        <div>
                                            <p>Ubicación</p>

                                            <label for="">Departamento</label>
                                            <select name="id_departamento" id="list-dep">

                                            </select>


                                            <label for="">municipios</label>
                                            <select name="id_municipio" id="list-mun">
                                                <option value="">selecciona</option>
                                            </select>
                                        </div>
                                        <input type="submit" name='CF' value="Enviar">
                                </form>

                                <?php
                                include '../controllers/add_CF.php';

                                ?>



                            </div>

                        </article>

                    </section>
                </div>

                <div id="seccion-2">
                    <section class="contenedor-ambientes">

                        <div class="dos-contenedores">
                            <h2 class="titulos-elementos">Ambientes</h2>
                            <div class="scroll " id="scroll_ambientes">
                                
                                
                            </div>
                        </div>

                        <div class="segundo-contenedor">
                            <form class="form_ambiente" id="form_ambiente" method="post" enctype="multipart/form-data">
                                <div>
                                    <label for="">Nombre del ambiente:</label>
                                    <input type="text" name="name_amb"  placeholder="Nombre del ambiente" required>
                                </div>
                                <div>
                                    <label for="">Código del ambiente:</label>
                                    <input type="text" name="code_amb" placeholder="Código del ambiente" required>
                                </div>
                                <div>
                                    <div>
                                        <label for="">Centro de formación:</label>
                                        <select name="id_cf" id="list-cf">

                                        </select>
                                    </div>

                                    <div>
                                        <label for="">Piso</label>
                                        <select name="capacidad">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>

                                </div>
                                <div>
                                    <label for="imagen">Subir imagen:</label>
                                    <input type="file" name="imagenes" id="imagen" accept="image/*" required>
 
                                </div>
                                <div class="button1">
                                    <button class="crear" name="ambiente">Crear</button>
                                </div>
                            </form>
                        </div>

                </div>

                <div id="seccion-3">
                    <section class="contenedor-ambientes">

                        <div class="dos-contenedores">
                            <h2 class="titulos-elementos">Elementos</h2>
                            <div class="scroll">
                                <div class="primer-contenedor">
                                    <div class="fila1-contenedor1">
                                        <img class="img" src="../assets/img/ambiente1.jpg" alt="Imagen del ambiente">
                                        <div class="nombre">Nombre del ambiente</div>
                                        <div class="dosopciones">
                                            <div class="editar">Editar<i class="fa-solid fa-pencil"></i></div>
                                            <div class="eliminar">Eliminar<i class="fa-regular fa-circle-xmark"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="primer-contenedor">
                                    <div class="fila1-contenedor1">
                                        <img class="img" src="../assets/img/ambiente1.jpg" alt="Imagen del ambiente">
                                        <div class="nombre">Nombre elemento</div>
                                        <div class="dosopciones">
                                            <div class="editar">Editar<i class="fa-solid fa-pencil"></i></div>
                                            <div class="eliminar" id="">Eliminar<i class="fa-regular fa-circle-xmark"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="segundo-contenedor">
                            <form class="form_ambiente" id="container_ambiente" method="post" enctype="multipart/form-data">
                                <div>
                                    <label for="">Nombre del ambiente:</label>
                                    <input type="text" name="nombre" placeholder="Nombre del ambiente" required>
                                </div>
                                <div>
                                    <label for="">Código del ambiente:</label>
                                    <input type="text" name="codigo" placeholder="Código del ambiente" required>
                                </div>
                                <div>
                                    <div>
                                        <label for="">Ambiente:</label>
                                        <select name="CF">
                                            <option value="florencia">Florencia</option>
                                            <option value="morelia">Morelia</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="">Piso</label>
                                        <select name="capacidad">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>

                                </div>
                                <div>
                                    <label for="imagen">Subir imagen:</label>
                                    <input type="file" name="imagen" id="imagen" accept="image/*" required>

                                </div>
                                <div class="button1">
                                    <button class="crear" name="crear">Crear</button>
                                </div>
                            </form>
                        </div>

                </div>

                <div id="seccion-4">
                    <div class="historial">

                        <h2>Historial</h2>
                        <div class="contenedor_tarjetas">
                            <div class="tarjeta_delet">
                                <div class="name">Nicolas Caicedo / 1006537933</div>
                                <p class="descripcion">Elimino elemento --nombre elemento-- con código
                                    456952
                                </p>
                                <hr class="linea">
                                <p class="fecha">elimiancion fue 23 de diciembre 2023</p>
                            </div>

                            <div class="tarjeta_delet">
                                <div class="name">Nicolas Caicedo / 1006537933</div>
                                <p class="descripcion">Elimino elemento --nombre elemento-- con código
                                    456952
                                </p>
                                <hr class="linea">
                                <p class="fecha">elimiancion fue 23 de diciembre 2023</p>
                            </div>
                            <div class="tarjeta_delet">
                                <div class="name">Nicolas Caicedo / 1006537933</div>
                                <p class="descripcion">Elimino elemento --nombre elemento-- con código
                                    456952
                                </p>
                                <hr class="linea">
                                <p class="fecha">elimiancion fue 23 de diciembre 2023</p>
                            </div>
                            <div class="tarjeta_delet">
                                <div class="name">Nicolas Caicedo / 1006537933</div>
                                <p class="descripcion">Elimino elemento --nombre elemento-- con código
                                    456952
                                </p>
                                <hr class="linea">
                                <p class="fecha">elimiancion fue 23 de diciembre 2023</p>
                            </div>

                            <div class="tarjeta_create">

                            </div>

                            <div class="tarjeta_edit">

                            </div>
                            <div class="card">
                                <div class="header">
                                    <div>
                                        <a class="title" href="#">
                                            Building a SaaS product as a software developer
                                        </a>
                                        <p class="name">By John Doe</p>
                                    </div>
                                    <span class="image"></span>
                                </div>
                                <p class="description">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. At velit illum
                                    provident a, ipsa maiores deleniti consectetur nobis et eaque.
                                </p>
                                <dl class="post-info">
                                    <div class="cr">
                                        <dt class="dt">Delet</dt>
                                        <dd class="dd">31st June, 2021</dd>
                                    </div>

                                </dl>
                            </div>
                        </div>
                    </div>
                </div>



            </div>


        </section>


        </div>
        </section>




    </main>
    </main>
    <script src="../assets/js/cargar_datos.js"></script>

    <script src="../assets/js/show_sec.js"></script>
    <script src="../assets/js/cargar_opc.js"></script>
    <script src="../assets/js/cf.js"></script>
    <script src="../assets/js/ambientes.js"></script>

</body>

</html>