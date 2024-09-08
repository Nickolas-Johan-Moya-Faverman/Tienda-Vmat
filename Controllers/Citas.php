<?php
class Citas extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = 'Citas';
        $this->views->getView('admin/citas', "index", $data);
    }
    public function listar()
    {
        $data = $this->model->getCitas(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['accion'] = '<div class="d-flex">
            <button class="btn btn-success" type="button" onclick="verPedido(' . $data[$i]['id'] . ')"><i class="fas fa-eye"></i></button>
            </div>';
        }
        echo json_encode($data);
        die();
    }
    public function registrar()
    {
        if (isset($_POST['nombre']) && isset($_POST['email'])) {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $direccion = $_POST['direccion'];
            $mensaje = $_POST['mensaje'];
            $id = $_POST['id'];
            if (empty($nombre) || empty($email) || empty($direccion) || empty($mensaje)) {
                $respuesta = array('msg' => 'TODOS LOS CAMPOS NECESITAN SER RELLENADOS', 'icono' => 'warning');
            } else {
                if (empty($id)) {
                    $data =  $this->model->registrar($nombre, $email, $direccion, $mensaje);
                    if ($data > 0) {
                        $respuesta = array('msg' => 'CITA RESERVADA CON EXITO', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'ERROR AL REGISTRAR', 'icono' => 'error');
                    }
            }
            echo json_encode($respuesta);
            }
            die();
        }
    }
}