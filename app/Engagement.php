<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Engagement extends Model
{

    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = true;
    
     protected $fillable = ['intitule','description','etat','source','note','localite','prefecture',
     'sous_prefecture','district','date_debut','date_fin','valider','secteur_id','categorie_id','user_id','slug'];

     /**
          * Return the sluggable configuration array for this model.
          *
          * @return array
          */
         public function sluggable()
         {
             return [
                 'slug' => [
                     'source' => 'intitule'
                 ]
             ];
         }

     /**
     * The relationship.
     *
     * @var array
     */

     public function secteur(){

        return $this->belongsTo('App\Secteur');
    }

    public function categorie(){

        return $this->belongsTo('App\Categorie');
    }

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function etats(){
        return $this->belongsToMany('App\Etat')->withPivot('titre_commentaire', 'commentaire','etat','id')->withTimestamps();

    }
    
    public function commentaires(){
        return $this->hasMany('App\Commentaire');
    }

    public function engagementetats(){
        return $this->hasMany('App\EngagementEtat');
    }

    public function engagementetatsfilter($id){
        return $this->belongsToMany('App\Etats')->wherePivot('etat_id', $id);
    }

}
