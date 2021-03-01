<?php

namespace BasicTest\Models;

use PHPUnit\Framework\TestCase;
use Basic\Models\PostModel as PostModel;
use Basic\Database\MySqlConnect as MySqlConnect;

class PostModelTest extends TestCase
{
    public function testCreatePost()
    {
        $aPostData = [
            'post_title'   => 'quandoan2sswdsa1',
            'post_content' => 'sdfahfwdgsad',
            $_FILES['my_file']  = array(
                'name'     => 'OIP (1).jfif',
                'type'     => 'image/jpeg',
                'tmp_name' => 'C: \\xampp\\tmp\\php2E51.tmp',
                'error'    => 0,
                'size'     => 11506,
            ),
            'author_id'    => '90',
        ];
        PostModel::createPost(
            $aPostData['post_title'],
            $aPostData['post_content'],
            $_FILES['my_file'],
            $aPostData['author_id'],
        );


        $result = MySqlConnect::connect()
            ->table('posts')
            ->values([
                $aPostData['post_title'],
                $aPostData['post_content'],
                $aPostData['author_id'],
            ])
            ->select();
        $this->assertNotEmpty($result);
        $this->assertGreaterThan(0, count($result));
    }

    public function testGetPost()
    {
        $result = PostModel::getPost();
        $this->assertNotEmpty($result);
        $this->assertGreaterThan(0, count($result));

    }
}
