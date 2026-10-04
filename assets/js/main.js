/* Portafolio: carga de proyectos y formulario de contacto con jQuery + Ajax */
$(function () {
    'use strict';

    var $lista = $('#lista-proyectos');

    function escapar(texto) {
        return $('<div>').text(texto == null ? '' : String(texto)).html();
    }

    function tarjetaProyecto(p) {
        var imagen = p.imagen
            ? '<img src="' + escapar(p.imagen) + '" class="card-img-top" alt="Captura de ' + escapar(p.titulo) + '" ' +
              'onerror="$(this).replaceWith(\'<div class=&quot;placeholder-img&quot;><i class=&quot;bi bi-code-slash&quot;></i></div>\')">'
            : '<div class="placeholder-img"><i class="bi bi-code-slash"></i></div>';

        var badges = $.map(p.tecnologias || [], function (t) {
            return '<span class="badge badge-tec me-1 mb-1">' + escapar(t) + '</span>';
        }).join('');

        var botones = '';
        if (p.demo) {
            botones += '<a href="' + escapar(p.demo) + '" class="btn btn-sm btn-acento me-2" target="_blank" rel="noopener"><i class="bi bi-box-arrow-up-right"></i> Demo</a>';
        }
        if (p.codigo) {
            botones += '<a href="' + escapar(p.codigo) + '" class="btn btn-sm btn-outline-light" target="_blank" rel="noopener"><i class="bi bi-github"></i> Código</a>';
        }
        if (!botones) {
            botones = '<span class="badge text-bg-secondary">' + escapar(p.estado || 'próximamente') + '</span>';
        }

        return '<div class="col-md-6 col-lg-3">' +
                 '<div class="card h-100 proyecto">' + imagen +
                   '<div class="card-body d-flex flex-column">' +
                     '<h3 class="h5">' + escapar(p.titulo) + '</h3>' +
                     '<p class="small text-secundario flex-grow-1">' + escapar(p.descripcion) + '</p>' +
                     '<div class="mb-3">' + badges + '</div>' +
                     '<div>' + botones + '</div>' +
                   '</div>' +
                 '</div>' +
               '</div>';
    }

    var enfoque = $('#filtros').data('enfoque');

    function cargarProyectos(etiqueta) {
        $lista.html('<div class="col-12 text-center py-5"><div class="spinner-border text-light" role="status"></div></div>');

        $.ajax({
            url: 'proyectos.php',
            data: { etiqueta: etiqueta, enfoque: enfoque },
            dataType: 'json'
        }).done(function (resp) {
            if (!resp.ok || !resp.proyectos.length) {
                $lista.html('<p class="text-secundario">No hay proyectos en esta categoría.</p>');
                return;
            }
            $lista.html($.map(resp.proyectos, tarjetaProyecto).join(''));
        }).fail(function () {
            $lista.html('<p class="text-danger">No se pudieron cargar los proyectos.</p>');
        });
    }

    $('#filtros').on('click', 'button', function () {
        $(this).addClass('active').siblings().removeClass('active');
        cargarProyectos($(this).data('etiqueta'));
    });

    cargarProyectos('todos');

    // Formulario de contacto
    var $form = $('#form-contacto');
    var $respuesta = $('#respuesta');

    $form.on('submit', function (ev) {
        ev.preventDefault();
        var $boton = $form.find('button[type=submit]').prop('disabled', true);
        $form.find('.is-invalid').removeClass('is-invalid');
        $respuesta.empty();

        $.ajax({
            url: $form.attr('action'),
            method: 'POST',
            data: $form.serialize(),
            dataType: 'json'
        }).done(function (resp) {
            $respuesta.html('<div class="alert alert-success mb-0">' + escapar(resp.mensaje) + '</div>');
            $form[0].reset();
        }).fail(function (xhr) {
            var resp = xhr.responseJSON || {};
            if (resp.errores) {
                $.each(resp.errores, function (campo, msj) {
                    $form.find('[name=' + campo + ']').addClass('is-invalid')
                        .siblings('.invalid-feedback').text(msj);
                });
            } else {
                $respuesta.html('<div class="alert alert-danger mb-0">' +
                    escapar(resp.mensaje || 'Ocurrió un error. Probá de nuevo.') + '</div>');
            }
        }).always(function () {
            $boton.prop('disabled', false);
        });
    });

    // Cerrar el menú en mobile al elegir una sección
    $('#menu .nav-link').on('click', function () {
        var menu = document.getElementById('menu');
        if (menu.classList.contains('show')) {
            bootstrap.Collapse.getOrCreateInstance(menu).hide();
        }
    });
});
