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
                echo '<script> location.href="../view/extras/login" </script>';

            }

        }

        public function registrarTecnicoE($identificacion, $tipoDoc, $nombres, $apellidos, $fechaNac, $email, $telefono, $ciudad, $localidad, $direccion,$experiencia,$estudios, $postal, $claveMd, $rol, $estado){

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
                echo '<script> location.href="../view/extras/register-tecnico" </script>';
            }else{
                
                // Conectamos con la clase Conexion
                $objetoConexion = new Conexion();
                $conexion = $objetoConexion->get_conexion();

                $sql = "INSERT INTO users (identificacion, tipodoc, nombres, apellidos, fecha_nacimiento, email, telefono, ciudad, localidad, direccion,nivel_educativo,experiencia, codigo_postal, clave, rol, estado) 
                VALUES(:identificacion, :tipoDoc,:nombres, :apellidos, :fechaNac, :email, :telefono, :ciudad, :localidad, :direccion,:niveledu,:experiencia, :code_postal, :claveMd, :rol, :estado)";

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
                $result->bindParam(':niveledu', $estudios);
                $result->bindParam(':experiencia', $experiencia);
                $result->bindParam(':code_postal', $postal);
                $result->bindParam(':claveMd', $claveMd);
                $result->bindParam(':rol', $rol);
                $result->bindParam(':estado', $estado);

                $result-> execute();
                echo "<script> alert('REGISTRO EXITOSO') </script>";
                echo '<script> location.href="../view/extras/login" </script>';

            }

        }

        public function agendarTecnicoE($nombres, $apellidos, $email, $telefono, $ciudad, $localidad, $fechaAgenda, $direccion,$descripcion,$tecnico,$estado){

            // Conectamos con la clase Conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT * FROM agendamientos WHERE email=:email";

            $result = $conexion->prepare($sql);

            $result->bindParam(":email", $email);

            $result->execute();

            $f = $result->fetch();

            if ($f) {
                echo "<script> alert('YA TIENE UN AGENDAMIENTO PENDIENTE, PORFAVOR ESPERE EL PROCESO') </script>";
                echo '<script> location.href="../view/client-site/homeUser" </script>';
            }else{
                
                // Conectamos con la clase Conexion
                $objetoConexion = new Conexion();
                $conexion = $objetoConexion->get_conexion();

                $sql = "INSERT INTO agendamientos (nombres, apellidos, data_tecnico,fecha_agendada, email, numero_contacto, id_ciudad, id_localidad, direccion_servicio, descripcion, estado_servicio) 
                VALUES(:nombres, :apellidos, :tecnico, :fechaAgn, :email, :telefono, :ciudad, :localidad, :direccion, :descripcion, :estado)";

                $result = $conexion->prepare($sql);

                $result->bindParam(':nombres', $nombres);
                $result->bindParam(':apellidos', $apellidos);
                $result->bindParam(':tecnico', $tecnico);
                $result->bindParam(':fechaAgn', $fechaAgenda);
                $result->bindParam(':email', $email);
                $result->bindParam(':telefono', $telefono);
                $result->bindParam(':ciudad', $ciudad);
                $result->bindParam(':localidad', $localidad);
                $result->bindParam(':direccion', $direccion);
                $result->bindParam(':descripcion', $descripcion);
                $result->bindParam(':estado', $estado);

                $result-> execute();
                echo "<script> alert('SU SOLICITUD HA SIDO AGENDADA SATISFACTORIAMENTE') </script>";
                echo '<script> location.href="../view/client-site/homeUser" </script>';

            }

        }
        //Pediente funcion para que muestre los agendamientos que hacen los usuarios
        public function mostrarAgendamientosE($idUsuario){
            $f = null;
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT agn.id_agendamiento, agn.nombres as nom_usr, agn.apellidos as ape_usr, usr.id_user as id_user,usr.nombres as nombre_Tec, usr.apellidos as apellido_Tec, 
                            agn.fecha_agendada as fecha_agn, agn.email, agn.numero_contacto, ciu.ciudad as ciudad, loc.localidad as localidad,
                            agn.direccion_servicio, agn.descripcion, agn.estado_servicio
                    FROM agendamientos agn
                    INNER JOIN users usr ON agn.data_tecnico = usr.id_user                     
                    INNER JOIN ciudades ciu ON agn.id_ciudad = ciu.idCiudad
                    INNER JOIN localidades loc ON agn.id_localidad = loc.idLocalidad 
                    WHERE usr.id_user=:id_usuario";
            $result = $conexion->prepare($sql);
            $result->bindParam(':id_usuario',$idUsuario);
            $result->execute();
            
            while($resultado= $result->fetch()){
                $f[] = $resultado;
                
            }

            return $f;

        }

        public function verPerfilE($email){
            $f = null;
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT * FROM users WHERE email=:email";
            $result = $conexion->prepare($sql);
            $result->bindParam(':email',$email);
            $result->execute();

            while($resultado= $result->fetch()){
                $f[] = $resultado;
            }

            return $f;

        }

        public function editarPerfil($identificacion, $nombres, $apellidos, $email, $fechaNac, $telefono, $ciudad, $localidad, $direccion ){
            // conectamos con la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql ="UPDATE users SET identificacion=:identificacion,
                                    nombres=:nombres, 
                                    apellidos=:apellidos, 
                                    email=:email, 
                                    fecha_nacimiento=:fechaNac,
                                    Telefono=:telefono, 
                                    ciudad=:ciudad, 
                                    localidad=:localidad,
                                    direccion=:direccion WHERE identificacion=:identificacion";
            $result = $conexion->prepare($sql);
            $result->bindParam(':identificacion', $identificacion);
            $result->bindParam(':nombres', $nombres);
            $result->bindParam(':apellidos', $apellidos);
            $result->bindParam(':email', $email);            
            $result->bindParam(':fechaNac', $fechaNac);
            $result->bindParam(':telefono', $telefono);
            $result->bindParam(':ciudad', $ciudad);
            $result->bindParam(':localidad', $localidad);
            $result->bindParam(':direccion', $direccion);
            //$result->bindParam(':postal', $postal);

            $result->execute();
            echo "<script> alert('CAMBIOS GUARDADOS CORRECTAMENTE')</script>";
            echo '<script> location.href="../view/client-site/miPerfil.php?id_user='.$identificacion.'"</script>';

       }



    }

?>