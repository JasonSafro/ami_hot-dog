(function ($, Drupal) {

  Drupal.behaviors.removeClass = {
    attach: function(context, settings) {
			$('#main-menu').removeClass('left');
    }
  };
				
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

 	Drupal.behaviors.equalHeights = {
    attach: function(context, settings) {

		equalheight = function(container){
		
		var currentTallest = 0,
				 currentRowStart = 0,
				 rowDivs = new Array(),
				 $el,
				 topPosition = 0;
		 $(container).each(function() {
		
			 $el = $(this);
			 $($el).height('auto')
			 topPostion = $el.position().top;
		
			 if (currentRowStart != topPostion) {
				 for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
					 rowDivs[currentDiv].height(currentTallest);
				 }
				 rowDivs.length = 0; // empty the array
				 currentRowStart = topPostion;
				 currentTallest = $el.height();
				 rowDivs.push($el);
			 } else {
				 rowDivs.push($el);
				 currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
			}
			 for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
				 rowDivs[currentDiv].height(currentTallest);
			 }
		 });
		}
		
		$(window).load(function() {
			equalheight('.block-views .columns');	
			equalheight('.view-photo-galleries .columns');					
		});
		
		
		$(window).resize(function(){
			equalheight('.block-views .columns');
			equalheight('.view-photo-galleries .columns')
		});


    }
  };


})(jQuery, Drupal);
