<?php
/**
 * Created by PhpStorm.
 * User: Alumne Matí
 * Date: 18/7/2018
 * Time: 12:54
 */


class SociosModel
{

    /*****************
     * Propiedades
     *****************/
    public $codigo = 0;
    public $dni='';
    public $nombre='';
    public $apellidos='';
    public $fecha_nacimiento='';
    public $email='';
    public $direccion='';
    public $ciudad='';
    public $cp='';
    public $provincia='';
    public $telefono='';
    public $fecha_alta='';


    /*****************
     * Métodos
     *****************/

    // Método que guarda un socio
    // PROTOTIPO : public boolean guardar(void)
    public function guardar()
    {
        $consulta = "INSERT INTO socios(dni,nombre,apellidos,fecha_nacimiento,email,direccion,ciudad,cp,provincia,telefono,fecha_alta)
                      VALUES('$this->dni','$this->nombre','$this->apellidos','$this->fecha_nacimiento','$this->email','$this->direccion','$this->ciudad','$this->cp','$this->provincia','$this->telefono','$this->fecha_alta');";

        // Ejecutar la Consulta
        $ok = Database::get()->query($consulta);

        // Actualizar el código del socio a partir del que se le ha asignado en la BDD
        $this->codigo = Database::get()->insert_id;

        // Retorna si se ha podido ejecutar la consulta o no
        return Database::get()->insert_id;

    }

    // Método que recupera el listado de Socios
    // PROTOTIPO: public static array(SociosModel) getSocios([string filtros])
    public static function getSocios(string $campo=null,string $filtro = '',bool $identico=true):array
    {
        $consulta = "SELECT * FROM socios";

        if($campo != null and $filtro != '')
            if($identico)
                $consulta.=" WHERE $campo='$filtro'";
            else
                $consulta.=" WHERE $campo LIKE '%$filtro%'";

        $consulta.=";";

        echoDebug($consulta);

        $resultset = Database::get()->query($consulta);

        // Preparar el Array para los resultados
        $socios = array();

        // A partir de los resultados, crear objetos SociosModel y añadirlos al array
        while($socio = $resultset->fetch_object('SociosModel'))
        {
            $socios[]=$socio;
        }

        // Libera el objeto mysql_result
        $resultset->free();

        // Devolver el array de Socios
        return $socios;

    }

    // Recuperar un socio a partir de su código
    // PROTOTIPO : public static SocioModel getSocio(int $codigo)
    public static function getSocio(int $codigo_socio)
    {
        $consulta = "SELECT * FROM socios WHERE codigo=$codigo_socio;";

        $resultset = Database::get()->query($consulta);

        // Convierte el resultado en un objeto (null si no hay resultados)
        $socio = $resultset->fetch_object('SociosModel');

        // Libera el objeto mysql_result
        $resultset->free();

        // Devolver el Socio recuperado
        return $socio;
    }

    // Borrar un Socio de la BDD a partir de su código
    // PROTOTIPO: public static int borrar (int $codigo)
    public static function borrar(int $codigo_socio):int
    {
        $consulta = "DELETE FROM socios WHERE codigo=$codigo_socio;";

        Database::get()->query($consulta);

        // Devolver el número de filas borrado
        return Database::get()->affected_rows;
    }

    // Modificar un Socio (Actualizar)
    // PROTOTIPO: public function boolean modificar(void)
    public function modificar()
    {
        $consulta = "UPDATE socios
                     SET dni='$this->dni',
                     nombre='$this->nombre',
                     apellidos='$this->apellidos',
                     fecha_nacimiento='$this->fecha_nacimiento',
                     email='$this->email',
                     direccion='$this->direccion',
                     ciudad='$this->ciudad',
                     cp='$this->cp',
                     provincia='$this->provincia',
                     telefono='$this->telefono',
                     fecha_alta='$this->fecha_alta' 
                     WHERE codigo=$this->codigo;";

        // Ejecutar la consulta
        return Database::get()->query($consulta);
    }


