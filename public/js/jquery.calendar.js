/*
 * jQuery FullCalendar Extendable Plugin
 * An Ajax (PHP - Mysql - jquery) script that extends the functionalities of the fullcalendar plugin
 * Dependencies:
 *  - jquery
 *  - jquery Ui
 *  - jquery colorpicker (since 1.6.4)
 *  - jquery timepicker (since 1.6.4)
 *  - jquery Fullcalendar
 *  - Twitter Bootstrap
 * Author: Paulo Regina
 * Website: www.pauloreg.com
 * Contributions: Patrik Iden, Jan-Paul Kleemans, Bob Mulder
 * Version 1.6.4, July - 2014
 * Fullcalendar 1.6.4
 * Released Under Envato Regular or Extended Licenses
 */

(function($, undefined)
{
    $.fn.extend
    ({
        // FullCalendar Extendable Plugin
        FullCalendarExt: function(options)
        {
            // Default Configurations (General)
            var defaults =
            {
                calendarSelector: '#calendar',

                ajaxJsonFetch: 'includes/cal_events.php',
                ajaxUiUpdate: 'includes/cal_update.php',
                ajaxEventSave: 'includes/cal_save.php',
                ajaxEventQuickSave: 'includes/cal_quicksave.php',
                ajaxEventDelete: 'includes/cal_delete.php',
                ajaxEventEdit: 'includes/cal_edit_update.php',
                ajaxEventExport: 'includes/cal_export.php',
                ajaxRepeatCheck: 'includes/cal_check_rep_events.php',
                ajaxRetrieveDescription: 'includes/cal_description.php',

                modalViewSelector: '#cal_viewModal',
                modalEditSelector: '#cal_editModal',
                modalQuickSaveSelector: '#cal_quickSaveModal',
                modalPromptSelector: '#cal_prompt',
                modalEditPromptSelector: '#cal_edit_prompt_save',
                formAddEventSelector: 'form#add_event',
                formFilterSelector: 'form#filter-category select',
                formEditEventSelector: 'form#edit_event', // php version
                formSearchSelector:"form#search",

                successAddEventMessage: 'Cita reservada satisfactoriamente',
                successDeleteEventMessage: 'Cita eliminada satisfactoriamente',
                successUpdateEventMessage: 'Cita actualizada satisfactoriamente',
                failureAddEventMessage: 'Falló al reservar la cita',
                failureDeleteEventMessage: 'Falló al borrar la cita',
                failureUpdateEventMessage: 'Falló al actualizar la cita',
                generalFailureMessage: 'Falló al ejecutar la acción',
                ajaxError: 'Falló al cargar el contenido',

                visitUrl: 'Visitar URL:',
                titleText: 'Título:',
                descriptionText: 'Descripción:',
                colorText: 'Color:',
                startDateText: 'Fecha inicio:',
                startTimeText: 'Hora inicio:',
                endDateText: 'Fecha fin:',
                endTimeText: 'Hora fin:',
                categoryText: 'Categoría:',
                eventText: 'Cita: ',
                repetitiveEventActionText: 'Esta es una cita repetitiva, qué deseas hacer?',

                isRTL: false,
                monthNames: [
                    'Enero',
                    'Febrero',
                    'Marzo',
                    'Abril',
                    'Mayo',
                    'Junio',
                    'Julio',
                    'Agosto',
                    'Septiembre',
                    'Octubre',
                    'Noviembre',
                    'Diciembre'
                ],
                monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
                today: 'hoy',
                month: 'mes',
                week: 'semana',
                day: 'día',
                weekNumberTitle: 'Sm',
                allDayText: 'Todo el día',

                defaultColor: '#587ca3',

                weekType: 'agendaWeek', // basicWeek
                dayType: 'agendaDay', // basicDay

                editable: true,
                disableDragging: false,
                disableResizing: false,
                timezone: 'local',
                //lazyFetching: true,
                lazyFetching: false, // Don't change this to true or month view wont work.
                filter: true,
                quickSave: true,
                firstDay: 1, // Monday (0=sunday)

                gcal: false,
                version: 'modal',
                quickSaveCategory: '',
                colorpickerArgs: {format: 'hex'},

                defaultView: 'month', // basicWeek or basicDay or agendaWeek
                aspectRatio: 1.35, // will make day boxes bigger
                weekends: true, // show (true) the weekend or not (false)
                weekNumbers: false, // show week numbers (true) or not (false)
                weekNumberCalculation: 'iso',

                hiddenDays: [], // [0,1,2,3,4,5,6] to hide days as you wish

                theme: false,
                themePrev: 'circle-triangle-w',
                themeNext: 'circle-triangle-e',

                fixedWeekCount: 'true', // true, false

                allDaySlot: false, // true, false
                slotLabelFormat: 'h:mma',

                slotDuration: "00:05:00", // 5 minutes
                slotLabelInterval: 5,
                minTime: "05:00:00", // 5 hours
                maxTime: "23:00:00", // 23 hours

                businessHours: false,

                slotEventOverlap: true,
                eventOverlap: true,

                selectConstraint: 'available-for-reservation',
                eventConstraint: 'available-for-reservation',

                savedRedirect: 'index.php',
                removedRedirect: 'index.php',
                updatedRedirect: 'index.php',

                ajaxLoaderMarkup: '<div class="loadingDiv"></div>',
                prev: "<",
                next: ">",
                //prev: "<span class='fc-text-arrow'>&lsaquo;</span>",
                //next: "<span class='fc-text-arrow'>&rsaquo;</span>",
                //prevYear: "<span class='fc-text-arrow'>&laquo;</span>",
                //nextYear: "<span class='fc-text-arrow'>&raquo;</span>",
            }

            var tiposDocumento = [
                {"short": "CC", "long": "Cédula Ciudadanía"},
                {"short": "PA", "long": "Pasaporte"},
                {"short": "CE", "long": "Cédula Extranjería"},
                {"short": "TI", "long": "Tarjeta Identidad"},
                {"short": "RC", "long": "Registro Civíl"}
            ];
            var tiposConsulta = [
                {"short": "VAL", "long": "Valoración"},
                {"short": "PQ", "long": "Procedimiento Quirúrgico"},
                {"short": "CQ", "long": "Control Quirúrgico"},
                {"short": "PNQ", "long": "Procedimiento No Quirúrgico"},
                {"short": "CNQ", "long": "Control No Quirúrgico"},
                {"short": "TE", "long": "Terapia"}
            ];
            var options =  $.extend(defaults, options);
            var opt = options;
            if(opt.gcal == true) { opt.weekType = ''; opt.dayType = ''; }

            // fullCalendar
            $(opt.calendarSelector).fullCalendar
            ({

                defaultView: opt.defaultView,
                aspectRatio: opt.aspectRatio,
                weekends: opt.weekends,
                weekNumbers: opt.weekNumbers,
                weekNumberCalculation: opt.weekNumberCalculation,
                weekNumberTitle: opt.weekNumberTitle,
                titleFormat: {
                    month: opt.titleFormatMonth,
                    week: opt.titleFormatWeek,
                    day: opt.titleFormatDay
                },
                columnFormat: {
                    month: opt.columnFormatMonth,
                    week: opt.columnFormatWeek,
                    day: opt.columnFormatDay
                },
                isRTL: opt.isRTL,
                hiddenDays: opt.hiddenDays,
                theme: opt.theme,
                buttonIcons: {
                    prev: opt.themePrev,
                    next: opt.themeNext
                },
                fixedWeekCount: opt.fixedWeekCount,
                allDaySlot: opt.allDaySlot,
                allDayText: opt.allDayText,
                slotLabelFormat: opt.slotLabelFormat,
                slotDuration: opt.slotDuration,
                slotLabelInterval: opt.slotLabelInterval,
                minTime: opt.minTime,
                maxTime: opt.maxTime,

                businessHours: opt.businessHours,

                slotEventOverlap: opt.slotEventOverlap,
                eventOverlap: opt.eventOverlap,

                selectConstraint: opt.selectConstraint,
                eventConstraint: opt.eventConstraint,

                timeFormat: opt.timeFormat,
                header:
                {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,'+opt.weekType+','+opt.dayType
                },
                monthNames: opt.monthNames,
                monthNamesShort: opt.monthNamesShort,
                dayNames: opt.dayNames,
                dayNamesShort: opt.dayNamesShort,
                buttonText: {
                    prev: opt.prev,
                    next: opt.next,
                    prevYear: opt.prevYear,
                    nextYear: opt.nextYear,
                    today: opt.today,
                    month: opt.month,
                    week: opt.week,
                    day: opt.day
                },
                editable: opt.editable,
                disableDragging: opt.disableDragging,
                disableResizing: opt.disableResizing,
                timezone: opt.timezone,
                firstDay: opt.firstDay,
                lazyFetching: opt.lazyFetching,
                selectable: opt.quickSave,
                selectHelper: opt.quickSave,
                select: function(start, end, jsEvent)
                {
                    if (!end.hasTime()) {
                        // Month view day was clicked (ambiguous time).
                        // more info: http://fullcalendar.io/docs/utilities/Moment/#ambiguously-timed
                        return false;
                    }
                    var event = {"start": start, "end" : end};
                    if(!calendar.checkEspecialista() ||
                       !calendar.checkTime(event) ||
                       !calendar.checkBlocked(event) ||
                       calendar.checkOverlap(event)) {
                       $(opt.calendarSelector).fullCalendar('unselect');
                        return false;
                    }
                    if(opt.version == 'modal')
                    {
                        var startDate = moment(start).format('YYYY-MM-DD');
                            startTime = moment(start).format('HH:mm');
                            endDate = moment(end).format('YYYY-MM-DD');
                            endTime = moment(end).format('HH:mm');
                        calendar.openModal('', '', '', '', start, end, '', startDate, startTime, endDate, endTime);
                        // Sometimes the create form fails to show up, so try_again.
                        var try_again = true;
                        while (try_again) {
                            var editButton = $('.modal-footer a[data-option="edit"]');
                            if (editButton) {
                                editButton.click();
                                try_again = false;
                            }
                        }
                        $(opt.calendarSelector).fullCalendar('unselect');
                    }
                },
                eventSources: [
                    { url: opt.ajaxJsonFetch, allDayDefault: false },
                    {
                        url: opt.ajaxBusinessHours,
                        data: {
                            minTime: opt.minTime,
                            maxTime: opt.maxTime
                        }
                    },
                    {
                        url: opt.ajaxBlockedDays,
                        data: {
                            minTime: opt.minTime,
                            maxTime: opt.maxTime
                        }
                    }
                ],
                eventDrop: function(event, delta, revertFunc, jsEvent, ui, view)
                {
                    if(!calendar.checkEspecialista() ||
                       !calendar.checkTime(event) ||
                       calendar.checkOverlap(event)) {
                        revertFunc();
                        return false;
                    }
                    // clone event in order to update it, doesn't work replacing
                    // values in the original event itself (I don't know why :s).
                    var new_event = {};
                    new_event.id = event.id;
                    new_event.start = event.start.format('YYYY-MM-DD HH:mm:ss');
                    new_event.start_date = event.start.format('YYYY-MM-DD');
                    new_event.start_time = event.start.format('HH:mm:ss');
                    new_event.end = event.end.format('YYYY-MM-DD HH:mm:ss');
                    new_event.end_date = event.end.format('YYYY-MM-DD');
                    new_event.end_time = event.end.format('HH:mm:ss');
                    $.post(opt.ajaxUiUpdate, new_event, function(response) {
                        $(opt.calendarSelector).fullCalendar('refetchEvents');
                    });
                },
                eventResize: function(event, delta, revertFunc, jsEvent, ui, view)
                {
                    if(!calendar.checkEspecialista() ||
                       !calendar.checkTime(event) ||
                       calendar.checkOverlap(event)) {
                        revertFunc();
                        return false;
                    }
                    // clone event in order to update it, doesn't work replacing
                    // values in the original event itself (I don't know why :s).
                    var new_event = {};
                    new_event.id = event.id;
                    new_event.start = event.start.format('YYYY-MM-DD HH:mm:ss');
                    new_event.start_date = event.start.format('YYYY-MM-DD');
                    new_event.start_time = event.start.format('HH:mm:ss');
                    new_event.end = event.end.format('YYYY-MM-DD HH:mm:ss');
                    new_event.end_date = event.end.format('YYYY-MM-DD');
                    new_event.end_time = event.end.format('HH:mm:ss');
                    $.post(opt.ajaxUiUpdate, new_event, function(response){
                        $(opt.calendarSelector).fullCalendar('refetchEvents');
                    });
                },
                eventRender: function(event, element, view)
                {
                    var d_color = event.color;
                    var d_startDate = moment(event.start).format('YYYY-MM-DD');
                    var d_startTime = moment(event.start).format('HH:mm');
                    var d_endDate = moment(event.end).format('YYYY-MM-DD');
                    var d_endTime = moment(event.end).format('HH:mm');
                    if (view.name == 'month') {
                        // Add events count by day to the month view.
                        var date = event.slot_date + 'T06:00:00';
                        var text = '';
                        if (event.count > 1) { text = 'Citas agendadas' }
                        else { text = 'Cita agendada' }
                        var span_text = '<span style="font-size:14px;display:block;">'+text+'</span>';
                        element
                            .css({
                                "height": "100%",
                                "text-align": "center",
                                "font-size": "28px",
                                "color": "#428bca",
                                "background": "none",
                                "border": "none"
                            })
                            .attr('id', event.slot_date)
                            .html(event.count+span_text);
                        $(opt.calendarSelector)
                            .off('click', '#'+event.slot_date)
                            .on('click', '#'+event.slot_date, function(ev) {
                                ev.preventDefault();
                                $(opt.calendarSelector).fullCalendar('changeView', 'agendaDay');
                                $(opt.calendarSelector).fullCalendar('gotoDate', new Date(date));
                            });
                    } else {
                        if(opt.version == 'modal')
                        {
                            if (event.id == 'available-for-reservation') {
                                // Open action  (modalView Mode)
                                element.attr('data-toggle', 'modal');
                                element.attr('href', '#');
                                element.addClass('available-for-reservation'+d_startDate);
                                element.attr('onclick', 'calendar.openModal("' + event.title + '","' + event.url + '","' + event.original_id + '","' + event.id + '","' + event.start + '","' + event.end + '","' + d_color + '","' + d_startDate + '","' + d_startTime + '","' + d_endDate + '","' + d_endTime + '");');
                            } else if ( event.id == 'unavailable-for-reservation' ) {
                                element.attr('data-start-date', d_startDate);
                                element.attr('data-end-date', d_endDate);
                            } else {
                                // Normal event
                                element.attr('data-toggle', 'modal');
                                element.attr('href', '#');
                                element.attr('onclick', 'calendar.openModal("' + event.title + '","' + event.url + '","' + event.original_id + '","' + event.id + '","' + event.start + '","' + event.end + '","' + d_color + '","' + d_startDate + '","' + d_startTime + '","' + d_endDate + '","' + d_endTime + '");');
                            }
                        }
                    }
                },
                eventAfterAllRender: function(view) {
                    if (view.name == 'agendaWeek' || view.name == 'agendaDay') {
                        // Get all non-working days (given by user config);
                        var not_work = $(opt.calendarSelector).find('.unavailable-for-reservation');
                        // Iterate over every day and remove available events in there.
                        for (var i=0; i < not_work.length; i++) {
                            // For every day, get the start and end date for
                            // processing the days between those dates.
                            var start = moment($(not_work[i]).data('start-date')); // Start block date
                            var end = moment($(not_work[i]).data('end-date')); // Start block date
                            while (start < end) {
                                // Remove available-for-reservation items in
                                // this day.
                                var selector = '.available-for-reservation'+start.format('YYYY-MM-DD');
                                $(opt.calendarSelector).find(selector).remove();
                                // Increments start date by 1 day.
                                start.add(1, 'days');
                            }
                            // Process last blocked day of this event.
                            var selector = '.available-for-reservation'+end.format('YYYY-MM-DD');
                            $(opt.calendarSelector).find(selector).remove();
                        }
                        $(opt.calendarSelector)
                            .off('click', '.unavailable-for-reservation')
                            .on('click', '.unavailable-for-reservation', function(ev) {
                                ev.preventDefault();
                                $.notify('Esta fecha ha sido bloqueada y no se pueden reservar citas, '+
                                         'para desbloquearla por favor vaya a la administración del calendario', 'warn');
                                return false;
                            });
                    }
                },
                viewRender: function(view) {
                    if (view.name == 'agendaWeek') {
                        // a click on the day number should switch the calendar to day view
                        var $headers = $('th.fc-day-header.fc-widget-header');
                        $headers.click(function() { // Clicked column title text
                            // agendaWeek view mode title
                            var year = $(opt.calendarSelector).fullCalendar('getDate').format('YYYY');
                            var month = $(this).text().split(' ')[1].split('/')[0];
                            var day = $(this).text().split(' ')[1].split('/')[1];
                            var date = new Date(year, month - 1, day);
                            $(opt.calendarSelector).fullCalendar('changeView', 'agendaDay');
                            $(opt.calendarSelector).fullCalendar('gotoDate', date);
                        });
                        $headers.css({'cursor':'pointer'});
                    }
                },
                dayClick: function(date, jsEvent, view) {
                    if ('month' == view.name) {
                        $(opt.calendarSelector).fullCalendar('changeView', 'agendaDay');
                        $(opt.calendarSelector).fullCalendar('gotoDate', date);
                    }
                }
            }); //fullCalendar

            calendar.checkEspecialista = function(event) {
                // Checks that one specialist is selected in order to avoid confusion.
                if ($('#especialista').val() == '-1') {
                    $.notify('Debe seleccionar un especialista en la parte superior derecha', 'warn');
                    $(opt.calendarSelector).fullCalendar('unselect');
                    return false;
                }
                return true;
            };

            calendar.checkBlocked = function(event) {
                var event_date = event.start.format('YYYY-MM-DD');
                // Get all the events of type "background" with id
                // "unavailable-for-reservation".
                var blocked_days = $(opt.calendarSelector).fullCalendar(
                    'clientEvents', 'unavailable-for-reservation'
                );
                // Days blocked in calendar administration
                var blocked_dates = [];
                for (var i=0; i < blocked_days.length; i++) {
                    // Get start date
                    var start = blocked_days[i].start;
                    // Get end date
                    var end = blocked_days[i].end;
                    var current_date = start.clone();
                    while (current_date < end) {
                        blocked_dates.push(current_date.format('YYYY-MM-DD'));
                        // Increments start by 1 day.
                        current_date.add(1, 'days');
                    }
                    // Add end date
                    if(end){
                    	blocked_dates.push(end.format('YYYY-MM-DD'));
                    }
                }
                if ($.inArray(event_date, blocked_dates) >= 0) {
                    // If the event date is in blocked_dates it means the
                    // user has clicked on blocked date, so return false.
                    $.notify('Esta fecha ha sido bloqueada y no se pueden reservar citas, '+
                             'para desbloquearla por favor vaya a la administración del calendario', 'warn');
                    return false;
                }
                return true;
            };

            calendar.checkTime = function(event) {
                // Not allow to create events in past dates.
                if (event.start < Date.now()) {
                    $.notify('Esta fecha ya pasó', 'warn');
                    return false;
                }
                // Not allow to create events out of the given
                // opt.minTime and opt.maxTime bounds.
                if (event.start.toDate().getHours() < opt.minTime.split(':')[0] ||
                    event.end.toDate().getHours() > opt.maxTime.split(':')[0]) {
                    $.notify('Esta cita está fuera de las horas permitidas '+opt.minTime+'-'+opt.maxTime, 'warn');
                    return false;
                }
                return true;
            };

            // Avoid event overlap
            calendar.checkOverlap = function(event)
            {
                /// deny overlap of event.
                // +1 and -1 are added to include bounds.
                var start = Math.round(new Date(event.start)) + 1;
                var end = Math.round(new Date(event.end)) - 1;
                var overlap = $('#calendar').fullCalendar('clientEvents', function(ev) {
                    if (
                        // Avoid to checks against itself.
                        (event.hasOwnProperty('id') && ev.hasOwnProperty('id')
                         && event.id == ev.id) ||
                        // Don't check against background events (allowed event dates);
                        (ev.hasOwnProperty('rendering') &&
                          'background' === ev.rendering) ) { return false; }
                    var estart = Math.round(new Date(ev.start));
                    var eend = Math.round(new Date(ev.end));
                    return (
                        ( start > estart && start < eend ) ||
                        ( end > estart && end < eend ) ||
                        ( start < estart && end > eend )
                    );
                });
                if (overlap.length) {
                    $.notify('Ya existe otra cita en esa fecha.', 'warn');
                    return true;
                }
                return false;
            };

            // Function to Open Modal
            calendar.openModal = function(title, url, id, rep_id, eStart, eEnd, color, startDate, startTime, endDate, endTime)
            {
                $(".modal-body").html(opt.ajaxLoaderMarkup); // clear data
                // Setup variables
                calendar.title = title;
                calendar.url = url;
                calendar.id = id;
                calendar.rep_id = rep_id;
                calendar.eventStart = eStart;
                calendar.eventEnd = eEnd;
                calendar.color = color;
                calendar.startDate = startDate;
                calendar.startTime = startTime;
                calendar.endDate = endDate;
                calendar.endTime = endTime;
                var dataString = 'id='+calendar.id;
                $.ajax({
                    type: "POST",
                    url: opt.ajaxRetrieveDescription,
                    data: dataString,
                    cache: false,
                    beforeSend: function() { $('.loadingDiv').show(); $('.modal-footer').hide() },
                    error: function() { $('.loadingDiv').hide(); $.notify(opt.ajaxError, 'error'); },
                    success: function(data)
                    {
                        var start = $.fullCalendar.moment(data.start),
                            end = $.fullCalendar.moment(data.end),
                            event_date = moment(start).format('ddd, MMM D YYYY', opt),
                            start_time = moment(start).format('h:mma', opt),
                            end_time = moment(end).format('h:mma', opt),
                            tipoConsulta = '';
                            $.each(tiposConsulta, function(i, item) {
                                if (item.short == data.tipoConsulta) {
                                    tipoConsulta = item.long;
                                }
                            });
                        $('.loadingDiv').hide();
                        $('.modal-footer').show();
                        $(".modal-body").html(
                            opt.ajaxLoaderMarkup +
                            '<p>'+
                            '   <i class="glyphicon glyphicon-info-sign"></i> '+
                                tipoConsulta +' - '+
                                data.description +
                            '</p>'+
                            '<p>'+
                            '   <i class="glyphicon glyphicon-earphone"></i> '+
                                data.phone+
                            '</p>'+
                            '<p>'+
                            '   <i class="glyphicon glyphicon-envelope"></i> '+
                                data.email +
                            '</p>'+
                            '<p>'+
                            '   <i class="glyphicon glyphicon-calendar"></i> '+
                                event_date +' '+
                            '   <i class="glyphicon glyphicon-time"></i> '+
                                start_time +' - '+ end_time +
                            '</p>'
                        );
                        // Delete button
                        $(".modal-footer")
                            .undelegate('[data-option="remove"]', 'click')
                            .delegate('[data-option="remove"]', 'click', function(e)
                            {
                                calendar.remove(calendar.id);
                                e.preventDefault();
                            });
                        // Export button
                        $(".modal-footer")
                            .undelegate('[data-option="export"]', 'click')
                            .delegate('[data-option="export"]', 'click', function(e)
                            {
                                calendar.exportIcal(calendar.id, calendar.title, calendar.description, calendar.eventStart, calendar.eventEnd, calendar.url);
                                e.preventDefault();
                            });
                    }
                });
                $(".modal-header").html('<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+'<h4>'+calendar.title+'</h4>');
                $(opt.modalViewSelector).modal('show');
                // Edit Button
                $(".modal-footer")
                    .undelegate('[data-option="edit"]', 'click')
                    .delegate('[data-option="edit"]', 'click', function(e)
                    {
                        $(opt.modalViewSelector).modal('hide');
                        $(".modal-body").html(opt.ajaxLoaderMarkup); // clear data
                        var dataString2 = 'id='+calendar.id+'&mode=edit';
                        $.ajax({
                            type: "POST",
                            url: opt.ajaxRetrieveDescription,
                            data: dataString2,
                            cache: false,
                            beforeSend: function() { $('.loadingDiv').show(); $('.modal-footer').hide() },
                            error: function() { $('.loadingDiv').hide(); $.notify(opt.ajaxError, 'error'); },
                            success: function(data2)
                            {
                                var optionsTipoDocumento = '',
                                    optionsTipoConsulta = '';
                                $.each(tiposDocumento, function(i, obj) {
                                    if (obj.short == data2.tipoDocumento) {
                                        optionsTipoDocumento += '<option value="'+ obj.short +'" selected>'+ obj.long +'</option>';
                                    } else {
                                        optionsTipoDocumento += '<option value="'+ obj.short +'">'+ obj.long +'</option>';
                                    }
                                });
                                $.each(tiposConsulta, function(i, obj) {
                                    if (obj.short == data2.tipoConsulta) {
                                        optionsTipoConsulta += '<option value="'+ obj.short +'" selected>'+ obj.long +'</option>';
                                    } else {
                                        optionsTipoConsulta += '<option value="'+ obj.short +'">'+ obj.long +'</option>';
                                    }
                                });
                                $('.loadingDiv').hide();
                                $('.modal-footer').show()
                                if (!calendar.id) {
                                    $(".modal-header").html(
                                        '<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>'+
                                        '<h2>Crear Cita</h2>'
                                    );
                                }
                                $(".modal-body").html(
                                    '<form id="event_description_e">'+
                                    '   <div class="form_event_dates">'+
                                    '       <div class="display-block">'+
                                    '           <label class="required">Fecha:</label><br>'+
                                    '           <input required="required" type="text" id="date_datepicker" name="start_date" value="'+startDate+'">' +
                                    '       </div>' +
                                    '       <div class="display-block">'+
                                    '           <label class="required">'+opt.startTimeText+'</label><br>'+
                                    '           <input required="required" type="text" name="start_time" id="time_update_picker" placeholder="HH:MM:SS" value="'+startTime+'">' +
                                    '       </div>' +
                                    '       <div class="display-block">'+
                                    '           <label class="required">'+opt.endTimeText+'</label><br>'+
                                    '           <input required="required" type="text" name="end_time" id="time_update_picker_second" placeholder="HH:MM:SS" value="'+endTime+'">' +
                                    '       </div>' +
                                    '   </div><!-- /.form_event_dates -->' +
                                    '   <div class="form_event_info">'+
                                    '       <div class="">' +
                                    '           <div class="display-inline-block">'+
                                    '               <label>Tipo Documento:</label><br>'+
                                    '               <select id="TipoDocumento" class="" name="TipoDocumento">'+
                                                        optionsTipoDocumento+
                                    '               </select>'+
                                    '           </div>'+
                                    '           <div class="display-inline-block">'+
                                    '               <label class="required">Número Documento:</label><br>'+
                                    '               <input required="required" type="text" id="id_paciente" name="IdPaciente" value="'+data2.idPaciente+'">'+
                                    '           </div>'+
                                    '       </div>'+
                                    '       <div class="">' +
                                    '           <div class="display-inline-block">'+
                                    '               <label class="required">Nombre(s):</label><br>'+
                                    '               <input required="required" type="text" id="reservation_name" class="" name="reservation_name" value="'+data2.name+'">'+
                                    '           </div>'+
                                    '           <div class="display-inline-block">'+
                                    '               <label class="required">Apellido(s):</label><br>'+
                                    '               <input required="required" type="text" id="reservation_surname" class="" name="reservation_surname" value="'+data2.surname+'">'+
                                    '           </div>'+
                                    '       </div>'+
                                    '       <div class="">' +
                                    '           <div class="display-inline-block">'+
                                    '               <label>Email:</label><br>'+
                                    '               <input type="text" id="reservation_email" class="" name="reservation_email" value="'+data2.email+'">'+
                                    '           </div>'+
                                    '           <div class="display-inline-block">'+
                                    '               <label>Teléfono:</label><br>'+
                                    '               <input type="text" id="reservation_phone" class="" name="reservation_phone" value="'+data2.phone+'">'+
                                    '           </div>'+
                                    '       </div>'+
                                    '       <div class="">' +
                                    '           <div class="display-inline-block">'+
                                    '               <label>Tipo Consulta:</label><br>'+
                                    '               <select id="TipoConsulta" class="" name="TipoConsulta">'+
                                                        optionsTipoConsulta+
                                    '               </select>'+
                                    '           </div>'+
                                    '           <div class="display-inline-block">'+
                                    '           <div class="display-inline-block">'+
                                    '           </div>'+
                                    '       </div>'+
                                    '       <div class="">' +
                                    '               <label>Observaciones:</label>' +
                                    '               <textarea style="width: 100%;" rows="2" name="reservation_message">'+data2.description+'</textarea>' +
                                    '       </div>'+
                                    '   </div><!-- /.form_event_info -->'+
                                    '   <input type="hidden" name="id" value="'+calendar.id+'">'+
                                    '</form>'
                                );
                                // Pickers
                                //$('input#color_update_picker').colorpicker(opt.colorpickerArgs);
                                $('input#date_datepicker').datepicker({
                                   dateFormat: 'yy-mm-dd',
                                   minDate: new Date(),
                                   onSelect: function(dateText, obj) { $('input#date_datepicker').val(dateText); }
                                });
                                $('input#date_datepicker_second').datepicker({
                                   dateFormat: 'yy-mm-dd',
                                   minDate: new Date(),
                                   onSelect: function(dateText, obj) { $('input#date_datepicker_second').val(dateText); }
                                });
                                $(document).on('click','a.ui-datepicker-next',function() {
                                    $('input#date_datepicker').datepicker('setDate', 'c+1w');
                                    $('input#date_datepicker_second').datepicker('setDate', 'c+1w');
                                });
                                $(document).on('click','a.ui-datepicker-prev', function(){
                                    $('input#date_datepicker').datepicker('setDate', 'c-1w');
                                    $('input#date_datepicker_second').datepicker('setDate', 'c-1w');
                                });
                                $('input#time_update_picker').timepicker({
                                    stepMinute: 5,
                                    hourMin: parseInt(opt.minTime.split(':')[0]),
                                    hourMax: parseInt(opt.maxTime.split(':')[0]),
                                    onSelect: function(datetimeText, datepickerInstance) {
                                        $('input#time_update_picker').val(datetimeText);
                                    }
                                });
                                $('input#time_update_picker_second').timepicker({
                                    stepMinute: 5,
                                    hourMin: parseInt(opt.minTime.split(':')[0]),
                                    hourMax: parseInt(opt.maxTime.split(':')[0]),
                                    onSelect: function(datetimeText, datepickerInstance) {
                                        $('input#time_update_picker_second').val(datetimeText);
                                    }
                                });
                                $('input#id_paciente').autocomplete({
                                    source: opt.ajaxAutocompletePaciente,
                                    select: function(event, ui) {
                                        $.ajax({
                                            url: opt.ajaxDatosPaciente,
                                            dataType: "json",
                                            data: { "id_paciente": ui.item.value },
                                            success: function(data) {
                                                var current_form = $($('form#event_description_e')[1]);
                                                var options = $(current_form).find('#TipoDocumento option');
                                                var phones = [
                                                    data.telefono, data.celular1,
                                                    data.celular2
                                                ];
                                                var i = phones.indexOf("");
                                                if(i != -1) {
                                                	phones.splice(i, 1);
                                                	var j = phones.indexOf("");
                                                	if(j != -1) {
                                                		phones.splice(i, 1);
                                                	}
                                                }
                                                $(options).each(function(i, item) {
                                                    if ($(item).val() == data.TipoDocumento) {
                                                        $(this).attr('selected', 'selected');
                                                    }
                                                })
                                                $(current_form).find('#reservation_name').val(data.nombres);
                                                $(current_form).find('#reservation_surname')
                                                               .val(data.apellido1);
                                                $(current_form).find('#reservation_email').val(data.email);
                                                $(current_form).find('#reservation_phone').val(phones.join(', '));
                                            }
                                        });
                                    }
                                });
                            }
                        });
                        $(opt.modalEditSelector).modal('show');
                         // On Modal Hidden
                        $(opt.modalEditSelector).on('hidden', function() {
                            $('.modal-body').html(''); // clear data
                           // $(opt.calendarSelector).fullCalendar('refetchEvents'); (by uncommenting this fixes multiply loads bug)
                        })
                        // Close Button - This is due cache to prevent data being saved on another view
                        $(".modal-footer")
                            .undelegate('[data-dismiss="modal"]', 'click')
                            .delegate('[data-dismiss="modal"]', 'click', function(e)
                            {
                                $('.modal-body').html(''); // clear data
                                // $(opt.calendarSelector).fullCalendar('refetchEvents'); (by uncommenting this fixes multiply loads bug)
                                e.preventDefault();
                            });
                        // After all step above save
                        // Update button
                        $(".modal-footer")
                            .off('click')
                            .undelegate('[data-option="save"]', 'click')
                            .delegate('[data-option="save"]', 'click', function(e)
                            {
                                var required_fields = $($('form#event_description_e')[1]).find('input[required="required"]');
                                var invalid_elements = [];
                                $(required_fields).filter(function(index, obj) {
                                    if (obj.value === '') {
                                        invalid_elements.push(obj);
                                    }
                                });
                                if (invalid_elements.length > 0) {
                                    $.notify('Los campos marcados con asterisco (*) son obligatorios', 'warn');
                                    return false;
                                }
                                // Check current event before sending it to the server.
                                var start_date = $($('form#event_description_e')[1]).find('input#date_datepicker').val();
                                var start_time = $($('form#event_description_e')[1]).find('input#time_update_picker').val();
                                var end_time = $($('form#event_description_e')[1]).find('input#time_update_picker_second').val();
                                var event = {
                                    id: calendar.id,
                                    start: $.fullCalendar.moment(start_date+' '+start_time+':00'),
                                    end: $.fullCalendar.moment(start_date+' '+end_time+':00'),
                                    allDay: false
                                };
                                // Checks calendar is not being created in a blocked date.
                                if (!calendar.checkBlocked(event)) {
                                    return false;
                                }
                                // makes sure end is greater than start.
                                if (event.start.format('X') >= event.end.format('X')) {
                                    // Really, are you kiding me?
                                    $.notify('Hora fin debe ser superior a hora inicio', 'warn');
                                    return false;
                                }
                                if (calendar.checkOverlap(event)) {
                                    // Avoid sending ajax request with overlaping event.
                                    $.notify(opt.failureAddEventMessage, 'error');
                                    return false;
                                }
                                $.post(opt.ajaxEventSave, $($('form#event_description_e')[1]).serialize(), function(response)
                                {
                                    if(response.hasOwnProperty('success') && response.success)
                                    {
                                        $.notify(opt.successAddEventMessage, 'success');
                                        document.location.reload();
                                    } else {
                                        if (response.hasOwnProperty('message')) {
                                            $.notify(response.message, 'error');
                                        } else {
                                            $.notify(opt.failureAddEventMessage, 'error');
                                        }
                                        //document.location.reload();
                                    }
                                });
                                e.preventDefault();
                            });
                        e.preventDefault();
                    });
            } // openModal

            // Function to quickModal
            calendar.quickModal = function(start, end, allDay)
            {
                $(".modal-header").html(
                    '<form id="event_title">' +
                        '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
                        '<label>'+opt.titleText+' </label>' +
                        '<input type="text" class="form-control" name="title" value="">' +
                    '</form>'
                );
                $(".modal-body").html(
                    '<form id="event_description">' +
                        '<label>'+opt.descriptionText+' </label>' +
                        '<textarea class="form-control" name="description"></textarea>' + opt.quickSaveCategory +
                    '</form>'
                );
                $(opt.modalQuickSaveSelector).modal('show');
                calendar.start = start;
                calendar.end = end;
                calendar.allDay = allDay;
                // Save button
                $(".modal-footer")
                    .off('click')
                    .undelegate('[data-option="quickSave"]', 'click')
                    .delegate('[data-option="quickSave"]', 'click', function(e)
                    {
                        var event_title = $("form#event_title").serializeArray();
                        var event_description = $("form#event_description").serializeArray();
                        if(opt.quickSaveCategory !== '') { calendar.category = event_description[5].value; } else { calendar.category = ''; }
                        calendar.quickSave(event_title[2], event_description[2], calendar.start, calendar.end, calendar.allDay);
                        e.preventDefault();
                    });
                // e.preventDefault(); prevented duplication
            } // end quickModal

            // Function quickSave
            calendar.quickSave = function(event_title, event_description, start, end, allDay)
            {
                var start_factor = moment(start).format('YYYY-MM-DD');
                var startTime_factor = moment(start).format('HH:mm');
                var end_factor = moment(end).format('YYYY-MM-DD');
                var endTime_factor = moment(end).format('HH:mm');
                var start_formatted = moment(start).format('YYYY-MM-DD HH:mm:ss');
                var end_formatted = moment(end).format('YYYY-MM-DD HH:mm:ss');
                if(opt.quickSaveCategory !== '')
                {
                    var constructor = 'title='+event_title.value+'&description='+event_description.value+'&start_date='+start_factor+'&start_time='+startTime_factor+'&end_date='+end_factor+'&end_time='+endTime_factor+'&url=false&color='+opt.defaultColor+'&allDay='+allDay+'&categorie='+calendar.category+'&start='+start_formatted+'&end='+end_formatted;
                } else {
                    var constructor = 'title='+event_title.value+'&description='+event_description.value+'&start_date='+start_factor+'&start_time='+startTime_factor+'&end_date='+end_factor+'&end_time='+endTime_factor+'&url=false&color='+opt.defaultColor+'&allDay='+allDay+'&start='+start_formatted+'&end='+end_formatted;
                }
                $.post(opt.ajaxEventQuickSave, constructor, function(response)
                {
                    if(response.hasOwnProperty('success') && response.success)
                    {
                        $(opt.modalQuickSaveSelector).modal('hide');
                        $(opt.calendarSelector).fullCalendar('refetchEvents');
                    } else {
                        $.notify(opt.failureAddEventMessage +': '+ response.message, 'error');
                    }
                });
                // e.preventDefault(); prevented duplication
            } // end quickSave

            // Function to Save Data to the Database
            calendar.save = function()
            {
                $(opt.formAddEventSelector).on('submit', function(e)
                {
                    $.post(opt.ajaxEventSave, $(this).serialize(), function(response)
                    {
                        if(response == 1)
                        {
                            $.notify(opt.successAddEventMessage, 'success');
                            document.location.reload();
                        } else {
                            $.notify(opt.failureAddEventMessage, 'error');
                            //document.location.reload();
                        }
                    });
                    e.preventDefault();
                });
            };

            // Function to Remove Event ID from the Database
            calendar.remove = function(id)
            {
                var construct = "id="+id;

                // First check if the event is a repetitive event
                $.ajax({
                    type: "POST",
                    url: opt.ajaxRepeatCheck,
                    data: construct,
                    cache: false,
                    success: function(response) {
                        if(response == 'REP_FOUND')
                        {
                            // prompt user
                            $(opt.modalViewSelector).modal('hide');
                            if(opt.version == 'modal')
                            {
                                $(opt.modalPromptSelector+" .modal-header").html('<h4>'+opt.eventText+calendar.title+'</h4>');
                                $(opt.modalPromptSelector+" .modal-body").html(opt.repetitiveEventActionText);
                            } else {
                                $(opt.modalPromptSelector+" .modal-header").html('<h4>'+opt.eventText+'</h4>');
                                $(opt.modalPromptSelector+" .modal-body").html(opt.repetitiveEventActionText);
                            }
                            $(opt.modalPromptSelector).modal('show');
                            // Action - remove this
                            $(".modal-footer")
                                .undelegate('[data-option="remove-this"]', 'click')
                                .delegate('[data-option="remove-this"]', 'click', function(e)
                                {
                                    calendar.remove_this(construct);
                                    $(opt.modalPromptSelector).modal('hide');
                                    e.preventDefault();
                                });
                            // Action - remove repetitive
                            $(".modal-footer")
                                .undelegate('[data-option="remove-repetitives"]', 'click')
                                .delegate('[data-option="remove-repetitives"]', 'click', function(e)
                                {
                                    if(opt.version == 'modal')
                                    {
                                        var construct = "id="+id+'&rep_id='+calendar.rep_id+'&method=repetitive_event';
                                    } else {
                                        var construct = "id="+id+'&rep_id='+$("input#rep_id").val()+'&method=repetitive_event';
                                    }
                                    calendar.remove_this(construct);
                                    $(opt.modalPromptSelector).modal('hide');
                                    e.preventDefault();
                                });
                        } else {
                            calendar.remove_this(construct);
                        }
                    },
                    error: function(response) {
                        $.notify(opt.generalFailureMessage, 'error');
                    }
                });
            };

            // Functo to Remove Event from the database
            calendar.remove_this = function(construct)
            {
                // just remove this
                $.post(opt.ajaxEventDelete, construct, function(response)
                {
                    if(response == '')
                    {
                        if(opt.version == 'modal')
                        {
                            $(opt.modalViewSelector).modal('hide');
                            $(opt.calendarSelector).fullCalendar('refetchEvents');
                        } else {
                            document.location.reload();
                        }
                    } else {
                        $.notify(opt.failureDeleteEventMessage, 'error');
                    }
                });
            }

            // Function to Update Event to the Database
            calendar.update = function(id, title, description, url)
            {
                var construct = "id="+id;
                if(opt.version == 'php')
                {
                    var title = $('input#title_update').val();
                    var description = {
                        '6' : $('textarea#description_update').val(),
                        '7' : opt.defaultColor,
                        '8' : $('input#datepicker').val(),
                        '9' : $('input#tp1').val(),
                        '10': $('input#datepicker2').val(),
                        '11': $('input#tp2').val()
                    };
                    calendar.url = 'undefined';
                }
                // First check if the event is a repetitive event
                $.ajax({
                    type: "POST",
                    url: opt.ajaxRepeatCheck,
                    data: construct,
                    cache: false,
                    success: function(response) {
                        if(response == 'REP_FOUND')
                        {
                            // prompt user
                            $(opt.modalEditSelector).modal('hide');
                            if(opt.version == 'modal')
                            {
                                $(opt.modalEditPromptSelector+" .modal-header").html('<h4>'+opt.eventText+calendar.title+'</h4>');
                                $(opt.modalEditPromptSelector+" .modal-body-custom").css('padding', '15px').html(opt.repetitiveEventActionText);
                            } else {
                                $(opt.modalEditPromptSelector+" .modal-header").html('<h4>'+opt.eventText+'</h4>');
                                $(opt.modalEditPromptSelector+" .modal-body-custom").css('padding', '15px').html(opt.repetitiveEventActionText);
                            }
                            $(opt.modalEditPromptSelector).modal('show');
                            // Action - save this
                            $(".modal-footer")
                                .undelegate('[data-option="save-this"]', 'click')
                                .delegate('[data-option="save-this"]', 'click', function(e)
                                {
                                    calendar.update_this(id, title, description, url);
                                    $(opt.modalEditPromptSelector).modal('hide');
                                    $(opt.modalEditSelector).modal('hide');
                                    e.preventDefault();
                                 });
                            // Action - save repetitives
                            $(".modal-footer")
                                .undelegate('[data-option="save-repetitives"]', 'click')
                                .delegate('[data-option="save-repetitives"]', 'click', function(e)
                                {
                                    if(opt.version == 'modal')
                                    {
                                        var construct_two = '&rep_id='+calendar.rep_id+'&method=repetitive_event';
                                    } else {
                                        var construct_two = '&rep_id='+$("input#rep_id").val()+'&method=repetitive_event';
                                    }
                                    calendar.update_this(id, title, description, url, construct_two);
                                    $(opt.modalEditPromptSelector).modal('hide');
                                    $(opt.modalEditSelector).modal('hide');
                                    e.preventDefault();
                                 });
                        } else {
                            calendar.update_this(id, title, description, url);
                        }
                    },
                    error: function(response) {
                        $.notify(opt.generalFailureMessage, 'error');
                    }
                });
            }

            // Function to update single and repetitive events
            calendar.update_this = function(id, title, description, url, construct_two)
            {
                if(opt.version == 'modal')
                {
                    // modalView Mode
                    if(calendar.url === 'undefined' || calendar.url === undefined) {
                        var construct = "id="+id+"&title="+title.value+"&description="+description[6].value+"&color="+description[7].value+"&start_date="+description[8].value+"&start_time="+description[9].value+"&end_date="+description[10].value+"&end_time="+description[11].value;
                        var start = description[8].value + 'T' + description[9].value;
                        var end = description[10].value + 'T' + description[11].value;
                        construct += '&start=' + start + '&end=' + end;
                    } else {
                        var construct = "id="+id+"&title="+title.value+"&description="+description[7].value+"&color="+description[8].value+"&start_date="+description[9].value+"&start_time="+description[10].value+"&end_date="+description[11].value+"&end_time="+description[12].value+"&url="+description[13].value;
                        var start = description[9].value + 'T' + description[10].value;
                        var end = description[11].value + 'T' + description[12].value;
                        construct += '&start=' + start + '&end=' + end;
                    }
                } else {
                    // PHP Mode
                    var construct = "id="+id+"&title="+title+"&description="+description[6]+"&color="+description[7]+"&start_date="+description[8]+"&start_time="+description[9]+"&end_date="+description[10]+"&end_time="+description[11];
                    var start = description[8] + 'T' + description[9];
                    var end = description[10] + 'T' + description[11];
                    construct += '&start=' + start + '&end=' + end;
                }
                if(construct_two === undefined)
                {
                    var main_construct = construct;
                } else {
                    var main_construct = construct+construct_two;
                }
                $.ajax({
                    type: "POST",
                    url: opt.ajaxEventEdit,
                    data: main_construct,
                    cache: false,
                    success: function(response) {
                        if(response.hasOwnProperty('success') && response.success)
                        {
                            if(opt.version == 'modal')
                            {
                                $(opt.modalEditSelector).modal('hide');
                                $(opt.calendarSelector).fullCalendar('refetchEvents');
                            } else {
                                //document.location.reload();
                            }
                        } else {
                            //$.notify(opt.failureUpdateEventMessage, 'error');
                            $.notify(opt.failureUpdateEventMessage +': '+ response.message, 'error');
                        }
                    },
                    error: function(response) {
                        $.notify(opt.failureUpdateEventMessage, 'error');
                    }
                });
            }

            // Function to Export Calendar
            calendar.exportIcal = function(expID, expTitle, expDescription, expStart, expEnd, expUrl)
            {
                var start_factor = moment($.fullCalendar.moment(expStart)).format('YYYY-MM-DD HH:mm:ss');
                var end_factor = moment($.fullCalendar.moment(expEnd)).format('YYYY-MM-DD HH:mm:ss');
                var construct = 'method=export&id='+expID+'&title='+expTitle+'&description='+expDescription+'&start_date='+start_factor+'&end_date='+end_factor+'&url='+expUrl;
                $.post(opt.ajaxEventExport, construct, function(response)
                {
                    $(opt.modalViewSelector).modal('hide');
                    window.location = 'includes/Event-'+expID+'.ics';
                    var construct2 = 'id='+expID;
                    $.post(opt.ajaxEventExport, construct2, function() {});
                });
            }

            // Commons - modal + phpversion
            // Fiter
            if(opt.filter == true)
            {
                $(opt.formFilterSelector).on('change', function(e)
                {
                    selected_value = $(this).val();
                    construct = 'filter='+selected_value;
                    $.post('includes/loader.php', construct, function(response)
                    {
                        $(opt.modalViewSelector).modal('hide');
                        $(opt.modalEditSelector).modal('hide');
                        $(opt.calendarSelector).fullCalendar('refetchEvents');
                    });
                    e.preventDefault();
                });

                // Search Form
                // keypress
                $(opt.formSearchSelector).keypress(function(e)
                {
                    if(e.which == 13)
                    {
                        search_me();
                        e.preventDefault();
                    }
                });

                // submit button
                $(opt.formSearchSelector+' button').on('click', function(e)
                {
                    search_me();
                });

                function search_me()
                {
                    value = $(opt.formSearchSelector+' input').val();
                    construct = 'search='+value;
                    $.post('includes/loader.php', construct, function(response)
                    {
                        $(opt.modalViewSelector).modal('hide');
                        $(opt.modalEditSelector).modal('hide');
                        $(opt.calendarSelector).fullCalendar('refetchEvents');
                    });
                }
            }

        } // FullCalendar Ext
    }); // fn
})(jQuery);

// define object at end of plugin to fix ie bug
var calendar = {};
