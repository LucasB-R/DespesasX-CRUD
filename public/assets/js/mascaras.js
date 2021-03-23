$('#valor').keyup(function(){
        var elemento = document.getElementById('valor');
        var valor = elemento.value;

        valor = valor + '';
        valor = parseInt(valor.replace(/[\D]+/g, ''));
        valor = valor + '';
        valor = valor.replace(/([0-9]{2})$/g, ",$1");

        if (valor.length > 6) {
            valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
        }

        elemento.value = valor;
        if(valor == 'NaN') elemento.value = '';
    });


         $(document).ready(function () {
        $('.mascaraData').mask('99/99/9999');
        return false;
    });

    jQuery("input#tel")
        .mask("(99) 9999-9999?9")
        .focusout(function (event) {  
            var target, phone, element;  
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
            phone = target.value.replace(/\D/g, '');
            element = $(target);  
            element.unmask();  
            if(phone.length > 10) {  
                element.mask("(99) 99999-999?9");  
            } else {  
                element.mask("(99) 9999-9999?9");  
            }  
        });

