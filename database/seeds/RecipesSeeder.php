<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class RecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblrecipes')->insert([
            'recipes_image' => 'recipe_images\recipe1540525173.jpg',
            'recipes_title' => 'Cách Làm Tôm Xào Rau Củ Chua Ngọt',
            'recipes_short_title' => 'Món tôm xào chua ngọt với các loại rau củ không chỉ tạo nên màu sắc bắt mắt, mùi vị lại còn rất hấp dẫn đưa cơm. Nếu còn loay hoay chưa biết nấu gì với những con tôm tươi ngon nhà bạn thì đây chính là một gợi ý tuyệt vời nhé!',
            'recipes_content' => '<h2><strong>* Nguy&ecirc;n liệu</strong></h2>

<p><img alt="" src="assets/images/nguyenlieu.jpg" /></p>

<h2><strong>Bước 1</strong></h2>

<p>T&ocirc;m tươi mua về lột bỏ đầu, vỏ v&agrave; chỉ lưng. D&ugrave;ng dao cắt dọc sống lưng để khi nấu l&ecirc;n t&ocirc;m cong lại nh&igrave;n đẹp mắt hơn. Đem rửa sạch, thấm kh&ocirc; rồi ướp với 1/3 quả trứng g&agrave; đ&aacute;nh tan, 1 muỗng canh bột năng rồi trộn đều.</p>

<p><img alt="" src="assets/images/b11.jpg" /> <img alt="" src="assets/images/b12.jpg" /> <img alt="" src="assets/images/b13.jpg" /></p>

<h2><strong>Bước 2</strong></h2>

<p>Bắc chảo dầu n&oacute;ng, cho t&ocirc;m v&agrave;o chi&ecirc;n gi&ograve;n rồi vớt ra, cho v&agrave;o dĩa c&oacute; l&oacute;t giấy thấm dầu.</p>

<p><img alt="" src="assets/images/b21.jpg" /> <img alt="" src="assets/images/b22.jpg" /></p>

<h2><strong>Bước 3</strong></h2>

<p>Ớt chu&ocirc;ng xanh đỏ, h&agrave;nh t&acirc;y v&agrave; thơm cắt miếng vừa ăn. Nấu nồi nước s&ocirc;i, cho c&aacute;c loại rau củ v&agrave;o trụng sơ rồi vớt ra cho v&agrave;o t&ocirc; nước đ&aacute; lạnh, mục đ&iacute;ch để giữ được m&agrave;u sắc đẹp hơn khi x&agrave;o.</p>

<p><img alt="" src="assets/images/b31.jpg" /> <img alt="" src="assets/images/b32.jpg" /> <img alt="" src="assets/images/b33.jpg" /></p>

<h2><strong>Bước 4</strong></h2>

<p>H&agrave;nh l&aacute; cắt lấy phần đầu h&agrave;nh, cho v&agrave;o phi thơm với 1 muỗng canh dầu ăn. Cho th&ecirc;m c&aacute;c loại rau củ, nước cốt me, đường, hạt n&ecirc;m rồi x&agrave;o l&ecirc;n cho rau củ thấm gia vị. Th&ecirc;m v&agrave;o 1 muỗng canh bột năng pha lo&atilde;ng để tạo độ s&aacute;nh cho nước x&agrave;o. Đổ th&ecirc;m t&ocirc;m v&agrave;o trộn đều l&agrave; ho&agrave;n tất m&oacute;n t&ocirc;m x&agrave;o rau củ chua ngọt ngon l&agrave;nh rồi.</p>

<p><img alt="" src="assets/images/b41.jpg" /> <img alt="" src="assets/images/b42.jpg" /> <img alt="" src="assets/images/b43.jpg" /> <img alt="" src="assets/images/b44.jpg" /></p>

<h2><strong>Bước 5</strong></h2>

<p>M&oacute;n t&ocirc;m x&agrave;o chua ngọt với c&aacute;c loại rau củ kh&ocirc;ng chỉ tạo n&ecirc;n m&agrave;u sắc bắt mắt, m&ugrave;i vị lại c&ograve;n rất hấp dẫn đưa cơm. Nếu c&ograve;n loay hoay chưa biết nấu g&igrave; với những con t&ocirc;m tươi ngon nh&agrave; bạn th&igrave; đ&acirc;y ch&iacute;nh l&agrave; một gợi &yacute; tuyệt vời nh&eacute;! T&ocirc;m x&agrave;o chua ngọt d&ugrave;ng với cơm n&oacute;ng trong những bữa trưa h&egrave; n&oacute;ng bức th&igrave; c&ograve;n g&igrave; ngon hơn nữa n&agrave;o!</p>

