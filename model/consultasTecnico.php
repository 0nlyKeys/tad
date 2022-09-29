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

    }

?>