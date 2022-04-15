<?php

use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('infos')->insert([
            'image' => 'karine_davtyan.jpg',
            'instagram_link' => 'https://www.instagram.com/',
            'pinterest_link' => 'https://www.pinterest.com/',
            'v_link' => '',
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, esse quas eligendi nisi iusto vitae ipsa iste pariatur, consequuntur numquam animi nesciunt eius obcaecati dolorem amet fuga, in voluptates vel accusamus blanditiis odit nobis fugiat deleniti expedita? Doloremque minus provident animi corporis dolor. Eaque tempore cupiditate at? Veniam modi ducimus amet iusto libero eum eveniet, dolores architecto dolor hic nulla cupiditate maxime accusamus natus, reprehenderit iure delectus ab, voluptas minus. Assumenda provident ducimus quos, numquam odio ullam, quo error id sapiente nihil voluptatibus velit cupiditate eaque expedita eveniet vitae repellat fuga praesentium eum itaque maiores voluptates consectetur. Earum beatae error voluptas velit unde maxime, eaque corporis inventore nisi cumque nulla animi possimus veniam officia, qui nam, hic fugit. Exercitationem deleniti iure accusamus quibusdam cum voluptas hic temporibus explicabo vel facilis odit expedita optio quaerat laudantium suscipit, doloremque nemo culpa ipsa harum sit. Ullam temporibus voluptate fugiat illum debitis, nostrum non.Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, esse quas eligendi nisi iusto vitae ipsa iste pariatur, consequuntur numquam animi nesciunt eius obcaecati dolorem amet fuga, in voluptates vel accusamus blanditiis odit nobis fugiat deleniti expedita? Doloremque minus provident animi corporis dolor. Eaque tempore cupiditate at? Veniam modi ducimus amet iusto libero eum eveniet, dolores architecto dolor hic nulla cupiditate maxime accusamus natus, reprehenderit iure delectus ab, voluptas minus. Assumenda provident ducimus quos, numquam odio ullam, quo error id sapiente nihil voluptatibus velit cupiditate eaque expedita eveniet vitae repellat fuga praesentium eum itaque maiores voluptates consectetur. Earum beatae error voluptas velit unde maxime, eaque corporis inventore nisi cumque nulla animi possimus veniam officia, qui nam, hic fugit. Exercitationem deleniti iure accusamus quibusdam cum voluptas hic temporibus explicabo vel facilis odit expedita optio quaerat laudantium suscipit, doloremque nemo culpa ipsa harum sit. Ullam temporibus voluptate fugiat illum debitis, nostrum non.',
        ]);
    }
}