<p><img alt="" src="assets/images/b51.jpg" /> <img alt="" src="assets/images/b52.jpg" /> <img alt="" src="assets/images/b53.jpg" /></p>',
            'recipes_status' => 1,
            'recipes_food_id' => 1,
            'recipes_user_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('tblrecipes')->insert([
            'recipes_image' => 'recipe_images\recipe1540526082.jpeg',
            'recipes_title' => 'Cách làm gà sốt cam chua ngọt',
            'recipes_short_title' => 'Cánh gà chiên vốn là một món ăn đơn giản và dễ ăn, từ trẻ em đến người lớn đều thích, nay được biến tấu một chút với nước sốt chua ngọt nhè nhẹ và thơm nồng từ những trái cam tươi.',
            'recipes_content' => '<p>Nội dung b&agrave;i viết</p>

<p><strong>+ Nguy&ecirc;n liệu ướp bao gồm:</strong></p>

<p>C&aacute;nh g&agrave;(3 c&aacute;i), nước tương(3 muỗng canh),muối(1 muỗng c&agrave; ph&ecirc;), tỏi(20gr), dầu h&agrave;o(1 muỗng canh), ti&ecirc;u(1 muỗng c&agrave; ph&ecirc;).</p>

<p><strong>+Nguy&ecirc;n liệu phần sốt cam: </strong></p>

<p>Cam(1 quả), nước tương(1 muống canh), chanh(1/2 quả), đường n&acirc;u(1/2 muỗng canh).</p>

<p><strong>+C&aacute;c bước thực hiện:&nbsp;</strong></p>

<p><strong>Bước 1:</strong></p>

<p>&nbsp; &nbsp;Trộn c&aacute;c nguy&ecirc;n liệu phần ướp gồm tỏi, nước tương, dầu h&agrave;o, muối v&agrave; ti&ecirc;u. C&aacute;nh g&agrave; chặt th&agrave;nh từng kh&uacute;c, rửa sạch sau đ&oacute; ướp với sốt trong v&ograve;ng &iacute;t&nbsp;nhất.</p>

<p><strong>Bước 2:</strong></p>

<p>&nbsp; &nbsp;L&agrave;m n&oacute;ng chảo với một &iacute;t dầu. Chi&ecirc;n c&aacute;nh g&agrave; đến khi v&agrave;ng đều 2 mặt th&igrave; vớt ra để &aacute;o. Cam vắt lấy nước cốt. Sau đ&oacute; cho to&agrave;n bộ phần nguy&ecirc;n liệu sốt&nbsp;cam v&agrave;o chảo đun s&ocirc;i th&igrave; cho c&aacute;nh g&agrave; v&agrave;o, giảm lửa v&agrave; đun liu riu cho c&aacute;nh g&agrave; thấm sốt v&agrave; nước đặc lại. B&agrave;o vụn vỏ cam, v&agrave; rắc k&egrave;m với một &iacute;t h&agrave;nh&nbsp;l&aacute; l&ecirc;n tr&ecirc;n.</p>

<p><strong>Bước 3:</strong></p>

<p>&nbsp; &nbsp; Cam vắt lấy nước cốt. Sau đ&oacute; cho to&agrave;n bộ phần nguy&ecirc;n liệu sốt cam v&agrave;o chảo đun s&ocirc;i th&igrave; cho c&aacute;nh g&agrave; v&agrave;o, giảm lửa v&agrave; đun liu riu cho c&aacute;nh g&agrave; thấm&nbsp;sốt v&agrave; nước đặc lại. B&agrave;o vụn vỏ cam, v&agrave; rắc k&egrave;m với một &iacute;t h&agrave;nh l&aacute; l&ecirc;n tr&ecirc;n.</p>

<p>&nbsp; Vậy l&agrave; đ&atilde; c&oacute; một đĩa g&agrave; sốt cam chua ngọt cho bữa ăn gia đ&igrave;nh bạn.</p>',
            'recipes_status' => 1,
            'recipes_food_id' => 1,
            'recipes_user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('tblrecipes')->insert([
            'recipes_image' => 'recipe_images\recipe1540527093.jpg',
            'recipes_title' => 'Cách làm mì xào hải sản hấp dẫn',
            'recipes_short_title' => 'Mì xào hải sản là món ăn khá đơn giản và rất được ưa chuộng của người Việt Nam, sự kết hợp của mì với sự ngon ngọt của hải sản, thêm một ít rau giúp món ăn thêm thơm ngon mà còn chống ngán nữa.',
            'recipes_content' => '<p><strong>* Nguy&ecirc;n liệu:</strong></p>

