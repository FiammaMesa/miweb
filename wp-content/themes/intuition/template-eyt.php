<?php /* Template Name: Espalda y Tríceps */ ?>
<?php get_header(); ?>

<?php get_template_part('element', 'page-header'); ?>

<div id="main" class="main">
	<div class="container">
		<?php
		if (current_user_can("espalda_triceps")) {
		?>

			<div class="content">
				<div class="row">

					<div class="content-text">
						<h2 class="feature-content">Ejercicios de Espalda</h2>
					</div>

		        	<?php

		        		global $wpdb;
		        		$results = $wpdb->get_results('SELECT * 
														FROM wp_posts 
														WHERE ID IN( SELECT object_id
																	FROM wp_term_relationships
																	WHERE term_taxonomy_id IN ( SELECT term_id 
																								FROM wp_terms 
																								WHERE slug="dorsales") 
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
																								WHERE slug="lumbares") 
		        													)
		        									 ');
		        		foreach ($exits as $exit){
		        			if (!in_array($exit, $results)){
		        				?> <div class="content-samples column-narrow col4"> <?php
		        					echo $exit->post_content;
		        				?> </div> <?php
		        			}
		        		}

		        		global $wpdb;
		        		$outs = $wpdb->get_results('SELECT * 
														FROM wp_posts 
														WHERE ID IN( SELECT object_id
																	FROM wp_term_relationships
																	WHERE term_taxonomy_id IN ( SELECT term_id 
																								FROM wp_terms 
																								WHERE slug="trapecios") 
		        													)
		        									 ');
		        		foreach ($outs as $out){
		        			if ((!in_array($out, $results)) && (!in_array($out, $exits))){
		        				?> <div class="content-samples column-narrow col4"> <?php
		        					echo $out->post_content;
		        				?> </div> <?php
		        			}
		        		}

		        	?>


				</div>


				<div class="row">
					
					<div class="content-text">
						<h2 class="feature-content">Ejercicios de Tríceps</h2>
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
																								WHERE slug="triceps") 
		        													)
		        									 ');
		        		foreach ($results as $result){
		        			?> <div class="content-samples column-narrow col4"> <?php
		        				echo $result->post_content;
		        			?> </div> <?php
		        		}
		        	?>
						<div class="content-imgs column-narrow col4">
				        	
						</div>
						<div class="content-imgs column-narrow col4">
				        	
						</div>
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