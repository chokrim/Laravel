<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //on va recuperer tout les posts(test)
        //creer une variable ou on met tous les postes
    /*     $posts = Post::all(); */
           $posts = Post::orderBy('created_at','asc')->paginate(2);
        //que ca retourne la vue posts
        /* return view('posts.index'); */
        //retourne la vue de index avec la variable posts qui contient tous les posts
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//cree la vue formulaire
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //elle recupere dans un request tous ce qu'on a mis dans le formulaire et le stocke en BD et renvoie sur la page demandéé
    public function store(Request $request)
    {
        //avant de stocker on veut vérifié quîl y a bien tous les attributs
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);

        //Create a new post
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)//elle doit retourner le post de l'id placer en parametre dans url
    {
        //elle va chercher dans la bd id de url
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //id on recupere l'id et $requeste sert a recupererles infos du formulaire
            //avant de stocker on veut vérifié quîl y a bien tous les attributs
            $this->validate($request,[
                'title' => 'required',
                'body' => 'required'
            ]);
    
            //Create a new post
            $post = Post::find($id);
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->save();
    
            return redirect('/posts')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success','Post Removed');
    }
}
