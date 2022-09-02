<?php

    class ConsultasAdmin{

        public function registrarUserE($identificacion, $tipoDoc, $nombres, $apellidos,$fechaNac, $email, $telefono, $ciudad, $localidad, $direccion, $postal, $claveMd, $rol, $estado){

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
                echo "<script> alert('EL CLIENTE A REGISTRAR YA SE ENCUENTRA EN EL SISTEMA') </script>";
                echo '<script> location.href="../view/admin-side/registrarUsers.php" </script>';
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
                echo "<script> alert('REGISTRO DEL CLIENTE EXITOSO') </script>";
                echo '<script> location.href="../view/admin-side/registrarUsers.php" </script>';

            }

        }

        public function mostrarUsers(){
            $f = null;
            // Conectamos con la clase Conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT * FROM users WHERE rol='Cliente'";
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

        public function modificarUser($identificacion, $tipoDoc, $nombres, $apellidos, $email, $telefono, $rol, $estado){
            // conectamos con la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql ="UPDATE users SET identificacion=:identificacion,
                                    tipodoc=:tipodocumento, 
                                    nombres=:nombres, 
                                    apellidos=:apellidos, 
                                    email=:email, 
                                    Telefono=:telefono, 
                                    rol=:rol, 
                                    estado=:estado WHERE identificacion=:identificacion";
            $result = $conexion->prepare($sql);
            $result->bindParam(':identificacion', $identificacion);            
            $result->bindParam(':tipodocumento', $tipoDoc);
            $result->bindParam(':nombres', $nombres);
            $result->bindParam(':apellidos', $apellidos);
            $result->bindParam(':email', $email);
            $result->bindParam(':telefono', $telefono);
            $result->bindParam(':rol', $rol);
            $result->bindParam(':estado', $estado);

            $result->execute();
            echo "<script> alert ('ACTUALIZACION EXITOSA')</script>";
            echo '<script> location.href="../view/admin-side/verUsers.php"</script>';

       }

       public function eliminarUser($id_user){
             // conectamos con la clase conexion
             $objetoConexion = new conexion();
             $conexion = $objetoConexion->get_conexion();
             
             $sql ="DELETE FROM users WHERE identificacion=:id_user";
             $result =$conexion->prepare($sql);

             $result->bindParam(':id_user', $id_user);
             $result->execute();
             echo "<script> alert ('EL USUARIO HA SIDO ELIMINADO DE MANERA EXITOSA')</script>";
             echo '<script> location.href="../view/admin-side/verUsers.php"</script>';


       }  
       public function registrarTecnicoE($identificacion, $tipoDoc, $nombres, $apellidos,$fechaNac, $email, $telefono, $ciudad, $localidad, $direccion, $postal, $claveMd, $rol, $estado){

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
            echo "<script> alert('EL TECNICO A REGISTRAR YA SE ENCUENTRA EN EL SISTEMA') </script>";
            echo '<script> location.href="../view/admin-side/registrarTecnicos.php" </script>';
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
            echo "<script> alert('REGISTRO DEL TECNICO EXITOSO') </script>";
            echo '<script> location.href="../view/admin-side/registrarTecnicos.php" </script>';

        }

    }

       public function mostrarTecnicos(){
        $f = null;
        // Conectamos con la clase Conexion
        $objetoConexion = new Conexion();
        $conexion = $objetoConexion->get_conexion();

        $sql = "SELECT * FROM users WHERE rol='Tecnico'";
        $result = $conexion-> prepare($sql);
        $result->execute();

        while($consulta = $result->fetch()){
            $f[] = $consulta;

        }

        return $f;

    }

        public function mostrarTecnico($id_tecnico){
            $f = null;
            // Conectamos con la clase Conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT * FROM users WHERE identificacion=:id_tecnico";            
            $result = $conexion-> prepare($sql);
            $result->bindParam(':id_tecnico', $id_tecnico);
            $result->execute();

            while($consulta = $result->fetch()){
                $f[] = $consulta;

            }

            return $f;

        }

        public function modificarTecnico($identificacion, $tipoDoc, $nombres, $apellidos, $email, $telefono, $rol, $estado){
                // conectamos con la clase conexion
                $objetoConexion = new Conexion();
                $conexion = $objetoConexion->get_conexion();

                $sql ="UPDATE users SET identificacion=:identificacion,
                                        tipodoc=:tipodocumento, 
                                        nombres=:nombres, 
                                        apellidos=:apellidos, 
                                        email=:email, 
                                        Telefono=:telefono, 
                                        rol=:rol, 
                                        estado=:estado WHERE identificacion=:identificacion";
                $result = $conexion->prepare($sql);
                $result->bindParam(':identificacion', $identificacion);            
                $result->bindParam(':tipodocumento', $tipoDoc);
                $result->bindParam(':nombres', $nombres);
                $result->bindParam(':apellidos', $apellidos);
                $result->bindParam(':email', $email);
                $result->bindParam(':telefono', $telefono);
                $result->bindParam(':rol', $rol);
                $result->bindParam(':estado', $estado);

                $result->execute();
                echo "<script> alert ('ACTUALIZACION DEL TECNICO EXITOSA')</script>";
                echo '<script> location.href="../view/admin-side/verTecnicos.php"</script>';

        }

     public function eliminarTecnico($id_tecnico){
            // conectamos con la clase conexion
            $objetoConexion = new conexion();
            $conexion = $objetoConexion->get_conexion();
            
            $sql ="DELETE FROM users WHERE identificacion=:id_tecnico";
            $result =$conexion->prepare($sql);

            $result->bindParam(':id_tecnico', $id_tecnico);
            $result->execute();
            echo "<script> alert ('EL TECNICO HA SIDO ELIMINADO DE MANERA EXITOSA')</script>";
            echo '<script> location.href="../view/admin-side/verTecnicos.php"</script>';


        } 
       
    }

?>