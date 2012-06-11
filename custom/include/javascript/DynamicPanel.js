function togglePanel(field) {
	var fieldValue = getFieldValue(field);
	var parentField;
	var parentValue;

	for(targetPanelName in panelFieldsDefs[field.name][fieldValue]) {
		var panelName = targetPanelName.toUpperCase();
		var targetPanel = document.getElementById(panelName);
		var display = panelFieldsDefs[field.name][fieldValue][targetPanelName];

		if(display == 1) {
			for(parentField in panelFieldsDefs) {
				if(parentField != field.name) {
					parentValue = getFieldValue(document.getElementById(parentField));

					if(panelFieldsDefs[parentField][parentValue][targetPanelName] == 0) {
						display = 0;
					}
				}
			}
		}

		targetPanel.style.display = (display == 1) ? '' : 'none';
	}
}

function getFieldValue(field) {
	if(field.type == 'checkbox') {
		fieldValue = (field.checked) ? 1 : 0;

		if(field.disabled) {
			return;
		}
	} else if(field.type == 'select-one' || field.type == 'select-multiple') {
		fieldValue = field.value;
	} else if(field.type == 'text') {
		fieldValue = (field.value == '') ? 0 : 1;
	}

	return fieldValue;
}
