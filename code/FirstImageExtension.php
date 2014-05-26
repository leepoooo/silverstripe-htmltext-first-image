<?php

/**
 * Global Automation System S.r.l.
 *
 * Progetto:       marin
 * Data creazione: 26-mag-2014 - 17.45.52
 */

class FirstImageExtension extends Extension {

  public function FirstImage() {
    $pattern = '/<img[^>]+src[\\s=\'"]+([^"\'>\\s]+)/is';
    
    if (preg_match_all($pattern, $this->owner->value, $match)) {
      $href = preg_replace('/_resampled\/resizedimage[0-9]*-/', '', $match[1][0]);
      
      return Image::get()
              ->filter(array(
                  "Filename" => $href
              ))
              ->limit(1)
              ->first();
    }
    
    return null;
  }

}