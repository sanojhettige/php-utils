<?php
//return memory size in B, KB, MB
getBase64ImageSize($base64Image){
      try{
          $size_in_bytes = (int) (strlen(rtrim($base64Image, '=')) * 3 / 4);
          $size_in_kb    = $size_in_bytes / 1024;
          $size_in_mb    = $size_in_kb / 1024;

          return $size_in_bytes;
      }
      catch(Exception $e){
          return $e;
      }
    }
