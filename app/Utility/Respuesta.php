<?php

namespace App\Utility;

class Respuesta{
	
	private static $response = array(
		0 => [
			'codigo' => 0, 
			'msj' => 'No existen registros.',
			'tipo' => 'error'
		], 
		1 => [
			'codigo' => 1, 
			'msj' => 'Registro exitoso.', 
			'tipo' => 'success'
		],
		-1 => [
			'codigo' => -1, 
			'msj' => 'No se puede realizar el registro.',
			'tipo' => 'Error'
		],
		2 => [
			'codigo' => 2, 
			'msj' => 'Consulta Exitosa.', 
			'tipo' => 'success'
		],
		-2 => [
			'codigo' => -2, 
			'msj' => 'No se puede realizar la consulta, intente de nuevo.', 
			'tipo' => 'Error'
		],
		3 => [
			'codigo' => 3, 
			'msj' => 'Actualización exitosa.',
			'tipo' => 'success'
		],
		-3 => [
			'codigo' => -3, 
			'msj' => 'No se puede realizar la modificación.',
			'tipo' => 'Error'
		],
		4 => [
			'codigo' => 4, 
			'msj' => 'Eliminación exitosa.', 
			'tipo' => 'success'
		],
		-4 => [
			'codigo' => -4, 
			'msj' => 'No se puede realizar la eliminación.', 
			'tipo' => 'Error'
		],
		5 => [
			'codigo' => 5, 
			'msj' => 'Correo ya existe.', 
			'tipo' => 'error'
		],
		-5 => [
			'codigo' => -5, 
			'msj' => 'Correo no existe en registro.', 
			'tipo' => 'Error'
		],
		6 => [
			'codigo' => 6, 
			'msj' => 'Proceso valido.',
			'tipo' => 'success'
		],
		7 => [
			'codigo' => 7, 
			'msj' => 'El archivo No fue cargado.', 
			'tipo' => 'warning'
		],
		8 => [
			'codigo' => 8, 
			'msj' => 'Los atributos no fueron alterados.', 
			'tipo' => 'warning'
		],
		9 => [
			'codigo' => 9, 
			'msj' => '', 
			'tipo' => 'warning'
		],
		10 => [
            'codigo' => 10,
            'msj' => '',
            'tipo' => 'success'
        ],
        11 => [
            'codigo' => 11,
            'msj' => '',
            'tipo' => 'warning'
        ],
		12 => [
		    'codigo' => 12,
            'msj' => 'No existen registros asociados al criterio de busqueda.',
            'tipo' => 'warning'
        ],
        13 => [
            'codigo' => 13,
            'msj' => 'Acción no permitida.',
            'tipo' => 'warning'
        ],
        14 => [
            'codigo' => 14,
            'msj' => '',
            'tipo' => 'success'
        ],
        15 => [
            'codigo' => 15,
            'msj' => '',
            'tipo' => 'warning'
        ],
        16 => [
            'codigo' => 16,
            'msj' => 'Consulta Exitosa.',
            'tipo' => 'success'
        ],
		102 => [
			'codigo' => 102, 
			'msj' => 'Datos erróneos.', 
			'tipo' => 'Error'
		],
		103 => [
			'codigo' => 103, 
			'msj' => 'Las contraseñas no coinciden.', 
			'tipo' => 'Error'
		],
		104 => [
			'codigo' => 104, 
			'msj' => 'No se puede procesar la solicitud.',
			'tipo' => 'Error'
		],
		105 => [
			'codigo' => 105, 
			'msj' => 'Correo no válido.', 
			'tipo' => 'Error'
		],
		106 => [
			'codigo' => 106, 
			'msj' => 'El archivo no es de la extensión permitida.', 
			'tipo' => 'Error'
		],
		107 => [
			'codigo' => 107, 
			'msj' => 'Archivo con error.', 
			'tipo' => 'Error'
		],
		108 => [
			'codigo' => 108, 
			'msj' => 'Faltan datos para la solicitud', 
			'tipo' => 'Error'
		],
		109 => [
			'codigo' => 109, 
			'msj' => 'Ha ocurrido un error inesperado.', 
			'tipo' => 'Error'
		],
		110 => [
			'codigo' => 110, 
			'msj' => 'Accion NO realizada con exito.', 
			'tipo' => 'Error'
		],
		111 => [
			'codigo' => 111, 
			'msj' => 'Acceso permitido.', 
			'tipo' => 'success'
		],
		112 => [
			'codigo' => 112, 
			'msj' => '', 
			'tipo' => 'success'
		],
		113 => [
			'codigo' => 113, 
			'msj' => '', 
			'tipo' => 'warning'
		],
		114 => [
			'codigo' => 114, 
			'msj' => 'Error con el archivo. Favor Verifique el tamaño y formato.', 
			'tipo' => 'Error'
		],
		115 => [
			'codigo' => 115, 
			'msj' => 'Exito. Se ha enviado archivo.', 
			'tipo' => 'success'
		],
		116 => [
			'codigo' => 116, 
			'msj' => 'Su estado en el sistema no permite realizar esta accion.', 
			'tipo' => 'Error'
		],
        117 => [
            'codigo' => 116,
            'msj' => 'Ya se ha realizado la carga de los archivos.',
            'tipo' => 'warning'
        ],
        118 => [
            'codigo' => 118,
            'msj' => 'Notificacion Enviada.',
            'tipo' => 'success'
        ],
        119 => [
            'codigo' => 119,
            'msj' => '',
            'tipo' => 'warning'
        ],
        120 => [
            'codigo' => 120,
            'msj' => '',
            'tipo' => 'Error'
        ],
        121 => [
            'codigo' => 121,
            'msj' => 'No tiene permisos.',
            'tipo' => 'Error'
        ],
        122 => [
            'codigo' => 122,
            'msj' => '',
            'tipo' => 'warning'
        ],
        123 => [
            'codigo' => 123,
            'msj' => '',
            'tipo' => 'Error'
        ],
        124 => [
            'codigo' => 124,
            'msj' => 'Archivo(s) rechazados con exito.',
            'tipo' => 'success'
        ],
        125 => [
            'codigo' => 125,
            'msj' => 'Se ha enviado el correo.',
            'tipo' => 'success'
        ],
        126 => [
            'codigo' => 126,
            'msj' => 'No se ha enviado el correo',
            'tipo' => 'success'
        ],
        127 => [
            'codigo' => 127,
            'msj' => 'Acción no permitida.',
            'tipo' => 'Error'
        ],
        128 => [
            'codigo' => 128,
            'msj' => 'Exito. Se ha notificado a la persona.',
            'tipo' => 'success'
        ],
        129 => [
            'codigo' => 129,
            'msj' => 'Accion realizada con exito.',
            'tipo' => 'success'
        ],
		1062 => [
			'codigo' => 1062, 
			'msj' => 'Falló registro. Ya existe un registro cargado con esos Datos', 
			'tipo' => 'error'
		],
		1040 => [
			'codigo' => 1040, 
			'msj' => 'Demasiadas conexiones', 
			'tipo' => 'Error'
		],
		1041 => [
			'codigo' => 1041, 
			'msj' => 'Memoria/espacio de tranpaso insuficiente', 
			'tipo' => 'Error'
		],
		1048 => [
			'codigo' => 1048, 
			'msj' => 'Se ha enviado un campo que no puede ser vacio/Nulo', 
			'tipo' => 'Error'
		],
		1052 => [
			'codigo' =>1052 , 
			'msj' => 'Columna/s ambigua/s en la consulta', 
			'tipo' => 'Error'
		],
		1063 => [
			'codigo' =>1063 , 
			'msj' => 'Se especifico columna/s de forma erroneo', 
			'tipo' => 'Error'
		],
		1074 => [
			'codigo' => 1074 , 
			'msj' => 'Longitud de columna demasiado grande para una columna', 
			'tipo' => 'Error'
		],
		1114 => [
			'codigo' => 1114 , 
			'msj' => 'La tabla está llena',
			'tipo' => 'Error'
		],
		1452 => [
			'codigo' => 1452, 
			'msj' => 'Inconsistencia en los datos relacionados',
			'tipo' => 'Error'
		],
		1054 => [
			'codigo' => 1054, 
			'msj' => 'Error se ha solicitado campo/s o columna/s desconocida/s', 
			'tipo' => 'Error'
		],
		3000 => [
			'codigo' => 3000, 
			'msj' => 'Exito. Archivo excel generado.', 
			'tipo' => 'success'
		],
		3001 => [
			'codigo' => 3001, 
			'msj' => 'Error al generar archivo Excel.', 
			'tipo' => 'error'
		],
		3002 => [
			'codigo' => 3002, 
			'msj' => 'No fue posible generar archivo Excel. Intentelo más tarde.',
			'tipo' => 'error'
		] );

	public static function insert($row){
		self::$response = self::$response + $row;
	}

	public static function get($code, $mensaje = ''){
		try {
		    if(isset(self::$response[$code])){
                $resp = self::$response[$code];
                $resp['msj'] = $resp['msj'].' '.$mensaje;
                return $resp;
            }
            return self::$response[109];
		} catch (Exception $e) {
	        return self::$response[109];
		}
	}

}

?>