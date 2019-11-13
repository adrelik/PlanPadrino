
<?php 

require_once "clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT tipo,
detalle,
solucion,
gravedad,
name,
estado,
fechafinal,
fechainicial
FROM casos NATURAL JOIN users WHERE idpadrino = id";

$result=mysqli_query($conexion,$sql);
?>


<div>
	<table class="table table-hover table-condensed table-bordered" id="iddatatable">
		<thead style="background-color: #dc3545;color: white; font-weight: bold;">
			<tr>
				<td>Tipo</td>
				<td>Detalle</td>
				<td>Gravedad</td>
				<td>Encargado</td>
				<td>Fecha creacion</td>
				<td>Estado</td>
				
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<td>Tipo</td>
				<td>Detalle</td>
				<td>Gravedad</td>		
				<td>Encargado</td>
				<td>Fecha creacion</td>
				<td>Estado</td>
				
			</tr>
		</tfoot>
		<tbody >
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				?>
				<tr >
					<td onclick="informacion('<?php echo $mostrar[2] ?>','<?php echo $mostrar[6] ?>')"><?php echo $mostrar[0] ?></td>
					<td><?php echo $mostrar[1] ?></td>
					<td><?php echo $mostrar[3] ?></td>
					<td><?php echo $mostrar[4] ?></td>
					<td><?php echo $mostrar[7] ?></td>
					<td style="text-align: center;">
					<?php echo $mostrar[5] ?>
						<span class="" onclick="eliminarDatos('<?php echo $mostrar[0] ?>')">
							
						</span>
					</td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#iddatatable').DataTable();
	} );
</script>

<script type="text/javascript">
	function informacion(gravedad,fechafinal){
		alert(gravedad + "  Ultima modificacion: "+ fechafinal)
		
	}
	
	
	</script>