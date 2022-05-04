<?php
namespace App\Repositories;

use App\Models\Comment as Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

/**
 *Class BlogCategoryRepository
 *
 *@package App\Repositories
 */

class BlogCommentRepository extends CoreRepository
{

/**
 * @return string
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
            'content_raw',
            'is_published',
            'published_at',
            'post_id',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id','DESC')

            //->with(['category','user'])
            //2 sposob
            ->with([
                //Для категории можно так
                'post' => function ($query) {
                    $query->select(['id','content_raw']);
                },
            ])
            ->paginate(3);

        return $result;
    }


    /**
     * Получить модель для редактирования в админке
     *
     * @param int $id
     *
     * @return Model
     */

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Получить список категорий для вывода в выпадающем списке
     *
     * @return Collection
     */

    public function getForComboBox()
    {
           $colomns = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS id_title',
        ]);

       /* $result[] = $this->startConditions()->all();
        $result[] = $this
            ->startConditions()
            ->select(DB::raw('blog_categories.*, CONCAT (id, ". ", title) AS id_title '))
            ->toBase()
            ->get();*/

        $result= $this
            ->startConditions()
            ->selectRaw($colomns)
            ->toBase()
            ->get();

        return $result;
    }

}
