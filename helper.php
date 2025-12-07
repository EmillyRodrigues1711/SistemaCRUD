<?php 
    function traduz_responsavel($codigo){
        $tipo_resp = '';

        switch ($codigo) {
            case 1:
                $tipo_resp = 'Pai';
                break;
            case 2:
                $tipo_resp = 'Mãe';
                break;
            case 3:
                $tipo_resp = 'Tio(a)';
                break;
            case 4:
                $tipo_resp = 'Avô(ó)';
                break;
            case 5:
                $tipo_resp = 'Outro';
                break;
            default:
                $tipo_resp = 'Desconhecido';
				break;
        }
        return $tipo_resp;
    }

    function traduz_data_exibir($data){
        if($data == "" or $data == "0000-00-00"){
            return "";
        }

        // Se a data for válida, usa a função nativa strtotime e date para formatar.
        return date('d/m/Y', strtotime($data));
    }
    
    function traduz_curso($codigo){
        $curso = '';

        switch ($codigo) {
            case 1:
                $curso = 'Enfermagem';
                break;
            case 2:
                $curso = 'Informática';
                break;
            case 3:
                $curso = 'Desenvolvimento de Sistemas';
                break;
            case 4:
                $curso = 'Administração';
                break;
            default:
                $curso = 'Curso Inválido';
				break;
        }
        return $curso;
    }
?>