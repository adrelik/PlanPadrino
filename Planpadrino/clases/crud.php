<?php 

	class crud{
		public function agregar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="INSERT into casos (idcaso,)
									values ('$datos[0]'
											)";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatos($idcaso){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="SELECT idcaso,
							tipo,
							fechainicial,
							ahijado
					from casos
					where idcaso='$idcaso'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'idcaso' => $ver[0],
				'tipo' => $ver[1],
				'fechainicial' => $ver[2],
				'ahijado' => $ver[3]
				);
			return $datos;
		}

		public function actualizar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE casos set idcasos='$datos[0]',
										fecha='$datos[1]',
										ahijado='$datos[2]'
						where idcaso='$datos[3]'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminar($idcaso){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from casos where idcaso='$idcaso'";
			return mysqli_query($conexion,$sql);
		}
	}

 ?>
