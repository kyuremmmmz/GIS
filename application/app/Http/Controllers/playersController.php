<?php

namespace App\Http\Controllers;

use App\Models\player_rankings;
use App\Models\players;
use Illuminate\Http\Request;

class playersController extends Controller
{
    public function players()
    {
        $players = players::select('*')->orderBy('teamname', 'ASC')->get();
        return view('players', compact('players'));
    }

    public function createPlayers(Request $request, players $create)
    {
        $data = $request->validate(['id'=>'required',
                                    'name' => 'required',
                                    'teamname' => 'required|string',
                                    'age'=>'required|integer']);

        $create = players::create($data);

        return redirect()->back()->with('status', 'success');


    }


    public function CreatePlayerRankings(Request $request)
    {
        $playersRanks = $request->validate([
            'name'=>'required',
            'points'=>'required',
            'age'=>'required|integer',
            'id'=>'required|integer',
            'teamname'=>'required|string',
        ]);

        $create = player_rankings::create($playersRanks);

        return redirect()->back()->with('status', 'success');
    }
    public function viewEdit(players $playerNumber)
    {
        return view('PlayersEdit', ['playerNumber' => $playerNumber]);
    }


    public function editPlayers(Request $request, players $players)
    {
        $data = $request->validate(['id'=>'required',
                                    'name' => 'required',
                                    'teamname' => 'required|string',
                                    'age'=>'required|integer']);
        $players->update($data);
        return redirect(route('playersList', ['playerNumber'=>$players]))->with('success', 'Successfully updated players');
    }

    public function delete_data(players $delete)
    {
        $delete->delete();
        return redirect(route('playersList'))->with('success', 'Successfully deleted players');
    }

//PLAYER RANKINGS CONTROLLER
        public function seeRankings()
        {
            $players = player_rankings::select('*')->orderBy('points', 'desc')->get();
            return view('playerRankings', compact('players'));
        }

        public function createRanking(Request $request)
        {
            $data = $request->validate([
                'name'=>'required',
                'points'=>'required',
                'age'=>'required|integer',
                'playerID'=>'required|integer',
                'teamname'=>'required|string',
            ]);

            $createData = player_rankings::create($data);
            return redirect()->back()->with('status', 'success');
        }

        public function seeRankingsEdit(player_rankings $id)
        {
            return view('playerRankingsEdit', ['id'=>$id]);
        }

        public function updatePlayerRankings(Request $request, player_rankings $id)
        {
            $updatedata = $request->validate([
                'name'=>'required',
                'points'=>'required',
                'age'=>'required|integer',
                'playerID'=>'required|integer',
                'teamname'=>'required|string',
            ]);
            $id->update($updatedata);

            return redirect()->route('viewRankings', ['id'=>$id])->with('status', 'Updated Successfully');
        }

        public function deletaPlayerRankings(player_rankings $rankings)
        {
            $rankings->delete();
            return redirect(route('viewRankings'))->with('status', 'Deleted Successfully');
        }

        public function search(Request $request)
                {
                    if($request->ajax()) {
                        $query = $request->get('search');
                        $players = players::where('name', 'LIKE', '%'.$query.'%')
                            ->orWhere('teamname', 'LIKE', '%'.$query.'%')
                            ->orWhere('id', 'LIKE', '%'.$query.'%')
                            ->orWhere('age', 'LIKE', '%'.$query.'%')
                            ->get();

                        $output = '';

                        if (count($players) > 0) {
                            foreach ($players as $index => $player) {
                                $output .= '
                                <tr>
                                    <td>'.($index + 1).'</td>
                                    <td>'.$player->name.'</td>
                                    <td>'.$player->teamname.'</td>
                                    <td>'.$player->id.'</td>
                                    <td>'.$player->age.'</td>
                                    <td><a href="'.route('viewEdit', ['playerNumber'=>$player]).'" class="btn btn-primary">Edit</a></td>
                                    <td>
                                        <form action="'.route('destroy', ['delete'=>$player]).'" method="post">
                                            '.csrf_field().'
                                            '.method_field('delete').'
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>';
                            }
                        } else {
                            $output = '<tr><td colspan="7">No results found</td></tr>';
                        }

                        return $output;
                    }
                }

                public function searchh(Request $request)
                        {
                            if ($request->ajax()) {
                                $query = $request->get('search');
                                $players = player_rankings::where('name', 'LIKE', '%'.$query.'%')
                                    ->orWhere('teamname', 'LIKE', '%'.$query.'%')
                                    ->orWhere('id', 'LIKE', '%'.$query.'%')
                                    ->orWhere('age', 'LIKE', '%'.$query.'%')
                                    ->get();

                                $output = '';

                                if (count($players) > 0) {
                                    foreach ($players as $index => $player) {
                                        $output .= '
                                        <tr>
                                            <td>'.($index + 1).'</td>
                                            <td>'.$player->name.'</td>
                                            <td>'.$player->teamname.'</td>
                                            <td>'.$player->playerID.'</td>
                                            <td>'.$player->points.'</td>
                                            <td>'.$player->age.'</td>
                                            <td><a href="'.route('editPlayerRankings', ['id' => $player->id]).'" class="btn btn-primary">Edit</a></td>
                                        </tr>';
                                    }
                                } else {
                                    $output = '<tr><td colspan="7">No results found</td></tr>';
                                }

                                return response()->json($output);
                            }
                        }


}
