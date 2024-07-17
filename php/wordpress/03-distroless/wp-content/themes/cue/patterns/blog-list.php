<?php
/**
 * Title: Blog List
 * Slug: cue/blog-list
 * Categories: query, posts
 * Block Types: core/query
 */
?>

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:query {"queryId":29,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
<div class="wp-block-query"><!-- wp:query-no-results /-->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:post-template -->
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:post-date {"format":"n-j-Y","style":{"layout":{"selfStretch":"fixed","flexSize":"120px"},"typography":{"lineHeight":"2.1","fontStyle":"normal","fontWeight":"400"},"elements":{"link":{"color":{"text":"#333333"},":hover":{"color":{"text":"var:preset|color|black"}}}}}} /-->

<!-- wp:group {"style":{"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:post-title {"isLink":true,"style":{"layout":{"selfStretch":"fit","flexSize":null},"typography":{"fontSize":"24px"}}} /-->

<!-- wp:post-terms {"term":"category","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"color":{"background":"#666666"}}} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background" style="background-color:#666666;color:#666666"/>
<!-- /wp:separator --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:group --></div>
<!-- /wp:query -->

<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->