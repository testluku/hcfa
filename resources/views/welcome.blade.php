<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Citas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- styles -->
    {!! Html::style("css/bootstrap.css") !!}
    {!! Html::style("css/bootstrap-responsive.css") !!}
    {!! Html::style("css/style.css") !!}
    {!! Html::style("css/ui-lightness/jquery-ui.css") !!}
    {!! Html::style("css/fullcalendar.min.css") !!}
    {!! Html::style("lib/colorpicker/css/colorpicker.css") !!}
    {!! Html::style("lib/timepicker/jquery-ui-timepicker-addon.css") !!}

    <style>
        body {
            background-image: url('{{ asset("img/bg.png") }}');
            padding-top: 5px;
        }

        {{-- Override fullcalendar styles. --}}
        .fc-unthemed .fc-today {
            background: #ffffff none repeat scroll 0 0;
        }
        td.fc-day-number {
            cursor:pointer;
            width:100%;
            text-align:right;
            border-bottom:1px dotted #ddd;
        }

        {{-- Override modal css. --}}
        .modal-dialog { width: 800px; }
        .modal-body { white-space: normal !important; }

        {{-- Create and edit forms. --}}
        .form_event_info label { margin-bottom: 0; margin-top: 5px; }
        .form_event_dates {
            background-image: url('{{ asset("img/bg.png") }}');
            border-radius: 5px 0px 0px 5px;
            width: 250px;
        }
        .form_event_dates .display-block {
            display: block;
            line-height: 10px;
            margin-bottom: 20px;
        }
        .form_event_dates input {
            background: none;
            border: none;
            border-bottom: 1px solid #000000;
            color: #567BD2;
        }
        .form_event_info {
            background-color: #567BD2;
            border-radius: 0px 5px 5px 0px;
            color: #ffffff;
            font-size: 14px;
            width: 500px;
        }
        .form_event_info .display-inline-block {
            display: inline-block;
            width: 49%;
        }
        .form_event_info .display-inline-block input,
        .form_event_info textarea,
        .form_event_info .display-inline-block select {
            border: none;
            background-color: #ffffff;
            background-image: none;
            color: #000000;
            line-height: 1.42857143;
            width: 90%;
        }
        .form_event_info .display-inline-block input,
        .form_event_info .display-inline-block select {
            height: 34px;
        }
        form#event_description_e {
            height: 380px;
        }
        .form_event_dates, .form_event_info {
            float: left;
            height: 98%;
            margin: none;
            padding: 10px 18px;
            position: relative;
        }

        {{-- Override some datepicker css.  --}}
        select.ui-datepicker-month, select.ui-datepicker-year {
            color: #000000;
        }

        {{-- Loading (ajax) --}}
        #splash{
            background: rgba(0, 0, 0, 0.5);
            cursor:wait;
            display: block;
            height:100%;
            left:0;
            position:fixed;
            top:0;
            width:100%;
            z-index: 1600;
        }
        #splash_loading{
            background-image:url('{{ asset("img/ajax-loader.gif") }}');
            background-repeat: no-repeat;
            cursor:wait;
            height:80px;
            margin: 300px 48%;
            width:200px;
        }
        label.required::after {
            content: ' *';
            color: red;
        }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>

    <div class="container">
        {{--<a href="#" id="addEvent" class="btn btn-default pull-left">Reservar cita</a>--}}
        @if ($is_ips>1)
            <select id="especialista" class="pull-right" style="margin-bottom: 10px;">
                <option value="-1">Todos</option>
                @foreach ($especialistas as $especialista)
                    <option value="{{$especialista->id}}"
                        @if ($last_selected_especialista == $especialista->id)
                            selected="selected"
                        @endif>
                        {{$especialista->first_name}}
                    </option>
                @endforeach
            </select>
        @else
            <input type="hidden" id="especialista" value="{{$grupo_especialista}}">
        @endif
        <div class="clearfix"></div>
        <div id="calendar"></div>
    </div> <!-- /container -->

    <!-- Modal View Event -->
    <div id="cal_viewModal" class="modal fade">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
            <a href="#" class="btn btn-danger" data-option="remove">Borrar</a>
            <a href="#" class="btn btn-info" data-option="edit">Modificar</a>
            {{-- <a href="#" class="btn btn-warning" data-option="export">Exportar</a> --}}
            <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
        </div>
        </div>
        </div>
    </div>

    <!-- Modal Edit Event -->
    <div id="cal_editModal" class="modal fade">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
            <a href="#" class="btn btn-primary" data-option="save">Guardar Cambios</a>
            <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
        </div>
        </div>
        </div>
    </div>

    <!-- Modal QuickSave Event -->
    <div id="cal_quickSaveModal" class="modal fade">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
            <a href="#" class="btn btn-primary" data-option="quickSave">Reservar Cita</a>
            <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
        </div>
        </div>
        </div>
    </div>

    <!-- Modal Delete Prompt -->
    <div id="cal_prompt" class="modal fade">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
            <a href="#" class="btn btn-danger" data-option="remove-this">Borrar esto</a>
            <a href="#" class="btn btn-danger" data-option="remove-repetitives">Borrar todo</a>
            <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
        </div>
        </div>
        </div>
    </div>

    <!-- Modal Edit Prompt -->
    <div id="cal_edit_prompt_save" class="modal fade">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body-custom"></div>
        <div class="modal-footer">
            <a href="#" class="btn btn-info" data-option="save-this">Guardar esto</a>
            <a href="#" class="btn btn-info" data-option="save-repetitives">Guardar todo</a>
            <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
        </div>
        </div>
        </div>
    </div>

    <div id="splash">
        <div id="splash_loading"></div>
    </div>

    <!-- javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {!! Html::script("js/jquery.js") !!}
    {!! Html::script("js/bootstrap.js") !!}
    {!! Html::script("js/moment.min.js") !!}
    {!! Html::script("js/moment-locale-es.js") !!}
    {!! Html::script("js/fullcalendar.min.js") !!}
    {!! Html::script("js/jquery-ui.js") !!}
    {!! Html::script("js/jquery.calendar.js") !!}
    {!! Html::script("js/datepicker-es.js") !!}

    {!! Html::script("lib/timepicker/jquery-ui-sliderAccess.js") !!}
    {!! Html::script("lib/timepicker/jquery-ui-timepicker-addon.min.js") !!}
    {!! Html::script("js/jquery-ui-timepicker-es.js") !!}

    {!! Html::script("js/notify.min.js") !!}

    <!-- call calendar plugin -->
    <script>
        $(function() {
            // Set moment.js global locale
            moment.locale('es');
            // override notify default globalPosition option
            $.notify.defaults({
                globalPosition: 'bottom right'
            });
            $('a.btn-danger[data-option="remove"]').click(function(ev) {
                if (!confirm("Está seguro/a que quiere eliminar esta cita?"))
                {
                    return false;
                }
                ev.preventDefault();
            })
            $(document).ajaxSend(function( event, jqxhr, settings ) {
                settings.data += '&_token={{csrf_token()}}';
                var especialista = $('#especialista').val();
                if (especialista) {
                    if (settings.type === 'POST') {
                        settings.data += '&especialista='+especialista;
                    } else if (settings.type === 'GET') {
                        settings.url += '&especialista='+especialista;
                    }
                }
            });
            $().FullCalendarExt({
                calendarSelector: '#calendar',
                defaultView: 'agendaWeek',
                dayType: 'agendaDay',
                weekType: 'agendaWeek',
                //ajaxJsonFetch: 'http://www.google.com/calendar/feeds/usa__en%40holiday.calendar.google.com/public/basic',
                //gcal: true
                ajaxJsonFetch: "{{ action('ReservacionController@index') }}",
                ajaxUiUpdate: "{{ action('ReservacionController@update') }}",
                ajaxEventSave: "{{ action('ReservacionController@update') }}",
                ajaxEventQuickSave: "{{ action('ReservacionController@store') }}",
                ajaxEventDelete: "{{ action('ReservacionController@destroy') }}",
                ajaxEventEdit: "{{ action('ReservacionController@update') }}",
                ajaxEventExport: 'includes/cal_export.php',
                ajaxRepeatCheck: "{{ action('ReservacionController@checkRepetitiveEvents') }}",
                ajaxRetrieveDescription: "{{ action('ReservacionController@show') }}",
                ajaxAutocompletePaciente: "{{ action('ReservacionController@autocompleteIdPaciente') }}",
                ajaxDatosPaciente: "{{ action('ReservacionController@datosPaciente') }}",
                ajaxBusinessHours: "{{ action('HorarioAtencionController@businessHours') }}",
                ajaxBlockedDays: "{{ action('DiaBloqueadoController@blockedDays') }}"
            });
            $('#calendar').fullCalendar('option', 'height', 550);
            $('#especialista').change(function() {
                $('div.fc-day-content').html('<div style="position: relative; height: 0px;">&nbsp;</div>');
                $('#calendar').fullCalendar('refetchEvents');
            });
            $(document).ajaxStart(function() {
                $('#splash').show();
            });
            $(document).ajaxStop(function() {
                $('#splash').hide();
            });
            /*
            $('#addEvent').click(function(ev) {
                calendar.openModal('', '', '', '', '', '', '', '', '', '', '');
                var try_again = true;
                while (try_again) {
                    {{--
                        Garantiza que siempre se muestre el formulario
                        para crear la cita.
                    --}}
                    var editButton = $('.modal-footer a[data-option="edit"]');
                    if (editButton) {
                        editButton.click();
                        try_again = false;
                    }
                }
                ev.preventDefault();
            });
            */
            /************************
                Pickers
            *************************/
            //$("#datepicker").datepicker({dateFormat: "yy-mm-dd"});
            //$("#datepicker2").datepicker({dateFormat: "yy-mm-dd"});
            //$('#tp1').timepicker();
            //$('#tp2').timepicker();
        });
    </script>
</body>
</html>
