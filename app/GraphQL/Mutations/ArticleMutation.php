<?php

namespace App\GraphQL\Mutations;

use App\Models\Article;

final class ArticleMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
    }

    public function store($_, array $request)
    {
        return request()->user()->articles()->create($request);
    }

    public function update($_, array $request)
    {
        $article =  Article::findOrFail($request['id']);

        $article->update($request);

        return $article;
    }

    public function destroy($_, array $args)
    {
        $article = Article::findOrFail($args['id']);

        $article->delete();

        return $article;
    }
}
