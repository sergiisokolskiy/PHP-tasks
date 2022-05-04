<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Repositories\BlogCommentRepository;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Symfony\Component\Console\Input\Input;

class CommentController extends BaseController
{
    /**
     * @var BlogPostRepository
     */
    private $blogCommentRepository;

    public function __construct()
    {
        parent::__construct();

        $this->blogCommentRepository = app(BlogCommentRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $comment = Comment::latest()->get();
       // $comment = $this->blogCommentRepository->getAllWithPaginate();
        //$post_id = Input::where('id')->get();

        //  $data = Comment::all();
        /*$new = $id;
        dd($new);
        $data['post_id'] = $new;
        $comment = Comment::add($data);*/


        return view('blog.comments.list', compact('comment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $comment = new Comment(); //создаем пустой объект класса

        $comment['post_id'] = $request->post_id;

        if ($request->input('parent_id') !== NULL) {
            $comment['parent_id'] = $request->parent_id;
        }


        return view('blog.post.edit', compact('comment'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->input();

       $comment = new Comment($data);

        $comment->save();
        if( $request->input('parent_id') == NULL) {

            $comment['parent_id'] = 0;
           // dd($comment['id'],"id",$comment['parent_id'] ,"parent_id");
        } else {
           // dd("parent_id",$request->input('parent_id'));
            //$comment['parent_id']=$request->input('parent_id') ;
        }
        $comment->save();

        if($comment) {
            return redirect()->route('blog.comments.edit', [$comment->id])
                -> with(['success'=>'Успешно сохранено']);
        } else {
            return back() -> withErrors(['msg'=> 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // Вывод комментов по конкретному post_id

        $comment = Comment::where('post_id', $id)->get();

        $post_id= $id;

        $com = Comment::where('post_id', $id)->orderBy('parent_id', 'asc')->get()->groupBy('parent_id');

        return view('blog.comments.comments_block', compact('comment','post_id','com'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        //$comment = Comment::find($id);
        $comment = $this->blogCommentRepository->getEdit($id);

        $post_id = $comment['post_id'];


        //ПРоверяем есть ли конкретный комментарий
       if(empty($comment)) {
            abort(404);
        }

        return view('blog.post.edit', compact('comment','post_id'));
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
       // $comment = $this->blogPostRepository->getEdit($id);

        $comment = Comment::find($id);


        /* if (empty($comment)) {
            return back()
                ->withErrors(['msg' => "Запись id = [{$id}] не найдена"])
                ->withInput();
        }
*/

        $data = $request->all();

        /* Ушло в обсервер



        if (empty($item->published_at) && $data['is_published']) {
            $data['published_at'] = Carbon::now());
        }
        */

        $result = $comment->update($data);
        if ($result) {
            return redirect()
                ->route('blog.comments.edit', $comment->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      dd($request,$id);
       $result = Comment::destroy($id);

       //полное удаление из БД
        //$result = Comment::find($id)->forceDelete();

       if ($result) {
           return redirect()
               ->route('blog.comments.show')
               ->with(['success'=> "Комментарий id[$id] удален"]);
       } else {
           return back()->withErrors(['msg' => 'Ошибка удаления']);
       }

    }

}
