/**
 * Actions related to Whats New home block. Uses the newjQuery object to use jquery 1.9
 */
newjQuery(document).ready(function(){
    newjQuery.whatsNew = {};
    newjQuery.whatsNew.lastShown = newjQuery('#block-views-Editor_choice_view-block_4 .news-tab').eq(0);
    /**
     * Show this element
     */
    var showNew = function (jQueryObject) {
        jQueryObject.next().css('display','block');
    }
    /**
     * Hide all elements
     */
    var hideAll = function () {
        newjQuery('.news-body').css('display','none');
    }
    /**
     * Set the element selected with selected class
     */
    var selectedClass = function (jQueryObject) {
        newjQuery('.news-tab').removeClass('news-selected');
        jQueryObject.addClass('news-selected');
    }
    /**
     * Set the hover on element with hover class
     */
    var hoverClass = function (jQueryObject) {
        newjQuery('.news-tab').removeClass('news-hover');
        if (undefined == jQueryObject) {
            //code
        }else{
             jQueryObject.addClass('news-hover');
        }
    }
    selectedClass(newjQuery.whatsNew.lastShown);
    newjQuery('#block-views-Editor_choice_view-block_4 .news-tab').click(function(){
        hideAll();
        showNew(jQuery(this));
        selectedClass(jQuery(this));
        newjQuery.whatsNew.lastShown = jQuery(this);
    })
     newjQuery('#block-views-Editor_choice_view-block_4 .views-field-nid').hover(function(){
        hideAll();
        var thisList = jQuery(this).find('.news-tab');
        showNew(thisList);
        hoverClass(thisList);
     },function () {
        hideAll();
        showNew(newjQuery.whatsNew.lastShown);
        hoverClass();
     })
})