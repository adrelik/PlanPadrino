<?php 

	class crud{
		public function agregar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="INSERT into t_casos (nombre,anio,empresa)
									values ('$datos[0]',
											'$datos[1]',
											'$datos[2]')";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatos($idcaso){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="SELECT id_caso,
							nombre,
							fecha,
							ahijado
					from t_casos
					where id_caso='$idcaso'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'id_caso' => $ver[0],
				'nombre' => $ver[1],
				'fecha' => $ver[2],
				'ahijado' => $ver[3]
				);
			return $datos;
		}

		public function actualizar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE t_casos set t_caso='$datos[0]',
										fecha='$datos[1]',
										ahijado='$datos[2]'
						where id_caso='$datos[3]'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminar($idcaso){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from t_casos where id_caso='$idcaso'";
			return mysqli_query($conexion,$sql);
		}
	}

 ?>