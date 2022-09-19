<?php

    class validarSesion{
        public function iniciarSesion($email, $clave){
             // Conectamos con la clase Conexion
             $objetoConexion = new Conexion();
             $conexion = $objetoConexion->get_conexion();

             $sql = "SELECT * FROM users WHERE email=:email";
             $result = $conexion->prepare($sql);

             $result->bindParam(":email", $email);

             $result->execute();

             if($f=$result->fetch()){

                if($clave==$f['clave']){

                    if($f['estado']=="Activo"){
                        
                        //Inicia Sesion
                        session_start();

                        $_SESSION['id'] = $f['identificacion'];
                        $_SESSION['email'] = $f['email'];
                        $_SESSION['rol'] = $f['rol'];


                        $_SESSION['autenticado'] = "SI";

                        if($f['rol']=="Administrador"){

                            echo "<script>alert('Bienvenido Administrador')</script>";
                            echo "<script>location.href=('../view/admin-side/homeAdmin.php')</script>";
                        }

                        if($f['rol']=="Tecnico"){

                            echo "<script>alert('Bienvenido Tecnico')</script>";
                            echo "<script>location.href=('../view/tecnico-side/homeTecnico.php')</script>";
                        }

                        if($f['rol']=="Cliente"){

                            echo "<script>alert('Bienvenido Cliente')</script>";
                            echo "<script>location.href=('../view/client-site/homeCliente.php')</script>";
                        }

                    }else{
                        echo "<script>alert('SU CUENTA ESTA INACTIVA,COMUNIQUESE CON EL SERVICIO AL CLIENTE')</script>";
                        echo "<script>location.href=('../index.html')</script>";
                    }

                }else{
                    echo "<script>alert('CLAVE INCORRECTA')</script>";
                    echo "<script>location.href=('../view/extras/login.php')</script>";
                }
             }else{
                echo "<script>alert('EMAIL NO ENCONTRADO EN EL SISTEMA')</script>";
                echo "<script>location.href=('../view/extras/register-user.php')</script>";
             }
        }

        public function cerrarSesion(){
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            session_start();
            session_destroy();
            echo '<script> location.href="../view/extras/login.php" </script>';
        }
    }
?>