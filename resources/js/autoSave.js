$(function () {
    alert("autoSave");
    
    var _list = $('.auto-save');
    var _length = _list.length;

    function init() {
        var _file = fileSend();

        for (var i = 0; i < _length; i++) {
            if ($(_list[i]).hasClass('cleditor')) {
                initEditor($(_list[i]), _file);
            }
            $(_list[i]).bind({
                change: function () {
                    var _data = $(this).data();
                    var _val = parseSend($(this).val(), _data);
                    if (_val) {
                        var _info = validateSend(_data, _val, $(this));
                        ajaxSave(_file, _info, dataSave);
                        $(this).data('after', _val);
                    }
                }
            });
            var attr = $(_list[i]).attr('data-value');
            
            if (typeof attr !== typeof undefined && attr !== false) {
                $(_list[i]).val(attr);
                $(_list[i]).removeAttr('data-value');
            }
            var attr = $(_list[i]).attr('data-checked');
            
            if (typeof attr !== typeof undefined && attr !== false) {
                if (attr === $(_list[i]).val()) {
                    $(_list[i]).prop('checked', true);
                    $(_list[i]).removeAttr('data-checked');
                }
            }
        }
    }

    function ajaxSave(_url, _data, _callback) {
        if (isBool(_list)) {
            destroy();
        }
        
        $.ajax({
            type: 'POST',
            contentType: "application/x-www-form-urlencoded",
            async: true,
            cache: false,
            url: _url,
            data: _data,
            success: _callback,
            error: ajaxError
        });
    }

    function dataSave(_data) {
        console.log(_data);
    }

    function ajaxError(_data) {
        alert(_data);
    }

    function isBool(parameter) {
        try {
            if ($.isNumeric(parameter))
                return true;
            if (parameter == null && parameter == undefined || parameter == "" || parameter == false || parameter < 0 || parameter === 0)
                return false;
            switch (typeof (parameter)) {
                case "object":
                    return $.isEmptyObject(parameter) ? false : true;
                    break;
                case "string":
                    parameter = $.trim(parameter);
                    if (parameter.length < 1 || parameter == "")
                        return false;
                    break;
            }
            return true;
        } catch (e) {
            Error(e.name, e.message, "IB-0365654")
            return false;
        }
    }

    function destroy() {
        delete _list;
        delete _length;
    }

    function msg(_msg, _type) {
        var _color = (_type == "error") ? 'red' : 'green';
        $('body').append(
                $('div').attr({
            id: 'mensaje'
        }).css({
            'z-index': '999999',
            'width': '300px',
            'height': '100px',
            'padding': '15px',
            'background': 'whitesmoke',
            'color': _color
        }).text(_msg)
                );
    }

    function initEditor(_textarea, file) {

        _textarea.cleditor({width: '100%'}).change(function () {
            var _cleditor = $(this);
            var _text = $(_cleditor[0].doc).find('body').html().toString();
            var _val = _text.replace(/blue/gi, "red");
            _val.replace(/'/gi, "\'");
            _val.replace(/"/gi, '\"');
            var _data = _textarea.data();
            if (isBool(_val)) {
                var _info = "tbl=" + _data.tb +
                        "&col=" + _data.col +
                        "&info=" + _val +
                        "&idTable=" + _data.idTb +
                        "&idAutoSave=" + _data.idPass;
                ajaxSave(file, _info, dataSave);
            }
        });
    }

    function fileSend() {
        if ($('.auto-save:first').data('tb') == 'HistoriaClinicaPreliminar') {
            alert("La tabla es HistoriaClinicaPreliminar");
            return 'autosaveHCPreliminar.php';
        }
        else if ($('.auto-save:first').data('tb') == 'HistoriaClinica') {
            return 'autosaveHC.php';
        }
    }

    function parseSend(_value, _data) {
        var _val = _value.replace(/blue/gi, "red");
        _val.replace(/'/gi, "\'");
        _val.replace(/"/gi, '\"');
        
        if (isBool(_val)) {
            if (_data.after != _val) {
                return _val;
            }
            return false;
        } else {
            return false;
        }
    }

    function validateSend(_data, _val, _element) {
        var _fecha = $('#dp-cmy').val();
        
        if (!isBool(_fecha)) {
            var _anio = parseInt(new Date().getFullYear());
            var _mes = parseInt(new Date().getMonth()) + 1;
            var _dia = parseInt(new Date().getDate());
            var _fecha = '' + _anio + '-';
            _fecha += (_mes < 10) ? "0" + _mes + "-" : _mes + "-";
            _fecha += (_dia < 10) ? "0" + _dia : _dia;
        }
        var _type = '';
        
        if ($(_element).hasClass('int-val')) {
            _type = "&type=int";
        }
        var _info = "tbl=" + _data.tb +
                "&col=" + _data.col +
                "&info=" + _val +
                "&fecha=" + _fecha +
                _type +
                "&idTable=" + _data.idTb +
                "&idAutoSave=" + _data.idPass;
        return _info;
    }
    init();
});
