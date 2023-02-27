<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 22/07/2018
 * Time: 17:49
 */

class LibrosModel
{
    /*****************
     * Propiedades
     *****************/
    public $codigo = 0;
    public $isbn='';
    public $titulo='';
    public $editorial='';
    public $idioma='';
    public $autor='';
    public $n_ediciones=1;
    public $edad_recomendada=12;

    /*****************
     * Métodos
     *****************/

    // Método que guarda un Libro
    // PROTOTIPO : public boolean guardar(void)
    public function guardar()
    {
        $consulta = "INSERT INTO libros(isbn,titulo,editorial,idioma,autor,n_ediciones,edad_recomendada)
                      VALUES('$this->isbn','$this->titulo','$this->editorial','$this->idioma','$this->autor',$this->n_ediciones,$this->edad_recomendada);";

        // Ejecutar la Consulta
        $ok = Database::get()->query($consulta);

        // Actualizar el código del socio a partir del que se le ha asignado en la BDD
        $this->codigo = Database::get()->insert_id;

        // Retorna si se ha podido ejecutar la consulta o no
        return Database::get()->insert_id;

    }

    // Método que recupera el listado de Libros
    // PROTOTIPO: public static array(LibrosModel) getLibros([string filtros])
    public static function getLibros(string $campo=null,string $filtro = '',bool $identico=true):array
    {
        $consulta = "SELECT * FROM libros";

        if($campo != null and $filtro != '')
            if($identico)
                $consulta.=" WHERE $campo='$filtro'";
            else
                $consulta.=" WHERE $campo LIKE '%$filtro%'";

        $consulta.=";";

        echoDebug($consulta);

        $resultset = Database::get()->query($consulta);

        // Preparar el Array para los resultados
        $libros = array();

        // A partir de los resultados, crear objetos LibrosModel y añadirlos al array
        while($libro = $resultset->fetch_object('LibrosModel'))
        {
            $libros[]=$libro;
        }

        // Libera el objeto mysql_result
        $resultset->free();

        // Devolver el array de Libros
        return $libros;

    }

    // Recuperar un libro a partir de su código
    // PROTOTIPO : public static LibrosModel getLibro(int $codigo)
    public static function getLibro(int $codigo_libro)
    {
        $consulta = "SELECT * FROM libros WHERE codigo=$codigo_libro;";

        $resultset = Database::get()->query($consulta);

        // Convierte el resultado en un objeto (null si no hay resultados)
        $libro = $resultset->fetch_object('LibrosModel');

        // Libera el objeto mysql_result
        $resultset->free();

        // Devolver el Socio recuperado
        return $libro;
    }

    // Borrar un Libro de la BDD a partir de su código
    // PROTOTIPO: public static int borrar (int $codigo)
    public static function borrar(int $codigo_libro):int
    {
        $consulta = "DELETE FROM libros WHERE codigo=$codigo_libro;";

        Database::get()->query($consulta);

        // Devolver el número de filas borrado
        return Database::get()->affected_rows;
    }

    // Modificar un Libro (Actualizar)
    // PROTOTIPO: public function boolean modificar(void)
    public function modificar()
    {
        $consulta = "UPDATE libros
                     SET isbn='$this->isbn',
                     titulo='$this->titulo',
                     editorial='$this->editorial',
                     idioma='$this->idioma',
                     autor='$this->autor',
                     n_ediciones='$this->n_ediciones',
                     edad_recomendada='$this->edad_recomendada'
                     WHERE codigo=$this->codigo;";

        // Ejecutar la consulta
        return Database::get()->query($consulta);
    }


    // toString
    public function __toString()
    {
        $salida = "<div class='table-responsive'>";
        $salida .= "<table class='table' id='table_libro_$this->codigo'>";
        $salida .=  "<thead>
                            <tr>
                                <th scope=\"col\">Código</th>
                                <th>ISBN</th>
                                <th>Título</th>
                                <th>Editorial</th>
                                <th>Idioma</th>
                                <th>Autor</th>
                                <th>Nº Ediciones</th>
                                <th>Edad Recomendada</th>
                            </tr>
                      </thead>";
        $salida .= "<tbody>";

        // Recuperar los resultados para mostrarlos
        $salida .= "<tr>";
        $salida .= "<td scope=\"row\">".$this->codigo."</td>";
        $salida .= "<td> $this->isbn </td>";
        $salida .= "<td> $this->titulo </td>";
        $salida .= "<td> $this->editorial </td>";
        $salida .= "<td> $this->idioma </td>";
        $salida .= "<td> $this->autor </td>";
        $salida .= "<td> $this->n_ediciones </td>";
        $salida .= "<td> $this->edad_recomendada </td>";
        $salida .= "</tr>";

        $salida .= "</tbody>";
        $salida .= "</table>";
        $salida .= "</div>";
        return $salida;
    }

