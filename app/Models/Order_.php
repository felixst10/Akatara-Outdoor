<?php

namespace App\Models;

class Order
{
    private static $post_tes = [
        [
        "title"     => "Judul 1",
        "slug"      => "judul-pertama",
        "Author"    => "Anonim 1",
        "body"      => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
        Consequuntur, nulla sit quaerat alias voluptas laudantium quas? Praesentium quibusdam, 
        quis itaque officia temporibus iste odit ipsam quia labore quae cupiditate autem 
        dignissimos pariatur quasi exercitationem culpa ullam eveniet consectetur, 
        fugiat deleniti aliquam fugit soluta. Obcaecati eum ipsum animi. 
        Perferendis porro deserunt facilis iure illum. Distinctio, eligendi animi, 
        quasi nostrum reprehenderit architecto voluptate nam tenetur modi nihil iste. 
        Nesciunt, nobis praesentium? Quaerat in aliquam veritatis sapiente corrupti error 
        tenetur officiis maiores, ullam, voluptatem iusto quam. Ab, quibusdam, laudantium 
        dolorem earum autem soluta totam commodi tempore inventore deserunt vitae! Ea dolorem 
        rem impedit!"
        ],
        [
            "title"     => "Judul 2",
            "slug"      => "judul-kedua",
            "Author"    => "Anonim 2",
            "body"      => "afjafkhkjfhkjdshfkjdshkjfhsdjkfhksdjnfjksdvkjdjv"
            ],
        ];

        public static function all()
        {
            return collect(self::$post_tes);
        }

        public static function find($slug)
        {
            $order = static::all();
            
            //$orders = [];
            //foreach($order as $tes){
            //    if ($tes["slug"] === $slug) {
            //        $orders = $tes;
            //    }
            //}
            return $order -> firstwhere('slug', $slug);
        }
}
