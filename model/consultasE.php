<?php

    class ConsultasE{

        public function registrarUserE($identificacion, $tipoDoc, $nombres, $apellidos, $fechaNac, $email, $telefono, $ciudad, $localidad, $direccion, $postal, $claveMd, $rol, $estado){

            // Conectamos con la clase Conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT * FROM users WHERE identificacion=:identificacion OR email=:email";

            $result = $conexion->prepare($sql);

            $result->bindParam(":identificacion", $identificacion);
            $result->bindParam(":email", $email);

            $result->execute();

            $f = $result->fetch();

            if ($f) {
                echo "<script> alert('SUS DATOS YA SE ENCUENTRAN REGISTRADOS EN EL SISTEMA') </script>";
                echo '<script> location.href="../view/extras/register-user.php" </script>';
            }else{
                
                // Conectamos con la clase Conexion
                $objetoConexion = new Conexion();
                $conexion = $objetoConexion->get_conexion();

                $sql = "INSERT INTO users (identificacion, tipodoc, nombres, apellidos, fecha_nacimiento, email, telefono, ciudad, localidad, direccion, codigo_postal, clave, rol, estado) 
                VALUES(:identificacion, :tipoDoc,:nombres, :apellidos, :fechaNac, :email, :telefono, :ciudad, :localidad, :direccion, :code_postal, :claveMd, :rol, :estado)";

                $result = $conexion->prepare($sql);

                $result->bindParam(':identificacion', $identificacion);
                $result->bindParam(':tipoDoc', $tipoDoc);
                $result->bindParam(':nombres', $nombres);
                $result->bindParam(':apellidos', $apellidos);
                $result->bindParam(':fechaNac', $fechaNac);
                $result->bindParam(':email', $email);
                $result->bindParam(':telefono', $telefono);
                $result->bindParam(':ciudad', $ciudad);
                $result->bindParam(':localidad', $localidad);
                $result->bindParam(':direccion', $direccion);
                $result->bindParam(':code_postal', $postal);
                $result->bindParam(':claveMd', $claveMd);
                $result->bindParam(':rol', $rol);
                $result->bindParam(':estado', $estado);

                $result-> execute();
                echo "<script> alert('REGISTRO EXITOSO') </script>";
                echo '<script> location.href="../view/extras/login.php" </script>';

            }

        }

        public function registrarTecnicoE($identificacion, $tipoDoc, $nombres, $apellidos, $fechaNac, $email, $telefono, $ciudad, $localidad, $direccion, $postal, $claveMd, $rol, $estado){

            // Conectamos con la clase Conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT * FROM users WHERE identificacion=:identificacion OR email=:email";

            $result = $conexion->prepare($sql);

            $result->bindParam(":identificacion", $identificacion);
            $result->bindParam(":email", $email);

            $result->execute();

            $f = $result->fetch();

            if ($f) {
                echo "<script> alert('SUS DATOS YA SE ENCUENTRAN REGISTRADOS EN EL SISTEMA') </script>";
                echo '<script> location.href="../view/extras/register-tecnico.php" </script>';
            }else{
                
                // Conectamos con la clase Conexion
                $objetoConexion = new Conexion();
                $conexion = $objetoConexion->get_conexion();

                $sql = "INSERT INTO users (identificacion, tipodoc, nombres, apellidos, fecha_nacimiento, email, telefono, ciudad, localidad, direccion, codigo_postal, clave, rol, estado) 
                VALUES(:identificacion, :tipoDoc,:nombres, :apellidos, :fechaNac, :email, :telefono, :ciudad, :localidad, :direccion, :code_postal, :claveMd, :rol, :estado)";

                $result = $conexion->prepare($sql);

                $result->bindParam(':identificacion', $identificacion);
                $result->bindParam(':tipoDoc', $tipoDoc);
                $result->bindParam(':nombres', $nombres);
                $result->bindParam(':apellidos', $apellidos);
                $result->bindParam(':fechaNac', $fechaNac);
                $result->bindParam(':email', $email);
                $result->bindParam(':telefono', $telefono);
                $result->bindParam(':ciudad', $ciudad);
                $result->bindParam(':localidad', $localidad);
                $result->bindParam(':direccion', $direccion);
                $result->bindParam(':code_postal', $postal);
                $result->bindParam(':claveMd', $claveMd);
                $result->bindParam(':rol', $rol);
                $result->bindParam(':estado', $estado);

                $result-> execute();
                echo "<script> alert('REGISTRO EXITOSO') </script>";
                echo '<script> location.href="../view/extras/login.php" </script>';

            }

        }



    }

?>