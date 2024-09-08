const frm = document.querySelector('#frmRegistro');
const btnAccion = document.querySelector('#btnAccion');
let tblCitas;

document.addEventListener('DOMContentLoaded', function(){
    tblCitas = $('#tblCitas').DataTable({
        ajax: {
            url: base_url + 'citas/listar',
            dataSrc: '',
        },
        columns: [
            { data: 'id' },
            { data: 'nombre' },
            { data: 'email' },
            { data: 'direccion' },
            { data: 'mensaje' }
        ],
        language,
        dom,
        buttons,
    });
    //Registro de citas o mensajes
    frm.addEventListener('submit', function(e) {
        e.preventDefault();
        let data = new FormData(this);
        const url = base_url + "citas/registrar";
        const http = new XMLHttpRequest();
        http.open("POST", url, true)
        http.send(data);
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res.icono == 'success') {
                    frm.reset();
                    tblCitas.ajax.reload();
                }
                Swal.fire('AVISO', res.msg.toUpperCase(), res.icono)
            }
        }
    });
});