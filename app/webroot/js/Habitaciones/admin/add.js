$(document).ready(function(){
    /**
     * Initial configuration
     */
    //ShowFormErrors($('#frmHabitacion'));
    $('#frmHabitacion').find(".form-error").each(function(index){
        $(this).qtip({            
            content: {
                text: $(this).parent().find(".error-message").html()                        
            },
            position: {
                my: "bottom left",
                at: "top right"
            },                        
            style: {
                    classes: "ui-tooltip-red"
                }
        });
    });
    
    // Esconde la seccion de precios por persona o por habitacion
    if($('#rdoPrecioPorPersona').attr('checked') == 'checked'){        
        $('#divPrecioPorHabitacion').hide();
    }
    else{
        $('#divPrecioPorPersona').hide();
    }
    
    
    /**
     * Event Bindings
     */
    
    // Controla el tipo de precio a cobrar por las habitaciones
    $('#rdoPrecioPorPersona').on('change', rdoPrecioPorPersona_OnChange);
    $('#rdoPrecioPorNoche').on('change', rdoPrecioPorNoche_OnChange);
    
    // Controla la direccion a donde llevar el usuario despues de haber guardado el registro
    $('#btnGuardarConFotos').on('click', btnGuardarConFotos_OnClick);
});



/**
 * Event Handlers
 */

function rdoPrecioPorPersona_OnChange(){
    // Se cambian los valores en el formulario
    $('#hdnPorNoche').val('0');
    $('#hdnPorPersona').val('1');
    // Esconde la seccion de Precio Por Habitacion
    PrecioPorHabitacion_Hide();
}

function rdoPrecioPorNoche_OnChange(){
    // Se cambian los valores en el formulario
    $('#hdnPorNoche').val('1');
    $('#hdnPorPersona').val('0');
    // Esconde la seccion de Precio Por Persona
    PrecioPorPersona_Hide();
}

function btnGuardarConFotos_OnClick(event){
    // En caso de presionar el boton Guardar y Agregar Fotos... el usuario es
    // llevado a la administracion de fotos por habitacion. El URL se agraga
    // en HabitacionesController::admin_add() despues de haber guardado
    // el registro
    event.preventDefault();
    $('#hdnRedirectTo').val('fotos');
    $('#frmHabitacion').submit();
}

/**
 * Utility functions
 */

// Esconde la seccion de Precio Por Persona
function PrecioPorPersona_Hide(){
    // Una vez que el efecto de fadeout termina, automaticamente se despliega
    // la seccion de Precio Por Habitacion
    $('#divPrecioPorPersona').slideUp('fase', PrecioPorHabitacion_Show);
}

// Despliega la seccion de Precio Por Persona
function PrecioPorPersona_Show(){
    $('#divPrecioPorPersona').slideDown('slow');
}

// Esconde la seccion de Precio Por Habitacion
function PrecioPorHabitacion_Hide(){
    // Una vez que el efecto de fadeout termina, automaticamente se despliega
    // la seccion de Precio Por Persona
    $('#divPrecioPorHabitacion').slideUp('fast', PrecioPorPersona_Show)
}

// Despliega la seccion de Precio Por Habitacion
function PrecioPorHabitacion_Show(){
    $('#divPrecioPorHabitacion').slideDown('fast');
}