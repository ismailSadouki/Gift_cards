<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use DateTime;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'title' => 'PUBG Mobile UC Global, Prepaid Code (6000+2100 UC)',
            'description' => 'PUBG Mobile UC (Global) Prepaid Code',
            'instruction' => '
                PUBG Mobile UC (Global) Prepaid Code
            PUBG Mobile UC (Global) is the in-game currency for PUBG Mobile, also known as Unknown Cash (UC). Purchase in-game crate boxes to unlock weapon skins, clothes, parachutes, and many more with PUBG M UC Redeem Code now!
            How to redeem PUBG Mobile UC Prepaid Code (Global):
            
                1-Visit https://www.midasbuy.com/ot/redeem/pubgm and enter your PUBG Mobile player id.
                2-Enter the code, and then click ok to redeem.
                3-You will receive the UC in your PUBG Mobile account immediately after redemption.
            
            Note: This product is not applicable for China / Japanese / Korean / Taiwan / Vietnam servers.',
            'notes' => 'PUBG M UC (Global) can be used for all servers, except for China, Japan, Korea, Taiwan and Vietnam.',
            'price' => '99.99',
            'cover_image' => 'images/covers/7.webp',
        ]);


        Product::create([
            'title' => 'Garena Shells MY (1000 Shells)',
            'description' => 'Garena Shells MY',
            'instruction' => '
            About Garena Shells (MY)
            
            Garena is a digital services platform that engages in gaming and eSports. Garena allows gamers throughout the world to connects by providing support and maintenance for the Garena Games, and also promoting Garena Shells (MY). One of the many services includes a social platform for individuals to meet, chat, and play games with each other. Garena has seen extraordinary growth, rapidly becoming the leading platform provider for digital services over Southeast Asia, Taiwan, and Hong Kong.
            What is Garena Shells (MY)?
            
            Garena Shells is the online currency of the Garena gaming platform and Garena operated games. Garena users can use their Garena Shells to purchase in-game items, products, and services for Garena Call of Duty, League of Legends, FIFA 3 Online PC, Heroes of Newerth, FIFA 3 Online Mobile, Free Fire, Garena AOV – Arena of Valor, Contra: Return, Speed Drifter and many more.
            How to reload Garena account with Garena Shells?
            
            1- Go to Garena Topup Center.
            2-    Login to your Garena Account.
            3-    Click Shell Top Up and select Garena Prepaid Card.
            4-    Enter your Garena Shell Prepaid Card Password and click Confirm to complete top up.
            
            ',
            'notes' => 'Important Note : Garena Shells Code (Malaysia) sold by SEA Gamer Mall is a region locked product. It\'s only valid for Garena account registered in the region of MALAYSIA. All purchases are NON-REFUNDABLE and NON-RETURNABLE.',
            'price' => '17.31',
            'cover_image' => 'images/covers/2.webp',
        ]);


        Product::create([
            'title' => 'Google Play Gift Card US (100USD)',
            'description' => 'Google Play Gift Card (US)',
            'instruction' => 'About Google Play Gift Card
            Google Play Gift Card is the prepaid top up card for Google Play Balance. It can be redeemed to pay for thousands of books, songs, movies, apps, magazines and many more on Google Play store. 
            PLEASE READ CAREFULLY BEFORE AGREEING TO PURCHASE
            Google Play Gift Card US only valid for account registered in United States, the account\'s default language as English, and product currency note is US Dollar($) 
            
            IP ADDRESS of redemption MUST be done in the United States.
            Due to the region lock, Google will detect the IP address of the code redemption.
            Google will LOCK the code if the code redemption is done outside of US region.
            
            How to Redeem Google Play Gift Card？
            Using android mobile devices
            
            Open Google Play Store app.
            Touch the Menu icon on the top left corner.
            Tap Redeem on the Menu.
            Enter your code to redeem
            
            Using web browser
            
            Go to href="https://play.google.com/redeem" target="_blank">play.google.com/redeem.
            Enter your code to redeem
            
            <br> ',
            'notes' => 'Important Note:Google Play Gift Card (US) sold by SEA Gamer Mall is a region locked product. It\'s only valid for Google Play account registered in the region of UNITED STATES. All purchases are NON-REFUNDABLE and NON-RETURNABLE.',
            'price' => '99.99',
            'cover_image' => 'images/covers/3.webp',
        ]);


        Product::create([
            'title' => 'iTunes Gift Card (100USD)',
            'description' => 'iTunes Gift Card',
            'instruction' => '
            About iTunes Gift Card Digital Prepaid Code
            
            iTunes Gift Card code is redeemable for apps, games, music, movies, TV shows and more on the iTunes Store, App Store, iBooks Store, and the Mac App Store. Recipients can access their content on an iPhone, iPad, or iPod, and watch or listen on a computer – Mac or PC.
            How to redeem iTunes Gift Card Code?
            
            To redeem iTunes Gift Card on your iPhone, iPad, or iPod touch:
            
                On your device, open iTunes Store App.
                Scroll to the bottom of the Featured section and tap Redeem.
                Login with your Apple ID.
                Tap "You can also enter your code manually."
                Enter the 16-digit code, which starts with X, retrievable from My Game Card Page.
                Tap Redeem. After redeem is successful, your iTunes account balance automatically updates.
            
                    To redeem iTunes Gift Card on your Mac:
                        Launch iTunes.
                        Click Sign In. Then enter your Apple ID and password.
                        Click your name. Choose Redeem from the menu.
                        Enter your password again.
                        Enter the 16-digit code, which starts with X, retrievable from My Game Card Page.
                        Click Redeem. After redeem is successful, your iTunes account balance automatically updates.
                    Different country\'s iTunes Gift Card code
            
                    iTunes Gift Cards are country-specific. If you\'re trying to redeem a gift card that was purchased in a different country, make sure that you\'re redeeming it in the same country\'s iTunes Store. You can\'t redeem gift cards outside of the country of purchase. For example, a gift card purchased in the United States can\'t be redeemed in an iTunes Store in Canada.
                    iTunes Gift Card Payment SCAM ALERT:
            
                    DO NOT TRADE iTunes Gift Card as payment for your online purchases or game items! We were alerted by some customers regarding such SCAM. Kindly note that we are NOT associated with any scam websites/forums/person.
            
                    Scam Warning Announcement
            
            ',
            'notes' => '

            Important Note: Apple iTunes Gift Card sold by SEA Gamer Mall is region locked. ONLY for iTunes Account registered in the United States and it is Non-Returnable and Non-Refundable.',
            'price' => '99',
            'cover_image' => 'images/covers/4.webp',
        ]);
        Product::create([
            'title' => 'GASH Card (100USD)',
            'description' => 'Gash Card',
            'instruction' => 'What is the Gash Card MY - HK beanfun exchange rate?

            Important note: Exchange rate may change daily depending on forex exchange rate.',
            'notes' => '马来西亚GASH點',
            'price' => '100',
            'cover_image' => 'images/covers/5.webp',
        ]);
        Product::create([
           
            'title' => 'Twitch Gift Card (100USD)',
            'description' => 'Twitch Gift Card',
            'instruction' => '
            About Twitch Gift Card US
            
            Twitch Gift Card US is now available on SEAGM.com. They are available in $20, $25, $50, $100 and $200 denominations.
            
            Twitch is where millions of people come together live every day to chat, interact, and make their own entertainment together. Twitch gift cards are the perfect gift for anyone who watches Twitch. Gift Card will allow recipients to elevate their Twitch viewing experience with:
            
            What\'s live? Everything: Esports tournaments? Yep. Cooking shows? Got \'em. Some guy in a chicken suit with a trumpet? We wouldn\'t be surprised.
            
            Whatever you\'re into, it\'s on Twitch: Watch esports pros, catch a live tour of Tokyo, or learn how to bake. There\'s always something live and new on Twitch.
            
            Play your part: Streamers kick it all off, but you can help decide what happens next. With chat, emotes, and more, this party bus goes where you steer it.
            
            Find your squad: Chat, laugh, and bond together. It\'s like sharing one couch with thousands of friends.
            
            Support streamers: Use Bits to interact with your favorite streamers, unlock exclusive badges and emotes with a sub, or gift subs to spread the love to friends and communities.
            Instant Twitch Gift Card USD Delivery
            
            Receive your Twitch Gift Card USD instantly! Once you have selected the right amount for your Twitch Gift Card USD prepaid card, simply choose from one of our more than 100 accepted payment methods to complete your purchase. Directly after that, your code will be delivered to your SEAGM account in My Game Card page. Redeem the code immediately and get back to chatting and watching your favorite streams ad-free in no time at all!
            Redemption Instructions
            
            You must have a valid Twitch account to use this card. To redeem:
            
                Visit twitch.tv/redeem
                Enter the gift code
            
            Terms and Conditions
            
            Use of this gift card constitutes acceptance of the following terms and conditions: This card may be redeemed only on Twitch.tv, only by persons age 13 and up, and only for goods and services offered by Twitch or for goods sold on Twitch.tv or its applications. This card cannot be returned, refunded, resold, or redeemed for cash, except where required by applicable law. This card cannot be used to buy other gift cards. This card is not redeemable for non-U.S. residents. This card and the value underlying this card do not expire. This card is non-reloadable. There are no fees associated with this card.
            
            Treat this gift card like cash. Twitch is not responsible for lost, stolen, damaged, destroyed or misplaced cards, or cards used without your permission. This card is issued by Twitch Interactive, Inc. Please see additional terms and conditions, including instructions for redeeming this card, at twitch.tv/legal/giftcard. For customer service, visit: help.twitch.tv.
            ',
            'notes' => 'Twitch is where millions of people come together live every day to chat, interact, and make their own entertainment together.',
            'price' => '100',
            'cover_image' => 'images/covers/6.webp',
        ]);
        Product::create([
            'title' => 'Razer Pin Direct Top Up (100USD)',
            'description' => 'Razer Pin Direct Top Up',
            'instruction' => '
            About Razer Pin Direct Top Up (MY)
            
            Razer Gold is the unified virtual credits for gamers worldwide. Use Razer Gold in over 2,500 games and entertainment content to buy games and in-game items. Get more bang for your buck with exclusive game deals and get rewarded with Razer Silver, the loyalty rewards program for gamers.
            How to use direct top-up with Razer PIN Direct Top Up (MY):
            
                On the game\'s webshop payment page, select Razer Gold PIN (or Direct Top-up).
                Depending on the game, you may have to log in to your game account or enter your user id.
                Enter your Razer Pin Direct Top Up(MY) Serial Number and PIN code.
                Follow the on-screen instructions to complete the transaction.
            
            Important Information:
            
                Razer Pin Direct Top Up(MY) can be used if the game supports Razer Pin direct top-up payment method.
                Razer PIN Direct Top Up(MY) is not able to top up into Razer Gold Wallet.
            
            ',
            'notes' => 'Note: For Games Direct Top Up Only. Cannot be used for Facebook or RAZER Wallet top up.',
            'price' => '99.99',
            'cover_image' => 'images/covers/1.webp',
        ]);    
    }
}
