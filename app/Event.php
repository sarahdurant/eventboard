<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model {

	protected $table = 'events';
    protected $fillable = ['title', 'description', 'startDate', 'endDate', 'organizerID'];
    protected $hidden = ['remember_token'];

		public function scopeDay($query, $date) {
        $firstDate = Carbon::parse($date);
        $lastDate = Carbon::parse($date);
        $lastDate->setTime(23,59,59);


        $query->where('startDate', '>=', $firstDate->toDateTimeString())
            ->where('endDate', '<=', $lastDate->toDateTimeString());

    }
		
		
    public function scopeMonth($query, $date) {
        $firstDate = Carbon::parse($date);
        $lastDate = Carbon::parse($date);
        $firstDate->day = 1;
        $firstDate->setTime(00,00,00);
        $lastDate->day = $lastDate->daysInMonth;
        $lastDate->setTime(23,59,59);


        $query->where('startDate', '>=', $firstDate)
            ->where('endDate', '<=', $lastDate);

    }
		


		
    /**
     * An event may have many tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
