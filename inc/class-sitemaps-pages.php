<?php

/**
 * Class Core_Sitemaps_Pages.
 * Builds the sitemap pages for Pages.
 */
class Core_Sitemaps_Pages extends Core_Sitemaps_Provider {
	/**
	 * Post type name.
	 *
	 * @var string
	 */
	protected $object_type = 'page';

	/**
	 * Sitemap name
	 *
	 * Used for building sitemap URLs.
	 *
	 * @var string
	 */
	public $name = 'pages';

	/**
	 * Sitemap route.
	 *
	 * Regex pattern used when building the route for a sitemap.
	 *
	 * @var string
	 */
	public $route = '^sitemap-pages\.xml$';

	/**
	 * Sitemap slug.
	 *
	 * Used for building sitemap URLs.
	 *
	 * @var string
	 */
	public $slug = 'page';

	/**
	 * Produce XML to output.
	 */
	public function render_sitemap() {
		$sitemap = get_query_var( 'sitemap' );
		$paged   = get_query_var( 'paged' );

		if ( 'pages' === $sitemap ) {
			$content  = $this->get_content_per_page( $this->object_type, $paged );
			$renderer = new Core_Sitemaps_Renderer();
			$renderer->render_urlset( $content, $this->object_type );
			exit;
		}
	}
}
