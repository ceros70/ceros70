/* Author: Rommel Castro A.

*/
var HOST = 'http://' + location.hostname + "/";
jQuery(function($){
    $('a[rel*=lightbox]').lightBox();
    $('#columns').masonry({
        itemSelector : '.block',
        columnWidth: 246
    });
    
    /* This changes for slider image link on single post */
    $('#imglink').mouseover( function(){
      $(this).css({"height":"336px"});
    });

    $('img.lazy').jail({
                     timeout:500,
                     event: 'load'
                 });
    
    $("#slider-home").cycle({  
        speed:  'fast', 
        timeout: 10000, 
        pager:  '#slider-paging' 
    });
    
    if(num_pages == 1)
    {
        $("#hpaging").hide();
    }
    $("#hpaging").click( function(){
      if(paged == (num_pages-1))
      {
        paged = num_pages;
        $("#hpaging").hide();
      }
      else if(paged >= 1 && paged < (num_pages-1) )
      {
        paged = paged+1;
      }
      switch($(this).attr('class'))
      {
        case "hpage" :
              $("#columns .iload").show();
              $.ajax({
              type:"POST",
              url: HOST + "wp-admin/admin-ajax.php",
              data :{
                    action:'showcpost',
                    pnumber:paged,
                    pages:num_pages
                  },
              success: function(responce){
              $('#columns iload').remove();  
              $('#columns').append(responce)
              .masonry( 'reload' );
              $('#columns iload').hide();
              }
            });
        break;
        case "blog-page":
          $("#blog_post .iload").show();
          $.ajax({
          type:"POST",
          url: HOST + "wp-admin/admin-ajax.php",
          data :{
                action:'showblogpost',
                blog_page_number:paged,
                blogpages:num_pages
              },
          success: function(responce){
           $('#blog_post iload').remove();
           $('#blog_post').append(responce);
           $('#blog_post iload').hide();
          }
        });
        break;
        case "gen-page":
        $("#columns .iload").show();  
        $.ajax({
          type:"POST",
          url: HOST + "wp-admin/admin-ajax.php",
          data :{
                action:'showgenpost',
                gen_page_number:paged,
                genpages:num_pages,
                genname:term_name
              },
          success: function(responce){
           $('#columns iload').remove(); 
           $('#columns').append(responce)
           .masonry( 'reload' );
           $('#columns iload').hide();
          }
        });
        break;
        case "tema-page":
        $("#columns .iload").show();  
        $.ajax({
          type:"POST",
          url: HOST + "wp-admin/admin-ajax.php",
          data :{
                action:'showtemapost',
                tema_page_number:paged,
                temapages:num_pages,
                temaname:term_name
              },
          success: function(responce){
           $('#columns iload').remove(); 
           $('#columns').append(responce)
           .masonry( 'reload' );
           $('#columns iload').hide();
          }
        });
        break;
        case "med-page":
        $("#columns .iload").show();  
        $.ajax({
          type:"POST",
          url: HOST + "wp-admin/admin-ajax.php",
          data :{
                action:'showmedpost',
                med_page_number:paged,
                medpages:num_pages,
                medname:term_name
              },
          success: function(responce){
           $('#columns iload').remove(); 
           $('#columns').append(responce)
           .masonry( 'reload' );
           $('#columns iload').hide();
          }
        });
        break;
      }
    });
    $(function(){
   $(".advanced-recent-posts li:last-child").css({"margin":"0","border":"0"})
  })
})