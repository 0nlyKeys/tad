<?php
    class consultasTecnico{

        public function mostrarAgendamientos($idTecnico){
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
                    WHERE agn.data_tecnico=:id_tecnico";
            $result = $conexion->prepare($sql);
            $result->bindParam(':id_tecnico',$idTecnico);
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

        public function showAgndByPostal($postal_code){
            $f = null;
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT agn.id_agendamiento, agn.nombres as nom_usr, agn.apellidos as ape_usr, usr.id_user as id_user,usr.nombres as nombre_Tec, usr.apellidos as apellido_Tec, 
                           agn.fecha_agendada as fecha_agn, agn.email, agn.numero_contacto, ciu.ciudad as ciudad, loc.localidad as localidad, loc.postal_codes,
                           agn.direccion_servicio, agn.descripcion, agn.estado_servicio
                    FROM agendamientos agn
                    INNER JOIN users usr ON agn.data_tecnico = usr.id_user                     
                    INNER JOIN ciudades ciu ON agn.id_ciudad = ciu.idCiudad
                    INNER JOIN localidades loc ON agn.id_localidad = loc.idLocalidad
                    WHERE agn.estado_servicio='Pendiente' and loc.postal_codes
                    LIKE '%$postal_code%'";
            $result = $conexion->prepare($sql);
            $result->execute();
            
            while($resultado= $result->fetch()){
                $f[] = $resultado;                
            }

            return $f;

        }
        
        public function verPerfil($email){
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
            echo '<script> location.href="../view/tecnico-side/miPerfil.php?id_user='.$identificacion.'"</script>';

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
            echo '<script> location.href="../view/tecnico-side/miPerfil.php?id_user='.$identificacion.'"</script>';

        }

        public function mostrarTecnico($id_user){
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

        public function cambiarFotoTecnico($foto,$identificacion){
            // conectamos con la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql ="UPDATE users SET foto=:foto WHERE identificacion=:identificacion";
            $result = $conexion->prepare($sql);
            $result->bindParam(':foto', $foto);
            $result->bindParam(':identificacion', $identificacion);

            $result->execute();
            echo "<script> alert('FOTO ACTUALIZADA')</script>";
            echo '<script> location.href="../view/tecnico-side/miPerfil.php?id_user='.$identificacion.'"</script>';

        }

        public function mostrarAgendamientosTec($id_user){
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
                    WHERE agn.data_tecnico=:id_usuario ORDER BY agn.fecha_agendada desc";
            $result = $conexion->prepare($sql);
            $result->bindParam(':id_usuario',$id_user);
            $result->execute();
            
            while($resultado= $result->fetch()){
                $f[] = $resultado;
                
            }

            return $f;

        }

        
        public function numAgendamientos($idTecnico){
            $f = null;
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql = "SELECT COUNT(id_agendamiento) AS totalAgendamientos FROM agendamientos WHERE data_tecnico=:id_tecnico";
            $result = $conexion->prepare($sql);
            $result->bindParam(':id_tecnico',$idTecnico);
            $result->execute();
            
            while($resultado= $result->fetch()){
                $f[] = $resultado;
                
            }

            return $f;

        }

        public function cancelarServicio($agendamiento, $tecnico, $estado_serv){
            // conectamos con la clase conexion
            $objetoConexion = new Conexion();
            $conexion = $objetoConexion->get_conexion();

            $sql ="UPDATE agendamientos SET data_tecnico=:tecnico, estado_servicio=:estado_serv WHERE id_agendamiento=:agendamiento";
            $result = $conexion->prepare($sql);
            $result->bindParam(':agendamiento', $agendamiento);
            $result->bindParam(':tecnico', $tecnico);
            $result->bindParam(':estado_serv', $estado_serv);

            $result->execute();
            echo "<script> alert('AGENDAMIENTO CANCELADO')</script>";
            echo '<script> location.href="../view/tecnico-side/home"</script>';

        }


    }

?>