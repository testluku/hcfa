<!DOCTYPE html>
<html class="no-js">
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> {{ CNF_APPNAME }} </title>
<meta name="keywords" content="">
<meta name="description" content=""/>
<link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">	
<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">	
<link href="{{ asset('css/todo.css') }}" rel="stylesheet">
<link href="{{ asset('css/jquery.ui.min.css') }}" rel="stylesheet">

</head>
<body class="well">

    <div>	
        <div id="container">

            
            <div class="task-list task-container" id="pending">
                <h3>Pendiente</h3>
                
            </div>

            <div class="task-list task-container" id="inProgress">
                <h3>En Progreso</h3>
            </div>

            <div class="task-list task-container" id="completed">
                <h3>Completa</h3>
            </div>

            <div class="task-list">
                <h3>Agregar Tarea</h3>
                <form id="todo-form">
                    <input type="text" placeholder="Titulo" />
                    <textarea  placeholder="Descripción"></textarea>
                    <!--  input type="text" id="datepicker"/-->
                    <input  id="datepicker" style="width:95% !important;"  type="text"  placeholder="Fecha (dd/mm/yyyy)"  value=""></br>
                    &nbsp;&nbsp;Asignado a:
                    <select>
                    	<?php 
                    	foreach ($usuarios as $usr) :
                    		if($usr->id==\Session::get('uid')){
                    			$sel="selected";
                    		}else{
                    			$sel="";
                    		}
                    		echo '<option value="'.$usr->id.'" '.$sel.' >'.$usr->first_name.' '.$usr->last_name.'</option>';
						endforeach; ?>
                    </select>
                    <input type="button" class="btn btn-primary" value="Agregar" onclick="todo.add();" />
                </form>

                <!-- input type="button" class="btn btn-primary" value="Limpiar" onclick="todo.clear();" /-->

                <div id="delete-div">
                    Arraste aquí para eliminar
                </div>
            </div>
			
            <div style="clear:both;"></div>
            
            <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/jquery.ui.min.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/jquery.ui.touch-punch.min.js') }}"></script>
			
			<script type="text/javascript">  
				var todo = todo || {},
				    data = $.ajax({
						url: "{{ URL::to('tasks/tareas') }}",
					    dataType: 'json',
					    type: 'GET',	
					    delay: 250,
					    data: function (params) {
					        return {
					            q: params.term // search term
					        };
					    },
					    async: false,
					    cache: true
					}).responseJSON;
					
					
					
				
				data = data || {};
				
				(function(todo, data, $) {
				
				    var defaults = {
				            todoTask: "todo-task",
				            todoHeader: "task-header",
				            todoDate: "task-date",
				            todoDescription: "task-description",
				            taskId: "task-",
				            formId: "todo-form",
				            dataAttribute: "data",
				            deleteDiv: "delete-div"
				        }, codes = {
				            "1" : "#pending",
				            "2" : "#inProgress",
				            "3" : "#completed"
				        };
				
				    todo.init = function (options) {
				
				        options = options || {};
				        options = $.extend({}, defaults, options);
				
				        $.each(data, function (index, params) {
				            generateElement(params);
				        });
				
				        /*generateElement({
				            id: "123",
				            code: "1",
				            title: "asd",
				            date: "22/12/2013",
				            description: "Blah Blah"
				        });*/
				
				        /*removeElement({
				            id: "123",
				            code: "1",
				            title: "asd",
				            date: "22/12/2013",
				            description: "Blah Blah"
				        });*/
				
				        // Adding drop function to each category of task
				        $.each(codes, function (index, value) {
				            $(value).droppable({
				                drop: function (event, ui) {
				                        var element = ui.helper,
				                            css_id = element.attr("id"),
				                            id = css_id.replace(options.taskId, ""),
				                            object = data[id];
				
				                            // Removing old element
				                            removeElement(object);
				
				                            // Changing object code
				                            object.code = index;
				                            
				                            
				                            id = $.ajax({
				                        		url: "{{ URL::to('tasks/idupdatetask') }}",
				                        	    dataType: 'json',
				                        	    type: 'GET',
				                        	    delay: 250,
				                        	    data: {
				                        	    	id: id,
				                        	        code: index  
				                        	    },
				                        	    async: false,
				                        	    cache: true
				                        	}).responseJSON;
				                            
				                            // Generating new element
				                            generateElement(object);
				
				                            // Updating Local Storage
				                            data[id] = object;
				                            //localStorage.setItem("todoData", JSON.stringify(data));
				
				                            // Hiding Delete Area
				                            $("#" + defaults.deleteDiv).hide();
				                    }
				            });
				        });
				
				        // Adding drop function to delete div
				        $("#" + options.deleteDiv).droppable({
				            drop: function(event, ui) {
				                var element = ui.helper,
				                    css_id = element.attr("id"),
				                    id = css_id.replace(options.taskId, ""),
				                    object = data[id];
				                
				
				                // Removing old element
				                removeElement(object);
				                
				                id = $.ajax({
				            		url: "{{ URL::to('tasks/iddeletetask') }}",
				            	    dataType: 'json',
				            	    type: 'GET',
				            	    delay: 250,
				            	    data: {
				            	    	id: id
				            	    },
				            	    async: false,
				            	    cache: true
				            	}).responseJSON;
				                
				                // Updating local storage
				                delete data[id];
				                //localStorage.setItem("todoData", JSON.stringify(data));
				
				                // Hiding Delete Area
				                $("#" + defaults.deleteDiv).hide();
				            }
				        })
				
				    };
				
				    // Add Task
				    var generateElement = function(params){
				        var parent = $(codes[params.code]),
				            wrapper;
				
				        if (!parent) {
				            return;
				        }
				
				        wrapper = $("<div />", {
				            "class" : defaults.todoTask,
				            "id" : defaults.taskId + params.id,
				            "data" : params.id
				        }).appendTo(parent);
				
				        $("<div />", {
				            "class" : defaults.todoHeader,
				            "text": params.title
				        }).appendTo(wrapper);
				
				        $("<div />", {
				            "class" : defaults.todoDate,
				            "text": params.date
				        }).appendTo(wrapper);
				
				        $("<div />", {
				            "class" : defaults.todoDescription,
				            "text": params.description
				        }).appendTo(wrapper);
				
					    wrapper.draggable({
				            start: function() {
				                $("#" + defaults.deleteDiv).show();
				            },
				            stop: function() {
				                $("#" + defaults.deleteDiv).hide();
				            },
					        revert: "invalid",
					        revertDuration : 200
				        });
				
				    };
				
				    // Remove task
				    var removeElement = function (params) {
				        $("#" + defaults.taskId + params.id).remove();
				    };
				
				    todo.add = function() {
				        var inputs = $("#" + defaults.formId + " :input"),
				            errorMessage = "Titulo debe tener contenido",
				            id, title, description, date, tempData;
				
				        if (inputs.length !== 5) {
				            return;
				        }
				
				        title = inputs[0].value;
				        description = inputs[1].value;
				        date = inputs[2].value;
				        userid = inputs[3].value;
				
				        if (!title) {
				            generateDialog(errorMessage);
				            return;
				        }
				
				        //id = new Date().getTime();
				        
				        id = $.ajax({
				    		url: "{{ URL::to('tasks/idsavetask') }}",
				    	    dataType: 'json',
				    	    type: 'GET',
				    	    delay: 250,
				    	    data: {
				    	        	code: "1",
				    	            title: title,
				    	            date: date,
				    	            description: description,
				    	            userid: userid
				    	    },
				    	    async: false,
				    	    cache: true
				    	}).responseJSON;
				
				        tempData = {
				            id : id,
				            code: "1",
				            title: title,
				            date: date,
				            description: description,
				            userid: userid
				        };
				        
				        
				
				        // Saving element in local storage
				        data[id] = tempData;
				        //localStorage.setItem("todoData", JSON.stringify(data));
				        
				        // Generate Todo Element
				        generateElement(tempData);
				
				        // Reset Form
				        inputs[0].value = "";
				        inputs[1].value = "";
				        inputs[2].value = "";
				    };
				
				    var generateDialog = function (message) {
				        var responseId = "response-dialog",
				            title = "Mensaje",
				            responseDialog = $("#" + responseId),
				            buttonOptions;
				
				        if (!responseDialog.length) {
				            responseDialog = $("<div />", {
				                    title: title,
				                    id: responseId
				            }).appendTo($("body"));
				        }
				
				        responseDialog.html(message);
				
				        buttonOptions = {
				            "Ok" : function () {
				                responseDialog.dialog("close");
				            }
				        };
				
					    responseDialog.dialog({
				            autoOpen: true,
				            width: 400,
				            modal: true,
				            closeOnEscape: true,
				            buttons: buttonOptions
				        });
				    };
				
				    todo.clear = function () {
				        data = {};
				        localStorage.setItem("todoData", JSON.stringify(data));
				        $("." + defaults.todoTask).remove();
				    };
				
				})(todo, data, jQuery);
			</script>
			<script type="text/javascript">
                $( "#datepicker" ).datepicker();
                $( "#datepicker" ).datepicker("option", "dateFormat", "yy-mm-dd");

                $(".task-container").droppable();
                $(".todo-task").draggable({ revert: "valid", revertDuration:200 });
                todo.init();
            </script>
            <script>
				 $.datepicker.regional['es'] = {
				 closeText: 'Cerrar',
				 prevText: '<Ant',
				 nextText: 'Sig>',
				 currentText: 'Hoy',
				 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
				 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
				 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
				 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
				 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
				 weekHeader: 'Sm',
				 dateFormat: 'dd/mm/yy',
				 firstDay: 1,
				 isRTL: false,
				 showMonthAfterYear: false,
				 yearSuffix: ''
				 };
				 $.datepicker.setDefaults($.datepicker.regional['es']);
				$(function () {
				$("#fecha").datepicker();
				});
			</script>

        </div>

    </div>


</body> 
</html>
	
