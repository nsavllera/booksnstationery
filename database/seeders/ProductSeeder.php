<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stationeryCategory = Category::firstOrCreate(['name' => 'Stationery']);
        $booksCategory = Category::firstOrCreate(['name' => 'Books']);

        Product::create([
            'name' => 'SAMPLE BOOK',
            'description' => ' ',
            'price' => 4.30,
            'image' => ' ',
            'category_id' => $booksCategory->id, 
        ]);

        Product::create([
            'name' => 'Faber-Castell Gel Pen RX - 2PC',
            'description' => '2 pc gel pen with smooth writing ink.',
            'price' => 4.30,
            'image' => 'fabercastellrx2pc.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'Faber-Castell Correction Pen 8ML',
            'description' => '8ml correction pen, for clean correction.',
            'price' => 6.00,
            'image' => 'fabercastellcorrection8ml.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'Zhi Xin Gel Ink Pen - 12PC',
            'description' => '1 box of Zhi Xin gel pen, containing 12 pens.',
            'price' => 7.90,
            'image' => 'zhixingelpen12pc.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'M&G 2B Pencil - 12PC',
            'description' => '1 box of M&G 2B pencils, containing 12 pencils.',
            'price' => 7.50,
            'image' => 'mng2bpencil12pc.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'Faber-Castell Dust-Free Eraser',
            'description' => 'Dust-free eraser, for clean and messless correction.',
            'price' => 1.05,
            'image' => 'fabercastelleraser.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'Stabilo Boss Highlighter',
            'description' => 'Neon yellow highlighter.',
            'price' => 3.20,
            'image' => 'stabilobosshighlighter.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'Buncho Poster Colours - 12PC',
            'description' => 'Vibrant poster colours, 12 pieces per box',
            'price' => 20.40,
            'image' => 'bunchopostercolour.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'Staedtler School Scissors',
            'description' => 'Scissors for school use.',
            'price' => 8.90,
            'image' => 'staedtlerscissor.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'Plus Scissors',
            'description' => 'Smooth cut with easy hold. Plus Japan.',
            'price' => 8.40,
            'image' => 'plusscissor.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => ' Multiple Pnes',
            'description' => 'black colour.',
            'price' => 10.50,
            'image' => '1735841066.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'Journal',
            'description' => '200 pages',
            'price' => 30.00,
            'image' => '1735934950.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'Sticky Note',
            'description' => 'Multiple colors in one set.',
            'price' => 25.00,
            'image' => '1735934987.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'Stackable Storage',
            'description' => 'Only in pink colour.',
            'price' => 35.00,
            'image' => '1735935024.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);
        Product::create([
            'name' => 'Skecth Book',
            'description' => '100 pages.',
            'price' => 35.00,
            'image' => '1735935248.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'Washi Tape',
            'description' => 'Vintage washi tape design',
            'price' => 5.00,
            'image' => '1735935314.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'Pastel Colour Highlighter',
            'description' => 'Variety of pastel colour.',
            'price' => 25.00,
            'image' => 'staedtlerscissor.jpg',
            'category_id' => $stationeryCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'Sweet Bean Paste',
            'description' => 'Sweet Bean Paste is a novel about the trauma of discrimination and the stress of living in an unjust society, but the experience of reading it will help you remember the pleasure of being able to readjust your perspective, even if doing so is initially awkward and unpleasant.',
            'price' => 50.00,
            'image' => '1735914610.jpg',
            'category_id' => $booksCategory->id, // Set the category_id
        ]);
        Product::create([
            'name' => 'After Dark',
            'description' => 'In After Dark—a gripping novel of late night encounters—Murakami’s trademark humor and psychological insight are distilled with an extraordinary, harmonious mastery.',
            'price' => 70.00,
            'image' => '1735915236.jpg',
            'category_id' => $booksCategory->id, // Set the category_id
        ]);
        Product::create([
            'name' => 'My Heart and Other Black Holes',
            'description' => 'Sixteen-year-old physics nerd Aysel is obsessed with plotting her own death. With a mother who can barely look at her without wincing, classmates who whisper behind her back, and a father whose violent crime rocked her small town, Aysel is ready to turn her potential energy into nothingness.',
            'price' => 53.00,
            'image' => '1735915313.jpg',
            'category_id' => $booksCategory->id, // Set the category_id
        ]);
        Product::create([
            'name' => 'Girl In Pieces',
            'description' => 'SCharlotte Davis is in pieces. At seventeen she’s already lost more than most people lose in a lifetime. But she’s learned how to forget. The broken glass washes away the sorrow until there is nothing but calm. You don’t have to think about your father and the river. Your best friend, who is gone forever. Or your mother, who has nothing left to give you.',
            'price' => 63.00,
            'image' => '1735915360.jpg',
            'category_id' => $booksCategory->id, // Set the category_id
        ]);
        Product::create([
            'name' => 'The Way I Used To Be',
            'description' => 'All Eden wants is to rewind the clock. To live that day again. She would do everything differently. Not laugh at his jokes or ignore the way he was looking at her that night. And she would definitely lock her bedroom door. But Eden can’t turn back time. So she buries the truth, along with the girl she used to be. She pretends she doesn’t need friends, doesn’t need love, doesn’t need justice. But as her world unravels, one thing becomes clear: the only person who can save Eden … is Eden.',
            'price' => 50.00,
            'image' => '1735915437.jpg',
            'category_id' => $booksCategory->id, // Set the category_id
        ]);

        Product::create([
            'name' => 'All The Bright Placess',
            'description' => 'Theodore Finch is fascinated by death, and he constantly thinks of ways he might kill himself. But each time, something good, no matter how small, stops him. Violet Markey lives for the future, counting the days until graduation, when she can escape her Indiana town and her aching grief in the wake of her sister’s recent death. When Finch and Violet meet on the ledge of the bell tower at school, it’s unclear who saves whom. And when they pair up on a project to discover the “natural wonders” of their state, both Finch and Violet make more important discoveries: It’s only with Violet that Finch can be himself—a weird, funny, live-out-loud guy who’s not such a freak after all. And it’s only with Finch that Violet can forget to count away the days and start living them. But as Violet’s world grows, Finch’s begins to shrink.',
            'price' => 75.00,
            'image' => '1735915507.jpg',
            'category_id' => $booksCategory->id, // Set the category_id
        ]);
        Product::create([
            'name' => 'Days at the Morisaki Bookshop',
            'description' => 'SHidden in Jimbocho, Tokyo, is a booklovers paradise. On a quiet corner in an old wooden building lies a shop filled with hundreds of second-hand books. Twenty-five-year-old Takako has never liked reading, although the Morisaki bookshop has been in her family for three generations. It is the pride and joy of her uncle Satoru, who has devoted his life to the bookshop since his wife Momoko left him five years earlier. When Takakos boyfriend reveals he is marrying someone else, she reluctantly accepts her eccentric uncles offer to live rent-free in the tiny room above the shop. Hoping to nurse her broken heart in peace, Takako is surprised to encounter new worlds within the stacks of books lining the Morisaki bookshop. As summer fades to autumn, Satoru and Takako discover they have more in common than they first thought. The Morisaki bookshop has something to teach them both about life, love, and the healing power of books.',
            'price' => 65.00,
            'image' => '1735915556.jpg',
            'category_id' => $booksCategory->id, // Set the category_id
        ]);
        Product::create([
            'name' => 'Before the Coffee Gets Cold',
            'description' => 'In a small back alley in Tokyo, there is a café which has been serving carefully brewed coffee for more than one hundred years. But this coffee shop offers its customers a unique experience: the chance to travel back in time. In Before the Coffee Gets Cold, we meet four visitors, each of whom is hoping to make use of the café’s time-travelling offer, in order to: confront the man who left them, receive a letter from their husband whose memory has been taken by early onset Alzheimers, to see their sister one last time, and to meet the daughter they never got the chance to know. But the journey into the past does not come without risks: customers must sit in a particular seat, they cannot leave the café, and finally, they must return to the present before the coffee gets cold . . . Toshikazu Kawaguchi’s beautiful, moving story explores the age-old question: what would you change if you could travel back in time? More importantly, who would you want to meet, maybe for one last time?',
            'price' => 50.00,
            'image' => '1735915598.jpg',
            'category_id' => $booksCategory->id, // Set the category_id
        ]);
        Product::create([
            'name' => 'In Five Years',
            'description' => 'When Type-A Manhattan lawyer Dannie Kohan is asked this question at the most important interview of her career, she has a meticulously crafted answer at the ready. Later, after nailing her interview and accepting her boyfriends marriage proposal, Dannie goes to sleep knowing she is right on track to achieve her five-year plan. But when she wakes up, she is suddenly in a different apartment, with a different ring on her finger, and beside a very different man. The television news is on in the background, and she can just make out the scrolling date. Its the same night—December 15—but 2025, five years in the future. After a very intense, shocking hour, Dannie wakes again, at the brink of midnight, back in 2020. She can’t shake what has happened. It certainly felt much more than merely a dream, but she isnt the kind of person who believes in visions. That nonsense is only charming coming from free-spirited types, like her lifelong best friend, Bella. Determined to ignore the odd experience, she files it away in the back of her mind. That is, until four-and-a-half years later, when by chance Dannie meets the very same man from her long-ago vision. Brimming with joy and heartbreak, In Five Years is an unforgettable love story that reminds us of the power of loyalty, friendship, and the unpredictable nature of destiny.',
            'price' => 55.00,
            'image' => '1735915644.jpg',
            'category_id' => $booksCategory->id, // Set the category_id
        ]);
        Product::create([
            'name' => 'Youve Reached Sam',
            'description' => 'SSeventeen-year-old Julie has her future all planned out—move out of her small town with her boyfriend Sam, attend college in the city, spend a summer in Japan. But then Sam dies. And everything changes. Heartbroken, Julie skips his funeral, throws out his things, and tries everything to forget him and the tragic way he died. But a message Sam left behind in her yearbook forces back memories. Desperate to hear his voice one more time, Julie calls Sam’s cellphone just to listen to his voicemail. And Sam picks up the phone. In a miraculous turn of events, Julie’s been given a second chance at goodbye. The connection is temporary. But hearing Sam’s voice makes her fall for him all over again, and with each call it becomes harder to let him go. However, keeping her otherworldly calls with Sam a secret isn’t easy, especially when Julie witnesses the suffering Sam’s family is going through. Unable to stand by the sidelines and watch their shared loved ones in pain, Julie is torn between spilling the truth about her calls with Sam and risking their connection and losing him forever.',
            'price' => 63.00,
            'image' => '1735915688.jpg',
            'category_id' => $booksCategory->id, // Set the category_id
        ]);
    }
}