<ul>
    <li>T&ocirc;m tươi&nbsp;200&nbsp;gr,&nbsp; Mực&nbsp;200&nbsp;gr,&nbsp; Cải th&igrave;a&nbsp;200&nbsp;gr,&nbsp; C&agrave; rốt&nbsp;1/2&nbsp;củ,&nbsp; H&agrave;nh t&iacute;m&nbsp;2&nbsp;củ,&nbsp; Ng&ograve; r&iacute;&nbsp;50&nbsp;gr,&nbsp; M&igrave; t&ocirc;m&nbsp;2&nbsp;g&oacute;i,&nbsp; Tỏi&nbsp;1&nbsp;củ,&nbsp; H&agrave;nh t&acirc;y&nbsp;1&nbsp;củ</li>
    <li>Hạt n&ecirc;m&nbsp;1&nbsp;muỗng c&agrave; ph&ecirc;,&nbsp; Nước tương&nbsp;2&nbsp;muỗng c&agrave; ph&ecirc;,&nbsp; Muối&nbsp;1/2&nbsp;muỗng c&agrave; ph&ecirc;,&nbsp; Ti&ecirc;u&nbsp;1/2&nbsp;muỗng c&agrave; ph&ecirc;,&nbsp; Dầu ăn&nbsp;2&nbsp;muỗng canh</li>
</ul>

<p><strong>* C&aacute;c bước thực hiện:</strong></p>

<p><strong>Bước 1:</strong></p>

<p>&nbsp; &nbsp;T&ocirc;m l&agrave;m sạch vỏ v&agrave; loại bỏ phần chỉ đen dọc s&oacute;ng lưng của t&ocirc;m. Mực rửa sạch v&agrave; cắt kh&uacute;c vừa ăn. Để cho t&ocirc;m với mực thật r&aacute;o nước trước khi x&agrave;o.</p>

<p><strong>Bước 2:</strong></p>

<p>&nbsp; Rau cải ng&acirc;m với nước muối v&agrave; rửa sạch sau đ&oacute; th&igrave; cắt kh&uacute;c khoảng 5 cm. C&agrave; rốt th&igrave; c&aacute;c th&agrave;nh miếng mỏng v&ugrave;a ăn, c&oacute; thể cắt th&agrave;nh b&ocirc;ng hoa. H&agrave;nh tay cắt th&agrave;nh m&uacute;i cau.</p>

<p><strong>Bước 3:</strong></p>

<p>&nbsp;&nbsp;M&igrave; t&ocirc;m ng&acirc;m nước lạnh khoảng 10 ph&uacute;t cho m&igrave; nở. Kh&ocirc;ng cần rụng sơ v&igrave; sẽ l&agrave;m m&igrave; mềm v&agrave; m&igrave; nở sẽ rất nhanh, như vậy sẽ kh&ocirc;ng ngon.</p>

<p><strong>Bước 4:</strong></p>

<p>&nbsp;&nbsp;Phi thơm h&agrave;nh băm trong chảo với m&ocirc;t &iacute;t dầu rồi cho hải sản v&agrave;o x&agrave;o ch&iacute;n, t&ocirc;m v&agrave; mực sau khi đ&atilde; ch&iacute;n th&igrave; cho rau v&agrave;o x&agrave;o, khi rau gần ch&iacute;n th&igrave; n&ecirc;m gia vị cho vừa ăn th&igrave; cho m&igrave; v&agrave;o x&agrave;o chung. X&agrave;o tới khi n&agrave;o m&igrave; thấm gia vị v&agrave; trộn đều với rau v&agrave; hải sản l&agrave; được. L&uacute;c đ&oacute; th&igrave; rau cũng vừa ch&iacute;n tới l&agrave; tắt bếp. Cho m&igrave; ra dĩa v&agrave; cho ng&ograve; v&agrave; m&ocirc;t &iacute;t ti&ecirc;u l&ecirc;n tr&ecirc;n cho th&ecirc;m thơm ngon nha.</p>',
            'recipes_status' => 1,
            'recipes_food_id' => 1,
            'recipes_user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('tblrecipes')->insert([
            'recipes_image' => 'recipe_images\recipe1540527886.jpg',
            'recipes_title' => 'Cách nấu cháo tim cật',
            'recipes_short_title' => 'Món cháo tim cật lạ miệng, ngon mà không ngán, lại cung cấp nguồn dinh dưỡng dồi dào, sẽ rất thích hợp để bạn làm bữa ăn dặm cho các bé biếng ăn.',
            'recipes_content' => '<p>* Nguy&ecirc;n liệu:</p>

<ul>
    <li>Tim heo&nbsp;150&nbsp;gr</li>
    <li>Cật heo&nbsp;150&nbsp;gr</li>
    <li>Gạo tẻ&nbsp;100&nbsp;gr</li>
    <li>H&agrave;nh l&aacute;&nbsp;2&nbsp;c&acirc;y</li>
    <li>H&agrave;nh t&iacute;m băm&nbsp;2&nbsp;muỗng c&agrave; ph&ecirc;</li>
    <li>Muối&nbsp;1/2&nbsp;muỗng c&agrave; ph&ecirc;</li>
    <li>Nước mắm&nbsp;2&nbsp;muỗng c&agrave; ph&ecirc;</li>
    <li>Hạt n&ecirc;m&nbsp;1&nbsp;muỗng c&agrave; ph&ecirc;</li>
    <li>Ti&ecirc;u&nbsp;1&nbsp;muỗng c&agrave; ph&ecirc;</li>
