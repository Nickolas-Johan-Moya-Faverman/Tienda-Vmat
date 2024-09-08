<?php
class Clientien extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = 'Clientes Tienda';
        $this->views->getView('admin/clientien', "index", $data);
    }
    public function listarclien()
    {
        $data = $this->model->getClientien();
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['accion'] = '<div class="d-flex">
            <button class="btn btn-primary" type="button" onclick="editClien(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></button>
            <button class="btn btn-success" type="button" onclick="eliminarClien(' . $data[$i]['id'] . ')">HABILITADO</button>
            </div>';
        }
        echo json_encode($data);
        die();
    }
    public function registrarClien()
    {
        if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $clave = $_POST['clave'];
            $id = $_POST['id'];
            $hash = password_hash($clave, PASSWORD_DEFAULT);
            if (empty($_POST['nombre'])  || empty($_POST['correo'])) {
                $respuesta = array('msg' => 'TODOS LOS CAMPOS NECESITAN SER RELLENADOS', 'icono' => 'warning');
            } else {
                if (empty($id)) {
                    $result = $this->model->verificarCorreoClien($correo);
                    if (empty($result)) {
                        $data =  $this->model->registrarClien($nombre, $correo, $hash);
                        if ($data > 0) {
                            $respuesta = array('msg' => 'CLIENTE REGISTRADO', 'icono' => 'success');
                        } else {
                            $respuesta = array('msg' => 'ERROR AL REGISTRAR', 'icono' => 'error');
                        }
                    } else {
                        $respuesta = array('msg' => 'CORREO YA EXISTENTE', 'icono' => 'warning');
                    }
                } else {
                    $data =  $this->model->modificarClien($nombre, $correo, $id);
                    if ($data == 1) {
                        $respuesta = array('msg' => 'CLIENTE MODIFICADO', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'ERROR AL MODIFICAR', 'icono' => 'error');
                    }
                }
            }
            echo json_encode($respuesta);
        }
        die();
    }
    public function deleteClien($idClien)
    {
        if (is_numeric($idClien)) {
            $data = $this->model->eliminarClien($idClien);
            if ($data == 1) {
                $respuesta = array('msg' => 'EL CLIENTE HA SIDO DADO INHABILITADO', 'icono' => 'success');
            } else {
                $respuesta = array('msg' => 'ERROR AL INHABILITAR', 'icono' => 'error');
            }
        } else {
            $respuesta = array('msg' => 'ERROR DESCONOCIDO', 'icono' => 'error');
        }
        echo json_encode($respuesta);
        die();
    }
    //Funcion para editar datos de usuarios
    public function editClien($idClien)
    {
        if (is_numeric($idClien)) {
            $data = $this->model->getClient($idClien);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
