/*
APPENDS
 */
// - myfunctions.js

//@prepros-prepend myfunctions.js


$(document).ready(function() {
    $(".form_ajax").submit(function() {
        return $(".form-group").removeClass("has-error"), $form = $(this), $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: $(this).serialize(),
            dataType: "json"
        }).done(function(e) {

            !1 === e.err ? analizeResponse(e, 1, $form) : !0 === e.err && analizeResponse(e, 2, $form)
        }).fail(function(e, o) {
            var t = null;
            analizeResponse(null, 3, $form)
        }), !1
    })
});
for (var responseMsgToString = function(e, o, t) {
    var n = "";
    for (k in e) {
        if (e[k].length > 0)
            for (i = 0; i < e[k].length; i++) void 0 != o && (n += o), n += e[k][i], void 0 != t && (n += o);
        console.info(e[k])
    }
    return n
}, responseAddErrortoForm = function(e, o, t, n) {
    resetErrortoForm(t);
    var r = e.extra.fields,
        i = e.messages["message-error"];
    console.info("Soy adderror"), console.info(t), console.info(r);
    for (var a = 0; a < r.length; a++) console.info($(t).find("#" + r[a]).parent().parent()), $(t).find("#" + r[a]).parent().parent().addClass("has-error")
}, responseFocusFirstError = function(e, o, t, n) {
    console.info("responseFocusFirstError");
    var r = e.extra.fields;
    void 0 != r[0] && ($(t).find("#" + r[0]).focus(), console.info($(t).find("#" + r[0])))
}, responseResetForm = function(e, o, t) {
    console.info("responseResetForm"), t[0].reset(), 1 == e.extra.close_all && $(".modal").modal("hide")
}, responseRedirecTo = function(e, o, t) {
    console.info("responseRedirecTo"), void 0 != e.extra.callback.url && window.top.location.replace(e.extra.callback.url)
}, resetErrortoForm = function(e) {
    $(e).find(".help-block").remove()
}, showModal = function(e, o, t, n) {
    "" !== o && void 0 !== o || (o = 2);
    var r = responseMsgToString(e.messages, "<p>", "</p>"),
        i = "modal" + o;
    if (void 0 != e.extra.callback && void 0 != e.extra.callback.modal && 0 == e.extra.callback.modal) return window[n].apply(null, [e, o, t]), !0;
    bootbox.dialog({
        message: r,
        title: e.extra.title,
        onEscape: function() {
            void 0 != n ? window[n].apply(null, [e, o, t]) : 1 == e.extra.close_all && $(".modal").modal("hide")
        },
        show: !0,
        backdrop: !0,
        closeButton: !0,
        animate: !0,
        className: i
    })
}, analizeResponse = function(e, o, t) {
    var n = "showModal";
    if (1 == o) {
        var r = "responseResetForm";
        void 0 != e.callback && "" != e.callback && (r = e.callback), showModal(e, o, t, r)
    } else 2 == o ? (responseAddErrortoForm(e, o, t), showModal(e, o, t, "responseFocusFirstError")) : 3 == o && (console.info("ERROR EN LA LLAMADA"), alert("Se ha producido un error"))
}, selectspickers = $("form").find(".selectpicker"), x = 0; x < selectspickers.length; x++) $(selectspickers[x]).selectpicker({
    style: "select-form",
    header: $(selectspickers[x]).attr("title")
});


$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();

    // Botón de volver arriba
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('#boxtoup').fadeIn();
        } else {
            $('#boxtoup').fadeOut();
        }
    });
    // scroll body to 0px on click
    $('#boxtoup a').click(function () {
        $('#boxtoup a').tooltip('hide');
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    $('#back-to-top').tooltip('show');

    // Datatables
    var datatables = $(document).find('.datatablejq');
    if(datatables.length > 0)
    {
        $.each(datatables, function( i, el ) {
            $(el).DataTable( {
                "language": {
                    "lengthMenu": "Mostrando _MENU_ registros por página",
                    "zeroRecords": "Nothing found - sorry",
                    "info": "Mostrando _PAGE_ de _PAGES_ páginas",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Buscar:",
                    "paginate": {
                        "previous":   "Anterior",
                        "next":       "Siguiente",
                    },
                }
            } );
        });
    }
    var datatables_sort = $(document).find('.datatablejq_last_nosortable');
    if(datatables_sort.length > 0)
    {
        $.each(datatables_sort, function( i, el ) {
            $(el).DataTable( {
                "language": {
                    "lengthMenu": "Mostrando _MENU_ registros por página",
                    "zeroRecords": "Nothing found - sorry",
                    "info": "Mostrando _PAGE_ de _PAGES_ páginas",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Buscar:",
                    "paginate": {
                        "previous":   "Anterior",
                        "next":       "Siguiente",
                    },
                },
                "columnDefs": [
                    { "orderable": false, "targets": -1 }
                ]
            } );
        });
    }


});