</ul>

<p>* C&aacute;c bước thực hiện:</p>

<p><strong>Bước 1:</strong></p>

<p>&nbsp;&nbsp;Tim v&agrave; cật heo đem rửa sạch, đối với cật heo c&aacute;c bạn bổ đ&ocirc;i, lọc bỏ hết m&agrave;ng trắng ph&iacute;a trong cho đỡ m&ugrave;i h&ocirc;i. Th&aacute;i tim, cật th&agrave;nh từng miếng mỏng vừa ăn. Uớp c&ugrave;ng h&agrave;nh t&iacute;m băm, ch&uacute;t nước mắm, hạt n&ecirc;m cho đậm đ&agrave;.</p>

<p><strong>Bước 2:</strong></p>

<p>&nbsp;&nbsp;Gạo vo sạch, cho v&agrave;o nồi, đổ nước ngập rồi nấu ch&iacute;n nhừ th&agrave;nh ch&aacute;o.</p>

<p><strong>Bước 3:</strong></p>

<p>&nbsp;&nbsp;Khi hạt gạo đ&atilde; nở bung th&igrave; n&ecirc;m nếm lại gia vị cho vừa ăn.</p>

<p><strong>Bước 4:</strong></p>

<p>&nbsp; Bắc chảo l&ecirc;n bếp, đun n&oacute;ng dầu ăn rồi tr&uacute;t phần tim cật v&agrave;o đảo nhanh tay, x&agrave;o ch&iacute;n rồi x&uacute;c ra b&aacute;t.</p>

<p><strong>* Lưu &yacute;:</strong>&nbsp;Khi ăn, m&uacute;c ch&aacute;o trắng ra t&ocirc;, cho tim cật heo l&ecirc;n tr&ecirc;n, rắc h&agrave;nh l&aacute; v&agrave; ti&ecirc;u xay cho thơm rồi thưởng thức.</p>',
            'recipes_status' => 1,
            'recipes_food_id' => 1,
            'recipes_user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('tblrecipes')->insert([
            'recipes_image' => 'recipe_images\recipe1540528555.jpg',
            'recipes_title' => 'Cách làm thịt ba chỉ rang tôm',
            'recipes_short_title' => 'Thịt ba chỉ rang tôm thật ngon cơm đấy, kèm chút rau xà lách sẽ rất tuyệt. Cuối tuần hãy vào bếp tạo sự bất ngờ cho gia đình bạn nhé!',
            'recipes_content' => '<p><strong>* Nguy&ecirc;n liệu:</strong></p>

<ul>
    <li>Thịt ba chỉ&nbsp;300&nbsp;gr,&nbsp; T&ocirc;m tươi&nbsp;300&nbsp;gr,&nbsp; H&agrave;nh t&iacute;m băm&nbsp;2&nbsp;muỗng c&agrave; ph&ecirc;,&nbsp; Đường trắng&nbsp;1&nbsp;muỗng canh,&nbsp; Nước mắm&nbsp;2&nbsp;muỗng canh</li>
    <li>Nước m&agrave;u&nbsp;1/2&nbsp;muỗng c&agrave; ph&ecirc;,&nbsp; Dầu ăn&nbsp;1&nbsp;muỗng canh,&nbsp; Ti&ecirc;u&nbsp;1/2&nbsp;muỗng c&agrave; ph&ecirc;,&nbsp; Muối&nbsp;1/2&nbsp;muỗng c&agrave; ph&ecirc;,&nbsp; Tỏi băm&nbsp;1&nbsp;muỗng c&agrave; ph&ecirc;</li>
</ul>

<p><strong>* C&aacute;c bước thực hiện:</strong></p>

<p><strong>Bước 1:</strong></p>

<p>&nbsp;&nbsp;T&ocirc;m r&uacute;t chỉ đen, rửa sạch, thấm kh&ocirc; với t&ocirc;m trứng loại nhỏ, n&ecirc;n để cả vỏ, chỉ cần cắt r&acirc;u, b&oacute;c, b&oacute;p sạch đất tr&ecirc;n đầu t&ocirc;m. X&oacute;c t&ocirc;m với 1/2 muỗng c&agrave; ph&ecirc; muối cho đậm đ&agrave;.</p>

<p><strong>Bước 2:</strong></p>

<p>&nbsp;&nbsp;Thịt ba chỉ rửa sạch, cắt miếng vừa ăn. H&agrave;nh l&aacute; rửa sạch, cắt nhỏ.</p>

<p><strong>Bước 3:</strong></p>

<p>&nbsp;&nbsp;Cho dầu ăn v&agrave;o chảo, phi thơm h&agrave;nh tỏi băm. Khi bắt đầu c&oacute; m&ugrave;i thơm của h&agrave;nh tỏi phi (kh&ocirc;ng đợi đến l&uacute;c h&agrave;nh tỏi chuyển v&agrave;ng) th&igrave; cho thịt v&agrave;o đảo đều (để lửa to). Đợi thịt hết m&agrave;u đỏ th&igrave; cho t&ocirc;m v&agrave;o đảo c&ugrave;ng thịt.</p>

