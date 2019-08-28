<?php
/**
 * Template Name: Add Bet Page
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
					<?php
					// Start the loop.
					if ( get_current_user_id() ) :
					?>
						<h1><?php _e( 'Add bet', 'twentyfifteenext' ); ?></h1>
						<form id="bets-add-form-submit" method="post">
                            <?php wp_nonce_field( 'bets_add_bet', '_wpnonce', false ) ?>
                            <input type="hidden" name="action" value="bet_create_new_bet">

							<div id="bet-message"></div>
							<p>
								<label for="bet-title">
									<?php _e( 'Title', 'twentyfifteenext' ); ?>:
									<input type="text" id="bet-title" name="title" value="">
								</label>
							</p>
							<p>
								<label for="bet-description">
									<?php _e( 'Description', 'twentyfifteenext' ); ?>:
									<textarea id="bet-description" name="description"></textarea>
								</label>
							</p>
                            <p>
                                <label for="bet-type">
									<?php _e( 'Bet type', 'twentyfifteenext' ); ?>:
                                    <select id="bet-type" name="type">
										<?php $terms = get_terms( [
											'taxonomy'   => BETS_POST_TAXONOMY_TYPE,
											'hide_empty' => false,
										] ); ?>
										<?php if ( empty( $terms ) ) : ?>
                                            <option value="">...</option>
										<?php else: ?>
											<?php foreach (
												get_terms( [
													'taxonomy'   => BETS_POST_TAXONOMY_TYPE,
													'hide_empty' => false,
												] ) as $term
											): ?>
                                                <option value="<?php echo esc_attr( $term->slug ); ?>"><?php echo $term->name; ?></option>
											<?php endforeach; ?>
										<?php endif; ?>
                                    </select>
                                </label>
                            </p>
							<p>
								<button id="bet-submit" type="submit"><?php _e( 'Send', 'twentyfifteenext' ); ?></button>
							</p>
						</form>
					<?php else:
						echo __( 'You must to be logged in', 'twentyfifteenext' );
					endif;
					?>
				</div>
			</article>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>