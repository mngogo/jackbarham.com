				<li>
					<a href="<?php the_permalink(); ?>" class="fade touchHover">
						<img src="<?php the_field('portfolio_thumbnail'); ?>" alt="<?php the_title(); ?>" class="pImg fade">
						<span class="hoverInfo">
							<h3><?php the_title(); ?></h3>
							<p><?php the_field('potfolio_type'); ?></p>
							<p class="viewp">View project <i class="fa fa-angle-right"></i></p>
						</span>
					</a>
				</li>