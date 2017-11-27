<?php require_once('Connections/conexion.php'); ?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Web de Reservas</title>
    <link href='css/fullcalendar.css' rel='stylesheet' />
<link href='css/fullcalendar.print.css' rel='stylesheet' media='print' />
  
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/extra.css" rel="stylesheet">
<?php include("includes/findehead.php"); ?>

</head>
  <body>
 
  <?php include("includes/postbody.php"); ?>

  <div class="container">
    
  <div class="row">
 
  
  <div class="col-xs-12 col-sm-3"><?php include("includes/menuizquierda.php"); ?></div>
  <div class="col-xs-12 col-sm-9">
    <h1>Gestión de fechas hábiles   <?php echo ObtenerNombrePista($_GET["id"]);?>   </h1>
    <div class="row">
      <div class="col-xs-12 col-sm-8">
        <style>
  .fc-nonbusiness {
    background: #FF6746
  }

  </style>
      <div id='calendar'></div></div>
      <div class="col-xs-12 col-sm-4">
        <p>Arrastra el ratón sobre los bloques de horas que no permites la reserva.</p>
        <p>haz click sobre la reserva o anulación de pista para eliminarla.</p>
        
        
        
        <p><a href="pista-fechas.php?id=<?php echo GetSQLValueString($_GET["id"], "int");?>" class="btn btn-primary" role="button">Actualizar</a> <a href="javascript:window.history.back();" class="btn btn-warning" role="button">Volver Atrás</a></p>
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
  <?php include("includes/pie.php"); ?>
  <?php include("includes/modales.php"); ?>
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
       $('#calendarModal #apptStartTime').val(start);
       $('#calendarModal #apptEndTime').val(end);
       $('#calendarModal #when').text(inicio+' a '+fin);
       $('#calendarModal').modal('show');

        
      },
      editable: false,

    
      eventClick: function(calEvent, jsEvent, view) {
      
          alert('Eliminar registro: ' + calEvent.id);
          $('#calendar').fullCalendar('removeEvents',calEvent.id);
          //ELIMINAMOS DE LA BASE DE DATOS
          $.ajax({
            type: "POST",
            url:"includes/funciones-ajax.php",
            data: 'idPista='+<?php echo GetSQLValueString($_GET["id"], "int");?>+'&idReserva='+calEvent.id+'&accion=2',
            success: function(resp)
            {  
              if (resp==1)
              {
                 //$(actual).css('background-color', '#f93838');
              }
              if (resp==0)
              {
                 //$(actual).css('background-color', 'white');
              }
            }
          });
          //FIN DE ELIMINACION
    
        },

      
      events: [
      
      

      <?php CalcularHorasPistaReservadas(GetSQLValueString($_GET["id"], "int"));?>
      ],
      eventColor: '#378006'
    });
    
    $('#submitButton').on('click', function (e) {
        // We don't want this to act as a link so cancel the link action
        e.preventDefault();
        doSubmit();
      });

    function doSubmit() {
        $("#calendarModal").modal('hide');
        //console.log($('#apptStartTime').val());
        //console.log($('#apptEndTime').val());
        //console.log($('#apptAllDay').val());
        //alert("form submitted");

        $("#calendar").fullCalendar('renderEvent', {
            title: $('#patientName').val(),
            start: new Date($('#apptStartTime').val())*1,
            end: new Date($('#apptEndTime').val())*1,
        },
        true);
    $('#calendar').fullCalendar('unselect');
    //INSERTAMOS LA INFO EN LA BD
    fechainicio=new Date($('#apptStartTime').val())*1/1000;
    fechafin=new Date($('#apptEndTime').val())*1/1000;
    motivo=$('#patientName').val();
    
    $.ajax({
          type: "POST",
          url:"includes/funciones-ajax.php",
          data: 'idPista='+<?php echo GetSQLValueString($_GET["id"], "int");?>+'&fchFechaInicio='+fechainicio+'&fchFechaFin='+fechafin+'&Motivo='+motivo+'&accion=1',
          success: function(resp)
          {  
            if (resp==1)
            {
               //$(actual).css('background-color', '#f93838');
            }
            if (resp==0)
            {
               //$(actual).css('background-color', 'white');
            }
          }
          });
    //FIN DE INSERCION
    }
    
  });
  </script>
  <div id="calendarModal" class="modal fade" role="dialog" >

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
            <h4 id="modalTitle" class="modal-title">Bloquear Horas</h4>
        </div>
        <div id="modalBody" class="modal-body">
         <form id="createAppointmentForm" class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="inputPatient">Motivo:</label>
                <div class="controls">
                    <input type="text" name="patientName" id="patientName" tyle="margin: 0 auto;" data-provide="typeahead" data-items="4" data-source="[&quot;Value 1&quot;,&quot;Value 2&quot;,&quot;Value 3&quot;]">
                    <input type="hidden" id="apptStartTime" />
                    <input type="hidden" id="apptEndTime" />
                    <input type="hidden" id="apptAllDay" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="when">Cuando:</label>
                <div class="controls controls-row" id="when" style="margin-top:5px;"></div>
            </div>
        </form></div>
            <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="submitButton">Guardar</button>
    </div>
    </div>
</div>
  
  <!-- InstanceEndEditable -->
  </body>
<!-- InstanceEnd --></html>