<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends BaseModel
{
    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function topicAllocation()
    {
        return $this->belongsTo(TopicAllocation::class);
    }

    public function answer()
    {
        $answer = null;

        foreach($this->options  as $option){
            if($option->answer == 1){
                $answer = $option;
            }
        }
        return $answer;
    }
}