<p><strong>Bước 4:</strong></p>

<p>&nbsp;&nbsp;Khi t&ocirc;m chuyển sang m&agrave;u đỏ v&agrave; hơi săn lại th&igrave; cho 2 muỗng canh nước mắm, 1/2 muỗng c&agrave; ph&ecirc; nước m&agrave;u, 1 muỗng canh đường. Đảo đều cho t&ocirc;m v&agrave; thịt ngấm vị mặn ngọt từ mắm, đường v&agrave; nước m&agrave;u. Để lửa to, đảo đều tay đến khi nước cạn c&ograve;n sền sệt.</p>

<p><strong>Bước 5:</strong></p>

<p>&nbsp;&nbsp;Rắc h&agrave;nh l&aacute; cắt nhỏ v&agrave;o rồi tắt bếp. M&uacute;c thịt ba chỉ rang t&ocirc;m ra đĩa, l&agrave;m m&oacute;n mặn ăn với cơm.</p>',
            'recipes_status' => 1,
            'recipes_food_id' => 1,
            'recipes_user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('tblrecipes')->insert([
            'recipes_image' => 'recipe_images\recipe1540529006.jpeg',
            'recipes_title' => 'Cách làm Thịt bò xào cải thìa',
            'recipes_short_title' => 'Đổi món cho bữa ăn gia đình thêm màu sắc và ngon miệng hơn cả nhà nhé. Món ngon bổ và rất lạ miệng. Thịt bò rau cải quyện vào nhau làm cho món ăn không ngán.',
            'recipes_content' => '<p><strong>*Nguy&ecirc;n liệu:</strong></p>

<ul>
    <li>Thịt b&ograve;&nbsp;200&nbsp;gr,&nbsp; Dầu ăn&nbsp;2&nbsp;muỗng canh,&nbsp; Dầu h&agrave;o&nbsp;2&nbsp;muỗng canh,&nbsp; Cải th&igrave;a&nbsp;500&nbsp;gr</li>
    <li>Ti&ecirc;u&nbsp;1&nbsp;muỗng c&agrave; ph&ecirc;,&nbsp; Tỏi băm&nbsp;9&nbsp;gr,&nbsp; Hạt n&ecirc;m&nbsp;2&nbsp;muỗng c&agrave; ph&ecirc;,&nbsp; Muối&nbsp;1/2&nbsp;muỗng c&agrave; ph&ecirc;</li>
</ul>

<p><strong>* C&aacute;c bước thực hiện:</strong></p>

<p><strong>Bước 1:</strong></p>

<p>&nbsp; Thịt b&ograve; rửa sạch, th&aacute;i mỏng, rau rửa sạch với nước muối, tỏi băm nhuyển.</p>

<p><strong>Bước 2:</strong></p>

<p>&nbsp;&nbsp;Ướp thịt với 1/2 muỗng ti&ecirc;u xay, 1 muỗng c&agrave; ph&ecirc; hạt n&ecirc;m, 3gr tỏi băm, muối, 1 muỗng canh dầu ăn đảo đều cho gia vị ngấm v&agrave;o thịt khoảng 10 ph&uacute;t. Chuẩn bị chảo n&oacute;ng phi 3gr tỏi cho v&agrave;ng thơm, cho thịt b&ograve; v&agrave;o đảo đều tay lửa lớn cho thịt ch&iacute;n t&aacute;i v&agrave; đưa ra đĩa.</p>

<p><strong>Bước 3:</strong></p>

<p>&nbsp;&nbsp;Bắc tiếp chảo l&ecirc;n phi thơm 3gr tỏi băm v&agrave; cho rau cải th&igrave;a v&agrave;o x&agrave;o, cho th&ecirc;m 2 muỗng dầu h&agrave;o, 1 muỗng hạt n&ecirc;m đảo đều cho rau ch&iacute;n tới, bỏ thịt b&ograve; v&agrave;o đảo khoảng 2 ph&uacute;t l&agrave; ch&iacute;n.</p>

<p><strong>Bước 4:</strong></p>

<p>&nbsp;&nbsp;Nhắc chảo xuống v&agrave; tr&igrave;nh b&agrave;y l&ecirc;n đĩa chuẩn bị cho bữa cơm th&ocirc;i.</p>',
            'recipes_status' => 1,
            'recipes_food_id' => 1,
            'recipes_user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('tblrecipes')->insert([
            'recipes_image' => 'recipe_images\recipe1540529614.jpg',
            'recipes_title' => 'Cánh gà nướng mật ong đơn giản',
            'recipes_short_title' => 'Cánh gà nướng mật ong đơn giản khi nướng theo hướng dẫn sau đây thì giúp bạn có được món cánh gà nướng ngon, thịt chín dai béo, dai gà màu bánh mật ong không bị cháy khét đâu nhé!',
            'recipes_content' => '<p><strong>* Nguy&ecirc;n liệu:</strong></p>

