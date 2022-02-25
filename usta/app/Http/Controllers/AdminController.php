<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Match;
use function Sodium\add;

class AdminController extends Controller
{
    public function getHome() {
        return view('admin.home');
    }

    public function postHome(Request $request) {
        $event = new Match();
        $event->location = $request['location'];
        $event->start = $request['start'];
        $event->capacity=$request['capacity'];
        $event->save();


        return redirect()->route('admin.home');
    }

    public function getMatches($match_id = null) {


        $matches = Match::all();
        $match = null;

        if ($match_id != null) {
            $match = Match::where('id',$match_id)->first();
        }

        return view('admin.matches', [
            'matches' => $matches,
            'match' => $match
        ]);
    }

    public function postMatches(Request $request) {

        $match = Match::where('id',$request->match_id)->first();

        foreach ($match->user as $user) {
            $rules[$user->id] = 'required|numeric';
        }
        $rules['score_home'] = 'required|numeric';
        $rules['score_away'] = 'required|numeric';

        //$this->validate($request, $rules);

        if (isset($request['goals'])) {
            $playerq = $request['goals'];
            foreach ($playerq as $playerid => $value) {
                $player = User::find($playerid);
                $player->match()->updateExistingPivot($match->id, [
                    'goals' => $value
                ]);
            }
            $playerq = $request['assists'];
            foreach ($playerq as $playerid => $value) {
                $player = User::find($playerid);
                $player->match()->updateExistingPivot($match->id, [
                    'assists' => $value
                ]);
            }
            $playerq = $request['saves'];
            foreach ($playerq as $playerid => $value) {
                $player = User::find($playerid);
                $player->match()->updateExistingPivot($match->id, [
                    'saves' => $value
                ]);
            }
        }

        $updateStats = false;
        if($match->status == 'open' && $request['status'] == 'finished') {
            $updateStats = true;
        }

        $match->score_home = $request['score_home'];
        $match->score_away = $request['score_away'];
        $match->status = $request['status'];

        //updates ranking of players after match has been closed
        if ($updateStats) {
            foreach ($match->user as $user) {
                if ($user->team == "home") {
                    if ($match->score_home > $match->score_away) {
                        $user->mmr++;
                        $user->save();
                    }
                } else {
                    if ($match->score_away > $match->score_home) {
                        $user->mmr++;
                        $user->save();
                    }
                }
                if ($user->team == "home") {
                    if ($match->score_home < $match->score_away) {
                        $user->mmr--;
                        $user->save();
                    }
                } else {
                    if ($match->score_away < $match->score_home) {
                        $user->mmr--;
                        $user->save();
                    }
                }
            }
        }

        $match->save();

        return redirect()->route('admin.matches');
    }

    public function getPlayers($player_id = null)
    {
        $users = User::all();
        $player = null;

        if($player_id != null) {
            $player = User::where('id','=',$player_id)->first();
        }

        return view('admin.players', [
            'users' => $users,
            'player' => $player
        ]);
    }

    public function postPlayers(Request $request) {

        $user = User::where('id','=',$request['player_id'])->first();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->mmr = $request['mmr'];
        $user->age = $request['age'];
        $user->isAdmin = $request['isAdmin'];
        $user->update();

        return redirect()->route('admin.players');
    }

    public function deleteUser(Request $request) {

        $user = User::where('id', '=',$request['id'])->first();
        if ($user->isAdmin == 0) {
            $user->delete();
        }

        return redirect()->route('admin.players');
    }

    public function getGallery() {

        $images = Media::all();

        return view('admin.gallery', [
            'images' => $images
        ]);

    }

    public function postGallery(Request $request) {

        if ($request['action'] == "delete") {
            $deleteq = $request['delete'];
            foreach ($deleteq as $deleteitem) {
                $media = Media::where('id', $deleteitem);
                $media->delete();
            }
        } else {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images/'), $imageName);

            $img = new Media();
            $img->path = "/images/".$imageName;
            $img->pathToThumb = "/images/".$imageName;
            $img->user_id = Auth::user()->id;
            $img->save();
        }

        return redirect()->route('admin.gallery');
    }
}
