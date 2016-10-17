<?php /* Template Name: Piernas y Hombros */ ?>
<?php get_header(); ?>

<?php get_template_part('element', 'page-header'); ?>

<div id="main" class="main">
	<div class="container">
		<?php
		if (current_user_can("piernas_hombros")) {
		?>

			<div class="content">
	
				<div class="row">

					<div class="content-text">
						<h2 class="feature-content">Ejercicios de Piernas</h2>
					</div>

					<?php

		        		global $wpdb;
		        		$results = $wpdb->get_results('SELECT * 
														FROM wp_posts 
														WHERE ID IN( SELECT object_id
																	FROM wp_term_relationships
																	WHERE term_taxonomy_id IN ( SELECT term_id 
																								FROM wp_terms 
																								WHERE slug="cuadriceps") 
		        													)
		        									 ');
		        		foreach ($results as $result){
		        			?> <div class="content-samples column-narrow col4"> <?php
		        				echo $result->post_content;
		        			?> </div> <?php
		        		}

		        		global $wpdb;
		        		$exits = $wpdb->get_results('SELECT * 
														FROM wp_posts 
														WHERE ID IN( SELECT object_id
																	FROM wp_term_relationships
																	WHERE term_taxonomy_id IN ( SELECT term_id 
																								FROM wp_terms 
																								WHERE slug="aductores") 
		        													)
		        									 ');
		        		foreach ($exits as $exit){
		        			if (!in_array($exit, $results)){
		        				?> <div class="content-samples column-narrow col4"> <?php
		        					echo $exit->post_content;
		        				?> </div> <?php
		        			}
		        		}


		        	?>

				</div>


				<div class="row">
					
					<div class="content-text">
						<h2 class="feature-content">Ejercicios de Hombros</h2>
					</div>
					<div class="row">

						<?php

		        		global $wpdb;
		        		$results = $wpdb->get_results('SELECT * 
														FROM wp_posts 
														WHERE ID IN( SELECT object_id
																	FROM wp_term_relationships
																	WHERE term_taxonomy_id IN ( SELECT term_id 
																								FROM wp_terms 
																								WHERE slug="deltoides") 
		        													)
		        									 ');
		        		foreach ($results as $result){
		        			?> <div class="content-samples column-narrow col4"> <?php
		        				echo $result->post_content;
		        			?> </div> <?php
		        		}
		        		?>
					</div>
				
				</div>
			</div>
		<?php
		} else {
		?>
			<div class="content">
				<h3>Lo sentimos, no tiene permisos para ver esta página</h3>
			</div>
		<?php
		}
		?>
	</div>
</div>

<?php get_footer(); ?>