<ul>
    <li>C&aacute;nh g&agrave;&nbsp;800&nbsp;gr</li>
    <li>Mật ong&nbsp;2&nbsp;muỗng canh</li>
    <li>Gia vị ướp m&oacute;n nướng&nbsp;70&nbsp;gr(Gia vị g&agrave; nướng)</li>
</ul>

<p><strong>* C&aacute;c bước thực hiện:</strong></p>

<p><strong>Bước 1:</strong></p>

<p>&nbsp;&nbsp;C&aacute;nh g&agrave; mua về rửa sạch, thấm kh&ocirc; nước, d&ugrave;ng nĩa x&acirc;m l&ecirc;n da g&agrave; cho dễ ng&acirc;m gia vị. Tiếp đến cho c&aacute;nh g&agrave; v&agrave;o thố lớn, th&ecirc;m 70g gia vị ướp g&agrave; nướng ho&agrave;n chỉnh, d&ugrave;ng tay xoa b&oacute;p đều cho c&aacute;nh g&agrave; ngấm, bảo quản tủ lạnh khoảng 24 giờ. Sau đ&oacute;, xếp c&aacute;nh g&agrave; ra rack nướng.</p>

<p><strong>Bước 2:</strong></p>

<p>&nbsp;&nbsp;Đặt rack c&aacute;nh g&agrave; v&agrave;o l&ograve; nướng, c&oacute; l&oacute;t sẵn khay hứng mỡ ph&iacute;a dưới. Nướng c&aacute;nh g&agrave; ở 180 độ C trong khoảng 45 ph&uacute;t. Trong qu&aacute; tr&igrave;nh nướng nhớ phết mật ong l&ecirc;n tr&ecirc;n c&aacute;nh g&agrave; nh&eacute;! Tổng l&agrave; 2 lần phết đấy!</p>

<p>&nbsp;</p>',
            'recipes_status' => 1,
            'recipes_food_id' => 1,
            'recipes_user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('tblrecipes')->insert([
            'recipes_image' => 'recipe_images\recipe1540530137.jpg',
            'recipes_title' => 'Bánh mì nướng hình hoa hồng',
            'recipes_short_title' => 'Một tuyệt chiêu cho các chị em có thể khiến các bé cảm thấy hứng thú với bữa sáng hơn bằng món Bánh mì nướng hình hoa hồng xinh xắn, đẹp mắt.',
            'recipes_content' => '<p><strong>* Nguy&ecirc;n liệu:</strong></p>

<ul>
    <li>Bột m&igrave;&nbsp;250&nbsp;gr,&nbsp; Trứng g&agrave;&nbsp;1&nbsp;quả,&nbsp; Sữa tươi c&oacute; đường&nbsp;130&nbsp;ml,&nbsp; Bơ&nbsp;43&nbsp;gr</li>
    <li>Men nở&nbsp;3&nbsp;gr,&nbsp; Đường trắng&nbsp;50&nbsp;gr,&nbsp; Muối&nbsp;1&nbsp;gr,&nbsp; Dừa nạo&nbsp;35&nbsp;gr(Sấy kh&ocirc;)</li>
</ul>

<p><strong>* C&aacute;c bước thực hiện:</strong></p>

<p><strong>Bước 1:</strong></p>

<p>&nbsp;&nbsp;Cho v&agrave;o m&aacute;y nhồi bột b&aacute;nh m&igrave; gồm: 250g bột m&igrave;, 1 quả trứng g&agrave;, 115ml sữa tươi kh&ocirc;ng đường, 30g đường 3g men nở, 1g muối, khởi động m&aacute;y cho nhồi th&agrave;nh khối khoảng 15 ph&uacute;t. Sau đ&oacute; th&ecirc;m tiếp bơ đ&atilde; được l&agrave;m mềm v&agrave;o, nhồi tiếp th&agrave;nh khối đồng nhất trong 15 ph&uacute;t.</p>

<p><strong>Bước 2:</strong></p>

<p>&nbsp;&nbsp;Cho khối bột đ&atilde; nh&agrave;o v&agrave;o trong một t&ocirc; lớn, bọc m&agrave;ng thực phẩm, ủ cho bột nở gắp đ&ocirc;i.</p>

<p><strong>Bước 3:</strong></p>

<p>&nbsp;&nbsp;Trong 1 t&ocirc; sạch kh&aacute;c cho v&agrave;o 35g dừa nạo sấy kh&ocirc;, 20g bơ mềm, 20g đường v&agrave; 15ml sữa tươi kh&ocirc;ng đường, d&ugrave;ng spatula trộn đều rồi d&ugrave;ng tay nhồi quyện đều. Sau đ&oacute; chia hỗn hợp th&agrave;nh 6 phần đều nhau v&ecirc; tr&ograve;n (khoảng 15g/phần).</p>

