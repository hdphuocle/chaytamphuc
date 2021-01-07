<?php namespace PhuocLe\Related\Components;

use Cms\Classes\ComponentBase;
use RainLab\Blog\Models\Post;

use Cms\Classes\CodeBase;
use RainLab\User\Facades\Auth;
use Request;
use Exception;
use PhuocLe\Related\Models\Settings;
use ValidationException;
use Flash;
use DB;
use Validator;
use Input;
use PhuocLe\Contest\Models\ContestImages;
use PhuocLe\Contest\Models\Votes;

class Related extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Related Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function onRun()
    {
        $this->related= $this->page['related'] = $this->getRelated();
    }

    public function __construct(CodeBase $cmsObject = null, array $properties = [])
    {
        parent::__construct($cmsObject, $properties);

        $this->addCss("/plugins/phuocle/related/assets/main.css", "1.0.0");

    }

    public function defineProperties()
    {
        return [
            'slug' => [
                'description' => 'Post slug',
                'title'       => 'Slug',
                'default'     => ':slug',
                'type'        => 'string'
            ]
        ];
    }

    public function getRelated(){

        if($this->property('slug')){

            $slug = $this->property('slug');
            $limit = Settings::get('number_posts');

            if(!$limit || $limit < 1){
                $limit = 3;
            }

            $post = Post::where('slug',$slug)->first();

            $firstCategory = $post->categories()->first();

            $posts = $firstCategory->posts()
                ->where('slug', '!=', $slug)
                ->where('id', '!=', $post->id)
                ->limit($limit)
                ->get();

            return $posts;
        }else{
            return null;
        }
    }


}
