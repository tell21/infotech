<?php
class UploadImagem {

  public function uploadImagem($files){
    if(isset($files)){
      $errors= array();
      $nomes = array();
      $this->count = count($files);
      foreach($files['tmp_name'] as $key => $tmp_name ){
        $file_name = $key.$files['name'][$key];
        $file_size =$files['size'][$key];
        $file_tmp =$files['tmp_name'][$key];
        $file_type=$files['type'][$key];

        if($file_size > 2097152){
          $errors[]='File size must be less than 2 MB';
        }
        $desired_dir="../../assets/images/";
        if(empty($errors)==true){

          $extensao = pathinfo ( $file_name, PATHINFO_EXTENSION );
          $extensao = strtolower ( $extensao );

          if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
            // Cria um nome único para esta imagem
            // Evita que duplique as imagens no servidor.
            // Evita nomes com acentos, espaços e caracteres não alfanuméricos
            $novoNome = uniqid ( time () ) . '.' . $extensao;

            // Concatena a pasta com o nome
            $destino = "../../assets/images/". $novoNome;
            if(is_dir($desired_dir)==false){
              mkdir($desired_dir, 0700);		// Create directory if it does not exist
            }
            if(is_dir($destino)==false){
              move_uploaded_file($file_tmp,$destino);
            }

            array_push($nomes, $novoNome);

          }
          else
            return null;

        }else{
          print_r($errors);
        }
      }
      if(empty($error)){
        return $nomes;
      }
    }
  }
}
?>