<p><strong>Bước 4:</strong></p>

<p>&nbsp;&nbsp;Bột sau khi ủ cũng chia đều 6 phần v&ecirc; tr&ograve;n. Ấn dẹp vi&ecirc;n bột, cho vi&ecirc;n dừa v&agrave;o giữa, bọc k&iacute;n lại. Sau đ&oacute; d&ugrave;ng ch&agrave;y c&aacute;n mỏng.</p>

<p><strong>Bước 5:</strong></p>

<p>&nbsp;&nbsp;D&ugrave;ng 1 cay tăm rạch những đường ch&eacute;o song song c&aacute;ch nhau khoảng 1cm l&ecirc;n miếng bột. Lưu &uacute; sao cho độ s&acirc;u chỉ đến 1/2 độ d&agrave;y miếng bột th&ocirc;i nh&eacute;! Sau đ&oacute; cuộn tr&ograve;n lại như chảo gi&ograve;.</p>

<p><strong>Bước 6:</strong></p>

<p>&nbsp;&nbsp;Tiếp đến cuộn tr&ograve;n lại th&agrave;nh h&igrave;nh hoa. Đem đặt v&agrave;o khay nướng ủ tiếp cho bột nở khoảng 30-45 ph&uacute;t. Đ&aacute;nh tan l&ograve;ng đỏ trứng, phết đều l&ecirc;n mặt b&aacute;nh.</p>

<p><strong>Bước 7:</strong></p>

<p>&nbsp;&nbsp;Cho b&aacute;nh v&agrave;o l&ograve; nướng ở 165 độ C trong khoảng 20 ph&uacute;t l&agrave; b&aacute;nh ch&iacute;n nh&eacute;! Cho b&aacute;nh ra rack đợi hơi nguội l&agrave; c&oacute; thể d&ugrave;ng.</p>

<p>&nbsp;</p>

<p>&nbsp;</p>',
            'recipes_status' => 1,
            'recipes_food_id' => 1,
            'recipes_user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('tblrecipes')->insert([
            'recipes_image' => 'recipe_images\recipe1540537015.jpg',
            'recipes_title' => 'Salad bò rau củ',
            'recipes_short_title' => 'Salad bò rau củ với sự kết hợp của nhiều loại rau quả tươi mát, ngon ngon và rất tốt cho hệ tiêu hóa cũng như cơ thể của chúng ta. Cách làm món salad này rất đơn giản và dễ, đặc biệt chị em còn có thể tận dụng và kết hợp nhiều loại rau khác nhau vào đấy. Nhanh tay lưu lại ngay công thức món salad này và làm ăn trong bữa cơm gia đình nha.',
            'recipes_content' => '<p><strong>*Nguy&ecirc;n liệu:</strong></p>

<p><em><strong>+Phần nước sốt:</strong></em></p>

<ul>
    <li>Ớt băm(1&nbsp;muỗng c&agrave; ph&ecirc;),&nbsp; Tỏi băm (1&nbsp;muỗng c&agrave; ph&ecirc;), Siro đường (1&nbsp;muỗng canh),&nbsp;Nước mắm (2&nbsp;muỗng canh), Nước cốt chanh (3&nbsp;muỗng canh), Dầu olive (1&nbsp;muỗng canh)</li>
</ul>

<p><em><strong>+Phần rau trộn:</strong></em></p>

<ul>
    <li>C&agrave; chua bi (7&nbsp;tr&aacute;i), H&agrave;nh t&acirc;y (1/2&nbsp;củ), H&uacute;ng quế (5&nbsp;gr), L&aacute; bạc h&agrave; (5&nbsp;gr), Ng&ograve; t&acirc;y (5&nbsp;gr), Hạt điều rang (20&nbsp;gr), Thịt b&ograve; (360&nbsp;gr)</li>
</ul>

<p><em><strong>* C&aacute;c bước thực hiện:</strong></em></p>

<p><strong>Bước 1:</strong></p>

<p>&nbsp;&nbsp;Nước sốt: cho ớt tỏi băm, 1 muỗng siro đường, 2 muỗng nước mắm, 3 muỗng nước cốt chanh, 1 muỗng dầu olive v&agrave;o ch&eacute;n, khuấy đều. C&agrave; chua rửa sạch, cắt nhỏ. Ng&ograve;, h&uacute;ng quế, l&aacute; bạc h&agrave; xắt nhuyễn. Mở l&ograve; nướng trước ở 230 độ, cho thịt l&ecirc;n vỉ nướng khoảng 4 - 6 ph&uacute;t, lật mặt v&agrave; nướng th&ecirc;m 4 - 6 ph&uacute;t nữa th&igrave; được. Độ ch&iacute;n của thịt b&ograve; t&ugrave;y theo sở th&iacute;ch của bạn nha. Nếu kh&ocirc;ng nướng bạn c&oacute; thể &aacute;p chảo thịt b&ograve;.</p>

