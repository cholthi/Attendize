<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionOrder extends Model
{
    public $timestamps = false;

   /* serializes an array and set it has the data field.
   *
   */

    public function setData($session_data)
    {
      $this->data = \serialize($session_data);
    }

    public function getData()
    {
      return \unserialize($this->data);
    }
}
