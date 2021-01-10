<?php namespace Tallpro\Related\Components;

use Cms\Classes\ComponentBase;
use RainLab\Blog\Models\Post;
use Tallpro\Related\Models\Settings;

class NewPost extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'NewPost Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function onRun()
    {
        $this->new_post = $this->page['new_post'] = $this->getNewPost();
    }

    public function defineProperties()
    {
        return [
        ];
    }

    public function getNewPost()
    {

        $limit = Settings::get('number_new_posts');

        if (!$limit || $limit < 1) {
            $limit = 3;
        }
        $posts = Post::orderBy('published_at', 'DESC')
            ->limit($limit)
            ->get();

        return $posts;

    }
}
