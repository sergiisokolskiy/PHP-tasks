<?php

namespace  App\Repositories;

use App\Models\Post as Model;
//use App\Models\Comment as Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
/**
 * Class BlogPostRepository
 *
 * @package App\Repositories
 */

class BlogPostRepository extends CoreRepository
{
    /**
     *@return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить список статей для вывода в списке
     * (Админка)
     *
     * @return LengthAwarePaginator
     */

    public function getAllWithPaginate()
    {
       $columns = [
           'id',
           'title',
           'is_published',
           'published_at',
           'author_id',
           'category_id',
       ];

       $result = $this->startConditions()
           ->select($columns)
           ->orderBy('id','DESC')

           //->with(['category','user'])
               //2 sposob
           /*->with([
               //Для категории можно так
               'category' => function ($query) {
               $query->select(['id','title']);
               },
               //Для user можно вторым способом
               'author:id,name',
           ])*/
           ->paginate(25);

       return $result;
    }

    /**
     *Получить модель для редактирования в админке
     *
     *@param int $id
     *
     *@return Model
     */

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }


}
