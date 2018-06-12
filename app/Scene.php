<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scene extends Model
{
    /** Relationships **/
    public function play()
    {
        return $this->belongsTo('App\Play');
    }

    public function characters()
    {
        $this->belongsToMany('App\Character');
    }

    public function lines()
    {
        $this->hasMany('App\Line');
    }
    /** End Relationships **/

    // Create new scene and ensure related stuff is also created
    public function store(Request $request)
    {
    $scene = new Scene;

    $play = null;

    $characters = null;

    try
    {
        // No existing play selected
        if(!$request->filled('play_id'))
        {
            $playwright = null;
            
            // No existing playwright selected
            if(!$request->filled('playwright_id'))
            {
                // Create the new playwright
                DB::transaction(function () {
                    $playwright = new Playwright;
                    $playwright->name = $request->input('playwright_name');
                    $playwright->born = $request->input('playwright_born',null);
                    
                    $playwright->save();
                });
            }
            // Selected existing playwright
            else
            {
                $playwright = App\Playwright::find($request->input('playwright_id'));
            }

            // Create the new play
            DB::transaction(function () {
                $play = new Play;
                $play->title = $request->input('play_title');
                $play->year = $request->input('play_year',null);

                $playwright->plays()->save($play);
            });
        }

        /** By now we have both the playwright and the play in the database **/

        // Check each character to see if it was selected or is new
        foreach ($request->input('characters') as $character) {
            // TODO: Implement character inserts
        }
        
    }
    catch(\Exception $e)
    {
        echo $e->getMessage();
    }
    }
}
