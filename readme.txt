=== WebFacing - Autoplay for Post Carousel Block from GoDaddy® CoBlocks ===
Contributors: knutsp
Donatelink: https://webfacing.eu/
Tags: blocks, carousel, autoplay, page builder, gutenberg
Requires at least: 5.5
Tested up to: 6.0
Stable tag: 1.0.3
Requires PHP: 7.3
Requires Plugins: coblocks
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Description ==

🕸️ By [WebFacing](https://webfacing.eu/). Adds autoplay - and pause on hovering - to the Post Carousel Block from GoDaddy® CoBlocks plugin.

=== Translation ready. Ready translations are ===

* Norwegian (bokmål)

=== Current features ===

* Starts autoplay for Post Carousel blocks by [CoBlocks](https://wordpress.org/plugins/coblocks/)
* Pause autoplay on hover/mouseover
* Adjust the interval through Plugin API (filter hook), default 5 seconds
* Disable pause through Plugin API (filter hook), default on
* Require specific css class for autoplay through Plugin API (filter hook), default none

== Frequently Asked Questions ==

= Does this plugin add database tables, store options, insert custom post type content, add blocks or scheduled actions? =

No, not, zero, none.

= How do I change the autoplay interval? =

> `add_filter( 'wf_coblocks_post-carousel_interval', static function( int $interval ): int {
>	$interval = 10;	// Seconds
>	return $interval;
> } );`

= How do I disable the autoplay pause on hover? =

> `add_filter( 'wf_coblocks_post-carousel_pauseonhover', '__return_false' );`

= How do I restrict autoplay to only selected blocks/carousels or posts/pages? =

> `add_filter( 'wf_coblocks_post-carousel_class', static function( string $class ): string {
>	$class = 'my-autoplay';	// Or whatever valid css class you wish to use
>	return $class;
> } );`

Then add this css class to the selected CoBlocks Post Carousel blocks under the Advanced section in the editor. Other carousels will then not autoplay.

= Can I contribute to this plugin? =

Use support tab for feedback, reports and suggestions until further notice, and Github repo creation.

== Screenshots ==

1. Post Carousel in autoplay mode

== Changelog ==

= 1.0.4 =

- Mar 31, 2022
- A file/class renaming

= 1.0.3 =

- Mar 08, 2022
- Fix: Coding Standards

= 1.0.1 =

- Feb 01, 2022
- WP 5.9 tested

= 1.0 =

* Initial release, Jul 14, 2021.
