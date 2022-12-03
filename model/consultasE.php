<?php

    class ConsultasE{

        public function forgotPass($resEmail, $token, $codigo){
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "INSERT INTO passwords (email, token, codigo) 
            VALUES(:email, :token, :codigo)";

            $result = $conexion->prepare($sql);

            $result->bindParam(':email', $resEmail);
            $result->bindParam(':token', $token);
            $result->bindParam(':codigo', $codigo);

            $result-> execute();
            echo '<script> location.href="../../view/extras/login" </script>';
        }

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

        public function agendarTecnicoE($sessionId,$nombres, $apellidos, $email, $telefono, $ciudad, $localidad, $fechaAgenda, $direccion,$descripcion,$tecnico,$estado,$fechaActual){

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

                $sql = "INSERT INTO agendamientos (sessionId, nombres, apellidos, data_tecnico, fecha_agendada, fecha_creacion, email, numero_contacto, id_ciudad, id_localidad, direccion_servicio, descripcion, estado_servicio) 
                VALUES(:sessionId, :nombres, :apellidos, :tecnico, :fechaAgn, :fechaAct, :email, :telefono, :ciudad, :localidad, :direccion, :descripcion, :estado)";

                $result = $conexion->prepare($sql);

                $result->bindParam(':sessionId', $sessionId);
                $result->bindParam(':nombres', $nombres);
                $result->bindParam(':apellidos', $apellidos);
                $result->bindParam(':tecnico', $tecnico);
                $result->bindParam(':fechaAgn', $fechaAgenda);
                $result->bindParam(':fechaAct', $fechaActual);
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

        public function mostrarAgendamientosE($id_user){
            $f = null;
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT agn.id_agendamiento, agn.sessionId,ses.nombres as nombre_Session, ses.apellidos ape_Session, agn.nombres as nom_usr, agn.apellidos as ape_usr, usr.id_user as id_user,usr.nombres as nombre_Tec, usr.apellidos as apellido_Tec, 
                            agn.fecha_agendada as fecha_agn, agn.email, agn.numero_contacto, ciu.ciudad as ciudad, loc.localidad as localidad,
                            agn.direccion_servicio, agn.descripcion, agn.estado_servicio
                    FROM agendamientos agn
                    INNER JOIN users usr ON agn.data_tecnico = usr.id_user      
                    INNER JOIN users ses ON agn.sessionId = ses.identificacion 
                    INNER JOIN ciudades ciu ON agn.id_ciudad = ciu.idCiudad
                    INNER JOIN localidades loc ON agn.id_localidad = loc.idLocalidad
                    WHERE agn.sessionId=:id_usuario ORDER BY agn.fecha_agendada desc";
            $result = $conexion->prepare($sql);
            $result->bindParam(':id_usuario',$id_user);
            $result->execute();
            
            while($resultado= $result->fetch()){
                $f[] = $resultado;
                
            }

            return $f;

        }

        public function mostrarResumeAgendamientos($agndm){
            $f = null;
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT agn.id_agendamiento, agn.nombres as nom_usr, agn.apellidos as ape_usr, usr.id_user as id_user,usr.nombres as nombre_Tec, usr.apellidos as apellido_Tec, usr.foto,usr.email as email_tec, usr.telefono as tel_tec, usr.ciudad as ciudad_tec,usr.localidad as localidad_tec,
                            agn.fecha_agendada as fecha_agn, agn.email, agn.numero_contacto, ciu.ciudad as ciudad, loc.localidad as localidad,
                            agn.direccion_servicio, agn.descripcion, agn.estado_servicio
                    FROM agendamientos agn
                    INNER JOIN users usr ON agn.data_tecnico = usr.id_user 
                    INNER JOIN ciudades ciu ON agn.id_ciudad = ciu.idCiudad
                    INNER JOIN localidades loc ON agn.id_localidad = loc.idLocalidad
                    WHERE agn.id_agendamiento=:agndm";
            $result = $conexion->prepare($sql);
            $result->bindParam(':agndm',$agndm);
            $result->execute();
            
            while($resultado= $result->fetch()){
                $f[] = $resultado;
                
            }

            return $f;

        }

        public function mostrarUser($id_user){
            $f = null;
            // Conectamos con la clase Conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT usr.id_user, usr.tipodoc, usr.identificacion, usr.nombres, usr.apellidos, 
                        usr.email, usr.telefono, usr.fecha_nacimiento,usr.ciudad, ciu.ciudad as nombre_ciu, 
                        usr.localidad, loc.localidad as nombre_loc, usr.direccion, usr.nivel_educativo, 
                        usr.experiencia, usr.codigo_postal, usr.clave, usr.rol, usr.estado, usr.foto  
                    FROM users usr 
                    INNER JOIN ciudades ciu ON usr.ciudad = ciu.idCiudad
                    INNER JOIN localidades loc ON usr.localidad = loc.idLocalidad
                    WHERE identificacion=:id_user";            
            $result = $conexion-> prepare($sql);
            $result->bindParam(':id_user', $id_user);
            $result->execute();

            while($consulta = $result->fetch()){
                $f[] = $consulta;

            }

            return $f;

        }
        
        public function mostrarTecnico($tecnico){
            $f = null;
            // Conectamos con la clase Conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT usr.id_user, usr.tipodoc, usr.identificacion, usr.nombres, usr.apellidos, 
                        usr.email, usr.telefono, usr.fecha_nacimiento,usr.ciudad, ciu.ciudad as nombre_ciu, 
                        usr.localidad, loc.localidad as nombre_loc, usr.direccion, usr.nivel_educativo, 
                        usr.experiencia, usr.codigo_postal, usr.clave, usr.rol, usr.estado, usr.foto  
                    FROM users usr 
                    INNER JOIN ciudades ciu ON usr.ciudad = ciu.idCiudad
                    INNER JOIN localidades loc ON usr.localidad = loc.idLocalidad
                    WHERE id_user=:tecnico";            
            $result = $conexion-> prepare($sql);
            $result->bindParam(':tecnico', $tecnico);
            $result->execute();

            while($consulta = $result->fetch()){
                $f[] = $consulta;

            }

            return $f;

        }
        
        //Funcion para cambiar la contraseña desde el login
        public function changePassByToken($newClave,$resEmail){
            // conectamos con la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "UPDATE users SET clave=:newClave WHERE email=:email";
            $result = $conexion->prepare($sql);

            $result->bindParam(':newClave', $newClave);
            $result->bindParam(':email', $resEmail);

            $result->execute();
            echo "<script> alert('CONTRASEÑA ACTUALIZADA')</script>";
            echo '<script> location.href="../../view/extras/login"</script>';

        }

        public function modificarClave($newClave,$identificacion){
            // conectamos con la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "UPDATE users SET clave=:newClave WHERE identificacion=:identificacion";
            $result = $conexion->prepare($sql);

            $result->bindParam(':newClave', $newClave);
            $result->bindParam(':identificacion', $identificacion);

            $result->execute();
            echo "<script> alert('CONTRASEÑA ACTUALIZADA')</script>";
            echo '<script> location.href="../view/client-site/miPerfil.php?id_user='.$identificacion.'"</script>';

        }

        public function dataProfile($identificacion){
            $f = null;
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT nombres FROM users WHERE identificacion=:ident";
            $result = $conexion->prepare($sql);
            $result->bindParam(':ident',$identificacion);
            $result->execute();

            while($resultado= $result->fetch()){
                $f[] = $resultado;
            }

            return $f;

        }

        public function verPerfilE($identificacion){
            $f = null;
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT * FROM users WHERE identificacion=:ident";
            $result = $conexion->prepare($sql);
            $result->bindParam(':ident',$identificacion);
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

        public function mostrarCiudades(){
            $f = null;
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT * FROM ciudades";
            $result = $conexion->prepare($sql);
            $result->execute();
            
            while($resultado= $result->fetch()){
                $f[] = $resultado;
                
            }

            return $f;

        }

        public function mostrarLocalidades(){
            $f = null;
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT * FROM localidades";
            $result = $conexion->prepare($sql);
            $result->execute();
            
            while($resultado= $result->fetch()){
                $f[] = $resultado;
                
            }

            return $f;

        }

        //Funcion para mostrar tecnicos que no tengan la misma localidad del usuario
        public function showTecnicos(){
            $f = null;
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT * FROM users WHERE rol='Tecnico' AND estado='Activo'";
            $result = $conexion->prepare($sql);
            $result->execute();
            
            while($resultado= $result->fetch()){
                $f[] = $resultado;                
            }

            return $f;
        }
        //Funcion para mostrar tecnicos que tengan la misma localidad del usuario
        public function showTecByZone($localidad){
            $f = null;
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT * FROM users WHERE rol='Tecnico' AND estado='Activo' AND localidad LIKE '%$localidad%'";
            $result = $conexion->prepare($sql);
            $result->execute();
            
            while($resultado= $result->fetch()){
                $f[] = $resultado;                
            }

            return $f;
        }

        public function cancelarServicio($agendamiento, $estado_serv){
            // conectamos con la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql ="UPDATE agendamientos SET estado_servicio=:estado_serv WHERE id_agendamiento=:agendamiento";
            $result = $conexion->prepare($sql);
            $result->bindParam(':agendamiento', $agendamiento);
            $result->bindParam(':estado_serv', $estado_serv);

            $result->execute();
            echo "<script> alert('AGENDAMIENTO CANCELADO')</script>";
            echo '<script> location.href="../view/client-site/homeUser"</script>';

        }

        public function cambiarFotoUser($foto,$identificacion){
            // conectamos con la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql ="UPDATE users SET foto=:foto WHERE identificacion=:identificacion";
            $result = $conexion->prepare($sql);
            $result->bindParam(':foto', $foto);
            $result->bindParam(':identificacion', $identificacion);

            $result->execute();
            echo "<script> alert('FOTO ACTUALIZADA')</script>";
            echo '<script> location.href="../view/client-site/miPerfil.php?id_user='.$identificacion.'"</script>';

        }




    }

?>