<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    // Get methods
    public function getIndex()
    {
        $arrayPeliculas = Movie::all();
        return view("catalog.index", ["arrayPeliculas" => $arrayPeliculas]);
    }
    public function getShow($id)
    {
        $p = Movie::findOrFail($id);
        $stateMsg = ($p['rented']) ? "Pelicula actualmente alquilada" : "Pelicula disponible";
        return view("catalog.show", ["peli" => $p, "estado" => $stateMsg, "id" => $id]);
    }
    public function getCreate()
    {
        return view("catalog.create");
    }
    public function getEdit($id)
    {
        $p = Movie::findOrFail($id);
        return view("catalog.edit", ["peli" => $p]);

    }

    // Post methods
    public function postCreate(Request $req)
    {
        $mov = new Movie();
        $post = $req->post();

        $mov->title = $post['title'];
        $mov->year = $post['year'];
        $mov->director = $post['director'];
        $mov->poster = $post['poster'];
        $mov->synopsis = $post['synopsis'];

        $mov->save();
        return redirect("/catalog");
    }

    // Put methods
    public function putEdit($id, Request $req)
    {
        $mov = Movie::findOrFail($id);
        $post = $req->post();

        $mov->title = $post['title'];
        $mov->year = $post['year'];
        $mov->director = $post['director'];
        $mov->poster = $post['poster'];
        $mov->synopsis = $post['synopsis'];

        $mov->save();
        return redirect("/catalog/show/$id");
    }
    public function putRent($id)
    {
        $mov = Movie::findOrFail($id);
        $mov->rented = true;
        $mov->save();
        return redirect("/catalog/show/$id")->with('msg', 1);
    }
    public function putReturn($id)
    {
        $mov = Movie::findOrFail($id);
        $mov->rented = false;
        $mov->save();
        return redirect("/catalog/show/$id")->with('msg', 1);
    }

    // Delete methods
    public function deleteMovie($id)
    {
        Movie::findOrFail($id)->delete();
        return redirect("/catalog");
    }
}
