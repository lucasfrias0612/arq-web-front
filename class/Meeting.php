<?php

class Meeting {

    public function getAll() {
        
        $response = file_get_contents('http://localhost/arqweb/v1/meetings');

        $status_line = $http_response_header[0];
        preg_match('{HTTP\/\S*\s(\d{3})}', $status_line, $match);
        $status_code = intval($match[1]);

        if ($status_code >= 300 && $status_code < 400) { //Redireccionamiento
            throw new Exception("Respuesta inesperada. Código HTTP " . $status_code);
        } elseif ($status_code >= 400 && $status_code < 500) { //Error del cliente
            throw new Exception("Respuesta inesperada. Código HTTP " . $status_code);
        } elseif ($status_code >= 500 && $status_code < 600) { //Error del servidor
            throw new Exception("Respuesta inesperada. Código HTTP " . $status_code);
        }

        return json_decode($response, true);

    }

}

?>