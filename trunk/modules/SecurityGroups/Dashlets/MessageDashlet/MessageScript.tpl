{literal}
<script type="text/javascript">
if(typeof Message == 'undefined') {
	Message = function() {
	    return {
	    	/**
	    	 * Called when the textarea is blurred
	    	 */
	        saveMessage: function(id) {
	        	ajaxStatus.showStatus('{/literal}{$saving}{literal}'); // show that AJAX call is happening
	        	// what data to post to the dashlet
    	    	
    	    	postData = 'to_pdf=1&module=Home&action=CallMethodDashlet&method=saveMessage&id=' + id ;
				YAHOO.util.Connect.setForm(document.getElementById('form_' + id));
				var cObj = YAHOO.util.Connect.asyncRequest('POST','index.php', 
								  {success: Message.saved, failure: Message.saved, argument: id}, postData);
	        },
		    /**
	    	 * handle the response of the saveText method
	    	 */
	        saved: function(data) {
	        	SUGAR.mySugar.retrieveDashlet(data.argument);
	           	ajaxStatus.flashStatus('{/literal}{$done}{literal}');
	        }, 
	        deleteMessage: function(record, id){
				postData = 'to_pdf=1&module=Home&action=CallMethodDashlet&method=deleteMessage&id=' + id + '&record=' +  record;
				var cObj = YAHOO.util.Connect.asyncRequest('POST','index.php', 
								  {success: Message.saved, failure: Message.saved, argument: id}, postData);	        
	        }
	    };
	}();
}
</script>
{/literal}
<script type="text/javascript" src="{sugar_getjspath file="include/javascript/popup_helper.js"}">
</script>