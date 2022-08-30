<?php

    class ConsultasAdmin{

        public function registrarUserE($identificacion, $tipoDoc, $nombres, $apellidos, $email, $telefono, $claveMd, $rol, $estado){

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
                echo "<script> alert('EL USUARIO A REGISTRAR YA SE ENCUENTRA EN EL SISTEMA') </script>";
                echo '<script> location.href="../view/admin-side/registrarUsers.php" </script>';
            }else{
                
                // Conectamos con la clase Conexion
                $objetoConexion = new Conexion();
                $conexion = $objetoConexion->get_conexion();

                $sql = "INSERT INTO users (identificacion, tipodoc, nombres, apellidos, email, telefono, clave, rol, estado) 
                VALUES(:identificacion, :tipoDoc,:nombres, :apellidos, :email, :telefono, :claveMd, :rol, :estado)";

                $result = $conexion->prepare($sql);

                $result->bindParam(':identificacion', $identificacion);
                $result->bindParam(':tipoDoc', $tipoDoc);
                $result->bindParam(':nombres', $nombres);
                $result->bindParam(':apellidos', $apellidos);
                $result->bindParam(':email', $email);
                $result->bindParam(':telefono', $telefono);
                $result->bindParam(':claveMd', $claveMd);
                $result->bindParam(':rol', $rol);
                $result->bindParam(':estado', $estado);

                $result-> execute();
                echo "<script> alert('REGISTRO EXITOSO') </script>";
                echo '<script> location.href="../view/admin-side/registrarUsers.php" </script>';

            }

        }


        public function mostrarUsers(){
            $f = null;
            // Conectamos con la clase Conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT * FROM users";
            $result = $conexion-> prepare($sql);
            $result->execute();

            while($consulta = $result->fetch()){
                $f[] = $consulta;

            }

            return $f;

        }

        public function mostrarUser($id_user){
            $f = null;
            // Conectamos con la clase Conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT * FROM users WHERE identificacion=:id_user";            
            $result = $conexion-> prepare($sql);
            $result->bindParam(':id_user', $id_user);
            $result->execute();

            while($consulta = $result->fetch()){
                $f[] = $consulta;

            }

            return $f;

        }


    }

?>