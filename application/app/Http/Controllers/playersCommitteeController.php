<?php

namespace App\Http\Controllers;

use App\Models\player_rankings;
use App\Models\players;
use Illuminate\Http\Request;

class playersCommitteeController extends Controller
{
    public function seePlayersComittee()
    {
        $players = players::select('*')->orderBy('teamname', 'ASC')->get();
        return view('comittee/playersComittee', compact('players'));
    }

    public function createPlayersComittee(Request $request)
    {
        $data = $request->validate([
            'id'=>'required',
            'name' => 'required',
            'teamname' => 'required|string',
            'age'=>'required|integer'
        ]);

        $createData = players::create($data);
        return redirect()->back()->with('create', 'Created Successfully');
    }

    public function editPlayers(players $data)
    {
        return view('comittee/editPlayers', ['data' => $data]);
    }

    public function updatePlayers(Request $request, players $data)
    {
        $dataUpdate = $request->validate([
                        'id'=>'required',
                        'name' => 'required',
                        'teamname' => 'required|string',
                        'age'=>'required|integer']);
        $data->update($dataUpdate);
        return redirect()->route('comitteePlayers', ['data'=>$data] )->with('status', 'Updated Successfully');
    }

    public function deleteData(players $data)
    {
        $data->delete();
        return redirect()->back();
    }

    public function seePlayerRanks()
    {
        $id = player_rankings::select('*')->orderBy('points', 'desc')->get();
        return view('comittee/playersRanking', ['id' => $id]);
    }

    public function createPlayerRanking(Request $request, player_rankings $create)
    {
        $data = $request->validate([
            'name'=>'required',
            'points'=>'required',
            'age'=>'required|integer',
            'playerID'=>'required|integer',
            'teamname'=>'required|string',
        ]);

        $create = player_rankings::create($data);

        return redirect()->back()->with('status', ''.$create.' has created successfully');
    }


    public function seeEditPlayersRanking(player_rankings $data)
    {
        return view('comittee/editPlayersRanking ', ['data'=>$data]);
    }


    public function editPlayerRankings(Request $request, player_rankings $data)
    {
        $updateData = $request->validate([
                        'name'=>'required',
                        'points'=>'required',
                        'age'=>'required|integer',
                        'playerID'=>'required|integer',
                        'teamname'=>'required|string',
                        ]);
        $data->update($updateData);
        return redirect()->route('seePlayerRanks', ['data' => $data]);
    }

    public function searchPlayers(Request $request)
    {
        if($request->ajax()) {
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
                        <td>'.$player->teamname.'</td>
                        <td>'.$player->name.'</td>
                        <td>'.$player->id.'</td>
                        <td>'.$player->age.'</td>
                        <td><a href="'.route('editPlayersComittee', ['data'=>$player]).'" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="'.route('deleteComitteePlayers', ['data'=>$player]).'" method="post">
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

            return response()->json($output);
        }
    }

    public function searchPlayerRankings(Request $request)
{
    if ($request->ajax()) {
        $query = $request->get('search');
        $players = player_rankings::where('name', 'LIKE', '%'.$query.'%')
            ->orWhere('teamname', 'LIKE', '%'.$query.'%')
            ->orWhere('playerID', 'LIKE', '%'.$query.'%')
            ->orWhere('points', 'LIKE', '%'.$query.'%')
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
                    <td><a href="'.route('editPlayerRanking', ['data'=>$player]).'" class="btn btn-primary">Edit</a></td>
                </tr>';
            }
        } else {
            $output = '<tr><td colspan="7">No results found</td></tr>';
        }

        return response()->json($output);
    }
}


}