<p><strong>Bước 2:</strong></p>

<p>&nbsp;&nbsp;Thịt sau khi nướng ch&iacute;n th&igrave; lấy ra, cắt th&agrave;nh l&aacute;t mỏng. Sau đ&oacute; cho thịt b&ograve;, c&agrave; chua, rau c&aacute;c loại, h&agrave;nh t&acirc;y v&agrave;o t&ocirc; rồi rưới nước sốt l&ecirc;n v&agrave; trộn thật đều nha. Cuối c&ugrave;ng gắp salad ra dĩa v&agrave; thưởng thức th&ocirc;i n&egrave;.</p>

<p><strong>Bước 3:</strong></p>

<p>&nbsp;&nbsp;Salad b&ograve; trộn rau củ thanh đạm, tươi m&aacute;t v&agrave; gi&agrave;u chất xơ tốt cho đường ti&ecirc;u h&oacute;a cũng như cơ thể. Thịt b&ograve; được l&agrave;m ch&iacute;n mềm theo sở th&iacute;ch ăn k&egrave;m với c&agrave; chua, h&uacute;ng quế thơm lừng gi&uacute;p m&oacute;n ăn ngon miệng hơn.&nbsp;</p>',
            'recipes_status' => 1,
            'recipes_food_id' => 1,
            'recipes_user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('tblrecipes')->insert([
            'recipes_image' => 'recipe_images\recipe1540538168.jpg',
            'recipes_title' => 'Bánh tráng cuốn tôm và nước chấm đậu phộng',
            'recipes_short_title' => 'Bánh tráng cuốn tôm là một món ăn truyền thống của người Việt, có rất nhiều cách làm nhưng với công thức bánh tráng cuốn tôm và nước chấm đậu phộng này, mình sẽ kết hợp cả 2 nền văn hóa Đông - Tây khiến cho món ăn cực kì lạ vị. Bạn đã sẵn sàng để trải nghiệm chưa nào?',
            'recipes_content' => '<p><em>* Nguy&ecirc;n liệu:</em></p>

<ul>
    <li>B&aacute;nh tr&aacute;ng&nbsp;(14&nbsp;c&aacute;i), T&ocirc;m tươi&nbsp;11&nbsp;con(Luộc), B&uacute;n tươi (50&nbsp;gr), X&agrave; l&aacute;ch (7&nbsp;l&aacute;), Bạc h&agrave; (14&nbsp;l&aacute;), Gi&aacute; đỗ (1&nbsp;ch&eacute;n), Bơ đậu phộng (1&nbsp;muỗng canh)&nbsp;</li>
    <li>Sốt hoisin (2&nbsp;muỗng canh), Nước cốt chanh (2&nbsp;muỗng canh), Sữa tươi (1/3&nbsp;ch&eacute;n), Tỏi băm (1&nbsp;t&eacute;p), Ớt băm (1/2&nbsp;muỗng c&agrave; ph&ecirc;)</li>
</ul>

<p><em>* C&aacute;c bước thực hiện:</em></p>

<p><strong>Bước 1:</strong></p>

<p>Chuẩn bị v&agrave; l&agrave;m sạch c&aacute;c nguy&ecirc;n liệu. T&ocirc;m luộc ch&iacute;n, bỏ vỏ. Khi cuốn b&aacute;nh, bạn cho gi&aacute; đỗ, b&uacute;n, x&agrave; l&aacute;ch cuốn lại trước rồi mới cho phần ấy l&ecirc;n một tấm b&aacute;nh tr&aacute;ng ướt kh&aacute;c, xếp t&ocirc;m, l&aacute; bạc h&agrave; l&ecirc;n, gấp 2 b&ecirc;n lại, cuốn lại chặt tay như h&igrave;nh.</p>

<p><strong>Bước 2:</strong></p>

<p>Pha nước chấm đậu phộng: Cho nước cốt chanh, bơ đậu phộng, sốt hoisin, tỏi băm, ớt băm, sữa tươi trộn đều với nhau trong một c&aacute;i b&aacute;t. Bạn c&oacute; thể rắc th&ecirc;m đậu phộng gi&atilde; giập l&ecirc;n cho đ&uacute;ng điệu nh&eacute;.</p>

<p><strong>Bước 3:</strong></p>

<p>Thưởng thức th&ocirc;i n&agrave;o. Chỉ với những thao t&aacute;c đơn giản l&agrave; bạn đ&atilde; c&oacute; ngay m&oacute;n ăn thơm ngon cho gia đ&igrave;nh m&igrave;nh thưởng thức rồi, nhớ chấm c&ugrave;ng sốt đậu phộng để cảm nhận sự tinh tế đến từ đ&ocirc;i tay kh&eacute;o l&eacute;o của bạn nh&eacute;!</p>',
            'recipes_status' => 1,
            'recipes_food_id' => 1,
            'recipes_user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
