
$(document).ready(function()
{
    obtener_lista();
    var cronometro;
    var pausa = false

    $('#btn-start').click(function()
    {
        if(pausa == false)
        {
            pausa = true
            empezar_cronometro();
            document.getElementById('btn-start').innerText = "Stop";

        }
        else
        {
            pausa = false
            detener_cronometro();
            document.getElementById('btn-start').innerHTML = "Start";
        }
    })

    $('#form-guardar').submit(function(e)
    {
        const postData = 
        {
            fecha: $('#fecha').val(),
            tiempo: $('#tiempo').val(),
            sistema: $('#sistema').val(),
        };

        $.post('crear-nueva-lista.php', postData, function (response)
        {       
            console.log(response);
            obtener_lista();
        });
        e.preventDefault();
    })

    function detener_cronometro()
    {
        clearInterval(cronometro);        
        s = document.getElementById("segundos");
        m = document.getElementById("minutos");
        h = document.getElementById("hora");
        document.getElementById('tiempo').value = h.innerHTML+':'+m.innerHTML+':'+s.innerHTML

    }

    function empezar_cronometro()
    {
        contador_s = 0;
        contador_m = 0;
        contador_h = 0;
        s = document.getElementById("segundos");
        m = document.getElementById("minutos");
        h = document.getElementById("hora");

        cronometro = setInterval(
            function()
            {
                if(contador_m == 20)
                {
                    contador_m = 0;
                    contador_h++;
                    h.innerHTML = contador_h;
                    if(contador_h == 0)
                    {
                        contador_h = 0;
                    }
                }

                if(contador_s == 2)
                {
                    contador_s = 0;
                    contador_m++;
                    m.innerHTML = contador_m;

                    if(contador_m == 0)
                    {
                        contador_m = 0;
                    }
                }

                s.innerHTML = contador_s;
                contador_s++;
            },1000
        );
    }

    function obtener_lista()
    {
        $.ajax(
            {
                url: 'obtener-lista.php',
                type: 'GET',
                success: function (response)
                {
                    let productos = JSON.parse(response);
                    let plantilla = '';
                    productos.forEach(producto => 
                    {
                        plantilla += 
                        `
                        <tr>
                            <td class="td-primer-fila">${producto.id}</td>
                            <td>${producto.sistema}</td>
                            <td>${producto.fecha}</td>
                            <td>${producto.tiempo}</td>
                        </tr>
                        `            
                    });
                    $('#lista').html(plantilla);    
                }
            }
        )
    }
})