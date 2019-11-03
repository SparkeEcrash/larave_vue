<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
		protected $fillable = ['title', 'body'];
    public function user() {
			return $this->belongsTo(User::class);
		}
		public function setTitleAttribute($value) {
			//this funtion gets auto run when setting the title attribute when first creating the model instance
			$this->attributes['title'] = $value;
			$this->attributes['slug'] = Str::slug($value);
		}
		public function getUrlAttribute() {
			//this function gets auto run when trying to get $question->url 
			return route("questions.show", $this->id);
		}
		public function getCreatedDateAttribute() {
			//this function gets auto run when trying to get $question->created_date
			//diffForHumans formats the date value into readable form for how long ago it was
			return $this->created_at->diffForHumans();
			// $this->created_at->format("d/m/Y")
		}
}
