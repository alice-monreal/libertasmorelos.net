// jQuery( document ).ready(function( $ ) {

// 	$('#remote-content-wrapper').click(function(){
//       	console.debug('aqui si entro alice. ahora si!');
//       });
//   /**
//    * Load remote content after the main page loaded.
//    */
//   Drupal.behaviors.my_module_load_remote_content = {
//     attach: function(context, settings) {
//       $('#remote-content-wrapper').click(function(){
//       	console.debug('aqui si entro alice');
//       });

//       $('#remote-content-wrapper').once('remote-content-wrapper', function() {
//       	console.debug('alice! enter here: ');

//         var base = $(this).attr('id');

//         var element_settings = {
//           url: 'http://' + window.location.hostname +  settings.basePath + settings.pathPrefix + 'ajax/remote',
//           event: 'click',
//           progress: {
//             type: 'throbber'
//           }
//         };
//         Drupal.ajax[base] = new Drupal.ajax(base, this, element_settings);
//         $(this).click();
//       });
//     }
//   };

// });