    // Mostrar en una tabla un array de Libros
    public static function showTableLibros(array $libros):string{
        $salida = '';
        if(count($libros) > 0)
        {
            $salida .= "<div class='table-responsive'>";
            $salida .= "<table class='table datatablejq' id='table_lt_socios'>";
            $salida .=  "<thead>
                            <tr>
                                <th scope=\"col\">Código</th>
                                <th>ISBN</th>
                                <th>Título</th>
                                <th>Editorial</th>
                                <th>Idioma</th>
                                <th>Autor</th>
                                <th>Nº Ediciones</th>
                                <th>Edad Recomendada</th>
                            </tr>
                      </thead>";
            $salida .= "<tbody>";

            // Recuperar los resultados para mostrarlos
            foreach($libros as $libro)
            {
                $salida .= "<tr>";
                $salida .= "<td scope=\"row\">".$libro->codigo."</td>";
                $salida .= "<td> $libro->isbn </td>";
                $salida .= "<td> $libro->titulo </td>";
                $salida .= "<td> $libro->editorial </td>";
                $salida .= "<td> $libro->idioma </td>";
                $salida .= "<td> $libro->autor </td>";
                $salida .= "<td> $libro->n_ediciones </td>";
                $salida .= "<td> $libro->edad_recomendada </td>";
                $salida .= "</tr>";
            }

            $salida .= "</tbody>";
            $salida .= "</table>";
            $salida .= "</div>";
        }

        return $salida;
    }

    // Mostrar en una tabla un array de Libros y las acciones de los Libros
    public static function showTableLibrosWithOptions(array $libros):string{
        $salida = '';
        if(count($libros) > 0)
        {
            $salida .= "<div class='table-responsive'>";
            $salida .= "<table class='table datatablejq_last_nosortable' id='table_lt_socios_with_options'>";
            $salida .=  "<thead>
                            <tr>
                                <th scope=\"col\">Código</th>
                                <th>ISBN</th>
                                <th>Título</th>
                                <th>Editorial</th>
                                <th class='text-center'>Acciones</th>
                            </tr>
                      </thead>";
            $salida .= "<tbody>";

            // Recuperar los resultados para mostrarlos
            foreach($libros as $libro)
            {
                $salida .= "<tr>";
                $salida .= "<td scope=\"row\">".$libro->codigo."</td>";
                $salida .= "<td> $libro->isbn </td>";
                $salida .= "<td> $libro->titulo </td>";
                $salida .= "<td> $libro->editorial </td>";
                $salida .= "<td class='text-center'> 
                                <ul class='list-inline'>
                                    <li class='list-inline-item'>
                                        <a class='btn btn-primary' href='?section=libros&action=detalle&item=$libro->codigo' data-toggle=\"tooltip\" data-placement=\"top\" title=\"Ir al detalle del libro\">
                                            <i class=\"fa fa-eye\" aria-hidden=\"true\"></i>
                                        </a>
                                    </li>";

                if(!empty($_SESSION['user']))
                {
                    $salida .= "<li class='list-inline-item'>
                                        <a class='btn btn-success' href='?section=libros&action=editar&item=$libro->codigo' data-toggle=\"tooltip\" data-placement=\"top\" title=\"Editar libro\">
                                            <i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>
                                        </a>
                                    </li>
                                    <li class='list-inline-item'>
                                        <a class='btn btn-danger' href='?section=libros&action=eliminar&item=$libro->codigo' data-toggle=\"tooltip\" data-placement=\"top\" title=\"Eliminar libro\">
                                            <i class=\"fa fa-trash\" aria-hidden=\"true\"></i>
                                        </a>
                                    </li>";
                }
                $salida .=      "</ul>
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