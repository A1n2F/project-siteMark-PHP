<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLinkRequest $request)
    {
        /** @var User $user */
        $user = auth()->user();
            
        $user->links()->create($request->validated());

        // $novoNome = md5(rand());
        // $extensao = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        // $imagem = "images/$novoNome.$extensao";

        // move_uploaded_file($_FILES['image']['tmp_name'], '../' . $imagem);

        return to_route('dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        //
    }
}