    // toString
    public function __toString()
    {
        $salida = "<div class='table-responsive'>";
        $salida .= "<table class='table' id='table_socio_$this->codigo'>";
        $salida .=  "<thead>
                            <tr>
                                <th scope=\"col\">Código</th>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Fecha Nacimiento</th>
                                <th>Email</th>
                                <th>Dirección</th>
                                <th>Ciudad</th>
                                <th>CP</th>
                                <th>Provincia</th>
                                <th>Teléfono</th>
                                <th>Fecha de Alta</th>
                            </tr>
                      </thead>";
        $salida .= "<tbody>";

        // Recuperar los resultados para mostrarlos
        $salida .= "<tr>";
            $salida .= "<td scope=\"row\">".$this->codigo."</td>";
            $salida .= "<td> $this->dni </td>";
            $salida .= "<td> $this->nombre </td>";
            $salida .= "<td> $this->apellidos </td>";
            $salida .= "<td> $this->fecha_nacimiento </td>";
            $salida .= "<td> $this->email </td>";
            $salida .= "<td> $this->direccion </td>";
            $salida .= "<td> $this->ciudad </td>";
            $salida .= "<td> $this->cp </td>";
            $salida .= "<td> $this->provincia </td>";
            $salida .= "<td> $this->telefono </td>";
            $salida .= "<td> $this->fecha_alta </td>";
        $salida .= "</tr>";

        $salida .= "</tbody>";
        $salida .= "</table>";
        $salida .= "</div>";
        return $salida;
    }

    // Mostrar en una tabla un array de socios
    public static function showTableSocios(array $socios):string{
        $salida = '';
        if(count($socios) > 0)
        {
            $salida .= "<div class='table-responsive'>";
            $salida .= "<table class='table datatablejq' id='table_lt_socios'>";
            $salida .=  "<thead>
                            <tr>
                                <th scope=\"col\">Código</th>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Fecha Nacimiento</th>
                                <th>Email</th>
                                <th>Dirección</th>
                                <th>Ciudad</th>
                                <th>CP</th>
                                <th>Provincia</th>
                                <th>Teléfono</th>
                                <th>Fecha de Alta</th>
                            </tr>
                      </thead>";
            $salida .= "<tbody>";

            // Recuperar los resultados para mostrarlos
            foreach($socios as $socio)
            {
                $salida .= "<tr>";
                $salida .= "<td scope=\"row\">".$socio->codigo."</td>";
                $salida .= "<td> $socio->dni </td>";
                $salida .= "<td> $socio->nombre </td>";
                $salida .= "<td> $socio->apellidos </td>";
                $salida .= "<td> $socio->fecha_nacimiento </td>";
                $salida .= "<td> $socio->email </td>";
                $salida .= "<td> $socio->direccion </td>";
                $salida .= "<td> $socio->ciudad </td>";
                $salida .= "<td> $socio->cp </td>";
                $salida .= "<td> $socio->provincia </td>";
                $salida .= "<td> $socio->telefono </td>";
                $salida .= "<td> $socio->fecha_alta </td>";
                $salida .= "</tr>";
            }

            $salida .= "</tbody>";
            $salida .= "</table>";
            $salida .= "</div>";
        }

        return $salida;
    }

    // Mostrar en una tabla un array de socios y las acciones de los socios
    public static function showTableSociosWithOptions(array $socios):string{
        $salida = '';
        if(count($socios) > 0)
        {
            $salida .= "<div class='table-responsive'>";
            $salida .= "<table class='table datatablejq_last_nosortable' id='table_lt_socios_with_options'>";
            $salida .=  "<thead>
                            <tr>
                                <th scope=\"col\">Código</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Email</th>
                                <th class='text-center'>Acciones</th>
                            </tr>
                      </thead>";
            $salida .= "<tbody>";

            // Recuperar los resultados para mostrarlos
            foreach($socios as $socio)
            {
                $salida .= "<tr>";
                $salida .= "<td scope=\"row\">".$socio->codigo."</td>";
                $salida .= "<td> $socio->nombre </td>";
                $salida .= "<td> $socio->apellidos </td>";
                $salida .= "<td> $socio->email </td>";
                $salida .= "<td class='text-center'> 
                                <ul class='list-inline'>
                                    <li class='list-inline-item'>
                                        <a class='btn btn-primary' href='?section=socios&action=detalle&item=$socio->codigo' data-toggle=\"tooltip\" data-placement=\"top\" title=\"Ir al detalle del socio\">
                                            <i class=\"fa fa-eye\" aria-hidden=\"true\"></i>
                                        </a>
                                    </li>
                                    <li class='list-inline-item'>
                                        <a class='btn btn-success' href='?section=socios&action=editar&item=$socio->codigo' data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar socio\">
                                            <i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>
                                        </a>
                                    </li>
                                    <li class='list-inline-item'>
                                        <a class='btn btn-danger' href='?section=socios&action=eliminar&item=$socio->codigo' data-toggle=\"tooltip\" data-placement=\"top\" title=\"Eliminar socio\">
                                            <i class=\"fa fa-trash\" aria-hidden=\"true\"></i>
                                        </a>
                                    </li>
                                </ul>
                            </td>";
                $salida .= "</tr>";
            }

            $salida .= "</tbody>";
            $salida .= "</table>";
            $salida .= "</div>";
        }

        return $salida;
    }
}