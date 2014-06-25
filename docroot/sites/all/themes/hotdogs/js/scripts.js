(function ($, Drupal) {

  Drupal.behaviors.quizQuestions = {
    attach: function(context, settings) {

			$( document ).ready(function() {
	
				$('a.orbit-prev, a.orbit-next').addClass('button roundcrnr'); 
				
				$('a.orbit-prev > span').replaceWith( "<span>Previous</span>" );
				$('a.orbit-next > span').replaceWith( "<span>Next</span>" );			
			
				$('a.orbit-prev, a.orbit-next').click(function() {						
					if($('.orbit-container .views-row').hasClass('active')) {
						//reset
						$('.orbit-container').css({ 
							'padding-bottom': '60px',
							'overflow-y': 'hidden'
						});			
					}
				});		
				
				
				var revealHeight = 0;		
				
				$('.one-answer').click(function() {
					
					// Get the NID
					var nid = $(this).attr("data-nid");
					
					
					// Mark up the answers
					$('#node-' + nid + ' .one-answer-correct').css('color','green');
					$('#node-' + nid + ' .one-answer-incorrect').css('color','red');
					
					// Right or wrong
					if( $(this).attr('data-answer-type') == 'correct' ) {
						$('#response-' + nid).html('Right!');
					} else {
						$('#response-' + nid).html('False!');
					}
					
					// Reveal
					$('#node-' + nid + ' .reveal').css('display','block');
					
					revealHeight = $(this).parent().next('.reveal').outerHeight();
					revealHeight = (revealHeight + 60);
										
									
					$('.orbit-container').css({ 
						'padding-bottom': revealHeight
					});
								
					
				});
			});


    }
  };

})(jQuery, Drupal);
