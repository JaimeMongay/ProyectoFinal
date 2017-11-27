<?php require_once('Connections/conexion.php'); ?>
<?php
$query_DatosPistas = "SELECT * FROM pista WHERE Estado=1 AND idPista=".GetSQLValueString($_GET["id"], "int");
$DatosPistas = mysqli_query($con,  $query_DatosPistas) or die(mysqli_error($con));
$row_DatosPistas = mysqli_fetch_assoc($DatosPistas);
$totalRows_DatosPistas = mysqli_num_rows($DatosPistas);


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Web de Reservas</title>
 
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/extra.css" rel="stylesheet">
  <?php include("includes/findehead.php"); ?>


  <link href='css/fullcalendar.css' rel='stylesheet' />
  <link href='css/fullcalendar.print.css' rel='stylesheet' media='print' />

</head>
<body>

  <?php include("includes/postbody.php"); ?>
  <div class="container">
    
  <div class="row">
  
    <div class="col-xs-12 col-sm-3"><?php include("includes/menuizquierda.php"); ?>

    <p>
      <div class="alert alert-danger" role="alert" ><span class="glyphicon glyphicon-asterisk" ></span> Zonas que no se puede reservar.</div>
      
      <div class="alert alert-info" role="alert" ><span class="glyphicon glyphicon-asterisk" ></span> Zonas con precio a 3€.</div>
      <div class="alert alert-warning" role="alert" ><span class="glyphicon glyphicon-asterisk" ></span> Zonas con precio a 5€. Inluye LUZ</div>
      </p>
    </div>
    <div class="col-xs-12 col-sm-9"><h1><?php echo $row_DatosPistas["Nombre"];?></h1>
  
    <div class="row">
      
      <div class="col-xs-12">
      <div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-asterisk" ></span> Selecciona con el ratón el rango de fechas que quieres reservar (1h:30min).</div>
      

      </div>

  <div class="row">
  <div class="col-xs-12">

  <style>
  .fc-nonbusiness {
    background: #FF6746
  }

  </style> 

  <div id='calendar'>

    </div>
  </div>
  </div>
  </div>
  </div>
  
  
  </div>
  
  
  <?php include("includes/prepie.php"); ?>
  <script src="bootstrap/js/jquery-1.11.2.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src='js/moment.min.js'></script>
  <script src='js/fullcalendar.min.js'></script>
  <script src='js/lang-all.js'></script>
  <script>
$(document).ready(function() {
		
		$('#calendar').fullCalendar({
        defaultView: 'agendaWeek',
		axisFormat: 'HH:mm',
		ignoreTimezone: "true",
		businessHours:{
        start: '08:00', 
        end: '24:00',
        dow: [ 1, 2, 3, 4, 5,6,0 ]
        },
		lang: 'es',
		allDaySlot:false,
		format: 'DD/MM/YYYY',
		defaultDate: '<?php echo date('Y-m-d');?>',
		selectable: true,
		selectHelper: true,
		select: function(start, end) {
			 inicio=moment(start).format('DD/MM/YYYY HH:mm');
			 fin=moment(end).format('DD/MM/YYYY HH:mm');
			 $('#calendarModal #apptStartTime').val(inicio);
			 $('#calendarModal #apptEndTime').val(fin);
			 $('#calendarModal #when').text(inicio+' a '+fin);
			 $('#calendarModal').modal('show');

      fechainicio=new Date($('#apptStartTime').val())*1/1000;
      fechafin=new Date($('#apptEndTime').val())*1/1000;
				
			},
			editable: false,

			
			events: [
       
       {
          start: '08:00:00+02:00',
          end: '20:00:00+02:00',
          color: 'blue',
          rendering: 'background',
          dow: [ 1, 2, 3, 4, 5, 6 ,0]
       },

       {
          start: '20:00:00+02:00',
          end: '24:00:00+02:00',
          color: 'yellow',
          rendering: 'background',
          dow: [ 1, 2, 3, 4, 5, 6 ,0]
       },
      
       
      <?php CalcularHorasPistaReservadas(GetSQLValueString($_GET["id"], "int"));?>
      
			],
      eventColor: '#378006'
		});
		
		
	});
  </script>
  
  <div id="calendarModal" class="modal fade" role="dialog" >

<div class="modal-dialog">
    <div class="modal-content">
    <form method="post" id="createAppointmentForm" class="form-horizontal" action="pista-ver-previa.php?id=<?php echo $_GET["id"];?>">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
            <h4 id="modalTitle" class="modal-title">Reservar Horas</h4>
        </div>
        <div id="modalBody" class="modal-body">
         
            <div class="control-group">
                
                <div class="controls">
                    <input type="hidden" id="apptStartTime" name="apptStartTime"/>
                    <input type="hidden" id="apptEndTime" name="apptEndTime" />
                    <input type="hidden" id="apptAllDay" name="apptAllDay" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="when">Cuando:</label>
                <div class="controls controls-row" id="when" style="margin-top:5px;"></div>
            </div>
        </div>
            <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="submitButton">Guardar</button>
    </div>
    </form>
    </div>
</div>
</div>


  <?php include("includes/pie.php"); ?>
  <?php include("includes/modales.php"); ?>
  
  <!-- InstanceEndEditable -->
  </body>
<!-- InstanceEnd --></html>
<?php
//AÑADIR AL FINAL DE LA PÁGINA
mysqli_free_result($DatosPistas);

?>