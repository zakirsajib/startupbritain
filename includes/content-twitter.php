<?php
add_shortcode( 'list-twitter', 'twitter_list_shortcode' );
function twitter_list_shortcode($atts){
# Load Twitter class
require_once('TwitterOAuth.php');

# Define constants
define('TWEET_LIMIT', 20);
define('TWITTER_USERNAME', 'StartUpBritain');
define('CONSUMER_KEY', 'y0tCjLKHedYBfc8ccqcW80Pyp');
define('CONSUMER_SECRET', 'CEfZFbSmyGVKrsC40LsQsE5vMTXrHr8jypJj7IcYUXvsf0eU9U');
define('ACCESS_TOKEN', '1259140800-Su7I5UougCVCF9fjIDfxuJtWuQLht3ExYzKkLsH');
define('ACCESS_TOKEN_SECRET', 'oJhLqAeUrYhaZbMNqkOjDrgIRZ5jWUtGBRuMm5vkI8HnX');

# Create the connection
$twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

# Migrate over to SSL/TLS
$twitter->ssl_verifypeer = true;

# Load the Tweets
$tweets = $twitter->get('statuses/user_timeline', array('screen_name' => TWITTER_USERNAME, 'exclude_replies' => 'true', 'include_rts' => 'false', 'count' => TWEET_LIMIT));

# Example output
if(!empty($tweets)):?>
<div class="owl-carousel-twitter">
        <?php foreach($tweets as $tweet):?>
            <div class="item span12">
                <div class="caption span12">
                	<?php
					# Access as an object
			        $tweetText = $tweet['text'];
			
			        # Make links active
			        $tweetText = preg_replace("#(http://|(www\.))(([^\s<]{4,68})[^\s<]*)#", '<a href="http://$2$3" target="_blank">$1$2$4</a>', $tweetText);
			
			        # Linkify user mentions
			        $tweetText = preg_replace("/@(w+)/", '<a href="http://www.twitter.com/$1" target="_blank">@$1</a>', $tweetText);
			
			        # Linkify tags
			        $tweetText = preg_replace("/#(w+)/", '<a href="http://search.twitter.com/search?q=$1" target="_blank">#$1</a>', $tweetText);
			
			        # Output
			        echo '<a class="twitter-user" href="https://twitter.com/StartUpBritain" target="_blank">StartUpBritain</a>';
			        echo '<div>'.$tweetText.'</div>';?>
                </div>
              </div><!-- /Slide1 --> 
           <?php endforeach; ?>   
</div><!-- /owl-carousel -->

<?php endif;

}?>