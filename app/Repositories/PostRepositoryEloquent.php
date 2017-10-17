<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PostRepository;
use App\Entities\Post;
use App\Validators\PostValidator;

/**
 * Class PostRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PostRepositoryEloquent extends BaseRepository implements PostRepository
{
//    protected $model;
//
//    public function __construct(Post $model)
//    {
//        $this->model = $model;
//    }
//    protected $request;
//
//    public function __construct(Request $request)
//    {
//        $this->request = $request;
//    }

//    protected $Post;
//
//    public function __construct(Post $Post){
//        $this->Post = $Post;
//    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Post::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PostValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function all ($columns = ['*'])  //['title','body'])
    {
//        $columns = is_array($columns) ? $columns : func_get_args();
//
//        $instance = new static;
//
//        return $instance->newQuery()->get($columns); //1

        // return $this->model->rankedAll($columns);  //2

        return Post::all(); //3

    }
}
