=== Omnifeed ===
Contributors: Omnisourcetech.com
Donate link: http://www.omnisourcetech.com/omnifeed/donate.php
Update Server: http://www.OmnisourceTech.com/omnifeed
Tags: rss, atom, feed, omni, embed, rdf
Requires at least: 2.2
Tested up to: 2.9.2
Stable tag: 2.01

With Omnifeed plugin you can display and embed RSS/ATOM feeds in your Wordpress posts and pages.

== Description ==
OmniFeed was inspired by InlineFeed made by Dennis Kruyt
We loved that plugin but when it broke and it didn't look like it was being supported anymore, we built our own. 
Instead of holding it just for our company, we thought it would be great to share it - please feel free to use, modify, abuse, disassemble, and generally make this your own according to open source etiquette ofcourse ;-) We think we've added everything you need but if not, please feel free to contact us! 
http://www.OmnisourceTech.com/omnifeed

Use the following shortcode inside your post:

`[omnifeed rss_feed_url="http://feed.xml"]`

VERSION 1.1 UPDATE:

- removed caching
- gave the option to add target="_blank" to the Channel URL (thanks to Olivier for reporting this bug)
- added spacing between feeds


FILTER USAGE

* Simple:
   
Just put a `[omnifeed rss_feed_url="http://yourfeed.rdf"]` in your post, and the feed will show up.

Left as rss for backwards compatibility but will work with ATOM feeds as well.

* NAMED PARAMETERS

For some customisation there are some options you can use.

display(1-100) -> Show the number of lines from the feed.
rss_feed_url -> The RSS/ATOM URL.
displaydescriptions(true/false) -> Show the discription / content of the feed, default true.
truncatetitle(false/1-100) -> Truncate long title headers after x caracters. Or false if no truncate (default).
newwindow (true/false)-> Open links in new window?
displayfeedname (true/false)-> Display the name of the feed, default true.
boxwidth (integer) -> width of the div containing the feed
titlefontsize(integer) -> font size for feed title. Not required. If not given, then the template's value will be used
fonttype(integer) -> font type of the entire field. Not required. If not given, then the template's value will be used
channelfontcolor -> color for channel (feed); Example: #aa231b or simply "red".  Not required. If not given, then the template's value will be used
titlefontcolor ->  color for title; Example: #aa231b or simply "red".Not required. If not given, then the template's value will be used
descriptionfontsize(integer) -> font size of the description.Not required. If not given, then the template's value will be used
descriptionfontcolor->  color for feed's description/content; Example: #aa231b or simply "red".Not required. If not given, then the template's value will be used


Examples:

`[omnifeed display=5 rss_feed_url="http://rss.news.yahoo.com/rss/mostemailed" displaydescriptions=true truncatetitle=false displayfeedname=true boxwidth=500 titlefontsize=18 fonttype=helvetica channelfontcolor=red titlefontcolor=green descriptionfontcolor=#000 descriptionfontsize=16 newwindow=false]`

`[omnifeed rss_feed_url="http://rss.cnn.com/rss/cnn_topstories.rss" displaydescriptions=true truncatetitle=false newwindow=true display=5]`

`[omnifeed rss_feed_url="http://rss.cnn.com/rss/cnn_topstories.rss"]`


Finally note the whole thing must be on ONE line.  No line breaks or else it won't work.

If you want to use a gziped rssfeed try you must add gzip support to wordpress, take a look here: http://wordpress.org/extend/plugins/class-snoopyphp-gzip-support/

Live examples:

soon to come

Major updates from Inlinefeed:

- The code can be added in both Visual and HTML mode
- Based on Simplepie
- Pictures inside description now have a 5 pixels right margin
- Control over font type, font size and font color of the feed

== Installation ==

Just unzip in your plugin folder, and active in your wordpress admin panel.
