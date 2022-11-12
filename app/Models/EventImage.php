<?php

namespace App\Models;

    /*
      Attendize.com   - Event Management & Ticketing
     */

/**
 * Description of EventImage.
 *
 * @author Dave
 */
class EventImage extends MyBaseModel
{
    //put your code here.

    public function banner_image_path()
     {
      $banner_url = str_replace(config('attendize.event_images_path'), config('attendize.event_banners_path'),$this->image_path);
      $banner_url = str_replace('event_image','event_banner',$this->image_path);

      return $banner_url;
     }
}
