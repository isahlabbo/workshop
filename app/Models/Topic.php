<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends BaseModel
{
    public function subTopics()
    {
        return $this->hasMany(SubTopic::class);
    }

    public function topicAllocations()
    {
        return $this->hasMany(TopicAllocation::class);
    }

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function week()
    {
        return $this->belongsTo(Week::class);
    }

    public function practicals()
    {
        return $this->hasMany(Practical::class);
    }
    
}
