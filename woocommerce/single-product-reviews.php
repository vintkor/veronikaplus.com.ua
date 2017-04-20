<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.2
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<?php

$post_comments = get_comments( array( 'post_id' => get_the_ID() ) );
if( count($post_comments)  > 0 ) {
	foreach( $post_comments as $comment ) {
		$total_rating[] = get_comment_meta( get_comment_ID(), 'rating', true );
		$total_recomend[] = (get_comment_meta( get_comment_ID(), 'recomend', true ) == 'on') ? 1 : 0;
	}
	$total_rating = array_sum($total_rating) / count($total_rating);
}

?>

<div id="reviews" class="woocommerce-Reviews">
	<div id="comments">
		<h2 class="product_reviews_title">Отзывы</h2>
		<div class="row">
		<?php if( count($post_comments)  > 0 ): ?>
			<div class="col-md-3 col-sm-4">
				<div class="my_comment__all-rating">
					<p>Рейтинг товара:</p>
					<p>
						<img src="<?php echo get_template_directory_uri(); ?>/app/img/heart.png">
						<?php echo number_format($total_rating, 2, '.', ''); ?> из 5
					</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-4">
				<p>Рекомендуют:</p>
				<img src="<?php echo get_template_directory_uri(); ?>/app/img/check.png">
				<?php echo array_sum($total_recomend); ?>
			</div>
			<div class="col-md-3 col-md-offset-3 col-sm-4 col-sm-offset-0">
				<p>Преобрели товар?</p>
				<button id="add__comment" class="add__comment" data-toggle="modal" data-target="#myModal">
					<img src="<?php echo get_template_directory_uri(); ?>/app/img/btn_comment.png">
					оставьте отзыв
				</button>
			</div>
		<?php else: ?>
			<div class="col-md-12 align-center">
				<p>Преобрели товар?</p>
				<button id="add__comment" class="add__comment" data-toggle="modal" data-target="#myModal">
					<img src="<?php echo get_template_directory_uri(); ?>/app/img/btn_comment.png">
					оставьте отзыв
				</button>
			</div>
		<?php endif; ?>
		</div>
		<?php if( count($post_comments)  > 0 ): ?>
			<div class="my_comment__count"><?php echo $product->get_review_count(); ?> покупатель оставил отзыв</div>
		<?php else: ?>
			<div class="my_comment__count text-center" style="margin: 30px 0;">Ещё нет отзывов об этом товаре</div>
		<?php endif; ?>
		<?php foreach( $post_comments as $comment ): ?>
			<?php
				$comment_recomend = get_comment_meta( get_comment_ID(), 'recomend', true );
				$comment_text = $comment->comment_content;
				$comment_rating = get_comment_meta( get_comment_ID(), 'rating', true );
				$comment_author = $comment->comment_author;
				$comment_plus = get_comment_meta( get_comment_ID(), 'plus', true );
				$comment_minus = get_comment_meta( get_comment_ID(), 'minus', true );
			?>
			<div class="my_comment__wrapper">
				<p class="my_comment__reting">
					<img src="<?php echo get_template_directory_uri(); ?>/app/img/heart.png">
					<?php echo $comment_rating; ?> из 5
				</p>
				<div class="my_comment__text"><?php echo $comment_text; ?></div>
				<?php if( !empty($comment_plus) or !empty($comment_minus) ): ?>
					<div class="my_comment__recommend_wrapper">
						<?php if( !empty($comment_plus) ): ?>
							<div class="my_comment__plus"><span>Достоинства:</span> <?php echo $comment_plus; ?></div>
						<?php endif; ?>
						<?php if( !empty($comment_minus) ): ?>
							<div class="my_comment__minus"><span>Недостатки:</span> <?php echo $comment_minus; ?></div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if( $comment_recomend == 'on' ): ?>
					<p class="my_comment__good_product">
						<img src="<?php echo get_template_directory_uri(); ?>/app/img/check.png">
						Рекомендую этот товар
					</p>
				<?php endif; ?>
			</div>
			<div class="my_comment__author">
				Автор: <?php echo $comment_author . ' <span>' . $comment->comment_date . '</span>'; ?>
			</div>
		<?php endforeach; ?>

	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
					$commenter = wp_get_current_commenter();

					$comment_form = array(
						'title_reply'          => have_comments() ? __( 'Add a review', 'woocommerce' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'woocommerce' ), get_the_title() ),
						'title_reply_to'       => __( 'Leave a Reply to %s', 'woocommerce' ),
						'title_reply_before'   => '<span id="reply-title" class="comment-reply-title">',
						'title_reply_after'    => '</span>',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'woocommerce' ) . ' <span class="required">*</span></label> ' .
										'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" required /></p>',
							'email'  => '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'woocommerce' ) . ' <span class="required">*</span></label> ' .
										'<input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-required="true" required /></p>',
						),
						'label_submit'  => __( 'Submit', 'woocommerce' ),
						'logged_in_as'  => '',
						'comment_field' => '',
					);

					if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
						$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a review.', 'woocommerce' ), esc_url( $account_page_url ) ) . '</p>';
					}

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'woocommerce' ) . '</label><select name="rating" id="rating" aria-required="true" required>
							<option value="">' . esc_html__( 'Rate&hellip;', 'woocommerce' ) . '</option>
							<option value="5">' . esc_html__( 'Perfect', 'woocommerce' ) . '</option>
							<option value="4">' . esc_html__( 'Good', 'woocommerce' ) . '</option>
							<option value="3">' . esc_html__( 'Average', 'woocommerce' ) . '</option>
							<option value="2">' . esc_html__( 'Not that bad', 'woocommerce' ) . '</option>
							<option value="1">' . esc_html__( 'Very poor', 'woocommerce' ) . '</option>
						</select></p>';
					}

					$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your review', 'woocommerce' ) . ' <span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required></textarea></p>';

					$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="recomend">Я рекомендую этот товар</label>
						<input type="checkbox" id="recomend" name="recomend">
						</p>';

					$comment_form['comment_field'] .= '<p class="comment-form-comment plus"><label for="plus">Достоинства</label>
						<textarea id="plus" name="plus"></textarea>
						</p>';

					$comment_form['comment_field'] .= '<p class="comment-form-comment minus"><label for="minus">Недостатки</label>
						<textarea id="minus" name="minus"></textarea>
						</p>';

					
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Название модали</h4>
      </div>
      <div class="modal-body">
        <?php comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) ); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary">Сохранить изменения</button>
      </div>
    </div>
  </div>
</div>

