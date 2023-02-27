// Función para hacer un display Toggle de un elemento previamente escondido con la clase imdisplayed
// El Botón tiene que tener el atributo rel (indica el elemento a displayar) y opcional el atributo
// speed que indicará la velocidad de la animación (valores: slow , fast)
$( ".display_toggle" ).click(function() {
    var el_to_display = $(this).attr('rel');
    var speed_to_display = $(this).attr('speed');
    var el = $(this);
    if(el.hasClass('active')){
        el.removeClass('active');
    }
    else{
        el.addClass('active');
    }
    if(speed_to_display != undefined)
    {
        $(el_to_display).slideToggle(speed_to_display);
    }
    else
    {
        $(el_to_display).slideToggle();
    }
});

// Función que te devuelve el valor de un parámetro de la URL
var getUrlParameter = function e(o) {
    var t = decodeURIComponent(window.location.search.substring(1)),
        n = t.split("&"),
        r, i;
    for (i = 0; i < n.length; i++)
        if (r = n[i].split("="), r[0] === o) return void 0 === r[1] || r[1]
};

// Función que parsea los datos de un formulario a JSON
$.fn.serializeFormJSON = function() {
    var e = {},
        o = this.serializeArray();
    return $.each(o, function() {
        e[this.name] ? (e[this.name].push || (e[this.name] = [e[this.name]]), e[this.name].push(this.value || "")) : e[this.name] = this.value || ""
    }), e
};



// Función para klonar elementos
$( document ).on( "click", ".klone_section", function() {

    var el = $(this);
    var id_klon = el.attr('rel');
    var id_input = el.attr('rel2');
    var zone_append = el.attr('zone_append');
    var max_klone = el.attr('max_klone');
    var generic_class = el.attr('gc');

    // Buscar el ultimo div con la id que le paso por el atributo del botón rel
    var $div = $('div[id^="'+id_klon+'"]:last');


    // Recojo el número del ultimo elemento del div
    // Incremento en uno para crear el siguiente
    var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;

    // Si el número es menor o igual al máximo permitido de klonaciones
    var num_els_klones = $(zone_append).find(generic_class);
    num_els_klones = parseInt((num_els_klones.length)+1);

    if(num_els_klones <= parseInt(max_klone))
    {
        // Clono el div
        var $klon = $div.clone().prop('id', id_klon+num );

        // Busco el input y le cambio el id y el nombre
        var aux_input = id_input+(num-1);
        var input = $klon.find('#'+aux_input);
        input.attr('name',id_input+num);
        input.prop('id',id_input+num);

        // Si es la primera vuelta quitar la clase first del botón de eliminar
        if(num_els_klones == 1)
        {
            $klon.find('.remove_zone ').removeClass('first');
        }
        $klon.find('.remove_zone ').attr('num',num);

        // Hago un append en la zone que toca
        $(zone_append).append($klon).fadeIn();
    }
});

// Función para eliminar elementos
$( document ).on( "click", ".remove_zone", function() {
    var el = $(this);
    var zone_to_remove = el.attr('rel')+el.attr('num');

    var el_to_remove = $(document).find('#'+zone_to_remove);

    el_to_remove.remove();

});

// Función para hacer scroll hacia elementos
var scrollToTarget = function (target,speed) {
    speed = typeof speed !== 'undefined' ?  speed : 2000;
    var target_el = $(document).find(target);
    $('html, body').animate({
        scrollTop: target_el.offset().top
    }, speed);
};

// Enlaces con la clase scrollto haran un scroll hacia el elemento de su href
$( ".scrollto" ).click(function(e) {
    e.preventDefault();
    e.stopPropagation();
    var target = $(this).attr('href');
    var speed = $(this).attr('speed');
    if(speed == undefined)
        speed=2000;
    scrollToTarget(target,speed);
});