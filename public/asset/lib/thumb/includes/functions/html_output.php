<?php
function tep_image($src, $alt = '', $width = '', $height = '', $parameters = '', $zc='') {
  if ( (empty($src) || ($src == DIR_WS_IMAGES)) && (IMAGE_REQUIRED == 'false') ) {
      return false;
    }
    if($zc!='0'){
	$zc=1;
	}
    // Set default image variable and code 
	if($src!="images/pixel_trans.gif"){
		$image = '<img src="/thumb/thumb.php?src=' . tep_output_string($src) . '&amp;h='.$height.'&amp;w='.$width .'&amp;zc='.$zc.'" 
border="0" alt="' . tep_output_string($alt).$zc . '"';
	}else{
		$image = '<img src="' . tep_output_string($src) . '" border="0" alt="' . tep_output_string($alt) . '"';
	}


    // Don't calculate if the image is set to a "%" width
    if (strstr($width,'%') == false || strstr($height,'%') == false) { 
        $dont_calculate = 0; 
    } else {
        $dont_calculate = 1;    
    }

    // Dont calculate if a pixel image is being passed (hope you dont have pixels for sale)
    if (!strstr($image, 'pixel')) {
        $dont_calculate = 0;
    } else {
        $dont_calculate = 1;
    }

    // Do we calculate the image size?
    if (CONFIG_CALCULATE_IMAGE_SIZE && !$dont_calculate) {

        // Get the image's information
        if ($image_size = @getimagesize($src)) { 

            $ratio = $image_size[1] / $image_size[0];

            // Set the width and height to the proper ratio
            if (!$width && $height) {
                $ratio = $height / $image_size[1];
                $width = intval($image_size[0] * $ratio); 
            } elseif ($width && !$height) {
                $ratio = $width / $image_size[0];
                $height = intval($image_size[1] * $ratio); 
            } elseif (!$width && !$height) {
                $width = $image_size[0];
                $height = $image_size[1]; 
            }

            // Scale the image if not the original size
            if ($image_size[0] != $width || $image_size[1] != $height) {
                $rx = $image_size[0] / $width;
                $ry = $image_size[1] / $height;

                if ($rx < $ry) {
                    $width = intval($height / $ratio);
                } else {
                    $height = intval($width * $ratio);
                }

               $image = '<img src="/thumb/thumb.php?src=' . tep_output_string($src) . '&amp;h='.$height.'&amp;w='.$width .'&amp;zc='.$zc.'" 
border="0" alt="' . tep_output_string($alt).$zc . '"';
            }

        } elseif (IMAGE_REQUIRED == 'false') { 
                return false;
        }
    }

    // Add remaining image parameters if they exist
    if ($width) {
        $image .= ' width="' . tep_output_string($width) . '"'; 
    } 

    if ($height) { 
        $image .= ' height="' . tep_output_string($height) . '"'; 
    }     

 if ($zc) { 
        $image .= ' zc="' . tep_output_string($zc) . '"'; 
    }    
    
    if (tep_not_null($parameters)) $image .= ' ' . $parameters;

    $image .= ' border="0" alt="' . tep_output_string($alt) . '"';

    if (tep_not_null($alt)) {
        $image .= ' title="' . tep_output_string($alt) . '"';
    }

    $image .= '/>';   

    return $image; 
}