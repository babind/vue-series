<?php
namespace App;
 
trait FavorableTrait 
{

	public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps(); 
    }
    
    public function isFavorited()
    {
        return $this->favorites()->where('user_id', auth()->id())->count() > 0;
    }
     
    public function getIsFavoritedAttribute()
    {
        return $this->isFavorited();
    }
    
    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }

}