<?php
/**
 * Template Name: Bet Page
 *
 * @package WordPress
 * @author Alexander Vitkalov <nechin.va@gmail.com>
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <article class="hentry">
                <div class="entry-content">
                    <h1><?php the_title(); ?></h1>
                    <h4><?php the_content(); ?></h4>
					<?php $terms = get_the_terms( get_the_ID(), BETS_POST_TAXONOMY_STATUS ); ?>
					<?php $a_terms = []; ?>
					<?php if ( is_array( $terms ) ) : ?>
						<?php foreach ( $terms as $term ) : ?>
							<?php $a_terms[] = $term->name; ?>
						<?php endforeach; ?>
					<?php endif; ?>
                    <span><i><?php echo implode( ', ', $a_terms ); ?></i></span>

	                <?php wp_nonce_field( 'bets_make_bet', '_wpnonce', false ) ?>
                    <input type="hidden" id="bet-postid" value="<?php the_ID(); ?>">

                    <div id="bet-message" style="padding-top: 20px"></div>
                    <p>
                        <label for="bet-title">
							<?php _e( 'The bet', 'twentyfifteenext' ); ?>:
                            <input type="text" id="bet-value" name="bet" value="">
                        </label>
                        <span style="font-size: 10px;"><?php _e( 'Value from 100 to 1000', 'twentyfifteenext' ); ?></span>
                    </p>
                    <p>
                        <button id="bet-make"
                                type="button" <?php disabled( isset( $_COOKIE[ 'bet_cookie_' . get_the_ID() ] ), true, true ) ?>><?php _e( 'The bet will pass!', 'twentyfifteenext' ); ?></button>
                    </p>
                </div>
            </article>
        </main><!-- .site-main -->
    </div><!-- .content-area -->

<?php get_footer(); ?>