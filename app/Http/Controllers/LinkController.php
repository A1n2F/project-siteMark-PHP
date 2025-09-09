<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditRequest;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;


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
        // /** @var User $user */
        // $user = auth()->user();
            
        // $user->links()->create($request->validated());

        // // $novoNome = md5(rand());
        // // $extensao = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        // // $imagem = "images/$novoNome.$extensao";

        // // move_uploaded_file($_FILES['image']['tmp_name'], '../' . $imagem);

        // $data = $request->validated();

        // if($file = $request->image) {
        //     $data['image'] = $file->store('images');
        // }

        // $user->fill($data)->save();

         /** @var User $user */
        $user = auth()->user();

        $data = $request->validated();

        if ($file = $request->photo_link) {
            $data['photo_link'] = $file->store('images');
        }

        $user->links()->create($data);

        return to_route('dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        /** @var User $user */
        $user = auth()->user();
        dump(
            $user->can('atualizar', $link),
            $link->photo_link
        );


        return view('links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {

        /** @var User $user */
        $user = auth()->user();

        $data = $request->validated();

        if ($file = $request->photo_link) {
            $data['photo_link'] = $file->store('images');
        }
        
        $link->fill($data)->save();
        
        return to_route('dashboard')->with('message', 'Alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $link->delete();

        return to_route('dashboard')->with('message', 'Deletado com sucesso!');
    }

    public function up(Link $link) {
        $link->moveUp();

        return back();
    }

    public function down(Link $link) {
        $link->moveDown();

        return back();
    }
}
