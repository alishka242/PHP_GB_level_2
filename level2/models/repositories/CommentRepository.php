<?php

namespace app\models\repositories;

use app\models\entities\Comment;
use app\models\Repository;

class CommentRepository extends Repository
{
    public function getEntityClass()
    {
        return Comment::class;
    }

    public function getTableName()
    {
        return 'comments';
    }
}