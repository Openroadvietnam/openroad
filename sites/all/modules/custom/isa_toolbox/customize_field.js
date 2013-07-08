//For specific textfield append a edit and remove link
function changeUrlNextPath(elmt, baseurl)
{

    var spanlink = $($("#"+elmt.id).next('span'));    
    var search_nid = $("#"+elmt.id).val();
    var re = new RegExp("nid:[0-9]*", "g");
    var myArray = re.exec(search_nid);
    var destination = '';
    if(baseurl != '') {
        var active_popup = Popups.activePopup();
        var baseURI = window.location.href;
        if(active_popup != undefined) {
            baseURI = active_popup.path;
        } else {
            baseURI = baseURI.replace(baseurl + '/', '');
        }

        if(baseURI.match(/(.+)\?/)){
            baseURI = baseURI.match(/(.+)\?/)[1];
        }
        baseURI = encodeURIComponent(baseURI);
        destination = '?destination=' +  baseURI;
    }

    if(myArray!=null)
    {
        var re1 = new RegExp("[0-9]+", "g");
        var myArray1 = re1.exec(myArray[0]);
        if(myArray1[0])
        {
            spanlink.children('a').show();
            spanlink.children('a')[0].href = baseurl+"/node/"+myArray1[0]+"/edit" + destination;
        }
        else
        {
            spanlink.children('a').hide();
        }
            
    }
    
    
}
////special behavior for mandotory field a star appears only if one field is filled    
function add_asset_release_mandatory_behavior(content_id)
{
    var asset_content= $(content_id)
//console.log(asset_content);
//asset_content.prev("label").find('span').hide()   ;
    
//    var id_scheme = content_id.replace('content','scheme');
//    var id_scheme_version = content_id.replace('content','scheme-version');    
//    var id_scheme_agency = content_id.replace('content','scheme-agency');    
//    var asset_scheme = $(""+id_scheme);
//    var asset_scheme_version = $(""+id_scheme_version);
//    var asset_scheme_agency = $(""+id_scheme_agency);
//    
//    
//    
//    var asset_identifier= asset_content.next('label').next('input');
//    var asset_version= asset_identifier.next('label').next('input');
//    var asset_agency= asset_version.next('label').next('input');
//
//    asset_scheme.blur(
//        function()
//        {
//             asset_content.prev("label").find('span').show()        
////            if(asset_content.val()!="" || asset_version.val()!="" || asset_agency.val()!="" || asset_identifier.val()!="" )
////                asset_content.prev("label").find('span').show()        
////            else
////                asset_content.prev("label").find('span').hide()        
//        
//        });
//        
//   asset_scheme_agency.blur(
//        function()
//        {
//             asset_content.prev("label").find('span').show()        
////            if(asset_content.val()!="" || asset_version.val()!="" || asset_agency.val()!="" || asset_identifier.val()!="" )
////                asset_content.prev("label").find('span').show()        
////            else
////                asset_content.prev("label").find('span').hide()        
//        
//        });     
//        
//    
//    asset_scheme_version.blur(
//        function()
//        {
//            asset_content.prev("label").find('span').show()        
//        });    
//        
//        
//    asset_agency.blur(
//        function()
//        {
//            if(asset_content.val()!="" || asset_version.val()!="" || asset_agency.val()!="" || asset_identifier.val()!="" )
//                asset_content.prev("label").find('span').show()        
//            else
//                asset_content.prev("label").find('span').hide()        
//        });  
}    

function clearTextFieldBefore(elmt, textfieldid)
{
        
    //$("#"+elmt.id).prev('span').prev('input').html("");    
    $("#"+elmt.id).prev('a').hide();
    $("#"+elmt.id).hide();
    $("#"+textfieldid).val("");
//console.log($("#"+textfieldid));
    
}
//add a fieldset collapsable into flexifield fields
function retheme_field(name_fieldset,display_name,name_field_name_value_id,alternative_field_name_value_id)
{
    if(name_field_name_value_id == undefined)
        return;
    //avoid appending on existing element
    if ($("#"+"toggle_asset_name_"+name_fieldset).length > 0){
        return;
    }
    
    
    
    
    if(alternative_field_name_value_id!=undefined)
    {
        $(name_field_name_value_id).css("width","50%");
        $(name_field_name_value_id).css("float","left");
        $(name_field_name_value_id).css("margin-right","10%");
        $(name_field_name_value_id).find("input[type='text']").width("40%");
    }
    $(name_field_name_value_id).before("<div id='toggle_asset_name_"+name_fieldset+"' ><span id='toggle_expand_"+name_fieldset+"'><span><a href='#' >"+display_name+"</a></div>")
    if(alternative_field_name_value_id!=undefined)
    {
        $(alternative_field_name_value_id).find("input[type='text']").width("30%");
        $(alternative_field_name_value_id).hide(); 
    }
    
    $("#toggle_expand_"+name_fieldset).css("background","url('../../misc/menu-collapsed.png') no-repeat scroll 5px 75% transparent")
    $("#toggle_expand_"+name_fieldset).css("padding-left","20px")
    $("#toggle_expand_"+name_fieldset+" a").css("decoration","underlined")
    $(name_field_name_value_id).toggle();
    
    
    $("#toggle_asset_name_"+name_fieldset).css("background-color","#F7F7F7");
    $("#toggle_asset_name_"+name_fieldset).css("height","35px");
    $("#toggle_asset_name_"+name_fieldset).click(
        function(){
            $(name_field_name_value_id).toggle();
            if( !$(name_field_name_value_id).is(":visible") )            
            {
                if(alternative_field_name_value_id!=undefined)
                    $(alternative_field_name_value_id).hide(); 
                $("#toggle_expand_"+name_fieldset).css("background","url('../../misc/menu-collapsed.png') no-repeat scroll 5px 75% transparent")
            }
            else
            {
                if(alternative_field_name_value_id!=undefined)
                    $(alternative_field_name_value_id).show(); 
                $("#toggle_expand_"+name_fieldset).css("background","url('../../misc/menu-expanded.png') no-repeat scroll 5px 75% transparent")
            }
           
            return false;
            
        });
    
}

Drupal.behaviors.myModuleBehavior = function (context) {
  if (Drupal.settings.isa_toolbox){
    var element_id = Drupal.settings.isa_toolbox.element_id.toString();

    var tab=element_id.split(',');
    var base_url =Drupal.settings.isa_toolbox.base_url.toString();
    var tab_base= base_url.split(',');
    for (var i in tab)
    {
      if (tab[i] !=''){
        var j=0;
        while (document.getElementById(tab[i]+j+'-nid-nid')){
          $('#'+tab[i]+j+'-nid-nid').blur(function(){changeUrlNextPath(this,tab_base[0])});
          j++;
        }
      }
    }
  }
};

function add_evenement(element_id,base_url) {
  $("#"+element_id).blur(function(){changeUrlNextPath(this,base_url)});
};