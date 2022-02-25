<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Match;
use App\Media;
use App\matchComment;
use function Sodium\add;

class UserController extends Controller
{
    public function getHome() {

        $user = Auth::user();

        $goals = 0;
        $assists = 0;
        $saves = 0;

        $most_goals = 0;
        $most_assists = 0;
        $most_saves = 0;



        foreach($user->match as $match) {
            $goals+=$match->pivot->goals;
            if ($match->pivot->goals > $most_goals) {
                $most_goals = $match->pivot->goals;
            }
            $assists+=$match->pivot->assists;
            if ($match->pivot->assists > $most_assists) {
                $most_assists = $match->pivot->assists;
            }
            $saves+=$match->pivot->saves;
            if ($match->pivot->saves > $most_saves) {
                $most_saves = $match->pivot->saves;
            }
        }

        return view('users.home',[
            'user' => $user,
            'goals' => $goals,
            'assists' => $assists,
            'saves' => $saves,
            'most_goals' => $most_goals,
            'most_assists' => $most_assists,
            'most_saves' => $most_saves
        ]);
    }

    public function  getEvents($event_id = null) {

        $events = Match::where('status','=','open')->orderBy('start','desc')->get();
        $nextMatch = Match::where('status','=','open')->orderBy('start')->first();


        $home[] = null;
        $away[] = null;

        $event = null;
        if ($event_id != null) {
            $event = Match::where('id',$event_id)->first();

            $pool = $event->user()->orderBy('mmr','desc')->get()->toArray();
            while($pool) {
                if($pool) {array_push($home, array_shift($pool));}
                if($pool) {array_push($away, array_shift($pool));}
                if($pool) {array_push($home, array_pop($pool));}
                if($pool) {array_push($away, array_pop($pool));}
            }
        } else {
            $pool = $nextMatch->user()->orderBy('mmr','desc')->get()->toArray();

            while($pool) {
                if($pool) {array_push($home, array_shift($pool));}
                if($pool) {array_push($away, array_shift($pool));}
                if($pool) {array_push($home, array_pop($pool));}
                if($pool) {array_push($away, array_pop($pool));}
            }
        }



        return view('users.events', [
            'events' => $events,
            'event' => $event,
            'nextMatch' => $nextMatch,
            'home' => $home,
            'away' => $away
        ]);
    }

    public function postEvents(Request $request) {

        $user = Auth::user();
        $event = Match::where('id','=',$request['event_id'])->first();

        $user->match()->syncWithoutDetaching([$event->id]);
        $user->save();

        return redirect()->route('events', [
            'event_id' => $request['event_id']
        ]);
    }

    public function getMatches($match_id = null) {

        $matches = Match::all();
        $match = null;
        $home = null;
        $away = null;

        if($match_id != null) {
            $match = Match::where('id','=',$match_id)->first();

            $home = $match->user()->where('team','=','home')->get();
            $away = $match->user()->where('team','=','away')->get();

            $title = "Match stats";

        } else {
            $match = Auth::user()->lastMatch->last();

            if($match) {
                $home = $match->user()->where('team','=','home')->get();
                $away = $match->user()->where('team','=','away')->get();
            }

            $title = "My last match";
        }



        return view('users.matches' ,[
            'matches' => $matches,
            'match' => $match,
            'home' => $home,
            'away' => $away,
            'title' => $title
        ]);
    }

    public function postMatchComment(Request $request) {

        $mc = new matchComment();
        $mc->content = $request['comment'];
        $mc->user_id = Auth::user()->id;
        $mc->match_id = $request['match_id'];
        $mc->save();

        return redirect()->route('matches',[
            'match_id' => $request['match_id']
        ]);
    }

    public function getRecords($category = null) {


        $data[] = null;
        $averages[] = null;
        $users = User::all();
        $matches = Match::all();
        $sort = 1;

        if ($category == "goals") {
            $goals = 0;
            foreach ($users as $user) {
                foreach ($user->match as $match) {
                    $goals += $match->pivot->goals;
                }
                $data[$user->name] = $goals;
                if($user->match()->count() > 0) {
                    $averages[$user->name] = $goals / $user->match()->count();
                }
                $goals = 0;
            }
            $desc = "Goals per match";
        }
        elseif ($category == "assists") {
            $assists = 0;
            foreach ($users as $user) {
                foreach ($user->match as $match) {
                    $assists += $match->pivot->assists;
                }
                $data[$user->name] = $assists;
                if($user->match()->count() > 0) {
                    $averages[$user->name] = $assists / $user->match()->count();
                    $assists = 0;
                }
            }
            $desc = "Assists per match";
        }
        elseif ($category == "saves") {
        $saves = 0;
        foreach ($users as $user) {
            foreach ($user->match as $match) {
                $saves += $match->pivot->saves;
            }
            $data[$user->name] = $saves;
            if($user->match()->count() > 0) {
                $averages[$user->name] = $saves / $user->match()->count();
                $saves = 0;
            }
            }
            $desc = "Saves per match";
        }
        elseif ($category == "mmr") {
            $users = User::orderBy('mmr','desc')->get();
            foreach ($users as $user) {
                $data[$user->name] = $user->mmr;
            }
            $desc = "No average data available";
        }
        elseif ($category == "appearances") {
            foreach ($users as $user) {
                $data[$user->name] = $user->match()->count();
                $averages[$user->name] = $user->match()->count() / $matches->count() * 100;
            }
            $desc = "Attendence (%)";
        }
        elseif ($category == "wins") {
            $wins = 0;
            foreach ($users as $user) {
                foreach ($user->match as $match) {
                    if ($user->team == "home") {
                        if ($match->score_home > $match->score_away) {
                            $wins++;
                        }
                    } else {
                        if ($match->score_away > $match->score_home) {
                            $wins++;
                        }
                    }
                }
                $data[$user->name] = $wins;
                if($user->match()->count() > 0) {
                    $averages[$user->name] = $wins / $user->match()->count() * 100;
                }
                $wins = 0;
            }
            $desc = "Winrate (%)";
        }
        else {
            $sort = 0;

            $data["Matches played"] = Auth::user()->match->count();

            $desc = "My averages";
            $data["Max goals"] = Auth::user()->maxGoals();
            $data["Max assists"] = Auth::user()->maxAssists();
            $data["Max saves"] = Auth::user()->maxSaves();
            $data["Total goals"] = Auth::user()->goals();
            $data["Total assists"] = Auth::user()->assists();
            $data["Total saves"] = Auth::user()->saves();

            if(Auth::user()->match->count() > 0) {
                $averages["Avg goals"] = Auth::user()->maxGoals() / Auth::user()->match->count();
                $averages["Avg assists"] = Auth::user()->maxAssists() / Auth::user()->match->count();
                $averages["Avg saves"] = Auth::user()->maxSaves() / Auth::user()->match->count();
            }
        }

        if ($sort) {
            arsort($data);
            arsort($averages);
        }


        return view('users.records' ,[
            'data' => $data,
            'averages' => $averages,
            'description' => $desc
        ]);


    }

    public function getPlayers($player_id = null) {

        $users = User::all();
        $player = Auth::user();

        if ($player_id != null) {
            $player = User::where('id',$player_id)->first();
        }

        return view('users.players',[
            'users' => $users,
            'player' => $player,
        ]);
    }

    public function getGallery() {

        $images = Media::all();

        return view('users.gallery', [
            'images' => $images
        ]);

    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('guestHome');
    }
}
