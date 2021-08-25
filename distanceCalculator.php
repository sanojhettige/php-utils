function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $unit = 'km', $decimals = 0) 
         {

               $degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));

              switch($unit) 
              {
                  case 'km': 
                       $distance = $degrees * 111.13384;
                       break;
                  case 'mi':
                       $distance = $degrees * 69.05482;
                       break;
                  case 'nmi':
                       $distance =  $degrees * 59.97662;
              }

              return round($distance, $decimals);
        }
